<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends Admin_Controller
{
    // model instance
    public $setting;
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model(
            [
                'Setting_model'
            ]
        );
        $this->setting = new Setting_model();
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
            lang('settings'),
            lang('common_setting')
        ];
        if ($this->is_request_post()) {
            $input = $this->input->post();
            $data['input'] = $input;
            logHere($input);
            log_message('error', "-------------START STORING CATEGORY--------------");
            $rules = [
                'email' => $this->set_rules(
                    'email',
                    'Email',
                    'trim|required'
                ),
                'phone' => $this->set_rules(
                    'phone',
                    'Số điện thoại',
                    'trim|required'
                ),
                'telephone' => $this->set_rules(
                    'telephone',
                    'Số điện thoại bàn',
                    'trim|required'
                ),
                'fax' => $this->set_rules(
                    'fax',
                    'fax',
                    'trim|required'
                ),
                'skype' => $this->set_rules(
                    'skype',
                    'skype',
                    'trim|required'
                ),
                'address' => $this->set_rules(
                    'address',
                    'address',
                    'trim|required'
                ),
            ];
            $errors = $this->validate_fail($rules);
            // nếu không có lỗi thì tức là validate thành công
            if (empty($errors)) {
                log_message('error', 'validate thành công');

                $this->setting->update_fields_where(['name' => 'email'], ['value' => $input['email']]);
                $this->setting->update_fields_where(['name' => 'phone'], ['value' => $input['phone']]);
                $this->setting->update_fields_where(['name' => 'telephone'], ['value' => $input['telephone']]);
                $this->setting->update_fields_where(['name' => 'fax'], ['value' => $input['fax']]);
                $this->setting->update_fields_where(['name' => 'skype'], ['value' => $input['skype']]);
                $this->setting->update_fields_where(['name' => 'address'], ['value' => $input['address']]);

                redirectFlashMessage("Chỉnh sửa cấu hình thành công", ALERT_SUCCESS, 'setting');
                log_message('error', "-------------END STORING CATEGORY--------------");
            } else {
                $data['errors'] = $errors;
            }
            log_message('error', "-------------END STORING CATEGORY--------------");
        }

        $data['settings'] = [
            'email' => $this->setting->get_data(['where' => ['name' => 'email']], RETURN_TYPE_FIRST),
            'phone' => $this->setting->get_data(['where' => ['name' => 'phone']], RETURN_TYPE_FIRST),
            'telephone' => $this->setting->get_data(['where' => ['name' => 'telephone']], RETURN_TYPE_FIRST),
            'fax' => $this->setting->get_data(['where' => ['name' => 'fax']], RETURN_TYPE_FIRST),
            'skype' => $this->setting->get_data(['where' => ['name' => 'skype']], RETURN_TYPE_FIRST),
            'address' => $this->setting->get_data(['where' => ['name' => 'address']], RETURN_TYPE_FIRST),
        ];

        // render
        $this->set_title(lang('common_setting'))
            ->set_content('index')
            ->set_data($data)
            ->set_layout('_layout')
            ->render();
    }
}
