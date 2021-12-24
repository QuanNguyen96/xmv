<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Config_jossaoque extends CI_Controller{
    private $_limit = 20;
    private $_user = null;
    public function __construct(){
        parent::__construct();
        // $this->load->library(array('form_validation','validatealias','phantrang','recursive'));
        $this->load->library(array('admin/Admin_auth'));
        $this->load->model('admin/public_model');
        $this->load->model('admin/config_jossaoque_model');
        // $this->load->helper(array('menu_helper','text'));
        $this->load->helper(array('text'));
        if( !$this->admin_auth->is_login() ){
            redirect('admin/user/login');
        }
    }
    
    
    public function index(){
        $url = $this->uri->uri_to_assoc(4);
        
        $data['list'] = $this->config_jossaoque_model->Db_list_record();
        if( $this->session->flashdata('add_ok') ){
            $data['add_ok'] = 'Thêm thành công!';
        }
        if( $this->session->flashdata('edit_ok') ){
            $data['add_ok'] = 'Sửa thành công!';
        }
        if( $this->session->flashdata('delete_ok') ){
            $data['add_ok'] = 'Xóa thành công!';
        }
        $data['view'] = 'admin/config_jossaoque/index';
        $this->load->view('admin/index',$data);
    }
    
    public function edit(){
        if($_POST){
            $id = $this->input->post('id');
            $update_item['loidoan']          = $this->input->post('loidoan');
            $update_item['diengiai']         = $this->input->post('diengiai');

            $this->public_model->Db_Update('jos_sao_que',$update_item,'id',array($id));
            $this->session->set_flashdata('add_ok','true');
            if(isset($_POST['save-close'])){
                $page = $this->uri->segment(6);
                redirect(base_url('admin/config_jossaoque/index/'));
            }
            if(isset($_POST['save-edit'])){
                $data['success'] = true;
            }
        }
        $id = $this->uri->segment(4);
        if(! $id || !is_numeric($id)){
            show_404();
        }
        $data['item'] = $this->public_model->db->where('id',$id)->get('jos_sao_que')->row_array();
        if(empty($data['item'])){
            show_404();
        }
        if($this->session->flashdata('add_ok')){
            $data['success'] = true;
        }
        
        $data['view'] = 'admin/config_jossaoque/edit';
        $this->load->view('admin/index',$data);
    }

    
    public function delete(){
        $this->auth->check_permissions('article','v');
        if($_POST){
            $cid  = $this->input->post('cid');
            if( !is_array($cid) ){
                 $cid = array($cid);
            }
            foreach($cid as $key=>$val){
                $item = $this->public_model->Db_Select_One('seosim',array('id'=>$val),'id');
                $this->public_model->db->where('id',$val)->delete('seosim');
            }
            if( $post = $this->input->post('post') ){
                
            }else{
                $this->session->set_flashdata('delete_ok','true');
                redirect('admin/seosim/index');
            }
            
        }
    }
    
}    