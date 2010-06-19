<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class news_m extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'news';
    }

    public function get_news_datatable($offset = 0, $limit = 0, $sort = array(), $filter = "") {
        $this->load->config('zhm_config');
        $category_enable = $this->config->item('categories_enable');
        
        if($category_enable) {
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
}