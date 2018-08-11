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
						<tr style='background-color:#104E8B; color:white; '><th>image</th><th>name</th><th>price</th><th>qty</th><th>total</th><th>date</th><th>shipping details</th></tr>
					";
						$sql_confirm_order_product = "SELECT * FROM confirm_order_product WHERE status = 0";
						$sql_query_confirm_order_product = $con->query($sql_confirm_order_product);
						
						if($sql_query_confirm_order_product->num_rows > 0)
						{
							while($row_query_confirm_order_product =  mysqli_fetch_array($sql_query_confirm_order_product)){
								
								$email = $row_query_confirm_order_product['email'];
								$image = $row_query_confirm_order_product['product_image'];
								$name = $row_query_confirm_order_product['product_name'];
								$price = $row_query_confirm_order_product['product_price'];
								$quantity = $row_query_confirm_order_product['product_qty'];
								$total_price = $row_query_confirm_order_product['product_total'];
								$date = $row_query_confirm_order_product['date'];
								$id = $row_query_confirm_order_product['order_id'];
								$date = $row_query_confirm_order_product['date'];
								$date = date('m/d/y', $date);
								
								echo"<tr><td><img src='$image' style='width:20%; height:20%' class='img-responsive'></td><td>$name</td><td>$price</td><td>$quantity</td><td>$total_price</td><td>$date</td><td><a class='btn btn-success btn-small' role='button' href='shippingdetails.php?id=$id'>View customer details</a></td></tr>";						
							}
							
							
							
						}
						else{
							
							echo"<tr><td  colspan='7'><center>NO PRODUCT IN THE </center></td></tr>";
						}
					echo"</table>";
					?>
				</div>	
			</div><br><br><br>
	</div>	
</body>	
<?php
	include "footer.php";    
?>         
</html>
               

