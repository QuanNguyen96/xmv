<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ladingpage_spt extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library(array('site/my_config','site/mobile_detect'));
        $this->load->model(array('site/ladingpage_spt_model'));
    }

    public function index(){
    	
         if( $this->mobile_detect->isMobile())
            {
               $box_title = array(
                   'tong_hop_cong_cu' => 'Tổng hợp các công cụ chấm điểm sim',
               ); 
            }
        else
            {
               $box_title = array(
                   'tong_hop_cong_cu' => 'Tổng hợp các công cụ chấm điểm sim theo từng yếu tố',
               );
            }     
        $data['box_title'] = $box_title;
        $item = $this->ladingpage_spt_model->Db_item();
        $data['list_article']= $this->ladingpage_spt_model->Db_list_article($item);
        $data['item']        = $item;
        $data['title']       = $item['title'];
        $data['keywords']    = $item['keywords'];
        $data['description'] = $item['description'];
		    //$data['view']        = $this->action_view;
        $this->load->view( 'site/ladingpage_spt/index',$data );
    }
}