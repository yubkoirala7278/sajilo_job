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
                        <p class="text-muted">Confirm your password</p>
                    </div>

                    <!-- Instructions -->
                    <p class="text-center text-muted mb-4">
                        {{ __('Please confirm your password before continuing.') }}
                    </p>

                    <!-- Form -->
                    <form method="POST" action="{{ route('password.confirm') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                <input id="password" 
                                       type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" 
                                       required 
                                       autocomplete="current-password"
                                       placeholder="••••••••">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Confirm Password
                            </button>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" 
                                   class="btn btn-link text-primary text-decoration-none fw-semibold align-self-center">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>
                    </form>

                    <!-- Back to Login -->
                    <div class="text-center mt-4">
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