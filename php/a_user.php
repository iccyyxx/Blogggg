<?php
require_once("conn.php");
if (isset($_COOKIE["a_name"])) {
    $a_name = $_COOKIE["a_name"];
}
if (isset($_COOKIE["a_id"])) {
    $a_id = $_COOKIE["a_id"];
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>管理用户</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        td {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
    <link rel="stylesheet" href="../css/blog.css">
    <link rel="stylesheet" href="../css/index.css">
    <link href="../css/sidebars.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="../php/index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <?php
                if (isset($_COOKIE["a_name"])) {
                    echo  "管理员" . $_COOKIE["a_name"] . "你好";
                }
                ?>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../php/a_index.php" class="nav-link px-2 link-secondary">管理员首页</a></li>
                <li><a href="../php/a_article.php" class="nav-link px-2 link-secondary">管理文章</a></li>
                <li><a href="../php/a_user.php" class="nav-link px-2 link-secondary">管理用户</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">关于</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <?php if (!isset($_COOKIE["a_name"])) { ?>
                    <a href="../html/login.html" type="button" class="btn btn-outline-primary me-2">登录</a>
                <?php } else { ?>
                    <a href="../php/exit.php" type="button" class="btn btn-primary">退出</a>
                <?php } ?>
            </div>
        </header>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">用户名</th>
                    <th scope="col">个人介绍</th>
                    <th scope="col">博客数量</th>
                    <th scope="col">邮箱</th>
                    <th scope="col">手机号码</th>
                    <th scope="col">注册时间</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql1 = "Select * from user;";
                $result = mysqli_query($conn, $sql1);
                while ($user = mysqli_fetch_assoc($result)) {
                ?>
                    <tr onclick="show(<?php echo  $user['u_id']; ?>);">
                        <th scope="row"><?php echo $user["u_id"]; ?></th>
                        <td><?php echo $user["u_name"]; ?></td>
                        <td><?php echo $user["u_introduction"]; ?></td>
                        <td><?php echo $user["u_blog_nums"]; ?></td>
                        <td><?php echo $user["u_email"]; ?></td>
                        <td><?php echo $user["u_tele"]; ?></td>
                        <td><?php echo $user["u_reg_time"]; ?></td>
                        <td>
                            <a href="../php/delete_user.php?u_id= <?php echo  $user["u_id"]; ?>" class="btn btn-outline-secondary">删除</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/sidebars.js"></script>
        <script>
            var show = function(i) {
                console.log(i);
                var id = "#detail-" + i;
                $("tr").addClass("visually-hidden");
                $(id).removeClass("visually-hidden");
                console.log($(id));
            }
            var reshow = function(i) {
                var id = "#detail-" + i;
                $("tr").removeClass("visually-hidden");
                $(id).addClass("visually-hidden");
            }
        </script>
</body>

</html>