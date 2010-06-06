<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {

    protected $validation_rules;

    public function __construct() {
        parent::__construct();
        $this->load->model('web_profile_m');

        $this->validation_rules = array(
            array(
                'field'   => 'name',
                'label'   => 'Webiste Name',
                'rules'   => 'trim|required|max_length[250]'
            ),
            array(
                'field'   => 'tagline',
                'label'   => 'Tagline',
                'rules'   => 'trim|required|min_length[3]|max_length[250]'
            ),
            array(
                'field'   => 'welcome_title',
                'label'   => 'Welcome Title',
                'rules'   => 'trim|required|min_length[3]|max_length[250]'
            ),
            array(
                'field'   => 'welcome_message',
                'label'   => 'Welcome Message',
                'rules'   => 'trim|min_length[10]|required'
            ),
            array(
                'field'   => 'contact_email',
                'label'   => 'Contact Email',
                'rules'   => 'trim|required|valid_email|max_length[250]'
            ),
            array(
                'field'   => 'meta_keywords',
                'label'   => 'Meta Keywords',
                'rules'   => 'trim|max_length[250]'
            ),
            array(
                'field'   => 'meta_title',
                'label'   => 'Meta Title',
                'rules'   => 'trim|max_length[250]'
            ),
            array(
                'field'   => 'meta_description',
                'label'   => 'Meta Description',
                'rules'   => 'trim|max_length[250]'
            )
        );
    }

    public function index() {
        $profile_data = $this->web_profile_m->get_profile();

        if($profile_data) {
            foreach($profile_data as $key=>$data) {
                $profile->{$key} = $data;
            }
        } else {
            foreach($this->validation_rules as $rule) {
                $profile->{$rule['field']} = set_value($rule['field']);
            }
        }

        $this->data->profile =& $profile;

        $this->console->log($this->data->profile);
        $this->console->log($this->validation_rules);
        $this->template->build('admin/form', $this->data);
    }

    public function save_file() {
        
    }
}