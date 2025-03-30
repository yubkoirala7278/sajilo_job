@extends('backend.main_dashboard.layouts.master')
@section('header-content')
    <!-- Custom Styles -->
    <style>
        .card-header {
            background: linear-gradient(45deg, #007bff, #00b4db);
            border-radius: 10px 10px 0 0;
        }

        .card {
            border-radius: 10px;
        }

        .text-primary {
            color: #007bff !important;
        }

        .border-bottom {
            border-color: #007bff !important;
        }

        .card-body p {
            margin-bottom: 0.5rem;
        }
    </style>
@endsection
@section('content')
    <!-- Content -->
    <div>
        <!-- Profile Card -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white p-4 text-center">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i> Profile Details of {{ $employee->user->name }}</h5>
            </div>
            <div class="card-body">
                <!-- Basic Information -->
                <section class="mb-5">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                        <i class="fas fa-user me-2"></i> Basic Information
                    </h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-id-card me-1"></i> Name:</strong>
                            <span>{{ $employee->user->name }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-venus-mars me-1"></i> Gender:</strong>
                            <span>{{ $employee->gender ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-birthday-cake me-1"></i> Date of Birth:</strong>
                            <span>{{ $employee->date_of_birth ? \Carbon\Carbon::parse($employee->date_of_birth)->format('Y-m-d') : 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-ring me-1"></i> Marital Status:</strong>
                            <span>{{ $employee->marital_status ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-pray me-1"></i> Religion:</strong>
                            <span>{{ $employee->religion_id ? optional($employee->religion)->name : 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-wheelchair me-1"></i> Disability:</strong>
                            <span>{{ $employee->is_disabled ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-globe me-1"></i> Country:</strong>
                            <span>{{ $employee->country ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-map-marker-alt me-1"></i> Current Address:</strong>
                            <span>{{ $employee->current_address ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-home me-1"></i> Permanent Address:</strong>
                            <span>{{ $employee->permanent_address ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-phone me-1"></i> Contact Number:</strong>
                            <span>{{ $employee->contact_number ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-file-pdf me-1"></i> Resume:</strong>
                            @if ($employee->resume)
                                <a href="{{ Storage::url($employee->resume) }}" target="_blank" class="text-primary">View
                                    Resume</a>
                            @else
                                <span>Not uploaded</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-image me-1"></i> Profile Picture:</strong>
                            @if ($employee->profile)
                                <a href="{{ Storage::url($employee->profile) }}" target="_blank"><img
                                        src="{{ Storage::url($employee->profile) }}" alt="Profile" class="img-thumbnail"
                                        style="max-width: 100px;"></a>
                            @else
                                <span>Not uploaded</span>
                            @endif
                        </div>
                    </div>
                </section>

                <!-- Job Preferences -->
                <section class="mb-5">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                        <i class="fas fa-briefcase me-2"></i> Job Preferences
                    </h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-level-up-alt me-1"></i> Job Level:</strong>
                            <span>{{ $employee->job_level ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-money-bill-wave me-1"></i> Expected Salary:</strong>
                            <span>
                                {{ $employee->expected_salary
                                    ? "{$employee->expected_salary_currency} {$employee->expected_salary_operator} {$employee->expected_salary} {$employee->expected_salary_unit}"
                                    : 'Not specified' }}
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-money-check-alt me-1"></i> Current Salary:</strong>
                            <span>
                                {{ $employee->current_salary
                                    ? "{$employee->current_salary_currency} {$employee->current_salary_operator} {$employee->current_salary} {$employee->current_salary_unit}"
                                    : 'Not specified' }}
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-folder-open me-1"></i> Job Categories:</strong>
                            <span>{{ $employee->jobCategories->pluck('category')->implode(', ') ?: 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-industry me-1"></i> Preferred Industries:</strong>
                            <span>{{ $employee->preferredIndustries->pluck('name')->implode(', ') ?: 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-tag me-1"></i> Preferred Job Titles:</strong>
                            <span>{{ $employee->preferredJobTitles->pluck('name')->implode(', ') ?: 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-clock me-1"></i> Availability:</strong>
                            <span>{{ $employee->availabilities->pluck('name')->implode(', ') ?: 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-graduation-cap me-1"></i> Specializations:</strong>
                            <span>{{ $employee->employeeSpecializations->pluck('name')->implode(', ') ?: 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-tools me-1"></i> Skills:</strong>
                            <span>{{ $employee->skills->pluck('name')->implode(', ') ?: 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-map-marked-alt me-1"></i> Preferred Locations:</strong>
                            <span>{{ $employee->jobPreferenceLocations->pluck('name')->implode(', ') ?: 'Not specified' }}</span>
                        </div>
                        <div class="col-12 mb-3">
                            <strong><i class="fas fa-bullseye me-1"></i> Career Objective:</strong>
                            <p class="text-muted">{{ $employee->career_objective_summary ?? 'Not specified' }}</p>
                        </div>
                    </div>
                </section>

                <!-- Education -->
                <section class="mb-5">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                        <i class="fas fa-book me-2"></i> Education
                    </h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-graduation-cap me-1"></i> Degree:</strong>
                            <span>{{ $employee->degree_id ? optional($employee->degree)->name : 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-book-open me-1"></i> Course:</strong>
                            <span>{{ $employee->course_id ? optional($employee->course)->name : 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-university me-1"></i> Board/University:</strong>
                            <span>{{ $employee->board_or_university ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-school me-1"></i> Institution:</strong>
                            <span>{{ $employee->school_or_college_or_institute ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-hourglass-half me-1"></i> Currently Studying:</strong>
                            <span>{{ $employee->is_currently_studying ? 'Yes' : 'No' }}</span>
                        </div>
                        @if ($employee->is_currently_studying)
                            <div class="col-md-6 mb-3">
                                <strong><i class="fas fa-calendar-alt me-1"></i> Started:</strong>
                                <span>{{ $employee->education_started_year ? "$employee->education_started_month $employee->education_started_year" : 'Not specified' }}</span>
                            </div>
                        @else
                            <div class="col-md-6 mb-3">
                                <strong><i class="fas fa-percentage me-1"></i> Grade Type:</strong>
                                <span>{{ $employee->grade_type ?? 'Not specified' }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong><i class="fas fa-star me-1"></i> Marks Secured:</strong>
                                <span>{{ $employee->mark_secured ?? 'Not specified' }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong><i class="fas fa-calendar-check me-1"></i> Graduated:</strong>
                                <span>{{ $employee->graduation_year ? "$employee->graduation_month $employee->graduation_year" : 'Not specified' }}</span>
                            </div>
                        @endif
                    </div>
                </section>

                <!-- Training -->
                <section class="mb-5">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                        <i class="fas fa-certificate me-2"></i> Training
                    </h6>
                    @if ($employee->trainings->isNotEmpty())
                        @foreach ($employee->trainings as $training)
                            <div class="card mb-3 border-light shadow-sm">
                                <div class="card-body">
                                    <p><strong><i class="fas fa-chalkboard-teacher me-1"></i> Training Name:</strong>
                                        {{ $training->training_name }}</p>
                                    <p><strong><i class="fas fa-building me-1"></i> Institution:</strong>
                                        {{ $training->institution_name }}</p>
                                    <p><strong><i class="fas fa-clock me-1"></i> Duration:</strong>
                                        {{ $training->training_duration_operator }} {{ $training->training_duration }}</p>
                                    <p><strong><i class="fas fa-calendar-alt me-1"></i> Completion Date:</strong>
                                        {{ $training->training_completion_date ?? 'Not specified' }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted"><i class="fas fa-exclamation-circle me-1"></i> No training records
                            available.</p>
                    @endif
                </section>

                <!-- Experience -->
                <section class="mb-5">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                        <i class="fas fa-suitcase me-2"></i> Experience
                    </h6>
                    @if ($employee->experiences->isNotEmpty())
                        @foreach ($employee->experiences as $experience)
                            <div class="card mb-3 border-light shadow-sm">
                                <div class="card-body">
                                    <p><strong><i class="fas fa-building me-1"></i> Organization:</strong>
                                        {{ $experience->organization_name }}</p>
                                    <p><strong><i class="fas fa-map-marker-alt me-1"></i> Location:</strong>
                                        {{ $experience->job_location }}</p>
                                    <p><strong><i class="fas fa-tag me-1"></i> Job Title:</strong>
                                        {{ $experience->job_title }}</p>
                                    <p><strong><i class="fas fa-level-up-alt me-1"></i> Job Level:</strong>
                                        {{ $experience->job_level }}</p>
                                    <p><strong><i class="fas fa-calendar-alt me-1"></i> Duration:</strong>
                                        {{ \Carbon\Carbon::parse($experience->started_date)->format('Y-m-d') }}
                                        -
                                        {{ $experience->is_currently_working ? 'Present' : ($experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('Y-m-d') : 'Not specified') }}
                                    </p>
                                    <p><strong><i class="fas fa-tasks me-1"></i> Duties:</strong>
                                        {{ $experience->duties_and_responsibilities ?? 'Not specified' }}</p>
                                    <p><strong><i class="fas fa-industry me-1"></i> Organization Nature:</strong>
                                        {{ optional($experience->organizationNature)->name ?? 'Not specified' }}</p>
                                    <p><strong><i class="fas fa-folder-open me-1"></i> Job Category:</strong>
                                        {{ optional($experience->jobCategory)->category ?? 'Not specified' }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted"><i class="fas fa-exclamation-circle me-1"></i> No experience records
                            available.</p>
                    @endif
                </section>

                <!-- Languages -->
                <section class="mb-5">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                        <i class="fas fa-language me-2"></i> Languages
                    </h6>
                    @if ($employee->languages->isNotEmpty())
                        <div class="row">
                            @foreach ($employee->languages as $language)
                                <div class="col-md-6 mb-3">
                                    <div class="card border-light shadow-sm">
                                        <div class="card-body">
                                            <p><strong><i class="fas fa-comment me-1"></i> Language:</strong>
                                                {{ $language->language }}</p>
                                            <p><strong><i class="fas fa-book me-1"></i> Reading:</strong>
                                                @switch($language->reading)
                                                    @case('very_good')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('good')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('average')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('poor')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('very_poor')
                                                        <span class="text-warning"><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @default
                                                        <span>Not specified</span>
                                                @endswitch
                                            </p>
                                            <p><strong><i class="fas fa-pen me-1"></i> Writing:</strong>
                                                @switch($language->writing)
                                                    @case('very_good')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('good')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('average')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('poor')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('very_poor')
                                                        <span class="text-warning"><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @default
                                                        <span>Not specified</span>
                                                @endswitch
                                            </p>
                                            <p><strong><i class="fas fa-microphone me-1"></i> Speaking:</strong>
                                                @switch($language->speaking)
                                                    @case('very_good')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('good')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('average')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('poor')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('very_poor')
                                                        <span class="text-warning"><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @default
                                                        <span>Not specified</span>
                                                @endswitch
                                            </p>
                                            <p><strong><i class="fas fa-headphones me-1"></i> Listening:</strong>
                                                @switch($language->listening)
                                                    @case('very_good')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('good')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('average')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('poor')
                                                        <span class="text-warning"><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @case('very_poor')
                                                        <span class="text-warning"><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i><i
                                                                class="far fa-star"></i><i class="far fa-star"></i></span>
                                                    @break

                                                    @default
                                                        <span>Not specified</span>
                                                @endswitch
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted"><i class="fas fa-exclamation-circle me-1"></i> No languages specified.</p>
                    @endif
                </section>

                <!-- Social Accounts -->
                <section class="mb-5">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                        <i class="fas fa-link me-2"></i> Social Accounts
                    </h6>
                    @if ($employee->socialAccounts->isNotEmpty())
                        @foreach ($employee->socialAccounts as $account)
                            <p>
                                <strong><i class="fas fa-globe me-1"></i> {{ $account->account_name }}:</strong>
                                <a href="{{ $account->account_url }}" target="_blank"
                                    class="text-primary">{{ $account->account_url }}</a>
                            </p>
                        @endforeach
                    @else
                        <p class="text-muted"><i class="fas fa-exclamation-circle me-1"></i> No social accounts linked.
                        </p>
                    @endif
                </section>

                <!-- Other Information -->
                <section class="mb-5">
                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                        <i class="fas fa-info me-2"></i> Other Information
                    </h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-plane me-1"></i> Willing to Travel:</strong>
                            <span>{{ $employee->willing_to_travel ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-truck-moving me-1"></i> Willing to Relocate:</strong>
                            <span>{{ $employee->willing_to_relocate ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-motorcycle me-1"></i> Two-Wheeler License:</strong>
                            <span>{{ $employee->two_wheeler_license ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-car me-1"></i> Four-Wheeler License:</strong>
                            <span>{{ $employee->four_wheeler_license ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-motorcycle me-1"></i> Owns Two-Wheeler:</strong>
                            <span>{{ $employee->own_two_wheeler ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong><i class="fas fa-car me-1"></i> Owns Four-Wheeler:</strong>
                            <span>{{ $employee->own_four_wheeler ? 'Yes' : 'No' }}</span>
                        </div>
                    </div>
                </section>
            </div>
            {{-- <div class="card-footer text-end">
            <a href="" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i> Edit Profile
            </a>
        </div> --}}
        </div>
    </div>


@endsection
