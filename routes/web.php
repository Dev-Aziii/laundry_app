<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;

//
// ==========================
// Public Routes
// ==========================
//
Route::get('/', [HomeController::class, 'index'])->name('user');
Route::get('/services', [HomeController::class, 'servicesPage'])->name('services.page');
Route::get('/booking', [HomeController::class, 'bookingPage'])->name('booking.page');

//
// ==========================
// Authentication Routes
// ==========================
//
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');
Route::get('/registration', [AuthController::class, 'showRegistrationForm'])->name('registration');
Route::post('/registration', [AuthController::class, 'handleRegistration'])->name('registration.post');
Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout')->middleware('auth');
Route::put('/profile/update-details', [AuthController::class, 'updateUser'])->name('user.update-details');
Route::put('/profile/update-password', [AuthController::class, 'updatePassword'])->name('user.update-password');

//
// ==========================
// User Profile
// ==========================
//
Route::get('/profile-user', [HomeController::class, 'userProfile'])->name('profile.show')->middleware('auth');

//
// ==========================
// Orders
// ==========================
//
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('placeOrder');
Route::get('/orders', [OrderController::class, 'order'])->name('Userorders.page');
Route::get('/summary', [OrderController::class, 'summary'])->name('summary.page');
Route::get('/invoice/download/{order}', [OrderController::class, 'downloadInvoice'])->name('invoice.download');
Route::put('/admin/orders/{order}/update-details', action: [OrderController::class, 'updateOrderDetails'])->name('orders.updateDetails');
Route::get('/admin/orders/filter', [OrderController::class, 'filter'])->name('orders.filter');

//
// ==========================
// Admin - Dashboard
// ==========================
//
Route::get('/admin', [HomeController::class, 'adminDashboard'])->name('admin')->middleware('auth');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.page');

//
// ==========================
// Admin - Services
// ==========================
//
Route::get('/admin/adminservices', [AdminController::class, 'adminServices'])->name('adminservices.page');
Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
Route::get('/admin/services/filter', [ServiceController::class, 'filter'])->name('services.filter');
Route::patch('/services/{id}/restore', [ServiceController::class, 'restore'])->name('services.restore');
Route::get('/services/archive/{id}', [ServiceController::class, 'archiveService'])->name('services.archive');
Route::patch('services/{id}', [ServiceController::class, 'update'])->name('services.update');

//
// ==========================
// Admin - Management Pages
// ==========================
//
Route::get('/admin/products', [AdminController::class, 'products'])->name('products.page');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('orders.page');
Route::get('/admin/pos', [AdminController::class, 'pos'])->name('pos.page');
Route::get('/admin/sales', [AdminController::class, 'sales'])->name('sales.page');
Route::get('/admin/tracking', [AdminController::class, 'tracking'])->name('tracking.page');
Route::get('/admin/customer', [AdminController::class, 'customer'])->name('customer.page');
Route::get('/admin/reports', [AdminController::class, 'reports'])->name('reports.page');
Route::get('/admin/tasks', [AdminController::class, 'tasks'])->name('tasks.page');
Route::get('/admin/shifts', [AdminController::class, 'shifts'])->name('shift.page');

//
// ==========================
// Admin - View Specific Order
// ==========================
//
Route::get('/admin/orders/{order}', [AdminController::class, 'viewOrder'])->name('orders.view');
