<?php

/**
 * log helper
 * 
 * @author dinhtv
 * @since 25/2/2022
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('logHere')) {
    /**
     * Write log
     */
    function logHere($message = null)
    {
        log_message('error', '-------------------- LOG HERE --------------------');
        if (!empty($message)) {
            if (is_array($message) || is_object($message)) log_message('error', json_encode($message));
            else log_message('error', $message);
        }
        log_message('error', '-------------------- LOG HERE --------------------');
    }
}
if (!function_exists('logLastQuery')) {
    /**
     * Write log last query
     */
    function logLastQuery()
    {
        $_this = &get_instance();
        log_message('error', '------LOG LAST QUERY--------');
        log_message('error', $_this->db->last_query());
        log_message('error', '------LOG LAST QUERY--------');
    }
}
