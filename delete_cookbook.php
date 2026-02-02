<?php
include("DataBaseconnection.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Optional: delete related comments first
    mysqli_query($dbconnection, "DELETE FROM cookbook_comments WHERE cookbook_id = $id");

    // Delete the cookbook post
    $query = "DELETE FROM cookbook WHERE id = $id";
    $result = mysqli_query($dbconnection, $query);

    if ($result) {
        echo "<script>alert('Cookbook post deleted successfully!'); window.location.href='cookbook_list.php';</script>";
    } else {
        echo "<script>alert('Failed to delete cookbook post.'); window.location.href='cookbook_list.php';</script>";
    }
} else {
    header("Location: cookbook_list.php");
}
?>
