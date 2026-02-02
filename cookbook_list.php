<?php
include("DataBaseconnection.php");

// Fetch all cookbooks
$sql = "SELECT * FROM cookbook ORDER BY created_at DESC";
$result = mysqli_query($dbconnection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cookbook List</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f2f2f2;
            padding: 20px;
        }

        .cookbook-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 30px;
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .cookbook-card img {
            width: 180px;
            height: 140px;
            object-fit: cover;
            border-radius: 8px;
        }

        .cookbook-info {
            flex: 1;
        }

        .cookbook-info h2 {
            margin: 0;
            color: #0f5132;
        }

        .cookbook-info p {
            margin-top: 10px;
            color: #555;
        }

        .comments {
            margin-top: 15px;
        }

        .comment-box {
            background: #f1f1f1;
            padding: 8px 12px;
            margin-top: 6px;
            border-radius: 6px;
            font-size: 14px;
        }

        .comment-box b {
            color: #0f5132;
        }

        .delete-btn {
            margin-top: 20px;
            display: inline-block;
            background-color: #dc3545;
            color: white;
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
        }

        .delete-btn:hover {
            background-color: #bb2d3b;
        }

        @media (max-width: 768px) {
            .cookbook-card {
                flex-direction: column;
                align-items: center;
            }

            .cookbook-card img {
                width: 100%;
                height: auto;
            }

            .cookbook-info {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include 'adminpanel.php'; ?>
    <br><br><br><br>
<h1>Cookbook Post List</h1>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    $cookbook_id = $row['id'];
    echo "<div class='cookbook-card'>";

    // Photo
    echo "<img src='{$row['image']}' alt='cookbook'>";

    // Info
    echo "<div class='cookbook-info'>";
    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
    echo "<p>" . nl2br(htmlspecialchars($row['description'])) . "</p>";

    // Comments
    echo "<div class='comments'><strong>Comments:</strong>";
    $comment_sql = "SELECT * FROM cookbook_comments WHERE cookbook_id = $cookbook_id ORDER BY commented_at DESC LIMIT 2";
    $comment_result = mysqli_query($dbconnection, $comment_sql);
    while ($comment = mysqli_fetch_assoc($comment_result)) {
        echo "<div class='comment-box'><b>" . htmlspecialchars($comment['name']) . ":</b> " . htmlspecialchars($comment['comment']) . "</div>";
    }
    echo "</div>";

    // Delete button
    echo "<a href='delete_cookbook.php?id=$cookbook_id' class='delete-btn' onclick=\"return confirm('Are you sure you want to delete this cookbook post?');\">🗑️ Delete</a>";

    echo "</div>"; // .cookbook-info
    echo "</div>"; // .cookbook-card
}
?>

</body>
</html>
