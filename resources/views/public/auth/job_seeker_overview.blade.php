@extends('public.layouts.master')

@section('custom-css')
    <style>
        .employee-detail p {
            font-size: 14px;
        }

        .nav-tabs .nav-link {
            border: none;
            border-bottom: 3px solid transparent;
            color: #666;
            transition: all 0.3s;
        }

        .nav-tabs .nav-link.active {
            border-bottom: 3px solid #007bff;
            color: #007bff;
            background-color: #f8f9fa;
        }

        .nav-tabs .nav-link:hover {
            border-bottom: 3px solid #007bff;
            color: #007bff;
        }

        .table td {
            vertical-align: middle;
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .nav-tabs {
                flex-direction: column;
            }

            .nav-item {
                width: 100%;
            }
        }
        .category-item {
        transition: all 0.3s ease;
        background-color: #fff;
        border: 1px solid #eee;
    }

    .category-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        border-color: #007bff;
    }

    .card-body {
        padding: 1rem !important;
    }

    .card-body a {
        font-size: 0.95rem;
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .card {
        border-radius: 10px;
        overflow: hidden;
    }

    .h-100 {
        height: 100% !important;
    }

    @media (max-width: 768px) {
        .category-item {
            margin-bottom: 15px;
        }
        
        .card-body a {
            font-size: 0.9rem;
        }
    }
    </style>
@endsection

@section('content')
    <main>
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-4">
                    {{-- card one --}}
                    <div class="card border-0 shadow-sm" style="background: #f8f9fa;">
                        <div class="card-body text-left p-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                <label class="form-check-label" for="defaultCheck1">
                                    Actively Searching for Job? <i class="fas fa-info-circle text-muted"
                                        style="font-size: 0.8em;"></i>
                                </label>
                            </div>
                            <p class="text-muted mb-0" style="font-size: 0.9em;">
                                Expires on: March 12, 2025
                            </p>
                        </div>
                    </div>
                    {{-- card two --}}
                    <div class="card border-0 shadow-sm mt-4" style="background: #f8f9fa; border-radius: 8px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle overflow-hidden"
                                    style="width: 60px; height: 60px; background: #e9ecef;">
                                    <!-- Placeholder for profile image (you can replace with an actual image) -->
                                    <svg class="w-100 h-100" fill="#6c757d" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h5 class="card-title mb-0">Mr. Saru Dahal</h5>
                                    <p class="text-muted mb-0" style="font-size: 0.8em;">Profile Completeness: 15%</p>
                                    <div class="progress" style="height: 4px; margin-top: 2px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 15%;"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 employee-detail">
                                <p class="mb-1"><i class="fas fa-map-marker-alt text-muted mr-2"></i> <span
                                        class="font-weight-bold">Current Address:</span> Kathmandu</p>
                                <p class="mb-1"><i class="fas fa-calendar-alt text-muted mr-2"></i> <span
                                        class="font-weight-bold">Age:</span> 26</p>
                                <p class="mb-1"><i class="fas fa-money-bill-alt text-muted mr-2"></i> <span
                                        class="font-weight-bold">Expected Salary:</span> NRs. 55,555 Monthly</p>
                                <p class="mb-1"><i class="fas fa-briefcase text-muted mr-2"></i> <span
                                        class="font-weight-bold">Preferred Job Category:</span> Commercial / Logistics</p>
                                <p class="mb-1"><i class="fas fa-location-arrow text-muted mr-2"></i> <span
                                        class="font-weight-bold">Preferred Job Location:</span> Kathmandu</p>
                            </div>

                            <div class="mt-3 ">
                                <a href="#" class="btn btn-sm btn-transparent text-dark  " style="font-size: 0.9em;">
                                    <i class="fas fa-file-pdf mr-2"></i> Convert my profile into resume in PDF format
                                </a>
                                <a href="#" class="btn btn-sm btn-transparent text-dark  " style="font-size: 0.9em;">
                                    <i class="fas fa-eye mr-2"></i> View my profile as employer PDF format
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- card three --}}
                    <div class="card border-0 shadow-sm mb-3 w-100 mt-4" style="background: #f8f9fa; border-radius: 8px;">
                        <div class="container">
                            <div class="mt-3">
                                <div class="row mt-2 align-items-center">
                                    <div class="col-2 text-center">
                                        <span class="fas fa-user-check text-muted" style="font-size: 1.5em;"></span>
                                    </div>
                                    <div class="col-10 text-center">
                                        <p class="text-muted mb-0" style="font-size: 15px;">
                                            Complete your profile<br>
                                            <span class="font-weight-bold" style="font-size:13px">
                                                <a href="{{route('employee.profile','job_preference')}}"
                                                    class="text-dark text-decoration-none">
                                                    Fill all the required information to apply for a job.
                                                </a>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody style="font-size: 12px">
                                            <tr>
                                                <td>
                                                    <a href="{{route('employee.profile','job_preference')}}"
                                                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none ">
                                                        <div><i class="fas fa-briefcase text-muted mr-2"></i> Job Preference
                                                        </div>
                                                        <i class="fas fa-times-circle text-danger" data-toggle="tooltip"
                                                            title="Incomplete"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('employee.profile','basic_information')}}"
                                                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none ">
                                                        <div><i class="fas fa-id-card text-muted mr-2"></i> Basic
                                                            Information</div>
                                                        <i class="fas fa-times-circle text-danger" data-toggle="tooltip"
                                                            title="Incomplete"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{route('employee.profile','education')}}"
                                                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none ">
                                                        <div><i class="fas fa-graduation-cap text-muted mr-2"></i> Education
                                                        </div>
                                                        <i class="fas fa-times-circle text-danger" data-toggle="tooltip"
                                                            title="Incomplete"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('employee.profile','training')}}"
                                                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none ">
                                                        <div><i class="fas fa-chalkboard-teacher text-muted mr-2"></i>
                                                            Training</div>
                                                        <i class="fas fa-times-circle text-danger" data-toggle="tooltip"
                                                            title="Incomplete"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{route('employee.profile','work_experience')}}"
                                                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none ">
                                                        <div><i class="fas fa-building text-muted mr-2"></i> Work
                                                            Experience</div>
                                                        <i class="fas fa-check-circle text-success" data-toggle="tooltip"
                                                            title="Completed"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('employee.profile','language')}}"
                                                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none ">
                                                        <div><i class="fas fa-globe text-muted mr-2"></i> Language</div>
                                                        <i class="fas fa-times-circle text-danger" data-toggle="tooltip"
                                                            title="Incomplete"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{route('employee.profile','social_account')}}"
                                                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none ">
                                                        <div><i class="fas fa-share-alt text-muted mr-2"></i> Social
                                                            Account</div>
                                                        <i class="fas fa-times-circle text-danger" data-toggle="tooltip"
                                                            title="Incomplete"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('employee.profile','reference')}}"
                                                        class="d-flex justify-content-between align-items-center text-dark text-decoration-none ">
                                                        <div><i class="fas fa-users text-muted mr-2"></i> Reference</div>
                                                        <i class="fas fa-times-circle text-danger" data-toggle="tooltip"
                                                            title="Incomplete"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-8">
                    {{-- card 1 --}}
                    <div class="shadow-sm rounded" style="background: #f8f9fa;">
                        <div class="row text-center">
                            <div class="col-md-3 col-6">
                                <a href="/jobseeker/statistics/" class="text-decoration-none ">
                                    <div class="p-3">
                                        <h4 class="font-weight-bold mt-2 mb-0 text-success">0</h4>
                                        <p class="text-muted mb-0">Job Applied</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="/jobseeker/statistics/?profile-visits=true" class="text-decoration-none ">
                                    <div class="p-3">
                                        <h4 class="font-weight-bold mt-2 mb-0 text-info">0</h4>
                                        <p class="text-muted mb-0">Profile Visits</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="/jobseeker/statistics/?cv-download=true" class="text-decoration-none ">
                                    <div class="p-3">
                                        <h4 class="font-weight-bold mt-2 mb-0 text-danger">0</h4>
                                        <p class="text-muted mb-0">CV Download</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="/jobseeker/statistics/?following=true" class="text-decoration-none ">
                                    <div class="p-3">
                                        <h4 class="font-weight-bold mt-2 mb-0 text-warning">0</h4>
                                        <p class="text-muted mb-0">Following(s)</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- card 2 --}}
                    <div class="shadow-sm rounded mt-4" style="background: #f8f9fa;">
                        <div class="card-body p-0">
                            <!-- Nav Tabs -->
                            <ul class="nav nav-tabs nav-fill" id="jobTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active py-3" id="match-tab" data-toggle="tab" href="#match-jobs"
                                        role="tab">
                                        <i class="fas fa-id-card mr-2"></i>
                                        Matching Jobs
                                        <span class="badge badge-success badge-pill ml-2">3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3" id="recent-tab" data-toggle="tab" href="#recent-jobs"
                                        role="tab">
                                        <i class="fas fa-clock mr-2"></i>
                                        Recent Applications
                                        <span class="badge badge-info badge-pill ml-2">0</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3" id="saved-tab" data-toggle="tab" href="#saved-jobs"
                                        role="tab">
                                        <i class="fas fa-bookmark mr-2"></i>
                                        Saved Jobs
                                        <span class="badge badge-warning badge-pill ml-2">0</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content p-3">
                                <!-- Matching Jobs Tab -->
                                <div class="tab-pane fade show active" id="match-jobs" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Position</th>
                                                    <th>Company</th>
                                                    <th>Deadline</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="/inventory-officer-19/" class="text-primary"
                                                            data-toggle="tooltip" title="Inventory Officer">
                                                            Inventory Officer
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <img src="/media/cache/00/87/0087eeb5eaf4d6340f18f105ca7005cc.jpg"
                                                            alt="" class="rounded-circle mr-2" width="25">
                                                        <a href="/employer/hukut-store-pvt-ltd/" class="text-dark">Hukut
                                                            Store</a>
                                                    </td>
                                                    <td>March 14, 2025</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-link text-muted"
                                                                data-toggle="dropdown">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="/inventory-officer-19/">
                                                                    <i class="fas fa-eye mr-2"></i>View Details
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Add other job rows similarly -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-right mt-3">
                                        <a href="/jobseeker/matching-profile/" class="btn btn-outline-primary">View
                                            All</a>
                                    </div>
                                </div>

                                <!-- Recent Applications Tab -->
                                <div class="tab-pane fade" id="recent-jobs" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Position</th>
                                                    <th>Company</th>
                                                    <th>Deadline</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="alert alert-info text-center mb-0">
                                                            <i class="fas fa-info-circle mr-2"></i>
                                                            Study more about jobs on
                                                            <a href="/search/" class="alert-link font-weight-bold">Search
                                                                & Apply</a>!
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-right mt-3">
                                        <a href="/jobseeker/recently-applied/" class="btn btn-outline-primary">View
                                            All</a>
                                    </div>
                                </div>

                                <!-- Saved Jobs Tab -->
                                <div class="tab-pane fade" id="saved-jobs" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Position</th>
                                                    <th>Company</th>
                                                    <th>Deadline</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4">
                                                        <div class="alert alert-info text-center mb-0">
                                                            <i class="fas fa-info-circle mr-2"></i>
                                                            No saved jobs yet. Go to
                                                            <a href="/search/" class="alert-link font-weight-bold">Search
                                                                & Apply</a>!
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-right mt-3">
                                        <a href="/jobseeker/favorite/" class="btn btn-outline-primary">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- card 3 --}}
                    <div class="shadow-sm rounded mt-4" style="background: #f8f9fa;">
                        <div class="card-header bg-white border-bottom py-3">
                            <h6 class="mb-0">
                                <i class="fas fa-folder text-primary mr-2"></i>
                                <span class="text-muted font-weight-bold">Jobs By Category</span>
                            </h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4" style="row-gap: 20px;">
                                <!-- Category Item -->
                                <div class="col">
                                    <div class="card h-100 shadow-sm category-item">
                                        <div class="card-body p-3 d-flex align-items-center nowrap">
                                            <i class="fas fa-calculator text-info mr-2 fa-lg"></i>
                                            <a href="/category/accounting-finance/" 
                                               class="text-dark text-decoration-none stretched-link flex-grow-1 text-truncate" 
                                               title="Accounting / Finance">
                                                Accounting / Finance
                                            </a>
                                            <span class="badge badge-info badge-pill ml-2">83</span>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col">
                                    <div class="card h-100 shadow-sm category-item">
                                        <div class="card-body p-3 d-flex align-items-center nowrap">
                                            <i class="fas fa-drafting-compass text-info mr-2 fa-lg"></i>
                                            <a href="/category/architecture-interior-designing/" 
                                               class="text-dark text-decoration-none stretched-link flex-grow-1 text-truncate" 
                                               title="Architecture / Interior Designing">
                                                Architecture / Interior Design
                                            </a>
                                            <span class="badge badge-info badge-pill ml-2">1</span>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col">
                                    <div class="card h-100 shadow-sm category-item">
                                        <div class="card-body p-3 d-flex align-items-center nowrap">
                                            <i class="fas fa-university text-info mr-2 fa-lg"></i>
                                            <a href="/category/banking-insurance-financial-services/" 
                                               class="text-dark text-decoration-none stretched-link flex-grow-1 text-truncate" 
                                               title="Banking / Insurance /Financial Services">
                                                Banking / Insurance / Finance
                                            </a>
                                            <span class="badge badge-info badge-pill ml-2">32</span>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col">
                                    <div class="card h-100 shadow-sm category-item">
                                        <div class="card-body p-3 d-flex align-items-center nowrap">
                                            <i class="fas fa-truck text-info mr-2 fa-lg"></i>
                                            <a href="/category/commercial-logistics-supply-chain/" 
                                               class="text-dark text-decoration-none stretched-link flex-grow-1 text-truncate" 
                                               title="Commercial / Logistics / Supply Chain">
                                                Logistics / Supply Chain
                                            </a>
                                            <span class="badge badge-info badge-pill ml-2">3</span>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col">
                                    <div class="card h-100 shadow-sm category-item">
                                        <div class="card-body p-3 d-flex align-items-center nowrap">
                                            <i class="fas fa-hard-hat text-info mr-2 fa-lg"></i>
                                            <a href="/category/construction-engineering-architects/" 
                                               class="text-dark text-decoration-none stretched-link flex-grow-1 text-truncate" 
                                               title="Construction / Engineering / Architects">
                                                Construction / Engineering
                                            </a>
                                            <span class="badge badge-info badge-pill ml-2">30</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Continue with remaining categories -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
