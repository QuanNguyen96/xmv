<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $this->load->library(array('admin/admin_auth'));
        $this->admin_auth->check_login();
    }

    public function index()
    {
        $data['error'] = $this->session->userdata('error');
        // dd($this->session->userdata());
        $data['view'] = $this->action_view;
        // $this->testmail('xemvanmenh');
        $this->load->view($this->view, $data);
    }

    public function testmail($info = null)
    {
        $this->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = "ad.tuvikhoahoc@gmail.com";
        $config['smtp_pass'] = "tuvikhoahoc123";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

        $this->email->from('ad.tuvikhoahoc@gmail.com', 'Tử Vi Khoa Học');
        $this->email->to('kaka0603nd@gmail.com');
        // $this->email->cc('hieu.rau95@gmail.com');
        $this->email->bcc('bathe0603it@gmail.com');
        $this->email->subject('Email dat hang trixie');
        $this->email->message($info);
        $this->email->send();
    }
}        
