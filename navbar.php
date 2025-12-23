<?php

include 'includes/db.php';

/* CATEGORY FILTER */
$cat = $_GET['cat'] ?? 'all';
if($cat == 'all'){
    $query = "SELECT * FROM products";
} else {
    $query = "SELECT * FROM products WHERE LOWER(category) = LOWER('$cat')";
}
$res = mysqli_query($conn, $query);

/* CART COUNT */
$cartCount = 0;
if(!empty($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $qty) $cartCount += $qty;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Shop | Elegance</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<!-- NAVBAR -->
<nav class="bg-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">Elegance</h1>

    <!-- Desktop Links -->
    <ul class="hidden sm:flex space-x-6 items-center ml-auto">
      <li><a href="index.php" class="hover:text-pink-500">Home</a></li>
      <li><a href="shop.php" class="text-pink-500 font-semibold">Shop</a></li>
      <li><a href="about.php" class="hover:text-pink-500">About</a></li>
      <li><a href="privacy.php" class="hover:text-pink-500">Privacy</a></li>
      <li><a href="contact.php" class="hover:text-pink-500">Contact</a></li>
      <li class="relative">
        <a href="cart.php" class="font-semibold hover:text-pink-500 flex items-center">
          Cart
          <?php if($cartCount>0){ ?>
          <span class="ml-1 bg-pink-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full"><?php echo $cartCount; ?></span>
          <?php } ?>
        </a>
      </li>
    </ul>

    <!-- Mobile Icons -->
    <div class="sm:hidden flex items-center space-x-4">
      <!-- Cart Icon -->
      <a href="cart.php" class="relative">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14l-1.5 12h-11L5 8z"/>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8V6a3 3 0 016 0v2"/>
        </svg>
        <?php if($cartCount>0){ ?>
        <span class="absolute -top-2 -right-2 bg-pink-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full"><?php echo $cartCount; ?></span>
        <?php } ?>
      </a>

      <!-- Hamburger Menu -->
      <button id="mobile-menu-button" class="focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile Right Slide Menu -->
  <div id="mobile-menu" class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
    <div class="p-6">
      <ul class="flex flex-col space-y-4 mt-10">
        <li><a href="index.php" class="hover:text-pink-500">Home</a></li>
        <li><a href="shop.php" class="hover:text-pink-500">Shop</a></li>
        <li><a href="about.php" class="hover:text-pink-500">About</a></li>
        <li><a href="privacy.php" class="hover:text-pink-500">Privacy</a></li>
        <li><a href="contact.php" class="hover:text-pink-500">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<script>
const btn = document.getElementById('mobile-menu-button');
const menu = document.getElementById('mobile-menu');
btn.addEventListener('click', () => menu.classList.toggle('translate-x-full'));
</script>

<!-- PAGE TITLE -->
<section class="bg-white py-10">
  <h2 class="text-3xl font-bold text-center">Shop Collection</h2>
</section>

<!-- MAIN SECTION -->
<section class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">

  <!-- LEFT: FILTER -->
  <aside class="bg-white p-5 rounded-xl shadow h-fit">
    <h3 class="font-bold mb-4">Categories</h3>
    <ul class="space-y-2">
      <li><a href="shop.php?cat=all" class="hover:text-pink-500">All</a></li>
      <li><a href="shop.php?cat=Dress" class="hover:text-pink-500">Dresses</a></li>
      <li><a href="shop.php?cat=Abaya" class="hover:text-pink-500">Abayas</a></li>
      <li><a href="shop.php?cat=Bag" class="hover:text-pink-500">Bags</a></li>
    </ul>
  </aside>

  <!-- CENTER: PRODUCTS -->
  <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-8">
    <?php while($row = mysqli_fetch_assoc($res)){ ?>
    <div class="bg-white rounded-xl shadow p-4 hover:shadow-lg transition">
      <div class="h-[300px] flex items-center justify-center bg-gray-50 rounded-lg">
        <img src="images/products/<?php echo $row['image']; ?>" class="max-h-full max-w-full object-contain">
      </div>
      <h3 class="mt-3 font-semibold"><?php echo $row['name']; ?></h3>
      <p class="text-gray-600">Rs. <?php echo $row['price']; ?></p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button class="mt-3 w-full bg-black text-white py-2 rounded-full">Add to Cart</button>
      </form>
    </div>
    <?php } ?>
  </div>

  <!-- RIGHT: MINI CART -->
  <div class="bg-white p-4 rounded-xl shadow h-fit sticky top-24">
    <h3 class="font-bold mb-4">Your Cart</h3>
    <?php
    $total = 0;
    $cartItems = $_SESSION['cart'] ?? [];
    if(!empty($cartItems)){
      foreach($cartItems as $pid => $qty){
        $p = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE id=$pid"));
        $sub = $p['price'] * $qty;
        $total += $sub;
    ?>
    <div class="flex justify-between items-center text-sm mb-2">
      <span><?php echo $p['name']; ?> (<?php echo $qty; ?>)</span>
      <span class="font-semibold">Rs <?php echo $sub; ?></span>
    </div>
    <?php } ?>
    <hr class="my-3">
    <p class="font-bold">Total: Rs <?php echo $total; ?></p>
    <a href="cart.php" class="block mt-3 bg-black text-white text-center py-2 rounded-full">Checkout</a>
    <?php } else { ?>
    <p class="text-gray-500 text-sm">Cart is empty</p>
    <?php } ?>
  </div>

</section>
</body>
</html>
