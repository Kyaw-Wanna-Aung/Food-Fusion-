<?php
include("DataBaseconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cookbook_id = intval($_POST['cookbook_id']);
    $name = mysqli_real_escape_string($dbconnection, $_POST['name']);
    $comment = mysqli_real_escape_string($dbconnection, $_POST['comment']);

    $sql = "INSERT INTO cookbook_comments (cookbook_id, name, comment)
            VALUES ($cookbook_id, '$name', '$comment')";
    mysqli_query($dbconnection, $sql);

    header("Location: cookbook.php");
}
?>
