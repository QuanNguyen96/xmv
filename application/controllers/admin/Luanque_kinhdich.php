<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Luanque_kinhdich extends CI_Controller
    {
        public $limit = 20;
        public $module_view = 'admin';
        public $action_view = '';
        public $view = 'index';
        public function __construct()
        {
            parent::__construct();
            $this->action_view = $this->module_view . '/' . $this->router->fetch_class() .
                '/' . $this->router->fetch_method();
            $this->view = $this->module_view . '/' . $this->view;
            $this->load->helper(array('string', 'my', 'my_menh'));
            $this->load->library(array(
                'admin/admin_auth',
                'admin/admin_pagination',
                'form_validation'));
            $this->load->model(array('admin/luanque_kinhdich_model'));
            $this->admin_auth->check_login();
        }
    
        public function index()
        {
            // $this->admin_auth->check_access($this->action_view);
            $get = $this->input->get();
            if (!isset($get['page']))
                $get['page'] = 1;
            if (!isset($get['key']))
                $get['key'] = null;
            if (!isset($get['order']))
                $get['order'] = 'desc';
            $total_recod = $this->luanque_kinhdich_model->Db_count_index($get);
            $list = $this->luanque_kinhdich_model->Db_get_index($get, $this->limit);
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
            // $this->admin_auth->check_access($this->action_view);

            if ($_POST) {
                $post = $this->input->post();
                $insert['id_que'] = $post['id_que'];
                $insert['nghia_tenque'] = $post['nghia_tenque'];
                $insert['nghia_ngoai']  = $post['nghia_ngoai'];
                $insert['nghia_noi']    = $post['nghia_noi'];
                $insert['phantich_thoantu']     = $post['phantich_thoantu'];
                $insert['phantich_thoantruyen'] = $post['phantich_thoantruyen'];
                $insert['soluoc']       = $post['soluoc'];
                $insert['ynghia']       = $post['ynghia'];
                $insert['totchoviec']   = $post['totchoviec'];
                $insert['created_by']   =  $this->admin_auth->get_colum('id');
                
                $this->luanque_kinhdich_model->Db_insert($insert);
                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('admin/luanque_kinhdich/index'));
            }
            // $action_view_image = base_url() . 'media/images/luanque_kinhdich/';
            // $this->session->set_userdata('action_view_image', $action_view_image);
            $listQue = $this->luanque_kinhdich_model->Db_listQue();
            $data['listQue']    = $listQue;
            $data['view']       = $this->action_view;
            $this->load->view($this->view, $data);
        }
    
        public function edit()
        {
            // $this->admin_auth->check_access($this->action_view);
            $get = $this->input->get();
            if ($_POST) {
                $post = $this->input->post();
                
                $update['id_que'] = $post['id_que'];
                $update['nghia_tenque'] = $post['nghia_tenque'];
                $update['nghia_ngoai']  = $post['nghia_ngoai'];
                $update['nghia_noi']    = $post['nghia_noi'];
                $update['phantich_thoantu']     = $post['phantich_thoantu'];
                $update['phantich_thoantruyen'] = $post['phantich_thoantruyen'];
                $update['soluoc']       = $post['soluoc'];
                $update['ynghia']       = $post['ynghia'];
                $update['totchoviec']   = $post['totchoviec'];
                $update['updated_by']     =  $this->admin_auth->get_colum('id');
                
                $this->luanque_kinhdich_model->Db_update($update);
                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('admin/luanque_kinhdich/index'));
            }

            
            // $action_view_image = base_url() . 'media/images/luanque_kinhdich/';
            // $this->session->set_userdata('action_view_image', $action_view_image);

            $listQue = $this->luanque_kinhdich_model->Db_listQue();
            $data['listQue']    = $listQue;
            
            $data['item'] = $this->luanque_kinhdich_model->Db_get_edit($get);
            if (empty($data['item']))
                show_404();
            $data['view'] = $this->action_view;
            $this->load->view($this->view, $data);
        }
    
        public function delete()
        {
            if ($_POST && !empty($_POST['cid'])) {
                $error = false;
                foreach ($_POST['cid'] as $val) {
                    $created_by = $this->luanque_kinhdich_model->db->where('id', $val)->get('luanque_kinhdich')->row('created_by');
                    if ($created_by == $this->admin_auth->get_colum('id') || $this->admin_auth->
                        get_colum('manage') == 1 || $this->admin_auth->get_colum('email') == $this->admin_auth->get_root_email()) {
                        $this->luanque_kinhdich_model->db->where('id', $val)->delete('luanque_kinhdich');
                    } else
                        $error = true;
                }
                if ($error)
                    $this->session->set_flashdata('error',
                        '<div class="error"><p>Bạn không thể xóa nội dung của người khác.</p></div>');
                else
                    $this->session->set_flashdata('success',
                        '<div class="success"><p>Xóa thành công!</p></div>');
                redirect(base_url('admin/luanque_kinhdich/index'));
            }
        }
    }
