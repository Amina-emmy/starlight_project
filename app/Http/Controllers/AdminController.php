<?php

namespace App\Http\Controllers;

use App\Models\AudCandidat;
use App\Models\AudJuryVote;
use App\Models\Episode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view("backend.affichage.pages.dashboardAdmin");
    }
    //todo => ALL AFFICHAGE VIEWS ( GAME )
    //^ audition
    public function affichageAud(Request $request)
    {
        $episodes = Episode::all();
        $jurys = User::role('jury')->get();
        $aud_votes = AudJuryVote::all();

        $episode=1;
        $candidats = AudCandidat::orderBy('id', 'asc')->get();
        $votesParCandidat = [];
        $vote = false;
        foreach ($candidats as $candidat) {
            $nbrVotes = AudJuryVote::where('aud_candidat_id', $candidat->id)
                ->select('vote_jury1', 'vote_jury2', 'vote_jury3', 'vote_jury4', 'vote_jury5')
                ->get();

            // Calcul du total des votes pour chaque candidat
            $totalVotes = $nbrVotes->sum(function ($vote) {
                return $vote->vote_jury1 + $vote->vote_jury2 + $vote->vote_jury3 + $vote->vote_jury4 + $vote->vote_jury5;
            });

            $votesParCandidat[$candidat->id] = $totalVotes;
        }

        $currentCandidatIndex = $request->input('candidatIndex', 0);

        if ($currentCandidatIndex < 0) {
            $currentCandidatIndex = 0;
        } elseif ($currentCandidatIndex >= count($candidats)) {
            $currentCandidatIndex = count($candidats) - 1;
        }
        $currentCandidat = $candidats->get($currentCandidatIndex);

        return view('backend.affichage.pages.audition', compact('currentCandidat', 'currentCandidatIndex', 'votesParCandidat', 'vote', 'candidats', 'episodes', 'jurys', 'aud_votes','episode'));
    }
    //^ Face a Face
    public function affichageFaF()
    {
        //change Audcandidat to the model of the faf_candidat ( pas encore creer)
        $candidats = AudCandidat::all();
        $jurys = User::role('jury')->get();

        return view('backend.affichage.pages.faf', compact("candidats", "jurys"));
    }
    //^ Ultime Face a Face
    public function affichageUFaF()
    {
        //change Audcandidat to the model of the ufaf_candidat ( pas encore creer)
        $candidats = AudCandidat::all();
        $jurys = User::role('jury')->get();

        return view('backend.affichage.pages.ufaf', compact("candidats", "jurys"));
    }
    //^ Demi Finale
    public function affichageDemiFinale()
    {
        //change Audcandidat to the model of the demiFinale_candidat ( pas encore creer)
        $candidats = AudCandidat::all();
        $jurys = User::role('jury')->get();
        return view('backend.affichage.pages.demiFinale', compact("candidats", 'jurys'));
    }
    //^ Finale
    public function affichageFinale()
    {
        //change Audcandidat to the model of the demiFinale_candidat ( pas encore creer)
        $candidats = AudCandidat::all();
        $jurys = User::role('jury')->get();
        return view('backend.affichage.pages.finale', compact("candidats", 'jurys'));
    }
    //todo =============================================================

    //* Gestion => USERS
    //^ View
    public function indexUsers()
    {
        $jurys = User::role('jury')->get(); // get from the database all the jurys
        $publics = User::role('public')->get(); // get from the database all the public

        return view('backend.gestion.pages.users', compact('jurys', 'publics'));
    }
    //^ Update
    public function updateJury(Request $request, User $jury)
    {
        request()->validate([
            "image" => "image|mimes:png,jpg,jpeg,gif|max:2048",
            "name" => "string|max:255|required",
            "email" => "email|max:255|required"
        ]);

        $existEmail = User::where("email", $request->email)->first(); // pour verifier si l email ecrit deja reserver
        $pattern = '/^.+@starlight\.ma$/'; // syntaxe du email pour users, Except Admin
        $newImage = $request->file('image'); // new pfp de jury

        if ($newImage != null) {
            if ($jury->image != "jury_avatar.jpg") {
                // delete image from le dossier images_users if it is different from the one in the seeder
                Storage::disk("public")->delete('images_users/' . $jury->image);
            }
            // dans database
            $jury->image = $newImage->hashName();
            $jury->save();
            //enregister the new image dans le dossier images_users
            $newImage->storePublicly('images_users/', 'public');

            if (!$existEmail && preg_match($pattern, $request->email)) {
                $jury->updated_at = Carbon::now();
                $jury->email = $request->email;
                $jury->name = $request->name;
                $jury->save();
            } else {
                $jury->name = $request->name;
                $jury->save();
            }
            return redirect()->back()->with('success', 'Informations Updated Successfully');
        } else {
            if (!$existEmail && preg_match($pattern, $request->email)) {
                $jury->updated_at = Carbon::now();
                $jury->email = $request->email;
                $jury->name = $request->name;
                $jury->save();
            } else {
                $jury->name = $request->name;
                $jury->save();
            }
            return redirect()->back()->with('success', 'Informations Updated Successfully');
        }
    }

    //* Gestion => aud_candidat
    //^ generer table de vote pour aud_candidats
    public function storeVoteAudCandi()
    {
        $candidats = AudCandidat::all();
        // insert all the id aud_candidats in the vote table
        foreach ($candidats as $candidat) {
            // check if candidat already has a line in the vote table
            $existCandidat = AudJuryVote::where('aud_candidat_id', $candidat->id)->first();
            if (!$existCandidat) {
                $data = [
                    "vote_jury1" => false,
                    "vote_jury2" => false,
                    "vote_jury3" => false,
                    "vote_jury4" => false,
                    "vote_jury5" => false,
                    "jury_points" => 0,
                    "aud_candidat_id" => $candidat->id,
                ];
                AudJuryVote::create($data);
            }
        }
        return redirect()->back()->with('success', 'Informations pour Audition votes insérées avec succès!');
    }
}
