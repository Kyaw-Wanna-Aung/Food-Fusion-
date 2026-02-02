<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Food Fusion Nav</title>
  <link rel="stylesheet" href="nav2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    /* Hamburger icon */
.hamburger {
  display: none;
  font-size: 24px;
  color: #fff;
  cursor: pointer;
}

/* Responsive design */
@media (max-width: 768px) {
  .hamburger {
    display: block;
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
    max-height: 500px; /* adjust as needed */
  }

  .nav-links li {
    width: 100%;
    text-align: center;
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
      <div class="logo">Food Fusion Admin Pannel</div>
       <div class="hamburger" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
      </div>
     <ul class="nav-links" id="navLinks">
  <li><a href="userlist.php">User List</a></li>
  <li><a href="recipelist.php">Recipe List</a></li>
  <li><a href="cookbook_list.php">Cook book List</a></li>
  <li><a href="event_list.php">Event List</a></li>
  <li><a href="add_recipe_form.php">Recipeform</a></li>
  <li><a href="feed_back.php">Feedback</a></li>
  

  <li><a href="Logout.php" class="login-btn">logout</a></li>
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
