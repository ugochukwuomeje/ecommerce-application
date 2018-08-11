<!DOCTYPE html>
<html>
		
		
    <!DOCTYPE html>
<!-- saved from url=(0077)https://d396qusza40orc.cloudfront.net/phoenixassets/web-frameworks/index.html -->
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">	

	<link href="css/mystyle.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
	<script src="js/jquery-1.11.3.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		
	
	
	
</head>

<?php
	 include("js/admin_exchange_script.js"); 
	?>
    <body style="background-image:url('../images/pic1.jpg')">
	 <?php
         include("menu/top_menu.php");
	?>
	<nav class="navbar navbar-inverse mydashboard" role='navigation' style="border-radius:0px; z-index:1; margin-top:-6.3em; 			background-color:#B0171F" >
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
				<li><a href="../index.php">Home</a></li>
					 
		  </ul>
		  
		</div>
	  </div>
	</nav>

		
<div class="row" style='margin-bottom:25em'>
		<div class='col-md-6 col-md-offset-3'>
				<div class="panel panel-info" style="border-style:solid; boder-width:0.5px; border-color:#B0171F">	  
				  <div class="panel-heading" style="background-color:#B0171F">
					<div id='adminlogin_msg'></div>
					<h4  style="color:white"> Admin LOGIN</h4>
				  </div>
							<div class="panel-body" >
								<form method="post">
																															  
											<div class="row">
												<div class=" col-xs-12 col-md-12">
													<label for="email" style='color:black'><span class="glyphicon glyphicon-envelope"></span>Email</label>
													<input type="email" id="email" name="email" class="form-control" required="true">
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-md-12">
													<label for="password" style='color:black'><span class="glyphicon glyphicon-lock"></span>Password</label>
													<input type="password" id="password" name="password" class="form-control" required="true">
												</div>
											</div>
													
											<div class="row">
												<div class="col-xs-12 col-md-12">
													<label for="password" style='color:black'><span class="glyphicon glyphicon-lock"></span>id</label>
													<input type="password" id="userid" name="userid" class="form-control" required="true">
												</div>
											</div>
													
											<p><br/></p>
											<div class="row">
												<div class="col-md-12">
													<input type="button" style="float:right" value="login" id="adminlogin" name="adminlogin" class="btn btn-primary ">
												</div>
											</div>
								</form>
							</div>
							
							<div class="panel-footer" style="background-color:#B0171F">
							
							<br><br><br>
					</div>
				  </div>
				</div>
		</div>
		
	<?php
	 require_once("../client/footer.php");
	?>	
    </body>
    
</html>




