<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 * Admin Controller
 * @author dinhtv
 * createdDate: 31/01/2023
 * updatedDate: 22/02/2023
 */
class ADMIN_Controller extends PUBLIC_Controller
{
    // model instance
    protected $user;
    // user attribute
    public $_user;
    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model(
            [
                'User_model',
            ]
        );
        $this->user = new User_model();
        // load helper
        $this->load->helper('cookie');

        // view
        $this->_viewPath = 'private/';
        $this->_viewLayout = $this->_viewPath . '_layout';

        // check remember login
        $this->check_remember_login();
        // check authentication
        $this->check_auth();

        // load component
        $componentPath = $this->_viewPath . '_block/';
        $this->_viewComponents = [
            'alert' => $componentPath . 'alert',
            'header' => $componentPath . 'header',
            'sidebar' => $componentPath . 'sidebar',
            'footer' => $componentPath . 'footer',
            'page_header' => $componentPath . 'page_header',
        ];
        // logHere($this->_viewComponents);
    }

    /**
     * Kiểm tra xem đã đăng nhập chưa
     * @author dinhtv
     * @return void
     * createdDate: 01/02/2023
     * updatedDate: 01/02/2023
     */
    protected function check_auth()
    {
        log_message('error', '------------------START CHECK AUTH------------------------');
        /*
        $_SESSION['adminAccess'] = [
            'username' => 'admin',
            'phone' => '0396346204',
            'partnerId' => '',
            'schoolId' => '',
            'role' => 10,
        ];
        */
        // log_message('error', json_encode($_SESSION));
        $urlRedirect = 'auth/login';

        log_message('error', $this->_controller);
        log_message('error', $this->_method);

        // check authentication
        $adminAccess = !empty($_SESSION['adminAccess']) ? $_SESSION['adminAccess'] : null;
        // log_message('error', '$_COOKIE: ' . json_encode($_COOKIE));
        // log_message('error', '$_SESSION: ' . json_encode($_SESSION));
        if ($this->_method != 'forgot_password') {
            if (empty($adminAccess)) {
                if ($this->_method != 'login') {
                    log_message('error', 'Phiên làm việc đã hết hạn');
                    $this->redirect_flash_message('Phiên làm việc đã kết thúc, vui lòng đăng nhập', $urlRedirect);
                }
            } else {
                log_message('error', 'session adminAccess');
                if ($this->_method != 'login') {
                    // get current user
                    if (!empty($adminAccess['username']) && empty($this->_user)) {
                        log_message('error', "biến _user rỗng");
                        $this->_user = $this->user->get_current_account($adminAccess['username']);
                    }
                    // kiểm tra user đã đăng nhập hoặc tra cứu chưa
                    if (empty($this->_user)) {
                        $this->session->sess_destroy();
                        log_message("error", "check_auth fail -> logout");
                        log_message("error", "redirect back to login page");
                        log_message('error', '------------------END CHECK AUTH------------------------');
                        $this->redirect_flash_message('Thông tin đăng nhập không chính xác, vui lòng thử lại', $urlRedirect);
                    }
                } else {
                    redirect('dashboard');
                }
            }
        }
        log_message('error', '------------------END CHECK AUTH------------------------');
    }

    /**
     * function set_data
     * @author @dinhtv
     * @param array $data
     * @return Admin_Controller
     * createdDate: 22/02/2023
     * updatedDate: 22/02/2023
     */
    public function set_data($data)
    {
        $this->_viewData = array_merge(
            $data,
            [
                '_user' => $this->_user,
                '_controller' => $this->_controller,
                '_method' => $this->_method
            ]
        );
        return $this;
    }

    /**
     * function set_content
     * @author @dinhtv
     * @param string $content
     * @return Admin_Controller
     * createdDate: 22/02/2023
     * updatedDate: 22/02/2023
     */
    public function set_content($content)
    {
        $this->_viewContent = $content;
        return $this;
    }

    /**
     * function set session đăng nhập
     * @author dinhtv
     * @return mixed
     * createdDate: 22/02/2023
     * updatedDate: 22/02/2023
     */
    protected function set_session_login($account)
    {
        // set session 
        if (empty($_SESSION['adminAccess'])) {
            $_SESSION['adminAccess']['username'] = $account->username;
            $_SESSION['adminAccess']['role'] = $account->role;
        }
    }

    /**
     * function kiểm tra xem đã ghi nhớ đăng nhập trước đó hay chưa
     * @author dinhtv
     * createdDate: 22/02/2023
     * updatedDate: 22/02/2023
     */
    protected function check_remember_login()
    {
        if (!empty($_COOKIE['remember_login'])) {
            $cookieLogin = json_decode(get_cookie("remember_login"), true);
            $account = $this->user->get_account($cookieLogin['username'], ['active' => RECORD_ACTIVE]);
            // xác thực remember_code 
            if (
                password_verify($cookieLogin['remember_code'], $account->remember_code) &&
                (int) $account->expire_login_at >= time()
            ) {
                $this->set_session_login($account);
            } else {
                // xóa remember_code và expire_login_at khỏi account
                $this->user->update_fields(
                    $account->id,
                    [
                        'remember_code' => '',
                        'expire_login_at' => ''
                    ]
                );
                // xóa cookie
                delete_cookie('remember_login');
            }
        }
    }

    /**
     * function set cookie đăng nhập
     * @author dinhtv
     * createdDate: 23/02/2023
     * updatedDate: 23/02/2023
     */
    protected function set_remember_login($accountId, $username)
    {
        log_message('error', 'Tạo cookie đăng nhập');
        $rememberCode = $this->_get_random_token(16);
        $expireTime = time() + (30 * 24 * 60 * 60);
        // set cookie
        setcookie(
            'remember_login',
            json_encode(
                [
                    'username' => $username,
                    'remember_code' => $rememberCode
                ]
            ),
            $expireTime
        );
        // update account
        $this->user->update_fields(
            $accountId,
            [
                'remember_code' => password_hash($rememberCode, PASSWORD_DEFAULT),
                'expire_login_at' => $expireTime
            ]
        );
    }

    /**
     * function tạo 1 chuỗi ngẫu nhiên dành cho việc ghi nhớ đăng nhặp
     * @author dinhtv
     * @param $length: chiều dài chuỗi
     * createdDate: 22/02/2023
     * updatedDate: 22/02/2023
     */
    private function _get_random_token($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max)];
        }
        return $token;
    }

    private function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) {
            return $min; // not so random...
        }
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }
}
