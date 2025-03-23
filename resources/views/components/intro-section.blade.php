<section class="intro-section" id="intro-section">
    <div class="container">
        <div class="row justify-content-lg-center align-items-center">

            <div class="col-lg-6 col-12">
                <h2 class="mb-4">{{ $title }}</h2>

                <p>
                    <a href="#">WashingMashing</a>
                    {{ $description }}
                </p>
            </div>

            <div class="col-lg-6 col-12 custom-block-wrap">
                <img src="{{ asset('images/pngwing.com.png') }}" class="img-fluid">

                <div class="custom-block d-flex flex-column">
                    <h6 class="text-white mb-3">Need Help? <br> Please call us:</h6>

                    <p class="d-flex mb-0">
                        <i class="bi-telephone-fill custom-icon me-2"></i>

                        <a href="tel:{{ $phone }}">
                            {{ $phone }}
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>