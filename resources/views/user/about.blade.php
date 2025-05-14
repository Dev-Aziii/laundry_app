@extends('layout')

@section('title', 'About Us | WashingMashing')

@section('content')
    <x-header />

    <x-navbar />

    <main>

        <section class="banner-section d-flex justify-content-center align-items-end">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-7 col-12">
                        <h1 class="text-white mb-lg-0">About Us</h1>
                    </div>

                    <div class="col-lg-4 col-12 d-flex justify-content-lg-end align-items-center ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </section>


        <section class="section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <img src="images\pngwing.com.png" class="featured-image img-fluid">
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="featured-block">
                            <h2 class="mb-4">Laundry Service Agency Since 2025</h2>

                            <p>A Laundry Monitoring and Services System using Laravel Framework.</p>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <style>
            .team-image {
                width: 150px;
                height: 150px;
                object-fit: cover;
                border-radius: 50%;
                margin-bottom: 10px;
            }
        </style>

        <section class="team-section section-padding section-bg">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12">
                        <h2 class="mb-5">Meet People</h2>
                    </div>

                    {{-- Adzyl --}}
                    <div class="col-lg-4 col-md-6 col-12 mb-5 d-flex justify-content-center">
                        <div>
                            <img src="{{ asset('images/asi.jpg') }}" alt="Adzyl" class="team-image mx-auto d-block">
                            <p class="mb-1 fw-bold">Adzyl</p>
                            <p>Back-end Developer</p>
                            <div class="border-top mt-3 pt-3">
                                <p class="d-flex justify-content-center mb-0">
                                    <i class="bi-whatsapp me-2"></i>
                                    <a href="tel:096383636271">0963 836 36271</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Justin --}}
                    <div class="col-lg-4 col-md-6 col-12 mb-5 d-flex justify-content-center">
                        <div>
                            <img src="{{ asset('images/justin.jpg') }}" alt="Justin" class="team-image mx-auto d-block">
                            <p class="mb-1 fw-bold">Justin</p>
                            <p>Front-end Developer</p>
                            <div class="border-top mt-3 pt-3">
                                <p class="d-flex justify-content-center mb-0">
                                    <i class="bi-whatsapp me-2"></i>
                                    <a href="tel:1102209800">110-220-9800</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Fhiona --}}
                    <div class="col-lg-4 col-md-6 col-12 mb-5 d-flex justify-content-center">
                        <div>
                            <img src="{{ asset('images/pyona.jpg') }}" alt="Fhiona" class="team-image mx-auto d-block">
                            <p class="mb-1 fw-bold">Fhiona</p>
                            <p>Documentation/QA</p>
                            <div class="border-top mt-3 pt-3">
                                <p class="d-flex justify-content-center mb-0">
                                    <i class="bi-whatsapp me-2"></i>
                                    <a href="tel:1102209800">110-220-9800</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <x-footer />
@endsection
