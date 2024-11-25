<?php
session_start();
include 'db.php';
 
$current_session = session_id();
 
// Remove session from the database
$stmt = $conn->prepare("DELETE FROM user_sessions WHERE session_id = :session_id");
$stmt->bindParam(':session_id', $current_session);
$stmt->execute();
 
session_destroy();
echo "You have been logged out.";
?>
