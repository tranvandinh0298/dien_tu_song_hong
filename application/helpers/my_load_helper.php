<?php

/**
 * load helper
 * dev: dinhtv
 * created date: 25/2/2022
 * updated date: 25/2/2022
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('load_view')) {
    /**
     * Load view
     */
    function load_view($view, $data = null)
    {
        $_this = get_instance();
        return $_this->load->view($view, $data);
    }
}

if (!function_exists('load_component')) {
    /**
     * Load component
     */
    function load_component($fileName, $type, $loadVersion = false, $loadPrefix = true)
    {
        $publicPath = 'public/' ;
        $assetsPath = $publicPath . 'assets/' ;
        $componentPath = '';
        if ($loadPrefix)
            switch ($type) {
                case COMPONENT_CSS:
                    $componentPath = $assetsPath . 'css/';
                    break;
                case COMPONENT_JS:
                    $componentPath = $assetsPath . 'js/';
                    break;
                case COMPONENT_ICON:
                    $componentPath = $assetsPath . 'icons/';
                    break;
                case COMPONENT_IMG:
                    $componentPath = $assetsPath . 'images/';
                    break;
            }
        $componentPath .= $fileName;
        if ($loadVersion)
            $componentPath .= '?v=' . VERSION;
        echo base_url($componentPath);
    }
}

if (!function_exists('load_css')) {
    /**
     * Load view
     */
    function load_css($css, $loadVersion = false, $loadPrefix = true)
    {
        load_component($css, COMPONENT_CSS, $loadVersion, $loadPrefix);
    }
}

if (!function_exists('load_icon')) {
    /**
     * Load view
     */
    function load_icon($icon)
    {
        load_component($icon, COMPONENT_ICON);
    }
}

if (!function_exists('load_js')) {
    /**
     * Load Js
     */
    function load_js($js, $loadVersion = false, $loadPrefix = true)
    {
        load_component($js, COMPONENT_JS, $loadVersion, $loadPrefix);
    }
}

if (!function_exists('load_img')) {
    /**
     * Load Js
     */
    function load_img($img, $loadPrefix = true)
    {
        load_component($img, COMPONENT_IMG, false, $loadPrefix);
    }
}
