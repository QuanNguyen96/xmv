<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->load->helper(array('string'));
        $this->load->library(array('admin/admin_auth', 'admin/admin_pagination', 'form_validation'));
        $this->load->model('user_model');
        $this->load->model('checkip_model');
    }

    public function index()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if (!isset($get['page'])) $get['page'] = 1;
        if (!isset($get['key'])) $get['key'] = null;
        if (!isset($get['order'])) $get['order'] = 'desc';
        $total_recod = $this->user_model->Db_count_index($get);
        $list = $this->user_model->Db_get_index($get, $this->limit);
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
            if ($this->form_validation->run('add_user') == true) {
                $post = $this->input->post();
                $insert['fullname'] = $post['fullname'];
                $insert['email'] = $post['email'];
                $insert['password'] = $post['password'];
                if (isset($post['edit_delete']))
                    $insert['manage'] = $post['edit_delete'];
                $insert['level'] = (int)$this->admin_auth->get_colum('level') + 1;
                $insert['created_date'] = time();
                $insert['created_by'] = (int)$this->admin_auth->get_colum('id');
                $insert['update_date'] = time();
                $insert['update_by'] = $insert['created_by'];
                $this->user_model->db->insert('user', $insert);
                $user_id = $this->user_model->db->select_max('id')->get('user')->row('id');
                foreach ($post['manage'] as $val) {
                    $this->user_model->db->insert('user_manage', array('user_id' => $user_id, 'manage_id' => $val));
                }
                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                $this->session->set_flashdata('success', $success);
                if ($get['ac'] == 'save') {
                    $id = $this->user_model->db->select_max('id')->get('user')->row('id');
                    redirect(base_url('admin/user/edit?id=' . $id));
                } else {
                    redirect(base_url('admin/user/index'));
                }
            } else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }

        }
        $data['manage'] = $this->user_model->db->where('level >= ', $this->admin_auth->get_colum('level'))->get('manage')->result_array();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }


    public function edit()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        $data['item'] = $this->user_model->Db_get_edit_user($get['id']);
        if (empty($data['item'])) show_404();
        if ($data['item']['created_by'] != $this->admin_auth->get_colum('id') && $this->admin_auth->get_colum('manage') != 1 && $this->admin_auth->get_colum('email') != $this->admin_auth->get_root_email()) {
            $this->session->set_flashdata('error', '<div class="error"><p>Bạn không có quyền sửa nội dung này.</p></div>');
            redirect('admin/user/index');
        }
        if ($_POST) {
            if ($this->form_validation->run('edit_user') == true) {
                $post = $this->input->post();
                $update['fullname'] = $post['fullname'];
                //$update['email']        = $post['email'];
                if ($post['password'] != null)
                    $update['password'] = $post['password'];
                if (isset($post['edit_delete']))
                    $update['manage'] = $post['edit_delete'];
                $update['update_date'] = time();
                $update['update_by'] = (int)$this->admin_auth->get_colum('id');
                $this->user_model->db->where('id', $data['item']['id'])->update('user', $update);
                $this->user_model->db->where('user_id', $data['item']['id'])->delete('user_manage');
                foreach ($post['manage'] as $val) {
                    $this->user_model->db->insert('user_manage', array('user_id' => $data['item']['id'], 'manage_id' => $val));
                }
                $success = '<div class="success"><p>Cập nhật thông tin thành công!</p></div>';
                $this->session->set_flashdata('success', $success);
                if ($get['ac'] == 'save_close') {
                    $page = isset($get['page']) ? (int)$get['page'] : 1;
                    redirect(base_url('admin/user/index?page=' . $page));
                } else
                    redirect(base_url('admin/user/edit?id=' . $data['item']['id']));
            } else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }

        }

        $data['success'] = $this->session->flashdata('success');
        $curent_manage = $this->user_model->Db_get_manage($data['item']['id']);
        foreach ($curent_manage as $val) {
            $data['curent_manage'][] = $val['id'];
        }
        $data['manage'] = $this->user_model->db->where('level >= ', $this->admin_auth->get_colum('level'))->get('manage')->result_array();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);

    }

    public function login()
    {
        $ip = $this->get_client_ip();
        $insert['ip'] = $ip;
        $this->checkip_model->db->insert('checkip', $insert);

        if ($this->admin_auth->is_login()) redirect(base_url('admin/home'));
        $login = $this->session->userdata('login');
        if ($_POST) {
            if ($this->form_validation->run('login') == true) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                if ($this->admin_auth->login($email, $password))
                    redirect(base_url('admin/home'));
                else
                    $data['error'] = '<div class="error_mesage"><p>Sai tài khoản hoặc mật khẩu</p></div>';

            } else {
                $data['error'] = '<div class="error_mesage">' . validation_errors() . '</div>';
            }
        }

        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function logout()
    {
        $this->session->unset_userdata('login');
        redirect('admin/user/login');
    }

    public function change_password()
    {
        $this->admin_auth->check_login();
        $id = $this->admin_auth->get_colum('id');
        if ($_POST) {
            if ($this->form_validation->run('change_password') == true) {
                $update['password'] = $this->input->post('new_password');
                $update['fullname'] = $this->input->post('fullname');
                $this->user_model->db->where('id', $id)->update('user', $update);
                $data['success'] = '<div class="success"><p>Thay đổi thông tin và mật khẩu thành công!</p></div>';
            } else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }
        }
        $data['item'] = $this->user_model->db->where('id', $id)->get('user')->row_array();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function password_check($password)
    {
        $password = md5($password);
        $id = $this->admin_auth->get_colum('id');
        $cr_password = $this->user_model->db->where('id', $id)->get('user')->row('password');
        if ($password != $cr_password)
            return false;
        else
            return true;
    }

}
