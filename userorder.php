<!DOCTYPE html>
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
                        <a href="@Url.Action("SouvenirShopping", "Home")"><img src="images/home/logo.png" alt="" /></a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                          
                                <li><a asp-area="" asp-controller="Cart" asp-action="Index"><i class="fa fa-shopping-cart"></i> Cart</a></li>

                                <li><a asp-area="" asp-controller="Cart" asp-action="Index"><i class="fa fa-shopping-cart"></i><font color="red">@Context.Session.GetInt32("CartCount") </font>Cart</a></li>

                                <li><a asp-area="" asp-controller="Login" asp-action="Login"><i class="fa fa-lock"></i> Login or Register</a></li>


                                    <li><a asp-area="" asp-controller="Admin" asp-action="Admin"><i class="fa fa-lock"></i>Logout</a></li>
                                
                                        <li class="dropdown">
                                            <a href="#">Account<i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu menu_css">
                                                <li><a asp-area="" asp-controller="Users" asp-action="Details">Profile</a></li>
                                                <li><a asp-area="" asp-controller="Users" asp-action="UserOrders">Order</a></li>
                                            </ul>
                                        </li>
                                        <li><a asp-area="" asp-controller="Login" asp-action="Logout"><i class="fa fa-lock"></i>Logout</a></li>
                                    
                              
                                </ul>
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
                            <li><a asp-area="" asp-controller="Home" asp-action="SouvenirShopping">Home</a></li>

                            <li><a asp-area="" asp-controller="Home" asp-action="Contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
          
              
                

            </div>
        </div>
    </div><!--/header-bottom-->

	<div class="container">
    <div class="row">
        <div class="col-sm-9 padding-right">
            <h2>Order</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th>
                          Order ID
                        </th>
                        <th>
                          Order Date
                        </th>
                        <th>
                          Order Status
                        </th>
                        <th>
                          Order Shipping Date
                        </th>
                        <th>
                          Order Cost
                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach (var item in Model.Userorders)
                    {
                        <tr>
                            <td>
                                @Html.DisplayFor(modelItem => item.OrderID)
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.OrdDate)
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.OrdStatus)

                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.OrdSDate)
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.OrdCost)
                            </td>
                        </tr>

                        <table class="table" style="color:chocolate; margin-left:100px;">
                            <thead>
                                <tr>
                                    <th>
                                        Order Item ID
                                    </th>
                                    <th>
                                        Souvenir ID
                                    </th>
                                    <th>
                                        Souvenir Quantity
                                    </th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (var items in Model.Userorderitems)
                                {
                                    <tr>
                                        <td>
                                            @Html.DisplayFor(modelItem => items.OrderItemID)
                                        </td>
                                        <td>
                                            @Html.DisplayFor(modelItem => items.SouvenirID)
                                        </td>
                                        <td>
                                            @Html.DisplayFor(modelItem => items.OrdItemQ)

                                        </td>
                                       
                                    </tr>



                                }
                            </tbody>
                        </table>

                    }
                </tbody>
            </table>
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
                                    <li><a asp-area="" asp-controller="Home" asp-action="Contact">Contact Us</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Quick Shop</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="@Url.Action("SouvenirShopping", "Home", new { item=2 })">T-Shirt</a></li>
                                    <li><a href="@Url.Action("SouvenirShopping", "Home", new { item=3 })">Mug</a></li>
                                    <li><a href="@Url.Action("SouvenirShopping", "Home", new { item=1 })">Maori Gift</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Policies</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a asp-area="" asp-controller="Home" asp-action="Privacy">Privecy Policy</a></li>

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





    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>
