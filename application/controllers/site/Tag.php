<?php
class Tag extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $view = 'index';
    public $limit = 20;
    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() .
            '/' . $this->router->fetch_method();
        $this->view = $this->module_view . '/' . $this->view;
        $this->load->library(array('site/my_config', 'site/comment_lib'));
        $this->load->model(array('site/article_model','site/tags_model'));
        $this->load->helper(array('site_helper'));
    }

    public function detail($slug,$page = 1)
    {
        $getInfoTag         = $this->tags_model->getInfo($slug);
        $data['item']       = $getInfoTag;
        if (!$getInfoTag) {
            return redirect(base_url(),'location',301);
        }
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        $getListArticleTag  = $this->tags_model->getListArticleTag($getInfoTag['id']);
        $data['getListArticleTag']  = $getListArticleTag;
        $data['title'] = $getInfoTag['title'];
        $data['keywords'] = $getInfoTag['keywords'];
        $data['description'] = $getInfoTag['description'];
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }
}
