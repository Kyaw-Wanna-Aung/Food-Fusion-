<?php
session_start();

if (isset($_SESSION['login_counter'])) {
    $counter = $_SESSION['login_counter'];
} else {
    $counter = 0;
}

include('DataBaseconnection.php');
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM register WHERE username = '$username'";
$result = mysqli_query($dbconnection, $sql);
$num_rows = mysqli_num_rows($result);

if ($num_rows == 1) {
    $record = mysqli_fetch_assoc($result);
    $hashed_pw = $record['password'];

    if (password_verify($password, $hashed_pw)) {
        $_SESSION['login_counter'] = 0; // reset login attempts
        $_SESSION['role'] = $record['role']; // store role in session
        $_SESSION['username'] = $username;

        if ($record['role'] == "admin") {
            echo "<script>alert('Admin login successful!'); window.location.href='userlist.php';</script>";
            exit();
        } else {
            echo "<script>alert('Login successful!'); window.location.href='home.php';</script>";
            exit();
        }
    } else {
        $counter++;
        $_SESSION['login_counter'] = $counter;

        if ($counter >= 3) {
            setcookie("login_blocked", "true", time() + 60);
            $_SESSION['login_counter'] = 0;
            echo "<script>window.location.href='loginTimer.php';</script>";
            exit();
        } else {
            echo "<script>alert('Invalid password'); window.location.href='LoginForm.php';</script>";
            exit();
        }
    }
} else {
    $counter++;
    $_SESSION['login_counter'] = $counter;

    if ($counter >= 3) {
        setcookie("login_blocked", "true", time() + 60);
        $_SESSION['login_counter'] = 0;
        echo "<script>window.location.href='loginTimer.php';</script>";
        exit();
    } else {
        echo "<script>alert('Invalid username'); window.location.href='LoginForm.php';</script>";
        exit();
    }
}
?>
