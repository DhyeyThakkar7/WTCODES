<?php
$host = 'localhost';
$dbname = 'user_sessions_db';
$username = 'root';
$password = 'ruNNing5_';
 
try {
   $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   die("Connection failed: " . $e->getMessage());
}
?>
