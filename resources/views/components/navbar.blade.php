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
                <li class="nav-item">
                    @if (request()->routeIs('user'))
                        <a class="nav-link active" href="#">
                            Home
                        </a>
                    @else
                        <a class="nav-link {{ request()->routeIs('user') ? 'active' : '' }}" href="{{ route('user') }}">
                            Home
                        </a>
                    @endif


                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services.page') ? 'active' : '' }}"
                        href="{{ route('services.page') }}">
                        Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="#">
                        About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="#">
                        Contact
                    </a>
                </li>

                @auth
                    <div class="dropdown ms-3">
                        <button class="btn btn-secondary dropdown-toggle d-flex align-items-center" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-2"></i>
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item {{ request()->routeIs('profile.show') ? 'active' : '' }}"
                                    href="{{ route('profile.show') }}">
                                    Account</a></li>
                            <li><a class="dropdown-item" href="">Orders</a></li>
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
