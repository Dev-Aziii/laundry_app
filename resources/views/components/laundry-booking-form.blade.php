<section id="laundryBookingForm" class="collapse m-5">
    <div class="container">
        <div class="card border-1">
            <div class="card-body">
                <h5 class="mb-3">Booking Form</h5>
                <form action="" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="customerName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="customerName" name="name"
                                value="{{ $user ? $user->name : '' }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="customerPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="customerPhone" name="phone"
                                value="{{ $user ? $user->phone : '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="customerEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="customerEmail" name="email"
                                value="{{ $user ? $user->email : '' }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="laundryWeight" class="form-label">Laundry Weight (kg)</label>
                            <input type="number" class="form-control" id="laundryWeight" name="weight" min="1"
                                required oninput="calculateTotal()">
                        </div>
                        <div class="col-md-4">
                            <label for="serviceType" class="form-label">Service Type</label>
                            <select class="form-select" id="serviceType" name="service_type" required
                                onchange="calculateTotal()">
                                <option value="" data-price="0">Select Service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" data-price="{{ $service->price_per_kg }}">
                                        {{ $service->service_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="paymentType" class="form-label">Payment Method</label>
                            <select class="form-select" id="paymentType" name="payment_type" required>
                                <option value="cash">Cash on Delivery</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="gcash">GCash</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="totalPrice" class="form-label">Total Price (₱)</label>
                            <input type="text" class="form-control" id="totalPrice" readonly>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function calculateTotal() {
        let weight = parseFloat(document.getElementById("laundryWeight").value) || 0;
        let serviceType = document.getElementById("serviceType");
        let pricePerKg = parseFloat(serviceType.options[serviceType.selectedIndex].getAttribute("data-price")) || 0;

        let totalPrice = weight * pricePerKg;
        document.getElementById("totalPrice").value = totalPrice.toFixed(2);
    }
</script>
