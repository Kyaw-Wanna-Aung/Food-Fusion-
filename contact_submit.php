<?php
include("DataBaseconnection.php"); // ensure this file connects to your DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($dbconnection, $_POST['name']);
    $email = mysqli_real_escape_string($dbconnection, $_POST['email']);
    $subject = mysqli_real_escape_string($dbconnection, $_POST['subject']);
    $message = mysqli_real_escape_string($dbconnection, $_POST['message']);

    $sql = "INSERT INTO feedback (name, email, subject, message)
            VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($dbconnection, $sql)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='contactus.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Try again.'); window.history.back();</script>";
    }
}
?>
