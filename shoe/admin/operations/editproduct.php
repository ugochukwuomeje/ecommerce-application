<?php
session_start();

if(!isset($_SESSION['admin']))
{

?>
<script type="text/javascript">
window.location = '../admin_login.php';
</script>

<?php
}
?>
<!DOCTYPE html>
<!-- saved from url=(0077)https://d396qusza40orc.cloudfront.net/phoenixassets/web-frameworks/index.html -->
<html>
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<?php
         include("header.html");
		require_once("../../connection/db.php");
		
	?>
	<script>
	<?php
		
        require_once("../../myscript/shopping_cart.js"); 
		
	?>
	</script>
	<style>
		td, th{
			font-family:0.7em;
		}
	</style>
</head>
    <body style="">
	 <?php
         include("../menu/top_menu.php");
	
	?>
	<nav class="navbar navbar-inverse mydashboard" role='navigation' style="border-radius:0px; border-width:0.5px; border-color:#eeeeee; z-index:1; margin-top:0em; background-color:#fff" >
  <div >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div> 
	
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	       <li> <img src='../../images/logo.jpg' style='width:200px; height:105px; padding-top:1em; padding-bottom:1em'></li>  
      				 
      </ul>
	  
			<ul class="nav navbar-nav navbar-right" style='margin-top:2em;'>	
				<li><a href="logout.php">Logout</a></li>
           </ul>

    </div>
  </div>
</nav>

		
												
													
		<div class='container-fliud'>
			<div class='row'>
				<div class='col-md-3'>
					
			<?php

				include("sidemenu.php");
			?>
			</div>
      
				<div class='col-md-9'>
				
					<form name="form1"  method="post">
					<table border="1" class='table'>
					<tr>
						<td>Category List</td>
						<td>Brand List</td>
						<td>SEARCH BY NAME</td>
						<td>view all Product</td>
						
					</tr>
					<tr>
						<td>
							<select name="pcategory2" class='form-control category2' >
								<option value='0'>----select category----</option>
									<?php
										$sql_categories = "SELECT * FROM categories where status = '1'";
										$sql_query_categories = $con->query($sql_categories);
										if($sql_query_categories->num_rows >0){
											while($row_squery_categories = mysqli_fetch_array($sql_query_categories))
											{
												
												$catid = $row_squery_categories['cat_id']; 
												$subcatname = $row_squery_categories['cat_title']; 
												echo"<option value='$catid'>$subcatname</option>";
											}
										}else{
											echo"<option value='0'>----No enabled category----</option>";
										}
									?>					
							</select>
						</td>
						<td>
							<select name="brand" class='form-control brandlist' id='brandlist' >
									<option value='0'>----brand----</option>												
							</select>
						</td>
						<td>
							<input type="text" name="productsearch" class='form-control'>
							
						</td>
						<td>  
							
						</td>
						
					</tr>
					
					<input type="hidden" name="categoryvalue" value="10">
					<tr>
						<td>
				          <button type="submit" name='viewcategory' class='btn-small btn-primary ' value="viewbycategory">view by category</button>
						 </td>
						<td>
						   <button type="submit" name='viewbrand' class='btn-small btn-primary' value="viewbybrand">view by brand</button>
						</td>
						<td>
						   <button type="submit" name='searchproduct' class='btn-small btn-primary' value="searchproduct">seacrh product</button>
						</td>
						<td>
						    <a href='editproduct.php' type='button' type='button' class='btn btn-primary btn-small'>View all Product</a>
						</td>
					</tr>
					
					
					</table>
					
					
					</form>
					<center><img src='../../images/ajax-loader.gif' id='imgcategory' width='300' height='300'></center><br>
					<div class='displayproduct'>
					<?php
					
					if(isset($_POST["viewcategory"])){
						
						$category_value = $_POST['pcategory2'];
						
						$sql_selectcategory = "SELECT * FROM product WHERE product_cat = '$category_value'";						
																		
					}elseif(isset($_POST["viewbrand"])){
						
						$brand = $_POST['brand'];
						
						$sql_selectcategory = "SELECT * FROM product WHERE product_brand = '$brand'";	
						
					
					}elseif(isset($_POST["searchproduct"])){
						
						$searchproduct = $_POST['productsearch'];
						
						$sql_selectcategory = "SELECT * FROM product WHERE product_name LIKE '%$searchproduct%' ";	
						
					}
					else{
						
						$sql_selectcategory = "SELECT * FROM product";	
						
					}
					echo"<table class='table table-striped table-condensed' width='100'>
						<tr style='background-color:#104E8B; color:white; '><th>image</th><th>name</th><th>product category</th><th>product brand</th><th>price</th><th>Operation</th></tr>
					";
						$sql_product = "{$sql_selectcategory}";
						$sql_query_product = $con->query($sql_product);
						
						if($sql_query_product->num_rows > 0)
						{
							while($row_query_confirm_order_product =  mysqli_fetch_array($sql_query_product)){
								
								
								$image = $row_query_confirm_order_product['product_image'];
								$name = $row_query_confirm_order_product['product_name'];
								$product_cat = $row_query_confirm_order_product['product_cat'];
								$product_brand = $row_query_confirm_order_product['product_brand'];
								$price = $row_query_confirm_order_product['product_price'];
								$id = $row_query_confirm_order_product['id'];
								
					$product_cat_name = mysqli_fetch_array($con->query("SELECT * FROM categories WHERE cat_id = '$product_cat'"));
					$product_cat_name = $product_cat_name['cat_title'];

					$product_brand_name = mysqli_fetch_array($con->query("SELECT * FROM brands WHERE brand_id = '$product_brand' AND category = '$product_cat'"));
					$product_brand_name = $product_brand_name['brand_title'];
								
							echo"<tr><td><img src='$image' style='width:40%; height:40%' class='img-responsive'></td><td>$name</td><td>$product_cat_name</td><td>$product_brand_name</td><td>$price</td><td><a class='btn btn-success btn-small'  href='editproductfile.php?pd=$id'><span class='glyphicon glyphicon-remove'></span>edit product</a></td></tr>";						
						}
							
							
							
						}
						else{
							
							echo"<tr><td  colspan='7'><center>NO PRODUCT IN THE TABLE $sql_selectcategory</center></td></tr>";
						}
					echo"</table>";
					
					?>
					<center><img src='../../images/ajax-loader.gif' id='editproduct_loader' width='300' height='300'></center><br>
				</div>
				</div>	
			</div><br><br><br>
	</div>	
</body>	
<?php
	include "footer.php";    
?>         
</html>
               

