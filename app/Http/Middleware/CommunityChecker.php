<?php

namespace App\Http\Middleware;

use Closure;

class CommunityChecker
{

    public function handle($request, Closure $next)
    {
        $communities = $request->session()->get('communities', []);
        if(count($communities) == 0){
            return redirect("/");
        }

        return $next($request);
    }

}
