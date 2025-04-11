@extends('backend.employer_dashboard.layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Profile Card -->
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="mb-0">Employer Profile</h3>
                </div>
                <div class="card-body p-4">
                    <div class="row d-flex align-items-center justify-content-between">
                        <!-- Left Column: Logo and Basic Info -->
                        <div class="col-md-4 text-center">
                            <img src="{{ $employer->company_logo ? asset('storage/' . $employer->company_logo) : asset('backend/img/jobs/techskill.jpeg') }}" 
                                 class="img-fluid mb-3" 
                                 style="width: 150px; height: 150px; object-fit: cover;" 
                                 alt="Company Logo">
                            <h4 class="fw-bold">{{ $user->name }}</h4>
                            <p class="text-muted">{{ $user->email }}</p>
                        </div>

                        <!-- Right Column: Detailed Info -->
                        <div class="col-md-8">
                            <div class="row mb-3">
                                <div class="col-sm-4 fw-bold">Contact Number:</div>
                                <div class="col-sm-8">{{ $employer->contact_number ?? 'Not provided' }}</div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-sm-4 fw-bold">Website:</div>
                                <div class="col-sm-8">
                                    @if ($employer->company_website)
                                        <a href="{{ $employer->company_website }}" target="_blank" class="text-primary">{{ $employer->company_website }}</a>
                                    @else
                                        Not provided
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-sm-4 fw-bold">Address:</div>
                                <div class="col-sm-8">{{ $employer->company_address ?? 'Not provided' }}</div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-sm-4 fw-bold">Description:</div>
                                <div class="col-sm-8">{{ $employer->company_description ?? 'No description available' }}</div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-sm-4 fw-bold">Job Categories:</div>
                                <div class="col-sm-8">
                                    @if ($employer->jobCategories->isNotEmpty())
                                        @foreach ($employer->jobCategories as $category)
                                            <span class="badge bg-success me-1 mb-1">{{ $category->category }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">No categories assigned</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center bg-light">
                    <a href="{{ route('admin.employer.profile') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    .card-header {
        border-bottom: none;
    }
    .badge {
        font-size: 0.9rem;
        padding: 0.5em 1em;
    }
    .fw-bold {
        color: #343a40;
    }
</style>
@endsection