@extends('layout')
@section('title', 'Admin | WashingMashing')

@section('content')

    <style>
        body {
            background-color: rgb(235, 235, 235);
        }
    </style>

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-body admin-navbar" data-bs-theme="dark"
        style="height: 60px;">
        <div class="container-fluid">
            <!-- Logo and App Name -->
            <a class="navbar-brand" href="#">
                <img src="images/bubbles.png" alt="Laundry Logo" class="navbar-logo">
                <span class="navbar-text">WashingMashing - Admin</span>
            </a>

            <!-- User Profile Dropdown -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </a>
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

    <div class="d-flex">
        <!-- Sidebar Section -->
        <div class="sidebar bg-dark border-bottom border-body admin-sidebar p-3" data-bs-theme="dark">
            <a href="#" class="load-page" data-route="{{ route('dashboard.page') }}">
                <i class="bi bi-house-door"></i> Dashboard
            </a>

            <!-- Orders Link -->
            <a href="#" class="load-page" data-route="{{ route('orders.page') }}">
                <i class="bi bi-cart"></i> Bookings
            </a>

            <a href="#" class="load-page" data-route="{{ route('sales.page') }}">
                <i class="bi bi-bar-chart"></i> Sales
            </a>
            <a href="#" class="load-page" data-route="{{ route('adminservices.page') }}">
                <i class="bi bi-tools"></i> Services
            </a>
            <!-- Service Management Section with Accordion
                            <div class="accordion" id="serviceManageAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingServiceManage">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseServiceManage" aria-expanded="false"
                                            aria-controls="collapseServiceManage">
                                            <i class="bi bi-gear"></i> Service Management
                                        </button>
                                    </h2>
                                    <div id="collapseServiceManage" class="accordion-collapse collapse"
                                        aria-labelledby="headingServiceManage" data-bs-parent="#serviceManageAccordion">
                                        <div class="accordion-body">
                                            
                                            <a href="#" class="load-page" data-route="{{ route('products.page') }}">
                                                <i class="bi bi-box"></i> Products
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->

            <!-- POS Management Section with Accordion
                        <div class="accordion" id="posManageAccordion">
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingPosManage">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsePosManage" aria-expanded="false" aria-controls="collapsePosManage">
                                                                                                            <i class="bi bi-credit-card"></i> POS Management
                                                                                                        </button>
                                                                                                    </h2>
                                                                                                    <div id="collapsePosManage" class="accordion-collapse collapse" aria-labelledby="headingPosManage"
                                                                                                        data-bs-parent="#posManageAccordion">
                                                                                                        <div class="accordion-body">
                                                                                                            <a href="#" class="load-page" data-route="{{ route('pos.page') }}">
                                                                                                                <i class="bi bi-cash-stack"></i> POS
                                                                                                            </a>
                                                                                                            <a href="#" class="load-page" data-route="{{ route('sales.page') }}">
                                                                                                                <i class="bi bi-bar-chart"></i> Sales
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                     -->

            <!-- Other Sidebar Links -->
            <a href="#" class="load-page" data-route="{{ route('customer.page') }}">
                <i class="bi bi-person-lines-fill"></i> Users
            </a>
            <a href="#" class="load-page" data-route="{{ route('reports.page') }}">
                <i class="bi bi-file-earmark-bar-graph"></i> Reports
            </a>
            <a href="#" class="load-page" data-route="{{ route('employee.page') }}">
                <i class="bi bi-person-workspace"></i> Employee Management
            </a>
            <a href="#" class="load-page" data-route="{{ route('shift.page') }}">
                <i class="bi bi-calendar-check"></i> Shift Assignments
            </a>
        </div>

        <!-- Content Area -->
        <div class="content-area flex-grow-1 p-3" id="contentArea">
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            // Dynamic page loading with AJAX
            $(document).on('click', '.load-page', function(e) {
                e.preventDefault(); // Prevent default anchor behavior
                var route = $(this).data('route'); // Get the route from the clicked link

                // AJAX request to load page content
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(data) {
                        $('#contentArea').html(
                            data); // Insert the loaded data into the content area

                        // Reinitialize dynamic components like date pickers if they exist
                        if (typeof initDynamicComponents === 'function') {
                            initDynamicComponents();
                        }
                    },
                    error: function() {
                        $('#contentArea').html(
                            '<p class="text-danger">Failed to load content.</p>');
                    }
                });

                // Active link highlight
                $('.admin-sidebar a, .accordion-body a').removeClass('active');
                $(this).addClass('active');
            });

            // Check if we need to redirect to orders or services page
            @if (session('success') == 'redirect_to_orders')
                const ordersLink = $('[data-route="{{ route('orders.page') }}"]');
                ordersLink.trigger('click').addClass('active');
            @elseif (session('success') == 'redirect_to_service')
                const servicesLink = $('[data-route="{{ route('adminservices.page') }}"]');
                servicesLink.trigger('click').addClass('active');
                $('#collapseServiceManage').collapse('show');
            @elseif (session('success') == 'emp_added')
                const empLink = $('[data-route="{{ route('employee.page') }}"]');
                empLink.trigger('click').addClass('active');
            @else
                const dashboardLink = $('[data-route="{{ route('dashboard.page') }}"]');
                dashboardLink.trigger('click').addClass('active');
            @endif

            // Add service form submission
            $(document).on('submit', '#addServiceForm', function(e) {
                e.preventDefault();
                let form = $(this)[0];
                let formData = new FormData(form);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Hide modal
                        $('#addServiceModal').modal('hide');

                        // Reset form
                        form.reset();

                        // Update the table body with the new HTML
                        $('#serviceTableBody').html(response.html);
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });

            // Filter services by status
            $(document).on('change', '#statusFilter', function() {
                const status = $(this).val();

                $.ajax({
                    url: "{{ route('services.filter') }}",
                    type: 'GET',
                    data: {
                        status
                    },
                    success: function(html) {
                        $('#serviceTableBody').html(html);
                    },
                    error: function() {
                        alert('Failed to filter services.');
                    }
                });

            });

        });
    </script>



@endsection
