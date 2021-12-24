<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Router extends CI_Controller {
        public $limit = 20;
        public $module_view = 'admin';
        public $action_view = '';
        public $view        = 'index';
        public function __construct(){
                             parent::__construct();
                             $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
                             $this->view        =  $this->module_view.'/'.$this->view;
                             $this->load->helper( array('string','my') );
                             $this->load->library( array('admin/admin_auth','admin/admin_pagination', 'form_validation') );
                             $this->load->model( array('admin/router_model') );
                             $this->admin_auth->check_login();
        }
        
        public function index()
        {                   
                          $this->admin_auth->check_access($this->action_view);
                          $get          = $this->input->get();
                          if( !isset( $get['page'] ) )      $get['page'] = 1;
                          if( !isset( $get['key'] ) )       $get['key'] = null;
                          $total_recod  = $this->router_model->Db_count_index($get);
                          $list         = $this->router_model->Db_get_index( $get, $this->limit );
                          $this->admin_pagination->set_url($get);
                          $this->admin_pagination->set_total_row($total_recod);
                          $this->admin_pagination->set_page_row($this->limit);
                          $this->admin_pagination->set_current_page($get['page']);
                          $data['pagination'] = $this->admin_pagination->created();
                          $data['list'] = $list;
                          $data['get']  = $get;
                          $data['success'] = $this->session->flashdata('success');
                          $data['error']   = $this->session->flashdata('error');
                          $data['total_recod'] = $total_recod;
                          $data['view'] = $this->action_view;
                          $this->load->view( $this->view, $data );  
        }
        
        public function add()
        {
                          $this->admin_auth->check_access($this->action_view);
                          if( $_POST )
                          {
                            if( $this->form_validation->run('edit_router') == true )
                            {
                                $post = $this->input->post();
                                $insert['router_key']     = $post['router_key'];
                                $insert['router_result']  = $post['router_result'];
                                $this->router_model->db->insert('router',$insert);
                                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                                $this->session->set_flashdata('success',$success);
                                redirect( base_url('admin/router/index') );
                            }
                            else
                            {
                                $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            }
                            
                          }
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
        }
        
        public function edit()
        {
                          $this->admin_auth->check_access($this->action_view);
                          $get = $this->input->get();
                          if( $_POST )
                          {
                            if( $this->form_validation->run('edit_router') == true )
                            {
                                $post = $this->input->post();
                                $update['router_key']     = $post['router_key'];
                                $update['router_result']  = $post['router_result'];
                                $this->router_model->db->where('id',$post['id'])->update('router',$update);
                                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                                $this->session->set_flashdata('success',$success);
                                redirect( base_url('admin/router/index') );
                            }
                            else
                            {
                                $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            }
                          }
                          $data['item']         = $this->router_model->Db_get_edit( $get );
                          if( empty($data['item']) ) show_404();
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
        }
        
        public function delete()
        {
            $this->admin_auth->check_access($this->action_view);
            if( $_POST && !empty( $_POST['cid'] ) )
            {
                $this->router_model->db->where_in('id',$_POST['cid'])->delete('router');
                $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
                redirect( base_url('admin/router/index') );
            }
        }
}        