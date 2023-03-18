<?php

/**
 * response helper
 * dev: dinhtv
 * created date: 25/2/2022
 * updated date: 25/2/2022
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('responseJson')) {
    /**
     * return json response
     */
    function responseJson($data)
    {
        header('Content-Type: application/json');
        die(json_encode($data));
    }
}
if (!function_exists('returnJson')) {
    /**
     * return json response
     */
    function returnJson($data)
    {
        return json_encode($data);
    }
}

if (!function_exists('returnSuccess')) {
    /**
     * return success message
     */
    function returnSuccess($message)
    {
        die(json_encode([
            'type' => MESSAGE_TYPE_SUCCESS,
            'message' => $message
        ], JSON_UNESCAPED_UNICODE));
    }
}

if (!function_exists('returnWarning')) {
    /**
     * return warning message
     */
    function returnWarning($message)
    {
        die(json_encode([
            'type' => MESSAGE_TYPE_WARNING,
            'message' => $message
        ], JSON_UNESCAPED_UNICODE));
    }
}

if (!function_exists('returnError')) {
    /**
     * return error message
     */
    function returnError($message)
    {
        die(json_encode([
            'type' => MESSAGE_TYPE_ERROR,
            'message' => $message
        ], JSON_UNESCAPED_UNICODE));
    }
}
if (!function_exists('flashMessage')) {
    /**
     * return flash message
     */
    function flashMessage($message, $type = 'warning')
    {
        $_this = &get_instance();
        $_this->session->set_flashdata('alert', json_encode([
            'type' => $type,
            'message' => $message
        ]));
    }
}
if (!function_exists('redirectFlashMessage')) {
    /**
     * return flash message và redirect
     */
    function redirectFlashMessage($message, $type, $link = '')
    {
        flashMessage($message, $type);
        redirect($link);
    }
}
if (!function_exists('displayFlashMessage')) {
    /**
     * return flash message và redirect
     */
    function displayFlashMessage()
    {
        $_this = &get_instance();
        $alert = $_this->session->flashdata('alert');
        if (!empty($alert)) {
            $alert = json_decode($alert, true);
            switch ($alert['type']) {
                case ALERT_SUCCESS:
                    echo '
                        <div class="alert alert-success text-white" role="alert">
                            <strong>Thành công!</strong> ' . $alert['message'] . '
                        </div>
                    ';
                    break;
                case ALERT_WARNING:
                    echo '
                        <div class="alert alert-warning text-white" role="alert">
                            <strong>Cảnh báo!</strong> ' . $alert['message'] . '
                        </div>
                    ';
                    break;
                case ALERT_ERROR:
                    echo '
                            <div class="alert alert-danger text-white" role="alert">
                                <strong>Cảnh báo!</strong> ' . $alert['message'] . '
                            </div>
                        ';
                    break;
                default:
                    echo '
                        <div class="alert alert-success text-white" role="alert">
                            <strong>Thành công!</strong> ' . $alert['message'] . '
                        </div>
                    ';
                    break;
            }
            unset($_SESSION['alert']);
        }
    }
}

if (!function_exists('displayFormError')) {
    /**
     * return flash message và redirect
     */
    function displayFormError($errors)
    {
        echo '
            <div class="alert alert-danger text-white" role="alert">
                <strong>Cảnh báo!</strong> ' . $errors . '
            </div>
        ';
    }
}
