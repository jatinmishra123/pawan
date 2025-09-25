<?php
// Database configuration
define('DB_HOST', 'localhost'); // Agar AWS RDS ho to yaha endpoint daalein
define('DB_NAME', 'pawan_pte');
define('DB_USER', 'root');      // DB username
define('DB_PASS', '');          // DB password

try {
    $pdoOptions = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // Errors ko exceptions banaye
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   // Associative array me fetch kare
        PDO::ATTR_EMULATE_PREPARES => false,                // Real prepared statements
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
    ];

    // PDO instance
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, $pdoOptions);

} catch (PDOException $e) {
    // Error log karein aur user-friendly message
    error_log("Database connection failed: " . $e->getMessage());
    exit('A database error occurred. Please try again later.');
}
?>
