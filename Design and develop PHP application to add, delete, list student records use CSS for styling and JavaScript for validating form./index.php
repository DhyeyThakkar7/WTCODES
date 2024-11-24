<?php
session_start();

// Initialize student records
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

// Handle form submission for adding students
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_student'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $age = htmlspecialchars(trim($_POST['age']));
    
    if ($name && $age) {
        $_SESSION['students'][] = ['name' => $name, 'age' => $age];
    }
}

// Handle student deletion
if (isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    if (isset($_SESSION['students'][$index])) {
        unset($_SESSION['students'][$index]);
        $_SESSION['students'] = array_values($_SESSION['students']); // Re-index the array
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Student Management</title>
</head>
<body>
    <div class="container">
        <h1>Student Management System</h1>
        <form id="studentForm" method="POST" onsubmit="return validateForm()">
            <input type="text" name="name" placeholder="Student Name" required>
            <input type="number" name="age" placeholder="Student Age" required>
            <button type="submit" name="add_student">Add Student</button>
        </form>
        
        <h2>Student List</h2>
        <ul>
            <?php foreach ($_SESSION['students'] as $index => $student): ?>
                <li>
                    <?php echo $student['name'] . ' (' . $student['age'] . ' years)'; ?>
                    <a href="?delete=<?php echo $index; ?>" class="delete">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
