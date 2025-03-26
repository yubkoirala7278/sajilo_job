@extends('backend.jobseeker_dashboard.layouts.master')
@section('contain')
    <div class="p-4">
        <div class="d-flex justify-content-between">
            <h1 class="fs-4 fw-bold">Job Search & Applications/Manage Job</h1>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            <select class="form-select" style="max-width: 120px;" aria-label="Default select example">
                <option value="1">Latest</option>
                <option value="2">Oldest</option>
                <option value="3">Popular</option>
            </select>
        </div>

        <div class="mt-3 d-flex flex-column gap-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class=" rounded-pill d-grid place-content-center"
                            style="background: rgb(215, 226, 238);padding:12px;">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 2499.6 2500" width="14px"
                                height="14px" viewBox="0 0 2499.6 2500">
                                <path d="m1187.9 1187.9h-1187.9v-1187.9h1187.9z" fill="#f1511b" />
                                <path d="m2499.6 1187.9h-1188v-1187.9h1187.9v1187.9z" fill="#80cc28" />
                                <path d="m1187.9 2500h-1187.9v-1187.9h1187.9z" fill="#00adef" />
                                <path d="m2499.6 2500h-1188v-1187.9h1187.9v1187.9z" fill="#fbbc09" />
                            </svg>
                        </div>
                        <div class="contain">
                            <h2 class="fs-6 fw-bold m-0">Microsoft</h2>
                            <p class="m-0 mt-1 small-font light-gray-color"><i class="fa-solid fa-location-dot me-1"
                                    style="color: orange;"></i>
                                Idaho, USA</p>
                        </div>
                    </div>
                    <div class="">
                        <h2 class="fs-6 fw-bold text-primary m-0">Senior UX Developer</h2>
                        <div class="d-flex gap-2 mt-1">
                            <p class="small-font light-gray-color m-0 d-flex align-items-center gap-2"> <span class="dot"
                                    style="background: orange;"></span> Full Time</p>
                            <p class="small-font light-gray-color m-0 d-flex align-items-center gap-2"> <span class="dot"
                                    style="background: orange;"></span> OnSite</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column gap-1">
                    <p class="m-0"><i class="fa-regular fa-calendar text-primary me-2"></i>5 days ago</p>
                    <a class="btn btn-sm btn-primary rounded-pill" href="">Apply Now</a>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class=" rounded-pill d-grid place-content-center"
                            style="background: rgb(215, 226, 238);padding:12px;">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 2499.6 2500" width="14px"
                                height="14px" viewBox="0 0 2499.6 2500">
                                <path d="m1187.9 1187.9h-1187.9v-1187.9h1187.9z" fill="#f1511b" />
                                <path d="m2499.6 1187.9h-1188v-1187.9h1187.9v1187.9z" fill="#80cc28" />
                                <path d="m1187.9 2500h-1187.9v-1187.9h1187.9z" fill="#00adef" />
                                <path d="m2499.6 2500h-1188v-1187.9h1187.9v1187.9z" fill="#fbbc09" />
                            </svg>
                        </div>
                        <div class="contain">
                            <h2 class="fs-6 fw-bold m-0">Microsoft</h2>
                            <p class="m-0 mt-1 small-font light-gray-color"><i class="fa-solid fa-location-dot me-1"
                                    style="color: orange;"></i>
                                Idaho, USA</p>
                        </div>
                    </div>
                    <div class="">
                        <h2 class="fs-6 fw-bold text-primary m-0">Senior UX Developer</h2>
                        <div class="d-flex gap-2 mt-1">
                            <p class="small-font light-gray-color m-0 d-flex align-items-center gap-2"> <span class="dot"
                                    style="background: orange;"></span> Full Time</p>
                            <p class="small-font light-gray-color m-0 d-flex align-items-center gap-2"> <span class="dot"
                                    style="background: orange;"></span> OnSite</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column gap-1">
                    <p class="m-0"><i class="fa-regular fa-calendar text-primary me-2"></i>5 days ago</p>
                    <a class="btn btn-sm btn-primary rounded-pill" href="">Apply Now</a>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class=" rounded-pill d-grid place-content-center"
                            style="background: rgb(215, 226, 238);padding:12px;">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 2499.6 2500" width="14px"
                                height="14px" viewBox="0 0 2499.6 2500">
                                <path d="m1187.9 1187.9h-1187.9v-1187.9h1187.9z" fill="#f1511b" />
                                <path d="m2499.6 1187.9h-1188v-1187.9h1187.9v1187.9z" fill="#80cc28" />
                                <path d="m1187.9 2500h-1187.9v-1187.9h1187.9z" fill="#00adef" />
                                <path d="m2499.6 2500h-1188v-1187.9h1187.9v1187.9z" fill="#fbbc09" />
                            </svg>
                        </div>
                        <div class="contain">
                            <h2 class="fs-6 fw-bold m-0">Microsoft</h2>
                            <p class="m-0 mt-1 small-font light-gray-color"><i class="fa-solid fa-location-dot me-1"
                                    style="color: orange;"></i>
                                Idaho, USA</p>
                        </div>
                    </div>
                    <div class="">
                        <h2 class="fs-6 fw-bold text-primary m-0">Senior UX Developer</h2>
                        <div class="d-flex gap-2 mt-1">
                            <p class="small-font light-gray-color m-0 d-flex align-items-center gap-2"> <span
                                    class="dot" style="background: orange;"></span> Full Time</p>
                            <p class="small-font light-gray-color m-0 d-flex align-items-center gap-2"> <span
                                    class="dot" style="background: orange;"></span> OnSite</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column gap-1">
                    <p class="m-0"><i class="fa-regular fa-calendar text-primary me-2"></i>5 days ago</p>
                    <a class="btn btn-sm btn-primary rounded-pill" href="">Apply Now</a>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class=" rounded-pill d-grid place-content-center"
                            style="background: rgb(215, 226, 238);padding:12px;">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 2499.6 2500"
                                width="14px" height="14px" viewBox="0 0 2499.6 2500">
                                <path d="m1187.9 1187.9h-1187.9v-1187.9h1187.9z" fill="#f1511b" />
                                <path d="m2499.6 1187.9h-1188v-1187.9h1187.9v1187.9z" fill="#80cc28" />
                                <path d="m1187.9 2500h-1187.9v-1187.9h1187.9z" fill="#00adef" />
                                <path d="m2499.6 2500h-1188v-1187.9h1187.9v1187.9z" fill="#fbbc09" />
                            </svg>
                        </div>
                        <div class="contain">
                            <h2 class="fs-6 fw-bold m-0">Microsoft</h2>
                            <p class="m-0 mt-1 small-font light-gray-color"><i class="fa-solid fa-location-dot me-1"
                                    style="color: orange;"></i>
                                Idaho, USA</p>
                        </div>
                    </div>
                    <div class="">
                        <h2 class="fs-6 fw-bold text-primary m-0">Senior UX Developer</h2>
                        <div class="d-flex gap-2 mt-1">
                            <p class="small-font light-gray-color m-0 d-flex align-items-center gap-2"> <span
                                    class="dot" style="background: orange;"></span> Full Time</p>
                            <p class="small-font light-gray-color m-0 d-flex align-items-center gap-2"> <span
                                    class="dot" style="background: orange;"></span> OnSite</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column gap-1">
                    <p class="m-0"><i class="fa-regular fa-calendar text-primary me-2"></i>5 days ago</p>
                    <a class="btn btn-sm btn-primary rounded-pill" href="">Apply Now</a>
                </div>
            </div>

        </div>
    </div>
@endsection
