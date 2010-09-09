<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| General Settings
|--------------------------------------------------------------------------
*/
$config['categories_enable'] = TRUE;
$config['gallery_category_enable'] = TRUE;

/*
|--------------------------------------------------------------------------
| Image Gallery Settings
|--------------------------------------------------------------------------
*/
$config['image_settings'] = array(
    'image_library' => 'gd2',
    'width' => 615,
    'height' => 413,
    'thumb_width' => 80,
    'thumb_height' => 80
);

/*
|--------------------------------------------------------------------------
| Web Profile Settings
|--------------------------------------------------------------------------
*/
$config['web_profile_phone_limit'] = 3;
$config['web_profile_email_limit'] = 3;

/*
|--------------------------------------------------------------------------
| Social Media Link Settings
|--------------------------------------------------------------------------
*/
$config['social_media_limit'] = 5;
$config['social_meida_types'] = array('facebook', 'twitter', 'myspace', 'youtube', 'vimeo');

/*
|--------------------------------------------------------------------------
| Artist Profile Settings
|--------------------------------------------------------------------------
*/
$config['artist_phone_limit'] = 3;
$config['artist_email_limit'] = 3;
$config['artist_phone_types'] = array('cell', 'fax', 'phone');