<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="js/upload.js"></script>
	<link rel="stylesheet" type="text/css" href="css/upload.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<?php
		session_start();
		//check if user has privilage to access this page
		if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == 2)
		{
			//user has privilage. Nothing to do
		}
		else {
			//redirect to index page
			header('location: index.php');
		}
	?>
	<title></title>
</head>
<body>
	<div class="header row">
			<div class="logo col-lg-4"></div>
			<div class="menu col-lg-8 justify-content-end d-flex">
					<span class="menubar">
							<a href="user-home.php" id="home">Home</a>
							<a href="upload.php" id="upload">Upload</a>
							<a href="scripts/logout.php" id="logout">Logout</a>
							<span id="name"><?php echo($_SESSION["firstname"]); ?></span>
							<span id="photo"><?php echo("<img src='images/user/".$_SESSION["photo"]."' class='photo'>"); ?></span>
					</span>
			</div>
	</div>
	<div class="container">
		<div class="content-area row-fluid">
			<div class="legend"><b>Add your video</b></div>
			<div class="upload_form row justify-content-center">
				<form name="upload_form" class="upload_form row col-lg-12" id="upload_form" method="POST">
					<div class="col-lg-6">
						<input type="name" name="url" placeholder="Youtube URL">
					</div>
					<div class="col-lg-2">
						<select name="subject" class="dropdown" id="topic">
							<option value="" selected="selected" hidden="hidden">Topic</option>
						</select>
					</div>
					<div class="col-lg-2">
						<select name="language" class="dropdown" id="language">
							<option value="" selected="selected" hidden="hidden">Language</option>
						</select>
					</div>
					<div class="col-lg-2">
						<button class="btn-success submit" <?php if($_SESSION["upload_restricted"]){ echo("disabled='disabled'"); } ?>>Go -></button>
					</div>
				</form>
			</div>
			<div class="help-msg" id="help"><?php if($_SESSION["upload_restricted"]){ echo("You are not allowed to upload a video!"); } ?></div>
			<div class="video-detail row" id="video-detail">
					<div class="thumbnail col-lg-4 hide"></div>
					<div class="details col-lg-8 hide">
						<div class="title"></div>
						<p><div class="description"></div></p>
						<div class="new-upload d-flex justify-content-end">
							<button class="btn-primary new-upload-btn" id="new-upload-btn">Upload another video</button>
						</div>
					</div>

			</div>
		</div>
	</div>


</body>
</html>
