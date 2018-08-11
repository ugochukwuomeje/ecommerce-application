<?php
session_start();
include("header.php");
include('connection/db.php');

?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="#" id='form2'>
							<input type="text" name='email' placeholder="email" />
							<input type="password" name='password' placeholder="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" id='login_button' class="btn btn-default">Login</button>
							<img src='images/ajax-loader.gif' id='login_loader' width='300' height='300'><br>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form>
							<input type="text" name='f_name' placeholder="First Name"/>
							<input type="text" name='l_name' placeholder="Last Name"/>
							<input type="email"name='email' placeholder="Email Address"/>
							<input type="text" name='state' placeholder="State">
							<input type="text" name='town' placeholder="Town">
							<input type="text" name='address1' placeholder="Address 1 *">
							<input type="text" name='address2' placeholder="Address 2">
							<input type="password" name='password' placeholder="Password"/>
							<input type="password" name='retypepassword' placeholder="Retype Password"/>
							<input type="number" name='mobile' placeholder="+234 000 0000"/>
							<button type="submit" id='signup_button' name='signup_button' class="btn btn-default">Signup</button>
							<img src='images/ajax-loader.gif' id='signup_loader' width='300' height='300'><br>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
<?php
include('footer.php');
	
?>
</body>
</html>