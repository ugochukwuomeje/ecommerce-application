<?php
session_start();

include('../../connection/db.php');

$id = $_POST['pid'];

$sql_removeproduct = "UPDATE product SET newarrival = '0' WHERE id = '$id'";
$sql_queryremoveproduct = $con->query($sql_removeproduct);

if($sql_queryremoveproduct){
	
	echo"product removed from new arrival";
	exit();
}
else{
	echo"$con->error product not deleted";
	exit();
}
?>
