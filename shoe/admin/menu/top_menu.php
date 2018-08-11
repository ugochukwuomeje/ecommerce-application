<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
	<div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" style='color:white;'>rexglobalfashion.com</a>
        </div>
	<div id="navbar" class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav" style="padding-top:1px; float: left">
                        <li><a style="font-size:0.8em; color:white" ><span class="glyphicon glyphicon-time" style='color:white'></span> Working Hours : (Sun-Mon 9hrs)</a></li>
                          <li style='color:white'><a href="#" style="font-size:0.8em; color:white;" ><span class="glyphicon glyphicon-envelope" style='color:white'></span>rexglobalfashion.com</a></li>               
                    </ul>                
                    <ul class="nav navbar-nav" style="padding-top:10px; float: right">
					<li style="margin-top:8px"><span style="color:white; ">welcome: <?php if(isset($_SESSION["f_name"])){echo$_SESSION["f_name"]; echo" "; echo$_SESSION["l_name"];} ?></span></li>
                    <li><a class="btn btn-social-icon btn-google-plus" style="font-size:0.8em" href="http://google.com/+"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="btn btn-social-icon btn-facebook" style="font-size:0.8em" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a></li>                  
                    <li><a class="btn btn-social-icon btn-twitter" style="font-size:0.8em" href="http://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                </ul>
        </div>
                
     </div>
				
        </nav>   
