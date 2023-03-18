<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends ADMIN_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * function bảng điều khiển
     * @author: dinhtv
     * createdDate: 21/02/2023
     * updatedDate: 21/02/2023
     */
    public function index()
    {
        redirect('auth/login');
    }

    /**
     * function đăng nhập màn hình quản lý
     * @author: dinhtv
     * createdDate: 21/02/2023
     * updatedDate: 21/02/2023
     */
    public function login()
    {
        $data = $input = [];
        if ($this->is_request_post()) {
            $input = $this->input->post();
            log_message('error', json_encode($input));
            log_message('error', "-------------START LOGIN--------------");
            $rules = [
                'username' => $this->set_rules(
                    'username',
                    lang('username'),
                    'trim|required|alpha_numeric'
                ),
                'password' => $this->set_rules(
                    'password',
                    lang('password'),
                    'trim|required'
                ),
            ];
            $error = $this->validate_fail($rules);
            // nếu không có lỗi thì tức là validate thành công
            if (empty($error)) {
                log_message('error', 'validate thành công');
                $remember = !empty($input['remember_login']) ? true : false;
                $account = $this->_verify_account($input['username'], $input['password'], $remember);
                if (!empty($account)) {
                    log_message('error', 'Đăng nhập tài khoản thành công');
                    log_message('error', "-------------END LOGIN--------------");
                    redirect('dashboard');
                } else {
                    log_message('error', 'Đăng nhập tài khoản thất bại');
                    $this->set_flash_message(lang('login_error'), ALERT_ERROR);
                }
            } else {
                $data['error'] = $error;
            }
            log_message('error', "-------------END LOGIN--------------");
        }
        $data['post'] = $input;
        // render
        $this->set_title('Đăng nhập')
            ->set_content('login')
            ->set_data($data)
            ->set_layout('_login_layout')
            ->render();
    }

    /**
     * function đăng xuất
     * @author: dinhtv
     * createdDate: 21/02/2023
     * updatedDate: 21/02/2023
     */
    public function logout()
    {
        log_message('error', 'Logout');
        // log_message('error', json_encode($_COOKIE));
        // log_message('error', json_encode($_SESSION));
        // remove all session variables
        session_unset();
        // set the expiration date to one hour ago
        setcookie("remember_login", "", time() - 3600);
        // log_message('error', 'End Logout');
        // log_message('error', json_encode($_COOKIE));
        // log_message('error', json_encode($_SESSION));
        redirect('auth/login');
    }

    /**
     * function xác thực tài khoản dành cho nội bộ epay
     * @param string $username
     * @param string $password
     * @param bool $remember
     * @return object|bool
     * createdDate: 21/02/2023
     * updatedDate: 21/02/2023
     */
    private function _verify_account($username, $password, $remember = null)
    {
        // get account
        $account = $this->user->get_account($username, ['active' => RECORD_ACTIVE]);
        if (empty($account)) {
            return FALSE;
        }

        $verify = password_verify($password, $account->password);
        if ($verify) {

            // set session 
            $this->set_session_login($account);

            // nếu người dùng có chọn remember me thì lưu thông tin đăng nhập vào cookie
            if (!empty($remember)) {
                $this->set_remember_login($account->id, $account->username);
            }
            // return account
            return $account;
        } else {
            return FALSE;
        }
    }
}
