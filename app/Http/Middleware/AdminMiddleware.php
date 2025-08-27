<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // kalau bukan admin, lempar ke landing
        return redirect()->route('landing')->with('error', 'Anda tidak punya akses!');
    }
}
