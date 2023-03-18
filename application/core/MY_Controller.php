<?php defined('BASEPATH') or exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

/**
 * HMVC Controller
 * @author dinhtv
 * createdDate: 30/01/2023
 * updatedDate: 30/01/2023
 */
class MY_Controller extends MX_Controller
{
    // class & method
    public $_controller;
    public $_method;

    // information
    public $_info = [
        'settings' => [],
        'langCode' => '',
    ];

    // view
    public $_viewData = [];
    public $_viewTitle = '';
    public $_viewPath = '';
    public $_viewLayout = '';
    public $_viewContent = '';
    public $_viewComponents = [];
    function __construct()
    {
        parent::__construct();

        // Load library
        if (version_compare(CI_VERSION, '2.1.0', '<')) {
            $this->load->library('security');
        }
        // load library
        $this->load->library(
            [
                'email',
                'form_validation',
                'ftp',
                'image_lib',
                'javascript',
                // 'migration',
                'pagination',
                'parser',
                'session',
                'table',
                'trackback',
                'typography',
                'unit_test',
                'user_agent',
                'xmlrpc',
                'zip'
            ]
        );

        // load helper
        $this->load->helper(
            [
                // default helper
                'array',
                'captcha',
                'cookie',
                'date',
                'directory',
                'download',
                'email',
                'file',
                'form',
                'html',
                'inflector',
                'language',
                'number',
                'path',
                'security',
                'smiley',
                'string',
                'text',
                'typography',
                'url',
                'xml',
                // custom helper
                'my_crypt',
                'my_curl',
                'my_display',
                'my_email',
                'my_form',
                'my_language',
                'my_load',
                'my_response',
                'my_string',
                'my_log',
                'my_upload',
            ]
        );

        // load helper
        $this->load->helper(['my_load']);

        // load config
        $this->load->config('languages');

        // set language
        $langCode = $this->input->get('lang');
        $langCnf = $this->config->item('cms_lang_cnf');
        $this->_info['langCode'] = !empty($langCode) && !empty($langCnf[$langCode]) ?
            $langCode : $this->config->item('default_language');
        if (empty($langCnf[$this->_info['langCode']])) {
            $this->_info['langCode'] = array_keys($langCnf)[0];
        }
        $this->load->language(['frontend'], $langCnf[$this->_info['langCode']]);
    }

