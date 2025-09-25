<?php
session_start();
require_once __DIR__ . '/../../inc/db.php';

// Remember me cookie se session restore karna
if (!isset($_SESSION['admin_id']) && isset($_COOKIE['remember_me'])) {
    list($adminId, $token) = explode(':', $_COOKIE['remember_me']);
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE id = ? AND is_active = 1 LIMIT 1");
    $stmt->execute([$adminId]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && hash_equals($admin['remember_token'], $token)) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_email'] = $admin['email'];
        $_SESSION['admin_name'] = $admin['name'];
        $_SESSION['admin_role'] = $admin['role'];
    }
}

// Sirf login check
if (!isset($_SESSION['admin_id'])) {
    header("Location: /pawan_pte/admin/login.php");
    exit;
}
