<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


// Pages
Route::get('/', [HomeController::class, 'index'])->name('user');
Route::get('/admin', [HomeController::class, 'adminDashboard'])->name('admin')->middleware('auth');
Route::get('/profile-user', [HomeController::class, 'userProfile'])->name('profile.show')->middleware('auth');
Route::get('/services', [HomeController::class, 'servicesPage'])->name('services.page');
Route::get('/booking', [HomeController::class, 'bookingPage'])->name(name: 'booking.page');
Route::get('/orders', [HomeController::class, 'ordersPage'])->name(name: 'orders.page');

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');
Route::get('/registration', [AuthController::class, 'showRegistrationForm'])->name('registration');
Route::post('/registration', [AuthController::class, 'handleRegistration'])->name('registration.post');
Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout')->middleware('auth');
Route::put('/profile/update-details', [AuthController::class, 'updateUser'])->name('user.update-details');
Route::put('/profile/update-password', [AuthController::class, 'updatePassword'])->name('user.update-password');
