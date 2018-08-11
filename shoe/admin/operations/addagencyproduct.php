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
                   Add Product</h2></center>
                <hr>
                    <?php
						include("productsettingsmenu.php");
					?>
					<?php //////////displays the added product
					
					
					?>
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1" class='table'>
					<tr>
					<td>Product Image</td>
					<td><input type="file" class='form-control' name="pimage"></td>
					</tr>
					<tr>
					<td>Product Name</td>
					<td><input type="text" class='form-control' name="pnm"></td>
					</tr>					
					
					<tr>
					<td>Product Type</td>
					<td>
						<select name="ptype" class='form-control' >
							<option value='1'>Old</option>
							<option value='2'>New</option>							
						</select>
					</td>
					</tr>
					<tr>
					<td>New Arrival</td>
					<td>
						<select name="newarrival" class='form-control' >
							<option value='1'>Yes</option>
							<option value='2'>No</option>							
						</select>
					</td>
					</tr>
					<tr>
					<td>Product keyword</td>
					<td><input type="text" class='form-control' name="pkeyword"></td>
					</tr>
					<tr>
					<td>Product Description</td>
					<td>
					<textarea cols="15" rows="10" class='form-control' name="pdesc"></textarea>
			        </td>
					</tr>
					
					<tr>
					<td colspan="2" align="center"><input type="submit" class='btn-small btn-primary'name="submit1" value="upload"></td>
				</tr>
					
					
					</table>
					
					
					</form>

<?php
if(isset($_POST["submit1"]))
{
   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="product_image/".$v3.$fnm;
   $dst1="product_image/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
  
	$name = escape_data($_POST['pnm'])							
	$brand = escape_data($_POST['brand']);
	$ritem = escape_data($_POST['ritem']);
	$ptype = escape_data($_POST['ptype']);
	$newarrival = escape_data($_POST['newarrival']);
	$kword = escape_data($_POST['pkeyword']);
	$pdesc = escape_data($_POST['pdesc']);
	
	
	function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

$submit_status = $con->query("insert into product values('','$name' ,'$_POST[pcategory]' , '$brand', '$ptype', '$kword', '$_POST[pprice]','$_POST[pqty]','$dst1','$pdesc', '$ritem', '$newarrival','1' )");

if(!$submit_status){
	?>
	<script>
	  alert("product not smbited");
	</script>
	
	<?php
}
if($submit_status){
	?>
	<script>
	  alert("product smbited");
	</script>
	
	<?php
}
}

?>					
					
					
                
			</div>
		</div>	
	</div>
</div>	
</body>	
<?php
include "footer.php";  
  
?>         
</html>
               

