<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Sale;
use App\Models\Payment;
use App\Models\CodPayment;
use App\Models\Paypalpayment;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function downloadInvoice(Order $order)
    {
        $pdf = Pdf::loadView('user.summary-pdf', ['order' => $order]);
        return $pdf->download('invoice_' . $order->ref_no . '.pdf');
    }

    public function order()
    {
        $orders = Order::with(['orderDetails.service'])
            ->where('user_id', Auth::id())
            ->get();

        return view('user.orders', compact('orders'));
    }

    public function summary()
    {
        $order = Order::with(['orderDetails.service', 'sale.payment.cod', 'sale.payment.paypal'])
            ->where('user_id', Auth::id())
            ->latest()
            ->first();

        return view('user.summary', compact('order'));
    }
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'pick_up_address' => 'required|string',
            'deliveryAddress' => 'required|string',
            'serviceIdInput' => 'required|integer',
            'quantityInput' => 'required|integer',
            'payment_method' => 'required|string',
        ]);

        $ref_no = $this->generateUniqueRefNo();

        $order = Order::create([
            'user_id' => Auth::id(),
            'ref_no' => $ref_no,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        OrderDetail::create([
            'order_id' => $order->id,
            'service_id' => $request->serviceIdInput,
            'name' => $request->name,
            'email' => $request->email,
            'pick_up_address' => $request->pick_up_address,
            'delivery_address' => $request->deliveryAddress,
            'quantity' => $request->quantityInput,
        ]);


        if ($request->payment_method === 'cash_on_delivery') {
            $sale = Sale::create([
                'order_id' => $order->id,
                'amount_due' => $this->calculateAmountDue($request),
                'status' => 'pending',
            ]);

            $payment = Payment::create([
                'sale_id' => $sale->id,
                'type' => 'cash_on_delivery',
            ]);

            CodPayment::create([
                'payment_id' => $payment->id,
                'receiver_name' => $request->name,
                'email' => $request->email,
            ]);
        }

        return redirect()->route('summary.page');
    }

    private function generateUniqueRefNo()
    {
        do {
            $date = now()->format('Ymd');
            $random = strtoupper(Str::random(5));
            $ref_no = 'ORD' . $date . '-' . $random;
        } while (Order::where('ref_no', $ref_no)->exists());

        return $ref_no;
    }

    private function calculateAmountDue(Request $request)
    {
        $service = Service::findOrFail($request->serviceIdInput);

        $amountDue = $service->price_per_kg * $request->quantityInput;

        return $amountDue;
    }
}
