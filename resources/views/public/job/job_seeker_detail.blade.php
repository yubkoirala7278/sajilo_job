@extends('public.layouts.master')

@section('custom-css')
    <style>
        .profile-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .profile-header h2 {
            font-size: 32px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .profile-header p {
            font-size: 16px;
            color: #7f8c8d;
        }

        .profile-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 30px;
        }

        .profile-avatar {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-avatar img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #3498db;
        }

        .profile-section {
            margin-bottom: 30px;
        }

        .profile-section h3 {
            font-size: 20px;
            color: #34495e;
            margin-bottom: 15px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }

        .profile-section p {
            font-size: 15px;
            color: #2c3e50;
            line-height: 1.6;
        }

        .profile-section ul {
            list-style: none;
            padding: 0;
        }

        .profile-section ul li {
            font-size: 15px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-tag {
            background: #ecf0f1;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            color: #34495e;
        }

        .experience-item,
        .education-item {
            margin-bottom: 20px;
        }

        .experience-item h4,
        .education-item h4 {
            font-size: 18px;
            color: #2980b9;
            margin-bottom: 5px;
        }

        .experience-item p,
        .education-item p {
            font-size: 14px;
            color: #7f8c8d;
        }

        .contact-btn {
            display: inline-block;
            background: #3498db;
            color: #fff;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .contact-btn:hover {
            background: #2980b9;
        }

        .profile-actions {
            text-align: center;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 10px;
            }

            .profile-avatar img {
                width: 100px;
                height: 100px;
            }

            .profile-header h2 {
                font-size: 24px;
            }
        }
    </style>
@endsection

@section('content')
    <main>
        <!-- Hero Area Start -->
        <div class="slider-area">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="{{ asset('public/assets/img/hero/about.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Candidate Profile</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->

        <!-- Profile Content -->
        <div class="profile-container">
            <div class="profile-header">
                <div class="profile-avatar">
                    <img src="{{ asset('public/assets/img/team/1.png') }}" alt="Candidate Avatar">
                </div>
                <h2>John Doe</h2>
                <p>Senior PHP/Laravel Backend Developer | Lalitpur District, Nepal</p>
            </div>

            <div class="profile-card">
                <!-- Professional Summary -->
                <div class="profile-section">
                    <h3>Professional Summary</h3>
                    <p>
                        A highly skilled Senior PHP/Laravel Backend Developer with over 4 years of experience in building
                        robust web applications. Proficient in designing RESTful APIs, optimizing database performance, and
                        implementing scalable solutions. Passionate about clean code and delivering high-quality projects on
                        time.
                    </p>
                </div>

                <!-- Key Skills -->
                <div class="profile-section">
                    <h3>Key Skills</h3>
                    <div class="skills-list">
                        <span class="skill-tag">PHP</span>
                        <span class="skill-tag">Laravel</span>
                        <span class="skill-tag">Bootstrap</span>
                        <span class="skill-tag">Ajax</span>
                        <span class="skill-tag">MySQL</span>
                        <span class="skill-tag">REST APIs</span>
                        <span class="skill-tag">Git</span>
                    </div>
                </div>

                <!-- Work Experience -->
                <div class="profile-section">
                    <h3>Work Experience</h3>
                    <div class="experience-item">
                        <h4>Senior Backend Developer - Genius Systems Pvt. Ltd</h4>
                        <p>June 2020 - Present | Lalitpur District, Nepal</p>
                        <ul>
                            <li>Developed and maintained Laravel-based web applications for various clients.</li>
                            <li>Optimized database queries, reducing load times by 30%.</li>
                            <li>Integrated third-party APIs and built custom RESTful services.</li>
                        </ul>
                    </div>
                    <div class="experience-item">
                        <h4>PHP Developer - Tech Innovate</h4>
                        <p>March 2018 - May 2020 | Kathmandu, Nepal</p>
                        <ul>
                            <li>Built dynamic websites using PHP and MySQL.</li>
                            <li>Collaborated with front-end developers to enhance user experience.</li>
                            <li>Implemented security best practices to protect against vulnerabilities.</li>
                        </ul>
                    </div>
                </div>

                <!-- Education -->
                <div class="profile-section">
                    <h3>Education</h3>
                    <div class="education-item">
                        <h4>Bachelor of Science in Computer Science</h4>
                        <p>Tribhuvan University | 2014 - 2018 | Kathmandu, Nepal</p>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="profile-section">
                    <h3>Additional Information</h3>
                    <ul>
                        <li><strong>Availability:</strong> Immediate</li>
                        <li><strong>Languages:</strong> English (Fluent), Nepali (Native)</li>
                        <li><strong>Certifications:</strong> Laravel Certification (2021), AWS Certified Developer (2022)
                        </li>
                        <li><strong>Portfolio:</strong> <a href="https://johndoeportfolio.com"
                                target="_blank" class="text-dark">johndoeportfolio.com</a></li>
                    </ul>
                </div>

                <!-- Contact Actions -->
                <div class="profile-actions">
                    <a href="" class="contact-btn">Contact Candidate</a>
                </div>
            </div>
        </div>
    </main>
@endsection
