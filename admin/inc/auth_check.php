<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../inc/db.php';

header('Content-Type: application/json'); // force JSON output

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = !empty($_POST['remember']);

    if (!$email || !$password) {
        echo json_encode(['status' => 'error', 'message' => 'Email and password are required']);
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = ? AND is_active = 1 LIMIT 1");
    $stmt->execute([$email]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($password, $admin['password'])) {
        // Save session
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_email'] = $admin['email'];
        $_SESSION['admin_name'] = $admin['name'];
        $_SESSION['admin_role'] = $admin['role'];

        // Update last login
        $pdo->prepare("UPDATE admins SET last_login_at = NOW() WHERE id = ?")
            ->execute([$admin['id']]);

        // Remember me
        if ($remember) {
            $token = bin2hex(random_bytes(32));
            $pdo->prepare("UPDATE admins SET remember_token = ? WHERE id = ?")
                ->execute([$token, $admin['id']]);
            setcookie('remember_me', $admin['id'] . ':' . $token, time() + (86400 * 30), "/");
        }

        echo json_encode(['status' => 'success', 'redirect' => '/pawan_pte/admin/dashboard.php']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
    }
    exit;
}

// fallback if wrong request
echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
exit;
