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

    public function check_duplicate($where = array(), $id = 0) {
        if($this->get_many_by($where)) {
            return TRUE;
        }
        return FALSE;
    }

    public function count_all() {
        return $this->db->count_all($this->table);
    }

    public function get_for_datatable($sort_cols = array(), $offset = 0, $limit = 0, $sort = array(), $filter = "") {
        if(empty($sort_cols)) { return FALSE; }

        $this->db->select($sort_cols);

        $cols = array();
        if(!empty($filter)) {
            foreach($sort_cols as $col) {
                $cols[$col] = $filter;
            }
            $this->db->or_like($cols);
        }

        $data_count = $this->count_filtered_data($cols);

        if($data_count <= 0) { return FALSE; }

        if(!empty($sort)) {
            foreach($sort as $order) {
                $this->db->order_by($sort_cols[$order[0]], $order[1]);
            }
        }

        if($offset > 0 AND $limit > -1) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get($this->table);
        if($query->num_rows() > 0) {

            $rows = array_values($query->result_array());
            foreach($rows as $row) {
                $table_row[] = array_values($row);
            }
            return array($data_count, $table_row);
        }
        return FALSE;
    }

    public function count_filtered_data($cols = array()){
        if(empty($cols)) {
            return $this->count_all();
        }
        $query = $this->db->or_like($cols)->get($this->table);
        return $query->num_rows();
    }
}