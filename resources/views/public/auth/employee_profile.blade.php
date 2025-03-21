@extends('public.layouts.master')

@section('custom-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .list-group-item {
            transition: all 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .list-group-item.active {
            background-color: #E9ECEF;
            border-color: #E9ECEF;
            color: #002a5b;
        }

        .shadow-sm {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05) !important;
        }

        .table td {
            vertical-align: middle;
        }

        .badge {
            font-size: 0.9rem;
        }

        @media (max-width: 767px) {
            .list-group-item {
                font-size: 0.9rem;
            }

            .table td:first-child {
                width: 35%;
            }
        }

        .select2 {
            width: 100% !important;
        }
    </style>
@endsection

@section('content')
    <main>
        <div class="container mb-4 mt-4">
            <!-- Top Card -->
            <div class="card shadow-sm mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 font-weight-bold">
                        <i class="fas fa-user-edit mr-2 text-primary"></i> Edit Profile
                    </h6>
                    <a href="" data-remote="/jobseeker/profile-info/detail/" data-toggle="modal"
                        data-target="#generic-modal-large-box" class="btn btn-success btn-sm">
                        <i class="fas fa-eye mr-1"></i> Preview Profile
                    </a>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 col-12 mb-3 mb-md-0">
                    <div class="list-group shadow-sm">
                        <a href="{{ route('employee.profile', 'job_preference') }}"
                            class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center {{ request()->route('profile_detail') == 'job_preference' ? 'active' : '' }}">
                            <span><i class="fas fa-briefcase mr-2"></i> Job Preference</span>
                            <i class="fas fa-times-circle text-danger" data-toggle="tooltip" title="Incomplete"></i>
                        </a>
                        <a href="{{ route('employee.profile', 'basic_information') }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request()->route('profile_detail') == 'basic_information' ? 'active' : '' }}">
                            <span><i class="fas fa-id-card mr-2"></i> Basic Information</span>
                            <i class="fas fa-times-circle text-danger" data-toggle="tooltip" title="Incomplete"></i>
                        </a>
                        <a href="{{ route('employee.profile', 'education') }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request()->route('profile_detail') == 'education' ? 'active' : '' }}">
                            <span><i class="fas fa-graduation-cap mr-2"></i> Education</span>
                            <i class="fas fa-times-circle text-danger" data-toggle="tooltip" title="Incomplete"></i>
                        </a>
                        <a href="{{ route('employee.profile', 'training') }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request()->route('profile_detail') == 'training' ? 'active' : '' }}">
                            <span><i class="fas fa-laptop mr-2"></i> Training</span>
                            <i class="fas fa-times-circle text-danger" data-toggle="tooltip" title="Incomplete"></i>
                        </a>
                        <a href="{{ route('employee.profile', 'work_experience') }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request()->route('profile_detail') == 'work_experience' ? 'active' : '' }}">
                            <span><i class="fas fa-building mr-2"></i> Work Experience</span>
                            <i class="fas fa-check-circle text-success" data-toggle="tooltip" title="Completed"></i>
                        </a>
                        <a href="{{ route('employee.profile', 'language') }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request()->route('profile_detail') == 'language' ? 'active' : '' }}">
                            <span><i class="fas fa-language mr-2"></i> Language</span>
                            <i class="fas fa-times-circle text-danger" data-toggle="tooltip" title="Incomplete"></i>
                        </a>
                        <a href="{{ route('employee.profile', 'social_account') }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request()->route('profile_detail') == 'social_account' ? 'active' : '' }}">
                            <span><i class="fas fa-share-alt mr-2"></i> Social Account</span>
                            <i class="fas fa-times-circle text-danger" data-toggle="tooltip" title="Incomplete"></i>
                        </a>
                        <a href="{{ route('employee.profile', 'reference') }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request()->route('profile_detail') == 'reference' ? 'active' : '' }}">
                            <span><i class="fas fa-users mr-2"></i> Reference</span>
                            <i class="fas fa-times-circle text-danger" data-toggle="tooltip" title="Incomplete"></i>
                        </a>
                        <a href="{{ route('employee.profile', 'other_info') }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request()->route('profile_detail') == 'other_info' ? 'active' : '' }}">
                            <span><i class="fas fa-info-circle mr-2"></i> Other Information</span>
                            <i class="fas fa-times-circle text-danger" data-toggle="tooltip" title="Incomplete"></i>
                        </a>
                    </div>
                </div>

                <!-- Main Content -->
                @if (request()->route('profile_detail') == 'job_preference')
                    @if (request()->route('profile_sub_detail') == 'edit')
                        <div class="col-md-9 col-12 pt-md-0 pt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white py-3">
                                    <h6 class="mb-0 text-dark" style="font-size: 13px">
                                        <i class="fas fa-briefcase mr-2 text-primary"></i> Job Preference > <span
                                            class="font-weight-bold">Edit Career and Application</span>
                                    </h6>
                                </div>
                                <form id="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="csrfmiddlewaretoken"
                                        value="o7pofngbNIFAzcx47ikPrTfkk2CkObSS2bhSyjYTNU316vD1nBkGtj8ThgVqAHcW">
                                    <div class="card-body p-4">
                                        <div class="inner-card bg-light p-4 rounded" style="font-size: 13px">
                                            <!-- Job Categories -->
                                            <div class="form-group row">
                                                <label for="id_job_categories"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Job
                                                    Categories <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <select name="job_categories[]"
                                                        class="form-control select2 d-none w-100" multiple="multiple"
                                                        required id="id_job_categories">
                                                        <option value="105" selected>Commercial / Logistics / Supply
                                                            Chain</option>
                                                        <option value="106">IT & Telecommunication</option>
                                                        <option value="107">Marketing / Advertising</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Preferred Industries -->
                                            <div class="form-group row">
                                                <label for="id_industries"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Preferred
                                                    Industries <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <select name="industries[]" class="form-control select2 d-none"
                                                        multiple="multiple" required id="id_industries">
                                                        <option value="1">Technology</option>
                                                        <option value="2">Finance</option>
                                                        <option value="3">Education</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Preferred Job Title -->
                                            <div class="form-group row">
                                                <label for="id_designations"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Preferred
                                                    Job Title <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <select name="designations[]" class="form-control select2 d-none"
                                                        multiple="multiple" required id="id_designations">
                                                        <option value="78" selected>Audit Officer</option>
                                                        <option value="191" selected>Dance Instructor</option>
                                                        <option value="8">Office Secretary</option>
                                                        <option value="18">Admin Assistant</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Looking For -->
                                            <div class="form-group row">
                                                <label for="id_job_level"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Looking For
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="select-form">
                                                        <div class="select-itms">
                                                            <select name="select" id="select1" class="w-100">
                                                                <option value="Top Level">Top Level</option>
                                                                <option value="Senior Level" selected>Senior Level</option>
                                                                <option value="Mid Level">Mid Level</option>
                                                                <option value="Entry Level">Entry Level</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Available For -->
                                            <div class="form-group row">
                                                <label for="id_available_for"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Available
                                                    For <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <select name="available_for[]" class="form-control select2 d-none"
                                                        multiple="multiple" required id="id_available_for">
                                                        <option value="full_time" selected>Full Time</option>
                                                        <option value="contract">Contract</option>
                                                        <option value="volunteer">Volunteer</option>
                                                        <option value="internship">Internship</option>
                                                        <option value="traineeship">Traineeship</option>
                                                        <option value="freelance">Freelance</option>
                                                        <option value="part_time">Part Time</option>
                                                        <option value="temporary">Temporary</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Specializations -->
                                            <div class="form-group row">
                                                <label for="id_specializations"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Specializations</label>
                                                <div class="col-sm-8">
                                                    <select name="specializations[]" class="form-control select2 d-none"
                                                        multiple="multiple" id="id_specializations">
                                                        <option value="83753" selected>Chat Gpt-4</option>
                                                        <option value="1751">Python</option>
                                                        <option value="39854">Figma</option>
                                                        <option value="36395">Xero</option>
                                                        <option value="47774">Inkscape</option>
                                                        <option value="47829">Slack</option>
                                                        <option value="50167">Asana</option>
                                                        <option value="392">Human Resource
                                                            Management</option>
                                                        <option value="29671">HTML</option>
                                                        <option value="16">Accounts</option>
                                                        <option value="84186">Generative AI</option>
                                                        <option value="7">Finance</option>
                                                        <option value="21616">Salesforce</option>
                                                        <option value="20859">RealHRsoft</option>
                                                        <option value="16233">Canva</option>
                                                        <option value="43723">Zoho CRM</option>
                                                        <option value="47887">Trello</option>
                                                    </select>
                                                    <small class="form-text text-muted">Course of study or core
                                                        competencies (e.g., Accounts, Computing, Branding)</small>
                                                </div>
                                            </div>

                                            <!-- Skills -->
                                            <div class="form-group row">
                                                <label for="id_skills"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Skills
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <select name="skills[]" class="form-control select2 d-none"
                                                        multiple="multiple" required id="id_skills">
                                                        <option value="43" selected>Counseling</option>
                                                        <option value="51">Nepali Typing</option>
                                                        <option value="6">Training</option>
                                                        <option value="90">Microsoft Azure
                                                        </option>
                                                        <option value="160">Data Migration</option>
                                                        <option value="4">Branding</option>
                                                        <option value="169">Team Management
                                                        </option>
                                                        <option value="162">Firewall</option>
                                                        <option value="251">C#</option>
                                                        <option value="204">Costing</option>
                                                        <option value="18">Work Under Pressure
                                                        </option>
                                                        <option value="187">Fast Learner</option>
                                                        <option value="180">Editing</option>
                                                        <option value="332">Linux</option>
                                                        <option value="318">Project Planning
                                                        </option>
                                                    </select>
                                                    <small class="form-text text-muted">Key abilities related to
                                                        employability (e.g., Leadership, Communication)</small>
                                                </div>
                                            </div>

                                            <!-- Expected Salary -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right font-weight-bold">Expected
                                                    Salary <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-md-2 ">
                                                            <div class="select-form">
                                                                <div class="select-itms">
                                                                    <select name="salary_currency"
                                                                        id="id_salary_currency">
                                                                        <option value="NRs" selected>NRs</option>
                                                                        <option value="$">$</option>
                                                                        <option value="Irs">Irs</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="select-form">
                                                                <div class="select-itms">
                                                                    <select name="salary_operator"
                                                                        id="id_salary_operator">
                                                                        <option value="Above" selected>Above</option>
                                                                        <option value="Below">Below</option>
                                                                        <option value="Equals">Equals</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" name="salary" value="55555.00"
                                                                maxlength="15" placeholder="Amount" class="form-control"
                                                                required id="id_salary">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="select-form">
                                                                <div class="select-itms">
                                                                    <select name="salary_unit" id="id_salary_unit">
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
                                                </div>
                                            </div>

                                            <!-- Current Salary -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right font-weight-bold">Current
                                                    Salary</label>
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-md-2 ">
                                                            <div class="select-form">
                                                                <div class="select-itms">
                                                                    <select name="current_salary_currency"
                                                                        id="id_current_salary_currency">
                                                                        <option value="NRs" selected>NRs</option>
                                                                        <option value="$">$</option>
                                                                        <option value="Irs">Irs</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="select-form">
                                                                <div class="select-itms">
                                                                    <select name="current_salary_operator"
                                                                        id="current_id_salary_operator">
                                                                        <option value="Above" selected>Above</option>
                                                                        <option value="Below">Below</option>
                                                                        <option value="Equals">Equals</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-md-0 pl-md-1">
                                                            <input type="text" name="current_salary" maxlength="15"
                                                                placeholder="Amount" class="form-control"
                                                                id="id_current_salary">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="select-form">
                                                                <div class="select-itms">
                                                                    <select name="current_salary_unit"
                                                                        id="current_id_salary_unit">
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
                                                </div>
                                            </div>

                                            <!-- Career Objective Summary -->
                                            <div class="form-group row">
                                                <label for="id_bio"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Career
                                                    Objective Summary <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <textarea name="bio" cols="40" rows="6" class="form-control" required id="id_bio"
                                                        placeholder="Write your career objective here..."></textarea>
                                                </div>
                                            </div>

                                            <!-- Job Preference Location -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right font-weight-bold">Job
                                                    Preference Location <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <div id="locationFields">
                                                        <div class="input-group mb-2 location-field">
                                                            <input type="text" name="locations[]" value="Kathmandu"
                                                                class="form-control" maxlength="200"
                                                                placeholder="Enter Preferred Job Location" required>
                                                            <div class="input-group-append">
                                                                <button type="button"
                                                                    class="btn btn-outline-danger remove-location"
                                                                    style="display: none;">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <small class="form-text text-muted mt-2">
                                                        <a href="#" id="add-more"
                                                            class="text-primary text-decoration-none">
                                                            <i class="fas fa-plus-circle mr-2"></i> Add Another Preferred
                                                            Location
                                                        </a>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-3 text-center">
                                        <button type="submit" class="btn btn-info mr-2" id="submit">
                                            <i class="fas fa-save mr-1"></i> Save
                                        </button>
                                        <a href="/jobseeker/profile/job-preference/" class="btn btn-outline-secondary">
                                            <i class="fas fa-times mr-1"></i> Cancel
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="col-md-9 col-12 pt-md-0 pt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 font-weight-bold">Job Preference</h6>
                                    <a href="{{ route('employee.profile', ['job_preference', 'edit']) }}"
                                        class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-edit mr-1"></i> Edit Career & Objective
                                    </a>
                                </div>
                                <form id="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="csrfmiddlewaretoken"
                                        value="uoGOWQ0bA1HpsCimbgksA8aV5Pjs85R88syifMITAd5QZVojrzkjCy3u23CyUBbc">
                                    <div class="card-body" style="font-size: 13px">
                                        <div class="mb-3">
                                            <h6 class="font-weight-bold">Career Objective Summary</h6>
                                            <p class="text-muted mb-0">
                                                <a href="{{ route('employee.profile', ['job_preference', 'edit']) }}"
                                                    class="text-primary">
                                                    <i class="fas fa-plus-circle mr-2"></i>Add Career Objective Summary now
                                                </a>
                                            </p>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td class="font-weight-bold" width="25%">Job Categories</td>
                                                        <td>:</td>
                                                        <td><span class="badge badge-light border p-2">Commercial /
                                                                Logistics /
                                                                Supply Chain</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Preferred Industries</td>
                                                        <td>:</td>
                                                        <td>
                                                            <a href="{{ route('employee.profile', ['job_preference', 'edit']) }}"
                                                                class="text-primary">
                                                                Add your <strong>Preferred Industry</strong>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Preferred Job Title</td>
                                                        <td>:</td>
                                                        <td>
                                                            <span class="badge badge-light border p-2 mr-1">Audit
                                                                Officer</span>
                                                            <span class="badge badge-light border p-2">Dance
                                                                Instructor</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Looking for</td>
                                                        <td>:</td>
                                                        <td>Senior Level</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Available for</td>
                                                        <td>:</td>
                                                        <td>Full Time</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Specialization</td>
                                                        <td>:</td>
                                                        <td>
                                                            <a href="{{ route('employee.profile', ['job_preference', 'edit']) }}"
                                                                class="text-primary">
                                                                <i class="fas fa-plus-circle mr-2"></i>Add Specialization
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Skills</td>
                                                        <td>:</td>
                                                        <td>
                                                            <span class="badge badge-light border p-2 mr-1">Nepali
                                                                Typing</span>
                                                            <span class="badge badge-light border p-2">Counseling</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Expected Salary</td>
                                                        <td>:</td>
                                                        <td>
                                                            NRs. (Above) 55,555.00
                                                            <span class="badge badge-light border p-2 ml-1">Monthly</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Current Salary</td>
                                                        <td>:</td>
                                                        <td>
                                                            <a href="{{ route('employee.profile', ['job_preference', 'edit']) }}"
                                                                class="text-primary">
                                                                <i class="fas fa-plus-circle mr-2"></i>Add Current Salary
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Job Preference Location</td>
                                                        <td>:</td>
                                                        <td><span class="badge badge-light border p-2">Kathmandu</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                @elseif(request()->route('profile_detail') == 'basic_information')
                    @if (request()->route('profile_sub_detail') == 'personal-details')
                        <div class="col-md-9 col-12 pt-md-0 pt-3" style="font-size: 13px">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white py-3">
                                    <h6 class="mb-0  text-dark">
                                        <i class="fas fa-id-card mr-2 text-primary"></i> Basic Information > <span
                                            class="font-weight-bold">Edit Personal Information</span>
                                    </h6>
                                </div>
                                <form id="jbs_education_form" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="csrfmiddlewaretoken"
                                        value="XBTlDMj2jvNEyjB2JIvi0YXJGnbyHaUdBFLPWI1KjHb55CHZZ1v92oQiDBuEtGeh">
                                    <div class="card-body p-4">
                                        <div class="inner-card bg-light p-4 rounded">
                                            <!-- Name -->
                                            <div class="form-group row">
                                                <label for="id_name"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Name <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="name" value="Saru Dahal"
                                                        maxlength="100" class="form-control" required id="id_name">
                                                </div>
                                            </div>

                                            <!-- Gender -->
                                            <div class="form-group row">
                                                <label for="id_gender"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Gender
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="select-form">
                                                        <div class="select-itms">
                                                            <select name="gender" id="id_gender" class="w-100">
                                                                <option value="Male" selected>Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Date of Birth -->
                                            <div class="form-group row">
                                                <label for="id_dob"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Date
                                                    of
                                                    Birth <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="dob" value="1999-01-04"
                                                        class="form-control" required id="id_dob">
                                                </div>
                                            </div>

                                            <!-- Marital Status -->
                                            <div class="form-group row">
                                                <label for="id_marital_status"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Marital
                                                    Status <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="select-form">
                                                        <div class="select-itms">
                                                            <select name="marital_status" id="id_marital_status"
                                                                class="w-100">
                                                                <option value="Married">Married</option>
                                                                <option value="Unmarried">Unmarried</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Religion -->
                                            <div class="form-group row">
                                                <label for="id_religion"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Religion</label>
                                                <div class="col-sm-8">
                                                    <div class="select-form">
                                                        <div class="select-itms">
                                                            <select name="religion" id="id_religion" class="w-100">
                                                                <option value="Hinduism">Hinduism</option>
                                                                <option value="Buddhism">Buddhism</option>
                                                                <option value="Christianity">Christianity</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Sikhism">Sikhism</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Disability -->
                                            <div class="form-group row">
                                                <div class="offset-sm-3 col-sm-8">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="is_disabled"
                                                            class="form-check-input" id="id_is_disabled"
                                                            style="margin-top: 2px">
                                                        <label class="form-check-label" for="id_is_disabled">Has any form
                                                            of Disability</label>
                                                        <small class="form-text text-muted d-inline">Tick this for any kind
                                                            of
                                                            physical disability.</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Nationality -->
                                            <div class="form-group row">
                                                <label for="id_nationality"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Nationality
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="select-form">
                                                        <div class="select-itms">
                                                            <select name="nationality" id="id_nationality"
                                                                class="w-100">
                                                                <option value="Nepali" selected>Nepali</option>
                                                                <option value="Indian">Indian</option>
                                                                <option value="American">American</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Resume -->
                                            <div class="form-group row">
                                                <label for="id_resume"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Resume</label>
                                                <div class="col-sm-8">
                                                    <div class="custom-file">
                                                        <input type="file" name="resume" accept=".pdf,.jpg"
                                                            class="custom-file-input" id="id_resume">
                                                        <label class="custom-file-label" for="id_resume">Choose
                                                            file</label>
                                                    </div>
                                                    <small class="form-text text-muted">Upload your resume in .pdf or .jpg
                                                        format (less than 2 MB).</small>
                                                </div>
                                            </div>

                                            <!-- Current Address -->
                                            <div class="form-group row">
                                                <label for="id_address"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Current
                                                    Address <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="address" value="Kathmandu"
                                                        class="form-control" maxlength="200" required id="id_address">
                                                </div>
                                            </div>

                                            <!-- Permanent Address -->
                                            <div class="form-group row">
                                                <label for="id_paddress"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Permanent
                                                    Address <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" name="paddress" class="form-control"
                                                            maxlength="100" required id="id_paddress"
                                                            placeholder="Enter your permanent address">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Contact Number -->
                                            <div class="form-group row">
                                                <label for="contact_no"
                                                    class="col-sm-3 col-form-label text-right font-weight-bold">Contact
                                                    Number <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" name="contact_no" class="form-control"
                                                            maxlength="100" required id="contact_no"
                                                            placeholder="Enter your contact number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-3 text-center">
                                        <button type="submit" class="btn btn-info mr-2" id="save-button">
                                            <i class="fas fa-save mr-1"></i> Save
                                        </button>
                                        <a href="/jobseeker/profile/basic-info/" class="btn btn-outline-secondary">
                                            <i class="fas fa-times mr-1"></i> Cancel
                                        </a>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="col-md-9 col-12 pt-md-0 pt-3">
                                <div class="card shadow-sm border-0">
                                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3"
                                        style="font-size: 13px">
                                        <h6 class="mb-0 font-weight-bold text-dark">
                                            <i class="fas fa-id-card mr-2 text-primary"></i> Basic Information
                                        </h6>
                                        <a href="/jobseeker/profile/edit/personal-details/"
                                            class="btn btn-outline-info btn-sm">
                                            <i class="fas fa-edit mr-1"></i> Edit Basic Info
                                        </a>
                                    </div>
                                    <form id="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="csrfmiddlewaretoken"
                                            value="obPVuFU7d3qzf6ry63K2o1YOnllGXCXL2fHpNBCPdfO0MpxvmmKTqrRnkzEMJ8hP">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover align-middle">
                                                    <tbody style="font-size: 13px">
                                                        <tr>
                                                            <td class="font-weight-bold text-muted" width="25%">Full
                                                                Name
                                                            </td>
                                                            <td class="text-muted" width="5%">:</td>
                                                            <td><strong class="text-dark">Saru Dahal</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Display Picture</td>
                                                            <td class="text-muted">:</td>
                                                            <td>
                                                                <div class="d-flex align-items-center" data-toggle="modal"
                                                                    data-target="#profilePictureModal"
                                                                    style="cursor: pointer">
                                                                    <img class="rounded-circle mr-3 border"
                                                                        src="{{ asset('assets/img/profile-img.jpg') }}"
                                                                        alt="Profile Picture" width="40"
                                                                        height="40">
                                                                    <span class="text-primary"><i
                                                                            class="fas fa-camera mr-2"></i>
                                                                        Change Your Display Picture</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Current Address</td>
                                                            <td class="text-muted">:</td>
                                                            <td class="text-dark">Kathmandu</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Permanent Address</td>
                                                            <td class="text-muted">:</td>
                                                            <td>
                                                                <a href="{{ route('employee.profile', ['basic_information', 'personal-details']) }}"
                                                                    class="text-primary text-decoration-none">
                                                                    <i class="fas fa-plus-circle mr-2"></i> Add Permanent
                                                                    Address
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Mobile No.</td>
                                                            <td class="text-muted">:</td>
                                                            <td class="text-dark">9819011223</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Gender</td>
                                                            <td class="text-muted">:</td>
                                                            <td class="text-dark">Male</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Date of Birth</td>
                                                            <td class="text-muted">:</td>
                                                            <td class="text-dark">Jan. 4, 1999</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Marital Status</td>
                                                            <td class="text-muted">:</td>
                                                            <td class="text-dark">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Religion</td>
                                                            <td class="text-muted">:</td>
                                                            <td class="text-dark">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Nationality</td>
                                                            <td class="text-muted">:</td>
                                                            <td class="text-dark">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold text-muted">Resume</td>
                                                            <td class="text-muted">:</td>
                                                            <td>
                                                                <div class=" text-primary d-flex align-items-center"
                                                                    data-toggle="modal" data-target="#resumeUploadModal"
                                                                    style="cursor: pointer">
                                                                    <i class="fas fa-upload mr-2"></i> Upload Resume
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center bg-white border-top-0 py-3">
                                            <!-- Add footer content here if needed -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                    @endif
                @elseif(request()->route('profile_detail') == 'education')
                    @if (request()->route('profile_sub_detail') == 'education_details')
                        <div class="col-md-9 col-12 pt-md-0 pt-3" style="font-size: 13px;">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white py-3">
                                    <h6 class="mb-0 text-dark">
                                        <i class="fas fa-graduation-cap mr-2 text-primary"></i> Education >
                                        <span class="font-weight-bold">Add Education</span>
                                        <small class="text-muted ml-2">(Fill the latest information first)</small>
                                    </h6>
                                </div>
                                <form id="educationForm" method="POST">
                                    <div class="card-body p-4">
                                        <div class="inner-card bg-light p-4 rounded">
                                            <div id="educationFields">
                                                <!-- Initial Education Entry -->
                                                <div class="education-entry formset-form mb-4" data-cnt="form-0">
                                                    <!-- Degree -->
                                                    <div class="form-group row">
                                                        <label for="id_form-0-degree"
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Degree <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <select name="form-0-degree" class="w-100 d-none" required
                                                                id="id_form-0-degree">
                                                                <option selected disabled>Select your degree</option>
                                                                <option value="5">Doctorate (Ph.D.)</option>
                                                                <option value="3">Graduate (Masters)</option>
                                                                <option value="8">Professional Certification</option>
                                                                <option value="1">Under Graduate (Bachelor)</option>
                                                                <option value="2">Higher Secondary (+2/A Levels/IB)
                                                                </option>
                                                                <option value="9">Diploma Certificate</option>
                                                                <option value="6">School (SLC/SEE)</option>
                                                                <option value="4">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Course/Program -->
                                                    <div class="form-group row">
                                                        <label for="id_form-0-program"
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Course/Program <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <select name="form-0-degree" class="w-100 d-none" required
                                                                id="id_form-0-program">
                                                                <option selected disabled>Select your Course/Program
                                                                </option>
                                                                <option value="cs">Computer Science</option>
                                                                <option value="eng">Engineering</option>
                                                                <option value="mba">MBA</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Education Board/University -->
                                                    <div class="form-group row">
                                                        <label for="id_form-0-board"
                                                            class="col-sm-3 col-form-label text-right font-weight-bold"
                                                            style="white-space: nowrap">
                                                            Education Board/University <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <select name="form-0-degree" class="w-100 d-none" required
                                                                id="id_form-0-board">
                                                                <option selected disabled>Select your Education
                                                                    Board/University</option>
                                                                <option value="tu">Tribhuvan University</option>
                                                                <option value="ku">Kathmandu University</option>
                                                                <option value="pu">Purbanchal University</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- School/College/Institute -->
                                                    <div class="form-group row">
                                                        <label for="id_form-0-institution"
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            School/College/Institute <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <select name="form-0-degree" class="w-100 d-none" required
                                                                id="id_form-0-institution">
                                                                <option selected disabled>Select your
                                                                    School/College/Institute</option>
                                                                <option value="asc">Amrit Science Campus</option>
                                                                <option value="stx">St. Xavier's College</option>
                                                                <option value="kcm">Kathmandu College of Management
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Currently Studying Checkbox -->
                                                    <div class="form-group row">
                                                        <div class="offset-sm-3 col-sm-9">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="form-0-is_current"
                                                                    class="form-check-input is-current"
                                                                    id="id_form-0-is_current">
                                                                <label class="form-check-label"
                                                                    for="id_form-0-is_current">Currently studying
                                                                    here?</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Started Year and Month -->
                                                    <div class="form-group row started-fields" style="display: none;">
                                                        <label class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Started <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-2 mb-md-0">
                                                                    <select name="form-0-degree" class="w-100 d-none"
                                                                        required id="id_form-0-started_year">
                                                                        <option value="" selected>Year</option>
                                                                        <option value="2025">2025</option>
                                                                        <option value="2024">2024</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2021">2021</option>
                                                                        <option value="2020">2020</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select name="form-0-degree" class="w-100 d-none"
                                                                        required id="id_form-0-started_month">
                                                                        <option value="" selected>Month</option>
                                                                        <option value="January">January</option>
                                                                        <option value="February">February</option>
                                                                        <option value="March">March</option>
                                                                        <option value="April">April</option>
                                                                        <option value="May">May</option>
                                                                        <option value="June">June</option>
                                                                        <option value="July">July</option>
                                                                        <option value="August">August</option>
                                                                        <option value="September">September</option>
                                                                        <option value="October">October</option>
                                                                        <option value="November">November</option>
                                                                        <option value="December">December</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Marks Secured -->
                                                    <div class="form-group row completed-fields">
                                                        <label class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Marks Secured In <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-2 mb-md-0">
                                                                    <select name="form-0-degree" class="w-100 d-none"
                                                                        required id="id_form-0-grade_type">
                                                                        <option selected disabled>---------</option>
                                                                        <option value="Percentage">Percentage</option>
                                                                        <option value="CGPA">CGPA</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" name="form-0-marks_secured"
                                                                        maxlength="20" placeholder="Marks Secured"
                                                                        class="form-control w-100"
                                                                        id="id_form-0-marks_secured">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Graduation -->
                                                    <div class="form-group row completed-fields">
                                                        <label class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Graduation <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-2 mb-md-0">
                                                                    <select name="form-0-degree" class="w-100 d-none"
                                                                        required id="id_form-0-year">
                                                                        <option selected disabled>Year</option>
                                                                        <option value="2025">2025</option>
                                                                        <option value="2024">2024</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2021">2021</option>
                                                                        <option value="2020">2020</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select name="form-0-degree" class="w-100 d-none"
                                                                        required id="id_form-0-month">
                                                                        <option selected disabled>Month</option>
                                                                        <option value="1">January</option>
                                                                        <option value="2">February</option>
                                                                        <option value="3">March</option>
                                                                        <option value="4">April</option>
                                                                        <option value="5">May</option>
                                                                        <option value="6">June</option>
                                                                        <option value="7">July</option>
                                                                        <option value="8">August</option>
                                                                        <option value="9">September</option>
                                                                        <option value="10">October</option>
                                                                        <option value="11">November</option>
                                                                        <option value="12">December</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-3 text-center">
                                        <button type="submit" class="btn btn-info mr-2" id="submit">
                                            <i class="fas fa-save mr-1"></i> Save
                                        </button>
                                        <a href="/jobseeker/profile/education/" class="btn btn-outline-secondary">
                                            <i class="fas fa-times mr-1"></i> Cancel
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="col-md-9 col-12 pt-md-0 pt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                                    <h6 class="mb-0 font-weight-bold text-dark">
                                        <i class="fas fa-graduation-cap mr-2 text-primary"></i> Education
                                    </h6>
                                    <a href="{{ route('employee.profile', ['education', 'education_details']) }}"
                                        class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-plus mr-1"></i> Add Education
                                    </a>
                                </div>
                                <form id="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="csrfmiddlewaretoken"
                                        value="glmsEiqJEk4llAbGWHz2h0I5TNJY1yCTUpeWXe8rEwsMSThDc0zTjqBEQ124N4WX">
                                    <div class="card-body text-center py-5">
                                        <div class="education-placeholder">
                                            <img src="https://static.merojob.com/images/pages/jobseeker/education.png"
                                                alt="No Education" class="img-fluid mb-4" style="max-width: 150px;">
                                            <h4 class="text-muted mb-3">No Education Found</h4>
                                            <a href="{{ route('employee.profile', ['education', 'education_details']) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-plus-circle mr-2"></i> Add Education
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-3">
                                        <!-- Add footer content here if needed -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                @elseif(request()->route('profile_detail') == 'training')
                    @if (request()->route('profile_sub_detail') == 'training_details')
                        <div class="col-md-9 col-12 pt-md-0 pt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white py-3">
                                    <h6 class="mb-0 text-dark">
                                        <i class="fas fa-chalkboard-teacher mr-2 text-primary"></i> Training >
                                        <span class="font-weight-bold">Add Training</span>
                                    </h6>
                                </div>
                                <form id="trainingForm" method="POST" enctype="multipart/form-data">
                                    <!-- CSRF Token and Django Formset Hidden Inputs -->
                                    <input type="hidden" name="csrfmiddlewaretoken"
                                        value="PZyGUgn7dPxS2XESJXx8g7RXraX6uDOUt3qadc5Pd1VjzgKPZgxZixKwoogcg98Y">
                                    <input type="hidden" name="form-TOTAL_FORMS" value="1"
                                        id="id_form-TOTAL_FORMS">
                                    <input type="hidden" name="form-INITIAL_FORMS" value="0"
                                        id="id_form-INITIAL_FORMS">
                                    <input type="hidden" name="form-MIN_NUM_FORMS" value="1"
                                        id="id_form-MIN_NUM_FORMS">
                                    <input type="hidden" name="form-MAX_NUM_FORMS" value="1000"
                                        id="id_form-MAX_NUM_FORMS">

                                    <div class="card-body p-4">
                                        <div class="inner-card bg-light p-4 rounded">
                                            <div class="formset-form">
                                                <!-- Name of the Training -->
                                                <div class="form-group row">
                                                    <label for="id_form-0-training"
                                                        class="col-sm-3 col-form-label text-right font-weight-bold"
                                                        style="white-space:nowrap">
                                                        Name of the Training <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            id="id_form-0-training"
                                                            placeholder="Enter your training name">
                                                    </div>
                                                </div>

                                                <!-- Institution Name -->
                                                <div class="form-group row">
                                                    <label for="id_form-0-institution-name"
                                                        class="col-sm-3 col-form-label text-right font-weight-bold"
                                                        style="white-space: nowrap">
                                                        Institution Name <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            id="id_form-0-institution-name"
                                                            placeholder="Enter your institution name">
                                                    </div>
                                                </div>

                                                <!-- Duration -->
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label text-right font-weight-bold">
                                                        Duration <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div class="row d-flex align-items-center">
                                                            <div class="col-md-3 col-6 mb-2 mb-md-0">
                                                                <input type="number" name="form-0-duration"
                                                                    min="0" class="form-control"
                                                                    id="id_form-0-duration" placeholder="Duration"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <select name="form-0-degree" class="w-100 d-none" required
                                                                    id="id_form-0-duration_type">
                                                                    <option value="" selected disabled>---------
                                                                    </option>
                                                                    <option value="Day">Day</option>
                                                                    <option value="Week">Week</option>
                                                                    <option value="Month">Month</option>
                                                                    <option value="Year">Year</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Completion Year -->
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label text-right font-weight-bold">
                                                        Completion Year <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-md-3 col-6 mb-2 mb-md-0">
                                                                <select name="form-0-year" class="form-control d-none"
                                                                    id="id_form-0-year" required>
                                                                    <option value="" selected disabled>Year</option>
                                                                    <!-- Dynamically generate years or use a subset -->
                                                                    <option value="2025">2025</option>
                                                                    <option value="2024">2024</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <!-- Add more years as needed -->
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <select name="form-0-month" class="form-control d-none"
                                                                    id="id_form-0-month" required>
                                                                    <option value="" selected disabled>Month</option>
                                                                    <option value="1">January</option>
                                                                    <option value="2">February</option>
                                                                    <option value="3">March</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">May</option>
                                                                    <option value="6">June</option>
                                                                    <option value="7">July</option>
                                                                    <option value="8">August</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Hidden Delete Checkbox for Django Formset -->
                                                <input type="checkbox" name="form-0-DELETE" class="d-none"
                                                    id="id_form-0-DELETE">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-3 text-center">
                                        <button type="submit" class="btn btn-info mr-2" id="submit">
                                            <i class="fas fa-save mr-1"></i> Save
                                        </button>
                                        <a href="/jobseeker/profile/training/" class="btn btn-outline-secondary">
                                            <i class="fas fa-times mr-1"></i> Cancel
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="col-md-9 col-12 pt-md-0 pt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                                    <h6 class="mb-0 font-weight-bold text-dark">
                                        <i class="fas fa-chalkboard-teacher mr-2 text-primary"></i> Training
                                    </h6>
                                    <a href="{{ route('employee.profile', ['training', 'training_details']) }}"
                                        class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-plus mr-1"></i> Add Training
                                    </a>
                                </div>
                                <form id="" method="POST" enctype="multipart/form-data">
                                    <div class="card-body text-center py-5">
                                        <div class="training-placeholder">
                                            <img src="https://static.merojob.com/images/pages/jobseeker/training.png"
                                                alt="No Training" class="img-fluid mb-4" style="max-width: 150px;">
                                            <h4 class="text-muted mb-3">No Training Found</h4>
                                            <a href="{{ route('employee.profile', ['training', 'training_details']) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-plus-circle mr-2"></i> Add Training
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-3">
                                        <!-- Add footer content here if needed -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                @elseif(request()->route('profile_detail') == 'work_experience')
                    @if (request()->route('profile_sub_detail') == 'work_experience_details')
                        <div class="col-md-9 col-12 pt-md-0 pt-3" style="font-size: 13px;">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white py-3">
                                    <h6 class="mb-0 text-dark">
                                        <i class="fas fa-graduation-cap mr-2 text-primary"></i> Work Experience >
                                        <span class="font-weight-bold">Add Experience</span>
                                    </h6>
                                </div>
                                <form id="educationForm" method="POST">
                                    <div class="card-body p-4">
                                        <div class="inner-card bg-light p-4 rounded">
                                            <div id="educationFields">
                                                <!-- Initial Education Entry -->
                                                <div class="education-entry formset-form mb-4" data-cnt="form-0">
                                                    <!-- Organization Name -->
                                                    <div class="form-group row">
                                                        <label for="id_form-0-degree"
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Organization Name <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter your organization name">
                                                        </div>
                                                    </div>

                                                    <!-- Nature of organization -->
                                                    <div class="form-group row">
                                                        <label for="nature-of-organization"
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Nature of Organization <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <select name="form-0-degree" class="w-100 d-none" required
                                                                id="nature-of-organization">
                                                                <option selected disabled>Select nature of organization
                                                                </option>
                                                                <option value="cs">Construction / Real Estate</option>
                                                                <option value="eng">Banks</option>
                                                                <option value="mba">Engineering Firms</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Job Location -->
                                                    <div class="form-group row">
                                                        <label for="id_form-0-board"
                                                            class="col-sm-3 col-form-label text-right font-weight-bold"
                                                            style="white-space: nowrap">
                                                            Job location <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <input type="email" class="form-control"
                                                                placeholder="Enter your current job location">
                                                        </div>
                                                    </div>

                                                    <!-- Job Title -->
                                                    <div class="form-group row">
                                                        <label for="id_form-0-institution"
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Job Title <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter your current job title">
                                                        </div>
                                                    </div>

                                                    <!-- Job Category -->
                                                    <div class="form-group row">
                                                        <label for="job-category"
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Job category <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <select name="form-0-degree" class="w-100 d-none" required
                                                                id="job-category">
                                                                <option selected disabled>Select your job category
                                                                </option>
                                                                <option value="cs">Hospitality</option>
                                                                <option value="eng">Teaching/Education</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Job Level -->
                                                    <div class="form-group row">
                                                        <label for="job-level"
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Job Level <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <select name="form-0-degree" class="w-100 d-none" required
                                                                id="job-level">
                                                                <option selected disabled>Select your job level
                                                                </option>
                                                                <option value="cs">Top Level</option>
                                                                <option value="eng">Senior Level</option>
                                                                <option value="eng">Mid Level</option>
                                                                <option value="eng">Entry Level</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Currently Studying Checkbox -->
                                                    <div class="form-group row">
                                                        <div class="offset-sm-3 col-sm-9">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="form-0-is_current"
                                                                    class="form-check-input is-current"
                                                                    id="id_form-0-is_current">
                                                                <label class="form-check-label"
                                                                    for="id_form-0-is_current">Is
                                                                    currently working
                                                                    here??</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Started Year and Month -->
                                                    <div class="form-group row started-fields" style="display: none;">
                                                        <label
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Start Date <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-2 mb-md-0">
                                                                    <select name="form-0-degree" class="w-100 d-none"
                                                                        required id="job-start-year">
                                                                        <option selected disabled>Year</option>
                                                                        <option value="2025">2025</option>
                                                                        <option value="2024">2024</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2021">2021</option>
                                                                        <option value="2020">2020</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select name="form-0-degree" class="w-100 d-none"
                                                                        required id="job-start-month">
                                                                        <option selected disabled>Month</option>
                                                                        <option value="1">January</option>
                                                                        <option value="2">February</option>
                                                                        <option value="3">March</option>
                                                                        <option value="4">April</option>
                                                                        <option value="5">May</option>
                                                                        <option value="6">June</option>
                                                                        <option value="7">July</option>
                                                                        <option value="8">August</option>
                                                                        <option value="9">September</option>
                                                                        <option value="10">October</option>
                                                                        <option value="11">November</option>
                                                                        <option value="12">December</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Start Date -->
                                                    <div class="form-group row completed-fields">
                                                        <label
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Start Date <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-2 mb-md-0">
                                                                    <select name="form-0-degree" class="w-100 d-none"
                                                                        required id="job-start-year">
                                                                        <option selected disabled>Year</option>
                                                                        <option value="2025">2025</option>
                                                                        <option value="2024">2024</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2021">2021</option>
                                                                        <option value="2020">2020</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select name="form-0-degree" class="w-100 d-none"
                                                                        required id="job-start-month">
                                                                        <option selected disabled>Month</option>
                                                                        <option value="1">January</option>
                                                                        <option value="2">February</option>
                                                                        <option value="3">March</option>
                                                                        <option value="4">April</option>
                                                                        <option value="5">May</option>
                                                                        <option value="6">June</option>
                                                                        <option value="7">July</option>
                                                                        <option value="8">August</option>
                                                                        <option value="9">September</option>
                                                                        <option value="10">October</option>
                                                                        <option value="11">November</option>
                                                                        <option value="12">December</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- End Date -->
                                                    <div class="form-group row completed-fields">
                                                        <label
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            End Date <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-2 mb-md-0">
                                                                    <select name="form-0-degree" class="w-100 d-none"
                                                                        required id="job-end-year">
                                                                        <option selected disabled>Year</option>
                                                                        <option value="2025">2025</option>
                                                                        <option value="2024">2024</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2021">2021</option>
                                                                        <option value="2020">2020</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select name="form-0-degree" class="w-100 d-none"
                                                                        required id="job-end-month">
                                                                        <option selected disabled>Month</option>
                                                                        <option value="1">January</option>
                                                                        <option value="2">February</option>
                                                                        <option value="3">March</option>
                                                                        <option value="4">April</option>
                                                                        <option value="5">May</option>
                                                                        <option value="6">June</option>
                                                                        <option value="7">July</option>
                                                                        <option value="8">August</option>
                                                                        <option value="9">September</option>
                                                                        <option value="10">October</option>
                                                                        <option value="11">November</option>
                                                                        <option value="12">December</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Duties and responsibility -->
                                                    <div class="form-group row">
                                                        <label for="id_form-0-institution"
                                                            class="col-sm-3 col-form-label text-right font-weight-bold">
                                                            Duties & Responsibilities <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" placeholder="Enter your duties and resposibility in your current/previous work"
                                                                rows="3"></textarea>
                                                            <small class="text-muted">You are suggested to fill your
                                                                actual duties and responsibilities, along with your major
                                                                achievements to highlight yourself among the
                                                                recruiters.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-3 text-center">
                                        <button type="submit" class="btn btn-info mr-2" id="submit">
                                            <i class="fas fa-save mr-1"></i> Save
                                        </button>
                                        <a href="/jobseeker/profile/education/" class="btn btn-outline-secondary">
                                            <i class="fas fa-times mr-1"></i> Cancel
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="col-md-9 col-12 pt-md-0 pt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                                    <div>
                                        <h6 class="mb-0 font-weight-bold text-dark d-inline">
                                            <i class="fas fa-briefcase mr-2 text-primary"></i> Work Experience
                                        </h6>
                                        <span class="text-muted ml-2 font-weight-normal">(1 year, 1 month)</span>
                                    </div>
                                    <a href="{{ route('employee.profile', ['work_experience', 'work_experience_details']) }}"
                                        class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-plus mr-1"></i> Add Experience
                                    </a>
                                </div>
                                <form id="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="csrfmiddlewaretoken"
                                        value="ABhFL9ylbzbU38OJOreBd1cyUGZ7DXFDeF9945g3bLzlArUG4Kesfr57RUidptZH">
                                    <div class="card-body text-center py-5">
                                        <div class="experience-placeholder">
                                            <img src="https://static.merojob.com/images/pages/jobseeker/work-experience.png"
                                                alt="No Experience" class="img-fluid mb-4" style="max-width: 150px;">
                                            <h4 class="text-muted mb-3">No Experience Found</h4>
                                            <a href="{{ route('employee.profile', ['work_experience', 'work_experience_details']) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-plus-circle mr-2"></i> Add Experience
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-3">
                                        <!-- Add footer content here if needed -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                @elseif(request()->route('profile_detail') == 'language')
                    @if (request()->route('profile_sub_detail') == 'language_details')
                        <div class="col-md-9 col-12 pt-md-0 pt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white py-3">
                                    <h6 class="mb-0 text-dark">
                                        <i class="fas fa-chalkboard-teacher mr-2 text-primary"></i> Language >
                                        <span class="font-weight-bold">Add Language</span>
                                    </h6>
                                </div>
                                <form id="trainingForm" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="card border-0">
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div id="formset-container">
                                                        <div class="formset-form mb-4 p-3 bg-light rounded">
                                                            <div class="row align-items-end d-flex align-items-center">
                                                                <div class="col-md-3 mb-3">
                                                                    <div class="form-group">
                                                                        <label for="id_form-0-language"
                                                                            class="font-weight-bold">
                                                                            Language<span class="text-danger">*</span>
                                                                        </label>
                                                                        <select class="w-100 d-none" required
                                                                            id="language">
                                                                            <option selected disabled>Select Language
                                                                            </option>
                                                                            <option value="103">Russian</option>
                                                                            <option value="33">Marathi</option>
                                                                            <option value="131">Sanskrit</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 mb-3">
                                                                    <div class="form-group">
                                                                        <label for="id_form-0-reading"
                                                                            class="font-weight-bold">
                                                                            Reading<span class="text-danger">*</span>
                                                                        </label>
                                                                        <select class="w-100 d-none" required
                                                                            id="language_reading">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 mb-3">
                                                                    <div class="form-group">
                                                                        <label for="id_form-0-writing"
                                                                            class="font-weight-bold">
                                                                            Writing<span class="text-danger">*</span>
                                                                        </label>
                                                                        <select class="w-100 d-none" required
                                                                            id="language_writing">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 mb-3">
                                                                    <div class="form-group">
                                                                        <label for="id_form-0-speaking"
                                                                            class="font-weight-bold">
                                                                            Speaking<span class="text-danger">*</span>
                                                                        </label>
                                                                        <select class="w-100 d-none" required
                                                                            id="language_speaking">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 mb-3">
                                                                    <div class="form-group">
                                                                        <label for="id_form-0-listening"
                                                                            class="font-weight-bold">
                                                                            Listening<span class="text-danger">*</span>
                                                                        </label>
                                                                        <select class="w-100 d-none" required
                                                                            id="language_listening">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 mb-3">
                                                                    <button type="button"
                                                                        class="btn  p-0 btn-sm formset-delete text-danger"
                                                                        style="display: none;background-color:#F8F9FA">
                                                                        <i class="fas fa-trash"></i> Clear
                                                                    </button>
                                                                    <input type="checkbox" name="form-0-DELETE"
                                                                        class="d-none" id="id_form-0-DELETE">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-center mb-3">
                                                        <button type="button" class="btn btn-outline-primary"
                                                            id="add-more">
                                                            <i class="fas fa-plus-circle mr-2"></i>Add Another Language
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-3 text-center">
                                        <button type="submit" class="btn btn-info mr-2" id="submit">
                                            <i class="fas fa-save mr-1"></i> Save
                                        </button>
                                        <a href="/jobseeker/profile/training/" class="btn btn-outline-secondary">
                                            <i class="fas fa-times mr-1"></i> Cancel
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="col-md-9 col-12 pt-md-0 pt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                                    <h6 class="mb-0 font-weight-bold text-dark">
                                        <i class="fas fa-language mr-2 text-primary"></i> Language
                                    </h6>
                                    <a href="{{ route('employee.profile', ['language', 'language_details']) }}"
                                        class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-plus mr-1"></i> Add Language
                                    </a>
                                </div>
                                <form id="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="csrfmiddlewaretoken"
                                        value="fcPpfeZK3vrOWB1x1F4tlYUgKON6PwH7TgHTyaHs3HPftU7uhY4knoNPH26cB21b">
                                    <div class="card-body text-center py-5">
                                        <div class="language-placeholder">
                                            <img src="https://static.merojob.com/images/pages/jobseeker/language.png"
                                                alt="No Language" class="img-fluid mb-4" style="max-width: 150px;">
                                            <h4 class="text-muted mb-3">No Language Found</h4>
                                            <a href="{{ route('employee.profile', ['language', 'language_details']) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-plus-circle mr-2"></i> Add Language
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-3">
                                        <!-- Add footer content here if needed -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                @elseif(request()->route('profile_detail') == 'social_account')
                    <div class="col-md-9 col-12 pt-md-0 pt-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                                <h6 class="mb-0 font-weight-bold text-dark">
                                    <i class="fas fa-share-alt mr-2 text-primary"></i> Social Account
                                </h6>
                                <a href="/jobseeker/profile/social-account/update/" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-plus mr-1"></i> Add Social Account
                                </a>
                            </div>
                            <form id="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="csrfmiddlewaretoken"
                                    value="4scRdFGN5OMuqYO5FFxZPn9IzEpoKHGvIw4lwBov50aVXhU2VYxQRN2hwSIuwd0z">
                                <div class="card-body text-center py-5">
                                    <div class="social-placeholder">
                                        <img src="https://static.merojob.com/images/pages/commons/social-accounts.png"
                                            alt="No Social Accounts" class="img-fluid mb-4" style="max-width: 150px;">
                                        <h4 class="text-muted mb-3">No Social Accounts Found</h4>
                                        <a href="/jobseeker/profile/social-account/update/"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus-circle mr-2"></i> Add Social Account
                                        </a>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-top-0 py-3">
                                    <!-- Add footer content here if needed -->
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif(request()->route('profile_detail') == 'reference')
                    <div class="col-md-9 col-12 pt-md-0 pt-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                                <h6 class="mb-0 font-weight-bold text-dark">
                                    <i class="fas fa-users mr-2 text-primary"></i> Reference
                                </h6>
                                <a href="/jobseeker/profile/reference/update/" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-plus mr-1"></i> Add Reference
                                </a>
                            </div>
                            <form id="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="csrfmiddlewaretoken"
                                    value="C72o1e8AiLVDDH4pcQlOMuB3p2GmKm7GgbUSkaQiiXj4a0ams9lFOUuCmgZswSrK">
                                <div class="card-body text-center py-5">
                                    <div class="reference-placeholder">
                                        <img src="https://static.merojob.com/images/pages/jobseeker/reference.png"
                                            alt="No Reference" class="img-fluid mb-4" style="max-width: 150px;">
                                        <h4 class="text-muted mb-3">No Reference Found</h4>
                                        <a href="/jobseeker/profile/reference/update/" class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus-circle mr-2"></i> Add Reference
                                        </a>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-top-0 py-3">
                                    <!-- Add footer content here if needed -->
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif(request()->route('profile_detail') == 'other_info')
                    <div class="col-md-9 col-12 pt-md-0 pt-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-white py-3">
                                <h6 class="mb-0 font-weight-bold text-dark">
                                    <i class="fas fa-info-circle mr-2 text-primary"></i> Other Information
                                </h6>
                            </div>
                            <form id="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="csrfmiddlewaretoken"
                                    value="jPL67udXzRJI2UObjETP45psBWxEvdHvXTDAqqVFz379zdU8zXTG6vi1yaQKhJ1z">
                                <div class="card-body p-4">
                                    <div class="inner-card bg-light p-3 rounded">
                                        <!-- Travel -->
                                        <div class="row align-items-center mb-3">
                                            <div class="col-9 col-md-9">
                                                <p class="mb-0 text-dark">Are you willing to travel outside of your
                                                    residing location during the job?</p>
                                            </div>
                                            <div class="col-3 col-md-3 text-right">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="id_travel"
                                                        name="travel">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Relocate -->
                                        <div class="row align-items-center mb-3">
                                            <div class="col-9 col-md-9">
                                                <p class="mb-0 text-dark">Are you willing to temporarily relocate outside
                                                    of your residing location during the job period?</p>
                                            </div>
                                            <div class="col-3 col-md-3 text-right">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="id_relocate"
                                                        name="relocate">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Two-Wheeler License -->
                                        <div class="row align-items-center mb-3">
                                            <div class="col-9 col-md-9">
                                                <p class="mb-0 text-dark">Do you have a two-wheeler riding license?</p>
                                            </div>
                                            <div class="col-3 col-md-3 text-right">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="id_two_wheeler_license" name="two_wheeler_license">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Four-Wheeler License -->
                                        <div class="row align-items-center mb-3">
                                            <div class="col-9 col-md-9">
                                                <p class="mb-0 text-dark">Do you have a four-wheeler driving license?</p>
                                            </div>
                                            <div class="col-3 col-md-3 text-right">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="id_four_wheeler_license" name="four_wheeler_license">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Own Two-Wheeler -->
                                        <div class="row align-items-center mb-3">
                                            <div class="col-9 col-md-9">
                                                <p class="mb-0 text-dark">Do you own a two-wheeler vehicle?</p>
                                            </div>
                                            <div class="col-3 col-md-3 text-right">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="id_own_two_wheeler" name="own_two_wheeler">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Own Four-Wheeler -->
                                        <div class="row align-items-center mb-0">
                                            <div class="col-9 col-md-9">
                                                <p class="mb-0 text-dark">Do you own a four-wheeler vehicle?</p>
                                            </div>
                                            <div class="col-3 col-md-3 text-right">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="id_own_four_wheeler" name="own_four_wheeler">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-top-0 py-3 text-center">
                                    <button type="submit" class="btn btn-info mr-2" id="submit">
                                        <i class="fas fa-save mr-1"></i> Save
                                    </button>
                                    <a href="/jobseeker/profile/other-info/" class="btn btn-outline-secondary">
                                        <i class="fas fa-times mr-1"></i> Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    fmfm
                @endif
            </div>
        </div>
    </main>
