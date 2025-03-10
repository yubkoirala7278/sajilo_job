@extends('admin.layout.master')
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
    </style>
@endsection
@section('content')
    <main id="main" class="main">
        <section class="section profile" style="font-size: 14px !important">

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
                        {{-- tab4  --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="training-tab" data-bs-toggle="tab" data-bs-target="#training"
                                type="button" role="tab" aria-controls="training"
                                aria-selected="false">Training</button>
                        </li>
                        {{-- tab5  --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience"
                                type="button" role="tab" aria-controls="experience"
                                aria-selected="false">Experience</button>
                        </li>

                        {{-- tab 6  --}}
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
                            <form id="" method="POST" enctype="multipart/form-data" class="mt-3">
                                <input type="hidden" name="csrfmiddlewaretoken"
                                    value="tCK1cXRTm1qhgVUU0rSU7auk8EcA5oKD7GCvvTzBmdOINe0RgKSL9AnT5SvGRU4H">
                                <div class="card-body ">
                                    <div class="">
                                        <div class="row py-5">
                                            <div class="col-md-12">
                                                <!-- Job Categories -->
                                                <div class="row mb-3">
                                                    <label for="id_job_categories"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Job Categories<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="job_categories" class="form-select select2" required
                                                            multiple id="id_job_categories">
                                                            <option value="105" selected>Commercial / Logistics / Supply
                                                                Chain</option>
                                                            <option value="105">Computer</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Preferred Industries -->
                                                <div class="row mb-3">
                                                    <label for="id_industries"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Preferred Industries<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="industries" class="form-select select2" required
                                                            multiple id="id_industries">
                                                            <option value="78" selected>Audit Officer</option>
                                                            <option value="191">Dance Instructor</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Preferred Job Title -->
                                                <div class="row mb-3">
                                                    <label for="id_designations"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Preferred Job Title<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="designations" class="form-select select2" required
                                                            multiple id="id_designations">
                                                            <option value="78" selected>Audit Officer</option>
                                                            <option value="191">Dance Instructor</option>
                                                            <!-- Add other options as needed -->
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Looking For -->
                                                <div class="row mb-3">
                                                    <label for="id_job_level"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Looking For<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="job_level" class="form-select" required
                                                            id="id_job_level">
                                                            <option value="">---------</option>
                                                            <option value="top_level">Top Level</option>
                                                            <option value="senior_level" selected>Senior Level</option>
                                                            <option value="mid_level">Mid Level</option>
                                                            <option value="entry_level">Entry Level</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Available For -->
                                                <div class="row mb-3">
                                                    <label for="id_available_for"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Available For<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="available_for" class="form-select select2" required
                                                            multiple id="id_available_for">
                                                            <option value="full_time" selected>Full Time</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Specializations -->
                                                <div class="row mb-3">
                                                    <label for="id_specializations"
                                                        class="col-form-label col-sm-3 text-sm-end">
                                                        Specializations
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="specializations" class="form-select select2"
                                                            multiple id="id_specializations">
                                                            <option value="top_level">Top Level</option>
                                                            <option value="senior_level" selected>Senior Level</option>
                                                            <option value="mid_level">Mid Level</option>
                                                            <option value="entry_level">Entry Level</option>
                                                        </select>
                                                        <small class="form-text text-muted" style="font-size: 11px">Course
                                                            of
                                                            study or core competencies i.e. Accounts, Computing, Branding
                                                            etc.</small>
                                                    </div>
                                                </div>

                                                <!-- Skills -->
                                                <div class="row mb-3">
                                                    <label for="id_skills"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Skills<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="skills" class="form-select select2" required
                                                            multiple id="id_skills">
                                                            <option value="43" selected>Counseling</option>
                                                            <option value="51" selected>Nepali Typing</option>
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
                                                                <select name="salary_currency" class="form-select"
                                                                    id="id_salary_currency">
                                                                    <option value="NRs" selected>NRs</option>
                                                                    <option value="$">$</option>
                                                                    <option value="Irs">Irs</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 mb-2">
                                                                <select name="salary_operator" class="form-select"
                                                                    id="id_salary_operator">
                                                                    <option value="Above" selected>Above</option>
                                                                    <option value="Below">Below</option>
                                                                    <option value="Equals">Equals</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <input type="text" name="salary" value="55555.00"
                                                                    maxlength="15" placeholder="Amount"
                                                                    class="form-control" required id="id_salary">
                                                            </div>
                                                            <div class="col-md-3 mb-2">
                                                                <select name="salary_unit" class="form-select"
                                                                    id="id_salary_unit">
                                                                    <option value="Hourly">Hourly</option>
                                                                    <option value="Daily">Daily</option>
                                                                    <option value="Weekly">Weekly</option>
                                                                    <option value="Monthly" selected>Monthly</option>
                                                                    <option value="Yearly">Yearly</option>
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
                                                                    id="id_current_salary_currency">
                                                                    <option value="NRs">NRs</option>
                                                                    <option value="$">$</option>
                                                                    <option value="Irs">Irs</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 mb-2">
                                                                <select name="current_salary_operator" class="form-select"
                                                                    id="id_current_salary_operator">
                                                                    <option value="Above">Above</option>
                                                                    <option value="Below">Below</option>
                                                                    <option value="Equals">Equals</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <input type="text" name="current_salary"
                                                                    maxlength="15" placeholder="Amount"
                                                                    class="form-control" id="id_current_salary">
                                                            </div>
                                                            <div class="col-md-3 mb-2">
                                                                <select name="current_salary_unit" class="form-select"
                                                                    id="id_current_salary_unit">
                                                                    <option value="Hourly">Hourly</option>
                                                                    <option value="Daily">Daily</option>
                                                                    <option value="Weekly">Weekly</option>
                                                                    <option value="Monthly">Monthly</option>
                                                                    <option value="Yearly">Yearly</option>
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
                                                        <select name="job_location" class="form-select select2" required
                                                            multiple id="job_location">
                                                            <option value="105" selected>Kathmandu</option>
                                                            <option value="105">Hetauda</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Career Objective Summary -->
                                                <div class="row mb-3">
                                                    <label for="id_bio"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Career Objective Summary<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <textarea name="bio" class="form-control trumbowyg-textarea" required id="id_bio" rows="10"
                                                            placeholder="Write your carrer objective"></textarea>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-success" id="submit">Save</button>
                                    <a href="/jobseeker/profile/job-preference/"
                                        class="btn btn-outline-secondary">Cancel</a>
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

                            <form id="jbs_education_form" method="POST" enctype="multipart/form-data" class="mt-3">
                                <input type="hidden" name="csrfmiddlewaretoken"
                                    value="PFKkIpatMOcBXDoMqHWcJFM0TQTRcz9TtJCO1lSbM0A2uWuJG0W3L5FzQ4cXY5tX">

                                <div class="card-body">
                                    <div class="">
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <input type="hidden" name="csrfmiddlewaretoken"
                                                    value="PFKkIpatMOcBXDoMqHWcJFM0TQTRcz9TtJCO1lSbM0A2uWuJG0W3L5FzQ4cXY5tX">

                                                <div class="row mb-3" id="div_id_name">
                                                    <label for="id_name"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Name<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="name" value="Saru Dahal"
                                                            maxlength="100" class="form-control" required id="id_name">
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
                                                            <option value="">---------</option>
                                                            <option value="Male" selected>Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="div_id_dob">
                                                    <label for="id_dob"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Date of Birth<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="dob" value="1999-01-04"
                                                            placeholder="YYYY-MM-DD" data-date-format="yyyy-mm-dd"
                                                            class="form-control datepicker" required id="id_dob">
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
                                                            <option disabled selected>---------</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Unmarried">Unmarried</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="div_id_religion">
                                                    <label for="id_religion-selectized"
                                                        class="col-form-label col-sm-3 text-sm-end">
                                                        Religion
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="religion" data-remote="/api/v1/commons/religions/"
                                                            class="form-select selectized" id="id_religion">
                                                            <option disabled selected>---------</option>
                                                            <option value="Married">Hindu</option>
                                                            <option value="Unmarried">Cristian</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="offset-sm-3 col-sm-8">
                                                        <div class="form-check" id="div_id_is_disabled">
                                                            <input type="checkbox" name="is_disabled"
                                                                class="form-check-input" id="id_is_disabled">
                                                            <label class="form-check-label" for="id_is_disabled">
                                                                Has any form of Disability
                                                            </label>
                                                            <small id="hint_id_is_disabled" class="form-text text-muted">
                                                                Tick this for any kind of physical disability.
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="disable" class="d-none">
                                                    <div class="row mb-3" id="div_id_disabilities">
                                                        <label for="id_disabilities-selectized"
                                                            class="col-form-label col-sm-3 text-sm-end">
                                                            Disabilities
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <select name="disabilities"
                                                                data-remote="/api/v1/commons/disabilities/"
                                                                class="form-select selectized" id="id_disabilities"
                                                                multiple>
                                                            </select>
                                                            <small id="hint_id_disabilities" class="form-text text-muted">
                                                                Disability Factor eg, Color Blind
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="div_id_nationality">
                                                    <label for="id_nationality-selectized"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Nationality<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="nationality" class="form-select selectized"
                                                            id="id_nationality">
                                                            <option value="Nepali" selected>Nepali</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="div_id_resume">
                                                    <label for="id_resume" class="col-form-label col-sm-3 text-sm-end">
                                                        Resume
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <input type="file" name="resume" accept=".pdf,.jpg"
                                                            class="form-control" id="id_resume">
                                                        <small id="hint_id_resume" class="form-text text-muted">
                                                            Upload your resume in .pdf or .jpg format less than 2 MB.
                                                        </small>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="float-end" id="resumeAttachment"></div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="div_id_address">
                                                    <label for="id_address"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Current Address<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="address" value="Kathmandu"
                                                            class="form-control" maxlength="200" required
                                                            id="id_address">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="id_paddress"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Permanent Address<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <input type="text" name="paddress" class="form-control"
                                                                maxlength="100" required id="id_paddress"
                                                                placeholder="Enter your current address">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="id_paddress"
                                                        class="col-form-label col-sm-3 text-sm-end requiredField">
                                                        Contact Number<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <input type="text" name="paddress" class="form-control"
                                                                maxlength="100" required id="id_paddress"
                                                                placeholder="Enter your Contact Number">
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
                                    <a href="/jobseeker/profile/basic-info/" class="btn btn-outline-secondary">Cancel</a>
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

                            <form id="" method="POST" enctype="multipart/form-data" class="mt-3">
                                <input type="hidden" name="csrfmiddlewaretoken"
                                    value="iMIgnXLnsKYK7Ein2qfGAymFhz0X2pq6WQAKGTt5sWmbEXokiJfxCYfeeNj3OVKa">

                                <div class="card-body">
                                    <div class="">
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <input type="hidden" name="form-TOTAL_FORMS" value="1"
                                                    id="id_form-TOTAL_FORMS">
                                                <input type="hidden" name="form-INITIAL_FORMS" value="0"
                                                    id="id_form-INITIAL_FORMS">
                                                <input type="hidden" name="form-MIN_NUM_FORMS" value="1"
                                                    id="id_form-MIN_NUM_FORMS">
                                                <input type="hidden" name="form-MAX_NUM_FORMS" value="1000"
                                                    id="id_form-MAX_NUM_FORMS">

                                                <div class="formset-form" data-cnt="form-0">
                                                    <div class="row mb-3" id="div_id_form-0-degree">
                                                        <label for="id_form-0-degree-selectized"
                                                            class="col-form-label col-sm-3 text-sm-end requiredField">
                                                            Degree<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <select name="form-0-degree" data-local="true"
                                                                data-is-parent="true"
                                                                data-child-remote="/api/v1/commons/education-programs/"
                                                                class="form-select selectized" id="id_form-0-degree">
                                                                <option value="8" selected>Professional Certification
                                                                </option>
                                                                <!-- Other options remain the same -->
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3" id="div_id_form-0-program">
                                                        <label for="id_form-0-program-selectized"
                                                            class="col-form-label col-sm-3 text-sm-end requiredField">
                                                            Course/Program<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <select name="form-0-program"
                                                                data-remote="/api/v1/commons/education-programs/"
                                                                data-parent="degree" data-child-add="true"
                                                                data-clone-empty="true" class="form-select selectized"
                                                                id="id_form-0-program">
                                                                <option value="" selected></option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3" id="div_id_form-0-board">
                                                        <label for="id_form-0-board-selectized"
                                                            class="col-form-label col-sm-3 text-sm-end requiredField">
                                                            Education Board/University<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <select name="form-0-board"
                                                                data-remote="/api/v1/commons/education-boards/"
                                                                class="form-select selectized" id="id_form-0-board">
                                                                <option value="" selected></option>
                                                                <!-- Other options remain the same -->
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3" id="div_id_form-0-institution">
                                                        <label for="id_form-0-institution-selectized"
                                                            class="col-form-label col-sm-3 text-sm-end requiredField">
                                                            School/College/Institute<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <select name="form-0-institution"
                                                                data-remote="/api/v1/commons/education-institutions/"
                                                                class="form-select selectized" id="id_form-0-institution">
                                                                <option value="" selected></option>
                                                                <!-- Other options remain the same -->
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="offset-sm-3 col-sm-8">
                                                            <div class="form-check" id="div_id_form-0-is_current">
                                                                <input type="checkbox" name="form-0-is_current"
                                                                    class="form-check-input is-current"
                                                                    id="id_form-0-is_current">
                                                                <label class="form-check-label"
                                                                    for="id_form-0-is_current">
                                                                    Currently studying here?
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 marks-secured">
                                                        <label class="col-form-label col-sm-3 text-sm-end requiredField">
                                                            Marks Secured In<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-3 col-6" id="div_id_form-0-grade_type">
                                                                    <select name="form-0-grade_type" class="form-select"
                                                                        id="id_form-0-grade_type">
                                                                        <option value="">---------</option>
                                                                        <option value="Percentage">Percentage</option>
                                                                        <option value="CGPA" selected>CGPA</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 col-6"
                                                                    id="div_id_form-0-marks_secured">
                                                                    <input type="text" name="form-0-marks_secured"
                                                                        maxlength="20" placeholder="Marks Secured"
                                                                        class="form-control" id="id_form-0-marks_secured">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label
                                                            class="col-form-label col-sm-3 text-sm-end requiredField graduation-label">
                                                            Graduation Year<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-3 col-6" id="div_id_form-0-year">
                                                                    <select name="form-0-year" class="form-select"
                                                                        id="id_form-0-year">
                                                                        <option value="" selected>Year</option>
                                                                        <!-- Years remain the same, truncated for brevity -->
                                                                        <option value="2025">2025</option>
                                                                        <!-- ... -->
                                                                        <option value="1926">1926</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 col-6" id="div_id_form-0-month">
                                                                    <select name="form-0-month" class="form-select"
                                                                        id="id_form-0-month">
                                                                        <option value="" selected>Month</option>
                                                                        <option value="1">January</option>
                                                                        <!-- ... -->
                                                                        <option value="12">December</option>
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
                                    <a href="/jobseeker/profile/education/" class="btn btn-outline-secondary">Cancel</a>
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

                            <form id="trainingForm" method="POST" enctype="multipart/form-data" class="mt-3">
                                <input type="hidden" name="csrfmiddlewaretoken"
                                    value="8VDV5faKGaPao6VZny4m9QJdeeYCqH5UMZvpobSsGmdBVp1WDR4dbgCMbshIcdpY">

                                <div class="card-body">
                                    <div class="">
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <input type="hidden" name="form-TOTAL_FORMS" value="1"
                                                    id="id_form-TOTAL_FORMS">
                                                <input type="hidden" name="form-INITIAL_FORMS" value="0"
                                                    id="id_form-INITIAL_FORMS">
                                                <input type="hidden" name="form-MIN_NUM_FORMS" value="1"
                                                    id="id_form-MIN_NUM_FORMS">
                                                <input type="hidden" name="form-MAX_NUM_FORMS" value="1000"
                                                    id="id_form-MAX_NUM_FORMS">

                                                <div id="formset-container-training">
                                                    <div class="formset-form" data-cnt="form-0">
                                                        <div class="row mb-3" id="div_id_form-0-training">
                                                            <label for="id_form-0-training"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Name of the Training<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="form-0-training"
                                                                    class="form-control" id="id_form-0-training" required
                                                                    placeholder="Enter training name">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-institution">
                                                            <label for="id_form-0-institution"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Institution Name<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="form-0-institution"
                                                                    class="form-control" id="id_form-0-institution"
                                                                    required placeholder="Enter institution name">
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
                                                                        <input type="number" name="form-0-duration"
                                                                            min="0" class="form-control"
                                                                            id="id_form-0-duration" required>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <select class="form-select" required>
                                                                            <option value="" selected>Year</option>
                                                                            <option>Month</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Completion Year<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <div class="row">
                                                                    <div class="col-md-2 col-6">
                                                                        <select name="form-0-year" class="form-select"
                                                                            id="id_form-0-year" required>
                                                                            <option value="" selected>Year</option>
                                                                            <!-- Truncated for brevity -->
                                                                            <option value="2025">2025</option>
                                                                            <option value="2024">2024</option>
                                                                            <!-- ... -->
                                                                            <option value="1926">1926</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 col-6">
                                                                        <select class="form-select" required>
                                                                            <option value="" selected>January
                                                                            </option>
                                                                            <option>Febraury</option>
                                                                        </select>
                                                                    </div>
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
                                    <a href="/jobseeker/profile/training/" class="btn btn-outline-secondary">Cancel</a>
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

                            <form id="experienceForm" method="POST" enctype="multipart/form-data" class="mt-3">
                                <input type="hidden" name="csrfmiddlewaretoken"
                                    value="isKdl7Wqweto5RJCSGxUbaJApDxmuzsSWwCHE3E8wqRPCaPz8ZxLdAC9mRQsg5MW">

                                <div class="card-body">
                                    <div class="">
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <input type="hidden" name="form-TOTAL_FORMS" value="1"
                                                    id="id_form-TOTAL_FORMS">
                                                <input type="hidden" name="form-INITIAL_FORMS" value="0"
                                                    id="id_form-INITIAL_FORMS">
                                                <input type="hidden" name="form-MIN_NUM_FORMS" value="1"
                                                    id="id_form-MIN_NUM_FORMS">
                                                <input type="hidden" name="form-MAX_NUM_FORMS" value="1000"
                                                    id="id_form-MAX_NUM_FORMS">

                                                <div id="formset-container-experience">
                                                    <div class="formset-form location-form" data-cnt="form-0">
                                                        <div class="row mb-3" id="div_id_form-0-org_name">
                                                            <label for="id_form-0-org_name"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Organization name<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="form-0-org_name"
                                                                    maxlength="255" class="form-control"
                                                                    id="id_form-0-org_name" required
                                                                    placeholder="Enter your organization name">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-industry">
                                                            <label for="id_form-0-industry-selectized"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Nature of Organization<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select name="form-0-industry" data-local="true"
                                                                    class="form-select selectized" id="id_form-0-industry"
                                                                    required>
                                                                    <option selected disabled>Select nature of organization
                                                                    </option>
                                                                    <!-- Add your industry options here -->
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-job_location">
                                                            <label for="id_form-0-job_location"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job location<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="form-0-job_location"
                                                                    class="form-control address_autocomplete"
                                                                    maxlength="100" id="id_form-0-job_location" required
                                                                    placeholder="Enter your job location">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-designation">
                                                            <label for="id_form-0-designation-selectized"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job Title<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select name="form-0-designation"
                                                                    data-remote="/api/v1/commons/designations/"
                                                                    class="form-select selectized"
                                                                    id="id_form-0-designation" required>
                                                                    <option selected disabled>Select job title</option>
                                                                    <!-- Designation options remain the same -->
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-job_category">
                                                            <label for="id_form-0-job_category-selectized"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job category<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select name="form-0-job_category" data-local="true"
                                                                    class="form-select selectized"
                                                                    id="id_form-0-job_category" required>
                                                                    <option disabled selected>Select job category</option>
                                                                    <!-- Add your category options here -->
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-job_level">
                                                            <label for="id_form-0-job_level"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Job level<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select name="form-0-job_level" class="form-select"
                                                                    id="id_form-0-job_level" required>
                                                                    <option selected disabled>Select job level</option>
                                                                    <option value="top_level">Top Level</option>
                                                                    <option value="senior_level">Senior Level</option>
                                                                    <option value="mid_level">Mid Level</option>
                                                                    <option value="entry_level">Entry Level</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="offset-sm-3 col-sm-8">
                                                                <div class="form-check" id="div_id_form-0-is_current">
                                                                    <input type="checkbox" name="form-0-is_current"
                                                                        class="form-check-input is-current"
                                                                        id="id_form-0-is_current">
                                                                    <label class="form-check-label"
                                                                        for="id_form-0-is_current">
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
                                                                <div class="row">
                                                                    <div class="col-md-4 col-6">
                                                                        <select name="form-0-start_year"
                                                                            class="form-select" id="id_form-0-start_year"
                                                                            required>
                                                                            <option value="" selected>Year</option>
                                                                            <!-- Years truncated for brevity -->
                                                                            <option value="2025">2025</option>
                                                                            <!-- ... -->
                                                                            <option value="1926">1926</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4 col-6">
                                                                        <select name="form-0-start_month"
                                                                            class="form-select" id="id_form-0-start_month"
                                                                            required>
                                                                            <option value="" selected>Month</option>
                                                                            <option value="1">January</option>
                                                                            <!-- ... -->
                                                                            <option value="12">December</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3 exp-end-date">
                                                            <label
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                End Date<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <div class="row">
                                                                    <div class="col-md-4 col-6">
                                                                        <select name="form-0-end_year" class="form-select"
                                                                            id="id_form-0-end_year" required>
                                                                            <option value="" selected>Year</option>
                                                                            <!-- Years truncated for brevity -->
                                                                            <option value="2025">2025</option>
                                                                            <!-- ... -->
                                                                            <option value="1926">1926</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4 col-6">
                                                                        <select name="form-0-end_month"
                                                                            class="form-select" id="id_form-0-end_month"
                                                                            required>
                                                                            <option value="" selected>Month</option>
                                                                            <option value="1">January</option>
                                                                            <!-- ... -->
                                                                            <option value="12">December</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-job_description">
                                                            <label for="id_form-0-job_description"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Duties & Responsibilities<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <textarea name="form-0-job_description" cols="40" rows="10" class="form-control"
                                                                    id="id_form-0-job_description" required placeholder="Enter your duties and responsibilities"></textarea>
                                                                <small id="hint_id_form-0-job_description"
                                                                    class="form-text text-muted">
                                                                    You are suggested to fill your actual duties and
                                                                    responsibilities,
                                                                    along with your major achievements to highlight yourself
                                                                    among the recruiters.
                                                                </small>
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
                                    <a href="/jobseeker/profile/work-and-experience/"
                                        class="btn btn-outline-secondary">Cancel</a>
                                </div>
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

                            <form id="languageForm" method="POST" enctype="multipart/form-data" class="mt-3">
                                <input type="hidden" name="csrfmiddlewaretoken"
                                    value="243djrpseSzAhxwUW0iXtyMGuf3RokXqG8VHCn7ae4X1OQCRcjiOvYFfrtmXaQhu">

                                <div class="card-body">
                                    <div class="">
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <input type="hidden" name="form-TOTAL_FORMS" value="1"
                                                    id="id_form-TOTAL_FORMS">
                                                <input type="hidden" name="form-INITIAL_FORMS" value="0"
                                                    id="id_form-INITIAL_FORMS">
                                                <input type="hidden" name="form-MIN_NUM_FORMS" value="1"
                                                    id="id_form-MIN_NUM_FORMS">
                                                <input type="hidden" name="form-MAX_NUM_FORMS" value="1000"
                                                    id="id_form-MAX_NUM_FORMS">

                                                <div id="formset-container-language">
                                                    <div class="formset-form" data-cnt="form-0">
                                                        <div class="row">
                                                            <div class="col-md-3 mb-3 ms-md-5">
                                                                <div id="div_id_form-0-language" class="form-group">
                                                                    <label for="id_form-0-language-selectized"
                                                                        class="col-form-label requiredField">
                                                                        Language<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="form-0-language"
                                                                        data-remote="/api/v1/commons/languages/"
                                                                        class="form-select w-100 unique-select selectized"
                                                                        id="id_form-0-language" required>
                                                                        <option value="" selected>Select Language
                                                                        </option>
                                                                        <option value="1">Nepali</option>
                                                                        <option value="2">English</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-0-reading" class="form-group">
                                                                    <label for="id_form-0-reading"
                                                                        class="col-form-label requiredField">
                                                                        Reading<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="form-0-reading"
                                                                        class="form-select language-bar-rating w-100"
                                                                        id="id_form-0-reading" required>
                                                                        <option value="1">Very Poor</option>
                                                                        <option value="2">Poor</option>
                                                                        <option value="3">Average</option>
                                                                        <option value="4">Good</option>
                                                                        <option value="5">Very Good</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-0-writing" class="form-group">
                                                                    <label for="id_form-0-writing"
                                                                        class="col-form-label requiredField">
                                                                        Writing<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="form-0-writing"
                                                                        class="form-select language-bar-rating w-100"
                                                                        id="id_form-0-writing" required>
                                                                        <option value="1">Very Poor</option>
                                                                        <option value="2">Poor</option>
                                                                        <option value="3">Average</option>
                                                                        <option value="4">Good</option>
                                                                        <option value="5">Very Good</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-0-speaking" class="form-group">
                                                                    <label for="id_form-0-speaking"
                                                                        class="col-form-label requiredField">
                                                                        Speaking<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="form-0-speaking"
                                                                        class="form-select language-bar-rating w-100"
                                                                        id="id_form-0-speaking" required>
                                                                        <option value="1">Very Poor</option>
                                                                        <option value="2">Poor</option>
                                                                        <option value="3">Average</option>
                                                                        <option value="4">Good</option>
                                                                        <option value="5">Very Good</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <div id="div_id_form-0-listening" class="form-group">
                                                                    <label for="id_form-0-listening"
                                                                        class="col-form-label requiredField">
                                                                        Listening<span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="form-0-listening"
                                                                        class="form-select language-bar-rating w-100"
                                                                        id="id_form-0-listening" required>
                                                                        <option value="1">Very Poor</option>
                                                                        <option value="2">Poor</option>
                                                                        <option value="3">Average</option>
                                                                        <option value="4">Good</option>
                                                                        <option value="5">Very Good</option>
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
                                    <a href="/jobseeker/profile/language/" class="btn btn-outline-secondary">Cancel</a>
                                </div>
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

                            <form id="socialAccountForm" method="POST" enctype="multipart/form-data"
                                class="mt-3">
                                <input type="hidden" name="csrfmiddlewaretoken"
                                    value="5ZcGMhd8Y1yoHzqlzr3a1PlWJ0NES1fcJ34a5dVQYdWPeSwiPK313fevGe6KExzg">

                                <div class="card-body">
                                    <div class="">
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <input type="hidden" name="form-TOTAL_FORMS" value="1"
                                                    id="id_form-TOTAL_FORMS">
                                                <input type="hidden" name="form-INITIAL_FORMS" value="0"
                                                    id="id_form-INITIAL_FORMS">
                                                <input type="hidden" name="form-MIN_NUM_FORMS" value="1"
                                                    id="id_form-MIN_NUM_FORMS">
                                                <input type="hidden" name="form-MAX_NUM_FORMS" value="1000"
                                                    id="id_form-MAX_NUM_FORMS">

                                                <div id="formset-container-social-account">
                                                    <div class="formset-form" data-cnt="form-0">
                                                        <div class="row mb-3" id="div_id_form-0-account_name">
                                                            <label for="id_form-0-account_name"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Account name<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="form-0-account_name"
                                                                    maxlength="100" placeholder="eg.: Facebook"
                                                                    class="form-control" id="id_form-0-account_name"
                                                                    required>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3" id="div_id_form-0-url">
                                                            <label for="id_form-0-url"
                                                                class="col-form-label col-sm-3 text-sm-end requiredField">
                                                                Url<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="url" name="form-0-url"
                                                                    maxlength="255"
                                                                    placeholder="eg.: https://facebook.com/user"
                                                                    class="form-control" id="id_form-0-url" required>
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
                                    <a href="/jobseeker/profile/social-account/"
                                        class="btn btn-outline-secondary">Cancel</a>
                                </div>
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
                        
                        <form id="otherInfoForm" method="POST" enctype="multipart/form-data" class="mt-3">
                            
                            <div class="card-body">
                                <div>
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Are you willing to travel outside of your residing location during the job?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="travel" class="form-check-input" id="id_travel" role="switch">
                                                <label class="form-check-label" for="id_travel">Yes</label>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Are you willing to temporarily relocate outside of your residing location during the job period?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="relocate" class="form-check-input" id="id_relocate" role="switch">
                                                <label class="form-check-label" for="id_relocate">Yes</label>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Do you have a two-wheeler riding license?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="two_wheeler_license" class="form-check-input" id="id_two_wheeler_license" role="switch">
                                                <label class="form-check-label" for="id_two_wheeler_license">Yes</label>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Do you have a four-wheeler driving license?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="four_wheeler_license" class="form-check-input" id="id_four_wheeler_license" role="switch">
                                                <label class="form-check-label" for="id_four_wheeler_license">Yes</label>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Do you own a two-wheeler vehicle?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="own_two_wheeler" class="form-check-input" id="id_own_two_wheeler" role="switch">
                                                <label class="form-check-label" for="id_own_two_wheeler">Yes</label>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            Do you own a four-wheeler vehicle?
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="own_four_wheeler" class="form-check-input" id="id_own_four_wheeler" role="switch">
                                                <label class="form-check-label" for="id_own_four_wheeler">Yes</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info" id="submit">Save</button>
                                <a href="/jobseeker/profile/other-info/" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                    </div>
                    {{-- end of tab 8 --}}
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@push('script')
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select options",
                allowClear: true
            });
        });
    </script>

    <script>
        // Generic function to add a new formset
        function addFormset(containerId, formPrefix) {
            console.log(`Adding formset to ${containerId} with prefix ${formPrefix}`);

            const container = document.getElementById(containerId);
            const totalForms = document.getElementById(`id_${formPrefix}-TOTAL_FORMS`);

            if (!container) {
                console.error(`Container with ID '${containerId}' not found`);
                return;
            }
            if (!totalForms) {
                console.error(`Total forms input with ID 'id_${formPrefix}-TOTAL_FORMS' not found`);
                return;
            }

            let formCount = parseInt(totalForms.value) || 0;
            const newForm = container.children[0].cloneNode(true);
            const newCount = formCount;

            // Update all IDs, names, and data-cnt
            newForm.setAttribute('data-cnt', `${formPrefix}-${newCount}`);
            newForm.querySelectorAll('[id]').forEach(element => {
                element.id = element.id.replace(`${formPrefix}-0`, `${formPrefix}-${newCount}`);
                if (element.name) {
                    element.name = element.name.replace(`${formPrefix}-0`, `${formPrefix}-${newCount}`);
                }
            });

            // Clear input values
            newForm.querySelectorAll('input, select, textarea').forEach(element => {
                if (element.type === 'checkbox') {
                    element.checked = false;
                } else if (element.tagName === 'SELECT') {
                    element.selectedIndex = 0;
                } else {
                    element.value = '';
                }
            });

            // Show delete button
            const deleteBtn = newForm.querySelector('.formset-delete');
            if (deleteBtn) {
                deleteBtn.classList.remove('d-none');
            } else {
                console.warn('Delete button not found in new formset');
            }

            // Add the new form
            container.appendChild(newForm);

            // Update form count
            formCount++;
            totalForms.value = formCount;
            console.log(`Form count updated to ${formCount}`);
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
                deleteCheckbox.checked = true;
                formset.style.display = 'none';
                console.log('Formset marked for deletion and hidden');
            } else {
                console.error('Delete checkbox not found in formset');
            }
        }

        // Specific handlers
        function addAnotherTraining() {
            addFormset('formset-container-training', 'form');
        }

        function addAnotherExperience() {
            addFormset('formset-container-experience', 'form');
        }

        function addAnotherLanguage() {
            addFormset('formset-container-language', 'form');
        }

        function addAnotherSocialAccount() {
            addFormset('formset-container-social-account', 'form');
        }
    </script>
@endpush
