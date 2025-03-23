@extends('layout')

@section('title', 'WashingMashing | Registration')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
            <div class="card-header d-flex flex-column align-items-center mb-3">
                <img src="images/bubbles.png" class="logo img-fluid" alt="Logo" style="max-width: 150px;">
                
                @if (session('error'))
                    <div class="alert alert-danger text-center w-100 mt-2">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger text-center w-100 mt-2">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('registration.post') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="register-name" class="form-label">Full Name</label>
                        <input id="register-name" class="form-control" type="text" name="name" value="{{ old('name') }}"
                            required autofocus>
                        <div class="invalid-feedback">Please enter your full name.</div>
                    </div>

                    <div class="mb-3">
                        <label for="register-email" class="form-label">Email</label>
                        <input id="register-email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                            required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>

                    <div class="mb-3">
                        <label for="register-phone" class="form-label">Phone</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">+63</span>
                            <input id="register-phone" class="form-control" type="text" name="phone" pattern="\d{10}"
                                value="{{ old('phone') }}" required>
                            <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="register-address" class="form-label">Address</label>
                        <input id="register-address" class="form-control" type="text" name="address"
                            value="{{ old('address') }}" required>
                        <div class="invalid-feedback">Please enter your address.</div>
                    </div>

                    <div class="mb-3">
                        <label for="register-password" class="form-label">Password</label>
                        <input id="register-password" class="form-control" type="password" name="password" required>
                        <div class="invalid-feedback">Please enter a password.</div>
                    </div>

                    <div class="mb-3">
                        <label for="register-password-confirm" class="form-label">Confirm Password</label>
                        <input id="register-password-confirm" class="form-control" type="password"
                            name="password_confirmation" required>
                        <div class="invalid-feedback">Please confirm your password.</div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-75">Sign Up</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}" class="text-decoration-none">Log in here</a>
            </div>
        </div>
    </div>

    <script>
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');

            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });

                form.querySelectorAll('input').forEach(function (input) {
                    input.addEventListener('input', function () {
                        if (input.checkValidity()) {
                            input.classList.add('is-valid');
                            input.classList.remove('is-invalid');
                        } else {
                            input.classList.add('is-invalid');
                            input.classList.remove('is-valid');
                        }
                    });
                });
            });
        })();
    </script>
@endsection