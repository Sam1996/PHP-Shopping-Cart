<?php

session_start();
include('includes/db/db_config.php');

if(isset($_POST['sortProductOnBrand'])){
	$brand = $_POST['brand'];

	if($brand != 'All'){

	$fetchAllData = $db->query("SELECT * FROM allproducts WHERE brand = '$brand'");
	
	while($allDataRow = $fetchAllData->fetch_assoc()){
?>
	<div class="col-md-4 col-xs-12 item-container">
		<div class="productItem">
			<a class="anchor" href="item.php?page=item&action=view&id=<?php echo $allDataRow['productID'];?>">
				<div class="itemImageContainer">
					<img class="itemImage img-responsive" src="images/<?php echo $allDataRow['productName'];?>.png" ></img>
				</div>
				<p class="page-title item-title">
					<?php echo $allDataRow['productName'];?>
				</p>
			</a>
			<div class="price">
				<p>
					<span class="oldPrice">&#8377; <?php echo $allDataRow['costPrice']?></span>&nbsp;&nbsp;
					<span class="newPrice">&#8377; <?php echo $allDataRow['sellingPrice'];?></span>
				</p>
			</div>
			<div class="cart-button-group">
				<div class="col-md-6  cart-button">
					<button type="button" class="btn btn-default btn-block" pid="<?php echo $allDataRow['productID'];?>" pname="<?php echo $allDataRow['productName']; ?>" id="addCartBtn">Add to Cart</button>
					<!--<a class="btn btn-default btn-block" href="index.php?page=products&action=add&id=<?php echo $allDataRow['productID'] ?>">Add to cart</a>-->
					<input type="hidden" name="homePageAddCart" value="<?php echo $allDataRow['productID'];?>">
				</div>
				<div class=" col-md-6  cart-button">
					<a class="btn btn-warning btn-block" href="item.php?page=item&action=view&id=<?php echo $allDataRow['productID'];?>">Buy now</a>
				</div>
			</div>
			<input type="hidden"  id="pdtID" name="hiddenPdtID" value="<?php echo $allDataRow['productID'];?>">
			<input type="hidden"  id="pdtName" name="hiddenPdtName" value="<?php echo $allDataRow['productName'];?>">
			<input type="hidden"  id="pdtCat" name="hiddenPdtCategory" value="<?php echo $allDataRow['productCategory'];?>">
			<input type="hidden"  id="pdtBrand" name="hiddenPdtBrand" value="<?php echo $allDataRow['brand'];?>">
			<input type="hidden"  id="pdtDesc" name="hiddenPdtDescription" value="<?php echo $allDataRow['productDescription'];?>">
			<input type="hidden"  id="pdtCP" name="hiddenPdtCostPrice" value="<?php echo $allDataRow['costPrice'];?>">
			<input type="hidden"  id="pdtSP"  name="hiddenPdtSellingPrice" value="<?php echo $allDataRow['sellingPrice'];?>">
			<input type="hidden"  id="pdtStock" name="hiddenPdtStock" value="<?php echo $allDataRow['stock'];?>">
			</div>
	</div>

<?php
	}

	}
	else{
		$fetchAllData = $db->query("SELECT * FROM allproducts");
		while($allDataRow = $fetchAllData->fetch_assoc()){
?>
	<div class="col-md-4 col-xs-12 item-container">
		<div class="productItem">
			<a class="anchor" href="item.php?page=item&action=view&id=<?php echo $allDataRow['productID'];?>">
				<div class="itemImageContainer">
					<img class="itemImage img-responsive" src="images/<?php echo $allDataRow['productName'];?>.png" ></img>
				</div>
				<p class="page-title item-title">
					<?php echo $allDataRow['productName'];?>
				</p>
			</a>
			<div class="price">
				<p>
					<span class="oldPrice">&#8377; <?php echo $allDataRow['costPrice']?></span>&nbsp;&nbsp;
					<span class="newPrice">&#8377; <?php echo $allDataRow['sellingPrice'];?></span>
				</p>
			</div>
			<div class="cart-button-group">
				<div class="col-md-6  cart-button">
					<button type="button" class="btn btn-default btn-block" pid="<?php echo $allDataRow['productID'];?>" pname="<?php echo $allDataRow['productName']; ?>" id="addCartBtn">Add to Cart</button>
					<!--<a class="btn btn-default btn-block" href="index.php?page=products&action=add&id=<?php echo $allDataRow['productID'] ?>">Add to cart</a>-->
					<input type="hidden" name="homePageAddCart" value="<?php echo $allDataRow['productID'];?>">
				</div>
				<div class=" col-md-6  cart-button">
					<a class="btn btn-warning btn-block" href="item.php?page=item&action=view&id=<?php echo $allDataRow['productID'];?>">Buy now</a>
				</div>
			</div>
			<input type="hidden"  id="pdtID" name="hiddenPdtID" value="<?php echo $allDataRow['productID'];?>">
			<input type="hidden"  id="pdtName" name="hiddenPdtName" value="<?php echo $allDataRow['productName'];?>">
			<input type="hidden"  id="pdtCat" name="hiddenPdtCategory" value="<?php echo $allDataRow['productCategory'];?>">
			<input type="hidden"  id="pdtBrand" name="hiddenPdtBrand" value="<?php echo $allDataRow['brand'];?>">
			<input type="hidden"  id="pdtDesc" name="hiddenPdtDescription" value="<?php echo $allDataRow['productDescription'];?>">
			<input type="hidden"  id="pdtCP" name="hiddenPdtCostPrice" value="<?php echo $allDataRow['costPrice'];?>">
			<input type="hidden"  id="pdtSP"  name="hiddenPdtSellingPrice" value="<?php echo $allDataRow['sellingPrice'];?>">
			<input type="hidden"  id="pdtStock" name="hiddenPdtStock" value="<?php echo $allDataRow['stock'];?>">
			</div>
	</div>
<?php
		}
	}
}

?>