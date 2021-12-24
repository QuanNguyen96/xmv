<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {
	public $module_view = 'site';
    public $action_view = '';
    public $action_view_mobile = '';
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
		// require_once PUBLICPATH . 'mobile_detect/mobile_detect.php';
		$detect = new Mobile_Detect;
		$url = $this->uri->uri_string();
		$arr_list   = array(
            'link'   => $url,
            'replace'   => array(),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        
        $this->my_seolink->seolink_cst($arr_list);
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
		if($detect->isMobile()){
			$data['view'] = $this->action_view_mobile;
		}else{
        	$data['view'] = $this->action_view;
		}
		$this->load->view($this->view,$data);
	}

   public function cachtinhsim()
   {
      $this->my_seolink->seolink_cst($arr_list);
      $data['title']       = $this->my_seolink->get_title();
      $data['keywords']    = $this->my_seolink->get_keywords();
      $data['description'] = $this->my_seolink->get_description();
      $data['view'] = $this->action_view;
      $this->load->view($this->view,$data);
   } 

}

/* End of file Landingpage.php */
/* Location: ./application/controllers/site/Landingpage.php */