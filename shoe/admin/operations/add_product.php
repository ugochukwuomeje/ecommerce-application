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
                   Add Product</h2></center>
                <hr>
                    <?php
						include("productsettingsmenu.php");
					?>
					<form name="form1" action="" method="post" id='uploadproduct' enctype="multipart/form-data">
					<table border="1" class='table'>
					<tr>
					<td>Product Name</td>
					<td><input type="text" class='form-control' name="pnm"></td>
					</tr>
					<tr>
					<td>Product Price</td>
					<td><input type="number" class='form-control' name="pprice"></td>
					</tr>
					<tr>
					<td>Product Quantity</td>
					<td><input type="text" class='form-control' name="pqty"></td>
					</tr>
					<tr>
					<td>Product Image</td>
					<td><input type="file" class='form-control' name="pimage"></td>
					</tr>
					<tr>
					<td>Product Class</td>
					<td>
						<select name="class" class='form-control class' >
							echo"<option >----choose class-----</option>";
								<?php
									$sql_class = "SELECT * FROM class";
									$sql_query_class = $con->query($sql_class);
									while($row_squery_class = mysqli_fetch_array($sql_query_class))
									{
										
										$class_sn = $row_squery_class['sn']; 
										$classname = $row_squery_class['name']; 
										echo"<option value='$class_sn'>$classname</option>";
									}
								
								?>					
						</select></td>
					</tr>
					<tr>
					<td>Product Category</td>
					<td>
						<select name="pcategory" class='form-control category' >
							echo"<option >----Choose Category-----</option>";
													
						</select>
						<center><img src='../../images/ajax-loader.gif' id='imgcategory'>
												</center>                
					</td>
					</tr>
					
					<tr>
					<td>Product Brand</td>
					<td>
					<select name="brand" class='form-control brandlist' id='brandlist'>
						
					</select>
					</td>
					</tr>
					<tr>
					<td>Recommended Item</td>
					<td>
						<select name="ritem" class='form-control' >
							<option value='1'>Yes</option>
							<option value='2'>No</option>							
						</select>
					</td>
					</tr>
					<tr>
					<td>Product Type</td>
					<td>
						<select name="ptype" class='form-control' >
							<option value='1'>Old</option>
							<option value='2'>New</option>							
						</select>
					</td>
					</tr>
					<tr>
					<td>New Arrival</td>
					<td>
						<select name="newarrival" class='form-control' >
							<option value='1'>Yes</option>
							<option value='2'>No</option>							
						</select>
					</td>
					</tr>
					<tr>
					<td>Product keyword</td>
					<td><input type="text" class='form-control' name="pkeyword"></td>
					</tr>
					<tr>
					<td>Product Description</td>
					<td>
					<textarea cols="15" rows="10" class='form-control' name="pdesc"></textarea>
			        </td>
					</tr>
					<input type="hidden" name='submit1' value="upload">
					<tr>
					<td colspan="2" align="center"><input type="submit" class='btn-small btn-primary' name="submit1" value="upload"></td>
				</tr>
					
					
					</table>
					
					
					</form>


					<center><img src='../../images/ajax-loader.gif' id='uploadproduct_loader'>
												</center> 
                
			</div>
		</div>	
	</div>
</div>	
</body>	
<?php
include "footer.php";  
  
?>         
</html>
               

