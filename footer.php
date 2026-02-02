<footer style="background: linear-gradient(135deg, #0f5132, #073f27); color: white; padding: 40px 20px 20px; margin-top: 60px; border-top-left-radius: 30px; border-top-right-radius: 30px;" data-aos="fade-up">

  <div style="max-width: 1200px; margin: auto;">

    <!-- Flex Row: Links | Message | Social -->
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 20px; text-align: center;">

      <!-- Left: Navigation Links -->
      <div style="flex: 1; min-width: 200px; text-align: left;">
        <nav>
          <a href="aboutus.php" class="footer-link">About Us</a><br>
          <a href="show_recipe.php" class="footer-link">Recipe Collection</a><br>
          <a href="cookbook.php" class="footer-link">Community Cookbook</a><br>
          <a href="culinary_resources.php" class="footer-link">Culinary Resources</a><br>
          <a href="education_resources.php" class="footer-link">Education Resources</a>
        </nav>
      </div>

      <!-- Middle: Thank You Message -->
      <div style="flex: 1; min-width: 200px;">
        <h2 style="font-size: 1.5rem; margin-bottom: 10px; font-weight: 700;">FoodFusion</h2>
        <p style="font-size: 1rem; opacity: 0.9;">
          We’re truly thankful you’re part of our growing community.
        </p>
      </div>

      <!-- Right: Social Icons -->
      <div style="flex: 1; min-width: 200px; text-align: right;">
        <a href="https://facebook.com/YourPage" target="_blank" class="social-icon">
          <img src="image/facebook (1).png" alt="Facebook" width="35" height="35">
        </a>
        <a href="https://instagram.com/YourPage" target="_blank" class="social-icon">
          <img src="image/instagram (1).png" alt="Instagram" width="35" height="35">
        </a>
        <a href="mailto:contact@foodfusion.com" class="social-icon">
          <img src="image\letter.png" alt="Email" width="35" height="35">
        </a>
      </div>
    </div>

    <!-- Divider + Copyright -->
    <div style="margin-top: 40px; border-top: 1px solid rgba(255,255,255,0.3); padding-top: 15px;">
      <p style="text-align: center; font-size: 0.9rem; opacity: 0.8;">
        &copy; <?php echo date("Y"); ?> FoodFusion. All rights reserved.
      </p>
    </div>
  </div>

  <!-- Styling and Hover Effects -->
  <style>
    footer {
      transition: box-shadow 0.4s ease, transform 0.4s ease;
    }

    footer:hover {
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
      transform: translateY(-2px);
    }

    .footer-link {
      color: white;
      text-decoration: none;
      font-size: 1rem;
      display: inline-block;
      margin: 5px 0;
      transition: color 0.3s;
    }

    .footer-link:hover {
      color: #c9f7d4;
    }

    .social-icon {
      margin-left: 12px;
      display: inline-block;
      transition: transform 0.3s ease, filter 0.3s ease;
    }

    .social-icon img {
      filter: brightness(0.9);
    }

    .social-icon:hover {
      transform: scale(1.2);
    }

    @media (max-width: 768px) {
      .footer-link {
        font-size: 0.95rem;
      }

      .social-icon img {
        width: 24px;
        height: 24px;
      }

      footer div[style*="display: flex"] {
        flex-direction: column;
        text-align: center;
      }

      footer div[style*="text-align: left"],
      footer div[style*="text-align: right"] {
        text-align: center !important;
      }
    }
  </style>

  <!-- AOS Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({ duration: 1000, once: true });
  </script>
</footer>
