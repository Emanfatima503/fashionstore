<?php
session_start();
include 'includes/db.php';

/* CART COUNT */
$cartCount = 0;
if(!empty($_SESSION['cart'])){
  foreach($_SESSION['cart'] as $q){
    $cartCount += $q;
  }
}

/* Determine active page */
$currentPage = basename($_SERVER['PHP_SELF']);

/* CART ITEMS */
$total = 0;
$cartItems = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Elegance | Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<!-- NAVBAR -->
<nav class="bg-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">Elegance</h1>

    <!-- Desktop Links -->
    <ul class="hidden sm:flex space-x-6 items-center">
      <li><a href="index.php" class="<?php echo $currentPage=='index.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Home</a></li>
      <li><a href="shop.php" class="<?php echo $currentPage=='shop.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Shop</a></li>
      <li><a href="about.php" class="<?php echo $currentPage=='about.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">About</a></li>
      <li><a href="privacy.php" class="<?php echo $currentPage=='privacy.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Privacy</a></li>
      <li><a href="contact.php" class="<?php echo $currentPage=='contact.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Contact</a></li>

      <!-- Cart Desktop -->
      <li class="relative">
        <a href="cart.php" class="hover:text-pink-500 relative inline-block">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 8h14l-1.5 12h-11L5 8z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 8V6a3 3 0 016 0v2"/>
          </svg>
          <?php if($cartCount>0){ ?>
            <span class="absolute -top-2 right-0 bg-pink-500 text-white text-[10px] w-4 h-4 flex items-center justify-center rounded-full">
              <?php echo $cartCount; ?>
            </span>
          <?php } ?>
        </a>
      </li>
    </ul>

    <!-- Mobile Icons -->
    <div class="sm:hidden flex items-center space-x-4">
      <a href="cart.php" class="relative inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 8h14l-1.5 12h-11L5 8z"/>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 8V6a3 3 0 016 0v2"/>
        </svg>
        <?php if($cartCount>0){ ?>
          <span class="absolute -top-1 right-0 bg-pink-500 text-white text-[10px] w-4 h-4 flex items-center justify-center rounded-full">
            <?php echo $cartCount; ?>
          </span>
        <?php } ?>
      </a>

      <button id="mobile-menu-button" class="focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="sm:hidden hidden bg-white shadow-md">
    <ul class="flex flex-col space-y-2 p-4">
      <li><a href="index.php" class="<?php echo $currentPage=='index.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Home</a></li>
      <li><a href="shop.php" class="<?php echo $currentPage=='shop.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Shop</a></li>
      <li><a href="about.php" class="<?php echo $currentPage=='about.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">About</a></li>
      <li><a href="privacy.php" class="<?php echo $currentPage=='privacy.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Privacy</a></li>
      <li><a href="contact.php" class="<?php echo $currentPage=='contact.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Contact</a></li>
    </ul>
  </div>
</nav>

<script>
const btn = document.getElementById('mobile-menu-button');
const menu = document.getElementById('mobile-menu');
btn.addEventListener('click', () => menu.classList.toggle('hidden'));
</script>

<!-- HERO SECTION -->
<section class="relative w-full">
  <div class="hidden sm:block h-[70vh] bg-cover bg-center" style="background-image: url('images/banners/image.png');">
    <div class="bg-black/50 w-full h-full flex items-center justify-center">
      <div class="text-white text-center px-4">
        <h2 class="text-4xl font-bold mb-3">New Fashion Collection</h2>
        <p class="mb-5">Elegant • Modern • Stylish</p>
        <a href="shop.php" class="bg-white text-black px-6 py-2 rounded-full">Shop Now</a>
      </div>
    </div>
  </div>

  <div class="block sm:hidden h-[60vh] flex items-center justify-center bg-black">
    <img src="images/banners/image.png" class="max-w-full max-h-full object-contain" alt="Banner">
    <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
      <div class="text-white text-center px-4">
        <h2 class="text-3xl font-bold mb-3">New Fashion Collection</h2>
        <p class="mb-5 text-sm">Elegant • Modern • Stylish</p>
        <a href="shop.php" class="bg-white text-black px-6 py-2 rounded-full">Shop Now</a>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED PRODUCTS + MINI CART -->
<section class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">

  <!-- PRODUCTS GRID -->
  <div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    <?php
    $res = mysqli_query($conn,"SELECT * FROM products");
    while($row = mysqli_fetch_assoc($res)){
    ?>
    <div class="bg-white rounded-xl shadow p-4 hover:shadow-lg transition">
      <div class="h-[320px] overflow-hidden rounded-lg">
        <img src="images/products/<?php echo $row['image']; ?>" class="w-full h-full object-cover">
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

  <!-- MINI CART -->
  <div class="bg-white p-4 rounded-xl shadow h-fit sticky top-24">
    <h3 class="font-bold mb-4">Your Cart</h3>
    <?php if(!empty($cartItems)){
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
