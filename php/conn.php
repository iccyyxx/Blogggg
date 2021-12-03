<?php
/* 连接数据库 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloggg";
$port = "3306";

// 创建连接
$conn = mysqli_connect("localhost", "root", "", $dbname, $port);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
