<?php
require_once("conn.php");
$u_name = $_post["u_name"];
$u_psw = $_post["u_psw"];
$u_repsw = $_post["u_repsw"];
$u_email = $_post["u_email"];
$u_tele = $_post["u_tele"];


$sql = "INSERT INTO `user` (`u_id`, `u_name`, `u_password`, `u_introduction`, `u_blog_nums`, `u_emali`, `u_tele`, `u_reg_time`) 
VALUES (NULL, '$u_name', '$u_psw', NULL, 0, '', '', '2021-12-03 13:57:58.000000');";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "注册成功";
} else {
    echo "注册失败";
}
