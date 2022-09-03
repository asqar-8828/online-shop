
<?php
include('includes/header.php'); ?>


<body>

<div class="content_wrapper">

<div class="user_container">
    <div class="user_content">
        <p>User content</p>

    </div>
    <div class="user_sidebar">
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


