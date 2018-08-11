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
                   Enable Category</h2></center>
                <hr>
				
                  <?php
						include("categorymenu.php");
					?> 
                    
					<form name="form1"  method="post">
					<table border="1" class='table'>
					
					<tr>
					<td>product class</td>
					<td>
						<select name="class" class='form-control classfordisablecategory' >
							<option value='0'>choose class</option>
								<?php
									$sql_class = "SELECT * FROM class";
									$sql_query_class = $con->query($sql_class);
									while($row_squery_class = mysqli_fetch_array($sql_query_class))
									{
										
										$classid = $row_squery_class['sn']; 
										$classname = $row_squery_class['name']; 
										echo"<option value='$classid'>$classname</option>";
									}
								
								?>					
						</select>
					</td>
					</tr>
					
					<tr>
					<td>Categoty List</td>
					<td>
						<select name="pcategory" class='form-control category' >
							
											
						</select>
					</td>
					</tr>
					
					<input type="hidden" name="categoryvalue" value="3">
					<tr>
					<td colspan="2" align="center"><input type="submit" id='submit4' class='btn-small btn-primary' name="submit4" value="Enable"></td>
				</tr>
					
					
					</table>
					
					
					</form>
					<center><img src='../../images/ajax-loader.gif' id='imgcategory'> </center>  
					<center><img src='../../images/ajax-loader.gif' id='enablecategory_loader'> </center>                
			</div>
		</div>	
	</div>
</div>	
</body>	
<?php
include "footer.php";  
  
?>         
</html>
               

