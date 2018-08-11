<?php
session_start();

if($_SESSION['admin'] == "")
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
		//require_once("../../connection/db.php");
        include("../js/admin_exchange_script.js"); 
	?>
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
                   View Customer Order</h2>
                <?php
                   $sql 
				   
				   ?>
					
<?php
if(isset($_POST["submit1"]))
{
   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="./product_image/".$v3.$fnm;
   $dst1="product_image/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);



$con->query("insert into product values('','$_POST[pnm]',$_POST[pprice],$_POST[pqty],'$dst1','$_POST[pcategory]','$_POST[pdesc]')");


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
               

