<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Base URL
 * The page that we're linking to
 */
$config['base_url']        = '';

/**
 * Prefix
 * @var	string
 */
$config['prefix'] = '';

/**
 * Suffix
 * @var	string
 */
$config['suffix'] = '';

/**
 * Total number of items
 * @var	int
 */
$config['total_rows'] = 0;

/**
 * Number of links to show
 * Relates to "digit" type links shown before/after
 * the currently viewed page.
 * @var	int
 */
$config['num_links'] = 5;

/**
 * Items per page
 * @var	int
 */
$config['per_page'] = 10;

/**
 * Current page
 * @var	int
 */
$config['cur_page'] = 0;

/**
 * Use page numbers flag
 * Whether to use actual page numbers instead of an offset
 * @var	bool
 */
$config['use_page_numbers'] = TRUE;

/**
 * First link
 * @var	string
 */
$config['first_link'] = false;
// $config['first_link'] = 'First';
/**
 * Next link
 * @var	string
 */
$config['next_link'] = '<i class="fa-solid fa-arrow-right-long"></i>';

/**
 * Previous link
 * @var	string
 */
$config['prev_link'] = '<i class="fa-solid fa-arrow-left-long"></i>';

/**
 * Last link
 * @var	string
 */
// $config['last_link'] = 'Last';
$config['last_link'] = false;

/**
 * URI Segment
 * @var	int
 */
$config['uri_segment'] = 0;

/**
 * Full tag open
 * @var	string
 */
$config['full_tag_open'] = '<div class="pagination"><ul class="pagination__list">';

/**
 * Full tag close
 * @var	string
 */
$config['full_tag_close'] = '</ul></div>';

/**
 * First tag open
 * @var	string
 */
$config['first_tag_open'] = '<li class="pagination__item first">';

/**
 * First tag close
 * @var	string
 */
$config['first_tag_close'] = '</li>';

/**
 * Last tag open
 * @var	string
 */
$config['last_tag_open'] = '<li class="pagination__item last">';

/**
 * Last tag close
 * @var	string
 */
$config['last_tag_close'] = '</li>';

/**
 * First URL
 * An alternative URL for the first page
 * @var	string
 */
$config['first_url'] = '';

/**
 * Current tag open
 * @var	string
 */
$config['cur_tag_open'] = '<li class="pagination__item active">';

/**
 * Current tag close
 * @var	string
 */
$config['cur_tag_close'] = '</li>';

/**
 * Next tag open
 * @var	string
 */
$config['next_tag_open'] = '<li class="pagination__item next">';

/**
 * Next tag close
 * @var	string
 */
$config['next_tag_close'] = '</li>';

/**
 * Previous tag open
 * @var	string
 */
$config['prev_tag_open'] = '<li class="pagination__item previous">';

/**
 * Previous tag close
 * @var	string
 */
$config['prev_tag_close'] = '</li>';

/**
 * Number tag open
 * @var	string
 */
$config['num_tag_open'] = '<li class="pagination__item">';

/**
 * Number tag close
 * @var	string
 */
$config['num_tag_close'] = '</li>';

/**
 * Page query string flag
 * @var	bool
 */
$config['page_query_string'] = TRUE;

/**
 * Query string segment
 * @var	string
 */
$config['query_string_segment'] = 'page';

/**
 * Display pages flag
 * @var	bool
 */
$config['display_pages'] = TRUE;
/**
 * Reuse query string flag
 * @var	bool
 */
$config['reuse_query_string'] = FALSE;

/**
 * Use global URL suffix flag
 * @var	bool
 */
$config['use_global_url_suffix'] = FALSE;
