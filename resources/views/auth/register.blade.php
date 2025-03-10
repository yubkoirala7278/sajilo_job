@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="registration-container">
            <ul class="nav nav-tabs" id="registrationTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active employee-tab" id="employee-tab" data-bs-toggle="tab"
                        data-bs-target="#employee" type="button" role="tab" aria-controls="employee"
                        aria-selected="true">Employee</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link employer-tab" id="employer-tab" data-bs-toggle="tab" data-bs-target="#employer"
                        type="button" role="tab" aria-controls="employer" aria-selected="false">Employer</button>
                </li>
            </ul>

            <div class="tab-content" id="registrationTabContent">
                <!-- Employee Registration -->
                <div class="tab-pane fade show active" id="employee" role="tabpanel" aria-labelledby="employee-tab">
                    <h3 class="text-center mb-4">Employee Registration</h3>
                    <form id="employeeForm">
                        @csrf
                        <input type="hidden" name="role" value="employee">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Full Name"
                                id="name">
                            <span id="name-error" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="mobile_no" placeholder="Mobile Number"
                                id="mobile_no">
                            <span id="mobile_no-error" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" id="email">
                            <span id="email-error" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                id="password">
                            <span id="password-error" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirm Password" id="password_confirmation">
                            <span id="password_confirmation-error" class="text-danger"></span>
                        </div>

                        <button type="submit" class="btn btn-success text-white" id="employeeSubmit">
                            <span class="loading-icon d-none"><i class="fas fa-spinner fa-spin"></i> Loading...</span>
                            <span class="btn-text">Register</span>
                        </button>
                    </form>
                </div>

                <!-- Employer Registration -->
                <div class="tab-pane fade" id="employer" role="tabpanel" aria-labelledby="employer-tab">
                    <h3 class="text-center mb-4">Employer Registration</h3>
                    <form id="employerForm">
                        @csrf
                        <input type="hidden" name="role" value="employer">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Company Name"
                                id="company_name">
                            <span id="company_name-error" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Company Email"
                                id="company_email">
                            <span id="company_email-error" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                id="company_password">
                            <span id="company_password-error" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirm Password" id="company_password_confirmation">
                            <span id="company_password_confirmation-error" class="text-danger"></span>
                        </div>

                        <button type="submit" class="btn btn-success text-white" id="employerSubmit">
                            <span class="loading-icon d-none"><i class="fas fa-spinner fa-spin"></i> Loading...</span>
                            <span class="btn-text">Register</span>
                        </button>
                    </form>
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

                    var formData = $(this).serialize();
                    var button = $(submitButtonId);
                    button.prop('disabled', true);
                    button.find('.btn-text').addClass('d-none');
                    button.find('.loading-icon').removeClass('d-none');

                    // Clear previous error messages
                    $('.text-danger').text('');

                    $.ajax({
                        url: "{{ route('register') }}",
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(xhr) {
                            // Check if validation errors exist and display them
                            var errors = xhr.responseJSON.errors;
                            if (errors) {
                                for (var field in errors) {
                                    $('#' + field + '-error').text(errors[field][0]);
                                }
                            }
                            button.prop('disabled', false);
                            button.find('.btn-text').removeClass('d-none');
                            button.find('.loading-icon').addClass('d-none');
                        }
                    });
                });
            }

            handleFormSubmit("#employeeForm", "#employeeSubmit");
            handleFormSubmit("#employerForm", "#employerSubmit");
        });
    </script>
@endpush
