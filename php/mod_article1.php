<?php
require_once("conn.php");
$b_id = $_POST["b_id"];
$b_title = $_POST["b_title"];
$b_content = $_POST["b_content"];
$b_update_time = date('Y-m-d H:i:s');
$b_sort = $_POST["b_sort"];


$sql_mod_article = "UPDATE `blog` 
SET `b_title` = '$b_title', `b_content` = '$b_content', `b_update_time` = '$b_update_time', `b_sort` = '$b_sort' WHERE `blog`.`b_id` = $b_id;";
$result_mod_article = mysqli_query($conn, $sql_mod_article);
if ($result_mod_article) {
    echo "发表成功";
    echo '<script type="text/javascript">
    alert("修改成功");
    window.location.href = "../php/admin_article.php";
    </script>';
} else {
    echo "修改失败";
}
