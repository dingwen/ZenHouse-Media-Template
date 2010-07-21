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
}