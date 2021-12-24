<?php
class Tool_xamquanthanh extends CI_Controller{
    public $module_view = 'site';
    public $action_view = '';
    public $view        = 'index';
    public $submit = 0; // kiem tra co submit form khong
    public $run_sublink    = 0;    // kiem tra co phai link con ma khong phai submit khong

    public function __construct(){
        parent::__construct(); 
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->load->model(array('site/boituoivochong_model','site/article_model','site/xamquanthanh_model'));
        $this->load->library(array('site/ngayamduong','site/boituoivochong_lib','site/lib_xemngay', 'site/my_seolink','site/vnkey','site/my_info','session', 'site/comment_lib'));
        $this->load->helper(array('my_menh','array','text'));
    }

    public function action_xin_xam_quan_thanh(){
        $url    = $this->uri->uri_string();
        /** -------- input du lieu ----------- **/
        $this->load->library('site/vnkey');
        $data = array();
        if (isset($_SESSION['xinxamquanthanh'])) {
            $data['xam'] = $this->session->userdata('xinxamquanthanh');
        }

        $data['submit'] = $this->submit;
        $data['run_sublink']    = $this->run_sublink;
        $this->my_seolink->set_seolink();
        /** ------------ end input ----------- **/
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xin lộc thánh',
                'slug' => 'xin-loc-thanh',
            ),
            1 => array(
                'name' => 'Xin xăm Quan Thánh',
                'slug' => 'xin-xam-quan-thanh',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** ------------ end data du lieu view ---------- **/
        $data['submit']     = $this->submit;
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view('site/index',$data);
    }

    function xinxam(){
        if ($this->input->is_ajax_request()) {
            $que_so = random_element($this->xamquanthanh_model->getAll());
            $this->session->set_userdata('xinxamquanthanh',$que_so['xam_so']);
            $this->output->set_output($this->session->userdata('xinxamquanthanh'));
        }
        else {
            return redirect(base_url('error.html'),'location',301);
        }
    }

    function xinkeo(){
        if ($this->input->is_ajax_request()) {
            $arr = array(
            array(0,1),
            array(0,0),
            array(1,1),
            array(1,0)
            );
            if ($_POST) {
                $lan = $this->input->post('solan');
                $this->session->set_userdata('solan',$lan);
                if ($lan <=3) {
                $data = random_element($arr);
                $this->session->set_userdata('kq_langieo', $data) ;
                die( json_encode( $data) );
                }else {
                $this->session->sess_destroy();
                die(json_encode('false'));
                }
            }
        }
        else {
            return redirect(base_url('error.html'),'location',301);
        }
    }

    function xemnoidungque(){
        if ($this->input->is_ajax_request()) {
            $queso = $this->session->userdata('xinxamquanthanh');
            $list = $this->xamquanthanh_model->noi_dung_que($queso);
            $this->session->sess_destroy();
            die(json_encode($list));
        }
        else {
            return redirect(base_url('error.html'),'location',301);
        }
    }
}