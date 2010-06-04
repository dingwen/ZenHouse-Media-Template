<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin_Controller extends MY_Controller {

    protected $data;

    public function  __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // Template configuration
        $this->template->set_layout('admin/layout');
        $this->template->enable_parser(FALSE);

        // Build general meta data, javascript, css and other information
        $this->template->title('ZenHouse Media Artist Site Control Panel');

        $this->template->append_metadata(css('admin/admin.css'))->append_metadata(js('admin/admin.js'));

        // set general page partial elements.
        $this->template->set_partial('header', 'admin/partials/header', FALSE);
		$this->template->set_partial('nav', 'admin/partials/nav', FALSE);
        $this->template->set_partial('footer', 'admin/partials/footer', FALSE);
    }
}