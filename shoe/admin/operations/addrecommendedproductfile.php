<?php
session_start();

include('../../connection/db.php');

$id = $_POST['pid'];

$sql_removeproduct = "UPDATE product SET recommended_product = '1' WHERE id = '$id'";
$sql_queryremoveproduct = $con->query($sql_removeproduct);

if($sql_queryremoveproduct){
	
	echo"product added to recommended product";
	exit();
}
else{
	echo"$con->error product not deleted from recommended product";
	exit();
}
?>
