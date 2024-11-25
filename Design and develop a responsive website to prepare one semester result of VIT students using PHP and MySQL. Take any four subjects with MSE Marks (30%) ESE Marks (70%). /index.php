<?php
include 'db.php';

// Fetch students
$students = $conn->query("SELECT * FROM students");

// Fetch subjects
$subjects = $conn->query("SELECT * FROM subjects");

// Fetch results for display
$results = $conn->query("
    SELECT students.name AS student_name, subjects.name AS subject_name, results.mse_marks, results.ese_marks
    FROM results
    JOIN students ON results.student_id = students.id
    JOIN subjects ON results.subject_id = subjects.id
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>VIT Semester Results</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">VIT Semester Result Preparation</h1>
        <form action="submit_results.php" method="POST" class="mt-4">
            <div class="form-group">
                <label for="student">Select Student</label>
                <select name="student_id" id="student" class="form-control" required>
                    <?php while ($student = $students->fetch_assoc()): ?>
                        <option value="<?= $student['id'] ?>"><?= $student['name'] ?> (<?= $student['roll_number'] ?>)</option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subject">Select Subject</label>
                <select name="subject_id" id="subject" class="form-control" required>
                    <?php while ($subject = $subjects->fetch_assoc()): ?>
                        <option value="<?= $subject['id'] ?>"><?= $subject['name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="mse_marks">MSE Marks (30%)</label>
                <input type="number" name="mse_marks" id="mse_marks" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ese_marks">ESE Marks (70%)</label>
                <input type="number" name="ese_marks" id="ese_marks" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Results</button>
        </form>

        <div class="mt-5">
            <h2>Results</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Subject</th>
                        <th>MSE Marks</th>
                        <th>ESE Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $results->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['student_name'] ?></td>
                            <td><?= $row['subject_name'] ?></td>
                            <td><?= $row['mse_marks'] ?></td>
                            <td><?= $row['ese_marks'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
