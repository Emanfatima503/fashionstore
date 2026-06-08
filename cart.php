<?php
session_start();
include 'includes/db.php';
include 'navbar.php';

$total = 0;
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

<!-- CART SECTION -->
<section id="cart-section" class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 lg:grid-cols-3 gap-8">

<!-- LEFT: CART ITEMS -->
<div class="lg:col-span-2 bg-white p-6 rounded-xl shadow">

<h2 class="text-2xl font-bold mb-6">Shopping Cart</h2>

<?php
if(!empty($_SESSION['cart'])){

foreach($_SESSION['cart'] as $id => $qty){

$product = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM products WHERE id=$id")
);

$sub = $product['price'] * $qty;
$total += $sub;
?>

<!-- SINGLE ITEM -->
<!-- SINGLE ITEM -->
<div class="flex items-center justify-between border-b py-4 gap-4">

  <!-- IMAGE -->
  <div class="w-20 h-28 overflow-hidden rounded flex-shrink-0">
    <img src="images/products/<?php echo $product['image']; ?>"
         class="w-full h-full object-cover">
  </div>

  <!-- NAME + PRICE -->
  <div class="flex-1 min-w-0">
    <h3 class="font-semibold truncate">
      <?php echo $product['name']; ?>
    </h3>

    <p class="text-gray-500 text-sm">
      Rs <?php echo $product['price']; ?>
    </p>
  </div>

  <!-- QTY BUTTONS -->
  <div class="flex items-center gap-2 flex-shrink-0">

    <form method="post" action="update_cart.php">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="hidden" name="action" value="decrease">
      <button class="w-7 h-7 bg-gray-200 flex items-center justify-center rounded">
        -
      </button>
    </form>

    <span class="w-6 text-center">
      <?php echo $qty; ?>
    </span>

    <form method="post" action="update_cart.php">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="hidden" name="action" value="increase">
      <button class="w-7 h-7 bg-gray-200 flex items-center justify-center rounded">
        +
      </button>
    </form>

  </div>

  <!-- SUBTOTAL -->
  <div class="font-semibold w-20 text-right flex-shrink-0">
    Rs <?php echo $sub; ?>
  </div>

</div>

<?php } } else { ?>

<p class="text-gray-500">Your cart is empty.</p>

<?php } ?>

</div>

<!-- RIGHT: SUMMARY -->
<div class="bg-white p-6 rounded-xl shadow h-fit">

<h3 class="text-lg font-bold mb-4">Order Summary</h3>

<p class="flex justify-between">
  <span>Subtotal</span>
  <span>Rs <?php echo $total; ?></span>
</p>

<p class="flex justify-between mt-2">
  <span>Delivery</span>
  <span>Rs 300</span>
</p>

<hr class="my-3">

<p class="flex justify-between font-bold text-lg">
  <span>Total</span>
  <span>Rs <?php echo $total + 300; ?></span>
</p>

<a href="checkout.php"
   class="block text-center bg-black text-white mt-5 py-2 rounded">
   Checkout
</a>

</div>

</section>

</body>
</html>