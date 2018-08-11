<?php
session_start();
include('../connection/db.php');
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container"  name="form" action="" method="POST">
    <p><input type="email" placeholder="Email" required name="email"></p>
    <p><input type="password" placeholder="Password" required name="pwd"></p>
    <p><input type="submit" name="submit1" value="Log in"></p>
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    
    <?php
	  if(isset($_POST['submit1'])){
		  
		  $email = $_POST['email'];
		  $password = md5($_POST['pwd']);
		  
		$res = $con->query(" SELECT * FROM admin WHERE email = '$email' && password='$password' ");  
	  
		while($row =  mysqli_fetch_array($res))
		{
			$_SESSION['admin'] = $row['email'];
			?>
			
			<script type='text/javascript'>
				window.location='operations/dashboard.php';
			</script>
			<?php
		}
	  
	  }
	?>
    
    
  </body>
</html>
