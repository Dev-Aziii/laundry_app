<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

//order
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('placeOrder');

// User Pages
Route::get('/', [HomeController::class, 'index'])->name('user');
Route::get('/admin', [HomeController::class, 'adminDashboard'])->name('admin')->middleware('auth');
Route::get('/profile-user', [HomeController::class, 'userProfile'])->name('profile.show')->middleware('auth');
Route::get('/services', [HomeController::class, 'servicesPage'])->name('services.page');
Route::get('/booking', [HomeController::class, 'bookingPage'])->name(name: 'booking.page');
Route::get('/orders', [HomeController::class, 'ordersPage'])->name(name: 'Userorders.page');

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');
Route::get('/registration', [AuthController::class, 'showRegistrationForm'])->name('registration');
Route::post('/registration', [AuthController::class, 'handleRegistration'])->name('registration.post');
Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout')->middleware('auth');
Route::put('/profile/update-details', [AuthController::class, 'updateUser'])->name('user.update-details');
Route::put('/profile/update-password', [AuthController::class, 'updatePassword'])->name('user.update-password');

//admin page
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard.page');
Route::get('/admin/adminservices', function () {
    return view('admin.adminservices');
})->name('adminservices.page');
Route::get('/admin/products', function () {
    return view('admin.products');
})->name('products.page');
Route::get('/admin/orders', function () {
    return view('admin.orders');
})->name('orders.page');
Route::get('/admin/tracking', function () {
    return view('admin.tracking');
})->name('tracking.page');
Route::get('/admin/customer', function () {
    return view('admin.customer');
})->name('customer.page');

Route::get('/admin/reports', function () {
    return view('admin.reports');
})->name('reports.page');

Route::get('/admin/tasks', function () {
    return view('admin.tasks');
})->name('tasks.page');

Route::get('/admin/shifts', function () {
    return view('admin.shifts');
})->name('shift.page');
