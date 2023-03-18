<?php

/**
 * curl helper
 * dev: dinhtv
 * created date: 25/2/2022
 * updated date: 25/2/2022
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('sendRequest')) {
    /**
     * hàm gửi request API
     * dev: dinhtv
     * created date: 28/4/2022
     * updated date: 28/4/2022
     */
    function sendRequest($dataRequest, $url, $method = METHOD_POST, $headerToken = null, $ignore_utf8 = false, $writeLog = true)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if (!empty($method))
            curl_setopt($ch, CURLOPT_POST, TRUE);
        else curl_setopt($ch, CURLOPT_POST, FALSE);
        if (!empty($headerToken)) {
            $headers = [
                "Content-Type: application/json",
                "Accept: application/json",
                "Authorization: Bearer " . $headerToken
            ];
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $dataRequest = json_encode($dataRequest);
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataRequest);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 180);
        curl_setopt($ch, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        try {
            $result = curl_exec($ch);
            if ($ignore_utf8)
                $result = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($result));
            $curlErrno = curl_errno($ch);
            $curlError = curl_error($ch);
            if ($result === false || $curlErrno > 0 || $curlError) {
                log_message('error', 'Inner API - curlErrno: ' . $curlError);
                curl_close($ch);
                return $curlErrno;
            } else {
                if ($writeLog)
                    log_message('error', 'Inner API - curlResult: ' . $result);
                curl_close($ch);
                return cleanResponse($result);
            }
        } catch (Exception $e) {
            log_message('error', $e);
            return $e;
        }
    }
}

if (!function_exists('cleanResponse')) {
    /**
     * hàm loại bỏ các ký tự thừa trong response
     * dev: dinhtv
     * created date: 28/4/2022
     * updated date: 28/4/2022
     */
    function cleanResponse($str)
    {
        $str = preg_replace(
            '/
			  ^
			  [\pZ\p{Cc}\x{feff}]+
			  |
			  [\pZ\p{Cc}\x{feff}]+$
			 /ux',
            '',
            $str
        );
        return $str;
    }
}
