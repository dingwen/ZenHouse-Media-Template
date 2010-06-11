<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {

    protected $validation_rules;

    public function __construct() {
        parent::__construct();
        
        $this->load->helpers(array('path', 'file'));
        $this->load->model('web_profile_m');
		
		//Add a css link in head section
		$this->template->append_metadata(css('admin/form.css'));

        $this->template->append_metadata(js('admin/jquery.ajaxupload.js'));
        
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
            array (
                'field'   => 'homepage_file',
                'label'   => 'Homepage File',
                'rules'   => 'trim'
            )
        );
    }

    public function index() {
        $profile_data = $this->web_profile_m->get_first();

        $this->form_validation->set_rules($this->validation_rules);

        if($this->form_validation->run()) {
            $temp_data = array(
                'name' => $this->input->post('name'),
                'tagline' => $this->input->post('tagline'),
                'welcome_title' => $this->input->post('welcome_title'),
                'welcome_message' => $this->input->post('welcome_message'),
                'contact_email' => $this->input->post('contact_email'),
                'meta_keywords' => $this->input->post('meta_keywords'),
                'meta_title' => $this->input->post('meta_title'),
                'meta_description' => $this->input->post('meta_description'),
                'homepage_file' => $this->input->post('homepage_file')
            );

            if($profile_data) {
                $result = $this->web_profile_m->update($profile_data['id'], $temp_data);
            } else {
                $result = $this->web_profile_m->insert($temp_data);
            }

            if ($result) {
                $this->cache->write($temp_data, 'web_profile');
                $this->session->set_flashdata('success', TRUE);
            } else {
                $this->session->set_flashdata('error', TRUE);
            }

            redirect('admin/web_profile');
        }

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
        $this->template->build('admin/form', $this->data);
    }
    
    public function save_file() {
        $config['upload_path'] = set_realpath(APPPATH . 'uploads/homepage/');
        $config['allowed_types'] = 'png|jpg|swf|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()) {
            echo json_encode(array('uploaded' => FALSE, 'message' => $this->upload->display_errors('', '')));
        } else {
            $old_file = $this->web_profile_m->get_homepage_file();
            if($old_file) {
                if(file_exists($config['upload_path'] . $old_file)) {
                    unlink($config['upload_path'] . $old_file);
                }
            }
            $file =& $this->upload->data();
            echo json_encode(array('uploaded' => TRUE, 'message' => $file['file_name']));
        }
    }
}

