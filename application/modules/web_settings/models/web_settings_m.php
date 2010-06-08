<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Web_settings_m extends MY_Model {
    public function  __construct() {
        parent::__construct();
        $this->table = 'web_settings';
    }
}
