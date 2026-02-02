<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us | FoodFusion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font and Animation Libraries -->
  <link rel="stylesheet" href="nav1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<style>
  body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #ffffff;
    color: #1a1a1a;
    padding-top: 88px; /* space for fixed nav */
  }

  .about-container {
    max-width: 1200px;
    margin: auto;
    padding: 50px 20px;
  }

  h1, h2 {
    background: linear-gradient(90deg, rgb(18, 17, 17), #0f5132);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 800;
  }

  .section {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 30px;
    margin-bottom: 60px;
    padding: 30px;
    background: linear-gradient(90deg, rgb(185, 183, 183), #0f5132);
    border-radius: 20px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
  }

  .section.reverse {
    flex-direction: row-reverse;
  }

  .text-content {
    flex: 1 1 55%;
  }

  .video-content {
    flex: 1 1 40%;
  }

  .video-content iframe,
  .video-content lottie-player {
    width: 100%;
    height: 250px;
    border-radius: 12px;
    border: none;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  }

  p, li {
    font-size: 1.1rem;
    line-height: 1.8;
  }

  ul {
    padding-left: 20px;
  }

  .team {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
  }

  .member {
    flex: 0 1 auto;
    max-width: 180px;
    background: linear-gradient(90deg, rgb(251, 250, 250), #0f5132);
    padding: 15px;
    text-align: center;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .member:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
  }

  .member img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #0f5132;
    margin-bottom: 10px;
  }

  .member h3 {
    margin: 10px 0 5px;
    font-weight: 600;
    font-size: 1.1rem;
    background: linear-gradient(90deg, #1a1a1a, #0f5132);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .member p {
    font-size: 0.95rem;
  }

  @media (max-width: 768px) {
    .section,
    .section.reverse {
      flex-direction: column;
    }

    .video-content iframe,
    .video-content lottie-player {
      height: 200px;
    }

    .team {
      flex-direction: column;
      align-items: center;
    }
  }
</style>

</head>
<body>

  <?php include 'nav.php'; ?>

  <div class="about-container">

    <h1 data-aos="fade-up">About Us</h1>
     
    <!-- Section 1 -->
    <div class="section" data-aos="fade-up">
      <div class="text-content">
        <h2>Culinary Philosophy</h2>
        <p>
          At FoodFusion, we believe food is not just fuel—it's an expression of heritage, creativity, and shared joy. 
          Our philosophy is rooted in honoring traditional cooking while embracing new ideas, helping people everywhere create meaningful meals with ease.
        </p>
      </div>
      <div class="video-content">
        <iframe src="https://www.youtube.com/embed/xPPLbEFbCAo" allowfullscreen></iframe>
      </div>
    </div>

    <!-- Section 2 -->
    <div class="section reverse" data-aos="fade-up">
      <div class="text-content">
        <h2>Our Values</h2>
        <ul>
          <li><strong>Authenticity:</strong> Respecting the origin of every recipe.</li>
          <li><strong>Creativity:</strong> Blending tradition with innovation.</li>
          <li><strong>Community:</strong> Connecting people through shared meals.</li>
          <li><strong>Accessibility:</strong> Making cooking fun and simple for everyone.</li>
        </ul>
      </div>
      <div class="video-content">
        <iframe src="https://www.youtube.com/embed/txtlJaojl5c" allowfullscreen></iframe>
      </div>
    </div>
          
    <!-- Mission Section -->
    <div class="section reverse" data-aos="fade-up">
      <div class="video-content">
        <lottie-player 
          src="https://assets3.lottiefiles.com/packages/lf20_9cyyl8i4.json" 
          background="transparent"  
          speed="1"  
          loop  
          autoplay>
        </lottie-player>
      </div>
      <div class="text-content">
        <h2>Our Mission</h2>
        <p>
          Our mission is to make cooking simple, joyful, and inclusive for all. 
          We aim to be a global kitchen companion, empowering people to explore culinary traditions and share food that brings people together.
        </p>
      </div>
    </div>

    <!-- Team Section -->
    <h2 data-aos="fade-up">The Team Behind FoodFusion</h2>
    <div class="team" data-aos="zoom-in-up">
      <div class="member">
        <img src="image/images (2).jpg" alt="Moe Thu Kyaw">
        <h3>Uncle Sharky</h3>
        <p>Founder & Head Chef</p>
      </div>
      <div class="member">
        <img src="image/1698660546728.jpg" alt="Sandy Aung">
        <h3>Joseph</h3>
        <p>Recipe Curator</p>
      </div>
      <div class="member">
        <img src="image/RX35390.jpg" alt="David Lin">
        <h3>Jean Marc Lemmery</h3>
        <p>Creative Director</p>
      </div>
    </div>

  </div>

  <!-- AOS Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({ duration: 1000, once: true });
  </script>
  <?php include('footer.php'); ?>
</body>
</html>

