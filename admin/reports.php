<?php
// Include database connection
require_once '../inc/db.php';

// Initialize variables
$date_range = isset($_GET['dateRange']) ? $_GET['dateRange'] : '30';
$report_type = isset($_GET['reportType']) ? $_GET['reportType'] : 'overview';
$start_date = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$end_date = isset($_GET['endDate']) ? $_GET['endDate'] : '';

// Calculate date range
if ($date_range == 'custom' && $start_date && $end_date) {
    $date_condition = "WHERE DATE(ce.enrolled_at) BETWEEN '$start_date' AND '$end_date'";
    $payment_date_condition = "WHERE DATE(p.created_at) BETWEEN '$start_date' AND '$end_date'";
    $user_date_condition = "WHERE DATE(u.created_at) BETWEEN '$start_date' AND '$end_date'";
} else {
    $days = intval($date_range);
    $date_condition = "WHERE DATE(ce.enrolled_at) >= DATE_SUB(NOW(), INTERVAL $days DAY)";
    $payment_date_condition = "WHERE DATE(p.created_at) >= DATE_SUB(NOW(), INTERVAL $days DAY)";
    $user_date_condition = "WHERE DATE(u.created_at) >= DATE_SUB(NOW(), INTERVAL $days DAY)";
}

// Get total revenue
$revenue_sql = "SELECT COALESCE(SUM(p.amount), 0) as total_revenue 
                FROM payments p 
                $payment_date_condition 
                AND p.status = 'success'";
$revenue_result = $pdo->query($revenue_sql);
$total_revenue = $revenue_result->fetch(PDO::FETCH_ASSOC)['total_revenue'];

// Get new users count
$users_sql = "SELECT COUNT(*) as new_users FROM users u $user_date_condition";
$users_result = $pdo->query($users_sql);
$new_users = $users_result->fetch(PDO::FETCH_ASSOC)['new_users'];

// Get course enrollments count
$enrollments_sql = "SELECT COUNT(*) as enrollments FROM course_enrollments ce $date_condition";
$enrollments_result = $pdo->query($enrollments_sql);
$course_enrollments = $enrollments_result->fetch(PDO::FETCH_ASSOC)['enrollments'];

// Get average completion rate
$completion_sql = "SELECT COALESCE(AVG(ce.progress), 0) as avg_completion 
                   FROM course_enrollments ce 
                   $date_condition";
$completion_result = $pdo->query($completion_sql);
$avg_completion = $completion_result->fetch(PDO::FETCH_ASSOC)['avg_completion'];

// Get revenue data for chart (monthly)
$revenue_chart_sql = "SELECT 
    YEAR(p.created_at) as year,
    MONTH(p.created_at) as month,
    COALESCE(SUM(p.amount), 0) as monthly_revenue
FROM payments p
WHERE p.status = 'success'
GROUP BY YEAR(p.created_at), MONTH(p.created_at)
ORDER BY year, month
LIMIT 12";
$revenue_chart_result = $pdo->query($revenue_chart_sql);
$revenue_labels = [];
$revenue_data = [];

while ($row = $revenue_chart_result->fetch(PDO::FETCH_ASSOC)) {
    $month_name = date('M', mktime(0, 0, 0, $row['month'], 1));
    $revenue_labels[] = $month_name;
    $revenue_data[] = $row['monthly_revenue'];
}

// Get user distribution data
$user_dist_sql = "SELECT 
    SUM(CASE WHEN ce.progress < 100 AND ce.completed_at IS NULL THEN 1 ELSE 0 END) as active_students,
    SUM(CASE WHEN ce.progress = 100 THEN 1 ELSE 0 END) as completed_courses,
    SUM(CASE WHEN u.created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) as new_users,
    SUM(CASE WHEN u.last_login < DATE_SUB(NOW(), INTERVAL 90 DAY) THEN 1 ELSE 0 END) as inactive_users
FROM users u
LEFT JOIN course_enrollments ce ON u.id = ce.user_id";
$user_dist_result = $pdo->query($user_dist_sql);
$user_dist = $user_dist_result->fetch(PDO::FETCH_ASSOC);

