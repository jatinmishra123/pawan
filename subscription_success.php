<?php
// subscription_success

// Check if subscription ID is provided
if (!isset($_GET['subscription_id'])) {
    header("Location: index");
    exit();
}

$subscription_id = $_GET['subscription_id'];

// In a real application, you would fetch subscription details from the database
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Successful - Pawan PTE</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .success-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
        }

        .success-icon {
            font-size: 64px;
            color: #12d3bf;
            margin-bottom: 20px;
        }

        h1 {
            color: #0ba195;
            margin-bottom: 15px;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        .subscription-id {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 6px;
            font-family: monospace;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #12d3bf;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #0ba195;
        }
    </style>
</head>

<body>
    <div class="success-container">
        <div class="success-icon">✓</div>
        <h1>Subscription Successful!</h1>
        <p>Thank you for subscribing to Pawan PTE. Your subscription is now active.</p>
        <div class="subscription-id">Subscription ID: <?php echo htmlspecialchars($subscription_id); ?></div>
        <a href="index" class="btn">Return to Dashboard</a>
    </div>
</body>

</html>