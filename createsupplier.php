<?php

session_start ();


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
		<?php 
		
		//echo '<script type="text/javascript">alert("'.$mail.'")</script>';
		
		if($_SESSION["email"]=="admin123@gmail.com")
		{?>
		<li><a href="admin.php">Admin</a></li>
		<?php }?>
		<li class="dropdown">
			<a href="#">Account<i class="fa fa-angle-down"></i></a>
			<ul role="menu" class="sub-menu menu_css">
				<li><a href="accountdetail.php">Profile</a></li>
				<li><a href="orderdetail.php">Order</a></li>
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
                        <h2>Create Supplier</h2>
        <div>
                <a href="managesupplier.php">Back to List</a>
            </div>
           

           
            <hr />
            <form action="uploadsupplier.php" method="post">
              
                   <p>
						<label>Name: </label> <input type="text" name="suppliername">
				   </p>
                    <p>
						<label>Phone Number: </label> <input type="text" name="supplierpno">
				   </p>
				    <p>
						<label>Email: </label> <input type="text" name="supplieremail">
				   </p>
               
               <p>
                    <button type="submit" name="submit" class="btn btn-default">Create</button>
                </p>
            </form>
            </div>
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
                                    <li><a href="index.php?id=1">Maori Gift</a></li>
                                    <li><a href="index.php?id=2">Tshirt</a></li>
                                    <li><a href="index.php?id=3">Mug</a></li>

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


    
    <script type="text/javascript">
        $(document).ready(function () {
            history.pushState({ page: 1 }, "title 1", "#nbb");
            window.onhashchange = function (event) {
                window.location.hash = "nbb";
            };
        });
		
	
		




    </script>
	<script>
	$( document ).ready(function() {
	$("#productNumDiv").load("showProductQuanties.php");
    $("[proid]").click(function(){
    	
    	var productID = Number($(this).attr("proid"));
		
		var targetUrl = "addToCart.php?pID="+productID+"&quantity="+1;
		$.ajax({url: targetUrl, success: function(result){
			$("#productNumDiv").empty();
			$("#productNumDiv").load("showProductQuanties.php");
		}});
		
		
    });
		
    
});
	</script>





    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>