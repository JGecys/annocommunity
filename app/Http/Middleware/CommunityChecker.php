<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Http\Request;

class CommunityChecker
{

    public function handle(Request $request, Closure $next)
    {
        $communities = $request->session()->get('communities', []);
        $community = $request->route()->parameter('community');
        if(count($communities) == 0){
            return redirect("/");
        } else {
            self::createUser($request);
            if (!in_array($community->id, $communities)) {
                abort(404);
            }
        }
        return $next($request);
    }

    public static function genId($start, $end){
        $id = mt_rand($start, $end);
        if(User::find($id) != null){
            return self::genId($start, $end);
        }
        return $id;
    }

    /**
     * @param Request $request
     */
    public static function createUser(Request $request)
    {
        if (!$request->session()->has('user')) {
            $id = self::genId(1000000, 9999999);
            $user = new User();
            $user->id = $id;
            $user->name = "Anno-" . $id;
            $user->save();
            $request->session()->put('user', $id);
        }
    }

}
