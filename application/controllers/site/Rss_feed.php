<?php

/**
 *
 */
class Rss_feed extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $view = 'index';
    public $view_mobile = 'index_mobile';
    public $limit = 10;
    public $cache_time = '1440';

    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() .
            '/' . $this->router->fetch_method();
        $this->view = $this->module_view . '/' . $this->view;
        $this->view_mobile = $this->module_view . '/' . $this->view_mobile;
        $this->load->library(array('site/my_config', 'site/comment_lib', 'site/tableOfContent_lib', 'site/mobile_detect'));
        $this->load->model(array('site/article_model', 'site/tags_model', 'site/article_relation_model'));
        $this->load->helper(array('site_helper'));
    }
    public function rss(){
        $limit = 10;
        header("Content-Type: text/xml;");
        $article = $this->article_model->Db_list_limit_order($limit);
        $data['encoding'] = 'utf-8';
        $data['article'] = $article;
//        $this->output->set_header("Content-Type: application/rss+xml");
        $this->load->view('site/rss_feed/rss', $data);
    }
}