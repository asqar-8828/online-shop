
<?php
include('includes/header.php'); ?>


<body>

<div class="content_wrapper">

<div class="user_container">
    <div class="user_content">

        <?php
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

        } else {
            $action = '';

        }
        switch ($action) {
            case "edit_account";
            echo $action;
            break;

            case "change_password";
                echo $action;
                break;

            case "delete_account";
                echo $action;
                break;

            case "logout";
                echo $action;
                break;

            default;
            echo "Do something";
            break;
        }
        ?>

    </div>
    <div class="user_sidebar">

        <?php
        $run_image = mysqli_query($con, "select * from users where id ='$_SESSION[user_id]' ");
        $row_image = mysqli_fetch_array($run_image);
        if ($row_image['image'] != '') {

        ?>
            <div class="user_image" align="center">
                <img src="upload-files/<?php echo $row_image['image'];  ?>"/>
            </div>
        <?php } else { ?>
            <div class="user_image" align="center">
                <img src="images/profile-icon.png"/>
            </div>
        <?php } ?>
        <ul>
            <li><a href="my_account.php?action=my_order">My Order</a></li>
            <li><a href="my_account.php?action=edit_account">Edit Account</a></li>
            <li><a href="my_account.php?action=change_password">Change Password</a></li>
            <li><a href="my_account.php?action=delete_account">Delete Account</a></li>
            <li><a href="my_account.php?action=logout">Logout</a></li>
        </ul>

    </div>

</div>

</div> <!-- /.content_wrapper-->
<?php include ('includes/footer.php') ?>


