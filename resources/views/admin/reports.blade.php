<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <br>
        <div class="card shadow-sm border-0">
            <div class="card-header bg-light border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark">INCOME</h5>
                        <p class="text-muted mt-1">Revenue</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <input type="date" class="form-control form-control-sm" value="2025-03-26">
                        </div>
                        <div class="me-3">
                            <input type="date" class="form-control form-control-sm" value="2025-04-27">
                        </div>
                        <button class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-filter me-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <!-- Report Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
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
                                <td colspan="5" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-exclamation-circle fa-3x mb-3"></i>
                                        <h4>Sorry! Revenue report not found</h4>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Total Revenue and Print Section -->
                <div class="row mt-4">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 flex-grow-1 me-3">
                                <h5 class="mb-0 me-2 text-muted">Total Revenue:</h5>
                                <h4 class="mb-0 text-dark font-weight-bold">$0</h4>
                            </div>
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-print me-2"></i>Print Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
