<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->usertype == '1') {
            // Redirect admin to their dashboard
            return redirect()->route('admin');
        }

        return $next($request);
    }
}
