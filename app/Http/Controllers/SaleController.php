<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller

{
    public function filter(Request $request)
    {
        $query = Sale::with('payment');

        if ($request->filled('status')) {
            $query->whereHas('payment', fn($q) => $q->where('status', $request->status));
        }

        if ($request->filled('type')) {
            $query->whereHas('payment', fn($q) => $q->where('type', $request->type));
        }

        $sales = $query->latest()->get();

        return view('admin.partials.sales-table', compact('sales'));
    }
}
