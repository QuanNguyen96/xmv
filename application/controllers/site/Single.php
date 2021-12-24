<?php
class Single extends CI_Controller{
    public $module_view = 'site';
    public $action_view = '';
    public $view        = 'index';
    public $limit       = 20;
    public $view_mobile = 'index_mobile';
    public function __construct(){
        parent::__construct();
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->view_mobile = $this->module_view . '/' . $this->view_mobile;
        $this->load->library(array('site/my_config', 'site/comment_lib', 'site/mobile_detect'));
        $this->load->model(array('site/article_model'));
        $this->load->helper(array('site_helper'));
    }
    
    public function page( $slug ){
        $category            = $this->article_model->db->where( 'slug', $slug )->get( 'menu' )->row_array();


        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
                
        $data['category']    = $category;
        $data['title']       = $category['title'];
        $data['keywords']    = $category['keywords'];
        $data['description'] = $category['description'];
        $data['arr_menu']   = $this->myconfig_model->Db_get_menu();
        $menu               = $this->article_model->Db_get_Menu($category['id']);
        $data['breadcrumb'] = breadcrumb($menu);
        $data['link'] = createdlink($menu);
        $data['view'] = $this->action_view;
        if ($this->mobile_detect->isMobile()) {
            $this->load->view($this->view_mobile, $data);
        }else {
            $this->load->view($this->view, $data);
        }
    }
}