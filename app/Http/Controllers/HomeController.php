<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function adminDashboard()
    {
        if (Auth::check() && Auth::user()->usertype == '1') {
            return view('admin.home');
        }

        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }

    public function userProfile()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function servicesPage()
    {
        return view('user.services');
    }

    public function bookingPage()
    {
        $services = Service::all();
        return view('user.booking', compact('services'));
    }

    public function ordersPage()
    {
        return view('user.orders');
    }
}
