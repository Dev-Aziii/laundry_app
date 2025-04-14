<h4 class="mb-3"><i class="bi bi-check-circle me-2"></i> Finishing Up..</h4>
<p>Review your order.</p>
<div class="container-fluid">

    <div class="container">
        <!-- Title -->
        <div class="d-flex justify-content-between align-items-center py-3">
            <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #16123222</h2>
        </div>

        <!-- Main content -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                <span class="me-3">{{ now()->format('d-m-Y') }}</span>
                                <span class="badge rounded-pill bg-warning">PENDING</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i
                                        class="bi bi-download"></i> <span class="text">Invoice</span></button>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 text-muted" type="button"
                                        data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i>
                                                Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i>
                                                Print</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>
                                            <div class="d-flex mb-2">
                                                <div class="flex-lg-grow-1 ms-3">
                                                    <h6 class="small mb-0">{{ $service->service_name }}</h6>
                                                    <span
                                                        class="small">{{ Str::limit($service->description, 30) }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>1</td>
                                        <td class="text-end">
                                            ₱{{ number_format($service->price_per_kg * 1, 2) }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="fw-bold">
                                    <td colspan="2">TOTAL</td>
                                    <td class="text-end">
                                        ₱{{ number_format($services->sum(fn($service) => $service->price_per_kg * $service->quantity), 2) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
                <!-- Payment -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="h6">Payment Method</h3>
                                <p>COD <br>
                                    Total: $169,98 <span class="badge bg-danger rounded-pill">UNPAID</span></p>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="h6">Pick-Up address</h3>
                                <address>
                                    <strong>John Doe</strong><br>
                                    1355 Market St, Suite 900<br>
                                    San Francisco, CA 94103<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Customer Notes -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="h6">Customer Notes</h3>
                        <p>tarungag pilo</p>
                    </div>
                </div>
                <div class="card mb-4">
                    <!-- Shipping information -->
                    <div class="card-body">
                        <h3 class="h6">Shipping Information</h3>
                        <hr>
                        <h3 class="h6">Address</h3>
                        <address>
                            <strong>John Doe</strong><br>
                            1355 Market St, Suite 900<br>
                            San Francisco, CA 94103<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-end mt-4">
    <button class="btn btn-secondary prev-step me-2" data-prev="step2">
        <i class="bi bi-arrow-left"></i> Back
    </button>
    <a href="{{ route('user') }}" class="btn btn-success">
        <i class="bi bi-check-lg"></i> Place Order
    </a>
</div>
