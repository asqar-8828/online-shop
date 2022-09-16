<?php include ('../includes/db.php');  ?>

<!DOCTYPE html>

<html>

<head>
<title>Web Developer</title>
    <link href="styles/desktop.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.6.1.js"></script>

</head>
<body>
<div class="container">
    <div class="header">
        <div class="navbar_header">
            <h3><a class="admin_name">Admin Area - <?php echo "Admin name"; ?> </a></h3>

        </div><!--/.navbar_header-->

        <div class="navbar_right_header">

            <ul class="dropdown_navbar_right">
                <li>
                    <a><i class="fa fa-user"></i>&nbsp; <i class="fa fa-caret-down"></i></a>
                    <ul class="subnavbar_right">
                        <li><a>User Account</a></li>
                        <li><a>Logout</a></li>

                    </ul>
                </li>
            </ul>
            <ul class="dropdown_navbar_right">
                <li>
                    <a><i class="fa fa-bell"></i>&nbsp; <i class="fa fa-caret-down"></i></a>
                    <ul class="subnavbar_right">
                        <li><a>Notificaion </a></li>


                    </ul>
                </li>
            </ul>


        </div><!--/.navbar_right_header-->

    </div> <!--/.header-->
    <div class="body_container">
        <div class="left_sidebar">
            <div class="left_sidebar_box">
                <ul class="left_sidebar_first_level">


                <li>
                    <a href="#"><i class="fa fa-th-large"></i>&nbsp;Products<i class="arrow fa fa-angle-left"></i></a>
                    <ul class="left_sidebar_second_level">
                        <li><a href="index.php?action=add_pro">Add Product</a></li>
                        <li><a href="index.php?action=view_pro">View Products</a></li>
                    </ul><!--/.left_sidebar_second_level-->
                </li>
                    <li>
                        <a href="#"><i class="fa fa-plus"></i>&nbsp;Categories<i class="arrow fa fa-angle-left"></i></a>
                        <ul class="left_sidebar_second_level">
                            <li><a href="index.php?action=add_cat">Add Product</a></li>
                            <li><a href="index.php?action=view_cat">View Products</a></li>
                        </ul><!--/.left_sidebar_second_level-->
                    </li>
                </ul><!--/.left_sidebar_first_level-->
            </div> <!--left_sidebar_box-->
        </div> <!--/.left_sidebar-->
        <div class="content">
            <div class="content_box">
                <?php
                if (isset($_GET['action'])) {
                    $action = $_GET['action'];
                } else {
                    $action = '';
                }
                switch ($action) {
                    case 'add_pro';
                    include 'includes/insert_product.php';
                    break;

                    case 'view_pro';
                        include 'includes/view_products.php';
                        break;


                    case 'edit_pro';
                        include 'includes/edit_product.php';
                        break;
                }

                ?>

            </div><!--/.content_box-->

        </div><!--/.content-->

    </div><!--/.body_container-->

</div> <!--/.container-->

</body>


</html>

<script>
    $(document).ready(function () {
        //Dropdown Menu right
        $(".dropdown_navbar_right").on('click',function (){
            $(this).find(".subnavbar_right").slideToggle('fast');
        });
        // Collapse left Sidebar
        $(".left_sidebar_first_level li").on('click',this,function (){
            $(this).find(".left_sidebar_second_level").slideToggle('fast');
        })
    });
</script>
