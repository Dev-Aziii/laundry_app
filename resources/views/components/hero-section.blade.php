<section class="hero-section hero-section-full-height d-flex justify-content-center align-items-center">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12 text-center mx-auto">
                <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                    <span>{{ $title }}</span>
                    <span class="cd-words-wrapper">
                        @foreach ($words as $index => $word)
                            <b class="{{ $index === 0 ? 'is-visible' : '' }}">{{ $word }}</b>
                        @endforeach
                    </span>
                </h1>

                <a class="custom-btn btn button button--atlas smoothscroll me-3" href="{{ $introLink }}">
                    <span>Introduction</span>

                    <div class="marquee" aria-hidden="true">
                        <div class="marquee__inner">
                            <span>Introduction</span>
                            <span>Introduction</span>
                            <span>Introduction</span>
                            <span>Introduction</span>
                        </div>
                    </div>
                </a>

                <a class="custom-btn custom-border-btn custom-btn-bg-white btn button button--pan smoothscroll"
                    href="{{ $servicesLink }}">
                    <span>Explore Our Offers</span>
                </a>
            </div>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1"
            d="M0,224L40,229.3C80,235,160,245,240,250.7C320,256,400,256,480,240C560,224,640,192,720,176C800,160,880,160,960,138.7C1040,117,1120,75,1200,80C1280,85,1360,139,1400,165.3L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
        </path>
    </svg>
</section>
