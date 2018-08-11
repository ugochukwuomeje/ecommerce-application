<?php
session_start();

include('../../connection/db.php');


if(isset($_POST["hiduploadimage"]))
{


$description = $_POST['description'];

   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
  
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="scrollableimage/".$v3.$fnm;
   $dst1="scrollableimage/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

$sql_addscrollableproduct = "INSERT INTO scrollable(imagename, description)VALUES('$dst1', '$description')";
$sql_queryaddscrollableproduct = $con->query($sql_addscrollableproduct);

if($sql_queryaddscrollableproduct){
	
	echo"1";
	exit();
}
else{
	echo"$con->error product not added";
	exit();
}
}
else{
	echo"not set";
	exit();
}
?>
