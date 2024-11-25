<?php
$host = 'localhost';
$db = 'user_management';
$user = 'root'; // Change as necessary
$pass = '122121'; // Change as necessary

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>
