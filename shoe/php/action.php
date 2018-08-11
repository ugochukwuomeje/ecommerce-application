
<?php
session_start();
include("../connection/db.php");

if(isset($_POST["category"])){
	
	$category_query = "SELECT *FROM categories";
	 $run_query = mysqli_query($con,$category_query);
	 
	 echo"<div class='nav nav-pills nav-stacked'>
				<li class='active' ><a href='#'><h4 style='height:1em; margin-top:-3px'>Category</h4></a></li>";
	 
	 if(mysqli_num_rows($run_query)>0){
		 while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
				<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		 }
		 echo"</div>";
	 }
}

if(isset($_POST["brand"])){
	
	$brand_query = "SELECT *FROM brands";
	 $run_query = mysqli_query($con,$brand_query);
	 
	 echo"<div class='nav nav-pills nav-stacked'>
				<li class='active' ><a href='#'><h4 style='height:1em; margin-top:-3px'>Brand</h4></a></li>";
	 
	 if(mysqli_num_rows($run_query)>0){
		 while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
				<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a><div class='row'><div class='col-md-4 col-md-push-2' style='font-size:0.8em'>state</div><div class='col-md-4' style='font-size:0.8em'>town</div></div></li>
			";
		 }
		 echo"</div>";
	 }
}

if(isset($_POST["page"])){
	$sql = "SELECT * FROM product";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/2);
	for($i=1; $i<=$pageno; $i++){
		echo"
			<li><a href='#' id='page' page='$i'>$i</a></li>
		";
	}
	
}

if(isset($_POST["getproduct"])){
	$limit =2;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit)- $limit;
	}else {
		$start = 0;
	}
	$product_query = "SELECT * FROM product LIMIT $start,$limit";
	
	$run_query = mysqli_query($con, $product_query);
	
	if(mysqli_num_rows($run_query)>0){
		while($row = mysqli_fetch_array($run_query)){
			$prod_id = $row["product_id"];
			$prod_cat = $row["product_cat"];
			$prod_brand = $row["product_brand"];
			$prod_title = $row["product_title"];
			$prod_price = $row["product_price"];
			$prod_image = $row["product_image"];
			
			echo"
			  <div class='col-md-4'>
						<div class='panel panel-info'>
							<div class='panel-heading'>$prod_title</div>
							<div class='panel-body'>
								<img src='$prod_image' style='width:160px; height:200px'/>
							</div>
							<div class='panel-heading'>
							$prod_price <button pid='$prod_id' style='float:right' id='product' class=' btn btn-danger btn-xs'>AddToCart</button>
							</div>
						</div>
					</div>
			";
			
		}
		
	}
}
if(isset($_POST["get_selected_category"])||isset($_POST["selectBrand"]) ||isset($_POST["search"])){
	 if(isset($_POST["get_selected_category"])){		 
		 $id = $_POST["cat_id"];
		 $sql = "SELECT *FROM product WHERE product_cat = '$id'";
	 }
	 else if(isset($_POST["selectBrand"])){		 
		 $id = $_POST["brand_id"];
		 $sql = "SELECT *FROM product WHERE product_brand = '$id'";
	 }else {
		 $keyword = $_POST["keyword"];
		 $sql = "SELECT * FROM product WHERE product_keyword LIKE '%$keyword%'";
		 
	 }
	
	$run_query = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($run_query)){
			
			$prod_id = $row["product_id"];
			$prod_cat = $row["product_cat"];
			$prod_brand = $row["product_brand"];
			$prod_title = $row["product_title"];
			$prod_price = $row["product_price"];
			$prod_image = $row["product_image"];
			
			echo"
			  <div class='col-md-4'>
						<div class='panel panel-info'>
							<div class='panel-heading'>$prod_title</div>
							<div class='panel-body'>
								<img src='$prod_image' style='width:160px; height:200px'/>
							</div>
							<div class='panel-heading'>
							$prod_price <button pid='$prod_id' style='float:right' id='product' class=' btn btn-danger btn-xs'>AddToCart</button>
							</div>
						</div>
					</div>
			";
			
	
	}
	
}
if(isset($_POST["addproduct"])){
	$p_id = $_POST["proid"];
	$user_id = $_SESSION["uid"];
	$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
	$run_query = mysqli_query($con,$sql);
 	$count = mysqli_num_rows($run_query);
	if($count > 0){
		echo"
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert'ariel-label='close'>&times;</a>
				<b>Product is already Added..!</b>
			 </div>
		"; 
	}else{
		$sql = "SELECT * FROM product WHERE product_id = '$p_id'";
		$run_query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($run_query);
			$id = $row["product_id"];
			$pro_name = $row["product_title"];
			$pro_image = $row["product_image"];
			$pro_price = $row["product_price"];
		 $sql = "INSERT INTO `myshopstore`.`cart` (`id`, `p_id`, `ip_add`, `user_id`, `product_title`,
		 `product_image`, `qty`, `price`, `total_amount`) 
		 VALUES (NULL, '$p_id', '0', '$user_id', '$pro_name', '$pro_image', '1', '$pro_price', '$pro_price')";
		if(mysqli_query($con,$sql)){
			echo"
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert'ariel-label='close'>&times;</a>
				<b>Product is Added..!</b>
			 </div>
			 ";
		}
	}
}

