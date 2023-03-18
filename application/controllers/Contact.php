<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends Public_Controller
{
	// public $slide;
	// public $category;
	public $contact;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Contact_model']);

		$this->contact = new Contact_model();
	}

	public function index()
	{
		$data = [];

		if ($this->is_request_post()) {
			$input = $this->input->post();
			$data['input'] = $input;
			logHere($input);
			log_message('error', "-------------START STORING CATEGORY--------------");
			$rules = [
				'name' => $this->set_rules(
					'name',
					'Tiêu đề',
					'trim|required'
				),
				'email' => $this->set_rules(
					'email',
					'Mô tả',
					'trim|required'
				),
				'phone' => $this->set_rules(
					'phone',
					'Danh mục sản phẩm',
					'trim|required'
				),
				'message' => $this->set_rules(
					'message',
					'Tin nhắn',
					'trim|required'
				),
			];
			$errors = $this->validate_fail($rules);
			// nếu không có lỗi thì tức là validate thành công
			if (empty($errors)) {
				log_message('error', 'validate thành công');

				$insertData = [
					'name' => $input['name'],
					'email' => $input['email'],
					'phone' => $input['phone'],
					'message' => $input['message'],
				];
				if ($this->contact->save($insertData)) {
					log_message('error', 'Lưu thành công');
					// redirect
					$data['success'] = 'Tin nhắn đã được gửi thành công';
				} else {
					$data['errors'] = 'Gửi tin nhắn thất bại, vui lòng thử lại sau.';
				}
				log_message('error', "-------------END STORING CATEGORY--------------");
			} else {
				$data['errors'] = $errors;
			}
			log_message('error', "-------------END STORING CATEGORY--------------");
		}

		$this->set_title(lang('contact'))
			->set_content('pages/contact')
			->set_data($data)
			->set_layout('_layout')
			->render();
	}
}
