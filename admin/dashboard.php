<?php
session_start();

// Agar user login nahi hai to login page par bhej do
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>




<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Admin Dashboard - Pawan PTE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logo.webp">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom Dashboard Styles -->
    <style>
        :root {
            --primary: #629db1ff;
            --secondary: #858796;
            --success: #1cc88a;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --light: #f8f9fc;
            --dark: #5a5c69;
        }

        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary) 10%, #31a6b3ff 100%);
            color: white;
            position: fixed;
            width: 250px;
            z-index: 100;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .sidebar-brand {
            height: 70px;
            padding: 1.5rem 1rem;
            font-size: 1.2rem;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.05rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-nav {
            padding-top: 1rem;
        }

        .sidebar-item {
            position: relative;
            padding: 0.75rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.15s;
            display: block;
            text-decoration: none;
        }

        .sidebar-item:hover,
        .sidebar-item.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
            text-decoration: none;
        }

        .sidebar-item i {
            margin-right: 0.5rem;
            width: 20px;
            text-align: center;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
        }

        .topbar {
            height: 70px;
            background-color: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin-bottom: 20px;
            padding: 0 20px;
            border-radius: 10px;
        }

        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            margin-bottom: 1.5rem;
        }

        .dashboard-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
        }

        .stat-card.primary {
            background: linear-gradient(135deg, var(--primary) 0%, #224abe 100%);
        }

        .stat-card.success {
            background: linear-gradient(135deg, var(--success) 0%, #13855c 100%);
        }

        .stat-card.info {
            background: linear-gradient(135deg, var(--info) 0%, #2a96a5 100%);
        }

        .stat-card.warning {
            background: linear-gradient(135deg, var(--warning) 0%, #c99a0b 100%);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            clip-path: polygon(0 0, 100% 0, 100% 30%, 0 70%);
        }

        .stat-icon {
            position: relative;
            z-index: 2;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .welcome-banner {
            background: linear-gradient(135deg, #c7d347 0%, #9d92a8 100%);
            color: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .welcome-banner h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .welcome-banner p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .chart-container {
            position: relative;
            height: 300px;
        }

        .progress-ring {
            width: 120px;
            height: 120px;
        }

        .progress-ring-circle {
            stroke: #e9ecef;
            stroke-width: 8;
            fill: transparent;
        }

        .progress-ring-progress {
            stroke: #667eea;
            stroke-width: 8;
            fill: transparent;
            stroke-linecap: round;
            transition: stroke-dasharray 0.5s ease;
        }

        .user-avatar {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .recent-item {
            border-left: 3px solid transparent;
            transition: all 0.15s;
        }

        .recent-item:hover {
            border-left-color: var(--primary);
            background-color: #f8f9fc;
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .welcome-banner h2 {
                font-size: 2rem;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar {
                display: none;
            }
        }

        .nav-tabs .nav-link {
            border: none;
            border-bottom: 3px solid transparent;
            color: #495057;
            font-weight: 500;
            padding: 12px 20px;
        }

        .nav-tabs .nav-link.active {
            border-bottom-color: #d1e4deff;
            color: #9397a7ff;
            background: transparent;
        }

        .nav-tabs .nav-link:hover {
            border-bottom-color: #dee2e6;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img src=".\uploads\logo.png" alt="Pawan PTE" height="120" class="me-2"
            style="margin-bottom:-40px; margin-top:-20px; margin-left:20px">
        <hr>

        <div class="sidebar-nav">
            <a href="dashoard" class="sidebar-item active">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="users" class="sidebar-item">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span>
            </a>
            <a href="course" class="sidebar-item">
                <i class="fas fa-fw fa-book"></i>
                <span>Courses</span>
            </a>
            <a href="study_materials" class="sidebar-item">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Study Materials</span>
            </a>
            <a href="enrollments" class="sidebar-item">
                <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Enrollments</span>
            </a>
            <a href="#" class="sidebar-item">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Reports</span>
            </a>
            <a href="#" class="sidebar-item">
                <i class="fas fa-fw fa-cog"></i>
                <span>Settings</span>
            </a>
            <a href="logout" class="sidebar-item">
                <i class="fas fa-fw fa-cog"></i>
                <span> Logout </span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Dashboard</h4>
            <div class="d-flex align-items-center">
                <div class="dropdown me-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="notificationsDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge bg-danger">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                        <li><a class="dropdown-item" href="#">New user registered</a></li>
                        <li><a class="dropdown-item" href="#">Course enrollment</a></li>
                        <li><a class="dropdown-item" href="#">Mock test completed</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn d-flex align-items-center" type="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=random"
                            class="user-avatar me-2">
                        <span>Admin User</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2>Welcome back, Admin! 👋</h2>
                    <p>Here's what's happening with Pawan PTE today</p>
                    <div class="d-flex gap-3 mt-3">
                        <div class="text-center">
                            <h4 class="mb-0">8</h4>
                            <small>Total Users</small>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">2</h4>
                            <small>Active Courses</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center position-relative">
                    <div class="progress-ring mx-auto">
                        <svg class="progress-ring" width="120" height="120">
                            <circle class="progress-ring-circle" cx="60" cy="60" r="50"></circle>
                            <circle class="progress-ring-progress" cx="60" cy="60" r="50"></circle>
                        </svg>
                        <div class="position-absolute top-50 start-50 translate-middle text-center">
                            <h5 class="mb-0">1</h5>
                            <small>Enrollments</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="card dashboard-card stat-card primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-1">Total Users</h6>
                            <h3 class="text-white mb-2">8</h3>
                            <small class="text-white-75">Students: 5, Teachers: 3</small>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-users fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card dashboard-card stat-card success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-1">Total Courses</h6>
                            <h3 class="text-white mb-2">2</h3>
                            <small class="text-white-75">Active courses</small>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-book fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card dashboard-card stat-card info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-1">Study Materials</h6>
                            <h3 class="text-white mb-2">2</h3>
                            <small class="text-white-75">PDFs, Videos & Resources</small>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-file-alt fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card dashboard-card stat-card warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-1">Course Enrollments</h6>
                            <h3 class="text-white mb-2">1</h3>
                            <small class="text-white-75">Active enrollments</small>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-graduation-cap fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- User Distribution Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4 dashboard-card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">User Distribution</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="userDistributionChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Enrollment Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4 dashboard-card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Course Enrollment</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="courseEnrollmentChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Row -->
        <div class="row">
            <!-- Recent Users -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow dashboard-card">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Users</h6>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item recent-item p-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Jatin+Mishra&background=random"
                                        class="user-avatar me-3">
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">Jatin Mishra</div>
                                        <small class="text-muted">jatin@gmail.com</small>
                                    </div>
                                    <span class="badge bg-success">Student</span>
                                </div>
                            </div>
                            <div class="list-group-item recent-item p-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Admin+Jatin&background=random"
                                        class="user-avatar me-3">
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">Admin Jatin</div>
                                        <small class="text-muted">admin@gmail.com</small>
                                    </div>
                                    <span class="badge bg-info">Teacher</span>
                                </div>
                            </div>
                            <div class="list-group-item recent-item p-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Amit+Mishra&background=random"
                                        class="user-avatar me-3">
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">Amit Mishra</div>
                                        <small class="text-muted">jatin@way.co.in</small>
                                    </div>
                                    <span class="badge bg-success">Student</span>
                                </div>
                            </div>
                            <div class="list-group-item recent-item p-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Vipin+Singh&background=random"
                                        class="user-avatar me-3">
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">Vipin Singh</div>
                                        <small class="text-muted">vipin@mail.com</small>
                                    </div>
                                    <span class="badge bg-info">Teacher</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Courses -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow dashboard-card">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Courses</h6>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item recent-item p-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded p-3 me-3">
                                        <i class="fas fa-book fa-2x"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">PTE Academic Complete Course</div>
                                        <small class="text-muted">Comprehensive preparation for PTE Academic
                                            test</small>
                                        <div class="mt-2">
                                            <span class="badge bg-info">Intermediate</span>
                                            <span class="badge bg-success">₹99.99</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item recent-item p-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success text-white rounded p-3 me-3">
                                        <i class="fas fa-book fa-2x"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">ijojwi</div>
                                        <small class="text-muted">jioqj</small>
                                        <div class="mt-2">
                                            <span class="badge bg-primary">Beginner</span>
                                            <span class="badge bg-success">₹122.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white mt-5">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Pawan PTE 2025 | Design & Develop by Way One</span>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // User Distribution Chart
        const userCtx = document.getElementById('userDistributionChart').getContext('2d');
        const userChart = new Chart(userCtx, {
            type: 'bar',
            data: {
                labels: ['Students', 'Teachers', 'Admins'],
                datasets: [{
                    label: 'User Count',
                    data: [5, 3, 1],
                    backgroundColor: [
                        'rgba(78, 115, 223, 0.8)',
                        'rgba(28, 200, 138, 0.8)',
                        'rgba(54, 185, 204, 0.8)'
                    ],
                    borderColor: [
                        'rgb(78, 115, 223)',
                        'rgb(28, 200, 138)',
                        'rgb(54, 185, 204)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Course Enrollment Chart
        const courseCtx = document.getElementById('courseEnrollmentChart').getContext('2d');
        const courseChart = new Chart(courseCtx, {
            type: 'doughnut',
            data: {
                labels: ['PTE Academic Course', 'ijojwi'],
                datasets: [{
                    data: [1, 0],
                    backgroundColor: [
                        'rgba(78, 115, 223, 0.8)',
                        'rgba(28, 200, 138, 0.8)'
                    ],
                    borderColor: [
                        'rgb(78, 115, 223)',
                        'rgb(28, 200, 138)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Style the progress ring
        document.addEventListener('DOMContentLoaded', function () {
            const progressRing = document.querySelector('.progress-ring-progress');
            if (progressRing) {
                const radius = progressRing.getAttribute('r');
                const circumference = 2 * Math.PI * radius;
                progressRing.style.strokeDasharray = `${circumference} ${circumference}`;
                progressRing.style.strokeDashoffset = circumference;

                // Animate progress
                const offset = circumference - (1 / 2) * circumference;
                progressRing.style.transition = 'stroke-dashoffset 1s ease-in-out';
                progressRing.style.strokeDashoffset = offset;
            }
        });
    </script>
</body>

</html>