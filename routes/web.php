<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Pages
Route::get('/', [HomeController::class, 'user'])->name('user');
Route::get('/admin', [HomeController::class, 'admin'])->name('admin')->middleware('auth');
Route::get('/profile-user', [HomeController::class, 'show'])->name('profile.show')->middleware('auth');
Route::get('/services', [HomeController::class, 'services'])->name('services.page');
Route::get('/booking', [HomeController::class, 'booking'])->name(name: 'booking.page');

// Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/registration', [AuthController::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
