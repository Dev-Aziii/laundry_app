<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <br>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"> <i class="fas fa-users me-1"></i> Employee Management</h5>
                <form class="d-flex" action="#" method="GET">
                    <input type="text" class="form-control form-control-sm" placeholder="Search Employees"
                        aria-label="Search">
                    <button class="btn btn-primary btn-sm ms-2" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Employee ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Hire Date</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="action-col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#E12345</td>
                            <td>John Doe</td>
                            <td>Software Engineer</td>
                            <td>2020-05-01</td>
                            <td>₱50,000.00</td>
                            <td>Active</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-sm order-btn">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn btn-primary btn-sm order-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm order-btn">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
