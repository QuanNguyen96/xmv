<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Baiviettuvi extends CI_Controller
{
    public $limit = 20;
    public $module_view = 'admin';
    public $action_view = '';
    public $view = 'index';
    public $dia_chi = array(
        1=>'Tý',
        2=>'Sửu',
        3=>'Dần',
        4=>'Mão',
        5=>'Thìn',
        6=>'Tỵ',
        7=>'Ngọ',
        8=>'Mùi',
        9=>'Thân',
        10=>'Dậu',
        11=>'Tuất',
        12=>'Hợi',
    );
    public $gioi_tinh = array(
        1 => 'Nam',
        2 => 'Nữ', 
    );
    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $this->view        = $this->module_view . '/' . $this->view;
        $this->load->library(array('admin/admin_auth','admin/admin_pagination','form_validation'));
        $this->load->model(array('admin/baiviettuvi_model'));
        $this->admin_auth->check_login();
    }
    
    public function index()
    {
        //$this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if (!isset($get['page']))
            $get['page'] = 1;
        if (!isset($get['key']))
            $get['key'] = null;
        if (!isset($get['order']))
            $get['order'] = 'desc';
        $total_recod = $this->baiviettuvi_model->Db_count_index($get);
        $list        = $this->baiviettuvi_model->Db_get_index($get, $this->limit);
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination']  = $this->admin_pagination->created();
        $data['list']        = $list;
        $data['get']         = $get;
        $data['success']     = $this->session->flashdata('success');
        $data['error']       = $this->session->flashdata('error');
        $data['total_recod'] = $total_recod;
        $data['view']        = $this->action_view;
        $this->load->view($this->view, $data);
    }
    
    public function add()
    {
        //$this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if ($_POST) {
            if ($this->form_validation->run('add_baiviettuvi') == true) {
                $post           = $this->input->post();
                $insert['link']      = $post['link'];
                $insert['title']     = $post['title'];
                $insert['nam_sinh']  = $post['nam_sinh'];
                $insert['nam_xem']   = $post['nam_xem'];
                $insert['gioi_tinh'] = $post['gioi_tinh'];
                $insert['dia_chi']   = $post['dia_chi'];
                $this->baiviettuvi_model->db->insert('bai_viet_tu_vi',$insert);
                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                $this->session->set_flashdata('success', $success);
                if ($get['ac'] == 'save') {
                    redirect(base_url('admin/baiviettuvi/edit?id=' . $get['id']));
                } else {
                    redirect(base_url('admin/baiviettuvi/index'));
                }
                
            } else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }
        }
        $data['dia_chi']  = $this->dia_chi;
        $data['gioi_tinh']  = $this->gioi_tinh;
        $data['view']     = $this->action_view;
        $this->load->view($this->view, $data);
    }
    
    public function edit()
    {
        //$this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if ($_POST) {
            if ($this->form_validation->run('add_baiviettuvi') == true) {
                $post           = $this->input->post();
                $update['link']      = $post['link'];
                $update['title']     = $post['title'];
                $update['nam_sinh']  = $post['nam_sinh'];
                $update['nam_xem']   = $post['nam_xem'];
                $update['gioi_tinh'] = $post['gioi_tinh'];
                $update['dia_chi']   = $post['dia_chi'];
                $this->baiviettuvi_model->db->where('id', $get['id'])->update('bai_viet_tu_vi', $update);
                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                if ($get['ac'] == 'save') {
                    $data['success'] = $success;
                } else {
                    $this->session->set_flashdata('success', $success);
                    $page = isset($get['page']) ? (int) $get['page'] : 1;
                    redirect(base_url('admin/baiviettuvi/index?page=' . $page));
                }
            } else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }
            
        }
        $data['dia_chi']  = $this->dia_chi;
        $data['gioi_tinh']  = $this->gioi_tinh;
        $data['item'] = $this->baiviettuvi_model->Db_get_edit($get);
        if (empty($data['item']))
            show_404();
        $data['success']  = $this->session->flashdata('success');
        $data['view']     = $this->action_view;
        $this->load->view($this->view, $data);
        
    }
    
    public function delete()
    {
        
    }
}