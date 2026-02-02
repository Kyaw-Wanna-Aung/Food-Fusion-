
<?php
session_start();
include("DataBaseconnection.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    echo "<script>alert('Access Denied'); window.location.href='userlist.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Optional: delete image file from folder
    $get_img = mysqli_query($dbconnection, "SELECT image FROM recipe WHERE id='$id'");
    if ($row = mysqli_fetch_assoc($get_img)) {
        if (file_exists($row['image'])) {
            unlink($row['image']);
        }
    }

    $sql = "DELETE FROM recipe WHERE id='$id'";
    if (mysqli_query($dbconnection, $sql)) {
        echo "<script>alert('Recipe deleted successfully'); window.location.href='userlist.php';</script>";
    } else {
        echo "<script>alert('Failed to delete recipe'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('No ID Provided'); window.location.href='userlist.php';</script>";
}
?>
