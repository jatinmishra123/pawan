<?php
// auth
session_start();
header('Content-Type: application/json');

require_once 'db.php'; // aapka PDO connection file

function respond($status, $message, $redirect = '')
{
    echo json_encode(['status' => $status, 'message' => $message, 'redirect' => $redirect]);
    exit;
}   

// REGISTER
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'register') {
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $number = trim($_POST['number'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    $user_type = $_POST['user_type'] ?? 'student';

    if (!$first_name || !$last_name || !$email || !$address || !$number || !$password || !$confirm) {
        respond('error', 'All fields are required.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        respond('error', 'Invalid email address.');
    }

    if ($password !== $confirm) {
        respond('error', 'Passwords do not match.');
    }

    try {
        // Check if email exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            respond('error', 'Email already registered.');
        }

        // Hash password
        $hashed = password_hash($password, PASSWORD_BCRYPT);

        // Insert user
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, number, address, password, user_type, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->execute([$first_name, $last_name, $email, $number, $address, $hashed, $user_type]);

        $user_id = $pdo->lastInsertId();

        // Set session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = "$first_name $last_name";
        $_SESSION['user_type'] = $user_type;

        respond('success', 'Registration successful', 'alumni');

    } catch (PDOException $e) {
        respond('error', 'Database error: ' . $e->getMessage());
    }
}

// LOGIN
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'login') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = $_POST['remember'] ?? false;

    if (!$email || !$password) {
        respond('error', 'Email and password are required.');
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND is_active = 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Update last login
            $stmt = $pdo->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
            $stmt->execute([$user['id']]);

            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
            $_SESSION['user_type'] = $user['user_type'];

            // Remember me cookie
            if ($remember) {
                $token = hash('sha256', $user['password']);
                setcookie("remember_me", $user['id'] . ":" . $token, time() + (86400 * 30), "/");
            }

            respond('success', 'Login successful', 'alumni');

        } else {
            respond('error', 'Invalid email or password.');
        }

    } catch (PDOException $e) {
        respond('error', 'Database error: ' . $e->getMessage());
    }
}

// If request not recognized
respond('error', 'Invalid request.');
?>