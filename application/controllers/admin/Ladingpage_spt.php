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
                   'mo_dau' => 'T???ng quan v??? sim phong th???y',
                   'sim_phong_thuy' => 'Sim phong th???y',
                   'cach_tinh_sim' =>'C??ch t??nh sim phong th???y',
                   'phan_mem_xem_boi'=>'Ph???n m???m xem b??i sim',
                   'chon_mua_sim' =>'Ch???n mua sim',
                   'xem_sim_hop_tuoi'=>'Xem sim h???p tu???i',
                   'xem_sim_hop_menh'=>'Xem sim h???p m???nh',
                   'xem_sim_kinh_dich' =>'Xem sim theo kinh d???ch',
                   'xem_sim_so_dep'=>'xem phong th???y sim s??? ?????p',
                   'cham_diem_so'  => 'Ch???m ??i???m s??? ??i???n tho???i',
                   'xem_sim_chia_80' => 'Xem sim phong th???y chia 80',
                   'xem_sim_2_so'  => 'Xem sim theo 2 s??? cu???i',
                   'xem_sim_3_so' => 'Xem sim theo 3 s??? cu???i',
                   'xem_sim_4_so' => 'Xem sim theo 4 s??? cu???i',
                   'chon_so_hop_tuoi' =>'C??ch ch???n s??? h???p tu???i',
                   'chon_so_hop_menh' => 'C??ch ch???n s??? h???p m???nh',
                   'y_nghia_so'  =>'?? ngh??a s??? theo phong th???y',

            );  
        $data['list_article'] = $this->ladingpage_spt_model->Db_article(); 
        $action_view_image    = base_url() . 'media/images/ladingpage_spt/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

}