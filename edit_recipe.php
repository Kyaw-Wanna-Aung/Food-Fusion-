<?php
session_start();
include("DataBaseconnection.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    echo "<script>alert('Access Denied'); window.location.href='userlist.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM recipe WHERE id='$id'";
    $result = mysqli_query($dbconnection, $sql);
    $recipe = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('No ID Provided'); window.location.href='userlist.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Recipe</title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f2f4f8;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 80px auto;
        background-color: #fff;
        border-radius: 12px;
        padding: 30px 40px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
    }

    form label {
        display: block;
        margin-top: 15px;
        font-weight: 600;
        color: #333;
    }

    form input[type="text"],
    form textarea,
    form input[type="file"],
    form select {
        width: 100%;
        padding: 10px 12px;
        border: 1.5px solid #ccc;
        border-radius: 6px;
        margin-top: 5px;
        font-size: 16px;
        background-color: #fdfdfd;
        transition: border-color 0.3s ease;
        font-family: inherit;
    }

    form select {
      /* Custom dropdown arrow & styling */
      appearance: none;
      background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2210%22%20height%3D%227%22%20viewBox%3D%220%200%2010%207%22%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cpath%20d%3D%22M0%201L5%206L10%201%22%20stroke%3D%22%23333%22%20stroke-width%3D%222%22/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 12px center;
      background-size: 10px 7px;
      cursor: pointer;
    }

    form input[type="text"]:focus,
    form textarea:focus,
    form select:focus {
        border-color: #3498db;
        outline: none;
    }

    form textarea {
        min-height: 100px;
        resize: vertical;
    }

    form input[type="submit"] {
        margin-top: 25px;
        width: 100%;
        padding: 12px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form input[type="submit"]:hover {
        background-color: #2980b9;
    }

    @media (max-width: 600px) {
        .container {
            margin: 30px 15px;
            padding: 25px;
        }
    }
    </style>
</head>
<body>
   <div class="container">
     <h2>Edit Recipe</h2>
    <form action="update_recipe.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($recipe['id']); ?>">

        <label>Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($recipe['title']); ?>" required>

        <label>Ingredients:</label>
        <textarea name="ingredients" required><?php echo htmlspecialchars($recipe['ingredients']); ?></textarea>

        <label>Steps:</label>
        <textarea name="steps" required><?php echo htmlspecialchars($recipe['steps']); ?></textarea>

        <label>Cuisine (Country):</label>
        <input type="text" name="cuisine" value="<?php echo htmlspecialchars($recipe['cuisine']); ?>">

        <label>Dietary:</label>
        <input type="text" name="dietary" value="<?php echo htmlspecialchars($recipe['dietary']); ?>">

        <label>Difficulty:</label>
        <input type="text" name="difficulty" value="<?php echo htmlspecialchars($recipe['difficulty']); ?>">

        <label>Role:</label>
        <select name="role">
            <option value="" <?php if($recipe['role'] == '') echo 'selected'; ?>>-- Select Role --</option>
            <option value="feature" <?php if($recipe['role'] == 'feature') echo 'selected'; ?>>Feature</option>
            <option value="trend" <?php if($recipe['role'] == 'trend') echo 'selected'; ?>>Trend</option>
        </select>

        <label>Image (Leave blank if no change):</label>
        <input type="file" name="image">

        <input type="submit" value="Update Recipe">
    </form>
   </div>
</body>
</html>
