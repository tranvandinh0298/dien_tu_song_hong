<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends Public_Controller
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

	/**
	 * function hiển thị chi tiết sản phẩm
	 * @author dinhtv
	 * @since 11/03/2023
	 */
	public function index($alias)
	{
		$data = [];

		$data['product'] = $this->product->get_by_alias($alias, '*', null, ['status' => RECORD_ACTIVE]);
		if (empty($data['product'])) {
			redirect('danh-muc');
		}
		$data['galleries'] = $this->product->get_gallery(
			$data['product']->id,
			[
				'status' => RECORD_ACTIVE,
				'type' => GALLERY_ILLUSTRATION
			]
		);
		$data['details'] = $this->product->get_gallery(
			$data['product']->id,
			[
				'status' => RECORD_ACTIVE,
				'type' => GALLERY_DETAIL
			]
		);
		$data['slide'] = $this->slide->get_data(
			[
				'where' => [
					'status' => RECORD_ACTIVE,
					'category_id' => $data['product']->category_id
				]
			],
			RETURN_TYPE_FIRST
		);
		// $data['categories'] = $this->category->get_data(['where' => ['status' => RECORD_ACTIVE], 'sort' => ['id' => 'ASC']]);
		$this->set_title($data['product']->name)
			->set_content('pages/detail')
			->set_data($data)
			->set_layout('_layout')
			->render();
	}

	/**
	 * function hiển thị danh sách sản phẩm tương ứng với từng danh mục sản phẩm
	 * @author dinhtv
	 * @since 11/03/2023
	 */
	public function category($alias = null)
	{
		$data = [];

		// danh mục đã chọn
		$data['category'] = $this->category->get_by_alias($alias);
		if (empty($data['category'])) {
			$data['category'] = $this->category->get_data(
				[
					'where' => [
						'status' => RECORD_ACTIVE
					]
				],
				RETURN_TYPE_FIRST
			);
		}
		// banner tương ứng
		$data['slide'] = $this->slide->get_data(
			[
				'where' => [
					'status' => RECORD_ACTIVE,
					'category_id' => $data['category']->id
				]
			],
			RETURN_TYPE_FIRST
		);
		// sản phảm tương ứng
		$data['products'] = $this->product->get_data(
			[
				'where' => [
					'status' => RECORD_ACTIVE,
					'category_id' => $data['category']->id
				]
			]
		);

		$this->set_title($data['category']->name)
			->set_content('pages/classify')
			->set_data($data)
			->set_layout('_layout')
			->render();
	}
}
