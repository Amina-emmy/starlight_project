<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudCandidatController extends Controller
{
    public function indexAud()
    {
        //candidat table aud
        //table de vote aud
        return view("backend.gestion.pages.audition");
    }
}
