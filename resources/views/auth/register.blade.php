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
                        <p class="text-muted">Create your account</p>
                    </div>

                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-4 justify-content-center" id="registrationTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-semibold px-4" 
                                    id="employee-tab" 
                                    data-bs-toggle="pill" 
                                    data-bs-target="#employee" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="employee" 
                                    aria-selected="true">
                                Job Seeker
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-semibold px-4" 
                                    id="employer-tab" 
                                    data-bs-toggle="pill" 
                                    data-bs-target="#employer" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="employer" 
                                    aria-selected="false">
                                Employer
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="registrationTabContent">
                        <!-- Employee Registration -->
                        <div class="tab-pane fade show active" id="employee" role="tabpanel" aria-labelledby="employee-tab">
                            <form id="employeeForm" class="needs-validation" novalidate>
                                @csrf
                                <input type="hidden" name="role" value="employee">
                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                                        <input type="text" 
                                               class="form-control" 
                                               name="name" 
                                               placeholder="John Doe" 
                                               required>
                                    </div>
                                    <span class="text-danger small" id="name-error"></span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Mobile Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-telephone"></i></span>
                                        <input type="tel" 
                                               class="form-control" 
                                               name="mobile_no" 
                                               placeholder="+1 (555) 123-4567" 
                                               required>
                                    </div>
                                    <span class="text-danger small" id="mobile_no-error"></span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                        <input type="email" 
                                               class="form-control" 
                                               name="email" 
                                               placeholder="john.doe@example.com" 
                                               required>
                                    </div>
                                    <span class="text-danger small" id="email-error"></span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                        <input type="password" 
                                               class="form-control" 
                                               name="password" 
                                               placeholder="••••••••" 
                                               required>
                                    </div>
                                    <span class="text-danger small" id="password-error"></span>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                        <input type="password" 
                                               class="form-control" 
                                               name="password_confirmation" 
                                               placeholder="••••••••" 
                                               required>
                                    </div>
                                    <span class="text-danger small" id="password_confirmation-error"></span>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg" id="employeeSubmit">
                                        <span class="btn-text">Create Account</span>
                                        <span class="loading-icon d-none"><i class="bi bi-arrow-repeat fa-spin"></i> Processing...</span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Employer Registration -->
                        <div class="tab-pane fade" id="employer" role="tabpanel" aria-labelledby="employer-tab">
                            <form id="employerForm" class="needs-validation" novalidate>
                                @csrf
                                <input type="hidden" name="role" value="employer">
                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Company Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                                        <input type="text" 
                                               class="form-control" 
                                               name="name" 
                                               placeholder="Acme Corporation" 
                                               required>
                                    </div>
                                    <span class="text-danger small" id="name-error"></span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Mobile Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-telephone"></i></span>
                                        <input type="tel" 
                                               class="form-control" 
                                               name="mobile_no" 
                                               placeholder="+1 (555) 123-4567" 
                                               required>
                                    </div>
                                    <span class="text-danger small" id="mobile_no-error"></span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Company Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                        <input type="email" 
                                               class="form-control" 
                                               name="email" 
                                               placeholder="hr@acme.com" 
                                               required>
                                    </div>
                                    <span class="text-danger small" id="email-error"></span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                        <input type="password" 
                                               class="form-control" 
                                               name="password" 
                                               placeholder="••••••••" 
                                               required>
                                    </div>
                                    <span class="text-danger small" id="password-error"></span>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                        <input type="password" 
                                               class="form-control" 
                                               name="password_confirmation" 
                                               placeholder="••••••••" 
                                               required>
                                    </div>
                                    <span class="text-danger small" id="password_confirmation-error"></span>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg" id="employerSubmit">
                                        <span class="btn-text">Create Account</span>
                                        <span class="loading-icon d-none"><i class="bi bi-arrow-repeat fa-spin"></i> Processing...</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <p class="text-muted small">
                            Already have an account? 
                            <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-semibold">Sign In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function handleFormSubmit(formId, submitButtonId) {
        $(formId).on('submit', function(e) {
            e.preventDefault();
            
            const $form = $(this);
            const $button = $(submitButtonId);
            const formData = $form.serialize();

            $button.prop('disabled', true);
            $button.find('.btn-text').addClass('d-none');
            $button.find('.loading-icon').removeClass('d-none');
            $('.text-danger').text('');

            $.ajax({
                url: "{{ route('register') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    window.location.href = "{{ route('home') }}"; // Redirect to dashboard
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON?.errors;
                    if (errors) {
                        for (const field in errors) {
                            $(`#${field}-error`).text(errors[field][0]);
                        }
                    }
                    $button.prop('disabled', false);
                    $button.find('.btn-text').removeClass('d-none');
                    $button.find('.loading-icon').addClass('d-none');
                }
            });
        });
    }

    handleFormSubmit("#employeeForm", "#employeeSubmit");
    handleFormSubmit("#employerForm", "#employerSubmit");
});
</script>
@endpush