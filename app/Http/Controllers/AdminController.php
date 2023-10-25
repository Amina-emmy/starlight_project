<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("backend.affichage.pages.dashboardAdmin");
    }

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
        // request()->validate([
        //     "image" => "image|mimes:png,jpg,jpeg,gif|max:2048",
        //     "name" => "string|max:255",
        //     "email" => "email|max:255"
        // ]);
        

        dd("paaassss");



        return back()->with('success','Informations Updated Successfully');
    }
}
