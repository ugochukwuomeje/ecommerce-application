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
		
			<div class="register-req">
				<div class='col-lg-'>
					<p>
						<form method="GET" action='pay.php'>
							<label>Email:</label>
							<input type='email' name="payeremail" class='form-control' required><br>
							<input type='submit' class='btn btn-success' value='continue'>
						</form>
					</p>
				</div>
			</div>
			
			
		</div>
</section>
	<?php
		include('footer.php');
	?>

</body>
</html>