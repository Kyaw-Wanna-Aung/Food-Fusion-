<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact Us</title>
  <link rel="stylesheet" href="contact-style.css" />
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', sans-serif;
    background: #f8f8f8;
    color: #333;
  }

  .contact-section {
    background: linear-gradient(90deg, #1a1a1a, #0f5132);
    text-align: center;
    padding: 60px 20px;
    color: #fff;
    animation: fadeIn 1s ease-in-out;
  }

  .contact-section h1 {
    font-size: 40px;
    margin-bottom: 10px;
  }

  .contact-section p {
    font-size: 18px;
    color: #ccc;
  }

  .contact-container {
    display: flex;
    flex-wrap: wrap;
    padding: 40px 20px;
    background: #fff;
    gap: 40px;
    justify-content: center;
  }

  .left-panel {
    display: flex;
    flex-direction: column;
    gap: 20px;
    flex: 1;
    min-width: 300px;
  }

  .contact-info {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }

  .info-box {
    background: #f1f1f1;
    padding: 20px;
    border-radius: 15px;
    text-align: center;
    transition: all 0.3s ease;
    animation: fadeUp 1s ease;
  }

  .info-box:hover {
    background: linear-gradient(90deg, #1a1a1a, #0f5132);
    color: #fff;
    transform: translateY(-5px);
  }

  .info-box i {
    font-size: 24px;
    margin-bottom: 10px;
    color: #0f5132;
  }

  .map iframe {
    width: 100%;
    height: 250px;
    border: none;
    border-radius: 10px;
    filter: grayscale(20%) contrast(1.1);
  }

  .contact-form {
    flex: 1;
    min-width: 300px;
    animation: slideIn 1s ease;
  }

  .contact-form h2 {
    margin-bottom: 20px;
    font-size: 28px;
    color: #0f5132;
  }

  .contact-form form {
    display: grid;
    gap: 15px;
  }

  .contact-form input,
  .contact-form textarea {
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 16px;
    width: 100%;
    resize: none;
  }

  .contact-form button {
    padding: 14px;
    background: #0f5132;
    color: #fff;
    border: none;
    border-radius: 10px;
    font-weight: bold;
    transition: all 0.3s ease;
  }

  .contact-form button:hover {
    background: #198754;
    transform: scale(1.05);
  }

  /* Animations */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fadeUp {
    from {
      opacity: 0;
      transform: translateY(40px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes slideIn {
    from {
      opacity: 0;
      transform: translateX(50px);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }

  /* Responsive */
  @media (max-width: 768px) {
    .contact-container {
      flex-direction: column;
    }

    .contact-info {
      grid-template-columns: 1fr;
    }

    .contact-section h1 {
      font-size: 32px;
    }
  }
</style>
<body>
<?php include 'nav.php'; ?>
<br><br><br><br><br>
  <section class="contact-section">
    <h1>Contact Us</h1>
    <p>We’d love to hear from you! Reach out through any of the options below.</p>
  </section>

  <section class="contact-container">
    <div class="left-panel">
      <div class="contact-info">
        <div class="info-box">
          <i class="fas fa-phone-alt"></i>
          <h4>Phone</h4>
          <p>09- 667 099 040</p>
        </div>
        <div class="info-box">
          <i class="fab fa-whatsapp"></i>
          <h4>WhatsApp</h4>
          <p>09- 775 434 303</p>
        </div>
        <div class="info-box">
          <i class="fas fa-envelope"></i>
          <h4>Email</h4>
          <p>juseph@gmail.com</p>
        </div>
        <div class="info-box">
          <i class="fas fa-store"></i>
          <h4>Our Shop</h4>
          <p>2443 Oak Ridge Omaha, QA 45065</p>
        </div>
      </div>

      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51378.4572740833!2d96.13351758463085!3d16.83990978808329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c195003415aa91%3A0x1af55593f807f2e9!2sFUSION%20(Rakhine%20Mont%20Ti%2C%20Thai%20Food%20%26%20Cold%20Drinks)!5e0!3m2!1sen!2smm!4v1752040025851!5m2!1sen!2smm"
          allowfullscreen=""
          loading="lazy">
        </iframe>
      </div>
    </div>

    <div class="contact-form">
      <h2>Get In Touch</h2>
      <form action="contact_submit.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="text" name="subject" placeholder="Subject" />
        <textarea name="message" rows="5" placeholder="Message" required></textarea>
        <button type="submit">Send Now</button>
      </form>
    </div>
  </section>
  <?php include('footer.php'); ?>
</body>
</html>
