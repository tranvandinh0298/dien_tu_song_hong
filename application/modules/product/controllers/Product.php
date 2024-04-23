<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends Admin_Controller
{
    // model instance
    public $category;
    public $product;
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model(
            [
                'Category_model',
                'Product_model'
            ]
        );
        $this->category = new Category_model();
        $this->product = new Product_model();
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
            lang('product_management'),
            lang('product_list')
        ];
        $this->set_title(lang('product_management'))
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
            lang('product_management'),
            lang('add_product')
        ];
        if ($this->is_request_post()) {
            $input = $this->input->post();
            $data['input'] = $input;
            log_message('error', "-------------START STORING PRODUCT--------------");
            $rules = [
                'name' => $this->set_rules(
                    'name',
                    lang('name'),
                    'trim|required'
                ),
                'description' => $this->set_rules(
                    'description',
                    lang('description'),
                    'trim|required'
                ),
                'detail' => $this->set_rules(
                    'detail',
                    lang('detail'),
                    'trim'
                ),
                'category_id' => $this->set_rules(
                    'category_id',
                    lang('category'),
                    'trim|required'
                ),
                'status' => $this->set_rules(
                    'status',
                    lang('status'),
                    'trim|required'
                ),
                'feature' => $this->set_rules(
                    'feature',
                    lang('feature'),
                    'trim|required'
                ),
            ];
            $errors = $this->validate_fail($rules);
            // nếu không có lỗi thì tức là validate thành công
            if (empty($errors)) {
                log_message('error', 'validate thành công');
                // upload file ảnh
                $newestProduct = $this->product->get_data(['sort' => ['id' => 'DESC']], RETURN_TYPE_FIRST);
                $newInsertId = !empty($newestProduct) ? ++$newestProduct->id : 1;
                $uploadResult = uploadImg('image', PRODUCT_IMAGE_UPLOAD_PATH . "/" . $newInsertId);
                if (!empty($uploadResult['success'])) {
                    $insertData = [
                        'name' => $input['name'],
                        'note' => $input['note'],
                        'alias' => toSlug($input['name']),
                        'description' => $input['description'],
                        'detail' => $input['detail'],
                        'image' => $uploadResult['fileName'],
                        'status' => $input['status'],
                        'feature' => $input['feature'],
                        'category_id' => $input['category_id']
                    ];
                    if ($this->product->save($insertData)) {
                        log_message('error', 'Lưu thành công');
                        // redirect
                        redirectFlashMessage(lang('add_product_success'), ALERT_SUCCESS, 'product');
                    } else {
                        $data['errors'] = lang('add_product_fail');
                    }
                    log_message('error', "-------------END STORING PRODUCT--------------");
                } else {
                    $data['errors'] = $uploadResult['message'];
                }
            } else {
                $data['errors'] = $errors;
            }
            log_message('error', "-------------END STORING PRODUCT--------------");
        }

        $data['categories'] = $this->category->get_data(
            [
                'where' => ['status' => RECORD_ACTIVE]
            ]
        );

        // render
        $this->set_title(lang('add_product'))
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
        $data['product'] = $this->product->get_by_id($id);
        if (empty($data['product'])) {
            $this->redirect_flash_message(lang('product_not_found'), 'product');
        }
        $data['breadcrumbs'] = [
            lang('product_management'),
            lang('edit_product'),
            $data['product']->name,
        ];
        if ($this->is_request_post()) {
            $input = $this->input->post();
            $data['input'] = $input;
            log_message('error', "-------------START STORING PRODUCT--------------");
            $rules = [
                'name' => $this->set_rules(
                    'name',
                    lang('name'),
                    'trim|required'
                ),
                'description' => $this->set_rules(
                    'description',
                    lang('description'),
                    'trim|required'
                ),
                'detail' => $this->set_rules(
                    'detail',
                    lang('detail'),
                    'trim'
                ),
                'category_id' => $this->set_rules(
                    'category_id',
                    lang('category'),
                    'trim|required'
                ),
                'status' => $this->set_rules(
                    'status',
                    lang('status'),
                    'trim|required'
                ),
                'feature' => $this->set_rules(
                    'feature',
                    lang('feature'),
                    'trim|required'
                ),
            ];
            $errors = $this->validate_fail($rules);
            // nếu không có lỗi thì tức là validate thành công
            if (empty($errors)) {
                log_message('error', 'validate thành công');
                // upload file ảnh
                if ($_FILES["image"]["size"] > 0) {
                    $uploadResult = uploadImg('image', PRODUCT_IMAGE_UPLOAD_PATH . "/" . $data['product']->id);
                    if (!empty($uploadResult['success']))
                        $newImg = $uploadResult['fileName'];
                    else
                        $data['errors'] = $uploadResult['message'];
                }
                $updateData = [
                    'name' => $input['name'],
                    'note' => $input['note'],
                    'alias' => toSlug($input['name']),
                    'description' => $input['description'],
                    'detail' => $input['detail'],
                    'status' => $input['status'],
                    'feature' => $input['feature'],
                    'category_id' => $input['category_id']
                ];
                if (!empty($newImg))
                    $updateData['image'] = $newImg;
                if ($this->product->update_fields($id, $updateData)) {
                    log_message('error', 'Lưu thành công');
                    // redirect
                    redirectFlashMessage(lang('edit_product_success'), ALERT_SUCCESS, 'product');
                } else {
                    $data['errors'] = lang('edit_product_fail');
                }
                log_message('error', "-------------END STORING PRODUCT--------------");
            } else {
                $data['errors'] = $errors;
            }
            log_message('error', "-------------END STORING PRODUCT--------------");
        }

        $data['categories'] = $this->category->get_data(
            [
                'where' => ['status' => RECORD_ACTIVE]
            ]
        );

        // render
        $this->set_title(lang('edit_product'))
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
        $product = $this->product->get_by_id($id);
        $newStatus = !$product->status;
        if ($this->product->update_field($id, 'status', $newStatus)) {
            $msg = $newStatus ? lang('activate_product_success') : lang('deactivate_product_success');
            $type = ALERT_SUCCESS;
        } else {
            $msg = $newStatus ? lang('deactivate_product_fail') : lang('deactivate_product_fail');
            $type = ALERT_ERROR;
        }
        $this->redirect_flash_message($msg, 'product', $type);
    }

    /**
     * function thư viện ảnh
     * @author dinhtv
     * @since 11/03/2023
     */
    public function gallery($id)
    {
        $data = [];

        $data['product'] = $this->product->get_by_id($id);
        if (empty($data['product'])) {
            $this->redirect_flash_message(lang('product_not_found'), 'product');
        }
        $data['breadcrumbs'] = [
            lang('product_management'),
            lang('edit_product'),
            $data['product']->name,
            lang('gallery')
        ];
        $data['galleries'] = $this->product->get_gallery($id, ['type' => GALLERY_ILLUSTRATION]);

        $this->set_title(lang('gallery'))
            ->set_content('gallery')
            ->set_data($data)
            ->set_layout('_layout')
            ->render();
    }


    /**
     * function xóa ảnh thư viện ảnh
     * @author dinhtv
     * @since 11/03/2023
     */
    public function delete_image($imageId)
    {
        $image = $this->product->get_a_image($imageId);
        unlink($image->image);
        $result = $this->product->delete_image($imageId);
        if ($result) {
            $this->redirect_flash_message('Xóa ảnh thành công', $this->agent->referrer(), ALERT_SUCCESS);
        } else {
            $this->redirect_flash_message('Xóa ảnh thất bại', $this->agent->referrer());
        }
    }

    /**
     * function thư viện ảnh
     * @author dinhtv
     * @since 11/03/2023
     */
    public function detail($id)
    {
        $data = [];

        $data['product'] = $this->product->get_by_id($id);
        if (empty($data['product'])) {
            $this->redirect_flash_message(lang('product_not_found'), 'product');
        }
        $data['breadcrumbs'] = [
            lang('product_management'),
            lang('edit_product'),
            $data['product']->name,
            lang('gallery_detail')
        ];
        $data['galleries'] = $this->product->get_gallery($id, ['type' => GALLERY_DETAIL]);

        $this->set_title(lang('gallery_detail'))
            ->set_content('detail')
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
            $list = $this->product->get_data($params);
            $total_filter = $this->product->count_data($params);
            $data = [];

            foreach ($list as $key => $item) {
                $category = null;
                $category = $this->category->get_by_id($item->category_id);
                $row = [
                    numberOfRow($page, $length, $key),
                    $item->name,
                    showImg($item->image, true),
                    ($item->status == 0) ? showBadgeError('không hoạt động') : showBadgeSuccess('đang hoạt động'),
                    !empty($category) ? $category->name : '',
                    displayActiveButton('product/toggle/' . $item->id, $item->status),
                    displayGalleryButton('product/gallery/' . $item->id),
                    displayGalleryButton('product/detail/' . $item->id),
                    displayEditButton('product/edit/' . $item->id)
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

    /**
     * function upload ảnh dành cho sản phẩm
     * @author dinhtv
     * @since 11/03/2023
     */
    public function ajax_upload_image($id)
    {
        $fileName = $this->upload_product_image($id);
        if (!empty($fileName)) {
            $this->product->save_gallery(
                [
                    'product_id' => $id,
                    'image' => $fileName,
                    'type' => GALLERY_ILLUSTRATION,
                    'status' => RECORD_ACTIVE
                ]
            );
        }
    }

    /**
     * function upload ảnh dành cho sản phẩm
     * @author dinhtv
     * @since 11/03/2023
     */
    public function ajax_upload_detail($id)
    {
        $fileName = $this->upload_product_image($id);
        if (!empty($fileName)) {
            $this->product->save_gallery(
                [
                    'product_id' => $id,
                    'image' => $fileName,
                    'type' => GALLERY_DETAIL,
                    'status' => RECORD_ACTIVE
                ]
            );
        }
    }

    /**
     * function upload ảnh dành cho sản phẩm
     * @author dinhtv
     * @since 11/03/2023
     */
    private function upload_product_image($id)
    {
        if (!empty($_FILES)) {
            $tmpfiles = $_FILES['file']['tmp_name'];
            $mflname = $_FILES['file']['name'];
            $targetPath = PRODUCT_IMAGE_UPLOAD_PATH . "/" . $id . "/";
            $destination = $targetPath . $mflname;
            if (move_uploaded_file($tmpfiles, $destination)) {
                return $destination;
            };
        }
        return FALSE;
    }
}
