<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Web_profile_m extends MY_Model {
    public function  __construct() {
        parent::__construct();
        $this->table = 'web_profile';
    }

    public function get_profile() {
        $result = $this->get_all();
        if($result) {
            return $result[0];
        }
        return FALSE;
    }
}
