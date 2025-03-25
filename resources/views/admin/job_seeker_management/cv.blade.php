<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $employee->name ?? 'Employee' }} - CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .cv-container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .cv-header {
            background: linear-gradient(135deg, #2C3E50 0%, #3498db 100%);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }
        .cv-profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #fff;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .cv-section {
            padding: 20px 30px;
            border-bottom: 1px solid #eee;
        }
        .cv-section:last-child {
            border-bottom: none;
        }
        .cv-title {
            color: #2C3E50;
            font-size: 1.5rem;
            margin-bottom: 15px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }
        .cv-item {
            margin-bottom: 10px;
        }
        .cv-label {
            font-weight: bold;
            color: #6c757d;
            display: inline-block;
            width: 150px;
        }
        .cv-value {
            color: #333;
        }
        .cv-badges .badge {
            margin: 3px;
            background-color: #3498db;
            font-size: 0.9rem;
        }
        .print-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        @media print {
            .print-btn {
                display: none;
            }
            body {
                padding: 0;
                background: #fff;
            }
            .cv-container {
                box-shadow: none;
                margin: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <button onclick="window.print()" class="btn btn-success print-btn">
        <i class="fa-solid fa-print"></i> Print CV
    </button>

    <div class="cv-container">
        <!-- Header -->
        <div class="cv-header">
            @if($employee->employee->profile)
                <img src="{{ asset('storage/' . $employee->employee->profile) }}" alt="Profile" class="cv-profile-img">
            @else
                <img src="{{ asset('storage/default-profile.jpg') }}" alt="Default Profile" class="cv-profile-img">
            @endif
            <h1>{{ $employee->name ?? 'N/A' }}</h1>
            <p>{{ $employee->email ?? 'N/A' }} | {{ $employee->employee->contact_number ?? 'N/A' }}</p>
        </div>

        <!-- Personal Information -->
        <div class="cv-section">
            <h2 class="cv-title">Personal Information</h2>
            <div class="cv-item">
                <span class="cv-label">Gender:</span>
                <span class="cv-value">{{ $employee->employee->gender ?? 'N/A' }}</span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Date of Birth:</span>
                <span class="cv-value">
                    {{ $employee->employee->date_of_birth ? \Carbon\Carbon::parse($employee->employee->date_of_birth)->format('F d, Y') : 'N/A' }}
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Marital Status:</span>
                <span class="cv-value">{{ $employee->employee->marital_status ?? 'N/A' }}</span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Religion:</span>
                <span class="cv-value">{{ $employee->employee->religion->name ?? 'N/A' }}</span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Disability:</span>
                <span class="cv-value">
                    {{ $employee->employee->is_disabled !== null ? ($employee->employee->is_disabled ? 'Yes' : 'No') : 'N/A' }}
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">country:</span>
                <span class="cv-value">{{ $employee->employee->country ?? 'N/A' }}</span>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="cv-section">
            <h2 class="cv-title">Contact Information</h2>
            <div class="cv-item">
                <span class="cv-label">Current Address:</span>
                <span class="cv-value">{{ $employee->employee->current_address ?? 'N/A' }}</span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Permanent Address:</span>
                <span class="cv-value">{{ $employee->employee->permanent_address ?? 'N/A' }}</span>
            </div>
        </div>

        <!-- Job Information -->
        <div class="cv-section">
            <h2 class="cv-title">Professional Information</h2>
            <div class="cv-item">
                <span class="cv-label">Job Level:</span>
                <span class="cv-value">{{ $employee->employee->job_level ?? 'N/A' }}</span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Expected Salary:</span>
                <span class="cv-value">
                    {{ $employee->employee->expected_salary_currency ?? 'N/A' }}
                    {{ $employee->employee->expected_salary_operator ?? '' }}
                    {{ $employee->employee->expected_salary ?? 'N/A' }}
                    {{ $employee->employee->expected_salary_unit ?? '' }}
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Current Salary:</span>
                <span class="cv-value">
                    {{ $employee->employee->current_salary_currency ?? 'N/A' }}
                    {{ $employee->employee->current_salary_operator ?? '' }}
                    {{ $employee->employee->current_salary ?? 'N/A' }}
                    {{ $employee->employee->current_salary_unit ?? '' }}
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Status:</span>
                <span class="badge {{ $employee->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                    {{ ucfirst($employee->status) }}
                </span>
            </div>
        </div>

        <!-- Education Information -->
        <div class="cv-section">
            <h2 class="cv-title">Education</h2>
            <div class="cv-item">
                <span class="cv-label">Degree:</span>
                <span class="cv-value">{{ $employee->employee->degree->name ?? 'N/A' }}</span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Course:</span>
                <span class="cv-value">{{ $employee->employee->course->name ?? 'N/A' }}</span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Board/University:</span>
                <span class="cv-value">{{ $employee->employee->board_or_university ?? 'N/A' }}</span>
            </div>
            <div class="cv-item">
                <span class="cv-label">School/College:</span>
                <span class="cv-value">{{ $employee->employee->school_or_college_or_institute ?? 'N/A' }}</span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Currently Studying:</span>
                <span class="cv-value">
                    {{ $employee->employee->is_currently_studying !== null ? ($employee->employee->is_currently_studying ? 'Yes' : 'No') : 'N/A' }}
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Grade Type:</span>
                <span class="cv-value">{{ $employee->employee->grade_type ?? 'N/A' }}</span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Mark Secured:</span>
                <span class="cv-value">{{ $employee->employee->mark_secured ?? 'N/A' }}</span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Graduation:</span>
                <span class="cv-value">
                    {{ $employee->employee->graduation_month ?? 'N/A' }} {{ $employee->employee->graduation_year ?? 'N/A' }}
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Started:</span>
                <span class="cv-value">
                    {{ $employee->employee->education_started_month ?? 'N/A' }} {{ $employee->employee->education_started_year ?? 'N/A' }}
                </span>
            </div>
        </div>

        <!-- Skills and Preferences -->
        <div class="cv-section">
            <h2 class="cv-title">Skills & Preferences</h2>
            <div class="cv-item">
                <span class="cv-label">Job Categories:</span>
                <span class="cv-value cv-badges">
                    @if (count($employee->employee->jobCategories) > 0)
                        @foreach ($employee->employee->jobCategories as $category)
                            <span class="badge bg-primary">{{ $category->category }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Preferred Industries:</span>
                <span class="cv-value cv-badges">
                    @if (count($employee->employee->preferredIndustries) > 0)
                        @foreach ($employee->employee->preferredIndustries as $industry)
                            <span class="badge bg-info">{{ $industry->name }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Job Titles:</span>
                <span class="cv-value cv-badges">
                    @if (count($employee->employee->preferredJobTitles) > 0)
                        @foreach ($employee->employee->preferredJobTitles as $title)
                            <span class="badge bg-success">{{ $title->name }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Availabilities:</span>
                <span class="cv-value cv-badges">
                    @if (count($employee->employee->availabilities) > 0)
                        @foreach ($employee->employee->availabilities as $availability)
                            <span class="badge bg-warning text-dark">{{ $availability->name }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Specializations:</span>
                <span class="cv-value cv-badges">
                    @if (count($employee->employee->employeeSpecializations) > 0)
                        @foreach ($employee->employee->employeeSpecializations as $specialization)
                            <span class="badge bg-danger">{{ $specialization->name }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Skills:</span>
                <span class="cv-value cv-badges">
                    @if (count($employee->employee->skills) > 0)
                        @foreach ($employee->employee->skills as $skill)
                            <span class="badge bg-secondary">{{ $skill->name }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </span>
            </div>
            <div class="cv-item">
                <span class="cv-label">Preferred Locations:</span>
                <span class="cv-value cv-badges">
                    @if (count($employee->employee->jobPreferenceLocations) > 0)
                        @foreach ($employee->employee->jobPreferenceLocations as $location)
                            <span class="badge bg-dark">{{ $location->name }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </span>
            </div>
        </div>
    </div>
</body>
</html>