<?php

/**
 * custom upload helper
 * dev: dinhtv
 * created date: 25/2/2022
 * updated date: 25/2/2022
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('uploadImg')) {
    /*
	* hàm upload
	* trả về string không dấu
	*/
    function uploadImg($field, $path = 'public/assets/images')
    {
        $config = [];
        $result =  '';
        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|svg|jpeg|webp';
        $result = uploadFile($field, $path, $config);
        return $result;
    }
}

if (!function_exists('uploadFile')) {
    /*
	* hàm upload file
	* trả về string không dấu
	*/
    function uploadFile($field, $path, $config)
    {
        $_this = &get_instance();
        $name = toNormal($_FILES[$field]['name']);
        $config['file_name'] = $name;
        $_this->load->library('upload', $config);
        if (!$_this->upload->do_upload($field)) {
            log_message('error', "upload fail : " . json_encode($_this->upload->display_errors(), 256));
            $response = [
                "success" => false,
                "message" => "Upload file thất bại: " . $_this->upload->display_errors()
            ];
        } else {
            $fileData = $_this->upload->data();
            $image = $path . "/" . $fileData['file_name'];
            $response = [
                "success" => true,
                "fileName" => $image
            ];
        }
        return $response;
    }
}
