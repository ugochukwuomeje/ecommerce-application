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

<?php

$id = $_GET['pd'];

if(!isset($id)){
	
		
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
	<nav class="navbar navbar-inverse mydashboard" role='navigation' style="border-radius:0px; z-index:1; margin-top:0em; background-color:#B0171F" >
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
      		<li><a href="home.php">Home</a></li>
			
		
			
			
		
		
		 
      </ul>
			<ul class="nav navbar-nav navbar-right">	
				<li><a href="logout.php">Logout</a></li>
           </ul>

    </div>
  </div>
</nav>

		
												
													
		<div class='container'>
		<div class='row'>
			<div class='col-md-3'>
					
		<?php

	include("sidemenu.php");
			?>
			</div>

    
 
      
        <div class='col-md-9'>
            <div class="box round first">
                <center><h2>
                   Edit Product</h2></center>
                <hr>
                    <?php
						include("productsettingsmenu.php");
						
						$sql_editproduct = "SELECT * FROM product WHERE id = '$id'";
						$query_product = $con->query($sql_editproduct);
						
						if($query_product->num_rows > 0){
							
							$row_product = mysqli_fetch_array($query_product);
							
							$productname = $row_product['product_name'];
							$product_category = $row_product['product_cat'];
							$product_brand = $row_product['product_brand'];
							$product_type = $row_product['product_type'];
							$product_keyword = $row_product['product_keyword'];
							$product_price = $row_product['product_price'];
							$product_qty = $row_product['product_qty'];
							$product_image = $row_product['product_image'];
							$product_desc = $row_product['product_desc'];
							$product_recommended = $row_product['recommended_product'];
							$product_newarrival = $row_product['newarrival'];
							
							$row_category_name = mysqli_fetch_array($con->query("SELECT * FROM categories WHERE cat_id = '$product_category'"));
							
							$categoryname = $row_category_name['cat_title'];
							
							$row_brand_name = mysqli_fetch_array($con->query("SELECT * FROM brands WHERE brand_id = '$product_brand'"));
							$brandname = $row_brand_name['brand_title'];
							
							if($product_recommended == '1'){
								
								$product_recommended = "YES";
							}else{
								
								$product_recommended = "NO";
							}
							if($product_newarrival == '1'){
								
								$product_newarrival = "YES";
							}else{
								
								$product_newarrival = "NO";
							}
							if($product_type == '1'){
								
								$product_type = "NEW";
							}elseif($product_type == '2'){
								
								$product_type = "OLD";
							}
							?>
							
							
							<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1" class='table'>
					<tr>
					<td>Product Name</td>
					<td><input type="text" class='form-control' value='<?php echo"$productname" ?>' name="pnm"></td>
					</tr>
					<tr>
					<td>Product Price</td>
					<td><input type="number" class='form-control' value='<?php echo"$product_price" ?>' name="pprice"></td>
					</tr>
					<tr>
					<td>Product Quantity</td>
					<td><input type="text" class='form-control' value='<?php echo"$product_qty" ?>' name="pqty"></td>
					</tr>
					
					<tr>
					<td>Product Category</td>
					<td>
					<input type="text" class='form-control' value='<?php echo"$categoryname" ?>' readonly><br>
					
						<select name="pcategory" class='form-control category' >
							echo"<option >----choose category-----</option>";
								<?php
									$sql_subcategories = "SELECT * FROM categories";
									$sql_query_categories = $con->query($sql_subcategories);
									while($row_squery_categories = mysqli_fetch_array($sql_query_categories))
									{
										
										$catid = $row_squery_categories['cat_id']; 
										$catname = $row_squery_categories['cat_title']; 
										echo"<option value='$catid'>$catname</option>";
									}
								
								?>					
						</select>
						<center><img src='../../images/ajax-loader.gif' id='imgcategory'>
												</center>                
					</td>
					</tr>
					
					<tr>
					<td>Product Brand</td>
					<td>
					<input type="text" class='form-control' value='<?php echo"$brandname" ?>' readonly><br>
					<select name="brand" class='form-control brandlist' id='brandlist'>
						
					</select>
					</td>
					</tr>
					<tr>
					<td>Recommended Item</td>
					<td>
					<input type="text" class='form-control' value='<?php echo"$product_recommended " ?>' readonly><br>
					
						<select name="ritem" class='form-control' >
							<option value='1'>Yes</option>
							<option value='2'>No</option>							
						</select>
					</td>
					</tr>
					<tr>
					<td>Product Type</td>
					<td>
					<input type="text" class='form-control' value='<?php echo"$product_type " ?>' readonly><br>
						<select name="ptype" class='form-control' >
							<option value='1'>Old</option>
							<option value='2'>New</option>							
						</select>
					</td>
					</tr>
					<tr>
					<td>New Arrival</td>
					<td>
					<input type="text" class='form-control' value='<?php echo"$product_newarrival " ?>' readonly><br>
						<select name="newarrival" class='form-control' >
							<option value='1'>Yes</option>
							<option value='2'>No</option>							
						</select>
					</td>
					</tr>
					<tr>
					<td>Product keyword</td>
					<td><input type="text" class='form-control' value='<?php echo"$product_keyword " ?>' name="pkeyword"></td>
					</tr>
					<tr>
					<td>Product Description</td>
					<td>
					<textarea cols="15" rows="10" class='form-control' name="pdesc"><?php echo"$product_desc " ?></textarea>
			        </td>
					</tr>
					
					<tr>
					<td>Product Image</td>
					<td>
						<img src='<?php echo"$product_image" ?>' width='100' height='100'><br>
					<input type="file" class='form-control' name="pimage"></td>
					</tr>
					
					<tr>
					<td colspan="2" align="center"><input type="submit" class='btn-small btn-primary'name="submit1" value="upload"></td>
				</tr>
					
					
					</table>
					
					
					</form>
							
							
							<?php
						}else{
							
							?>
							<script type="text/javascript">
							
								alert("THE PRODUCT DOES NOT EXIST");
								window.location = 'editproduct.php';
							</script>
							<?php
						}
					?>
					

<?php
if(isset($_POST["submit1"]))
{
   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="product_image/".$v3.$fnm;
   $dst1="product_image/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
  
	
	$brand = $_POST['brand'];
	$ritem = $_POST['ritem'];
	$ptype = $_POST['ptype'];
	$newarrival = $_POST['newarrival'];
	$kword = $_POST['pkeyword'];

$submit_status = $con->query("UPDATE product SET product_name = '$_POST[pnm]' , product_cat = '$_POST[pcategory]' , product_brand = '$brand', product_type = '$ptype', product_keyword = '$kword', product_price = '$_POST[pprice]', product_qty = '$_POST[pqty]', product_image = '$dst1', product_desc = '$_POST[pdesc]',recommended_product =  '$ritem', newarrival = '$newarrival', status = '1' WHERE id = '$id'" );

if(!$submit_status){
	
	?>
	<script>
	  alert("product not smbited choose the category, brand and the image");
	</script>
	
	<?php
}
if($submit_status){
	?>
	<script>
	  alert("product smbited");
	</script>
	
	<?php
}
}

?>					
					
					
                
			</div>
		</div>	
	</div>
</div>	
</body>	
<?php
include "footer.php";  
  
?>         
</html>
               

