@extends('admin.layout.master')
@section('content')
<main id="main" class="main">

    <section class="section profile">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Add Employee Availability</h5>
                        </div>
                        <div class="card-body p-3">
                            <form action="{{ route('employee_availability.store') }}" method="POST">
                                @csrf
                                
                                <!-- Employee Availability -->
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Employee Availability</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Employee Availability Name" value="{{ old('name') }}">
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
                                                value="active" {{ old('status', 'active') === 'active' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="inactive"
                                                value="inactive" {{ old('status') === 'inactive' ? 'checked' : '' }}>
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
        </div>
    </section>

</main>
@endsection
