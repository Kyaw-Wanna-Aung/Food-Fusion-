<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us | FOODZ</title>
  <link rel="stylesheet" href="style.css? v=4" />
</head>
<body>
  <!-- Header -->
  <header class="header">
    <div class="container">
      <div class="logo">
        <a href="#">
          <img src="logo.png" alt="FOODZ Logo" />
          <span>FOODZ</span>
          <small>by XX</small>
        </a>
      </div>
      <nav class="main-nav">
        <ul class="nav-list">
          <li><a href="#">HOME</a></li>
          <li class="dropdown">
            <a href="#">ABOUT US ▼</a>
            <ul class="submenu">
              <li><a href="#">Our Story</a></li>
              <li><a href="#">Team</a></li>
              <li><a href="#">Vision</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#">MENU ▼</a>
            <ul class="submenu">
              <li><a href="#">Starters</a></li>
              <li><a href="#">Main Dishes</a></li>
              <li><a href="#">Desserts</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#">COMMUNITY ▼</a>
            <ul class="submenu">
              <li><a href="#">Events</a></li>
              <li><a href="#">Gallery</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <button class="menu-toggle" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </header>

  <!-- Main Content -->
  <main class="about-section">
    <section class="intro">
      <h2>Who We Are</h2>
      <p>We are a passionate team dedicated to delivering high-quality solutions that help our clients succeed. Our mission is to innovate, lead, and grow together with our partners.</p>
    </section>

    <section class="mission">
      <h2>Our Mission</h2>
      <p>To provide excellent services and products that empower businesses and individuals through creativity and technology.</p>
    </section>

    <section class="team">
      <h2>Meet Our Team</h2>
      <div class="team-members">
        <div class="member">
          <img src="team1.jpg" alt="Jane Doe">
          <h3>Jane Doe</h3>
          <p>CEO & Founder</p>
        </div>
        <div class="member">
          <img src="team2.jpg" alt="John Smith">
          <h3>John Smith</h3>
          <p>Lead Developer</p>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 YourCompany. All rights reserved.</p>
  </footer>

  <!-- Script -->
  <script>
    const toggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.nav-list');
    const dropdowns = document.querySelectorAll('.dropdown');

    toggle.addEventListener('click', () => {
      menu.classList.toggle('active');
    });

    dropdowns.forEach(drop => {
      drop.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
          e.preventDefault();
          this.classList.toggle('open');
        }
      });
    });
  </script>
</body>
</html>




