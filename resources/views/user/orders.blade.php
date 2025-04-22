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
                <h5 class="mb-0"><i class="fas fa-table me-1"></i> Order Table</h5>
                <form class="d-flex" action="#" method="GET">
                    <input type="text" class="form-control form-control-sm" placeholder="Search Orders"
                        aria-label="Search">
                    <button class="btn btn-primary btn-sm order-btn ms-2" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Order Ref No.</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Service Type</th>
                            <th scope="col">Laundry KG</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Order Status</th>
                            <th scope="col" class="action-col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @foreach ($order->orderDetails as $orderDetail)
                                <tr>
                                    <td>{{ $order->ref_no }}</td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $orderDetail->service->service_name }}</td>
                                    <td>{{ $orderDetail->quantity }} kg</td>
                                    <td>₱{{ number_format($orderDetail->quantity * $orderDetail->service->price_per_kg, 2) }}
                                    </td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-primary btn-sm order-btn">
                                                <i class="fas fa-address-card"></i>
                                            </button>
                                            <button class="btn btn-primary btn-sm order-btn">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm order-btn">
                                                <i class="fas fa-print"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
