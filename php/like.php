<?php
require_once("conn.php");
$b_id = $_POST['b_id'];
$u_id = $_POST['u_id'];
$date = date('Y-m-d H:i:s');
// 查询是否已经点赞
$sql_query = "SELECT * FROM `likeblog` WHERE `b_id`=$b_id and `u_id`=$u_id;";
$flag = mysqli_num_rows(mysqli_query($conn, $sql_query));
if ($flag > 0) {
    $sql_delete_like = "DELETE FROM `likeblog` WHERE `b_id` = $b_id and u_id=$u_id; ";
    $result_delete = mysqli_query($conn, $sql_delete_like);
    echo "0:";
    // 取消点赞
} else {
    // 点赞
    $sql_like = "INSERT INTO `likeblog` (`b_id`, `u_id`, `l_time`) VALUES ($b_id, $u_id, '$date');";
    $result = mysqli_query($conn, $sql_like);
    if ($result) {
        echo "1:";
    } else {
        echo "失败" . $b_id . $u_id;
    }
}
$sql_like_nums = "SELECT * FROM `likeblog` WHERE `b_id` = $b_id";
$result_like_nums = mysqli_query($conn, $sql_like_nums);
$like_nums = mysqli_num_rows($result_like_nums);
echo $like_nums;
