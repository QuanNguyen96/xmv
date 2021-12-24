<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Page_not_found extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $view = 'index';
    public function __construct()
    {
        parent::__construct();
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->load->library( array( 'site/lib_xemngay', 'site/ngayamduong', 'site/my_seolink','site/my_info' ) );
        $this->load->model(array('site/myconfig_model','site/article_model','site/xemboi_model',));
        $this->load->helper('form');
        require_once PUBLICPATH.'/html_dom/simple_html_dom.php';
    }

    public function index()
    {
        $data['title']       = '404 NOT FOUND';
        $data['keywords']    = '404 NOT FOUND';
        $data['description'] = '404 NOT FOUND';
        $data['noindex'] = '<meta name="robots" content="noindex, nofollow" />';
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );
    }

    public function redirect(){
        return redirect(base_url(),'location',301);
    }
}
