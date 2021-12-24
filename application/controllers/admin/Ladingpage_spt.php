<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ladingpage_spt extends CI_Controller
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
        $this->load->library(array('admin/admin_auth','form_validation'));
        $this->load->model(array('admin/ladingpage_spt_model'));
        $this->admin_auth->check_login();
    }
    
    public function index()
    {
        $this->admin_auth->check_access($this->action_view);
        $data['item'] = $this->ladingpage_spt_model->Db_item(); 
        if($_POST) 
            {
                $post = $this->input->post();
                $update['mo_dau'] = $post['mo_dau'];
                $update['sim_phong_thuy']   = $post['sim_phong_thuy'];
                $update['cach_tinh_sim']    = $post['cach_tinh_sim'];
                $update['phan_mem_xem_boi'] = $post['phan_mem_xem_boi'];
                $update['chon_mua_sim'] = $post['chon_mua_sim'];
                $update['xem_sim_hop_tuoi'] = $post['xem_sim_hop_tuoi'];
                $update['xem_sim_hop_menh'] = $post['xem_sim_hop_menh'];
                $update['xem_sim_kinh_dich'] = $post['xem_sim_kinh_dich'];
                $update['xem_sim_so_dep'] = $post['xem_sim_so_dep'];
                $update['cham_diem_so'] = $post['cham_diem_so'];
                $update['xem_sim_chia_80'] = $post['xem_sim_chia_80'];
                $update['xem_sim_2_so'] = $post['xem_sim_2_so'];
                $update['xem_sim_3_so'] = $post['xem_sim_3_so'];
                $update['xem_sim_4_so'] = $post['xem_sim_4_so'];
                $update['chon_so_hop_tuoi'] = $post['chon_so_hop_tuoi'];
                $update['chon_so_hop_menh'] = $post['chon_so_hop_menh'];
                $update['y_nghia_so']   = $post['y_nghia_so'];
                $update['title']        = $post['title'];
                $update['keywords']     = $post['keywords'];
                $update['description']  = $post['description'];
                $update['bv_sim_hop_tuoi']  = serialize($post['bv_sim_hop_tuoi']);
                $update['bv_sim_hop_menh']  = serialize($post['bv_sim_hop_menh']);
                $update['bv_so_dien_thoai'] = serialize($post['bv_so_dien_thoai']);
                $update['bv_y_nghia_so']    = serialize($post['bv_y_nghia_so']);
                $this->ladingpage_spt_model->Db_update($update);
                redirect(current_url());
            }  
          $data['arr_textarea'] = array(
                   'mo_dau' => 'Tổng quan về sim phong thủy',
                   'sim_phong_thuy' => 'Sim phong thủy',
                   'cach_tinh_sim' =>'Cách tính sim phong thủy',
                   'phan_mem_xem_boi'=>'Phần mềm xem bói sim',
                   'chon_mua_sim' =>'Chọn mua sim',
                   'xem_sim_hop_tuoi'=>'Xem sim hợp tuổi',
                   'xem_sim_hop_menh'=>'Xem sim hợp mệnh',
                   'xem_sim_kinh_dich' =>'Xem sim theo kinh dịch',
                   'xem_sim_so_dep'=>'xem phong thủy sim số đẹp',
                   'cham_diem_so'  => 'Chấm điểm số điện thoại',
                   'xem_sim_chia_80' => 'Xem sim phong thủy chia 80',
                   'xem_sim_2_so'  => 'Xem sim theo 2 số cuối',
                   'xem_sim_3_so' => 'Xem sim theo 3 số cuối',
                   'xem_sim_4_so' => 'Xem sim theo 4 số cuối',
                   'chon_so_hop_tuoi' =>'Cách chọn số hợp tuổi',
                   'chon_so_hop_menh' => 'Cách chọn số hợp mệnh',
                   'y_nghia_so'  =>'Ý nghĩa số theo phong thủy',

            );  
        $data['list_article'] = $this->ladingpage_spt_model->Db_article(); 
        $action_view_image    = base_url() . 'media/images/ladingpage_spt/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

}