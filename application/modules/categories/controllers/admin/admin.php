<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->model('categories_m');
	}
	
	public function index() {
        $this->data->main_categories = $this->categories_m->get_main();
        $this->template->append_metadata(css('admin/dataTable.css'))->append_metadata(js('admin/jquery.dataTables.min.js'));
        $this->template->set_partial('side_menu', 'admin/side_menu');
		$this->template->build('admin/index', $this->data);
	}

    public function get_sub($main_id = 0) {
        $data = array('sub_categories' => $this->categories_m->get_sub($main_id));
        echo $this->load->view('admin/sub_categories_list', $data, TRUE);
    }
}