<?php
session_start();
include("DataBaseconnection.php");

// Optional: restrict access to admin only
if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    echo "<script>alert('Access Denied'); window.location.href='feed_back.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM feedback WHERE id='$id'";

    if (mysqli_query($dbconnection, $sql)) {
        echo "<script>alert('Feedback deleted successfully'); window.location.href='feed_back.php';</script>";
    } else {
        echo "<script>alert('Failed to delete feedback'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('No ID specified'); window.location.href='feed_back.php';</script>";
}
?>
