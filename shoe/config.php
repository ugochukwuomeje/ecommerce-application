<?php
$payeremail = $_SESSION['paiyeremail']

?>

<form action="#">
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" name="pay_now" id="pay-now" title="Pay now"  onclick="payWithPaystack('<?php echo $payeremail ?>')">Pay now</button>
</form>

<script>

  function payWithPaystack(savedemail){

    var handler = PaystackPop.setup({
      key: 'pk_test_80764627eb805919c59a7ff38f9a5b1854e81e13',
      email: savedemail,
      amount: 1000,
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
		  window.location.href = "verify.php";
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>