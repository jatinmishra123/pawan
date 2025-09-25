<?php
session_start();

// Agar user login nahi hai to login page par bhej do
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollments - Pawan PTE</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        /* Enrollments Management Card */
        .enrollments-management-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #dee1e1ff 0%, #eaf1f2ff 100%);
            color: white;
            padding: 20px 25px;
            border-bottom: none;
        }

        .card-header h3 {
            margin: 0;
            color: black;
            font-weight: 700;
        }

        .table-container {
            overflow-x: auto;
        }

        .enrollments-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .enrollments-table th {
            background-color: #f8f9fc;
            color: var(--dark);
            font-weight: 700;
            padding: 15px;
            border-bottom: 2px solid #e3e6f0;
        }

        .enrollments-table td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e3e6f0;
        }

        .enrollments-table tr:last-child td {
            border-bottom: none;
        }

        .enrollments-table tr:hover {
            background-color: rgba(78, 115, 223, 0.05);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
        }

        .course-image {
            width: 50px;
            height: 50px;
            border-radius: 10px;
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

        .status-completed {
            background-color: rgba(78, 115, 223, 0.2);
            color: var(--primary);
        }

        .status-cancelled {
            background-color: rgba(108, 117, 125, 0.2);
            color: #6c757d;
        }

        .payment-badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .payment-success {
            background-color: rgba(28, 200, 138, 0.2);
            color: var(--success);
        }

        .payment-pending {
            background-color: rgba(246, 194, 62, 0.2);
            color: var(--warning);
        }

        .payment-failed {
            background-color: rgba(231, 74, 59, 0.2);
            color: var(--danger);
        }

        .price-badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            background-color: rgba(78, 115, 223, 0.1);
            color: var(--primary);
        }

        .progress-badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            background-color: rgba(54, 185, 204, 0.1);
            color: var(--info);
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

        /* Modal Styles */
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

        /* Form Styles */
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .form-control,
        .form-select,
        .form-check-input {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #e3e6f0;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
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
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .sidebar {
                display: none;
            }

            .enrollments-table {
                min-width: 1200px;
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
            <a href="enrollments" class="sidebar-item active">
                <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Enrollments</span>
            </a>
            <a href="reports" class="sidebar-item">
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
            <h4 class="mb-0">Enrollments Management</h4>
            <div class="d-flex align-items-center">
                <div class="dropdown me-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="notificationsDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge bg-danger">5</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                        <li><a class="dropdown-item" href="#">New enrollment</a></li>
                        <li><a class="dropdown-item" href="#">Payment received</a></li>
                        <li><a class="dropdown-item" href="#">Course completed</a></li>
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

        <!-- Enrollments Management Card -->
        <div class="card enrollments-management-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3><i class="fas fa-graduation-cap me-2"></i>Enrollments Management</h3>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search enrollments..." id="searchInput"
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                </div>
            </div>

            <div class="table-controls d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <span class="me-2">Show</span>
                    <select class="form-select form-select-sm" id="entriesSelect" style="width: 80px;">
                        <option value="10" <?php echo (isset($_GET['entries']) && $_GET['entries'] == 10) ? 'selected' : ''; ?>>10</option>
                        <option value="25" <?php echo (isset($_GET['entries']) && $_GET['entries'] == 25) ? 'selected' : ''; ?>>25</option>
                        <option value="50" <?php echo (isset($_GET['entries']) && $_GET['entries'] == 50) ? 'selected' : ''; ?>>50</option>
                        <option value="100" <?php echo (isset($_GET['entries']) && $_GET['entries'] == 100) ? 'selected' : ''; ?>>100</option>
                    </select>
                    <span class="ms-2">entries</span>
                </div>
                <div>
                    <button class="btn btn-outline-primary me-2">
                        <i class="fas fa-download me-1"></i> Export
                    </button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEnrollmentModal">
                        <i class="fas fa-plus me-1"></i> New Enrollment
                    </button>
                </div>
            </div>

            <div class="table-container">
                <table class="enrollments-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Course</th>
                            <th>Enrollment Date</th>
                            <th>Progress</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Enrollment Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Include database connection
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
                            $sql_where = " WHERE (u.first_name LIKE :search 
                   OR u.last_name LIKE :search 
                   OR u.email LIKE :search 
                   OR c.title LIKE :search)";
                            $params[':search'] = "%$search%";
                        }

                        // Get total number of enrollments
                        $count_sql = "SELECT COUNT(*) as total 
              FROM course_enrollments ce
              JOIN users u ON ce.user_id = u.id
              JOIN courses c ON ce.course_id = c.id
              $sql_where";

                        $count_stmt = $pdo->prepare($count_sql);
                        $count_stmt->execute($params);
                        $total_enrollments = $count_stmt->fetch(PDO::FETCH_ASSOC)['total'];
                        $total_pages = ceil($total_enrollments / $entries);

                        // Get enrollments data
                        $sql = "SELECT ce.*, 
               CONCAT(u.first_name, ' ', u.last_name) AS user_name, 
               u.email AS user_email, 
               u.profile_image, 
               c.title AS course_title, 
               c.level, 
               c.course_image,
               p.amount, 
               p.payment_method, 
               p.status AS payment_status
        FROM course_enrollments ce
        JOIN users u ON ce.user_id = u.id
        JOIN courses c ON ce.course_id = c.id
        LEFT JOIN payments p ON ce.payment_id = p.id
        $sql_where
        ORDER BY ce.enrolled_at DESC 
        LIMIT :offset, :entries";

                        $stmt = $pdo->prepare($sql);

                        // Bind params
                        foreach ($params as $key => $value) {
                            $stmt->bindValue($key, $value, PDO::PARAM_STR);
                        }
                        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
                        $stmt->bindValue(':entries', (int) $entries, PDO::PARAM_INT);

                        $stmt->execute();
                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Output data
                        if ($rows) {
                            foreach ($rows as $row) {
                                // Determine enrollment status
                                if ($row['completed_at'] !== null) {
                                    $status_class = 'status-completed';
                                    $status_text = 'Completed';
                                } elseif (!empty($row['cancelled_at'])) {
                                    $status_class = 'status-cancelled';
                                    $status_text = 'Cancelled';
                                } else {
                                    $status_class = 'status-active';
                                    $status_text = 'Active';
                                }

                                // Payment status
                                switch ($row['payment_status']) {
                                    case 'success':
                                        $payment_class = 'payment-success';
                                        $payment_text = 'Success';
                                        break;
                                    case 'pending':
                                        $payment_class = 'payment-pending';
                                        $payment_text = 'Pending';
                                        break;
                                    case 'failed':
                                        $payment_class = 'payment-failed';
                                        $payment_text = 'Failed';
                                        break;
                                    default:
                                        $payment_class = 'payment-pending';
                                        $payment_text = 'Pending';
                                }

                                // Dates
                                $enrolled_date = date('Y-m-d', strtotime($row['enrolled_at']));
                                $completed_date = $row['completed_at'] ? date('Y-m-d', strtotime($row['completed_at'])) : '';

                                echo "<tr>
            <td>
                <div class='d-flex align-items-center'>
                    <img src='" . (!empty($row['profile_image'])
                                    ? '../uploads/users/' . $row['profile_image']
                                    : 'https://ui-avatars.com/api/?name=' . urlencode($row['user_name']) . '&background=random') . "' 
                        class='user-avatar me-3'>
                    <div>
                        <div class='fw-bold'>{$row['user_name']}</div>
                        <small class='text-muted'>{$row['user_email']}</small>
                    </div>
                </div>
            </td>
            <td>
                <div class='d-flex align-items-center'>
                    <img src='" . (!empty($row['course_image'])
                                    ? '../uploads/courses/' . $row['course_image']
                                    : 'https://via.placeholder.com/50x50/e74a3b/ffffff?text=PTE') . "' 
                        class='course-image me-3'>
                    <div>
                        <div class='fw-bold'>{$row['course_title']}</div>
                        <small class='text-muted'>{$row['level']}</small>
                    </div>
                </div>
            </td>
            <td>{$enrolled_date}</td>
            <td><span class='progress-badge'>{$row['progress']}%</span></td>
            <td><span class='price-badge'>₹{$row['amount']}</span></td>
            <td>" . ucfirst(str_replace('_', ' ', $row['payment_method'])) . "</td>
            <td><span class='payment-badge {$payment_class}'>{$payment_text}</span></td>
            <td><span class='status-badge {$status_class}'>{$status_text}</span></td>
            <td>
                <button class='btn btn-view action-btn me-1' data-bs-toggle='modal' data-bs-target='#viewEnrollmentModal' data-enrollmentid='{$row['id']}'>
                    <i class='fas fa-eye'></i>
                </button>
                <button class='btn btn-edit action-btn me-1' data-bs-toggle='modal'
                    data-bs-target='#editEnrollmentModal' data-enrollmentid='{$row['id']}'>
                    <i class='fas fa-edit'></i>
                </button>
                <button class='btn btn-delete action-btn' data-bs-toggle='modal'
                    data-bs-target='#deleteEnrollmentModal' data-enrollmentid='{$row['id']}'
                    data-username='{$row['user_name']}'>
                    <i class='fas fa-trash'></i>
                </button>
            </td>
        </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9' class='text-center py-4'>No enrollments found</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center p-3">
                <div>Showing <?php echo ($offset + 1); ?> to <?php echo min($offset + $entries, $total_enrollments); ?>
                    of <?php echo $total_enrollments; ?> entries</div>
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

    <!-- Add Enrollment Modal -->
    <div class="modal fade" id="addEnrollmentModal" tabindex="-1" aria-labelledby="addEnrollmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEnrollmentModalLabel">Create New Enrollment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addEnrollmentForm" action="add_enrollment" method="POST">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="enrollmentUser" class="form-label">Select User</label>
                                <select class="form-select" id="enrollmentUser" name="user_id" required>
                                    <option value="">Select User</option>
                                    <?php
                                    // Fetch users for dropdown
                                    $users_sql = "SELECT id, name, email FROM users WHERE is_active = 1 ORDER BY name";
                                    $users_result = $pdo->query($users_sql);
                                    if ($users_result->num_rows > 0) {
                                        while ($user = $users_result->fetch_assoc()) {
                                            echo "<option value='{$user['id']}'>{$user['name']} ({$user['email']})</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="enrollmentCourse" class="form-label">Select Course</label>
                                <select class="form-select" id="enrollmentCourse" name="course_id" required>
                                    <option value="">Select Course</option>
                                    <?php
                                    // Fetch courses for dropdown
                                    $courses_sql = "SELECT id, title FROM courses WHERE is_active = 1 ORDER BY title";
                                    $courses_result = $pdo->query($courses_sql);
                                    if ($courses_result->num_rows > 0) {
                                        while ($course = $courses_result->fetch_assoc()) {
                                            echo "<option value='{$course['id']}'>{$course['title']}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="enrollmentDate" class="form-label">Enrollment Date</label>
                                <input type="date" class="form-control" id="enrollmentDate" name="enrolled_at" required>
                            </div>
                            <div class="col-md-6">
                                <label for="enrollmentAmount" class="form-label">Amount (₹)</label>
                                <input type="number" class="form-control" id="enrollmentAmount" name="amount"
                                    step="0.01" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="paymentMethod" class="form-label">Payment Method</label>
                                <select class="form-select" id="paymentMethod" name="payment_method" required>
                                    <option value="">Select Method</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="debit_card">Debit Card</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                    <option value="upi">UPI</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="paymentStatus" class="form-label">Payment Status</label>
                                <select class="form-select" id="paymentStatus" name="payment_status" required>
                                    <option value="">Select Status</option>
                                    <option value="success">Success</option>
                                    <option value="pending">Pending</option>
                                    <option value="failed">Failed</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="progress" class="form-label">Progress (%)</label>
                                <input type="number" class="form-control" id="progress" name="progress" min="0"
                                    max="100" value="0">
                            </div>
                            <div class="col-md-6">
                                <label for="enrollmentStatus" class="form-label">Enrollment Status</label>
                                <select class="form-select" id="enrollmentStatus" name="status" required>
                                    <option value="active">Active</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="addEnrollmentForm" class="btn btn-primary">Create Enrollment</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Enrollment Modal -->
    <div class="modal fade" id="editEnrollmentModal" tabindex="-1" aria-labelledby="editEnrollmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEnrollmentModalLabel">Edit Enrollment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editEnrollmentForm" action="edit_enrollment" method="POST">
                        <input type="hidden" id="editEnrollmentId" name="id">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">User</label>
                                <p class="form-control-static fw-bold" id="editUserInfo"></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Course</label>
                                <p class="form-control-static fw-bold" id="editCourseInfo"></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="editEnrollmentDate" class="form-label">Enrollment Date</label>
                                <input type="date" class="form-control" id="editEnrollmentDate" name="enrolled_at"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="editEnrollmentAmount" class="form-label">Amount (₹)</label>
                                <input type="number" class="form-control" id="editEnrollmentAmount" name="amount"
                                    step="0.01" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="editPaymentMethod" class="form-label">Payment Method</label>
                                <select class="form-select" id="editPaymentMethod" name="payment_method" required>
                                    <option value="">Select Method</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="debit_card">Debit Card</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                    <option value="upi">UPI</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="editPaymentStatus" class="form-label">Payment Status</label>
                                <select class="form-select" id="editPaymentStatus" name="payment_status" required>
                                    <option value="">Select Status</option>
                                    <option value="success">Success</option>
                                    <option value="pending">Pending</option>
                                    <option value="failed">Failed</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="editProgress" class="form-label">Progress (%)</label>
                                <input type="number" class="form-control" id="editProgress" name="progress" min="0"
                                    max="100" required>
                            </div>
                            <div class="col-md-6">
                                <label for="editEnrollmentStatus" class="form-label">Enrollment Status</label>
                                <select class="form-select" id="editEnrollmentStatus" name="status" required>
                                    <option value="active">Active</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="editEnrollmentForm" class="btn btn-primary">Update Enrollment</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Enrollment Modal -->
    <div class="modal fade" id="deleteEnrollmentModal" tabindex="-1" aria-labelledby="deleteEnrollmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteEnrollmentModalLabel">Confirm Enrollment Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete enrollment for <strong id="enrollmentToDelete">N/A</strong>?</p>
                    <p class="text-danger">This action cannot be undone. All enrollment data will be permanently removed
                        from the system.</p>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="confirmEnrollmentDelete">
                        <label class="form-check-label" for="confirmEnrollmentDelete">
                            I understand this action is permanent
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmEnrollmentDeleteBtn" disabled>Delete
                        Enrollment</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Delete confirmation modal functionality
        const deleteEnrollmentModal = document.getElementById('deleteEnrollmentModal');
        deleteEnrollmentModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const enrollmentId = button.getAttribute('data-enrollmentid');
            const userName = button.getAttribute('data-username');

            const modalTitle = deleteEnrollmentModal.querySelector('.modal-title');
            const enrollmentToDelete = deleteEnrollmentModal.querySelector('#enrollmentToDelete');

            modalTitle.textContent = `Delete Enrollment: ${enrollmentId}`;
            enrollmentToDelete.textContent = userName;

            // Store the enrollment ID for the delete action
            document.getElementById('confirmEnrollmentDeleteBtn').setAttribute('data-enrollmentid', enrollmentId);
        });

        // Enable delete button only when confirmation is checked
        document.getElementById('confirmEnrollmentDelete').addEventListener('change', function () {
            document.getElementById('confirmEnrollmentDeleteBtn').disabled = !this.checked;
        });

        // Delete button functionality
        document.getElementById('confirmEnrollmentDeleteBtn').addEventListener('click', function () {
            const enrollmentId = this.getAttribute('data-enrollmentid');

            // Make API call to delete enrollment
            fetch('delete_enrollment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${enrollmentId}`
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(`Enrollment has been deleted successfully.`);
                        // Reload the page to see changes
                        location.reload();
                    } else {
                        alert(`Error: ${data.message}`);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the enrollment.');
                });

            // Close the modal
            const modal = bootstrap.Modal.getInstance(deleteEnrollmentModal);
            modal.hide();
        });

        // Edit enrollment modal functionality
        const editEnrollmentModal = document.getElementById('editEnrollmentModal');
        editEnrollmentModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const enrollmentId = button.getAttribute('data-enrollmentid');

            // Store the enrollment ID for the update action
            document.getElementById('editEnrollmentId').value = enrollmentId;

            // Fetch enrollment data and populate the form
            fetch(`get_enrollment?id=${enrollmentId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const enrollment = data.enrollment;
                        document.getElementById('editUserInfo').textContent = `${enrollment.user_name} (${enrollment.user_email})`;
                        document.getElementById('editCourseInfo').textContent = enrollment.course_title;
                        document.getElementById('editEnrollmentDate').value = enrollment.enrolled_at;
                        document.getElementById('editEnrollmentAmount').value = enrollment.amount;
                        document.getElementById('editPaymentMethod').value = enrollment.payment_method;
                        document.getElementById('editPaymentStatus').value = enrollment.payment_status;
                        document.getElementById('editProgress').value = enrollment.progress;
                        document.getElementById('editEnrollmentStatus').value = enrollment.status;
                    } else {
                        alert('Error loading enrollment data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while loading enrollment data');
                });
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function () {
            const searchValue = this.value.trim();
            const urlParams = new URLSearchParams(window.location.search);

            // Update search parameter
            if (searchValue) {
                urlParams.set('search', searchValue);
            } else {
                urlParams.delete('search');
            }

            // Reset to first page when searching
            urlParams.set('page', '1');

            // Reload page with new parameters
            window.location.href = 'enrollments?' + urlParams.toString();
        });

        // Entries per page functionality
        document.getElementById('entriesSelect').addEventListener('change', function () {
            const entriesValue = this.value;
            const urlParams = new URLSearchParams(window.location.search);

            // Update entries parameter
            urlParams.set('entries', entriesValue);

            // Reset to first page when changing entries
            urlParams.set('page', '1');

            // Reload page with new parameters
            window.location.href = 'enrollments?' + urlParams.toString();
        });

        // Set current date as default for enrollment date
        document.addEventListener('DOMContentLoaded', function () {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('enrollmentDate').value = today;

            // Set the selected entries value on page load
            const urlParams = new URLSearchParams(window.location.search);
            const entries = urlParams.get('entries') || '10';
            document.getElementById('entriesSelect').value = entries;
        });
    </script>
</body>

</html>