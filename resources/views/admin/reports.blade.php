<div class="d-flex justify-content-end pt-5">
    <div class="card shadow-lg p-4 rounded-4 border-0 mt-5" style="width: 82%;">
        <div class="card-header bg-white border-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0">INCOME</h2>
                    <h4 class="text-muted mt-1">Revenue</h4>
                </div>
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <input type="date" class="form-control" value="2025-03-26">
                    </div>
                    <div class="me-3">
                        <input type="date" class="form-control" value="2025-04-27">
                    </div>
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-filter me-2"></i>Filter
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!-- Report Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
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
                                    <i class="fas fa-exclamation-circle fa-2x mb-3"></i>
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
                        <div class="d-flex align-items-center p-3 bg-light rounded flex-grow-1 me-3">
                            <h5 class="mb-0 me-2">Total_Revenue:</h5>
                            <h4 class="mb-0 font-weight-bold">$0</h4>
                        </div>
                        <button class="btn btn-outline-secondary h-100">
                            <i class="fas fa-print me-2"></i>Print Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
    }
    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    .table {
        margin-bottom: 0;
    }
    .bg-light {
        background-color: #f8f9fa!important;
    }
    .form-control {
        max-width: 150px;
        display: inline-block;
    }
</style>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">