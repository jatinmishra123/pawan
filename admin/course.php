<?php require_once "inc/auth_check.php"; ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management - Pawan PTE</title>
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
            background: linear-gradient(180deg, var(--primary) 10%, #50bec4ff 100%);
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

        /* Course Management Card */
        .course-management-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #5ac6bdff 0%, #9d92a8 100%);
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

        .course-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .course-table th {
            background-color: #f8f9fc;
            color: var(--dark);
            font-weight: 700;
            padding: 15px;
            border-bottom: 2px solid #e3e6f0;
        }

        .course-table td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e3e6f0;
        }

        .course-table tr:last-child td {
            border-bottom: none;
        }

        .course-table tr:hover {
            background-color: rgba(78, 115, 223, 0.05);
        }

        .course-image {
            width: 60px;
            height: 60px;
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

        .status-inactive {
            background-color: rgba(108, 117, 125, 0.2);
            color: #6c757d;
        }

        .level-badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .level-beginner {
            background-color: rgba(78, 115, 223, 0.2);
            color: var(--primary);
        }

        .level-intermediate {
            background-color: rgba(54, 185, 204, 0.2);
            color: var(--info);
        }

        .level-advanced {
            background-color: rgba(231, 74, 59, 0.2);
            color: var(--danger);
        }

        .price-badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            background-color: rgba(246, 194, 62, 0.2);
            color: var(--warning);
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
            background: linear-gradient(135deg, #6ac3d7ff 0%, #9d92a8 100%);
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
        .form-select {
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

            .course-table {
                min-width: 800px;
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
            <a href="course" class="sidebar-item active">
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
            <h4 class="mb-0">Course Management</h4>
            <div class="d-flex align-items-center">
                <div class="dropdown me-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="notificationsDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge bg-danger">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                        <li><a class="dropdown-item" href="#">New course added</a></li>
                        <li><a class="dropdown-item" href="#">Course enrollment</a></li>
                        <li><a class="dropdown-item" href="#">Course update</a></li>
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

        <!-- Course Management Card -->
        <div class="card course-management-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3><i class="fas fa-book me-2"></i>Course Management</h3>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search courses..." id="searchInput">
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
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                    <i class="fas fa-plus me-1"></i> Add New Course
                </button>
            </div>

            <div class="table-container">
                <table class="course-table">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Description</th>
                            <th>Level</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Students</th>
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
                            $sql_where = " WHERE c.title LIKE :search OR c.description LIKE :search ";
                            $params[':search'] = "%$search%";
                        }

                        // Get total number of courses
                        $count_sql = "SELECT COUNT(*) as total FROM courses c $sql_where";
                        $stmt = $pdo->prepare($count_sql);
                        $stmt->execute($params);
                        $total_courses = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
                        $total_pages = ceil($total_courses / $entries);

                        // Get courses data with student count
                        $sql = "SELECT c.*, COUNT(e.id) as student_count 
        FROM courses c 
        LEFT JOIN course_enrollments e ON c.id = e.course_id 
        $sql_where 
        GROUP BY c.id 
        ORDER BY c.created_at DESC 
        LIMIT :offset, :entries";

                        $stmt = $pdo->prepare($sql);

                        // bind params
                        foreach ($params as $key => $value) {
                            $stmt->bindValue($key, $value, PDO::PARAM_STR);
                        }
                        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
                        $stmt->bindValue(':entries', (int) $entries, PDO::PARAM_INT);

                        $stmt->execute();
                        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Output data
                        if ($courses) {
                            foreach ($courses as $row) {
                                $status_class = $row['is_active'] ? 'status-active' : 'status-inactive';
                                $level_class = 'level-' . $row['level'];
                                $status_text = $row['is_active'] ? 'Active' : 'Inactive';
                                $image_path = !empty($row['course_image'])
                                    ? '../uploads/courses/' . $row['course_image']
                                    : 'https://via.placeholder.com/60x60/f6c23e/ffffff?text=' . substr($row['title'], 0, 2);

                                echo "<tr>
            <td>
                <div class='d-flex align-items-center'>
                    <img src='$image_path' class='course-image me-3'>
                    <div>
                        <div class='fw-bold'>{$row['title']}</div>
                        <small class='text-muted'>ID: CRS{$row['id']}</small>
                    </div>
                </div>
            </td>
            <td>" . substr($row['description'], 0, 60) . (strlen($row['description']) > 60 ? '...' : '') . "</td>
            <td><span class='level-badge $level_class'>" . ucfirst($row['level']) . "</span></td>
            <td><span class='price-badge'>₹{$row['price']}</span></td>
            <td><span class='status-badge $status_class'>$status_text</span></td>
            <td>{$row['student_count']}</td>
            <td class='text-center'>
                <div class='d-flex justify-content-center'>
                    <a href='view_course?id={$row['id']}' class='btn btn-view action-btn me-1'>
                        <i class='fas fa-eye'></i>
                    </a>
                    <button class='btn btn-edit action-btn me-1' data-bs-toggle='modal'
                        data-bs-target='#editCourseModal' data-courseid='{$row['id']}'>
                        <i class='fas fa-edit'></i>
                    </button>
                    <button class='btn btn-delete action-btn' data-bs-toggle='modal'
                        data-bs-target='#deleteCourseModal' data-courseid='{$row['id']}'
                        data-coursename='{$row['title']}'>
                        <i class='fas fa-trash'></i>
                    </button>
                </div>
            </td>
        </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center py-4'>No courses found</td></tr>";
                        }
                        ?>


                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center p-3">
                <div>Showing <?php echo ($offset + 1); ?> to <?php echo min($offset + $entries, $total_courses); ?> of
                    <?php echo $total_courses; ?> entries
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

    <!-- Add Course Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCourseForm" action="add_course" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="courseName" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="courseName" name="title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="coursePrice" class="form-label">Price (₹)</label>
                                <input type="number" class="form-control" id="coursePrice" name="price" step="0.01"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="courseLevel" class="form-label">Level</label>
                                <select class="form-select" id="courseLevel" name="level" required>
                                    <option value="">Select Level</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advanced">Advanced</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="courseStatus" class="form-label">Status</label>
                                <select class="form-select" id="courseStatus" name="is_active" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="courseDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="courseDescription" name="description" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="courseDuration" class="form-label">Duration (hours)</label>
                            <input type="number" class="form-control" id="courseDuration" name="duration" required>
                        </div>
                        <div class="mb-3">
                            <label for="courseImage" class="form-label">Course Image</label>
                            <input class="form-control" type="file" id="courseImage" name="course_image"
                                accept="image/*">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="addCourseForm" class="btn btn-primary">Save Course</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Course Modal -->
    <div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCourseForm" action="edit_course" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="editCourseId" name="id">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="editCourseName" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="editCourseName" name="title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="editCoursePrice" class="form-label">Price (₹)</label>
                                <input type="number" class="form-control" id="editCoursePrice" name="price" step="0.01"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="editCourseLevel" class="form-label">Level</label>
                                <select class="form-select" id="editCourseLevel" name="level" required>
                                    <option value="">Select Level</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advanced">Advanced</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="editCourseStatus" class="form-label">Status</label>
                                <select class="form-select" id="editCourseStatus" name="is_active" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editCourseDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editCourseDescription" name="description" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editCourseDuration" class="form-label">Duration (hours)</label>
                            <input type="number" class="form-control" id="editCourseDuration" name="duration" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCourseImage" class="form-label">Course Image</label>
                            <input class="form-control" type="file" id="editCourseImage" name="course_image"
                                accept="image/*">
                            <div class="form-text">Current image: <span id="currentImageName">course-image.jpg</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="editCourseForm" class="btn btn-primary">Update Course</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Course Modal -->
    <div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="deleteCourseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCourseModalLabel">Confirm Course Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete course <strong id="courseToDelete">N/A</strong>?</p>
                    <p class="text-danger">This action cannot be undone. All course data will be permanently removed
                        from the system.</p>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="confirmCourseDelete">
                        <label class="form-check-label" for="confirmCourseDelete">
                            I understand this action is permanent
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmCourseDeleteBtn" disabled>Delete
                        Course</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Delete confirmation modal functionality
        const deleteCourseModal = document.getElementById('deleteCourseModal');
        deleteCourseModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const courseId = button.getAttribute('data-courseid');
            const courseName = button.getAttribute('data-coursename');

            const modalTitle = deleteCourseModal.querySelector('.modal-title');
            const courseToDelete = deleteCourseModal.querySelector('#courseToDelete');

            modalTitle.textContent = `Delete Course: ${courseName}`;
            courseToDelete.textContent = courseName;

            // Store the course ID for the delete action
            document.getElementById('confirmCourseDeleteBtn').setAttribute('data-courseid', courseId);
        });

        // Enable delete button only when confirmation is checked
        document.getElementById('confirmCourseDelete').addEventListener('change', function () {
            document.getElementById('confirmCourseDeleteBtn').disabled = !this.checked;
        });

        // Delete button functionality
        document.getElementById('confirmCourseDeleteBtn').addEventListener('click', function () {
            const courseId = this.getAttribute('data-courseid');

            // Make API call to delete course
            fetch('delete_course', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${courseId}`
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(`Course has been deleted successfully.`);
                        // Reload the page to see changes
                        location.reload();
                    } else {
                        alert(`Error: ${data.message}`);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the course.');
                });

            // Close the modal
            const modal = bootstrap.Modal.getInstance(deleteCourseModal);
            modal.hide();
        });

        // Edit course modal functionality
        const editCourseModal = document.getElementById('editCourseModal');
        editCourseModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const courseId = button.getAttribute('data-courseid');

            // Store the course ID for the update action
            document.getElementById('editCourseId').value = courseId;

            // Fetch course data and populate the form
            fetch(`get_course?id=${courseId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const course = data.course;
                        document.getElementById('editCourseName').value = course.title;
                        document.getElementById('editCoursePrice').value = course.price;
                        document.getElementById('editCourseLevel').value = course.level;
                        document.getElementById('editCourseStatus').value = course.is_active;
                        document.getElementById('editCourseDescription').value = course.description;
                        document.getElementById('editCourseDuration').value = course.duration;
                        document.getElementById('currentImageName').textContent = course.course_image || 'No image';
                    } else {
                        alert('Error loading course data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while loading course data');
                });
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function () {
            const searchText = this.value.toLowerCase();
            const rows = document.querySelectorAll('.course-table tbody tr');

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