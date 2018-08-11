<?php
session_start();
include("../connection/db.php");

	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$password = md5($_POST["password"]);
	$sql = "SELECT * FROM users WHERE email = '$email' AND password ='$password' LIMIT 1";
	
	$run_query = mysqli_query($con, $sql);
	
	if(!$run_query)
	{
		echo"$con->error";
		exit();
	}
	$count = mysqli_num_rows($run_query);
	
	if($count > 0)
	{
		$row =mysqli_fetch_array($run_query);
		$_SESSION["l_name"] = $row["last_name"];
		$_SESSION["f_name"] = $row["first_name"];
		$_SESSION['reflink'] = $row['reflink'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['loggedin'] = 1;
				echo"1";				
	}
	else{
		echo"Invalid email or password";
		exit();
	}
	 
	

?>