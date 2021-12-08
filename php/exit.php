<?php
foreach ($_COOKIE as $key => $val) {
    setcookie($key, "", time() - 3600);
}
echo '<script type="text/javascript">
        window.location.href = "../php/index.php";
        </script>';
