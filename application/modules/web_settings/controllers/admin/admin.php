<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	public function __construct() {
		parent::__construct();
        
        $this->load->library('cache');
        $this->load->model('web_settings_m');
        
        $this->template->set_partial('google_cdn', 'fragments/jquery_cdn', FALSE);

        $this->validation_rules = array(
            array(
                'field' => 'categories_enable',
                'label' => 'Enable Categories Module',
                'rules' => 'max_length[1]|numeric'
            ),
            array(
                'field' => 'sharethis',
                'label' => 'ShareThis Button Code',
                'rules' => 'trim'
            ),
            array(
                'field' => 'sharethis_enable',
                'label' => 'Enable ShareThis',
                'rules' => 'max_length[1]|numeric|callback_check_sharethis'
            ),
            array(
                'field' => 'google_analytics',
                'label' => 'Google Analytics Web Property ID',
                'rules' => 'trim'
            ),array(
                'field' => 'google_analytics_enable',
                'label' => 'Enable Google Analytics',
                'rules' => 'max_length[1]|numeric|callback_check_ga'
            )
        );
	}
	
	public function index() {
        $settings_data = $this->web_settings_m->get_first();

        $this->form_validation->set_rules($this->validation_rules);

        if($this->form_validation->run()) {
            $temp_data = array(
                'categories_enable' => $this->input->post('categories_enable'),
                'sharethis' => $this->input->post('sharethis'),
                'sharethis_enable' => $this->input->post('sharethis_enable'),
                'google_analytics' => $this->input->post('google_analytics'),
                'google_analytics_enable' => $this->input->post('google_analytics_enable')
            );

            if($settings_data) {
                $result = $this->web_settings_m->update($settings_data['id'], $temp_data);
            } else {
                $result = $this->web_settings_m->insert($temp_data);
            }

            if ($result) {
                $this->cache->write($temp_data, 'web_settings');
                $this->session->set_flashdata('success', TRUE);
            } else {
                $this->session->set_flashdata('error', TRUE);
            }

            redirect('admin/web_settings');
        }


        if($settings_data) {
            foreach($settings_data as $key=>$data) {
                $settings->{$key} = $data;
            }
        } else {
            foreach($this->validation_rules as $rule) {
                $settings->{$rule['field']} = set_value($rule['field']);
            }
        }

        $this->data->settings =& $settings;
		$this->template->build('admin/form', $this->data);
	}

    public function check_sharethis($str) {
        if($str == '1') {
            if(empty($_POST['sharethis'])) {
                $this->form_validation->set_message('check_sharethis', 'Can not enable %s if no code is input.');
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    public function check_ga($str) {
        if($str == '1') {
            if(empty($_POST['google_analytics'])) {
                $this->form_validation->set_message('check_ga', 'Can not enable %s if no property ID is input.');
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
}