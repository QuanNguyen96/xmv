<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Video extends CI_Controller {
        public $limit = 20;
        public $module_view = 'admin';
        public $action_view = '';
        public $view        = 'index';
        public function __construct(){
                             parent::__construct();
                             $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
                             $this->view        =  $this->module_view.'/'.$this->view;
                             $this->load->helper( array('string') );
                             $this->load->library( array('admin/admin_auth') );
                             $this->admin_auth->check_login();
        }
        
        public function index(){
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
        }
        
        public function add(){
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
        }
}   