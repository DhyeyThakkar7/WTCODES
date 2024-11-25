<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $mse_marks = $_POST['mse_marks'];
    $ese_marks = $_POST['ese_marks'];

    $sql = "INSERT INTO results (student_id, subject_id, mse_marks, ese_marks) VALUES ('$student_id', '$subject_id', '$mse_marks', '$ese_marks')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: index.php");
?>
