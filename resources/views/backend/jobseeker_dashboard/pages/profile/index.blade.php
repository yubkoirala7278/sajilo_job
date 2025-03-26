@extends('backend.jobseeker_dashboard.layouts.master')
@section('contain')
    <!-- Content -->
    <div class="p-4">
        <h1 class="fs-4 fw-bold">Hello, Ram Sharma</h1>
        <p>Here is your daily activities and job alerts</p>

        <div class="row mt-2 g-3">
            <div class="col-md-6 col-xl-4">
                <div class="sky-blue-box profile-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between ">
                            <h2 class="fs-5 fw-semibold m-0">529</h2>
                            <p class="m-0 mt-1">Applied Job</p>
                        </div>
                        <div class="logo">
                            <i class="fa-solid fa-briefcase bg-white text-primary fs-5 p-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="sky-red-box profile-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between ">
                            <h2 class="fs-5 fw-semibold m-0">529</h2>
                            <p class="m-0 mt-1">Applied Job</p>
                        </div>
                        <div class="logo">
                            <i class="fa-solid fa-briefcase bg-white text-danger fs-5 p-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="sky-green-box profile-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between ">
                            <h2 class="fs-5 fw-semibold m-0">529</h2>
                            <p class="m-0 mt-1">Applied Job</p>
                        </div>
                        <div class="logo">
                            <i class="fa-solid fa-briefcase bg-white text-success fs-5 p-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="edit-profile-bar mt-4 p-4 rounded-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <img src="{{ asset('backend/img/user-profile/1.jpeg') }}"
                        style="width: 40px;height:40px;clip-path:circle();" alt="">
                    <div class="about">
                        <h2 class="fs-5 fw-bold m-0 text-white">Your profile editing is not completed.</h2>
                        <p class="m-0 mt-1  text-white">Complete your profile editing & build your custom Resume
                        </p>
                    </div>
                </div>
                <div class="edit-btn">
                    <a href="" class="btn btn-light">Edit Profile</a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="d-flex justify-content-between">
                    <h5 class="fs-6 fw-bold">New Job</h5>
                    <a href="" class="text-decoration-none">View All</a>
                </div>

                <div class="mt-2">
                    <div class="mt-3 p-3 rounded-4 border border-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary p-3 d-grid place-content-center rounded-2">
                                    <img src="{{ asset('backend/img/jobs/freepic.png') }}" style="width: 18px;"
                                        alt="">
                                </div>
                                <div class="contain">
                                    <h5 class="m-0 fs-6 fw-bold">Freepik</h5>
                                    <p class="m-0 small-font light-gray-color"><i class="fa-solid fa-location-dot me-1"></i>
                                        Kathmandu</p>
                                </div>
                            </div>
                            <span class="batch-red">Featured</span>
                        </div>
                        <h2 class="fs-5 fw-bold mt-4">Visual Designer</h2>
                        <p class="small-font light-gray-color m-0">Full Time . Rs.25,000- Rs.35,000</p>
                    </div>

                    <div class="mt-3 p-3 rounded-4 border border-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary p-3 d-grid place-content-center rounded-2">
                                    <img src="{{ asset('backend/img/jobs/freepic.png') }}" style="width: 18px;"
                                        alt="">
                                </div>
                                <div class="contain">
                                    <h5 class="m-0 fs-6 fw-bold">Freepik</h5>
                                    <p class="m-0 small-font light-gray-color"><i class="fa-solid fa-location-dot me-1"></i>
                                        Kathmandu</p>
                                </div>
                            </div>
                            <span class="batch-red">Featured</span>
                        </div>
                        <h2 class="fs-5 fw-bold mt-4">Visual Designer</h2>
                        <p class="small-font light-gray-color m-0">Full Time . Rs.25,000- Rs.35,000</p>
                    </div>

                    <div class="mt-3 p-3 rounded-4 border border-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary p-3 d-grid place-content-center rounded-2">
                                    <img src="{{ asset('backend/img/jobs/freepic.png') }}" style="width: 18px;"
                                        alt="">
                                </div>
                                <div class="contain">
                                    <h5 class="m-0 fs-6 fw-bold">Freepik</h5>
                                    <p class="m-0 small-font light-gray-color"><i class="fa-solid fa-location-dot me-1"></i>
                                        Kathmandu</p>
                                </div>
                            </div>
                            <span class="batch-red">Featured</span>
                        </div>
                        <h2 class="fs-5 fw-bold mt-4">Visual Designer</h2>
                        <p class="small-font light-gray-color m-0">Full Time . Rs.25,000- Rs.35,000</p>
                    </div>
                </div>



            </div>

            <div class="col-md-8">
                <div class="d-flex justify-content-between">
                    <h5 class="fs-6 fw-bold">Matching Jobs</h5>
                    <a href="" class="text-decoration-none">View All</a>
                </div>

                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="light-gray-bg">
                                <tr>
                                    <th class="light-gray-bg" scope="col">Job</th>
                                    <th class="light-gray-bg" scope="col">Company</th>
                                    <th class="light-gray-bg" scope="col">Deadline</th>
                                    <th class="light-gray-bg" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Account Executive</th>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Freepik</h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-sm btn-warning d-block">Interested</a>
                                        <a href="#" class="btn btn-sm btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Account Executive</th>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Freepik</h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-sm btn-warning d-block">Interested</a>
                                        <a href="#" class="btn btn-sm btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Account Executive</th>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Freepik</h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-sm btn-warning d-block">Interested</a>
                                        <a href="#" class="btn btn-sm btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Account Executive</th>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Freepik</h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-sm btn-warning d-block">Interested</a>
                                        <a href="#" class="btn btn-sm btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Account Executive</th>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Freepik</h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-sm btn-warning d-block">Interested</a>
                                        <a href="#" class="btn btn-sm btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Account Executive</th>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Freepik</h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-sm btn-warning d-block">Interested</a>
                                        <a href="#" class="btn btn-sm btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-between">
                    <h5 class="fs-6 fw-bold">Recently Applied</h5>
                    <a href="" class="text-decoration-none">View All</a>
                </div>

                <div class="mt-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="light-gray-bg">
                                <tr>
                                    <th class="light-gray-bg" scope="col">Job</th>
                                    <th class="light-gray-bg" scope="col">Date Applied</th>
                                    <th class="light-gray-bg" scope="col">Status</th>
                                    <th class="light-gray-bg" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                                                        class="batch-blue">Remote</span> </h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu Rs. 12,000</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                                    </th>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                                                        class="batch-blue">Remote</span> </h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu Rs. 12,000</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                                    </th>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                                                        class="batch-blue">Remote</span> </h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu Rs. 12,000</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                                    </th>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                                                        class="batch-blue">Remote</span> </h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu Rs. 12,000</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                                    </th>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
