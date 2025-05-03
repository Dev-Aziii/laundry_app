@extends('layout')
@section('title', 'Order Summary | WashingMashing')

@section('content')

    <div class="container my-5">
        <div class="mb-3">
            <a href="{{ route('user') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-arrow-left"></i> Back to home
            </a>
        </div>
        <div class="card shadow-lg">
            <div class="card-header bg-secondary text-white">
                <h3 class="mb-0">Order Invoice</h3>
                <small>Order Ref: {{ $order->ref_no }}</small>
            </div>
            <div class="card-body">
                @php
                    $detail = $order->orderDetails->first();
                    $payment = $order->sale->payment ?? null;
                    $paymentType = $payment->type ?? 'N/A';
                @endphp

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5>Billed To:</h5>
                        <p>
                            {{ $detail->name }}<br>
                            {{ $detail->email }}<br>
                            {{ $detail->pick_up_address }}
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h5>Delivered To:</h5>
                        <p>{{ $detail->delivery_address }}</p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5>Payment Method:</h5>
                        <p>
                            {{ strtoupper(str_replace('_', ' ', $paymentType)) }}<br>
                            {{ $payment->paypal->paypal_email ?? ($payment->cod->email ?? 'N/A') }}
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h5>Order Date:</h5>
                        <p>{{ $order->created_at->format('M d, Y') }}</p>
                    </div>
                </div>

                <h5>Order Summary</h5>
                <table class="table table-bordered">
                    <thead class="table-light">
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

                <div class="text-end mt-4">
                    <p><strong>Status:</strong>
                        <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : 'success' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-danger my-3">
                <i class="fas fa-file-pdf"></i> Download PDF
            </a>
        </div>

    </div>


@endsection
