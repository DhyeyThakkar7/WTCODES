<?php include 'db.php'; ?>
 
<!DOCTYPE html>
<html>
<head>
   <title>Orders</title>
</head>
<body>
   <h1>All Orders</h1>
   <table border="1">
       <tr>
           <th>Order ID</th>
           <th>Customer Name</th>
           <th>Food Item</th>
           <th>Quantity</th>
           <th>Total Price</th>
           <th>Status</th>
           <th>Action</th>
       </tr>
       <?php
       $result = $conn->query("SELECT orders.*, menu.name AS food_name
                               FROM orders JOIN menu ON orders.food_id = menu.id");
       while ($row = $result->fetch_assoc()) {
           echo "<tr>
                   <td>{$row['id']}</td>
                   <td>{$row['customer_name']}</td>
                   <td>{$row['food_name']}</td>
                   <td>{$row['quantity']}</td>
                   <td>{$row['total_price']} ₹</td>
                   <td>{$row['status']}</td>
                   <td>
                       <form method='POST'>
                           <input type='hidden' name='order_id' value='{$row['id']}'>
                           <button type='submit' name='complete'>Mark as Completed</button>
                       </form>
                   </td>
                 </tr>";
       }
 
       if (isset($_POST['complete'])) {
           $order_id = $_POST['order_id'];
           $conn->query("UPDATE orders SET status='Completed' WHERE id=$order_id");
           echo "<script>window.location.reload();</script>";
       }
       ?>
   </table>
</body>
</html>
