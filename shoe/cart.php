<?php
session_start();
include('connection/db.php');
if(!empty($_COOKIE['item'])){
	if(is_array($_COOKIE['item'])){
		foreach($_COOKIE['item'] as $name1 => $value)
		{
			if(isset($_GET["delete"]))
			{  
				$name1 = $_GET['delete'];
				setcookie("item[$name1]", "", time()- 1800);
				?>
				<script type="text/javascript">
					window.location.href = 'cart.php';				
				</script>
				<?php
			}
		}
	}
}
include("header.php");
?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
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
								<a href=""><img src='admin/operations/<?php echo"$values11[0]" ?>' width='150' height='132' alt=""></a>
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
						
	<center style='margin-top:-2em'>
		<a href='checkout.php'><input type='button' class='btn btn-lg btn-warning' value='checkout'></a>
	</center>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	

	<?php
include('footer.php');
	
?><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>