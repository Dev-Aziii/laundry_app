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
}
