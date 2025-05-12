<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <br>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-table me-1"></i> Sales Table</h5>
            </div>

            <div class="card-body">
                <div class="mb-3 d-flex gap-3 align-items-center">
                    <label for="statusFilter" class="form-label mb-0">Filter by Status:</label>
                    <select id="statusFilter" class="form-select form-select-sm w-auto">
                        <option value="">All</option>
                        @foreach (['Paid', 'Unpaid', 'Failed'] as $statusOption)
                            <option value="{{ strtolower($statusOption) }}"
                                {{ strtolower($statusOption) == 'paid' ? 'selected' : '' }}>
                                {{ $statusOption }}
                            </option>
                        @endforeach
                    </select>


                    <label for="typeFilter" class="form-label mb-0 ms-3">Filter by Payment Type:</label>
                    <select id="typeFilter" class="form-select form-select-sm w-auto">
                        <option value="">All</option>
                        @foreach (['Cash_on_Delivery', 'PayPal'] as $typeOption)
                            <option value="{{ strtolower($typeOption) }}">{{ $typeOption }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="salesTableWrapper">
                    @include('admin.partials.sales-table', ['sales' => $sales])
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function filterSales() {
            let status = $('#statusFilter').val();
            let type = $('#typeFilter').val();

            $.ajax({
                url: "{{ route('sales.filter') }}",
                type: "GET",
                data: {
                    status: status,
                    type: type
                },
                success: function(response) {
                    $('#salesTableWrapper').html(response);
                },
                error: function() {
                    alert('Error loading filtered sales.');
                }
            });
        }

        $('#statusFilter, #typeFilter').on('change', filterSales);

        // Trigger filter on load to fetch 'paid'
        filterSales();
    });
</script>
