<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            background-color: #f9f9f9;
            padding: 20px;
            color: #333;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        h2,
        h4 {
            margin-bottom: 10px;
            color: #444;
        }

        p {
            margin: 5px 0;
        }

        .section {
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .payment-badge {
            display: inline-block;
            padding: 6px 12px;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            border-radius: 4px;
            font-size: 13px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="section">
            <h2>Order Invoice</h2>
            <p><strong>Order Ref:</strong> {{ $order->ref_no }}</p>
        </div>

        @php
            $detail = $order->orderDetails->first();
            $payment = $order->sale->payment ?? null;
            $paymentType = $payment->type ?? 'N/A';
        @endphp

        <div class="section">
            <h4>Billed To:</h4>
            <p>
                {{ $detail->name }}<br>
                {{ $detail->email }}<br>
                {{ $detail->pick_up_address }}
            </p>

            <h4>Delivered To:</h4>
            <p>{{ $detail->delivery_address }}</p>
        </div>

        <div class="section">
            <h4>Payment Method:</h4>
            <span class="payment-badge">{{ strtoupper(str_replace('_', ' ', $paymentType)) }}</span>
            <p>
                {{ $payment->paypal->paypal_email ?? ($payment->cod->email ?? 'N/A') }}
            </p>

            <h4>Order Date:</h4>
            <p>{{ $order->created_at->format('M d, Y') }}</p>
        </div>

        <div class="section">
            <h4>Order Summary</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price / Kg</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $detail->service->service_name }}</td>
                        <td class="text-center">{{ $detail->quantity }}</td>
                        <td class="text-center">₱{{ number_format($detail->service->price_per_kg, 2) }}</td>
                        <td class="text-end">₱{{ number_format($order->sale->amount_due, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total</strong></td>
                        <td class="text-end"><strong>₱{{ number_format($order->sale->amount_due, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
