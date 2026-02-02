<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Community Cookbook</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        h2 {
            color: #0f5132;
        }
        .create-btn {
            background-color: #0f5132;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s ease;
        }
        .create-btn:hover {
            background-color: #198754;
        }
    </style>
</head>
<body>
 <?php include 'nav.php'; ?>
<br><br><br><br>

<div class="top-bar">
    <h2>Community Cookbook</h2>
    <a href="create_cookbook.php" class="create-btn">+ Create</a>
</div>

<?php include "cookbook_card.php"; ?>
<?php include('footer.php'); ?>
</body>
</html>
        