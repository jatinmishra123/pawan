<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>pawan pte</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {

            color: #333;
            line-height: 1.6;
            padding-top: 80px;
            /* Account for fixed header */
        }

        /* Course Banner */
        .course-banner {
            background: linear-gradient(135deg, rgba(26, 95, 122, 0.9) 0%, rgba(21, 152, 149, 0.85) 100%),
                url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            margin-bottom: 2rem;
            border-radius: 12px;
            position: relative;
            overflow: hidden;
        }

        .course-banner-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .banner-title {
            font-size: 2.8rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .banner-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .banner-features {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 2rem;
            margin-top: 2rem;
        }

        .banner-feature {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            background: rgba(255, 255, 255, 0.15);
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            backdrop-filter: blur(5px);
        }

        /* Main Content Styles */
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .course-header {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            background-image: linear-gradient(to right, #f8f9fa, white);
            border-left: 5px solid #159895;
        }

        .course-title {
            font-size: 2.2rem;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .course-description {
            color: #4a5568;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .course-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin: 1rem 0;
            color: #718096;
        }

        .course-meta div {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .rating {
            color: #f59e0b;
            font-weight: 600;
        }

        .course-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #1a5f7a 0%, #159895 100%);
            color: white;
        }

        .btn-primary:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #4a5568;
        }

        .btn-secondary:hover {
            background: #cbd5e0;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid #159895;
            color: #159895;
        }

        .btn-outline:hover {
            background: #159895;
            color: white;
        }

        /* Course Content */
        .course-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .main-content {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-size: 1.5rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .module {
            margin-bottom: 1.5rem;
            border-left: 3px solid #4299e1;
            padding-left: 1rem;
        }

        .module-title {
            font-size: 1.2rem;
            color: #2d3748;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .lessons {
            margin-left: 1rem;
        }

        .lesson {
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f7fafc;
            transition: all 0.3s ease;
        }

        .lesson:hover {
            background: #edf2f7;
        }

        .lesson-info {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .lesson-duration {
            color: #718096;
            font-size: 0.9rem;
        }

        /* Sidebar */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .instructor-card,
        .progress-card,
        .materials-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .instructor-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .instructor-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
        }

        .instructor-name {
            font-weight: 600;
            color: #2d3748;
            font-size: 1.2rem;
        }

        .instructor-title {
            color: #718096;
            font-size: 0.9rem;
        }

        .progress-bar {
            height: 10px;
            background: #e2e8f0;
            border-radius: 5px;
            margin: 1rem 0;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(135deg, #1a5f7a 0%, #159895 100%);
            border-radius: 5px;
            width: 65%;
        }

        .progress-text {
            text-align: center;
            color: #718096;
            font-size: 0.9rem;
        }

        .materials-list {
            list-style: none;
        }

        .materials-list li {
            padding: 0.8rem 0;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .materials-list li:last-child {
            border-bottom: none;
        }

        /* Testimonial Section */
        .testimonials {
            margin-top: 3rem;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .testimonial-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .testimonial-text {
            font-style: italic;
            color: #4a5568;
            margin-bottom: 1rem;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .testimonial-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .author-name {
            font-weight: 600;
            color: #2d3748;
        }

        .author-role {
            color: #718096;
            font-size: 0.8rem;
        }

        /* Responsive Design */
        @media (max-width: 900px) {
            .course-content {
                grid-template-columns: 1fr;
            }

            .course-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
                justify-content: center;
            }

            .banner-features {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
        }

        @media (max-width: 600px) {
            .course-meta {
                flex-direction: column;
                gap: 0.8rem;
            }

            .instructor-info {
                flex-direction: column;
                text-align: center;
            }

            .course-title {
                font-size: 1.8rem;
            }

            .banner-title {
                font-size: 2rem;
            }

            .banner-subtitle {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Include Header -->
    <?php include 'header.php'; ?>

    <!-- Course Banner -->
    <div class="container">
        <div class="course-banner">
            <div class="course-banner-content">
                <h1 class="banner-title">PTE Academic Mastery Course</h1>
                <p class="banner-subtitle">Achieve your desired score with our comprehensive PTE preparation course</p>
                <div class="course-actions">
                    <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Enroll Now</button>
                    <button class="btn btn-outline"><i class="fas fa-play-circle"></i> Preview Course</button>
                </div>

                <div class="banner-features">
                    <div class="banner-feature">
                        <i class="fas fa-certificate"></i>
                        <span>Certificate of Completion</span>
                    </div>
                    <div class="banner-feature">
                        <i class="fas fa-clock"></i>
                        <span>60+ Hours of Content</span>
                    </div>
                    <div class="banner-feature">
                        <i class="fas fa-user-tie"></i>
                        <span>Expert Instructors</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="course-header">
            <h1 class="course-title">PTE Academic Mastery Course</h1>
            <p class="course-description">Master the PTE Academic exam with our comprehensive course covering all
                sections: Speaking, Writing, Reading, and Listening. Achieve your desired score with expert guidance.
            </p>

            <div class="course-meta">
                <div><i class="fas fa-user-graduate"></i> <span>3,200+ students enrolled</span></div>
                <div><i class="fas fa-star rating"></i> <span>4.9 (980 reviews)</span></div>
                <div><i class="fas fa-clock"></i> <span>60 hours of content</span></div>
                <div><i class="fas fa-signal"></i> <span>All levels</span></div>
            </div>

            <div class="course-actions">
                <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Enroll Now</button>
                <button class="btn btn-secondary"><i class="fas fa-heart"></i> Add to Wishlist</button>
                <button class="btn btn-outline"><i class="fas fa-download"></i> Download Syllabus</button>
            </div>
        </div>

        <div class="course-content">
            <div class="main-content">
                <h2 class="section-title">Course Content</h2>

                <div class="module">
                    <h3 class="module-title"><i class="fas fa-microphone"></i> Speaking Section</h3>
                    <div class="lessons">
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Read Aloud Techniques</span>
                            </div>
                            <div class="lesson-duration">45 min</div>
                        </div>
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Repeat Sentence Strategies</span>
                            </div>
                            <div class="lesson-duration">35 min</div>
                        </div>
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Describe Image Mastery</span>
                            </div>
                            <div class="lesson-duration">50 min</div>
                        </div>
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Retell Lecture Methods</span>
                            </div>
                            <div class="lesson-duration">40 min</div>
                        </div>
                    </div>
                </div>

                <div class="module">
                    <h3 class="module-title"><i class="fas fa-pencil-alt"></i> Writing Section</h3>
                    <div class="lessons">
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Summarize Written Text</span>
                            </div>
                            <div class="lesson-duration">55 min</div>
                        </div>
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Essay Writing Structure</span>
                            </div>
                            <div class="lesson-duration">60 min</div>
                        </div>
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Grammar and Vocabulary</span>
                            </div>
                            <div class="lesson-duration">45 min</div>
                        </div>
                    </div>
                </div>

                <div class="module">
                    <h3 class="module-title"><i class="fas fa-book"></i> Reading Section</h3>
                    <div class="lessons">
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Multiple Choice Strategies</span>
                            </div>
                            <div class="lesson-duration">40 min</div>
                        </div>
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Re-order Paragraphs</span>
                            </div>
                            <div class="lesson-duration">50 min</div>
                        </div>
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Reading Fill in the Blanks</span>
                            </div>
                            <div class="lesson-duration">45 min</div>
                        </div>
                    </div>
                </div>

                <div class="module">
                    <h3 class="module-title"><i class="fas fa-headphones"></i> Listening Section</h3>
                    <div class="lessons">
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Summarize Spoken Text</span>
                            </div>
                            <div class="lesson-duration">50 min</div>
                        </div>
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Multiple Choice Answers</span>
                            </div>
                            <div class="lesson-duration">45 min</div>
                        </div>
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Fill in the Blanks</span>
                            </div>
                            <div class="lesson-duration">40 min</div>
                        </div>
                        <div class="lesson">
                            <div class="lesson-info">
                                <i class="fas fa-play-circle"></i>
                                <span>Highlight Correct Summary</span>
                            </div>
                            <div class="lesson-duration">35 min</div>
                        </div>
                    </div>
                </div>

                <div class="testimonials">
                    <h2 class="section-title">Student Testimonials</h2>
                    <div class="testimonial-grid">
                        <div class="testimonial-card">
                            <p class="testimonial-text">"This course helped me achieve my target score of 85! The
                                speaking section strategies were particularly helpful."</p>
                            <div class="testimonial-author">
                                <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Student"
                                    class="testimonial-avatar">
                                <div>
                                    <div class="author-name">Priya Sharma</div>
                                    <div class="author-role">Scored 86 in PTE</div>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-card">
                            <p class="testimonial-text">"The writing templates saved me so much time. I was able to
                                structure my essays perfectly thanks to this course."</p>
                            <div class="testimonial-author">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Student"
                                    class="testimonial-avatar">
                                <div>
                                    <div class="author-name">Rahul Verma</div>
                                    <div class="author-role">Scored 90 in PTE</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar">
                <div class="instructor-card">
                    <h3 class="section-title">Instructor</h3>
                    <div class="instructor-info">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Instructor"
                            class="instructor-avatar">
                        <div>
                            <h4 class="instructor-name">Dr. Anjali Patel</h4>
                            <p class="instructor-title">PTE Expert & Language Specialist</p>
                        </div>
                    </div>
                    <p>10+ years of experience teaching PTE and IELTS. Specialized in helping students achieve their
                        immigration and study abroad goals.</p>
                </div>

                <div class="progress-card">
                    <h3 class="section-title">Your Progress</h3>
                    <div class="progress-bar">
                        <div class="progress-fill"></div>
                    </div>
                    <p class="progress-text">Completed 8 of 15 modules (53%)</p>
                    <div class="course-actions">
                        <button class="btn btn-primary"><i class="fas fa-play"></i> Continue Learning</button>
                    </div>
                </div>

                <div class="materials-card">
                    <h3 class="section-title">Course Materials</h3>
                    <ul class="materials-list">
                        <li><i class="fas fa-file-pdf"></i> Complete Study Guide</li>
                        <li><i class="fas fa-file-audio"></i> Listening Practice Files</li>
                        <li><i class="fas fa-file-word"></i> Vocabulary Handbook</li>
                        <li><i class="fas fa-file-alt"></i> 5 Practice Tests</li>
                        <li><i class="fas fa-file-video"></i> Video Explanations</li>
                    </ul>
                </div>

                <div class="materials-card">
                    <h3 class="section-title">Upcoming Live Sessions</h3>
                    <ul class="materials-list">
                        <li><i class="fas fa-calendar"></i> Writing Workshop - Oct 15, 7 PM</li>
                        <li><i class="fas fa-calendar"></i> Speaking Practice - Oct 17, 6 PM</li>
                        <li><i class="fas fa-calendar"></i> Mock Test Review - Oct 20, 5 PM</li>
                    </ul>
                    <div class="course-actions">
                        <button class="btn btn-outline"><i class="fas fa-calendar-plus"></i> View Full Schedule</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

    <script>
        // Simple progress animation
        document.addEventListener('DOMContentLoaded', function () {
            const progressFill = document.querySelector('.progress-fill');
            progressFill.style.width = '0';
            setTimeout(() => {
                progressFill.style.transition = 'width 1s ease-in-out';
                progressFill.style.width = '65%';
            }, 500);
        });
    </script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>