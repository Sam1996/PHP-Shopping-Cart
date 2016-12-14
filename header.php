<html>
<head>
	<title>Shoe shore</title>
	<link rel="stylesheet" type="text/css" href="includes/lib/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="includes/lib/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="includes/lib/owl-carousel/owl.theme.css">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif|Montserrat|PT+Sans|Source+Sans+Pro" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Lobster|Open+Sans|Oswald|Sahitya|Slabo+27px|Yrsa" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="includes/lib/jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="includes/lib/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="includes/lib/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="includes/lib/owl-carousel/owl.carousel.min.js"></script>
	<script type="text/javascript" src="includes/lib/zoom-master/jquery.zoom.min.js"></script>
	<script type="text/javascript" src="includes/lib/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<?php
		include("includes/db/db_config.php");
		session_start();

		/*$fetchCount = $db->query(" SELECT * FROM cart ");
		$count =  $fetchCount->num_rows;
		if($count > 0){
			$noOfItemsInCart = $count;
		}
		else{
			$noOfItemsInCart = "No";
		}*/
	?>
	<div class="container">
		<div class="row">
			<div class="header navbar navbar-danger">
				<div class="navbar-header">
					<a class="navbar-brand" href="http://localhost/shoppingCart/">Shoe shore</a>
				</div>
				<ul class="container-fluid nav navbar-nav navbar-right cart-items-count">
					<li class="cart-count"></li>
				</ul>
			</div>
		</div>
		<div class="row navigation">
			<ul class="nav navbar-nav">
				<li><a href="http://localhost/shoppingCart/">Home</a></li>
				<li><a href="admin.php">Shop</a></li>
				<li><a href="offer.php">Offers</a></li>
				<li><a href="mycart.php">My Cart</a></li>
			</ul>
		</div>

	