<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tags extends CI_Controller {
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
                             $this->load->model( array('admin/tags_model') );
                             $this->admin_auth->check_login();
        }
        
        public function index()
        {                   
                          $get          = $this->input->get();
                          if( !isset( $get['page'] ) )      $get['page'] = 1;
                          if( !isset( $get['key'] ) )       $get['key'] = null;
                          if( !isset( $get['module'] ) )    $get['module'] = null;
                          if( !isset( $get['order'] ) )     $get['order'] = 'desc';
                          $total_recod  = $this->tags_model->Db_count_index($get);
                          $list         = $this->tags_model->Db_get_index( $get, $this->limit );
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
                            if( $this->form_validation->run('edit_tags') == true )
                            {
                                $post = $this->input->post();
                                $update['name']         = $post['name'];
                                $update['content']      = $post['content'];
                                $update['title']        = $post['title'] != '' ? $post['title'] : $post['name'];
                                $update['keywords']     = $post['keywords'];
                                $update['description']  = $post['description'];
                                $this->tags_model->db->where('id',$get['id'])->update('tags',$update);
                                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                                $this->session->set_flashdata('success',$success);
                                if( $get['ac'] == 'save_close' )
                                {
                                    $page = isset($get['page']) ? (int)$get['page'] : 1 ;
                                    redirect( base_url('admin/tags/index?page='.$page) );
                                }
                            }
                            else
                            {
                                $data['error'] = '<div class="error">'.validation_errors().'</div>';
                            }
                            
                          }
                          $data['item']         = $this->tags_model->Db_get_edit( $get );
                          if( empty($data['item']) ) show_404();
                          $action_view_image = base_url().'media/images/tags/'.$get['id'].'/';
                          $this->session->set_userdata('action_view_image', $action_view_image);
                          $data['success'] = $this->session->flashdata('success');
                          $data['view']       = $this->action_view;
                          $this->load->view( $this->view, $data );  
                          
        }
        
        public function delete()
        {
            if( $_POST && !empty( $_POST['cid'] ) )
            {
                $cid  = $this->input->post('cid');
                $this->db->where_in('id',$cid)->delete('tags');
                $this->db->where_in('tags_id',$cid)->delete('tags_table');
                $this->session->set_flashdata('success','<div class="success"><p>Xóa thành công!</p></div>');
                redirect( base_url('admin/tags/index') );
            }
        }
        
        /** Callback check slug **/
        public function check_slug($str)
        {
            $this->load->library('admin/admin_validateslug');
            $id          = $this->input->post('id');
            $slug        = $this->admin_validateslug->validation( $this->input->post('slug') );
            $check       = $this->tags_model->db->where('slug',$slug)->get('tags')->row_array();
            if( !empty( $check ) && $check['id'] != $id )
                return false;
            else
                return true;
        }
       
        /** AJAX ADD TAGS **/
        public function ajax_add_tags()
        {
            $listTag = array();
            $this->load->library('admin/admin_validateslug');
            $tags = $this->input->post('tags');
            $id   = $this->input->post('id');
            $table_name = $this->input->post('module');
            $arr_tags = explode(',', $tags);
            if( !empty($arr_tags) )
            {
                foreach( $arr_tags as $val )
                {
                   $slug_tag  = $this->admin_validateslug->validation($val);
                   $check_tag = $this->tags_model->check_tag(trim($val), $slug_tag, $id,$table_name);
                   if( !empty($check_tag) ) $listTag[] = $check_tag;
                }
                
            }
            $html = '';
            if( !empty( $listTag ) )
            {
                foreach( $listTag as $val )
                {
                   $html.='<a href="#" id="tag_'.$val['id'].'"><i class="fa fa-times-circle" aria-hidden="true" onclick="removeTag('.$val['id'].',\''.base_url('admin/tags/ajax_remove_tags').'\');"></i>'.$val['tag'].'</a>';
                }
            }
            $return = array('html'=>$html);
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode($return));
        }
        
        public function ajax_remove_tags()
        {
            $id = $this->input->post('id');
            $this->tags_model->db->where('id',$id)->delete('tags_table');
            $return = array('return'=>'ok');
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode($return));
        }
}        