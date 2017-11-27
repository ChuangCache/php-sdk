<?php

require_once "./api/BaseAPI.php";
require_once "./api/Token.php";
require_once "./api/Domain.php";
require_once "./api/Statistics.php";

//$domain = new \chuangcache\sdk\api\Domain();
//$domainList = $domain->domainList();
//print_r($domainList);

$statistics = new \chuangcache\sdk\api\Statistics();
$bandwidth = $statistics->bandwidth(null, strtotime('-1 hour'), time());
print_r($bandwidth);