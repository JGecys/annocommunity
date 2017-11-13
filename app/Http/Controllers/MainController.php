<?php

namespace App\Http\Controllers;

use App\Invite;
use App\Session;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index(Request $request)
    {
        $communities = $request->session()->get('communities', []);
        if (count($communities) > 0) {
            return redirect('/community/' . $communities[0]);
        }
        return view('landing');
    }

    public function save(Request $request)
    {
        if ($request->ajax() && $request->expectsJson()) {
            if ($request->session()->has('user')) {
                $request->validate(['expire' => 'required']);
                $expire = $request->get('expire');
                $expire = min($expire, 31536000); // max 1 year
                $expires_at = date('Y-m-d H:i:s', time() + $expire);
                $code = self::genCode(10);
                $session = new Session();
                $session->code = $code;
                $session->user_id = $request->session()->get('user');
                $session->expires = $expires_at;
                $session->session = json_encode($request->session()->all());
                $session->save();
                return $code;
            }
        } else {
            return redirect("/");
        }
    }

    public function restore(Request $request)
    {
        $request->validate(['code' => 'required']);
        $code = $request->get('code');
        $session = Session::where('code', $code)->first();
        if(isset($session)){
            $decoded = json_decode($session->session);
            $request->session()->put('user', $decoded->user);
            $request->session()->put('communities', $decoded->communities);
            return redirect("/");
        }
        return redirect("/")->withErrors(['Invalid code']);
    }

    public static function genCode($length)
    {
        $code = str_random($length);
        $existing = Invite::where('code', $code)->first();
        if (isset($existing)) {
            return self::genCode($length);
        }
        return $code;
    }

}
