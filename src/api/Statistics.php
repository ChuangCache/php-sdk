<?php

namespace chuangcache\sdk\api;

class Statistics extends BaseAPI
{
    public function __construct() {
        self::$ACCESS_TOKEN = (new Token())->getToken();
    }

    public function bandwidth($domain = null, $startTime, $endTime, $resulttype = 0) {
        return $this->getdata('bandwidth', $domain, $startTime, $endTime, $resulttype);
    }

    public function traffic($domain = null, $startTime, $endTime, $resulttype = 0) {
        return $this->getdata('traffic', $domain, $startTime, $endTime, $resulttype);
    }

    public function request($domain = null, $startTime, $endTime, $resulttype = 0) {
        return $this->getdata('request', $domain, $startTime, $endTime, $resulttype);
    }

    private static $DATA_TYPE = [
        'bandwidth',
        'traffic',
        'request'
    ];

    private function getdata($type, $domain = null, $startTime, $endTime, $resulttype = 0) {
        if (empty($type) || !in_array($type, self::$DATA_TYPE) || empty($startTime) || empty($endTime) || $startTime > $endTime) {
            return null;
        }
        if (empty(self::$ACCESS_TOKEN)) {
            return null;
        }
        $send_data = [
            'access_token' => self::$ACCESS_TOKEN,
            'type'         => $type,
            'starttime'    => $startTime,
            'endtime'      => $endTime
        ];

        if (!empty($domain)) {
            $send_data['domain'] = $domain;
        }
        if (!empty($resulttype)) {
            $send_data['resulttype'] = $resulttype;
        }

        $url = self::$API_URL . '/history/getdata';

        return self::httpPost($url, $send_data);
    }
}