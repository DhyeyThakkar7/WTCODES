<?php include 'db.php'; ?>
 
<!DOCTYPE html>
<html>
<head>
   <title>Food Menu</title>
   <style>
       .menu-item {
           border: 1px solid #ccc;
           padding: 10px;
           margin: 10px;
           border-radius: 5px;
       }
   </style>
</head>
<body>
   <h1>Food Menu</h1>
   <?php
   $result = $conn->query("SELECT * FROM menu");
   while ($row = $result->fetch_assoc()) {
       echo "<div class='menu-item'>
               <h3>{$row['name']} - {$row['price']} ₹</h3>
               <p>{$row['description']}</p>
               <a href='order.php?food_id={$row['id']}'>Order Now</a>
             </div>";
   }
   ?>
</body>
</html>
