	<div class="row footer-container">
		<div class="container-fluid footer">
			this is footer
		</div>
		<div class="container-fluid bottom">
			<p class="text-center white">&copy; ShoeShore</p>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	
	cart_count();

	$("body").delegate("#addCartBtn","click",function(event){
		var button = $(this).find("button[type='button']");
		button.html = "Adding...";
		event.preventDefault();
		var pid = $(this).attr('pid');
		var pname = $(this).attr('pname');
		$.ajax({
			url:"addToCart.php",
			method:"POST",
			data:{addProduct:1,ID:pid,name:pname},
			success : function(data){
				$('.message').html(data);
				cart_count();
			}
		})
	}) 

	$("body").delegate("#addCartButton","click",function(event){
		$("#addCartButton").html("Adding...");
		event.preventDefault();
		var pid = $(this).attr('pid');
		var pname = $(this).attr('pname');

		$.ajax({
			url:"addToCart.php",
			method:"POST",
			data:{addProduct:1,ID:pid,name:pname},
			success : function(data){
				$('.cart-message').html(data);
				$("#addCartButton").html("Add to Cart");
				cart_count();
			}
		})
	}) 
	update_cart();
	$("body").delegate("#removeBtn","click",function(event){
		event.preventDefault();
		var pid = $(this).attr('pid');

		$.ajax({
			url:"removeProduct.php",
			method:"POST",
			data:{removeProduct:1,ID:pid},
			success : function(data){
				cart_count();
				update_cart();
				$('.alert-message').html(data).fadeIn(3000);
			}
		})
	}) 

	function cart_count(){
		$.ajax({
			url : "cartCount.php",
			method : "POST",
			data :{cart_count:1},
			success : function(data){
				$('.cart-count').html(data).fadeIn('slow');
			}
		})
	}

	function update_cart(){
		$('.cart-table').html("<div class='loader' style='height:200px;display:flex;align-items:center;justify-content:center'><h4>Updating cart. Please wait...</h4></div>");
		$.ajax({
			url : "getCartItem.php",
			method : "POST",
			data : {getCartItem:1},
			success : function(data){
				$('.cart-table').html(data).fadeIn(3000);
			}
		})
	}

	function manageQty(thisQty){
		var currentQty = thisQty.value;
		var pid = $(thisQty).attr('pid');
		var oldQty = $(thisQty).attr('oldQty');

		if(currentQty >= oldQty){
			$.ajax({
				url : "increaseQty.php",
				method : "POST",
				data : {increaseQty : 1,ID : pid, old: oldQty, newQty: currentQty},
				success : function(data){
					alert('Product updated');
				}
			})
		}

		else if(currentQty <= oldQty){
			$.ajax({
				url : "decreaseQty.php",
				method : "POST",
				data : {increaseQty : 1,ID : pid, old: oldQty, newQty: currentQty},
				success : function(data){
					alert('Product updated');
				}
			})
		}
	}

</script>
</html>