@extends('layouts.app')

@section('content')
<div class="container py-5 min-vh-100 d-flex align-items-center">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <!-- Branding -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary">Job Portal</h2>
                        <p class="text-muted">Verify your email address</p>
                    </div>

                    <!-- Success Message -->
                    @if (session('resent'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            {{ __('A fresh verification link has been sent to your email address.') }}
                            <button type="button" 
                                    class="btn-close" 
                                    data-bs-dismiss="alert" 
                                    aria-label="Close">
                            </button>
                        </div>
                    @endif

                    <!-- Verification Instructions -->
                    <div class="text-center">
                        <p class="mb-3">
                            <i class="bi bi-envelope-check text-primary me-2"></i>
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                        </p>
                        <p class="text-muted mb-4">
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" 
                                        class="btn btn-link text-primary text-decoration-none fw-semibold p-0 align-baseline">
                                    {{ __('click here to request another') }}
                                </button>.
                            </form>
                        </p>
                    </div>

                    <!-- Additional Info -->
                    <div class="card bg-light border-0 p-3 text-center">
                        <small class="text-muted">
                            Please check your spam/junk folder if you can't find the email in your inbox.
                        </small>
                    </div>

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