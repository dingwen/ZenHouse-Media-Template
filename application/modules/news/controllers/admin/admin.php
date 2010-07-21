<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Admin_Controller {

    protected $validation_rules;
    protected $news_id;

    public function __construct() {
        parent::__construct();

        $this->data->category_enable = & $this->category_enable;

        $this->template->set_partial('side_menu', 'admin/side_menu');

        $this->load->model('news_m');
        if ($this->category_enable) {
            $this->load->model('categories/categories_m');
            $this->data->categories = $this->categories_m->get_sub_by_main_name('news');
        }

        $this->validation_rules = array(
            array(
                "field" => "title",
                "label" => "Title",
                "rules" => "trim|required|min_length[3]|max_length[250]|callback_title_check"
            ),
            array(
                "field" => "category",
                "label" => "Category",
                "rules" => ""
            ),
            array(
                "field" => "content",
                "label" => "News Content",
                "rules" => "trim|required|min_length[20]"
            ),
            array(
                'field' => 'meta_keywords',
                'label' => 'Meta Keywords',
                'rules' => 'trim|max_length[250]'
            ),
            array(
                'field' => 'meta_title',
                'label' => 'Meta Title',
                'rules' => 'trim|max_length[250]'
            ),
            array(
                'field' => 'meta_description',
                'label' => 'Meta Description',
                'rules' => 'trim|max_length[250]'
            )
        );

        $this->news_id = 0;
    }

    public function index() {
        $this->template->append_metadata(css('admin/dataTable.css'))
                ->append_metadata(js('admin/jquery.dataTables.min.js'))
                ->append_metadata(js('admin/datatable.fnSetFilteringDelay.js'));
        $this->template->build('admin/index', $this->data);
    }

    public function create() {
        $this->form_validation->set_rules($this->validation_rules);

        if ($this->form_validation->run()) {
            $temp_data = $_POST;

            if (isset($_POST['publish'])) {
                $temp_data['publish_date'] = date('Y-m-d H:i:s');
                $temp_data['status'] = 'live';
                unset($temp_data['publish']);
            } else if (isset($_POST['draft'])) {
                $temp_data['publish_date'] = '0000-00-00 00:00:00';
                $temp_data['status'] = 'draft';
                unset($temp_data['draft']);
            }
            $temp_data['slug'] = $this->title_to_slug($temp_data['title']);

            $result = $this->news_m->insert($temp_data);

            if ($result) {
                $this->session->set_flashdata('success', TRUE);
            } else {
                $this->session->set_flashdata('error', TRUE);
            }

            redirect('admin/news');
        }

        foreach ($this->validation_rules as $rule) {
            $news->{$rule['field']} = set_value($rule['field']);
        }
        $this->data->news = & $news;
        $this->data->page = "create";
        $this->template->append_metadata(js('tiny_mce/jquery.tinymce.js'))
                ->append_metadata(js('tiny_mce/tiny_mce.js'))
                ->append_metadata($this->load->view('fragments/wysiwyg', array(), TRUE));
        $this->template->build('admin/form', $this->data);
    }

    public function edit($id = 0) {
        if ($id < 1) {
            redirect(site_url('admin/news'));
        }

        $this->news_id = $id;
        $this->form_validation->set_rules($this->validation_rules);

        if ($this->form_validation->run()) {
            $temp_data = $_POST;
            unset($temp_data['update']);
            $temp_data['slug'] = $this->title_to_slug($temp_data['title']);

            $result = $this->news_m->update($id, $temp_data);
            if ($result) {
                $this->session->set_flashdata('success', TRUE);
            } else {
                $this->session->set_flashdata('error', TRUE);
            }

            redirect('admin/news');
        }

        $news_data = $this->news_m->get_by_id($id);

        if ($news_data) {
            foreach ($news_data as $field => $value) {
                $news->{$field} = $value;
            }
            $this->data->news = & $news;
        } else {
            redirect('admin/news');
        }

        $this->data->page = "edit";
        $this->template->append_metadata(js('tiny_mce/jquery.tinymce.js'))
                ->append_metadata(js('tiny_mce/tiny_mce.js'))
                ->append_metadata($this->load->view('fragments/wysiwyg', array(), TRUE));
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

        if ($this->category_enable) {
            foreach ($result as $row) {
                if (!empty($row[1])) {
                    $row[1] = $this->data->categories[$row[1]];
                }
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

    public function update_status() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if ($id > 0) {
            $result = $this->news_m->update($id, array('status' => $status));
            if ($result) {
                echo "updated";
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }
    }

    public function title_check($title) {
        if ($this->news_m->check_duplicate(array('title' => $title, 'id !=' => $this->news_id))) {
            $this->form_validation->set_message('title_check', 'The title exists. Please pick another one.');
            return FALSE;
        }
        return TRUE;
    }
}