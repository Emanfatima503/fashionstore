<?php
include 'includes/db.php';

$cartCount = 0;
if(!empty($_SESSION['cart'])){
  foreach($_SESSION['cart'] as $q){
    $cartCount += $q;
  }
}

$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="bg-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

    <h1 class="text-2xl font-bold">Elegance</h1>

    <ul class="hidden sm:flex space-x-6 items-center">
      <li><a href="index.php" class="<?= $currentPage=='index.php'?'text-pink-500 font-semibold':'hover:text-pink-500' ?>">Home</a></li>
      <li><a href="shop.php" class="<?= $currentPage=='shop.php'?'text-pink-500 font-semibold':'hover:text-pink-500' ?>">Shop</a></li>
      <li><a href="about.php" class="<?= $currentPage=='about.php'?'text-pink-500 font-semibold':'hover:text-pink-500' ?>">About</a></li>
      <li><a href="privacy.php" class="<?= $currentPage=='privacy.php'?'text-pink-500 font-semibold':'hover:text-pink-500' ?>">Privacy</a></li>
      <li><a href="contact.php" class="<?= $currentPage=='contact.php'?'text-pink-500 font-semibold':'hover:text-pink-500' ?>">Contact</a></li>

   <li>
  <a href="cart.php" class="relative inline-block">
    
    <!-- CART ICON -->
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-6 h-6 inline-block"
         fill="none" viewBox="0 0 24 24"
         stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5 8h14l-1.5 12h-11L5 8z"/>
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 8V6a3 3 0 016 0v2"/>
    </svg>

    <!-- BADGE -->
    <?php if($cartCount > 0){ ?>
      <span class="absolute -top-2 -right-2 bg-pink-500 text-white text-[10px] w-4 h-4 flex items-center justify-center rounded-full">
        <?php echo $cartCount; ?>
      </span>
    <?php } ?>

  </a>
</li>
    </ul>

  </div>
</nav>