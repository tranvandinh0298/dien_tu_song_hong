<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'categories';
        $this->_alias = 'alias';
    }

}
