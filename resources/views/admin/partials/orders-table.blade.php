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
                <td colspan="8" class="text-center text-muted">No orders found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Summary Modal -->
<div class="modal fade" id="summaryModal" tabindex="-1" aria-labelledby="summaryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="summaryModalLabel">Order Summary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item border-0"><strong>Reference No:</strong> <span id="summaryRefNo"></span>
                    </li>
                    <li class="list-group-item border-0"><strong>Order By:</strong> <span id="summaryOrderBy"></span>
                    </li>
                    <li class="list-group-item border-0"><strong>Order Date:</strong> <span
                            id="summaryOrderDate"></span></li>
                    <li class="list-group-item border-0"><strong>Pickup Date:</strong> <span
                            id="summaryPickupDate"></span></li>
                    <li class="list-group-item border-0"><strong>Delivery Date:</strong> <span
                            id="summaryDeliveryDate"></span></li>
                    <li class="list-group-item border-0"><strong>Amount:</strong> <span id="summaryAmount"></span></li>
                    <li class="list-group-item border-0"><strong>Status:</strong> <span id="summaryStatus"></span></li>
                    <li class="list-group-item border-0"><strong>Payment Status:</strong> <span
                            id="summaryPaymentStatus"></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Print Confirmation Modal -->
<div class="modal fade" id="printConfirmModal" tabindex="-1" aria-labelledby="printConfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Print</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to print this order?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmPrintBtn">Print</button>
            </div>
        </div>
    </div>
</div>



<script>
    let selectedPrintUrl = '';

    $(document).ready(function() {
        $('.btn-summary').on('click', function(e) {
            e.preventDefault();
            const refNo = $(this).data('refno');
            const orderBy = $(this).data('orderby');
            const orderDate = $(this).data('orderdate');
            const pickupDate = $(this).data('pickup');
            const deliveryDate = $(this).data('delivery');
            const amount = $(this).data('amount');
            const status = $(this).data('status');
            const paymentStatus = $(this).data('paymentstatus');

            $('#summaryRefNo').text(refNo);
            $('#summaryOrderBy').text(orderBy);
            $('#summaryOrderDate').text(orderDate);
            $('#summaryPickupDate').text(pickupDate);
            $('#summaryDeliveryDate').text(deliveryDate);
            $('#summaryAmount').text(amount);
            $('#summaryStatus').text(status);
            $('#summaryPaymentStatus').text(paymentStatus);

            $('#summaryModal').modal('show');
        });

        $('.btn-print').on('click', function(e) {
            e.preventDefault();
            selectedPrintUrl = $(this).data('printurl');
            $('#printConfirmModal').modal('show');
        });

        $('#confirmPrintBtn').on('click', function() {
            $('#printConfirmModal').modal('hide');
            if (selectedPrintUrl) {
                window.open(selectedPrintUrl, '_blank');
            }
        });
    });
</script>
