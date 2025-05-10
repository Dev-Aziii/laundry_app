<div class="d-flex justify-content-start pt-5">
    <div id="#" style="position: fixed; top: 10px; right: 10px; z-index: 1050;"></div>
    <div class="content-area w-100 ms-auto px-4">
        <br>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"> <i class="fas fa-table me-1"></i> Order Table</h5>
                <form class="d-flex" action="#" method="GET">
                    <input type="text" class="form-control form-control-sm" placeholder="Search Orders"
                        aria-label="Search">
                    <button class="btn btn-primary btn-sm order-btn ms-2" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <label for="statusFilter" class="form-label mb-0">Filter by Status:</label>
                    <select id="statusFilter" class="form-select form-select-sm w-auto">
                        <option value="">All</option>
                        @foreach (['Pending', 'In Progress', 'Out for Delivery', 'Completed', 'Cancelled'] as $statusOption)
                            <option value="{{ $statusOption }}">{{ $statusOption }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="ordersTableWrapper">
                    @include('admin.partials.orders-table', ['orders' => $orders])
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // Handle filter change
        $('#statusFilter').on('change', function() {
            let status = $(this).val();

            $.ajax({
                url: "{{ route('orders.filter') }}",
                type: 'GET',
                data: {
                    status: status
                },
                success: function(response) {
                    $('#ordersTableWrapper').html(response);
                },
                error: function() {
                    alert('Error loading filtered orders.');
                }
            });
        });
    });
</script>
