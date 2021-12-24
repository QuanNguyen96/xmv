<?php
class Tool_gieoque extends CI_Controller{
    public $module_view = 'site';
    public $action_view = '';
    public $view        = 'index';
    public $submit = 0; // kiem tra co submit form khong
    public $run_sublink    = 0;    // kiem tra co phai link con ma khong phai submit khong

    public $arr_gach = array(
        0 => 'nhay',
        1 => 'lien',
        2 => 'dut',
        3 => 'nhay');
    //public $arr_que = array(
//            1 => 111,
//            2 => 211,
//            3 => 221,
//            4 => 222,
//            5 => 212,
//            6 => 112,
//            7 => 122,
//            8 => 121);
    public $arr_que = array(
        111 => 1,
        211 => 2,
        221 => 3,
        222 => 4,
        212 => 5,
        112 => 6,
        122 => 7,
        121 => 8,
        );
    public $vach = array('lien' => 1, 'dut' => 2);

    public function __construct(){
        parent::__construct(); 
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->load->model(array('site/boituoivochong_model','site/article_model','site/xamquanthanh_model'));
        $this->load->library(array('site/ngayamduong','site/boituoivochong_lib','site/lib_xemngay', 'site/my_seolink','site/vnkey','site/my_info','session', 'site/comment_lib'));
        $this->load->helper(array('my_menh','array','text'));
    }

    public function action_gieo_que_dich_so(){
        $url    = $this->uri->uri_string();
        /** -------- input du lieu ----------- **/
        $this->load->library('site/vnkey');
        $gieoque = $this->session->userdata('gieoque');
        $data['gieoque']     = $gieoque;
        // echo count($gieoque);
        $langieoque          = count($gieoque) ==0?1:count($gieoque);
        $data['langieoque']  = $langieoque < 7 ? 'Gieo quẻ lần '.$langieoque : 'Nhận kết quả';

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
                'name' => 'Gieo Quẻ Kinh Dịch',
                'slug' => 'gieo-que-dich-so',
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

    public function gieoque_ajax()
    {
        if ($this->input->is_ajax_request()) {
          if( $_POST )
          {
              $gieoque  = $this->session->userdata('gieoque');
              $quechu   = $this->session->userdata('quechu');
              if( !$gieoque || count($gieoque) < 6 )
              {
                  $gieo           = $this->gieoxu();
                  $gieoque[]      = $gieo;
                  $hinhanhgieo    ='';
                  foreach( $gieo['gieo'] as $val )
                  {
                  $hinhanhgieo.='<img src="'.base_url('templates/site/images/gieoquedoanso/'.$val.'.jpg').'"/>';
                  }
                  $data['hinhanhgieo']= $hinhanhgieo;
                  $img_gach       = $this->arr_gach[$gieo['mat_am']];
                  $data['que']    = '<p><img src="'.base_url('templates/site/images/gieoquedoanso/'.$img_gach.'.gif').'"/><p>'; 
                  $solangieo      = count($gieoque);
                  $solangieo++;
                  $data['btntext']=  $solangieo < 7 ? 'Gieo quẻ lần '.$solangieo : 'Nhận kết quả';
                  $quechu[] = $img_gach;
                  $this->session->set_userdata('quechu',$quechu);
                  $this->session->set_userdata('gieoque',$gieoque); 
                  $data['html_listque']  = '';
                  $data['html_que_text'] = '';
              }
              else
              {
                 $queho     = array();
                 $quebien   = array();
                 foreach( $gieoque as $val )
                 {
                      if( $val['mat_am'] == 1 || $val['mat_am'] == 2 )
                      {
                          $quechu_new[] = $this->arr_gach[$val['mat_am']];
                          $quebien[]    = $this->arr_gach[$val['mat_am']];
                      }
                      elseif( $val['mat_am'] == 0 )
                      {
                          $quechu_new[] = 'dut';
                          $quebien[] = 'lien';
                      }
                      else
                      {
                          $quechu_new[] = 'lien';
                          $quebien[] = 'dut';
                      }
                 }
                 $queho[] = $quechu_new[4];
                 $queho[] = $quechu_new[3];
                 $queho[] = $quechu_new[2];
                 $queho[] = $quechu_new[3];
                 $queho[] = $quechu_new[2];
                 $queho[] = $quechu_new[1];
                 
                 $html_quechu  = '<div class="list_que"><label>Quẻ chủ</label>';
                 $html_queho   = '<div class="list_que"><label>Quẻ hỗ</label>';
                 $html_quebien = '<div class="list_que"><label>Quẻ biến</label>';
                 for( $i = 0; $i<6; $i++ )
                 {
                    $html_quechu.='<p><img src="'.base_url('templates/site/images/gieoquedoanso/'.$quechu[$i].'.gif').'"/><p>';
                    $html_queho.='<p><img src="'.base_url('templates/site/images/gieoquedoanso/'.$queho[$i].'.gif').'"/><p>';
                    $html_quebien.='<p><img src="'.base_url('templates/site/images/gieoquedoanso/'.$quebien[$i].'.gif').'"/><p>';
                 }
                 $html_quechu.='</div>';
                 $html_queho.='</div>';
                 $html_quebien.='</div>';
                 $html_que_text = '<table class="table table-bordered table-hover"><tr><td><h3>Quẻ chủ</h3></td></tr><tr><td>'. $this->que_thuong_ha($quechu_new).'</td></tr>';
                 $html_que_text.= '<table class="table table-bordered table-hover"><tr><td><h3>Quẻ hỗ</h3></td></tr><tr><td>'. $this->que_thuong_ha($queho).'</td></tr>';
                 $html_listque = $html_quechu.'<div class="divbien"><img src="'.base_url('templates/site/images/gieoquedoanso/bien.gif').'"/></div>'.$html_queho;
                 if( in_array('nhay',$quechu) )
                 {
                    $html_listque.='<div class="divbien"><img src="'.base_url('templates/site/images/gieoquedoanso/bien.gif').'"/></div>'.$html_quebien;
                    $html_que_text.= '<table class="table table-bordered table-hover"><tr><td><h3>Quẻ biến</h3></td></tr><tr><td>'.$this->que_thuong_ha($quebien).'</td></tr>';
                 }
                 $data['html_que_text'] = $html_que_text;
                 $data['html_listque'] = $html_listque;
                 $data['hinhanhgieo'] = '';
                 $data['que'] = '';
                 $data['btntext']='Gieo lại';
                 $this->session->unset_userdata('gieoque');
                 $this->session->unset_userdata('quechu');
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

    private function gieoxu()
    {
        $mang    = array(0,1);
        $mat_am   = 0;
        $ketqua   = array();
        for( $i=0; $i < 3; $i++ )
        {
            $random = array_rand($mang);
            $mat_am = $mat_am + $random;
            $gieo   = $random == 0 ? 'duong' : 'am';
            $ketqua['gieo'][] = $gieo;
        }
        $ketqua['mat_am'] = $mat_am;
        return $ketqua;
    }
   
    private function que_thuong_ha($que)
    {
        $thuong = $this->vach[$que[0]].$this->vach[$que[1]].$this->vach[$que[2]];
        $ha     = $this->vach[$que[3]].$this->vach[$que[4]].$this->vach[$que[5]];
        $thuong = $this->arr_que[$thuong];
        $ha     = $this->arr_que[$ha];
        $this->load->database();
        $data = $this->db->where('thuong',$thuong)->where('ha',$ha)->get('gieoquedichso')->row_array();
        if( isset($data['noidung']) )
        return $data['noidung'];
    }
}