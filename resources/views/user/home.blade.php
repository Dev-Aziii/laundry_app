@extends('layout')
@auth
    @section('title', 'WashingMashing | Home')
@else
@section('title', 'WashingMashing | Guest')
@endauth


@section('content')
<header class="site-header">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 d-flex flex-wrap">
                <p class="d-flex me-4 mb-0">
                    <i class="bi-house-fill me-2"></i>
                    One-Stop Cleaning Service
                </p>

                <p class="d-flex d-lg-block d-md-block d-none me-4 mb-0">
                    <i class="bi-clock-fill me-2"></i>
                    <strong class="me-2">24/7</strong>
                </p>

                <p class="site-header-icon-wrap text-white d-flex mb-0 ms-auto">
                    <i class="site-header-icon bi-whatsapp me-2"></i>

                    <a href="tel:8700 " class="text-white">
                        87000
                    </a>
                </p>
            </div>

        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/bubbles.png" class="logo img-fluid" alt="">

            <span class="ms-2">WashingMashing</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                @auth
                    <div class="dropdown ms-3">
                        <button class="btn btn-secondary dropdown-toggle d-flex align-items-center" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-2"></i>
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                            <li>
                                <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal"
                                    data-bs-target="#logoutModal" onclick="event.stopPropagation();">
                                    Logout
                                </button>
                            </li>
                        </ul>
                    </div>
                @else
                    <li class="nav-item ms-3">
                        <a type="button" class="nav-link custom-btn custom-border-btn custom-btn-bg-white btn"
                            href="{{ route('login') }}">
                            Login/Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>

    </div>
</nav>

<main>

    <x-hero-section title="Fresh, Fast, Flawless—We Clean Your" words="Apparels,Beddings,Anything!"
        intro-link="#intro-section" services-link="#services-section" />

    <x-intro-section title="Reliable & Fast Cleaning Service"
        description="Our website is designed to make your laundry experience fast, 
                easy, and hassle-free. With just a few clicks, you can book a laundry service that guarantees fresh,
                clean, and neatly folded clothes—delivered right on time. Whether you have everyday wear, 
                delicate fabrics, or bulky loads, we handle them with care, 
                using high-quality detergents and advanced cleaning techniques."
        phone="87000" />

    <x-services-section />

    <x-laundry-booking-form />

    @php
        $testimonials = App\Models\Testimonial::all();
    @endphp

    <x-testimonial-section :testimonials="$testimonials" />


</main>


<footer class="site-footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 d-flex align-items-center mb-4 pb-2">
                <div>
                    <img src="images/bubbles.png" class="logo img-fluid" alt="">
                </div>

                <ul class="footer-menu d-flex flex-wrap ms-5">
                    <li class="footer-menu-item"><a href="#" class="footer-menu-link">Home</a>
                    </li>
                    <li class="footer-menu-item"><a href="#intro-section" class="footer-menu-link">About Us</a>
                    </li>
                    <li class="footer-menu-item"><a href="#services-section" class="footer-menu-link">Services</a>
                    </li>
                    <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                <h5 class="site-footer-title mb-3">Our Services</h5>

                <ul class="footer-menu">
                    <li class="footer-menu-item">
                        <a href="#services-section" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            Laundry Cleaning
                        </a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#services-section" class="footer-menu-link">
                            <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                            Ironing
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0">
                <h5 class="site-footer-title mb-3">Office</h5>

                <p class="text-black d-flex mt-3 mb-2">
                    <i class="bi-geo-alt-fill me-2"></i>
                    Subsaharan, Wakandabaw
                </p>

                <p class="text-black d-flex mb-2">
                    <i class="bi-telephone-fill me-2"></i>

                    <a href="tel: 8700 " class="site-footer-link">
                        8700
                    </a>
                </p>

                <p class="text-black d-flex">
                    <i class="bi-envelope-fill me-2"></i>

                    <a href="mailto:info@company.com" class="site-footer-link">
                        WashingMashing@company.com
                    </a>
                </p>

                <ul class="social-icon mt-4">
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link button button--skoll">
                            <span></span>
                            <span class="bi-twitter"></span>
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link button button--skoll">
                            <span></span>
                            <span class="bi-facebook"></span>
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link button button--skoll">
                            <span></span>
                            <span class="bi-instagram"></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-6 mt-3 mt-lg-0 mt-md-0">
                <div class="featured-block">
                    <h5 class="text-black mb-3">Service Hours</h5>

                    <strong class="d-block text-black mb-1">Mon - Fri</strong>

                    <p class="text-black mb-3">8:00 AM - 5:30 PM</p>

                    <strong class="d-block text-black mb-1">Sat</strong>

                    <p class="text-black mb-0">6:00 AM - 2:30 PM</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<br>
@endsection
