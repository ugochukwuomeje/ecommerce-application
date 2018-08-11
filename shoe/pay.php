<?php
session_start();

if(!isset($_SESSION['f_name'])|| !isset($_SESSION['l_name'])|| !isset($_SESSION['reflink']))
{
	header("Location:login.php");
}
include("header.php");
include('connection/db.php');
$payer_email = $_GET['payeremail'];

$_SESSION['paiyeremail'] = $payer_email;

$cartid = uniqid() + "cart";
?>

<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
<!--/header-->

	<section id="cart_items">
		<div class="container">
		
			<div class="register-req">
				<div class='col-lg-'>
					<p><center>
						<form action="#">
						  <script src="https://js.paystack.co/v1/inline.js"></script>
						  <button type="button" class='btn btn-lg btn-success' style='border-style:solid; border-width:1px' name="pay_now" id="pay-now" title="Pay now"  onclick="payWithPaystack('<?php echo $payer_email ?>')"><img src='images/usePaystack.jpg'></button>
						</form></center>
					</p>
				</div>
			</div>
			
			
		</div>
</section>
	<?php
		include('footer.php');
	?>

</body>

<script>

  function payWithPaystack(savedemail){

  
  alert(savedemail);
    var handler = PaystackPop.setup({
      key: 'pk_test_78337b1d7eb4239b7003b8579324d1d1f00da5d3',
      email: savedemail,
      amount: 10000,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Product",
                variable_name: "product",
                value: "Ancient and modern"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
		  window.location.href = "http://soteriahub.com/ourapp/voguepay_success.php";
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>

</html>


