<?php
include("DataBaseconnection.php");

// Check if all required fields are filled
if (
    empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) ||
    empty($_POST['country']) || empty($_POST['username']) || empty($_POST['pw']) ||
    !isset($_FILES['profile']) || $_FILES['profile']['error'] !== UPLOAD_ERR_OK
) {
    echo "<script>
        alert('Please fill in all required fields and upload a profile image.');
        window.location.href = 'RegForm.php';
    </script>";
    exit;
}

// Sanitize inputs
$fname   = mysqli_real_escape_string($dbconnection, $_POST['fname']);
$lname   = mysqli_real_escape_string($dbconnection, $_POST['lname']);
$email   = mysqli_real_escape_string($dbconnection, $_POST['email']);
$country = mysqli_real_escape_string($dbconnection, $_POST['country']);
$username = mysqli_real_escape_string($dbconnection, $_POST['username']);
$pw       = $_POST['pw'];
$hashedPW = password_hash($pw, PASSWORD_DEFAULT);

// Handle profile upload
$profile = basename($_FILES['profile']['name']);
$temp = $_FILES['profile']['tmp_name'];
$path = "image/" . $profile;

// Upload file safely
if (!move_uploaded_file($temp, $path)) {
    echo "<script>
        alert('Failed to image profile image.');
        window.location.href = 'RegForm.php';
    </script>";
    exit;
}

// Check for duplicate username
$sqlSearch = "SELECT * FROM register WHERE username = '$username'";
$result = mysqli_query($dbconnection, $sqlSearch);
$numrows = mysqli_num_rows($result);

if ($numrows == 0) {
    $sql = "INSERT INTO register (fname, lname, email, country, profile, username, password,role) 
            VALUES ('$fname', '$lname', '$email', '$country', '$profile', '$username', '$hashedPW','user')";
    
    if (mysqli_query($dbconnection, $sql)) {
        echo "<script>
            alert('Registration Completed!');
            window.location.href='LoginForm.php';
        </script>";
    } else {
        echo "<script>
            alert('Registration Failed!');
            window.location.href='RegForm.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Username already exists. Please choose another one.');
        window.location.href='RegForm.php';
    </script>";
}
?>
