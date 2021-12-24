<?php
class Tool_gieoquetecong extends CI_Controller{
    public $module_view = 'site';
    public $action_view = '';
    public $view        = 'index';
    public $submit = 0; // kiem tra co submit form khong
    public $run_sublink    = 0;    // kiem tra co phai link con ma khong phai submit khong

    public $arr_que     = array(111=>1,211=>2,221=>3,222=>4,212=>5,112=>6,122=>7,121=>8);
    public $vach        = array(0=>'lien',1=>'dut',2=>'nhay');
    public $amduong     = array(0=>'duong',1=>'am');
    public $stt         = array(0=>'Nhất',1=>'Nhị',2=>'Tam',3=>'Tứ',4=>'ngũ',5=>'Lục');

    public function __construct(){
        parent::__construct(); 
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->load->model(array('site/boituoivochong_model','site/article_model','site/xamquanthanh_model'));
        $this->load->library(array('site/ngayamduong','site/boituoivochong_lib','site/lib_xemngay', 'site/my_seolink','site/vnkey','site/my_info','session', 'site/comment_lib'));
        $this->load->helper(array('my_menh','array','text'));
    }

    public function action_gieo_que_te_cong(){
        $url    = $this->uri->uri_string();
        /** xu ly cong cu **/
        $gieoquetecong       = $this->session->userdata('gieoquetecong');
        $solangieo           = count($gieoquetecong) + 1;
        $data['solangieo']   = 'Gieo quẻ lần '.$solangieo;
        /** end **/

        $data['submit'] = $this->submit;
        $data['run_sublink']    = $this->run_sublink;

        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xin lộc thánh',
                'slug' => 'xin-loc-thanh',
            ),
            1 => array(
                'name' => 'Gieo Quẻ Tế Công',
                'slug' => 'gieo-que-quan-te-cong',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink();
        $data['submit']     = $this->submit;
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view('site/index',$data);
    }

    public function gieoxu()
    {
        if ($this->input->is_ajax_request()) {
            if( $_POST )
            {
                
                $gieoquetecong       = $this->session->userdata('gieoquetecong');
                $ketquagieoquetecong = $this->session->userdata('ketquagieoquetecong');
                if( count($gieoquetecong) < 3 )
                {
                    for( $i= 1; $i<=5; $i++  )
                    {
                        $gieoque[$i] = rand(1,2);
                    }
                    $nhay        = rand(1,5);
                    $ketquagieoquetecong[] = $nhay;
                    $gieoque[$nhay] = 3;
                    $gieoquetecong[] = $gieoque;
                    foreach( $gieoque as $key => $val )
                    {
                       $data['cot'.$key] = '<img src="'.base_url('templates/site/images/gieoquetecong/'.$val.'.gif').'"/>';
                    }
                    $solangieo = count($gieoquetecong)+1;
                    $data['solangieo'] =  $solangieo > 3 ? 'Xem kết quả' : 'Gieo quẻ lần '.$solangieo;
                    $data['gieo']      = 'true';
                    $this->session->set_userdata('gieoquetecong',$gieoquetecong);
                    $this->session->set_userdata('ketquagieoquetecong',$ketquagieoquetecong);
                }
                else
                {
                    $data['gieo']        = 'false';
                    $data['gieolai']   = '<a href="'.$_POST['url'].'">Gieo lại</a>';
                    $this->load->database();
                    $this->db->where('lan1',$ketquagieoquetecong[0]);
                    $this->db->where('lan2',$ketquagieoquetecong[1]);
                    $this->db->where('lan3',$ketquagieoquetecong[2]);
                    $noidung = $this->db->get('gieoquetecong')->row_array();
                    $data['noidung']  = $noidung['noidung'];
                    $this->session->unset_userdata('gieoquetecong');
                    $this->session->unset_userdata('ketquagieoquetecong');
                }
                
                $this->output
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data)); 
                
            }
        }
        else {
            return redirect(base_url('error.html'),'location',301);
        }
    }
}