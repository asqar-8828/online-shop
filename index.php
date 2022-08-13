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


    </div> <!-- /.header_wrapper-->

    <div class="content_wrapper">
        This is content

    </div> <!-- /.content_wrapper-->

    <div id="footer">
        This is footer
    </div>
</div> <!-- /.main_wrapper -->

<!-- End Main container here-->

</body>


</html>
