<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index(){
        return view('home');
    }

    public function testJoin(Request $request) {
        $community = $request->get("community");
        $request->session()->push("communities", $community);
        return redirect("/community");
    }

}
