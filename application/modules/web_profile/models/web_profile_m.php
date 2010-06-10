<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Web_profile_m extends MY_Model {
    public function  __construct() {
        parent::__construct();
        $this->table = 'web_profile';
    }

    public function get_profile() {
        $result = $this->get_first();
        if($result) {
            return $result;
        }
        return FALSE;
    }

    public function get_homepage_file() {
        $result = $this->get_first();
        if($result) {
            return $result['homepage_file'];
        }
        return FALSE;
    }

    public function get_web_profile() {
        $this->load->library('cache');
        return $this->cache->get('web_profile');
    }
}
