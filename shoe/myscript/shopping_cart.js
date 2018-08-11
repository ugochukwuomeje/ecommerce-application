$(document).ready(function(){

 $("#index_loader").hide();
 $("#login_loader").hide();
 $("#signup_loader").hide();
   $("#editcategory_loader").hide();
  $("#addcategory_loader").hide();
   $("#addsubcategory_loader").hide();
   $("#imgcategory").hide();
   $("#imgsubcategory").hide();
   $("#addbrand_loader").hide();
    $("#disablebrand_loader").hide();
	$("#enablebrand_loader").hide();
 $("#enablecategory_loader").hide();
  $("#disablecategory_loader").hide();
   $("#updatesubcategory_loader").hide();
   $("#imgdisablesubcategory").hide();
    $("#removewishlist_loader").hide();
	$("#removeproduct_loader").hide();
	$("#editproduct_loader").hide();
	$("#scrollable_loader").hide();
	$("#class_loader").hide();
	$("#uploadproduct_loader").hide();
  ////////////////////////////////////////////////////
   
   ///////////////////////////////////////////////////this section is for changing class
 ////////////////////////////////////////////////////
 $(".class").change(function()
	{
		$("#imgcategory").show();

		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".category").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "getcategory.php",
			data: dataString,
			cache: false,
			success: function(retdata)
			{
				$("#imgcategory").hide();
				$(".category").html(retdata);
				
			} 
		});
		
		
	});	
	
	//////////////////////////////////////////////////// this section is for changing class for enabling category
 $(".classfordisablecategory").change(function()
	{
		
		$("#imgcategory").show();

		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".category").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "getcategoryfordisable.php",
			data: dataString,
			cache: false,
			success: function(retdata)
			{
				$("#imgcategory").hide();
				$(".category").html(retdata);
				
			} 
		});
		
		
	});	
   
   //////////////////////////////////this section is for disabling class
 $("#submit15").click(function(event){
	 $("#class_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#class_loader").hide();
			  if(data == 1)
			  {
				 alert("class succesfully disabled");
				 window.location.href = "disableclass.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 
 //////////////////////////////////this section is for enabling class
 $("#submit16").click(function(event){
	 $("#class_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#class_loader").hide();
			  if(data == 1)
			  {
				 alert("class succesfully enabled");
				 window.location.href = "enableclass.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
   
   
  ////////////////////////////////////////////////////
 $(".category").change(function()
	{
		$("#imgcategory").show();

		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".brandlist").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "getbrand.php",
			data: dataString,
			cache: false,
			success: function(retdata)
			{
				$("#imgcategory").hide();
				$("#brandlist").html(retdata);
				
			} 
		});
		
		
	});
///////////////////////////////////////////////////this section is for changing category
 ////////////////////////////////////////////////////
 $(".category2").change(function()
	{
		$("#imgcategory").show();

		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".brandlist").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "getbrand.php",
			data: dataString,
			cache: false,
			success: function(retdata)
			{
				$("#imgcategory").hide();
				$("#brandlist").html(retdata);
				
			} 
		});
		
		
	});	
 
////////////////////////////////////////////////////this category is for  		
  $("#submit10").click(function(event){
	 $("#enablebrand_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#enablebrand_loader").hide();
			  if(data == 1)
			  {
				 alert("brand succesfully edit");
				 window.location.href = "editbrand.php";
			  }
			  else{
				  alert(data);
			  }
			  			
		}
 })
 });		
 ///////////////////////////////////////////////////////////////////this section updates subcategory		

  $("#submit12").click(function(event){
	 $("#updatesubcategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#updatesubcategory_loader").hide();
			  if(data == 1)
			  {
				 alert("subcategory succesfully updated");
				 window.location.href = "updatesubcategory.php";
			  }
			  else{
				  alert(data);
			  }
			  			
		}
 })
 });		
		
///////////////////////////////////////////////////////////////////this section updates subcategory		

  $("#submit11").click(function(event){
	 $("#imgdisablesubcategory").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#imgdisablesubcategory").hide();
			  if(data == 1)
			  {
				 alert("subcategory succesfully disabled");
				 window.location.href = "disablesubcategory.php";
			  }
			  else{
				  alert(data);
			  }
			  			
		}
 })
 });		
				
		
		
///////////////////////////////////////////////////////////////////this section enables brand		

  $("#submit9").click(function(event){
	 $("#enablebrand_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#enablebrand_loader").hide();
			  if(data == 1)
			  {
				 alert("brand succesfully enabled");
				 window.location.href = "enablebrand.php";
			  }
			  else{
				  alert(data);
			  }
			  			
		}
 })
 });		
		
