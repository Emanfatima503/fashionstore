<?php
session_start();
include 'includes/db.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Privacy Policy | Elegance</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<section class="max-w-5xl mx-auto px-4 py-16 space-y-12">

  <!-- Page Title -->
  <h1 class="text-3xl sm:text-4xl font-bold text-center text-gray-800">Privacy Policy</h1>

  <!-- Introduction -->
  <div class="text-gray-700 text-base sm:text-lg space-y-4 leading-relaxed">
    <p>
      At Elegance, your privacy is very important to us. We are committed to protecting the personal information you provide and ensuring a safe online shopping experience.
    </p>
    <p>
      We collect only the essential information needed to process orders, manage your account, and improve our services. This includes details such as your name, email address, contact information, and payment details.
    </p>
  </div>

  <!-- How Information is Used -->
  <div class="bg-white rounded-xl shadow-md p-6 space-y-3">
    <h2 class="text-xl font-semibold mb-2">How We Use Your Information</h2>
    <ul class="list-disc list-inside text-gray-600 text-sm space-y-1">
      <li>Process and deliver your orders accurately and on time.</li>
      <li>Provide customer support and respond to inquiries efficiently.</li>
      <li>Improve our website and personalize your shopping experience.</li>
      <li>Send relevant updates, offers, and promotions (if subscribed).</li>
    </ul>
  </div>

  <!-- Security -->
  <div class="bg-gray-100 rounded-xl p-6 space-y-3">
    <h2 class="text-xl font-semibold mb-2">Data Security</h2>
    <p class="text-gray-600 text-sm">
      We take all necessary measures to protect your data. Personal information is stored securely and encrypted when necessary. We do not sell or share your information with third parties without your consent.
    </p>
  </div>

  <!-- User Rights -->
  <div class="bg-white rounded-xl shadow-md p-6 space-y-3">
    <h2 class="text-xl font-semibold mb-2">Your Rights</h2>
    <p class="text-gray-600 text-sm">
      You have the right to access, update, or delete your personal information at any time. You may also unsubscribe from promotional communications or opt out of data collection practices where applicable.
    </p>
  </div>

  <!-- Agreement -->
  <div class="bg-gray-100 rounded-xl p-6 space-y-3">
    <h2 class="text-xl font-semibold mb-2">Agreement</h2>
    <p class="text-gray-600 text-sm">
      By using our website, you acknowledge and agree to the practices described in this Privacy Policy. We may update this policy from time to time, and any changes will be posted on this page.
    </p>
  </div>

</section>

</body>
</html>
