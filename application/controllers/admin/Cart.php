<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller {
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
                             $this->load->model( array('admin/cart_model') );
                             $this->admin_auth->check_login();
        }
        
        public function index()
        {                   
                          $this->admin_auth->check_access($this->action_view);
                          $get          = $this->input->get();
                          if( !isset( $get['page'] ) )      $get['page'] = 1;
                          if( !isset( $get['key'] ) )       $get['key'] = null;
                          if( !isset( $get['order'] ) )     $get['order'] = 'desc';
                          $total_recod  = $this->cart_model->Db_count_index($get);
                          $list         = $this->cart_model->Db_get_index( $get, $this->limit );
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
        
        public function add()
        {
                          $this->admin_auth->check_access($this->action_view);
                          $get = $this->input->get();
                          if( $_POST )
                          {
                            if( $this->form_validation->run('edit_cart') == true )
                            {
                                $post = $this->input->post();
                                $insert['link']         = $post['link'];
                                $insert['title']        = $post['title'];
                                $insert['keywords']     = $post['keywords'];
                                $insert['description']  = $post['description'];
                                $insert['text']         = $post['text'];
                                $insert['state']        = $post['state'];
                                $insert['created_by']   = $this->admin_auth->get_colum('id');
                                $insert['created_date'] = time();
                                $this->cart_model->db->insert('cart',$insert);
                                if( $get['ac'] == 'save' )
                                {
                                    $id = $this->cart_model->db->select_max('id')->get('cart')->row('id');
                                    redirect( base_url('admin/cart/edit?id='.$id) );
                                }
                                else
                                {
                                    redirect( base_url('admin/cart/index') );
                                }
                                
                            }
                            else
                            {
                                $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            }
                            
                          }
                          $action_view_image = base_url().'media/images/cart/';
                          $this->session->set_userdata('action_view_image', $action_view_image);
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
        }
        
        public function edit()
        {
                          $this->admin_auth->check_access($this->action_view);
                          $get = $this->input->get();
                          if( $_POST )
                          {
                            if( $this->form_validation->run('edit_cart') == true )
                            {
                                $post = $this->input->post();
                                $update['link']         = $post['link'];
                                $update['title']        = $post['title'];
                                $update['keywords']     = $post['keywords'];
                                $update['description']  = $post['description'];
                                $update['text']         = $post['text'];
                                $update['state']        = $post['state'];
                                $update['created_by']   = $this->admin_auth->get_colum('id');
                                $update['created_date'] = time();
                                $this->cart_model->db->where('id',$post['id'])->update('cart',$update);
                                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                                if( $get['ac'] == 'save' )
                                {
                                    $data['success'] = $success;
                                }
                                else
                                {
                                    $this->session->set_flashdata('success',$success);
                                    $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                                    redirect( base_url('admin/cart/index?page='.$page) );
                                }
                            }
                            else
                            {
                                $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            }
                            
                          }
                          $data['item']         = $this->cart_model->Db_get_edit( $get );
                          if( empty($data['item']) ) show_404();
                          $action_view_image = base_url().'media/images/cart/';
                          $this->session->set_userdata('action_view_image', $action_view_image);
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
                          
        }
        
        public function delete()
        {
            $this->admin_auth->check_access($this->action_view);
            if( $_POST && !empty( $_POST['cid'] ) )
            {
                $cid  = $this->input->post('cid');
                $page = $this->input->post('cid');
                $this->cart_model->db->where_in('id',$cid)->delete('cart');
                $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
                redirect( base_url('admin/cart/index') );
            }
        }

}        