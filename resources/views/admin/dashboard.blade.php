<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <div class="container-fluid py-4">
            <br><br>
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

                .overview-header {
                    background-image: url('../images/water2.png');
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                    padding-bottom: 65px;
                }
            </style>

            <!-- Overview Row -->
            <div class="row mb-4 g-3">
                <!-- TOTAL SALES -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card tile-card bg-white">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card-body text-success">
                            <h6 class="text-uppercase">Sales</h6>
                            <h3>₱{{ number_format($totalSales, 2) }}</h3>
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
                            <h3>{{ $totalUsers }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Employees -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card tile-card bg-white">
                        <div class="icon-circle bg-warning">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="card-body text-warning">
                            <h6 class="text-uppercase">Employees</h6>
                            <h3>WALA PA!</h3>
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
                            <h3>{{ $totalServices }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Overview + Sales Chart Row -->
            <div class="row g-4">
                <!-- Sales Chart Section -->
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Sales (Last 7 Days)</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="salesChart" height="130"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Overview Section -->
                <div class="col-lg-4">
                    <div class="card h-97 border-0 shadow">
                        <div class="card-header overview-header">
                            <h5>Overview</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <!-- Users -->
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-users fa-2x text-primary"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">{{ $totalUsers }}</h5>
                                        <small class="text-muted">Users</small>
                                    </div>
                                </div>
                                <!-- Orders -->
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-shopping-cart fa-2x text-success"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">{{ $totalOrders }}</h5>
                                        <small class="text-muted">Orders</small>
                                    </div>
                                </div>
                                <!-- Pending Orders -->
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-clock fa-2x text-warning"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">{{ $pendingOrders }}</h5>
                                        <small class="text-muted">Pending</small>
                                    </div>
                                </div>
                                <!-- Orders in Progress -->
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-sync-alt fa-2x text-info"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">{{ $onProgressOrders }}</h5>
                                        <small class="text-muted">On Progress</small>
                                    </div>
                                </div>
                                <!-- Delivered Orders -->
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-truck fa-2x text-success"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">{{ $deliveredOrders }}</h5>
                                        <small class="text-muted">Delivered</small>
                                    </div>
                                </div>
                                <!-- Cancelled Orders -->
                                <div class="col-6 d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-times-circle fa-2x text-danger"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-1">{{ $cancelledOrders }}</h5>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($salesDates) !!},
            datasets: [{
                label: 'Sales (₱)',
                data: {!! json_encode($salesAmounts) !!},
                backgroundColor: 'rgba(40, 167, 69, 0.5)',
                borderColor: '#28a745',
                borderWidth: 2,
                borderRadius: 6,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return '₱' + parseFloat(context.parsed.y).toFixed(2);
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '₱' + value;
                        }
                    }
                }
            }
        }
    });
</script>
