<?php
session_start();

include('connection/db.php');

$email = $_SESSION['email'];
$id = $_POST['pid'];

$sql_removewishlist = "DELETE FROM wishlist WHERE id = '$id' AND email = '$email'";
$sql_queryremovewishlist = $con->query($sql_removewishlist);

if($sql_queryremovewishlist){
	
	echo"product delelted from wishlist";
	exit();
}
else{
	echo"$con->error product not deleted";
	exit();
}
?>
