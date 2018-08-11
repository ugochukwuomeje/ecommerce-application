<?php
session_start();

include('../../connection/db.php');

$id = $_POST['pid'];

$sql_removeproduct = "UPDATE product SET newarrival = '1' WHERE id = '$id'";
$sql_queryremoveproduct = $con->query($sql_removeproduct);

if($sql_queryremoveproduct){
	
	echo"product set as new arrival";
	exit();
}
else{
	echo"$con->error product not deleted";
	exit();
}
?>
