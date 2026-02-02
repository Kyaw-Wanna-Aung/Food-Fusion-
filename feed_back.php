<?php
session_start();
include("DataBaseconnection.php");

// Optional: Only allow admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    echo "<script>alert('Access Denied'); window.location.href='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback List</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }
        .container {
            max-width: 960px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #0f5132;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        thead {
            background-color: #0f5132;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        @media(max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                display: none;
            }
            td {
                position: relative;
                padding-left: 50%;
            }
            td::before {
                position: absolute;
                top: 12px;
                left: 12px;
                font-weight: bold;
                content: attr(data-label);
            }
        }
    </style>
</head>
<body>     
        <?php include 'adminpanel.php'; ?>
    <br><br><br><br><br>
<div class="container">
    <h2>Feedback Messages</h2>
    <?php
    $sql = "SELECT * FROM feedback ORDER BY submitted_at DESC";
    $result = mysqli_query($dbconnection, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td data-label='#'>{$i}</td>
                    <td data-label='Name'>{$row['name']}</td>
                    <td data-label='Email'>{$row['email']}</td>
                    <td data-label='Subject'>{$row['subject']}</td>
                    <td data-label='Message'>{$row['message']}</td>
                    <td data-label='Date'>{$row['submitted_at']}</td>
                    <td>
                    <a href='delete_feedback.php?id={$row['id']}' 
                    onclick=\"return confirm('Are you sure you want to delete this feedback?');\" 
                     style='color: red; text-decoration: none; font-weight: bold;'>Delete</a>
                    </td>
                  </tr>";
            $i++;
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No feedback submitted yet.</p>";
    }
    ?>
</div>
</body>
</html>
