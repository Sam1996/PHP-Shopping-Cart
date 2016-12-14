<?php

session_start();
include('includes/db/db_config.php');

	$i = 1;
	$fetchData = $db->query(" SELECT * FROM cart GROUP BY productID");
	if(mysqli_num_rows($fetchData) == 0) {
		echo "
			<div class='container-fluid'>
			<div class='alert alert-warning alert-dismissible'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				No items in your cart! <a href='index.php'>Continue shopping...</a>
			</div>
			</div>
		";
	}
	else{ ?>
	<div class="container-fluid">
	<table class="table table-bordered table-striped table-responsive">

		<thead>
				<tr>
					<th>S.No</th>
					<th>Item ID</th>
					<th>Item image</th>
					<th>Item Name</th>
					<th>MRP</th>
					<th>Selling Price</th>
					<th>Quantity</th>
					<th>Amount</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
						while($row = $fetchData->fetch_assoc()){
						$ID = $row['productID'];
				?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $row['productID'];?></td>
					<td><img class="img img-responsive cart-item-image" src="images/<?php echo $row['productName'];?>.png"></img></td>
					<td><a href="item.php?page=item&action=view&id=<?php echo $row['productID'];?>">
						<?php echo $row['productName'];?></a></td>
					<td>&#8377; <?php echo $row['costPrice'];?></td>
					<td>&#8377; <?php echo $row['sellingPrice'];?></td>
					<td>

						<?php 

						$quantity = $db->query(" SELECT * FROM cart WHERE productID = '$ID' ");
						$qty = $quantity->num_rows;

						echo $qty;

						?>

					</td>
					<td>&#8377; <?php echo $row['sellingPrice'] * $qty; ?></td>
					<td>
						<a href="" id="removeBtn" pid="<?php echo $row['productID'];?>">Remove</a>
						<!--<a href="checkout.php?page=checkout&action=checkout&id=<?php echo $row['productID'] ?>">Checkout</a>-->
						<!--<a href="mycart.php?page=mycart&action=remove&id=<?php echo $row['productID'] ?>">Remove</a>-->
					</td>
				</tr>
				<?php
							$i++;
						}
				?>
				</tbody>
		</table>
		</div>
		<div class="container-fluid">
			<div class="col-md-6 col-xs-12 pull-right">
				<div class="row">
					<table class="table table-bordered table-striped table-responsive">
						<thead>
							<tr>
								<th>Detail</th>
								<th>Pricing</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sumQuery = $db->query("SELECT SUM(sellingPrice) AS total FROM cart");
								while($result = $sumQuery->fetch_assoc()){
							?>
							<tr>
								<td>Sub Total</td>
								<td>&#8377; <?php echo $result['total'];?></td>
							</tr>
							<tr>
								<td>Discount</td>
								<td>%</td>
							</tr>
							<tr class="warning">
								<td><b>Grand Total</b></td>
								<td><b>&#8377; <?php echo $result['total'];?></b></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="col-md-6 col-xs-12 pull-right">
				<div class="row">
					<table class="pull-right">
						<tbody>
						<tr>
							<td class="col-md-6">
								<a href="http://localhost/shoppingCart/" class="btn btn-default btn-block button-lg">Continue shopping</a>
							</td>
							<td class="col-md-6"><button class="btn btn-success btn-block button-lg">Checkout</button></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
				<?php
					}
?>


			