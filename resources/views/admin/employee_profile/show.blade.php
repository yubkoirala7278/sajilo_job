@extends('admin.layout.master')
@section('content')
    <main id="main" class="main">

        <section class="section profile">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="font-size: 14px !important">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong class="text-dark">Job Preference</strong>
                            <a href="" class="btn btn-success btn-sm text-light">
                                <i class="fas fa-edit me-1"></i> Edit Career & Objective
                            </a>
                        </div>
                        <form method="POST" enctype="multipart/form-data" class="mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <strong>Career Objective Summary</strong>
                                        <div class="career-objective my-3">
                                            <a href="" class="text-info">
                                                <i class="fas fa-plus-circle me-2"></i> Add Career Objective Summary now
                                            </a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-2 table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td width="25%">Job Categories</td>
                                                        <td>:</td>
                                                        <td>
                                                            <span class="badge bg-light border rounded p-1 text-dark">Commercial / Logistics / Supply Chain</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Preferred Industries</td>
                                                        <td>:</td>
                                                        <td>
                                                            <a href="" class="text-info">
                                                                Add your <strong>Preferred Industry</strong>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Preferred Job Title</td>
                                                        <td>:</td>
                                                        <td >
                                                            <span class="badge bg-light border rounded p-1 text-dark">Audit Officer</span>
                                                            <span class="badge bg-light border rounded p-1 text-dark">Dance Instructor</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Looking for</td>
                                                        <td>:</td>
                                                        <td>Senior Level</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Available for</td>
                                                        <td>:</td>
                                                        <td>Full Time</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Specialization</td>
                                                        <td>:</td>
                                                        <td>
                                                            <a href="?field=job_preference" class="text-info">
                                                                <i class="fas fa-plus-circle me-2"></i> Add Specialization
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Skills</td>
                                                        <td>:</td>
                                                        <td>
                                                            <span class="badge bg-light border rounded p-1 text-dark">Nepali Typing</span>
                                                            <span class="badge bg-light border rounded p-1 text-dark">Counseling</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Expected Salary</td>
                                                        <td>:</td>
                                                        <td>
                                                            NRs. (Above) 55,555.00
                                                            <span class="badge bg-light border rounded p-1 text-dark">Monthly</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Current Salary</td>
                                                        <td>:</td>
                                                        <td>
                                                            <a href="" class="text-info">
                                                                <i class="fas fa-plus-circle me-2"></i> Add Current Salary
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Job Preference Location</td>
                                                        <td>:</td>
                                                        <td>
                                                            <span class="badge bg-light border rounded p-1 text-dark">Kathmandu</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center"></div>
                        </form>
                    </div>
                </div>
                
            </div>
        </section>

    </main><!-- End #main -->
@endsection
