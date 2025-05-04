@extends('layout')
@section('title', 'Orders | WashingMashing')

@section('content')
    <x-header />

    <div class="container mt-4">
        <div class="mb-3">
            <a href="{{ route('user') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-arrow-left"></i> Back to home
            </a>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>Order History</strong>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="filterDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Filter History <i class="fa fa-filter"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown">
                        <li><a class="dropdown-item" href="#">Approved Orders</a></li>
                        <li><a class="dropdown-item" href="#">Pending Orders</a></li>
                    </ul>
                </div>
            </div>

            <div class="card-body">
                @forelse ($orders as $order)
                    @foreach ($order->orderDetails as $orderDetail)
                        <div class="row align-items-start mb-4">
                            <div class="col-auto text-center">
                                <i class="fa-solid fa-truck-ramp-box text-secondary"></i>
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1 fw-bold">{{ $orderDetail->service->service_name }}</h6>
                                        <span class="badge bg-info text-white">Ref: {{ $order->ref_no }}</span>
                                    </div>
                                    <span
                                        class="badge bg-{{ $order->status === 'Approved' ? 'success' : ($order->status === 'Pending' ? 'info' : 'danger') }} ">
                                        {{ $order->status }}
                                    </span>
                                </div>

                                <p class="mb-1 mt-2">
                                    Quantity: {{ $orderDetail->quantity }} kg<br>
                                    <strong>
                                        Cost:
                                        ₱{{ number_format($orderDetail->quantity * $orderDetail->service->price_per_kg, 2) }}
                                    </strong>
                                    @switch($order->payment_method)
                                        @case('cash_on_delivery')
                                            <span class="badge bg-secondary text-white ms-2">Cash on Delivery</span>
                                        @break

                                        @case('paypal')
                                            <span class="badge bg-secondary text-white ms-2">Gcash</span>
                                        @break

                                        @case('credit_card')
                                            <span class="badge bg-secondary text-white ms-2">Credit Card</span>
                                        @break

                                        @default
                                            <span class="badge bg-secondary text-white ms-2">{{ $order->payment_method }}</span>
                                    @endswitch

                                </p>

                                <div class="mb-2">
                                    <a class="btn btn-sm btn-outline-success me-1" href="#" title="View">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-danger me-1" href="#" title="Cancel">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    <a href="{{ route('invoice.download', $order->id) }}"
                                        class="btn btn-sm btn-outline-primary" href="#" title="Print">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>

                                <small class="text-muted">
                                    Order made on: {{ $order->created_at->format('m/d/Y') }} by <a href="">You</a>
                                </small>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    @empty
                        <p class="text-muted">No orders found.</p>
                    @endforelse
                </div>

                <div class="card-footer text-muted">
                    You can view, cancel, or print any order from here.
                </div>
            </div>
        </div>
    @endsection
