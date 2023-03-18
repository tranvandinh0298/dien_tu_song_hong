<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Lang extends MY_Controller
	{

		public function __construct()
		{
			parent::__construct();
		}

		public function load($files)
		{
			$files = explode('-', $files);
			if (count($files) > 0) {
				$lang_text = '';
				foreach ($files as $file) {
					$this->lang->load(trim($file),$this->session->public_lang_full);
					foreach ($this->lang->language as $key => $lang) {
						$lang = $this->quotes_to_entities($lang);
						$lang_text .= "language['" . $key . "'] = '" . $lang . "';";
					}
				}
				print $lang_text;
				exit;
			}
		}

		function quotes_to_entities($str)
		{
			return str_replace(array("\'", "\"", "'", '"'), array("&#39;", "&quot;", "&#39;", "&quot;"), $str);
		}

		public function single_file_lang($langfile, $idiom = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '')
		{
			$base_language = 'en';
			if (is_array($langfile)) {
				foreach ($langfile as $value) {
					$this->load($value, $idiom, $return, $add_suffix, $alt_path);
				}

				return;
			}

			$langfile = str_replace('.php', '', $langfile);

			if ($add_suffix === TRUE) {
				$langfile = preg_replace('/_lang$/', '', $langfile) . '_lang';
			}

			$langfile .= '.php';

			if (empty($idiom) or !preg_match('/^[a-z_-]+$/i', $idiom)) {
				$config = &get_config();
				$idiom = empty($config['language']) ? $base_language : $config['language'];
			}

			if ($return === FALSE && isset($this->is_loaded[$langfile]) && $this->is_loaded[$langfile] === $idiom) {
				return;
			}

			// load the default language first, if necessary
			// only do this for the language files under system/
			$basepath = SYSDIR . 'language/' . $base_language . '/' . $langfile;
			if (($found = file_exists($basepath)) === TRUE) {
				include($basepath);
			}

			// Load the base file, so any others found can override it
			$basepath = BASEPATH . 'language/' . $idiom . '/' . $langfile;
			if (($found = file_exists($basepath)) === TRUE) {
				include($basepath);
			}

			// Do we have an alternative path to look in?
			if ($alt_path !== '') {
				$alt_path .= 'language/' . $idiom . '/' . $langfile;
				if (file_exists($alt_path)) {
					include($alt_path);
					$found = TRUE;
				}
			} else {
				foreach (get_instance()->load->get_package_paths(TRUE) as $package_path) {
					$package_path .= 'language/' . $idiom . '/' . $langfile;
					if ($basepath !== $package_path && file_exists($package_path)) {
						include($package_path);
						$found = TRUE;
						break;
					}
				}
			}
			return $lang;
		}
	}
