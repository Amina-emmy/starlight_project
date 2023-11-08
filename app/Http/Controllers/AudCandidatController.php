<?php

namespace App\Http\Controllers;

use App\Models\AudCandidat;
use App\Models\AudJuryVote;
use App\Models\Episode;
use App\Models\User;
use Illuminate\Http\Request;

class AudCandidatController extends Controller
{
    public function indexAud()
    {
        $aud_candidats = AudCandidat::all();
        $episodes = Episode::all();
        $vote_auds = AudJuryVote::all();
        $active = false;
        return view("backend.gestion.pages.audition_candidat", compact("aud_candidats", "episodes", "vote_auds", "active"));
    }

    //* Store aud_candidat
    public function StoreAudCandi(Request $request)
    {
        request()->validate([
            "badge" => "required",
            "nom" => "required",
            "prenom" => "required",
            "gender" => "required",
            "chanson" => "required",
            "ville_provenance" => "required",
            "date_naissance" => "required",
        ]);

        $image = '';
        if ($request->gender === 'Femme') {
            $image = 'femme_avatar.png'; // Nom du fichier pour l'avatar de la femme
        } else if ($request->gender === 'Homme') {
            $image = 'homme_avatar.png'; // Nom du fichier pour l'avatar de l'homme
        }
        // check if candidat already existed (par badge cause it's unique)
        $existBadge = AudCandidat::where("badge", $request->badge)->first();
        if ($existBadge) {
            return redirect()->back()->with("error", "Candidat existait déjà");
        } else {

            $data = [
                "badge" => $request->badge,
                "nom" => $request->nom,
                "prenom" => $request->prenom,
                "gender" => $request->gender,
                "chanson" => $request->chanson,
                "photo" => $image,
                "ville_provenance" => $request->ville_provenance,
                "date_naissance" => $request->date_naissance,
                "episode_id" => $request->episode_id,
            ];

            AudCandidat::create($data);
            return redirect()->back()->with("success", "Candidat a été ajouté avec succès");
        }
    }
    //* Destroy aud_candidat
    public function destroyAudCandi(AudCandidat $audCandidat)
    {
        $audCandidat->delete();
        return redirect()->back()->with("error", "Candidat a été supprimé avec succès");
    }
    //* Update aud_candidat
    public function updateAudCandi(AudCandidat $audCandidat, Request $request)
    {
        $image = '';
        if ($request->gender === 'Femme') {
            $image = 'femme_avatar.png'; // Nom du fichier pour l'avatar de la femme
        } else if ($request->gender === 'Homme') {
            $image = 'homme_avatar.png'; // Nom du fichier pour l'avatar de l'homme
        }

        $data = [
            "badge" => $request->badge,
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "gender" => $request->gender,
            "chanson" => $request->chanson,
            "photo" => $image,
            "ville_provenance" => $request->ville_provenance,
            "date_naissance" => $request->date_naissance,
            "episode_id" => $request->episode_id,
        ];

        $audCandidat->update($data);
        return redirect()->back()->with("warning", "Les informations du candidat ont été modifiées avec succès");
    }

    //^ show candidat by prime
    public function showCandidatsByEpisode($episode, Request $request)
    {
        $episodes = Episode::all();
        $jurys = User::role('jury')->get();
        $aud_votes = AudJuryVote::all();
        $allcandidats = AudCandidat::orderBy('id', 'asc')->get();
        $votesParCandidat = [];

        foreach ($allcandidats as $candidat) {
            $nbrVotes = AudJuryVote::where('aud_candidat_id', $candidat->id)
                ->select('vote_jury1', 'vote_jury2', 'vote_jury3', 'vote_jury4', 'vote_jury5')
                ->get();

            // Calcul du total des votes pour chaque candidat
            $totalVotes = $nbrVotes->sum(function ($vote) {
                return $vote->vote_jury1 + $vote->vote_jury2 + $vote->vote_jury3 + $vote->vote_jury4 + $vote->vote_jury5;
            });

            $votesParCandidat[$candidat->id] = $totalVotes;
        }

        $candidats = AudCandidat::where('episode_id', $episode)->get();

        $currentCandidatIndex = $request->input('candidatIndex', 0);

        if ($currentCandidatIndex < 0) {
            $currentCandidatIndex = 0;
            $currentCandidatIndex++;
        } elseif ($currentCandidatIndex >= count($candidats)) {
            $currentCandidatIndex = count($candidats) - 1;
        }

        $currentCandidat = $candidats->get($currentCandidatIndex);

        return view('backend.affichage.pages.audition', compact('candidats','allcandidats', 'currentCandidatIndex', 'currentCandidat','votesParCandidat', 'episode','jurys','episodes','aud_votes'));
    }
}
