@extends('admin.layout.master')

@section('header-content')
    <style>
        .profile-container {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .header-bar {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-bottom: 1px solid #dee2e6;
            padding: 1.5rem 2rem;
            border-radius: 10px 10px 0 0;
            margin: -2rem -2rem 2rem;
        }

        .section-header {
            color: #1e3a8a;
            font-weight: 600;
            font-size: 1.5rem;
            border-bottom: 3px solid #3b82f6;
            padding-bottom: 0.5rem;
            margin-bottom: 1.75rem;
            position: relative;
        }

        .section-header::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background: #3b82f6;
            bottom: -3px;
            left: 0;
        }

        .info-table td {
            padding: 1rem 0;
            vertical-align: middle;
        }

        .label-col {
            width: 25%;
            min-width: 180px;
            color: #4b5563;
            font-weight: 600;
            font-size: 1rem;
        }

        .value-col {
            color: #1f2937;
            font-weight: 400;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #3b82f6;
            object-fit: cover;
            margin-right: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .badge-professional {
            background: #e5e7eb;
            color: #374151;
            padding: 0.5rem 1rem;
            border-radius: 50rem;
            font-size: 0.9rem;
            margin: 0.3rem;
            display: inline-block;
            transition: all 0.2s ease;
        }

        .badge-professional:hover {
            background: #d1d5db;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 50rem;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .btn-professional {
            background: #3b82f6;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-professional:hover {
            background: #2563eb;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .label-col {
                width: 100%;
                display: block;
                margin-bottom: 0.5rem;
            }

            .info-table td {
                display: block;
                width: 100%;
            }

            .profile-avatar {
                width: 100px;
                height: 100px;
                margin: 0 auto 1rem;
                display: block;
            }

            .header-bar {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-bar .btn {
                margin-top: 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <main id="main" class="main py-5">
        <div class="container-fluid">
            <!-- Header Bar -->
            <div class="header-bar d-flex justify-content-between align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}" class="text-muted">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('job.seeker.management') }}" class="text-muted">
                                <i class="fas fa-users me-1"></i> Job Seeker Management
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <i class="fas fa-user me-1"></i> Employee Profile
                        </li>
                    </ol>
                </nav>
                <a href="{{ route('job.seeker.management') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left me-2"></i> Back to List
                </a>
            </div>

            <!-- Profile Container -->
            <div class="profile-container">
                <div class="d-flex align-items-center flex-wrap mb-5">
                    <img src="{{ $employee->employee->profile ? asset('storage/' . $employee->employee->profile) : asset('admin/assets/img/profile.png') }}"
                        alt="Profile" class="profile-avatar">
                    <div>
                        <h2 class="fw-bold mb-2" style="color: #1e3a8a;">{{ $employee->name ?? 'N/A' }}</h2>
                        <span class="badge status-badge {{ $employee->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                            <i
                                class="fas {{ $employee->status == 'active' ? 'fa-check-circle' : 'fa-times-circle' }} me-1"></i>
                            {{ ucfirst($employee->status) }}
                        </span>
                    </div>
                </div>

                <!-- Objective -->
                <h3 class="section-header"><i class="fas fa-bullseye me-2"></i> Career Objective</h3>
                <p class="text-muted mb-5 lead">{{ $employee->employee->career_objective_summary ?? 'Not specified' }}</p>

                <!-- Personal Information -->
                <h3 class="section-header"><i class="fas fa-user me-2"></i> Personal Information</h3>
                <table class="info-table mb-5">
                    <tr>
                        <td class="label-col"><i class="fas fa-envelope me-2"></i> Email</td>
                        <td class="value-col">{{ $employee->email ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-venus-mars me-2"></i> Gender</td>
                        <td class="value-col">{{ $employee->employee->gender ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-birthday-cake me-2"></i> Date of Birth</td>
                        <td class="value-col">
                            {{ $employee->employee->date_of_birth ? \Carbon\Carbon::parse($employee->employee->date_of_birth)->format('F d, Y') : 'N/A' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-ring me-2"></i> Marital Status</td>
                        <td class="value-col">{{ $employee->employee->marital_status ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-pray me-2"></i> Religion</td>
                        <td class="value-col">{{ $employee->employee->religion->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-wheelchair me-2"></i> Disability</td>
                        <td class="value-col">
                            {{ $employee->employee->is_disabled !== null ? ($employee->employee->is_disabled ? 'Yes' : 'No') : 'N/A' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-flag me-2"></i> Nationality</td>
                        <td class="value-col">{{ $employee->employee->nationality ?? 'N/A' }}</td>
                    </tr>
                </table>

                <!-- Contact Information -->
                <h3 class="section-header"><i class="fas fa-address-book me-2"></i> Contact Information</h3>
                <table class="info-table mb-5">
                    <tr>
                        <td class="label-col"><i class="fas fa-phone me-2"></i> Contact Number</td>
                        <td class="value-col">{{ $employee->employee->contact_number ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-map-marker-alt me-2"></i> Current Address</td>
                        <td class="value-col">{{ $employee->employee->current_address ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-home me-2"></i> Permanent Address</td>
                        <td class="value-col">{{ $employee->employee->permanent_address ?? 'N/A' }}</td>
                    </tr>
                </table>

                <!-- Job Information -->
                <h3 class="section-header"><i class="fas fa-briefcase me-2"></i> Job Information</h3>
                <table class="info-table mb-5">
                    <tr>
                        <td class="label-col"><i class="fas fa-level-up-alt me-2"></i> Job Level</td>
                        <td class="value-col">{{ $employee->employee->job_level ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-money-bill-wave me-2"></i> Expected Salary</td>
                        <td class="value-col">
                            {{ $employee->employee->expected_salary_currency ?? '' }}
                            {{ $employee->employee->expected_salary_operator ?? '' }}
                            {{ $employee->employee->expected_salary ?? 'N/A' }}
                            <span
                                class="badge text-bg-success">{{ $employee->employee->expected_salary_unit ?? '' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-wallet me-2"></i> Current Salary</td>
                        <td class="value-col">
                            {{ $employee->employee->current_salary_currency ?? '' }}
                            {{ $employee->employee->current_salary_operator ?? '' }}
                            {{ $employee->employee->current_salary ?? 'N/A' }}
                            <span class="badge text-bg-success">{{ $employee->employee->current_salary_unit ?? '' }}</span>
                        </td>
                    </tr>
                </table>

                <!-- Language -->
                <!-- Language -->
                <!-- Language -->
                <h3 class="section-header"><i class="fas fa-language me-2"></i> Language</h3>
                <div class="row g-3 mb-5">
                    @if (count($employee->employee->language) > 0)
                        @foreach ($employee->employee->language as $language)
                            <div class="col-md-6 col-lg-3">
                                <div class="card h-100 border-0 shadow-md" style="border-radius: 10px;">
                                    <div class="card-body p-3">
                                        <h5 class="card-title mb-3" style="color: #1e3a8a;">
                                            <i class="fas fa-comment me-2"></i> {{ $language->language }}
                                        </h5>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2 d-flex align-items-center">
                                                <span class="badge bg-primary-subtle text-primary me-2"
                                                    style="width: 90px;">
                                                    <i class="fas fa-book-open me-1"></i> Reading
                                                </span>
                                                <span class="text-warning">
                                                    @php
                                                        $readingStars = match ($language->reading) {
                                                            'very_poor' => 1,
                                                            'poor' => 2,
                                                            'average' => 3,
                                                            'good' => 4,
                                                            'very_good' => 5,
                                                            default => 0,
                                                        };
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            echo $i <= $readingStars
                                                                ? '<i class="fas fa-star"></i>'
                                                                : '<i class="far fa-star"></i>';
                                                        }
                                                    @endphp
                                                </span>
                                            </li>
                                            <li class="mb-2 d-flex align-items-center">
                                                <span class="badge bg-primary-subtle text-primary me-2"
                                                    style="width: 90px;">
                                                    <i class="fas fa-pen me-1"></i> Writing
                                                </span>
                                                <span class="text-warning">
                                                    @php
                                                        $writingStars = match ($language->writing) {
                                                            'very_poor' => 1,
                                                            'poor' => 2,
                                                            'average' => 3,
                                                            'good' => 4,
                                                            'very_good' => 5,
                                                            default => 0,
                                                        };
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            echo $i <= $writingStars
                                                                ? '<i class="fas fa-star"></i>'
                                                                : '<i class="far fa-star"></i>';
                                                        }
                                                    @endphp
                                                </span>
                                            </li>
                                            <li class="mb-2 d-flex align-items-center">
                                                <span class="badge bg-primary-subtle text-primary me-2"
                                                    style="width: 90px;">
                                                    <i class="fas fa-microphone me-1"></i> Speaking
                                                </span>
                                                <span class="text-warning">
                                                    @php
                                                        $speakingStars = match ($language->speaking) {
                                                            'very_poor' => 1,
                                                            'poor' => 2,
                                                            'average' => 3,
                                                            'good' => 4,
                                                            'very_good' => 5,
                                                            default => 0,
                                                        };
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            echo $i <= $speakingStars
                                                                ? '<i class="fas fa-star"></i>'
                                                                : '<i class="far fa-star"></i>';
                                                        }
                                                    @endphp
                                                </span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <span class="badge bg-primary-subtle text-primary me-2"
                                                    style="width: 90px;">
                                                    <i class="fas fa-headphones me-1"></i> Listening
                                                </span>
                                                <span class="text-warning">
                                                    @php
                                                        $listeningStars = match ($language->listening) {
                                                            'very_poor' => 1,
                                                            'poor' => 2,
                                                            'average' => 3,
                                                            'good' => 4,
                                                            'very_good' => 5,
                                                            default => 0,
                                                        };
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            echo $i <= $listeningStars
                                                                ? '<i class="fas fa-star"></i>'
                                                                : '<i class="far fa-star"></i>';
                                                        }
                                                    @endphp
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="alert alert-info text-center mb-0" role="alert">
                                <i class="fas fa-info-circle me-2"></i> No language data available
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Education Information -->
                <h3 class="section-header"><i class="fas fa-graduation-cap me-2"></i> Education</h3>
                <table class="info-table mb-5">
                    <tr>
                        <td class="label-col"><i class="fas fa-certificate me-2"></i> Degree</td>
                        <td class="value-col">{{ $employee->employee->degree->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-book me-2"></i> Course</td>
                        <td class="value-col">{{ $employee->employee->course->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-university me-2"></i> Board/University</td>
                        <td class="value-col">{{ $employee->employee->board_or_university ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-school me-2"></i> Institution</td>
                        <td class="value-col">{{ $employee->employee->school_or_college_or_institute ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-user-graduate me-2"></i> Currently Studying</td>
                        <td class="value-col">
                            {{ $employee->employee->is_currently_studying !== null ? ($employee->employee->is_currently_studying ? 'Yes' : 'No') : 'N/A' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-percentage me-2"></i> Grade Type</td>
                        <td class="value-col">{{ $employee->employee->grade_type ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-trophy me-2"></i> Mark Secured</td>
                        <td class="value-col">{{ $employee->employee->mark_secured ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-calendar-alt me-2"></i> Graduation</td>
                        <td class="value-col">
                            {{ $employee->employee->graduation_month ?? '' }}
                            {{ $employee->employee->graduation_year ?? 'N/A' }}
                        </td>
                    </tr>
                </table>

                <!-- Preferences and Skills -->
                <h3 class="section-header"><i class="fas fa-cogs me-2"></i> Preferences & Skills</h3>
                <table class="info-table">
                    <tr>
                        <td class="label-col"><i class="fas fa-folder-open me-2"></i> Job Categories</td>
                        <td class="value-col">
                            @forelse($employee->employee->jobCategories as $category)
                                <span class="badge-professional">{{ $category->category }}</span>
                            @empty
                                <span class="text-muted">Not specified</span>
                            @endforelse
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-industry me-2"></i> Preferred Industries</td>
                        <td class="value-col">
                            @forelse($employee->employee->preferredIndustries as $industry)
                                <span class="badge-professional">{{ $industry->name }}</span>
                            @empty
                                <span class="text-muted">Not specified</span>
                            @endforelse
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-briefcase me-2"></i> Preferred Job Titles</td>
                        <td class="value-col">
                            @forelse($employee->employee->preferredJobTitles as $title)
                                <span class="badge-professional">{{ $title->name }}</span>
                            @empty
                                <span class="text-muted">Not specified</span>
                            @endforelse
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-clock me-2"></i> Availability</td>
                        <td class="value-col">
                            @forelse($employee->employee->availabilities as $availability)
                                <span class="badge-professional">{{ $availability->name }}</span>
                            @empty
                                <span class="text-muted">Not specified</span>
                            @endforelse
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-star me-2"></i> Specializations</td>
                        <td class="value-col">
                            @forelse($employee->employee->employeeSpecializations as $specialization)
                                <span class="badge-professional">{{ $specialization->name }}</span>
                            @empty
                                <span class="text-muted">Not specified</span>
                            @endforelse
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-tools me-2"></i> Skills</td>
                        <td class="value-col">
                            @forelse($employee->employee->skills as $skill)
                                <span class="badge-professional">{{ $skill->name }}</span>
                            @empty
                                <span class="text-muted">Not specified</span>
                            @endforelse
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col"><i class="fas fa-map-marked-alt me-2"></i> Preferred Locations</td>
                        <td class="value-col">
                            @forelse($employee->employee->jobPreferenceLocations as $location)
                                <span class="badge-professional">{{ $location->name }}</span>
                            @empty
                                <span class="text-muted">Not specified</span>
                            @endforelse
                        </td>
                    </tr>
                </table>

                <!-- CV Button -->
                
            </div>
        </div>
    </main>
@endsection
