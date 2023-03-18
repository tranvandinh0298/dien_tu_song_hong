<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  or define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// return data type
define('RETURN_TYPE_OBJECT', 'OBJECT');
define('RETURN_TYPE_ARRAY', 'ARRAY');
define('RETURN_TYPE_FIRST', 'FIRST');

// active status
define('RECORD_ACTIVE',1);
define('RECORD_INACTIVE',0);

// deleted status
define('RECORD_DELETE',1);
define('RECORD_NON_DELETE',0);

// transaction's status
define('TRANS_STATUS_PENDING', 0);
define('TRANS_STATUS_SUCCESS', 1);
define('TRANS_STATUS_FAIL', 2);
define("TRANS_STATUS_WAITING", 3);

// Data temps status
define('DATATEMP_WAITING', 0);
define('DATATEMP_PROCEED', 1);

// MGP resut code
define('MGP_RESULT_SUCCESS', '00_000');
define('MGP_RESULT_WAITING', '00_005');
define('MGP_RESULT_PENDING', '99');

define('LIMIT_PER_PAGE', 10);

// crypt
define('CRYPT_RETURN_BASE64','BASE64');
define('CRYPT_RETURN_HEX','HEX');

// method
define('METHOD_POST', true);
define('METHOD_GET', false);

// message type
define('MESSAGE_TYPE_SUCCESS', 'SUCCESS');
define('MESSAGE_TYPE_WARNING', 'WARNING');
define('MESSAGE_TYPE_ERROR', 'ERROR');

// language
define('LANGUAGE_VIETNAMESE', 'VIETNAMESE');
define('LANGUAGE_ENGLISH', 'ENGLISH');
define('LANGUAGE_KOREAN', 'KOREAN');

// payment methods
define("METHOD_ATM", '{payType:"DC",bankCode:""}');
define("METHOD_VISA", '{payType:"IC",bankCode:""}');
define("METHOD_ZALO", '{payType:"EW",bankCode:"ZALO"}');
define("METHOD_MOMO", '{payType:"EW",bankCode:"MOMO"}');
define("METHOD_BANK_TRANSFER", '{payType:"VA",bankCode:""}');
define("METHOD_MOCA", '{payType:"EW",bankCode:"MOCA"}');
define("METHOD_SHOPEEPAY", '{payType:"EW",bankCode:"SHPP"}');
define("METHOD_VIETTELPAY", '{payType:"EW",bankCode:"VTTP"}');
define("METHOD_VNPAYQR", '{payType:"QR",bankCode:""}');
define("METHOD_INSTALLMENT", '{payType:"IS",bankCode:""}');

// login 
define("LOGIN_CONTROLLER", 'AUTHENTICATION');
define("LOGIN_METHOD", 'LOGIN');

// image
define("PRODUCT_IMAGE_UPLOAD_PATH", "public/assets/images/products");
define("CATEGORY_IMAGE_UPLOAD_PATH", "public/assets/images/categories");
define("SLIDE_IMAGE_UPLOAD_PATH", "public/assets/images/slides");

// message type
define("ALERT_WARNING", "WARNING");
define("ALERT_SUCCESS", "SUCCESS");
define("ALERT_ERROR", "ERROR");

// components
define("COMPONENT_CSS","CSS");
define("COMPONENT_JS","JS");
define("COMPONENT_ICON","JCON");
define("COMPONENT_IMG","IMG");

// gallery
define("GALLERY_ILLUSTRATION", 0);
define("GALLERY_DETAIL", 1);
