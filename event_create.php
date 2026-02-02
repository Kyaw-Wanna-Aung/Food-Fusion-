<?php
include("DataBaseconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($dbconnection, $_POST['name']);
    $about = mysqli_real_escape_string($dbconnection, $_POST['about']);
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $path = "upload/" . $image;
    move_uploaded_file($tmp, $path);

    $sql = "INSERT INTO events (name, about, image, start_date, end_date)
            VALUES ('$name', '$about', '$path', '$start_date', '$end_date')";

    if (mysqli_query($dbconnection, $sql)) {
        echo "<script>alert('Event created successfully!'); window.location.href='event_list.php';</script>";
    } else {
        echo "Error: " . mysqli_error($dbconnection);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        form input[type="text"],
        form input[type="date"],
        form textarea,
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        form input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        .back-button i {
            margin-right: 5px;
        }

        @media (max-width: 600px) {
            .container {
                margin: 30px 15px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <a href="event_list.php" class="back-button"><i class="fas fa-arrow-left"></i> Back to Event List</a>
    <h2>Create Event</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>About:</label>
        <textarea name="about" rows="4" required></textarea>

        <label>Start Date:</label>
        <input type="date" name="start_date" required>

        <label>End Date:</label>
        <input type="date" name="end_date" required>

        <label>Image:</label>
        <input type="file" name="image" required>

        <input type="submit" value="Create Event">
    </form>
</div>

</body>
</html>
