@extends('layout')

@section('title', 'Login | WashingMashing')

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
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <input type="hidden" name="redirect_url" value="{{ request()->query('redirect_url') }}">

                    <div class="mb-3">
                        <label for="login-email" class="form-label">Email</label>
                        <input id="login-email" class="form-control" type="email" name="email"
                            value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="login-password" class="form-label">Password</label>
                        <input id="login-password" class="form-control" type="password" name="password" required>
                    </div>

                    <div class="d-flex flex-column align-items-center">
                        <button class="btn btn-primary w-75">Log in</button>
                        <a href="#" class="text-decoration-none mt-2">Forgot your password?</a>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center">
                <span>Don't have an account yet?</span>
                <a href="{{ route('registration') }}" class="text-decoration-none">Sign up here</a>
            </div>
        </div>
    </div>

@endsection

<script>
    // Set the time interval in milliseconds (e.g., 10 seconds)
    setTimeout(function() {
        location.reload(); // This will reload the current page
    }, 10000); // 10000 ms = 10 seconds
</script>
