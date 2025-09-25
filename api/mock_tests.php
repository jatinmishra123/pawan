<?php
header("Content-Type: application/json");
require_once "../inc/db.php";

// Fetch all mock tests
$stmt = $pdo->query("SELECT id, title, description, image FROM mock_tests ORDER BY id DESC");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
