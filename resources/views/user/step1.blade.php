    <h4 class="mb-3"><i class="bi bi-cart-check me-2"></i> Select Service</h4>
    <p>Choose the items you want to book.</p>

    <form id="orderForm">
        <div class="accordion mb-4 shadow-sm rounded booking-accordion" id="bookingAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingBooking">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseBooking" aria-expanded="false" aria-controls="collapseBooking">
                        <h5>Services</h5>
                    </button>
                </h2>
                <div id="collapseBooking" class="accordion-collapse collapse" aria-labelledby="headingBooking">
                    <div class="accordion-body">
                        @foreach ($services as $service)
                            <div
                                class="d-flex justify-content-between align-items-center border-bottom px-4 py-4 booking-service-card">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="serviceType"
                                        id="service{{ $service->id }}" value="{{ $service->id }}"
                                        data-price="{{ $service->price_per_kg }}" required>
                                </div>

                                <label for="service{{ $service->id }}"
                                    class="d-flex flex-grow-1 justify-content-between align-items-center text-start w-100">
                                    <div class="me-3 flex-grow-1">
                                        <div class="fw-bold fs-5 mb-2">{{ $service->service_name }}
                                        </div>
                                        <div class="text-muted mb-1">
                                            <strong>₱{{ number_format($service->price_per_kg, 2) }}/kg</strong>
                                            <i class="bi bi-clock ms-2"></i>
                                            {{ $service->duration }}d
                                        </div>
                                        <div class="small text-muted">{{ $service->description }}
                                        </div>
                                    </div>

                                    @if ($service->image1)
                                        <img src="{{ $service->image1 }}" alt="{{ $service->service_name }}"
                                            class="img-thumbnail"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                    @endif
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center mb-3 mt-4">
            <div>
                <label for="quantity" class="form-label me-2">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1"
                    required style="width: 100px;">
            </div>
            <div class="ms-3">
                <label class="form-label fw-bold text-primary mb-0">Total Price</label>
                <div id="totalDisplay" class="text-primary mt-1">₱0.00</div>
            </div>
        </div>
    </form>

    <div class="d-flex justify-content-end  mt-4">
        <button type="button" class="btn btn-primary next-step" data-next="#step2">
            Next <i class="bi bi-arrow-right"></i>
        </button>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const serviceRadios = document.querySelectorAll('input[name="serviceType"]');
            const quantityInput = document.getElementById('quantity');
            const totalDisplay = document.getElementById('totalDisplay');
            const nextButton = document.querySelector('.next-step');

            let selectedPrice = 0;
            let selectedServiceId = null;

            function updateTotal() {
                const quantity = parseInt(quantityInput.value) || 0;
                const total = selectedPrice * quantity;
                totalDisplay.textContent = '₱' + total.toFixed(2);
            }

            serviceRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    selectedServiceId = this.value;
                    selectedPrice = parseFloat(this.dataset.price);
                    updateTotal();
                });
            });

            // quantity changes
            quantityInput.addEventListener('input', updateTotal);

            // next
            nextButton.addEventListener('click', function() {
                const selected = document.querySelector('input[name="serviceType"]:checked');
                const quantity = parseInt(quantityInput.value) || 0;

                if (!selected) {
                    alert('Please select a service before continuing.');
                    return;
                }

                // Calculate prices
                const subtotal = selectedPrice * quantity;
                const pickupFee = 70;
                const grandTotal = subtotal + pickupFee;

                // Update order summary in Step 2
                document.getElementById('summarySubtotal').textContent = subtotal.toFixed(2);
                document.getElementById('summaryPickupFee').textContent = pickupFee.toFixed(2);
                document.getElementById('summaryGrandTotal').textContent = grandTotal.toFixed(2);

                const nextTabTrigger = document.querySelector(this.dataset.next + '-tab');
                const nextTab = new bootstrap.Tab(nextTabTrigger);
                nextTab.show();

                document.getElementById('progressBar').style.width = '66%';
            });
        });
    </script>
