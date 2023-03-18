<?php

/**
 * Config
 * Dev: dinhtv
 * Date: 23/02/2012
 */
$root = str_replace('\\', '/', dirname(__FILE__));
$domain = $_SERVER['HTTP_HOST'];
$script_name = str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
$domain .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
$base = "http://" . $domain;
if (!empty($_SERVER['HTTPS'])) $base = "https://" . $domain;
define('BASE_URL', $base);
define('BASE_ADMIN_URL', $base . "admin/");

define('VERSION', '1.1.9');

// CONFIG EMAIL
define('SMTP_USER','nhomdoisoat@vnptepay.com.vn');
define('SMTP_PASS','xrkqsbqyegmptrqj');

//CONFIG BASE
define('CMS_VERSION', '4.3');
define('MAINTAIN_MODE', FALSE); //Bảo trì
define('DEBUG_MODE', FALSE);
define('CACHE_MODE', FALSE);
define('CACHE_TIMEOUT_LOGIN', 1800);

