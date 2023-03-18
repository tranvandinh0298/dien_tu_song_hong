<?php

/**
 * url helper
 * dev: dinhtv
 * created date: 25/2/2022
 * updated date: 25/2/2022
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('addQueryArg')) {
    /**
     * thêm tham số vào url
     * dev: dinhtv
     * created date: 28/4/2022
     * updated date: 28/4/2022
     */
    function addQueryArg($args = [])
    {
        $args = array_filter($args);
        $url = current_url() . '?' . http_build_query(array_merge($_GET, $args));
        return $url;
    }
}


if (!function_exists('removeQueryArg')) {
    /**
     * bỏ tham số khỏi url
     * dev: dinhtv
     * created date: 28/4/2022
     * updated date: 28/4/2022
     */
    function removeQueryArg($args)
    {
        $parsed = http_build_query(array_merge($_GET));

        parse_str($parsed, $params);
        unset($params[$args]);

        $string = http_build_query($params);
        if (!empty($string)) {
            $url = current_url() . '?' . $string;
        } else {
            $url = current_url();
        }

        return $url;
    }
}
