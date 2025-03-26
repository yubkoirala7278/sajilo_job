@extends('backend.jobseeker_dashboard.layouts.master')
@section('contain')
<div class="p-4">
    <div class="d-flex justify-content-between">
        <h1 class="fs-4 fw-bold">Job Search & Applications/ Jobs Applied</h1>
    </div>

    <div class="mt-3">
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
                                            class="fa-solid fa-location-dot me-1"></i> Kathmandu <span class="ms-3">Rs. 20,000 / Rs. 12,000</span> </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            March 12, 2025
                        </td>
                        <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                        </th>
                        <td class="d-flex flex-column gap-1">
                            <a href="#" class="btn btn-light text-primary d-block">View Details</a>
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
                                            class="fa-solid fa-location-dot me-1"></i> Kathmandu <span class="ms-3">Rs. 20,000 / Rs. 12,000</span> </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            March 12, 2025
                        </td>
                        <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                        </th>
                        <td class="d-flex flex-column gap-1">
                            <a href="#" class="btn btn-light text-primary d-block">View Details</a>
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
                                            class="fa-solid fa-location-dot me-1"></i> Kathmandu <span class="ms-3">Rs. 20,000 / Rs. 12,000</span> </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            March 12, 2025
                        </td>
                        <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                        </th>
                        <td class="d-flex flex-column gap-1">
                            <a href="#" class="btn btn-light text-primary d-block">View Details</a>
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
                                            class="fa-solid fa-location-dot me-1"></i> Kathmandu <span class="ms-3">Rs. 20,000 / Rs. 12,000</span> </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            March 12, 2025
                        </td>
                        <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                        </th>
                        <td class="d-flex flex-column gap-1">
                            <a href="#" class="btn btn-light text-primary d-block">View Details</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
