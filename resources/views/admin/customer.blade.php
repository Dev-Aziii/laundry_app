<div class="d-flex justify-content-start pt-5">
    <div class="content-area w-100 ms-auto px-4">
        <br>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-table me-1"></i> Users Table</h5>
                <form class="d-flex" action="#" method="GET">
                    <input type="text" class="form-control form-control-sm" placeholder="Search Users" name="search">
                    <button class="btn btn-primary btn-sm order-btn ms-2" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <div> class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Created At</th>
                                <th scope="col" class="action-col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone ?? 'N/A' }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address ?? 'N/A' }}</td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-3">
                                            <a href="#" class="btn btn-primary btn-sm order-btn">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-warning btn-sm order-btn">
                                                <i class="fas fa-archive"></i>
                                            </a>
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
