@extends('layout')

@section('title', 'Account Settings | WashingMashing')

@section('content')
    <x-header />

    @php
        $activeTab = 'account-general';
        if ($errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation')) {
            $activeTab = 'account-change-password';
        }
    @endphp

    <div class="container light-style flex-grow-1 container-p-y mt-4">
        <div class="mb-0">
            <a href="{{ route('user') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-arrow-left"></i> Back to home
            </a>
        </div>
        <br>
        <h4 class="font-weight-bold pd-3">Account settings</h4>

        <div class="card overflow-hidden">
            <div class="row g-0 row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <button
                            class="list-group-item list-group-item-action {{ $activeTab == 'account-general' ? 'active' : '' }}"
                            data-bs-toggle="tab" data-bs-target="#account-general">General</button>
                        <button
                            class="list-group-item list-group-item-action {{ $activeTab == 'account-change-password' ? 'active' : '' }}"
                            data-bs-toggle="tab" data-bs-target="#account-change-password">Change password</button>
                        <button
                            class="list-group-item list-group-item-action {{ $activeTab == 'account-info' ? 'active' : '' }}"
                            data-bs-toggle="tab" data-bs-target="#account-info">Info</button>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- General Tab -->
                        <div class="tab-pane fade {{ $activeTab == 'account-general' ? 'show active' : '' }}"
                            id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="images\avatar\information.png" alt="" class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label>
                                    &nbsp;
                                    <button type="button" class="btn btn-primary md-btn-flat">Reset</button>
                                    <div class="">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="generalForm" action="{{ route('user.update-details') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name', $user->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">E-mail</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="register-phone" class="form-label">Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+63</span>
                                            <input id="register-phone"
                                                class="form-control @error('phone') is-invalid @enderror" type="text"
                                                name="phone" pattern="\d{10}" value="{{ old('phone', $user->phone) }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            name="address" value="{{ old('address', $user->address) }}">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary"
                                            onclick="confirmSubmit('generalForm')">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Change Password Tab -->
                        <div class="tab-pane fade {{ $activeTab == 'account-change-password' ? 'show active' : '' }}"
                            id="account-change-password">
                            <div class="card-body pb-2">
                                <form id="passwordForm" method="POST" action="{{ route('user.update-password') }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Current Password</label>
                                        <input type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            name="current_password">
                                        @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Confirm New Password</label>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="alert alert-info">
                                        Make sure your new password is at least 6 characters long and includes a mix of
                                        letters, numbers, and symbols.
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary"
                                            onclick="confirmSubmit('passwordForm')">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Info Tab -->
                        <div class="tab-pane fade {{ $activeTab == 'account-info' ? 'show active' : '' }}"
                            id="account-info">
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

    <!-- Confirm Modal -->
    <div class="modal fade" id="confirmChangesModal" tabindex="-1" aria-labelledby="confirmChangesLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Changes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to save these changes?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmSubmitBtn" class="btn btn-primary">Yes, Save</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let formToSubmit = null;

        function confirmSubmit(formId) {
            formToSubmit = document.getElementById(formId);
            const modal = new bootstrap.Modal(document.getElementById('confirmChangesModal'));
            modal.show();
        }

        document.getElementById('confirmSubmitBtn').addEventListener('click', function() {
            if (formToSubmit) {
                formToSubmit.submit();
            }
        });
    </script>
@endsection
