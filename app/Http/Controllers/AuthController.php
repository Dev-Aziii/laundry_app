<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return view('user.home');
        };

        return view('auth.login');
    }

    public function registration()
    {
        if (Auth::check()) {
            return view('user.home');
        };
        return view('auth.registration');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('user'));
        }
        return redirect(route('login'))->with('error', 'Invalid details.');
    }

    public function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6|confirmed', // Ensuring password confirmation
        ]);

        $data = $request->only('name', 'email', 'phone', 'address');
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if (!$user) {
            return redirect(route('registration'))->with('error', 'Registration failed.');
        }

        return redirect(route('login'))->with('success', 'Registration successful, you can now login');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('user'));
    }
}
