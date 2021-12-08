<?php
require_once("../php/conn.php");
$u_name = $_COOKIE["u_name"];
$u_id = $_COOKIE["u_id"];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>个人中心</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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
    </style>
    <link rel="stylesheet" href="../css/index.css">
    <link href="../css/sidebars.css" rel="stylesheet">

</head>


<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="../php/index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <?php echo $_COOKIE["u_name"]; ?>的博客
            </a>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../php/index.php" class="nav-link px-2 link-secondary">首页</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">分类</a></li>
                <div class="dropdown">
                    <a class="nav-link px-2 link-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        文章
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="../html/add_article.html">发表文章</a></li>
                        <li><a class="dropdown-item" href="../php/admin_article.php">文章管理</a></li>
                    </ul>
                </div>
                <li><a href="../php/personalCenter.php" class="nav-link px-2 link-dark">个人中心</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">关于</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <?php if (!isset($_COOKIE["u_name"])) { ?>
                    <a href="../html/login.html" type="button" class="btn btn-outline-primary me-2">登录</a>
                    <a href="../html/register.html" type="button" class="btn btn-primary">注册</a>
                <?php } else { ?>
                    <a href="../php/exit.php" type="button" class="btn btn-primary">退出</a>
                <?php } ?>
            </div>
        </header>

        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span data-feather="home"></span>
                                基础设置
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                个人资料
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                修改密码
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- 连接数据库并查询 -->

            <?php
            // 修改头像,并上传到数据库
            if (isset($_FILES["head"]["size"])) {
                move_uploaded_file($_FILES["head"]["tmp_name"], "../image/head" . $u_id . ".png");
                $filename = "../image/head" . $_COOKIE["u_id"] . ".png";
                $sql_uploaded_file = "UPDATE `user` SET `head_path` = '$filename' WHERE `user`.`u_id` = $u_id;";
                if (!mysqli_query($conn, $sql_uploaded_file)) {
                    echo '<script>
                    alert("修改头像失败");
                </script>';
                }
            }
            // 读取个人资料
            $sql = "SELECT * FROM `user` WHERE `u_name` ='$u_name'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $path = $row['head_path'];
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-md-block">
                <!-- 修改头像 -->
                <div class="mb-3 row">
                    <div class="col-sm-3">
                        <div class="photo" style="background: url('<?php echo $path; ?>') no-repeat; background-size:100% 100%">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#change-head">
                            修改头像
                        </button>
                        <div class="modal fade" id="change-head" tabindex="-1" aria-labelledby="change-headLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="../php/personalCenter.php" method="post" enctype='multipart/form-data'>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="change-headLabel">修改头像</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="file" class="form-control" id="head" multiple accept='image/png' name="head">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">关闭</button>
                                            <button type="submit" class="btn btn-primary">上传</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 修改信息 -->
                <form action="user_mod.php" method="post">
                    <!-- 昵称 u_name -->
                    <div class="mb-3 row">
                        <label for="u_name" class="col-sm-2 col-form-label">昵称</label>
                        <div class="col-sm-10">
                            <input name="u_name" type="text" class="form-control" id="u_name" value="<?php echo $row["u_name"]; ?>">
                        </div>
                    </div>
                    <!-- 邮箱u_email -->
                    <div class="mb-3 row">
                        <label for="u_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="u_email" type="text" class="form-control" id="u_email" value="<?php echo $row["u_email"] ?>">
                        </div>
                    </div>
                    <!-- 密码u_password -->
                    <div class="mb-3 row">
                        <label for="u_password" class="col-sm-2 col-form-label">密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="u_password" class="form-control" id="u_password" value="<?php echo $row["u_password"] ?>">
                        </div>
                    </div>
                    <!-- 联系方式 u_tele -->
                    <div class="mb-3 row">
                        <label for="u_tele" class="col-sm-2 col-form-label">联系方式</label>
                        <div class="col-sm-10">
                            <input type="text" name="u_tele" class="form-control" id="u_tele" value="<?php echo $row["u_tele"] ?>">
                        </div>
                    </div>
                    <!-- 个人简介u_introduction -->
                    <div class="mb-3 row">
                        <label for="u_introduction" class="col-sm-2 col-form-label">个人简介</label>
                        <div class="col-sm-10">
                            <textarea name="u_introduction" type="text" class="form-control" id="u_introduction" value="<?php echo $row["u_introduction"]; ?>">
                                </textarea>
                        </div>
                    </div>
                    <button class="w-100 btn btn-primary btn-lg" type="submit">保存</button>
                </form>
            </main>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../js/dashboard.js"></script>

</body>