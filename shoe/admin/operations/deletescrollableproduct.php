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
					<?php
					
					echo"<table class='table table-striped table-condensed' width='100'>
						<tr style='background-color:#104E8B; color:white; '><th>image</th><th>description</th></tr>
					";
						$sql_product = "SELECT * FROM scrollable";
						$sql_query_product = $con->query($sql_product);
						
						if($sql_query_product->num_rows > 0)
						{
							while($row_query_confirm_order_product =  mysqli_fetch_array($sql_query_product)){
								
								
								$imagedisplay = $row_query_confirm_order_product['imagename'];
								$description = $row_query_confirm_order_product['description'];
								$id = $row_query_confirm_order_product['id'];
								
					
							echo"<tr><td><img src='$image' style='width:40%; height:40%' class='img-responsive'></td><td>$name</td><td>$product_cat_name</td><td>$product_brand_name</td><td>$price</td><td><a class='btn btn-danger btn-small deleteproduct' role='button' deleteproductid = '$id'><span class='glyphicon glyphicon-remove'></span>delete product</a></td></tr>";						
						}
							
							
							
						}
						else{
							
							echo"<tr><td  colspan='7'><center>NO PRODUCT IN THE </center></td></tr>";
						}
					echo"</table>";
					
					?>
					<center><img src='../../images/ajax-loader.gif' id='removeproduct_loader' width='300' height='300'></center><br>
				</div>	
			</div><br><br><br>
	</div>	
</body>	
<?php
	include "footer.php";    
?>         
</html>
               

