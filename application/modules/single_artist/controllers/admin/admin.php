<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {

    protected $validation_rules = array();

    public function __construct() {
        parent::__construct();

        $this->load->helpers(array('path', 'file'));
        $this->load->model('artists_m');
        $this->load->model('social_media_links_m', 'sm_links_m');

        $this->template->set_partial('side_menu', 'admin/side_menu');

        $this->validation_rules = array(
            'profile_rules' => array(
                array(
                    'field' => 'first_name', 'label' => 'Firt Name',
                    'rules' => 'trim|required|min_length[2]|max_length[50]'
                ),
                array(
                    'field' => 'last_name', 'label' => 'Last Name',
                    'rules' => 'trim|required|min_length[2]|max_length[50]'
                ),
                array(
                    'field' => 'photo', 'label' => 'Artist Photo',
                    'rules' => 'trim|max_length[250]'
                ),
                array(
                    'field' => 'bio', 'label' => 'Artist Biography',
                    'rules' => 'trim'
                ),
                array(
                    'field'   => 'unit_no', 'label'   => 'Unit No',
                    'rules'   => 'trim|required|max_length[6]|numeric'
                ),
                array(
                    'field'   => 'address', 'label'   => 'Address',
                    'rules'   => 'trim|required|max_length[250]'
                ),
                array(
                    'field'   => 'city', 'label'   => 'City',
                    'rules'   => 'trim|required|max_length[45]'
                ),
                array(
                    'field'   => 'region', 'label'   => 'Province/State',
                    'rules'   => 'trim|required|max_length[45]'
                ),
                array(
                    'field'   => 'country', 'label'   => 'Country',
                    'rules'   => 'trim|required|max_length[45]'
                ),
                array(
                    'field'   => 'postcode', 'label'   => 'Postal/Zip Code',
                    'rules'   => 'trim|required|max_length[8]|callback_check_postcode'
                ),
                array(
                    'field'   => 'emails[]', 'label'   => 'Emails',
                    'rules'   => 'trim|max_length[250]|callback_check_emails'
                ),
                array(
                    'field'   => 'phones[]', 'label'   => 'Phone Number',
                    'rules'   => 'trim|max_length[11]'
                ),
                array(
                    'field'   => 'phones_type[]', 'label'   => 'Phone Type',
                    'rules'   => ''
                ),
                array(
                    'field'   => 'addtional_title', 'label'   => 'Additional Title',
                    'rules'   => 'trim|max_length[250]'
                ),
                array(
                    'field'   => 'addtional_content', 'label'   => 'Additional Content',
                    'rules'   => 'trim'
                ),
                array(
                    'field'   => 'meta_keywords', 'label'   => 'Meta Keywords',
                    'rules'   => 'trim|max_length[250]'
                ),
                array(
                    'field'   => 'meta_title', 'label'   => 'Meta Title',
                    'rules'   => 'trim|max_length[250]'
                ),
                array(
                    'field'   => 'meta_description', 'label'   => 'Meta Description',
                    'rules'   => 'trim'
                )
            ),
            'edit_social_media' => array(
                array(
                    'field'   => 'type', 'label'   => 'Social Media Type',
                    'rules'   => 'trim|required'
                ),
                array(
                    'field'   => 'text', 'label'   => 'Social Media Type',
                    'rules'   => 'trim|required|min_length[3]|max_length[40]'
                ),
                array (
                    'field'   => 'url', 'label'   => 'Social Media URL',
                    'rules'   => 'trim|required|max_length[250]'
                )
            )
        );
    }

    public function index() {
        $this->data->phone_types = $this->artists_m->get_artist_phone_types_dd();
        $this->data->phone_limit = $this->config->item('phone_limit');
        $this->data->email_limit = $this->config->item('email_limit');
        
        $profile_data = $this->artists_m->get_first();

        $this->form_validation->set_rules($this->validation_rules);

        if($this->form_validation->run()) {
            $temp_data = $_POST;
            unset($temp_data['submit']);
            $temp_data['emails'] = json_encode($temp_data['emails']);

            $phones = array();
            for($i = 0; $i < $this->data->phone_limit; $i++) {
                $phones[] = array($temp_data['phones_type'][$i], $temp_data['phones'][$i]);
            }
            $temp_data['phones'] = json_encode($phones);
            unset($temp_data['phones_type']);

            if($profile_data) {
                $result = $this->artists_m->update($profile_data['id'], $temp_data);
            } else {
                $result = $this->artists_m->insert($temp_data);
            }

            if ($result) {
                $this->session->set_flashdata('success', TRUE);
            } else {
                $this->session->set_flashdata('error', TRUE);
            }

            redirect('admin/single_artist');
        }

        if($profile_data) {
            foreach($profile_data as $key => $value) {
                if($key == 'emails') {
                    $value = json_decode($value, TRUE);
                    $profile->{$key} = $value;
                } else if($key == 'phones') {
                    $phones_data = json_decode($value, TRUE);
                    foreach($phones_data as $data) {
                        $phones[] = $data[1];
                        $phones_type[] = $data[0];
                    }
                    $profile->{$key} = $phones;
                    $profile->{'phones_type'} = $phones_type;
                } else {
                    $profile->{$key} = $value;
                }
            }
            log_message('info', print_r($profile, TRUE));
        } else {
            foreach($this->validation_rules as $rule) {
                $profile->{rtrim($rule['field'], '[]')} = set_value($rule['field']);
            }
        }
        $this->data->profile =& $profile;
        $this->template->append_metadata(js('admin/jquery.ajaxupload.js'))
                ->append_metadata(js('tiny_mce/jquery.tinymce.js'))
                ->append_metadata(js('tiny_mce/tiny_mce.js'))
                ->append_metadata($this->load->view('fragments/mini_wysiwyg', array(), TRUE));
        $this->template->build('admin/form', $this->data);
    }

    public function edit_social_media() {
        $this->data->types = $this->sm_links_m->get_social_media_types_dd();
        $this->data->links = $this->sm_links_m->get_many_by(array('parent' => 'single_artist'));

        $this->template->append_metadata(js('social_media_form.js', 'single_artist'))
                ->append_metadata(css('admin/dataTable.css'))
                ->append_metadata(js('admin/jquery.dataTables.min.js'));
        $this->template->build('admin/social_media_form', $this->data);
    }

    public function add_social_media() {
        $this->form_validation->set_rules($this->validation_rules['edit_social_media']);
        $success = $this->form_validation->run();
        $result_msg = array();

        if($success) {
            $temp_data = $_POST;
            unset($temp_data['submit']);

            $id = $temp_data['id'];
            unset($temp_data['id']);

            $temp_data['parent'] = "single_artist";

            if($id > 1) {
                $result = $this->sm_links_m->update($id, $temp_data);
            } else {
                $result = $this->sm_links_m->insert($temp_data);
            }

            if ($result) {
                $result_msg['message'] = $this->load->view('admin/result_messages', array('success' => TRUE), TRUE);
                $result_msg['links'] = $this->get_all_social_media();
            } else {
                $result_msg['message'] = $this->load->view('admin/result_messages', array('error' => TRUE), TRUE);
                $result_msg['links'] = "error";
            }
        } else {
            $result_msg['message'] = $this->load->view('admin/result_messages', array(), TRUE);
            $result_msg['links'] = "error";
        }

        echo json_encode($result_msg);
    }

    public function get_social_media($id = 0) {
        if($id < 1) {
            echo "";
        } else {
            echo json_encode($this->sm_links_m->get_by_id($id));
        }
    }

    public function get_all_social_media() {
        $data['links'] = $this->sm_links_m->get_many_by(array('parent' => 'single_artist'));
        return $this->load->view('admin/social_media_list',$data, TRUE);
    }

    public function delete_social_media($id = 0) {
        if($id < 1) {
            $this->session->set_flashdata('error', TRUE);
            redirect('admin/single_artist/edit_social_media');
        }

        if ($this->sm_links_m->delete($id)) {
            $this->session->set_flashdata('success', TRUE);
        } else {
            $this->session->set_flashdata('error', TRUE);
        }
        redirect('admin/single_artist/edit_social_media');
    }

    public function save_file() {
        $config['upload_path'] = set_realpath(APPPATH . 'uploads/');
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()) {
            echo json_encode(array('uploaded' => FALSE, 'message' => $this->upload->display_errors('', '')));
        } else {
            $old_file = $this->artists_m->get_artist_photo();
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