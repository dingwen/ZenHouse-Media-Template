<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends Public_Controller {
    protected $form_rules;

    public function  __construct() {
        parent::__construct();
        $this->load->library(array('email', 'form_validation'));
        $this->set_form_rules();
        $this->data->page_id = 'contact';
    }

    public function index() {
        $this->data->contact = $this->cache->get('contact_info');
        $this->form_validation->set_rules($this->form_rules);
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        if($this->form_validation->run()) {
            $this->email->from($this->input->post('email'), strip_tags($this->input->post('name')));
            $this->email->to($this->data->web_profile['contact_email']);
            $this->email->subject($this->data->contact['subject'].": ".strip_tags($this->input->post('subject')));
            $this->email->message(strip_tags($this->input->post('message')));
            $this->data->email_is_sent = $this->email->send();
        }
        
        $this->data->contact['phones'] = json_decode($this->data->contact['phones']);
        $this->data->contact['emails'] = json_decode($this->data->contact['emails']);
        $this->template->set_partial('google_cdn', 'fragments/jquery_cdn', FALSE)
//                ->append_metadata('<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAFlh71Oercit9GK4zUpZOvBQb4qDnwmcJg7yhgX0T-4sA8gVcVRRD2yq37cyz8e2eK88DBoiJJYVoFw"></script>');
                ->append_metadata('<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAFlh71Oercit9GK4zUpZOvBTJ6CUnCC975uVzlMx9u01pRQRvzhTbz_HVXi5862ggcXxdBiHMmBT0HQ"></script>');
        $this->template->append_metadata(js('jquery.gmap.min.js'));
        $this->template->build('index', $this->data);
    }

    private function set_form_rules() {
        $this->form_rules = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'trim|required|min_length[3]|max_length[250]'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'subject',
                'label' => 'Subject',
                'rules' => 'trim|required|min_length[3]|max_length[250]'
            ),
            array(
                'field' => 'message',
                'label' => 'Message',
                'rules' => 'trim|required|min_length[3]'
            )
        );
    }
}