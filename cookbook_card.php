<?php
include("DataBaseconnection.php");

$sql = "SELECT * FROM cookbook ORDER BY created_at DESC";
$result = mysqli_query($dbconnection, $sql);
?>

<style>
    .card-grid {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .card {
        display: flex;
        flex-direction: row-reverse;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.01);
    }

    .card-img-container {
        flex: 1.2;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
    }

    .card-img-container img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        border-radius: 10px;
    }

    .like-button {
        margin-top: 10px;
        background: #0f5132;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 20px;
        font-size: 14px;
        cursor: pointer;
    }

    .like-button:hover {
        background: #198754;
    }

    .card-content {
        flex: 1;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-content h3 {
        margin: 0;
        color: #0f5132;
    }

    .card-content p {
        margin-top: 10px;
        font-size: 14px;
        color: #444;
        line-height: 1.5;
    }

    .comments {
        margin-top: 15px;
    }

    .comment-box {
        background: #f1f1f1;
        padding: 8px 12px;
        margin-top: 8px;
        border-radius: 8px;
        font-size: 14px;
    }

    .comment-box b {
        color: #0f5132;
    }

    .comment-form {
        margin-top: 15px;
    }

    .comment-form input[type="text"],
    .comment-form textarea {
        width: 100%;
        padding: 6px 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .comment-form textarea {
        resize: vertical;
        min-height: 50px;
    }

    .comment-form button {
        background-color: #0f5132;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: bold;
        cursor: pointer;
    }

    .comment-form button:hover {
        background-color: #198754;
    }

    .comment-scroll {
        max-height: 120px; /* shows around 2 comments */
        overflow-y: auto;
        padding-right: 6px;
        margin-top: 8px;
    }

    @media (max-width: 768px) {
        .card {
            flex-direction: column;
        }

        .card-img-container {
            width: 100%;
        }

        .card-content {
            padding: 15px;
        }
    }
</style>

<div class="card-grid">
<?php
while ($row = mysqli_fetch_assoc($result)) {
    $cookbook_id = $row['id'];

    $like_sql = "SELECT COUNT(*) AS total FROM cookbook_likes WHERE cookbook_id = $cookbook_id";
    $like_result = mysqli_query($dbconnection, $like_sql);
    $likes = mysqli_fetch_assoc($like_result)['total'];

    $comment_sql = "SELECT * FROM cookbook_comments WHERE cookbook_id = $cookbook_id ORDER BY commented_at DESC LIMIT 10";
    $comment_result = mysqli_query($dbconnection, $comment_sql);

    echo "<div class='card'>";
    
    // 📸 Image + Like
    echo "<div class='card-img-container'>";
    if ($row['image']) {
        echo "<img src='{$row['image']}' alt='cookbook'>";
    }
    echo "<form action='like_cookbook.php' method='POST'>
            <input type='hidden' name='cookbook_id' value='{$cookbook_id}'>
            <button class='like-button' type='submit'>❤️ Like ($likes)</button>
          </form>";
    echo "</div>";

    // 📝 Content + Comments
    echo "<div class='card-content'>";
    echo "<div>";
    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
    echo "<p>" . nl2br(htmlspecialchars($row['description'])) . "</p>";
    echo "</div>";

    // 💬 Comments
    echo "<div class='comments'>";
    echo "<strong>Comments:</strong>";
    echo "<div class='comment-scroll'>"; // 🚀 Scrollable wrapper starts here
    while ($comment = mysqli_fetch_assoc($comment_result)) {
        echo "<div class='comment-box'>
                <b>" . htmlspecialchars($comment['name']) . ":</b> " . htmlspecialchars($comment['comment']) . "
              </div>";
    }
    echo "</div>"; // .comment-scroll

    // 🧾 Comment Form
    echo "<form action='comment_cookbook.php' method='POST' class='comment-form'>
            <input type='hidden' name='cookbook_id' value='{$cookbook_id}'>
            <input type='text' name='name' placeholder='Your Name' required>
            <textarea name='comment' placeholder='Your Comment...' required></textarea>
            <button type='submit'>Comment</button>
          </form>";
    echo "</div>"; // .comments
    echo "</div>"; // .card-content
    echo "</div>"; // .card
}
?>
</div>
