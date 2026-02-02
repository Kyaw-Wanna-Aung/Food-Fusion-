<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Food Fusion - Home</title>

  <link rel="stylesheet" href="nav1.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    /* Hero Section Styles */
    .hero-section {
      margin-top: 90px;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      max-width: 1200px;
      padding: 40px 20px;
      gap: 40px;
      animation: fadeIn 1s ease-in-out;
    }

    .hero-image {
      flex: 1;
      min-width: 300px;
    }

    .hero-image img {
      width: 100%;
      max-width: 480px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
      animation: float 3s ease-in-out infinite;
    }

    .hero-text {
      flex: 1;
      min-width: 300px;
      padding: 20px;
      animation: slideIn 1s ease-in-out;
    }

    .hero-text h1 {
      font-size: 36px;
      margin-bottom: 20px;
      color: #5cf6b8;
    }

    .hero-text h1 span {
      color: #013214;
    }

    .hero-text p {
      font-size: 18px;
      margin-bottom: 30px;
      line-height: 1.6;
      color: #072d15;
    }

    .register-btn {
      text-decoration: none;
      background: #033e1a;
      color: #fcfafa;
      padding: 14px 28px;
      border-radius: 30px;
      font-weight: bold;
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(54, 197, 106, 0.172);
    }

    .register-btn:hover {
      background: #0c4c24;
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 10px 30px rgba(74, 222, 128, 0.5);
    }

    /* Modal Popup */
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.6);
    }

    .modal-content {
      background: linear-gradient(90deg, #1a1a1a, #0f5132);
      margin: 5% auto;
      padding: 30px;
      border-radius: 20px;
      width: 90%;
      max-width: 600px;
      position: relative;
      animation: fadeIn 0.5s;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
      color: #fff;
    }

    .close-btn {
      position: absolute;
      top: 15px;
      right: 25px;
      font-size: 28px;
      font-weight: bold;
      color: #333;
      cursor: pointer;
    }

    .close-btn:hover {
      color: red;
    }

    .modal-content input,
    .modal-content select {
      width: 100%;
      padding: 10px;
      margin-top: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    .modal-content input[type="submit"],
    .modal-content input[type="reset"] {
      margin-top: 20px;
      width: 48%;
      cursor: pointer;
    }

    /* Cookie Consent Styles */
    .cookie-consent {
      position: fixed;
      bottom: 20px;
      left: 20px;
      background: #013214;
      color: #fff;
      padding: 15px 20px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      z-index: 10000;
      animation: fadeIn 1s ease-in-out;
    }

    .cookie-consent p {
      margin: 0;
      font-size: 14px;
    }

    .cookie-consent button {
      background: #0f5132;
      color: #fff;
      border: none;
      padding: 8px 12px;
      margin-left: 10px;
      cursor: pointer;
      border-radius: 5px;
    }

    .cookie-consent button:hover {
      background: #198754;
    }

    /* Animations */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideIn {
      from {
        transform: translateX(40px);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0px);
      }
      50% {
        transform: translateY(-10px);
      }
    }

    @media (max-width: 768px) {
      .hero-section {
        flex-direction: column;
        text-align: center;
      }

      .hero-text {
        padding: 0;
      }

      .hero-text h1 {
        font-size: 28px;
      }

      .hero-text p {
        font-size: 16px;
      }

      .modal-content {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <?php include 'nav.php'; ?>
  <!-- Hero Section -->
  <div class="hero-section">
    <div class="hero-image">
      <img src="upload/mexi-china-1.webp" alt="Delicious Food" />
    </div>
    <div class="hero-text">
      <h1>Welcome to <span>Food Fusion</span></h1>
      <p>
        Discover and share mouthwatering recipes with our vibrant culinary community.
        Food Fusion connects food lovers to fusion flavors from around the world.
      </p>
      <a href="#" class="register-btn" id="joinBtn">Join Us</a>
    </div>
  </div>
  <!-- Modal Form -->
  <div class="modal" id="popupForm">
    <div class="modal-content">
      <span class="close-btn" id="closeModal">&times;</span>
      <form action="RegProcess.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="fname" placeholder="Enter Your First Name" required><br>
        <input type="text" name="lname" placeholder="Enter Your Last Name" required><br>
        <input type="email" name="email" placeholder="Enter Your Email" required><br>
        <select name="country" required>
          <?php
          $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Brazil", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Chile", "China", "Colombia", "Comoros", "Congo", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Germany", "Greece", "Guatemala", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mexico", "Monaco", "Mongolia", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saudi Arabia", "Senegal", "Serbia", "Singapore", "Slovakia", "Slovenia", "Somalia", "South Africa", "South Korea", "Spain", "Sri Lanka", "Sudan", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Trinidad and Tobago", "Tunisia", "Turkey", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
          sort($countries);
          foreach ($countries as $country) {
            echo "<option value=\"$country\">$country</option>";
          }
          ?>
        </select><br>
        <input type="file" name="profile"><br>
        <input type="text" name="username" placeholder="Enter Username" required><br>
        <input type="password" name="pw" placeholder="Enter Password" required><br><br>
        <input type="submit" name="submit" value="Register">
        <input type="reset" class="btn" value="Clear">
      </form>
    </div>
  </div>

  <!-- Cookie Consent Banner -->
<div id="cookieConsent" class="cookie-consent" style="display: none;">
  <p>This website uses cookies to ensure you get the best experience.
    <button id="acceptCookie">Got it!</button>
  </p>
</div>

<!-- Reset Button (Always Visible During Development) -->
<!-- <div style="position: fixed; bottom: 80px; left: 20px; z-index: 10001;">
  <button onclick="localStorage.removeItem('cookieAccepted'); location.reload();" 
          style="font-size:12px; background:#dc3545; color: white; border: none; padding: 8px 12px; border-radius: 5px;">
    🔄 Reset Cookie Popup
  </button>
</div> -->


  <?php include 'event.php'; ?>
  <br><br>
  <?php include 'feature_recipe.php'; ?>
  <?php include 'trend_recipe.php'; ?>
  <?php include('footer.php'); ?>

  <!-- JavaScript -->
  <script>
    // Modal
    const modal = document.getElementById("popupForm");
    const btn = document.getElementById("joinBtn");
    const closeBtn = document.getElementById("closeModal");

    btn.onclick = function (e) {
      e.preventDefault();
      modal.style.display = "block";
    }

    closeBtn.onclick = function () {
      modal.style.display = "none";
    }

    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    // Cookie Consent
    document.addEventListener("DOMContentLoaded", function () {
      const cookieBanner = document.getElementById("cookieConsent");
      const acceptBtn = document.getElementById("acceptCookie");

      if (!localStorage.getItem("cookieAccepted")) {
        cookieBanner.style.display = "block";
      } else {
        cookieBanner.style.display = "none";
      }

      acceptBtn.addEventListener("click", function () {
        localStorage.setItem("cookieAccepted", "true");
        cookieBanner.style.display = "none";
      });
    });
  </script>
</body>
</html>
