<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedUser
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Redirect to the appropriate dashboard
            return Auth::user()->usertype == '1'
                ? redirect()->route('admin')
                : redirect()->route('user');
        }

        return $next($request);
    }
}
