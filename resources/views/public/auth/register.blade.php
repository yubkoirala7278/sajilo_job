@extends('public.layouts.master')

@section('custom-css')
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Add Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Add Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .form-group input:focus+label,
        .form-group input:not(:placeholder-shown)+label,
        .form-group select:focus+label,
        .form-group select:not(:placeholder-shown)+label {
            top: 0.5rem;
            font-size: 0.85rem;
            color: #007bff;
        }

        .form-group input:focus,
        .form-group select:focus {
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.2);
            outline: none;
        }
    </style>
@endsection

@section('content')
    <main>
        <!-- Registration Form Section -->
        <section class="py-5 bg-light">
            <div class="container-fluid p-0">
                <div class="row no-gutters align-items-stretch min-vh-100">
                    <!-- Left Column: Promotional Content with Background Image -->
                    <div class="col-lg-6 d-flex align-items-center justify-content-center text-white"
                        style="background: url('https://static.merojob.com/images/jobseeker/register.png') no-repeat center center; background-size: cover; min-height: 500px;">
                        <div class="text-center p-5" style="font-family: 'Poppins', sans-serif;">
                            <h2 class="display-4 font-weight-bold mb-4 animate__animated animate__fadeInDown text-light"
                                style="letter-spacing: 1px;">Unlock Your Career
                                Potential!</h2>
                            <p class="lead mb-4 text-light" style="font-style: italic;">Nepal's Premier Job Platform</p>
                            <hr class="w-25 mx-auto bg-white my-4 opacity-75">
                            <ul class="list-unstyled text-left mx-auto" style="max-width: 400px;">
                                <li class="mb-3 animate__animated animate__fadeInUp"
                                    style="transition: transform 0.3s ease;"
                                    onmouseover="this.style.transform='translateX(10px)'"
                                    onmouseout="this.style.transform='translateX(0)'">
                                    <i class="fas fa-check-circle mr-2 text-success"></i>
                                    <strong>#1 Job Portal in Nepal</strong> - Trusted by millions.
                                </li>
                                <li class="mb-3 animate__animated animate__fadeInUp"
                                    style="transition: transform 0.3s ease;"
                                    onmouseover="this.style.transform='translateX(10px)'"
                                    onmouseout="this.style.transform='translateX(0)'">
                                    <i class="fas fa-check-circle mr-2 text-success"></i>
                                    <strong>Unmatched Reach</strong> - 6.5M+ monthly visitors.
                                </li>
                                <li class="mb-3 animate__animated animate__fadeInUp"
                                    style="transition: transform 0.3s ease;"
                                    onmouseover="this.style.transform='translateX(10px)'"
                                    onmouseout="this.style.transform='translateX(0)'">
                                    <i class="fas fa-check-circle mr-2 text-success"></i>
                                    <strong>Completely Free</strong> - No hidden costs.
                                </li>
                                <li class="mb-3 animate__animated animate__fadeInUp"
                                    style="transition: transform 0.3s ease;"
                                    onmouseover="this.style.transform='translateX(10px)'"
                                    onmouseout="this.style.transform='translateX(0)'">
                                    <i class="fas fa-check-circle mr-2 text-success"></i>
                                    <strong>100% Confidential</strong> - Secure job search.
                                </li>
                                <li class="mb-3 animate__animated animate__fadeInUp"
                                    style="transition: transform 0.3s ease;"
                                    onmouseover="this.style.transform='translateX(10px)'"
                                    onmouseout="this.style.transform='translateX(0)'">
                                    <i class="fas fa-check-circle mr-2 text-success"></i>
                                    <strong>Career Growth</strong> - 200,000+ careers launched.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right Column: Registration Form -->
                    <div class="col-lg-6 d-flex align-items-center bg-white justify-content-center py-5 px-3 px-lg-0">
                        <div>
                            <h3 class="mb-5 font-weight-bold text-dark"
                                style="font-family: 'Poppins', sans-serif; letter-spacing: 1px;">Create Your
                                Jobseeker Account</h3>

                            <form method="POST" action="{{ route('employee.store') }}">
                                @csrf
                                @method('POST')
                                <!-- Full Name -->
                                <div class="form-group  mb-4">
                                    <div class="position-relative">
                                        <input type="text" class="form-control form-control-lg border-0 shadow-sm"
                                            id="fullName" placeholder="Full Name"
                                            style="border-radius: 10px; padding: 1.5rem 1rem; transition: all 0.3s ease;"
                                            name="name">
                                        <i class="fas fa-user position-absolute"
                                            style="top: 50%; right: 1rem; transform: translateY(-50%); color: #007bff;"></i>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <!-- Mobile Number -->
                                <div class="form-group  mb-4">
                                    <div class="position-relative">
                                        <input type="tel" class="form-control form-control-lg border-0 shadow-sm"
                                            id="mobile" placeholder="Mobile Number"
                                            style="border-radius: 10px; padding: 1.5rem 1rem; transition: all 0.3s ease;"
                                            name="mobile_no">
                                        <i class="fas fa-phone position-absolute"
                                            style="top: 50%; right: 1rem; transform: translateY(-50%); color: #007bff;"></i>
                                    </div>
                                    @if ($errors->has('mobile_no'))
                                        <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                    @endif
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-4">
                                    <div class="position-relative ">
                                        <input type="email" class="form-control form-control-lg border-0 shadow-sm"
                                            id="email" placeholder="Email Address" 
                                            style="border-radius: 10px; padding: 1.5rem 1rem; transition: all 0.3s ease;"
                                            name="email">
                                        <i class="fas fa-envelope position-absolute"
                                            style="top: 50%; right: 1rem; transform: translateY(-50%); color: #007bff;"></i>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-4">
                                    <div class="position-relative">
                                        <input type="password" class="form-control form-control-lg border-0 shadow-sm"
                                            id="password" placeholder="Password"
                                            style="border-radius: 10px; padding: 1.5rem 1rem; transition: all 0.3s ease;"
                                            name="password">
                                        <i class="fas fa-lock position-absolute"
                                            style="top: 50%; right: 1rem; transform: translateY(-50%); color: #007bff;"></i>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group mb-4">
                                    <div class="position-relative ">
                                        <input type="password" class="form-control form-control-lg border-0 shadow-sm"
                                            id="confirmPassword" placeholder="Confirm Password"
                                            style="border-radius: 10px; padding: 1.5rem 1rem; transition: all 0.3s ease;"
                                            name="password_confirmation">
                                        <i class="fas fa-lock position-absolute"
                                            style="top: 50%; right: 1rem; transform: translateY(-50%); color: #007bff;"></i>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>

                                <!-- Job Category -->
                                <div class="form-group position-relative mb-4">
                                    <select class="custom-select border-0 shadow-sm w-100" id="jobCategory"
                                        name="jobCategory">
                                        <option selected disabled>Select Job Category</option>
                                        @if (count($jobCategories) > 0)
                                            @foreach ($jobCategories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('jobCategory') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('jobCategory'))
                                        <span class="text-danger">{{ $errors->first('jobCategory') }}</span>
                                    @endif
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-block mb-3 shadow mt-4 btn-style"
                                    style="background: linear-gradient(135deg, #007bff, #00c4cc); border: none; border-radius: 10px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                                    onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 20px rgba(0,123,255,0.4)'"
                                    onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 15px rgba(0,123,255,0.2)'">Create
                                    Account</button>

                                <!-- Google Sign In -->
                                <button type="button" class="btn btn-outline-danger btn-block btn-lg shadow-sm"
                                    style="border-radius: 10px; padding: 0.75rem; transition: all 0.3s ease;">
                                    <i class="fab fa-google mr-2"></i> Sign Up with Google
                                </button>

                                <!-- Login Link -->
                                <div class="text-center mt-4">
                                    <p class="text-muted">Already have an account? <a href="{{ route('login') }}"
                                            class="text-primary font-weight-bold"
                                            style="text-decoration: none; transition: color 0.3s ease;"
                                            onmouseover="this.style.color='#0056b3'"
                                            onmouseout="this.style.color='#007bff'">Login here</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
