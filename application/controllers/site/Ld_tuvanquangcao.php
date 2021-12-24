<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ld_tuvanquangcao extends CI_Controller {
	public $module_view = 'site';
    public $action_view = '';
    public $view        = 'index'; 
    public function __construct(){
        parent::__construct();
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->action_view_mobile =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method().'_mobile';
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->load->library( array( 'site/my_seolink', 'site/comment_lib' ) );
    }

	public function index()
	{	
		$url = $this->uri->uri_string();
		$arr_list   = array(
            'link'   => $url,
            'replace'   => array(),
        );
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);
		$this->my_seolink->seolink_cst($arr_list);
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
    	$data['view'] = $this->action_view;
		$this->load->view($this->view,$data);
	}

}

/* End of file Ld_tuvanquangcao.php */
/* Location: ./application/controllers/site/Ld_tuvanquangcao.php */