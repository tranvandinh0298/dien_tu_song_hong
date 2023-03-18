<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * class MY_Form_validation: customize form validation
 * @author dinhtv
 * createdDate: 06/02/2023
 * updatedDate: 06/02/2023
 */
class MY_Form_validation extends CI_Form_validation
{
    public $CI;
    function __construct()
    {
        parent::__construct();
        // log_message('error', '*** Hello from MY_Form_validation ***');
    }

    function run($module = '', $group = '')
    {
        (is_object($module)) and $this->CI = &$module;
        return parent::run($group);
    }
}
