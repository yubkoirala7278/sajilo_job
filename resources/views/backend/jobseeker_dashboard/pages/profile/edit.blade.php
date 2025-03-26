@extends('backend.jobseeker_dashboard.layouts.master')
@section('header-content')
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <style>
        .select2-container .select2-selection--multiple {
            min-height: 38px;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

        .trumbowyg-field.has-error .trumbowyg-box {
            border-color: #dc3545;
        }

        /* Custom styles for tabs */
        .nav-tabs {
            border-bottom: 2px solid #dee2e6;
            margin-bottom: 20px;
        }

        .nav-tabs .nav-link {
            margin-bottom: -2px;
            border: none;
            padding: 12px 20px;
            color: #495057;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
        }

        .nav-tabs .nav-link.active {
            color: #0d6efd;
            background-color: transparent;
            border-bottom: 2px solid #0d6efd;
        }

        .tab-content {
            padding: 20px;
            background-color: #fff;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .nav-tabs {
                flex-wrap: nowrap;
                overflow-x: auto;
                white-space: nowrap;
            }

            .nav-tabs .nav-link {
                padding: 10px 15px;
            }
        }

        /* test */
        .exp-end-date {
            display: flex;
            /* Default state */
        }

        .exp-end-date.hidden {
            display: none;
        }
    </style>
@endsection

