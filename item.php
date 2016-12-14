<?php
	include("includes/db/db_config.php");
	include("header.php");
	
	if(isset($_GET['action']) && $_GET['action']=="view"){

		$id=$_GET['id']; 

		$fetchThisData = $db->query(" SELECT * FROM allproducts WHERE productID = '$id' ") or die(mysql_error());
		
		while($thisRow = $fetchThisData->fetch_assoc()){

			$productID = $thisRow['productID']; 			
			$productName = $thisRow['productName'];		
			$productCategory = $thisRow['productCategory'];	
			$brand	= $thisRow['brand'];
			$productDesc = $thisRow['productDescription'];	
			$costPrice = $thisRow['costPrice'];			
			$sellingPrice = $thisRow['sellingPrice'];		
			$stock = $thisRow['stock'];

		}


	}
	else if(isset($_GET['action']) && $_GET['action']=="add"){

		$id=$_GET['id']; 

		$fetchThisData = $db->query(" SELECT * FROM allproducts WHERE productID = '$id' ") or die(mysql_error());
		
		while($thisRow = $fetchThisData->fetch_assoc()){

			$productID = $thisRow['productID']; 			
			$productName = $thisRow['productName'];		
			$productCategory = $thisRow['productCategory'];	
			$brand	= $thisRow['brand'];
			$productDesc = $thisRow['productDescription'];	
			$costPrice = $thisRow['costPrice'];			
			$sellingPrice = $thisRow['sellingPrice'];		
			$stock = $thisRow['stock'];

		}

		$insertData = $db->query("	INSERT INTO cart(productID,productName,productCategory,productDescription,brand,costPrice,sellingPrice)
								 	SELECT productID,productName,productCategory,productDescription,brand,costPrice,sellingPrice FROM allproducts
								 	WHERE productID = '$id' ") or die(mysql_error());
		if($insertData){
			header("Location:http://localhost/shoppingCart/item.php?page=item&action=view&id=$productID");
		}
		else{
			//echo "error";
		}

	}			
?>
<div class="row main">
	<div class="col-md-5 col-xs-12">
		<div id="item-image-large" class="container-fluid item-image-large">
			<img  id="largeImage" class="img img-responsive" src="images/<?php echo $productName;?>.png"></img>
			<div id="glass"></div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-12">
				<div class="container-fluid item-image-small">
					<img class="img img-responsive" src="images/<?php echo $productName;?>.png"></img>
				</div>
			</div>
			<div class="col-md-4 col-xs-12">
				<div class="container-fluid item-image-small">
					<img class="img img-responsive" src="images/<?php echo $productName;?>.png"></img>
				</div>
			</div>
			<div class="col-md-4 col-xs-12">
				<div class="container-fluid item-image-small">
					<img class="img img-responsive" src="images/<?php echo $productName;?>.png"></img>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-7 col-xs-12 item-description-container">
		<h1 class="page-title item-title-large"><?php echo $productName; ?></h1>
		<p class="desc"><?php echo $productDesc; ?></p>
		<div class="price padding">
			<h4 class="thisPrice old-price pull-left">Old price : &#8377; <?php echo $costPrice;?>/-</h4>
			<h2 class="thisPrice new-price pull-left"><span class="small">New price :</span> &#8377; <?php echo $sellingPrice;?>/-</h2>
		</div>
		<table class="table">
			<tr>
				<td  class="text-warning">Brand</td>
				<td>: <?php echo $brand;?></td>
				<td  class="text-warning">Type</td>
				<td>: <?php echo $productCategory;?></td>
			</tr>
			<tr>
				<td  class="text-warning">Category</td>
				<td>: <?php echo "Male";?></td>
				<td  class="text-warning">Size</td>
				<td>: <?php echo "10";?></td>
			</tr>
			<tr>
				<td  class="text-warning">Color</td>
				<td>: <?php echo "Leather Brown";?></td>
				<td  class="text-warning">Stock</td>
				<td>: <?php echo "Available";?></td>
			</tr>
			<tr>
				<td  class="text-warning">Seller</td>
				<td>: <?php echo "Virgin Marry distributors";?></td>
			</tr>
		</table>
		<div class="qty form-inline">
			<label for="qty">Select quantity</label>
			<input type="number" name="qty" value="1" class="form-control qty-input" min="1" max="<?php echo '15';?>">
			&nbsp;
			<label for="qty">Select Color</label>
			<select class="form-control" name="color">
				<option value="Black">Black</option>
				<option value="White" selected>White</option>
				<option value="Brown">Brown</option>
			</select>
		</div>
		<br>
		<div class="cart-message"></div>
		<div class="action-btn-group">
			<button class="col-md-4 col-xs-12 btn btn-lg btn-default buy-now-btn">Buy now</button>
			<button class="col-md-4 col-xs-12 btn btn-lg btn-warning buy-now-btn" id="addCartButton" pid="<?php echo $productID ;?>" pname="<?php echo $productName;?>">Add to Cart</button>
			<!--<a class="col-md-4 col-xs-12 btn btn-lg btn-warning add-cart-btn" href="item.php?page=item&action=add&id=<?php echo $productID; ?>">Add to cart</a>-->
			<button class="col-md-4 col-xs-12 btn btn-lg btn-success wish-list-btn">Add to wishlist</button>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	var img = $('#largeImage');
	var magnifier = $('#glass');
	var imgSrc = $('#largeImage').attr('src');
	console.log(imgSrc);
	document.getElementById('glass').style.backgroundImage = "url(' " + imgSrc + "')";

	$('#item-image-large').on({
		mouseenter: function(){
			magnifier.css({'opacity':1});
		},
		mousemove: function(e){

			$( "#glass" ).position({
			    my: "center center",
			    at:"center",
			    of: event,	
			   collision: "fit"
			  });

		},
		mouseleave:function(){
			magnifier.css({'opacity':0});
		}
	})
});

</script>
<?php
	include("footer.php");
?>