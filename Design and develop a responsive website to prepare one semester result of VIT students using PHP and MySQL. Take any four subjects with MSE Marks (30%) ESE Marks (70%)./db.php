<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = "ruNNing5_"; // Your MySQL password
$dbname = "vit_results";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
