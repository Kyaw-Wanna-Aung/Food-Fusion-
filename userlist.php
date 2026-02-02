<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User List</title>

    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="css/design.css?<?php echo time(); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .section {
            max-width: 90%;
            margin: 80px auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table thead {
            background-color: #3498db;
            color: white;
        }

        th, td {
            padding: 12px 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            border-radius: 50%;
        }

        .btn {
            padding: 6px 10px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            font-size: 14px;
        }

        .btn-edit {
            background-color: #28a745;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn i {
            margin-right: 5px;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                display: none;
            }
            td {
                position: relative;
                padding-left: 50%;
                text-align: left;
            }
            td::before {
                position: absolute;
                left: 15px;
                width: 45%;
                white-space: nowrap;
                font-weight: bold;
            }
            .action-buttons {
                flex-direction: column;
                align-items: center;
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
        <br>
<div class="section">
    <h2>User List</h2>

    <?php
    if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
        include("DataBaseconnection.php");

        $sql = "SELECT * FROM register WHERE role='user'";
        $result = mysqli_query($dbconnection, $sql);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            echo "<table>";
            echo "<thead>
                    <tr>
                        <th>No.</th>
                        <th>Profile</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                  </thead><tbody>";

            for ($i = 0; $i < $num_rows; $i++) {
                $user = mysqli_fetch_assoc($result);
                $user_id = $user['id'];

                echo "<tr>";
                echo "<td>" . ($i + 1) . "</td>";
                echo "<td><img src='image/" . $user['profile'] . "' width='45px' height='45px' onerror=\"this.onerror=null;this.src='image/default.png';\"></td>";

                echo "<td>" . $user['fname'] . "</td>";
                echo "<td>" . $user['lname'] . "</td>";
                echo "<td>" . $user['email'] . "</td>";
                echo "<td>" . $user['username'] . "</td>";
                echo "<td>" . $user['country'] . "</td>";
                echo "<td>
                        <div class='action-buttons'>
                            <a class='btn btn-edit' href='edit_user.php?id=$user_id'>
                                <i class='fas fa-edit'></i> Edit
                            </a>
                            <a class='btn btn-delete' href='delete_user.php?id=$user_id' onclick='return confirm(\"Are you sure you want to delete this user?\");'>
                                <i class='fas fa-trash-alt'></i> Delete
                            </a>
                        </div>
                      </td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No users found.</p>";
        }
    } else {
        echo "<script>alert('Administrator only');</script>";
    }
    ?>
</div>

</body>
</html>
