@extends('public.layouts.master')

@section('content')
    <main>
        <!-- Hero Section -->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="{{ asset('public/assets/img/hero/about.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Front-End Developer (React.js)</h2>
                                <p class="text-white">Join our innovative team in Jhamsikel, Lalitpur</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Details Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-lg-8 mb-4">
                        <!-- Job Card -->
                        <div class="card shadow-sm mb-4 border-0">
                            <div class="card-body p-4 d-flex align-items-center flex-column flex-md-row">
                                <img src="{{ asset('public/assets/img/icon/job-list1.png') }}" alt="Company Logo"
                                    class="img-fluid mb-3 mb-md-0 mr-md-4" style="max-width: 80px;">
                                <div>
                                    <h3 class="card-title mb-2 text-dark">Front-End Developer (React.js)</h3>
                                    <ul class="list-unstyled d-flex flex-wrap text-muted mb-0" style="gap: 15px;">
                                        <li>Freelancer Unit Pvt. Ltd</li>
                                        <li><i class="fas fa-map-marker-alt mr-1"></i>Jhamsikel, Lalitpur</li>
                                        <li>5+ Years Experience</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Job Description -->
                        <div class="card shadow-sm mb-4 border-0">
                            <div class="card-body p-4">
                                <h4 class="card-title mb-3 text-dark">Job Description</h4>
                                <p class="text-muted">We are seeking a passionate Front-End Developer (React.js) to craft
                                    high-performance, user-friendly web applications. Collaborate with designers and
                                    developers to deliver seamless experiences.</p>
                            </div>
                        </div>

                        <!-- Key Responsibilities -->
                        <div class="card shadow-sm mb-4 border-0">
                            <div class="card-body p-4">
                                <h4 class="card-title mb-3 text-dark">Key Responsibilities</h4>
                                <ul class="list-unstyled text-muted">
                                    <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i>Develop scalable
                                        React.js components</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i>Optimize for
                                        performance and accessibility</li>
                                    <li><i class="fas fa-check-circle text-primary mr-2"></i>Integrate RESTful APIs and
                                        GraphQL</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Required Skills -->
                        <div class="card shadow-sm mb-4 border-0">
                            <div class="card-body p-4">
                                <h4 class="card-title mb-3 text-dark">Required Skills & Qualifications</h4>
                                <ul class="list-unstyled text-muted">
                                    <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i>5+ years with
                                        React.js</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i>Expertise in
                                        JavaScript, TypeScript, CSS3</li>
                                    <li><i class="fas fa-check-circle text-primary mr-2"></i>Experience with Redux or
                                        Context API</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Benefits -->
                        <div class="card shadow-sm mb-4 border-0">
                            <div class="card-body p-4">
                                <h4 class="card-title mb-3 text-dark">Comprehensive Benefits</h4>
                                <ul class="list-unstyled text-muted">
                                    <li class="mb-2"><i class="fas fa-gift text-success mr-2"></i>Five-day workweek</li>
                                    <li class="mb-2"><i class="fas fa-gift text-success mr-2"></i>15 days of leave</li>
                                    <li><i class="fas fa-gift text-success mr-2"></i>Flexible hours & insurance</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Similar Jobs -->
                        <div class="mb-5">
                            <h4 class="mb-4 text-dark font-weight-bold border-bottom pb-2"
                                style="border-bottom: 3px solid #007bff; display: inline-block;">
                                Similar Jobs
                            </h4>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <a href="#" class="text-decoration-none">
                                        <div class="card border-0 shadow-lg h-100"
                                            style="border-radius: 12px; transition: transform 0.3s ease-in-out;">
                                            <div class="card-body d-flex align-items-center p-3">
                                                <img src="{{ asset('public/assets/img/banner/dog.png') }}"
                                                    alt="Tech Solutions Logo" class="img-fluid rounded-circle mr-3"
                                                    style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #007bff;">
                                                <div>
                                                    <h5 class="card-title mb-1 text-dark font-weight-bold">Back-End
                                                        Developer (Node.js)</h5>
                                                    <p class="text-muted mb-0" style="font-size: 0.9rem;">
                                                        <i class="fas fa-building mr-1 text-primary"></i> Tech Solutions •
                                                        <i class="fas fa-map-marker-alt mr-1 text-danger"></i> Kathmandu •
                                                        4+ Years
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <a href="#" class="text-decoration-none">
                                        <div class="card border-0 shadow-lg h-100"
                                            style="border-radius: 12px; transition: transform 0.3s ease-in-out;">
                                            <div class="card-body d-flex align-items-center p-3">
                                                <img src="{{ asset('public/assets/img/banner/dog.png') }}"
                                                    alt="Creative Hub Logo" class="img-fluid rounded-circle mr-3"
                                                    style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #007bff;">
                                                <div>
                                                    <h5 class="card-title mb-1 text-dark font-weight-bold">UI/UX Designer
                                                    </h5>
                                                    <p class="text-muted mb-0" style="font-size: 0.9rem;">
                                                        <i class="fas fa-building mr-1 text-primary"></i> Creative Hub •
                                                        <i class="fas fa-map-marker-alt mr-1 text-danger"></i> Lalitpur • 3+
                                                        Years
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-4">
                        <!-- Job Overview -->
                        <div class="card shadow-sm mb-4 border-0">
                            <div class="card-body p-4">
                                <h4 class="card-title mb-3 text-dark">Job Overview</h4>
                                <ul class="list-unstyled text-muted">
                                    <li><strong>Posted:</strong> {{ now()->subDays(10)->format('d M Y') }}</li>
                                    <li><strong>Location:</strong> Jhamsikel, Lalitpur</li>
                                    <li><strong>Vacancy:</strong> 1</li>
                                    <li><strong>Type:</strong> Full Time</li>
                                    <li><strong>Views:</strong> 73</li>
                                    <li><strong>Deadline:</strong> Mar. 09, 2025 23:55</li>
                                </ul>
                                <div class="d-flex flex-column flex-sm-row mt-4" style="gap: 10px;">
                                    <button class="btn btn-primary"
                                        style="background: linear-gradient(90deg, #007bff, #00d4ff); border: none;"
                                        
                                     data-toggle="modal" 
                                     data-target="#loginModal">
                                        Apply Now
                                    </button>
                                    {{-- <a href="#" class="btn btn-outline-primary">Save Job</a> --}}
                                </div>
                            </div>
                        </div>

                        <!-- Company Info -->
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <h4 class="card-title mb-3 text-dark">Company Information</h4>
                                <h5 class="text-dark">Freelancer Unit Pvt. Ltd</h5>
                                <p class="text-muted">A leading firm dedicated to innovative IT solutions and employee
                                    growth.</p>
                                <ul class="list-unstyled text-muted">
                                    <li><strong>Web:</strong> investorfriendlycpa.com</li>
                                    <li><strong>Email:</strong> careers@investorfriendlycpa.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <style>
        .card {
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        @media (max-width: 767px) {
            .card-body {
                padding: 1rem;
            }

            .display-4 {
                font-size: 2.5rem;
            }
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
        }
        
    </style>
@endsection

@section('modal')
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"
                style="border: none; border-radius: 10px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); background: #fff;">
                <!-- Modal Header -->
                <div class="modal-header"
                    style="border-bottom: none; padding: 1.5rem 2rem; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                    <h5 class="modal-title" id="loginModalLabel"
                        style="font-size: 1.5rem; font-weight: 600; color: #2c3e50;">
                        Please login to continue!
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 1.75rem; color: #7f8c8d;">&times;</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body" style="padding: 2rem;">
                    <form method="POST" action="">
                        @csrf

                        <!-- Email Field -->
                        <div class="form-group">
                            <label for="email" style="font-size: 0.9rem; color: #34495e; font-weight: 500;">Email
                                Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="johndoe@gmail.com"
                                style="border: 1px solid #dcdcdc; border-radius: 6px; padding: 0.75rem; font-size: 0.9rem; transition: border-color 0.3s ease;">
                            @error('email')
                                <span class="invalid-feedback" role="alert" style="font-size: 0.8rem;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="form-group">
                            <label for="password"
                                style="font-size: 0.9rem; color: #34495e; font-weight: 500;">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required placeholder="**********"
                                style="border: 1px solid #dcdcdc; border-radius: 6px; padding: 0.75rem; font-size: 0.9rem; transition: border-color 0.3s ease;">
                            @error('password')
                                <span class="invalid-feedback" role="alert" style="font-size: 0.8rem;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember"
                                    {{ old('remember') ? 'checked' : '' }} style="margin-top: 0.3rem;">
                                <label class="form-check-label" for="remember"
                                    style="font-size: 0.85rem; color: #7f8c8d;">
                                    Remember Me
                                </label>
                            </div>
                            <a href=""
                                style="font-size: 0.85rem; color: #3498db; text-decoration: none; font-weight: 500; transition: color 0.3s ease;">
                                Forgot Password?
                            </a>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-primary btn-block mt-2"
                            style="background: #3498db; border: none; border-radius: 6px; padding: 0.75rem; font-size: 0.9rem; font-weight: 500; transition: background 0.3s ease;">
                            <i class="fas fa-sign-in-alt" style="margin-right: 0.5rem;"></i> Log In
                        </button>

                        <!-- Register Link -->
                        <div class="text-center mt-1">
                            <span style="font-size: 0.85rem; color: #7f8c8d;">Don’t have an account? </span>
                            <a href="{{route('employee.register')}}"
                                style="font-size: 0.85rem; color: #3498db; text-decoration: none; font-weight: 500; transition: color 0.3s ease;">
                                Register Now
                            </a>
                        </div>

                        <!-- Divider -->
                        <div class="d-flex align-items-center">
                            <hr style="flex: 1; border-top: 1px solid #dcdcdc;">
                            <span style="font-size: 0.85rem; color: #7f8c8d; padding: 0 1rem;">Or</span>
                            <hr style="flex: 1; border-top: 1px solid #dcdcdc;">
                        </div>

                        <!-- Google Login Button -->
                        <div class="text-center">
                            <a href="" class="btn btn-outline-secondary sign-in"
                                style="border: 1px solid #dcdcdc; border-radius: 6px; padding: 0.75rem; font-size: 0.9rem; color: #34495e; transition: all 0.3s ease;background-color:transparent">
                                <i class="fab fa-google" style="margin-right: 0.5rem; color: #e74c3c;"></i> Log in with
                                Google
                            </a>
                        </div>

                        <!-- Logo/Brand -->
                        {{-- <div class="text-center">
                            <img src="{{ asset('public/assets/img/logo.png') }}" alt="Merojob"
                                style="max-width: 120px; transition: transform 0.3s ease;" class="img-fluid">
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional CSS for hover effects -->
    <style>
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-outline-secondary:hover {
            background: #f8f9fa;
            border-color: #3498db;
        }

        a:hover {
            color: #2980b9;
            text-decoration: none;
        }

        .img-fluid:hover {
            transform: scale(1.05);
        }
    </style>
@endsection
