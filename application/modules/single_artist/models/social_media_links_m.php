<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Social_media_links_m extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = "social_media_links";
    }

    public function get_social_media_types_dd() {
        $temp = $this->config->item('social_meida_types');
        $types = array();
        foreach($temp as $item) {
            $types[$item] = ucfirst($item);
        }
        return $types;
    }
}