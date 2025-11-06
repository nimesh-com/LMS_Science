@extends('layouts.frontend')

@section('content')
<style>
    .auth-wrapper {
        min-height: 100vh;
        background-color: #f8f9fa;
        padding: 2rem 0;
    }

    .auth-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.05);
    }

    .brand-logo {
        height: 60px;
    }

    .input-group-text {
        background-color: #f8f9fa;
        border-right: none;
    }

    .form-control {
        border-left: none;
    }

    .form-control:focus {
        box-shadow: none;
    }
</style>

<div class="auth-wrapper d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <div class="auth-card p-4 p-md-5">

                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="brand-logo mb-3">
                        <h3 class="fw-bold mb-1">Welcome Back</h3>
                        <p class="text-muted mb-0">Sign in to continue to your student dashboard</p>
                    </div>

                    @if (session('status'))
                    <div class="alert alert-success small" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    required autocomplete="username" autofocus placeholder="you@example.com">
                            </div>
                            @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input id="password" type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    required autocomplete="current-password" placeholder="Enter your password">
                            </div>
                            @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                                <label class="form-check-label small" for="remember_me">Remember me</label>
                            </div>

                            @if (Route::has('password.request'))
                            <a class="small text-decoration-none" href="{{ route('password.request') }}">
                                Forgot password?
                            </a>
                            @endif
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary py-2">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Log in
                            </button>
                        </div>

                        <p class="text-center small mb-0">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-primary text-decoration-none">Create account</a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection