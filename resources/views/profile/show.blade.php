@extends('layout')

@section('title', 'WashingMashing | Profile')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar: User Info -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center text-white rounded-top">
                        <div class="mb-3">
                            <img src="images/avatar/information.png" alt="user avatar" class="" width="100">
                        </div>
                        <h5 class="mb-1">{{ $user->name }}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi-telephone-fill me-3"></i>
                                <span>+63 {{ $user->phone }}</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi-envelope-fill me-3"></i>
                                <span>{{ $user->email }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-danger px-2 py-2" style="font-size: 13px;">Delete Account</button>
                    </div>
                </div>
            </div>

            <!-- Main Content: Tabs -->
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="bookingTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="status-tab" data-bs-toggle="tab"
                                    data-bs-target="#status" type="button" role="tab">
                                    <i class="bi bi-clipboard-check"></i> Booking Status
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="edit-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#edit-profile" type="button" role="tab">
                                    <i class="bi bi-pencil-square"></i> Edit Profile
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content p-3" id="bookingTabContent">
                            <!-- Booking Status Tab -->
                            <div class="tab-pane fade show active" id="status" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Current Order Details</h6>
                                        <p>Service type: ???</p>
                                        <p>Payment method: ???</p>
                                        <p>Total Cost: ???</p>
                                        <p>Status: <span class="badge bg-warning text-dark">In Progress</span></p>
                                        <p>Order Date: ???</p>
                                        <p>Amount Date: ???</p>
                                        <p>Estimated Pickup Date: ???</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Previous Orders</h6>
                                        <ul class="list-group">
                                            <li class="list-group-item">##### - <span class="text-success">Completed</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Profile Tab -->
                            <div class="tab-pane fade" id="edit-profile" role="tabpanel">
                                <h5 class="mb-3">Edit Profile</h5>
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $user->name) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $user->email) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ old('phone', $user->phone) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ old('address', $user->address) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter new password (leave blank if unchanged)">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
