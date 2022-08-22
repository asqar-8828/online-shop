
<?php
include('includes/header.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title> Online shop </title>

    <link rel="stylesheet" href="styles/style.css" media="all">
</head>

<body>
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

    </div><!-- /#sidebar-->

    <div id="content_area">
        <div id="shopping_cart" style="align: right; padding: 15px">
            <?php
            if (isset($_SESSION['customer_email'])) {
                echo "<b>Your Email: </b>" . $_SESSION['customer_email'];
            } else {
                echo "";

            }
            ?>

            <b style="color: navy">Your Cart - </b> Total Items: <?php total_items(); ?> Total Price: <?php  ?>

        </div>


        <div id="products_box">

        </div><!--/#products_box-->

    </div>
</div> <!-- /.content_wrapper-->
<?php include ('includes/footer.php') ?>

</div> <!-- /.main_wrapper -->

<!-- End Main container here-->

</body>


</html>
