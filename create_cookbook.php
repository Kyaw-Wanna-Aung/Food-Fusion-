<?php
include("DataBaseconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($dbconnection, $_POST['title']);
    $description = mysqli_real_escape_string($dbconnection, $_POST['description']);

    // Image upload
    if ($_FILES['image']['name'] != "") {
        $image_name = time() . "_" . $_FILES['image']['name'];
        $temp_path = $_FILES['image']['tmp_name'];
        move_uploaded_file($temp_path, "upload/" . $image_name);
        $image_path = "upload/" . $image_name;
    } else {
        $image_path = null;
    }

    $sql = "INSERT INTO cookbook (title, description, image) 
            VALUES ('$title', '$description', '$image_path')";

    if (mysqli_query($dbconnection, $sql)) {
        echo "<script>alert('Cookbook entry created!'); window.location.href='cookbook.php';</script>";
    } else {
        echo "<script>alert('Error occurred!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Cookbook Entry</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f9f9f9;
            padding: 40px;
        }
        .form-container {
            background: white;
            padding: 30px;
            max-width: 600px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #0f5132;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type="file"] {
            margin-top: 10px;
        }
        button, .back-link {
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #0f5132;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        button:hover, .back-link:hover {
            background-color: #198754;
        }
    </style>
</head>
<body>
<div class="form-container">
    <a href="cookbook.php" class="back-link">← Back to Cookbook</a>

    <h2>Create New Cookbook Entry</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Title</label>
        <input type="text" name="title" required>

        <label>Description</label>
        <textarea name="description" rows="5" required></textarea>

        <label>Image</label>
        <input type="file" name="image">

        <button type="submit">Save</button>
    </form>
</div>
</body>
</html>
