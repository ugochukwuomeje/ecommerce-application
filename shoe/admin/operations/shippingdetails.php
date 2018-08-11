<?php
session_start();

$shippingid = $_GET['id'];

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
	<style>
		  .form-control{
			  
			  border-radius: 0px;
			  background-color:white;
			  font-size: 1.2em;
		  }
		 label{
			 
			 padding-top:1em;
		 } 
	</style>
	
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
						<tr style='background-color:#104E8B; color:white; '><th>image</th><th>name</th><th>price</th><th>qty</th><th>total</th><th>date</th></tr>
					";
						$sql_confirm_order_product = "SELECT * FROM confirm_order_product WHERE status = '0' AND order_id = '$shippingid'";
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
								$buyer_details = $row_query_confirm_order_product['order_id'];
								$date = $row_query_confirm_order_product['date'];
								$date = date('m/d/y', $date);
								
								echo"<tr><td><img src='$image' style='width:20%; height:20%' class='img-responsive'></td><td>$name</td><td>$price</td><td>$quantity</td><td>$total_price</td><td>$date</td></tr>";						
							}
							
							
							
						}
						else{
							
							echo"<tr><td  colspan='7'><center>NO PRODUCT IN THE </center></td></tr>";
						}
					echo"</table><br><br>";
					
					
					
					
					
						$sql_confirm_order_address = "SELECT * FROM confirm_order_address WHERE id = '$shippingid'";
						$sql_query_confirm_order_address = $con->query($sql_confirm_order_address);
						
						if($sql_query_confirm_order_address->num_rows > 0)
						{
							$row_query_confirm_address_product =  mysqli_fetch_array($sql_query_confirm_order_address);
								
								$firstname = $row_query_confirm_address_product['firstname'];
								$lastname = $row_query_confirm_address_product['lastname'];
								$email = $row_query_confirm_address_product['email'];
								$state = $row_query_confirm_address_product['state'];
								$town = $row_query_confirm_address_product['town'];
								$mobile = $row_query_confirm_address_product['mobile'];
								$address1 = $row_query_confirm_address_product['address1'];
								$address2 = $row_query_confirm_address_product['address2'];
								
							
							echo"<form class='form' style='width:90%'>
							<fieldset><legend><h2 style='color:#1C86EE'>CUSTOMERS SHIPPING ADDRESS</h2></legend>
							 <label for='firstname'>First Name:</label>
							 <input type='text' value='$firstname' class='form-control' name='firstname' readonly>
							 
							 <label for='lastname'>Last Name:</label>
							 <input type='text' value='$lastname' class='form-control' name='lastname' readonly>
							 
							 <label for='email'>Email:</label>
							 <input type='text' value='$email' class='form-control' name='email' readonly>
							 
							 <label for='state'>State:</label>
							 <input type='text' value='$state' class='form-control' name='state' readonly>
							 
							 <label for='town'>Town:</label>
							 <input type='text' value='$town' class='form-control' name='town' readonly>
							 
							 <label for='mobile'>Mobile:</label>
							 <input type='text' value='$mobile' class='form-control' name='mobile' readonly>
							 
							 <label for='address1'>Address1:</label>
							 <input type='text' value='$address1' class='form-control' name='address1' readonly>
							 
							 <label for='address2'>Address2:</label>
							 <input type='text' value='$address2' class='form-control' name='address2' readonly>
							 </fieldset>
								</form>
							";
						}
						
						else{
							
							echo"<p><center>NO customers details </center></p>";
						}
					?>
				</div>	
			</div><br><br><br>
	</div>	
</body>	
<?php
	include "footer.php";    
?>         
</html>
               

