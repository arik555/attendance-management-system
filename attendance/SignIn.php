<?php

ob_start();
session_start();
include 'includes/config.php';
include 'server.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>SignIn</title>
	<link href="css/loader.css" rel="stylesheet">
	<script src="js/pace.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/logo.jpg">
	<!-- stylesheets -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/loginstyle.css">
	<!-- google fonts  -->
	<style> img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
                display:none!important;
            }</style>

</head>

<body>
	<div class="agile-login">

		<div class="wrapper">
			<h2>Login</h2>
			<div class="myform">
				<label style="color:red;">
					<?php
              if(isset($error)){
                  echo "$error";
              }
              ?></label>
				<form action="" method="post">
					<select class="form-control" name="user_type">
						<option value="T">Teacher</option>
						<option value="S">Student</option>
						<option value="A">Admin</option>
					</select>
					<label>Username</label>
					<input type="text" name="uname" placeholder="Username" required />
					<label>Password</label>
					<input type="text" name="pass" placeholder="Password" required />
					<a href="#" class="pass">Forgot Password ?</a>
					<input type="submit" value="LogIn" name="login_sub" />
				</form>
			</div>


		</div>
		<br>

	</div>

</body>

</html>
