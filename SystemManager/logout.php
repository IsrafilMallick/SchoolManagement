<?php
session_start();
setcookie("rememberCookieUname","session expired",(time()+604800));
setcookie("rememberCookiePassword","X@X",(time()+604800));
session_unset();
session_destroy();
header("Location: login.php");
?>