<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends Model {

    protected $table = "";

    public function __construct() {
        parent::Model();
    }

    public function get_all($sort = 'id', $order = 'asc') {
        $this->db->order_by($sort, $order);
		$query = $this->db->get($this->table);
		return $query->result_array();
    }

    public function get_by_id($id = 0) {
        $query = $this->db->get_where($this->table, array('id' => $id));
        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return FALSE;
    }

    public function get_first() {
        $this->db->order_by('id', 'asc')->limit(1);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return FALSE;
    }

    public function get_many_by($where = array(), $sort = 'id', $order = 'asc') {
        $this->db->where($where)->order_by($sort, $order);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

    public function insert($data = array()) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id = 0, $data = array()) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id = 0) {
        return $this->db->delete($this->table, array('id' => $id));
    }

    public function check_duplicate($where = array()) {
        if($this->get_many_by($where)) {
            return TRUE;
        }
        return FALSE;
    }
}