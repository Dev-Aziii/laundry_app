<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Sale;
use App\Models\User;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    // Display the admin dashboard


    public function dashboard()
    {
        // Existing metrics...
        $totalSales = Sale::whereHas('payment', function ($query) {
            $query->where('status', 'paid');
        })->sum('amount_due');

        $totalUsers = User::count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $onProgressOrders = Order::where('status', 'In progress')->count();
        $deliveredOrders = Order::where('status', 'completed')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();
        $totalServices = Service::count();

        // 📊 Daily sales for last 7 days
        $salesData = Sale::whereHas('payment', function ($query) {
            $query->where('status', 'paid');
        })
            ->whereDate('created_at', '>=', now()->subDays(6)) // last 7 days
            ->selectRaw('DATE(created_at) as date, SUM(amount_due) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Format for chart.js
        $salesDates = $salesData->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('M d');
        });

        $salesAmounts = $salesData->pluck('total');

        return view('admin.dashboard', compact(
            'totalSales',
            'totalUsers',
            'totalServices',
            'totalOrders',
            'pendingOrders',
            'onProgressOrders',
            'deliveredOrders',
            'cancelledOrders',
            'salesDates',
            'salesAmounts'
        ));
    }



    // Display the services management page with all services
    public function adminServices()
    {
        // Retrieve only active and non-soft-deleted services (i.e., not archived)
        $services = Service::where('status', 'active')
            ->whereNull('deleted_at')
            ->get();

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
    public function sales(Request $request)
    {
        $sales = Sale::whereHas('payment', function ($query) {
            $query->where('status', 'paid');
        })->with('payment')->get();

        return view('admin.sales', compact('sales'));
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
        $sales = Sale::with(['order.orderDetails', 'payment'])
            ->whereHas('payment', fn($q) => $q->where('status', 'Paid'))
            ->latest()
            ->get();

        $totalRevenue = $sales->sum('amount_due');

        return view('admin.reports', compact('sales', 'totalRevenue'));
    }

    // Display the employee management page (tasks)
    public function employee()
    {
        $employees = Employee::latest()->get();
        return view('admin.employee-management', compact('employees'));
    }

    // Display the shifts management page
    public function shifts()
    {
        return view('admin.shift');
    }
}
