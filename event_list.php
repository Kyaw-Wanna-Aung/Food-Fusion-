<?php
include("DataBaseconnection.php");
$result = mysqli_query($dbconnection, "SELECT * FROM events ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event List</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f7f7f7;
            padding: 30px;
            margin: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h2 {
            margin: 0;
            color: #0f5132;
        }

        .create-btn {
            background-color: #198754;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            transition: background 0.3s ease;
        }

        .create-btn:hover {
            background-color: #157347;
        }

        .event {
            background: #fff;
            margin-bottom: 20px;
            padding: 15px;
            box-shadow: 0 0 10px #ccc;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .event img {
            width: 120px;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
        }

        .event-info {
            flex: 1;
        }

        .event-info h3 {
            margin: 0;
            font-size: 20px;
            color: #0f5132;
        }

        .event-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: flex-end;
        }

        .btn {
            padding: 6px 12px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }

        .edit-btn { background-color: #0d6efd; }
        .edit-btn:hover { background-color: #0b5ed7; }

        .delete-btn { background-color: #dc3545; }
        .delete-btn:hover { background-color: #bb2d3b; }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .event {
                flex-direction: column;
                align-items: flex-start;
            }

            .event img {
                width: 100%;
                height: auto;
            }

            .event-actions {
                width: 100%;
                justify-content: flex-start;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <?php include 'adminpanel.php'; ?>
    <br><br><br><br><br>

    <div class="header">
        <h2>Event List</h2>
        <a href="event_create.php" class="create-btn">+ Create Event</a>
    </div>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="event">
            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Event Image">
            <div class="event-info">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
            </div>
            <div class="event-actions">
                <a class="btn edit-btn" href="event_edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a class="btn delete-btn" href="event_delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </div>
        </div>
    <?php } ?>

</body>
</html>
