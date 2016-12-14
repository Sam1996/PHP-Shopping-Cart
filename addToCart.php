<?php
	/*if(isset($_GET['action']) && $_GET['action']=="add"){

		$id=$_GET['id']; 

		$insertData = $db->query("	INSERT INTO cart(productID,productName,productCategory,productDescription,brand,costPrice,sellingPrice)
								 	SELECT productID,productName,productCategory,productDescription,brand,costPrice,sellingPrice FROM allproducts
								 	WHERE productID = '$id' ") or die(mysql_error());
		if($insertData){
			echo "success";
			header("Location:http://localhost/shoppingCart/");
		}
		else{
			echo "error";
		}

	} */


?> 

<?php

session_start();
include('includes/db/db_config.php');


if(isset($_POST["addProduct"])){

	$id = $_POST['ID'];
	$name = $_POST['name'];

	$query = $db->query(" INSERT INTO 
									cart(productID,productName,productCategory,productDescription,brand,costPrice,sellingPrice) SELECT productID,productName,productCategory,productDescription,brand,costPrice,sellingPrice FROM allproducts
								 	WHERE productID = '$id' ");
	if($query){
				echo "
					<div class='alert alert-success alert-dismissible'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>$name</strong> has been added to cart..!
					</div>
				";
			}
			else{
				echo "
					<div class='alert alert-success alert-dismissible'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Error</strong> adding </strong>$name</strong> to cart
					</div>
				";
			}
}


?>