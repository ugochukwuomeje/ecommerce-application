<?php
session_start();

if(!isset($_SESSION['f_name'])|| !isset($_SESSION['l_name'])|| !isset($_SESSION['reflink']))
{
	header("Location:login.php");
}
include("header.php");
include('connection/db.php');
$email = $_SESSION['email'];
?>

<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
<!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="User Name">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Billing Address</p>
							<div class="form-one">
								<form>
									<?php
										$sql_checkout = "SELECT * FROM billing_address WHERE email = '$email'";
										$query_checkout = $con->query($sql_checkout);
										$row_check = mysqli_fetch_array($query_checkout);
										
										$_SESSION['order_id'] = $row_check["email"];
									?>
																	
									<input type="text" value='<?php echo$row_check["first_name"];?>' >
									<input type="text" value='<?php echo$row_check["last_name"];?>' >
									<input type="text" value='<?php echo$row_check["state"]?>' >
									<input type="text" value='<?php echo$row_check["town"]?>' >
									<input type="text" value='<?php echo$row_check["address1"]?>' >
									<input type="text" value='<?php echo$row_check["address2"]?>' >
									<input type="text" value='<?php echo$row_check["mobile"]?>' >
									
								</form>
							</div>
							<div class="form-two">
							
								<form style='margin-top:-2.5em' method='POST'>
									<p>Update Billing Address</p>
																	
									<input type="text" name='f_name' placeholder="First Name *" required>
									<input type="text" name='l_name' placeholder="last Name" required>
									<input type="text" name='state' placeholder="state" required>
									<input type="text" name='town' placeholder="town" required>
									<input type="text" name='address1' placeholder="Address 1 *" required>
									<input type="text" name='address2' placeholder="Address 2" >
									<input type="text" name='mobile' placeholder="mobile no" required>
									
									<button type="submit"  role='button' name='update1' class="btn btn-warning">update</button>
								</form>
							</div>
						</div>
					</div>
					<?php
						if(isset($_POST['update1']))
						{
							$email = $_SESSION['email'];
							
							$first_name = $_POST['f_name'];
							$last_name = $_POST['l_name'];
							$state = $_POST['state'];
							$town = $_POST['town']; 
							$address1 = $_POST['address1'];
							$address2 = $_POST['address2'];
							$mobile = $_POST['mobile'];
							$sql_update = "UPDATE billing_address SET first_name = '$first_name', last_name = '$last_name',
							state = '$state', town = '$town', address1 = '$address1', address2 = '$address2', mobile = '$mobile'
							WHERE email = '$email'";
							$query_update = $con->query($sql_update);
							 if($query_update){
								 
								 
								 ?>
								   <script>
									alert("Billing address successfuly saved");
								   </script>
								 <?php
							 }
						}
								 $query_getorderid = $con->query("SELECT * FROM billing_address WHERE email = '$email'");
								 $row_getorderid = mysqli_fetch_array($query_getorderid);
								 $_SESSION["order_id"] = $row_getorderid['id'];
								 
								 
						?>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
				<?php
						$d = 0;
					if(!empty($_COOKIE['item'])){
				
								 if(is_array($_COOKIE['item'])) // this is for checking if cookies is available or not
						{	
							$d = $d + 1;
						}
			}
			if($d == 0)
			{
				echo"no record in the database";
			}else{
				?>
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					
						foreach($_COOKIE['item'] as $name => $values)
			{
				$values11 = explode("__",$values);
					$name1 = $values11['5'];
					?>
						
						<tr>
							<td class="cart_product">
								<a href=""><img src='<?php echo"$values11[0]" ?>' width='150' height='132' alt=""></a>
							</td>
							<td class="cart_name">
								<p style='font-size:1.5em'><?php echo"$values11[1]" ?></p>
								
							</td>
							<td class="cart_price">
								<p>$<?php echo"$values11[2]" ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up"  id='<?php echo"$name1";?>' href=""> + </a>
									<input class="cart_quantity_input" type="text" id='<?php echo"qty$name1";?>' name="quantity" value='<?php echo"$values11[3]" ?>' autocomplete="off" size="2" readonly>
									<a class="cart_quantity_down" id='<?php echo"$name1";?>' href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price" id='<?php echo"cart_price$name1";?>' ><?php echo"$values11[4]" ?></p>
							</td>
							
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="cart.php?delete=<?php echo$name1;?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					    
					<?php
					
			}
			?>
							

						
						
					</tbody>
				<?php
				
			}
				if(!empty($_COOKIE['item'])){
				if(is_array($_COOKIE['item'])){
					$tot = 0;
					foreach($_COOKIE['item'] as $name => $values)
			{
				$values11 = explode("__",$values);
				$tot = $tot + $values11[4];
			}
				
			echo"<tr><th></th><th></th><th></th><th style='font-size:1.5em'>Total</th><th style='font-size:1.5em' id='total_price'>N$tot</th></tr>";
			$_SESSION['pay'] = $tot;
			}
				}
			?>
					
					
				</table>
	
			</div>
					
			<div class="payment-options">
					<span>
						<a href='voguepay.php'><img style='width:225px; height:49px' src='https://www.dormco.com/v/vspfiles/assets/images/paypal-button.png'></a>
					</span>
				<!--	<span>
						<label><input type="checkbox"> vogue Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>--->
				</div>
		</div>
	</section> <!--/#cart_items-->
		<!--	<center style='margin-top:-2em'>
				<a href='voguepay.php'><input type='button' class='btn btn-lg btn-warning' value='checkout'></a>
			</center>--->
	

	<?php
		include('footer.php');
	?>

</body>
</html>