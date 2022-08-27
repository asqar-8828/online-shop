
<div class="login_box">
    <form method="post" action="">
        <table align="left" width="70%">
            <tr align="left">
                <td colspan="4">
                    <h2>Login.</h2><br>
                    <span>
                        Don't have account? <a href="customer_register.php">Register here</a> <br> <br>
                    </span>
                </td>
            </tr>
            <tr>
                <td width="15%"><b>Email: </b></td>
                <td colspan="3"><input type="text" name="email" placeholder="Email" /></td>
            </tr>
            <tr>
                <td width="15%"><b>Password: </b></td>
                <td colspan="3"><input type="password" name="password" placeholder="Password" /></td>
            </tr>
            <tr align="left">
                <td ></td>
                <td colspan="4" class="forgot_pass">
                    <a href="checkout.php?forgot_pass">
                        Forgot Password
                    <a/>
                </td>
            </tr>

            <tr align="left">
                <td></td>
                <td colspan="4">
                    <input type="submit" name="login" value="Login"/>
                </td>

            </tr>



        </table>

    </form>

</div>


<?php
if(isset($_POST['login'])) {
    echo $_POST['email'] . "<br />";
    echo $_POST['password'];
}
?>