
<?php

session_start();
include('includes/db/db_config.php');


if(isset($_POST["addProduct"])){

	$id = $_POST['ID'];
	$name = $_POST['name'];
	$firstQty = 0;

	$checkPdt = $db->query("SELECT productID FROM cart WHERE productID = '$id' ");
	$result = $checkPdt->fetch_assoc();
	if($result < 1){

		$fetchProduct = $db->query(" SELECT productID,productName,productCategory,productDescription,brand,costPrice,sellingPrice FROM allproducts
								 	WHERE productID = '$id'  ");
			while ($row = $fetchProduct->fetch_assoc()) {
				$thispdtID = $row['productID'];
				$thispdtName = $row['productName'];
				$thispdtCat = $row['productCategory'];
				$thispdtDesc = $row['productDescription'];
				$thispdtBrand = $row['brand'];
				$thispdtCp = $row['costPrice'];
				$thispdtSp = $row['sellingPrice'];
				$thispdtQty = ++$firstQty;
			}

			$query = $db->query(" INSERT INTO cart(productID,productName,productCategory,quantity,productDescription,brand,costPrice,sellingPrice)
								  VALUES ('$thispdtID','$thispdtName','$thispdtCat','$thispdtQty','$thispdtDesc',
								  '$thispdtBrand','$thispdtCp','$thispdtSp') ");
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
	else{

		$getQty = $db->query("SELECT quantity AS oldQty FROM cart WHERE productID = '$id' ");
		$result = $getQty->fetch_assoc();
		$oldQty = $result['oldQty'];

		$fetchProduct = $db->query(" SELECT productID,productName,productCategory,productDescription,brand,costPrice,sellingPrice FROM allproducts
								 	WHERE productID = '$id'  ");
			while ($row = $fetchProduct->fetch_assoc()) {
				$thispdtID = $row['productID'];
				$thispdtName = $row['productName'];
				$thispdtCat = $row['productCategory'];
				$thispdtDesc = $row['productDescription'];
				$thispdtBrand = $row['brand'];
				$thispdtCp = $row['costPrice'];
				$thispdtSp = $row['sellingPrice'];
				$thispdtQty = ++$oldQty;
			}

			$query = $db->query("UPDATE cart SET quantity = '$thispdtQty' WHERE productID = '$thispdtID' ");

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

}


?>