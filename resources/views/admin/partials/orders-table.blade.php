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
                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-primary btn-sm btn-summary order-btn" title="Summary"
                                    data-refno="{{ $order->ref_no }}" data-orderby="{{ $detail->name ?? 'N/A' }}"
                                    data-orderdate="{{ $order->created_at->format('Y-m-d') }}"
                                    data-pickup="{{ $order->pickup_date ?? 'N/A' }}"
                                    data-delivery="{{ $order->delivery_date ?? 'N/A' }}"
                                    data-amount="₱{{ number_format($detail->quantity * ($detail->service->price_per_kg ?? 0), 2) }}"
                                    data-status="{{ $order->status }}"
                                    data-paymentstatus="{{ $order->payment_status ?? 'Unpaid' }}">
                                    <i class="fas fa-address-card"></i>
                                </a>

                                <a href="#" class="btn btn-primary btn-sm order-btn load-page"
                                    data-route="{{ route('orders.view', $order->id) }}" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm order-btn btn-print" title="Print"
                                    data-orderid="{{ $order->id }}"
                                    data-printurl="{{ route('invoice.download', $order->id) }}">
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

<!-- Order Summary Modal -->
<div class="modal fade" id="orderSummaryModal" tabindex="-1" aria-labelledby="orderSummaryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderSummaryLabel">Order Summary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Reference No:</strong> <span id="modalRefNo"></span></p>
                <p><strong>Order By:</strong> <span id="modalOrderBy"></span></p>
                <p><strong>Order Date:</strong> <span id="modalOrderDate"></span></p>
                <p><strong>Pickup Date:</strong> <span id="modalPickup"></span></p>
                <p><strong>Delivery Date:</strong> <span id="modalDelivery"></span></p>
                <p><strong>Amount:</strong> <span id="modalAmount"></span></p>
                <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                <p><strong>Payment Status:</strong> <span id="modalPaymentStatus"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const summaryButtons = document.querySelectorAll('.btn-summary');

        summaryButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                document.getElementById('modalRefNo').textContent = this.dataset.refno;
                document.getElementById('modalOrderBy').textContent = this.dataset.orderby;
                document.getElementById('modalOrderDate').textContent = this.dataset.orderdate;
                document.getElementById('modalPickup').textContent = this.dataset.pickup;
                document.getElementById('modalDelivery').textContent = this.dataset.delivery;
                document.getElementById('modalAmount').textContent = this.dataset.amount;
                document.getElementById('modalStatus').textContent = this.dataset.status;
                document.getElementById('modalPaymentStatus').textContent = this.dataset
                    .paymentstatus;

                const orderModal = new bootstrap.Modal(document.getElementById(
                    'orderSummaryModal'));
                orderModal.show();
            });
        });
    });
</script>