// Get course performance data
$course_perf_sql = "SELECT 
    c.title as course_name,
    COUNT(ce.id) as enrollments,
    COALESCE(AVG(ce.progress), 0) as avg_progress,
    COALESCE(SUM(p.amount), 0) as revenue,
    COALESCE(AVG(r.rating), 0) as avg_rating
FROM courses c
LEFT JOIN course_enrollments ce ON c.id = ce.course_id
LEFT JOIN payments p ON ce.payment_id = p.id
LEFT JOIN reviews r ON c.id = r.course_id
GROUP BY c.id
ORDER BY enrollments DESC
LIMIT 5";
$course_perf_result = $pdo->query($course_perf_sql);
$course_perf_data = [];
while ($row = $course_perf_result->fetch(PDO::FETCH_ASSOC)) {
    $course_perf_data[] = $row;
}

// Get enrollment trend data
$enrollment_trend_sql = "SELECT 
    YEAR(ce.enrolled_at) as year,
    MONTH(ce.enrolled_at) as month,
    COUNT(ce.id) as monthly_enrollments
FROM course_enrollments ce
GROUP BY YEAR(ce.enrolled_at), MONTH(ce.enrolled_at)
ORDER BY year, month
LIMIT 12";
$enrollment_trend_result = $pdo->query($enrollment_trend_sql);
$enrollment_labels = [];
$enrollment_data = [];

