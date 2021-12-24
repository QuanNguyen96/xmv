<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Seolink extends CI_Controller {
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
                             $this->load->model( array('admin/seolink_model') );
                             $this->admin_auth->check_login();
        }
        
        public function index()
        {                   
                          $get          = $this->input->get();
                          if( !isset( $get['page'] ) )      $get['page'] = 1;
                          if( !isset( $get['key'] ) )       $get['key'] = null;
                          if( !isset( $get['order'] ) )     $get['order'] = 'desc';
                          $total_recod  = $this->seolink_model->Db_count_index($get);
                          $list         = $this->seolink_model->Db_get_index( $get, $this->limit );
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
                          if( $_POST )
                          {
                            if( $this->form_validation->run('edit_seolink') == true )
                            {
                                $post = $this->input->post();
                                $insert['link']         = $post['link'];
                                $insert['name']          = $post['name'];
                                $insert['title']        = $post['title'];
                                $insert['keywords']     = $post['keywords'];
                                $insert['description']  = $post['description'];
                                $insert['text']         = $post['text'];
                                $insert['text_foot']    = $post['text_foot'];
                                $insert['text_content'] = $post['text_content'];
                                $insert['state']        = $post['state'];
                                $insert['created_by']   = $this->admin_auth->get_colum('id');
                                $insert['created_date'] = time();
                                $this->seolink_model->db->insert('seolink',$insert);
                                if( $get['ac'] == 'save' )
                                {
                                    $id = $this->seolink_model->db->select_max('id')->get('seolink')->row('id');
                                    redirect( base_url('admin/seolink/edit?id='.$id) );
                                }
                                else
                                {
                                    redirect( base_url('admin/seolink/index') );
                                }
                                
                            }
                            else
                            {
                                $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            }
                            
                          }
                          $action_view_image = base_url().'media/images/seolink/';
                          $this->session->set_userdata('action_view_image', $action_view_image);
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
        }
        
        public function edit()
        {
                          $get = $this->input->get();
                          if( $_POST )
                          {
                            if( $this->form_validation->run('edit_seolink') == true )
                            {
                                $post = $this->input->post();
                                $update['link']         = $post['link'];
                                $update['title']        = $post['title'];
                                $update['name']         = $post['name'];
                                $update['keywords']     = $post['keywords'];
                                $update['description']  = $post['description'];
                                $update['text']         = $post['text'];
                                $update['text_foot']    = $post['text_foot'];
                                $update['text_content'] = $post['text_content'];
                                $update['state']        = $post['state'];
                                $update['created_by']   = $this->admin_auth->get_colum('id');
                                $update['created_date'] = time();
                                $this->seolink_model->db->where('id',$post['id'])->update('seolink',$update);
                                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                                if( $get['ac'] == 'save' )
                                {
                                    $data['success'] = $success;
                                }
                                else
                                {
                                    $this->session->set_flashdata('success',$success);
                                    $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                                    redirect( base_url('admin/seolink/index?page='.$page) );
                                }
                            }
                            else
                            {
                                $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            }
                            
                          }
                          $data['item']         = $this->seolink_model->Db_get_edit( $get );
                          if( empty($data['item']) ) show_404();
                          $action_view_image = base_url().'media/images/seolink/';
                          $this->session->set_userdata('action_view_image', $action_view_image);
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
                          
        }
        
        public function delete()
        {
            if( $_POST && !empty( $_POST['cid'] ) )
            {
                $cid  = $this->input->post('cid');
                $page = $this->input->post('cid');
                $this->seolink_model->db->where_in('id',$cid)->delete('seolink');
                $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
                redirect( base_url('admin/seolink/index') );
            }
        }

}        