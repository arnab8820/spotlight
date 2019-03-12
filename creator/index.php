<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
  <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/signup.js"></script>
	<?php 
		require "scripts/check_login_status.php"; 
		$r=check_login();
		if($r==1)
		{
			header('location: user-home.php');
		}
	?>
	<title>Welcome Creator</title>
</head>
<body>
	<div class="stick-top">
		<div class="header">
			<div class="logo"><h4>Spotlight</h4></div>
		</div>
	</div>
	<div class="content-area row">
		<div class="welcome-msg col-lg-9">
			<div class="clock"></div>
			<div class="date"></div>
			<div class="welcome-text">Hello creator!<br>Welcome to creators' hub!</div>
		</div>
		<div class="login-section col-lg-3 justify-content-center">
				<div class="login-header">Hey There, Please Login</div>
				<div class="login-form">
					<form id="login">
						<div class="input">
							<input type="name" name="username" placeholder="Username">
							<input type="password" name="password" placeholder="Password">
						</div>
						<div class="">
							<br><button class="submit-btn btn-primary">Continue</button>
						</div>
					</form>
				</div>
				<div class="signup-form">
					<form id="signup-form">
						<div class="input">
							<input type="username" name="username" placeholder="Username" required="required">
							<input type="password" id="password" name="password" placeholder="Password" required="required">
							<input type="password" id="password_again" name="password-again" placeholder="Password again" required="required">
						</div>
						<div>
							<br><button class="submit-btn btn-primary" disabled="disabled">Continue</button>
						</div>
					</form>
				</div>
				<div class="switch">Need an account? <a href="#" id="signup">Sign up</a></div>
			</div>
		</div>

</body>
</html>