while ($row = $enrollment_trend_result->fetch(PDO::FETCH_ASSOC)) {
    $month_name = date('M', mktime(0, 0, 0, $row['month'], 1));
    $enrollment_labels[] = $month_name;
    $enrollment_data[] = $row['monthly_enrollments'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Pawan PTE</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary) 10%, #41aeaeff 100%);
            color: white;
            position: fixed;
            width: 250px;
            z-index: 100;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
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

        /* Main Content */
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Report Cards */
        .report-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s;
            height: 100%;
        }

        .report-card:hover {
            transform: translateY(-5px);
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .icon-primary {
            background-color: rgba(98, 157, 177, 0.2);
            color: var(--primary);
        }

        .icon-success {
            background-color: rgba(28, 200, 138, 0.2);
            color: var(--success);
        }

        .icon-info {
            background-color: rgba(54, 185, 204, 0.2);
            color: var(--info);
        }

        .icon-warning {
            background-color: rgba(246, 194, 62, 0.2);
            color: var(--warning);
        }

        /* Chart Containers */
        .chart-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.06);
            padding: 20px;
            margin-bottom: 20px;
            height: 100%;
        }

        .chart-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e3e6f0;
        }

        /* Filter Section */
        .filter-section {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.06);
            padding: 20px;
            margin-bottom: 20px;
        }

        /* Table Styles */
        .report-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .report-table th {
            background-color: #f8f9fc;
            color: var(--dark);
            font-weight: 700;
            padding: 15px;
            border-bottom: 2px solid #e3e6f0;
        }

        .report-table td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e3e6f0;
        }

        .report-table tr:last-child td {
            border-bottom: none;
        }

        .report-table tr:hover {
            background-color: rgba(78, 115, 223, 0.05);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .sidebar {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img src="./uploads/logo.png" alt="Pawan PTE" height="120" class="me-2"
            style="margin-bottom:-40px; margin-left:20px">
        <hr>

        <div class="sidebar-nav">
            <a href="dashboard" class="sidebar-item">
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
            <a href="reports" class="sidebar-item active">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Reports</span>
            </a>
            <a href="settings" class="sidebar-item">
                <i class="fas fa-fw fa-cog"></i>
                <span>Settings</span>
            </a>
            <a href="logout" class="sidebar-item">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span> Logout </span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <h4 class="mb-0">Reports & Analytics</h4>
            <div class="d-flex align-items-center">
                <div class="dropdown me-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="notificationsDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge bg-danger">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                        <li><a class="dropdown-item" href="#">New report generated</a></li>
                        <li><a class="dropdown-item" href="#">Revenue update</a></li>
                        <li><a class="dropdown-item" href="#">User growth</a></li>
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
                        <li><a class="dropdown-item" href="logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" action="reports">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <select class="form-select" id="dateRange" name="dateRange">
                            <option value="7" <?php echo $date_range == '7' ? 'selected' : ''; ?>>Last 7 Days</option>
                            <option value="30" <?php echo $date_range == '30' ? 'selected' : ''; ?>>Last 30 Days</option>
                            <option value="90" <?php echo $date_range == '90' ? 'selected' : ''; ?>>Last 90 Days</option>
                            <option value="365" <?php echo $date_range == '365' ? 'selected' : ''; ?>>Last Year</option>
                            <option value="custom" <?php echo $date_range == 'custom' ? 'selected' : ''; ?>>Custom Range
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2" id="customDateRange"
                        style="display: <?php echo $date_range == 'custom' ? 'block' : 'none'; ?>;">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate"
                            value="<?php echo $start_date; ?>">
                    </div>
                    <div class="col-md-3 mb-2" id="customDateRangeEnd"
                        style="display: <?php echo $date_range == 'custom' ? 'block' : 'none'; ?>;">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate"
                            value="<?php echo $end_date; ?>">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="reportType" class="form-label">Report Type</label>
                        <select class="form-select" id="reportType" name="reportType">
                            <option value="overview" <?php echo $report_type == 'overview' ? 'selected' : ''; ?>>Overview
                            </option>
                            <option value="financial" <?php echo $report_type == 'financial' ? 'selected' : ''; ?>>
                                Financial</option>
                            <option value="users" <?php echo $report_type == 'users' ? 'selected' : ''; ?>>User Analytics
                            </option>
                            <option value="courses" <?php echo $report_type == 'courses' ? 'selected' : ''; ?>>Course
                                Performance</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2 d-flex align-items-end">
                        <button class="btn btn-primary w-100" type="submit">
                            <i class="fas fa-sync-alt me-1"></i> Generate Report
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs fw-bold text-primary text-uppercase mb-1">Total Revenue</div>
                                <div class="h5 mb-0 fw-bold text-gray-800">
                                    ₹<?php echo number_format($total_revenue, 2); ?></div>
                                <div class="mt-2 text-success">
                                    <i class="fas fa-arrow-up me-1"></i>
                                    <span>12.5%</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="card-icon icon-primary">
                                    <i class="fas fa-rupee-sign"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs fw-bold text-success text-uppercase mb-1">New Users</div>
                                <div class="h5 mb-0 fw-bold text-gray-800"><?php echo $new_users; ?></div>
                                <div class="mt-2 text-success">
                                    <i class="fas fa-arrow-up me-1"></i>
                                    <span>8.3%</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="card-icon icon-success">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs fw-bold text-info text-uppercase mb-1">Course Enrollments</div>
                                <div class="h5 mb-0 fw-bold text-gray-800"><?php echo $course_enrollments; ?></div>
                                <div class="mt-2 text-danger">
                                    <i class="fas fa-arrow-down me-1"></i>
                                    <span>3.2%</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="card-icon icon-info">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs fw-bold text-warning text-uppercase mb-1">Avg. Completion Rate</div>
                                <div class="h5 mb-0 fw-bold text-gray-800">
                                    <?php echo number_format($avg_completion, 1); ?>%
                                </div>
                                <div class="mt-2 text-success">
                                    <i class="fas fa-arrow-up me-1"></i>
                                    <span>5.7%</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="card-icon icon-warning">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row mb-4">
            <!-- Revenue Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="chart-container">
                    <h5 class="chart-title"><i class="fas fa-rupee-sign me-2"></i>Revenue Overview</h5>
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>

            <!-- User Distribution Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="chart-container">
                    <h5 class="chart-title"><i class="fas fa-users me-2"></i>User Distribution</h5>
                    <canvas id="userDistributionChart"></canvas>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <!-- Course Performance Chart -->
            <div class="col-xl-6 col-lg-6">
                <div class="chart-container">
                    <h5 class="chart-title"><i class="fas fa-book me-2"></i>Course Performance</h5>
                    <canvas id="coursePerformanceChart"></canvas>
                </div>
            </div>

            <!-- Enrollment Trends Chart -->
            <div class="col-xl-6 col-lg-6">
                <div class="chart-container">
                    <h5 class="chart-title"><i class="fas fa-chart-line me-2"></i>Enrollment Trends</h5>
                    <canvas id="enrollmentTrendChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Top Performing Courses Table -->
        <div class="row">
            <div class="col-12">
                <div class="chart-container">
                    <h5 class="chart-title"><i class="fas fa-trophy me-2"></i>Top Performing Courses</h5>
                    <div class="table-responsive">
                        <table class="report-table">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Enrollments</th>
                                    <th>Completion Rate</th>
                                    <th>Revenue</th>
                                    <th>Avg. Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($course_perf_data as $course): ?>
                                    <tr>
                                        <td><?php echo $course['course_name']; ?></td>
                                        <td><?php echo $course['enrollments']; ?></td>
                                        <td>
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: <?php echo $course['avg_progress']; ?>%"></div>
                                            </div>
                                            <small><?php echo number_format($course['avg_progress'], 1); ?>%</small>
                                        </td>
                                        <td>₹<?php echo number_format($course['revenue'], 2); ?></td>
                                        <td>
                                            <?php
                                            $rating = round($course['avg_rating']);
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $rating) {
                                                    echo '<i class="fas fa-star text-warning"></i>';
                                                } else {
                                                    echo '<i class="far fa-star text-warning"></i>';
                                                }
                                            }
                                            ?>
                                            <span class="ms-1"><?php echo number_format($course['avg_rating'], 1); ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Date range toggle
        document.getElementById('dateRange').addEventListener('change', function () {
            const customDateRange = document.getElementById('customDateRange');
            const customDateRangeEnd = document.getElementById('customDateRangeEnd');

            if (this.value === 'custom') {
                customDateRange.style.display = 'block';
                customDateRangeEnd.style.display = 'block';
            } else {
                customDateRange.style.display = 'none';
                customDateRangeEnd.style.display = 'none';
            }
        });

        // Initialize charts
        function initCharts() {
            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($revenue_labels); ?>,
                    datasets: [{
                        label: 'Revenue (₹)',
                        data: <?php echo json_encode($revenue_data); ?>,
                        backgroundColor: 'rgba(98, 157, 177, 0.1)',
                        borderColor: '#629db1',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // User Distribution Chart
            const userDistCtx = document.getElementById('userDistributionChart').getContext('2d');
            const userDistributionChart = new Chart(userDistCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Active Students', 'Completed Courses', 'New Users', 'Inactive'],
                    datasets: [{
                        data: [
                            <?php echo $user_dist['active_students']; ?>,
                            <?php echo $user_dist['completed_courses']; ?>,
                            <?php echo $user_dist['new_users']; ?>,
                            <?php echo $user_dist['inactive_users']; ?>
                        ],
                        backgroundColor: [
                            '#629db1',
                            '#1cc88a',
                            '#36b9cc',
                            '#e74a3b'
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // Course Performance Chart
            const coursePerfCtx = document.getElementById('coursePerformanceChart').getContext('2d');
            const coursePerformanceChart = new Chart(coursePerfCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_column($course_perf_data, 'course_name')); ?>,
                    datasets: [{
                        label: 'Enrollments',
                        data: <?php echo json_encode(array_column($course_perf_data, 'enrollments')); ?>,
                        backgroundColor: '#629db1'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Enrollment Trend Chart
            const enrollTrendCtx = document.getElementById('enrollmentTrendChart').getContext('2d');
            const enrollmentTrendChart = new Chart(enrollTrendCtx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($enrollment_labels); ?>,
                    datasets: [{
                        label: 'Enrollments',
                        data: <?php echo json_encode($enrollment_data); ?>,
                        backgroundColor: 'rgba(28, 200, 138, 0.1)',
                        borderColor: '#1cc88a',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Initialize charts on page load
        document.addEventListener('DOMContentLoaded', function () {
            initCharts();
        });
    </script>
</body>

</html>