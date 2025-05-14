<div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
    <table class="table table-bordered mb-0 text-center">
        <thead class="table-light">
            <tr>
                {{-- <th scope="col">Sale ID</th> --}}
                <th scope="col">Order ID</th>
                <th class="d-none" scope="col">Amount Rendered</th>
                <th scope="col">Amount Due</th>
                <th scope="col">Change</th>
                <th scope="col">Payment Type</th>
                <th scope="col">Payment Status</th>
                <th scope="col"s>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sales as $sale)
                <tr>
                    {{-- <td>#{{ $sale->id }}</td> --}}
                    <td>{{ $sale->order_id }}</td>
                    <td class="d-none">₱{{ number_format($sale->amount_rendered ?? 0, 2) }}</td>
                    <td>₱{{ number_format($sale->amount_due, 2) }}</td>
                    <td>₱{{ number_format($sale->change_amount ?? 0, 2) }}</td>
                    <td>{{ ucfirst($sale->payment->type ?? 'N/A') }}</td>
                    <td>{{ ucfirst($sale->payment->status ?? 'Unknown') }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-primary btn-sm order-btn load-page"
                                data-route="{{ route('orders.view', $sale->order_id) }}" title="View">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No sales records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
