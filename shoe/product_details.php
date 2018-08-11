<?php
session_start();
$id=$_GET["id"];

$productdescription = "not product details";

$productid = $id;
$similar_cat = $_GET["cat"];

include('connection/db.php');

if(isset($_POST['submit1'])){
	$d = 0;	
	$qty = $_POST['qty'];
	
	if(!empty($_COOKIE['item'])){
		 if(is_array($_COOKIE['item'])) // this is for checking if cookies is available or not
			{	
			
			foreach($_COOKIE['item'] as $name => $value)
				{
					$d = $d + 1;
				}
				$d = $d + 1;
			}

}
	else
	{
		$d = $d + 1;
	}
		$res3 = $con->query("SELECT * FROM product WHERE id =  '$id'");
		while($row3 = mysqli_fetch_array($res3))
		{
			$img1 = $row3["product_image"];
			$nm = $row3["product_name"];
			$prize = $row3["product_price"];
			$total = $prize * $qty;
		}
		
		if(!empty($_COOKIE['item'])){
				if(is_array($_COOKIE['item'])) // this is for checking if cookies is available or not
	 {
			foreach($_COOKIE['item'] as $name => $values)
			{
				$values11 = explode("__",$values);
				$found = 0;
				if($img1 == $values11[0])
				{
					$found = $found + 1;
					$qty = $values11[3] + 1;
					
					$tb_qty;
					$res = $con->query("SELECT * FROM product WHERE product_image = '$img1'");
					while($row = mysqli_fetch_array($res)){
						
						$tb_qty = $row["product_qty"];
					}
					if($tb_qty < $qty)
					{
						?>
						<script type='text/javascript'>
								alert("this much qauntity is not available");
						</script>
						
						<?php
					}else{
					
					$total = $values11[2] * $qty;
					setcookie("item[$name]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$id,time()+1800);
				}
				}
			}
			if($found == 0)
			{
				$tb_qty;
					$res = $con->query("SELECT * FROM product WHERE product_image = '$img1'");
					while($row = mysqli_fetch_array($res)){
						
						$tb_qty = $row["product_qty"];
					}
					if($tb_qty < $qty)
					{
						?>
						<script type='text/javascript'>
								alert("this much qauntity is not available");
						</script>
						
						<?php
					}else{
				
				setcookie("item[$d]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$d,time()+1800);
			}
			}
		}
	
}
		else{
			$tb_qty;
					$res = $con->query("SELECT * FROM product WHERE product_image = '$img1'");
					while($row = mysqli_fetch_array($res)){
						
						$tb_qty = $row["product_qty"];
					}
					if($tb_qty < $qty)
					{
						?>
						<script type='text/javascript'>
								alert("this much qauntity is not available");
						</script>
						
						<?php
					}else{
				setcookie("item[$d]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$d,time()+1800);
		}
		}
			
	}
//include("header.php");
?>
<?php
	include('header.php');
	
	
	
	if(isset($_POST['setreview']))
	{
		if($loggedin == '1')
		{
			
		}
	}
	?>
	<section>
		<div class="container">
			<div class="row">
				<?php
					include('left_menu.php');
				?>
				
					<?php
					$res=$con->query("select * from product where id='$id'");
					while($row=mysqli_fetch_array($res))
					{
						
						$productdescription = $row['product_desc'];
					?>
					
				<!-- here -->
				
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="admin/operations/<?php echo $row["product_image"]; ?>" alt="" />
								
							</div>
							

						</div>
						
						
			<form action='' name='form1' method='POST'>			
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $row["product_name"]; ?></h2>
								<p>Web ID: <?php echo $row["id"]; ?></p>
								
								<span>
									<span>N<?php echo $row["product_price"]; ?></span>
									<label>Quantity:</label>
									<input type="text" value="1" name='qty' />
									<input type='hidden' name='id' value='$id'>
									<button type="submit" name='submit1' class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b><?php echo $row["product_qty"]; ?></p>
								<p><b>Condition:</b> New</p>
								
								
							</div><!--/product-information-->
						</div>
			</form>			
					</div><!--/product-details-->
					
					<!-- end here-->
					
					<?php
					
					}
					?>
					
					<br><br><br><div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Similar Product</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								
								
								<?php
									$sql_recomended_item = "SELECT * FROM product WHERE product_cat = '$similar_cat'";
									$query_recomended_item = $con->query($sql_recomended_item);
									
									if($query_recomended_item->num_rows > 0)
									{
										$productcounter = 0;
										$bottomproductcounter = 0;
										
										while($row_recomended_item = mysqli_fetch_array($query_recomended_item)){
											
											if($productcounter % 3 == 0){
												
												if($productcounter == 0){
												  echo'<div class="item active">';
												}else{
													echo'<div class="item">';
												}
											}
											
											
											$product_image = $row_recomended_item['product_image'];
											$product_price = $row_recomended_item['product_price'];
											$product_name = $row_recomended_item['product_name'];
											$id = $row_recomended_item['id'];
											
												echo"<div class='col-sm-4'>
													<div class='product-image-wrapper'>
														<div class='single-products'>
															<div class='productinfo text-center'>
																<img src='admin/operations/$product_image' alt='' width='268' height='134'>
																<h2>N $product_price</h2>
																<p>$product_name</p>
																<a href='product_details.php?id=$id' type='button' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
															</div>
														</div>
													</div>
												</div>";
											
										$productcounter++;
										$bottomproductcounter++;
										
										if($bottomproductcounter % 3 == 0){
												
												echo'</div>';
											}
											
										}
										if($bottomproductcounter % 3 > 0){
												
												echo'</div>';
											}
										
										
										
									}
								
								
								?>
								
								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><br><br><br>
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>								
							
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								
								<div class="col-sm-3">
									<?php 
										echo"<center>$productdescription</center>";
									?>
								</div>
							</div>
							
							
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
									
									<?php
									$reviewtxt = "";
									
										$sql_getreview = "SELECT * FROM review WHERE Productid = '$productid' ";
										
										$queryreview = $con->query($sql_getreview);
										if($queryreview->num_rows > 0){
										
									     while($row_getreview = mysqli_fetch_array($queryreview)){
											 
											 $namereview = $row_getreview['name'];
											 $datereview = $row_getreview['date'];
											 $reviewtxt = $row_getreview['review'];
											 
											 $datereview = date('Y-m-d H:i:s', $datereview);
											 
											 echo"<li><a href=''><i class='fa fa-user'></i>$namereview</a></li>
										<li><i class='fa fa-clock-o'></i>$datereview</li>
										";
											 
										 }
										
										}
									?>
									
									
										
									</ul>
									<p><?php echo"$reviewtxt"; ?></p>
									<p><b>Write Your Review</b></p>
									
									<form action="" method='POST'>
										<span>
											<input type="text"  name='yourname' placeholder="Your Name" required />
											<input type="email" name='email' placeholder="Email Address" required />
										</span>
										<input type='hidden' name='setreview' value='1' required />
										<input type='hidden' name='productid' value='<?php echo"$id" ?>' required>
										
									
										
										<textarea name="reviewtext" required></textarea>
											<b>Rating: &nbsp; &nbsp; &nbsp;<img src="images/product-details/rating1.png" alt="" /><input type='radio' name='rating' value='1'></b> &nbsp;&nbsp;&nbsp;
											<img src="images/product-details/rating2.png" alt="" />&nbsp; <input type='radio' name='rating' value='2'> &nbsp;&nbsp; &nbsp; 
											<img src="images/product-details/rating3.png" alt="" />&nbsp; <input type='radio' name='rating' value='3'>  &nbsp;&nbsp;&nbsp;
											<img src="images/product-details/rating4.png" alt="" /> &nbsp;<input type='radio' name='rating' value='4'>  &nbsp; &nbsp; &nbsp;
											<img src="images/product-details/rating45.png" alt="" /> &nbsp;<input type='radio' name='rating' value='45'>&nbsp;&nbsp;   &nbsp; <br><br>
											<button type="submit" name='btnreview' class="btn btn-default pull-right">
												Submit
											</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
				
					
				</div>
			</div>
		</div>
	</section>
	
	<?php
	
	if(isset($_POST['setreview']))
	{
		
		if($loggedin == 0){
			
			?>
			
			<script>
				alert('you have to login before youcan submit review');
			</script>
			<?php
		}else{
			
			$name = $_POST['yourname'];
			$email = $_POST['email'];
			$yourreview = $_POST['reviewtext'];
			$productid = $_POST['id'];
			$rating = $_POST['rating'];
			
			
			$date = time();
			
			$sql_review = "INSERT INTO review (date, email, review, productid, brandid, name, rating)VALUE('$date', '$email' , '$yourreview', '$productid', '$name', '$rating')";
			
			$query_review = $con->query($sql_review);
			
			if($query_review){
					
				?>
			
			<script>
				alert('review submited');
				
			</script>
			<?php	
					
			}elseif(!$query_review){
				
				echo"the error is: $con->error";
				echo"$sql_review";
			}
		}
		
	}
		include('footer.php');
			
	?>

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>