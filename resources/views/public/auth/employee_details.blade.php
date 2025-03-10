@extends('public.layouts.master')

@section('custom-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            overflow-x: hidden !important;
        }

        .select2-container {
            width: 100% !important;
        }

        .nice-select {
            display: none;
        }
    </style>
@endsection

@section('content')
    <main>
        <!-- Registration Form Section -->
        <section class="py-5 bg-light">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="card shadow-sm">
                            <div class="card-header text-white py-4"
                                style="background-image: url('https://static.merojob.com/images/jobseeker/banner.png'); background-size: cover; background-position: center;">
                                <h4 class="mb-0 text-light">Welcome Saru Dahal</h4>
                                <p class="mb-0 text-light">Complete your profile to explore endless career opportunities!
                                </p>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('employee.details.store') }}">
                                    @csrf
                                    <!-- Technical and Soft Skills (Multiple Select) -->
                                    <div class="form-group">
                                        <label for="technical_skills" class="font-weight-bold">
                                            What are the major technical and soft Skills you possess? *
                                        </label>
                                        <select class="form-control" name="technical_skills[]" id="technical_skills"
                                            multiple>
                                            @if (count($technicalSkills) > 0)
                                                @foreach ($technicalSkills as $skill)
                                                    <option value="{{ $skill->id }}"
                                                        {{ in_array($skill->id, old('technical_skills', [])) ? 'selected' : '' }}>
                                                        {{ $skill->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('technical_skills'))
                                            <span class="text-danger">{{ $errors->first('technical_skills') }}</span>
                                        @endif
                                    </div>

                                    <!-- Technical and Soft Skills (Multiple Select) -->
                                    <div class="form-group">
                                        <label for="technical_skills" class="font-weight-bold">
                                            What are the preferred Job Title for you? *
                                        </label>
                                        <select class="form-control" name="jobTitles[]" id="jobTitles" multiple>
                                            @if (count($jobTitles) > 0)
                                                @foreach ($jobTitles as $jobTitle)
                                                    <option value="{{ $jobTitle->id }}"
                                                        {{ in_array($jobTitle->id, old('jobTitles', [])) ? 'selected' : '' }}>
                                                        {{ $jobTitle->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('jobTitles'))
                                            <span class="text-danger">{{ $errors->first('jobTitles') }}</span>
                                        @endif
                                    </div>

                                    {{-- select experience level --}}
                                    <div class="form-group">
                                        <label class="font-weight-bold">As per your work experience, indicate your
                                            appropriate Job Level: *</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="job_level"
                                                id="jobLevelEntry" value="entry"
                                                {{ old('job_level') == 'entry' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="jobLevelEntry">
                                                <strong>Entry Level</strong><br>
                                                Experience: 0 to 3 years<br>
                                                Assistant Position or fresh candidate
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="job_level" id="jobLevelMid"
                                                value="mid" {{ old('job_level') == 'mid' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="jobLevelMid">
                                                <strong>Mid Level</strong><br>
                                                Experience: 3 to 7 years<br>
                                                Executive or Officer position
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="job_level"
                                                id="jobLevelSenior" value="senior"
                                                {{ old('job_level') == 'senior' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="jobLevelSenior">
                                                <strong>Senior Level</strong><br>
                                                Experience: 7 to 10 years<br>
                                                Managerial position
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="job_level" id="jobLevelTop"
                                                value="top" {{ old('job_level') == 'top' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="jobLevelTop">
                                                <strong>Top Level</strong><br>
                                                Experience: 10 years above<br>
                                                Key positions i.e. CEO, MD
                                            </label>
                                        </div>

                                        @if ($errors->has('job_level'))
                                            <span class="text-danger">{{ $errors->first('job_level') }}</span>
                                        @endif
                                    </div>

                                    {{-- experience year --}}
                                    <div class="form-group">
                                        <label for="workExperience" class="font-weight-bold">In total, how many years of
                                            Work Experience do you have? *</label>
                                        <input type="text" class="form-control" id="workExperience"
                                            name="work_experience" placeholder="Enter your total years of experience"
                                            value="{{ old('work_experience') }}" min="0" step="1" required>

                                        @if ($errors->has('work_experience'))
                                            <span class="text-danger">{{ $errors->first('work_experience') }}</span>
                                        @endif
                                    </div>

                                    {{-- dob --}}
                                    <div class="form-group">
                                        <label for="dob" class="font-weight-bold">Date of Birth *</label>
                                        <input type="date" class="form-control" id="dob" name="dob"
                                            value="{{ old('dob') }}" required>

                                        @if ($errors->has('dob'))
                                            <span class="text-danger">{{ $errors->first('dob') }}</span>
                                        @endif
                                    </div>

                                    {{-- gender --}}
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="gender">Gender *</label>
                                        <br>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="male" name="gender" class="custom-control-input"
                                                value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="male">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="female" name="gender"
                                                class="custom-control-input" value="female"
                                                {{ old('gender') == 'female' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="female">Female</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="other" name="gender"
                                                class="custom-control-input" value="other"
                                                {{ old('gender') == 'other' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="other">Other</label>
                                        </div>
                                        <!-- Error Handling -->
                                        @if ($errors->has('gender'))
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>




                                    {{-- salary expection --}}
                                    <div class="form-group">
                                        <label for="salary" class="font-weight-bold">What is your Expected Salary for a
                                            new job per month? *</label>

                                        <!-- Salary Amount Input -->
                                        <input type="number" class="form-control mb-3 mr-3" id="amount"
                                            name="amount" value="{{ old('amount') }}" placeholder="Enter Amount"
                                            required>

                                        <!-- Error Handling -->
                                        @if ($errors->has('amount'))
                                            <span class="text-danger">{{ $errors->first('amount') }}</span>
                                        @endif
                                    </div>

                                    {{-- current  address --}}
                                    <div class="form-group">
                                        <label for="current_address" class="font-weight-bold">Currently, where are you
                                            Residing at? *</label>

                                        <input type="text" class="form-control mb-3 mr-3" id="current_address"
                                            name="current_address" value="{{ old('current_address') }}"
                                            placeholder="Enter your current address" required>

                                        <!-- Error Handling -->
                                        @if ($errors->has('current_address'))
                                            <span class="text-danger">{{ $errors->first('current_address') }}</span>
                                        @endif
                                    </div>

                                    {{-- preferred job address --}}
                                    <div class="form-group ">
                                        <label for="preferred_job_address" class="font-weight-bold">Which Job Location you
                                            prefer to work at? *</label>

                                        <div id="jobLocationsContainer">
                                            <!-- Initial input field -->
                                            <div class="location-input d-flex align-items-center mb-3">
                                                <input type="text" class="form-control mr-3"
                                                    name="preferred_job_address[]"
                                                    placeholder="Enter Preferred Job Location" required>
                                                <button type="button" class="btn btn-danger remove-location-btn"
                                                    style="display:none;">&times;</button>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" id="addLocationBtn" class="btn"
                                                style="background-color: white;color:black">
                                                <i class="fas fa-plus-circle"></i> Add Another Preferred Location
                                            </button>
                                        </div>


                                        <!-- Error Handling -->
                                        @if ($errors->has('preferred_job_address'))
                                            <span class="text-danger">{{ $errors->first('preferred_job_address') }}</span>
                                        @endif
                                    </div>

                                    {{-- profile searchable --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="profileSearchable"
                                                name="profileSearchable" value="1" checked>
                                            <label class="custom-control-label" for="profileSearchable"><span
                                                    class="font-weight-bold">Profile Searchable</span> - Your Profile will
                                                be available in the search database and the employer can directly search
                                                your profile and contact you.</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="activelySeekingJob"
                                                name="activelySeekingJob" value="1" checked>
                                            <label class="custom-control-label" for="activelySeekingJob"><span
                                                    class="font-weight-bold">Actively Seeking Job</span> - Boost your
                                                visibility to over 40,000+ employers searching the merojob database.</label>
                                        </div>
                                    </div>




                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary btn-block">Submit Information</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // ======== Initialize multiple select for professional skills with "Select All" option ========
            function initSelect2WithSelectAll(selectId) {
                $(selectId).select2({
                    placeholder: 'Select Your Skills',
                    allowClear: true,
                    closeOnSelect: false
                });
            }

            // Initialize Select2 for the professional skills field
            initSelect2WithSelectAll('#technical_skills');
            initSelect2WithSelectAll('#jobTitles');
        });
    </script>
    <script>
        // Add new job location input field
        document.getElementById('addLocationBtn').addEventListener('click', function() {
            let container = document.getElementById('jobLocationsContainer');
            let newLocationInput = document.createElement('div');
            newLocationInput.classList.add('location-input', 'd-flex', 'align-items-center', 'mb-3');
            newLocationInput.innerHTML = `
                <input type="text" class="form-control mr-3" name="preferred_job_address[]" placeholder="Enter Preferred Job Location" required>
                <button type="button" class="btn btn-danger remove-location-btn">&times;</button>
            `;
            container.appendChild(newLocationInput);

            // Show remove button for each new input
            let removeBtns = document.querySelectorAll('.remove-location-btn');
            removeBtns.forEach(function(btn) {
                btn.style.display = 'inline-block';
            });
        });

        // Remove job location input field
        document.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('remove-location-btn')) {
                event.target.parentElement.remove();
            }
        });
    </script>
@endpush
