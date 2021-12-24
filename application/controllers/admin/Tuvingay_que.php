<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tuvingay_que extends CI_Controller {
        public $limit = 50;
        public $module_view = 'admin';
        public $action_view = '';
        public $view        = 'index';
        public function __construct(){
                             parent::__construct();
                             $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
                             $this->view        =  $this->module_view.'/'.$this->view;
                             $this->load->helper( array('string','my') );
                             $this->load->library( array('admin/admin_auth','admin/admin_pagination', 'form_validation') );
                             $this->load->model( array('admin/tuvingay_que_model') );
                             //$this->admin_auth->check_login();
        }
        
        public function index()
        {                   
                          $get          = $this->input->get();
                          if( !isset( $get['page'] ) )      $get['page'] = 1;
                          if( !isset( $get['key'] ) )       $get['key'] = null;
                          if( !isset( $get['order'] ) )     $get['order'] = 'desc';
                          $total_recod  = $this->tuvingay_que_model->Db_count_index($get);
                          $list         = $this->tuvingay_que_model->Db_get_index( $get, $this->limit );
                          $this->admin_pagination->set_url($get);
                          $this->admin_pagination->set_total_row($total_recod);
                          $this->admin_pagination->set_page_row($this->limit);
                          $this->admin_pagination->set_current_page($get['page']);
                          $data['pagination'] = $this->admin_pagination->created();
                          $data['list'] = $list;
                          $data['get']  = $get;
                          $data['success'] = $this->session->flashdata('success');
                          $data['total_recod'] = $total_recod;
                          $data['view'] = $this->action_view;
                          $this->load->view( $this->view, $data );  
        }
        
        public function edit()
        {
                          $get = $this->input->get();
                          if( $_POST )
                          {
                            //if( $this->form_validation->run('edit_tuvingay_que') == true )
                            //{
                                $post = $this->input->post();
                                $update['y_nghia'] = serialize($post['y_nghia']);
                                $this->tuvingay_que_model->db->where('id',$post['id'])->update('tvn_que',$update);
                                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                                if( $get['ac'] == 'save' )
                                {
                                    $data['success'] = $success;
                                }
                                else
                                {
                                    $this->session->set_flashdata('success',$success);
                                    $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                                    redirect( base_url('admin/tuvingay_que/index?page='.$page) );
                                }
                            //}
                            //else
                            //{
                            //    $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            //}
                            
                          }
                          $data['item']         = $this->tuvingay_que_model->Db_get_edit( $get );
                          if( empty($data['item']) ) show_404();
                          $action_view_image = base_url().'media/images/tuvingay_que/';
                          $this->session->set_userdata('action_view_image', $action_view_image);
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
                          
        }
        
        public function delete()
        {
            if( $_POST && !empty( $_POST['cid'] ) )
            {
                // $cid  = $this->input->post('cid');
                // $page = $this->input->post('cid');
                // $this->tuvingay_que_model->db->where_in('id',$cid)->delete('tuvingay_que');
                // $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
                redirect( base_url('admin/tuvingay_que/index') );
            }
        }

}        