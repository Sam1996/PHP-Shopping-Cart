<?php

session_start();
include('includes/db/db_config.php');


		if(isset($_POST['removeProduct'])){

			$id=$_POST['ID']; 

			$delete = $db->query("DELETE FROM cart where productID = '$id' ");
			
			if($delete){
				echo "
					<div class='alert alert-success alert-dismissible'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						One item has been removed from the cart
					</div>
				";
			}
			else{
				echo "
					<div class='alert alert-success alert-dismissible'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Error</strong> removing item!
					</div>
				";
			}

		}
?>