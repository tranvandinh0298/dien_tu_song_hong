<?php

/**
 * email helper
 * dev: dinhtv
 * created date: 25/2/2022
 * updated date: 25/2/2022
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('sendEmail')) {
    function sendEmail($title, $message, $email, $files)
    {
        $_this =& get_instance();
        $_this->load->library('email');
        $_this->email->clear(TRUE);
        //SMTP & mail configuration
        $config = array(
            'protocol'  => 'smtp',
            'smtp_crypto' => 'tls',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => SMTP_USER,
            'smtp_pass' => SMTP_PASS,
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $_this->email->initialize($config);
        $_this->email->set_mailtype("html");
        $_this->email->set_newline("\r\n");
        $_this->email->to($email);
        $_this->email->from('anhth@vnptepay.com.vn', 'Cổng thu học phí School Portal');

        // $this->email->from(SMTP_USER, 'Cổng thu học phí School Portal');
        $_this->email->subject($title);
        $_this->email->message($message);
        if (!empty($files)) {
            $attach_files = explode(',', $files);
            if (is_array($attach_files) && !empty($attach_files)) {
                foreach ($attach_files as $file) {
                    $attach = $_this->email->attach($_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . $file);
                    if ($attach) {
                        log_message("error", "Đính kèm file : " . $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . $file);
                    } else {
                        log_message('error', 'Đính kèm file thất bại');
                    }
                }
            }
        }
        //Send email
        $result = $_this->email->send();
        return $result;
    }
}
