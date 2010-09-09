<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class News_m extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'news';
    }

    public function get_news_datatable($offset = 0, $limit = 0, $sort = array(), $filter = "") {
        if($this->category_enable) {
            return $this->get_for_datatable(
                array('title', 'category', 'publish_date', 'status', 'id'),
                $offset, $limit, $sort, $filter
            );
        }
        
        return $this->get_for_datatable(
            array('title', 'publish_date', 'status', 'id'),
            $offset, $limit, $sort, $filter
        );
    }

    public function get_news_list() {
        $this->db->select('id, title, slug')
            ->from($this->table)
            ->where('status', 'live')
            ->order_by('publish_date', 'desc')
            ->order_by('title', 'asc');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        
        return FALSE;
    }

    public function get_news_list_by_category() {
        $cate_sql = 'select c1.id, c1.name from categories c join categories c1 on c.id = c1.parent_id where c.name = ? order by c1.weight';
        $cate_result = $this->db->query($cate_sql, array('news'));

        $news_list = array();
        
        if($cate_result->num_rows() > 0) {
            foreach($cate_result->result() as $cate) {
                $this->db->select('id, title, slug')
                    ->from($this->table)
                    ->where(array('status' => 'live', 'category' => $cate->id))
                    ->order_by('publish_date', 'desc')
                    ->order_by('title', 'asc');
                $query = $this->db->get();

                if($query->num_rows() > 0) {
                    $news_list[] = array('category' => $cate->name, 'news' => $query->result_array());
                }
            }
        } else {
            return $this->get_news_list();
        }

        return $news_list;
    }

    public function get_latest_news() {
        $this->db->from($this->table)
            ->where('status', 'live')
            ->order_by('publish_date', 'desc')
            ->order_by('title', 'asc')
            ->limit(1);

        $query = $this->db->get();
        
        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    public function get_rss($post_num) {
        $this->db->from($this->table)
            ->where('status', 'live')
            ->order_by('publish_date', 'desc')
            ->order_by('title', 'asc')
            ->limit($post_num);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
}