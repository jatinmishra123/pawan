<?php
include "inc/db";

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = sanitize_input($_POST["name"]);
    $email = sanitize_input($_POST["email"]);
    $card_number = sanitize_input($_POST["card_number"]);
    $expiry = sanitize_input($_POST["expiry"]);
    $cvv = sanitize_input($_POST["cvv"]);
    $plan_type = sanitize_input($_POST["plan_type"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Simulate payment success
    $subscription_id = uniqid('sub_');
    $start_date = date('Y-m-d');
    $end_date = date('Y-m-d', strtotime('+1 month'));
    $status = "active";
    $amount = get_plan_price($plan_type);

    // Store subscription in database (PDO)
    $stmt = $pdo->prepare("INSERT INTO subscriptions 
        (subscription_id, name, email, plan_type, start_date, end_date, status, amount) 
        VALUES (:subscription_id, :name, :email, :plan_type, :start_date, :end_date, :status, :amount)");

    $stmt->execute([
        ':subscription_id' => $subscription_id,
        ':name' => $name,
        ':email' => $email,
        ':plan_type' => $plan_type,
        ':start_date' => $start_date,
        ':end_date' => $end_date,
        ':status' => $status,
        ':amount' => $amount
    ]);

    if ($stmt) {
        header("Location: subscription_success?subscription_id=" . $subscription_id);
        exit();
    } else {
        echo "Error saving subscription.";
    }
}

// ---------- FUNCTIONS ----------
function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

function get_plan_price($plan_type)
{
    switch ($plan_type) {
        case 'basic':
            return 19.00;
        case 'premium':
            return 39.00;
        case 'vip':
            return 79.00;
        default:
            return 0.00;
    }
}
?>