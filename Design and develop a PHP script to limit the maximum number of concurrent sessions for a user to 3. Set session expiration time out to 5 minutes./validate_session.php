<?php
session_start();
include 'db.php';
 
$current_session = session_id();
 
// Check if the session exists and is valid
$stmt = $conn->prepare("SELECT * FROM user_sessions WHERE session_id = :session_id");
$stmt->bindParam(':session_id', $current_session);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
 
if (!$result) {
   die("Your session has expired. Please log in again.");
}
 
// Update the last activity time
$stmt = $conn->prepare("UPDATE user_sessions SET last_activity = NOW() WHERE session_id = :session_id");
$stmt->bindParam(':session_id', $current_session);
$stmt->execute();
 
echo "Session validated.";
?>
