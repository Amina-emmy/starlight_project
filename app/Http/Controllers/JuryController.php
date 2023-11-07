<?php

namespace App\Http\Controllers;

use App\Models\AudCandidat;
use App\Models\AudJuryVote;
use Illuminate\Http\Request;

class JuryController extends Controller
{
    //* VIEW => the home blade for jury 
    public function index(Request $request)
    {
        // pour gerer navigation entre les candidats d'Audition
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

        $currentCandidat = $candidats[$currentCandidatIndex];

        return view('frontend.pages.juryHome', compact('currentCandidat', 'currentCandidatIndex', 'votesParCandidat', 'vote'));
    }

    //* VOTE => fonction de vote pour Audcandidat
    public function voterAud(AudCandidat $candidat){
        $existCandidat=AudJuryVote::where('aud_candidat_id',$candidat->id)->first();
        

        return back();
    }
}
