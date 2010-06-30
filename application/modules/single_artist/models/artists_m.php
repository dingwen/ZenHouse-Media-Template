<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class artists_m extends MY_Model {
    public function  __construct() {
        parent::__construct();
        $this->table = 'artists';
    }

    public function get_artist_photo() {
        $result = $this->get_first();
        if($result) {
            return $result['photo'];
        }
        return "";
    }

    public function get_artist_phone_types_dd() {
        $temp = $this->config->item('artist_phone_types');
        $types = array();
        foreach($temp as $item) {
            $types[$item] = ucfirst($item);
        }
        return $types;
    }
}