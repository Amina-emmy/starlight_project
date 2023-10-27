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
    public function storeEp(Request $request)
    {
        request()->validate([
            "day"=>"required",
            "prime"=>"required",
            "category"=>"required",
        ]);

        $data=[
            "day"=>$request->day,
            "prime"=>$request->prime,
            "category"=>$request->category,
        ];

        Episode::create($data);
        return redirect()->back()->with("success","Episode has been added Successfully");
    }
    //* Update Episode
    public function updateEp(Request $request , Episode $episode)
    {
        $data=[
            "day"=>$request->day,
            "prime"=>$request->prime,
            "category"=>$request->category,
        ];

        $episode->update($data);
        return redirect()->back()->with("warning","Episode has been Updated Successfully");
    }
    //* Delete Episode
    public function destroyEp(Episode $episode)
    {
        $episode->delete();
        return redirect()->back()->with("error","Episode has been deleted Successfully");
    }


}
