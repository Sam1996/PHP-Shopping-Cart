<?php 
	include("includes/db/db_config.php");
	include("header.php");
?>
<div class="container">
	<form name="adminForm" action=""  method="POST" >
		<div class="padding">
			<table>
				<tr>
					<td>
						<label for="name">Product Name</label>
					</td>
					<td>
						<input type="text" name="name"><br><br>
					</td>
				</tr>
				<tr>
					<td>
						<label for="category">Product Category</label>
					</td>
					<td>
						<input type="text" name="category"><br><br>
					</td>
				</tr>
				<tr>
					<td>
						<label for="brand">Brand</label>
					</td>
					<td>
						<input type="text" name="brand"><br><br>
					</td>
				</tr>
				<tr>
					<td>
						<label for="description">Product Description</label>
					</td>
					<td>
						<textarea name="description" cols="50" rows="8"></textarea><br><br>
					</td>
				</tr>
				<tr>
					<td>
						<label for="costPrice">Cost Price</label>
					</td>
					<td>
						<input type="text" name="costPrice"><br><br>
					</td>
				</tr>
				<tr>
					<td>
						<label for="sellingPrice">Selling price</label>
					</td>
					<td>
						<input type="text" name="sellingPrice"><br><br>
					</td>
				</tr>
				<tr>
					<td>
						<label for="stock">Stock</label>
					</td>
					<td>
						<input type="number" name="stock"><br><br>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="Add Product"> 
						<?php 
							if(isset($_POST['submit'])){

								function generateID(){
									$alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
									$alphalength = strlen($alpha);
									$alphastring = "";
									$randNumber = "";
									for ($i=0; $i < 2; $i++) { 
										$alphastring .= $alpha[mt_rand(0, $alphalength)];
									}
									for ($i=0; $i < 4; $i++) { 
										$randNumber .= rand(0,9);
									}
									$ID = $alphastring . $randNumber ;
									return $ID;
								}

								$ID 			= generateID();
								$pdtName 		= $_POST['name'];
								$category 		= $_POST['category'];
								$brand 			= $_POST['brand'];
								$description 	= $_POST['description'];
								$costPrice 		= $_POST['costPrice'];
								$sellingPrice 	= $_POST['sellingPrice'];
								$stock 			= $_POST['stock'];

								$insert = $db->query("INSERT INTO allproducts(productID,productName,productCategory,brand,productDescription,costPrice,sellingPrice,stock) 
													VALUES ('$ID','$pdtName','$category','$brand','$description','$costPrice','$sellingPrice','$stock')");
								
								if($insert){
									echo "<h4>Product added successfully</h4>";
								}
								else{
									echo "<h4>Error adding product</h4>";
								}
							}


					?>
					</td>
				</tr>
			</table>
		</div>		
		
	</form>
</div>

<?php 
	include("footer.php");
?>
