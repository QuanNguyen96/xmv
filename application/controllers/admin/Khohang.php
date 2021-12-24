<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Khohang extends CI_Controller {
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
                             $this->load->model( array('admin/khohang_model') );
                             $this->admin_auth->check_login();
        }
        
        public function index()
        {                   
                          $get          = $this->input->get();
                          if( !isset( $get['page'] ) )      $get['page'] = 1;
                          if( !isset( $get['key'] ) )       $get['key'] = null;
                          if( !isset( $get['order'] ) )     $get['order'] = 'desc';
                          $total_recod  = $this->khohang_model->Db_count_index($get);
                          $list         = $this->khohang_model->Db_get_index( $get, $this->limit );
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
                          $get = $this->input->get();
                          if( !isset( $get['id'] ) )
                          {
                            $insert['state']        = 0;
                            $insert['created_date'] = time();
                            $insert['created_by']   =  $this->admin_auth->get_colum('id');
                            $this->khohang_model->db->insert( 'khohang', $insert );
                            $id = $this->khohang_model->db->select_max('id')->get('khohang')->row('id');
                            redirect( base_url('admin/khohang/add?id='.$id) );
                          } 
                          if( $_POST )
                          {
                            if( $this->form_validation->run('edit_khohang') == true )
                            {
                                $post = $this->input->post();
                                $this->khohang_model->db->insert( 'url', array('slug'=>$post['slug'],'name'=>$post['name'], 'module'=>'khohang') );
                                $url_id = $this->khohang_model->db->select_max('id')->get('url')->row('id');
                                $update['url_id']  = $url_id;
                                $update['name']    = $post['name'];
                                $avatar                 = explode( '/',$post['avatar'] );
                                $update['avatar']       = array_pop($avatar);
                                $update['title']        = $post['title'] != '' ? $post['title'] : $post['name'];
                                $update['keywords']     = $post['keywords'];
                                $update['description']  = $post['description'];
                                $update['state']   = 1;
                                $this->khohang_model->db->where('id',$get['id'])->update('khohang',$update);
                                if( $get['ac'] == 'save' )
                                {
                                    redirect( base_url('admin/khohang/edit?id='.$get['id']) );
                                }
                                else
                                {
                                    redirect( base_url('admin/khohang/index') );
                                }
                                
                            }
                            else
                            {
                                $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            }
                            
                          }
                          $action_view_image = base_url().'media/images/khohang/'.$get['id'].'/';
                          $this->session->set_userdata('action_view_image', $action_view_image);
                          $data['item']       = $this->khohang_model->Db_get_edit( $get );
                          if( empty($data['item']) ) show_404();
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
        }
}        