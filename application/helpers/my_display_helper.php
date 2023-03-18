<?php

/**
 * display helper
 * dev: dinhtv
 * created date: 25/2/2022
 * updated date: 25/2/2022
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('listStatusActive')) {
	/**
	 * Trả về trạng thái hoạt động/ không hoạt động
	 */
	function listStatusActive()
	{
		return  [
			0 => 'Inactive',
			1 => 'Active',
		];
	}
}
if (!function_exists('listStatusActiveBO')) {
	/**
	 * Trả về trạng thái hoạt động/ không hoạt động
	 */
	function listStatusActiveBO()
	{
		return [
			0 => '<p class="text-center m-0"><span class="badge badge-sm bg-gradient-secondary">Ngừng hoạt động</span></p>',
			1 => '<p class="text-center m-0"><span class="badge badge-sm bg-gradient-success">Hoạt động</span></p>',
		];
	}
}
if (!function_exists('listStatusDelete')) {
	/**
	 * Trả về trạng thái xóa/ không xóa
	 */
	function listStatusDelete()
	{
		return  [
			0 => 'Non deleted',
			1 => 'Deleted',
		];
	}
}
if (!function_exists('listTransStatus')) {
	/**
	 * Trả về trạng thái giao dịch
	 */
	function listTransStatus()
	{
		return  [
			TRANS_STATUS_PENDING => [
				'class' => 'class="result result--warning"',
				'icon' => '<i class="fas fa-exclamation-circle"></i>',
				'message' => '<p>' . lang('transaction_pending') . '</p>'
			],
			TRANS_STATUS_SUCCESS => [
				'class' => 'class="result result--success"',
				'icon' => '<i class="far fa-check-circle"></i>',
				'message' => '<p>' . lang('transaction_success') . '</p>'
			],
			TRANS_STATUS_FAIL => [
				'class' => 'class="result result--error"',
				'icon' => '<i class="fas fa-exclamation-circle"></i>',
				'message' => '<p>' . lang('transaction_fail') . '</p>'
			],
			TRANS_STATUS_WAITING => [
				'class' => 'class="result result--warning"',
				'icon' => '<i class="fas fa-exclamation-circle"></i>',
				'message' => '<p>' . lang('transaction_waiting') . '</p>'
			]
		];
	}
}
if (!function_exists('listPaymentMethod')) {
	function listPaymentMethod()
	{
		return [];
	}
}
if (!function_exists('showMessage')) {
	/**
	 * Hiển thị thông báo tương ứng với các danh sách trạng thái trả về
	 */
	function showMessage($key, $helperStatus)
	{
		$list = $helperStatus();
		return !empty($list[$key]) ? $list[$key] : '';
	}
}
if (!function_exists('showMoney')) {
	/**
	 * Hiển thị số tiền
	 */
	function showMoney($money)
	{
		return number_format($money) . ' <span class="txt-lower">đ</span>';
	}
}

if (!function_exists('showCenter')) {
	function showCenter($value, $nowrap = '')
	{
		return "<div class='text-center " . (empty($nowrap) ? 'nowrap' : '') . "'>" . $value . "</div>";
	}
}

if (!function_exists('showSuccess')) {
	function showSuccess($value, $nowrap = '')
	{
		return "<span style='color:#3C763D' class='" . (empty($nowrap) ? 'nowrap' : '') . "'>" . $value . "</span>";
	}
}
if (!function_exists('showError')) {
	function showError($value, $nowrap = '')
	{
		return "<span style='color:#D71921' class='" . (empty($nowrap) ? 'nowrap' : '') . "'>" . $value . "</span>";
	}
}

if (!function_exists('showBadgeSuccess')) {
	function showBadgeSuccess($text)
	{
		return '<span class="badge badge-success">' . $text . '</span>';
	}
}
if (!function_exists('showBadgeError')) {
	function showBadgeError($text)
	{
		return '<span class="badge badge-danger">' . $text . '</span>';
	}
}
if (!function_exists('showImg')) {
	function showImg($value, $big = false)
	{
		$class = $big ? 'big-logo' : 'logo';
		return "<img class='" . $class . "' src='" . base_url($value) . "'>";
	}
}

if (!function_exists('numberOfRow')) {
	function numberOfRow($page, $length, $index)
	{
		return ($page - 1) * $length + $index + 1;
	}
}
