
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
        <div class="shopping_cart_container">


        <div id="shopping_cart" style="align: right; padding: 15px">
            <?php
            if (isset($_SESSION['customer_email'])) {
                echo "<b>Your Email: </b>" . $_SESSION['customer_email'];
            } else {
                echo "";

            }
            ?>

            <b style="color: navy">Your Cart - </b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?>

        </div> <!--/.shopping_cart-->
            <form action="" method="post" enctype="multipart/form-data">

            <table style="text-align: center; width: 100%" >
                <tr style="text-align: center">
                    <th>Remove</th>
                    <th>Product</th>
                    <th>Quality</th>
                    <th>Price</th>
                </tr>

                <?php
                global $con;
                $total = 0;
                $ip = get_ip();
                $run_cart = mysqli_query($con, "select * from cart where ip_address = '$ip' ");
                while ($fetch_cart = mysqli_fetch_array($run_cart)) {
                    $product_id = $fetch_cart['product_id'];
                    $result_product = mysqli_query($con, "select * from products where product_id = '$product_id'");
                    while ($fetch_product = mysqli_fetch_array($result_product)) {
                        $product_price = array($fetch_product['product_price']);
                        $product_title = $fetch_product['product_title'];
                        $product_image = $fetch_product['product_image'];
                        $sing_price = $fetch_product['product_price'];
                        $values = array_sum($product_price);
                        //Getting quality of the product
                        $run_qty = mysqli_query($con, "select * from cart where product_id = '$product_id'");
                        $row_qty = mysqli_fetch_array($run_qty);
                        $qty = $row_qty['quality'];
                        $values_qty = $values * $qty;
                        $total += $values_qty;



                ?>

                <tr style="text-align: center">
                    <td><input type="checkbox" name="remove[]" value=""/></td>
                    <td><?php echo $product_title;?>
                    <br/>
                    <img src="admin_area/product_images/<?php echo $product_image; ?>"  />
                    </td>
                    <td><input type="text" size="4" name="qty" value="<?php echo $qty;?>"/></td>
                    <td><?php echo "$" . $sing_price;?></td>
                </tr>

                <?php } } // End While ?>

                <tr>
                    <td colspan="4" align="right"><b>Sub Total:</b></td>
                    <td><?php echo total_price();?></td>
                </tr>



                <tr style="text-align: center">
                    <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
                    <td><input type="submit" name="continue" value="Continue Shopping" /> </td>
                    <td><button><a href="checkout.php" >Checkout</a></button></td>
                </tr>
            </table>
            </form>
        </div> <!--/.shopping_cart_container-->


        <div id="products_box">

        </div><!--/#products_box-->

    </div>
</div> <!-- /.content_wrapper-->
<?php include ('includes/footer.php') ?>

</div> <!-- /.main_wrapper -->

<!-- End Main container here-->

</body>


</html>
