<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'pick_up_address' => 'required|string',
            'deliveryAddress' => 'required|string',
            'serviceIdInput' => 'required|integer',
            'quantityInput' => 'required|integer',
        ]);

        // Create a new order
        $order = Order::create([
            'user_id' => Auth::id(),
            'ref_no' => strtoupper(Str::random(10)),
            'status' => 'pending',
        ]);

        // Create the order details
        OrderDetail::create([
            'order_id' => $order->id, // FK to the Order
            'service_id' => $request->input('serviceIdInput'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'pick_up_address' => $request->input('pick_up_address'),
            'delivery_address' => $request->input('deliveryAddress'),
            'quantity' => $request->input('quantityInput'),
        ]);

        // Redirect to the user page
        return redirect()->route('user');
    }
}
