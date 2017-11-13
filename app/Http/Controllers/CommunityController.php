<?php
/**
 * Created by PhpStorm.
 * User: jgecy
 * Date: 2017-09-21
 * Time: 00:36
 */

namespace App\Http\Controllers;


use App\Community;
use App\Http\Middleware\CommunityChecker;
use App\Invite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommunityController extends Controller
{

    public function index(Request $request)
    {
        $communities = $request->session()->get('communities', []);
        if (count($communities) == 0) {
            return redirect('/');
        }
        return redirect('/community/' . $communities[0]);
    }

    public function community(Request $request, Community $community)
    {
        $communities = Community::whereIn('id', $request->session()->get('communities'))->get();
        return view('home')->with('community', $community)
            ->with('communities', $communities)
            ->with('user', User::find($request->session()->get('user')))
            ->with('stats', [
                ['key' => 'Created at', 'value' => explode(' ', $community->created_at)[0]],
                ['key' => 'Post count', 'value' => $community->posts()->count()],
            ])
            ->with('filter', $request->get('filter', ''));
    }


    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate(['name' => 'required|max:100']);
            $name = $request->get('name', null);
            if ($name == null) {
                return redirect('/', 400);
            }
            $community = new Community();
            $community->name = $name;
            $community->save();
            CommunityChecker::createUser($request);
            $request->session()->push('communities', $community->id);
            return redirect('/community/' . $community->id);
        }
        return redirect('/');
    }

    public function joinCommunity(Request $request)
    {
        $code = $request->route("invite");
        if (!isset($code)) {
            $code = $request->get("invite");
        }
        $invite = Invite::where('code', $code)
            ->where('expires_at', '>=', date('Y-m-d H:i:s'))
            ->first();
        if ($invite == null) {
            return Redirect::back()->withErrors(['Invalid code']);
        }
        CommunityChecker::createUser($request);
        if (!in_array($invite->community_id, $request->session()->get('communities', []))) {
            $request->session()->push('communities', $invite->community_id);
        }
        return redirect("/community/" . $invite->community_id);
    }

    public function invite(Request $request, Community $community)
    {
        if ($request->ajax() && $request->expectsJson()) {
            if ($request->session()->has('user')) {
                $request->validate(['expire' => 'required']);
                $expire = $request->get('expire');
                $expire = min($expire, 31536000); // max 1 year
                $expires_at = date('Y-m-d H:i:s', time() + $expire);
                $code = MainController::genCode(10);
                $invite = new Invite();
                $invite->code = $code;
                $invite->community_id = $community->id;
                $invite->expires_at = $expires_at;
                $invite->save();
                if ($request->has('url')) {
                    return url('/join/' . $code);
                }
                return $code;
            }
        } else {
            return redirect("/");
        }
    }

    public function leave(Request $request, Community $community)
    {
        $communities = $request->session()->get('communities');
        $key = array_search($community->id, $communities);
        if ($key >= 0) {
            unset($communities[$key]);
        }
        $request->session()->put('communities', $communities);
        if (count($communities) == 0) {
            return redirect('/');
        }
        return redirect('/community/' . $communities[0]);
    }

}