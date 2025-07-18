<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$role)
    {


        if(Auth::check() && Auth::user()->role == $role)
        {
            return $next($request);
        }

        if(Auth::user()->role == 'SuperAdmin'){
            return $next($request);
        }elseif(Auth::user()->role == 'Admin'){
            return $next($request);
        }elseif(Auth::user()->role == 'petugas'){
            return $next($request);
        }



    }
}
