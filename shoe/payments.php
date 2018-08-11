<?php
$cemertid =   5376;
$ceamt = 500;
$cecustomerid = 'ugochukwuomeje1@gmail.com';
$cememo = 'Purchase of an Acient and Modern';
$cetxref = uniqid();
$cenurl = 'http://localhost/finnacleshop/payment_success.php'; 

$key = '1d0d5a25ebad90b728113dab3dcbb4b1';
$data = $key.$cetxref.$ceamt;
$signature = hash_hmac('sha256', $data, $key, true);
?>

<body onLoad="document.submit2cepay_form.submit()">
<!-- 
Note: Replace https://www.cashenvoy.com/sandbox/?cmd=cepay with https://www.cashenvoy.com/webservice/?cmd=cepay once you have been switched to the live environment.
-->
<form method="post" name="submit2cepay_form" action="https://www.cashenvoy.com/sandbox/?cmd=cepay" target="_self">
<input type="hidden" name="ce_merchantid" value="<?= $cemertid ?>"/>
<input type="hidden" name="ce_transref" value="<?= $cetxref ?>"/>
<input type="hidden" name="ce_amount" value="<?= $ceamt ?>"/>
<input type="hidden" name="ce_customerid" value="<?= $cecustomerid ?>"/>
<input type="hidden" name="ce_memo" value="<?= $cememo ?>"/>
<input type="hidden" name="ce_notifyurl" value="<?= $cenurl ?>"/>
<input type="hidden" name="ce_window" value="parent"/><!-- self or parent -->
<input type="hidden" name="ce_signature" value="<?= $signature ?>"/>
</form>
</body>