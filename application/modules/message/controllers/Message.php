<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message extends Admin_Controller
{
    // model instance
    public $contact;
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model(
            [
                'Contact_model',
            ]
        );
        $this->contact = new contact_model();
    }

    /**
     * function danh sách phân loại
     * @author dinhtv
     * @since 07/03/2023
     */
    public function index()
    {
        $data = [];
        $data['breadcrumbs'] = [
            lang('contact_list'),
        ];
        $this->set_title(lang('contact_list'))
            ->set_content('index')
            ->set_data($data)
            ->set_layout('_layout')
            ->render();
    }

    /**
     * function thêm mới
     * @author: dinhtv
     * @since 07/03/2023
     */
    public function detail($id)
    {
        $data = [];

        $data['contact'] = $this->contact->get_by_id($id);
        if (empty($data['contact'])) {
            $this->redirect_flash_message(lang('banner_not_found'), 'slide');
        }
        $this->contact->update_field($id, 'is_read', 1);
        $data['breadcrumbs'] = [
            lang('contact'),
            'Chi tiết tin nhắn',
        ];

        // render
        $this->set_title(lang('contact'))
            ->set_content('edit')
            ->set_data($data)
            ->set_layout('_layout')
            ->render();
    }

    /**
     * function get danh sách danh mục
     * @author: dinhtv
     * @since 07/03/2023
     */
    public function ajax_list()
    {
        if ($this->is_request_post()) {
            $post = $this->input->post();
            $length = !empty($post['length']) ? $post['length'] : 0;
            $no = !empty($post['start']) ? $post['start'] : 0;
            $page = $length > 0 ? ($no / $length + 1) : 1;
            $search = $post['search']['value'];

            $params = [
                'offset' => $no,
                'limit' => $length,
                'where' => [],
                'like' => [
                    'name' => $search
                ],
                'sort' => [
                    'id' => 'DESC',
                ]
            ];
            $list = $this->contact->get_data($params);
            $total_filter = $this->contact->count_data($params);
            $data = [];

            foreach ($list as $key => $item) {
                $row = [
                    numberOfRow($page, $length, $key),
                    $item->name,
                    $item->email,
                    $item->phone,
                    ($item->is_read == 0) ? showBadgeError('chưa đọc') : showBadgeSuccess('đã đọc'),
                    displayEditButton('message/detail/' . $item->id)
                ];
                array_push($data, $row);
            }
            $output = [
                "draw" => $this->input->post('draw'),
                "recordsTotal" => $total_filter,
                "recordsFiltered" => $total_filter,
                "data" => $data,
            ];

            //trả về json
            $this->return_json($output);
        }
    }
}
