<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends Controller {
    public function  __construct() {
        parent::Controller();

        // make base_url, base_uri and apppath_uri gloabl.
        $global['base_url']			= BASE_URL;
        $global['base_uri'] 		= BASE_URI;
        $global['application_uri'] 	= APPPATH_URI;
        $this->load->vars('global', $global);
    }

    public function get_web_settings() {
        $settings = $this->cache->get('web_settings');
        if(!empty($settings)) {
            return $settings;
        }
        return FALSE;
    }

    public function get_web_profile() {
        $settings = $this->cache->get('web_profile');
        if(!empty($settings)) {
            return $settings;
        }
        return FALSE;
    }
}