@endsection

@section('modal')
    <!-- Bootstrap 4 Modal for Profile Picture Upload -->
    @if (request()->route('profile_detail') == 'basic_information')
        <div class="modal fade" id="profilePictureModal" tabindex="-1" role="dialog"
            aria-labelledby="profilePictureModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content shadow-lg border-0">
                    <div class="modal-header bg-light border-bottom-0">
                        <h5 class="modal-title font-weight-bold text-dark" id="profilePictureModalLabel">
                            <i class="fas fa-camera mr-2 text-primary"></i> Update Profile Picture
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <form id="profilePictureForm" method="POST" enctype="multipart/form-data"
                            action="/account/update-profile-pic/">
                            <input type="hidden" name="csrfmiddlewaretoken"
                                value="obPVuFU7d3qzf6ry63K2o1YOnllGXCXL2fHpNBCPdfO0MpxvmmKTqrRnkzEMJ8hP">
                            <div class="form-group text-center">
                                <img class="rounded-circle mb-3 border" src="{{ asset('assets/img/profile-img.jpg') }}"
                                    alt="Current Profile Picture" width="100" height="100" id="previewImage">
                                <p class="text-muted mb-3">Current Profile Picture</p>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="profileImageInput"
                                        name="profile_image" accept="image/*" required>
                                    <label class="custom-file-label" for="profileImageInput">Choose a new image</label>
                                </div>
                                <small class="form-text text-muted mt-2">Accepted formats: JPG, PNG (Max size:
                                    5MB)</small>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer bg-light border-top-0 justify-content-center">
                        <button type="submit" form="profilePictureForm" class="btn btn-primary">
                            <i class="fas fa-upload mr-1"></i> Upload
                        </button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                            <i class="fas fa-times mr-1"></i> Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Bootstrap 4 Modal for Resume Upload -->
    @if (request()->route('profile_detail') == 'basic_information' && !request()->route('profile_sub_detail'))
        <div class="modal fade" id="resumeUploadModal" tabindex="-1" role="dialog"
            aria-labelledby="resumeUploadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content shadow-lg border-0">
                    <div class="modal-header bg-light border-bottom-0">
                        <h5 class="modal-title font-weight-bold text-dark" id="resumeUploadModalLabel">
                            <i class="fas fa-upload mr-2 text-primary"></i> Upload Resume
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <form id="resumeUploadForm" method="POST" enctype="multipart/form-data"
                            action="/jobseeker/profile/upload-resume/">
                            <input type="hidden" name="csrfmiddlewaretoken"
                                value="obPVuFU7d3qzf6ry63K2o1YOnllGXCXL2fHpNBCPdfO0MpxvmmKTqrRnkzEMJ8hP">
                            <div class="form-group text-center">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="resumeInput" name="resume"
                                        accept=".pdf,.jpg" required>
                                    <label class="custom-file-label" for="resumeInput">Choose a resume file</label>
                                </div>
                                <small class="form-text text-muted mt-2">Accepted formats: PDF, JPG (Max size:
                                    2MB)</small>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer bg-light border-top-0 justify-content-center">
                        <button type="submit" form="resumeUploadForm" class="btn btn-primary">
                            <i class="fas fa-upload mr-1"></i> Upload
                        </button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                            <i class="fas fa-times mr-1"></i> Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Select Multiple
            function initSelect2WithSelectAll(selectId) {
                $(selectId).select2({
                    placeholder: 'Select Your Options',
                    allowClear: true,
                    closeOnSelect: false
                });
            }

            // Select One
            function initSelect2WithSelectOne(selectId) {
                $(selectId).select2({
                    placeholder: 'Select Your Options',
                    allowClear: true,
                    closeOnSelect: true,
                    minimumResultsForSearch: Infinity // Disables the search box
                });
            }

            // Select Multiple
            initSelect2WithSelectAll('#id_job_categories');
            initSelect2WithSelectAll('#id_industries');
            initSelect2WithSelectAll('#id_designations');
            initSelect2WithSelectAll('#id_available_for');
            initSelect2WithSelectAll('#id_specializations');
            initSelect2WithSelectAll('#id_skills');


            // Select One
            initSelect2WithSelectOne('#id_form-0-degree');
            initSelect2WithSelectOne('#id_form-0-program');
            initSelect2WithSelectOne('#id_form-0-board');
            initSelect2WithSelectOne('#id_form-0-institution');
            initSelect2WithSelectOne('#id_form-0-grade_type');
            initSelect2WithSelectOne('#id_form-0-month');
            initSelect2WithSelectOne('#id_form-0-year');
            initSelect2WithSelectOne('#id_form-0-started_month');
            initSelect2WithSelectOne('#id_form-0-started_year');
            initSelect2WithSelectOne('#id_form-0-duration_type');
            initSelect2WithSelectOne('#nature-of-organization');
            initSelect2WithSelectOne('#job-category');
            initSelect2WithSelectOne('#job-level');
            initSelect2WithSelectOne('#job-end-month');
            initSelect2WithSelectOne('#job-end-year');
            initSelect2WithSelectOne('#job-start-month');
            initSelect2WithSelectOne('#job-start-year');
            // initSelect2WithSelectOne('#language');
            // initSelect2WithSelectOne('#language_reading');
            // initSelect2WithSelectOne('#language_writing');
            // initSelect2WithSelectOne('#language_speaking');
            // initSelect2WithSelectOne('#language_listening');
        });
    </script>
    <script>
        $(document).ready(function() {

            // Function to toggle fields based on checkbox state
            function toggleFields(checkbox, entry) {
                const isChecked = checkbox.is(':checked');
                entry.find('.started-fields').toggle(isChecked);
                entry.find('.completed-fields').toggle(!isChecked);
            }

            // Initial toggle for existing entries
            $('.is-current').each(function() {
                toggleFields($(this), $(this).closest('.education-entry'));
            });

            // Event delegation for checkbox changes
            $(document).on('change', '.is-current', function() {
                toggleFields($(this), $(this).closest('.education-entry'));
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            function initSelect2(selectElement) {
                $(selectElement).select2({
                    placeholder: 'Select Your Options',
                    allowClear: true,
                    closeOnSelect: true,
                    minimumResultsForSearch: Infinity // Disables the search box
                });
            }
    
            // Initialize Select2 for existing fields
            $("#formset-container select").each(function () {
                initSelect2(this);
            });
    
            $("#add-more").click(function () {
                let formCount = $(".formset-form").length; // Get the count of existing forms
                let newForm = $(".formset-form:first").clone(); // Clone the first form
    
                // Remove old values, update IDs, and reinitialize Select2
                newForm.find("select").each(function () {
                    let oldId = $(this).attr("id");
                    let newId = oldId + "_" + formCount; // Generate a unique ID
    
                    // Destroy previous Select2 instance
                    if ($(this).data('select2')) {
                        $(this).select2('destroy');
                    }
    
                    $(this).attr("id", newId).val("").prop("selectedIndex", 0); // Reset value
                    $(this).removeClass("select2-hidden-accessible").next(".select2-container").remove(); // Clean up old Select2 markup
                });
    
                // Show delete button for new forms
                newForm.find(".formset-delete").show();
    
                $("#formset-container").append(newForm); // Append new form
    
                // Reinitialize Select2 on newly added select elements
                newForm.find("select").each(function () {
                    initSelect2(this);
                });
            });
    
            $(document).on("click", ".formset-delete", function () {
                $(this).closest(".formset-form").remove();
            });
    
            // Ensure the first form never shows the delete button
            $(".formset-form:first .formset-delete").hide();
        });
    </script>
    
@endpush
