<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <input type="hidden" id="serviceIdInput" name="serviceIdInput">
        <br>
        <div class="card shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h7 class="mb-0">Order of <strong>{{ $order->orderDetails->first()->name ?? 'N/A' }}</strong></h7>
                <div class="d-flex align-items-center gap-2">
                    <a href="#" class="btn btn-secondary btn-sm load-page" data-route="{{ route('orders.page') }}">
                        <i class="fas fa-arrow-left me-1"></i> Back
                    </a>
                    <a href="#" class="btn btn-danger btn-sm">
                        <i class="fas fa-print me-1"></i> Print
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-dark dropdown-toggle" type="button" id="statusDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Change Status
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                            <li><a class="dropdown-item" href="#">Pending</a></li>
                            <li><a class="dropdown-item" href="#">In Progress</a></li>
                            <li><a class="dropdown-item" href="#">Completed</a></li>
                            <li><a class="dropdown-item" href="#">Cancelled</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h6>Order Details</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Order Status</th>
                                    <td>
                                        <span
                                            class="badge bg-{{ $order->status === 'Completed' ? 'success' : ($order->status === 'Pending' ? 'warning' : ($order->status === 'In Progress' ? 'info' : 'secondary')) }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Assign Driver</th>
                                    <td>{{ $order->orderDetails->first()->driver_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Payment Status</th>
                                    <td>
                                        @if ($order->sale && $order->sale->payment)
                                            {{ $order->sale->payment->status === 'completed' ? 'Paid' : 'Unpaid' }}
                                        @else
                                            Unpaid
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Amount</th>
                                    <td>₱{{ number_format($order->sale->amount_due, 2) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Discount</th>
                                    <td>₱{{ number_format($order->sale->discount ?? 0, 2) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Quantity (kg)</th>
                                    <td>{{ $order->orderDetails->first()->quantity }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Picked Date</th>
                                    <td>{{ $order->pickup_date }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Delivery Date</th>
                                    <td>{{ $order->delivery_date }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h6>Customer Details</h6>
                    </div>
                    <div class="card-body">
                        <h5>Billed To:</h5>
                        <p>
                            {{ $order->orderDetails->first()->name }}<br>
                            {{ $order->orderDetails->first()->email }}<br>
                            {{ $order->orderDetails->first()->pick_up_address }}
                        </p>
                        <h5>Delivered To:</h5>
                        <p>{{ $order->orderDetails->first()->delivery_address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
