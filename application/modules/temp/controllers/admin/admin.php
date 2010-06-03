<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$data = array('temp' => 'This is temp module.');
        $this->template->set_partial('side_menu', 'admin/side_menu');
		$this->template->build('admin/index', $data);
	}
}