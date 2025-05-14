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
                        <li><a class="dropdown-item" href="{{ route('Userorders.page', ['status' => 'Pending']) }}">Pending
                                Orders</a></li>
                        <li><a class="dropdown-item" href="{{ route('Userorders.page', ['status' => 'In Progress']) }}">In
                                Progress Orders</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('Userorders.page', ['status' => 'Out for Delivery']) }}">Out for Delivery</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="{{ route('Userorders.page', ['status' => 'Completed']) }}">Completed
                                Orders</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('Userorders.page', ['status' => 'Cancelled']) }}">Cancelled
                                Orders</a></li>
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
                                        class="badge bg-{{ $order->status === 'Completed'
                                            ? 'success'
                                            : ($order->status === 'Pending'
                                                ? 'warning'
                                                : ($order->status === 'In Progress'
                                                    ? 'info'
                                                    : ($order->status === 'Out for Delivery'
                                                        ? 'primary'
                                                        : ($order->status === 'Cancelled'
                                                            ? 'danger'
                                                            : 'secondary')))) }} fs-6 px-3 py-2">
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
                                <small class="text-muted">
                                    Order made on: {{ $order->created_at->format('F d, Y') }} by <a href="">You</a>
                                </small>


                                <!-- ACTIONS -->
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-sm btn-outline-danger me-1 order-btn"
                                        data-bs-toggle="modal" data-bs-target="#cancelModal"
                                        data-order-id="{{ $order->id }}" data-order-status="{{ $order->status }}"
                                        title="Cancel">
                                        <i class="fa fa-times"></i>
                                    </button>

                                    <a href="{{ route('invoice.download', $order->id) }}"
                                        class="btn btn-sm btn-outline-primary order-btn" target="_blank" title="Print">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>
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
        <br><br>
    @endsection

    <!-- Cancel Confirmation Modal -->
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" id="cancelOrderForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelModalLabel">Cancel Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="cancelModalBody">
                        Are you sure you want to cancel this order?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger" id="confirmCancelBtn">Yes, Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const cancelModal = document.getElementById('cancelModal');
        cancelModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const orderId = button.getAttribute('data-order-id');
            const status = button.getAttribute('data-order-status');
            const modalBody = cancelModal.querySelector('#cancelModalBody');
            const cancelForm = cancelModal.querySelector('#cancelOrderForm');
            const confirmBtn = cancelModal.querySelector('#confirmCancelBtn');

            if (status.trim().toLowerCase() !== 'pending') {
                modalBody.innerHTML =
                    `<div class="alert alert-warning mb-0">This order cannot be cancelled because its status is <strong>${status}</strong>.</div>`;
                confirmBtn.disabled = true;
                cancelForm.setAttribute('action', '#'); // Disable form submission
            } else {
                modalBody.innerHTML = 'Are you sure you want to cancel this order?';
                confirmBtn.disabled = false;
                cancelForm.setAttribute('action',
                    `/orders/${orderId}/cancel`); // Set action to the correct cancel route
            }
        });
    </script>
