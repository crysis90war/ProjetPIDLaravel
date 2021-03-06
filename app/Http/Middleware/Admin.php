<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::user())
        {
            if (auth()->user()->is_admin == 1) {
                return $next($request);
            }
            if(auth()->user()->is_admin == 0)
            {
                return redirect('/home');
            }
        }

        return redirect('/home');
    }
}
