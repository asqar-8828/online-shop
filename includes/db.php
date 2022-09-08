<?php
$con = mysqli_connect("localhost","root","","ecommerce_cms_tutorial");

if(mysqli_connect_errno()) {
    echo "MySQL ga ulanishda xato berdi: " . mysqli_connect_error();
}

mysqli_query($con, "SET NAMES 'utf8' ");
?>
