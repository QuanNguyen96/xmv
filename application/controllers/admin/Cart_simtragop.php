<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class cart_simtragop extends CI_Controller
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
            'admin/cart_simtragop_model'
        ));
        $this->admin_auth->check_login();
    }
    
    // Mua hàng trả góp
    public function index_tragop()
    {
        $get = $this->input->get();
        if (!isset($get['page']))
            $get['page'] = 1;
        if (!isset($get['key']))
            $get['key'] = null;
        if (!isset($get['order']))
            $get['order'] = 'desc';
        $total_recod = $this->cart_simtragop_model->Db_count_index_tragop($get);
        $list        = $this->cart_simtragop_model->Db_get_index_tragop($get, $this->limit);
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination']  = $this->admin_pagination->created();
        $data['list']        = $list;
        $data['get']         = $get;
        $data['success']     = $this->session->flashdata('success');
        $data['total_recod'] = $total_recod;
        $data['view']        = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function edit_tragop()
    {
        $get = $this->input->get();
        if ($_POST) {
            $post = $this->input->post();
            $update = array('tinh_trang_donhang'=> $post['tinh_trang_donhang'],'ghichu_banhang' => $post['ghichu_banhang']);
            $this->cart_simtragop_model->db->where('id', $post['id'])->update('datsim_tragop',$update);
            $success = '<div class="success"><p>Lưu thành công!</p></div>';
            $this->session->set_flashdata('success', $success);
            return redirect(base_url('admin/cart_simtragop/index_tragop'));
        }
        $data['item'] = $this->cart_simtragop_model->Db_get_edit_tragop($get);
        if (empty($data['item']))
            show_404();
        $action_view_image = base_url() . 'media/images/seolink/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }
}