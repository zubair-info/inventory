<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CheckStatus
{

    public function handle(Request $request, Closure $next)
    {

        if (Auth::check()) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                return redirect('/login')->with('inactive_status', 'You Are Not Active');
            }
            return $next($request);
        }
        // if (Auth::user()->status == 0) {
        //     // return redirect('/login');
        //     echo 'ok';
        // } else {
        //     return $next($request);
        // }
        // return Auth::user()->status;
    }

    // public function handle($request, Closure $next)
    // {
    //     if (Auth::check() && Auth::user()->status == 1) {
    //         return $next($request);
    //     }
    //     abort(403);
    // }
}
