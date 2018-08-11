<?php

session_start();
require_once("../connection/db.php");
if(empty($_POST['userEmail']) || empty($_POST['userPassword'])|| empty($_POST['userid'])) {
	
	echo"
	 
		Fill All the fields...!
	";
	exit();
}
if(isset($_POST["userLogin"]))
{	$email = escape_data($_POST["userEmail"]);
	$emailvalidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	
	if(!preg_match($emailvalidation,$email)){
			echo"
					 
					This email $email address is not valid
					 
					";
			exit();
		}
		
	
	$password = escape_data($_POST["userPassword"]);
	$id = escape_data($_POST["userid"]);
	$password = md5($password);
	
	$sql = "SELECT * FROM adminlogin WHERE email = '$email' AND password = '$password' AND id ='$id'";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	
	if($count == 1)
	{
		
		$_SESSION["email"] = "$email";
		
		echo"come";				
	}
	if($count == 0){
		
		echo"<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert'ariel-label='close'>&times;</a>
				<b>try again</b>
			 </div>";	
	}
	 
	
	} 
	
	function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>