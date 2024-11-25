<?php
session_start();
include 'db.php';
 
$user_id = 1; // Replace with actual user ID after authentication
$current_session = session_id();
$timeout_minutes = 5;
$max_sessions = 3;
 
// Expire old sessions
$expiration_time = date('Y-m-d H:i:s', strtotime("-$timeout_minutes minutes"));
$stmt = $conn->prepare("DELETE FROM user_sessions WHERE last_activity < :expiration_time");
$stmt->bindParam(':expiration_time', $expiration_time);
$stmt->execute();
 
// Check active sessions
$stmt = $conn->prepare("SELECT COUNT(*) AS session_count FROM user_sessions WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
 
if ($result['session_count'] >= $max_sessions) {
   die("You have reached the maximum number of concurrent sessions.");
}
 
// Add current session to the database
$stmt = $conn->prepare("INSERT INTO user_sessions (user_id, session_id, last_activity) VALUES (:user_id, :session_id, NOW())
   ON DUPLICATE KEY UPDATE last_activity = NOW()");
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':session_id', $current_session);
$stmt->execute();
 
echo "Login successful. Session started.";
?>
