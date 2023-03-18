<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'users';
        $this->_alias = 'username';
    }

    /**
     * function get tài khoản dành cho quản trị viên
     * @author dinhtv
     * @param string $username
     * @return null|object
     * createdDate: 22/02/2023
     * updatedDate: 22/02/2023
     */
    public function get_account($username, $optionalWhere = [])
    {
        return $this->get_by_alias($username, "*", $this->_table, $optionalWhere);
    }

    /**
     * function get account hiện hành
     * @author dinhtv
     * @param int $username : $_SESSION['adminAccess']['username']
     * @return object|null
     * createdDate: 22/02/2023
     * updatedDate: 22/02/2023
     */
    public function get_current_account($username)
    {
        return $this->get_by_alias($username, 'id as row_id, username, role, status');
    }
}
