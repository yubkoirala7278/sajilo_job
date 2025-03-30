@extends('backend.employer_dashboard.layouts.master')

@section('content')
<div class="">
    <h1 class="fw-bold fs-3">Hello, ABC Company</h1>
    <p>Here is your daily activities and applications</p>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="stat-card-1">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="text-black fw-bold fs-3">589</h5>
                    <p class="text-muted">Open Jobs</p>
                </div>
                <i class="fas fa-briefcase fa-2x text-white"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="stat-card-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="text-black fw-bold fs-3">2,517</h5>
                    <p class="text-muted">Saved Candidates</p>
                </div>
                <i class="fas fa-users fa-2x text-white"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="row g-4 mb-4">
    <div class="col-md-8">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>2500 <span class="text-success fw-bold">+4.45%</span></h5>
                <select class="form-select w-auto shadow-sm">
                    <option>This month</option>
                    <option>Last month</option>
                    <option>Last quarter</option>
                </select>
            </div>
            <canvas id="lineChart"></canvas>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4">
            <h5 class="mb-3">Applicants</h5>
            <canvas id="pieChart"></canvas>
            <div class="d-flex justify-content-around mt-4">
                <div class="text-center">
                    <span class="badge bg-primary p-2">Hiring Process</span>
                    <p class="fw-bold mt-2">63%</p>
                </div>
                <div class="text-center">
                    <span class="badge bg-info p-2">Select Employer</span>
                    <p class="fw-bold mt-2">25%</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Applicants Table -->
<div class="card p-4">
    <h5 class="mb-4 fs-4 fw-bold">New Applicants</h5>
    <table class="table table-hover">
        <thead>
            <tr class="text-muted">
                <th>Name</th>
                <th>Status</th>
                <th>Job Details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ram Sharma</td>
                <td><span class="badge bg-success p-2">Active</span></td>
                <td>UI/UX Designer <br><small class="text-muted">Full Time - 27 days</small></td>
                <td>
                    <button class="btn btn-primary btn-sm"><i class="fas fa-eye me-2"></i>View</button>
                </td>
            </tr>
            <tr>
                <td>Ram Sharma</td>
                <td><span class="badge bg-warning p-2 text-dark">Pending</span></td>
                <td>UI/UX Designer <br><small class="text-muted">Full Time - 27 days</small></td>
                <td>
                    <button class="btn btn-primary btn-sm"><i class="fas fa-eye me-2"></i>View</button>
                </td>
            </tr>
            <tr>
                <td>Ram Sharma</td>
                <td><span class="badge bg-success p-2">Active</span></td>
                <td>UI/UX Designer <br><small class="text-muted">Full Time - 27 days</small></td>
                <td>
                    <button class="btn btn-primary btn-sm"><i class="fas fa-eye me-2"></i>View</button>
                </td>
            </tr>
            <tr>
                <td>Ram Sharma</td>
                <td><span class="badge bg-warning p-2 text-dark">Pending</span></td>
                <td>UI/UX Designer <br><small class="text-muted">Full Time - 27 days</small></td>
                <td>
                    <button class="btn btn-primary btn-sm"><i class="fas fa-eye me-2"></i>View</button>
                </td>
            </tr>

        </tbody>
    </table>
</div>

<div class="container mt-5">
    <h2 class="mb-4 fs-4 fw-bold">Recent Post Jobs</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Job</th>
                <th scope="col">Status</th>
                <th scope="col">Application</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td class="text-secondary">UI/UX Designer</td>
                <td class="text-success"><i class="fa-solid fa-check border border-2  border-success rounded-pill" style="padding: 2px; font-size:10px;"></i> Active</td>
                <td class="text-secondary"><i class="fa-solid fa-users"></i> 798 Application</td>
                <td class="d-flex gap-4">
                    <button class="btn btn-primary rounded-0">Edit Resume</button>
                    <button class="btn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                </td>
            </tr>


            <tr>
                <th scope="row">1</th>
                <td class="text-secondary">UI/UX Designer</td>
                <td class="text-success"><i class="fa-solid fa-check border border-2  border-success rounded-pill" style="padding: 2px; font-size:10px;"></i> Active</td>
                <td class="text-secondary"><i class="fa-solid fa-users"></i> 798 Application</td>
                <td class="d-flex gap-4">
                    <button class="btn btn-primary rounded-0">Edit Resume</button>
                    <button class="btn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                </td>
            </tr>



            <tr>
                <th scope="row">1</th>
                <td class="text-secondary">UI/UX Designer</td>
                <td class="text-success"><i class="fa-solid fa-check border border-2  border-success rounded-pill" style="padding: 2px; font-size:10px;"></i> Active</td>
                <td class="text-secondary"><i class="fa-solid fa-users"></i> 798 Application</td>
                <td class="d-flex gap-4">
                    <button class="btn btn-primary rounded-0">Edit Resume</button>
                    <button class="btn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                </td>
            </tr>



            <tr>
                <th scope="row">1</th>
                <td class="text-secondary">UI/UX Designer</td>
                <td class="text-success"><i class="fa-solid fa-check border border-2  border-success rounded-pill" style="padding: 2px; font-size:10px;"></i> Active</td>
                <td class="text-secondary"><i class="fa-solid fa-users"></i> 798 Application</td>
                <td class="d-flex gap-4">
                    <button class="btn btn-primary rounded-0">Edit Resume</button>
                    <button class="btn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                </td>
            </tr>

        </tbody>
    </table>
</div>
@endsection

@push('script')
    <script>
        // Line Chart
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: ['SEP', 'OCT', 'NOV', 'DEC', 'JAN', 'FEB'],
                datasets: [{
                    label: 'Applications',
                    data: [600, 800, 700, 900, 1000, 800],
                    borderColor: '#4e73df',
                    tension: 0.4,
                    fill: true,
                    backgroundColor: 'rgba(78, 115, 223, 0.1)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Pie Chart
        new Chart(document.getElementById('pieChart'), {
            type: 'doughnut',
            data: {
                labels: ['Hiring Process', 'Select Employer'],
                datasets: [{
                    data: [63, 25],
                    backgroundColor: ['#4e73df', '#1cc88a'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
@endpush