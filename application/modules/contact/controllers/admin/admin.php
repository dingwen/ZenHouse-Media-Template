<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {

    protected $validation_rules = array();

	public function __construct() {
		parent::__construct();
        
        $this->load->model('contact_m');
        $this->load->model('social_media_links_m', 'sm_links_m');
		
		//Add a css link in head section
		$this->template->append_metadata(css('admin/form.css'));
        $this->template->set_partial('side_menu', 'admin/side_menu');

        $this->validation_rules = array(
            'edit_contact' => array(
                array(
                    'field'   => 'unit_no',
                    'label'   => 'Unit No',
                    'rules'   => 'trim|required|max_length[6]|numeric'
                ),
                array(
                    'field'   => 'address',
                    'label'   => 'Address',
                    'rules'   => 'trim|required|max_length[250]'
                ),
                array(
                    'field'   => 'city',
                    'label'   => 'City',
                    'rules'   => 'trim|required|max_length[45]'
                ),
                array(
                    'field'   => 'region',
                    'label'   => 'Province/State',
                    'rules'   => 'trim|required|max_length[45]'
                ),
                array(
                    'field'   => 'country',
                    'label'   => 'Country',
                    'rules'   => 'trim|required|max_length[45]'
                ),
                array(
                    'field'   => 'postcode',
                    'label'   => 'Postal/Zip Code',
                    'rules'   => 'trim|required|max_length[8]|callback_check_postcode'
                ),
                array(
                    'field'   => 'subject',
                    'label'   => 'Contact Form Subject',
                    'rules'   => 'trim|max_length[250]'
                ),
                array(
                    'field'   => 'emails[]',
                    'label'   => 'Emails',
                    'rules'   => 'trim|max_length[250]|callback_check_emails'
                ),
                array(
                    'field'   => 'phones[]',
                    'label'   => 'Contact Form Subject',
                    'rules'   => 'trim|max_length[11]'
                )
            ),
            'edit_social_media' => array(
                array(
                    'field'   => 'type',
                    'label'   => 'Social Media Type',
                    'rules'   => 'trim|required'
                ),
                array(
                    'field'   => 'text',
                    'label'   => 'Social Media Type',
                    'rules'   => 'trim|required|min_length[3]|max_length[40]'
                ),
                array (
                    'field'   => 'url',
                    'label'   => 'Social Media URL',
                    'rules'   => 'trim|required|max_length[250]'
                )
            )
        );
	}
	
	public function index() {
        $contact_data = $this->contact_m->get_first();

        $this->form_validation->set_rules($this->validation_rules['edit_contact']);

        if($this->form_validation->run()) {
            $temp_data = $_POST;
            unset($temp_data['submit']);
            $temp_data['emails'] = json_encode($temp_data['emails']);
            $temp_data['phones'] = json_encode($temp_data['phones']);

            if($contact_data) {
                $result = $this->contact_m->update($contact_data['id'], $temp_data);
            } else {
                $result = $this->contact_m->insert($temp_data);
            }

            if ($result) {
                $this->cache->write($temp_data, 'contact_info');
                $this->session->set_flashdata('success', TRUE);
            } else {
                $this->session->set_flashdata('error', TRUE);
            }

            redirect('admin/contact');
        }

        if($contact_data) {
            foreach($contact_data as $key=>$data) {
                if($key == 'emails') {
                    $data = json_decode($data, TRUE);
                } else if($key == 'phones') {
                    $data = json_decode($data, TRUE);
                }
                $contact->{$key} = $data;
            }
        } else {
            foreach($this->validation_rules['edit_contact'] as $rule) {
                $field = rtrim($rule['field'], '[]');
                $contact->{$field} = set_value($rule['field']);
            }
        }

        $this->data->contact =& $contact;
		$this->template->build('admin/form', $this->data);
	}

    public function edit_social_media() {
        $this->data->types = $this->sm_links_m->get_social_media_types_dd();
        $this->template->build('admin/social_media_form', $this->data);
    }

    public function process_social_media() {
        
    }

    public function check_postcode($str) {
        if(preg_match('/^((\d{5}-\d{4})|(\d{5})|([A-Z]\d[A-Z]\s\d[A-Z]\d))$/', strtoupper($str))) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_postcode', 'The %s is incorrect.(EX. A1A 1A1, 12345, 12345-1234)');
            return FALSE;
        }
    }

    public function check_emails($str) {
        if(!empty($str)) {
            if($this->form_validation->valid_email($str)) {
                return TRUE;
            } else {
                $this->form_validation->set_message('check_emails', 'The %s field must contain a valid email address');
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }
}