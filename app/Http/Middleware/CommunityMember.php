<?php

namespace App\Http\Middleware;

use App\Community;
use Closure;
use Illuminate\Http\Request;

class CommunityMember
{

    public function handle(Request $request, Closure $next, Community $community)
    {
        $communities = $request->session()->get('communities', []);
        if (in_array($community->id, $communities)) {
            return $next($request);
        }
        return redirect('/');
    }

}
