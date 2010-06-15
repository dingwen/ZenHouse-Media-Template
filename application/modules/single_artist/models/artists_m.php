<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class artists_m extends MY_Model {
    public function  __construct() {
        parent::__construct();
        $this->table = 'artists';
    }

    public function index() {
        
    }
}