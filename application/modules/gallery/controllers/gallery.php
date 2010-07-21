<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends Public_Controller {
    public function  __construct() {
        parent::__construct();
        $this->load->model(array('gallery_m', 'image_m'));
        $this->data->page_id = 'gallery';
    }

    public function index($id = 0) {
        $galleries = $this->gallery_m->get_many_by(array('status' => 'live'), 'weight');
        
        if($id < 1) {
            $gallery = $galleries[0];
        } else {
            $gallery = $this->gallery_m->get_by_id($id);
        }

        $gallery_folder = APPPATH_URI.'uploads/galleries/'.$gallery['slug'].'/';

        $images = $this->image_m->get_many_by(array('gallery_id' => $gallery['id']), 'weight');
        $gallery_images = array();
        if($images) {
            foreach($images as $image) {
                $image['image_url'] = $gallery_folder.$image['image_name'];
                $image['image_thumb_url'] = $this->thumbnail_path($gallery_folder.$image['image_name']);
                $gallery_images[] = $image;
            }
        }

        $this->data->galleries = & $galleries;
        $this->data->gallery = & $gallery;
        $this->data->gallery_image = & $gallery_images;
        
        $this->template->set_metadata("", $this->theme_css_path.'gallery.css', 'css')
                ->append_metadata(js('jquery.galleriffic.js', 'gallery'))
                ->append_metadata(js('jquery.opacityrollover.js', 'gallery'));
        $this->template->set_partial('google_cdn', 'fragments/jquery_cdn', FALSE);
        $this->template->build('index', $this->data);
    }

    private function thumbnail_path($image_path = "") {
        $path_parts = pathinfo($image_path);
        $path_parts['filename'] = $path_parts['filename'].'_thumb';
        return $path_parts['dirname'].'/'.$path_parts['filename'].'.'.$path_parts['extension'];
    }
}