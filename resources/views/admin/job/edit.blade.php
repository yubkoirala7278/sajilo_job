@extends('admin.layout.master')

@section('header-content')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <style>
        .select2-container .select2-selection--multiple {
            min-height: 38px;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #2C3E50;
            color: white;
            border-radius: 0.25rem;
        }

        .card-header {
            background: linear-gradient(45deg, #2C3E50, #4A6278);
            color: white;
        }

        .form-label {
            color: #2C3E50;
            font-weight: 600;
        }

        .btn-primary {
            background: #2C3E50;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #4A6278;
            transform: translateY(-2px);
        }
    </style>
@endsection

@section('content')
    <main id="main" class="main py-4">
        <div class="container-fluid">
            <section class="section profile">
                <div class="row mb-4">
                    <div class="col-12">
                        <nav aria-label="breadcrumb" class="bg-light p-3 rounded shadow-sm">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.home') }}" class="text-decoration-none">
                                        <i class="fa-solid fa-house text-primary"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('job.index') }}" class="text-decoration-none text-dark">Jobs</a>
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Update Job</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card border-0 shadow">
                            <div class="card-header py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">Update Job Posting</h4>
                                    <a href="{{ route('job.index') }}"
                                        class="btn btn-outline-light btn-sm rounded-pill px-3">
                                        <i class="fa-solid fa-arrow-left me-2"></i>Back to Jobs
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('job.update', $job->slug) }}" method="POST" class="needs-validation"
                                    novalidate>
                                    @csrf
                                    @method('PUT')

                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label for="job_title" class="form-label">Job Title *</label>
                                            <input type="text" class="form-control" id="job_title" name="job_title"
                                                value="{{ old('job_title', $job->job_title) }}" required
                                                placeholder="eg: PHP Laravel Developer">
                                            @error('job_title')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="category_id" class="form-label">Category *</label>
                                            <select class="form-select" id="category_id" name="category_id" required>
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id', $job->category_id) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="skills" class="form-label">Required Skills *</label>
                                            <select name="skills[]" class="form-select select2" multiple required>
                                                @if ($employee_skills->count() > 0)
                                                    @foreach ($employee_skills as $skill)
                                                        <option value="{{ $skill->id }}"
                                                            {{ in_array($skill->id, old('skills', $job->skills->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                            {{ $skill->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('skills')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="job_level" class="form-label">Job Level *</label>
                                            <select class="form-select" id="job_level" name="job_level" required>
                                                <option value="">Select Level</option>
                                                @foreach (['Entry Level', 'Mid Level', 'Senior Level'] as $level)
                                                    <option value="{{ $level }}"
                                                        {{ old('job_level', $job->job_level) == $level ? 'selected' : '' }}>
                                                        {{ $level }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('job_level')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="employment_type" class="form-label">Employment Type *</label>
                                            <select class="form-select" id="employment_type" name="employment_type"
                                                required>
                                                <option value="">Select Type</option>
                                                @foreach (['Full Time', 'Part Time', 'Contract', 'Freelance', 'Internship'] as $type)
                                                    <option value="{{ $type }}"
                                                        {{ old('employment_type', $job->employment_type) == $type ? 'selected' : '' }}>
                                                        {{ $type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('employment_type')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="no_of_vacancy" class="form-label">Vacancies *</label>
                                            <input type="number" class="form-control" id="no_of_vacancy"
                                                name="no_of_vacancy"
                                                value="{{ old('no_of_vacancy', $job->no_of_vacancy) }}" required
                                                placeholder="Enter Number of Vacancy">
                                            @error('no_of_vacancy')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="country" class="form-label">Country *</label>
                                            <select name="job_country" class="form-select" id="country">
                                                @if (count($countries))
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->name }}"
                                                            {{ old('job_country', $job->job_country) == $country->name ? 'selected' : '' }}>
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('job_country')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="job_location" class="form-label">Location *</label>
                                            <input type="text" class="form-control" id="job_location"
                                                name="job_location" value="{{ old('job_location', $job->job_location) }}"
                                                required placeholder="eg: New Baneshwor, Kathmandu">
                                            @error('job_location')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="offered_salary" class="form-label">Offered Salary
                                                (Optional)</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="offered_salary"
                                                    name="offered_salary"
                                                    value="{{ old('offered_salary', $job->offered_salary) }}"
                                                    placeholder="eg: NRs. 60,000 - 200,000 Monthly">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="checkbox"
                                                        id="is_negotiable" name="is_negotiable" value="1"
                                                        {{ old('is_negotiable', $job->is_negotiable) ? 'checked' : '' }}>
                                                    <label class="form-check-label ms-2"
                                                        for="is_negotiable">Negotiable</label>
                                                </div>
                                            </div>
                                            @error('offered_salary')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="expiry_date" class="form-label">Expiry Date (Optional)</label>
                                            <input type="date" class="form-control" id="expiry_date"
                                                name="expiry_date"
                                                value="{{ old('expiry_date', $job->expiry_date ? $job->expiry_date->format('Y-m-d') : '') }}">
                                            @error('expiry_date')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="degree_id" class="form-label">Required Degree (Optional)</label>
                                            <select class="form-select" id="degree_id" name="degree_id">
                                                <option value="">Select Degree</option>
                                                @foreach ($degrees as $degree)
                                                    <option value="{{ $degree->id }}"
                                                        {{ old('degree_id', $job->degree_id) == $degree->id ? 'selected' : '' }}>
                                                        {{ $degree->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('degree_id')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="experience_required" class="form-label">Experience Required
                                                *</label>
                                            <input type="text" class="form-control" id="experience_required"
                                                name="experience_required"
                                                value="{{ old('experience_required', $job->experience_required) }}"
                                                required placeholder="More than or equal to -- years">
                                            @error('experience_required')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="job_description" class="form-label">Job Description *</label>
                                            <textarea class="form-control" id="job_description" name="job_description" rows="5" required>{{ old('job_description', $job->job_description) }}</textarea>
                                            @error('job_description')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="other_specification" class="form-label">Other Specifications
                                                (Optional)</label>
                                            <textarea class="form-control" id="other_specification" name="other_specification" rows="3">{{ old('other_specification', $job->other_specification) }}</textarea>
                                            @error('other_specification')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="status" class="form-label">Status *</label>
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="active"
                                                    {{ old('status', $job->status) == 'active' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="inactive"
                                                    {{ old('status', $job->status) == 'inactive' ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                            @error('status')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-5 d-flex justify-content-end gap-2">
                                        <a href="{{ route('job.index') }}"
                                            class="btn btn-outline-secondary px-4">Cancel</a>
                                        <button type="submit" class="btn btn-primary px-4">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editors = ['#job_description', '#other_specification'];
            editors.forEach(selector => {
                ClassicEditor
                    .create(document.querySelector(selector), {
                        removePlugins: ['Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar',
                            'ImageUpload', 'Indent', 'MediaEmbed'
                        ]
                    })
                    .catch(error => console.error(`Error initializing CKEditor for ${selector}:`, error));
            });
        });

        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select skills",
                allowClear: true,
                closeOnSelect: false,
                width: '100%'
            });
        });
    </script>
@endpush
