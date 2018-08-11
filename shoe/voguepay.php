<?php
session_start();

if(empty($_SESSION['pay']))
{
	?>
		<script type="text/javascript">
			window.location = "index.php";
		</script>
	<?php
}
?>
<h1>Please wait we are transferring you to VoguePay</h1>
<?php
$pay=$_SESSION["pay"];
$order_id=$_SESSION["order_id"];
?>
<form method='POST' name='buygoods' id='buygoods' action='https://voguepay.com/pay/'>

<input type='hidden' name='v_merchant_id' value='demo' />
<input type='hidden' name='merchant_ref' value='234-567-890' />
<input type='hidden' name='memo' value='Product ordered from exotiscent.com' />

<input type='hidden' name='notify_url' value='http://localhost/perfume/voguepaynotify.php' />
<input type='hidden' name='success_url' value='http://localhost/perfume/voguepay_success.php?id=<?echo"$order_id";?>' />
<input type='hidden' name='fail_url' value='http://localhost/perfume/failed.php' />

<input type='hidden' name='developer_code' value='pq7778ehh9YbZ' />
<input type='hidden' name='store_id' value='25' />

<input type='hidden' name='cur' value='' />

<input type='hidden' name='total' value='<?echo"$pay";?>' />


</form> 

<script type="text/javascript">
    document.getElementById("buygoods").submit();
</script>