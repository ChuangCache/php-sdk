<?php

require_once "./api/BaseAPI.php";
require_once "./api/Token.php";

$token = (new \chuangcache\sdk\api\Token())->getToken();
echo $token . PHP_EOL;
