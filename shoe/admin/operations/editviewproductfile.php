<?php
					
					
					echo"<table class='table table-striped table-condensed' width='100'>
						<tr style='background-color:#104E8B; color:white; '><th>image</th><th>name</th><th>product category</th><th>product brand</th><th>price</th><th>Operation</th></tr>
					";
						$sql_product = "SELECT * FROM product";
						$sql_query_product = $con->query($sql_product);
						
						if($sql_query_product->num_rows > 0)
						{
							while($row_query_confirm_order_product =  mysqli_fetch_array($sql_query_product)){
								
								
								$image = $row_query_confirm_order_product['product_image'];
								$name = $row_query_confirm_order_product['product_name'];
								$product_cat = $row_query_confirm_order_product['product_cat'];
								$product_brand = $row_query_confirm_order_product['product_brand'];
								$price = $row_query_confirm_order_product['product_price'];
								$id = $row_query_confirm_order_product['id'];
								
					$product_cat_name = mysqli_fetch_array($con->query("SELECT * FROM categories WHERE cat_id = '$product_cat'"));
					$product_cat_name = $product_cat_name['cat_title'];

					$product_brand_name = mysqli_fetch_array($con->query("SELECT * FROM brands WHERE brand_id = '$product_brand' AND category = '$product_cat'"));
					$product_brand_name = $product_brand_name['brand_title'];
								
							echo"<tr><td><img src='$image' style='width:40%; height:40%' class='img-responsive'></td><td>$name</td><td>$product_cat_name</td><td>$product_brand_name</td><td>$price</td><td><a class='btn btn-success btn-small deleteproduct' role='button' deleteproductid = '$id'><span class='glyphicon glyphicon-remove'></span>edit product</a></td></tr>";						
						}
							
							
							
						}
						else{
							
							echo"<tr><td  colspan='7'><center>NO PRODUCT IN THE </center></td></tr>";
						}
					echo"</table>";
					
					?>