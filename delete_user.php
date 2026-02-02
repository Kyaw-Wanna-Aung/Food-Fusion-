<?php
session_start();
include("DataBaseconnection.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    echo "<script>alert('Access Denied'); window.location.href='userlist.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Securely cast ID to integer

    // Optional: Prevent admin from deleting themselves
    if ($_SESSION['id'] == $id) {
        echo "<script>alert('You cannot delete your own account.'); window.location.href='userlist.php';</script>";
        exit();
    }

    // Check if user exists
    $check = mysqli_query($dbconnection, "SELECT * FROM register WHERE id=$id");
    if (mysqli_num_rows($check) == 0) {
        echo "<script>alert('User not found.'); window.location.href='userlist.php';</script>";
        exit();
    }

    // Delete user
    $sql = "DELETE FROM register WHERE id = $id";
    if (mysqli_query($dbconnection, $sql)) {
        echo "<script>alert('User deleted successfully'); window.location.href='userlist.php';</script>";
    } else {
        echo "<script>alert('Error deleting user'); window.location.href='userlist.php';</script>";
    }
} else {
    header("Location: userlist.php");
    exit();
}
?>
