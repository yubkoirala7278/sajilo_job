@extends('backend.employer_dashboard.layouts.master')

@section('header-content')
    <!-- select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2 {
            width: 100% !important;
        }
    </style>
@endsection

@section('content')
    <div class="">
        <h1 class="fw-bold fs-3">Hello, Mr. Employee</h1>
        <p>Update your profile</p>
    </div>
    <!-- Stats Cards -->
    <div class="row g-4 ">
        <div class="col-12 card p-3 shadow-lg bg-white">
            <form action="{{ route('admin.employer.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Company Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter company name" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Company Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Company Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter company email" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Company Contact Number --}}
                <div class="mb-3">
                    <label for="contact_number" class="form-label">Company Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter company contact number" value="{{ old('contact_number', $employer->contact_number) }}">
                    @error('contact_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Company Website --}}
                <div class="mb-3">
                    <label for="company_website" class="form-label">Company Website Link</label>
                    <input type="text" class="form-control" id="company_website" name="company_website" placeholder="Enter company website link" value="{{ old('company_website', $employer->company_website) }}">
                    @error('company_website')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Company Address --}}
                <div class="mb-3">
                    <label for="company_address" class="form-label">Company Address</label>
                    <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Enter company address" value="{{ old('company_address', $employer->company_address) }}">
                    @error('company_address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Company Logo --}}
                <div class="mb-3">
                    <label for="company_logo" class="form-label">Company Logo</label>
                    <input class="form-control" type="file" id="company_logo" name="company_logo">
                    {{-- @if ($employer->company_logo)
                        <img src="{{ asset('storage/' . $employer->company_logo) }}" alt="Current Logo" class="mt-2" style="max-width: 100px;">
                    @endif --}}
                    @error('company_logo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Company Description --}}
                <div class="mb-3">
                    <label for="company_description" class="form-label">Company Description</label>
                    <textarea class="form-control" id="company_description" name="company_description" placeholder="Enter company description">{{ old('company_description', $employer->company_description) }}</textarea>
                    @error('company_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Job Categories (Multiple Select) --}}
                <div class="mb-3">
                    <label for="categories" class="form-label">Job Categories</label>
                    <select name="categories[]" class="form-select" multiple id="categories">
                        @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $employer->jobCategories->pluck('id')->contains($category->id) ? 'selected' : '' }}>
                                    {{ $category->category }}
                                </option>
                            @endforeach
                        @else
                            <option disabled>No active categories available</option>
                        @endif
                    </select>
                    @error('categories')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <!-- select -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Select Multiple
            function initSelect2WithSelectAll(selectId) {
                $(selectId).select2({
                    placeholder: 'Select job categories',
                    allowClear: true,
                    closeOnSelect: false,
                    width: '100%'
                });
            }

            // Select Multiple
            initSelect2WithSelectAll('#categories');

        });
    </script>
@endpush
