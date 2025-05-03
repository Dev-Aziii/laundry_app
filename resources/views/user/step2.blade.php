<h4 class="mb-3"><i class="bi bi-truck me-2"></i> Delivery Details</h4>
<p>Provide your delivery details.</p>

<form id="deliveryForm" method="POST" action="{{ route('placeOrder') }}">
    @csrf
    <input type="hidden" id="serviceIdInput" name="serviceIdInput">
    <input type="hidden" id="quantityInput" name="quantityInput">
    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Pick-Up Address</label>
        <textarea class="form-control" id="pickupAddress" name="pick_up_address" rows="2" required></textarea>
    </div>

    <div class="mb-5">
        <label for="address" class="form-label">Delivery Address</label>
        <textarea class="form-control" id="deliveryAddress" name="deliveryAddress" rows="2" required></textarea>
    </div>
    <hr>

    <!-- Payment Section -->
    <div class="container">
        <h4 class="mb-3"><i class="bi bi-cash me-3"></i>Payment</h4>
        <p>Select your payment method.</p>
        <div class="row">
            <!-- Left -->
            <div class="col-lg-9">
                <div class="accordion" id="accordionPayment">
                    <!-- Cash On Delivery -->
                    <div class="accordion-item border mb-3">
                        <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                            <div class="form-check w-100 collapsed" data-bs-toggle="collapse"
                                data-bs-target="#collapseCOD" aria-expanded="false">
                                <input class="form-check-input" type="radio" name="payment_method" id="paymentCOD"
                                    value="cash_on_delivery" checked>
                                <label class="form-check-label pt-1" for="paymentCOD">
                                    Cash On Delivery
                                </label>
                            </div>
                            <span><i class="fa-solid fa-truck-fast"></i></span>
                        </h2>
                        <div id="collapseCOD" class="accordion-collapse collapse" data-bs-parent="#accordionPayment">
                            <div class="accordion-body">
                                <p>Pay when your order is delivered to your doorstep.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Credit card -->
                    <div class="accordion-item border mb-3">
                        <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                            <div class="form-check w-100 collapsed" data-bs-toggle="collapse"
                                data-bs-target="#collapseCC" aria-expanded="false">
                                <input class="form-check-input" type="radio" name="payment_method" id="payment1"
                                    value="credit_card">
                                <label class="form-check-label pt-1" for="payment1">
                                    Credit Card
                                </label>
                            </div>
                            <span><i class="fa-solid fa-credit-card"></i></span>
                        </h2>
                        <div id="collapseCC" class="accordion-collapse collapse" data-bs-parent="#accordionPayment">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label class="form-label">Card Number</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name on card</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Expiry date</label>
                                            <input type="text" class="form-control" placeholder="MM/YY">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">CVV Code</label>
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PayPal -->
                    <div class="accordion-item mb-3 border">
                        <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                            <div class="form-check w-100 collapsed" data-bs-toggle="collapse"
                                data-bs-target="#collapsePP" aria-expanded="false">
                                <input class="form-check-input" type="radio" name="payment_method" id="payment2"
                                    value="paypal">
                                <label class="form-check-label pt-1" for="payment2">
                                    PayPal
                                </label>
                            </div>
                            <span><i class="fa-brands fa-cc-paypal"></i></span>
                        </h2>
                        <div id="collapsePP" class="accordion-collapse collapse" data-bs-parent="#accordionPayment">
                            <div class="accordion-body">
                                <div class="px-2 col-lg-6 mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card position-sticky top-0">
                    <div class="p-3 bg-light bg-opacity-10">
                        <h6 class="card-title mb-3">Order Summary</h6>

                        <div class="d-flex justify-content-between mb-1 small">
                            <span>Subtotal</span>
                            <span>₱<span id="summarySubtotal">0.00</span></span>
                        </div>

                        <div class="d-flex justify-content-between mb-1 small">
                            <span>Pick-Up & Delivery Fee</span>
                            <span class="text-success">+₱<span id="summaryPickupFee">70.00</span></span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-4 small">
                            <span><strong>TOTAL</strong></span>
                            <strong class="text-dark">₱<span id="summaryGrandTotal">0.00</span></strong>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <button class="btn btn-secondary prev-step me-2" data-prev="step1">
            <i class="bi bi-arrow-left"></i> Back
        </button>
        <button class="btn btn-success next-step" type="submit">
            Place Order <i class="bi bi-check-lg"></i>
        </button>
    </div>

</form>

<!-- Confirm Modal -->
<div class="modal fade" id="confirmChangesModal" tabindex="-1" aria-labelledby="confirmChangesLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to confirm your oder?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmSubmitBtn" class="btn btn-primary">Yes, Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>
    const deliveryForm = document.getElementById('deliveryForm');
    const confirmSubmitBtn = document.getElementById('confirmSubmitBtn');
    let formShouldSubmit = false;

    deliveryForm.addEventListener('submit', function(event) {
        const paymentMethod = document.querySelector('input[name="payment_method"]:checked');

        if (!paymentMethod) {
            event.preventDefault();
            alert('Please select a payment method.');
            return;
        }

        if (!formShouldSubmit) {
            event.preventDefault(); // Stop actual submit
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmChangesModal'));
            confirmModal.show();
        }
    });

    confirmSubmitBtn.addEventListener('click', function() {
        formShouldSubmit = true;
        const confirmModalEl = document.getElementById('confirmChangesModal');
        const modalInstance = bootstrap.Modal.getInstance(confirmModalEl);
        modalInstance.hide();
        deliveryForm.submit();
    });
</script>
