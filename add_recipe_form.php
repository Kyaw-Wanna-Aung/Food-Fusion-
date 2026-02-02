<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Document</title>
  <style>
    /* Basic reset */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      padding: 20px;
      margin: 0;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      background: #fff;
      padding: 20px 25px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 6px;
      color: #333;
    }

    input[type="text"],
    input[type="file"],
    select,
    textarea {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 15px;
      border: 1.5px solid #ccc;
      border-radius: 5px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
      resize: vertical;
      font-family: inherit;
    }

    input[type="text"]:focus,
    select:focus,
    textarea:focus {
      border-color: #007BFF;
      outline: none;
    }

    textarea {
      min-height: 100px;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #007BFF;
      color: white;
      font-weight: 600;
      font-size: 1.1rem;
      border: none;
      border-radius: 6px;
      padding: 12px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    /* Responsive tweaks */
    @media (max-width: 480px) {
      body {
        padding: 15px 10px;
      }
      form {
        max-width: 100%;
        padding: 15px 20px;
      }
    }
  </style>
</head>

<body>

<?php include 'adminpanel.php'; ?>

<br><br><br><br>
 <form action="add_recipe.php" method="POST" enctype="multipart/form-data">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Image:</label><br>
    <input type="file" name="image"><br><br>

    <label>Cuisine Type:</label><br>
    <input type="text" name="cuisine" placeholder="e.g., Italian"><br><br>

    <label>Dietary Preference:</label><br>
    <input type="text" name="dietary" placeholder="e.g., Vegan"><br><br>

    <label>Cooking Difficulty:</label><br>
    <select name="difficulty">
        <option value="Easy">Easy</option>
        <option value="Medium">Medium</option>
        <option value="Hard">Hard</option>
    </select><br><br>

    <label>Role:</label><br>
    <select name="role" required>
        <option value="">-- Select Role --</option>
        <option value="feature">Feature </option>
        <option value="trend">Trend </option>
    </select><br><br>

    <label>Ingredients:</label><br>
    <textarea name="ingredients" required></textarea><br><br>

    <label>Steps:</label><br>
    <textarea name="steps" required></textarea><br><br>

    <input type="submit" value="Add Recipe">
</form>

</body>
</html>