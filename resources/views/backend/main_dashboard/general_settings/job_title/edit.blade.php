@extends('backend.main_dashboard.layouts.master')
@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Update Job Title</h5>
            </div>
            <div class="card-body p-3">
                <form action="{{ route('job_title.update',$title->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Job Title Name-->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Job Title Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter Job Title Name" value="{{ old('name',$title->name) }}">
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="active"
                                value="active" {{ old('status', $title->status) === 'active' ? 'checked' : '' }}>
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="inactive"
                                value="inactive" {{ old('status', $title->status) === 'inactive' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inactive">Inactive</label>
                            </div>
                        </div>
                        @error('status')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
