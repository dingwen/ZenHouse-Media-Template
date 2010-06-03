<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Asset Directory
|--------------------------------------------------------------------------
|
| Absolute path from the webroot to your CodeIgniter root. Typically this will be your APPPATH,
| WITH a trailing slash:
|
|	/assets/
|
*/

// This crazy line means it will use the app path whether its in the web root or not
// Feel free to change this to something more normal lookin!
// $config['asset_dir'] = parse_url(config_item('base_url'), PHP_URL_PATH).'/';
$config['asset_dir'] = APPPATH_URI;


/*
|--------------------------------------------------------------------------
| Asset URL
|--------------------------------------------------------------------------
|
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/assets/
|
*/

// Right now its pointing to the same place as the base_url.
$config['asset_url'] = config_item('base_url') . APPPATH . 'assets/';

/*
|--------------------------------------------------------------------------
| Asset Sub-folders
|--------------------------------------------------------------------------
|
| Names for the img, js and css folders. Can be renamed to anything
|
| asset_img_dir = 'img';
| asset_js_dir = 'js';
| asset_css_dir = 'css';
|
*/
$config['asset_img_dir'] = 'images';
$config['asset_js_dir'] = 'js';
$config['asset_css_dir'] = 'css';

?>