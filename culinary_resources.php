<?php
include("DataBaseconnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Culinary Resources | FoodFusion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Swiper.js CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- AOS Animation -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<style>
  body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(to bottom, #0f5132, #ffffff);
  }

  h2.section-title {
    text-align: center;
    margin: 40px 0 20px;
    color: #fff;
  }

  .swiper {
    width: 90%;
    max-width: 1200px;
    margin: auto;
    padding-bottom: 40px;
    position: relative;
  }

  .swiper-slide {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    text-align: center;
    padding: 15px;
  }

  .swiper-slide img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px 12px 0 0;
  }

  .slide-title {
    margin: 10px 0;
    font-size: 18px;
    color: #0f5132;
  }

  .download-btn {
    padding: 8px 16px;
    background: #0f5132;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-size: 14px;
    transition: background 0.3s;
  }

  .download-btn:hover {
    background: #0b3c24;
  }

  /* Arrows under the slider */
  .swiper-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 200px;
    margin: 0 auto;
    margin-top: 10px;
  }

  .swiper-button-prev,
  .swiper-button-next {
    position: static !important;
    background: #ffffff;
    color: #0f5132;
    border: 2px solid #0f5132;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    font-size: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
  }

  .swiper-button-prev:hover,
  .swiper-button-next:hover {
    background: #0f5132;
    color: #ffffff;
    border-color: #0f5132;
  }

  /* Videos & Hacks */
  .video-section,
  .hacks-section {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background: #ffffffcc;
    border-radius: 12px;
  }

  .video-container iframe {
    width: 100%;
    height: 350px;
    border-radius: 12px;
    margin-bottom: 20px;
  }

  .hack-item {
    background: #e2f4e9;
    padding: 15px;
    border-radius: 10px;
    margin: 10px 0;
    color: #0f5132;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  }
</style>

</head>
<body>
    <?php include("nav.php"); ?>
    <br><br><br><br>
  <h2 class="section-title" data-aos="fade-down">Recipe Cards</h2>

  <!-- Swiper Slider -->
  <div class="swiper" data-aos="fade-up">
    <div class="swiper-wrapper">
      <?php
      $sql = "SELECT * FROM recipe ORDER BY id DESC";
      $result = mysqli_query($dbconnection, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="swiper-slide">';
          echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Recipe Image">';
          echo '<h3 class="slide-title">' . htmlspecialchars($row['title']) . '</h3>';
          echo '<a class="download-btn" href="download_recipe.php?id=' . $row['id'] . '">Download</a>';
          echo '</div>';
      }
      ?>
    </div>

    <!-- Arrows below slider -->
    <div class="swiper-controls">
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
      
  <!-- Cooking Tutorials -->
  <h2 class="section-title" data-aos="fade-down">Cooking Tutorials</h2>
  <div class="video-section video-container" data-aos="zoom-in">
    <iframe src="https://www.youtube.com/embed/4aZr5hZXP_s" allowfullscreen></iframe>
    <iframe src="https://www.youtube.com/embed/PqiDHedOd6k" allowfullscreen></iframe>
  </div>
  <!-- Kitchen Hacks -->
  <h2 class="section-title" data-aos="fade-down">Kitchen Hacks</h2>
  <div class="hacks-section" data-aos="fade-up">
    <div class="hack-item">
      🧄 <strong>Peel Garlic Faster</strong> – Place garlic cloves in a jar, shake hard for 20 seconds, and the peels fall right off.
    </div>
    <div class="hack-item">
      🥚 <strong>Test Egg Freshness</strong> – Drop an egg in water. If it floats, it’s bad. If it sinks, it’s fresh!
    </div>
    <div class="hack-item">
      🍋 <strong>Juice Lemons Easily</strong> – Microwave for 10 seconds before squeezing to get more juice.
    </div>
  </div>

  <!-- Swiper & AOS Scripts -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const swiper = new Swiper('.swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          640: { slidesPerView: 2 },
          1024: { slidesPerView: 3 }
        }
      });

      AOS.init({
        duration: 1000,
        once: true
      });
    });
  </script>
  <?php include('footer.php'); ?>
</body>
</html>
