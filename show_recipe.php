<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recipe Display</title>
<style>
  body {
    font-family: 'Segoe UI', sans-serif;
    margin: 0;
    padding: 0;
    background: #f7f7f7;
  }

  form {
    text-align: center;
    margin-top: 30px;
  }

  .recipe-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    padding: 40px;
    background: #f7f7f7;
  }

  .recipe-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    animation: fadeInUp 0.6s ease;
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

  .recipe-ingredients,
  .recipe-steps {
    margin-bottom: 10px;
  }

  .preview-line {
    background-color: #e2e3e5;
    padding: 6px 10px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    color: #0c4128;
    font-weight: bold;
    user-select: none;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .preview-line span.icon {
    margin-left: 8px;
    font-size: 12px;
    transition: transform 0.3s;
  }

  .full-text {
    background: #f1f1f1;
    padding: 6px 8px;
    font-size: 12px;
    border-radius: 6px;
    white-space: pre-wrap;
    display: none;
    margin-top: 5px;
    animation: slideDown 0.3s ease;
    line-height: 0.5; /* Tighter line spacing */
  }

  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-5px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
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
        <?php include 'nav.php'; ?>
        <br> <br> <br> <br><br>
<form method="GET">
  <input type="text" name="search" placeholder="Search by title, cuisine or dietary"
    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
    style="padding:10px; width:60%; max-width:400px; border:1px solid #ccc; border-radius:8px; font-size:16px;">
  <button type="submit"
    style="padding:10px 18px; background-color:#0f5132; color:white; border:none; border-radius:8px; font-size:16px;">
    Search
  </button>
</form>

<section class="recipe-section">
<?php
include("DataBaseconnection.php");

if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = mysqli_real_escape_string($dbconnection, $_GET['search']);
    $sql = "SELECT * FROM recipe 
            WHERE title LIKE '%$search%' 
               OR cuisine LIKE '%$search%' 
               OR dietary LIKE '%$search%'
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM recipe ORDER BY id DESC";
}

$result = mysqli_query($dbconnection, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='recipe-card'>";
    echo "<img src='" . htmlspecialchars($row['image']) . "' alt='Recipe Image'>";
    echo "<div class='recipe-content'>";
    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
    echo "<div class='recipe-meta'><strong>Cuisine:</strong> " . htmlspecialchars($row['cuisine']) . "</div>";
    echo "<div class='recipe-meta'><strong>Dietary:</strong> " . htmlspecialchars($row['dietary']) . "</div>";
    echo "<div class='recipe-meta'><strong>Difficulty:</strong> " . htmlspecialchars($row['difficulty']) . "</div>";

    echo "<div class='recipe-ingredients'>";
    echo "<div class='preview-line toggle-preview'>View Ingredients <span class='icon'>▼</span></div>";
    echo "<div class='full-text'>" . nl2br(htmlspecialchars($row['ingredients'])) . "</div>";
    echo "</div>";

    echo "<div class='recipe-steps'>";
    echo "<div class='preview-line toggle-preview'>View Steps <span class='icon'>▼</span></div>";
    echo "<div class='full-text'>" . nl2br(htmlspecialchars($row['steps'])) . "</div>";
    echo "</div>";

    echo "</div></div>";
}
?>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const toggles = document.querySelectorAll(".toggle-preview");

    toggles.forEach(toggle => {
      toggle.addEventListener("click", function () {
        const fullText = this.nextElementSibling;
        const icon = this.querySelector('.icon');

        if (fullText.style.display === "block") {
          fullText.style.display = "none";
          icon.textContent = "▼";
        } else {
          fullText.style.display = "block";
          icon.textContent = "▲";
        }
      });
    });
  });
</script>
  <?php include('footer.php'); ?>
</body>
</html>
