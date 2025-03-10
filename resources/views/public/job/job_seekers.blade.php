@extends('public.layouts.master')

@section('custom-css')
    <!-- Add any custom CSS specific to this page here if needed -->
    <style>
        .filter-section {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            margin: 0 auto;
            max-width: 1200px;
        }

        .filter-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .select-job-items2 {
            flex: 1;
            min-width: 200px;
        }

        .select-job-items2 label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #34495e;
        }

        .select-job-items2 select,
        .select-job-items2 input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .filter-submit {
            display: flex;
            align-items: flex-end;
        }

        .btn {
            background: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background: #2980b9;
        }

        .candidate-listings {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .single-candidate-items {
            display: flex;
            justify-content: space-between;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .candidate-img img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .candidate-tittle h4 {
            font-size: 22px;
            color: #2c3e50;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .candidate-tittle ul {
            list-style: none;
            padding: 0;
            margin: 0 0 10px 0;
            color: #7f8c8d;
        }

        .candidate-tittle ul li {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .candidate-tittle ul li i {
            color: #e74c3c;
            margin-right: 5px;
        }

        .candidate-details-extra p {
            font-size: 13px;
            color: #34495e;
            margin: 5px 0;
        }

        .candidate-details-extra strong {
            color: #2980b9;
        }

        .items-link a {
            background: #3498db;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 14px;
        }

        .items-link a:hover {
            background: #2980b9;
        }

        .items-link span {
            display: block;
            font-size: 12px;
            color: #95a5a6;
            margin-top: 5px;
            text-align: right;
        }

        .f-right {
            text-align: right;
        }

        .single-candidate-items:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }

        .filter-form {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .filter-container {
            width: 100%;
        }

        .filter-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .filter-header h4 {
            font-size: 24px;
            color: #2c3e50;
            /* margin-bottom: 5px; */
        }

        .filter-header p {
            font-size: 14px;
            color: #7f8c8d;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
        }

        .filter-label {
            font-size: 14px;
            font-weight: 600;
            color: #34495e;
            margin-bottom: 8px;
        }

        .select-wrapper {
            position: relative;
        }

        .filter-select,
        .filter-input {
            width: 100%;
            
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            color: #2c3e50;
            background: #fff;
            transition: border-color 0.3s ease;
        }

        .filter-input {
            padding: 12px 40px 12px 16px;
        }

        .filter-select:focus,
        .filter-input:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        .select-icon {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #7f8c8d;
            pointer-events: none;
        }

        .filter-btn {
            width: 100%;
            padding: 12px;
            background: #3498db;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .filter-btn:hover {
            background: #2980b9;
        }

        .filter-submit {
            align-self: flex-end;
        }

        @media (max-width: 768px) {
            .filter-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="{{ asset('public/assets/img/hero/about.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Hire Top Talent Effortlessly</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->

        <!-- Filter Section -->
        <div class="filter-section mb-30 mt-3">
            <form action="" method="GET" class="filter-form">
                <div class="filter-container">
                    <div class="filter-header">
                        <h4>Find Your Ideal Candidate</h4>
                        <p>Refine your search with the filters below</p>
                    </div>

                    <div class="filter-grid">
                        <!-- Job Category -->
                        <div class="filter-item">
                            <label for="job-category" class="filter-label">Job Category</label>
                            <div class="select-wrapper">
                                <select name="job_category" id="job-category" class="filter-select">
                                    <option value="">All Categories</option>
                                    <option value="backend-development">Senior PHP/Laravel Backend Developer</option>
                                    <option value="digital-marketing">Digital Marketer</option>
                                </select>
                                
                            </div>
                        </div>

                        <!-- Experience Level -->
                        <div class="filter-item">
                            <label for="experience" class="filter-label">Experience Level</label>
                            <div class="select-wrapper">
                                <select name="experience" id="experience" class="filter-select">
                                    <option value="">Any Experience</option>
                                    <option value="0-1">0-1 Years</option>
                                    <option value="1-3">1-3 Years</option>
                                    <option value="3-5">3-5 Years</option>
                                    <option value="5+">5+ Years</option>
                                </select>
                                
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="filter-item">
                            <label for="location" class="filter-label">Location</label>
                            <div class="select-wrapper">
                                <select name="location" id="location" class="filter-select">
                                    <option value="">All Locations</option>
                                    <option value="lalitpur-nepal">Lalitpur District, Nepal</option>
                                    <option value="athens-greece">Athens, Greece</option>
                                </select>
                                
                            </div>
                        </div>

                        <!-- Key Skills -->
                        <div class="filter-item">
                            <label for="skills" class="filter-label">Key Skills</label>
                            <input type="text" name="skills" id="skills" class="filter-input"
                                placeholder="e.g., PHP, Laravel, SEO" value="">
                        </div>

                        <!-- Availability -->
                        <div class="filter-item">
                            <label for="availability" class="filter-label">Availability</label>
                            <div class="select-wrapper">
                                <select name="availability" id="availability" class="filter-select">
                                    <option value="">Any</option>
                                    <option value="immediate">Immediate</option>
                                    <option value="1-month">Within 1 Month</option>
                                    <option value="3-months">Within 3 Months</option>
                                </select>
                                
                            </div>
                        </div>

                        <!-- Search Button -->
                        <div class="filter-item filter-submit">
                            <button type="submit" class="filter-btn"><i class="fas fa-search"></i> Search
                                Candidates</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Candidate Listings -->
        <div class="candidate-listings">
            <div class="small-section-tittle2">
                <h4>Available Candidates</h4>
            </div>

            <!-- Single Candidate -->
            <div class="single-candidate-items mb-30">
                <div class="candidate-items">
                    <div class="candidate-img">
                        <a href="">
                            <img src="{{ asset('public/assets/img/banner/dog.png') }}" alt="Candidate Avatar">
                        </a>
                    </div>
                    <div class="candidate-tittle">
                        <a href="">
                            <h4>John Doe</h4>
                        </a>
                        <ul>
                            <li><strong>Category:</strong> Senior PHP/Laravel Backend Developer</li>
                            <li><i class="fas fa-map-marker-alt"></i> Lalitpur District, Nepal</li>
                            <li><strong>Experience:</strong> 4+ Years</li>
                        </ul>
                        <div class="candidate-details-extra">
                            <p><strong>Key Skills:</strong> PHP, Laravel, Bootstrap, Ajax, MySQL</p>
                            <p><strong>Availability:</strong> Immediate</p>
                            <p><strong>Source:</strong> Job Board</p>
                        </div>
                    </div>
                </div>
                <div class="items-link items-link2 f-right">
                    <a href="{{route('job.seeker.detail')}}">View Profile</a>
                    <span>Last Updated: 2 days ago</span>
                </div>
            </div>

            <!-- Single Candidate -->
            <div class="single-candidate-items mb-30">
                <div class="candidate-items">
                    <div class="candidate-img">
                        <a href="">
                            <img src="{{ asset('public/assets/img/banner/dog.png') }}" alt="Candidate Avatar">
                        </a>
                    </div>
                    <div class="candidate-tittle">
                        <a href="">
                            <h4>Jane Smith</h4>
                        </a>
                        <ul>
                            <li><strong>Category:</strong> Digital Marketer</li>
                            <li><i class="fas fa-map-marker-alt"></i> Athens, Greece</li>
                            <li><strong>Experience:</strong> 3+ Years</li>
                        </ul>
                        <div class="candidate-details-extra">
                            <p><strong>Key Skills:</strong> SEO, Google Ads, Content Marketing, Analytics</p>
                            <p><strong>Availability:</strong> Within 1 Month</p>
                            <p><strong>Source:</strong> LinkedIn</p>
                        </div>
                    </div>
                </div>
                <div class="items-link items-link2 f-right">
                    <a href="{{route('job.seeker.detail')}}">View Profile</a>
                    <span>Last Updated: 5 hours ago</span>
                </div>
            </div>

            <!-- Single Candidate -->
            <div class="single-candidate-items mb-30">
                <div class="candidate-items">
                    <div class="candidate-img">
                        <a href="">
                            <img src="{{ asset('public/assets/img/banner/dog.png') }}" alt="Candidate Avatar">
                        </a>
                    </div>
                    <div class="candidate-tittle">
                        <a href="">
                            <h4>Maria Gonzalez</h4>
                        </a>
                        <ul>
                            <li><strong>Category:</strong> Digital Marketer</li>
                            <li><i class="fas fa-map-marker-alt"></i> Athens, Greece</li>
                            <li><strong>Experience:</strong> 5+ Years</li>
                        </ul>
                        <div class="candidate-details-extra">
                            <p><strong>Key Skills:</strong> PPC, Social Media Strategy, CRM Tools, Digital Advertising</p>
                            <p><strong>Availability:</strong> Within 3 Months</p>
                            <p><strong>Source:</strong> Referral</p>
                        </div>
                    </div>
                </div>
                <div class="items-link items-link2 f-right">
                    <a href="{{route('job.seeker.detail')}}">View Profile</a>
                    <span>Last Updated: 1 day ago</span>
                </div>
            </div>

            <!-- Single Candidate -->
            <div class="single-candidate-items mb-30">
                <div class="candidate-items">
                    <div class="candidate-img">
                        <a href="">
                            <img src="{{ asset('public/assets/img/banner/dog.png') }}" alt="Candidate Avatar">
                        </a>
                    </div>
                    <div class="candidate-tittle">
                        <a href="">
                            <h4>Rahul Sharma</h4>
                        </a>
                        <ul>
                            <li><strong>Category:</strong> Senior PHP/Laravel Backend Developer</li>
                            <li><i class="fas fa-map-marker-alt"></i> Lalitpur District, Nepal</li>
                            <li><strong>Experience:</strong> 2+ Years</li>
                        </ul>
                        <div class="candidate-details-extra">
                            <p><strong>Key Skills:</strong> PHP, Back-End Development, Laravel, REST APIs</p>
                            <p><strong>Availability:</strong> Immediate</p>
                            <p><strong>Source:</strong> Company Website</p>
                        </div>
                    </div>
                </div>
                <div class="items-link items-link2 f-right">
                    <a href="{{route('job.seeker.detail')}}">View Profile</a>
                    <span>Last Updated: 3 hours ago</span>
                </div>
            </div>
        </div>
    </main>
@endsection
