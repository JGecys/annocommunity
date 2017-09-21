<?php
/**
 * Created by PhpStorm.
 * User: jgecy
 * Date: 2017-09-21
 * Time: 00:36
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class CommunityController extends Controller
{

    public function index (Request $request) {
        $communities = $request->session()->get('communities', []);
        return redirect('/community/'.$communities[0]);
    }

    public function community($community){
        return view('home')->with('id', $community);
    }

    public function post($community, $post){
        return view('post')
            ->with('id', $community)
            ->with('post', $post);
    }

}