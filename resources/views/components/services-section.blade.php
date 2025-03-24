<section class="services-section section-padding section-bg" id="services-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h2 class="mb-4">Our Services</h2>
            </div>

            @foreach ($services as $service)
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="services-thumb">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-12">
                                <div class="services-image-wrap">
                                    <a href="#">
                                        <img src="{{ asset($service->image1) }}" class="services-image img-fluid"
                                            alt="">
                                        <img src="{{ asset($service->image2) }}"
                                            class="services-image services-image-hover img-fluid" alt="">
                                        <div class="services-icon-wrap">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="text-white mb-0">
                                                    <i class="bi-cash me-2"></i>
                                                    Php{{ number_format($service->price_per_kg, 2) }}
                                                </p>
                                                <p class="text-white mb-0">
                                                    <i class="bi-calendar-date-fill me-2"></i> {{ $service->duration }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-12 d-flex align-items-center">
                                <div class="services-info mt-4 mt-lg-0">
                                    <h4 class="services-title mb-1 mb-lg-2">
                                        <a class="services-title-link" href="#">{{ $service->service_name }}</a>
                                    </h4>
                                    <p>{{ $service->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            @auth
                <!-- If user is logged in, allow opening the form -->
                <button class="custom-btn btn button button--atlas w-25 smoothscroll" data-bs-toggle="collapse"
                    data-bs-target="#laundryBookingForm" onclick="scrollToSection('#laundryBookingForm')">
                    <span>Book Now</span>
                    <div class="marquee" aria-hidden="true">
                        <div class="marquee__inner">
                            <span>Book Now</span>
                            <span>Book Now</span>
                            <span>Book Now</span>
                            <span>Book Now</span>
                        </div>
                    </div>
                </button>
            @else
                <button class="custom-btn btn button button--atlas w-25" data-bs-toggle="modal"
                    data-bs-target="#loginModal">
                    <span>Book Now</span>
                    <div class="marquee" aria-hidden="true">
                        <div class="marquee__inner">
                            <span>Book Now</span>
                            <span>Book Now</span>
                            <span>Book Now</span>
                            <span>Book Now</span>
                        </div>
                    </div>
                </button>
            @endauth
        </div>

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>You need to log in to book a laundry service.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<script>
    function scrollToSection(section) {
        let element = document.querySelector(section);
        if (element) {
            let offset = 300;
            let elementPosition = element.getBoundingClientRect().top + window.scrollY;
            window.scrollTo({
                top: elementPosition - offset,
                behavior: 'smooth'
            });
        }
    }
</script>
