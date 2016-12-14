<?php

session_start();
include('includes/db/db_config.php');

if(isset($_POST['cart_count'])){

	$query = $db->query( " SELECT * FROM cart " );
	$count = $query->num_rows;
	if($count > 0){
		echo "<a href='mycart.php' class='cart-item'><span class='glyphicon glyphicon-shopping-cart'></span> $count items</a>";
	}
	else{
		echo "<a href='mycart.php' class='cart-item'><span class='glyphicon glyphicon-shopping-cart'></span> No items</a>";
	}
}

?>