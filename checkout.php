
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
   <?php
   if (!isset($_SESSION['customer_email'])) {
       include ('customer_login.php');
   } else {
       include ('pament.php');
   }


   ?>




</div> <!-- /.content_wrapper-->
<?php include ('includes/footer.php') ?>