if(isset($_POST["get_cart_product"])|| isset($_POST["cart_checkout"])){
	$uid = $_SESSION["uid"];
	$sql = "SELECT * FROM cart WHERE user_id = '$uid'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){		
		$no = 1;
		$total_amt = 0;
		while($row = mysqli_fetch_array($run_query)){
				$id = $row["id"];
				$pro_id = $row["p_id"];
				$pro_name = $row["product_title"];
				$pro_image = $row["product_image"];
				$qty = $row["qty"];
				$pro_price = $row["price"];
				$total = $row["total_amount"];
				$price_array = array($total);
				$total_sum = array_sum($price_array);
				$total_amt = $total_amt + $total_sum;
				
				if(isset($_POST["get_cart_product"])){
				echo"
						<div class='row'>
								<div class='col-md-3'>$no</div>
								<div class='col-md-3'><img src='$pro_image' width='60px' height='50px'></div>
								<div class='col-md-3'>$pro_name</div>
								<div class='col-md-3'>$pro_price.00</div>
						</div>
			    ";
		        $no = $no + 1;
			}else{
				echo"
					<div class='row' style='margin-top:8px'>
						<div class='col-md-2'>
							<div class='btn-group'>
								<a href='#' pid='$pro_id' remove_id='$pro_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
								<a href='#' update_id='$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
							</div>
						</div>
						<div class='col-md-2'><img src='$pro_image' width='50px'height='60px'></div>
						<div class='col-md-2'>$pro_name</div>
						<div class='col-md-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' ></div>
						<div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
						<div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
					</div>
				";
			}
			
		}
		if(isset($_POST["cart_checkout"])){
			echo "<div class='row'>
						<div class='col-md-8'></div>
						<div class='col-md-4'>
							<b>Total $$total_amt</b>
						</div>
					</div>";
		}
		
		echo'
				<form action="https://www.sandboxpaypal.com/cgi-bin/webscr" method="post">
		  <input type="hidden" name="cmd" value="_cart">
		  <input type="hidden" name="business" value="ugochukwuomeje1@gmail.com">
		  <input type="hidden" name="upload" value="1">
		  <input type="hidden" name="item_name" value="hat">
		  <input type="hidden" name="item_number" value="123">
		  <input type="hidden" name="amount" value="15.00">		  
		 <input style="float:right; margin-right:100px;" type="image" name="submit"
			src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png">
		</form>

		
		';
	}
}	
//////////////////////this part is for displaying the number of products in the cart
if(isset($_POST["cart_count"])&& isset($_SESSION["uid"])){
	$uid = $_SESSION["uid"];
	$sql = "SELECT * FROM cart WHERE user_id = '$uid'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}

if(isset($_POST["removeFromCart"])){
	$pid = $_POST["removeId"];
	$uid = $_SESSION["uid"];
	$sql = "DELETE FROM cart WHERE user_id = '$uid' AND p_id = '$pid'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo"
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert'ariel-label='close'>&times;</a>
				<b>Product is Removed from Cart continue Shopping..!</b>
			 </div>
		";
	}
	}
	
	if(isset($_POST["updateProduct"])){
		$pid = $_POST["updateId"];
		$qty = $_POST["qty"];
		$price = $_POST["price"];
		$total = $_POST["total"];
		$uid = $_SESSION["uid"];
		$sql = "UPDATE cart SET qty = '$qty', price='$price', total_amount = '$total' WHERE user_id = '$uid' AND p_id = '$pid'";
		$run_query = mysqli_query($con, $sql);
		if($run_query){
			echo"
				<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert'ariel-label='close'>&times;</a>
				<b>Product is Updated continue shopping..!</b>
			 </div>
			";
		}
	}
?>