<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {

    protected $validation_rules;

    public function __construct() {
        parent::__construct();
        $this->load->helpers(array('path', 'file'));
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
            ),
            array(
                'field'   => 'homepage_file',
                'label'   => 'Homepage File',
                'rules'   => 'trim'
            ),
            array(
                'field'   => 'homepage_file_mime',
                'label'   => 'Homepage File Mime Type',
                'rules'   => 'trim'
            )
        );
    }

    public function index() {
        $profile_data = $this->web_profile_m->get_profile();

        $this->output->enable_profiler(TRUE);

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

        $this->template->append_metadata(css('admin/uploadify.css'))->append_metadata(js('admin/swfobject.js'))->append_metadata(js('admin/jquery.uploadify.min.js'));
        $this->template->build('admin/form', $this->data);
    }

    public function save_file() {
        $config['upload_path'] = set_realpath(APPPATH . 'uploads/homepage/');
        $config['allowed_types'] = 'png|jpg|swf|jpeg';
        $config['max_size'] = '5000';

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()) {
            echo '<span style="color: red;">' . $this->upload->display_errors() . '</span><br />';
        } else {
            if($this->web_profile_m->get_homepage_file()) {
                delete_files($config['upload_path']);
            }

            $data = $this->upload->data();
            $response = '<p>File: ' . $data['file_name'] . 'is uploaded.</p>';
            $response .= form_hidden('homepage_file', $data['file_name']);
            $response .= form_hidden('homepage_file_mime', get_mime_by_extension($data['file_name']));
            echo $response;
        }
    }
}