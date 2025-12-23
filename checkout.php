<?php
session_start();
include 'includes/db.php';

// Handle form submission
if(isset($_POST['place_order'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $total = 0;
    foreach($_SESSION['cart'] as $pid => $qty){
        $res = mysqli_query($conn, "SELECT * FROM products WHERE id=$pid");
        $p = mysqli_fetch_assoc($res);
        $total += $p['price'] * $qty;
    }
    $total += 300; // delivery charge

    // Insert order
    $stmt = $conn->prepare("INSERT INTO orders (name,email,phone,address,total_amount) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssssi",$name,$email,$phone,$address,$total);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    // Insert order items
    foreach($_SESSION['cart'] as $pid => $qty){
        $res = mysqli_query($conn, "SELECT * FROM products WHERE id=$pid");
        $p = mysqli_fetch_assoc($res);
        $price = $p['price'];
        $stmt2 = $conn->prepare("INSERT INTO order_items (order_id,product_id,quantity,price) VALUES (?,?,?,?)");
        $stmt2->bind_param("iiii",$order_id,$pid,$qty,$price);
        $stmt2->execute();
    }

    // Clear cart
    unset($_SESSION['cart']);

    header("Location: order_success.php?order_id=$order_id");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout | Elegance</title>
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

<section class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 lg:grid-cols-3 gap-8">

<!-- LEFT: CUSTOMER FORM -->
<div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
<h2 class="text-2xl font-bold mb-6">Billing Details</h2>

<form method="post">
  <div class="mb-4">
    <label class="block font-semibold mb-1">Full Name</label>
    <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
  </div>

  <div class="mb-4">
    <label class="block font-semibold mb-1">Email</label>
    <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
  </div>

  <div class="mb-4">
    <label class="block font-semibold mb-1">Phone</label>
    <input type="text" name="phone" class="w-full border px-3 py-2 rounded" required>
  </div>

  <div class="mb-4">
    <label class="block font-semibold mb-1">Address</label>
    <textarea name="address" class="w-full border px-3 py-2 rounded" rows="4" required></textarea>
  </div>

  <button type="submit" name="place_order"
          class="bg-black text-white px-6 py-2 rounded-full">Place Order</button>
</form>
</div>

<!-- RIGHT: ORDER SUMMARY -->
<div class="bg-white p-6 rounded-xl shadow h-fit">
<h3 class="font-bold mb-4 text-lg">Order Summary</h3>

<?php
$total = 0;
if(!empty($_SESSION['cart'])){
  foreach($_SESSION['cart'] as $pid => $qty){
    $res = mysqli_query($conn,"SELECT * FROM products WHERE id=$pid");
    $row = mysqli_fetch_assoc($res);
    $sub = $row['price'] * $qty;
    $total += $sub;
?>
<div class="flex justify-between mb-2">
  <span><?php echo $row['name']; ?> x <?php echo $qty; ?></span>
  <span>Rs <?php echo $sub; ?></span>
</div>
<?php } } ?>

<hr class="my-3">
<div class="flex justify-between font-bold text-lg">
  <span>Total (incl. Delivery)</span>
  <span>Rs <?php echo $total + 300; ?></span>
</div>
</div>

</section>
</body>
</html>
