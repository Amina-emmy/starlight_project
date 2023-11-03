<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudCandidatController extends Controller
{
    public function indexAud()
    {
        //all candidat table
        return view("backend.gestion.pages.audition");
    }
}
