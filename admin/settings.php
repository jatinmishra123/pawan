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
    <title>Settings - Pawan PTE</title>
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

        /* Settings Card */
        .settings-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
        }

        .card-header {
            background: linear-gradient(135deg, #dee1e1ff 0%, #eaf1f2ff 100%);
            color: var(--dark);
            padding: 20px 25px;
            border-bottom: none;
            border-top-left-radius: 15px !important;
            border-top-right-radius: 15px !important;
        }

        .card-header h5 {
            margin: 0;
            font-weight: 700;
        }

        .settings-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-right: 15px;
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

        .icon-danger {
            background-color: rgba(231, 74, 59, 0.2);
            color: var(--danger);
        }

        /* Form Styles */
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
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
            box-shadow: 0 0 0 0.25rem rgba(98, 157, 177, 0.25);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        /* Toggle Switch */
        .form-switch .form-check-input {
            width: 3em;
            height: 1.5em;
        }

        /* Settings Sections */
        .settings-section {
            padding: 25px;
            border-bottom: 1px solid #e3e6f0;
        }

        .settings-section:last-child {
            border-bottom: none;
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
            <a href="reports" class="sidebar-item">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Reports</span>
            </a>
            <a href="settings" class="sidebar-item active">
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
            <h4 class="mb-0">System Settings</h4>
            <div class="d-flex align-items-center">
                <div class="dropdown me-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="notificationsDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge bg-danger">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                        <li><a class="dropdown-item" href="#">Settings updated</a></li>
                        <li><a class="dropdown-item" href="#">New feature available</a></li>
                        <li><a class="dropdown-item" href="#">System maintenance</a></li>
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

        <!-- General Settings Card -->
        <div class="card settings-card">
            <div class="card-header d-flex align-items-center">
                <div class="settings-icon icon-primary">
                    <i class="fas fa-cog"></i>
                </div>
                <h5>General Settings</h5>
            </div>
            <div class="card-body">
                <div class="settings-section">
                    <form id="generalSettingsForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="siteName" class="form-label">Site Name</label>
                                <input type="text" class="form-control" id="siteName" value="Pawan PTE Academy">
                            </div>
                            <div class="col-md-6">
                                <label for="siteEmail" class="form-label">Admin Email</label>
                                <input type="email" class="form-control" id="siteEmail" value="admin@pawanpte.com">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="timezone" class="form-label">Timezone</label>
                                <select class="form-select" id="timezone">
                                    <option value="IST" selected>India Standard Time (IST)</option>
                                    <option value="UTC">UTC</option>
                                    <option value="PST">Pacific Standard Time (PST)</option>
                                    <option value="EST">Eastern Standard Time (EST)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="dateFormat" class="form-label">Date Format</label>
                                <select class="form-select" id="dateFormat">
                                    <option value="d-m-Y" selected>DD-MM-YYYY</option>
                                    <option value="m-d-Y">MM-DD-YYYY</option>
                                    <option value="Y-m-d">YYYY-MM-DD</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="siteDescription" class="form-label">Site Description</label>
                                <textarea class="form-control" id="siteDescription"
                                    rows="3">Premium PTE Academic preparation platform with expert guidance and comprehensive study materials.</textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save General Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Payment Settings Card -->
        <div class="card settings-card">
            <div class="card-header d-flex align-items-center">
                <div class="settings-icon icon-success">
                    <i class="fas fa-credit-card"></i>
                </div>
                <h5>Payment Settings</h5>
            </div>
            <div class="card-body">
                <div class="settings-section">
                    <form id="paymentSettingsForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="currency" class="form-label">Currency</label>
                                <select class="form-select" id="currency">
                                    <option value="INR" selected>Indian Rupee (₹)</option>
                                    <option value="USD">US Dollar ($)</option>
                                    <option value="EUR">Euro (€)</option>
                                    <option value="GBP">British Pound (£)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="taxRate" class="form-label">Tax Rate (%)</label>
                                <input type="number" class="form-control" id="taxRate" value="18" step="0.1">
                            </div>
                        </div>
                        <h6 class="mb-3">Payment Methods</h6>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="paypalEnabled" checked>
                                    <label class="form-check-label" for="paypalEnabled">PayPal</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="stripeEnabled" checked>
                                    <label class="form-check-label" for="stripeEnabled">Stripe</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="razorpayEnabled" checked>
                                    <label class="form-check-label" for="razorpayEnabled">Razorpay</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="bankTransferEnabled">
                                    <label class="form-check-label" for="bankTransferEnabled">Bank Transfer</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save Payment Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Notification Settings Card -->
        <div class="card settings-card">
            <div class="card-header d-flex align-items-center">
                <div class="settings-icon icon-info">
                    <i class="fas fa-bell"></i>
                </div>
                <h5>Notification Settings</h5>
            </div>
            <div class="card-body">
                <div class="settings-section">
                    <form id="notificationSettingsForm">
                        <h6 class="mb-3">Email Notifications</h6>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailEnrollments" checked>
                                    <label class="form-check-label" for="emailEnrollments">New Enrollments</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailPayments" checked>
                                    <label class="form-check-label" for="emailPayments">Payment Notifications</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailSupport" checked>
                                    <label class="form-check-label" for="emailSupport">Support Requests</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailReviews">
                                    <label class="form-check-label" for="emailReviews">New Reviews</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailCompletion" checked>
                                    <label class="form-check-label" for="emailCompletion">Course Completions</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailNewsletter">
                                    <label class="form-check-label" for="emailNewsletter">Newsletters</label>
                                </div>
                            </div>
                        </div>

                        <h6 class="mb-3">SMS Notifications</h6>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="smsEnrollments">
                                    <label class="form-check-label" for="smsEnrollments">New Enrollments</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="smsImportant">
                                    <label class="form-check-label" for="smsImportant">Important Alerts</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="smsPayments">
                                    <label class="form-check-label" for="smsPayments">Payment Confirmations</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="smsSupport">
                                    <label class="form-check-label" for="smsSupport">Support Updates</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save Notification Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Security Settings Card -->
        <div class="card settings-card">
            <div class="card-header d-flex align-items-center">
                <div class="settings-icon icon-warning">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h5>Security Settings</h5>
            </div>
            <div class="card-body">
                <div class="settings-section">
                    <form id="securitySettingsForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="passwordLength" class="form-label">Minimum Password Length</label>
                                <input type="number" class="form-control" id="passwordLength" value="8" min="6"
                                    max="20">
                            </div>
                            <div class="col-md-6">
                                <label for="sessionTimeout" class="form-label">Session Timeout (minutes)</label>
                                <input type="number" class="form-control" id="sessionTimeout" value="30" min="5"
                                    max="240">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="twoFactorAuth" checked>
                                    <label class="form-check-label" for="twoFactorAuth">Enable Two-Factor
                                        Authentication</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="ipWhitelisting">
                                    <label class="form-check-label" for="ipWhitelisting">IP Whitelisting</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="loginAlerts" checked>
                                    <label class="form-check-label" for="loginAlerts">Login Alerts</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="apiAccess">
                                    <label class="form-check-label" for="apiAccess">API Access</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save Security Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- System Maintenance Card -->
        <div class="card settings-card">
            <div class="card-header d-flex align-items-center">
                <div class="settings-icon icon-danger">
                    <i class="fas fa-tools"></i>
                </div>
                <h5>System Maintenance</h5>
            </div>
            <div class="card-body">
                <div class="settings-section">
                    <form id="maintenanceSettingsForm">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="maintenanceMode">
                                    <label class="form-check-label" for="maintenanceMode">Maintenance Mode</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="autoBackup" checked>
                                    <label class="form-check-label" for="autoBackup">Automatic Backups</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="errorLogging" checked>
                                    <label class="form-check-label" for="errorLogging">Error Logging</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="performanceMonitor" checked>
                                    <label class="form-check-label" for="performanceMonitor">Performance
                                        Monitoring</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="backupFrequency" class="form-label">Backup Frequency</label>
                                <select class="form-select" id="backupFrequency">
                                    <option value="daily">Daily</option>
                                    <option value="weekly" selected>Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="backupRetention" class="form-label">Backup Retention (days)</label>
                                <input type="number" class="form-control" id="backupRetention" value="30" min="7"
                                    max="365">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-primary" id="clearCacheBtn">
                                <i class="fas fa-broom me-1"></i> Clear Cache
                            </button>
                            <div>
                                <button type="button" class="btn btn-outline-warning me-2" id="backupNowBtn">
                                    <i class="fas fa-download me-1"></i> Backup Now
                                </button>
                                <button type="submit" class="btn btn-primary">Save Maintenance Settings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Form submissions
        document.getElementById('generalSettingsForm').addEventListener('submit', function (e) {
            e.preventDefault();
            // In a real application, you would send this data to the server
            alert('General settings saved successfully!');
        });

        document.getElementById('paymentSettingsForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Payment settings saved successfully!');
        });

        document.getElementById('notificationSettingsForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Notification settings saved successfully!');
        });

        document.getElementById('securitySettingsForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Security settings saved successfully!');
        });

        document.getElementById('maintenanceSettingsForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Maintenance settings saved successfully!');
        });

        // Additional buttons functionality
        document.getElementById('clearCacheBtn').addEventListener('click', function () {
            if (confirm('Are you sure you want to clear all cache?')) {
                // In a real application, this would call a server-side script
                alert('Cache cleared successfully!');
            }
        });

        document.getElementById('backupNowBtn').addEventListener('click', function () {
            if (confirm('Create a system backup now?')) {
                // In a real application, this would call a server-side script
                alert('Backup process started. You will be notified when it completes.');
            }
        });

        // Toggle maintenance mode
        document.getElementById('maintenanceMode').addEventListener('change', function () {
            if (this.checked) {
                if (!confirm('Enabling maintenance mode will make the site unavailable to users. Continue?')) {
                    this.checked = false;
                }
            }
        });
    </script>
</body>

</html>