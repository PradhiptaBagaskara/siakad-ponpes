<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// if (php_sapi_name() === 'cli')  {
	// $config['base_url'] = '';
// } else {
	$config['base_url'] =  ((isset($_SERVER['HTTPS'] )) ? 'https://' : 'http://') 
							. $_SERVER['SERVER_NAME'] 
							. (($_SERVER['SERVER_PORT'] != 80 && $_SERVER['SERVER_PORT'] != 443) 
							? ':' . $_SERVER['SERVER_PORT'] : '');
// }
$config['index_page'] = '';
$config['uri_protocol']	= 'QUERY_STRING';
$config['url_suffix'] = '';
$config['language']	= 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-=';
$config['allow_get_array'] = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['log_threshold'] = 1;
$config['log_path'] = FCPATH . '/application/logs/';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = 'Jb5X1q9IAktoEJeDDT2c9J2atEQg6wSC';
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ruviedu_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;
$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;
$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = FALSE;
$config['csrf_protection'] = FALSE;
date_default_timezone_set('Asia/Jakarta');
$config['csrf_token_name'] = 'webstudiogt';
$config['csrf_cookie_name'] = 'webstudiogt';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();
$config['compress_output'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';