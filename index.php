<?php
	include("header.php");
?>
	<div class="row">
		<div class="carousel">
			<div class="carousel-image item">
				<img src="includes/img/a.jpg" width="100%" height="400px">
			</div>
			<div class="carousel-image item">
				<img src="includes/img/b.jpg" width="100%" height="400px">
			</div>
			<div class="carousel-image item">
				<img src="includes/img/d.jpg" width="100%" height="400px">
			</div>
			<div class="carousel-image item">
				<img src="includes/img/e.jpg" width="100%" height="400px">
			</div>
		</div>
	</div>
<div class="row main-wrap">
	<div class="row">
		<div class="col-md-3 col-xs-12">
				<div class="container-fluid  aside">
					<h4 class="page-title">Sort by Brand</h4>
					<ul class="list-group">
						<li class="list-group-item"><a href="" id="selectBrand" data-brand="All">All</a></li>
					<?php
						$result = $db->query("SELECT brand FROM allproducts GROUP BY brand ORDER BY brand");
						while($row = $result->fetch_assoc())
						{
					?>
						<li class="list-group-item"><a href="" id="selectBrand" data-brand="<?php echo $row['brand']; ?>"><?php echo $row['brand'];?></a></li>
					<?php
						}
					?>
					</ul>
				</div>
				<div class="container-fluid  aside">
					<h4 class="page-title">Sort by Price</h4>
					<ul class="list-group">
						<li class="list-group-item">
							<input type="radio" class="sortByPrice" name="sortByPrice" id="LowHigh" value="Low to high"></input>
							<label for="sortByPrice">Low to High</label>
						</li>
						<li class="list-group-item">
							<input type="radio" class="sortByPrice" name="sortByPrice" id="HighLow" value="High to low"></input>
							<label for="sortByPrice">High to Low</label>
						</li>
					</ul>
				</div>
		</div>
		<div class="col-md-9 col-xs-12">
			<div class="message"></div>
				<div class="container-fluid main" id="productList">
					<?php 
						$fetchAllData = $db->query("SELECT * FROM allproducts");
						while($allDataRow = $fetchAllData->fetch_assoc()){
					?>
					<div class="col-md-4 col-xs-12 item-container">
						<div class="productItem" id="productItem">
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
					?>
				</div>
				<div class="row promo">
					<div class="col-md-6 col-xs-12 promo-box">
						<div class="box-1"><img class="img img-responsive" src="images/banner_shopping.jpg"></img></div>
					</div>
					<div class="col-md-6 col-xs-12 promo-box">
						<div class="box-2"><img class="img img-responsive" src="images/banner-holiday-season.jpg"></img></div>
					</div>
				</div>
		</div>
	</div>
</div>

<?php 
	include("footer.php");	
?>

