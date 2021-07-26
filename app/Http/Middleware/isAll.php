<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAll
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role_id == 3 ||  auth()->user()->role_id == 4 || auth()->user()->role_id == 7 ) {
//
            return $next($request);
        }

        return redirect('/home')->with('error','You are not Allowed to Access this page ');

    }
}
