<?php
if(isset($_POST["submit1"]))
{
	
        
		require_once("../../connection/db.php");
		
	
	
   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="product_image/".$v3.$fnm;
   $dst1="product_image/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
  
	$name = escape_data($_POST['pnm']);							
	$brand = escape_data($_POST['brand']);
	$class = escape_data($_POST['class']);
	$ritem = escape_data($_POST['ritem']);
	$ptype = escape_data($_POST['ptype']);
	$newarrival = escape_data($_POST['newarrival']);
	$kword = escape_data($_POST['pkeyword']);
	$pdesc = escape_data($_POST['pdesc']);
	
	
	

$submit_status = $con->query("insert into product values('', '$class','$name' ,'$_POST[pcategory]' , '$brand', '$ptype', '$kword', '$_POST[pprice]','$_POST[pqty]','$dst1','$pdesc', '$ritem', '$newarrival','1' )");

if(!$submit_status){
	
	echo"$con->error";
	exit();
	
}
if($submit_status){
	
	echo"1";
	exit();
}
}

function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>					
					