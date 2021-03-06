<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="css/search.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
	<title>Welcome</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand"><img src="img/logo.png"></a>
			</div>
			<div class="collapse navbar-collapse" id="MyNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.html">Home</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="https://creator.beta-testsite.ml">Upload</a></li>
					<li><a href="#">Contribute</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- custom carousel starts here -->

	<section class="search">
		<form id="search" method="get" action="search-result.php">
			<div class="row search-form">
				<div class="col-sm-7">
					<input type="name" name="keyword" id="keyword" value="Make a wish ....">
				</div>
				<div class="col-sm-2">
					<select id="subject" name="subject">
						<option value="">Topic</option>
					</select>
				</div>
				<div class="col-sm-2">
					<select id="language" name="language">
						<option value="">Language</option>
					</select>
				</div>
				<div class="col-sm-1">
					<button class="submit btn-primary">Go</button>
				</div>

			</div>
		</form>
        <div class="container search-result" id="search-result">
        </div>
        <div class="container pagination">
            Load More results
        </div>
	</section>

    <!-- Search section starts here -->

    <!-- Search section ends here -->



</body>
</html>
