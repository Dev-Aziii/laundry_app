<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <br>
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center text-white">
                <h5 class="mb-0">
                    <i class="fas fa-users me-2"></i>Employee Management
                </h5>
                <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                    <i class="fa-solid fa-user-plus me-1"></i> Add Employee
                </button>
            </div>
            <div class="card-body">
                <!-- Search Form -->
                <form class="row g-2 mb-3" action="#" method="GET">
                    <div class="col-md-4">
                        <input type="text" class="form-control form-control-sm" placeholder="Search Employees"
                            aria-label="Search">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fas fa-search me-1"></i>
                        </button>
                    </div>
                </form>

                <!-- Employee Table -->
                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table class="table table-hover align-middle table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Employee ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Hire Date</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>#{{ $employee->employee_id }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->position }}</td>
                                    <td>{{ $employee->hire_date }}</td>
                                    <td>₱{{ number_format($employee->salary, 2) }}</td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $employee->status === 'Active' ? 'success' : 'secondary' }}">
                                            {{ $employee->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-3">
                                            @if ($employee->status === 'Active')
                                                <!-- Archive Button -->
                                                <form action="{{ route('employees.archive', $employee->id) }}"
                                                    method="POST" onsubmit="return confirm('Archive this employee?')">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-warning btn-sm" title="Archive">
                                                        <i class="fas fa-archive"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <!-- Restore Button -->
                                                <form action="{{ route('employees.restore', $employee->id) }}"
                                                    method="POST" onsubmit="return confirm('Restore this employee?')">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-success btn-sm" title="Restore">
                                                        <i class="fas fa-undo-alt"></i>
                                                    </button>
                                                </form>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf
                <div class="modal-header text-dark">
                    <h5 class="modal-title" id="addEmployeeModalLabel">
                        <i class="fa-solid fa-user-plus me-2"></i> Add New Employee
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="employeeName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="employeeName" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="employeePosition" class="form-label">Position</label>
                            <input type="text" class="form-control" id="employeePosition" name="position" required>
                        </div>
                        <div class="col-md-6">
                            <label for="hireDate" class="form-label">Hire Date</label>
                            <input type="date" class="form-control" id="hireDate" name="hire_date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="salary" class="form-label">Salary (₱)</label>
                            <input type="number" class="form-control" id="salary" name="salary" required>
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option selected disabled>Choose...</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Save Employee
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
