<?php
require_once("conn.php");
if (isset($_COOKIE["u_name"])) {
  $u_name = $_COOKIE["u_name"];
}
if (isset($_COOKIE["u_id"])) {
  $u_id = $_COOKIE["u_id"];
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
        if (isset($_COOKIE["u_name"])) {
          echo $_COOKIE["u_name"] . "的博客";
        } else {
          echo "博客";
        }
        ?>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="../php/index.php" class="nav-link px-2 link-secondary">首页</a></li>
        <li><a href="#" class="nav-link px-2 link-dark" onclick="return isLogin()">分类</a></li>
        <div class="dropdown">
          <a class="nav-link px-2 link-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            文章
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="../html/add_article.html" onclick="return isLogin()">发表文章</a></li>
            <li><a class="dropdown-item" href="../php/admin_article.php" onclick="return isLogin()">文章管理</a></li>
          </ul>
        </div>
        <li><a href="../php/personalCenter.php" class="nav-link px-2 link-dark" onclick="return isLogin()">个人中心</a></li>
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
    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 100%;">
      <?php
      $sql1 = "Select * from blog,user where blog.u_id=user.u_id;";
      $result = mysqli_query($conn, $sql1);
      while ($article = mysqli_fetch_assoc($result)) {
        $b_id = $article["b_id"];
      ?>
        <div class="card border-dark mb-3 item-show" id="<?php echo $b_id; ?>">
          <div class="card-body" onclick="show(<?php echo $b_id; ?>);">
            <h5 class="card-title"><?php echo $article["b_title"]; ?></h5>
            <div class="card-text" style="overflow: hidden;white-space: nowrap;text-overflow:ellipsis;">
              <?php echo $article["b_content"]; ?></div>
          </div>
          <div class="card-footer text-muted">
            <?php echo $article["b_update_time"]; ?>
            by <?php echo $article["u_name"]; ?>
            <span style="float:right">
              <a onclick="return isLogin()" class=" btn btn-outline-secondary">点赞</a>
              <a onclick="return isLogin()" class="btn btn-outline-secondary">评论</a>
            </span>
          </div>
        </div>
        <article class="blog-post visually-hidden blog-show" id="detail-<?php echo $b_id; ?>">
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
          <a onclick="reshow(<?php echo $b_id; ?>)" class=" btn btn-outline-secondary">返回</a>
          <a onclick="return isLogin()" class=" btn btn-outline-secondary">点赞</a>
          <a onclick="return isLogin()" class="btn btn-outline-secondary">评论</a>
        </article>
      <?php } ?>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/sidebars.js"></script>
    <script>
      var show = function(i) {
        console.log(i);
        var id = "#detail-" + i;
        $(".item-show").addClass("visually-hidden");
        $(id).removeClass("visually-hidden");
        console.log($(id));
      }
      var reshow = function(i) {
        var id = "#detail-" + i;
        $(".item-show").removeClass("visually-hidden");
        $(id).addClass("visually-hidden");
      }
      var isLogin = function() {
        if (!document.cookie) {
          alert("请登录");
          return false;
        } else {
          console.log(1);
        }
      }
    </script>
</body>

</html>