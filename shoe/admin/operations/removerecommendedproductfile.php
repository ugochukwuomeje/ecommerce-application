<?php
session_start();

include('../../connection/db.php');

$id = $_POST['pid'];

$sql_removeproduct = "UPDATE product SET recommended_product = '0' WHERE id = '$id'";
$sql_queryremoveproduct = $con->query($sql_removeproduct);

if($sql_queryremoveproduct){
	
	echo"product removed from recommended Product";
	exit();
}
else{
	echo"$con->error product not removed from recommended product";
	exit();
}
?>
