<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="js/user-home.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/user-home.css">
        <link rel="stylesheet" type="text/css" href="css/header.css">
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
        <title>Welcome Home</title>
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
        <div class="container-fluid">
        	<div class="row content-area">
	            <div class="col-md-3 user-panel">
	            	<img class="user-photo" src='<?php echo("images/user/".$_SESSION["photo"]); ?>'>
	            	<div class="detail"><b><?php echo($_SESSION["firstname"]." ".$_SESSION["lastname"]); ?></b></div>
	            	<div class="detail"><?php echo($_SESSION["username"]); ?></div>
	            	<div class="inf-form" <?php if($_SESSION["detail_given"]){ echo("hidden='hidden'"); } ?>>
	            		<h6>Please fill up your details first</h6>
	            		<form name="info" id="info">
		            		<div class="input"><input type="name" name="firstname" placeholder="Firstname" required="required"></div>
		            		<div class="input"><input type="name" name="middlename" placeholder="Middlename"></div>
		            		<div class="input"><input type="name" name="lastname" placeholder="Lastname" required="required"></div>
		            		<div class="input">
		            			<select name="gender" required="required">
		            				<option value="" selected="selected" hidden="hidden">Gender</option>
		            				<option value="Male">Male</option>
		            				<option value="Female">Female</option>
		            			</select>
		            		</div>
		            		<div class="input">
		            			<span>Choose your photo</span>
		            			<input type="file" name="photo" class="primary" required="required">
		            		</div>
		            		<br>
		            		<div class="submit"><button class="btn-primary">Update Details</button></div>
	            		</form>
	            	</div>
	            	<div <?php if(!$_SESSION["detail_given"]){ echo("hidden='hidden'"); } ?>>
                        <li>
                            <ul class="user-option">> My videos</ul>
                            <ul class="user-option">> Search video</ul>
                            <ul class="user-option">> Add topic</ul>
                            <ul class="user-option">> Add language</ul>
                            <ul class="user-option">> Change password</ul>

                        </li>
                    </div>
	            </div>
	            <div class="col-md-9">
	            	<div class="welcome-msg">
	            		<span>
	            			<h1>Hello!</h1>
	            			<h3>We are glad to have you back!</h3>
	            		</span>
	            	</div>
	            </div>
	        </div>
        </div>

    </body>
</html>


<!--
ebanking@indianbank.co.in
-->