<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Public_Controller extends MY_Controller {

    protected $data;
    protected $category_enable;
    protected $theme_view_path;
    protected $theme_image_path;
    protected $theme_css_path;
    protected $web_profile_data;
    protected $web_settings_data;

    public function  __construct() {
        parent::__construct();

        $this->load->config('zhm_config');
        $this->category_enable = $this->config->item('categories_enable');
        $this->data->category_enable = $this->category_enable;

        // Template configuration
        $this->template->enable_parser(FALSE);
        $this->template->set_theme('fairview');
        $this->template->set_layout('layout');
        $this->theme_view_path = "../themes/fairview/views/";
        $this->theme_image_path = APPPATH_URI . 'themes/fairview/images/';
        $this->theme_css_path = APPPATH_URI . 'themes/fairview/css/';
        $this->theme_flash_path = APPPATH_URI . 'themes/fairview/flash/';
        $this->theme_js_path = APPPATH_URI . 'themes/fairview/js/';

        $this->data->theme_image_path = $this->theme_image_path;
        $this->data->theme_flash_path = $this->theme_flash_path;
        $this->data->web_profile = $this->cache->get('web_profile');
        $this->data->web_settings = $this->cache->get('web_settings');
        
        // Build general meta data, javascript, css and other information
        
        $this->template->title($this->data->web_profile['meta_title']);

        if(isset($this->data->web_settings['google_analytics_enable']) AND $this->data->web_settings['google_analytics_enable']) {
            if(!empty($this->data->web_settings['google_analytics'])){
                $this->template->append_metadata($this->load->view('fragments/google_analytics', array('google_analytics' => $this->data->web_settings['google_analytics']) ,true));
            }
        }
        
        $this->template->set_metadata('description', $this->data->web_profile['meta_description'], 'meta')
                ->set_metadata("", $this->theme_css_path.'style.css', 'css')
                ->set_metadata("", $this->theme_css_path.'fairview.css', 'css')
                ->set_metadata("", $this->theme_css_path.'2_col.css', 'css');

        // set general page partial elements.
        
        $this->template->set_partial('header', $this->theme_view_path.'layouts/header', FALSE);
		$this->template->set_partial('nav', $this->theme_view_path.'layouts/nav', FALSE);
        $this->template->set_partial('footer', $this->theme_view_path.'layouts/footer', FALSE);
    }
}