<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slide extends Admin_Controller
{
    // model instance
    public $category;
    public $slide;
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model(
            [
                'Category_model',
                'Slide_model'
            ]
        );
        $this->category = new Category_model();
        $this->slide = new Slide_model();
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
            lang('banner_management'),
            lang('banner_list')
        ];
        $this->set_title(lang('banner_management'))
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
            lang('banner_management'),
            lang('add_banner')
        ];
        if ($this->is_request_post()) {
            $input = $this->input->post();
            $data['input'] = $input;
            log_message('error', "-------------START STORING SLIDE--------------");
            $rules = [
                'name' => $this->set_rules(
                    'name',
                    lang('name'),
                    'trim'
                ),
                'description' => $this->set_rules(
                    'description',
                    lang('description'),
                    'trim'
                ),
                'category_id' => $this->set_rules(
                    'category_id',
                    lang('category'),
                    'trim'
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
                $uploadImage = uploadImg('image', SLIDE_IMAGE_UPLOAD_PATH);
                $uploadMobileImage = uploadImg('mobile_image', SLIDE_IMAGE_UPLOAD_PATH);
                if (!empty($uploadImage['success']) && !empty($uploadMobileImage['success'])) {
                    $insertData = [
                        'name' => $input['name'],
                        'description' => $input['description'],
                        'image' => $uploadImage['fileName'],
                        'mobile_image' => $uploadMobileImage['fileName'],
                        'status' => $input['status'],
                        'category_id' => !empty($input['category_id']) ? $input['category_id'] : null,
                    ];
                    if ($this->slide->save($insertData)) {
                        log_message('error', 'Lưu thành công');
                        // redirect
                        redirectFlashMessage(lang('add_banner_success'), ALERT_SUCCESS, 'slide');
                    } else {
                        $data['errors'] = lang('add_banner_fail');
                    }
                    log_message('error', "-------------END STORING SLIDE--------------");
                } else {
                    $data['errors'] = $uploadImage['message'];
                }
            } else {
                $data['errors'] = $errors;
            }
            log_message('error', "-------------END STORING SLIDE--------------");
        }

        $data['categories'] = $this->category->get_data(
            [
                'where' => ['status' => RECORD_ACTIVE]
            ]
        );

        // render
        $this->set_title(lang('add_banner'))
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

        $data['slide'] = $this->slide->get_by_id($id);
        if (empty($data['slide'])) {
            $this->redirect_flash_message(lang('banner_not_found'), 'slide');
        }
        $data['breadcrumbs'] = [
            lang('banner_management'),
            lang('edit_banner'),
            $data['slide']->name,
        ];

        if ($this->is_request_post()) {
            $input = $this->input->post();
            $data['input'] = $input;
            log_message('error', "-------------START STORING SLIDE--------------");
            $rules = [
                'name' => $this->set_rules(
                    'name',
                    lang('name'),
                    'trim'
                ),
                'description' => $this->set_rules(
                    'description',
                    lang('description'),
                    'trim'
                ),
                'category_id' => $this->set_rules(
                    'category_id',
                    lang('category'),
                    'trim'
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
                if ($_FILES["image"]["size"] > 0 || $_FILES["mobile_image"]["size"] > 0) {
                    // upload file ảnh
                    $uploadImage = uploadImg('image', SLIDE_IMAGE_UPLOAD_PATH);
                    if (!empty($uploadImage['success'])) {
                        $newImg = $uploadImage['fileName'];
                    } else {
                        $data['errors'] = $uploadImage['message'];
                    }
                    $uploadMobileImage = uploadImg('mobile_image', SLIDE_IMAGE_UPLOAD_PATH);
                    if (!empty($uploadMobileImage['success'])) {
                        $newMobileImg = $uploadMobileImage['fileName'];
                    } else {
                        $data['errors'] = $uploadMobileImage['message'];
                    }
                }
                $updateData = [
                    'name' => $input['name'],
                    'description' => $input['description'],
                    'status' => $input['status'],
                    'category_id' => !empty($input['category_id']) ? $input['category_id'] : null,
                ];
                if (!empty($newImg)) {
                    $updateData['image'] = $newImg;
                }
                if (!empty($newMobileImg)) {
                    $updateData['mobile_image'] = $newMobileImg;
                }

                if ($this->slide->update_fields($id, $updateData)) {
                    log_message('error', 'Lưu thành công');
                    // redirect
                    redirectFlashMessage(lang('edit_banner_success'), ALERT_SUCCESS, 'slide');
                } else {
                    $data['errors'] = lang('edit_banner_fail');
                }
                log_message('error', "-------------END STORING SLIDE--------------");
            } else {
                $data['errors'] = $errors;
            }
            log_message('error', "-------------END STORING SLIDE--------------");
        }

        $data['categories'] = $this->category->get_data(
            [
                'where' => ['status' => RECORD_ACTIVE]
            ]
        );

        // render
        $this->set_title(lang('edit_banner'))
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
        $slide = $this->slide->get_by_id($id);
        $newStatus = !$slide->status;
        if ($this->slide->update_field($id, 'status', $newStatus)) {
            $msg = $newStatus ? lang('activate_banner_success') : lang('deactivate_banner_success');
            $type = ALERT_SUCCESS;
        } else {
            $msg = $newStatus ? lang('deactivate_banner_fail') : lang('deactivate_banner_fail');
            $type = ALERT_ERROR;
        }
        $this->redirect_flash_message($msg, 'slide', $type);
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
            $list = $this->slide->get_data($params);
            $total_filter = $this->slide->count_data($params);
            $data = [];

            foreach ($list as $key => $item) {
                $category = null;
                $category = $this->category->get_by_id($item->category_id);
                $row = [
                    numberOfRow($page, $length, $key),
                    $item->name,
                    showImg($item->image, true),
                    ($item->status == 0) ? showBadgeError('không hoạt động') : showBadgeSuccess('đang hoạt động'),
                    !empty($category) ? $category->name : 'Dùng làm quảng cáo trên trang chủ',
                    displayActiveButton('slide/toggle/' . $item->id, $item->status),
                    displayEditButton('slide/edit/' . $item->id)
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
