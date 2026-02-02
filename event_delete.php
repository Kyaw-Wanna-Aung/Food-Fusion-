<?php
include("DataBaseconnection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($dbconnection, "DELETE FROM events WHERE id = $id");
}

header("Location: event_list.php");
exit;
?>
