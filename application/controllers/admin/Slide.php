<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slide extends CI_Controller {
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
                             $this->load->model( array('admin/slide_model') );
                             $this->admin_auth->check_login();
        }
        
        public function index()
        {                   
                          $this->admin_auth->check_access($this->action_view);
                          $get          = $this->input->get();
                          if( !isset( $get['page'] ) )      $get['page'] = 1;
                          if( !isset( $get['key'] ) )       $get['key'] = null;
                          if( !isset( $get['order'] ) )     $get['order'] = 'desc';
                          $total_recod  = $this->slide_model->Db_count_index($get);
                          $list         = $this->slide_model->Db_get_index( $get, $this->limit );
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
                            if( $this->form_validation->run('edit_slide') == true )
                            {
                                $post = $this->input->post();
                                $insert['name']         = $post['name'];
                                $image                  = explode( '/',$post['image'] );
                                $insert['image']        = array_pop($image);
                                $insert['link']         = $post['link'];
                                $insert['state']        = $post['state'];
                                $insert['orders']       = $post['orders'];
                                $insert['created_date'] = time();
                                $insert['created_by']   =  $this->admin_auth->get_colum('id');
                                $this->slide_model->db->insert('slide',$insert);
                                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                                $this->session->set_flashdata('success',$success);
                                redirect( base_url('admin/slide/index') );
                            }
                            else
                            {
                                $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            }
                            
                          }
                          $action_view_image = base_url().'media/images/slide/';
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
                            if( $this->form_validation->run('edit_slide') == true )
                            {
                                $post = $this->input->post();
                                $update['name']         = $post['name'];
                                $image                  = explode( '/',$post['image'] );
                                $update['image']        = array_pop($image);
                                $update['link']         = $post['link'];
                                $update['state']        = $post['state'];
                                $update['orders']       = $post['orders'];
                                $update['created_date'] = time();
                                $update['created_by']   =  $this->admin_auth->get_colum('id');
                                $this->slide_model->db->where('id',$post['id'])->update('slide',$update);
                                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                                $this->session->set_flashdata('success',$success);
                                redirect( base_url('admin/slide/index') );
                            }
                            else
                            {
                                $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            }
                          }
                          $action_view_image = base_url().'media/images/slide/';
                          $this->session->set_userdata('action_view_image', $action_view_image);
                          $data['item']         = $this->slide_model->Db_get_edit( $get );
                          if( empty($data['item']) ) show_404();
                          if( $data['item']['created_by']  !=  $this->admin_auth->get_colum('id') && $this->admin_auth->get_colum('manage') != 1 && $this->admin_auth->get_colum('email') != $this->admin_auth->get_root_email() )
                          {
                            $this->session->set_flashdata('error','<div class="error"><p>Bạn không thể sửa nội dung của người khác.</p></div>');
                            redirect('admin/slide/index');
                          }
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
        }
        
        public function delete()
        {
            if( $_POST && !empty( $_POST['cid'] ) )
            {
                $error = false;
                foreach( $_POST['cid'] as $val )
                {
                   $created_by = $this->slide_model->db->where('id',$val)->get('slide')->row('created_by');
                   if( $created_by  ==  $this->admin_auth->get_colum('id') || $this->admin_auth->get_colum('manage') == 1 || $this->admin_auth->get_colum('email') == $this->admin_auth->get_root_email() )
                   {
                      $this->slide_model->db->where('id',$val)->delete('slide');
                   }
                   else
                   $error = true;
                }
                if( $error )
                $this->session->set_flashdata('error','<div class="error"><p>Bạn không thể xóa nội dung của người khác.</p></div>');
                else
                $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
                redirect( base_url('admin/slide/index') );
            }
        }
}        