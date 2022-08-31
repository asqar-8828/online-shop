
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
        <li><a href="logout.php">Logout</a></li>
    </ul>

</div>

<div class="content_wrapper">
<script>
$(document).ready(function () {
    $("#password_confirm2").on('keyup',function () {
        var password_confirm1 = $("#password_confirm1").val();
        var password_confirm2 = $("#password_confirm2").val();

        if (password_confirm1 == password_confirm2) {
            $("#status_for_confirm_password").html('<strong style="color: green">Password match</strong>');
        } else {
            $("#status_for_confirm_password").html('<strong style="color: red">Password do not match</strong>');
        }
    })
})

</script>



    <div class="register_box">
        <form method="post" action="" enctype="multipart/form-data">
            <table align="left" width="70%">
                <tr align="left">
                    <td colspan="4">
                        <h2>Register.</h2><br>
                        <span>
                        Already have account? <a href="index.php?action=login">Login Now</a> <br> <br>
                    </span>
                    </td>
                </tr>
                <tr>
                    <td width="15%"><b>Name: </b></td>
                    <td colspan="3"><input type="text" name="name" placeholder="Name" ></td>
                </tr>
                <tr>
                    <td width="15%"><b>Email: </b></td>
                    <td colspan="3"><input type="text" name="email" placeholder="Email" ></td>
                </tr>
                <tr>
                    <td width="15%"><b>Password: </b></td>
                    <td colspan="3"><input type="password" id="password_confirm1" name="password" placeholder="Password" ></td>
                </tr>
                <tr>
                    <td width="15%"><b>Confirm Password: </b></td>
                    <td colspan="3"><input type="password" id="password_confirm2" name="confirm_password" placeholder="Confirm Password" >
                        <p id="status_for_confirm_password"></p> <!--Showing validate password-->
                    </td>

                </tr>

                <tr>
                    <td width="15%"><b>Image: </b></td>
                    <td colspan="3"><input type="file" name="image"  ></td>
                </tr>

                <tr>
                    <td width="15%"><b>Country: </b></td>
                    <td colspan="3">
                        <?php include ('includes/country_list.php');  ?>

                    </td>
                </tr>
                <tr>
                    <td width="15%"><b>City: </b></td>
                    <td colspan="3"><input type="text" name="city" placeholder="City" ></td>
                </tr>
                <tr>
                    <td width="15%"><b>Contact: </b></td>
                    <td colspan="3"><input type="text" name="contact" placeholder="Contact" ></td>
                </tr>
                <tr>
                    <td width="15%"><b>Address: </b></td>
                    <td colspan="3"><input type="text" name="address" placeholder="Address" ></td>
                </tr>


                <tr align="left">
                    <td></td>
                    <td colspan="4">
                        <input type="submit" name="register" value="Register"/>
                    </td>

                </tr>



            </table>

        </form>

    </div>


    <?php
    if(isset($_POST['register'])) {
        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name'])) {
            global $con;
            $ip = get_ip();
            $name = $_POST['name'];
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $hash_password = md5($password);
            $confirm_password = trim($_POST['confirm_password']);
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];

            $check_exist = mysqli_query($con, "select * from users where email = '$email'");
            $email_count = mysqli_num_rows($check_exist);
            $row_register = mysqli_fetch_array($check_exist);

            if ($email_count > 0) {
                echo "<script>alert('Sorry, your email $email address already exists in our database!  ') </script>";
            } elseif ($row_register['email'] != $email && $password == $confirm_password) {
                move_uploaded_file($image_tmp,"customer/customer_images/$image");

                $run_insert = mysqli_query($con, "insert into users (ip_address, name, email, password, country, city, contact, user_address, image) values ('$ip','$name','$email','$hash_password','$country','$city','$contact','$address','$image') ");
            }

        }

    }
    ?>
</div> <!-- /.content_wrapper-->
<?php include ('includes/footer.php') ?>


