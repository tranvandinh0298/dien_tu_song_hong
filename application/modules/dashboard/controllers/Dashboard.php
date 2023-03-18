<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * function bảng điều khiển
     * @author: dinhtv
     * createdDate: 21/02/2023
     * updatedDate: 21/02/2023
     */
    public function index()
    {
        $data = [];
        redirect('message');
        // render
        // $this->set_title('Bảng điều khiển')
        //     ->set_content('index')
        //     ->set_data($data)
        //     ->set_layout('_layout')
        //     ->render();
    }

}
