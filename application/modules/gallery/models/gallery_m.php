<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_m extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'galleries';
    }

    public function get_datatable($offset = 0, $limit = 0, $sort = array(), $filter = "") {
        return $this->get_for_datatable(array('title', 'status', 'id'), $offset, $limit, $sort, $filter);
    }

    public function delete_gallery($id = 0) {
        if($id < 1) { return FALSE; }

        $gallery = $this->get_by_id($id);
        $gallery_path = set_realpath($_SERVER['DOCUMENT_ROOT'].APPPATH_URI.'uploads/galleries/'.$gallery['slug']);

        if(file_exists($gallery_path)) {
            // delete all the image files
            delete_files($gallery_path);
            // delete all the image entries
            rmdir($gallery_path);
        }

        return $this->delete($id);
    }

    public function get_gallery_with_category() {
        $category_sql = 'select c2.id, c2.name, c1.weight from `categories` c1 join `categories` c2 on c1.id = c2.parent_id where c1.name = ? order by c2.weight, c2.id';
        $gallery_sql = 'select `id`, `title`, `weight` from `galleries` where `status` = ? AND `category` = ? order by weight';

        $categories = $this->db->query($category_sql, 'gallery');

        $list = array();

        foreach($categories->result_array() as $category) {
            $galleries = $this->db->query($gallery_sql, array('live', $category['id']));
            $category['galleries'] = $galleries->result_array();
            $list[] = $category;
        }

        return $list;
    }
}