@extends('backend.employer_dashboard.layouts.master')

@section('content')
    <div class="">
        <h1 class="fw-bold fs-3">Hello, Mr. Employee</h1>
        <p>Here is your daily activities and applications</p>
    </div>
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="stat-card-1">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="text-black fw-bold fs-3">589</h5>
                        <p class="text-muted">Employer</p>
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
                        <p class="text-muted">Jobseeker</p>
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
    <div class="container mt-5 bg-white p-5 rounded-4 shadow">
        <div class="chart-container">
            <h2 class="fw-bold fs-4">Conversions</h2>
            <div class="d-flex justify-content-end mb-3">
                <select class="form-select w-auto">
                    <option selected>This Week</option>
                    <option>Last Week</option>
                    <option>This Month</option>
                </select>
            </div>
            <div class="">
                <canvas id="conversionsChart" style="height: 400px;"></canvas>
            </div>
        </div>
    </div>

    <div class="container mt-5 bg-white p-5 rounded-4 shadow">
        <div class="chart-container-1">
            <div class="d-flex justify-content-between">
                <h2 class="fw-bold fs-4">Data</h2>
                <div class="d-flex justify-content-end mb-3">
                    <select class="form-select w-auto">
                        <option selected>This Week</option>
                        <option>Last Week</option>
                        <option>This Month</option>
                    </select>
                </div>
            </div>
            <div class=""><canvas id="donutChart" height="300"></canvas></div>
            <div class="legend-container">
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #1e3a8a;"></div>
                    <span>Jobseeker: 251K</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #93c5fd;"></div>
                    <span>Employer: 176K</span>
                </div>
            </div>
        </div>
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


    <script>
        const ctx = document.getElementById('conversionsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['S', 'M', 'T', 'W', 'T', 'F', 'S', 'M', 'T', 'W'], // Days of the week
                datasets: [{
                        label: 'Category 1',
                        data: [40, 80, 40, 80, 40, 120, 40, 40, 80, 40], // First dataset (darker blue)
                        backgroundColor: '#1e3a8a', // Darker blue
                        borderWidth: 0,
                        barThickness: 20,
                    },
                    {
                        label: 'Category 2',
                        data: [20, 40, 40, 40, 40, 40, 40, 20, 40, 40], // Second dataset (lighter blue)
                        backgroundColor: '#93c5fd', // Lighter blue
                        borderWidth: 0,
                        barThickness: 20,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Hide legend since the chart in the image doesn't show it
                    }
                },
                scales: {
                    x: {
                        stacked: true, // Stack the bars
                        grid: {
                            display: false // Hide x-axis grid lines
                        }
                    },
                    y: {
                        stacked: true, // Stack the bars
                        beginAtZero: true,
                        max: 160, // Set max value to match the chart
                        ticks: {
                            stepSize: 40 // Match the y-axis intervals
                        },
                        grid: {
                            color: '#e5e7eb' // Light gray grid lines
                        }
                    }
                }
            }
        });
    </script>

    <script>
        // Ensure the DOM is fully loaded before running the script
        document.addEventListener('DOMContentLoaded', function() {
            // Debug: Check if Chart.js is loaded
            if (typeof Chart === 'undefined') {
                console.error('Chart.js is not loaded!');
                return;
            }

            // Debug: Check if canvas element exists
            const canvas = document.getElementById('donutChart');
            if (!canvas) {
                console.error('Canvas element with ID "donutChart" not found!');
                return;
            }

            const ctx = canvas.getContext('2d');
            if (!ctx) {
                console.error('Failed to get 2D context for canvas!');
                return;
            }

            // Create the chart
            try {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Jobseeker', 'Employer'],
                        datasets: [{
                            data: [251000, 176000], // Values in the chart (251K and 176K)
                            backgroundColor: ['#1e3a8a', '#93c5fd'], // Colors matching the chart
                            borderWidth: 2,
                            borderColor: '#ffffff', // White border between segments
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false // Hide default legend since we have a custom one
                            },
                            tooltip: {
                                enabled: false // Disable tooltips since the chart doesn't seem to use them
                            }
                        },
                        cutout: '70%', // Creates the donut hole (adjust this percentage for the hole size)
                    }
                });
                console.log('Chart successfully created!');
            } catch (error) {
                console.error('Error creating chart:', error);
            }
        });
    </script>
@endpush
