<?php

namespace chuangcache\sdk\api;

class ContentPrecache extends BaseAPI
{
    public function __construct() {
        self::$ACCESS_TOKEN = (new Token())->getToken();
    }

    public function getPreCacheList($startTime, $page = 0, $pageNum = 50) {
        if (empty(self::$ACCESS_TOKEN)) {
            return null;
        }
        $send_data = [
            'access_token' => self::$ACCESS_TOKEN,
            'start_time'   => $startTime,
            'page'         => $page,
            'page_num'     => $pageNum,
        ];

        $url = self::$API_URL . '/content/getPreCacheList';
        return self::httpPost($url, $send_data);
    }

    /**
     * @param $urls [{"url_name":""}, {"url_name":""}]
     * @return mixed
     */
    public function precache($urls) {
        if (empty($urls)) {
            return null;
        }
        if (empty(self::$ACCESS_TOKEN)) {
            return null;
        }
        $send_data = [
            'access_token' => self::$ACCESS_TOKEN,
            'api_type'     => 0,
            'urls'         => $urls
        ];

        $url = self::$API_URL . '/content/precache';
        return self::httpPost($url, $send_data);
    }
}