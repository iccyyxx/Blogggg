<?php
require_once("conn.php");
$u_name = $_POST["u_name"];
$u_password = $_POST["u_password"];
$sql_login = "SELECT * FROM `user` WHERE `u_name` ='$u_name' AND `u_password` = '$u_password'";
$result_login = mysqli_query($conn, $sql_login);
// print_r($result_login);
$row = mysqli_fetch_assoc($result_login);
if ($result_login) {
    if ($row != null) {
        echo "登录成功";
        setcookie("u_name", $u_name);
        setcookie("u_id", $row["u_id"]);
        echo '<script type="text/javascript">
        alert("登录成功");
        window.location.href = "../php/index.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("用户名或者密码不正确");
        window.history.back();
        </script>';
    }
} else {
    echo '<script type="text/javascript">
        alert("登录失败");
        window.location.href = "../html/login.html";
        </script>';
}
