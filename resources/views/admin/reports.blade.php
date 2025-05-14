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
                        <div class="me-2">
                            <input type="month" id="monthFilter" class="form-control form-control-sm"
                                value="{{ now()->format('Y-m') }}">
                        </div>
                        <button id="filterBtn" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-filter me-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <!-- Report Table -->
                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>DELIVERY DATE</th>
                                <th>ORDER BY</th>
                                <th>QUANTITY</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody id="reportTableBody">
                            @include('admin.partials.reports_table', [
                                'sales' => $sales,
                                'totalRevenue' => $totalRevenue,
                            ])
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
                                <h4 class="mb-0 text-dark font-weight-bold" id="totalRevenue">
                                    ₱{{ number_format($totalRevenue, 2) }}</h4>
                            </div>
                            <a href="{{ route('admin.reports.print', ['month' => request('month', now()->month), 'year' => request('year', now()->year)]) }}"
                                target="_blank" class="btn btn-outline-secondary btn-sm" id="printBtn">
                                <i class="fas fa-print me-2"></i>Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#filterBtn').click(function() {
            const date = $('#monthFilter').val(); // format: YYYY-MM
            const [year, month] = date.split('-');

            $.ajax({
                url: '{{ route('admin.reports.filter') }}',
                method: 'GET',
                data: {
                    month: month,
                    year: year
                },
                success: function(response) {
                    $('#reportTableBody').html(response.html);
                    $('#totalRevenue').text('₱' + response.totalRevenue);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });
    });
</script>
