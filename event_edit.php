<?php
include("DataBaseconnection.php");

if (!isset($_GET['id'])) {
    echo "<script>window.location.href='event_list.php';</script>";
    exit;
}

$id = $_GET['id'];
$result = mysqli_query($dbconnection, "SELECT * FROM events WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($dbconnection, $_POST['name']);
    $about = mysqli_real_escape_string($dbconnection, $_POST['about']);
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if ($_FILES['image']['name'] != "") {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $path = "upload/" . $image;
        move_uploaded_file($tmp, $path);
        $sql = "UPDATE events SET name='$name', about='$about', image='$path', start_date='$start_date', end_date='$end_date' WHERE id=$id";
    } else {
        $sql = "UPDATE events SET name='$name', about='$about', start_date='$start_date', end_date='$end_date' WHERE id=$id";
    }

    if (mysqli_query($dbconnection, $sql)) {
        echo "<script>alert('Event updated!'); window.location.href='event_list.php';</script>";
    } else {
        echo "Error: " . mysqli_error($dbconnection);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #e0f7fa, #ffffff);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 60px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #00695c;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #00695c;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #004d40;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Event</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>

            <label>About:</label>
            <textarea name="about" required><?php echo htmlspecialchars($row['about']); ?></textarea>

            <label>Start Date:</label>
            <input type="date" name="start_date" value="<?php echo $row['start_date']; ?>" required>

            <label>End Date:</label>
            <input type="date" name="end_date" value="<?php echo $row['end_date']; ?>" required>

            <label>Image (optional):</label>
            <input type="file" name="image">

            <input type="submit" value="Update Event">
        </form>
    </div>
</body>
</html>
