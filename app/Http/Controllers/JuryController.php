<?php

namespace App\Http\Controllers;

use App\Models\AudCandidat;
use App\Models\AudJuryVote;
use App\Models\User;
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

        $currentCandidat = $candidats->get($currentCandidatIndex);

        return view('frontend.pages.juryHome', compact('currentCandidat', 'currentCandidatIndex', 'votesParCandidat', 'vote'));
    }

    //* VOTE => fonction de vote pour Audcandidat
    public function voterAud(User $jury, AudCandidat $candidat)
    {
        // admin doit lancer table de votes pour que table de votes soit remplie par les aud_candidat_id
        $existCandidat = AudJuryVote::where('aud_candidat_id', $candidat->id)->first();
        // jury voted => its column changes from 0 to 1
        if ($existCandidat) {
            switch ($jury->id) {
                case '2':
                    if ($existCandidat->vote_jury1 == false) {
                        $existCandidat->vote_jury1 = true;
                        $existCandidat->jury_points += 20;
                        $existCandidat->save();
                    }
                    break;
                case '3':
                    if ($existCandidat->vote_jury2 == false) {
                        $existCandidat->vote_jury2 = true;
                        $existCandidat->jury_points += 20;
                        $existCandidat->save();
                    }
                    break;
                case '4':
                    if ($existCandidat->vote_jury3 == false) {
                        $existCandidat->vote_jury3 = true;
                        $existCandidat->jury_points += 20;
                        $existCandidat->save();
                    }
                    break;
                case '5':
                    if ($existCandidat->vote_jury4 == false) {
                        $existCandidat->vote_jury4 = true;
                        $existCandidat->jury_points += 20;
                        $existCandidat->save();
                    }
                    break;
                case '6':
                    if ($existCandidat->vote_jury5 == false) {
                        $existCandidat->vote_jury5 = true;
                        $existCandidat->jury_points += 20;
                        $existCandidat->save();
                    }
                    break;
            }
            return back()->with("success", "Success! Your vote counts.");
        } else {
            return back()->with("error", "Admin doit lancer table de votes");
        }
    }
}
