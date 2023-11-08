<?php

namespace App\Http\Controllers;

use App\Models\AudCandidat;
use App\Models\AudJuryVote;
use App\Models\Episode;
use Illuminate\Http\Request;

class AudCandidatController extends Controller
{
    public function indexAud()
    {
        $aud_candidats=AudCandidat::all();
        $episodes=Episode::all();
        $vote_auds=AudJuryVote::all();
        $active=false;
        return view("backend.gestion.pages.audition_candidat",compact("aud_candidats","episodes","vote_auds","active"));
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
        $existBadge=AudCandidat::where("badge",$request->badge)->first();
        if ($existBadge) {
            return redirect()->back()->with("error","Candidat existait déjà");
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
            return redirect()->back()->with("success","Candidat a été ajouté avec succès");
        }
    }
    //* Destroy aud_candidat
    public function destroyAudCandi(AudCandidat $audCandidat)
    {
        $audCandidat->delete();
        return redirect()->back()->with("error","Candidat a été supprimé avec succès");
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
        return redirect()->back()->with("warning","Les informations du candidat ont été modifiées avec succès");
    }
}
