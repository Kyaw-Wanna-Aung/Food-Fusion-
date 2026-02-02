<?php
session_start();
include("DataBaseconnection.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    echo "<script>alert('Access Denied'); window.location.href='userlist.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $fname = mysqli_real_escape_string($dbconnection, $_POST['fname']);
    $lname = mysqli_real_escape_string($dbconnection, $_POST['lname']);
    $email = mysqli_real_escape_string($dbconnection, $_POST['email']);
    $username = mysqli_real_escape_string($dbconnection, $_POST['username']);
    $country = mysqli_real_escape_string($dbconnection, $_POST['country']);

    // Handle profile image upload
    $profile = "";
    if (isset($_FILES['profile']) && $_FILES['profile']['error'] == 0) {
        $profileName = $_FILES['profile']['name'];
        $profileTmp = $_FILES['profile']['tmp_name'];
        $profilePath = "image/" . basename($profileName);

        // Optional: Rename file to avoid duplicate names
        $extension = pathinfo($profileName, PATHINFO_EXTENSION);
        $newFileName = uniqid('profile_', true) . '.' . $extension;
        $profilePath = "image/" . $newFileName;

        // Move file
        if (move_uploaded_file($profileTmp, $profilePath)) {
            $profile = $newFileName;

            // Update with profile
            $sql = "UPDATE register SET 
                fname = '$fname',
                lname = '$lname',
                email = '$email',
                username = '$username',
                country = '$country',
                profile = '$profile'
                WHERE id = $id";
        } else {
            echo "<script>alert('Failed to upload profile image.'); window.location.href='userlist.php';</script>";
            exit();
        }
    } else {
        // Update without changing profile
        $sql = "UPDATE register SET 
            fname = '$fname',
            lname = '$lname',
            email = '$email',
            username = '$username',
            country = '$country'
            WHERE id = $id";
    }

    if (mysqli_query($dbconnection, $sql)) {
        echo "<script>alert('User updated successfully'); window.location.href='userlist.php';</script>";
    } else {
        echo "<script>alert('Update failed'); window.location.href='userlist.php';</script>";
    }
} else {
    header("Location: userlist.php");
    exit();
}
