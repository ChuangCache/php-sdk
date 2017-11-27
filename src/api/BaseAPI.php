<?php

namespace chuangcache\sdk\api;

abstract class BaseAPI
{
    protected static $API_URL = 'https://api.chuangcache.com';

    public static function httpPost($url, $data) {
        $data = is_array($data) ? json_encode($data) : $data;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = [
            'Accept'       => 'application/json',
            'Content-Type' => 'application/json; charset=utf-8',
        ];
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $return = curl_exec($ch);
        curl_close($ch);

        return json_decode($return, true);
    }
}