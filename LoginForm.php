<?php
session_start();
if (isset($_COOKIE['login_blocked'])) {
    header("Location: loginTimer.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form</title>
	<link rel="stylesheet" href="css/style4.css">
</head>
<body>

	<div class="Login_Box_Continer">
		<form action="LoginProcess.php" method="POST">
			<div class="Login_Box">
				<div class="Login_header">
					<h1>Login</h1>
				</div>
				<div class="input_box">
					<input type="text" name="username" class="input_field" placeholder="Username" autocomplete="off" required>
				</div>
				<br>
				<div class="input_box">
					<input type="password" name="password" class="input_field" placeholder="Password" autocomplete="off" required>
				</div>
				<br>
				<div class="checkbox_contanier">
					<input class="chk" type="checkbox" id="ppcheck" value="I agree" required autocomplete="off">
					<label class="checkbox_label" for="ppcheck">I agree to the</label>
					<a href="privacy_policy.php" class="pp">Privacy Policy</a>
				</div>
				<br>
				<div class="input_submit">
					<input class="submit_button" type="submit" name="submit" value="Login">
				</div>
				<div class="sign_up_link">
					<p>Don't have an account? <a href="RegForm.php">Register!</a></p>
				</div>
				<div class="sign_up_link">
					<p>Back to <a href="home.php">Home</a></p>
				</div>
			</div>
		</form>
	</div>

</body>
</html>

