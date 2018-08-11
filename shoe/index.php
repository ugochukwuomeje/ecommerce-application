<?php
session_start();
include("header.php");
include('connection/db.php');

?>

<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />


<!--/header-->
	
	<section><!--slider-->
	
	<?php
	
		$d = 0;
		$rowcounter = 0;
		$closerow = 0;
	?>	
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!------------------------slide show--------------------------->
						<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						
						<?php
							$sql_scrollable = "SELECT * FROM scrollable";
							$query_scrollable = $con->query($sql_scrollable);
							$image_number = $query_scrollable->num_rows;
							
							if($image_number > 0){
								
								$a = 0;
								for($c = 1; $c <=$image_number; $c++ ){
															
									
									$a++;
									
									if($a == 1){
										echo"<li data-target='#slider-carousel' data-slide-to='0' class='active'></li>";
									}
									else{
										$b = $a - 1;
										echo"<li data-target='#slider-carousel' data-slide-to='$b'></li>";
									}
								}
							}
							?>
						</ol>
											
						<div class="carousel-inner">
						
						<?php
							$d = 0;
							$rowcounter = 0;
							$closerow = 0;
							
							while($row_scrollable = mysqli_fetch_array($query_scrollable)){
							 $d++;
									$description = $row_scrollable['description'];
									$imagedisplay = $row_scrollable['imagename'];
								if($d == 1){
									
							?>
							
							
								<div class="item active">
									<div class="col-sm-6">
										<h1 style="color:#594E00; font-family:Lucida Calligraphy;"><i>rexglobalfashion</i></h1>
										<h2>For all Fashion</h2>
										<p><?php echo"$description"; ?></p>
										<button type="button" class="btn btn-default get">Get it now</button>
									</div>
									<div class="col-sm-6">
										<img src="admin/operations/<?php echo$row_scrollable['imagename']; ?>" class="girl img-responsive"  alt="" />
										
									</div>
								</div>
							<?php
								}
							else{
							?>
							
							<div class="item">
								<div class="col-sm-6">
								<h1><span style="color:#594E00; font-family:Lucida Calligraphy;">rexglobalfashion</h1>
										<h2>For all Fashion</h2>
									<p><?php echo"$description"; ?></p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
								<img src="admin/operations/<?php echo$row_scrollable['imagename']; ?>" class="girl img-responsive"  alt="" />
									
								</div>
							</div>
							
							<?php
							}
							}
							?>
							
						</div>
	
							
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>			<!------------------------end of slide show-------------------->
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container" >
			<div class="row">
				<?php
					include('left_menu.php');
				?>
				
				<div class="col-sm-9 padding-right" id=''>
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						
						<img src='images/ajax-loader.gif' id='index_loader' width='500' height='500'><br>
						
						<!-------this is for the product------->
						<?php
						
						  
 include("pagination/function.php");
 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 40; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "product"; //you have to pass your query over here