@section('contain')
    <!-- Content -->
    <div class="py-2 px-4">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    {{-- tab1 --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="job-preference-tab" data-bs-toggle="tab"
                            data-bs-target="#job-preference" type="button" role="tab"
                            aria-controls="job-preference" aria-selected="true">Job
                            Preference</button>
                    </li>
                    {{-- tab2 --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="basic-information-tab" data-bs-toggle="tab"
                            data-bs-target="#basic-information" type="button" role="tab"
                            aria-controls="basic-information" aria-selected="false">Basic
                            Information</button>
                    </li>
                    {{-- tab3 --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education"
                            type="button" role="tab" aria-controls="education"
                            aria-selected="false">Education</button>
                    </li>
                    {{-- tab4 --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="training-tab" data-bs-toggle="tab" data-bs-target="#training"
                            type="button" role="tab" aria-controls="training"
                            aria-selected="false">Training</button>
                    </li>
                    {{-- tab5 --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience"
                            type="button" role="tab" aria-controls="experience"
                            aria-selected="false">Experience</button>
                    </li>

                    {{-- tab 6 --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="language-tab" data-bs-toggle="tab" data-bs-target="#language"
                            type="button" role="tab" aria-controls="language"
                            aria-selected="false">Language</button>
                    </li>

                    {{-- tab 7 --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="social-account-tab" data-bs-toggle="tab"
                            data-bs-target="#social-account" type="button" role="tab"
                            aria-controls="social-account" aria-selected="false">Social Account</button>
                    </li>

                    {{-- tab 8 --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="other-information-tab" data-bs-toggle="tab"
                            data-bs-target="#other-information" type="button" role="tab"
                            aria-controls="other-information" aria-selected="false">Other Information</button>
                    </li>
                </ul>
            </div>
            <div class="col-12 tab-content" id="myTabContent">
                {{-- tab 1 --}}
                <div class="tab-pane fade show active" id="job-preference" role="tabpanel"
                    aria-labelledby="job-preference-tab">
                    <div class="card">
                        <div class="card-header text-dark">
                            Job Preference > <strong class="ms-1 text-dark">Edit Career and Application</strong>
                        </div>
                        <form action="{{ route('update.employee.job.preferences') }}" method="POST" class="mt-3">
                            @csrf
                            @method('PUT')
                            <div class="card-body ">
                                <div class="">
                                    <div class="row py-5">
                                        <div class="col-md-12">
                                            <!-- Job Categories -->
                                            <div class="row mb-3">
                                                <label for="job_categories"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Job Categories<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="job_categories[]" class="form-select select2"
                                                        required multiple id="job_categories">
                                                        @if (count($job_categories) > 0)
                                                            @foreach ($job_categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    @if (in_array($category->id, $selected_job_categories)) selected @endif>
                                                                    {{ $category->category }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>

                                            <!-- Preferred Industries -->
                                            <div class="row mb-3">
                                                <label for="industries"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Preferred Industries<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="industries[]" class="form-select select2" required
                                                        multiple id="industries">
                                                        @if ($preferred_industries->count() > 0)
                                                            @foreach ($preferred_industries as $industry)
                                                                <option value="{{ $industry->id }}"
                                                                    @if (in_array($industry->id, $selected_industries)) selected @endif>
                                                                    {{ $industry->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Preferred Job Title -->
                                            <div class="row mb-3">
                                                <label for="preferred_job_title"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Preferred Job Title<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="preferred_job_title[]" class="form-select select2"
                                                        required multiple id="preferred_job_title">
                                                        @if ($preferred_job_title->count() > 0)
                                                            @foreach ($preferred_job_title as $job)
                                                                <option value="{{ $job->id }}"
                                                                    @if (in_array($job->id, $selected_job_titles)) selected @endif>
                                                                    {{ $job->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Looking For -->
                                            <div class="row mb-3">
                                                <label for="job_level"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Looking For<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="job_level" class="form-select" required
                                                        id="job_level">
                                                        <option selected disabled>---------</option>
                                                        <option value="Top Level"
                                                            @if ($employee && $employee->job_level == 'Top Level') selected @endif>Top Level
                                                        </option>
                                                        <option value="Senior Level"
                                                            @if ($employee && $employee->job_level == 'Senior Level') selected @endif>Senior
                                                            Level</option>
                                                        <option value="Mid Level"
                                                            @if ($employee && $employee->job_level == 'Mid Level') selected @endif>Mid Level
                                                        </option>
                                                        <option value="Entry Level"
                                                            @if ($employee && $employee->job_level == 'Entry Level') selected @endif>Entry
                                                            Level</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <!-- Available For -->
                                            <div class="row mb-3">
                                                <label for="available_for"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Available For<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="available_for[]" class="form-select select2"
                                                        required multiple id="available_for">
                                                        @if ($employee_availabilities->count() > 0)
                                                            @foreach ($employee_availabilities as $availability)
                                                                <option value="{{ $availability->id }}"
                                                                    @if (in_array($availability->id, $selected_availabilities)) selected @endif>
                                                                    {{ $availability->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>


                                                </div>
                                            </div>

                                            <!-- Specializations -->
                                            <div class="row mb-3">
                                                <label for="specializations"
                                                    class="col-form-label col-sm-3 text-sm-end">
                                                    Specializations
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="specializations[]" class="form-select select2"
                                                        multiple id="specializations">
                                                        @if ($employee_specialization->count() > 0)
                                                            @foreach ($employee_specialization as $specialization)
                                                                <option value="{{ $specialization->id }}"
                                                                    @if (in_array($specialization->id, $selected_specializations)) selected @endif>
                                                                    {{ $specialization->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>


                                                    <small class="form-text text-muted" style="font-size: 11px">Course
                                                        of
                                                        study or core competencies i.e. Accounts, Computing, Branding
                                                        etc.</small>
                                                </div>
                                            </div>

                                            <!-- Skills -->
                                            <div class="row mb-3">
                                                <label for="skills"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Skills<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="skills[]" class="form-select select2" required
                                                        multiple id="skills">
                                                        @if ($employee_skills->count() > 0)
                                                            @foreach ($employee_skills as $skill)
                                                                <option value="{{ $skill->id }}"
                                                                    @if (in_array($skill->id, $selected_skills)) selected @endif>
                                                                    {{ $skill->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>


                                                    <small class="form-text text-muted">Key set of abilities related to
                                                        employability i.e. Leadership, Communication etc.</small>
                                                </div>
                                            </div>

                                            <!-- Expected Salary -->
                                            <div class="row mb-3">
                                                <label class="col-form-label col-md-3 text-md-end requiredField">
                                                    Expected Salary<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-2 mb-2">
                                                            <select name="expected_salary_currency"
                                                                class="form-select" id="expected_salary_currency">
                                                                <option value="NRs"
                                                                    @if ($employee && $employee->expected_salary_currency == 'NRs') selected @endif>
                                                                    NRs</option>
                                                                <option value="$"
                                                                    @if ($employee && $employee->expected_salary_currency == '$') selected @endif>
                                                                    $</option>
                                                                <option value="Irs"
                                                                    @if ($employee && $employee->expected_salary_currency == 'Irs') selected @endif>
                                                                    Irs</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-md-3 mb-2">
                                                            <select name="expected_salary_operator"
                                                                class="form-select" id="expected_salary_operator">
                                                                <option value="Above"
                                                                    @if ($employee && $employee->expected_salary_operator == 'Above') selected @endif>
                                                                    Above</option>
                                                                <option value="Below"
                                                                    @if ($employee && $employee->expected_salary_operator == 'Below') selected @endif>
                                                                    Below</option>
                                                                <option value="Equals"
                                                                    @if ($employee && $employee->expected_salary_operator == 'Equals') selected @endif>
                                                                    Equals</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <input type="text" name="expected_salary"
                                                                maxlength="15" placeholder="Amount"
                                                                class="form-control" required id="expected_salary"
                                                                value="{{ old('expected_salary', $employee->expected_salary ?? '') }}">
                                                        </div>
                                                        <div class="col-md-3 mb-2">
                                                            <select name="expected_salary_unit" class="form-select"
                                                                id="expected_salary_unit">
                                                                <option value="" disabled
                                                                    {{ is_null(old('expected_salary_unit', optional($employee)->expected_salary_unit)) ? 'selected' : '' }}>
                                                                    Select salary unit</option>
                                                                <option value="Hourly"
                                                                    {{ old('expected_salary_unit', optional($employee)->expected_salary_unit) == 'Hourly' ? 'selected' : '' }}>
                                                                    Hourly</option>
                                                                <option value="Daily"
                                                                    {{ old('expected_salary_unit', optional($employee)->expected_salary_unit) == 'Daily' ? 'selected' : '' }}>
                                                                    Daily</option>
                                                                <option value="Weekly"
                                                                    {{ old('expected_salary_unit', optional($employee)->expected_salary_unit) == 'Weekly' ? 'selected' : '' }}>
                                                                    Weekly</option>
                                                                <option value="Monthly"
                                                                    {{ old('expected_salary_unit', optional($employee)->expected_salary_unit) == 'Monthly' ? 'selected' : '' }}>
                                                                    Monthly</option>
                                                                <option value="Yearly"
                                                                    {{ old('expected_salary_unit', optional($employee)->expected_salary_unit) == 'Yearly' ? 'selected' : '' }}>
                                                                    Yearly</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Current Salary -->
                                            <div class="row mb-3">
                                                <label class="col-form-label col-md-3 text-md-end">Current
                                                    Salary</label>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-2 mb-2">
                                                            <select name="current_salary_currency" class="form-select"
                                                                id="current_salary_currency">
                                                                <option value="NRs"
                                                                    {{ old('current_salary_currency', optional($employee)->current_salary_currency) == 'NRs' ? 'selected' : '' }}>
                                                                    NRs
                                                                </option>
                                                                <option value="$"
                                                                    {{ old('current_salary_currency', optional($employee)->current_salary_currency) == '$' ? 'selected' : '' }}>
                                                                    $
                                                                </option>
                                                                <option value="Irs"
                                                                    {{ old('current_salary_currency', optional($employee)->current_salary_currency) == 'Irs' ? 'selected' : '' }}>
                                                                    Irs
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 mb-2">
                                                            <select name="current_salary_operator" class="form-select"
                                                                id="current_salary_operator">
                                                                <option value="Above"
                                                                    {{ old('current_salary_operator', optional($employee)->current_salary_operator) == 'Above' ? 'selected' : '' }}>
                                                                    Above
                                                                </option>
                                                                <option value="Below"
                                                                    {{ old('current_salary_operator', optional($employee)->current_salary_operator) == 'Below' ? 'selected' : '' }}>
                                                                    Below
                                                                </option>
                                                                <option value="Equals"
                                                                    {{ old('current_salary_operator', optional($employee)->current_salary_operator) == 'Equals' ? 'selected' : '' }}>
                                                                    Equals
                                                                </option>
                                                            </select>


                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <input type="text" name="current_salary"
                                                                maxlength="15" placeholder="Enter your current salary"
                                                                class="form-control" id="current_salary"
                                                                value="{{ old('current_salary', optional($employee)->current_salary) }}">
                                                        </div>
                                                        <div class="col-md-3 mb-2">
                                                            <select name="current_salary_unit" class="form-select"
                                                                id="current_salary_unit">
                                                                <option value="Hourly"
                                                                    {{ old('current_salary_unit', optional($employee)->current_salary_unit) == 'Hourly' ? 'selected' : '' }}>
                                                                    Hourly
                                                                </option>
                                                                <option value="Daily"
                                                                    {{ old('current_salary_unit', optional($employee)->current_salary_unit) == 'Daily' ? 'selected' : '' }}>
                                                                    Daily
                                                                </option>
                                                                <option value="Weekly"
                                                                    {{ old('current_salary_unit', optional($employee)->current_salary_unit) == 'Weekly' ? 'selected' : '' }}>
                                                                    Weekly
                                                                </option>
                                                                <option value="Monthly"
                                                                    {{ old('current_salary_unit', optional($employee)->current_salary_unit) == 'Monthly' ? 'selected' : '' }}>
                                                                    Monthly
                                                                </option>
                                                                <option value="Yearly"
                                                                    {{ old('current_salary_unit', optional($employee)->current_salary_unit) == 'Yearly' ? 'selected' : '' }}>
                                                                    Yearly
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Job Preference Location -->
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <label class="float-md-end">
                                                        Job Preference Location<span class="text-danger">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <select name="job_location[]" class="form-select select2" required
                                                        multiple id="job_location">
                                                        @if ($job_preference_location->count() > 0)
                                                            @foreach ($job_preference_location as $location)
                                                                <option value="{{ $location->id }}"
                                                                    @if (in_array($location->id, $selected_locations)) selected @endif>
                                                                    {{ $location->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>


                                                </div>
                                            </div>

                                            <!-- Career Objective Summary -->
                                            <div class="row mb-3">
                                                <label for="career_objective_summary"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Career Objective Summary<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <textarea name="career_objective_summary" class="form-control trumbowyg-textarea" required id="id_bio"
                                                        rows="10" placeholder="Write your career objective">
                                            {{ old('career_objective_summary', isset($employee) ? $employee->career_objective_summary : '') }}
                                        </textarea>


                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-success" id="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- end of tab 1 --}}

                {{-- tab 2 --}}
                <div class="tab-pane fade" id="basic-information" role="tabpanel"
                    aria-labelledby="basic-information-tab">
                    <div class="card mt-3">
                        <div class="card-header text-dark">
                            Basic Information > <strong class="ms-1">Edit Personal Information</strong>
                        </div>

                        <form action="{{ route('update.employee.basic.information') }}" method="POST"
                            enctype="multipart/form-data" class="mt-3">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="">
                                    <div class="row mt-3">
                                        <div class="col-12">

                                            <div class="row mb-3" id="div_id_name">
                                                <label for="name"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Name<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="name" maxlength="100"
                                                        class="form-control" required id="name"
                                                        placeholder="Enter your name"
                                                        value="{{ old('name', Auth::user()->name) }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3" id="div_id_gender">
                                                <label for="id_gender"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Gender<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="gender" class="form-select" required
                                                        id="id_gender">
                                                        <option value="" disabled
                                                            {{ is_null($employee) || is_null($employee->gender) ? 'selected' : '' }}>
                                                            Select your gender</option>
                                                        <option value="Male"
                                                            {{ isset($employee) && $employee->gender == 'Male' ? 'selected' : '' }}>
                                                            Male</option>
                                                        <option value="Female"
                                                            {{ isset($employee) && $employee->gender == 'Female' ? 'selected' : '' }}>
                                                            Female</option>
                                                        <option value="Other"
                                                            {{ isset($employee) && $employee->gender == 'Other' ? 'selected' : '' }}>
                                                            Other</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="row mb-3" id="div_id_dob">
                                                <label for="id_dob"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Date of Birth<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="dob" placeholder="YYYY-MM-DD"
                                                        class="form-control datepicker" required id="id_dob"
                                                        value="{{ isset($employee) && $employee->date_of_birth ? $employee->date_of_birth->format('Y-m-d') : '' }}">


                                                </div>
                                            </div>

                                            <div class="row mb-3" id="div_id_marital_status">
                                                <label for="id_marital_status"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Marital Status<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="marital_status" class="form-select" required
                                                        id="id_marital_status">
                                                        <option value="" disabled
                                                            {{ isset($employee) && is_null($employee->marital_status) ? 'selected' : '' }}>
                                                            Select your marital status</option>
                                                        <option value="Married"
                                                            {{ isset($employee) && $employee->marital_status == 'Married' ? 'selected' : '' }}>
                                                            Married</option>
                                                        <option value="Unmarried"
                                                            {{ isset($employee) && $employee->marital_status == 'Unmarried' ? 'selected' : '' }}>
                                                            Unmarried</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="row mb-3" id="div_id_religion">
                                                <label for="id_religion-selectized"
                                                    class="col-form-label col-sm-3 text-sm-end">
                                                    Religion
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="religion" class="form-select selectized"
                                                        id="id_religion">
                                                        @if (count($religions) > 0)
                                                            <option value="" disabled
                                                                {{ isset($employee) && is_null($employee->religion_id) ? 'selected' : '' }}>
                                                                Select your religion</option>
                                                            @foreach ($religions as $religion)
                                                                <option value="{{ $religion->id }}"
                                                                    {{ isset($employee) && $employee->religion_id == $religion->id ? 'selected' : '' }}>
                                                                    {{ $religion->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="offset-sm-3 col-sm-8">
                                                    <div class="form-check" id="div_id_is_disabled">
                                                        <input type="hidden" name="is_disabled" value="0">
                                                        <!-- Default value -->
                                                        <input type="checkbox" name="is_disabled"
                                                            class="form-check-input" id="id_is_disabled"
                                                            {{ old('is_disabled', optional($employee)->is_disabled) ? 'checked' : '' }}>


                                                        <label class="form-check-label" for="id_is_disabled">
                                                            Has any form of Disability
                                                        </label>
                                                        <small id="hint_id_is_disabled" class="form-text text-muted">
                                                            Tick this for any kind of physical disability.
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>

                                          

                                            <div class="row mb-3" id="div_id_resume">
                                                <label for="id_resume" class="col-form-label col-sm-3 text-sm-end">
                                                    Resume
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="file" name="resume" accept=".pdf,.jpg"
                                                        class="form-control" id="id_resume">
                                                    <small id="hint_id_resume" class="form-text text-muted">
                                                        Upload your resume in .pdf or .jpg format less than 2 MB.
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row mb-3" id="div_id_profile">
                                                <label for="id_profile" class="col-form-label col-sm-3 text-sm-end">
                                                    Profile Image
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="file" name="profile" accept=".pdf,.jpg"
                                                        class="form-control" id="id_profile">
                                                    <small id="hint_id_profile" class="form-text text-muted">
                                                        Upload your pp size photo in .pdf or .jpg format less than 2 MB.
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row mb-3" id="div_id_country">
                                                <label for="country"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    country<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="country"
                                                    class="form-select" id="country">
                                                    @if(count($countries))
                                                        @foreach ($countries as $country)
                                                        <option value="{{$country->name}}"
                                                        @if ($employee && $employee->country == $country->name) selected @endif>
                                                        {{$country->name}}</option> 
                                                        @endforeach
                                                    @endif
                                                </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3" id="div_id_address">
                                                <label for="current_address"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Current Address<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="current_address" class="form-control"
                                                        maxlength="200" required id="current_address"
                                                        placeholder="Enter your current address"
                                                        value="{{ old('current_address', optional($employee)->current_address) }}">


                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="permanent_address"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Permanent Address<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" name="permanent_address"
                                                            class="form-control" maxlength="100" required
                                                            id="permanent_address"
                                                            placeholder="Enter your current address"
                                                            value="{{ old('permanent_address', $employee ? $employee->permanent_address : '') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="contact_number"
                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                    Contact Number<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" name="contact_number"
                                                            class="form-control" maxlength="100" required
                                                            id="contact_number"
                                                            placeholder="Enter your Contact Number"
                                                            value="{{ old('contact_number', $employee ? $employee->contact_number : '') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="clearResumeModel" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content rounded">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure, you want to clear this resume?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light border rounded"
                                                    data-bs-dismiss="modal">No</button>
                                                <button type="button" id="clearResume"
                                                    class="btn btn-danger rounded">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info" id="save-button">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- end of tab 2 --}}

                {{-- tab 3 --}}
                <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                    <div class="card mt-3">
                        <div class="card-header text-dark">
                            Education > <strong class="ms-1">Add Education</strong> (Fill the latest information
                            first)
                        </div>

                        <form method="POST" action="{{ route('update.employee.education') }}" class="mt-3">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="">
                                    <div class="row mt-3">
                                        <div class="col-12">

                                            <div class="formset-form" data-cnt="form-0">
                                                <div class="row mb-3">
                                                    <label for="degree"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Degree<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="degree" class="form-select selectized"
                                                            id="degree" required>
                                                            <option selected disabled value="">
                                                                Select your degree
                                                            </option>

                                                            @foreach ($degrees as $degree)
                                                                <option value="{{ $degree->id }}"
                                                                    {{ isset($employee) && $employee->degree_id == $degree->id ? 'selected' : '' }}>
                                                                    {{ $degree->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="div_id_form-0-program">
                                                    <label for="course"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Course/Program<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="course" class="form-select selectized"
                                                            id="course">
                                                            <option disabled selected value="">Select Course
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="div_id_form-0-board">
                                                    <label for="board_or_university"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Education Board/University<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="board_or_university"
                                                            maxlength="100" class="form-control" required
                                                            id="board_or_university"
                                                            placeholder="Enter your education board/university"
                                                            value="{{ old('board_or_university', optional($employee)->board_or_university) }}">
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="div_id_form-0-institution">
                                                    <label for="school_or_college_or_institute"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        School/College/Institute<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="school_or_college_or_institute"
                                                            maxlength="100" class="form-control" required
                                                            id="school_or_college_or_institute"
                                                            placeholder="Enter your School/College/Institute"
                                                            value="{{ old('school_or_college_or_institute', optional($employee)->school_or_college_or_institute) }}">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="offset-sm-3 col-sm-8">
                                                        <div class="form-check" id="div_id_form-0-is_current">
                                                            <input type="checkbox" name="is_currently_studying"
                                                                class="form-check-input is-current"
                                                                id="is_currently_studying"
                                                                {{ old('is_currently_studying', $employee->is_currently_studying ?? false) ? 'checked' : '' }}>

                                                            <label class="form-check-label"
                                                                for="is_currently_studying">
                                                                Currently studying here?
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3 marks-secured" id="marks_secured_div">
                                                    <label class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Marks Secured In<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class=" col-6" id="grade_type">
                                                                <select class="form-select" id="grade_type"
                                                                    name="grade_type">
                                                                    <option value="Percentage"
                                                                        @if ($employee && $employee->grade_type == 'Percentage') selected @endif>
                                                                        Percentage</option>
                                                                    <option value="CGPA"
                                                                        @if ($employee && $employee->grade_type == 'CGPA') selected @endif>
                                                                        CGPA</option>
                                                                </select>

                                                            </div>
                                                            <div class="col-6" id="mark_secured">
                                                                <input type="text" name="mark_secured"
                                                                    maxlength="20" placeholder="Marks Secured"
                                                                    class="form-control" id="mark_secured"
                                                                    value="{{ old('mark_secured', $employee->mark_secured ?? '') }}">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="graduation_year_div">
                                                    <label
                                                        class="col-form-label col-sm-3 text-sm-end requiredField graduation-label">
                                                        Graduation Year<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-6" id="div_id_form-0-year">
                                                                <input type="text" name="graduation_year"
                                                                    maxlength="20" placeholder="Graduation Year in AD"
                                                                    class="form-control" id="graduation_year"
                                                                    value="{{ old('graduation_year', $employee->graduation_year ?? '') }}">

                                                            </div>
                                                            <div class="col-6" id="div_id_form-0-month">
                                                                <select name="graduation_month" class="form-select" id="graduation_month">
                                                                    <option value="" disabled {{ old('graduation_month', optional($employee)->graduation_month) == null ? 'selected' : '' }}>
                                                                        Select Month
                                                                    </option>
                                                                    @foreach ([
                                                                        'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 
                                                                        'September', 'October', 'November', 'December'
                                                                    ] as $index => $month)
                                                                        <option value="{{ $month }}" 
                                                                            {{ old('graduation_month', optional($employee)->graduation_month) == $month ? 'selected' : '' }}>
                                                                            {{ $month }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="started_year_div" style="display: none;">
                                                    <label class="col-form-label col-sm-3 text-sm-end">
                                                        Started Year<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-6" id="div_id_form-0-year">
                                                                <input type="text" name="education_started_year"
                                                                    maxlength="20" placeholder="Started Year in AD"
                                                                    class="form-control" id="education_started_year"
                                                                    value="{{ old('education_started_year', $employee->education_started_year ?? '') }}">

                                                            </div>
                                                            <div class="col-6" id="div_id_form-0-month">
                                                                <select name="education_started_month" class="form-select" id="education_started_month">
                                                                    <option value="" disabled selected {{ old('education_started_month', optional($employee)->education_started_month) == null ? 'selected' : '' }}>
                                                                        Select Month
                                                                    </option>
                                                                    @foreach ([
                                                                        'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 
                                                                        'September', 'October', 'November', 'December'
                                                                    ] as $month)
                                                                        <option value="{{ $month }}"
                                                                            {{ old('education_started_month', optional($employee)->education_started_month) == $month ? 'selected' : '' }}>
                                                                            {{ $month }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="ms-3">
                                                    <a class="formset-delete btn btn-link text-danger d-none"
                                                        role="button" title="Delete?">
                                                        <i class="fas fa-times-circle me-1"></i>Clear
                                                    </a>
                                                </div>
                                                <input type="checkbox" name="form-0-DELETE"
                                                    class="d-none formset-delete" id="id_form-0-DELETE">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info" id="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- end of tab 3 --}}

                {{-- tab 4 --}}
                <div class="tab-pane fade" id="training" role="tabpanel" aria-labelledby="training-tab">
                    <div class="card">
                        <div class="card-header text-dark">
                            Training > <strong class="ms-1">Add Training</strong>
                        </div>

                        <form method="POST" action="{{ route('update.employee.training') }}" class="mt-3">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="">
                                    <div class="row mt-3">
                                        <div class="col-12">

                                            <div id="formset-container-training">
                                                @if (count($employee_trainings) > 0)
                                                    @foreach ($employee_trainings as $index => $training)
                                                        <div class="formset-form"
                                                            data-cnt="form-{{ $index }}">
                                                            <div class="row mb-3">
                                                                <label
                                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                    Name of the Training<span
                                                                        class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="training_name[]"
                                                                        class="form-control" required
                                                                        value="{{ $training->training_name }}"
                                                                        placeholder="Enter training name">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label
                                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                    Institution Name<span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="institution_name[]"
                                                                        class="form-control" required
                                                                        value="{{ $training->institution_name }}"
                                                                        placeholder="Enter institution name">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label
                                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                    Duration<span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <div class="row">
                                                                        <div class="col-md-2 col-6">
                                                                            <input type="number"
                                                                                name="training_duration[]"
                                                                                min="0" class="form-control"
                                                                                required
                                                                                value="{{ $training->training_duration }}">
                                                                        </div>
                                                                        <div class="col-md-3 col-6">
                                                                            <select class="form-select"
                                                                                name="training_duration_operator[]"
                                                                                required>
                                                                                <option value="year"
                                                                                    {{ $training->training_duration_operator == 'year' ? 'selected' : '' }}>
                                                                                    Year</option>
                                                                                <option value="month"
                                                                                    {{ $training->training_duration_operator == 'month' ? 'selected' : '' }}>
                                                                                    Month</option>
                                                                                <option value="week"
                                                                                    {{ $training->training_duration_operator == 'week' ? 'selected' : '' }}>
                                                                                    Week</option>
                                                                                <option value="days"
                                                                                    {{ $training->training_duration_operator == 'days' ? 'selected' : '' }}>
                                                                                    Days</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label
                                                                    class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                    Completion Date<span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="date"
                                                                        name="training_completion_date[]"
                                                                        class="form-control"
                                                                        value="{{ $training->training_completion_date }}">
                                                                </div>
                                                            </div>

                                                            <div class="ms-3 mb-3">
                                                                <a class="formset-delete btn btn-link text-danger"
                                                                    role="button" title="Delete?"
                                                                    onclick="deleteFormset(this)">
                                                                    <i class="fas fa-times-circle me-1"></i>Clear
                                                                </a>
                                                            </div>
                                                            <input type="checkbox"
                                                                name="form-{{ $index }}-DELETE"
                                                                class="d-none formset-delete">
                                                            <hr>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                <!-- Empty Form Template (For Adding New Entries) -->
                                                <div class="formset-form"
                                                    data-cnt="form-{{ count($employee_trainings) }}"
                                                    id="id_form-TOTAL_FORMS">
                                                    <div class="row mb-3">
                                                        <label
                                                            class="col-form-label col-sm-3 text-sm-end requiredField">
                                                            Name of the Training<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="training_name[]"
                                                                class="form-control" required
                                                                placeholder="Enter training name">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label
                                                            class="col-form-label col-sm-3 text-sm-end requiredField">
                                                            Institution Name<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="institution_name[]"
                                                                class="form-control" required
                                                                placeholder="Enter institution name">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label
                                                            class="col-form-label col-sm-3 text-sm-end requiredField">
                                                            Duration<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-2 col-6">
                                                                    <input type="number" name="training_duration[]"
                                                                        min="0" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-3 col-6">
                                                                    <select class="form-select" required
                                                                        name="training_duration_operator[]">
                                                                        <option value="year" selected>Year
                                                                        </option>
                                                                        <option value="month">Month</option>
                                                                        <option value="week">Week</option>
                                                                        <option value="days">Days</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label
                                                            class="col-form-label col-sm-3 text-sm-end requiredField">
                                                            Completion Date<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <input type="date" name="training_completion_date[]"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="ms-3 mb-3">
                                                        <a class="formset-delete btn btn-link text-danger d-none"
                                                            role="button" title="Delete?"
                                                            onclick="deleteFormset(this)">
                                                            <i class="fas fa-times-circle me-1"></i>Clear
                                                        </a>
                                                    </div>
                                                    <input type="checkbox"
                                                        name="form-{{ count($employee_trainings) }}-DELETE"
                                                        class="d-none formset-delete">
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="text-center mb-3">
                                                <a href="#" onclick="addAnotherTraining(); return false;"
                                                    id="add-more" class="btn btn-link">
                                                    <i class="fas fa-plus-circle me-2"></i>Add Another Training
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info" id="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- end of tab 4 --}}

                {{-- tab 5 --}}
                <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                    <div class="card">
                        <div class="card-header text-dark">
                            Work Experience > <strong class="ms-1">Add Experience</strong>
                        </div>

                        <form id="experienceForm" method="POST" class="mt-3"
                            action="{{ route('update.employee.experience') }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="">
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div id="formset-container-experience">
                                                @forelse($employee_experiences as $index => $experience)
                                                    <div class="formset-form location-form"
                                                        data-cnt="form-{{ $index }}">
                                                        <!-- Hidden ID field to track existing records -->
                                                        <input type="hidden" name="experience_id[]"
                                                            value="{{ $experience->id }}">

                                                        <div class="row mb-3"
                                                            id="div_id_form-{{ $index }}-org_name">
                                                            <label for="organization_name_{{ $index }}"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Company name<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="organization_name[]"
                                                                    maxlength="255" class="form-control" required
                                                                    placeholder="Enter your company name"
                                                                    value="{{ $experience->organization_name }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3"
                                                            id="div_id_form-{{ $index }}-industry">
                                                            <label for="nature_of_organization_{{ $index }}"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Nature of Organization<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select name="nature_of_organization[]"
                                                                    class="form-select selectized" required>
                                                                    <option value=""
                                                                        {{ !$experience->organization_nature_id ? 'selected' : '' }}>
                                                                        Select nature of organization</option>
                                                                    @foreach ($organization_natures as $organization_nature)
                                                                        <option value="{{ $organization_nature->id }}"
                                                                            {{ $experience->organization_nature_id == $organization_nature->id ? 'selected' : '' }}>
                                                                            {{ $organization_nature->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- Other fields with pre-filled values -->
                                                        <div class="row mb-3"
                                                            id="div_id_form-{{ $index }}-job_location">
                                                            <label for="job_location_{{ $index }}"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job location<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="job_location[]"
                                                                    class="form-control address_autocomplete" required
                                                                    placeholder="Enter your job location"
                                                                    value="{{ $experience->job_location }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3"
                                                            id="div_id_form-{{ $index }}-designation">
                                                            <label for="job_title_{{ $index }}"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job Title<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="job_title[]"
                                                                    class="form-control" required
                                                                    placeholder="Enter your job title"
                                                                    value="{{ $experience->job_title }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3"
                                                            id="div_id_form-{{ $index }}-job_category">
                                                            <label for="job_category_{{ $index }}"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job category<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select name="job_category[]"
                                                                    class="form-select selectized" required>
                                                                    <option value=""
                                                                        {{ !$experience->job_category_id ? 'selected' : '' }}>
                                                                        Select job category</option>
                                                                    @foreach ($job_categories as $job_category)
                                                                        <option value="{{ $job_category->id }}"
                                                                            {{ $experience->job_category_id == $job_category->id ? 'selected' : '' }}>
                                                                            {{ $job_category->category }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3"
                                                            id="div_id_form-{{ $index }}-job_level">
                                                            <label for="job_level_{{ $index }}"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job level<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select name="job_level[]" class="form-select"
                                                                    required>
                                                                    <option value=""
                                                                        {{ !$experience->job_level ? 'selected' : '' }}>
                                                                        Select job level</option>
                                                                    @foreach (['Top Level' => 'Top Level', 'Senior Level' => 'Senior Level', 'Mid Level' => 'Mid Level', 'Entry Level' => 'Entry Level'] as $value => $label)
                                                                        <option value="{{ $value }}"
                                                                            {{ $experience->job_level == $value ? 'selected' : '' }}>
                                                                            {{ $label }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="offset-sm-3 col-sm-8">
                                                                <div class="form-check">
                                                                    <input type="checkbox"
                                                                        name="is_currently_working[]"
                                                                        class="form-check-input is-current"
                                                                        id="is_currently_working_form-{{ $index }}"
                                                                        {{ $experience->is_currently_working ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="is_currently_working_form-{{ $index }}">
                                                                        Is currently working here?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3 exp-start-date">
                                                            <label
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Start Date<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="date" name="started_date[]"
                                                                    class="form-control" required
                                                                    value="{{ $experience->started_date->format('Y-m-d') }}">
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="row mb-3 exp-end-date {{ $experience->is_currently_working ? 'hidden' : '' }}">
                                                            <label
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                End Date<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="date" name="end_date[]"
                                                                    class="form-control end-date-input"
                                                                    {{ $experience->is_currently_working ? '' : 'required' }}
                                                                    value="{{ optional($experience->end_date)->format('Y-m-d') }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label
                                                                for="duties_and_responsibilities_{{ $index }}"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Duties & Responsibilities<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <textarea name="duties_and_responsibilities[]" cols="40" rows="10" class="form-control" required
                                                                    placeholder="Enter your duties and responsibilities">{{ $experience->duties_and_responsibilities }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="ms-3 mb-3">
                                                            <a class="formset-delete btn btn-link text-danger {{ $index == 0 ? 'd-none' : '' }}"
                                                                role="button" title="Delete?"
                                                                onclick="deleteFormset(this)">
                                                                <i class="fas fa-times-circle me-1"></i>Clear
                                                            </a>
                                                        </div>
                                                        <input type="checkbox"
                                                            name="form-{{ $index }}-DELETE"
                                                            class="d-none formset-delete"
                                                            id="id_form-{{ $index }}-DELETE">
                                                        <hr>
                                                    </div>
                                                @empty
                                                    <!-- Default empty formset when no experiences exist -->
                                                    <div class="formset-form location-form" data-cnt="form-0">
                                                        <div class="row mb-3" id="div_id_form-0-org_name">
                                                            <label for="organization_name_0"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Company name<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="organization_name[]"
                                                                    maxlength="255" class="form-control" required
                                                                    placeholder="Enter your company name">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-industry">
                                                            <label for="nature_of_organization_0"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Nature of Organization<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select name="nature_of_organization[]"
                                                                    class="form-select selectized" required>
                                                                    <option value="" selected>Select nature of
                                                                        organization</option>
                                                                    @foreach ($organization_natures as $organization_nature)
                                                                        <option
                                                                            value="{{ $organization_nature->id }}">
                                                                            {{ $organization_nature->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-job_location">
                                                            <label for="job_location_0"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job location<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="job_location[]"
                                                                    class="form-control address_autocomplete" required
                                                                    placeholder="Enter your job location">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-designation">
                                                            <label for="job_title_0"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job Title<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="job_title[]"
                                                                    class="form-control" required
                                                                    placeholder="Enter your job title">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-job_category">
                                                            <label for="job_category_0"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job category<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select name="job_category[]"
                                                                    class="form-select selectized" required>
                                                                    <option value="" selected>Select job category
                                                                    </option>
                                                                    @foreach ($job_categories as $job_category)
                                                                        <option value="{{ $job_category->id }}">
                                                                            {{ $job_category->category }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-job_level">
                                                            <label for="job_level_0"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job level<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select name="job_level[]" class="form-select"
                                                                    required>
                                                                    <option value="" selected>Select job level
                                                                    </option>
                                                                    <option value="Top Level">Top Level</option>
                                                                    <option value="Senior Level">Senior Level</option>
                                                                    <option value="Mid Level">Mid Level</option>
                                                                    <option value="Entry Level">Entry Level</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="offset-sm-3 col-sm-8">
                                                                <div class="form-check">
                                                                    <input type="checkbox"
                                                                        name="is_currently_working[]"
                                                                        class="form-check-input is-current"
                                                                        id="is_currently_working_form-0">
                                                                    <label class="form-check-label"
                                                                        for="is_currently_working_form-0">
                                                                        Is currently working here?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3 exp-start-date">
                                                            <label
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Start Date<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="date" name="started_date[]"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3 exp-end-date">
                                                            <label
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                End Date<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="date" name="end_date[]"
                                                                    class="form-control end-date-input" required>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="duties_and_responsibilities_0"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Duties & Responsibilities<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <textarea name="duties_and_responsibilities[]" cols="40" rows="10" class="form-control" required
                                                                    placeholder="Enter your duties and responsibilities"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="ms-3 mb-3">
                                                            <a class="formset-delete btn btn-link text-danger d-none"
                                                                role="button" title="Delete?"
                                                                onclick="deleteFormset(this)">
                                                                <i class="fas fa-times-circle me-1"></i>Clear
                                                            </a>
                                                        </div>
                                                        <input type="checkbox" name="form-0-DELETE"
                                                            class="d-none formset-delete" id="id_form-0-DELETE">
                                                        <hr>
                                                    </div>
                                                @endforelse
                                            </div>

                                            <div class="text-center mb-3">
                                                <a href="#" onclick="addAnotherExperience(); return false;"
                                                    id="add-more" class="btn btn-link">
                                                    <i class="fas fa-plus-circle me-2"></i>Add Another Experience
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info" id="submit">Save</button>
                            </div>

                            <!-- Hidden input for total forms count -->
                            <input type="hidden" name="form-TOTAL_FORMS"
                                value="{{ count($employee_experiences) ?: 1 }}" id="id_form-TOTAL_FORMS">
                        </form>
                    </div>
                </div>
                {{-- end of tab 5 --}}

                {{-- tab 6 --}}
                <div class="tab-pane fade" id="language" role="tabpanel" aria-labelledby="language-tab">
                    <div class="card">
                        <div class="card-header text-dark">
                            Language > <strong class="ms-1">Add Language</strong>
                        </div>

                        <form id="languageForm" method="POST" action="{{ route('update.employee.language') }}"
                            class="mt-3">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="">
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div id="formset-container-language">
                                                @forelse($employee_languages as $index => $language)
                                                    <div class="formset-form" data-cnt="form-{{ $index }}">
                                                        <!-- Hidden ID field for existing records -->
                                                        <input type="hidden" name="language_id[]"
                                                            value="{{ $language->id }}">

                                                        <div class="row">
                                                            <div class="col-md-3 mb-3 ms-md-5">
                                                                <div id="div_id_form-{{ $index }}-language"
                                                                    class="form-group">
                                                                    <label
                                                                        for="id_form-{{ $index }}-language"
                                                                        class="col-form-label requiredField">
                                                                        Language<span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" name="language[]"
                                                                        maxlength="255" class="form-control"
                                                                        required placeholder="Enter Language"
                                                                        value="{{ $language->language }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-{{ $index }}-reading"
                                                                    class="form-group">
                                                                    <label for="id_form-{{ $index }}-reading"
                                                                        class="col-form-label requiredField">
                                                                        Reading<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="reading[]"
                                                                        class="form-select language-bar-rating w-100"
                                                                        required>
                                                                        <option value="very_poor"
                                                                            {{ $language->reading == 'very_poor' ? 'selected' : '' }}>
                                                                            Very Poor</option>
                                                                        <option value="poor"
                                                                            {{ $language->reading == 'poor' ? 'selected' : '' }}>
                                                                            Poor</option>
                                                                        <option value="average"
                                                                            {{ $language->reading == 'average' ? 'selected' : '' }}>
                                                                            Average</option>
                                                                        <option value="good"
                                                                            {{ $language->reading == 'good' ? 'selected' : '' }}>
                                                                            Good</option>
                                                                        <option value="very_good"
                                                                            {{ $language->reading == 'very_good' ? 'selected' : '' }}>
                                                                            Very Good</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-{{ $index }}-writing"
                                                                    class="form-group">
                                                                    <label for="id_form-{{ $index }}-writing"
                                                                        class="col-form-label requiredField">
                                                                        Writing<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="writing[]"
                                                                        class="form-select language-bar-rating w-100"
                                                                        required>
                                                                        <option value="very_poor"
                                                                            {{ $language->writing == 'very_poor' ? 'selected' : '' }}>
                                                                            Very Poor</option>
                                                                        <option value="poor"
                                                                            {{ $language->writing == 'poor' ? 'selected' : '' }}>
                                                                            Poor</option>
                                                                        <option value="average"
                                                                            {{ $language->writing == 'average' ? 'selected' : '' }}>
                                                                            Average</option>
                                                                        <option value="good"
                                                                            {{ $language->writing == 'good' ? 'selected' : '' }}>
                                                                            Good</option>
                                                                        <option value="very_good"
                                                                            {{ $language->writing == 'very_good' ? 'selected' : '' }}>
                                                                            Very Good</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-{{ $index }}-speaking"
                                                                    class="form-group">
                                                                    <label
                                                                        for="id_form-{{ $index }}-speaking"
                                                                        class="col-form-label requiredField">
                                                                        Speaking<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="speaking[]"
                                                                        class="form-select language-bar-rating w-100"
                                                                        required>
                                                                        <option value="very_poor"
                                                                            {{ $language->speaking == 'very_poor' ? 'selected' : '' }}>
                                                                            Very Poor</option>
                                                                        <option value="poor"
                                                                            {{ $language->speaking == 'poor' ? 'selected' : '' }}>
                                                                            Poor</option>
                                                                        <option value="average"
                                                                            {{ $language->speaking == 'average' ? 'selected' : '' }}>
                                                                            Average</option>
                                                                        <option value="good"
                                                                            {{ $language->speaking == 'good' ? 'selected' : '' }}>
                                                                            Good</option>
                                                                        <option value="very_good"
                                                                            {{ $language->speaking == 'very_good' ? 'selected' : '' }}>
                                                                            Very Good</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-{{ $index }}-listening"
                                                                    class="form-group">
                                                                    <label
                                                                        for="id_form-{{ $index }}-listening"
                                                                        class="col-form-label requiredField">
                                                                        Listening<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="listening[]"
                                                                        class="form-select language-bar-rating w-100"
                                                                        required>
                                                                        <option value="very_poor"
                                                                            {{ $language->listening == 'very_poor' ? 'selected' : '' }}>
                                                                            Very Poor</option>
                                                                        <option value="poor"
                                                                            {{ $language->listening == 'poor' ? 'selected' : '' }}>
                                                                            Poor</option>
                                                                        <option value="average"
                                                                            {{ $language->listening == 'average' ? 'selected' : '' }}>
                                                                            Average</option>
                                                                        <option value="good"
                                                                            {{ $language->listening == 'good' ? 'selected' : '' }}>
                                                                            Good</option>
                                                                        <option value="very_good"
                                                                            {{ $language->listening == 'very_good' ? 'selected' : '' }}>
                                                                            Very Good</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="ms-3 mb-3">
                                                            <a class="formset-delete btn btn-link text-danger {{ $index == 0 ? 'd-none' : '' }}"
                                                                role="button" title="Delete?"
                                                                onclick="deleteFormset(this)">
                                                                <i class="fas fa-times-circle me-1"></i>Clear
                                                            </a>
                                                        </div>
                                                        <input type="checkbox"
                                                            name="form-{{ $index }}-DELETE"
                                                            class="d-none formset-delete"
                                                            id="id_form-{{ $index }}-DELETE">
                                                        <hr>
                                                    </div>
                                                @empty
                                                    <!-- Default empty formset -->
                                                    <div class="formset-form" data-cnt="form-0">
                                                        <div class="row">
                                                            <div class="col-md-3 mb-3 ms-md-5">
                                                                <div id="div_id_form-0-language" class="form-group">
                                                                    <label for="id_form-0-language"
                                                                        class="col-form-label requiredField">
                                                                        Language<span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" name="language[]"
                                                                        maxlength="255" class="form-control"
                                                                        required placeholder="Enter Language">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-0-reading" class="form-group">
                                                                    <label for="id_form-0-reading"
                                                                        class="col-form-label requiredField">
                                                                        Reading<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="reading[]"
                                                                        class="form-select language-bar-rating w-100"
                                                                        required>
                                                                        <option value="very_poor">Very Poor</option>
                                                                        <option value="poor">Poor</option>
                                                                        <option value="average">Average</option>
                                                                        <option value="good">Good</option>
                                                                        <option value="very_good">Very Good</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-0-writing" class="form-group">
                                                                    <label for="id_form-0-writing"
                                                                        class="col-form-label requiredField">
                                                                        Writing<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="writing[]"
                                                                        class="form-select language-bar-rating w-100"
                                                                        required>
                                                                        <option value="very_poor">Very Poor</option>
                                                                        <option value="poor">Poor</option>
                                                                        <option value="average">Average</option>
                                                                        <option value="good">Good</option>
                                                                        <option value="very_good">Very Good</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-0-speaking" class="form-group">
                                                                    <label for="id_form-0-speaking"
                                                                        class="col-form-label requiredField">
                                                                        Speaking<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="speaking[]"
                                                                        class="form-select language-bar-rating w-100"
                                                                        required>
                                                                        <option value="very_poor">Very Poor</option>
                                                                        <option value="poor">Poor</option>
                                                                        <option value="average">Average</option>
                                                                        <option value="good">Good</option>
                                                                        <option value="very_good">Very Good</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-0-listening"
                                                                    class="form-group">
                                                                    <label for="id_form-0-listening"
                                                                        class="col-form-label requiredField">
                                                                        Listening<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="listening[]"
                                                                        class="form-select language-bar-rating w-100"
                                                                        required>
                                                                        <option value="very_poor">Very Poor</option>
                                                                        <option value="poor">Poor</option>
                                                                        <option value="average">Average</option>
                                                                        <option value="good">Good</option>
                                                                        <option value="very_good">Very Good</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="ms-3 mb-3">
                                                            <a class="formset-delete btn btn-link text-danger d-none"
                                                                role="button" title="Delete?"
                                                                onclick="deleteFormset(this)">
                                                                <i class="fas fa-times-circle me-1"></i>Clear
                                                            </a>
                                                        </div>
                                                        <input type="checkbox" name="form-0-DELETE"
                                                            class="d-none formset-delete" id="id_form-0-DELETE">
                                                        <hr>
                                                    </div>
                                                @endforelse
                                            </div>

                                            <div class="text-center mb-3">
                                                <a href="#" onclick="addAnotherLanguage(); return false;"
                                                    id="add-more" class="btn btn-link">
                                                    <i class="fas fa-plus-circle me-2"></i>Add Another Language
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info" id="submit">Save</button>
                            </div>

                            <!-- Hidden input for total forms count -->
                            <input type="hidden" name="form-TOTAL_FORMS"
                                value="{{ count($employee_languages) }}" id="id_form-TOTAL_FORMS">
                        </form>
                    </div>
                </div>
                {{-- end of tab 6 --}}

                {{-- tab 7 --}}
                <div class="tab-pane fade" id="social-account" role="tabpanel"
                    aria-labelledby="social-account-tab">
                    <div class="card">
                        <div class="card-header text-dark">
                            Social Account > <strong class="ms-1">Add Social Account</strong>
                        </div>

                        <form id="socialAccountForm" method="POST"
                            action="{{ route('update.employee.account') }}" class="mt-3">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="">
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div id="formset-container-social-account">
                                                @forelse($employee_social_accounts as $index => $socialAccount)
                                                    <div class="formset-form" data-cnt="form-{{ $index }}">
                                                        <!-- Hidden ID field for existing records -->
                                                        <input type="hidden" name="social_account_id[]"
                                                            value="{{ $socialAccount->id }}">

                                                        <div class="row mb-3"
                                                            id="div_id_form-{{ $index }}-account_name">
                                                            <label for="id_form-{{ $index }}-account_name"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Account name<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="account_name[]"
                                                                    maxlength="100" placeholder="eg.: Facebook"
                                                                    class="form-control" required
                                                                    value="{{ $socialAccount->account_name }}">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3"
                                                            id="div_id_form-{{ $index }}-url">
                                                            <label for="id_form-{{ $index }}-url"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Url<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="url" name="account_url[]"
                                                                    maxlength="255"
                                                                    placeholder="eg.: https://facebook.com/user"
                                                                    class="form-control" required
                                                                    value="{{ $socialAccount->account_url }}">
                                                            </div>
                                                        </div>

                                                        <div class="ms-3 mb-3">
                                                            <a class="formset-delete btn btn-link text-danger {{ $index == 0 ? 'd-none' : '' }}"
                                                                role="button" title="Delete?"
                                                                onclick="deleteFormset(this)">
                                                                <i class="fas fa-times-circle me-1"></i>Clear
                                                            </a>
                                                        </div>
                                                        <input type="checkbox"
                                                            name="form-{{ $index }}-DELETE"
                                                            class="d-none formset-delete"
                                                            id="id_form-{{ $index }}-DELETE">
                                                        <hr>
                                                    </div>
                                                @empty
                                                    <!-- Default empty formset -->
                                                    <div class="formset-form" data-cnt="form-0">
                                                        <div class="row mb-3" id="div_id_form-0-account_name">
                                                            <label for="id_form-0-account_name"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Account name<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="account_name[]"
                                                                    maxlength="100" placeholder="eg.: Facebook"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-url">
                                                            <label for="id_form-0-url"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Url<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="url" name="account_url[]"
                                                                    maxlength="255"
                                                                    placeholder="eg.: https://facebook.com/user"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>

                                                        <div class="ms-3 mb-3">
                                                            <a class="formset-delete btn btn-link text-danger d-none"
                                                                role="button" title="Delete?"
                                                                onclick="deleteFormset(this)">
                                                                <i class="fas fa-times-circle me-1"></i>Clear
                                                            </a>
                                                        </div>
                                                        <input type="checkbox" name="form-0-DELETE"
                                                            class="d-none formset-delete" id="id_form-0-DELETE">
                                                        <hr>
                                                    </div>
                                                @endforelse
                                            </div>

                                            <div class="text-center mb-3">
                                                <a href="#" onclick="addAnotherSocialAccount(); return false;"
                                                    id="add-more" class="btn btn-link">
                                                    <i class="fas fa-plus-circle me-2"></i>Add Another Social Account
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info" id="save-button">Save</button>
                            </div>

                            <!-- Hidden input for total forms count -->
                            <input type="hidden" name="form-TOTAL_FORMS"
                                value="{{ count($employee_social_accounts) }}" id="id_form-TOTAL_FORMS">
                        </form>
                    </div>
                </div>
                {{-- end of tab 7 --}}

                {{-- tab 8 --}}
                <div class="tab-pane fade" id="other-information" role="tabpanel"
                    aria-labelledby="other-information-tab">
                    <div class="card">
                        <div class="card-header text-dark">
                            <strong>Other Information</strong>
                        </div>

                        <form id="otherInfoForm" method="POST"
                            action="{{ route('update.employee.other.information') }}" class="mt-3">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div>
                                    <!-- Willing to Travel -->
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Are you willing to travel outside of your residing location during the job?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="willing_to_travel"
                                                    class="form-check-input" id="id_travel" role="switch"
                                                    {{ isset($employee) && $employee->willing_to_travel ? 'checked' : '' }}>
                                                <label class="form-check-label" for="id_travel">Yes</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Willing to Relocate -->
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Are you willing to temporarily relocate outside of your residing location
                                            during the job period?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="willing_to_relocate"
                                                    class="form-check-input" id="id_relocate" role="switch"
                                                    {{ isset($employee) && $employee->willing_to_relocate ? 'checked' : '' }}>
                                                <label class="form-check-label" for="id_relocate">Yes</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Two-Wheeler License -->
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Do you have a two-wheeler riding license?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="two_wheeler_license"
                                                    class="form-check-input" id="id_two_wheeler_license"
                                                    role="switch"
                                                    {{ isset($employee) && $employee->two_wheeler_license ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="id_two_wheeler_license">Yes</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Four-Wheeler License -->
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Do you have a four-wheeler driving license?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="four_wheeler_license"
                                                    class="form-check-input" id="id_four_wheeler_license"
                                                    role="switch"
                                                    {{ isset($employee) && $employee->four_wheeler_license ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="id_four_wheeler_license">Yes</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Own Two-Wheeler -->
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Do you own a two-wheeler vehicle?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="own_two_wheeler"
                                                    class="form-check-input" id="id_own_two_wheeler"
                                                    role="switch"
                                                    {{ isset($employee) && $employee->own_two_wheeler ? 'checked' : '' }}>
                                                <label class="form-check-label" for="id_own_two_wheeler">Yes</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Own Four-Wheeler -->
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Do you own a four-wheeler vehicle?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="own_four_wheeler"
                                                    class="form-check-input" id="id_own_four_wheeler"
                                                    role="switch"
                                                    {{ isset($employee) && $employee->own_four_wheeler ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="id_own_four_wheeler">Yes</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info" id="submit">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
                {{-- end of tab 8 --}}
            </div>
        </div>

    </div>
@endsection

@push('script')
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select options",
                allowClear: true,
                closeOnSelect: false
            });
        });
    </script>

    <script>
        // Generic function to add a new formset
        function addFormset(containerId, formPrefix) {
            const container = document.getElementById(containerId);
            const totalForms = document.getElementById(`id_${formPrefix}-TOTAL_FORMS`);

            if (!container || !totalForms) return;

            let formCount = parseInt(totalForms.value) || 0;
            const newForm = container.children[0].cloneNode(true);
            const newCount = formCount;

            newForm.setAttribute('data-cnt', `${formPrefix}-${newCount}`);
            newForm.querySelectorAll('[id]').forEach(element => {
                element.id = element.id.replace(`${formPrefix}-0`, `${formPrefix}-${newCount}`);
                if (element.name) {
                    element.name = element.name.replace(`${formPrefix}-0`, `${formPrefix}-${newCount}`);
                }
            });

            newForm.querySelectorAll('input, select, textarea').forEach(element => {
                if (element.type === 'checkbox') {
                    element.checked = false;
                } else if (element.tagName === 'SELECT') {
                    element.selectedIndex = 0;
                } else {
                    element.value = '';
                }
            });

            const deleteBtn = newForm.querySelector('.formset-delete');
            if (deleteBtn) deleteBtn.classList.remove('d-none');

            container.appendChild(newForm);
            formCount++;
            totalForms.value = formCount;
        }



        // Generic function to delete a formset
        function deleteFormset(button) {
            const formset = button.closest('.formset-form');
            if (!formset) {
                console.error('Formset not found for deletion');
                return;
            }

            const deleteCheckbox = formset.querySelector('.formset-delete[type="checkbox"]');
            if (deleteCheckbox) {
                deleteCheckbox.checked = true; // Mark for deletion

                // Remove the formset from the DOM entirely
                formset.parentNode.removeChild(formset);

                // Update the total forms count
                const totalFormsInput = document.getElementById('id_form-TOTAL_FORMS');
                if (totalFormsInput) {
                    let formCount = parseInt(totalFormsInput.value) || 0;
                    if (formCount > 0) {
                        formCount--;
                        totalFormsInput.value = formCount;
                    }
                }

                console.log(`Formset ${formset.dataset.cnt} removed from DOM`);
            } else {
                console.error('Delete checkbox not found in formset');
            }
        }

        // Function to toggle end date visibility
        function toggleEndDate(checkbox, formContainer) {
            const endDateDiv = formContainer.querySelector('.exp-end-date');
            const endDateInput = formContainer.querySelector('.end-date-input');

            if (endDateDiv && endDateInput) {
                if (checkbox.checked) {
                    endDateDiv.classList.add('hidden');
                    endDateInput.removeAttribute('required');
                    endDateInput.value = '';
                } else {
                    endDateDiv.classList.remove('hidden');
                    endDateInput.setAttribute('required', 'required');
                }
            }
        }

        // Function to initialize toggle functionality for all checkboxes in active tab
        function initializeCheckboxes() {
            const experienceTab = document.querySelector('#experience');
            if (experienceTab && experienceTab.classList.contains('active')) {
                experienceTab.querySelectorAll('.is-current').forEach(checkbox => {
                    const formContainer = checkbox.closest('.formset-form');
                    if (formContainer) {
                        const newCheckbox = checkbox.cloneNode(true);
                        checkbox.parentNode.replaceChild(newCheckbox, checkbox);

                        const newFormContainer = newCheckbox.closest('.formset-form');
                        toggleEndDate(newCheckbox, newFormContainer);
                        newCheckbox.addEventListener('change', () => toggleEndDate(newCheckbox, newFormContainer));
                    }
                });
            }
        }

        function addAnotherExperience() {
            addFormset('formset-container-experience', 'form');
            const newForm = document.querySelector('#formset-container-experience .formset-form:last-child');
            if (newForm) {
                const newCheckbox = newForm.querySelector('.is-current');
                if (newCheckbox) {
                    const formContainer = newCheckbox.closest('.formset-form');
                    toggleEndDate(newCheckbox, formContainer);
                    newCheckbox.addEventListener('change', () => toggleEndDate(newCheckbox, formContainer));
                }
            }
        }
        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initializeCheckboxes();
        });

        // Re-initialize when tab is shown
        document.querySelector('#experience-tab').addEventListener('shown.bs.tab', function() {
            initializeCheckboxes();
        });

        // Specific handlers
        function addAnotherTraining() {
            addFormset('formset-container-training', 'form');
        }

        function addAnotherLanguage() {
            addFormset('formset-container-language', 'form');
        }

        function addAnotherSocialAccount() {
            addFormset('formset-container-social-account', 'form');
        }
    </script>

    <script>
        $(document).ready(function() {
            var selectedCourseId = @json($employee->course_id ?? null);

            $('#degree').on('change', function() {
                var degreeId = $(this).val();

                if (degreeId) {
                    $.ajax({
                        url: "/admin/get-courses/" + degreeId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#course').empty();
                            $('#course').append(
                                '<option disabled selected>Select Course</option>');

                            $.each(data, function(key, value) {
                                // Check if the course matches the selected course
                                var selected = (selectedCourseId == value.id) ?
                                    'selected' : '';
                                $('#course').append('<option value="' + value.id +
                                    '" ' + selected + '>' + value.name + '</option>'
                                );
                            });
                        }
                    });
                }
            });

            // If degree is already selected and you want to set the courses immediately
            var initialDegreeId = $('#degree').val();
            if (initialDegreeId) {
                $.ajax({
                    url: "/admin/get-courses/" + initialDegreeId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#course').empty();
                        $('#course').append('<option disabled selected>Select Course</option>');

                        $.each(data, function(key, value) {
                            // Check if the course matches the selected course
                            var selected = (selectedCourseId == value.id) ? 'selected' : '';
                            $('#course').append('<option value="' + value.id + '" ' + selected +
                                '>' + value.name + '</option>');
                        });
                    }
                });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const isStudyingCheckbox = document.getElementById('is_currently_studying');
            const marksSecuredDiv = document.getElementById('marks_secured_div');
            const graduationYearDiv = document.getElementById('graduation_year_div');
            const startedYearDiv = document.getElementById('started_year_div');

            function toggleFields() {
                if (isStudyingCheckbox.checked) {
                    marksSecuredDiv.style.display = 'none';
                    graduationYearDiv.style.display = 'none';
                    startedYearDiv.style.display = 'flex';
                } else {
                    marksSecuredDiv.style.display = 'flex';
                    graduationYearDiv.style.display = 'flex';
                    startedYearDiv.style.display = 'none';
                }
            }

            // Initial check
            toggleFields();

            // Toggle on checkbox change
            isStudyingCheckbox.addEventListener('change', toggleFields);
        });
    </script>
@endpush
