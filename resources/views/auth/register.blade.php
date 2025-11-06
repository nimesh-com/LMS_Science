@extends('layouts.frontend')

@section('content')
<style>
    .register-wrapper {
        min-height: 100vh;
        background-color: #f8f9fa;
        padding: 2rem 0;
    }

    .register-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.05);
    }

    .profile-upload {
        width: 150px;
        height: 150px;
        position: relative;
        margin: 0 auto;
    }

    .profile-upload img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .profile-upload .upload-icon {
        position: absolute;
        bottom: 0;
        right: 0;
        background: #0d6efd;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        border: 3px solid #fff;
    }

    .input-group-text {
        background-color: #f8f9fa;
        border-right: none;
    }

    .form-control {
        border-left: none;
    }

    .form-control:focus {
        border-left: none;
        box-shadow: none;
    }
</style>

<div class="register-wrapper d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="register-card p-4 p-md-5">
                    <!-- Header with Logo -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold mb-1">Create Account</h2>
                        <p class="text-muted">Join our learning community today</p>
                    </div>

                    <!-- Rest of the form remains the same -->
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Profile Image Upload -->
                        <div class="profile-upload mb-4">
                            <img id="preview_image" src="{{ asset('images/default-avatar.png') }}" alt="Profile Preview">
                            <div class="upload-icon" onclick="document.getElementById('profile_image').click()">
                                <i class="bi bi-camera-fill"></i>
                            </div>
                            <input type="file"
                                id="profile_image"
                                name="profile_image"
                                class="d-none"
                                accept="image/*"
                                onchange="previewImage(this)">
                        </div>

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Enter your full name">
                            </div>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="your.email@example.com">
                            </div>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-house-fill"></i></span>
                                <input type="text"
                                    class="form-control @error('address') is-invalid @enderror"
                                    name="address"
                                    value="{{ old('address') }}"
                                    placeholder="Enter your address">
                            </div>
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-phone-fill"></i></span>
                                <input type="text"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    placeholder="Enter your phone number">
                            </div>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    placeholder="Min. 8 characters">
                            </div>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    placeholder="Repeat password">
                            </div>
                        </div>

                        <!-- Terms -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms">
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-decoration-none">Terms of Service</a>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button with updated styling -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 px-4 rounded-pill">
                                <i class="bi bi-person-plus-fill me-2"></i>Create Account
                            </button>
                            <p class="text-center mt-3 mb-0">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-primary text-decoration-none">Sign in</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Keep the existing script -->
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview_image').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection