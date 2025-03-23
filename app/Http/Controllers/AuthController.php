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
            $usertype = Auth::user()->usertype;

            if ($usertype == '1') {
                return redirect()->route('admin');
            } else {
                return redirect()->route('user');
            }
        }
        return view('auth.login');
    }

    public function registration()
    {
        if (Auth::check()) {
            return redirect()->route('user');
        }
        return view('auth.registration');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $usertype = Auth::user()->usertype;

            if ($usertype == '1') {
                return redirect()->route('admin');
            } else {
                return redirect()->route('user');
            }
        }

        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }

    public function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10',
            'address' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $request->only('name', 'email', 'phone', 'address');
        $data['password'] = Hash::make($request->password);
        $data['usertype'] = '0';

        $user = User::create($data);

        if (!$user) {
            return redirect()->route('registration')->with('error', 'Registration failed.');
        }

        return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('user');
    }
}
