<?php
session_start();
include("DataBaseconnection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($dbconnection, $_POST['id']);
    $title = mysqli_real_escape_string($dbconnection, $_POST['title']);
    $ingredients = mysqli_real_escape_string($dbconnection, $_POST['ingredients']);
    $steps = mysqli_real_escape_string($dbconnection, $_POST['steps']);
    $cuisine = mysqli_real_escape_string($dbconnection, $_POST['cuisine']);
    $dietary = mysqli_real_escape_string($dbconnection, $_POST['dietary']);
    $difficulty = mysqli_real_escape_string($dbconnection, $_POST['difficulty']);
    $role = mysqli_real_escape_string($dbconnection, $_POST['role']);  // New role field

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . "_" . basename($_FILES['image']['name']);
        $image_tmp = $_FILES['image']['tmp_name'];
        $upload_dir = "upload/";

        // Move uploaded file
        if (move_uploaded_file($image_tmp, $upload_dir . $image_name)) {
            $image_path = $upload_dir . $image_name;

            $sql = "UPDATE recipe SET 
                title='$title',
                ingredients='$ingredients',
                steps='$steps',
                cuisine='$cuisine',
                dietary='$dietary',
                difficulty='$difficulty',
                role='$role',
                image='$image_path'
                WHERE id='$id'";
        } else {
            echo "<script>alert('Failed to upload image'); window.history.back();</script>";
            exit;
        }
    } else {
        // No new image uploaded, keep old image
        $sql = "UPDATE recipe SET 
            title='$title',
            ingredients='$ingredients',
            steps='$steps',
            cuisine='$cuisine',
            dietary='$dietary',
            difficulty='$difficulty',
            role='$role'
            WHERE id='$id'";
    }

    if (mysqli_query($dbconnection, $sql)) {
        echo "<script>alert('Recipe updated successfully'); window.location.href='recipelist.php';</script>";
    } else {
        echo "<script>alert('Failed to update recipe: " . mysqli_error($dbconnection) . "'); window.history.back();</script>";
    }
}
?>
