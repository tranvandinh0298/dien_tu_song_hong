<?php
/**
 * Language for form validation
 * dev: dinhtv
 * created date: 23/2/2022
 * updated date: 23/2/2022
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['form_validation_required']		= '{field} là bắt buộc';
$lang['form_validation_isset']			= ' Trường {field} phải có một giá trị.';
$lang['form_validation_valid_email']		= ' Trường {field} không đúng định dạng.';
$lang['form_validation_valid_emails']		= ' Trường {field} phải chứa tất cả địa chỉ Email hợp lệ.';
$lang['form_validation_valid_url']		= ' Trường {field} phải chứa một URL hợp lệ.';
$lang['form_validation_valid_ip']		= ' Trường {field} phải chứa một địa chỉ IP hợp lệ.';
$lang['form_validation_min_length']		= ' Trường {field} phải có ít nhất {param} ký tự.';
$lang['form_validation_max_length']		= ' Trường {field} không thể vượt quá {param} ký tự.';
$lang['form_validation_exact_length']		= ' Trường {field} phải đúng {param} ký tự.';
$lang['form_validation_alpha']			= ' Trường {field} chỉ sử dụng các ký tự trong bảng chữ cái.';
$lang['form_validation_alpha_numeric']		= ' Trường {field} chỉ sử dụng các ký tự trong bảng chữ cái và số.';
$lang['form_validation_alpha_numeric_spaces']	= ' Trường {field} chỉ sử dụng các ký tự trong bảng chữ cái, chữ số và khoảng trắng.';
$lang['form_validation_alpha_dash']		= ' Trường {field} chỉ sử dụng các ký tự  bảng chữ cái, chữ số, gạch dưới và gạch ngang.';
$lang['form_validation_numeric']		= ' Trường {field} chỉ sử dụng các ký tự là chữ số.';
$lang['form_validation_is_numeric']		= ' Trường {field} phải chứa các ký tự là số.';
$lang['form_validation_integer']		= ' Trường {field} phải chứa một số Nguyên.';
$lang['form_validation_regex_match']		= ' Trường {field} sai định dạng.';
$lang['form_validation_matches']		= ' Trường {field} không đúng với {param}.';
$lang['form_validation_differs']		= ' Trường {field} phải khác với {param} .';
$lang['form_validation_is_unique'] 		= ' Trường {field} đã tồn tại.';
$lang['form_validation_is_natural']		= ' Trường {field} chỉ chấp nhận số tự nhiên.';
$lang['form_validation_is_natural_no_zero']	= ' Trường {field} dữ liệu nhập vào phải là số tự nhiên và lớn hơn không.';
$lang['form_validation_decimal']		= ' Trường {field} dữ liệu nhập vào phải là số thập phân.';
$lang['form_validation_less_than']		= ' Trường {field} phải nhỏ hơn {param}.';
$lang['form_validation_less_than_equal_to']	= ' Trường {field} phải nhỏ hơn hoặc bằng {param}.';
$lang['form_validation_greater_than']		= ' Trường {field} phải lớn hơn {param}.';
$lang['form_validation_greater_than_equal_to']	= ' Trường {field} phải lớn hơn hoặc bằng {param}.';
$lang['form_validation_error_message_not_set']	= 'Không thể xác định thông báo lỗi với trường {field}.';
$lang['form_validation_in_list']		= ' Trường {field} phải là một trong: {param}.';
$lang['form_validation_html_title'] = 'Trường {field} không được chứa các thẻ html';
$lang['form_validation_password']           = ' Trường {field} phải tối thiểu 8 ký tự, bao gồm chữ số, chữ cái và ký tự đặc biệt';
