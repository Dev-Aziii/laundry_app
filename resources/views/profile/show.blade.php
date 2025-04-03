@extends('layout')

@section('title', 'WashingMashing | Account Settings')

@section('content')
    <x-header />

    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3">
            Account settings
        </h4>

        <div class="card overflow-hidden">
            <div class="row g-0 row-bordered row-border-light">
                <!-- Sidebar: Navigation Tabs -->
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <button class="list-group-item list-group-item-action active" data-bs-toggle="tab"
                            data-bs-target="#account-general">General</button>
                        <button class="list-group-item list-group-item-action" data-bs-toggle="tab"
                            data-bs-target="#account-change-password">Change password</button>
                        <button class="list-group-item list-group-item-action" data-bs-toggle="tab"
                            data-bs-target="#account-info">Info</button>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- General Tab -->
                        <div class="tab-pane fade show active" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="images\avatar\information.png" alt="" class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-primary md-btn-flat">Reset</button>

                                    <div class="">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $user->name) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">E-mail</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email', $user->email) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ old('phone', $user->phone) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ old('address', $user->address) }}">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Change Password Tab -->
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" class="form-control" name="current_password">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                    <div class="alert alert-info">Make sure your new password is at least 8 characters long
                                        and includes a mix of letters, numbers, and symbols.</div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Info Tab -->
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Bio</label>
                                        <textarea class="form-control" name="bio" rows="5">{{ old('bio', $user->bio ?? '') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Birthday</label>
                                        <input type="date" class="form-control" name="birthday"
                                            value="{{ old('birthday', $user->birthday ?? '') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <select class="form-select" name="country">
                                            <option value="USA"
                                                {{ old('country', $user->country ?? '') == 'USA' ? 'selected' : '' }}>USA
                                            </option>
                                            <option value="Canada"
                                                {{ old('country', $user->country ?? '') == 'Canada' ? 'selected' : '' }}>
                                                Canada</option>
                                            <option value="UK"
                                                {{ old('country', $user->country ?? '') == 'UK' ? 'selected' : '' }}>UK
                                            </option>
                                            <option value="Germany"
                                                {{ old('country', $user->country ?? '') == 'Germany' ? 'selected' : '' }}>
                                                Germany</option>
                                            <option value="France"
                                                {{ old('country', $user->country ?? '') == 'France' ? 'selected' : '' }}>
                                                France</option>
                                        </select>
                                    </div>
                                    <div class="alert alert-info">Providing your bio and country helps personalize your
                                        experience.</div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
