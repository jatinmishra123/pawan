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
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary) 10%, #4a9ec2ff 100%);
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

        /* Header Styles */
        .admin-header {
            background: linear-gradient(135deg, #c7d347 0%, #9d92a8 100%);
            color: white;
            padding: 20px 30px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .admin-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            clip-path: polygon(0 0, 100% 0, 100% 30%, 0 70%);
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .welcome-text h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .welcome-text p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 0;
        }

        .header-stats {
            display: flex;
            gap: 20px;
            margin-top: 15px;
        }

        .stat-item {
            text-align: center;
            padding: 0 15px;
            border-right: 1px solid rgba(255, 255, 255, 0.3);
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-item h4 {
            margin-bottom: 5px;
            font-weight: 700;
        }

        .stat-item small {
            opacity: 0.8;
        }

        .progress-ring {
            width: 120px;
            height: 120px;
            position: relative;
        }

        .progress-ring-circle {
            stroke: rgba(255, 255, 255, 0.3);
            stroke-width: 8;
            fill: transparent;
        }

        .progress-ring-progress {
            stroke: white;
            stroke-width: 8;
            fill: transparent;
            stroke-linecap: round;
            transition: stroke-dashoffset 0.5s ease;
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .progress-text h5 {
            margin-bottom: 0;
            font-weight: 700;
        }

        .progress-text small {
            opacity: 0.8;
        }

        /* User Table Styles */
        .user-management-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #70bcb6ff 0%, #9d92a8 100%);
            color: white;
            padding: 20px 25px;
            border-bottom: none;
        }

        .card-header h3 {
            margin: 0;
            font-weight: 700;
        }

        .table-container {
            overflow-x: auto;
        }

        .user-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .user-table th {
            background-color: #f8f9fc;
            color: var(--dark);
            font-weight: 700;
            padding: 15px;
            border-bottom: 2px solid #e3e6f0;
        }

        .user-table td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e3e6f0;
        }

        .user-table tr:last-child td {
            border-bottom: none;
        }

        .user-table tr:hover {
            background-color: rgba(78, 115, 223, 0.05);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .status-badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-active {
            background-color: rgba(28, 200, 138, 0.2);
            color: var(--success);
        }

        .status-inactive {
            background-color: rgba(108, 117, 125, 0.2);
            color: #6c757d;
        }

        .role-badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .role-student {
            background-color: rgba(78, 115, 223, 0.2);
            color: var(--primary);
        }

        .role-teacher {
            background-color: rgba(54, 185, 204, 0.2);
            color: var(--info);
        }

        .role-admin {
            background-color: rgba(231, 74, 59, 0.2);
            color: var(--danger);
        }

        .action-btn {
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 0.85rem;
            transition: all 0.2s;
        }

        .btn-view {
            background-color: rgba(78, 115, 223, 0.1);
            color: var(--primary);
            border: 1px solid rgba(78, 115, 223, 0.2);
        }

        .btn-view:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-edit {
            background-color: rgba(54, 185, 204, 0.1);
            color: var(--info);
            border: 1px solid rgba(54, 185, 204, 0.2);
        }

        .btn-edit:hover {
            background-color: var(--info);
            color: white;
        }

        .btn-delete {
            background-color: rgba(231, 74, 59, 0.1);
            color: var(--danger);
            border: 1px solid rgba(231, 74, 59, 0.2);
        }

        .btn-delete:hover {
            background-color: var(--danger);
            color: white;
        }

        .search-box {
            position: relative;
            max-width: 300px;
        }

        .search-box input {
            border-radius: 20px;
            padding-left: 40px;
            background-color: #f8f9fc;
            border: 1px solid #e3e6f0;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #b7b9cc;
        }

        .table-controls {
            padding: 20px;
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }

        /* Delete confirmation modal */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: linear-gradient(135deg, #c7d347 0%, #9d92a8 100%);
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border-bottom: none;
        }

        /* Pagination */
        .pagination {
            margin: 20px 0;
        }

        .page-link {
            color: var(--primary);
            border: 1px solid #e3e6f0;
            padding: 8px 16px;
            border-radius: 5px;
            margin: 0 3px;
        }

        .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .welcome-text h1 {
                font-size: 2rem;
            }

            .header-stats {
                flex-wrap: wrap;
                gap: 10px;
            }

            .stat-item {
                border-right: none;
                flex: 1 0 45%;
                padding: 10px;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .sidebar {
                display: none;
            }

            .admin-header {
                padding: 15px;
            }

            .welcome-text h1 {
                font-size: 1.8rem;
            }

            .stat-item {
                flex: 1 0 100%;
            }

            .progress-ring {
                width: 100px;
                height: 100px;
            }

            .user-table {
                min-width: 600px;
            }

            .table-container {
                overflow-x: auto;
            }

            .search-box {
                max-width: 100%;
                margin-bottom: 15px;
            }
        }
    </style>
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
            position: relative;
            height: 70px;
            padding: 1.5rem 1rem;
            font-size: 1.2rem;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.05rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-brand img {
            position: absolute;
            height: 100px;
            top: -15px;
            left: 16px;
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
        <div class="sidebar-brand">
            <img src="./uploads/logo.png" alt="Pawan PTE" height="120" class="mb-4 me-2">
        </div>
        <div class="sidebar-nav">
            <a href="dashboard" class="sidebar-item">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="users" class="sidebar-item active">
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
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span> Logout </span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <h4 class="mb-0">User Management</h4>
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
                        <li><a class="dropdown-item" href="logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- User Management Card -->
        <div class="card user-management-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3><i class="fas fa-users me-2"></i>User Management</h3>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search users..." id="searchInput">
                </div>
            </div>

            <div class="table-controls d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <span class="me-2">Show</span>
                    <select class="form-select form-select-sm" id="entriesSelect" style="width: 80px;">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="ms-2">entries</span>
                </div>
                <a href="add_user" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Add New User
                </a>
            </div>

            <div class="table-container">
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../inc/db.php';

                        // Get the number of entries to show
                        $entries = isset($_GET['entries']) ? intval($_GET['entries']) : 10;
                        $entries = in_array($entries, [10, 25, 50, 100]) ? $entries : 10;

                        // Get current page
                        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                        $offset = ($page - 1) * $entries;

                        // Get search term if any
                        $search = isset($_GET['search']) ? trim($_GET['search']) : '';

                        // Build query
                        $sql_where = '';
                        $params = [];

                        if (!empty($search)) {
                            $sql_where = " WHERE first_name LIKE :search OR last_name LIKE :search OR email LIKE :search ";
                            $params[':search'] = "%$search%";
                        }

                        // Get total number of users
                        $count_sql = "SELECT COUNT(*) as total FROM users $sql_where";
                        $stmt = $pdo->prepare($count_sql);
                        $stmt->execute($params);
                        $total_users = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
                        $total_pages = ceil($total_users / $entries);

                        // Get users data
                        $sql = "SELECT * FROM users $sql_where ORDER BY created_at DESC LIMIT :offset, :entries";
                        $stmt = $pdo->prepare($sql);

                        // bind params
                        foreach ($params as $key => $value) {
                            $stmt->bindValue($key, $value, PDO::PARAM_STR);
                        }
                        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
                        $stmt->bindValue(':entries', (int) $entries, PDO::PARAM_INT);

                        $stmt->execute();
                        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($users) {
                            foreach ($users as $row) {
                                $status_class = $row['is_active'] == 1 ? 'status-active' : 'status-inactive';
                                $role_class = 'role-' . $row['user_type'];
                                $avatar_name = urlencode($row['first_name'] . ' ' . $row['last_name']);

                                echo "<tr>
            <td>
                <div class='d-flex align-items-center'>
                    <img src='https://ui-avatars.com/api/?name={$avatar_name}&background=random' class='user-avatar me-3'>
                    <div>
                        <div class='fw-bold'>{$row['first_name']} {$row['last_name']}</div>
                        <small class='text-muted'>ID: {$row['id']}</small>
                    </div>
                </div>
            </td>
            <td>{$row['email']}</td>
            <td><span class='role-badge {$role_class}'>" . ucfirst($row['user_type']) . "</span></td>
            <td><span class='status-badge {$status_class}'>" . ($row['is_active'] ? 'Active' : 'Inactive') . "</span></td>
            <td>" . date('Y-m-d', strtotime($row['created_at'])) . "</td>
            <td>
                <a href='view_user?id={$row['id']}' class='btn btn-view action-btn me-1'>
                    <i class='fas fa-eye'></i>
                </a>
                <a href='edit_user?id={$row['id']}' class='btn btn-edit action-btn me-1'>
                    <i class='fas fa-edit'></i>
                </a>
                <button class='btn btn-delete action-btn' data-bs-toggle='modal'
                    data-bs-target='#deleteModal' data-userid='{$row['id']}' data-username='{$row['first_name']} {$row['last_name']}'>
                    <i class='fas fa-trash'></i>
                </button>
            </td>
        </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center py-4'>No users found</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center p-3">
                <div>Showing <?php echo ($offset + 1); ?> to <?php echo min($offset + $entries, $total_users); ?> of
                    <?php echo $total_users; ?> entries
                </div>
                <nav>
                    <ul class="pagination mb-0">
                        <?php if ($page > 1): ?>
                            <li class="page-item"><a class="page-link"
                                    href="?page=<?php echo $page - 1; ?>&entries=<?php echo $entries; ?>&search=<?php echo $search; ?>">Previous</a>
                            </li>
                        <?php else: ?>
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                <a class="page-link"
                                    href="?page=<?php echo $i; ?>&entries=<?php echo $entries; ?>&search=<?php echo $search; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages): ?>
                            <li class="page-item"><a class="page-link"
                                    href="?page=<?php echo $page + 1; ?>&entries=<?php echo $entries; ?>&search=<?php echo $search; ?>">Next</a>
                            </li>
                        <?php else: ?>
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm User Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete user <strong id="userToDelete">N/A</strong>?</p>
                    <p class="text-danger">This action cannot be undone. All user data will be permanently removed from
                        the
                        system.</p>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="confirmDelete">
                        <label class="form-check-label" for="confirmDelete">
                            I understand this action is permanent
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn" disabled>Delete User</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Delete confirmation modal functionality
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const userId = button.getAttribute('data-userid');
            const userName = button.getAttribute('data-username');

            const modalTitle = deleteModal.querySelector('.modal-title');
            const userToDelete = deleteModal.querySelector('#userToDelete');

            modalTitle.textContent = `Delete User: ${userName}`;
            userToDelete.textContent = userName;

            // Store the user ID for the delete action
            document.getElementById('confirmDeleteBtn').setAttribute('data-userid', userId);
        });

        // Enable delete button only when confirmation is checked
        document.getElementById('confirmDelete').addEventListener('change', function () {
            document.getElementById('confirmDeleteBtn').disabled = !this.checked;
        });

        // Delete button functionality
        document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
            const userId = this.getAttribute('data-userid');

            // In a real application, you would make an API call here
            fetch('delete_user', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${userId}`
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(`User has been deleted successfully.`);
                        // Reload the page to see changes
                        location.reload();
                    } else {
                        alert(`Error: ${data.message}`);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the user.');
                });

            // Close the modal
            const modal = bootstrap.Modal.getInstance(deleteModal);
            modal.hide();
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function () {
            const searchText = this.value.toLowerCase();
            const rows = document.querySelectorAll('.user-table tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchText) ? '' : 'none';
            });
        });

        // Entries select change
        document.getElementById('entriesSelect').addEventListener('change', function () {
            const entries = this.value;
            const url = new URL(window.location);
            url.searchParams.set('entries', entries);
            url.searchParams.set('page', '1'); // Reset to first page
            window.location.href = url.toString();
        });

        // Set the selected value for entries
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const entries = urlParams.get('entries') || '10';
            document.getElementById('entriesSelect').value = entries;
        });
    </script>
</body>

</html>