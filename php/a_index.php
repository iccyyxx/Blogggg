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
    <title>Sidebars · Bootstrap v5.1</title>

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
        <table class="table table-hover" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">题目</th>
                    <th scope="col">内容</th>
                    <th scope="col">作者ID</th>
                    <th scope="col">作者</th>
                    <th scope="col">分类</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql1 = "Select * from blog,user where blog.u_id=user.u_id;";
                $result = mysqli_query($conn, $sql1);
                while ($article = mysqli_fetch_assoc($result)) {
                ?>
                    <tr onclick="show(<?php echo  $article['b_id']; ?>);">
                        <th scope="row"><?php echo $article["b_id"]; ?></th>
                        <td><?php echo $article["b_title"]; ?></td>
                        <td><?php echo $article["b_content"]; ?></td>
                        <td><?php echo $article["u_id"]; ?></td>
                        <td><?php echo $article["u_name"]; ?></td>
                        <td><?php echo $article["b_sort"]; ?></td>
                        <td>
                            <!-- <a href="../php/mod_article.php?b_id= <?php echo $b_id; ?>">编辑</a> -->
                            <a href="../php/delete_article.php?b_id= <?php echo  $article["b_id"]; ?>" class="btn btn-outline-secondary">删除</a>
                        </td>
                    </tr>
                    <article class="blog-post visually-hidden blog-show" id="detail-<?php echo $article["b_id"]; ?>">
                        <h2 class="blog-post-title">
                            <?php echo $article["b_title"]; ?>
                        </h2>
                        <p class="blog-post-meta">
                            <?php echo $article["b_create_time"]; ?>
                            by <a href="#" one-link-mark="yes">
                                <?php echo $article["u_name"]; ?>
                            </a>
                        </p>
                        <div>
                            <?php echo $article["b_content"]; ?>
                        </div>
                        <p></p>
                        <a onclick="reshow(<?php echo $article["b_id"]; ?>)" class=" btn btn-outline-secondary">返回</a>
                        <a href="../php/delete_article.php?b_id= <?php echo  $article["b_id"]; ?>" class=" btn btn-outline-secondary">删除</a>
                    </article>
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