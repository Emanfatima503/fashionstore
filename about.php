<?php
session_start();
include 'includes/db.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About | Elegance</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<section class="max-w-5xl mx-auto px-4 py-16 space-y-12">

  <!-- Page Title -->
  <h1 class="text-3xl sm:text-4xl font-bold text-center text-gray-800">About Elegance</h1>

  <!-- Introduction -->
  <div class="text-gray-700 text-base sm:text-lg space-y-4 leading-relaxed">
    <p>
      Elegance is a premium fashion store offering a curated collection of dresses, abayas, and stylish bags.
      We focus on quality, modern designs, and affordability to ensure you look and feel your best.
    </p>

    <p>
      Our mission is to provide elegant fashion solutions for women who appreciate style and comfort.
      Every piece in our collection combines timeless elegance with contemporary trends.
    </p>

    <p>
      Customer satisfaction is at the heart of everything we do. From fast delivery to seamless shopping experience,
      we strive to make your fashion journey enjoyable and memorable.
    </p>
  </div>

  <!-- Highlight Boxes -->
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
    <div class="bg-white rounded-xl shadow-md p-6">
      <h2 class="text-xl font-semibold mb-2">Our Vision</h2>
      <p class="text-gray-600 text-sm">
        To empower every woman with elegant, comfortable, and stylish fashion choices.
      </p>
    </div>
    <div class="bg-white rounded-xl shadow-md p-6">
      <h2 class="text-xl font-semibold mb-2">Our Promise</h2>
      <p class="text-gray-600 text-sm">
        High-quality products, latest trends, and a delightful shopping experience every time.
      </p>
    </div>
  </div>

  <!-- Additional Section for Length -->
  <div class="bg-gray-100 rounded-xl p-6">
    <h2 class="text-xl font-semibold mb-2">Why Choose Elegance?</h2>
    <ul class="list-disc list-inside text-gray-600 text-sm space-y-1">
      <li>Curated collection of latest fashion trends</li>
      <li>Affordable pricing without compromising quality</li>
      <li>Exceptional customer service and support</li>
      <li>Secure and easy online shopping experience</li>
      <li>Fast and reliable delivery</li>
    </ul>
  </div>

</section>

</body>
</html>
