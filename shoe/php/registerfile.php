<?php

include("../connection/db.php");

$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$email = $_POST["email"];
$password = $_POST["password"];
$repassword = $_POST["retypepassword"];
$mobile = $_POST["mobile"];
$town = $_POST["town"];
$state = $_POST["state"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];

$emailvalidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$numbervalidation = "/^[0-9]+$/";

if(empty($f_name) ||empty($l_name) ||empty($email) ||empty($password) ||
empty($repassword) ||empty($mobile)){
	
	echo"
	 PLEASE FILL ALL FIELDS..!
	";
	exit();
}else{
	

if(!preg_match($emailvalidation,$email)){
	echo"
			 <div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert'ariel-label='close'>&times;</a>
				<b>This email $email address is not valid</b>
			 </div>
			";
	exit();
}
if(strlen($password) < 6){
	echo"password is weak it should be more than 5 letters";
	exit();
}
if(strlen($repassword) < 6){
	echo"
			 password is weak it should be more than 4 letters
			";
	exit();
}
if($password != $repassword){
		echo"password is not same
			";
	exit();
}
if(!preg_match($numbervalidation,$mobile)){
	echo"
			 Mobile number $mobile  is not valid</b>
			
			";
	exit();
}
if((strlen($mobile) < 10 )){
	echo"
			 mobile number must be more than 10
			
			";
	exit();
}
//existing email in our database
$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1"; 

$check_query = mysqli_query($con,$sql);
$count_email = mysqli_num_rows($check_query);
if($count_email > 0){
	echo"Email Address is already taken Try Another email address";
	
exit(); 
	}
	else {	
	$password = md5($password);
	
		$email_id = str_replace(".", "1", $email);
		$myid = str_replace("@", "1", $email_id);
		
		
		$date = date("Y-m-d");
		$reflink = "https://www.fexos.com/index.php?referalid=$myid";
		
		
	
	$sql = "INSERT INTO 
	users
	(first_name, last_name, email, password, mobile, date, reflink, refid)
	VALUES ('$f_name', '$l_name', '$email', '$password', '$mobile','$date','$reflink','$myid')";	
	 $run_query = mysqli_query($con,$sql);
	 
	 $sql_billing_address = "INSERT INTO billing_address(email, first_name, last_name, state, town,mobile, address1, address2)VALUES
	 ('$email','$f_name','$l_name','$state','$town', '$mobile','$address1','$address2')";
	 
	 $query_billing = $con->query($sql_billing_address);
	 
	 if(!$query_billing)
	 {
		echo"billing address error$con->error";
		exit();
	 }
	 
	 if($run_query){
		 echo"1";
	 }
	 if(!$run_query){
		 echo"$con->error";
	 }
	}
}


?>