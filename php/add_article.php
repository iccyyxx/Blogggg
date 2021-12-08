<?php
require_once("conn.php");
$u_id = $_COOKIE["u_id"];
$b_title = $_POST["b_title"];
$b_content = $_POST["b_content"];
$b_update_time = date('Y-m-d H:i:s');
$b_create_time = $b_update_time;
$b_sort = $_POST["b_sort"];


$sql_add_article = "INSERT INTO `blog` (`u_id`, `b_id`, `b_title`, `b_content`, `b_likenum`,  `b_sort`,b_create_time,b_update_time) 
VALUES ('$u_id ', NULL, '$b_title', '$b_content', NULL, '$b_sort','$b_create_time','$b_update_time');";

$result_add_article = mysqli_query($conn, $sql_add_article);
if ($result_add_article) {
    echo "发表成功";
    echo '<script type="text/javascript">
    alert("发表成功");
    window.location.href = "../php/admin_article.php";
    </script>';
} else {
    echo "发表失败";
}
