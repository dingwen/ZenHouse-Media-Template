<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class categories_m extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'categories';
    }

    public function get_main() {
        $result = $this->get_many_by(array('parent_id' => 0), 'name');
        if($result) {
            $temp = array('0' => 'Select a Page');
            foreach($result as $row) {
                $temp[$row['id']] = $row['name'];
            }
            return $temp;
        }
        return FALSE;
    }

    public function get_sub($main_id = 0) {
        if($main_id <= 0) { return FALSE; }
        return $this->get_many_by(array('parent_id' => $main_id), 'name');
    }
}
