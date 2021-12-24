<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Boibai extends CI_Controller{
    public $module_view = 'site';
    public $action_view = '';
    public $action_view_mobile = '';
    public $view        = 'index'; 
    public $view_mobile = 'index_mobile';
    public $cache_time = '1440';
    public function __construct(){
        parent::__construct();
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->action_view_mobile =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method().'_mobile';
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->view_mobile  =  $this->module_view.'/'.$this->view_mobile;
        $this->load->library( array( 'site/my_seolink', 'site/comment_lib' ) );
        $this->load->helper('form');
    }
    
    public function hangngay(){
        if( $_POST )
        {
            $key = $this->input->post('key');
            $key = explode('_',$key);
            $this->load->database();
            $ketqua = $this->db->where_in('key',$key)->get('boibai_hangngay')->result_array();
            $luan = '';
            foreach( $ketqua as $val ){
                $luan.='<span>'.$val['doi'].': </span>'.$val['luan'].'<br>';
            }
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode(array('luan' => $luan)));
        }
        else
        {
            // 1. Get comment
            $data['getComment'] = $this->comment_lib->getByTheme($this->uri->uri_string());
            // get breadcrumb
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem bói',
                    'slug' => 'xem-boi',
                ),
                1 => array(
                    'name' => 'Bói bài hàng ngày',
                    'slug' => 'boi-bai-hang-ngay',
                ),
            );
            $data['breadcrumb'] = breadcrumb($breadcrumb);
            $this->my_seolink->set_seolink();
            $data['title']       = $this->my_seolink->get_title();
            $data['keywords']    = $this->my_seolink->get_keywords();
            $data['description'] = $this->my_seolink->get_description();
            if ($this->mobile_detect->isMobile()) {
                $data['view'] = $this->action_view_mobile;
                $this->load->view( $this->view_mobile, $data );
            } else{
                $data['view'] = $this->action_view;
                $this->load->view( $this->view, $data );
            }
        }
    }
    
    public function tinhyeu(){ 
                        if( $_POST )
                        {
                            $diem = $this->input->post('diem');
                            $this->load->database();
                            $ketqua = $this->db->where('diem',(int)$diem)->get('boibai_tinhyeu')->row_array('luan');
                            $this->output
                                 ->set_content_type('application/json')
                                 ->set_output(json_encode(array('luan' => $ketqua['luan'])));
                        }
                        else
                        {
                            // 1. Get comment
                            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
                            // get breadcrumb
                            $breadcrumb = array(
                                0 => array(
                                    'name' => 'Xem bói',
                                    'slug' => 'xem-boi',
                                ),
                                1 => array(
                                    'name' => 'Bói bài tình yêu',
                                    'slug' => 'xem-boi-bai-tinh-yeu',
                                ),
                            );
                            $data['breadcrumb'] = breadcrumb($breadcrumb);
                            $this->my_seolink->set_seolink();
                            $data['title']       = $this->my_seolink->get_title();
                            $data['keywords']    = $this->my_seolink->get_keywords();
                            $data['description'] = $this->my_seolink->get_description();
                            $data['view'] = $this->action_view;
                            $this->load->view( $this->view, $data ); 
                        }            
    }
    
    public function thoivan(){
                        $labai = array();
                        while( count( $labai ) < 3 )
                        {
                            $key = rand(1,32);
                            if( !in_array($key, $labai) ) $labai[] = $key;
                        }
                        $this->load->database();
                        $data['labai']       = $this->db->where_in('id',$labai)->get('boibai_thoivan')->result_array();
                        // 1. Get comment
                        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
                        // get breadcrumb
                        $breadcrumb = array(
                            0 => array(
                                'name' => 'Xem bói',
                                'slug' => 'xem-boi',
                            ),
                            1 => array(
                                'name' => 'Bói bài thời vận',
                                'slug' => 'xem-boi-bai-thoi-van',
                            ),
                        );
                        $data['breadcrumb'] = breadcrumb($breadcrumb);
                        $this->my_seolink->set_seolink();
                        $data['title']       = $this->my_seolink->get_title();
                        $data['keywords']    = $this->my_seolink->get_keywords();
                        $data['description'] = $this->my_seolink->get_description();
                        $data['view'] = $this->action_view;
                        $this->load->view( $this->view, $data ); 
    }

}    
// Schema::create('pys_category_product', function (Blueprint $table) {
//             $table->integer('category_id')->unsigned()->index();
//             $table->foreign('category_id')->references('id')->on('pys_category')->onDelete('cascade');
//             $table->integer('product_id')->unsigned()->index();
//             $table->foreign('product_id')->references('id')->on('pys_product')->onDelete('cascade');
//             $table->primary(['category_id', 'product_id']);
//         });