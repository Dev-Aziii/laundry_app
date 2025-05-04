<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <div class="container-fluid py-4">
            <h5 class="mb-4">Dashboard</h5>
            <br>
            <br>
            <style>
                .icon-circle {
                    width: 80px;
                    height: 80px;
                    border-radius: 50%;
                    position: absolute;
                    top: -40px;
                    left: 50%;
                    transform: translateX(-50%);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 2rem;
                    color: #fff;
                }

                .tile-card {
                    position: relative;
                    padding-top: 50px;
                    text-align: center;
                    border: none;
                    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
                }
            </style>

            <div class="row mb-4 g-3">
                <!-- INCOME -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card tile-card bg-white">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card-body text-success">
                            <h6 class="text-uppercase">Income</h6>
                            <h3>$1050.72</h3>
                        </div>
                        <div
                            class="card-footer bg-light text-success fw-semibold d-flex justify-content-between align-items-center">
                            <span>More Info</span>
                            <i class="fas fa-chevron-circle-right"></i>
                        </div>
                    </div>
                </div>

                <!-- USERS -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card tile-card bg-white">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-body text-primary">
                            <h6 class="text-uppercase">Users</h6>
                            <h3>4</h3>
                        </div>
                        <div
                            class="card-footer bg-light text-primary fw-semibold d-flex justify-content-between align-items-center">
                            <span>More Info</span>
                            <i class="fas fa-chevron-circle-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Employee -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card tile-card bg-white">
                        <div class="icon-circle bg-warning">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="card-body text-warning">
                            <h6 class="text-uppercase">Employees</h6>
                            <h3>15</h3>
                        </div>
                        <div
                            class="card-footer bg-light text-warning fw-semibold d-flex justify-content-between align-items-center">
                            <span>More Info</span>
                            <i class="fas fa-chevron-circle-right"></i>
                        </div>
                    </div>
                </div>

                <!-- SERVICES -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card tile-card bg-white">
                        <div class="icon-circle bg-danger">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="card-body text-danger">
                            <h6 class="text-uppercase">Services</h6>
                            <h3>5</h3>
                        </div>
                        <div
                            class="card-footer bg-light text-danger fw-semibold d-flex justify-content-between align-items-center">
                            <span>More Info</span>
                            <i class="fas fa-chevron-circle-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue + Overview Row -->
            <div class="row g-4">
                <!-- Revenue Section -->
                <div class="col-lg-8">
                    <div class="card h-100">
                        <div class="card-body">
                            <!-- Header Row: Title + Actions -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0">Revenue</h5>
                                <div class="d-flex gap-2">
                                    <!-- Filter Dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-white border dropdown-toggle" type="button"
                                            id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            Filter
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Week</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                        </ul>
                                    </div>

                                    <!-- Download Button -->
                                    <button class="btn btn-primary">Download</button>
                                </div>
                            </div>
                            <hr>
                            <!-- Table -->
                            <div class="table-responsive mb-3">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>DELIVERY DATE</th>
                                            <th>ORDER BY</th>
                                            <th>QUANTITY</th>
                                            <th>TOTAL</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">No orders found</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Revenue Footer -->
                            <div class="alert alert-warning mt-3">
                                Sorry, today's revenue not found
                            </div>
                            <div class="d-flex justify-content-end">
                                <h5>Total Revenue: <strong>$0</strong></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Overview Section -->
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow">
                        <!-- Colored Header -->
                        <div class="card-header bg-secondary text-white rounded-top">
                            <br>
                            <br>
                            <h5 class="mb-0">Overview</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <!-- Item -->
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-users fa-2x text-primary"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">4</h5>
                                        <small class="text-muted">Users</small>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-shopping-cart fa-2x text-success"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">0</h5>
                                        <small class="text-muted">Orders</small>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-clock fa-2x text-warning"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">0</h5>
                                        <small class="text-muted">Pending</small>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-sync-alt fa-2x text-info"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">0</h5>
                                        <small class="text-muted">On Progress</small>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-truck fa-2x text-success"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">1</h5>
                                        <small class="text-muted">Delivered</small>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-times-circle fa-2x text-danger"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">0</h5>
                                        <small class="text-muted">Cancelled</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
