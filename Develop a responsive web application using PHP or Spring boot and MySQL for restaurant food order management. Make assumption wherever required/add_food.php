<?php include 'db.php'; ?>
 
<!DOCTYPE html>
<html>
<head>
   <title>Add Food Item</title>
</head>
<body>
   <h1>Add Food to Menu</h1>
   <form method="POST" action="">
       <label>Food Name:</label>
       <input type="text" name="name" required><br><br>
       <label>Description:</label>
       <textarea name="description" required></textarea><br><br>
       <label>Price:</label>
       <input type="number" step="0.01" name="price" required><br><br>
       <button type="submit" name="submit">Add Food</button>
   </form>
 
   <?php
   if (isset($_POST['submit'])) {
       $name = $_POST['name'];
       $description = $_POST['description'];
       $price = $_POST['price'];
 
       $sql = "INSERT INTO menu (name, description, price) VALUES ('$name', '$description', $price)";
       if ($conn->query($sql) === TRUE) {
           echo "Food added successfully!";
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }
   }
   ?>
</body>
</html>
