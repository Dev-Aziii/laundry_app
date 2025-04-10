@extends('layout')
@section('title', 'Admin | WashingMashing')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-body admin-navbar" data-bs-theme="dark"
        style="height: 60px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/bubbles.png" alt="Laundry Logo" class="navbar-logo">
                <span class="navbar-text">WashingMashing</span>
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="sidebar bg-dark border-bottom border-body admin-sidebar" data-bs-theme="dark">
        <a href="#"><i class="bi bi-cart"></i>Dashboardsss</a>
        <a href="#"><i class="bi bi-cart"></i>Orders</a>

        <!-- Product Manage Accordion -->
        <div class="accordion" id="productManageAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingProductManage">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseProductManage" aria-expanded="false" aria-controls="collapseProductManage">
                        <i class="bi bi-clipboard-check"></i>Product Manage
                    </button>
                </h2>
                <div id="collapseProductManage" class="accordion-collapse collapse" aria-labelledby="headingProductManage"
                    data-bs-parent="#productManageAccordion">
                    <div class="accordion-body">
                        <a href="#" class="load-page" data-route="#">
                            <i class="bi bi-gear"></i> Services
                        </a>
                        <a href="#" class="load-page" data-route="#">
                            <i class="bi bi-box-seam"></i> Products
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- POS Manage Accordion -->
        <div class="accordion" id="posManageAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingPosManage">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsePosManage" aria-expanded="false" aria-controls="collapsePosManage">
                        <i class="bi bi-person-plus"></i> POS Manage
                    </button>
                </h2>
                <div id="collapsePosManage" class="accordion-collapse collapse" aria-labelledby="headingPosManage"
                    data-bs-parent="#posManageAccordion">
                    <div class="accordion-body">
                        <a href="#" class="load-page" data-route="#">
                            <i class="bi bi-pc-display-horizontal"></i> POS
                        </a>
                        <a href="#" class="load-page" data-route="#">
                            <i class="bi bi-bar-chart-line"></i> Sales
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" class="load-page" data-route="#"><i class="bi bi-truck"></i>Order Tracking</a>
        <a href="#" class="load-page" data-route="#"><i class="bi bi-credit-card"></i>Customer</a>
        <a href="#" class="load-page" data-route="#"><i class="bi bi-file-earmark-bar-graph"></i>Reports</a>
        <a href="#" class="load-page" data-route="#"><i class="bi bi-person-lines-fill"></i>Employee Tasks</a>
        <a href="#" class="load-page" data-route="#"><i class="bi bi-calendar-check"></i>Shift Assignments</a>
    </div>
@endsection
