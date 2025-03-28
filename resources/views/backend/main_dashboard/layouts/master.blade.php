<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">


</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <button class="close-btn" id="closeSidebar"><i class="fas fa-times"></i></button>
        <div class="">
            <div class="px-4 pt-2 pb-4">
                <h3 class="text-black fw-bold mb-4"><i class="fas fa-rocket me-2"></i> Logo</h3>
            </div>
            <ul class="nav flex-column w-100">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-home me-2"></i> Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-users-gear me-2"></i> Employer Management
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">New Employer/Registrations</a></li>
                        <li><a class="dropdown-item" href="#">Approved Employers</a></li>
                        <li><a class="dropdown-item" href="#">Suspended Employers</a></li>
                        <li><a class="dropdown-item" href="#">Blacklisted Employers</a></li>
                    </ul>
                </li>
                <!-- Jobs Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-briefcase me-2"></i> Job Listing Management
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">New Job Listing</a></li>
                        <li><a class="dropdown-item" href="#">Approved Job Listing</a></li>
                        <li><a class="dropdown-item" href="#">Rejected Job Listing</a></li>
                        <li><a class="dropdown-item" href="#">All Job Listing</a></li>
                    </ul>
                </li>
                <!-- Applicants Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-users me-2"></i> JobSeeker Management
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">New Jobseeker Registration</a></li>
                        <li><a class="dropdown-item" href="#">Approved Jobseeker</a></li>
                        <li><a class="dropdown-item" href="#">Rejected Jobseeker</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-plus-circle me-2"></i> Post a Job</a>
                </li>
                <!-- Subscriptions Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-credit-card me-2"></i> Payment & Billing Management
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Track Employer Subscription</a></li>
                        <li><a class="dropdown-item" href="#">Generate Invoice & Payment Receipts</a></li>
                        <li><a class="dropdown-item" href="#">Payment Details</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-gear me-2"></i> System Settings & Security
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">User Role Management</a></li>
                        <li><a class="dropdown-item" href="#">Email's Notification</a></li>
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-gears me-2"></i> General Settings
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Business Category Listing</a></li>
                        <li><a class="dropdown-item" href="#">Job Positing Listing</a></li>
                        <li><a class="dropdown-item" href="#">Country Listing</a></li>
                        <li><a class="dropdown-item" href="#">Skills Listing</a></li>
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-globe me-2"></i> Website
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Home Page</a></li>
                        <li><a class="dropdown-item" href="#">Pages</a></li>
                        <li><a class="dropdown-item" href="#">Contact</a></li>
                        <li><a class="dropdown-item" href="#">Header</a></li>
                        <li><a class="dropdown-item" href="#">Footer</a></li>
                        <li><a class="dropdown-item" href="#">Other</a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content" id="content">
        <!-- Top Navbar -->
        <div class="navbar-top mb-0">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <button id="toggleSidebar" class="btn btn-primary d-block d-md-none"><i
                            class="fas fa-bars"></i></button>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <i class="fas fa-bell text-muted"></i>
                    <img src="{{ asset('backend/img/user-profile/1.jpeg') }}" class="rounded-circle"
                        style="width: 40px; height:40px;" alt="User Profile">
                </div>
            </div>
        </div>

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

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleSidebarBtn = document.getElementById('toggleSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');

        // Set initial state based on screen size
        if (window.innerWidth > 2100) {
            sidebar.classList.add('open');
            content.classList.add('expanded');
        }

        // Toggle sidebar function
        function toggleSidebar() {
            sidebar.classList.toggle('open');
            content.classList.toggle('expanded');
        }

        // Toggle button event listener (works on all views)
        toggleSidebarBtn.addEventListener('click', toggleSidebar);

        // Close button event listener (mobile only)
        closeSidebarBtn.addEventListener('click', function() {
            sidebar.classList.remove('open');
            content.classList.remove('expanded');
        });

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
</body>

</html>
