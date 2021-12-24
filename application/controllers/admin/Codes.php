<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Codes extends CI_Controller {
        public $limit = 20;
        public $module_view = 'admin';
        public $action_view = '';
        public $view        = 'index';
        public function __construct(){
                             parent::__construct();
                             $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
                             $this->view        =  $this->module_view.'/'.$this->view;
                             //$this->load->helper( array('string','my') );
                             //$this->load->library( array('admin/admin_auth','admin/admin_pagination', 'form_validation') );
                             //$this->load->model( array('admin/article_model','admin/tags_model') );
                             //$this->admin_auth->check_login();
        }
        
        public function index()
        {
            $this->load->database();
            $data['list'] = $this->db->get('codes')->result_array();
            $this->load->view( 'admin/codes/index', $data );  
        }
}        