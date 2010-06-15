<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class contact_m extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'contact';
        $this->load->config('zhm_config');
    }

    public function get_phone_limit() {
        return $this->config->item('web_profile_email_limit');
    }

    public function get_email_limit() {
        return $this->config->item('web_profile_phone_limit');
    }
}
