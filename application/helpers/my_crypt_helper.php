<?php

/**
 * Encrypt/ Decrypt helper
 * dev: dinhtv
 * created date: 25/2/2022
 * updated date: 25/2/2022
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('encryptTripleDES')) {
    /*
    * required: PHP
	* crypt: tripleDES
    * cipher mode: ECB
    * padding mode: PKCS7
    * return base64
	*/
    function encryptTripleDES($text, $key, $returnMode = CRYPT_RETURN_BASE64)
    {
        /**
         * Nếu key là 128 bits (16 ký tự) -> 
         * thì gán vào key 8 ký tự đầu để thành 192 bits (24 ký tự)
         */
        $cipher = "DES-EDE3";
        $encryptData = '';
        // $key = md5(utf8_encode($key), true);
        if (strlen($key) == 16)
            $key .= substr($key, 0, 8);
        if (strlen($key) != 24)
            return false;
        $encryptData = openssl_encrypt($text, $cipher, $key, OPENSSL_RAW_DATA);
        if (!empty($returnMode))
            switch ($returnMode) {
                case CRYPT_RETURN_BASE64:
                    $encryptData = base64_encode($encryptData);
                    break;
                case CRYPT_RETURN_HEX:
                    $encryptData = bin2hex($encryptData);
                    break;
                default:
                    $encryptData = base64_encode($encryptData);
                    break;
            }
        return $encryptData;
    }
}
if (!function_exists('decryptTripleDES')) {
    /*
    * required: PHP
	* crypt: tripleDES
    * cipher mode: ECB
    * padding mode: PKCS7
    * return base64
	*/
    function decryptTripleDES($text, $key, $returnMode = CRYPT_RETURN_BASE64)
    {
        /**
         * Nếu key là 128 bits (16 ký tự) -> 
         * thì gán vào key 8 ký tự đầu để thành 192 bits (24 ký tự)
         */
        $cipher = "DES-EDE3";
        $decryptData = '';
        // $key = md5(utf8_encode($key), true);
        if (strlen($key) == 16)
            $key .= substr($key, 0, 8);
        if (strlen($key) != 24)
            return false;
        if (!empty($returnMode))
            switch ($returnMode) {
                case CRYPT_RETURN_BASE64:
                    $text = base64_decode($text);
                    break;
                case CRYPT_RETURN_HEX:
                    $text = hex2bin($text);
                    break;
                default:
                    $text = base64_decode($text);
                    break;
            }
        $decryptData = openssl_decrypt($text, $cipher, $key, OPENSSL_RAW_DATA);
        return $decryptData;
    }
}

if (!function_exists('createSignRSA')) {
    /**
     * Tạo chữ ký điện tử (RSA)
     * message + privateKey (của nội bộ)
     */
    function createSignRSA($message, $privateKey, $hash = 'sha256', $mode = CRYPT_RSA_SIGNATURE_PKCS1)
    {
        include_once APPPATH . "third_party" . DIRECTORY_SEPARATOR . 'phpseclib' . DIRECTORY_SEPARATOR . 'Crypt/RSA.php';
        $rsa = new Crypt_RSA();
        $rsa->setHash($hash);
        $rsa->setMGFHash($hash);
        $rsa->setSignatureMode($mode);
        $rsa->loadKey($privateKey);
        $signature = $rsa->sign($message);
        $dataSign = base64_encode($signature);
        return $dataSign;
    }
}

if (!function_exists('verifySignRSA')) {
    /**
     * Giải mã chữ ký điện tử
     * dataSign + publicKey (của đối tác)
     */
    function verifySignRSA($message, $dataSign, $publicKey, $hash = 'sha256', $mode = CRYPT_RSA_SIGNATURE_PKCS1)
    {
        include_once APPPATH . "third_party" . DIRECTORY_SEPARATOR . 'phpseclib' . DIRECTORY_SEPARATOR . 'Crypt/RSA.php';
        $rsa = new Crypt_RSA();
        $rsa->setHash($hash);
        $rsa->setMGFHash($hash);
        $rsa->setSignatureMode($mode);
        $rsa->loadKey($publicKey);
        $signature = base64_decode($dataSign);
        $verify = $rsa->verify($message, $signature);
        return $verify;
    }
}
