<?php

include_once dirname(__FILE__).'/../autoload.php';
session_start();
session_destroy();
$url = 'login';
redirectTo($url);


?>