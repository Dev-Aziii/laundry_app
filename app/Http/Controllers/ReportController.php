<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sales = Sale::with(['order.orderDetails', 'payment'])
            ->whereHas('payment', fn($q) => $q->where('status', 'Paid'))
            ->latest()
            ->get();

        $totalRevenue = $sales->sum('amount_due');

        return view('admin.reports', compact('sales', 'totalRevenue'));
    }
}
