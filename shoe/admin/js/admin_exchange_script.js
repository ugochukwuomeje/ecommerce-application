<script type="text/javascript">
$(document).ready(function()
{
	
	
	$("#support_loader").hide();
	$("#admin_loader").hide();
	$("#reply_loader").hide();
//////////////////////////////////////////////////////////////////////////////////////////this is for login
		 $("#adminlogin").click(function(event){
	 
	 event.preventDefault();
	 var email = $("#email").val();
	 var pass = $("#password").val();
	 var id = $("#userid").val();
	 
	 $.ajax({
		  
		  url: "operations/adminloginfile.php",
		  method: "POST",
		  data: {userLogin:1,userid:id,userEmail:email,userPassword:pass},
		  success: function(data){		  
			
			  
				  if(data == "come")
			  {
				  window.location.href = "operations/dashboard.php";
			  }
			  else{
				  $("#adminlogin_msg").html(data);
			  }
			 
			
		}
 })
 });
 //////////////////////////////////////////////////this is for support login
 
 $("#supportlogin").click(function(event){
			 $("#support_loader").show();
	 event.preventDefault();
	 var email = $("#email").val();
	 var pass = $("#password").val();
	 var id = $("#userid").val();
	 $.ajax({
		  url: "operations/supportlogin.php",
		  method: "POST",
		  data: {userLogin:1,userId:id,userEmail:email,userPassword:pass},
		  success: function(data){
			  $("#support_loader").hide();
			  if(data == "come")
			  {
				  window.location.href = "operations/support.php";
			  }
			  else{
				  alert(data);
			  }
			 
			
		}
 })
 });
 ////////////////////////////////////////////////////
 
 $("#totalregistrant").click(function(event){
	 event.preventDefault();
	 
	 $.ajax({
		  url: "operations/totalregistrant.php",
		  method: "POST",
		  data: {userLogin:1,userId:id,userEmail:email,userPassword:pass},
		  success: function(data){
			  $("#support_loader").hide();
			  if(data == "come")
			  {
				  window.location.href = "operations/support.php";
			  }
			  else{
				  alert(data);
			  }
			 
			
		}
 })
 });
 
 ////////////////////////////////////////////////////
 $("#reply_button").click(function(event){
			 $("#reply_loader").show();
	 event.preventDefault();
	 var reply = $("#reply").val();
	 var sn = $("#serialno").val();
	 $.ajax({
		  url: "updatesupport.php",
		  method: "POST",
		  data: {reply:reply,serialno:sn},
		  success: function(data){
			  $("#reply_loader").hide();
			  
				  alert(data);
			 
			 
			
		}
 })
 });
 //////////////////////////////////////////////////////////////////////////////////////// for confirming buy order
  $("body").delegate(".confirmorder","click",function(event){
	   
	 event.preventDefault();
	 var operation = $(this).attr('operation');
	 var sn = $(this).attr('sn');
	 var ttid = $(this).attr('ttid');
	 //alert("come"+ operation +" "+sn+" "+ttid );
	$.ajax({
		  url: "verifyorder.php",
		  method: "POST",
		  data: {operation:operation, sn:sn, ttid:ttid},
		  success: function(data){
			  if(data == 1)
			  {
				  $("#confirm_order_msg").html("<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert'ariel-label='close'>&times;</a><b> ttid BUY ORDER UPDATED!</b></div>");
				  $("#confirm"+sn).attr('disabled','disabled');
				  $("#unconfirm"+sn).removeAttr('disabled','disabled');
			  }
			 else{
				  $("#confirm_order_msg").html(data);
			  }
		  }	
})
 });
 ////////////////////////////////////////////////////////////////////////////////////////////////// for unconfirming buy order
 $("body").delegate(".unconfirmorder","click",function(event){
	   
	 event.preventDefault();
	 var operation = $(this).attr('operation');
	 var sn = $(this).attr('sn');
	 var ttid = $(this).attr('ttid');
	 //alert("come"+ operation +" "+sn+" "+ttid );
	$.ajax({
		  url: "verifyorder.php",
		  method: "POST",
		  data: {operation:operation, sn:sn, ttid:ttid},
		  success: function(data){
			  if(data == 1)
			  {
				  $("#confirm_order_msg").html("<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert'ariel-label='close'>&times;</a><b> BUY ORDER CANCELLED!</b></div>");
				  $("#unconfirm"+sn).attr('disabled','disabled');
				  $("#confirm"+sn).removeAttr('disabled','disabled');
			  }
			 else{
				  $("#confirm_order_msg").html(data);
			  }
		  }	
})
 });
 //////////////////////////////////////////////////////////////////////////////////////////////////for confirming payment status
 $("body").delegate(".confirmpayment","click",function(event){
	   
	 event.preventDefault();
	 var operation = $(this).attr('operation');
	 var sn = $(this).attr('sn');
	 var ttid = $(this).attr('ttid');
	 //alert("come"+ operation +" "+sn+" "+ttid );
	$.ajax({
		  url: "verifypayment.php",
		  method: "POST",
		  data: {operation:operation, sn:sn, ttid:ttid},
		  success: function(data){
			  if(data == 1)
			  {
				  $("#confirm_order_msg").html("<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert'ariel-label='close'>&times;</a><b>Payment Confirmed!</b></div>");
				  $("#payment"+sn).attr('disabled','disabled');
				  $("#unpay"+sn).removeAttr('disabled','disabled');
			  }
			 else{
				  $("#confirm_order_msg").html(data);
			  }
		  }	
})
 });
 //////////////////////////////////////////////////////////////////////////////////////////////////for confirming unpayment status
 $("body").delegate(".unconfirmpayment","click",function(event){
	   
	 event.preventDefault();
	 var operation = $(this).attr('operation');
	 var sn = $(this).attr('sn');
	 var ttid = $(this).attr('ttid');
	 //alert("come"+ operation +" "+sn+" "+ttid );
	$.ajax({
		  url: "verifypayment.php",
		  method: "POST",
		  data: {operation:operation, sn:sn, ttid:ttid},
		  success: function(data){
			  if(data == 1)
			  {
				  $("#confirm_order_msg").html("<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert'ariel-label='close'>&times;</a><b>Payment Reverted!</b></div>");
				  $("#payment"+sn).removeAttr('disabled','disabled');
				  $("#unpay"+sn).attr('disabled','disabled');
			  }
			 else{
				  $("#confirm_order_msg").html(data);
			  }
		  }	
})
 });
 //////////////////////////////////////////////////////////////////////////////////////////////////
 
 
 var myVar =  window.setInterval(expiredid, 120000);
 //alert('come');
});

function expiredid(){
        //alert('come');
		$.ajax({
		  url: "1deleteexpired.php",
		  method: "POST",
		  data: {operation:1},
		  success: function(data){
			  if(data == 0)
			  {
				 $("#confirm_order_msg").html(data);
			  }
			 else{
				  $("#confirm_order_msg").html(data);
			  }
		  }	
})
}
</script>