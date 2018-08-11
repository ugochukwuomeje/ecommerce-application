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
                   Add Scrollable Product</h2></center>
                <hr>
                    <?php
						include("scrollableproductsetting.php");
					?>
					<form name="form1" action="" id='uploadimage' method="post" enctype="multipart/form-data">
					<table border="1" class='table'>
					<tr>
							
					<tr>
					<td>Product Description</td>
					<td>
						<textarea cols="15" rows="10" class='form-control' name="description"></textarea>
			        </td>
					</tr>
					
					<tr>
					<td>Product Image</td>
						<td><input type="file" id='pick_product' class='form-control' name="pimage"></td>
					</tr>
					
					<tr>
					<td>Image Preview</td>
						<td><img class='img-responsive' id='preview_product'>
							<p id='message'></p>
						</td>
					</tr>
					<input type='hidden' name='hiduploadimage' value='1'>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" id='addscrollable' class='btn-small btn-primary' name="submit1" value="upload"></td>
						</tr>
					
										
					</table>
					
					<center><img src='../../images/ajax-loader.gif' id='scrollable_loader' width='300' height='300'></center>
					</form>

		
					
					
                
			</div>
		</div>	
	</div>
</div>	
</body>	
<?php
include "footer.php";  
  
?>         
</html>
               

