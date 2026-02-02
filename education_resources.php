<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Educational Resources | FoodFusion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="nav1.css">
<style>
  body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #198754, #ffffff);
    margin: 0;
    padding: 0;
  }

  .container {
    padding: 30px;
    max-width: 1200px;
    margin: auto;
  }

  .section {
    background-color: white;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 30px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    position: relative;
  }

  h2 {
    color: #0f5132;
    text-align: center;
    margin-bottom: 20px;
  }

  .three-column-layout {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
  }

  .text-column {
    flex: 1;
    min-width: 250px;
  }

  .image-column {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .image-column img {
    width: 100%;
    max-width: 350px;
    border-radius: 10px;
    margin-bottom: 10px;
  }

  .section .button-wrapper {
    text-align: right;
    margin-top: 20px;
  }

  .download-btn {
    padding: 8px 16px;
    background-color: #0f5132;
    color: white;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
  }

  .download-btn:hover {
    background-color: #0c3e26;
  }

  .videos {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
  }

  .videos video.top-video {
    width: 100%;
    max-width: 500px;
    height: auto;
    border-radius: 10px;
  }

  .video-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    width: 100%;
  }

  .video-row iframe {
    width: 100%;
    height: 315px;
    border-radius: 10px;
  }

  @media (max-width: 768px) {
    .three-column-layout {
      flex-direction: column;
      align-items: center;
    }

    .text-column {
      text-align: justify;
    }

    .video-row {
      grid-template-columns: 1fr;
    }

    .section .button-wrapper {
      text-align: center;
    }

    .videos video.top-video {
      width: 100%;
    }
  }

  @media (max-width: 480px) {
    .container {
      padding: 15px;
    }

    h2 {
      font-size: 1.3rem;
    }

    .download-btn {
      font-size: 14px;
      padding: 6px 12px;
    }
  }
</style>
</head>
<body> 
<?php include("nav.php"); ?>
<br><br><br><br>
<div class="container">
  <!-- Healthy Food Section -->
  <div class="section">
    <h2>Healthy Food Guidance</h2>
    <div class="three-column-layout">
      <div class="text-column">
        <p>
Food waste is a growing global issue, but it also offers an opportunity to create positive environmental impact. Every day, tons of edible food end up in landfills where it contributes to greenhouse gas emissions. However, through processes like anaerobic digestion, we can convert organic waste into renewable energy such as biogas and electricity, turning a problem into a valuable resource.
</p>
      </div>
      <div class="image-column">
        <img src="image/food-pyramids_meals-ireland.png" alt="Healthy Food Guide">
      </div>
      <div class="text-column">
        <p>
Using wasted food for energy helps reduce pollution, supports cleaner cities, and contributes to a circular economy. Many communities around the world are adopting food-to-energy programs as part of their sustainability efforts. This approach not only minimizes environmental damage but also creates new energy sources and jobs. By valuing every piece of food — even scraps — we take one step closer to a greener future.
</p>
      </div>
    </div>
    <!-- Right-aligned download button -->
    <div class="button-wrapper">
     <a class="download-btn" href="download.php?">Download Photo</a>
    </div>
  </div>
  <!-- Waste to Energy Section -->
  <div class="section">
    <h2>Wasted Food to Energy</h2>
    <div class="three-column-layout">
      <div class="text-column">
        <p>
Food waste is a growing global issue, but it also offers an opportunity to create positive environmental impact. Every day, tons of edible food end up in landfills where it contributes to greenhouse gas emissions. However, through processes like anaerobic digestion, we can convert organic waste into renewable energy such as biogas and electricity, turning a problem into a valuable resource.
</p>
      </div>
      <div class="image-column">
        <img src="image/slide_2.jpg" alt="Waste to Energy">
      </div>
      <div class="text-column">
        <p>
Using wasted food for energy helps reduce pollution, supports cleaner cities, and contributes to a circular economy. Many communities around the world are adopting food-to-energy programs as part of their sustainability efforts. This approach not only minimizes environmental damage but also creates new energy sources and jobs. By valuing every piece of food — even scraps — we take one step closer to a greener future.
</p>
      </div>
    </div>
    <!-- Right-aligned download button -->
    <div class="button-wrapper">
      <a class="download-btn" href="download.php?">Download Photo</a>
    </div>
  </div>
  <!-- YouTube Videos Section -->
  <div class="section">
    <h2>Renewable Energy Video Resources</h2>
    <div class="videos">
      <!-- Top Center Video -->
     <video class="top-video" controls>
  <source src="image/video_2025-07-20_11-00-44.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
<!-- Download Button -->
<div class="button-wrapper" style="margin-top: 10px;">
  <a class="download-btn" href="download.php?file=video1.mp4">Download Video</a>
</div>
      <!-- Bottom Row Videos -->
      <div class="video-row">
        <iframe src="https://www.youtube.com/embed/O9pwV3JoqwA" allowfullscreen></iframe>
        <iframe src="https://www.youtube.com/embed/Z-AUVCC_OB8" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
          <?php include('footer.php'); ?>
</body>
</html>
