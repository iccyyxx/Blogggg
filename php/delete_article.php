<?php
require_once("conn.php");
$b_id = $_GET['b_id'];
$sql_delete = "DELETE FROM `blog` WHERE `blog`.`b_id` = $b_id";
$result = mysqli_query($conn, $sql_delete);
if ($result) {
    echo "删除成功";
    echo '<script type="text/javascript">
    alert("删除成功");
    window.location.href = "../php/admin_article.php";
    </script>';
} else {
    echo "删除失败";
}
