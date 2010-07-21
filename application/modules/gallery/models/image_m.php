<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Image_m extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'images';
    }

    public function get_by_gallery_id($gallery_id = 0) {
        return $this->get_many_by(array('gallery_id' => $gallery_id), 'weight');
    }

    public function delete_gallery($gallery_id = 0) {
        $images = $this->get_by_gallery_id($gallery_id);
        foreach($images as $image) {
            $this->delete($image['id']);
        }
    }

    public function delete_image($id = 0, $gallery_folder = "") {
        if($id < 1 OR empty ($gallery_folder)) {
            return FALSE;
        } else {
            $image = $this->get_by_id($id);
            $image_path = $_SERVER['DOCUMENT_ROOT'].$gallery_folder.$image['image_name'];
            $image_thumb_path = $this->thumbnail_path($image_path);
            if(file_exists($image_path)) {
                unlink($image_path);
            }

            if(file_exists($image_thumb_path)) {
                unlink($image_thumb_path);
            }
            return $this->delete($id);
        }
    }

    private function thumbnail_path($image_path = "") {
        $path_parts = pathinfo($image_path);
        $path_parts['filename'] = $path_parts['filename'].'_thumb';
        return $path_parts['dirname'].'/'.$path_parts['filename'].'.'.$path_parts['extension'];
    }
}