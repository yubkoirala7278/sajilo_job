@extends('public.layouts.master')
@section('custom-css')
    <style>
        .single-job-items {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .single-job-items:hover {
            transform: translateY(-5px);
        }

        .company-img img {
            width: 60px;
            height: 60px;
            /* border-radius: 50%; */
            object-fit: cover;
        }

        .job-tittle h4 {
            font-size: 22px;
            color: #2c3e50;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .job-tittle ul {
            list-style: none;
            padding: 0;
            margin: 0 0 10px 0;
            color: #7f8c8d;
        }

        .job-tittle ul li {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .job-tittle ul li i {
            color: #e74c3c;
            margin-right: 5px;
        }

        .job-details-extra p {
            font-size: 13px;
            color: #34495e;
            margin: 5px 0;
        }

        .job-details-extra strong {
            color: #2980b9;
        }

        .items-link a {
            background: #3498db;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s ease;
        }

        .items-link a:hover {
            background: #2980b9;
        }

        .items-link span {
            display: block;
            font-size: 12px;
            color: #95a5a6;
            margin-top: 5px;
        }

        .f-right {
            text-align: right;
        }

        .small-section-tittle2 h4 {
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="{{ asset('public/assets/img/hero/about.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Get your job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xxl-3 col-lg-4 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                            <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                                d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                        </svg>
                                    </div>
                                    <h4>Filter Jobs</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <div class="single-listing">
                                <div>
                                    <div class="small-section-tittle2">
                                        <h4>Search Job</h4>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            placeholder="Enter Skill or Job Seeker Detail" aria-label="Search">
                                    </div>
                                </div>

                                <div  style="padding-top: 30px">
                                    <div class="small-section-tittle2">
                                        <h4>Job Category</h4>
                                    </div>
                                    <div class="select-job-items2">
                                        <select name="select">
                                            <option value="">All Categories</option>
                                            <option value="backend-development">Senior PHP/Laravel Developer</option>
                                            <option value="frontend-development">Frontend Developer (React/Vue)</option>
                                            <option value="fullstack-development">Full Stack Developer</option>
                                            <option value="ui-ux-design">UI/UX Designer</option>
                                            <option value="digital-marketing">Digital Marketer</option>
                                            <option value="seo-specialist">SEO Specialist</option>
                                            <option value="content-writer">Content Writer</option>
                                            <option value="graphic-designer">Graphic Designer</option>
                                            <option value="project-manager">Project Manager</option>
                                            <option value="sales-representative">Sales Representative</option>
                                            <option value="customer-support">Customer Support Specialist</option>
                                            <option value="data-analyst">Data Analyst</option>
                                            <option value="network-administrator">Network Administrator</option>
                                            <option value="cyber-security">Cyber Security Specialist</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="select-Categories mt-50" style="padding-top: 30px">
                                    <div class="small-section-tittle2">
                                        <h4>Job Level</h4>
                                    </div>
                                    <label class="container">Top Level
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Senior Level
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Mid Level
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Entry Level
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="select-Categories" style="padding-top: 30px">
                                    <div class="small-section-tittle2">
                                        <h4>Job Location</h4>
                                    </div>
                                    <div class="select-job-items2">
                                        <select name="select">
                                            <option value="">Anywhere</option>
                                            <option value="kathmandu">Kathmandu</option>
                                            <option value="pokhara">Pokhara</option>
                                            <option value="butwal">Butwal</option>
                                            <option value="biratnagar">Biratnagar</option>
                                            <option value="dharan">Dharan</option>
                                            <option value="bharatpur">Bharatpur</option>
                                            <option value="janakpur">Janakpur</option>
                                            <option value="hetauda">Hetauda</option>
                                            <option value="nepalgunj">Nepalgunj</option>
                                            <option value="bhairahawa">Bhairahawa</option>
                                            <option value="itahari">Itahari</option>
                                            <option value="lalitpur">Lalitpur</option>
                                            <option value="bhaktapur">Bhaktapur</option>
                                            <option value="damak">Damak</option>
                                            <option value="dhangadhi">Dhangadhi</option>
                                            <option value="tikapur">Tikapur</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="select-Categories mt-50" style="padding-top: 30px">
                                    <div class="small-section-tittle2">
                                        <h4>Experience</h4>
                                    </div>
                                    <label class="container">1-2 Years
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">2-3 Years
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">3-6 Years
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">6-more..
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="select-Categories" style="padding-top: 30px">
                                    <div class="small-section-tittle2">
                                        <h4>Posted Within</h4>
                                    </div>
                                    <label class="container">Any
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Today
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 2 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 3 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 5 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 10 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="select-Categories" style="padding-top: 30px">
                                        <button class="btn btn-danger">Clear All</button>
                                </div>

                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xxl-9 col-lg-8 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <span>39, 782 Jobs found</span>
                                            <!-- Select job items start -->
                                            <div class="select-job-items form-group">
                                                <span>Employment Type</span>
                                                <select name="select" class="form-select">
                                                    <option value="">Full Time</option>
                                                    <option value="">Part Time</option>
                                                    <option value="">Contract</option>
                                                    <option value="">Temporary</option>
                                                    <option value="">Internship</option>
                                                    <option value="">Trineeship</option>
                                                    <option value="">Volunteer</option>
                                                </select>
                                            </div>
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img
                                                    src="{{ asset('public/assets/img/icon/job-list1.png') }}"
                                                    alt="Company Logo"></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{ route('job.details') }}">
                                                <h4>Senior PHP/Laravel Backend Developer</h4>
                                            </a>
                                            <ul>
                                                <li><strong>Company:</strong> Genius Systems Pvt. Ltd</li>
                                                <li><i class="fas fa-map-marker-alt"></i>Lalitpur District, Nepal</li>
                                                <li><strong>Salary:</strong> $3500 - $4000</li>
                                            </ul>
                                            <div class="job-details-extra">
                                                <p><strong>Experience:</strong> 4+ years</p>
                                                <p><strong>Source:</strong> Other Source</p>
                                                <p><strong>Key Skills:</strong> PHP, Back-End Web Development, Laravel,
                                                    Bootstrap, Ajax</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="{{ route('job.details') }}">View Job Details</a>
                                        <span>Apply Before: 5 days, 6 hours from now</span>
                                    </div>
                                </div>

                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img
                                                    src="{{ asset('public/assets/img/icon/job-list2.png') }}"
                                                    alt="Company Logo"></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{ route('job.details') }}">
                                                <h4>Digital Marketer</h4>
                                            </a>
                                            <ul>
                                                <li><strong>Company:</strong> Creative Agency</li>
                                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                <li><strong>Salary:</strong> $3500 - $4000</li>
                                            </ul>
                                            <div class="job-details-extra">
                                                <p><strong>Experience:</strong> 2+ years</p>
                                                <p><strong>Source:</strong> Job Board</p>
                                                <p><strong>Key Skills:</strong> SEO, Social Media Marketing, Google Ads,
                                                    Content Creation</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="{{ route('job.details') }}">View Job Details</a>
                                        <span>Apply Before: 5 days, 6 hours from now</span>
                                    </div>
                                </div>

                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img
                                                    src="{{ asset('public/assets/img/icon/job-list3.png') }}"
                                                    alt="Company Logo"></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{ route('job.details') }}">
                                                <h4>Digital Marketer</h4>
                                            </a>
                                            <ul>
                                                <li><strong>Company:</strong> Creative Agency</li>
                                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                <li><strong>Salary:</strong> $3500 - $4000</li>
                                            </ul>
                                            <div class="job-details-extra">
                                                <p><strong>Experience:</strong> 3+ years</p>
                                                <p><strong>Source:</strong> Company Website</p>
                                                <p><strong>Key Skills:</strong> Digital Strategy, Email Marketing,
                                                    Analytics, PPC Campaigns</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="{{ route('job.details') }}">View Job Details</a>
                                        <span>Apply Before: 5 days, 6 hours from now</span>
                                    </div>
                                </div>

                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img
                                                    src="{{ asset('public/assets/img/icon/job-list4.png') }}"
                                                    alt="Company Logo"></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{ route('job.details') }}">
                                                <h4>Digital Marketer</h4>
                                            </a>
                                            <ul>
                                                <li><strong>Company:</strong> Creative Agency</li>
                                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                <li><strong>Salary:</strong> $3500 - $4000</li>
                                            </ul>
                                            <div class="job-details-extra">
                                                <p><strong>Experience:</strong> 1+ years</p>
                                                <p><strong>Source:</strong> LinkedIn</p>
                                                <p><strong>Key Skills:</strong> Branding, Graphic Design, Social Media Ads,
                                                    Market Research</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="{{ route('job.details') }}">View Job Details</a>
                                        <span>Apply Before: 5 days, 6 hours from now</span>
                                    </div>
                                </div>

                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img
                                                    src="{{ asset('public/assets/img/icon/job-list1.png') }}"
                                                    alt="Company Logo"></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{ route('job.details') }}">
                                                <h4>Digital Marketer</h4>
                                            </a>
                                            <ul>
                                                <li><strong>Company:</strong> Creative Agency</li>
                                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                <li><strong>Salary:</strong> $3500 - $4000</li>
                                            </ul>
                                            <div class="job-details-extra">
                                                <p><strong>Experience:</strong> 5+ years</p>
                                                <p><strong>Source:</strong> Referral</p>
                                                <p><strong>Key Skills:</strong> SEO Optimization, Campaign Management, Data
                                                    Analysis, SEM</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="{{ route('job.details') }}">View Job Details</a>
                                        <span>Apply Before: 5 days, 6 hours from now</span>
                                    </div>
                                </div>

                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img
                                                    src="{{ asset('public/assets/img/icon/job-list3.png') }}"
                                                    alt="Company Logo"></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{ route('job.details') }}">
                                                <h4>Digital Marketer</h4>
                                            </a>
                                            <ul>
                                                <li><strong>Company:</strong> Creative Agency</li>
                                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                <li><strong>Salary:</strong> $3500 - $4000</li>
                                            </ul>
                                            <div class="job-details-extra">
                                                <p><strong>Experience:</strong> 2+ years</p>
                                                <p><strong>Source:</strong> Job Fair</p>
                                                <p><strong>Key Skills:</strong> Content Marketing, Influencer Collaboration,
                                                    SEO, Analytics</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="{{ route('job.details') }}">View Job Details</a>
                                        <span>Apply Before: 5 days, 6 hours from now</span>
                                    </div>
                                </div>

                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img
                                                    src="{{ asset('public/assets/img/icon/job-list4.png') }}"
                                                    alt="Company Logo"></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{ route('job.details') }}">
                                                <h4>Digital Marketer</h4>
                                            </a>
                                            <ul>
                                                <li><strong>Company:</strong> Creative Agency</li>
                                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                <li><strong>Salary:</strong> $3500 - $4000</li>
                                            </ul>
                                            <div class="job-details-extra">
                                                <p><strong>Experience:</strong> 3+ years</p>
                                                <p><strong>Source:</strong> Indeed</p>
                                                <p><strong>Key Skills:</strong> PPC, Social Media Strategy, CRM Tools,
                                                    Digital Advertising</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="{{ route('job.details') }}">View Job Details</a>
                                        <span>Apply Before: 5 days, 6 hours from now</span>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><span
                                                class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->

    </main>
@endsection
