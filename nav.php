<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Food Fusion Nav</title>
  <link rel="stylesheet" href="nav1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', sans-serif;
  }

  header {
    width: 100%;
    position: fixed;
    top: 0;
    z-index: 100;
    background: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  .navbar {
    height: 88px;
    width: 100%;
    background: linear-gradient(90deg, #1a1a1a, #0f5132);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 30px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    position: fixed;
    top: 0;
    z-index: 999;
    animation: slideDown 0.5s ease-out;
  }

  @keyframes slideDown {
    from {
      top: -100px;
      opacity: 0;
    }
    to {
      top: 0;
      opacity: 1;
    }
  }

  .logo {
    color: #fff;
    font-size: 1.8rem;
    font-weight: bold;
  }

  .nav-links {
    display: flex;
    list-style: none;
  }

  .nav-links li {
    position: relative;
  }

  .nav-links li a {
    color: #fff;
    text-decoration: none;
    padding: 12px 18px;
    display: block;
    transition: all 0.3s ease;
  }

  .nav-links li a:hover {
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 6px;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    top: 40px;
    left: 0;
    background-color: #0f5132;
    min-width: 200px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    border-radius: 8px;
    overflow: hidden;
    z-index: 1000;
    animation: fadeIn 0.3s ease-in-out;
  }

  .dropdown-content a {
    padding: 12px 16px;
    display: block;
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s;
  }

  .dropdown-content a:hover {
    background-color: #198754;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .login-btn {
    background-color: #198754;
    color: #fff !important;
    padding: 10px 18px;
    border-radius: 25px;
    margin-left: 10px;
    font-weight: bold;
    transition: 0.3s ease-in-out;
  }

  .login-btn:hover {
    background-color: #28a745;
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(40, 167, 69, 0.6);
  }

  .hamburger {
    display: none;
    font-size: 24px;
    color: #fff;
    cursor: pointer;
    padding: 10px;
    border-radius: 8px;
    transition: background 0.3s ease;
  }

  .hamburger:hover {
    background: rgba(255, 255, 255, 0.1);
  }

  /* Responsive design */
  @media (max-width: 768px) {
    .hamburger {
      display: block;
      position: absolute;
      right: 30px;
      top: 25px;
      z-index: 1001;
    }

    .nav-links {
      flex-direction: column;
      position: absolute;
      top: 88px;
      right: 0;
      background-color: #0f5132;
      width: 100%;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s ease-in-out;
    }

    .nav-links.active {
      max-height: 500px;
    }

    .nav-links li {
      width: 100%;
      text-align: center;
      padding: 0px 0;
    }

    .dropdown-content {
      position: static;
      box-shadow: none;
      background-color: #0f5132;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  }
</style>
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo">Food Fusion</div>
       <div class="hamburger" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
      </div>
     <ul class="nav-links" id="navLinks">
  <li><a href="home.php">Home</a></li>
  <li><a href="AboutUs.php">About</a></li>
  <li><a href="ContactUs.php">Contact</a></li>
  <li><a href="show_recipe.php">Recipe Collection</a></li>
  <li><a href="cookbook.php">Community Cook Book</a></li>
  <li class="dropdown">
    <a href="#" class="dropbtn">Resources <i class="fas fa-caret-down"></i></a>
    <div class="dropdown-content">
      <a href="culinary_resources.php">Culinary Resources</a>
      <a href="education_resources.php">Educational Resources</a>
    </div>
  </li>
  <li><a href="LoginForm.php" class="login-btn">Login</a></li>
</ul>
    </nav>
  </header>
</body>
  <script>
    function toggleMenu() {
      document.getElementById("navLinks").classList.toggle("active");
    }
  </script>
</html>