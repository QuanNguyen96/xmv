<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Conso extends CI_Controller{
    public $module_view = 'site';
    public $action_view = '';
    public $action_view_mobile = '';
    public $view        = 'index';
    public $view_mobile = 'index_mobile';
    public $cache_time = '1440';
    public function __construct(){
        parent::__construct();
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->action_view_mobile =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->view_mobile  =  $this->module_view.'/'.$this->view_mobile;
        $this->load->library( array('site/my_seolink','site/my_info', 'form_validation','site/mobile_detect') );
        $this->load->model(array('site/myconfig_model','site/article_model'));
        $this->load->helper(array('my'));
    }

    public function ynghiaso(){
    	$this_uri = $this->uri->segment(1);
    	$my_seolink = $this->my_seolink->set_seolink();
        $breadcrumb = array(
            0 => array(
                'name' => $this->my_seolink->get_name() != null ? $this->my_seolink->get_name() : 'Ý nghĩa số',
                'slug' => $this_uri,
            )
        );
        $data['breadcrumb']  = breadcrumb($breadcrumb);
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['name']        = $this->my_seolink->get_name() != null ? $this->my_seolink->get_name() : 'Ý nghĩa số' ;
        $data['text']        = $this->my_seolink->get_text();
        $data['text_foot']   = $this->my_seolink->get_text_foot();
		$data['view']        = $this->action_view;
        $this->load->view( $this->view, $data );
    }
    public function sohoptuoi(){
    	$this_uri = $this->uri->segment(1);
    	$my_seolink = $this->my_seolink->set_seolink();
        $breadcrumb = array(
            0 => array(
                'name' => $this->my_seolink->get_name() != null ? $this->my_seolink->get_name() : 'Số hợp tuổi',
                'slug' => $this_uri,
            )
        );
        $data['breadcrumb']  = breadcrumb($breadcrumb);
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['name']        = $this->my_seolink->get_name() != null ? $this->my_seolink->get_name() : 'Số hợp tuổi' ;
        $data['text']        = $this->my_seolink->get_text();
        $data['text_foot']   = $this->my_seolink->get_text_foot();
		$data['view']        = $this->action_view;
        $this->load->view( $this->view, $data );
    }
    public function sohopmenh(){
    	$this_uri = $this->uri->segment(1);
    	$my_seolink = $this->my_seolink->set_seolink();
        $breadcrumb = array(
            0 => array(
                'name' => $this->my_seolink->get_name() != null ? $this->my_seolink->get_name() : 'Số hợp mệnh',
                'slug' => $this_uri,
            )
        );
        $data['breadcrumb']  = breadcrumb($breadcrumb);
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['name']        = $this->my_seolink->get_name() != null ? $this->my_seolink->get_name() : 'Số hợp mệnh' ;
        $data['text']        = $this->my_seolink->get_text();
        $data['text_foot']   = $this->my_seolink->get_text_foot();
        if ($this->mobile_detect->isMobile()) {
            $data['view'] = $this->action_view_mobile;
            $this->load->view($this->view_mobile, $data);
        } else {
            $data['view'] = $this->action_view;
            $this->load->view($this->view, $data);
        }
    }
}