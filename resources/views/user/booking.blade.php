@extends('layout')
@section('title', 'Booking | WashingMashing')

@section('content')
    <x-header />

    <main>
        <div class="container pb-5 mb-sm-4 mt-5">
            <div class="mb-3">
                <a href="{{ route('services.page') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-arrow-left"></i> Back to home
                </a>
            </div>
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
                                <i class="bi bi-truck me-2"></i> 2. Details & Payment
                            </a>
                        </li>
                    </ul>

                    <div class="progress mb-4">
                        <div class="progress-bar" id="progressBar" role="progressbar" style="width: 50%;" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="step1">
                            @include('user.step1', ['services' => $services])
                        </div>

                        <div class="tab-pane fade" id="step2">
                            @include('user.step2')
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
                let progress = step === "step1" ? 50 : 100;
                progressBar.style.width = progress + "%";
                progressBar.setAttribute("aria-valuenow", progress);
            }
        });

        // return view
        window.addEventListener('popstate', function(event) {
            window.location.href = "{{ route('services.page') }}";
        });

        history.pushState(null, null, window.location.href);
        window.onpopstate = function() {
            window.history.go(1);
        };
    </script>
@endsection
