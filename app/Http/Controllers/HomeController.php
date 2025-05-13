<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;
use App\Models\Service;

class HomeController extends Controller
{
    // Show the user home page
    public function index()
    {
        return view('user.home');
    }

    // Show the admin dashboard if user is authenticated and is an admin
    public function adminDashboard()
    {
        if (Auth::check() && Auth::user()->usertype == '1') {
            return view('admin.home');
        }

        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }

    // Show the profile page for the authenticated user
    public function userProfile()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    // Show the services page to users
    public function servicesPage()
    {
        return view('user.services');
    }

    // Show the booking page with all available services
    public function bookingPage()
    {
        $services = Service::all();
        return view('user.booking', compact('services'));
    }

    // Show the orders page for users
    public function ordersPage()
    {
        return view('user.orders');
    }
}
