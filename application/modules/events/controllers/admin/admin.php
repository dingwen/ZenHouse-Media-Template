<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

    protected $validation_rules;
    protected $events_id;

    public function __construct() {
        parent::__construct();

        $this->data->category_enable = & $this->category_enable;

        $this->template->set_partial('side_menu', 'admin/side_menu');

        $this->load->model('events_m');
        if ($this->category_enable) {
            $this->load->model('categories/categories_m');
            $this->data->categories = $this->categories_m->get_sub_by_main_name('events');
        }

//        $this->validation_rules = array(
//            array(
//                "field" => "title",
//                "label" => "Title",
//                "rules" => "trim|required|min_length[3]|max_length[250]|callback_title_check"
//            )
//        );

        $this->events_id = 0;
    }

    public function index() {
        $this->template->build('admin/index', $this->data);
    }

    public function create() {
        $this->template->build('admin/form', $this->data);
    }
}