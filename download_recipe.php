<?php
include("DataBaseconnection.php");

if (!isset($_GET['id'])) {
    echo "No recipe selected.";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM recipe WHERE id = $id";
$result = mysqli_query($dbconnection, $sql);

if (!$row = mysqli_fetch_assoc($result)) {
    echo "Recipe not found.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo htmlspecialchars($row['title']); ?> | Download</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 20px;
      background: linear-gradient(to bottom, #0f5132, #ffffff);
      color: #0f5132;
    }

    .container {
      background: #fff;
      max-width: 500px;
      margin: auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    img.recipe-img {
      width: 70%;
      height: auto;
      border-radius: 12px;
      margin-bottom: 20px;
    }

    h2 {
      text-align: center;
    }

    p {
      margin: 10px 0;
      line-height: 0.8;
    }

    .download-btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #0f5132;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-size: 16px;
    }

    .download-btn:hover {
      background-color: #0b3c24;
    }
    .back-btn {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #6c757d;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-size: 16px;
    }

    .back-btn:hover {
      background-color: #5a6268;
    }

  </style>
</head>
<body>

<div class="container">
  <h2><?php echo htmlspecialchars($row['title']); ?></h2>
  <img class="recipe-img" src="<?php echo htmlspecialchars($row['image']); ?>" alt="Recipe Image">

  <p><strong>Cuisine:</strong> <?php echo htmlspecialchars($row['cuisine']); ?></p>
  <p><strong>Dietary Info:</strong> <?php echo htmlspecialchars($row['dietary']); ?></p>
  <p><strong>Difficulty:</strong> <?php echo htmlspecialchars($row['difficulty']); ?></p>

  <h3>Ingredients:</h3>
  <p><?php echo nl2br(htmlspecialchars($row['ingredients'])); ?></p>

  <h3>Steps:</h3>
  <p><?php echo nl2br(htmlspecialchars($row['steps'])); ?></p>

  <a class="download-btn" href="generate_recipe_txt.php?id=<?php echo $row['id']; ?>">Download Recipe</a>
    <br><br>
  <p style="margin-top: 20px;">
    <a href="culinary_resources.php" style="color: #0f5132; text-decoration: underline;">
      ← Back to Culinary Resources
    </a>
  </p>

</div>

</body>
</html>
