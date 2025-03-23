<section class="testimonial-section section-padding section-bg">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="text-white mb-4">Customer Reviews</h2>
            </div>

            @foreach ($testimonials as $testimonial)
                <div class="col-lg-4 col-12">
                    <div class="featured-block">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset($testimonial->image) }}" class="avatar-image img-fluid"
                                alt="{{ $testimonial->name }}">

                            <div class="ms-3">
                                <h4 class="mb-0">{{ $testimonial->name }}</h4>
                            </div>
                        </div>

                        <p class="mb-0">{{ $testimonial->review }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
