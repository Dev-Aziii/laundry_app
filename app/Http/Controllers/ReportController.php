<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{

    public function downloadRevenueReport(Request $request)
    {
        $month = $request->month ?? now()->month;
        $year = $request->year ?? now()->year;

        $sales = Sale::with(['order.orderDetails', 'payment'])
            ->whereHas('payment', fn($q) => $q->where('status', 'Paid'))
            ->whereHas('order', function ($query) use ($month, $year) {
                $query->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year);
            })
            ->latest()
            ->get();

        $totalRevenue = $sales->sum('amount_due');

        $pdf = Pdf::loadView('admin.reports-pdf', [
            'sales' => $sales,
            'totalRevenue' => $totalRevenue,
            'month' => $month,
            'year' => $year,
        ]);

        return $pdf->stream('revenue_report_' . $month . '_' . $year . '.pdf');
    }
    public function getFilteredReports(Request $request)
    {
        $month = $request->month ?? now()->month;
        $year = $request->year ?? now()->year;

        // Filter sales based on month and year
        $sales = Sale::with(['order.orderDetails', 'payment'])
            ->whereHas('payment', fn($q) => $q->where('status', 'Paid'))
            ->whereHas(
                'order',
                fn($q) =>
                $q->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
            )
            ->latest()
            ->get();

        $totalRevenue = $sales->sum('amount_due');

        $html = view('admin.partials.reports_table', compact('sales', 'totalRevenue'))->render();

        return response()->json([
            'html' => $html,
            'totalRevenue' => number_format($totalRevenue, 2),
        ]);
    }


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
