<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->config('zhm_config');
        $this->data->category_enable = $this->config->item('categories_enable');

        $this->template->set_partial('side_menu', 'admin/side_menu');

        $this->load->model('news_m');
        if($this->data->category_enable) {
            $this->load->model('categories/categories_m');
            $this->data->categories = $this->categories_m->get_sub_by_main_name('news');
        }
	}
	
	public function index() {
        $this->template->append_metadata(css('admin/dataTable.css'))
                ->append_metadata(js('admin/jquery.dataTables.min.js'))
                ->append_metadata(js('admin/datatable.fnSetFilteringDelay.js'))
                ->append_metadata(js('index.js', 'news'));
		$this->template->build('admin/index', $this->data);
	}

    public function create() {
        $this->template->build('admin/form', $this->data);
    }

    public function edit($id = 0) {
        if($id < 1) { redirect(site_url('admin/news')); }

        $news_data = $this->news_m->get_by_id($id);

        if($news_data) {
            foreach($news_data as $field=>$value) {
                $news->{$field} = $value;
            }
            $this->data->news =& $news;
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
        if($sort_cols > 0) {
            for($i = 0; $i < $sort_cols; $i++) {
                $sort[] = array(
                    $this->input->get_post('iSortCol_' . $i),
                    $this->input->get_post('sSortDir_'. $i)
                );
            }
        }

        $datatable['sEcho'] = intval($this->input->get_post('sEcho'));
        $datatable['iTotalRecords'] = $this->news_m->count_all();

        $result = $this->news_m->get_news_datatable($offset, $limit, $sort, $filter);
        if($result) {
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
        foreach($result as $row) {
            $status = $row[3];
            $id = $row[4];
            $row[3] = form_dropdown('status', array('draft' => 'draft', 'live'=>'live'), $status, 'id="' . $id . '"');
            $row[4] = anchor(site_url('admin/news/edit/' . $id), 'edit') . ' ' . anchor(site_url('admin/news/delete/' . $id), 'delete', 'class="confirm"');
            $processed[] = $row;
        }

        return $processed;
    }
}