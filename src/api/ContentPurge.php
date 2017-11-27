<?php

namespace chuangcache\sdk\api;

class ContentPurge extends BaseAPI
{
    public function __construct() {
        self::$ACCESS_TOKEN = (new Token())->getToken();
    }

    private $DATA_TYPE = [
        'file',
        'dir'
    ];

    public function getPurgeList($type, $startTime, $page = 0, $pageNum = 50) {
        if (empty($type) || !in_array($type, $this->DATA_TYPE)) {
            return null;
        }
        if (empty(self::$ACCESS_TOKEN)) {
            return null;
        }
        $send_data = [
            'access_token' => self::$ACCESS_TOKEN,
            'type'         => $type,
            'start_time'   => $startTime,
            'page'         => $page,
            'page_num'     => $pageNum,
        ];

        $url = self::$API_URL . '/content/getPurgeList';
        return self::httpPost($url, $send_data);
    }

    /**
     * @param $urls [{"url_name":""}, {"url_name":""}]
     */
    public function filePurge($urls) {
        $this->purge('file', $urls);
    }

    /**
     * @param $urls [{"url_name":""}, {"url_name":""}]
     */
    public function dirPurge($urls) {
        $this->purge('dir', $urls);
    }

    private function purge($type, $urls) {
        if (empty($type) || !in_array($type, $this->DATA_TYPE) || empty($urls)) {
            return null;
        }
        if (empty(self::$ACCESS_TOKEN)) {
            return null;
        }
        $send_data = [
            'access_token' => self::$ACCESS_TOKEN,
            'api_type'     => 0,
            'type'         => $type,
            'urls'         => $urls
        ];

        $url = self::$API_URL . '/content/purge';
        return self::httpPost($url, $send_data);
    }
}