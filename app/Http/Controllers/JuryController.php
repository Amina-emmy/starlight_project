<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuryController extends Controller
{
    public function index(){
        return view('frontend.pages.juryHome');
    }
}
