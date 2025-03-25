@extends('admin.layout.master')

@section('header-content')
    <style>
        tr {
            white-space: nowrap;
        }
    </style>
@endsection
@section('content')
    <main id="main" class="main">
        <section class="section profile">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <ul class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}">
                                    <i class="fa-solid fa-house" style="color: #2C3E50"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('job.seeker.management') }}" style="color: #2C3E50">New Job Seeker
                                    Registration</a>
                            </li>
                        </ul>
                    </div>
                    <div class="table-responsive">
                        <table id="employees-table" class="table table-hover w-100">
                            <thead>
                                <tr>
                                    <th>S.N:</th>
                                    <th>Employee Name</th>
                                    <th>Email</th>
                                    <th>Job Level</th>
                                    <th>Expected Salary</th>
                                    <th>Current Salary</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Marital Status</th>
                                    <th>Religion</th>
                                    <th>Is Disabled</th>
                                    <th>country</th>
                                    <th>Current Address</th>
                                    <th>Permanent Address</th>
                                    <th>Contact Number</th>
                                    <th>Degree</th>
                                    <th>Course</th>
                                    <th>Board/University</th>
                                    <th>School/College</th>
                                    <th>Is Studying</th>
                                    <th>Grade Type</th>
                                    <th>Mark Secured</th>
                                    <th>Graduation Year</th>
                                    <th>Graduation Month</th>
                                    <th>Started Year</th>
                                    <th>Started Month</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            var table = $('#employees-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('job.seeker.data') }}",
                    data: function(d) {
                        d.status = 'all'; 
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'job_level',
                        name: 'job_level'
                    },
                    {
                        data: 'expected_salary',
                        name: 'expected_salary'
                    },
                    {
                        data: 'current_salary',
                        name: 'current_salary'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'dob',
                        name: 'dob'
                    },
                    {
                        data: 'marital_status',
                        name: 'marital_status'
                    },
                    {
                        data: 'religion',
                        name: 'religion'
                    },
                    {
                        data: 'is_disabled',
                        name: 'is_disabled'
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    {
                        data: 'current_address',
                        name: 'current_address'
                    },
                    {
                        data: 'permanent_address',
                        name: 'permanent_address'
                    },
                    {
                        data: 'contact_number',
                        name: 'contact_number'
                    },
                    {
                        data: 'degree',
                        name: 'degree'
                    },
                    {
                        data: 'course',
                        name: 'course'
                    },
                    {
                        data: 'board_or_university',
                        name: 'board_or_university'
                    },
                    {
                        data: 'school_or_college_or_institute',
                        name: 'school_or_college_or_institute'
                    },
                    {
                        data: 'is_currently_studying',
                        name: 'is_currently_studying'
                    },
                    {
                        data: 'grade_type',
                        name: 'grade_type'
                    },
                    {
                        data: 'mark_secured',
                        name: 'mark_secured'
                    },
                    {
                        data: 'graduation_year',
                        name: 'graduation_year'
                    },
                    {
                        data: 'graduation_month',
                        name: 'graduation_month'
                    },
                    {
                        data: 'education_started_year',
                        name: 'education_started_year'
                    },
                    {
                        data: 'education_started_month',
                        name: 'education_started_month'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Delete Employee
            $(document).on('click', '.delete-btn', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('admin/job-seeker/management/delete') }}/" + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Employee has been deleted.',
                                    'success'
                                );
                                table.ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            // Change Status
            $(document).on('click', '.change-status', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to change the status?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('admin/job-seeker/management/status') }}/" + id,
                            type: 'PUT',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Success!',
                                    'Status has been changed.',
                                    'success'
                                );
                                table.ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
