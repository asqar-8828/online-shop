<?php

session_start();

include ("functions/functions.php");

include ("includes/db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title> Online shop </title>

    <link rel="stylesheet" href="styles/style.css" media="all"/>
    <script src="js/jquery-3.6.1.js"></script>
</head>

<!-- Main container starts here-->
<div class="main_wrapper">

    <div class="header_wrapper">

        <div class="header_logo">

            <a href="index.php">
                <img id="logo" src="images/hrmforce.png" alt="logo"/>
            </a>
        </div> <!-- /.header logo-->

        <div id="form">
            <form method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search a product" />
            <input type="submit" name="search" value="Search" />
            </form>
        </div>

        <div class="cart">
            <ul>
                <li class="dropdown_header_cart">
                    <div id="notification_total_cart" class="shopping-cart">
                        <img src="images/cart_icon.png" id="cart_image" alt="cart_icon"/>
                        <div class="noti_cart_number">
                            <?php total_items(); ?>
                        </div><!--noti_cart_number-->
                    </div>

                </li>
            </ul>

        </div>

        <div class="register_login">
            <div class="login" > <a href="index.php?action=login">Login </a></div>
            &nbsp;&nbsp;
            <div class="register"> <a href="register.php">Register</a> </div>
        </div>


    </div> <!-- /.header_wrapper-->
