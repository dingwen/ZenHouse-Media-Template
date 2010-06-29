<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Abouts_m extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'abouts';
    }

    public function get_abouts_datatable($offset = 0, $limit = 0, $sort = array(), $filter = "") {
        if($this->category_enable) {
            return $this->get_for_datatable(
                array('title', 'category', 'status', 'id'),
                $offset, $limit, $sort, $filter
            );
        }
        
        return $this->get_for_datatable(
            array('title', 'status', 'id'),
            $offset, $limit, $sort, $filter
        );
    }
}