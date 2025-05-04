<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <br>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"> <i class="fas fa-table me-1"></i> Order Table</h5>
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
                            <th scope="col">Order Id</th>
                            <th scope="col">Order By</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Pickup Date</th>
                            <th scope="col">Delivery Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Order Status</th>
                            <th scope="col" class="action-col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            @foreach ($order->orderDetails as $detail)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $detail->name ?? 'N/A' }}</td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $order->pickup_date ?? 'N/A' }}</td>
                                    <td>{{ $order->delivery_date ?? 'N/A' }}</td>
                                    <td>
                                        ₱{{ number_format($detail->quantity * ($detail->service->price_per_kg ?? 0), 2) }}
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $order->status === 'Completed'
                                                ? 'success'
                                                : ($order->status === 'Pending'
                                                    ? 'warning'
                                                    : ($order->status === 'In Progress'
                                                        ? 'info'
                                                        : 'secondary')) }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="btn btn-primary btn-sm order-btn" title="Address">
                                                <i class="fas fa-address-card"></i>
                                            </a>
                                            <a href="#" class="btn btn-primary btn-sm order-btn load-page"
                                                data-route="{{ route('orders.view', $order->id) }}" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm order-btn" title="Print">
                                                <i class="fas fa-print"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">No orders found.</td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
