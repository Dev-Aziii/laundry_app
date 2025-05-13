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
    // handles order cancellation
    public function cancel(Order $order)
    {
        if (strtolower($order->status) !== 'pending') {
            return redirect()->back()->with('error', 'Only orders with Pending status can be cancelled.');
        }

        $order->status = 'Cancelled';
        $order->save();

        return redirect()->back()->with('success', 'Order cancelled successfully.');
    }


    public function filter(Request $request)
    {
        $orders = Order::with('orderDetails.service')
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->latest()
            ->get();

        return view('admin.partials.orders-table', compact('orders'))->render();
    }


    // This method validates and updates the order.
    public function updateOrderDetails(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:Pending,In Progress,Out for Delivery,Completed,Cancelled',
            'pickup_date' => 'nullable|date',
            'delivery_date' => 'nullable|date',
            'payment_status' => 'nullable|in:Paid,Unpaid',
        ]);

        // Update the order status and dates
        $order->update([
            'status' => $validated['status'],
            'pickup_date' => $validated['pickup_date'],
            'delivery_date' => $validated['delivery_date'],
        ]);

        // Check if payment status is provided and update the payment and CodPayment if necessary
        if (!empty($validated['payment_status']) && $order->sale && $order->sale->payment) {
            // Update payment status
            $order->sale->payment->update([
                'status' => $validated['payment_status'],
            ]);

            // If the payment status is 'Paid' and payment type is COD, update CodPayment's 'paid' field
            if ($validated['payment_status'] === 'Paid' && $order->sale->payment->type === 'cash_on_delivery') {
                $codPayment = $order->sale->payment->cod; // Get the associated CodPayment

                if ($codPayment) {
                    $codPayment->update([
                        'paid' => true,  // Mark as paid
                    ]);
                }
            }
        }

        return redirect()->back()
            ->with('success', 'redirect_to_orders')
            ->with('message', 'Order updated successfully.');
    }


    // This method loads all orders with related order details for the user.
    public function order(Request $request)
    {
        $query = Order::with(['orderDetails.service'])
            ->where('user_id', Auth::id());

        if ($request->has('status')) {
            $query->where('status', $request->status);
        } else {
            // By default, exclude cancelled orders
            $query->where('status', '!=', 'Cancelled');
        }

        $orders = $query->orderByDesc('created_at')->get();

        return view('user.orders', compact('orders'));
    }


    // This method fetches the most recent order and its related data for display.
    public function summary()
    {
        $order = Order::with(['orderDetails.service', 'sale.payment.cod', 'sale.payment.paypal'])
            ->where('user_id', Auth::id())
            ->latest()
            ->first();

        return view('user.summary', compact('order'));
    }

    // Handle the process of placing a new order.
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
                'amount_due' => $this->calculateAmountDue($request)
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

    // This method creates a unique reference number using the current date and a random string.
    private function generateUniqueRefNo()
    {
        do {
            $date = now()->format('Ymd');
            $random = strtoupper(Str::random(5));
            $ref_no = 'ORD' . $date . '-' . $random;
        } while (Order::where('ref_no', $ref_no)->exists());

        return $ref_no;
    }

    // This method finds the service by its ID and multiplies its price by the quantity ordered.
    private function calculateAmountDue(Request $request)
    {
        $service = Service::findOrFail($request->serviceIdInput);

        $amountDue = $service->price_per_kg * $request->quantityInput;

        return $amountDue;
    }
}
