<div class="d-flex justify-content-end pt-5">
    <div class="card shadow-lg p-4 rounded-4 border-0 mt-5" style="width: 82%;">
        <div class="container-fluid">
            <div class="row">
                <!-- Services Section -->
                <div class="col-md-8">
                    <div class="p-4 rounded-4 border-0 mt-2">
                        <h2 class="mb-4">Point of Sale</h2>
                        <br>
                        <div class="text-center">
                            <h3 class="text-lg font-medium mb-4">Select Service</h3>
                            
                            <div class="row">
                                @foreach(['Dry Cleaning', 'Iron Only', 'Wash Only', 'Wash & Dry'] as $service)
                                    <div class="col-md-6 mb-3">
                                        <button class="btn btn-primary w-100 py-3">
                                            {{ $service }}
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Basket Section -->
                <div class="col-md-4">
                    <div class="card shadow-lg mt-5 h-80">
                        <div class="card-header bg-primary text-white">
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
                                    <strong>₱0.00</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Discount:</span>
                                    <input type="text" class="form-control form-control-sm w-50 text-end" value="₱0.00">
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Delivery:</span>
                                    <input type="text" class="form-control form-control-sm w-50 text-end" value="₱0.00">
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold fs-5">
                                    <span>Grand Total:</span>
                                    <strong>₱0.00</strong>
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

<style>
    .card {
        border-radius: 10px;
    }
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    .btn-primary:hover {
        background-color: #3a5ec0;
        border-color: #3a5ec0;
    }
    .form-control {
        border-radius: 5px;
    }
    .payment-methods .btn {
        min-width: 80px;
    }
</style>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">