if(isset($_GET['cat'])){
	$catid = $_GET['cat'];
	$res=$con->query("select * from product WHERE  product_cat = '$catid' ORDER BY RAND() LIMIT {$startpoint} , {$limit}");
					  
						  while($row = mysqli_fetch_array($res)){
							  
							  if($rowcounter == 0 ){
								  $closerow = 1;
								  echo"<div class='row'>";
								  
							  }
							  $rowcounter++;
							  ?>
							  
							  <div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="admin/operations/<?php echo$row['product_image']; ?>" alt="" width='268' height='249'/>
										<h2>N<?php echo$row['product_price']; ?></h2>
										<p><?php echo$row['product_name']; ?></p>
										<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>N<?php echo$row['product_price']; ?></h2>
											<p><?php echo$row['product_desc']; ?></p>
											<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View description</a>
											<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="index.php?whishlistid=<?php echo$row['id']; ?> class='whishlist'"><i class="fa fa-plus-square "></i>Add to wishlist</a></li>
										<li ><a href="index.php?compareid=<?php echo$row['id']; ?> class='addtocompare'"><i class="fa fa-plus-square "></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						
							  <?php
							  
							  if($rowcounter == 4){
								  echo"</div>";
								  $rowcounter = 0;
								  $closerow = 0;
							  }
						  }
	                       if($closerow == 1){
							  echo"</div>";
						  }
}
elseif(isset($_GET['brand'])){
	$brandid = $_GET['brand'];
	$res=$con->query("select * from product WHERE  product_brand = '$brandid' ORDER BY RAND() LIMIT {$startpoint} , {$limit}");
					  
						  while($row = mysqli_fetch_array($res)){
							  
							  if($rowcounter == 0 ){
								  $closerow = 1;
								  echo"<div class='row'>";
								  
							  }
							  $rowcounter++;
							  ?>
							  
							  <div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="admin/operations/<?php echo$row['product_image']; ?>" alt="" width='268' height='249'/>
										<h2>N<?php echo$row['product_price']; ?></h2>
										<p><?php echo$row['product_name']; ?></p>
										<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>N<?php echo$row['product_price']; ?></h2>
											<p><?php echo$row['product_desc']; ?></p>
											<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View description</a>
											<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="index.php?whishlistid=<?php echo$row['id']; ?>"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="index.php?compareid=<?php echo$row['id']; ?>"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						
							  <?php
							  
							  if($rowcounter == 4){
								  echo"</div>";
								  $rowcounter = 0;
								  $closerow = 0;
							  }
						  }
						  if($closerow == 1){
							  echo"</div>";
						  }
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////put this
elseif(isset($_POST['searchproduct'])){
	
	$searchword = $_POST['search'];
	$res=$con->query("select * from product where product_keyword LIKE '%$searchword%' ORDER BY RAND() LIMIT {$startpoint} , {$limit}");
					  
						  while($row = mysqli_fetch_array($res)){
							  
							  if($rowcounter == 0 ){
								  $closerow = 1;
								  echo"<div class='row'>";
								  
							  }
							  $rowcounter++;
							  ?>
							  
							  <div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="admin/operations/<?php echo$row['product_image']; ?>" alt="" width='268' height='249'/>
										<h2>N<?php echo$row['product_price']; ?></h2>
										<p><?php echo$row['product_name']; ?></p>
										<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>N<?php echo$row['product_price']; ?></h2>
											<p><?php echo$row['product_desc']; ?></p>
											<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View description</a>
											<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li ><a href="index.php?whishlistid=<?php echo$row['id']; ?>"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="index.php?compareid=<?php echo$row['id']; ?>"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						
							  <?php
							  
							  if($rowcounter == 4){
								  echo"</div>";
								  $rowcounter = 0;
								  $closerow = 0;
							  }
						  }
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////end of the 

else{
$res=$con->query("select * from {$statement} ORDER BY RAND() LIMIT {$startpoint} , {$limit}");
					  
						  while($row = mysqli_fetch_array($res)){
							  if($rowcounter == 0 ){
								  $closerow = 1;
								  echo"<div class='row'>";
								  
							  }
							  $rowcounter++;
							  ?>
							  
							  <div class="col-sm-3" >
							<div class="product-image-wrapper" style="background:#F5F5F5">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="admin/operations/<?php echo$row['product_image']; ?>" alt="" width='268' height='249'/>
										<h2>N<?php echo$row['product_price']; ?></h2>
										<p><?php echo$row['product_name']; ?></p>
										<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>N<?php echo$row['product_price']; ?></h2>
											<p><?php echo$row['product_desc']; ?></p>
											<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View description</a>
											<a href="product_details.php?id=<?php echo$row['id'].'&cat='.$row['product_cat']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li class='wishbutton'><a href="index.php?whishlistid=<?php echo$row['id']; ?>"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li class='comparebutton'><a href="index.php?compareid=<?php echo$row['id']; ?>"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						
							  <?php
							  if($rowcounter == 4){
								  echo"</div>";
								  $rowcounter = 0;
								  $closerow = 0;
							  }
						  }
						  if($closerow == 1){
							  echo"</div>";
						  }
						  }
						
						?>
						<!--this is for the product-------->
						</div>
					
	<div class="category-tab">
								<div class="panel-heading">
									<div class="panel-title">										
											<center><h2>New Arivals</h2></center> 								
									</div>
								</div>
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
							
							<?php
								$sql_new_arrival = "SELECT * FROM categories WHERE status = '1'";
								$query_category = $con->query($sql_new_arrival);
								
								$new_arrival_counter = 0;
								
								if($query_category->num_rows > 0){
									
									while($row_new_arrival = mysqli_fetch_array($query_category)){
										
										$category_id = $row_new_arrival['cat_id'];
										$category_title = $row_new_arrival['cat_title'];										
										
										if($new_arrival_counter == 0)
										{
											echo"<li class='active'><a href='#$category_id' data-toggle='tab'>$category_title</a></li>";
											$new_arrival_counter++;
										}
										else{
											echo"<li><a href='#$category_id' data-toggle='tab'>$category_title</a></li>";
										}
										
									}
								}
							
							?>
							
								
							</ul>
						</div>
						<div class="tab-content">
															
                            <?php
							
								$sql_getproduct_new_arrival = "SELECT * FROM categories WHERE status = '1'";
								$query_getproduct_new_arrival = $con->query($sql_getproduct_new_arrival);
								
								if($query_getproduct_new_arrival->num_rows > 0){
									
									$arrival_category_counter = 0;
									while($row_category_new_arrival = mysqli_fetch_array($query_getproduct_new_arrival))
									{
										
										
										$arrival_category_id = $row_category_new_arrival['cat_id'];
										
										if($arrival_category_counter == 0){
											
											$arrival_category_counter++;
											
											echo"<div class='tab-pane fade active in' id='$arrival_category_id' >";
											
										}else{
											
											echo"<div class='tab-pane fade in' id='$arrival_category_id' >";
																					
										}																				
									     
										    $query_arrival_getproduct = $con->query("SELECT * FROM product WHERE product_cat = '$arrival_category_id' AND newarrival = '1'  ORDER BY RAND() LIMIT 4 ");
										
										if($query_arrival_getproduct->num_rows > 0)
										{
											while($row_getproduct_new_arrival = mysqli_fetch_array($query_arrival_getproduct)){
												
												$arrival_product_name = $row_getproduct_new_arrival['product_name'];
												$rrival_product_price = $row_getproduct_new_arrival['product_price'];
												$arrival_productid = $row_getproduct_new_arrival['id'];
												$arrival_product_image = $row_getproduct_new_arrival['product_image'];
												$arrival_product_category = $row_getproduct_new_arrival['product_cat'];
												
												echo"<div class='col-sm-3'>
													<div class='product-image-wrapper'>
														<div class='single-products'>
															<div class='productinfo text-center'>
																<img src='admin/operations/$arrival_product_image' alt='' />
																<h2>N $rrival_product_price</h2>
																<p>$arrival_product_name</p>
																<a href='product_details.php?id=$arrival_productid&cat=$arrival_product_category' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
															</div>
															
														</div>
													</div>
												</div>";
											
											}
										}
										
										echo"</div>";
									}
									
								}

							?>
							
						</div>
					</div> 
					
					<br><br><br><div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								
								
								<?php
									$sql_recomended_item = "SELECT * FROM product WHERE recommended_product = '1'";
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
											$recomended_product_category = $row_recomended_item['product_cat'];
											
											$id = $row_recomended_item['id'];
											
												echo"<div class='col-sm-4'>
													<div class='product-image-wrapper'>
														<div class='single-products'>
															<div class='productinfo text-center'>
																<img src='admin/operations/$product_image' alt='' width='268' height='134'>
																<h2>N $product_price</h2>
																<p>$product_name</p>
																<a href='product_details.php?id=$id&cat=$recomended_product_category' type='button' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
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
					</div><!--/recommended_items-->
						<center>
							<ul class="pagination">
								<?php
									echo pagination($statement,$limit,$page);
								?>
							</ul>
						</center>
					<!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	
<?php
  if(isset($_GET['whishlistid']))
  {
	  
	  if($loggedin == '1'){
		$whishlistid = $_GET['whishlistid'];
		  $email = $_SESSION['email'];
		
		//////////////////check wether it has been added
		
		$sql_check_wishlist = "SELECT * FROM wishlist WHERE id = '$whishlistid' AND email = '$email'";
		$sql_check_wishlist_query = $con->query($sql_check_wishlist);
		
				if($sql_check_wishlist_query->num_rows > 0 ){
						
						?>
							<script>
								alert("PRODUCT ALREADY ADDED TO YOUR WISHLIST");
							</script>
						
						<?php
				}
		else{		
		
		$sql_whislist = "INSERT INTO wishlist(id, email)VALUES('$whishlistid', '$email')";
		$sql_query = $con->query($sql_whislist);
		
		if($sql_query){
			?>			
			<script>
				alert("PRODUCT ADDED TO WHISHLIST");
			</script>
			
			<?php
			}
		
		}
	  }
	  elseif($loggedin == '0'){
		  ?>
		  <script>
			alert("login before you can to add to whishlist");
		  </script>
		  
		  <?php
	  }
  
  
	
  }

?>
<!--------------this section is for add to compare---------------->

<?php
  if(isset($_GET['compareid']))
  {
	  
	  if($loggedin == '1'){
		  
		  $compareid = $_GET['compareid'];
		  $email = $_SESSION['email'];
		  
		  $sql_check_comparelist = "SELECT * FROM addtocompare WHERE id = '$compareid' AND email = '$email'";
		  $sql_check_comparelist_query = $con->query($sql_check_comparelist);
		
				if($sql_check_comparelist_query->num_rows > 0 ){
						
						?>
							<script>
								alert("PRODUCT ALREADY TO YOUR COMPARE list");
							</script>
						
						<?php
				}
		else{		
		
			$sql_compareid = "INSERT INTO addtocompare(id, email)VALUES('$compareid', '$email')";
			$sql_query = $con->query($sql_compareid);
			
			if($sql_query){
				?>			
				<script>
					alert("PRODUCT ADDED TO COMPARE LIST");
				</script>				
				<?php
			}
		}
  }
	  elseif($loggedin == '0'){
		  ?>
		  <script>
			alert("login before you can to add to compare list");
		  </script>		  
		  <?php
	  }
  
  
  
  }

?>
<!-------------------------this the end of add to compare-------------------------->

<?php
include('footer.php');
	
?>
  
    
</body>
</html>