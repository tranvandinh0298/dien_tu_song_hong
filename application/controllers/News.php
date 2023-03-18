<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        redirect('tin-tuc/nen-lua-chon-khoa-dien-tu-nhu-the-nao-cho-khach-san-resort');
    }

    public function first()
    {
        $data = [];
        $this->set_title('NÊN LỰA CHỌN KHÓA ĐIỆN TỬ NHƯ THẾ NÀO CHO KHÁCH SẠN, RESORT')
            ->set_content('news/first')
            ->set_data($data)
            ->set_layout('_layout')
            ->render();
    }
    public function second()
    {
        $data = [];
        $this->set_title('MINIBAR LÀ GÌ? TẠI SAO HIỆN NAY CÁC KHÁCH SẠN ĐỀU SỬ DỤNG ?')
            ->set_content('news/second')
            ->set_data($data)
            ->set_layout('_layout')
            ->render();
    }
    public function third()
    {
        $data = [];
        $this->set_title('TẠI SAO CÁC KHÁCH SẠN THƯỜNG SỬ DỤNG KÉT SẮT KHÓA ĐIỆN TỬ?')
            ->set_content('news/third')
            ->set_data($data)
            ->set_layout('_layout')
            ->render();
    }
}
