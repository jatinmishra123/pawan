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
    <title>Study Materials - Pawan PTE</title>
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
            --warning: #49adbaff;
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
            background: linear-gradient(180deg, var(--primary) 10%, #4f9fb6ff 100%);
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

        /* Study Materials Management Card */
        .materials-management-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #73c3d7ff 0%, #9d92a8 100%);
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

        .materials-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .materials-table th {
            background-color: #f8f9fc;
            color: var(--dark);
            font-weight: 700;
            padding: 15px;
            border-bottom: 2px solid #e3e6f0;
        }

        .materials-table td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e3e6f0;
        }

        .materials-table tr:last-child td {
            border-bottom: none;
        }

        .materials-table tr:hover {
            background-color: rgba(78, 115, 223, 0.05);
        }

        .material-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .icon-pdf {
            background-color: #e74a3b;
        }

        .icon-video {
            background-color: #4e73df;
        }

        .icon-doc {
            background-color: #36b9cc;
        }

        .icon-audio {
            background-color: #1cc88a;
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

        .type-badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .type-pdf {
            background-color: rgba(231, 74, 59, 0.2);
            color: var(--danger);
        }

        .type-video {
            background-color: rgba(78, 115, 223, 0.2);
            color: var(--primary);
        }

        .type-document {
            background-color: rgba(54, 185, 204, 0.2);
            color: var(--info);
        }

        .type-audio {
            background-color: rgba(28, 200, 138, 0.2);
            color: var(--success);
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

        .btn-download {
            background-color: rgba(28, 200, 138, 0.1);
            color: var(--success);
            border: 1px solid rgba(28, 200, 138, 0.2);
        }

        .btn-download:hover {
            background-color: var(--success);
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

            .materials-table {
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
            <a href="course" class="sidebar-item">
                <i class="fas fa-fw fa-book"></i>
                <span>Courses</span>
            </a>
            <a href="study_materials" class="sidebar-item active">
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
            <h4 class="mb-0">Study Materials Management</h4>
            <div class="d-flex align-items-center">
                <div class="dropdown me-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="notificationsDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge bg-danger">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                        <li><a class="dropdown-item" href="#">New material added</a></li>
                        <li><a class="dropdown-item" href="#">Material downloaded</a></li>
                        <li><a class="dropdown-item" href="#">Material update</a></li>
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

        <!-- Study Materials Management Card -->
        <div class="card materials-management-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3><i class="fas fa-file-alt me-2"></i>Study Materials Management</h3>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search materials..." id="searchInput">
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
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMaterialModal">
                    <i class="fas fa-plus me-1"></i> Add New Material
                </button>
            </div>

            <div class="table-container">
                <table class="materials-table">
                    <thead>
                        <tr>
                            <th>Material</th>
                            <th>Type</th>
                            <th>Course</th>
                            <th>Description</th>
                            <th>Downloads</th>
                            <th>Status</th>
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
                            $sql_where = " WHERE sm.title LIKE :search OR sm.description LIKE :search ";
                            $params[':search'] = "%$search%";
                        }

                        // Get total number of materials
                        $count_sql = "SELECT COUNT(*) as total FROM study_materials sm $sql_where";
                        $stmt = $pdo->prepare($count_sql);
                        $stmt->execute($params);
                        $total_materials = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
                        $total_pages = ceil($total_materials / $entries);

                        // Get materials data
                        $sql = "SELECT sm.*, c.title as course_title 
        FROM study_materials sm 
        LEFT JOIN courses c ON sm.category_id = c.id 
        $sql_where 
        ORDER BY sm.created_at DESC 
        LIMIT :offset, :entries";

                        $stmt = $pdo->prepare($sql);

                        // Bind search parameter
                        foreach ($params as $key => $value) {
                            $stmt->bindValue($key, $value, PDO::PARAM_STR);
                        }

                        // Bind pagination params
                        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
                        $stmt->bindValue(':entries', (int) $entries, PDO::PARAM_INT);

                        $stmt->execute();
                        $materials = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Output data
                        if ($materials) {
                            foreach ($materials as $row) {
                                $status_class = $row['is_active'] ? 'status-active' : 'status-inactive';
                                $status_text = $row['is_active'] ? 'Active' : 'Inactive';

                                // Determine icon and badge class based on file type
                                switch ($row['file_type']) {
                                    case 'pdf':
                                        $icon_class = 'icon-pdf';
                                        $type_class = 'type-pdf';
                                        $icon_html = '<i class="fas fa-file-pdf"></i>';
                                        break;
                                    case 'video':
                                        $icon_class = 'icon-video';
                                        $type_class = 'type-video';
                                        $icon_html = '<i class="fas fa-video"></i>';
                                        break;
                                    case 'document':
                                        $icon_class = 'icon-doc';
                                        $type_class = 'type-document';
                                        $icon_html = '<i class="fas fa-file-word"></i>';
                                        break;
                                    case 'audio':
                                        $icon_class = 'icon-audio';
                                        $type_class = 'type-audio';
                                        $icon_html = '<i class="fas fa-volume-up"></i>';
                                        break;
                                    default:
                                        $icon_class = 'icon-doc';
                                        $type_class = 'type-document';
                                        $icon_html = '<i class="fas fa-file"></i>';
                                }

                                // Get file size
                                $file_path = '../' . $row['file_path'];
                                $file_size = 'N/A';
                                if (file_exists($file_path)) {
                                    $size = filesize($file_path);
                                    if ($size < 1024) {
                                        $file_size = $size . ' B';
                                    } elseif ($size < 1048576) {
                                        $file_size = round($size / 1024, 1) . ' KB';
                                    } else {
                                        $file_size = round($size / 1048576, 1) . ' MB';
                                    }
                                }

                                echo "<tr>
            <td>
                <div class='d-flex align-items-center'>
                    <div class='material-icon $icon_class me-3'>
                        $icon_html
                    </div>
                    <div>
                        <div class='fw-bold'>{$row['title']}</div>
                        <small class='text-muted'>ID: MAT{$row['id']}</small>
                    </div>
                </div>
            </td>
            <td><span class='type-badge $type_class'>" . ucfirst($row['file_type']) . "</span></td>
            <td>{$row['course_title']}</td>
            <td>$file_size</td>
            <td>{$row['download_count']}</td>
            <td><span class='status-badge $status_class'>$status_text</span></td>
            <td>
                <a href='{$row['file_path']}' class='btn btn-download action-btn me-1' download>
                    <i class='fas fa-download'></i>
                </a>
                <a href='view_material?id={$row['id']}' class='btn btn-view action-btn me-1'>
                    <i class='fas fa-eye'></i>
                </a>
                <button class='btn btn-edit action-btn me-1' data-bs-toggle='modal'
                    data-bs-target='#editMaterialModal' data-materialid='{$row['id']}'>
                    <i class='fas fa-edit'></i>
                </button>
                <button class='btn btn-delete action-btn' data-bs-toggle='modal'
                    data-bs-target='#deleteMaterialModal' data-materialid='{$row['id']}'
                    data-materialname='{$row['title']}'>
                    <i class='fas fa-trash'></i>
                </button>
            </td>
        </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center py-4'>No study materials found</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center p-3">
                <div>Showing <?php echo ($offset + 1); ?> to <?php echo min($offset + $entries, $total_materials); ?> of
                    <?php echo $total_materials; ?> entries
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

    <!-- Add Material Modal -->
    <div class="modal fade" id="addMaterialModal" tabindex="-1" aria-labelledby="addMaterialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMaterialModalLabel">Add New Study Material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addMaterialForm" action="add_material" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="materialTitle" class="form-label">Material Title</label>
                                <input type="text" class="form-control" id="materialTitle" name="title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="materialType" class="form-label">Type</label>
                                <select class="form-select" id="materialType" name="file_type" required>
                                    <option value="">Select Type</option>
                                    <option value="pdf">PDF</option>
                                    <option value="video">Video</option>
                                    <option value="document">Document</option>
                                    <option value="audio">Audio</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="materialCourse" class="form-label">Course</label>
                                <select class="form-select" id="materialCourse" name="category_id" required>
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
                            <div class="col-md-6">
                                <label for="materialStatus" class="form-label">Status</label>
                                <select class="form-select" id="materialStatus" name="is_active" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="materialDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="materialDescription" name="description" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="materialFile" class="form-label">Upload File</label>
                            <input class="form-control" type="file" id="materialFile" name="file" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="addMaterialForm" class="btn btn-primary">Save Material</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Material Modal -->
    <div class="modal fade" id="editMaterialModal" tabindex="-1" aria-labelledby="editMaterialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMaterialModalLabel">Edit Study Material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editMaterialForm" action="edit_material" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="editMaterialId" name="id">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="editMaterialTitle" class="form-label">Material Title</label>
                                <input type="text" class="form-control" id="editMaterialTitle" name="title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="editMaterialType" class="form-label">Type</label>
                                <select class="form-select" id="editMaterialType" name="file_type" required>
                                    <option value="">Select Type</option>
                                    <option value="pdf">PDF</option>
                                    <option value="video">Video</option>
                                    <option value="document">Document</option>
                                    <option value="audio">Audio</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="editMaterialCourse" class="form-label">Course</label>
                                <select class="form-select" id="editMaterialCourse" name="category_id" required>
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
                            <div class="col-md-6">
                                <label for="editMaterialStatus" class="form-label">Status</label>
                                <select class="form-select" id="editMaterialStatus" name="is_active" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editMaterialDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editMaterialDescription" name="description" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editMaterialFile" class="form-label">Update File</label>
                            <input class="form-control" type="file" id="editMaterialFile" name="file">
                            <div class="form-text">Current file: <span id="currentFileName">N/A</span></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="editMaterialForm" class="btn btn-primary">Update Material</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Material Modal -->
    <div class="modal fade" id="deleteMaterialModal" tabindex="-1" aria-labelledby="deleteMaterialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteMaterialModalLabel">Confirm Material Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete material <strong id="materialToDelete">N/A</strong>?</p>
                    <p class="text-danger">This action cannot be undone. All material data will be permanently removed
                        from the system.</p>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="confirmMaterialDelete">
                        <label class="form-check-label" for="confirmMaterialDelete">
                            I understand this action is permanent
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmMaterialDeleteBtn" disabled>Delete
                        Material</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Delete confirmation modal functionality
        const deleteMaterialModal = document.getElementById('deleteMaterialModal');
        deleteMaterialModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const materialId = button.getAttribute('data-materialid');
            const materialName = button.getAttribute('data-materialname');

            const modalTitle = deleteMaterialModal.querySelector('.modal-title');
            const materialToDelete = deleteMaterialModal.querySelector('#materialToDelete');

            modalTitle.textContent = `Delete Material: ${materialName}`;
            materialToDelete.textContent = materialName;

            // Store the material ID for the delete action
            document.getElementById('confirmMaterialDeleteBtn').setAttribute('data-materialid', materialId);
        });

        // Enable delete button only when confirmation is checked
        document.getElementById('confirmMaterialDelete').addEventListener('change', function () {
            document.getElementById('confirmMaterialDeleteBtn').disabled = !this.checked;
        });

        // Delete button functionality
        document.getElementById('confirmMaterialDeleteBtn').addEventListener('click', function () {
            const materialId = this.getAttribute('data-materialid');

            // Make API call to delete material
            fetch('delete_material', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${materialId}`
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(`Material has been deleted successfully.`);
                        // Reload the page to see changes
                        location.reload();
                    } else {
                        alert(`Error: ${data.message}`);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the material.');
                });

            // Close the modal
            const modal = bootstrap.Modal.getInstance(deleteMaterialModal);
            modal.hide();
        });

        // Edit material modal functionality
        const editMaterialModal = document.getElementById('editMaterialModal');
        editMaterialModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const materialId = button.getAttribute('data-materialid');

            // Store the material ID for the update action
            document.getElementById('editMaterialId').value = materialId;

            // Fetch material data and populate the form
            fetch(`get_material?id=${materialId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const material = data.material;
                        document.getElementById('editMaterialTitle').value = material.title;
                        document.getElementById('editMaterialType').value = material.file_type;
                        document.getElementById('editMaterialCourse').value = material.category_id;
                        document.getElementById('editMaterialStatus').value = material.is_active;
                        document.getElementById('editMaterialDescription').value = material.description;

                        // Extract filename from path
                        const filePath = material.file_path;
                        const fileName = filePath.split('/').pop();
                        document.getElementById('currentFileName').textContent = fileName;
                    } else {
                        alert('Error loading material data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while loading material data');
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
            window.location.href = 'study_materials?' + urlParams.toString();
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
            window.location.href = 'study_materials?' + urlParams.toString();
        });

        // Set the selected entries value on page load
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const entries = urlParams.get('entries') || '10';
            document.getElementById('entriesSelect').value = entries;

            // Set the search input value
            const search = urlParams.get('search') || '';
            document.getElementById('searchInput').value = search;
        });

        // Form validation for add material form
        document.getElementById('addMaterialForm').addEventListener('submit', function (e) {
            const fileInput = document.getElementById('materialFile');
            const file = fileInput.files[0];

            if (file) {
                const fileType = document.getElementById('materialType').value;
                const fileExtension = file.name.split('.').pop().toLowerCase();

                // Validate file type based on selected type
                if (fileType === 'pdf' && fileExtension !== 'pdf') {
                    e.preventDefault();
                    alert('Please upload a PDF file for PDF type.');
                    return false;
                }

                if (fileType === 'video' && !['mp4', 'mov', 'avi', 'wmv'].includes(fileExtension)) {
                    e.preventDefault();
                    alert('Please upload a video file (MP4, MOV, AVI, WMV) for Video type.');
                    return false;
                }

                if (fileType === 'document' && !['doc', 'docx', 'txt'].includes(fileExtension)) {
                    e.preventDefault();
                    alert('Please upload a document file (DOC, DOCX, TXT) for Document type.');
                    return false;
                }

                if (fileType === 'audio' && !['mp3', 'wav', 'ogg'].includes(fileExtension)) {
                    e.preventDefault();
                    alert('Please upload an audio file (MP3, WAV, OGG) for Audio type.');
                    return false;
                }

                // Validate file size (max 50MB)
                if (file.size > 50 * 1024 * 1024) {
                    e.preventDefault();
                    alert('File size must be less than 50MB.');
                    return false;
                }
            }
        });

        // Form validation for edit material form
        document.getElementById('editMaterialForm').addEventListener('submit', function (e) {
            const fileInput = document.getElementById('editMaterialFile');
            const file = fileInput.files[0];

            if (file) {
                const fileType = document.getElementById('editMaterialType').value;
                const fileExtension = file.name.split('.').pop().toLowerCase();

                // Validate file type based on selected type
                if (fileType === 'pdf' && fileExtension !== 'pdf') {
                    e.preventDefault();
                    alert('Please upload a PDF file for PDF type.');
                    return false;
                }

                if (fileType === 'video' && !['mp4', 'mov', 'avi', 'wmv'].includes(fileExtension)) {
                    e.preventDefault();
                    alert('Please upload a video file (MP4, MOV, AVI, WMV) for Video type.');
                    return false;
                }

                if (fileType === 'document' && !['doc', 'docx', 'txt'].includes(fileExtension)) {
                    e.preventDefault();
                    alert('Please upload a document file (DOC, DOCX, TXT) for Document type.');
                    return false;
                }

                if (fileType === 'audio' && !['mp3', 'wav', 'ogg'].includes(fileExtension)) {
                    e.preventDefault();
                    alert('Please upload an audio file (MP3, WAV, OGG) for Audio type.');
                    return false;
                }

                // Validate file size (max 50MB)
                if (file.size > 50 * 1024 * 1024) {
                    e.preventDefault();
                    alert('File size must be less than 50MB.');
                    return false;
                }
            }
        });

        // Auto-close dropdowns when clicking outside
        document.addEventListener('click', function (e) {
            const notificationsDropdown = document.getElementById('notificationsDropdown');
            const userDropdown = document.getElementById('userDropdown');

            if (!notificationsDropdown.contains(e.target)) {
                const dropdown = bootstrap.Dropdown.getInstance(notificationsDropdown);
                if (dropdown) dropdown.hide();
            }

            if (!userDropdown.contains(e.target)) {
                const dropdown = bootstrap.Dropdown.getInstance(userDropdown);
                if (dropdown) dropdown.hide();
            }
        });
    </script>
</body>

</html>