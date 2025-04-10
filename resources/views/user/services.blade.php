@extends('layout')

@section('title', 'Services | WashingMashing')

@section('content')
    <x-header />

    <x-navbar />

    <main>
        <section class="banner-section d-flex justify-content-center align-items-end">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-7 col-12 d-flex align-items-center">
                        <h1 class="text-white mb-0 me-3">Services Listing</h1>
                        @auth
                            <a class="nav-link custom-btn custom-border-btn custom-btn-bg-white btn"
                                href="{{ route('booking.page') }}">
                                Book Now
                            </a>
                        @else
                            <a class="nav-link custom-btn custom-border-btn custom-btn-bg-white btn"
                                href="{{ route('login') }}?redirect_url={{ route('booking.page') }}">
                                Book Now
                            </a>
                        @endauth
                    </div>

                    <div class="col-lg-4 col-12 d-flex justify-content-lg-end align-items-center ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('user') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services Listing</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

        </section>

        <x-services-section />

    </main>

    <x-footer />
@endsection
