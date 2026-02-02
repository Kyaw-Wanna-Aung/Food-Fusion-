<?php
session_start();
include("DataBaseconnection.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    echo "<script>alert('Access Denied'); window.location.href='userlist.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM register WHERE id = $id";
    $result = mysqli_query($dbconnection, $sql);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "<script>alert('User not found'); window.location.href='userlist.php';</script>";
        exit();
    }
} else {
    header("Location: userlist.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            font-weight: bold;
        }
        .btn-submit {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #2980b9;
        }
        .profile-img {
            display: block;
            margin: 10px auto;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ccc;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit User</h2>
    <form action="update_user.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <label>First Name</label>
        <input type="text" name="fname" value="<?= $user['fname'] ?>" required>

        <label>Last Name</label>
        <input type="text" name="lname" value="<?= $user['lname'] ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" required>

        <label>Username</label>
        <input type="text" name="username" value="<?= $user['username'] ?>" required>

        <label>Country</label>
        <input type="text" name="country" value="<?= $user['country'] ?>" required>

        <label>Current Profile</label><br>
        <?php if (!empty($user['profile'])): ?>
            <img class="profile-img" src="image/<?= $user['profile'] ?>" alt="Profile Image">
        <?php else: ?>
            <p>No profile image uploaded.</p>
        <?php endif; ?>

        <label>Change Profile Image</label>
        <input type="file" name="profile">

        <button class="btn-submit" type="submit">Update</button>
    </form>
</div>

</body>
</html>
