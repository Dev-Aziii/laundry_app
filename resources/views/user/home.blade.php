<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>WashingMashing</title>

    <!-- CSS FILES -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

</head>

<body>

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
                        <strong class="me-2">Mon - Fri</strong> 8:00 AM - 5:30 PM
                    </p>

                    <p class="site-header-icon-wrap text-white d-flex mb-0 ms-auto">
                        <i class="site-header-icon bi-whatsapp me-2"></i>

                        <a href="tel:8700 " class="text-white">
                            8700
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
                        <li class="nav-item dropdown ms-3">
                            <!-- User Dropdown Toggle Button -->
                            <button class="btn btn-secondary dropdown-toggle d-flex align-items-center" type="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-2"></i> <!-- User Icon -->
                                {{ Auth::user()->name }} <!-- Display User Name -->
                            </button>

                            <!-- Dropdown Menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li> <!-- Profile Option -->
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
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

        <section class="hero-section hero-section-full-height d-flex justify-content-center align-items-center">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-7 col-12 text-center mx-auto">
                        <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                            <span>"Fresh, Fast, Flawless—We Clean Your</span>
                            <span class="cd-words-wrapper">
                                <b class="is-visible">Apparels</b>
                                <b>Beddings</b>
                                <b>Anything!</b>
                            </span>
                        </h1>

                        <a class="custom-btn btn button button--atlas smoothscroll me-3" href="#intro-section">
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
                            href="#services-section">
                            <span>Explore Services</span>
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


        <section class="intro-section" id="intro-section">
            <div class="container">
                <div class="row justify-content-lg-center align-items-center">

                    <div class="col-lg-6 col-12">
                        <h2 class="mb-4">Reliable &amp; Fast Cleaning <br> Service</h2>

                        <p><a href="#">WashingMashing</a> Lorem ipsum dolor sit amet consectetur adipisicing 
                            elit. Officiis, praesentium ducimus sapiente nesciunt placeat reprehenderit libero 
                            ab doloribus assumenda. Corporis voluptatem consequuntur fuga, culpa et eum ullam 
                            eligendi perferendis aperiam.
                        </p>
                    </div>

                    <div class="col-lg-6 col-12 custom-block-wrap">
                        <img src="images/pngwing.com.png"
                            class="img-fluid">

                        <div class="custom-block d-flex flex-column">
                            <h6 class="text-white mb-3">Need Help? <br> Please call us:</h6>

                            <p class="d-flex mb-0">
                                <i class="bi-telephone-fill custom-icon me-2"></i>

                                <a href="tel: 8700 ">
                                    8700
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="services-section section-padding section-bg" id="services-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <h2 class="mb-4">Our Services</h2>
                    </div>
        
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="services-thumb">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="services-image-wrap">
                                        <a href="#">
                                            <img src="images/services/laundry-img1.jpg" class="services-image img-fluid" alt="">
                                            <img src="images/services/laundry-img2.png"
                                                class="services-image services-image-hover img-fluid" alt="">
                                            <div class="services-icon-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="text-white mb-0">
                                                        <i class="bi-cash me-2"></i> Php80
                                                    </p>
                                                    <p class="text-white mb-0">
                                                        <i class="bi-clock-fill me-2"></i> ? hrs
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-12 d-flex align-items-center">
                                    <div class="services-info mt-4 mt-lg-0">
                                        <h4 class="services-title mb-1 mb-lg-2">
                                            <a class="services-title-link" href="#">Laundry Cleaning</a>
                                        </h4>
                                        <p>DESC HERE</p>
                                        <a href="#" class="custom-btn btn button button--atlas mt-2 ms-auto">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="services-thumb">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="services-image-wrap">
                                        <a href="#">
                                            <img src="images/services/laundry-img2.png" class="services-image img-fluid" alt="">
                                            <img src="images/services/laundry-img1.jpg"
                                                class="services-image services-image-hover img-fluid" alt="">
                                            <div class="services-icon-wrap">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="text-white mb-0">
                                                        <i class="bi-cash me-2"></i> Php80
                                                    </p>
                                                    <p class="text-white mb-0">
                                                        <i class="bi-clock-fill me-2"></i> ? hrs
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-12 d-flex align-items-center">
                                    <div class="services-info mt-4 mt-lg-0">
                                        <h4 class="services-title mb-1 mb-lg-2">
                                            <a class="services-title-link" href="#">Ironing</a>
                                        </h4>
                                        <p>DESC HERE</p>
                                        <a href="#" class="custom-btn btn button button--atlas mt-2 ms-auto">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </section>


        <section class="testimonial-section section-padding section-bg">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="text-white mb-4">Customer Reviews</h2>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="featured-block">
                            <div class="d-flex align-items-center mb-3">
                                <img src="images/avatar/happy-customer-01.jpg" class="avatar-image img-fluid">

                                <div class="ms-3">
                                    <h4 class="mb-0">Gegel</h4>

                                    
                                </div>
                            </div>

                            <p class="mb-0">Legit jud ni ilang serbisyo grabe recommended kaayo, akong black na sanina nahimog puti.</p>
                        </div>

                        <div class="featured-block mb-lg-0">
                            <div class="d-flex align-items-center mb-3">
                                <img src="images/avatar/happy-customer-02.jpg" class="avatar-image img-fluid">

                                <div class="ms-3">
                                    <h4 class="mb-0">Anonymous</h4>

                                </div>
                            </div>

                            <p class="mb-0">Nagpa-laundry ko kay busy kaayo ko. Pag-abot sa bill, mura kog nalabhan ug apil! char rato ra bitaw diri hehehe</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="featured-block">
                            <div class="d-flex align-items-center mb-3">
                                <img src="images/avatar/happy-customer-03.jpg" class="avatar-image img-fluid">

                                <div class="ms-3">
                                    <h4 class="mb-0">Biloy</h4>

                                </div>
                            </div>

                            <p class="mb-0">Nangutana ko sa laundry shop, 'Pwede pa ba ni maluwas akong sanina?' Niingon sila, 'Laundry service mi, dili milagrohan!</p>
                        </div>

                        <div class="featured-block mb-lg-0">
                            <div class="d-flex align-items-center mb-3">
                                <img src="images/avatar/happy-customer-04.jpg" class="avatar-image img-fluid">

                                <div class="ms-3">
                                    <h4 class="mb-0">Lebron James</h4>

                                    
                                </div>
                            </div>

                            <p class="mb-0">Bahong gasolina na! Unsa ni, laundry shop or vulcanizing?</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="featured-block">
                            <div class="d-flex align-items-center mb-3">
                                <img src="images/avatar/happy-customer-05.jpg" class="avatar-image img-fluid">

                                <div class="ms-3">
                                    <h4 class="mb-0">Elias</h4>

                                    
                                </div>
                            </div>

                            <p class="mb-0">Nagpa-laundry ko sa akong puti nga sanina, pagkuha nako, wala na. Naunsa man to? 'Sir, limpyo na kaayo, invisible na
                            gani!</p>
                        </div>

                        <div class="featured-block mb-lg-0">
                            <div class="d-flex align-items-center mb-3">
                                <img src="images/avatar/happy-customer-06.jpg" class="avatar-image img-fluid">

                                <div class="ms-3">
                                    <h4 class="mb-0">Tibor</h4>

                                    
                                </div>
                            </div>

                            <p class="mb-0">Dina gyud ko mo usab, kausa nalang.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>       
    </main>


    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 d-flex align-items-center mb-4 pb-2">
                    <div>
                        <img src="images/bubbles.png" class="logo img-fluid" alt="">
                    </div>

                    <ul class="footer-menu d-flex flex-wrap ms-5">
                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">About Us</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Blog</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Reviews</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                    <h5 class="site-footer-title mb-3">Our Services</h5>

                    <ul class="footer-menu">
                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">
                                <i class="bi-chevron-double-right footer-menu-link-icon me-2"></i>
                                Laundry Cleaning
                            </a>
                        </li>

                        <li class="footer-menu-item">
                            <a href="#" class="footer-menu-link">
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

    <!-- JAVASCRIPT FILES -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/animated-headline.js"></script>
    

</body>

<!-- Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <img src="images\bubbles.png" class="logo img-fluid" alt="logo">
                <h6 class="modal-title" id="authModalLabel">Authentication</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Navigation Buttons -->
                <ul class="nav nav-tabs" id="authTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="register-tab" data-bs-toggle="tab"
                            data-bs-target="#register" type="button" role="tab">Register</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                            type="button" role="tab">Login</button>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="authTabContent">
                    <!-- Register Tab -->
                    <div class="tab-pane fade show active" id="register" role="tabpanel">
                        <form>
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" type="text" name="name" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input id="phone" class="form-control" type="text" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input id="address" class="form-control" type="text" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>

                    <!-- Login Tab -->
                    <div class="tab-pane fade" id="login" role="tabpanel">
                        <form>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password" required>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>
                            <div class="text-end">
                                <a href="#" class="text-decoration-none">Forgot your password?</a>
                                <button class="btn btn-primary ms-2">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>