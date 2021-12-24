<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Question extends CI_Controller {
	public $module_view = 'site';
    public $action_view = '';
    public $view        = 'index';
    
    public function __construct()
    {
        parent::__construct();
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->load->library(array('site/my_seolink'));
        $this->load->model(array('site/question_model'));
        $this->load->helper('form');
    }
    public function index()
	{     
        $arr_chude = array(
            1 => 'Xem ngày xuất hành',
            2 => 'Xem ngày tốt kết hôn',
            3 => 'Xem ngày động thổ',
            4 => 'Xem ngày đổ trần lợp mái',
            5 => 'Xem ngày nhập trạch',
            6 => 'Xem ngày mua nhà',
            7 => 'Xem ngày khai trương',
            8 => 'Xem ký hợp đồng',
            9 => 'Xem ngày mua xe',
            10 => 'Xem ngày tốt nhận chức',
            11 => 'Xem màu hợp mệnh',
            12 => 'Xem tuổi làm nhà',
            13 => 'Xem tuổi mua nhà',
            14 => 'Xem tuổi sinh con',
            15 => 'Xem tuổi vợ chồng',
            16 => 'Xem bói biển số xe',
            17 => 'Xem ngày sửa nhà',
            18 => 'Xem ngày đặt bếp',
            19 => 'Xem tuổi làm ăn',
            20 => 'Xem hướng nhà hợp tuổi',
        );
        if ($_POST) {
            $post = $this->input->post();
            $data = array(
                'name'      => $post['name'],
                'email'     => $post['email'],
                'phone'     => $post['phone'],
                'ngaysinh'  => $post['ngaysinh'].'-'.$post['thangsinh'].'-'.$post['namsinh'],
                'giosinh'   => $post['gio'], 
                'them'      => $post['them'],
                'them1'     => $post['them1'],
                'content'   => $post['content'],
            );
            $return = $this->question_model->Db_insert_question($data);
            $data['return'] = $return;
        }
        $arr_list   = array(
            'link'   => $this->uri->uri_string(),
            'replace'   => array(),
        );
        $this->my_seolink->seolink_cst($arr_list);
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['them'] = $arr_chude;
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );   
	}
}
