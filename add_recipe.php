<?php
include("DataBaseconnection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = mysqli_real_escape_string($dbconnection, $_POST['title']);
    $cuisine = mysqli_real_escape_string($dbconnection, $_POST['cuisine']);
    $dietary = mysqli_real_escape_string($dbconnection, $_POST['dietary']);
    $difficulty = mysqli_real_escape_string($dbconnection, $_POST['difficulty']);
    $ingredients = mysqli_real_escape_string($dbconnection, $_POST['ingredients']);
    $steps = mysqli_real_escape_string($dbconnection, $_POST['steps']);
    $role = mysqli_real_escape_string($dbconnection, $_POST['role']); // ✅ Get role from form

    // Handle image upload
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $path = "image/" . $image;

    if (!empty($image)) {
        move_uploaded_file($tmp, $path);
    } else {
        $path = ""; // or set a default image path
    }

    // Insert query
    $sql = "INSERT INTO recipe (title, image, ingredients, steps, cuisine, dietary, difficulty, role)
            VALUES ('$title', '$path', '$ingredients', '$steps', '$cuisine', '$dietary', '$difficulty', '$role')";

    if (mysqli_query($dbconnection, $sql)) {
        echo "<script>alert('Recipe added successfully!'); window.location.href='show_recipe.php';</script>";
    } else {
        echo "Error: " . mysqli_error($dbconnection);
    }
}
?>
