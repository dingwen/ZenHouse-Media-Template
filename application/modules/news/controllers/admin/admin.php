<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {

    protected $validation_rules = array();

    public function __construct() {
        parent::__construct();

        $this->load->config('zhm_config');
        $this->data->category_enable = $this->config->item('categories_enable');

        $this->template->set_partial('side_menu', 'admin/side_menu');

        $this->load->model('news_m');
        if ($this->data->category_enable) {
            $this->load->model('categories/categories_m');
            $this->data->categories = $this->categories_m->get_sub_by_main_name('news');
        }

        $this->validation_rules = array(
            array(
                "field" => "title",
                "label" => "Title",
                "rule" => "trim|required|min_length[3]|max_length[250]"
            ),
            array(
                "field" => "category",
                "label" => "Category",
                "rule" => ""
            ),
            array(
                "field" => "content",
                "label" => "News Content",
                "rule" => "trim|required|min_length[20]"
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
        $this->template->append_metadata(css('admin/dataTable.css'))
                ->append_metadata(js('admin/jquery.dataTables.min.js'))
                ->append_metadata(js('admin/datatable.fnSetFilteringDelay.js'));
        $this->template->build('admin/index', $this->data);
    }

    public function create() {
        $this->form_validation->set_rules($this->validation_rules);

        if($this->form_validation->run()) {
            $temp_data = $_POST;

            if(isset($_POST['publish'])) {
                $temp_data['publish_date'] = date('Y-m-d H:i:s');
                $temp_data['status'] = 'live';
                unset($temp_data['publish']);
            } else if(isset($_POST['draft'])) {
                $temp_data['publish_date'] = '0000-00-00 00:00:00';
                $temp_data['status'] = 'draft';
                unset($temp_data['draft']);
            }

            $result = $this->news_m->insert($temp_data);

            if ($result) {
                $this->cache->write($temp_data, 'web_profile');
                $this->session->set_flashdata('success', TRUE);
            } else {
                $this->session->set_flashdata('error', TRUE);
            }

            redirect('admin/news');
        }


        foreach($this->validation_rules as $rule) {
            $news->{$rule['field']} = set_value($rule['field']);
        }
        $this->data->news =& $news;
        $this->template->build('admin/form', $this->data);
    }

    public function edit($id = 0) {
        if ($id < 1) { redirect(site_url('admin/news')); }

        $news_data = $this->news_m->get_by_id($id);

        if ($news_data) {
            foreach ($news_data as $field => $value) {
                $news->{$field} = $value;
            }
            $this->data->news = & $news;
        } else {
            redirect('admin/news');
        }

        $this->template->build('admin/form', $this->data);
    }

    public function delete($id = 0) {
        if ($this->news_m->delete($id)) {
            $this->session->set_flashdata('success', TRUE);
        } else {
            $this->session->set_flashdata('error', TRUE);
        }

        redirect('admin/news');
    }

    public function datatable() {
        $limit = $this->input->get_post('iDisplayLength');
        $offset = $this->input->get_post('iDisplayStart');
        $filter = $this->input->get_post('sSearch');
        $sort_cols = intval($this->input->get_post('iSortingCols'));
        $sort = array();
        if ($sort_cols > 0) {
            for ($i = 0; $i < $sort_cols; $i++) {
                $sort[] = array(
                    $this->input->get_post('iSortCol_' . $i),
                    $this->input->get_post('sSortDir_' . $i)
                );
            }
        }

        $datatable['sEcho'] = intval($this->input->get_post('sEcho'));
        $datatable['iTotalRecords'] = $this->news_m->count_all();

        $result = $this->news_m->get_news_datatable($offset, $limit, $sort, $filter);
        if ($result) {
            $datatable['iTotalDisplayRecords'] = $result[0];
            $datatable['aaData'] = $this->process_result($result[1]);
        } else {
            $datatable['iTotalDisplayRecords'] = 0;
            $datatable['aaData'] = array();
        }
        echo json_encode($datatable);
    }

    private function process_result($result) {
        $processed = array();

        if($this->data->category_enable) {
            foreach ($result as $row) {
                $status = $row[3];
                $id = $row[4];
                $row[3] = form_dropdown('status', array('draft' => 'draft', 'live' => 'live'), $status, 'id="' . $id . '"');
                $row[4] = anchor(site_url('admin/news/edit/' . $id), 'edit') . ' ' . anchor(site_url('admin/news/delete/' . $id), 'delete', 'class="confirm"');
                $processed[] = $row;
            }
        } else {
            foreach ($result as $row) {
                $status = $row[2];
                $id = $row[3];
                $row[2] = form_dropdown('status', array('draft' => 'draft', 'live' => 'live'), $status, 'id="' . $id . '"');
                $row[3] = anchor(site_url('admin/news/edit/' . $id), 'edit') . ' ' . anchor(site_url('admin/news/delete/' . $id), 'delete', 'class="confirm"');
                $processed[] = $row;
            }
        }

        return $processed;
    }

}