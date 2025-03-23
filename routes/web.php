<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Home Routes
Route::get('/', [HomeController::class, 'user'])->name('user');
Route::get('/admin', [HomeController::class, 'admin'])->name('admin')->middleware('auth');

// Authentication Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/registration', [AuthController::class, 'registrationPost'])->name('registration.post');

//Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//Profile
Route::get('/profile-user', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
