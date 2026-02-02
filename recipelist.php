<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recipe List</title>

    <link rel="stylesheet" type="text/css" href="css/design.css?<?php echo time(); ?>">
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
            border-radius: 8px;
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
    <h2>Recipe List</h2>

    <?php
    if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
        include("DataBaseconnection.php");

       if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $recipe_id = (int) $_GET['id'];
    $sql = "SELECT * FROM recipe WHERE id = $recipe_id";
} else {
    $sql = "SELECT * FROM recipe ORDER BY id DESC"; // fallback to all recipes
}

        $result = mysqli_query($dbconnection, $sql);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            echo "<table>";
            echo "<thead>
                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Country</th>
                        <th>Dietary</th>
                        <th>Difficulty</th>
                        <th>Action</th>
                    </tr>
                  </thead><tbody>";

            for ($i = 0; $i < $num_rows; $i++) {
                $rclist = mysqli_fetch_assoc($result);
                $recipe_id = $rclist['id'];

                echo "<tr>";
                echo "<td>" . ($i + 1) . "</td>";
                echo "<td><img src='" . $rclist['image'] . "' width='100px' height='100px'></td>";
                echo "<td>" . $rclist['title'] . "</td>";
                echo "<td>" . $rclist['cuisine'] . "</td>";
                echo "<td>" . $rclist['dietary'] . "</td>";
                echo "<td>" . $rclist['difficulty'] . "</td>";
                echo "<td>
                        <div class='action-buttons'>
                            <a class='btn btn-edit' href='edit_recipe.php?id=$recipe_id'>
                                <i class='fas fa-edit'></i> Edit
                            </a>
                            <a class='btn btn-delete' href='delete_recipe.php?id=$recipe_id' onclick='return confirm(\"Are you sure you want to delete this recipe?\");'>
                                <i class='fas fa-trash-alt'></i> Delete
                            </a>
                        </div>
                      </td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No recipes found.</p>";
        }
    } else {
        echo "<script>alert('Administrator only');</script>";
    }
    ?>
</div>

</body>
</html>
