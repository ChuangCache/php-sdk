<?php

namespace chuangcache\sdk\api;

class Domain extends BaseAPI
{
    public function __construct() {
        self::$ACCESS_TOKEN = (new Token())->getToken();
    }

    public function domainList() {
        if (empty(self::$ACCESS_TOKEN)) {
            return null;
        }
        $send_data = ['access_token' => self::$ACCESS_TOKEN];

        $url = self::$API_URL . '/domain/domainList';

        return self::httpPost($url, $send_data);
    }

    public function getDomainById($domainId) {
        if (empty($domainId) || empty(self::$ACCESS_TOKEN)) {
            return null;
        }
        $send_data = [
            'access_token' => self::$ACCESS_TOKEN,
            'domain_id'    => $domainId
        ];

        $url = self::$API_URL . '/domain/getDomainById';

        return self::httpPost($url, $send_data);
    }

    /**
     * @param $domainInfo {domain, icp_no, cdn_type, data, sourcehost, monitor_url}
     * @return mixed|null
     */
    public function addDomain($domainInfo) {
        if (empty($domainInfo) || empty(self::$ACCESS_TOKEN)) {
            return null;
        }
        $send_data = [
                'access_token' => self::$ACCESS_TOKEN
            ] + $domainInfo;

        $url = self::$API_URL . '/domain/addDomain';

        return self::httpPost($url, $send_data);
    }
}