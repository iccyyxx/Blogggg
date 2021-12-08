<?php


require_once("conn.php");
$u_name = $_POST["u_name"];
$date1 = date('Y-m-d H:i:s');

$u_psw = $_POST["u_psw"];
$u_repsw = $_POST["u_repsw"];
$u_email = $_POST["u_email"];
$u_tele = $_POST["u_tele"];

// $sql = "INSERT INTO `user` (`u_id`, `u_name`, `u_password`, `u_introduction`, `u_blog_nums`, `u_emali`, `u_tele`, `u_reg_time`) 
// VALUES (NULL, '$u_name', '$u_psw', NULL, 0, '$u_email', '$u_tele', '$date1');";
$sql = "INSERT INTO `user` (`u_id`, `u_name`, `u_password`, `u_introduction`, `u_blog_nums`, `u_email`, `u_tele`, `u_reg_time`, `head_path`) 
VALUES (NULL, '$u_name', '$u_psw', NULL, '0', '$u_email', '$u_tele', '$data1',NULL);";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo '<script type="text/javascript">
    alert("注册成功");
    window.location.href = "../html/login.html";
    </script>';
} else {
    echo "注册失败";
}
