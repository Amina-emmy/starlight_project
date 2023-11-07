<?php

namespace App\Http\Controllers;

use App\Models\AudCandidat;
use App\Models\AudJuryVote;
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
    //todo => ALL AFFICHAGE VIEWS
    public function affichageAud(Request $request)
    {
        $candidats = AudCandidat::orderBy('id', 'asc')->get();
        $votesParCandidat = [];
        $vote = false;

        $currentCandidatIndex = $request->input('candidatIndex', 0);

        if ($currentCandidatIndex < 0) {
            $currentCandidatIndex = 0;
        } elseif ($currentCandidatIndex >= count($candidats)) {
            $currentCandidatIndex = count($candidats) - 1;
        }

        $currentCandidat = $candidats->get($currentCandidatIndex);

        return view('backend.affichage.pages.audition', compact('currentCandidat', 'currentCandidatIndex', 'votesParCandidat', 'vote'));
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
        return redirect()->back()->with('success', 'Informations insérées avec succès!');
    }
}
