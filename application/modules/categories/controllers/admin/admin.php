<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {

    protected $validation_rules;

    public function __construct() {
        parent::__construct();
        $this->load->model('categories_m');
        $this->template->set_partial('side_menu', 'admin/side_menu');

        $this->validation_rules = array(
                array(
                        'field'   => 'main_id',
                        'label'   => 'Page List',
                        'rules'   => 'callback_main_category_dd_check'
                ),
                array(
                        'field'   => 'name',
                        'label'   => 'Category Name',
                        'rules'   => 'trim|required|max_length[20]|callback_category_name_check'
                )

        );
    }

    public function index() {
        $this->data->main_categories = $this->categories_m->get_main();
        $this->template->append_metadata(css('admin/dataTable.css'))->append_metadata(js('admin/jquery.dataTables.min.js'));
        $this->template->build('admin/index', $this->data);
    }

    public function get_sub($main_id = 0) {
        $data = array('sub_categories' => $this->categories_m->get_sub($main_id));
        echo $this->load->view('admin/sub_categories_list', $data, TRUE);
    }

    public function create() {
        $this->form_validation->set_rules($this->validation_rules);
        if ($this->form_validation->run()) {
            $result = $this->categories_m->insert(array(
                    'parent_id' => $this->input->post('main_id'),
                    'name' => $this->input->post('name')
            ));
            if ($result) {
                $this->session->set_flashdata('success', TRUE);
            } else {
                $this->session->set_flashdata('error', TRUE);
            }
            redirect('admin/categories');
        }
        $this->data->main_categories = $this->categories_m->get_main();
        foreach($this->validation_rules as $rule) {
            $category->{$rule['field']} = set_value($rule['field']);
        }
        $this->data->category =& $category;
        $this->template->build('admin/form', $this->data);
    }

    public function main_category_dd_check($val) {
        if(intval($val) <= 0) {
            $this->form_validation->set_message('main_category_dd_check', 'Please select a page.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function category_name_check($name) {
        if($this->categories_m->check_duplicate(array('name' => $name))) {
            $this->form_validation->set_message('category_name_check', 'The category name is used. Use another one');
            return FALSE;
        }
    }
}