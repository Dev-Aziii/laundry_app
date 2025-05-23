<div class="d-flex justify-content-start">
    <div class="content-area w-100 ms-auto px-4">
        <br>
        <div class="container-fluid">
            <div class="row">
                <!-- Services Section -->
                <div class="col-md-8">
                    <div class="card shadow-lg border-0 mt-4">
                        <div class="card-header">
                            <h5 class="mb-0">Select Service</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Basket Section -->
                <div class="col-md-4">
                    <div class="card shadow-lg mt-4 h-100">
                        <div class="card-header text-white rounded-top">
                            <h5 class="mb-0">Order Basket</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Customer Info</label>
                                <input type="text" class="form-control mb-2" placeholder="Name or phone number">
                                <input type="text" class="form-control" placeholder="Address">
                            </div>

                            <div class="d-grid mb-3">
                                <button class="btn btn-outline-primary">Add Customer</button>
                            </div>

                            <hr>

                            <div class="order-items mb-3">
                                <!-- Order items would appear here -->
                                <div class="text-center text-muted py-3">
                                    No items selected
                                </div>
                            </div>

                            <div class="totals-section">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal:</span>
                                    <strong>$0.00</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Discount:</span>
                                    <input type="text" class="form-control form-control-sm w-50 text-end"
                                        value="$0.00">
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Delivery:</span>
                                    <input type="text" class="form-control form-control-sm w-50 text-end"
                                        value="$0.00">
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold fs-5">
                                    <span>Grand Total:</span>
                                    <strong>$0.00</strong>
                                </div>
                            </div>

                            <!-- Payment Method Section -->
                            <div class="payment-methods mt-4">
                                <h5 class="mb-3">Payment Method</h5>
                                <div class="d-flex flex-wrap gap-2 mb-4">
                                    <button class="btn btn-outline-secondary flex-grow-1">CASH</button>
                                    <button class="btn btn-outline-secondary flex-grow-1">Stripe</button>
                                    <button class="btn btn-outline-secondary flex-grow-1">Razorpay</button>
                                    <button class="btn btn-outline-secondary flex-grow-1">Paystack</button>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-2">
                                <button class="btn btn-success py-3 fs-5">
                                    <i class="fas fa-check-circle me-2"></i> Confirm Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
