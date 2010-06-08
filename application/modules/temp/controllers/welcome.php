<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends Controller {

	function Welcome() {
		parent::Controller();
        $this->config->load('asset');
        $this->load->model('web_profile/web_profile_m');
	}

    function index() {
		$this->load->view('welcome_message', array(
            'web_profile_cache' => $this->web_profile_m->get_web_profile(),
            'cache_dir' => $this->config->item('cache_dir'),
            'asset_dir' => $this->config->item('asset_dir'),
            'asset_url' => $this->config->item('asset_url')
        ));
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */