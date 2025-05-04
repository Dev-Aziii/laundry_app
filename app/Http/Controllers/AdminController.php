<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;

class AdminController extends Controller
{
    // Show the Admin Dashboard with services data
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Show the Admin Services page
    public function adminServices()
    {
        $services = Service::all();
        return view('admin.adminservices', compact('services'));
    }

    // Show the Products page
    public function products()
    {
        return view('admin.products');
    }

    // Show the Orders page
    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }
    public function viewOrder(Order $order)
    {
        // Load the related data, including the payment information
        $order = Order::with(['orderDetails', 'sale.payment', 'sale.payment.cod', 'sale.payment.paypal'])
            ->findOrFail($order->id);  // Ensure you're fetching the correct order with its related data

        // Pass the order data to the view
        return view('admin.order-view', compact('order'));
    }


    // Show the POS page
    public function pos()
    {
        return view('admin.pos');
    }

    // Show the Sales page
    public function sales()
    {
        return view('admin.sales');
    }

    // Show the Tracking page
    public function tracking()
    {
        return view('admin.tracking');
    }

    // Show the Customer page
    public function customer()
    {
        return view('admin.customer');
    }

    // Show the Reports page
    public function reports()
    {
        return view('admin.reports');
    }

    // Show the Tasks page
    public function tasks()
    {
        return view('admin.employee-management');
    }

    // Show the Shifts page
    public function shifts()
    {
        return view('admin.shift');
    }
}
