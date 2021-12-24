<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manage extends CI_Controller {
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
                             $this->load->model( array('admin/manage_model','admin/tags_model') );
                             $this->admin_auth->check_login();
        }
        
        public function index()
        {                    
                          $this->admin_auth->check_access($this->action_view);
                          $get          = $this->input->get();
                          if( !isset( $get['page'] ) )      $get['page'] = 1;
                          if( !isset( $get['key'] ) )       $get['key'] = null;
                          if( !isset( $get['order'] ) )     $get['order'] = 'desc';
                          $total_recod  = $this->manage_model->Db_count_index($get);
                          $list         = $this->manage_model->Db_get_index( $get, $this->limit );
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
                if( $this->form_validation->run('edit_manage') == true )
                {
                    $post = $this->input->post();
                    $insert['name']  = $post['name'];
                    $insert['link']  = trim($post['link']);
                    $insert['level'] = $this->admin_auth->get_colum('level');
                    $insert['created_date'] = time();
                    $insert['created_by']   =  $this->admin_auth->get_colum('id');
                    $insert['update_date']  = time();
                    $insert['update_by']    = $insert['created_by'];
                    $this->manage_model->db->insert('manage',$insert);
                    $success = '<div class="success"><p>Lưu thành công!</p></div>';
                    $this->session->set_flashdata('success',$success);
                    if( $get['ac'] == 'save' )
                    {
                        $id  = $this->manage_model->db->select_max('id')->get('manage')->row('id');
                        redirect( base_url('admin/manage/edit?id='.$id) );
                    }
                    else
                    {
                        redirect( base_url('admin/manage/index') );
                    }
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
                            if( $this->form_validation->run('edit_manage') == true )
                            {
                                $post = $this->input->post();
                                $update['name']         = $post['name'];
                                $update['link']         = trim($post['link']);
                                $update['update_by']    =  $this->admin_auth->get_colum('id');
                                $update['update_date']  = time();
                                $this->manage_model->db->where('id',$post['id'])->update('manage',$update);
                                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                                $this->session->set_flashdata('success',$success);
                                if( $get['ac'] == 'save_close' )
                                {
                                    $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                                    redirect( base_url('admin/manage/index?page='.$page) );
                                }
                            }
                            else
                            {
                                $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            }
                            
                          }
                          $data['item']         = $this->manage_model->Db_get_edit( $get );
                          if( empty($data['item']) ) show_404();
                          if( $data['item']['created_by']  !=  $this->admin_auth->get_colum('id') && $this->admin_auth->get_colum('manage') != 1 && $this->admin_auth->get_colum('email') != $this->admin_auth->get_root_email() )
                          {
                            $this->session->set_flashdata('error','<div class="error"><p>Bạn không có quyền sửa nội dung này.</p></div>');
                            redirect('admin/manage/index');
                          }
                          $data['success'] = $this->session->flashdata('success');
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
                          
        }
        
        public function delete()
        {
            $this->admin_auth->check_access($this->action_view);
            if( $_POST && !empty( $_POST['cid'] ) )
            {
               $error = false;
               foreach( $_POST['cid'] as $val ) 
               {
                    $created_by = $this->manage_model->db->where('id',$val)->get('manage')->row('created_by');
                    if( $created_by  ==  $this->admin_auth->get_colum('id') || $this->admin_auth->get_colum('manage') == 1 || $this->admin_auth->get_colum('email') == $this->admin_auth->get_root_email() )
                    {
                        $this->manage_model->db->where('id',$val)->delete('manage');
                        $this->manage_model->db->where('manage_id',$val)->delete('user_manage');                        
                    }
                    else
                    $error = true;    
                }
                if( $error )
                $this->session->set_flashdata('error','<div class="error"><p>Bạn không có quyền xóa nội dung người khác tạo.</p></div>');
                else
                $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
                redirect( base_url('admin/manage/index') );
            }
        }
        
        public function check_link_access()
        {
            $link = $this->input->post('link');
            $arr_link = explode("\n",trim($link));
            foreach( $arr_link as $key => $val )
            {
                $arr_link[$key] = trim($val);
            }
            $access_link = $this->admin_auth->get_access_link();
            $check = array_diff($arr_link, $access_link);
            if( !empty( $check ) && $this->admin_auth->get_colum('email') != $this->admin_auth->get_root_email() )
            return false;
            else
            return true;
        }    
}        