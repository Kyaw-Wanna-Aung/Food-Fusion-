<?php
include("DataBaseconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cookbook_id = intval($_POST['cookbook_id']);
    $user_ip = $_SERVER['REMOTE_ADDR'];

    // Check if already liked
    $check = mysqli_query($dbconnection, "SELECT * FROM cookbook_likes WHERE cookbook_id=$cookbook_id AND user_ip='$user_ip'");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($dbconnection, "INSERT INTO cookbook_likes (cookbook_id, user_ip) VALUES ($cookbook_id, '$user_ip')");
    }

    header("Location: cookbook.php");
}
?>
