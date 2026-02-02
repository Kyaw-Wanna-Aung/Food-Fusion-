<?php
include("DataBaseconnection.php");

if (!isset($_GET['id'])) {
    die("Missing recipe ID.");
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM recipe WHERE id = $id";
$result = mysqli_query($dbconnection, $sql);
if (!$row = mysqli_fetch_assoc($result)) {
    die("Recipe not found.");
}

$filename = str_replace(' ', '_', strtolower($row['title'])) . ".txt";
header("Content-Type: text/plain");
header("Content-Disposition: attachment; filename=\"$filename\"");

echo "Recipe: " . $row['title'] . "\n";
echo "Cuisine: " . $row['cuisine'] . "\n";
echo "Dietary: " . $row['dietary'] . "\n";
echo "Difficulty: " . $row['difficulty'] . "\n\n";
echo "Ingredients:\n" . $row['ingredients'] . "\n\n";
echo "Steps:\n" . $row['steps'] . "\n";
exit;
