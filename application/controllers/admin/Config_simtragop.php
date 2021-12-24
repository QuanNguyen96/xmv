<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Config_simtragop extends CI_Controller {
        public $limit = 20;
        public $module_view = 'admin';
        public $action_view = '';
        public $view        = 'index';
        public function __construct(){
            parent::__construct();
            $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
            $this->view        =  $this->module_view.'/'.$this->view;
            $this->load->helper( array('string','my') );
            $this->load->library( array('admin/admin_auth', 'admin/admin_html', 'admin/admin_pagination','form_validation') );
            $this->load->model( array('admin/config_simtragop_model') );
            // $this->admin_auth->check_login();
        }
        // cấu hình lãi suất và thời hạn trả góp
        public function config_tragop()
        {   
            if ($this->input->post('save')) {
                $data = array(
                    'thoi_han' => $this->input->post('thoi_han'),
                    'lai_suat' => $this->input->post('lai_suat'),
                );
                $this->config_simtragop_model->db->update('config_muatragop',$data);
            }
            $data['item'] = $this->config_simtragop_model->db->get('config_muatragop')->row_array();  
            $this->admin_auth->check_access($this->action_view);
            $data['view'] = $this->action_view;
            $this->load->view( $this->view, $data );  
        }
}        