////////////////////////////////////////////////////this section disables brand		

  $("#submit8").click(function(event){
	 $("#disablebrand_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#disablebrand_loader").hide();
			  if(data == 1)
			  {
				 alert("brand succesfully disabled");
				 window.location.href = "disablebrand.php";
			  }
			  else{
				  alert(data);
			  }
			  			
		}
 })
 });
	
	
 ////////////////////////////////////////////////////this section is for adding brand
  $("#submit7").click(function(event){
	 $("#addbrand_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#addbrand_loader").hide();
			  if(data == 1)
			  {
				 alert("brand succesfully added");
				 window.location.href = "addbrand.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 });
                 
/////////////////////this is for registration
 $("#signup_button").click(function(event){
	 $("#signup_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "php/registerfile.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#signup_loader").hide();
			  if(data == 1)
			  {
				 alert("succesfully registered please login with your account details");
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 //////////////////////////////this section is for adding category
 $("#submit2").click(function(event){
	 $("#addcategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#addcategory_loader").hide();
			  if(data == 1)
			  {
				 alert("category succesfully added");
				 window.location.href = "addcategory.php";
				
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 
 //////////////////////////////this section is for adding class
 $("#submit13").click(function(event){
	 $("#class_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#class_loader").hide();
			  if(data == 1)
			  {
				 alert("class succesfully added");
				 window.location.href = "addclass.php";
				
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 
 //////////////////////////////this section is for editing class
 $("#submit14").click(function(event){
	 $("#class_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#class_loader").hide();
			  if(data == 1)
			  {
				 alert("class successfully edit");
				 window.location.href = "editclass.php";
				
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 
 ///////////////////////////////////////
  //////////////////////////////this section is for editting category
 $("#submit3").click(function(event){
	 $("#editcategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#editcategory_loader").hide();
			  if(data == 1)
			  {
				 alert("category succesfully editted");
				 window.location.href = "editcategory.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
//////////////////////////////////this section is for enabling category
 $("#submit4").click(function(event){
	 $("#enablecategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#enablecategory_loader").hide();
			  if(data == 1)
			  {
				 alert("category succesfully enabled");
				 window.location.href = "enablecategory.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 //////////////////////////////////this section is for enabling category
 $("#submit5").click(function(event){
	 $("#disablecategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#disablecategory_loader").hide();
			  if(data == 1)
			  {
				 alert("category succesfully disabled");
				 window.location.href = "disablecategory.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 ///////////////////////////////////////
 //////////////////////////////////this section is for adding subcategory
 $("#submit6").click(function(event){
	
	 $("#addsubcategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#addsubcategory_loader").hide();
			  if(data == 1)
			  {
				 alert("subcategory succesfully added");
				 window.location.href = "addsubcategory.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 ///////////////////////////////////////
 //////////////////////////this is for login
 $("#login_button").click(function(event){
	  $("#login_loader").show();
	 event.preventDefault();
	 $.ajax({
		  url: "php/loginfile.php",
		  method: "POST",
		  data: $("#form2").serialize(),
		  success: function(data){
			  $("#login_loader").hide();
			  if(data == "1")
			  {
				  window.location.href = "index.php";
			  }
			  else{
				  alert(data);
			  }
			 
			
		}
 })
 })
///////////////////////////this section gets the clicked category
$("body").delegate(".category","click",function(event){
	 
	 event.preventDefault();
	
	 var cid = $(this).attr('cid');
$.ajax({
		  url: "php/action.php",
		  method: "POST",
		  data: {get_selected_category:1, cat_id:cid},
		  success: function(data){
			  $("#get_product").html(data);
		  }	
})
 })
 
//////////////////////////////this removes the product from wishlist
$(".wishlistremove").click(function(event){
	
	
	
	  $("#removewishlist_loader").show();
	  
	   var productid = $(this).attr('whishlistvalue');
	  
	 event.preventDefault();
	 $.ajax({
		  url: "removewishlist.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){
			  $("#removewishlist_loader").hide();
			  alert(data);
			
		}
 })
 })
 //////////////////////////////this removes the product from product table
$(".deleteproduct").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	 event.preventDefault();
	 $.ajax({
		  url: "deleteproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "deleteproduct.php";
			
		}
 })
 })
 //////////////////////////////this section removes product from new arrival
$(".deleteproductnewarrival").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	  
	 event.preventDefault();
	 $.ajax({
		  url: "deletenewarrivalproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "removenewarrival.php";
			
		}
 })
 })
 //////////////////////////////this section enables product in new arrival
$(".addproductnewarrival").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	 event.preventDefault();
	 $.ajax({
		  url: "addnewarrivalproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "addnewarrivals.php";
			
		}
 })
 })
  //////////////////////////////this section removes product from recommended product
$(".removerecommendedproduct").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	  
	 event.preventDefault();
	 $.ajax({
		  url: "removerecommendedproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "removerecommendedproduct.php";
			
		}
 })
 })
 //////////////////////////////this section enables product in new arrival
$(".addrecommendedproduct").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	 event.preventDefault();
	 $.ajax({
		  url: "addrecommendedproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "addrecommendedproduct.php";
			
		}
 })
 })
 //////////////////////////////this section is for decreamenting the quantity
 $("body").delegate(".cart_quantity_down","click",function(event){
	 
	 event.preventDefault();
	 var productid = $(this).attr('id');
	 
$.ajax({
		  url: "decreament_cart.php",
		  method: "POST",
		  data: {pid:productid},
		  success: function(data){
			 // alert(data);
			 var properties = data.split(",");
			 var  productprice = properties[5];
			 var total_price = properties[7];
			 // alert(quantity);
			  var quantity = properties[4];
			  
			 document.getElementById("qty"+productid).value = quantity;
			 document.getElementById("total_price").innerHTML = total_price;
			 document.getElementById("cart_price"+productid).innerHTML = productprice;
			
		  }	
})
 })
 
 ////////////////////////////////////this is section is for increamenting the quantity
 $("body").delegate(".cart_quantity_up","click",function(event){
	 
	 event.preventDefault();
	 var productid = $(this).attr('id');
	 
$.ajax({
		  url: "increament_cart.php",
		  method: "POST",
		  data: {pid:productid},
		  success: function(data){
			  
			 var properties = data.split("_");
			 var productprice = properties[5];
			 var total_price = properties[7];
			 
			 var quantity  = properties[4];
			
			 document.getElementById("qty"+productid).value = quantity;
			 document.getElementById("total_price").innerHTML = total_price;
			 document.getElementById("cart_price"+productid).innerHTML = productprice;
			
		  }	
})
 })
 //////////////////////////this section is for edit product by category for admin section
 $(".viewproductbycat").click(function(event){
	
	  $("#editproduct_loader").show();
	  var categoryvalue = $(".category2").val();
	  
	   var operationid = $(this).attr('id');
	   
	   alert(operationid + categoryvalue);
	 event.preventDefault();
	 $.ajax({
		  url: "vieweditproduct.php",
		  method: "POST",
		  data: {opid:operationid },
		  method: "POST",
		  success: function(data){

			   $("#editproduct_loader").hide();			  
			   alert(data);
			   window.location.href = "editproduct.php";
			
		}
 })
 })
 //////////////////////////////////// this section is for uploading scrollable images
 $("#uploadimage").on('submit',(function(e) {
			e.preventDefault();
			$("#scrollable_loader").show();
			$.ajax({
			url: "addscrollableproductfile.php", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
			 $("#scrollable_loader").hide();
			if(data == 1)
			  {
				 alert("product added to the database");
				 window.location.href = "addscrollableproduct.php";
			  }
			  else{
				  alert(data);
			  }
			}
			});
			}));
 
	
 //////////////////////////end of section for scrollable image
 
 //////////////////////////////////// this section is for uploading product to database
 $("#uploadproduct").on('submit',(function(e) {
			e.preventDefault();
			$("#uploadproduct_loader").show();
			$.ajax({
			url: "addproduct_file.php", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
			 $("#uploadproduct_loader").hide();
			if(data == 1)
			  {
				 alert("product added to the database");
				 window.location.href = "add_product.php";
			  }
			  else{
				  alert(data);
			  }
			}
			});
			}));
 
	
 //////////////////////////end of section for scrollable image
 
 //////////////////////////this section is for edit product by brand for admin section
 $(".viewproductbybrand").click(function(event){
	 
	 var brandvalue = $(".brandvalue").val();
	
	  $("#editproduct_loader").show();
	  
	   var operationid = $(this).attr('id');
	   alert(operationid + brandvalue);
	 event.preventDefault();
	 $.ajax({
		  url: "vieweditproduct.php",
		  method: "POST",
		  data: {pid:productid },
		  method: "POST",
		  success: function(data){

			$("#editproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "editproduct.php";
			
		}
 })
 })
 ///////////////////to preview product before uploading

			$("#pick_product").change(function() {
				
				
				//alert("come");
			$("#message").empty(); // To remove the previous error message
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
			{
			$('#preview_product').attr('src','noimage.png');
			$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
			return false;
			}
			else
			{
			var reader = new FileReader();
			reader.onload = imageIsLoaded;
			reader.readAsDataURL(this.files[0]);
			}
			});
			
			function imageIsLoaded(e) {
			
			$('#image_preview').css("display", "block");
			$('#preview_product').attr('src', e.target.result);
			$('#preview_product').attr('width', '150px');
			$('#preview_product').attr('height', '130px');
			};
 
})