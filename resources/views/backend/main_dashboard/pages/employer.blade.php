@extends('backend.main_dashboard.layouts.master')

@section('header-content')
    <style>
        tr {
            white-space: nowrap;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-12  card p-4">
        <h1 class="fw-bold fs-3 mb-4">Employer Management</h1>
        <div class="table-responsive">
            <table id="employers-table" class="table employer-datatable table-hover pt-3 w-100">
                <thead>
                    <tr>
                        <th>S.N:</th>
                        <th>Employer Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Company Logo</th>
                        <th>Address</th>
                        <th>Black Listed</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="vertical-align: middle"></tbody>
            </table>
        </div>
        <!-- Bootstrap 5 Modal -->
        <div class="modal fade" id="logoModal" tabindex="-1" aria-labelledby="logoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoModalLabel">Company Logo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalLogoImage" src="" alt="Company Logo" class="img-fluid"
                            style="max-height: 400px;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            var table = $('#employers-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.employer.data') }}",
                    data: function (d) {
                        d.status = 'all'; // Pass selected status to backend
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'employer_name',
                        name: 'employer_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'contact_number',
                        name: 'contact_number'
                    },
                    {
                        data: 'company_logo',
                        name: 'company_logo',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'is_black_listed',
                        name: 'is_black_listed'
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

            // Delete button functionality
            $('#employers-table').on('click', '.delete-btn', function() {
                var employerId = $(this).data('id');
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
                            url: '{{ route('admin.employer.delete') }}',
                            type: 'POST',
                            data: {
                                id: employerId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Deleted!',
                                        'The employer has been deleted.', 'success');
                                    table.ajax.reload();
                                } else {
                                    Swal.fire('Error!', response.error ||
                                        'Something went wrong.', 'error');
                                }
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', 'Failed to delete employer.',
                                    'error');
                            }
                        });
                    }
                });
            });

            // Toggle status button functionality
            $('#employers-table').on('click', '.change-status', function() {
                var employerId = $(this).data('id');
                Swal.fire({
                    title: 'Toggle Status',
                    text: 'Are you sure you want to change the status of this employer?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, toggle it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.employer.toggle', ':id') }}'.replace(
                                ':id', employerId),
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Success!', response.success, 'success');
                                    table.ajax.reload();
                                } else {
                                    Swal.fire('Error!', response.error ||
                                        'Something went wrong.', 'error');
                                }
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', 'Failed to toggle status.',
                                'error');
                            }
                        });
                    }
                });
            });

            // Show logo in modal on click
            $('#employers-table').on('click', '.logo-img', function() {
                var logoSrc = $(this).attr('src'); // Get the image source
                $('#modalLogoImage').attr('src', logoSrc); // Set it in the modal
                $('#logoModal').modal('show'); // Show the modal
            });
        });
    </script>
@endpush




