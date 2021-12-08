<?php
require_once("conn.php");
$u_id = $_COOKIE["u_id"]; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
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
    <link href="../css/signin.css" rel="stylesheet">
</head>

<body>
    <?php
    $b_id = $_GET["b_id"];
    $sql1 = "Select * from blog where b_id='$b_id'";
    $result = mysqli_query($conn, $sql1);
    $article = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <form action="../php/mod_article1.php" method="post">
            <input name="b_id" hidden type="text" class="form-control" id="b_title" aria-describedby="emailHelp" value="<?php echo $article["b_id"]; ?>">
            <div class="mb-3">
                <label for="b_title" class="form-label">标题</label>
                <input name="b_title" type="text" class="form-control" id="b_title" aria-describedby="emailHelp" value="<?php echo $article["b_title"]; ?>">
            </div>
            <div class="mb-3">
                <label for="b_sort" class="form-label">分类</label>
                <input type="text" name="b_sort" class="form-control" id="b_sort" aria-describedby="emailHelp" value="<?php echo $article["b_sort"]; ?>">
            </div>
            <div class=" mb-3">
                <label for="b_content" class="form-label">内容</label>
                <textarea name="b_content" rows="10" class="form-control" type="password" class="form-control" id="b_content"><?php echo $article["b_content"]; ?></textarea>
            </div>
            <button type=" submit" class="btn btn-primary">保存</button>
        </form>
    </div>


</body>

</html>