<?php

namespace chuangcache\sdk\api;

class Cdnlogs extends BaseAPI
{
    public function __construct() {
        self::$ACCESS_TOKEN = (new Token())->getToken();
    }

    public function logfiles($domain, $startTime, $endTime) {
        if (empty($domain) || empty($startTime) || empty($endTime) || $startTime > $endTime) {
            return null;
        }
        if (empty(self::$ACCESS_TOKEN)) {
            return null;
        }
        $send_data = [
            'access_token' => self::$ACCESS_TOKEN,
            'domain'       => $domain,
            'starttime'    => $startTime,
            'endtime'      => $endTime
        ];

        $url = self::$API_URL . '/cdnlog/logfiles';
        return self::httpPost($url, $send_data);
    }
}