<?php

require_once "./api/Token.php";
require_once "./utils/RequestUtil.php";

$token = (new \chuangcache\sdk\api\Token())->getToken();
echo $token . PHP_EOL;
