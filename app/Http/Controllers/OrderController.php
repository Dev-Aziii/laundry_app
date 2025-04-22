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
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'pick_up_address' => 'required|string',
            'deliveryAddress' => 'required|string',
            'serviceIdInput' => 'required|integer',
            'quantityInput' => 'required|integer',
        ]);

        $ref_no = $this->generateUniqueRefNo();

        $order = Order::create([
            'user_id' => Auth::id(),
            'ref_no' => $ref_no,
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

        return redirect()->route('user');
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
}
