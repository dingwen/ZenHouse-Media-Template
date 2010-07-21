<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin_Controller extends MY_Controller {

    protected $data;
    protected $category_enable;

    public function  __construct() {
        parent::__construct();

        $logged_in = $this->session->userdata('logged_in');

        if(!$logged_in) {
            redirect('users/login');
            exit;
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->config('zhm_config');
        $this->category_enable = $this->config->item('categories_enable');
        $this->data->category_enable = $this->category_enable;

        // Template configuration
        $this->template->set_layout('admin/layout');
        $this->template->enable_parser(FALSE);

        // Build general meta data, javascript, css and other information
        $this->template->title('ZenHouse Media CMS Control Panel');

        $this->template->append_metadata(css('admin/admin.css'))
                ->append_metadata(css('admin/form.css'))
                ->append_metadata(js('admin/admin.js'));

        // set general page partial elements.
        $this->template->set_partial('google_cdn', 'fragments/jquery_cdn', FALSE);
        $this->template->set_partial('header', 'admin/partials/header', FALSE);
		$this->template->set_partial('nav', 'admin/partials/nav', FALSE);
        $this->template->set_partial('footer', 'admin/partials/footer', FALSE);
    }

    public function title_to_slug($title = "") {
        return preg_replace('/[^a-zA-Z0-9]/', "-", $title);
    }
}