<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . htmlspecialchars($_COOKIE['username']) . "!";
?>

<a href="logout.php">Logout</a>

