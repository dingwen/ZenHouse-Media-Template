<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends Public_Controller {
    public function  __construct() {
        parent::__construct();
        $this->load->model('news/news_m');
        $this->data->page_id = 'index';
    }

    public function index() {
        $this->data->news_content = $this->news_m->get_latest_news();
        $this->data->news_content['content'] = $this->process_content($this->data->news_content['content']);
        $this->template->set_partial('google_cdn', 'fragments/jquery_cdn', FALSE)
            ->append_metadata(js('jquery.swfobject.min.js'));
        $this->template->set_metadata('', $this->theme_js_path.'home.js', 'js');
        $this->template->build($this->theme_view_path . 'home', $this->data);
    }

    private function process_content($content) {
        $this->load->helper('text');
        return character_limiter(strip_tags($content), 190);
    }
}