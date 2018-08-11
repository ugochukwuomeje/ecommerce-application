
<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            
			
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a  href="index.php">
							
								<span style='color:red;'>All category</span>
							</a>
						</h4>
					</div>
				
						<?php
						
							
							$sql_class = "SELECT * FROM class";
							$class_query = $con->query($sql_class);
							while($row_class = mysqli_fetch_array($class_query))
							{
									$cid = $row_class['sn'];
									$cat_name = $row_class['name'];
									
									/////////////////////////////////// this is for selecting the sub categories
									$sql_subcategory = "SELECT * FROM categories WHERE class = '$cid'";
									$subcategory_query = $con->query($sql_subcategory);
									
									if($subcategory_query->num_rows > 0)
										{
											
											echo"
											
												<div class='panel-heading'>
													<h4 class='panel-title'>
														<a data-toggle='collapse' data-parent='#accordian' href='#sportswear$cid'>
															<span class='badge pull-right'><i class='fa fa-plus'></i></span>
															$cat_name
														</a>
													</h4>
												</div>
												";
												
												echo"<div id='sportswear$cid' class='panel-collapse collapse'>
													<div class='panel-body'>
														<ul>";
											while($row_subcategory = mysqli_fetch_array($subcategory_query))
												{	
											       $subname = $row_subcategory['cat_title'];
												   $subid = $row_subcategory['cat_id'];
													echo"<li><a href='index.php?cat=$cid&subid=$subid' cid='$cid' subid='$subid'>$subname</li>";
												}
												
												echo"</ul>
											</div>
										</div>";
										}
									
								
							
							}
						?>
				
								
			</div>
			
			
			
            
            
            
        </div><!--/category-productsr-->

        <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            
            <div class='panel panel-default'>
				<div class="panel-heading">
						<h4 class="panel-title">
														
								<a href='index.php' style='color:red;'>All brand</a></li>
							
						</h4>
					</div>
				
				<?php
				if(isset($_GET['cat'])){
					$catbrand = $_GET['cat'];
					
					$sql_brands = "SELECT * FROM brands WHERE category = '$catbrand' AND status = '1'";
					$brands_query = $con->query($sql_brands);
					
					if($brands_query->num_rows > 0){
						while($row_brands = mysqli_fetch_array($brands_query))
						{
								$bid = $row_brands['brand_id'];
								$brand_name = $row_brands['brand_title'];
								
								echo"<div class='panel-heading'>
												<h4 class='panel-title'>
													<a href='index.php?brand=$bid'  cid='$bid'>$brand_name</a>
												</h4>
											</div>";
								
						}
					}
				}else{
						$sql_brands = "SELECT * FROM brands WHERE status = '1'";
					$brands_query = $con->query($sql_brands);
					
					while($row_brands = mysqli_fetch_array($brands_query))
					{
							$bid = $row_brands['brand_id'];
							$brand_name = $row_brands['brand_title'];
							
							echo"<div class='panel-heading'>
												<h4 class='panel-title'>
													<a href='index.php?brand=$bid'  cid='$bid'>$brand_name</a>
												</h4>
											</div>";
					
					}
				}
				?>
                </div> 
            
            
        </div>
        </div><!--/brands_products-->

        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                <b>$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->

        <div class="shipping text-center"><!--shipping-->
            <img src="images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->

    </div>
</div>