    /**
     * function gửi request API và nhận response
     * @author dinhtv
     * @param array|string $dataRequest
     * @param string $url
     * @param string ignore_utf8
     * @param bool $writeLog
     * @param []|null $headers
     * @return string
     * createdDate: 28/04/2022
     * updatedDate: 30/01/2023
     */
    public function send_request($dataRequest, $url, $ignore_utf8 = false, $writeLog = true, $headers = null, $methodPost = true)
    {
        $ch = curl_init();
        if ($methodPost) {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url . "?" . $dataRequest);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataRequest);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 180);
        curl_setopt($ch, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
        try {
            $result = curl_exec($ch);
            if ($ignore_utf8) {
                $result = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($result));
            }
            $curlErrno = curl_errno($ch);
            $curlError = curl_error($ch);
            if ($result === false || $curlErrno > 0 || $curlError) {
                log_message('error', 'API - curlErrno: ' . $curlError);
                curl_close($ch);
                return $curlErrno;
            } else {
                if ($writeLog)
                    log_message('error', 'API - curlResult: ' . $result);
                curl_close($ch);
                return $this->clean_response($result);
            }
        } catch (Exception $e) {
            log_message('error', $e);
            return $e;
        }
    }

    /**
     * function gửi Email
     * @author: dinhtv
     * createdDate: 07/09/2022
     * updatedDate: 12/02/2023
     */
    public function _send_email($title, $message, $email, $files)
    {
        log_message('error', 'send email here');
        $this->load->library('email');
        $this->email->clear(TRUE);
        //SMTP & mail configuration
        $config = array(
            'protocol'  => 'smtp',
            'smtp_crypto' => 'tls',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => SMTP_USER,
            'smtp_pass' => SMTP_PASS,
            'smtp_timeout' => 180,
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->email->initialize($config);
        // $this->email->set_mailtype('html');
        // $this->email->set_newline('\r\n');
        $this->email->to($email);
        $this->email->from(SMTP_USER, 'Cổng thu học phí School Portal');

        log_message('error', $title);
        $this->email->subject($title);
        $this->email->message($message);
        if (!empty($files)) {
            $attach_files = explode(',', $files);
            if (is_array($attach_files) && !empty($attach_files)) {
                foreach ($attach_files as $file) {
                    log_message('error', 'tên file : ' . $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $file);
                    $attach = $this->email->attach($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $file);
                    if ($attach) {
                        log_message('error', 'Gửi file thành công');
                    } else {
                        log_message('error', 'Gửi file thất bại');
                    }
                }
            }
        }
        //Send email
        $result = $this->email->send();
        if (!$result) {
            log_message('error', $this->email->print_debugger());
        }
        return $result;
    }

    /**
     * function xóa các ký tự bất hợp lệ kèm theo response
     * @author dinhtv
     * @param string $str
     * @return string
     * createdDate: 28/04/2022
     * updatedDate: 30/01/2023
     */
    private function clean_response($str)
    {
        $str = preg_replace(
            '/
			  ^
			  [\pZ\p{Cc}\x{feff}]+
			  |
			  [\pZ\p{Cc}\x{feff}]+$
			 /ux',
            '',
            $str
        );
        return $str;
    }

    /**
     * function: lấy thông tin cài đặt
     * @author dinhtv
     * @param string $key
     * @return array|null
     * createdDate: 30/01/2023
     * updatedDate: 30/01/2023
     */
    public function get_setting($key = '')
    {
        if (isset($this->_info['settings'][$key])) {
            return $this->_info['settings'][$key];
        }
        return null;
    }

    /**
     * trả về response dạng Json
     * @param mixed $data
     * @return never
     */
    public function return_json($data = null)
    {
        log_message('error', 'return as Json');
        log_message('error', json_encode($data));
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * function redirect with alert message
     * @author dinhtv
     * @param string @message
     * @param string @link
     * @param string $type: success|warning|error
     */
    public function redirect_flash_message($message, $link, $type = ALERT_ERROR)
    {
        $this->set_flash_message($message, $type);
        redirect($link);
    }

    /**
     * function set alert message
     * @author dinhtv
     * @param string @message
     * @param string $type: success|warning|error
     */
    public function set_flash_message($message, $type = ALERT_ERROR)
    {
        $this->session->set_flashdata(
            'alert',
            json_encode(
                [
                    'message' => $message,
                    'type' => $type
                ],
                JSON_UNESCAPED_UNICODE
            )
        );
    }

    /**
     * function runValidate
     * @param array $rules
     * @return void|string
     */
    public function validate_fail($rules = [], $returnAsJson = FALSE)
    {
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run($this) === FALSE) {
            log_message('error', 'validate thất bại');
            log_message('error', validation_errors());
            return $returnAsJson ?
                $this->return_json(
                    [
                        'success' => FALSE,
                        'message' => lang('validate_fail'),
                        'formErrors' => validation_errors()
                    ]
                ) :
                validation_errors();
        }
    }

    /**
     * function setRule dành cho việc validate
     * @param string $field
     * @param string $label
     * @param string $rules
     * @param array|null $errors
     * @return array
     */
    public function set_rules($field, $label, $rules, $errors = [])
    {
        // set rules
        $set_rules = [
            'field' => $field,
            'label' => $label,
            'rules' => $rules,
        ];
        // custom error message
        if (!empty($errors))
            $set_rules['errors'] = $errors;
        // return rules
        return $set_rules;
    }

    /**
     * function kiểm tra xem request có phải POST không
     * @return bool
     */
    public function is_request_post()
    {
        return $this->input->server('REQUEST_METHOD') === 'POST';
    }

    /**
     * function kiểm tra xem request có phải GET không
     * @return bool
     */
    public function is_request_get()
    {
        return $this->input->server('REQUEST_METHOD') === 'GET';
    }

    /**
     * function set_title
     * @author @dinhtv
     * @param string $content
     * @return MY_Controller
     * createdDate: 02/02/2023
     * updatedDate: 02/02/2023
     */
    public function set_title($title)
    {
        $this->_viewTitle = $title;
        return $this;
    }

    /**
     * function set_content
     * @author @dinhtv
     * @param string $content
     * @return MY_Controller
     * createdDate: 02/02/2023
     * updatedDate: 02/02/2023
     */
    public function set_content($content)
    {
        $this->_viewContent = $this->_viewPath . $content;
        return $this;
    }

    /**
     * function set_data
     * @author @dinhtv
     * @param array $data
     * @return MY_Controller
     * createdDate: 02/02/2023
     * updatedDate: 02/02/2023
     */
    public function set_data($data)
    {
        $this->_viewData = $data;
        return $this;
    }

    /**
     * function set_layout
     * @author @dinhtv
     * @param string $layout
     * @return MY_Controller
     * createdDate: 02/02/2023
     * updatedDate: 02/02/2023
     */
    public function set_layout($layout)
    {
        $this->_viewLayout = $this->_viewPath . $layout;
        return $this;
    }

    /**
     * function set_component
     * @author @dinhtv
     * @param array
     * @return MY_Controller
     * createdDate: 02/02/2023
     * updatedDate: 02/202/2023
     */
    public function set_component($components)
    {
        if (!empty($component)) {
            foreach ($components as $component => $view) {
                $this->_viewComponents[$component] = $this->_viewPath . $view;
            }
        }
        return $this;
    }

    /**
     * function render UI
     * @author @dinhtv
     * @return void
     * createdDate: 02/02/2023
     * updatedDate: 02/02/2023
     */
    public function render()
    {
        log_message('error', json_encode($this->_viewData));
        // log_message('error', json_encode($_SESSION));
        $this->load->view(
            $this->_viewLayout,
            [
                'title' => $this->_viewTitle,
                'content' => $this->_viewContent,
                'data' => $this->_viewData,
                'components' => $this->_viewComponents,
                'info' => $this->_info
            ]
        );
    }
}

