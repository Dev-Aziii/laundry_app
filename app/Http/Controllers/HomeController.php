<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function user()
    {
        return view('user.home');
    }

    public function admin()
    {
        if (Auth::check() && Auth::user()->usertype == '1') {
            return view('admin.home');
        }

        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }

    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        $user = Auth::user();

        return view('profile.show', compact('user'));
    }

    public function services()
    {
        return view('user.services');
    }

    public function booking()
    {
        return view('user.booking');
    }
}
