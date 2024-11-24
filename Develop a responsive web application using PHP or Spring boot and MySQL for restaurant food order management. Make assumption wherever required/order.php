<?php include 'db.php'; ?>
 
<!DOCTYPE html>
<html>
<head>
   <title>Place Order</title>
</head>
<body>
   <?php
   $food_id = $_GET['food_id'];
   $food = $conn->query("SELECT * FROM menu WHERE id=$food_id")->fetch_assoc();
   ?>
   <h1>Order <?php echo $food['name']; ?></h1>
   <form method="POST" action="">
       <label>Your Name:</label>
       <input type="text" name="customer_name" required><br><br>
       <label>Quantity:</label>
       <input type="number" name="quantity" required><br><br>
       <button type="submit" name="submit">Place Order</button>
   </form>
 
   <?php
   if (isset($_POST['submit'])) {
       $customer_name = $_POST['customer_name'];
       $quantity = $_POST['quantity'];
       $total_price = $quantity * $food['price'];
 
       $sql = "INSERT INTO orders (customer_name, food_id, quantity, total_price)
               VALUES ('$customer_name', $food_id, $quantity, $total_price)";
       if ($conn->query($sql) === TRUE) {
           echo "Order placed successfully!";
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }
   }
   ?>
</body>
</html>
