<?php
require_once("conn.php");
$u_name = $_POST["u_name"];
$u_password = $_POST["u_password"];
$u_introduction = $_POST["u_introduction"];
$u_email = $_POST["u_email"];
$u_tele = $_POST["u_tele"];
$u_id = $_COOKIE['u_id'];


$sql = "UPDATE `user` SET `u_name` = '$u_name', `u_password` = '$u_password', `u_introduction` = '$u_introduction', `u_email` = '$u_email', `u_tele` = '$u_tele' WHERE `user`.`u_id` = $u_id;";
$result_mod = mysqli_query($conn, $sql);
if ($result_mod) {
    setcookie("u_name", $u_name);
    echo '<script type="text/javascript">
        alert("修改成功");
        window.location.href = "../php/personalCenter.php";
        </script>';
} else {
    echo '<script type="text/javascript">
        alert("修改失败，请检查");
        window.location.href = "../php/personalCenter.php";
        </script>';
}
