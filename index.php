
<?php
include('includes/header.php'); ?>


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
            <?php cart(); ?>

            <div id="products_box">
                <?php getPro(); ?>

                <?php get_pro_by_cat_id(); ?>

                <?php get_pro_by_brand_id(); ?>


            </div><!--/#products_box-->

        </div>
    </div> <!-- /.content_wrapper-->
<?php include ('includes/footer.php') ?>

</div> <!-- /.main_wrapper -->

<!-- End Main container here-->

</body>


</html>
