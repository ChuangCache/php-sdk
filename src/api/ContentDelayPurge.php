<?php

namespace chuangcache\sdk\api;

class ContentDelayPurge extends BaseAPI
{
    public function __construct() {
        self::$ACCESS_TOKEN = (new Token())->getToken();
    }

    private $DATA_TYPE = [
        'file',
        'dir'
    ];

    public function getDelayPurgeList($task_id = null, $url_name = null, $start_time = null, $end_time = null, $page = 0, $pageNum = 50) {
        if (empty($type) || !in_array($type, $this->DATA_TYPE)) {
            return null;
        }
        if (empty(self::$ACCESS_TOKEN)) {
            return null;
        }
        $send_data = [
            'access_token' => self::$ACCESS_TOKEN,
            'page'         => $page,
            'page_num'     => $pageNum,
        ];
        if (!empty($task_id)) {
            $send_data['task_id'] = $task_id;
        }
        if (!empty($url_name)) {
            $send_data['url_name'] = $url_name;
        }
        if (!empty($start_time)) {
            $send_data['start_time'] = $start_time;
        }
        if (!empty($end_time)) {
            $send_data['end_time'] = $end_time;
        }

        $url = self::$API_URL . '/content/getDelayPurgeList';
        return self::httpPost($url, $send_data);
    }

    /**
     * $urls [{"url_name":""}, {"url_name":""}]
     */
    public function filePurge($urls, $delay = null, $is_precache = 0) {
        $this->delayPurge('file', $urls, $delay, $is_precache);
    }

    /**
     * $urls [{"url_name":""}, {"url_name":""}]
     */
    public function dirPurge($urls, $delay = null, $is_precache = 0) {
        $this->delayPurge('dir', $urls, $delay, $is_precache);
    }

    private function delayPurge($type, $urls, $delay = null, $is_precache = 0) {
        if (empty($type) || !in_array($type, $this->DATA_TYPE) || empty($urls)) {
            return null;
        }
        if (empty(self::$ACCESS_TOKEN)) {
            return null;
        }
        $send_data = [
            'access_token' => self::$ACCESS_TOKEN,
            'type'         => $type,
            'urls'         => $urls,
            'is_precache'  => $is_precache
        ];
        if (!empty($delay)) {
            $send_data['delay'] = $delay;
        }

        $url = self::$API_URL . '/content/purge';
        return self::httpPost($url, $send_data);
    }
}