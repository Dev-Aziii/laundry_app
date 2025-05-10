<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Sale;
use App\Models\User;


class AdminController extends Controller
{
    // Display the admin dashboard

    public function dashboard()
    {
        // Total Sales: Amount due where payments are 'paid'
        $totalSales = Sale::whereHas('payment', function ($query) {
            $query->where('status', 'paid');
        })->sum('amount_due');

        // Total Users
        $totalUsers = User::count();

        // Total Orders
        $totalOrders = Order::count();

        // Pending Orders
        $pendingOrders = Order::where('status', 'pending')->count();

        // Orders in Progress
        $onProgressOrders = Order::where('status', 'In progress')->count();

        // Delivered Orders
        $deliveredOrders = Order::where('status', 'completed')->count();

        // Cancelled Orders
        $cancelledOrders = Order::where('status', 'cancelled')->count();

        // Total Services
        $totalServices = Service::count();

        return view('admin.dashboard', compact(
            'totalSales',
            'totalUsers',
            'totalServices',
            'totalOrders',
            'pendingOrders',
            'onProgressOrders',
            'deliveredOrders',
            'cancelledOrders'
        ));
    }


    // Display the services management page with all services
    public function adminServices()
    {
        $services = Service::all();
        return view('admin.adminservices', compact('services'));
    }

    // Display the products page
    public function products()
    {
        return view('admin.products');
    }

    // Display the orders page with all orders
    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    // Display a specific order with its details and payment info
    public function viewOrder(Order $order)
    {
        $order = Order::with(['orderDetails', 'sale.payment', 'sale.payment.cod', 'sale.payment.paypal'])
            ->findOrFail($order->id);

        return view('admin.order-view', compact('order'));
    }

    // Display the POS (Point of Sale) page
    public function pos()
    {
        return view('admin.pos');
    }

    // Display the sales page
    public function sales()
    {
        return view('admin.sales');
    }

    // Display the customer page
    public function customer()
    {
        $users = User::where('usertype', '!=', 1)->get();
        return view('admin.customer', compact('users'));
    }


    // Display the reports page
    public function reports()
    {
        return view('admin.reports');
    }

    // Display the employee management page (tasks)
    public function tasks()
    {
        return view('admin.employee-management');
    }

    // Display the shifts management page
    public function shifts()
    {
        return view('admin.shift');
    }
}
