<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Faculty Staff - NiceSchool Bootstrap Template</title>
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

  <!-- =======================================================
  * Template Name: NiceSchool
  * Template URL: https://bootstrapmade.com/nice-school-bootstrap-education-template/
  * Updated: May 10 2025 with Bootstrap v5.3.6
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="faculty-staff-page">
  <header id="header" class="header d-flex align-items-center fixed-top bg-light shadow-sm">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="index" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="logo" style="max-height:60px;">
      </a>
      <nav id="navmenu" class="navmenu text-bold">
        <ul class="d-flex list-unstyled mb-0 align-items-center">
          <li class="me-3"><a href="alumni" class="">Home</a></li>
          <li class="me-3">
            <a href="news.php" id="ptePracticeLink"><span>PTE Practice</span></a>
          </li>
          <li class="me-3"><a href="students-life.php">Course</a></li>
          <li class="me-3"><a href="news.php">Circle</a></li>
          <li class="me-3"><a href="alumni.php">Teacher Mode</a></li>
          <li class="me-3"><a href="login.php" class="active">Login</a></li>
          <li><a href="signup.php" class="btn-sm active">Sign Up</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-color:white;">
      <div class="container position-relative">
        <h1>Faculty Staff</h1>
        <p style="color:black;">
          Esse dolorum voluptatum ullam est sint nemo et est ipsa porro
          placeat quibusdam quia assumenda numquam molestias.
        </p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="alumni">Home</a></li>
            <li class="current">Faculty Staff</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- Faculty  Staff Section -->
    <section id="faculty--staff" class="faculty--staff section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row mb-5">
          <div class="col-lg-8 mx-auto">
            <div class="search-container" data-aos="fade-up" data-aos-delay="200">
              <div class="input-group">
                <input type="text" class="form-control"
                  placeholder="Search faculty &amp; staff by name, department, or expertise..." />
                <button class="btn search-btn" type="button">
                  <i class="bi bi-search"></i>
                </button>
              </div>
              <div class="filters mt-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="facultyFilter" checked="" />
                  <label class="form-check-label" for="facultyFilter">Faculty</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="staffFilter" checked="" />
                  <label class="form-check-label" for="staffFilter">Staff</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="researchFilter" checked="" />
                  <label class="form-check-label" for="researchFilter">Research</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="adminFilter" checked="" />
                  <label class="form-check-label" for="adminFilter">Administration</label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="departments-nav">
              <h4 class="departments-title">PAWAN PTE</h4>
              <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#faculty--staff-tab-1">
                    <i class="bi bi-house-door me-2"></i> Home
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#faculty--staff-tab-2">
                    <i class="bi bi-book me-2"></i> My Course
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#faculty--staff-tab-3">
                    <i class="bi bi-people me-2"></i> My Teacher
                  </button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#faculty--staff-tab-4">
                    <i class="bi bi-people me-2"></i> My Student
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#faculty--staff-tab-5">
                    <i class="bi bi-list-check me-2"></i> My Task
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#faculty--staff-tab-6">
                    <i class="bi bi-gear me-2"></i> Settings
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#faculty--staff-tab-7">
                    <i class="bi bi-gem me-2"></i> VIP Center
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#faculty--staff-tab-8">
                    <i class="bi bi-bell me-2"></i> Notification Center
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#faculty--staff-tab-9">
                    <i class="bi bi-question-circle me-2"></i> Help (Q&A)
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#faculty--staff-tab-10">
                    <i class="bi bi-envelope me-2"></i> Contact Us
                  </button>
                </li>

                <li class="nav-item">
                  <!-- Logout Button -->
                  <button class="nav-link" id="logoutBtn">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                  </button>

                  <script>
                    document.getElementById("logoutBtn").addEventListener("click", function () {
                      window.location.href = "index.php"; // सीधे logout.php पर redirect
                    });
                  </script>


                </li>
              </ul>

            </div>
          </div>

          <div class="col-lg-9" data-aos="fade-up" data-aos-delay="400">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="faculty--staff-tab-1">
                <!-- Slider Start -->
                <div id="departmentSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                  <!-- Indicators -->
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#departmentSlider" data-bs-slide-to="0"
                      class="active"></button>
                    <button type="button" data-bs-target="#departmentSlider" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#departmentSlider" data-bs-slide-to="2"></button>
                  </div>

                  <!-- Slides -->
                  <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                      <div class="department-info mb-4 text-center">
                        <img src="assets/img/education/ss.png" alt="Slide 1" class="d-block w-100">
                      </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                      <div class="department-info mb-4 text-center">
                        <img src="assets/img/education/ja.png" alt="Slide 2" class="d-block w-100">
                      </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                      <div class="department-info mb-4 text-center">
                        <img src="assets/img/education/ma.png" alt="Slide 3" class="d-block w-100">
                      </div>
                    </div>
                  </div>

                  <!-- Controls -->
                  <button class="carousel-control-prev" type="button" data-bs-target="#departmentSlider"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#departmentSlider"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </button>
                </div>


                <style>
                  * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'Poppins', sans-serif;
                  }

                  :root {
                    --primary: #3a86ff;
                    --secondary: #8338ec;
                    --accent: #ff006e;
                    --light: #f8f9fa;
                    --dark: #212529;
                    --gray: #6c757d;
                    --success: #28a745;
                    --warning: #ffc107;
                    --danger: #dc3545;
                  }

                  body {
                    background-color: #f5f7fb;
                    color: var(--dark);
                    padding: 20px;
                  }

                  .ant-row {
                    display: flex;
                    flex-wrap: wrap;
                    margin-left: -8px;
                    margin-right: -8px;
                  }

                  .ant-col {
                    padding-left: 8px;
                    padding-right: 8px;
                    margin-bottom: 16px;
                  }

                  .ant-col-xs-24,
                  .ant-col-sm-24,
                  .ant-col-md-24,
                  .ant-col-lg-12 {
                    flex: 0 0 100%;
                    max-width: 100%;
                  }

                  @media (min-width: 992px) {
                    .ant-col-lg-12 {
                      flex: 0 0 50%;
                      max-width: 50%;
                    }
                  }

                  h2 {
                    font-size: 1.5rem;
                    font-weight: 600;
                    margin-bottom: 16px;
                    color: var(--dark);
                  }

                  /* Card Styles */
                  .card {
                    background: white;
                    border-radius: 8px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.09);
                    overflow: hidden;
                    transition: all 0.3s;
                  }

                  .card:hover {
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                    transform: translateY(-2px);
                  }

                  .card-header {
                    background-color: #54D6F8;
                    color: white;
                    padding: 16px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    height: 56px;
                  }

                  .card-label {
                    background: rgba(255, 255, 255, 0.2);
                    padding: 4px 8px;
                    border-radius: 12px;
                    font-size: 0.75rem;
                  }

                  .card-body {
                    padding: 16px;
                    height: 138px;
                    display: flex;
                    align-items: center;
                  }

                  .stats-container {
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    width: 100%;
                    padding-bottom: 30px;
                  }

                  .stat-cell {
                    text-align: center;
                  }

                  .stat-score {
                    font-size: 1.5rem;
                    font-weight: 600;
                    margin-bottom: 4px;
                  }

                  .stat-name {
                    font-size: 0.875rem;
                    color: var(--gray);
                  }

                  .card-footer {
                    padding: 12px 16px;
                    border-top: 1px solid #f0f0f0;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    color: var(--primary);
                    font-weight: 500;
                  }

                  .card-footer i {
                    transition: transform 0.3s;
                  }

                  .card:hover .card-footer i {
                    transform: translateX(4px);
                  }

                  /* Upcoming Classes */
                  .upcoming-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 16px;
                  }

                  .upcoming-title {
                    font-size: 1.1rem;
                    font-weight: 600;
                    color: var(--dark);
                  }

                  .timezone {
                    display: flex;
                    align-items: center;
                    color: var(--gray);
                    font-size: 0.875rem;
                  }

                  .classes-container {
                    background: white;
                    border-radius: 8px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.09);
                    padding: 16px;
                    height: 194px;
                    overflow-y: auto;
                  }

                  .class-item {
                    display: flex;
                    padding: 12px 0;
                    border-bottom: 1px solid #f0f0f0;
                  }

                  .class-item:last-child {
                    border-bottom: none;
                  }

                  .class-date {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    margin-right: 12px;
                    min-width: 50px;
                  }

                  .class-month {
                    font-size: 0.75rem;
                    color: var(--gray);
                    text-transform: uppercase;
                  }

                  .class-day {
                    font-size: 1.25rem;
                    font-weight: 600;
                    color: var(--dark);
                  }

                  .class-details {
                    flex: 1;
                  }

                  .class-title {
                    font-weight: 500;
                    margin-bottom: 4px;
                    color: var(--dark);
                  }

                  .class-info {
                    display: flex;
                    align-items: center;
                    margin-bottom: 4px;
                    font-size: 0.875rem;
                  }

                  .class-time {
                    display: flex;
                    align-items: center;
                    color: var(--gray);
                    margin-right: 16px;
                  }

                  .class-time i {
                    margin-right: 4px;
                  }

                  .class-type {
                    display: flex;
                    align-items: center;
                    color: var(--gray);
                  }

                  .class-type i {
                    margin-right: 4px;
                  }

                  .class-action {
                    display: flex;
                    align-items: center;
                  }

                  .buy-btn {
                    background: var(--primary);
                    color: white;
                    padding: 4px 12px;
                    border-radius: 4px;
                    font-size: 0.75rem;
                    cursor: pointer;
                    transition: all 0.3s;
                  }

                  .buy-btn:hover {
                    background: #2a75ff;
                  }

                  /* Filter tabs */
                  .filter-tabs {
                    display: flex;
                    margin-top: 12px;
                  }

                  .filter-tab {
                    padding: 6px 12px;
                    margin-right: 8px;
                    border-radius: 16px;
                    font-size: 0.875rem;
                    cursor: pointer;
                    transition: all 0.3s;
                  }

                  .filter-tab.active {
                    background: var(--primary);
                    color: white;
                  }

                  .filter-tab:not(.active) {
                    background: #f0f0f0;
                    color: var(--gray);
                  }

                  .filter-tab:not(.active):hover {
                    background: #e0e0e0;
                  }

                  .more-tab {
                    display: flex;
                    align-items: center;
                    color: var(--primary);
                    font-size: 0.875rem;
                    cursor: pointer;
                  }

                  .more-tab i {
                    margin-left: 4px;
                    font-size: 0.75rem;
                  }

                  label.btn.btn-sm.btn-light.rounded-circle.position-absolute.shadow {
                    top: 66%;
                    right: 40%;
                  }

                  .position-relative.d-inline-block.mb-4 {
                    text-align: center !important;
                    width: 100%;
                  }

                  span#first_name-text,
                  span#email-text,
                  span#exam_type-text {
                    margin-right: 10px;
                  }
                </style>

                <div class="ant-row">
                  <!-- Study Stats Card -->
                  <div class="ant-col ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-12">
                    <h3>Study Stats</h3>
                    <a href="/pte/user_center/study_center?type=study">
                      <div class="card">
                        <div class="card-header">
                          Exam Date: 2025-08-30
                          <div class="card-label">1 Days left</div>
                        </div>
                        <div class="card-body">
                          <div class="stats-container">
                            <div class="stat-cell">
                              <div class="stat-score" style="color: #54D6F8;">73</div>
                              <div class="stat-name">Today Practiced</div>
                            </div>
                            <div class="stat-cell">
                              <div class="stat-score">17811</div>
                              <div class="stat-name">Total Practiced</div>
                            </div>
                            <div class="stat-cell">
                              <div class="stat-score">297</div>
                              <div class="stat-name">Prac. Days</div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          Study Centre <i class="fas fa-chevron-right"></i>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- Upcoming Classes -->
                  <div class="ant-col ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-12">
                    <div class="upcoming-header">
                      <div class="upcoming-title">Upcoming Classes</div>
                      <div class="timezone">
                        Timezone：Calcutta GMT +05:30
                        <i class="fas fa-pen" style="font-size: 6px; margin-left: 5px;"></i>
                      </div>
                    </div>

                    <div class="classes-container">
                      <!-- Class Item 1 -->
                      <div class="class-item">
                        <div class="class-date">
                          <div class="class-month">Aug</div>
                          <div class="class-day">29</div>
                        </div>
                        <div class="class-details">
                          <div class="class-title">Summarize Spoken Text</div>
                          <div class="class-info">
                            <div class="class-time">
                              <i class="far fa-clock"></i>
                              <span>Tomorrow 06:30-08:00</span>
                            </div>
                            <div class="class-type">
                              <i class="fas fa-chalkboard-teacher"></i>
                              <span>Live Class</span>
                            </div>
                          </div>
                        </div>
                        <div class="class-action">
                          <div class="buy-btn">Buy Course</div>
                        </div>
                      </div>

                      <!-- Class Item 2 -->
                      <div class="class-item">
                        <div class="class-date">
                          <div class="class-month">Aug</div>
                          <div class="class-day">29</div>
                        </div>
                        <div class="class-details">
                          <div class="class-title">Write Essay Lecture</div>
                          <div class="class-info">
                            <div class="class-time">
                              <i class="far fa-clock"></i>
                              <span>Tomorrow 10:00-11:00</span>
                            </div>
                            <div class="class-type">
                              <i class="fas fa-chalkboard-teacher"></i>
                              <span>Live Class</span>
                            </div>
                          </div>
                        </div>
                        <div class="class-action">
                          <div class="buy-btn">Buy Course</div>
                        </div>
                      </div>

                      <!-- Class Item 3 -->
                      <div class="class-item">
                        <div class="class-date">
                          <div class="class-month">Aug</div>
                          <div class="class-day">29</div>
                        </div>
                        <div class="class-details">
                          <div class="class-title">Summarize Written Text Lecture</div>
                          <div class="class-info">
                            <div class="class-time">
                              <i class="far fa-clock"></i>
                              <span>Tomorrow 13:30-15:00</span>
                            </div>
                            <div class="class-type">
                              <i class="fas fa-chalkboard-teacher"></i>
                              <span>Live Class</span>
                            </div>
                          </div>
                        </div>
                        <div class="class-action">
                          <div class="buy-btn">Buy Course</div>
                        </div>
                      </div>
                    </div>

                    <!-- Filter Tabs -->
                    <div class="filter-tabs">
                      <div class="filter-tab active">All</div>
                      <div class="filter-tab">Live Class</div>
                      <div class="filter-tab">Reading Course</div>
                      <div class="more-tab">
                        More <i class="fas fa-chevron-right"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                  // Simple interactivity for filter tabs
                  document.querySelectorAll('.filter-tab').forEach(tab => {
                    tab.addEventListener('click', function () {
                      document.querySelectorAll('.filter-tab').forEach(t => {
                        t.classList.remove('active');
                      });
                      this.classList.add('active');
                    });
                  });
                </script>
                <section class="my-4">
                  <h2 class="d-flex justify-content-between align-items-center" style=" margin-top:-50px;">
                    AI Study Tips
                    <a href="#" class="text-decoration-none" style="font-size:14px;">
                      Detail <i class="bi bi-arrow-right"></i>
                    </a>
                  </h2>

                  <div class="card shadow-sm p-4">
                    <div class="row">

                      <!-- Left Side Target -->
                      <div class="col-md-3 col-sm-12 text-center mb-3">
                        <img src="https://cdn-g.apeuni.com/public/web/distFolder/production/img/flag.71b20588.png"
                          alt="Target Flag" class="img-fluid mb-2" style="max-width:50px;">
                        <h4 class="mb-0">70</h4>
                        <small class="text-muted">Target</small>
                      </div>

                      <!-- Right Side Progress Bars -->
                      <div class="col-md-9 col-sm-12">

                        <!-- RA -->
                        <div class="mb-3">
                          <div class="d-flex justify-content-between">
                            <strong>RA</strong>
                            <span>My: 61% | Target: 76%</span>
                          </div>
                          <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 61%;"
                              aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>

                        <!-- RS -->
                        <div class="mb-3">
                          <div class="d-flex justify-content-between">
                            <strong>RS</strong>
                            <span>My: 70% | Target: 76%</span>
                          </div>
                          <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 70%;"
                              aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </section>
                <section class="my-4">
                  <h2 class="mb-3" style="margin-top: -60px;">PTE Guide Sections</h2>

                  <div class="row g-3">

                    <!-- PTE Guide -->
                    <div class="col-6 col-md-4 col-lg-2">
                      <a href="/pte/guide/blog/id/139/pte" class="text-decoration-none">
                        <div class="card text-center shadow-sm p-3 h-100">
                          <div class="mb-2">
                            <i class="bi bi-journal-bookmark-fill" style="font-size:42px; color:#ff6666;"></i>
                          </div>
                          <div><strong>PTE Guide</strong></div>
                        </div>
                      </a>
                    </div>

                    <!-- Speaking -->
                    <div class="col-6 col-md-4 col-lg-2">
                      <a href="/pte/guide/blog/id/125/speaking" class="text-decoration-none">
                        <div class="card text-center shadow-sm p-3 h-100">
                          <div class="mb-2">
                            <i class="bi bi-mic-fill" style="font-size:42px; color:#ffad66;"></i>
                          </div>
                          <div><strong>Speaking</strong></div>
                        </div>
                      </a>
                    </div>

                    <!-- Writing -->
                    <div class="col-6 col-md-4 col-lg-2">
                      <a href="/pte/guide/blog/id/133/writing" class="text-decoration-none">
                        <div class="card text-center shadow-sm p-3 h-100">
                          <div class="mb-2">
                            <i class="bi bi-pencil-square" style="font-size:42px; color:#ffd666;"></i>
                          </div>
                          <div><strong>Writing</strong></div>
                        </div>
                      </a>
                    </div>

                    <!-- Reading -->
                    <div class="col-6 col-md-4 col-lg-2">
                      <a href="/pte/guide/blog/id/119/reading" class="text-decoration-none">
                        <div class="card text-center shadow-sm p-3 h-100">
                          <div class="mb-2">
                            <i class="bi bi-book-half" style="font-size:42px; color:#45e4d3;"></i>
                          </div>
                          <div><strong>Reading</strong></div>
                        </div>
                      </a>
                    </div>

                    <!-- Listening -->
                    <div class="col-6 col-md-4 col-lg-2">
                      <a href="/pte/guide/blog/id/132/listening" class="text-decoration-none">
                        <div class="card text-center shadow-sm p-3 h-100">
                          <div class="mb-2">
                            <i class="bi bi-headphones" style="font-size:42px; color:#3eb2e3;"></i>
                          </div>
                          <div><strong>Listening</strong></div>
                        </div>
                      </a>
                    </div>

                    <!-- Materials -->
                    <div class="col-6 col-md-4 col-lg-2">
                      <a href="/pte/key_king_download?local=en" class="text-decoration-none">
                        <div class="card text-center shadow-sm p-3 h-100">
                          <div class="mb-2">
                            <i class="bi bi-download" style="font-size:42px; color:#6885e9;"></i>
                          </div>
                          <div><strong>Materials</strong></div>
                        </div>
                      </a>
                    </div>

                  </div>
                </section>
                <section class="my-4">
                  <h2 class="mb-3" style="margin-top:-60px;">Events & Activities</h2>

                  <div class="row g-3">

                    <!-- Item 1 -->
                    <div class="col-12 col-md-6">
                      <a href="#" rel="noopener noreferrer">
                        <div class="card shadow-sm h-100">
                          <img src="https://dl26yht2ovo33.cloudfront.net/public/images/banner/web_houkaoshi_en.png"
                            alt="Event Banner 1" class="card-img-top">
                        </div>
                      </a>
                    </div>

                    <!-- Item 2 -->
                    <div class="col-12 col-md-6">
                      <a href="#" rel="noopener noreferrer">
                        <div class="card shadow-sm h-100">
                          <img
                            src="https://dl26yht2ovo33.cloudfront.net/public/admin/app/events/1web_en_events_join_group.png"
                            alt="Event Banner 2" class="card-img-top">
                        </div>
                      </a>
                    </div>

                    <!-- Item 3 -->
                    <div class="col-12 col-md-6">
                      <a href="#" rel="noopener noreferrer">
                        <div class="card shadow-sm h-100">
                          <img
                            src="https://dl26yht2ovo33.cloudfront.net/public/images/home_event/unlimited_event_240626.png"
                            alt="Unlimited Event" class="card-img-top">
                        </div>
                      </a>
                    </div>

                    <!-- Item 4 -->
                    <div class="col-12 col-md-6">
                      <a href="#" rel="noopener noreferrer">
                        <div class="card shadow-sm h-100">
                          <img
                            src="https://dl26yht2ovo33.cloudfront.net/public/admin/blog/reading_course_en_20210926.png"
                            alt="Reading Course" class="card-img-top">
                        </div>
                      </a>
                    </div>

                    <!-- Item 5 -->
                    <div class="col-12 col-md-6">
                      <a href="#" rel="noopener noreferrer">
                        <div class="card shadow-sm h-100">
                          <img
                            src="https://dl26yht2ovo33.cloudfront.net/public/images/blog/20231121_anniu_ai_analysis.png"
                            alt="AI Analysis" class="card-img-top">
                        </div>
                      </a>
                    </div>

                    <!-- Item 6 -->
                    <div class="col-12 col-md-6">
                      <a href="#" rel="noopener noreferrer">
                        <div class="card shadow-sm h-100">
                          <img
                            src="https://dl26yht2ovo33.cloudfront.net/public/images/banner/%E7%94%BB%E6%9D%BF%20%E2%80%93%2072.png"
                            alt="Event Banner 6" class="card-img-top">
                        </div>
                      </a>
                    </div>

                    <!-- Item 7 -->
                    <div class="col-12 col-md-6">
                      <a href="#" rel="noopener noreferrer">
                        <div class="card shadow-sm h-100">
                          <img
                            src="https://dl26yht2ovo33.cloudfront.net/public/images/popup/20231222_home_event_fib_class_version.png"
                            alt="FIB Class Version" class="card-img-top">
                        </div>
                      </a>
                    </div>

                  </div>
                </section>
              </div>
              <div class="tab-pane fade" id="faculty--staff-tab-2">
                <div class="department-info mb-4">
                  <h2 class="mb-3" style="margin-top:-60px;">Courses</h2>

                </div>
                <div class="row g-4">

                  <!-- Course 1 -->
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                      <img
                        src="https://dl26yht2ovo33.cloudfront.net/public/images/course/20241015_cours_vip%20_class.png"
                        class="card-img-top" alt="Writing - Grammar Training">
                      <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Writing - Grammar Training</h5>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                          <!-- Active -->

                          <a href="#" class="btn btn-info btn-sm d-flex align-items-center">
                            Study Now <i class="bi bi-arrow-right ms-1"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Course 2 -->
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                      <img
                        src="https://dl26yht2ovo33.cloudfront.net/public/images/course/20241015_cours_vip%20_class.png"
                        class="card-img-top" alt="PTE APEUni VIP Video Course">
                      <div class="card-body d-flex flex-column">
                        <h5 class="card-title">PTE APEUni VIP Video Course</h5>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                          <a href="#" class="btn btn-info btn-sm d-flex align-items-center">
                            Study Now <i class="bi bi-arrow-right ms-1"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Course 3 -->
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                      <img src="https://dl26yht2ovo33.cloudfront.net/public/images/course/unlimited_live_class.png"
                        class="card-img-top" alt="Unlimited PTE Live Classes">
                      <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Unlimited PTE Live Classes</h5>
                        <div class="d-flex justify-content-between align-items-center mt-auto">

                          <a href="#" class="btn btn-danger btn-sm d-flex align-items-center">
                            Study Now <i class="bi bi-arrow-right ms-1"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Course 4 -->
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                      <img src="https://dl26yht2ovo33.cloudfront.net/public/images/course/fib_r_en.png"
                        class="card-img-top" alt="FIB-R English Videos">
                      <div class="card-body d-flex flex-column">
                        <h5 class="card-title">【APEUni】FIB-R English Videos</h5>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                          <a href="#" class="btn btn-danger btn-sm d-flex align-items-center">
                            Study Now <i class="bi bi-arrow-right ms-1"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Course 5 -->
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                      <img src="https://dl26yht2ovo33.cloudfront.net/public/images/course/fib_rw_en.png"
                        class="card-img-top" alt="FIB-RW English Videos">
                      <div class="card-body d-flex flex-column">
                        <h5 class="card-title">【APEUni】FIB-RW English Videos</h5>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                          <div class="d-flex justify-content-between align-items-center">
                            <!-- Left side text -->

                            <!-- Right side button -->
                            <a href="#" class="btn btn-danger btn-sm d-flex align-items-center ">
                              Study Now <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- </section> -->
              <div class="tab-pane fade" id="faculty--staff-tab-3">
                <div class="department-info mb-4">
                  <h3>Physics Department</h3>
                  <p>
                    Phasellus leo dolor, tempus non, auctor et, hendrerit
                    quis, nisi. Phasellus nec sem in justo pellentesque
                    facilisis. Etiam imperdiet imperdiet orci.
                  </p>
                </div>
                <div class="row g-4">
                  <div class="col-md-6 col-lg-4">
                    <div class="faculty-card">
                      <div class="faculty-image">
                        <img src="assets/img/person/person-m-9.webp" class="img-fluid" alt="Faculty Member" />
                      </div>
                      <div class="faculty-info">
                        <h4>Dr. Neil Armstrong</h4>
                        <p class="faculty-title">
                          Department Chair, Professor
                        </p>
                        <div class="faculty-specialties">
                          <span>Quantum Physics</span>
                          <span>Astrophysics</span>
                        </div>
                        <div class="faculty-contact">
                          <a href="mailto:narmstrong@example.com"><i class="bi bi-envelope"></i> Email</a>
                          <a href="#" class="profile-link"><i class="bi bi-person"></i> Profile</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="faculty--staff-tab-4">
                <div class="department-info mb-4">

                </div>
              </div>
              <script>
                async function loadMockTests() {
                  const res = await fetch("api/get_tests.php");
                  const tests = await res.json();
                  const row = document.getElementById("mockTestsRow");
                  row.innerHTML = "";

                  tests.forEach(t => {
                    row.innerHTML += `
      <div class="col-md-6 col-lg-4">
        <div class="faculty-card" onclick="window.location='news.php?id=${t.id}'">
          <div class="faculty-image">
            <img src="${t.image || 'assets/img/education/default.png'}" class="img-fluid" alt="${t.title}" />
          </div>
          <div class="faculty-info p-2">
            <h4>${t.title}</h4>
            <p>${t.description || ''}</p>
          </div>
        </div>
      </div>
    `;
                  });
                }
                loadMockTests();
              </script>

              <div class="tab-pane fade" id="faculty--staff-tab-5">
                <div id="deptCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                  <div class="carousel-inner rounded shadow">
                    <div class="carousel-item active">
                      <img src="assets/img/education/ja.png" class="d-block w-100" alt="Chemistry Lab">

                    </div>
                    <div class="carousel-item">
                      <img src="assets/img/education/test.png" class="d-block w-100" alt="Research Team">

                    </div>
                    <div class="carousel-item">
                      <img src="assets/img/education/testq.png" class="d-block w-100" alt="Students in Lab">

                    </div>
                  </div>
                  <!-- controls -->
                  <button class="carousel-control-prev" type="button" data-bs-target="#deptCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#deptCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </button>
                </div>

                <div class="row g-4">
                  <div class="col-md-6 col-lg-4">
                    <div class="faculty-card">
                      <div class="faculty-image">
                        <img src="assets/img/education/ja.png" class="img-fluid" alt="Faculty Member" />
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="faculty--staff-tab-6">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

                <div class="container py-5 ">

                  <!-- Profile Form (for both image + text fields) -->
                  <form action="alumni.php" method="POST" enctype="multipart/form-data" class="mx-auto"
                    style="max-width:600px;">

                    <!-- Avatar -->
                    <div class="position-relative d-inline-block mb-4">
                      <?php
                      $profileImage = !empty($user['profile_image'])
                        ? "assets/img/person/" . $user['profile_image']
                        : "https://via.placeholder.com/120";
                      ?>
                      <img src="<?php echo $profileImage; ?>" class="rounded-circle border shadow-sm"
                        alt="Profile Picture" id="profile-pic" style="width:90px; height:90px;">

                      <label class="btn btn-sm btn-light rounded-circle position-absolute shadow" for="upload-img">
                        <i class="bi bi-camera-fill text-primary"></i>
                      </label>

                      <!-- File Input -->
                      <input type="file" id="upload-img" name="profile_image" accept="image/*" hidden
                        onchange="previewImage(event)">
                    </div>

                    <!-- Profile Info -->
                    <div class="row py-2 border-bottom" id="nickname-row">
                      <div class="col-4 fw-semibold">Name:</div>
                      <div class="col d-flex">
                        <span
                          id="first_name-text"><?php echo htmlspecialchars($user['first_name'] ?? 'Not set'); ?></span>
                        <i class="bi bi-pencil text-secondary" style="cursor:pointer;"
                          onclick="editField('first_name','text')"></i>
                      </div>
                    </div>

                    <div class="row py-2 border-bottom" id="email-row">
                      <div class="col-4 fw-semibold">E-mail:</div>
                      <div class="col d-flex">
                        <span id="email-text"><?php echo htmlspecialchars($user['email'] ?? 'Not set'); ?></span>
                        <i class="bi bi-pencil text-secondary" style="cursor:pointer;"
                          onclick="editField('email','email')"></i>
                      </div>
                    </div>
                    <div class="row py-2 border-bottom" id="email-row">
                      <div class="col-4 fw-semibold">Desigation:</div>
                      <div class="col d-flex">
                        <span id="email-text"><?php echo htmlspecialchars($user['user_type'] ?? 'Not set'); ?></span>
                        <i class=" text-secondary" style="cursor:pointer;"
                          onclick="editField('user_type','user_type')"></i>
                      </div>
                    </div>
                    <div class="row py-2 border-bottom" id="exam-row">
                      <div class="col-4 fw-semibold">Exam Type</div>
                      <div class="col d-flex">
                        <span
                          id="exam_type-text"><?php echo htmlspecialchars($user['exam_type'] ?? 'Not set'); ?></span>
                        <i class="bi bi-pencil text-secondary" style="cursor:pointer;"
                          onclick="editDropdown('exam_type',['PTE Academic / UKVI','IELTS','TOEFL'])"></i>
                      </div>
                    </div>

                    <div class="row py-2 border-bottom" id="created_at-row">
                      <div class="col-4 fw-semibold">Created Time:</div>
                      <div class="col d-flex">
                        <span
                          id="created_at-text"><?php echo htmlspecialchars($user['created_at'] ?? 'Not set'); ?></span>
                      </div>
                    </div>

                    <div class="row py-2 border-bottom">
                      <div class="col-4 fw-semibold">UUID</div>
                      <div class="col"><?php echo htmlspecialchars($user['uuid'] ?? 'Not available'); ?></div>
                    </div>

                    <div class="row py-2 border-bottom" id="updated_at-row">
                      <div class="col-4 fw-semibold">Updated Profile:</div>
                      <div class="col d-flex ">
                        <span
                          id="updated_at-text"><?php echo htmlspecialchars($user['updated_at'] ?? 'Not set'); ?></span>
                      </div>
                    </div>

                    <!-- Hidden fields for submission -->
                    <input type="hidden" name="first_name" id="first_name-input-hidden"
                      value="<?php echo htmlspecialchars($user['first_name'] ?? ''); ?>">
                    <input type="hidden" name="email" id="email-input-hidden"
                      value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>">
                    <input type="hidden" name="exam_type" id="exam_type-input-hidden"
                      value="<?php echo htmlspecialchars($user['exam_type'] ?? ''); ?>">

                    <!-- Submit -->
                    <div class="row mt-4">
                      <div class="col text-center">
                        <button type="submit" class="btn btn-outline-info">Save Changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <script>
                // ========================
                // Profile Image Preview + Auto Upload
                // ========================
                function previewImage(event) {
                  const file = event.target.files[0];
                  if (!file) return;

                  // Preview
                  const reader = new FileReader();
                  reader.onload = function () {
                    document.getElementById("profile-pic").src = reader.result;
                  };
                  reader.readAsDataURL(file);

                  // Upload to server
                  let formData = new FormData();
                  formData.append("profile_image", file);

                  fetch("profile_update.php", {
                    method: "POST",
                    body: formData
                  })
                    .then(res => res.json())
                    .then(data => {
                      if (data.status === "success") {
                        console.log("✅ Profile image updated!");
                      } else {
                        alert("Image update failed: " + data.msg);
                      }
                    })
                    .catch(err => console.error("Error:", err));
                }

                // ========================
                // Edit text/email field
                // ========================
                function editField(field, type = 'text') {
                  let row = document.getElementById(field + "-row");
                  let span = document.getElementById(field + "-text");
                  let oldValue = span.innerText;

                  row.querySelector(".col.d-flex").innerHTML = `
                    <input type="${type}" class="form-control form-control-sm w-auto d-inline-block" id="${field}-input" value="${oldValue}">
                    <div>
                      <button type="button" class="btn btn-sm btn-success" onclick="saveField('${field}')"><i class="bi bi-check"></i></button>
                      <button type="button" class="btn btn-sm btn-danger" onclick="cancelField('${field}','${oldValue}')"><i class="bi bi-x"></i></button>
                    </div>
                  `;
                }

                // ========================
                // Edit dropdown field
                // ========================
                function editDropdown(field, options) {
                  let row = document.getElementById(field + "-row");
                  let span = document.getElementById(field + "-text");
                  let oldValue = span.innerText;

                  let optionsHTML = options.map(opt => `<option ${opt === oldValue ? 'selected' : ''}>${opt}</option>`).join('');

                  row.querySelector(".col.d-flex").innerHTML = `
                <select id="${field}-input" class="form-select form-select-sm w-auto">${optionsHTML}</select>
                <div>
                  <button type="button" class="btn btn-sm btn-success" onclick="saveField('${field}')"><i class="bi bi-check"></i></button>
                  <button type="button" class="btn btn-sm btn-danger" onclick="cancelField('${field}','${oldValue}')"><i class="bi bi-x"></i></button>
                </div>
              `;
                }

                // ========================
                // Save field
                // ========================
                function saveField(field) {
                  let input = document.getElementById(field + "-input");
                  let newValue = input.value;

                  // Update hidden field
                  document.getElementById(field + "-input-hidden").value = newValue;

                  let icon = (field === "community") ? "arrow-right" : "pencil";
                  document.getElementById(field + "-row").querySelector(".col.d-flex").innerHTML = `
                  <span id="${field}-text">${newValue}</span>
                  <i class="bi bi-${icon} text-secondary" style="cursor:pointer;" onclick="editFieldOrDropdown('${field}')"></i>
                `;
                }

                // ========================
                // Cancel field edit
                // ========================
                function cancelField(field, oldValue) {
                  let icon = (field === "community") ? "arrow-right" : "pencil";
                  document.getElementById(field + "-row").querySelector(".col.d-flex").innerHTML = `
                    <span id="${field}-text">${oldValue}</span>
                    <i class="bi bi-${icon} text-secondary" style="cursor:pointer;" onclick="editFieldOrDropdown('${field}')"></i>
                    `;
                }

                // ========================
                // Decide edit type
                // ========================
                function editFieldOrDropdown(field) {
                  if (field === "community") {
                    editDropdown('community', ['India', 'USA', 'UK', 'Canada', 'Australia']);
                  } else if (field === "exam") {
                    editDropdown('exam', ['PTE Academic / UKVI', 'IELTS', 'TOEFL']);
                  } else if (field === "timezone") {
                    editDropdown('timezone', ['Calcutta GMT +05:30', 'London GMT 0', 'New York GMT -05:00', 'Sydney GMT +10:00']);
                  } else if (field === "email") {
                    editField('email', 'email');
                  } else {
                    editField(field, 'text');
                  }
                }
              </script>
              <div class="tab-pane fade" id="faculty--staff-tab-7">
                <div class="department-info mb-4">

                </div>
              </div>
              <div class="tab-pane fade" id="faculty--staff-tab-8">
                <div class="department-info mb-4">
                  <style>
                    /* Container */
                    .notification-container {
                      max-width: 800px;
                      margin: 30px auto;
                      background: #fff;
                      border-radius: 10px;
                      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
                      padding: 20px;
                      font-family: Arial, sans-serif;
                    }

                    /* Section title with background */
                    .notification-header {
                      position: relative;
                      text-align: center;
                      margin-bottom: 30px;
                    }

                    .notification-header .bg-title {
                      font-size: 70px;
                      font-weight: 800;
                      color: rgba(0, 200, 200, 0.15);
                      text-transform: uppercase;
                      display: block;
                    }

                    .notification-header .main-title {
                      position: absolute;
                      top: 50%;
                      left: 50%;
                      transform: translate(-50%, -50%);
                      font-size: 28px;
                      font-weight: 700;
                      color: #222;
                    }

                    /* List */
                    .notification-list {
                      list-style: none;
                      padding: 0;
                      margin: 0;
                    }

                    .notification-item {
                      padding: 15px;
                      border-bottom: 1px solid #eee;
                    }

                    .notification-item:last-child {
                      border-bottom: none;
                    }

                    .notification-item h4 {
                      margin: 0 0 5px;
                      font-size: 18px;
                      color: #222;
                    }

                    .notification-item p {
                      margin: 0;
                      font-size: 15px;
                      color: #666;
                    }

                    /* Pagination */
                    .pagination {
                      display: flex;
                      justify-content: center;
                      margin-top: 20px;
                      gap: 5px;
                    }

                    .pagination button {
                      border: 1px solid #ccc;
                      background: #fff;
                      padding: 6px 12px;
                      border-radius: 5px;
                      cursor: pointer;
                      transition: all 0.3s;
                    }

                    .pagination button:hover {
                      background: #00b8b8;
                      color: #fff;
                      border-color: #00b8b8;
                    }

                    .pagination button:disabled {
                      background: #f1f1f1;
                      cursor: not-allowed;
                      color: #aaa;
                    }

                    /* Responsive */
                    @media(max-width: 600px) {
                      .notification-header .bg-title {
                        font-size: 50px;
                      }

                      .notification-header .main-title {
                        font-size: 22px;
                      }

                      .notification-item h4 {
                        font-size: 16px;
                      }

                      .notification-item p {
                        font-size: 14px;
                      }
                    }
                  </style>

                  <h2 class="main-title">Notification Centre</h2>
                  <div role="tab" aria-disabled="false" aria-selected="true" class="ant-tabs-tab-active ant-tabs-tab">
                    Comments</div>
                  <div class="notification-container">

                    <!-- Notification List -->
                    <ul class="notification-list" id="notificationList">
                      <!-- JS will load data here -->
                    </ul>

                    <!-- Pagination -->
                    <div class="pagination">
                      <button id="prevBtn">&lt;</button>
                      <span id="pageNumber">1</span>
                      <button id="nextBtn">&gt;</button>
                    </div>

                  </div>

                  <script>
                    // Static data
                    const notifications = [
                      { title: "New Comment", text: "User John commented on your post." },
                      { title: "New Like", text: "Anna liked your photo." },
                      { title: "Update", text: "System maintenance scheduled at 10 PM." },
                      { title: "New Follower", text: "Michael started following you." },
                      { title: "Reminder", text: "Your subscription will expire soon." },
                      { title: "Alert", text: "Unusual login attempt detected." },
                      { title: "Message", text: "You have a new private message." },
                      { title: "News", text: "New features added to your dashboard." },
                      { title: "Invite", text: "You are invited to join a new group." },
                      { title: "Offer", text: "Special discount available for you!" }
                    ];

                    const perPage = 5;
                    let currentPage = 1;

                    function renderNotifications() {
                      const list = document.getElementById("notificationList");
                      list.innerHTML = "";

                      const start = (currentPage - 1) * perPage;
                      const end = start + perPage;
                      const pageData = notifications.slice(start, end);

                      if (pageData.length === 0) {
                        list.innerHTML = `<li class="notification-item"><p>No Data</p></li>`;
                      } else {
                        pageData.forEach(n => {
                          list.innerHTML += `
                          <li class="notification-item">
                            <h4>${n.title}</h4>
                            <p>${n.text}</p>
                          </li>
                        `;
                        });
                      }

                      document.getElementById("pageNumber").textContent = currentPage;

                      document.getElementById("prevBtn").disabled = currentPage === 1;
                      document.getElementById("nextBtn").disabled = end >= notifications.length;
                    }

                    document.getElementById("prevBtn").addEventListener("click", () => {
                      if (currentPage > 1) {
                        currentPage--;
                        renderNotifications();
                      }
                    });

                    document.getElementById("nextBtn").addEventListener("click", () => {
                      if (currentPage * perPage < notifications.length) {
                        currentPage++;
                        renderNotifications();
                      }
                    });

                    // Initial load
                    renderNotifications();
                  </script>
                </div>
              </div>
              <div class="tab-pane fade" id="faculty--staff-tab-9">
                <div class="department-info mb-4">
                  <h3>Help (Q & A)</h3>
                  <p class="text-muted">
                    Find answers to the most common questions below. Click on a question to expand the answer.
                  </p>

                  <!-- Bootstrap Accordion -->
                  <div class="accordion" id="faqAccordion">
                    <!-- Question 1 -->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          How can I reset my password?
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                          You can reset your password by clicking on the <strong>"Forgot Password"</strong> link
                          on the login page and following the instructions sent to your registered email.
                        </div>
                      </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Where can I contact support?
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                          You can reach our support team at <a href="mailto:support@example.com">support@example.com</a>
                          or call us at <strong>+91 98765 43210</strong>.
                        </div>
                      </div>
                    </div>

                    <!-- Question 3 -->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          How do I update my profile information?
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                          Go to the <strong>Profile</strong> section in your dashboard and update your
                          information. Don’t forget to click <em>Save</em> after making changes.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="faculty--staff-tab-10">
                <div class="department-info mb-4">
                  <h3>Contact Us</h3>
                  <style>
                    /* Container */
                    .contact-container {
                      text-align: center;
                      padding: 40px 20px;
                      max-width: 800px;
                      margin: 0 auto;
                    }

                    /* Header with background text */
                    .contact-header {
                      position: relative;
                      margin-bottom: 40px;
                    }

                    .contact-header .contact-bg {
                      font-size: 50px;
                      font-weight: 800;
                      color: rgba(0, 200, 200, 0.15);
                      text-transform: uppercase;
                      display: block;
                    }

                    a {
                      text-decoration: none !important;

                    }

                    .contact-header .contact-title {
                      position: absolute;
                      top: 50%;
                      left: 50%;
                      transform: translate(-50%, -50%);
                      font-size: 25px;
                      font-weight: 700;
                      color: #222;
                    }

                    /* Contact Info */
                    .contact-info {
                      display: flex;
                      flex-direction: column;
                      gap: 30px;
                      text-align: left;
                    }

                    .contact-item h4 {
                      font-size: 20px;
                      font-weight: 600;
                      margin-bottom: 5px;
                      position: relative;
                      display: inline-block;
                    }

                    .contact-item h4::after {
                      content: "";
                      display: block;
                      width: 40px;
                      height: 2px;
                      background: #00b8b8;
                      margin-top: 5px;
                    }

                    .contact-item p {
                      margin: 5px 0 0;
                      font-size: 16px;
                      color: #444;
                    }

                    .contact-item a {
                      color: #00a0a0;
                      text-decoration: none;
                    }

                    .contact-item a:hover {
                      text-decoration: underline;
                    }

                    /* Responsive */
                    @media (max-width: 768px) {
                      .contact-header .contact-bg {
                        font-size: 50px;
                      }

                      .contact-header .contact-title {
                        font-size: 22px;
                      }

                      .contact-item h4 {
                        font-size: 18px;
                      }
                    }
                  </style>
                  <div id="contact-section" class="contact-container">

                    <!-- Section Title -->
                    <div class="contact-header">
                      <span class="contact-bg">CONTACT</span>
                      <h2 class="contact-title">Contact Us</h2>
                    </div>

                    <!-- Contact Details -->
                    <div class="contact-info">

                      <div class="contact-item">
                        <h4>Email</h4>
                        <p><a href="mailto:support@apeuni.com">support@apeuni.com</a></p>
                      </div>

                      <div class="contact-item">
                        <h4>Telegram Group</h4>
                        <p><a href="https://t.me/pteapeuni" target="_blank">https://t.me/pteapeuni</a></p>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Faculty  Staff Section -->
  </main>

  <?php include "footer.php" ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>



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