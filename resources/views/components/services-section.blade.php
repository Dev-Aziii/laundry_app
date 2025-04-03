<section class="services-section section-padding section-bg" id="services-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h2 class="mb-4">Our Best Offers</h2>
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
            @if (Request::routeIs('services.page'))
                @auth
                    <a class="custom-btn btn button button--atlas w-25" href="{{ route('booking.page') }}">
                        <span>Book Now</span>
                        <div class="marquee" aria-hidden="true">
                            <div class="marquee__inner">
                                <span>Book Now</span>
                                <span>Book Now</span>
                                <span>Book Now</span>
                                <span>Book Now</span>
                            </div>
                        </div>
                    </a>
                @else
                    <a class="custom-btn btn button button--atlas w-25"
                        href="{{ route('login') }}?redirect_url={{ route('booking.page') }}">
                        <span>Book Now</span>
                        <div class="marquee" aria-hidden="true">
                            <div class="marquee__inner">
                                <span>Book Now</span>
                                <span>Book Now</span>
                                <span>Book Now</span>
                                <span>Book Now</span>
                            </div>
                        </div>
                    </a>
                @endauth
            @else
                <a class="custom-btn btn button button--atlas w-25" href="{{ route('services.page') }}">
                    <span>View More</span>
                    <div class="marquee" aria-hidden="true">
                        <div class="marquee__inner">
                            <span>View More</span>
                            <span>View More</span>
                            <span>View More</span>
                            <span>View More</span>
                        </div>
                    </div>
                </a>
            @endif
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
