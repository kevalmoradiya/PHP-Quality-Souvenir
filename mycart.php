<?php
session_start();

$pids = $_SESSION["pids_cart"];
$quantities = $_SESSION["quantities_cart"];

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

require_once( 'class/Product.class.php' );
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

	
	
<section id="cart_items">
    <div class="container">

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
						
						
						$i = 0;
						$total = 0;
						$gst=0;
						$alltotal=0;
						while ($i < sizeof($pids)){
							$prod = new Product($pids[$i]);
							$total=$total+($prod->price*$quantities[$i]);
							
					?>
                        <tr>
                            <td class="cart_product">
                                <a href=""><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($prod->image).'" height="200" width="200" class="img-thumnail" />'; ?></a>
                            </td>
                            <td class="cart_description">
                                <h4><?php echo $prod->title; ?></h4>
                                <p><?php echo $prod->description; ?></p>
                            </td>
                            <td class="cart_price">
                                <p><?php echo $prod->price; ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <button  id="increase" increase="<?php echo $prod->id; ?>" style="width:30px;">+</button>
									
                                    <input type="number" id="<?php echo $prod->id; ?>" quantity=""  size="2" value="<?php echo $quantities[$i]; ?>" min="1" max="10" readonly />
                                    <button  id="decrease" decrease="<?php echo $prod->id; ?>" style="width:30px;">-</button>
                                </div>
                            </td>
                            <td class="cart_total">

                                <p class="cart_total_price"><?php echo $prod->price*$quantities[$i]; ?></p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" remove="<?php echo $prod->id; ?>" href="mycart.php"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                   <?php
						$i += 1;
						}
						$gst=($total*15)/100;
						$alltotal=$gst+$total;
						$_SESSION["total"] = $total;
						$_SESSION["gst"] = $gst;
						$_SESSION["alltotal"] = $alltotal;
						
						

				   ?>



                </tbody>
            </table>
            
        </div>
    </div>
</section> <!--/#cart_items-->
<?php if($total>0)
					{?>
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Total Cost</h3>
        </div>
        
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span ><?php echo $total;?></span></li>
                        <li>GST(15%) <span><?php echo $gst;?></span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span><?php echo $alltotal;?></span></li>
                    </ul>

					
                    <a href="checkoutbefore.php" class="btn btn-default check_out">Checkout</a>
               
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

 <?php 
					}?>
  
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



    
    <script type="text/javascript">
        $(document).ready(function() {
            history.pushState({ page: 1 }, "title 1", "#nbb");
            window.onhashchange = function (event) {
                window.location.hash = "nbb";
            };
        });
		
    </script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function() {
	$("#productNumDiv").load("showProductQuanties.php");
	
	$("[increase]").click(function(){
    	
    	var productID = Number($(this).attr("increase"));
    	var ID=$(this).attr("increase");
		
		var targetUrl = "addToCartI.php?pID="+productID+"&quantity="+1;
		$.ajax({url: targetUrl, success: function(result){
			
			$("#productNumDiv").empty();
			$("#productNumDiv").load("showProductQuanties.php");
			var q=parseInt($("#"+ID).val());
			$("#"+ID).val(q+1);
			location.reload(true);
		}});
		
		
    });
	$("[decrease]").click(function(){
    	
    	var productID = Number($(this).attr("decrease"));
    	var ID=$(this).attr("decrease");
		var targetUrl = "addToCartD.php?pID="+productID+"&quantity="+1;
		$.ajax({url: targetUrl, success: function(result){
			$("#productNumDiv").empty();
			$("#productNumDiv").load("showProductQuanties.php");
			var q=parseInt($("#"+ID).val());
			if(q>1)
			{
				$("#"+ID).val(q-1);
				location.reload(true);
			}
			
			
		}});
		
		
    });
	$("[remove]").click(function(){
    	
    	var productID = Number($(this).attr("remove"));
		
		var targetUrl = "removeFromCart.php?pID="+productID;
		$.ajax({url: targetUrl, success: function(result){
			$("#productNumDiv").empty();
			$("#productNumDiv").load("showProductQuanties.php");
			$("[quantity]").val(0);
			location.reload(true);
		}});
		
		
    });
    
		
    
});
	</script>

</body>
</html>
