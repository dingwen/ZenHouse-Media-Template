<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Events_m extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'events';
    }
}