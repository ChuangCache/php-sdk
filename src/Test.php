<?php

require_once "./api/BaseAPI.php";
require_once "./api/Token.php";
require_once "./api/Domain.php";

//$token = (new \chuangcache\sdk\api\Token())->getToken();
//echo $token . PHP_EOL;

$domain = new \chuangcache\sdk\api\Domain();
$domainList = $domain->domainList();
print_r($domainList);

