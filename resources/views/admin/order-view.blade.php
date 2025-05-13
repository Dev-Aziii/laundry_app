<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <input type="hidden" id="serviceIdInput" name="serviceIdInput">
        <br>
        <style>
            table th {
                width: 35%;
                white-space: nowrap;
            }

            table td {
                width: 65%;
            }

            table th,
            table td {
                vertical-align: middle;
                text-align: start;
                height: 50px;
            }

            .btn-update {
                background-color: #4f83d1;
                color: white;
                border: none;
                padding: 8px 20px;
                border-radius: 4px;
                cursor: pointer;
                width: auto;
            }

            .btn-update:hover {
                background-color: #548ec0;
            }

            .btn-status {
                background-color: #4f83d1;
                color: white;
                border: none;
                padding: 6px 12px;
                border-radius: 4px;
                cursor: pointer;
            }

            .btn-status:hover {
                background-color: #548ec0;
            }
        </style>

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
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <form id="orderUpdateForm" action="{{ route('orders.updateDetails', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row pt-4">
                <input type="hidden" name="payment_status" id="paymentStatusInput"
                    value="{{ $order->sale->payment->status ?? 'Unpaid' }}">

                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h6>Order Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="fw-normal">Order Status</th>
                                            <td class="fw-normal">
                                                <select class="form-select" name="status" required>
                                                    @foreach (['Pending', 'In Progress', 'Out for Delivery', 'Completed', 'Cancelled'] as $statusOption)
                                                        <option value="{{ $statusOption }}"
                                                            {{ $order->status === $statusOption ? 'selected' : '' }}>
                                                            {{ $statusOption }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="fw-normal">Assign Driver</th>
                                            <td class="fw-normal">
                                                {{ $order->orderDetails->first()->driver_name ?? 'N/A' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="fw-normal">Payment Status</th>
                                            <td class="fw-normal">
                                                @if ($order->sale && $order->sale->payment)
                                                    {{ $order->sale->payment->status === 'Paid' ? 'Paid' : 'Unpaid' }}
                                                    @if ($order->sale->payment->status === 'Unpaid')
                                                        <button
                                                            class="btn {{ ($order->sale->payment->status ?? '') === 'Paid' ? 'btn-success' : 'btn-secondary' }} btn-sm ms-2"
                                                            id="paidBtn" type="button" onclick="togglePaid(this)">
                                                            {{ ($order->sale->payment->status ?? '') === 'Paid' ? 'Marked as Paid' : 'Mark as Paid' }}
                                                        </button>
                                                    @endif
                                                @else
                                                    Unpaid
                                                    <button class="btn btn-secondary btn-sm ms-2" id="paidBtn"
                                                        type="button">Mark as Paid</button>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="fw-normal">Total Amount</th>
                                            <td class="fw-normal">₱{{ number_format($order->sale->amount_due, 2) }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="fw-normal">Discount</th>
                                            <td class="fw-normal">₱{{ number_format($order->sale->discount ?? 0, 2) }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="fw-normal">Total Quantity (kg)</th>
                                            <td class="fw-normal">{{ $order->orderDetails->first()->quantity }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="fw-normal">Picked Date</th>
                                            <td class="fw-normal">
                                                <input type="date" class="form-control" name="pickup_date"
                                                    value="{{ $order->pickup_date }}">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="fw-normal">Delivery Date</th>
                                            <td class="fw-normal">
                                                <input type="date" class="form-control" name="delivery_date"
                                                    value="{{ $order->delivery_date }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-12 text-end">
                            <button type="button" class="btn-update" data-bs-toggle="modal"
                                data-bs-target="#confirmUpdateModal">
                                Update
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Confirmation Modal -->
                <div class="modal fade" id="confirmUpdateModal" tabindex="-1" aria-labelledby="confirmUpdateModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content border-0 shadow">
                            <div class="modal-header text-dark">
                                <h5 class="modal-title" id="confirmUpdateModalLabel">Confirm Update</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to apply these changes?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" form="orderUpdateForm" class="btn btn-danger">Yes,
                                    Update</button>
                            </div>
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
        </form>
    </div>


</div>


<script>
    $('#pickedDate, #deliveryDate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    function togglePaid(button) {
        const statusInput = document.getElementById('paymentStatusInput');
        const currentValue = statusInput.value;

        if (currentValue === 'Unpaid') {
            // Toggle to Paid
            statusInput.value = 'Paid';
            button.classList.remove('btn-secondary');
            button.classList.add('btn-success');
            button.innerHTML = '<i class="fas fa-check-circle me-1"></i> Marked as Paid';
        } else {
            // Toggle back to Unpaid
            statusInput.value = 'Unpaid';
            button.classList.remove('btn-success');
            button.classList.add('btn-secondary');
            button.innerHTML = 'Mark as Paid';
        }
    }
</script>
