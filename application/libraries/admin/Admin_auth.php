<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_auth extends CI_Controller
{
    protected $root = 'root@gmail.com';
    public $message = '';

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('admin/user_model');
    }

    public function get_root_email()
    {
        return $this->root;
    }

    public function is_login()
    {
        $is_login = $this->CI->session->userdata('login') ? true : false;
        return $is_login;
    }

    public function check_login()
    {
        if (!$this->is_login()) {
            redirect('admin/user/login');
        }
    }

    public function login($email, $password)
    {
        $result = $this->CI->user_model->Db_login($email, $password);

        if (empty($result)) {
            return false;
        } else {
            $this->CI->session->set_userdata('login', $result);
            return true;
        }
    }

    // lấy trường dữ liệu theo yêu cầu.
    public function get_colum($colum)
    {
        $user = $this->CI->session->userdata('login');
        if (isset($user[$colum])) {
            return $user[$colum];
        }
    }

    // Lấy danh sách menu mà user có quyền truy cập
    public function get_menu()
    {
        $email = $this->get_colum('email');
        $access = $this->get_access_link();
        $data = $this->CI->user_model->Db_get_menu($access, $email, $this->root);
        return $data;
    }

    public function get_access_link()
    {
        $data = $this->CI->user_model->Db_get_access($this->get_colum('id'));
        $access = array();
        foreach ($data as $val) {
            $arr = explode("\n", $val['link']);
            $access = array_merge($access, $arr);
        }
        $access = array_unique($access);
        foreach ($access as $key => $val) {
            $access[$key] = trim($val);
        }
        return $access;
    }

    public function check_access($url)
    {
        $this->check_login();
        $access = $this->get_access_link();
        if (!in_array($url, $access) && $this->get_colum('email') != $this->root) {
            $error = '<div class="error"><p>BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP VÀO ỨNG DỤNG.</p></div>';
            $this->CI->session->set_flashdata('error', $error);
            redirect('admin');
        }
    }
}         
