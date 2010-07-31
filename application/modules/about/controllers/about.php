<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class About extends Public_Controller {
    public function  __construct() {
        parent::__construct();
        $this->load->model('abouts_m');
        $this->data->page_id = 'about';
    }

    public function index($slug = "") {
        $this->data->about_list = $this->abouts_m->get_about_list();
        if(empty($slug)) {
            $this->data->content = $this->abouts_m->get_first_about();
        } else {
            $this->data->content = $this->abouts_m->get_by_slug($slug);
        }
        $this->template->build('about', $this->data);
    }
}