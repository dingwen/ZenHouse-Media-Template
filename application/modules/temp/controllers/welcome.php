<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends Controller {

	function Welcome() {
		parent::Controller();
        $this->config->load('asset');
	}

    function index() {
		$this->load->view('welcome_message', array(
            'cache_dir' => $this->config->item('cache_dir'),
            'asset_dir' => $this->config->item('asset_dir'),
            'asset_url' => $this->config->item('asset_url')
        ));
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */