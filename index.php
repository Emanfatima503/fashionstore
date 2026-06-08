<?php
session_start();
include 'includes/db.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Home | Elegance</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

<!-- HERO SECTION -->
<section class="relative h-[60vh] flex items-center justify-center text-center text-white">

  <!-- BACKGROUND IMAGE -->
  <div class="absolute inset-0">
    <img src="images/banners/banner.png"
         class="w-full h-full object-cover">
  </div>

  <!-- DARK OVERLAY -->
  <div class="absolute inset-0 bg-black/50"></div>

  <!-- TEXT -->
  <div class="relative z-10">
    <h1 class="text-4xl font-bold mb-3">Welcome to Elegance</h1>
    <p class="text-lg">Elegant • Modern • Stylish Fashion Store</p>
    <a href="shop.php"
       class="inline-block mt-5 bg-white text-black px-6 py-2 rounded-full">
      Shop Now
    </a>
  </div>

</section>
<!-- PRODUCTS SECTION -->
<section class="max-w-7xl mx-auto px-4 py-12">

<h2 class="text-2xl font-bold mb-6 text-center">Featured Products</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

<?php
$res = mysqli_query($conn,"SELECT * FROM products");

while($row = mysqli_fetch_assoc($res)){
?>

<!-- PRODUCT CARD -->
<div class="bg-white rounded-xl shadow p-4 hover:shadow-lg transition">

  <!-- IMAGE -->
  <div class="h-72 overflow-hidden rounded-lg">
    <img src="images/products/<?php echo $row['image']; ?>"
         class="w-full h-full object-cover">
  </div>

  <!-- NAME -->
  <h3 class="mt-3 font-semibold text-lg">
    <?php echo $row['name']; ?>
  </h3>

  <!-- PRICE -->
  <p class="text-gray-600">
    Rs <?php echo $row['price']; ?>
  </p>

  <!-- ADD TO CART -->
  <form method="post" action="add_to_cart.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <button class="mt-3 w-full bg-black text-white py-2 rounded-full">
      Add to Cart
    </button>
  </form>

</div>

<?php } ?>

</div>
</section>

</body>
</html>