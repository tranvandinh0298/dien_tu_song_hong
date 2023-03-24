<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Public_Controller
{
	// public $slide;
	// public $category;
	public $product;
	public function __construct()
	{
		parent::__construct();
		// $this->load->model(['slide_model', 'Category_model', 'Product_model']);
		$this->load->model(['Product_model']);

		// $this->slide = new Slide_model();
		// $this->category = new Category_model();
		$this->product = new Product_model();
	}

	public function index()
	{
		$data = [];

		$data['slides'] = $this->slide->get_slides();
		$data['newestProducts'] = $this->product->get_data(
			[
				'limit' => 4,
				'where' => [
					'status' => RECORD_ACTIVE
				],
				'sort' => [
					'id' => 'DESC',
				]
			]
		);
		$data['products'] = $this->product->get_data(
			[
				'limit' => 8,
				'where' => [
					'status' => RECORD_ACTIVE
				],
				'sort' => [
					'feature' => 'DESC',
					'id' => 'ASC',
				]
			]
		);
		$this->set_title(lang('home'))
			->set_content('pages/home')
			->set_data($data)
			->set_layout('_layout')
			->render();
	}
}
