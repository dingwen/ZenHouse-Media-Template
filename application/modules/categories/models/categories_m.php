<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class categories_m extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'categories';
    }

    public function get_main() {
        $result = $this->get_many_by(array('parent_id' => 0), 'name');
        if($result) {
            $temp = array('' => 'Select a Page');
            foreach($result as $row) {
                $temp[$row['id']] = $row['name'];
            }
            return $temp;
        }
        return FALSE;
    }

    public function get_sub_by_main_name($main = "", $by_weight = FALSE) {
        if(empty($main)) { return FALSE; }
        if($by_weight) {
            $sql = "select cc.id as id, cc.name as name, cc.weight as weight from `categories` c join `categories` cc on c.id = cc.parent_id where c.name = ? order by `weight`";
        } else {
            $sql = "select cc.id as id, cc.name as name from `categories` c join `categories` cc on c.id = cc.parent_id where c.name = ? order by `name`";
        }
        $query = $this->db->query($sql, array($main));
        if($query->num_rows() > 0) {
            $temp = array('' => 'Select a Categroy');
            foreach($query->result() as $row) {
                $temp[$row->id] = $row->name;
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
