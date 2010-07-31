<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Abouts_m extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'abouts';
    }

    public function get_first_about() {
        $this->db->from($this->table)->where('status', 'live')->order_by('weight')->limit(1);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return FALSE;
    }

    public function get_about_list() {
        $this->db->select('title, link_name, slug')->from($this->table)->where('status', 'live')->order_by('weight');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

    public function get_abouts_datatable($offset = 0, $limit = 0, $sort = array(), $filter = "") {
        if ($this->category_enable) {
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

    public function get_abouts_sort_list() {
        $temp = array();

        if ($this->category_enable) {
            $sql = 'select a.id as a_id, a.title as title, c.id as c_id, c.name as c_name, c.weight as c_weight, a.weight as a_weight '
                    . ' from abouts a join categories c on a.category = c.id'
                    . ' order by c_weight, c_id, a_weight';

            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $current_category = "";
                $category = array();
                $articles = array();
                foreach ($query->result() as $row) {
                    if (empty($current_category)) {
                        $category['id'] = $row->c_id;
                        $category['name'] = $row->c_name;
                        $current_category = $row->c_name;
                    } elseif($current_category != $row->c_name) {
                        $temp[] = array('category' => $category, 'articles' => $articles);
                        $category['id'] = $row->c_id;
                        $category['name'] = $row->c_name;
                        $current_category = $row->c_name;
                        $articles = array();
                    }
                    $articles[] = array('id' => $row->a_id, 'title' => $row->title);
                }
                $temp[] = array('category' => $category, 'articles' => $articles);
                return $temp;
            }
        } else {
            $this->db->select(array('id', 'title'));
            $this->db->order_by('weight');
            $query = $this->db->get($this->table);

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $temp[] = array('id'=>$row->id, 'title'=>$row->title);
                }
                return $temp;
            }
        }
        return $temp;
    }
}