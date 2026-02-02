<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Process</title>
</head>
<body>
		<?php
		include("dbconnection.php")	

$fname =mysqli_real_escape_string($connection,$_POST['fname']);
$lname = mysqli_real_escape_string($connection,$_POST['lname']);
$email	 = mysqli_real_escape_string($connection,$_POST['email']);
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];

$profilename= $_FILES['filetouplode']['name'];
$temp_naem= $_FILES['filetouplode']['tmp_name'];
$path= "upload/".$profilename;
copy($temp_name, $path); //source,destination

$username= $_POST['username'];
$pw= $_POST['pw'];
$hashedPW=password_hash($pw, PASSWORD_DEFAULT);

$sqlSearch= "select * from user where username = '$usernamae'";

$result=(mysqli_query($connection,$sqlSearch));
$numrwos=mysqli_num_rows($result);

if($numrows==0){


	$sql = "INSERT INTO  user (fname,lname,email,dob,phone,username,password,gender,clud,address,country,profile) values ($fname,$lname,$email,$dob,$phone,$username,$pw,$gender,"music",$address,$country,$path)";
	if(mysqli_query($connection,$sql))
	{
	echo"<script>
	alert('Registration Completed!');
	window.location.href='home_1.php';
	</script.";
	}
	else
	{
	echo"<script>
	alert('Registration Feiled');
	window.location.href='RegisterForm.php';
	</script.";
	}
}else
echo "<script>
                alert('plz change username');
                window.location.href='register.php';
              </script>";


?>
</body>
</html>
