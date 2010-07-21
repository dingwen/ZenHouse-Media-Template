<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {

    protected $validation_rules;
    protected $gallery_id;
    protected $gallery_slug;
    protected $image_settings;

    public function __construct() {
        parent::__construct();

        $this->load->helpers(array('path', 'file'));
        $this->load->model(array('gallery_m', 'image_m'));
        $this->image_settings = $this->config->item('image_settings');
        $this->template->set_partial('side_menu', 'admin/side_menu');
        $this->gallery_id = 0;
    }

    public function index() {
        $this->template->append_metadata(css('admin/dataTable.css'))
                ->append_metadata(js('admin/jquery.dataTables.min.js'))
                ->append_metadata(js('admin/datatable.fnSetFilteringDelay.js'));
        $this->template->build('admin/index', $this->data);
    }

    public function create() {
        $this->set_validation_rules();
        $this->form_validation->set_rules($this->validation_rules);
        
        if($this->form_validation->run()) {
            $temp_data = $_POST;

            if (isset($_POST['publish'])) {
                $temp_data['status'] = 'live';
                unset($temp_data['publish']);
            } else if (isset($_POST['draft'])) {
                $temp_data['status'] = 'draft';
                unset($temp_data['draft']);
            }
            $temp_data['slug'] = $this->title_to_slug($temp_data['title']);

            $result = $this->gallery_m->insert($temp_data);

            if ($result) {
                $this->session->set_flashdata('success', TRUE);
                $old = umask(0);
                mkdir(set_realpath($_SERVER['DOCUMENT_ROOT'].APPPATH_URI.'uploads/galleries/'.$temp_data['slug']), 0777);
                umask($old);
                redirect(site_url('admin/gallery/image_upload/'.$result));
            } else {
                $this->session->set_flashdata('error', TRUE);
                redirect('admin/gallery');
            }
        }

        foreach ($this->validation_rules as $rule) {
            $gallery->{$rule['field']} = set_value($rule['field']);
        }
        $this->data->gallery = & $gallery;
        $this->data->page = "create";
        $this->template->append_metadata(js('tiny_mce/jquery.tinymce.js'))
                ->append_metadata(js('tiny_mce/tiny_mce.js'))
                ->append_metadata($this->load->view('fragments/mini_wysiwyg', array(), TRUE));
        $this->template->build('admin/gallery_form', $this->data);
    }

    public function edit($id = 0) {
        if($id < 1) { redirect(site_url('admin/gallery')); }

        $this->gallery_id = $id;

        $gallery_data = $this->gallery_m->get_by_id($id);
        $this->gallery_slug = $gallery_data['slug'];
        
        $this->set_validation_rules();
        $this->form_validation->set_rules($this->validation_rules);

        if($this->form_validation->run()) {
            $temp_data = $_POST;
            unset($temp_data['update']);

            $temp_data['slug'] = $this->title_to_slug($temp_data['title']);

            $result = $this->gallery_m->update($id, $temp_data);

            if ($result) {
                $this->session->set_flashdata('success', TRUE);
                if($temp_data['slug'] != $this->gallery_slug) {
                    $old_path = set_realpath($_SERVER['DOCUMENT_ROOT'].APPPATH_URI.'uploads/galleries/'.$this->gallery_slug);
                    $new_path = set_realpath($_SERVER['DOCUMENT_ROOT'].APPPATH_URI.'uploads/galleries/'.$temp_data['slug']);
                    if(is_dir($old_path)) {
                        rename($old_path, $new_path);
                    } else {
                        $old = umask(0);
                        mkdir($new_path, 0777);
                        umask($old);
                    }
                }
            } else {
                $this->session->set_flashdata('error', TRUE);
            }

            redirect('admin/gallery');
        }

        if ($gallery_data) {
            foreach ($gallery_data as $field => $value) {
                $gallery->{$field} = $value;
            }
            $this->data->gallery = & $gallery;
        } else {
            redirect(site_url('admin/gallery'));
        }

        $this->data->page = "edit";
        $this->template->append_metadata(js('tiny_mce/jquery.tinymce.js'))
                ->append_metadata(js('tiny_mce/tiny_mce.js'))
                ->append_metadata($this->load->view('fragments/mini_wysiwyg', array(), TRUE));
        $this->template->build('admin/gallery_form', $this->data);
    }

    public function edit_image() {
        $images = $this->input->post('images');
        $gallery_slug = $this->input->post('gallery_slug');
        $gallery_id = $this->input->post('gallery_id');
        $gallery_folder = APPPATH_URI."uploads/galleries/".$gallery_slug.'/';

        $gallery_images = array();
        if($images) {
            foreach($images as $image_id) {
                $temp_image = $this->image_m->get_by_id($image_id);
                $temp_image['image_url'] = $gallery_folder.$temp_image['image_name'];
                $temp_image['image_thumb_url'] = $this->thumbnail_path($gallery_folder.$temp_image['image_name']);
                $gallery_images[] = $temp_image;
            }
        }
        $data['images'] = $gallery_images;
        $data['gallery_id'] = $gallery_id;
        echo $this->load->view('admin/edit_images', $data, TRUE);
    }

    public function update_image_info() {
        $gallery_id = $this->input->post('gallery_id');
        $image_ids = $this->input->post('image_id');
        $image_titles = $this->input->post('image_title');
        $image_descriptions = $this->input->post('image_description');

        $result = FALSE;
        if($image_ids) {
            $image_num = count($image_ids);
            for($i = 0; $i < $image_num; $i++) {
                $image_data['title'] = $image_titles[$i];
                $image_data['description'] = $image_descriptions[$i];
                $result = $this->image_m->update($image_ids[$i], $image_data);
            }
            if ($result) {
                $this->session->set_flashdata('success', TRUE);
            } else {
                $this->session->set_flashdata('error', TRUE);
            }
        }
        redirect('admin/gallery/view_gallery/'.$gallery_id);
    }

    public function delete($id = 0) {
        if($id < 1) { redirect('admin/gallery'); }
        
        $this->image_m->delete_gallery($id);
        $result = $this->gallery_m->delete_gallery($id);

        if ($result) {
            $this->session->set_flashdata('success', TRUE);
        } else {
            $this->session->set_flashdata('error', TRUE);
        }

        redirect('admin/gallery');
    }

    public function delete_image() {
        $images = $this->input->post('images');
        $gallery_slug = $this->input->post('gallery_slug');
        $gallery_id = $this->input->post('gallery_id');
        $gallery_folder = APPPATH_URI."uploads/galleries/".$gallery_slug.'/';

        if($images) {
            foreach($images as $image_id) {
                $this->image_m->delete_image($image_id, $gallery_folder);
            }
        }

        $temp_images = $this->image_m->get_by_gallery_id($gallery_id);
        $gallery_images = array();

        if($temp_images) {
            foreach($temp_images as $image) {
                $image['image_url'] = $gallery_folder.$image['image_name'];
                $image['image_thumb_url'] = $this->thumbnail_path($gallery_folder.$image['image_name']);
                $gallery_images[] = $image;
            }
        }

        $data['images'] = & $gallery_images;

        echo $this->load->view('admin/image_list', $data, TRUE);
    }

    public function view_gallery($id = 0) {
        if($id < 1) { redirect('admin/gallery'); }

        $gallery = $this->gallery_m->get_by_id($id);
        $images = $this->image_m->get_by_gallery_id($id);

        $gallery_folder = APPPATH_URI."uploads/galleries/".$gallery["slug"].'/';

        $gallery_images = array();

        if($images) {
            foreach($images as $image) {
                $image['image_url'] = $gallery_folder.$image['image_name'];
                $image['image_thumb_url'] = $this->thumbnail_path($gallery_folder.$image['image_name']);
                $gallery_images[] = $image;
            }
        }

        $this->data->gallery = & $gallery;
        $this->data->images = & $gallery_images;

        $this->template->build('admin/view_gallery', $this->data);
    }

    public function image_upload($id = 0) {
        if($id < 1) { redirect('admin/gallery/create'); }

        $gallery = $this->gallery_m->get_by_id($id);
        $this->data->gallery = & $gallery;

        $this->template->append_metadata(css('uploadify.css'))
                ->append_metadata(js('jquery.swfobject.min.js'))
                ->append_metadata(js('jquery.uploadify.js'));
        $this->template->build('admin/upload_image', $this->data);
    }

    public function upload() {
        $file = $this->input->post('filearray');

        $file_info = json_decode($file);
		$result = $this->resize_image($file_info->file_path);
        
        if($result) {
            $this->image_m->insert(
                array(
                    'image_name' => $file_info->file_name,
                    'gallery_id' => $file_info->gallery_id
                ));
            $data['image_process_result'] = "Image: ".$file_info->file_name." is saved.";
        } else {
            $data['image_process_result'] = "Image: ".$file_info->file_name." can't be saved and processed.";
        }
        $this->load->view('admin/uploadify', $data);
    }

    public function sort_galleries() {
        $this->data->galleries = $this->gallery_m->get_many_by(array('status' => 'live'), 'weight');
        $this->template->set_partial('google_cdn', 'fragments/jquery_ui_cdn', FALSE);
        $this->template->build('admin/sort_galleries', $this->data);
    }

    public function sort_images($id = 0) {
        if($id < 1) { redirect('admin/gallery'); }
        $gallery = $this->gallery_m->get_by_id($id);
        $images = $this->image_m->get_by_gallery_id($id);

        $gallery_folder = APPPATH_URI."uploads/galleries/".$gallery["slug"].'/';

        $gallery_images = array();

        if($images) {
            foreach($images as $image) {
                $image['image_url'] = $gallery_folder.$image['image_name'];
                $image['image_thumb_url'] = $this->thumbnail_path($gallery_folder.$image['image_name']);
                $gallery_images[] = $image;
            }
        }

        $this->data->gallery = & $gallery;
        $this->data->images = & $gallery_images;

        $this->template->set_partial('google_cdn', 'fragments/jquery_ui_cdn', FALSE);
        $this->template->build('admin/sort_images', $this->data);
    }

    public function update_sort_galleries() {
        $sorted_list = $this->input->post('list');
        $count = count($sorted_list);

        $str = "";
        $result = null;

        for ($i = 0; $i < $count; $i++) {
            $result = $this->gallery_m->update($sorted_list[$i]['id'], array('weight' => $i * 5));
        }
        
        if ($result) {
            echo $this->load->view('admin/result_messages', array('success' => TRUE), TRUE);
        } else {
            echo $this->load->view('admin/result_messages', array('error' => TRUE), TRUE);
        }
    }

    public function update_sort_images() {
        $sorted_list = $this->input->post('list');
        $count = count($sorted_list);

        $str = "";
        $result = null;

        for ($i = 0; $i < $count; $i++) {
            $result = $this->image_m->update($sorted_list[$i]['id'], array('weight' => $i * 5));
        }

        if ($result) {
            echo $this->load->view('admin/result_messages', array('success' => TRUE), TRUE);
        } else {
            echo $this->load->view('admin/result_messages', array('error' => TRUE), TRUE);
        }
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
        $datatable['iTotalRecords'] = $this->gallery_m->count_all();

        $result = $this->gallery_m->get_datatable($offset, $limit, $sort, $filter);
        if ($result) {
            $datatable['iTotalDisplayRecords'] = $result[0];
            $datatable['aaData'] = $this->process_result($result[1]);
        } else {
            $datatable['iTotalDisplayRecords'] = 0;
            $datatable['aaData'] = array();
        }
        echo json_encode($datatable);
    }

    public function update_status() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if ($id > 0) {
            $result = $this->gallery_m->update($id, array('status' => $status));
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
        if ($this->gallery_m->check_duplicate(array('title' => $title, 'id !=' => $this->gallery_id))) {
            $this->form_validation->set_message('title_check', 'The title exists. Please pick another one.');
            return FALSE;
        }
        return TRUE;
    }

    private function process_result($result) {
        $processed = array();
        
        foreach ($result as $row) {
            $status = $row[1];
            $id = $row[2];
            $row[1] = form_dropdown('status', array('draft' => 'draft', 'live' => 'live'), $status, 'id="' . $id . '"');
            $row[2] = anchor(site_url('admin/gallery/view_gallery/' . $id), 'view').' '
                .anchor(site_url('admin/gallery/edit/' . $id), 'edit').' '
                .anchor(site_url('admin/gallery/delete/' . $id), 'delete', 'class="confirm"').' '
                .anchor(site_url('admin/gallery/image_upload/' . $id), 'upload images');
            $processed[] = $row;
        }

        return $processed;
    }

    private function set_validation_rules() {
        $this->validation_rules = array(
            array(
                "field" => "title",
                "label" => "Title",
                "rules" => "trim|required|min_length[3]|max_length[250]|callback_title_check"
            ),
            array(
                "field" => "description",
                "label" => "Description",
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
    }

    private function resize_image($image_path = "") {
        if(empty ($image_path)) { return FALSE; }
        $this->load->library('phpthumb_lib');
        
        try {
            //create thumbnail
            $phpthumb = phpthumb_lib::create($image_path);
            $phpthumb->adaptiveResize($this->image_settings['thumb_width'], $this->image_settings['thumb_height']);
            $phpthumb->save($this->thumbnail_path($image_path));

            // resize image
            $phpthumb = phpthumb_lib::create($image_path);
            $phpthumb->resize($this->image_settings['width'], $this->image_settings['height']);
            $phpthumb->save($image_path);

            return TRUE;
            
        } catch(Exception $e) {
            log_message('error', print_r($e, TRUE));
            return FALSE;
        }
    }

    private function thumbnail_path($image_path = "") {
        $path_parts = pathinfo($image_path);
        $path_parts['filename'] = $path_parts['filename'].'_thumb';
        return $path_parts['dirname'].'/'.$path_parts['filename'].'.'.$path_parts['extension'];
    }

    private function get_thumbnail_name($image_path = "") {
        $path_parts = pathinfo($image_path);
        return $path_parts['filename'].'_thumb.'.$path_parts['extension'];
    }
}