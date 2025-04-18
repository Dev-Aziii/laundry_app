<h4 class="mb-3"><i class="bi bi-truck me-2"></i> Delivery Details</h4>
<p>Provide your delivery details.</p>

<form id="deliveryForm">
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
        <textarea class="form-control" id="pickupAddress" name="address" rows="2" required></textarea>
    </div>

    <div class="mb-5">
        <label for="address" class="form-label">Delivery Address</label>
        <textarea class="form-control" id="deliveryAddress" name="address" rows="2" required></textarea>
    </div>
    <hr>

    <div class="container">
        <h4 class="mb-3"><i class="bi bi-cash me-3"></i></i>Payment</h4>
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
                                <input class="form-check-input" type="radio" name="payment" id="paymentCOD" checked>
                                <label class="form-check-label pt-1" for="paymentCOD">
                                    Cash On Delivery
                                </label>
                            </div>
                            <span><i class="fa-solid fa-truck-fast"></i><!-- Credit card icon here -->
                            </span>
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
                                <input class="form-check-input" type="radio" name="payment" id="payment1">
                                <label class="form-check-label pt-1" for="payment1">
                                    Credit Card
                                </label>
                            </div>
                            <span>
                                <i class="fa-solid fa-credit-card"></i>
                            </span>
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
                                <input class="form-check-input" type="radio" name="payment" id="payment2">
                                <label class="form-check-label pt-1" for="payment2">
                                    <svg width="103" height="25" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd">
                                            <path
                                                d="M8.962 5.857h7.018c3.768 0 5.187 1.907 4.967 4.71-.362 4.627-3.159 7.187-6.87 7.187h-1.872c-.51 0-.852.337-.99 1.25l-.795 5.308c-.052.344-.233.543-.505.57h-4.41c-.414 0-.561-.317-.452-1.003L7.74 6.862c.105-.68.478-1.005 1.221-1.005Z"
                                                fill="#009EE3"></path>
                                            <path
                                                d="M39.431 5.542c2.368 0 4.553 1.284 4.254 4.485-.363 3.805-2.4 5.91-5.616 5.919h-2.81c-.404 0-.6.33-.705 1.005l-.543 3.455c-.082.522-.35.779-.745.779h-2.614c-.416 0-.561-.267-.469-.863l2.158-13.846c.106-.68.362-.934.827-.934h6.263Zm-4.257 7.413h2.129c1.331-.051 2.215-.973 2.304-2.636.054-1.027-.64-1.763-1.743-1.757l-2.003.009-.687 4.384Zm15.618 7.17c.239-.217.482-.33.447-.062l-.085.642c-.043.335.089.512.4.512h2.323c.391 0 .581-.157.677-.762l1.432-8.982c.072-.451-.039-.672-.38-.672H53.05c-.23 0-.343.128-.402.48l-.095.552c-.049.288-.18.34-.304.05-.433-1.026-1.538-1.486-3.08-1.45-3.581.074-5.996 2.793-6.255 6.279-.2 2.696 1.732 4.813 4.279 4.813 1.848 0 2.674-.543 3.605-1.395l-.007-.005Zm-1.946-1.382c-1.542 0-2.616-1.23-2.393-2.738.223-1.507 1.665-2.737 3.206-2.737 1.542 0 2.616 1.23 2.394 2.737-.223 1.508-1.664 2.738-3.207 2.738Zm11.685-7.971h-2.355c-.486 0-.683.362-.53.808l2.925 8.561-2.868 4.075c-.241.34-.054.65.284.65h2.647a.81.81 0 0 0 .786-.386l8.993-12.898c.277-.397.147-.814-.308-.814H67.6c-.43 0-.602.17-.848.527l-3.75 5.435-1.676-5.447c-.098-.33-.342-.511-.793-.511h-.002Z"
                                                fill="#113984"></path>
                                            <path
                                                d="M79.768 5.542c2.368 0 4.553 1.284 4.254 4.485-.363 3.805-2.4 5.91-5.616 5.919h-2.808c-.404 0-.6.33-.705 1.005l-.543 3.455c-.082.522-.35.779-.745.779h-2.614c-.417 0-.562-.267-.47-.863l2.162-13.85c.107-.68.362-.934.828-.934h6.257v.004Zm-4.257 7.413h2.128c1.332-.051 2.216-.973 2.305-2.636.054-1.027-.64-1.763-1.743-1.757l-2.004.009-.686 4.384Zm15.618 7.17c.239-.217.482-.33.447-.062l-.085.642c-.044.335.089.512.4.512h2.323c.391 0 .581-.157.677-.762l1.431-8.982c.073-.451-.038-.672-.38-.672h-2.55c-.23 0-.343.128-.403.48l-.094.552c-.049.288-.181.34-.304.05-.433-1.026-1.538-1.486-3.08-1.45-3.582.074-5.997 2.793-6.256 6.279-.199 2.696 1.732 4.813 4.28 4.813 1.847 0 2.673-.543 3.604-1.395l-.01-.005Zm-1.944-1.382c-1.542 0-2.616-1.23-2.393-2.738.222-1.507 1.665-2.737 3.206-2.737 1.542 0 2.616 1.23 2.393 2.737-.223 1.508-1.665 2.738-3.206 2.738Zm10.712 2.489h-2.681a.317.317 0 0 1-.328-.362l2.355-14.92a.462.462 0 0 1 .445-.363h2.682a.317.317 0 0 1 .327.362l-2.355 14.92a.462.462 0 0 1-.445.367v-.004Z"
                                                fill="#009EE3"></path>
                                            <path
                                                d="M4.572 0h7.026c1.978 0 4.326.063 5.895 1.45 1.049.925 1.6 2.398 1.473 3.985-.432 5.364-3.64 8.37-7.944 8.37H7.558c-.59 0-.98.39-1.147 1.449l-.967 6.159c-.064.399-.236.634-.544.663H.565c-.48 0-.65-.362-.525-1.163L3.156 1.17C3.28.377 3.717 0 4.572 0Z"
                                                fill="#113984"></path>
                                            <path
                                                d="m6.513 14.629 1.226-7.767c.107-.68.48-1.007 1.223-1.007h7.018c1.161 0 2.102.181 2.837.516-.705 4.776-3.793 7.428-7.837 7.428H7.522c-.464.002-.805.234-1.01.83Z"
                                                fill="#172C70"></path>
                                        </g>
                                    </svg>
                                    </span>
                                </label>
                            </div>
                            <span>
                                <i class="fa-brands fa-cc-paypal"></i>
                            </span>
                            <span>

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

            <!-- Right -->
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

</form>

<div class="d-flex justify-content-end mt-4">
    <button class="btn btn-secondary prev-step me-2" data-prev="step1">
        <i class="bi bi-arrow-left"></i> Back
    </button>
    <button class="btn btn-primary next-step" data-next="step3">
        Next <i class="bi bi-arrow-right"></i>
    </button>
</div>
