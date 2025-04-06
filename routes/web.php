<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


// Pages
Route::get('/', [HomeController::class, 'user'])->name('user');
Route::get('/admin', [HomeController::class, 'admin'])->name('admin')->middleware('auth');
Route::get('/profile-user', [HomeController::class, 'show'])->name('profile.show')->middleware('auth');
Route::get('/services', [HomeController::class, 'services'])->name('services.page');
Route::get('/booking', [HomeController::class, 'booking'])->name(name: 'booking.page');

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');
Route::get('/registration', [AuthController::class, 'showRegistrationForm'])->name('registration');
Route::post('/registration', [AuthController::class, 'handleRegistration'])->name('registration.post');
Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout')->middleware('auth');
Route::put('/profile/update-details', [AuthController::class, 'updateUser'])->name('user.update-details');
Route::put('/profile/update-password', [AuthController::class, 'updatePassword'])->name('user.update-password');
