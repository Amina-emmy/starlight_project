<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function indexEp()
    {
        $episodes = Episode::all();
        return view("backend.gestion.pages.episodes", compact("episodes"));
    }
    //* ajouter Episode
    //* Update Episode
    //* Delete Episode
    

}
