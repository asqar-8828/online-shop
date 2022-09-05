
<body>

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
<?php
$select_user = mysqli_query($con, "select * from users where id= '$_SESSION[user_id]'");
$fetch_user = mysqli_fetch_array($select_user);
?>


    <div class="register_box">
        <form method="post" action="" enctype="multipart/form-data">
            <table align="left" width="70%">
                <tr align="left">
                    <td colspan="4">
                        <h2>Edit Account.</h2><br>

                    </td>
                </tr>
                <tr>
                    <td width="15%"><b>Name: </b></td>
                    <td colspan="3"><input type="text" name="name" value="<?php echo $fetch_user['name']; ?>" required placeholder="Name" ></td>
                </tr>
                <tr>
                    <td width="15%"><b>Email: </b></td>
                    <td colspan="3"><input type="text" name="email" value="<?php echo $fetch_user['email']; ?>" required placeholder="Email" ></td>
                </tr>

                <tr>
                    <td width="15%"><b>Current Password: </b></td>
                    <td colspan="3"><input type="password"  name="current_password" required placeholder="Current Password" ></td>
                </tr>

                <tr>
                    <td width="15%"><b>New Password: </b></td>
                    <td colspan="3"><input type="password" id="password_confirm1" name="new_password" required placeholder="New Password" ></td>
                </tr>
                <tr>
                    <td width="35%"><b>Re-type Password: </b></td>
                    <td colspan="3"><input type="password" id="password_confirm2" name="confirm_new_password" required placeholder="Re-type New Confirm Password" >
                        <p id="status_for_confirm_password"></p> <!--Showing validate password-->
                    </td>

                </tr>

                <tr>
                    <td width="15%"><b>Image: </b></td>
                    <td colspan="3"><input type="file" name="image"  >
                        <div>
                            <img src="upload-files/<?php echo $fetch_user['image']; ?>" width="100" height="70"/>
                        </div>
                    </td>

                </tr>

                <tr>
                    <td width="15%"><b>Country: </b></td>
                    <td colspan="3">
                        <?php include('users/edit_country_list.php');  ?>

                    </td>
                </tr>
                <tr>
                    <td width="15%"><b>City: </b></td>
                    <td colspan="3"><input type="text" name="city" value="<?php echo $fetch_user['city']; ?>" placeholder="City" required></td>
                </tr>
                <tr>
                    <td width="15%"><b>Contact: </b></td>
                    <td colspan="3"><input type="text" name="contact" value="<?php echo $fetch_user['contact']; ?>" placeholder="Contact" required></td>
                </tr>
                <tr>
                    <td width="15%"><b>Address: </b></td>
                    <td colspan="3"><input type="text" name="address" value="<?php echo $fetch_user['user_address']; ?>" placeholder="Address" required></td>
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
                move_uploaded_file($image_tmp,"upload-files/$image");

                $run_insert = mysqli_query($con, "insert into users (ip_address, name, email, password, country, city, contact, user_address, image) values ('$ip','$name','$email','$hash_password','$country','$city','$contact','$address','$image') ");
                if ($run_insert) {
                    $sel_user = mysqli_query($con, "select * from users where email = '$email'");
                    $row_user = mysqli_fetch_array($sel_user);

                    $_SESSION['user_id'] = $row_user['id'] . "<br>";
                    $_SESSION['role'] = $row_user['role'];
                }

                $run_cart = mysqli_query($con, "select * from cart where ip_address = '$ip'");
                $check_cart = mysqli_num_rows($run_cart);

                if ($check_cart == 0) {
                    $_SESSION['email'] = $email;
                    echo "<script> alert('Account has been created successfully')</script>";
                    echo "<script>window.open('customer/my_account.php','_self')</script>";
                } else {
                    $_SESSION['email'] = $email;
                    echo "<script> alert('Account has been created successfully')</script>";
                    echo "<script>window.open('checkout.php','_self')</script>";
                }

            }

        }

    }
    ?>


