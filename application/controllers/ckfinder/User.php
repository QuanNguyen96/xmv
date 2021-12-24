<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    
    public function connector(){
                         $admin = true;
                         define( 'USER_AUTHENCATION', $admin );
                         $action_view_image = $this->session->userdata('action_view_image');
                         define( 'ACTION_VIEW', $action_view_image );
                      
                         require_once "./public/ckfinder/core/connector/php/connector.php";
                         
    }
    
    public function html(){
                     $this->load->view('ckfinder/user/html');
    }

}    