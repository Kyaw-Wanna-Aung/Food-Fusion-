<?php  
$host = "localhost";
$username = "root";
$password = "";
$dbname = "l5dc110k";
$connection = mysqli_connect($host,$username,$password,$dbname);

if ($connection) 
	echo "Datase connected!";
else echo "Connection Falied";

?>