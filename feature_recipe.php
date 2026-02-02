<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feature Recipes</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: #f7f7f7;
    }

    h1 {
      text-align: center;
      margin: 30px 0 10px;
      color: #0f5132;
      font-size: 32px;
    }

    .recipe-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding: 40px;
    }

    .recipe-card {
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      animation: fadeInUp 0.6s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .recipe-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .recipe-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .recipe-content {
      padding: 15px;
      flex-grow: 1;
    }

    .recipe-content h2 {
      font-size: 20px;
      margin-bottom: 10px;
      color: #0f5132;
    }

    .recipe-meta {
      font-size: 14px;
      color: #555;
      margin-bottom: 6px;
    }

    .go-btn {
      display: inline-block;
      margin: 15px;
      padding: 10px 16px;
      background-color: #0f5132;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 14px;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      transition: background-color 0.3s;
    }

    .go-btn:hover {
      background-color: #0c3e26;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 768px) {
      .recipe-card img {
        height: 140px;
      }
    }
  </style>
</head>
<body>

  <h1>🌟 Feature Recipes</h1>

  <section class="recipe-section">
    <?php
    include("DataBaseconnection.php");

    $sql = "SELECT * FROM recipe WHERE role = 'feature' ORDER BY id DESC";
    $result = mysqli_query($dbconnection, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='recipe-card'>";
        echo "<img src='" . htmlspecialchars($row['image']) . "' alt='Recipe Image'>";
        echo "<div class='recipe-content'>";
        echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
        echo "<div class='recipe-meta'><strong>Cuisine:</strong> " . htmlspecialchars($row['cuisine']) . "</div>";
        echo "<div class='recipe-meta'><strong>Dietary:</strong> " . htmlspecialchars($row['dietary']) . "</div>";
        echo "<div class='recipe-meta'><strong>Difficulty:</strong> " . htmlspecialchars($row['difficulty']) . "</div>";
        echo "</div>";
        echo "<a class='go-btn' href='show_recipe.php?id=" . $row['id'] . "'><i class='fas fa-book-open'></i> Go Recipe</a>";
        echo "</div>";
    }
    ?>
  </section>

</body>
</html>
