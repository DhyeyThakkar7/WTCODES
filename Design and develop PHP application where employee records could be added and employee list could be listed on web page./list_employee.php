<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM employees");
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
</head>
<body>
    <h1>Employee List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?php echo htmlspecialchars($employee['id']); ?></td>
            <td><?php echo htmlspecialchars($employee['name']); ?></td>
            <td><?php echo htmlspecialchars($employee['position']); ?></td>
            <td><?php echo htmlspecialchars($employee['email']); ?></td>
            <td><?php echo htmlspecialchars($employee['created_at']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="add_employee.php">Add New Employee</a>
</body>
</html>
