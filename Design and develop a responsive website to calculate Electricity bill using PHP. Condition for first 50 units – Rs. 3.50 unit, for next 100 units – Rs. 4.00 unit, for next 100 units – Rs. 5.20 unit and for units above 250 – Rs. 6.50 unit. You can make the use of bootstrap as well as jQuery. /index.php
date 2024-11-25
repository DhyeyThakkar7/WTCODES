<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Electricity Bill Calculator</h2>
        <form id="billForm" method="POST" class="mt-4">
            <div class="form-group">
                <label for="units">Enter Units Consumed:</label>
                <input type="number" class="form-control" id="units" name="units" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate Bill</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $units = intval($_POST['units']);
            $bill = 0;

            if ($units <= 50) {
                $bill = $units * 3.50;
            } elseif ($units <= 150) {
                $bill = (50 * 3.50) + (($units - 50) * 4.00);
            } elseif ($units <= 250) {
                $bill = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
            } else {
                $bill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
            }

            echo "<div class='alert alert-success mt-4'>Total Bill: Rs. " . number_format($bill, 2) . "</div>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
