<?php
require_once("conn.php");
$u_name = $_POST["u_name"];
$sql1 = "SELECT * FROM `user` WHERE `u_name` ='$u_name'";
$num1 = mysqli_num_rows(mysqli_query($conn, $sql1));
if ($num1 > 0) {
    echo "该用户名已被注册";
}
