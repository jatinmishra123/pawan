<?php
session_start();

// Sabhi session variables remove karo
$_SESSION = [];

// Session destroy karo
session_destroy();

// Login ya homepage par redirect
header("Location: index");
exit();
?>