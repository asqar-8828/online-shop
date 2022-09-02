
<?php
include('includes/header.php'); ?>


<body>

<div class="content_wrapper">
   <?php
   if (!isset($_SESSION['user_id'])) {
       include('login.php');
   } else {
       include ('payment.php');
   }

   ?>




</div> <!-- /.content_wrapper-->
<?php include ('includes/footer.php') ?>


