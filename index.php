<?php
include ("functions/functions.php");
include ("includes/db.php");

?>


<html>
<head>
    <title> Online shop </title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<!-- Main container starts here-->
<div class="main_wrapper">

    <div class="header_wrapper">

        <div class="header_logo">
            <a href="index.php">
            <img id="logo" src="images/hrmforce.png" alt="logo"/>
            </a>
        </div> <!-- /.header logo-->

        <div id="form">
            <form method="get" action="results.php" enctype="multipart/form-data"/>
            <input type="text" name="user_query" placeholder="Search a product" />
            <input type="submit" name="search" value="Search" />
        </div>

        <div class="cart">
            <ul>
                <li class="dropdown_header_cart">
                    <div id="notification_total_cart" class="shopping-cart">
                        <img src="images/cart_icon.png" id="cart_image" alt="cart_icon"/>
                    </div>

                </li>
            </ul>

        </div>

        <div class="register_login">
            <div class="login" > <a href="index.php?action=login">Login </a></div>
        <div class="register"> <a href="customer_register.php">Register</a> </div>
        </div>


    </div> <!-- /.header_wrapper-->
    <div class="menubar">
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="all_products.php">All Products</a></li>
            <li><a href="customer/my_account.php">My Account</a></li>
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>

    </div>

    <div class="content_wrapper">
        <div id="sidebar">
            <div id="sidebar_title">Categories</div>
            <ul id="cats">

                <?php
                getCats();
                ?>
            </ul>

            <div id="sidebar_title">Brands</div>
            <ul id="cats">
                <?php
                getBrands();

                ?>

            </ul>

        </div>
    </div> <!-- /.content_wrapper-->

    <div id="footer">
        <h2 style="text-align: center; padding-top: 30px">&copy; 2016 - <?php echo date('Y')?> by www.metrixcode.com</h2>
    </div>
</div> <!-- /.main_wrapper -->

<!-- End Main container here-->

</body>


</html>
