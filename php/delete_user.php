<?php
require_once("conn.php");
$u_id = $_GET['u_id'];
$sql_delete = "DELETE FROM `user` WHERE `u_id` = $u_id";
$result = mysqli_query($conn, $sql_delete);
if ($result) {
    echo "删除成功";
    echo '<script type="text/javascript">
    alert("删除成功");
    window.location.href = "../php/a_user.php";
    </script>';
} else {
    echo "删除失败";
}
