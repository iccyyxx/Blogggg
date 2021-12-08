<?php
require_once("conn.php");
$a_name = $_POST["a_name"];
$a_password = $_POST["a_password"];
$sql_login = "SELECT * FROM `admin` WHERE `a_name` ='$a_name' AND `a_password` = '$a_password'";
$result_login = mysqli_query($conn, $sql_login);
$row = mysqli_fetch_assoc($result_login);
if ($result_login) {
    if ($row != null) {
        echo "登录成功";
        setcookie("a_name", $a_name);
        setcookie("a_id", $row["a_id"]);
        echo '<script type="text/javascript">
            alert("登录成功");
            window.location.href = "../php/a_index.php";
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
        window.location.href = "../html/a_login.html";
        </script>';
}
