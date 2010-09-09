<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class News extends Public_Controller {
    public function  __construct() {
        parent::__construct();
        $this->data->page_id = "news";
        $this->load->model('news_m');
    }

    public function index($slug = "") {
        if(empty($slug)) {
            $this->data->content = $this->news_m->get_latest_news();
        } else {
            $this->data->content = $this->news_m->get_by_slug($slug);
        }

        if($this->category_enable) {
            $this->data->list = $this->news_m->get_news_list_by_category();
        } else {
            $this->data->list = $this->news_m->get_news_list();
        }

        $this->template->set_metadata("", $this->theme_css_path.'2_col.css', 'css');
        $this->template->build('news', $this->data);
    }

    public function rss() {
		$this->load->helper('xml');
		$this->load->helper('text');

        $data['feed_name'] = BASE_URL.'News Feed';
        $data['feed_url'] = site_url('news/rss');
        $data['page_description'] = 'What my site is about comes here';
        $data['page_language'] = 'en-en';
        $data['creator_email'] = 'mail@'.$this->data->web_profile['contact_email'];
        $data['news'] = $this->news_m->get_rss(10);
        header("Content-Type: application/rss+xml");

		$this->load->view('rss', $data);
    }
}