<?php
$cartCount = 0;
if(!empty($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $q) $cartCount += $q;
}

/* Determine active page */
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="bg-white shadow sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

    <!-- Logo -->
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
        <a href="cart.php" class="hover:text-pink-500">
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
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 8h14l-1.5 12h-11L5 8z"/>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 8V6a3 3 0 016 0v2"/>
        </svg>
        <?php if($cartCount>0){ ?>
          <span class="absolute -top-2 -right-2 bg-pink-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full"><?php echo $cartCount; ?></span>
        <?php } ?>
      </a>

      <!-- Hamburger Menu -->
      <button id="mobile-menu-button" class="focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </div>

<!-- Mobile Menu (Right Slide) -->
<div id="mobile-menu" class="sm:hidden fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
  <div class="p-6 flex flex-col space-y-4">
    <button id="mobile-menu-close" class="self-end text-gray-500 hover:text-black">
      &times; <!-- Close Icon -->
    </button>
    <a href="index.php" class="<?php echo $currentPage=='index.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Home</a>
    <a href="shop.php" class="<?php echo $currentPage=='shop.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Shop</a>
    <a href="about.php" class="<?php echo $currentPage=='about.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">About</a>
    <a href="privacy.php" class="<?php echo $currentPage=='privacy.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Privacy</a>
    <a href="contact.php" class="<?php echo $currentPage=='contact.php'?'text-pink-500 font-semibold':'hover:text-pink-500'; ?>">Contact</a>
  </div>
</div>

</nav>

<script>
  const btn = document.getElementById('mobile-menu-button');
  const menu = document.getElementById('mobile-menu');
  const closeBtn = document.getElementById('mobile-menu-close');

  // Open menu
  btn.addEventListener('click', () => {
    menu.classList.remove('translate-x-full');
    menu.classList.add('translate-x-0');
  });

  // Close menu
  closeBtn.addEventListener('click', () => {
    menu.classList.remove('translate-x-0');
    menu.classList.add('translate-x-full');
  });
</script>

