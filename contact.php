<?php
session_start();
include 'includes/db.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact | Elegance</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<section class="max-w-5xl mx-auto px-4 py-16 space-y-12">

  <!-- Page Title -->
  <h1 class="text-3xl sm:text-4xl font-bold text-center text-gray-800">Contact Us</h1>

  <!-- Intro -->
  <div class="text-gray-700 text-base sm:text-lg leading-relaxed space-y-4">
    <p>
      Have questions, need assistance, or want to provide feedback? We're here to help. Reach out to us through the form below or via the contact details provided. Your satisfaction is our top priority.
    </p>
    <p>
      Whether it’s about a product inquiry, order assistance, or general questions about Elegance, we aim to respond promptly and provide the best customer support experience.
    </p>
  </div>

  <!-- Contact Form -->
  <form action="send_contact.php" method="post" class="bg-white p-6 rounded-xl shadow-md max-w-lg mx-auto space-y-6">
    <div>
      <label class="block font-semibold mb-1">Name</label>
      <input type="text" name="name" required class="w-full border border-gray-300 rounded px-3 py-2">
    </div>
    <div>
      <label class="block font-semibold mb-1">Email</label>
      <input type="email" name="email" required class="w-full border border-gray-300 rounded px-3 py-2">
    </div>
    <div>
      <label class="block font-semibold mb-1">Phone (Optional)</label>
      <input type="tel" name="phone" class="w-full border border-gray-300 rounded px-3 py-2">
    </div>
    <div>
      <label class="block font-semibold mb-1">Message</label>
      <textarea name="message" rows="6" required class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
    </div>
    <button type="submit" class="w-full bg-black text-white py-2 rounded-full hover:bg-pink-500 transition">
      Send Message
    </button>
</form>

  <!-- Social Media -->
  <div class="mt-8 text-center space-x-4">
    <a href="#" class="text-pink-500 hover:text-black">Facebook</a>
    <a href="#" class="text-pink-500 hover:text-black">Instagram</a>
    <a href="#" class="text-pink-500 hover:text-black">Twitter</a>
  </div>

</section>

</body>
</html>
