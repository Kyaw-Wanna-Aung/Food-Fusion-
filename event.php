<?php
include("DataBaseconnection.php");

$sql = "SELECT * FROM events ORDER BY start_date ASC";
$result = mysqli_query($dbconnection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upcoming Events</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f7f7f7;
      padding: 40px 20px;
    }

    h1 {
      text-align: center;
      color: #0f5132;
      margin-bottom: 30px;
      font-size: 36px;
    }

    .swiper {
      width: 100%;
      max-width: 1024px;
      margin: auto;
    }

    .swiper-slide {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .event-card {
      display: flex;
      flex-direction: row;
      align-items: center;
      gap: 30px;
      padding: 30px;
    }

    .event-card img {
      width: 360px;
      height: 240px;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.12);
    }

    .event-details {
      flex: 1;
    }

    .event-details h3 {
      margin: 0;
      font-size: 26px;
      color: #0f5132;
      margin-bottom: 10px;
    }

    .event-details p {
      font-size: 16px;
      color: #444;
      margin-bottom: 12px;
      line-height: 1.5;
    }

    .event-dates {
      font-size: 15px;
      font-weight: 500;
      color: #333;
    }

    /* Swiper buttons */
    .swiper-button-next,
    .swiper-button-prev {
      color: #0f5132;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .event-card {
        flex-direction: column;
        padding: 20px;
      }

      .event-card img {
        width: 100%;
        height: auto;
      }

      .event-details {
        text-align: left;
      }

      .event-details h3 {
        font-size: 22px;
      }

      .event-details p {
        font-size: 14px;
      }

      .event-dates {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

<h1>Upcoming Events</h1>

<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="swiper-slide">
      <div class="event-card">
        <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Event Photo">
        <div class="event-details">
          <h3><?php echo htmlspecialchars($row['name']); ?></h3>
          <p><?php echo nl2br(htmlspecialchars($row['about'])); ?></p>
          <div class="event-dates">
            📅 <?php echo htmlspecialchars($row['start_date']); ?> → <?php echo htmlspecialchars($row['end_date']); ?>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>

  <!-- Arrows -->
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
  });
</script>

</body>
</html>
