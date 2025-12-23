<?php
session_start();
include 'includes/db.php';

if(!isset($_GET['order_id'])){
    header("Location: index.php");
    exit;
}

$order_id = $_GET['order_id'];

// Fetch order details
$orderRes = mysqli_query($conn, "SELECT * FROM orders WHERE id=$order_id");
$order = mysqli_fetch_assoc($orderRes);

// Fetch order items
$itemsRes = mysqli_query($conn, "SELECT oi.*, p.name, p.image 
                                 FROM order_items oi 
                                 JOIN products p ON oi.product_id = p.id 
                                 WHERE oi.order_id=$order_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Order Success | Elegance</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<!-- NAVBAR -->
<nav class="bg-white shadow">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">Elegance</h1>
    <ul class="flex space-x-6">
      <li><a href="index.php" class="hover:text-pink-500">Home</a></li>
      <li><a href="shop.php" class="hover:text-pink-500">Shop</a></li>
      <li><a href="cart.php" class="hover:text-pink-500">Cart</a></li>
    </ul>
  </div>
</nav>

<section class="max-w-3xl mx-auto px-4 py-12">
  <div class="bg-white rounded-xl shadow p-6 text-center">
    <h2 class="text-3xl font-bold mb-4 text-green-600">Thank You!</h2>
    <p class="mb-4">Your order has been placed successfully.</p>
    <p class="mb-2">Order ID: <span class="font-semibold"><?php echo $order['id']; ?></span></p>
    <p class="mb-4">Total Amount: <span class="font-semibold">Rs <?php echo $order['total_amount']; ?></span></p>

    <h3 class="text-xl font-bold mb-3">Order Details</h3>

    <?php while($item = mysqli_fetch_assoc($itemsRes)){ ?>
      <div class="flex justify-between items-center mb-3 border-b pb-2">
        <div class="flex items-center gap-3">
          <div class="w-16 h-20 overflow-hidden rounded">
            <img src="images/products/<?php echo $item['image']; ?>" class="w-full h-full object-cover">
          </div>
          <span><?php echo $item['name']; ?> x <?php echo $item['quantity']; ?></span>
        </div>
        <span>Rs <?php echo $item['price'] * $item['quantity']; ?></span>
      </div>
    <?php } ?>

    <a href="index.php" class="inline-block mt-6 bg-black text-white px-6 py-2 rounded-full">
      Continue Shopping
    </a>
  </div>
</section>

</body>
</html>
