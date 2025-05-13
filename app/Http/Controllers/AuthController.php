<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use App\Models\Service;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    // Show the login form or redirect if already authenticated
    public function showLoginForm()
    {
        if (Auth::check()) {
            return Auth::user()->usertype == '1'
                ? redirect()->route('admin')
                : redirect()->route('user');
        }

        return view('auth.login');
    }

    // Show the registration form or redirect if already authenticated
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('user');
        }

        return view('auth.registration');
    }

    // Handle user login request
    public function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $redirectUrl = $request->input('redirect_url');

            if ($redirectUrl) {
                return redirect()->to($redirectUrl);
            }

            return Auth::user()->usertype == '1'
                ? redirect()->route('admin')
                : redirect()->route('user');
        }

        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }

    // Handle user registration request
    public function handleRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits:10',
            'address' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $request->only('name', 'email', 'phone', 'address');
        $data['password'] = Hash::make($request->password);
        $data['usertype'] = '0'; // Default user type

        $user = User::create($data);

        if (!$user) {
            return redirect()->route('registration')->with('error', 'Registration failed.');
        }

        return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
    }

    // Log out the current user and invalidate session
    public function logoutUser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user');
    }

    // Update authenticated user's profile information
    public function updateUser(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|digits:10',
            'address' => 'required|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('user')->with('success', 'Changes saved successfully.');
    }

    // Update authenticated user's password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:6'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user')->with('success', 'Password updated successfully.');
    }
}
