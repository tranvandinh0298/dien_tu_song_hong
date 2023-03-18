<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends Admin_Controller
{
    // model instance
    public $category;
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model(
            [
                'Category_model',
            ]
        );
        $this->category = new Category_model();
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
            lang('category_management'),
            lang('category_list')
        ];
        $this->set_title(lang('category_management'))
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
    public function create()
    {
        $data = [];
        $data['breadcrumbs'] = [
            lang('category_management'),
            lang('add_category')
        ];
        if ($this->is_request_post()) {
            $input = $this->input->post();
            $data['input'] = $input;
            log_message('error', "-------------START STORING CATEGORY--------------");
            $rules = [
                'name' => $this->set_rules(
                    'name',
                    lang('name'),
                    'trim|required'
                ),
                'status' => $this->set_rules(
                    'status',
                    lang('status'),
                    'trim|required'
                ),
            ];
            $errors = $this->validate_fail($rules);
            // nếu không có lỗi thì tức là validate thành công
            if (empty($errors)) {
                log_message('error', 'validate thành công');
                // upload file ảnh
                $uploadResult = uploadImg('image', CATEGORY_IMAGE_UPLOAD_PATH);
                if (!empty($uploadResult['success'])) {
                    $insertData = [
                        'name' => $input['name'],
                        'alias' => toSlug($input['name']),
                        'image' => $uploadResult['fileName'],
                        'status' => $input['status'],
                    ];
                    if ($this->category->save($insertData)) {
                        log_message('error', 'Lưu thành công');
                        // redirect
                        redirectFlashMessage(lang('add_category_success'), ALERT_SUCCESS, 'category');
                    } else {
                        $data['errors'] = lang('add_category_fail');
                    }
                    log_message('error', "-------------END STORING CATEGORY--------------");
                } else {
                    $data['errors'] = $uploadResult['message'];
                }
            } else {
                $data['errors'] = $errors;
            }
            log_message('error', "-------------END STORING CATEGORY--------------");
        }

        // render
        $this->set_title(lang('add_category'))
            ->set_content('create')
            ->set_data($data)
            ->set_layout('_layout')
            ->render();
    }

    /**
     * function thêm mới
     * @author: dinhtv
     * @since 07/03/2023
     */
    public function edit($id)
    {
        $data = [];
        $data['category'] = $this->category->get_by_id($id);
        if (empty($data['category'])) {
            $this->redirect_flash_message(lang('category_not_found'), 'category');
        }
        $data['breadcrumbs'] = [
            lang('category_management'),
            lang('edit_category'),
            $data['category']->name,
        ];
        if ($this->is_request_post()) {
            $input = $this->input->post();
            $data['input'] = $input;
            log_message('error', "-------------START STORING CATEGORY--------------");
            $rules = [
                'name' => $this->set_rules(
                    'name',
                    lang('name'),
                    'trim|required'
                ),
                'status' => $this->set_rules(
                    'status',
                    lang('status'),
                    'trim|required'
                ),
            ];
            $errors = $this->validate_fail($rules);
            // nếu không có lỗi thì tức là validate thành công
            if (empty($errors)) {
                log_message('error', 'validate thành công');
                // upload file ảnh
                if ($_FILES["image"]["size"] > 0) {
                    $uploadResult = uploadImg('image', CATEGORY_IMAGE_UPLOAD_PATH);
                    if (!empty($uploadResult['success']))
                        $newImg = $uploadResult['fileName'];
                    else
                        $data['errors'] = $uploadResult['message'];
                }
                $updateData = [
                    'name' => $input['name'],
                    'alias' => toSlug($input['name']),
                    'status' => $input['status'],
                ];
                if (!empty($newImg))
                    $updateData['image'] = $newImg;
                if ($this->category->update_fields($id, $updateData)) {
                    log_message('error', 'Lưu thành công');
                    // redirect
                    redirectFlashMessage(lang('edit_category_success'), ALERT_SUCCESS, 'category');
                } else {
                    $data['errors'] = lang('edit_category_fail');
                }
                log_message('error', "-------------END STORING CATEGORY--------------");
            } else {
                $data['errors'] = $errors;
            }
            log_message('error', "-------------END STORING CATEGORY--------------");
        }

        // render
        $this->set_title(lang('edit_category'))
            ->set_content('edit')
            ->set_data($data)
            ->set_layout('_layout')
            ->render();
    }

    /**
     * function ngừng hoạt động
     * @author dinhtv
     * @since 10/03/2023
     */
    public function toggle($id)
    {
        $category = $this->category->get_by_id($id);
        $newStatus = !$category->status;
        if ($this->category->update_field($id, 'status', $newStatus)) {
            $msg = $newStatus ? lang('activate_category_success') : lang('deactivate_category_success');
            $type = ALERT_SUCCESS;
        } else {
            $msg = $newStatus ? lang('deactivate_category_fail') : lang('deactivate_category_fail');
            $type = ALERT_ERROR;
        }
        $this->redirect_flash_message($msg, 'category', $type);
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
            logHere($post);
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
            $list = $this->category->get_data($params);
            $total_filter = $this->category->count_data($params);
            $data = [];

            foreach ($list as $key => $item) {
                $row = [
                    numberOfRow($page, $length, $key),
                    $item->name,
                    showImg($item->image),
                    ($item->status == 0) ? showBadgeError('không hoạt động') : showBadgeSuccess('đang hoạt động'),
                    displayActiveButton('category/toggle/' . $item->id, $item->status),
                    displayEditButton('category/edit/' . $item->id)
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
