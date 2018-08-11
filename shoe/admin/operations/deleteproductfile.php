<?php
session_start();

include('../../connection/db.php');

$id = $_POST['pid'];

$sql_removeproduct = "DELETE  FROM product WHERE id = '$id'";
$sql_queryremoveproduct = $con->query($sql_removeproduct);

if($sql_queryremoveproduct){
	
	echo"product delelted";
	exit();
}
else{
	echo"$con->error product not deleted";
	exit();
}
?>
