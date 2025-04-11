@extends('layouts.app')

@section('content')
<div class="container py-5 min-vh-100 d-flex align-items-center">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-md-8 col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <!-- Branding -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary">Job Portal</h2>
                        <p class="text-muted">Reset your password</p>
                    </div>

                    <!-- Success Message -->
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            {{ session('status') }}
                            <button type="button" 
                                    class="btn-close" 
                                    data-bs-dismiss="alert" 
                                    aria-label="Close">
                            </button>
                        </div>
                    @endif

                    <!-- Form -->
                    <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                <input id="email" 
                                       type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autocomplete="email" 
                                       autofocus
                                       placeholder="your.email@example.com">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <small class="text-muted form-text">
                                We'll send a password reset link to this email.
                            </small>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Send Reset Link
                            </button>
                        </div>
                    </form>

                    <!-- Back to Login -->
                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" 
                           class="text-primary text-decoration-none fw-semibold small">
                            <i class="bi bi-arrow-left me-1"></i>Back to Sign In
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection