<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Suanoidung extends CI_Controller
{
    public $limit = 20;
    public $module_view = 'admin';
    public $action_view = '';
    public $view = 'index';
    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $this->view        = $this->module_view . '/' . $this->view;
        $this->load->helper(array(
            'string',
            'my'
        ));
        $this->load->library(array(
            'admin/admin_auth',
            'admin/admin_pagination',
            'form_validation'
        ));
        $this->load->model(array(
            'admin/suanoidung_model',
            'admin/tags_model'
        ));
        $this->admin_auth->check_login();
    }
    
    public function index_boibaihangngay()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if (!isset($get['page']))
            $get['page'] = 1;
        if (!isset($get['key']))
            $get['key'] = null;
        if (!isset($get['order']))
            $get['order'] = 'desc';
        $total_recod = $this->suanoidung_model->Db_count_table_1($get);
        $list        = $this->suanoidung_model->Db_get_index_table_1($get, $this->limit);
        
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
    public function index_boingaysinh()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if (!isset($get['page']))
            $get['page'] = 1;
        if (!isset($get['key']))
            $get['key'] = null;
        if (!isset($get['order']))
            $get['order'] = 'desc';
        $total_recod = $this->suanoidung_model->Db_count_table_2($get);
        $list        = $this->suanoidung_model->Db_get_index_table_2($get, $this->limit);

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
    
    public function edit_boibaihangngay()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if ($_POST) {
            $post           = $this->input->post();
            $update['luan'] = $post['luan'];
            
            $this->suanoidung_model->Db_update_table_1($get, $update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if ($get['ac'] == 'save') {
                $data['success'] = $success;
            } else {
                $this->session->set_flashdata('success', $success);
                $page = isset($get['page']) ? (int) $get['page'] : 1;
                redirect(base_url('admin/suanoidung/index_boibaihangngay?page=' . $page));
            }
        }
        $data['item'] = $this->suanoidung_model->Db_get_edit_table_1($get);
        if (empty($data['item']))
            show_404();

        $data['view']     = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function edit_boingaysinh()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if ($_POST) {
            $post            = $this->input->post();
            $update['sohen'] = $post['sohen'];
            $update['nguyento'] = $post['nguyento'];
            $update['phamchat'] = $post['phamchat'];
            $update['tinhchat'] = $post['tinhchat'];
            $update['tinhcachdienhinh'] = $post['tinhcachdienhinh'];
            $update['batloi']   = $post['batloi'];
            $update['tinhcach'] = $post['tinhcach'];
            $update['tinhyeu']  = $post['tinhyeu'];
            $update['suckhoe']  = $post['suckhoe'];
            $update['giadinh']  = $post['giadinh'];
            $update['sunghiep'] = $post['sunghiep'];
            $update['tongquat'] = $post['tongquat'];
            
            $this->suanoidung_model->Db_update_table_2($get, $update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            if ($get['ac'] == 'save') {
                $data['success'] = $success;
            } else {
                $this->session->set_flashdata('success', $success);
                $page = isset($get['page']) ? (int) $get['page'] : 1;
                redirect(base_url('admin/suanoidung/index_boingaysinh?page=' . $page));
            }
        }
        $data['item'] = $this->suanoidung_model->Db_get_edit_table_2($get);
        if (empty($data['item']))
            show_404();

        $data['view']     = $this->action_view;
        $this->load->view($this->view, $data);
    }
    
    public function delete_boibaihangngay()
    {
        $this->admin_auth->check_access($this->action_view);
        if ($_POST && !empty($_POST['cid'])) {
            $this->load->helper('file');
            $cid   = $this->input->post('cid');
            foreach ($cid as $val) {
                $this->suanoidung_model->db->where('id', $val)->delete('boibai_hangngay');
            }
            $success = '<div class="success"><p>Xóa thành công!</p></div>';
            $this->session->set_flashdata('success', $success);
            redirect(base_url('admin/suanoidung/index_boibaihangngay'));
        }
    }

    public function delete_boingaysinh()
    {
        $this->admin_auth->check_access($this->action_view);
        if ($_POST && !empty($_POST['cid'])) {
            $this->load->helper('file');
            $cid   = $this->input->post('cid');
            foreach ($cid as $val) {
                $this->suanoidung_model->db->where('id', $val)->delete('boingaysinh');
            }
            $success = '<div class="success"><p>Xóa thành công!</p></div>';
            $this->session->set_flashdata('success', $success);
            redirect(base_url('admin/suanoidung/index_boibaihangngay'));
        }
    }
}