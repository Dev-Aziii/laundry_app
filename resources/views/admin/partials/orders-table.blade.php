<div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="d-none">Order Id</th>
                <th scope="col">Reference No.</th>
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
                        <td class="d-none">#{{ $order->id }}</td>
                        <td>{{ $order->ref_no }}</td>
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
                                            : ($order->status === 'Out for Delivery'
                                                ? 'primary'
                                                : 'secondary'))) }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="#" class="btn btn-primary btn-sm order-btn load-page"
                                    data-route="{{ route('orders.view', $order->id) }}" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('invoice.download', $order->id) }}" target="_blank"
                                    class="btn btn-danger btn-sm order-btn" title="Print">
                                    <i class="fas fa-print"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
