@extends('backend.jobseeker_dashboard.layouts.master')
@section('contain')
<div class="p-4">
    <div class="d-flex justify-content-between">
        <h1 class="fs-4 fw-bold">Job Search & Applications/ Jobs  Interested</h1>
    </div>

    <div class="mt-4">
        
        <div class="d-flex justify-content-between mt-4">
            <div class="d-flex align-items-center gap-2">
                <div class="d-grid place-content-center">
                    <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                        style="width: 60px;height:50px;" class="rounded-4" alt="">
                </div>
                <div class="contain">
                    <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                            class="batch-blue">Full Time</span> </h5>
                    <p class="m-0 mt-1 small-font light-gray-color"><i
                            class="fa-solid fa-location-dot me-1"></i> Kathmandu <span class="ms-2">Rs. 20K / Rs. 12K</span> <span class="ms-2 text-danger"><i class="fa-regular fa-circle-xmark me-1"></i> Job Expired</span> </p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <i class="fa-solid fa-bookmark"></i>
                <a href="#" class="btn btn-light d-block">Deadline expired</a>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <div class="d-flex align-items-center gap-2">
                <div class="d-grid place-content-center">
                    <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                        style="width: 60px;height:50px;" class="rounded-4" alt="">
                </div>
                <div class="contain">
                    <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                            class="batch-blue">Full Time</span> </h5>
                    <p class="m-0 mt-1 small-font light-gray-color"><i
                            class="fa-solid fa-location-dot me-1"></i> Kathmandu <span class="ms-2">Rs. 20K / Rs. 12K</span> <span class="ms-2 text-secondary"><i class="fa-regular fa-calendar"></i> 4 Days Remaining</span> </p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <i class="fa-solid fa-bookmark"></i>
                <a href="#" class="btn btn-light text-primary d-block">Apply Now <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>


        <div class="d-flex justify-content-between mt-4">
            <div class="d-flex align-items-center gap-2">
                <div class="d-grid place-content-center">
                    <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                        style="width: 60px;height:50px;" class="rounded-4" alt="">
                </div>
                <div class="contain">
                    <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                            class="batch-blue">Full Time</span> </h5>
                    <p class="m-0 mt-1 small-font light-gray-color"><i
                            class="fa-solid fa-location-dot me-1"></i> Kathmandu <span class="ms-2">Rs. 20K / Rs. 12K</span> <span class="ms-2 text-danger"><i class="fa-regular fa-circle-xmark me-1"></i> Job Expired</span> </p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <i class="fa-solid fa-bookmark"></i>
                <a href="#" class="btn btn-light d-block">Deadline expired</a>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <div class="d-flex align-items-center gap-2">
                <div class="d-grid place-content-center">
                    <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                        style="width: 60px;height:50px;" class="rounded-4" alt="">
                </div>
                <div class="contain">
                    <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                            class="batch-blue">Full Time</span> </h5>
                    <p class="m-0 mt-1 small-font light-gray-color"><i
                            class="fa-solid fa-location-dot me-1"></i> Kathmandu <span class="ms-2">Rs. 20K / Rs. 12K</span> <span class="ms-2 text-secondary"><i class="fa-regular fa-calendar"></i> 4 Days Remaining</span> </p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <i class="fa-solid fa-bookmark"></i>
                <a href="#" class="btn btn-light text-primary d-block">Apply Now <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>

    </div>

@endsection
