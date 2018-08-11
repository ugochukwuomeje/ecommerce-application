<?php
$loggedin = 0;
$whishlistquantity = 0;
if(isset($_SESSION['f_name'])&& isset($_SESSION['l_name'])&& isset($_SESSION['reflink']))
{
	$loggedin = 1;
	$firstname = $_SESSION['f_name'];
	$lastname = $_SESSION['l_name'];
	$reflink = $_SESSION['reflink'];
	$email = $_SESSION['email'];
}


if($loggedin == 0){
	
	
}

$cartquantity = 0;

if(isset($_POST['submit1'])){
	if(!empty($_COOKIE['item'])){
			 if(is_array($_COOKIE['item'])) // this is for checking if cookies is available or not
				{	
				
				foreach($_COOKIE['item'] as $name => $value)
					{
						$cartquantity = $cartquantity + 1;
					}
					$cartquantity = $cartquantity + 1;
				}

	}
}
else{
	
	if(!empty($_COOKIE['item'])){
		 if(is_array($_COOKIE['item'])) // this is for checking if cookies is available or not
			{	
			
			foreach($_COOKIE['item'] as $name => $value)
				{
					$cartquantity = $cartquantity + 1;
				}
			}

}
               
}


include('seo.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content='<?php echo"$pagedescription"; ?>'>
    <meta name="author" content='<?php echo"$author";  ?>'>
    <title><?php echo"$indexpagetitle" ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<script src="myscript/main.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script src="myscript/shopping_cart.js"></script>
	<style>
		.add-to-cart{
			background-color:black;
			color:white
		}
		.whishlist{
			background-color:black;
			color:white;
		}
	</style>
	
	
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo" >
							<ul class="nav nav-pills" >
							
								<li><a href="#" style='color:white'><i class="fa fa-phone"></i> +234 817 740 7112</a></li>
								<li><a href="#" style='color:white'><i class="fa fa-envelope"></i> info@one.com</a></li>
								<?php
									if($loggedin == 1)
									{
										echo"<li style='margin-top:10px; color:white'> welcome: $firstname $lastname</li>";
									}
								?>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#" style='color:white'><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" style='color:white'><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" style='color:white'><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" style='color:white'><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#" style='color:white'><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.jpg" alt="" /></a>
						</div>
						<div class="btn-group pull-right" style='margin-top:2em'>
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									NIGERIA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Nigeria</a></li>
									
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									NAIRA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Naira</a></li>
									
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right" style='margin-top:2em'>
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="wishlistview.php"><i class="fa fa-star"></i> Wishlist<span class="badge"><?php echo"$whishlistquantity";  ?></span></a></li>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i>Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i>Cart<span class="badge"><?php echo"$cartquantity";  ?></span></a></li>
								<?php
									if($loggedin == 1)
									{
										echo"<li><a href='logout.php'><i class='fa fa-lock'></i> Logout</a></li>";
										echo"<li><a href='compareview.php'><i class='fa fa-star'></i></i> Compare List</a></li>";
									}else{
										echo"<li><a href='login.php'><i class='fa fa-lock'></i> Login</a></li>";
										echo"<li><a href='login.php'><i class='fa fa-lock'></i> Register</a></li>";
										
									}
								?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
							<!---	<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>--->
                                    <ul role="menu" class="sub-menu">
                                     <!---   <li><a href="index.php">Products</a></li>-->										
										<li><a href="checkout.php">Checkout</a></li> 
										<li><a href="cart.php">Cart</a></li> 
										<?php
									if($loggedin == 1)
									{
										echo"<li><a href='logout.php'><i class='fa fa-lock'></i> Logout</a></li>";
									}else{
										echo"<li><a href='login.php'><i class='fa fa-lock'></i> Login</a></li>";
										echo"<li><a href='login.php'><i class='fa fa-lock'></i> Register</a></li>";
									}
								?>
                                    </ul>
                                </li> 
							<!---	<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> --->
							<!--	<li class="dropdown"><a href="#">Services<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">finnacle empowerment Program</a></li>
										<li><a href="blog-single.html">finnacle exchange</a></li>
                                    </ul>
                                </li> ---->
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
					<!-------search put this------------------------------------>
						<div class="search_box pull-right">
							<div class="row">
							<form action='index.php' method='POST'>
							  <div class="col-lg-12">
							  
							  <input type='hidden' name='searchproduct' value='1'>
								<div class="input-group">
								  <span class="input-group-btn">
									<button class="btn btn-default" type="submit">Go!</button>
								  </span>
								  <input type="text" class="form-control" name='search' placeholder="Search for...">
								</div><!-- /input-group -->
							  </div><!-- /.col-lg-6 -->
							  </form>
							</div>
						</div>
					<!-------search enad------------------------------------>	
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
		
</header>