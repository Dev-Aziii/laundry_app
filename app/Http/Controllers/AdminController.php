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
    public function dashboard(Request $request)
    {
        $selectedYear = $request->input('year', now()->year);

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
        $totalEmployee = Employee::count();

        $salesData = DB::table('payments')
            ->join('sales', 'payments.sale_id', '=', 'sales.id')
            ->where('payments.status', 'paid')
            ->whereYear('payments.updated_at', $selectedYear)
            ->selectRaw('MONTH(payments.updated_at) as month, SUM(sales.amount_due) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create()->month($month)->format('M');
        });

        $salesPerMonth = $months->map(function ($_, $index) use ($salesData) {
            $monthNumber = $index + 1;
            $monthlySale = $salesData->firstWhere('month', $monthNumber);
            return $monthlySale ? $monthlySale->total : 0;
        });

        // For the dropdown
        $availableYears = DB::table('payments')
            ->selectRaw('YEAR(updated_at) as year')
            ->where('status', 'paid')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        return view('admin.dashboard', compact(
            'totalSales',
            'totalUsers',
            'totalEmployee',
            'totalServices',
            'totalOrders',
            'pendingOrders',
            'onProgressOrders',
            'deliveredOrders',
            'cancelledOrders',
            'months',
            'salesPerMonth',
            'availableYears',
            'selectedYear'
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
