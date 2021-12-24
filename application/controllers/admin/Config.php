<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config extends CI_Controller
{
    public $limit = 20;
    public $module_view = 'admin';
    public $action_view = '';
    public $view = 'index';

    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $this->view = $this->module_view . '/' . $this->view;
        $this->load->helper(array('string', 'my'));
        $this->load->library(array('admin/admin_auth', 'admin/admin_html', 'admin/admin_pagination', 'form_validation'));
        $this->load->model(array('admin/config_model'));
        $this->admin_auth->check_login();
    }

    public function index()
    {

        //set folder ckfinder upload
        $action_view_image = base_url() . 'media/images/config/';
        $this->session->set_userdata('action_view_image', $action_view_image);

        $this->admin_auth->check_access($this->action_view);
        //$mang = array(
//                           array('name'=>'title',    'type' =>'text',     'title'=>'Tiêu đề','value'=>'Website chuẩn seo'),
//                           array('name'=>'keywords', 'type' =>'text',     'title'=>'Từ khóa','value'=>'Website chuẩn seo, webseo'),
//                           array('name'=>'hotline',  'type' =>'textarea', 'title'=>'Hotline','value'=>"0962187999\n01689933706"),
//                           array('name'=>'about',    'type' =>'editor',   'title'=>'Giới thiệu','value'=>"0962187999\n01689933706"),
//                           //array('name'=>'select',   'type' =>'select', 'title'=>'Lựa chọn','value'=>array('value'=>'abc','name')),
//                         );
        if ($_POST) {
            $post = $this->input->post();
            foreach ($post as $key => $val) {
                $this->config_model->db->where('name', $key)->update('config', array('value' => $val));
            }
        }
        $config = $this->config_model->db->get('config')->row_array();
        $data['arrConfig'] = $this->config_model->db->get('config')->result_array();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function listconfig()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if (!isset($get['page'])) $get['page'] = 1;
        if (!isset($get['key'])) $get['key'] = null;
        if (!isset($get['order'])) $get['order'] = 'desc';
        $total_recod = $this->config_model->Db_count_index($get);
        $list = $this->config_model->Db_get_index($get, $this->limit);
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get'] = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function add()
    {
        $this->admin_auth->check_access($this->action_view);
        if ($_POST) {
            if ($this->form_validation->run('add_config') == true) {
                $post = $this->input->post();
                $insert['name'] = strtolower($post['name']);
                $insert['title'] = $post['title'];
                $insert['type'] = $post['type'];
                $insert['config'] = $post['config'];
                $insert['value'] = $post['value'];
                $this->config_model->db->insert('config', $insert);
                if ($get['ac'] == 'save') {
                    $id = $this->config_model->db->select_max('id')->get('config')->row('id');
                    redirect(base_url('admin/config/edit?id=' . $id));
                } else {
                    redirect(base_url('admin/config/index'));
                }

            } else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }

        }
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function edit()
    {

        $this->admin_auth->check_access($this->action_view);
        if ($_POST) {
            if ($this->form_validation->run('add_config') == true) {
                $post = $this->input->post();
                $insert['name'] = strtolower($post['name']);
                $insert['title'] = $post['title'];
                $insert['type'] = $post['type'];
                $insert['config'] = $post['config'];
                $insert['value'] = $post['value'];
                $this->config_model->db->insert('config', $insert);
                if ($get['ac'] == 'save') {
                    $id = $this->config_model->db->select_max('id')->get('config')->row('id');
                    redirect(base_url('admin/config/edit?id=' . $id));
                } else {
                    redirect(base_url('admin/config/index'));
                }

            } else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }

        }
        $this->session->set_userdata('action_view_image', $action_view_image);
        $dataedit = $this->config_model->getById($_GET['id']);

        $data['item'] = $dataedit[0];
        $data['view'] = $this->action_view;

        $this->load->view($this->view, $data);
    }
}        