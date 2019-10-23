<?php

session_start ();

require_once 'class/User.class.php';
$user = new User();

$products = $user->viewProducts();



?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quality Souvenir</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.scrollUp.min.js"></script>
        <script type="text/javascript" src="js/price-range.js"></script>
        <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
  


</head>
<body>
   
        <script type="text/javascript">
            $(document).ready(function () {
                history.pushState({ page: 1 }, "title 1", "#nbb");
                window.onhashchange = function (event) {
                    window.location.hash = "nbb";
                };
            });


        </script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.php"><img src="images/home/logo.png" alt="" /></a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
    <!--session_start ();-->                    
<?php


if (isset ( $_SESSION["userID"] )) {
	
	?>
	<ul class="nav navbar-nav collapse navbar-collapse">
                          
        <li><a href="mycart.php"><i class="fa fa-shopping-cart"></i><font color="red"><div class="cartvalueinline" id="productNumDiv"></div></font>Cart</a></li>
		<li class="dropdown">
			<a href="#">Account<i class="fa fa-angle-down"></i></a>
			<ul role="menu" class="sub-menu menu_css">
				<li><a href="index.php">Profile</a></li>
				<li><a href="index.php">Order</a></li>
			</ul>
		</li>
		<li><a href="logout.php"><i class="fa fa-lock"></i>Logout</a></li>
	</ul>
	<?php
}
else{
	?>
	<ul class="nav navbar-nav collapse navbar-collapse">
                          
        <li><a href="mycart.php"><i class="fa fa-shopping-cart"></i><font color="red"><div class="cartvalueinline" id="productNumDiv"></div></font>Cart</a></li>
		<li><a href="login.php"><i class="fa fa-lock"></i> Login or Register</a></li>
		
	</ul>
	
<?php	
}
?>
                                
                                    
                              
                               
</div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">

                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php">Home</a></li>

                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
               
             
              
                

            </div>
        </div>
    </div><!--/header-bottom-->

   
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="signup-form">
                        <h2>New User Registration!</h2>

				    <form action="registrationentry.php" method="post">
						<p>
							<label>First Name: </label> <input type="text" name="firstname">
						</p>
						<p>
							<label>Last Name: </label> <input type="text" name="lastname">
						</p>
						<p>
							<label>Email: </label> <input type="email" name="email">
						</p>
						<p>
							<label>Phone Number: </label> <input type="text" name="phonenumber">
						</p>
						<p>
							<label>Address: </label> <input type="text" name="address">
						</p>
						<p>
							<label>Password: </label> <input type="password" name="password">
						</p>
						
						<p>
							<button type="submit" name="Registration" class="btn btn-default">Registration</button>
						</p>
					</form>
                        
                        
                    </div>

                </div>
                <div class="col-sm-1">
                    <a href="login.php" name="Login" class="btn btn-default">Login</a>

                </div>
            </div>
        </div>
       

        

    <div>
        
        <hr />
        <footer id="footer">
            <!--Footer-->


            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Service</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="contact.php">Contact Us</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Quick Shop</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="index.php">T-Shirt</a></li>
                                    <li><a href="index.php">Mug</a></li>
                                    <li><a href="index.php">Maori Gift</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Policies</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="privacy.php">Privacy Policy</a></li>

                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2019 Quality Souvenirs. All rights reserved.</p>
                        <p class="pull-right">qualitysouvenirs@email.com</p>
                    </div>
                </div>
            </div>


        </footer><!--/Footer-->
    </div>


    <script src="~/Scripts/jquery-1.10.2.min.js"></script>
    <script src="~/Scripts/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            history.pushState({ page: 1 }, "title 1", "#nbb");
            window.onhashchange = function (event) {
                window.location.hash = "nbb";
            };
        });


    </script>


 <script>
	$(document).ready(function() {
	$("#productNumDiv").load("showProductQuanties.php");
	
});
	</script>


    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>