<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EmployeeController;
//
// ==========================
// Public Routes
// ==========================
Route::group([], function () {
    Route::get('/', [HomeController::class, 'index'])->name('user');
    Route::get('/services', [HomeController::class, 'servicesPage'])->name('services.page');
    Route::get('/booking', [HomeController::class, 'bookingPage'])->name('booking.page');
});

//
// ==========================
// Authentication Routes
// ==========================
Route::group([], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');
    Route::get('/registration', [AuthController::class, 'showRegistrationForm'])->name('registration');
    Route::post('/registration', [AuthController::class, 'handleRegistration'])->name('registration.post');
    Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout')->middleware('auth');
    Route::put('/profile/update-details', [AuthController::class, 'updateUser'])->name('user.update-details');
    Route::put('/profile/update-password', [AuthController::class, 'updatePassword'])->name('user.update-password');
});

//
// ==========================
// User Profile Routes
// ==========================
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile-user', [HomeController::class, 'userProfile'])->name('profile.show');
});

//
// ==========================
// Orders Routes
// ==========================
Route::group([], function () {
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('placeOrder');
    Route::get('/orders', [OrderController::class, 'order'])->name('Userorders.page');
    Route::get('/summary', [OrderController::class, 'summary'])->name('summary.page');
    Route::get('/invoice/download/{order}', [OrderController::class, 'downloadInvoice'])->name('invoice.download');
    Route::put('/admin/orders/{order}/update-details', [OrderController::class, 'updateOrderDetails'])->name('orders.updateDetails');
    Route::get('/admin/orders/filter', [OrderController::class, 'filter'])->name('orders.filter');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
});

//
// ==========================
// Admin Routes
// ==========================
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [HomeController::class, 'adminDashboard'])->name('admin');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.page');

    // Admin - Services
    Route::get('/admin/adminservices', [AdminController::class, 'adminServices'])->name('adminservices.page');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/admin/services/filter', [ServiceController::class, 'filter'])->name('services.filter');
    Route::patch('/services/{id}/restore', [ServiceController::class, 'restore'])->name('services.restore');
    Route::get('/services/archive/{id}', [ServiceController::class, 'archiveService'])->name('services.archive');
    Route::patch('services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::patch('/services/{service}/status', [ServiceController::class, 'updateStatus'])->name('services.updateStatus');

    // Admin - Sales
    Route::get('/admin/sales/filter', [SaleController::class, 'filter'])->name('sales.filter');
    Route::get('/admin/reports/income', [ReportController::class, 'index'])->name('reports.income');

    // Admin - Management Pages
    Route::get('/admin/products', [AdminController::class, 'products'])->name('products.page');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('orders.page');
    Route::get('/admin/pos', [AdminController::class, 'pos'])->name('pos.page');
    Route::get('/admin/sales', [AdminController::class, 'sales'])->name('sales.page');
    Route::get('/admin/tracking', [AdminController::class, 'tracking'])->name('tracking.page');
    Route::get('/admin/customer', [AdminController::class, 'customer'])->name('customer.page');
    Route::get('/admin/reports', [AdminController::class, 'reports'])->name('reports.page');
    Route::get('/admin/tasks', [AdminController::class, 'employee'])->name('employee.page');
    Route::get('/admin/shifts', [AdminController::class, 'shifts'])->name('shift.page');

    Route::post('/admin/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::patch('/admin/employees/{employee}/archive', [EmployeeController::class, 'archive'])->name('employees.archive');
    Route::patch('/employees/{employee}/restore', [EmployeeController::class, 'restore'])->name('employees.restore');

    // Admin - View Specific Order
    Route::get('/admin/orders/{order}', [AdminController::class, 'viewOrder'])->name('orders.view');
});