/**
 * Public Controller
 * @author dinhtv
 * createdDate: 31/01/2023
 * updatedDate: 31/01/2023
 */
class PUBLIC_Controller extends MY_Controller
{
    protected $category;
    protected $setting;
    protected $slide;
    public function __construct()
    {
        parent::__construct();

        $this->load->model(
            [
                'Category_model',
                'Setting_model',
                'Slide_model'
            ]
        );
        $this->category = new Category_model();
        $this->setting = new Setting_model();
        $this->slide = new Slide_model();

        $this->_viewPath = 'public/';
        $this->_viewLayout = $this->_viewPath . '_layout';

        // controller & method
        $this->_controller = $this->router->fetch_class();
        $this->_method = $this->router->fetch_method();

        // log_message('error', $this->_controller);
        // log_message('error', $this->_method);

        // load components into view
        if (empty($this->_viewComponents)) {
            $componentPath = $this->_viewPath . '_block/';
            $this->_viewComponents = [
                'meta' =>  $componentPath . 'meta',
                'header' =>  $componentPath . 'header',
                'banner' =>  $componentPath . 'banner',
                'footer' =>  $componentPath . 'footer',
                'sidebar' => $componentPath . 'sidebar',
                'aside' => $componentPath . 'aside',
                'alert' => $componentPath . 'alert',
            ];
        }
    }

    /**
     * function set_data
     * @author @dinhtv
     * @param array $data
     * @return Public_Controller
     * createdDate: 02/02/2023
     * updatedDate: 22/02/2023
     */
    public function set_data($data)
    {
        $this->_viewData = array_merge(
            $data,
            [
                // '_user' => $this->_user,
                // '_bill' => $this->_bill,
                // '_school' => $this->_school,
                'categories' => $this->category->get_data(['where' => ['status' => RECORD_ACTIVE], 'sort' => ['id' => 'ASC']]),
                'settings' => [
                    'email' => $this->setting->get_data(['where' => ['name' => 'email']], RETURN_TYPE_FIRST)->value,
                    'phone' => $this->setting->get_data(['where' => ['name' => 'phone']], RETURN_TYPE_FIRST)->value,
                    'telephone' => $this->setting->get_data(['where' => ['name' => 'telephone']], RETURN_TYPE_FIRST)->value,
                    'fax' => $this->setting->get_data(['where' => ['name' => 'fax']], RETURN_TYPE_FIRST)->value,
                    'skype' => $this->setting->get_data(['where' => ['name' => 'skype']], RETURN_TYPE_FIRST)->value,
                    'address' => $this->setting->get_data(['where' => ['name' => 'address']], RETURN_TYPE_FIRST)->value,
                ]
            ]
        );
        return $this;
    }
}
