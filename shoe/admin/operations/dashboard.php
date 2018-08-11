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
	       <li> <img src='../../images/logo.jpg' style='width:80%; height:80%; padding-top:1em; padding-bottom:1em'></li>  
      				 
      </ul>
	  
			<ul class="nav navbar-nav navbar-right" style='margin-top:2em;'>	
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
					<center><h2 style='font-size:2em'>
					   DASH BOARD</h2><hr></center>               
					</div>

					<div class='row'>
						<div class='col-md-4'>
							<center><a href='saleshistory.php'><img src='adminimages/saleshistory.jpg' class='img-responsive' style='height:157px; width:147px'></a></center>
						</div>
						<div class='col-md-4'>
							<center><a href='orderedproduct.php'><img src='adminimages/ordereditem.jpg' class='img-responsive' style='height:157px; width:147px'></a></center>
						</div>
						<div class='col-md-4'>
							<center><a href='add_product.php'><img src='adminimages/productsettings.jpg' class='img-responsive' style='height:157px; width:147px'></a></center>
						</div>
					</div>
					<br><br><br>
					<div class='row'>
						<div class='col-md-4'>
							<center><a href='addcategory.php'><img src='adminimages/category2.jpg' class='img-responsive' style='height:157px; width:147px'></a></center>
						</div>
						
						<div class='col-md-4'>
								<center><a href='addbrand.php'><img src='adminimages/brands.jpg' class='img-responsive' style='height:157px; width:147px'></a></center>
						</div>
						<div class='col-md-4'>
							<center><a href='addrecommendedproduct.php'><img src='adminimages/recomended-item.jpg' class='img-responsive' style='height:157px; width:147'></a></center>
						</div>
					</div>
					<br><br><br>
					<div class='row'>
						
						<div class='col-md-4'>
								<center><a href='addnewarrivals.php'><img src='adminimages/newarrival.jpg' class='img-responsive' style='height:157px; width:147'></a></center>
						</div>
						<div class='col-md-4'>
								<center><a href='addclass.php'><img src='adminimages/productclass.jpg' class='img-responsive' style='height:157px; width:147'></a></center>
						</div>
					</div>
				</div>	
			</div><br><br><br>
	</div>	
</body>	
<?php
include "footer.php";  
  
?>         
</html>
               

