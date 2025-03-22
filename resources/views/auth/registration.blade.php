@extends('layout')

@section('title', 'WashingMashing | Registration')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
            <div class="card-header d-flex flex-column align-items-center mb-3">
                <img src="images/bubbles.png" class="logo img-fluid" alt="Logo" style="max-width: 150px;">

                {{-- Display error messages under the logo --}}
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

                @if (session('success'))
                    <div class="alert alert-success text-center w-100 mt-2">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('registration.post') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="register-name" class="form-label">Full Name</label>
                        <input id="register-name" class="form-control" type="text" name="name" value="{{ old('name') }}"
                            required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="register-email" class="form-label">Email</label>
                        <input id="register-email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="register-phone" class="form-label">Phone</label>
                        <input id="register-phone" class="form-control" type="text" name="phone" value="{{ old('phone') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="register-address" class="form-label">Address</label>
                        <input id="register-address" class="form-control" type="text" name="address"
                            value="{{ old('address') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="register-password" class="form-label">Password</label>
                        <input id="register-password" class="form-control" type="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="register-password-confirm" class="form-label">Confirm Password</label>
                        <input id="register-password-confirm" class="form-control" type="password"
                            name="password_confirmation" required>
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
@endsection