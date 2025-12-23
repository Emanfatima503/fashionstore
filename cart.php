<?php
session_start();
include 'includes/db.php';
include 'navbar.php';
$total=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Cart | Elegance</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<section class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 lg:grid-cols-3 gap-8">

<div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
<h2 class="text-2xl font-bold mb-6">Shopping Cart</h2>
<?php
if(!empty($_SESSION['cart'])){
  foreach($_SESSION['cart'] as $id=>$qty){
    $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE id=$id"));
    $sub=$row['price']*$qty; $total+=$sub;
?>
<div class="flex justify-between mb-6 border-b pb-4 items-center">
  <div class="w-24 h-32 overflow-hidden rounded-lg">
    <img src="images/products/<?php echo $row['image']; ?>" class="w-full h-full object-cover">
  </div>
  <div class="flex-1 px-4">
    <h3 class="font-semibold text-lg"><?php echo $row['name']; ?></h3>
    <p class="text-gray-600">Rs. <?php echo $row['price']; ?> each</p>
  </div>
  <div class="flex items-center space-x-2">
    <form method="post" action="update_cart.php">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="hidden" name="action" value="decrease">
      <button class="px-3 py-1 bg-gray-200 rounded">−</button>
    </form>
    <span class="px-2 font-semibold"><?php echo $qty; ?></span>
    <form method="post" action="update_cart.php">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="hidden" name="action" value="increase">
      <button class="px-3 py-1 bg-gray-200 rounded">+</button>
    </form>
  </div>
  <div class="ml-4 font-semibold whitespace-nowrap">Rs <?php echo $sub; ?></div>
</div>
<?php } } else { echo "<p class='text-gray-500'>Your cart is empty.</p>"; } ?>
</div>

<div class="bg-white p-6 rounded-xl shadow h-fit">
<h3 class="font-bold mb-4 text-lg">Order Summary</h3>
<div class="flex justify-between mb-2 text-gray-600"><span>Subtotal</span><span>Rs. <?php echo $total;?></span></div>
<div class="flex justify-between mb-2 text-gray-600"><span>Delivery</span><span>Rs. 300</span></div>
<hr class="my-3">
<div class="flex justify-between font-bold text-lg"><span>Total</span><span>Rs. <?php echo $total+300;?></span></div>
<a href="checkout.php" class="block text-center bg-black text-white mt-4 py-2 rounded">Checkout</a>
</div>

</section>
</body>
</html>
