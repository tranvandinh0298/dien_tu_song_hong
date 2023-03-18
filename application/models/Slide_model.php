<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slide_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'slides';
    }

    public function get_slides($limit = 4)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('category_id IS NULL', NULL, FALSE);
        $this->db->order_by('id', 'ASC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
}
