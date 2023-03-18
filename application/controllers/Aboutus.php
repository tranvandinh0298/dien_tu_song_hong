<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aboutus extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data = [];

        $this->set_title(lang('aboutus'))
            ->set_content('pages/aboutus')
            ->set_data($data)
            ->set_layout('_layout')
            ->render();
    }

    public function history()
    {
        $data = [];

        $this->set_title(lang('history'))
            ->set_content('pages/history')
            ->set_data($data)
            ->set_layout('_layout')
            ->render();
    }
}
