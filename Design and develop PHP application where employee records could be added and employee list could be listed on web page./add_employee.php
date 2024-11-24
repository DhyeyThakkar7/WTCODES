<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO employees (name, position, email) VALUES (?, ?, ?)");
    $stmt->execute([$name, $position, $email]);

    header("Location: list_employees.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
    <h1>Add Employee</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Position:</label>
        <input type="text" name="position" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Add Employee">
    </form>
    <br>
    <a href="list_employees.php">View Employee List</a>
</body>
</html>
