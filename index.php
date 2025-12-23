<?php
session_start();
include 'includes/db.php';
include 'navbar.php';




/* CART TOTAL */
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
