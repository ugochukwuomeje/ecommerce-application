<?php
if(isset($_POST['id']))
{
	$id=$_POST['id'];

	
require_once("../../connection/db.php");

	$query = "SELECT * FROM subcategory WHERE cat_id = '$id' ";
	$run_query = mysqli_query($con,$query);
		echo"<option value='0'>---choose subcategory---</option>";
	while($row = mysqli_fetch_array($run_query))
				{
			    $myid = $row['id'];
				$name = $row['name'];
				echo"
				
				<option value='$myid'>$name</option>";
			
			}
			
}			
?>