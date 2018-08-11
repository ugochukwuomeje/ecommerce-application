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
                <h2>
                  Add New Brand</h2>
                <hr>
				
                  <?php
						include("brandmenu.php");
					?>
                    
					<form name="form1"  method="post">
					<table border="1" class='table'>
					<tr>
						<td>CLASS</td>	
						<td>CATEGORY LIST</td>						
						<td>BRAND LIST</td>
						<td>NEW BRAND</td>
					</tr>
					<tr>
						<td>
							<select name="pclass" class='form-control class' >
								<option value='0'>----select class----</option>
									<?php
										$sql_class = "SELECT * FROM class where status = '1'";
										$sql_query_class = $con->query($sql_class);
										if($sql_query_class->num_rows >0){
											while($row_squery_class = mysqli_fetch_array($sql_query_class))
											{
												
												$sn = $row_squery_class['sn']; 
												$name = $row_squery_class['name']; 
												echo"<option value='$sn'>$name</option>";
											}
										}else{
											echo"<option value='0'>----No enabled category----</option>";
										}
									?>					
							</select>
						</td>
						<td>
							<select name="pcategory" class='form-control category' >
													
							</select>
						</td>
						
						<td>  
							<select name="brandlist" class='form-control brandlist' id='brandlist'>
																					
							</select>
						</td>
						<td>
							<input type='text' name='brand' class='form-control'>
						</td>
					</tr>
					
					<input type="hidden" name="categoryvalue" value="8">
					<tr>
					<td colspan="4" align="center"><input type="submit" id='submit7' class='btn-small btn-primary' name="submit7" value="Add Brand"></td>
					</tr>
					
					
					</table>
					
					
					</form>
	
					<center><img src='../../images/ajax-loader.gif' id='imgcategory'>
							<img src='../../images/ajax-loader.gif' id='addbrand_loader'>
					</center>                
			</div>
		</div>	
	</div>
</div>	
</body>	
<?php
include "footer.php";  
  
?>         
</html>
               

