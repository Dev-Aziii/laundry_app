<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Order By</th>
                            <th scope="col">Pickup Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Order Status</th>
                            <th scope="col" class="action-col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#12345</td>
                            <td>John Doe</td>
                            <td>2025-04-01</td>
                            <td>₱500.00</td>
                            <td>Pending</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-sm order-btn">
                                        <i class="fas fa-address-card"></i>
                                    </button>
                                    <button class="btn btn-primary btn-sm order-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm order-btn">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#12346</td>
                            <td>Jane Smith</td>
                            <td>2025-04-02</td>
                            <td>₱450.00</td>
                            <td>Completed</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-sm order-btn">
                                        <i class="fas fa-address-card"></i>
                                    </button>
                                    <button class="btn btn-primary btn-sm order-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm order-btn">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#12347</td>
                            <td>Samuel Lee</td>
                            <td>2025-04-05</td>
                            <td>₱600.00</td>
                            <td>In Progress</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-sm order-btn">
                                        <i class="fas fa-address-card"></i>
                                    </button>
                                    <button class="btn btn-primary btn-sm order-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm order-btn">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </div>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
