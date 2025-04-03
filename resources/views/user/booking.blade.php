@extends('layout')
@section('title', 'WashingMashing | Booking')

@section('content')
    <x-header />

    <main>
        <div class="container pb-5 mb-sm-4 mt-5">
            <div class="ps-3 mb-2">
                <h3 class="fw-bold">Booking Process</h3>
            </div>
            <div class="card shadow-lg">
                <div class="card-body">
                    <ul class="nav nav-pills nav-justified mb-4" id="bookingTabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="step1-tab" data-bs-toggle="pill" href="#step1">
                                <i class="bi bi-cart-check me-2"></i> 1. Select Service
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="step2-tab" data-bs-toggle="pill" href="#step2">
                                <i class="bi bi-truck me-2"></i> 2. Delivery Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="step3-tab" data-bs-toggle="pill" href="#step3">
                                <i class="bi bi-check-circle me-2"></i> 3. Finish
                            </a>
                        </li>
                    </ul>

                    <div class="progress mb-4">
                        <div class="progress-bar" id="progressBar" role="progressbar" style="width: 33%;" aria-valuenow="33"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="step1">
                            <h4 class="mb-3"><i class="bi bi-cart-check me-2"></i> Select Service</h4>
                            <p>Choose the items you want to book.</p>

                            <form id="orderForm">
                                <div class="mb-3">
                                    <label for="serviceType" class="form-label">Select Service</label>
                                    <select class="form-select" id="serviceType" name="serviceType" required>
                                        <option value="" disabled selected>Choose a service</option>
                                        <option value="washing">Washing</option>
                                        <option value="dry_cleaning">Dry Cleaning</option>
                                        <option value="ironing">Ironing</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" min="1"
                                        required>
                                </div>
                            </form>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-primary next-step" data-next="step2">
                                    Next <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="step2">
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
                                    <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Delivery Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="paymentType" class="form-label">Payment Type</label>
                                    <select class="form-select" id="paymentType" name="paymentType" required>
                                        <option value="" disabled selected>Select payment method</option>
                                        <option value="cash">Cash on Delivery</option>
                                        <option value="card">Credit/Debit Card</option>
                                    </select>
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
                        </div>

                        <div class="tab-pane fade" id="step3">
                            <h4 class="mb-3"><i class="bi bi-check-circle me-2"></i> Finish</h4>
                            <p>Thank you! Your booking is complete.</p>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-secondary prev-step me-2" data-prev="step2">
                                    <i class="bi bi-arrow-left"></i> Back
                                </button>
                                <a href="{{ route('user') }}" class="btn btn-success">
                                    <i class="bi bi-house-door"></i> Go to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let progressBar = document.getElementById("progressBar");

            document.querySelectorAll(".next-step").forEach(button => {
                button.addEventListener("click", function() {
                    let nextTab = this.getAttribute("data-next");
                    document.getElementById(nextTab + "-tab").click();
                    updateProgress(nextTab);
                });
            });

            document.querySelectorAll(".prev-step").forEach(button => {
                button.addEventListener("click", function() {
                    let prevTab = this.getAttribute("data-prev");
                    document.getElementById(prevTab + "-tab").click();
                    updateProgress(prevTab);
                });
            });

            function updateProgress(step) {
                let progress = step === "step1" ? 33 : step === "step2" ? 66 : 100;
                progressBar.style.width = progress + "%";
                progressBar.setAttribute("aria-valuenow", progress);
            }
        });
    </script>
@endsection
