<?php
class Tool_gieoquekhongminh extends CI_Controller{
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

    public function action_gieo_que_khong_minh(){
        /** xu ly cong cu **/
        if ($_POST) {
            $this->gieoque($_POST);
        } else {
            $gieoque = $this->session->userdata('gieoque');
            $data['gieoque'] = $gieoque;
            $langieoque = count($gieoque) + 1;
            $data['langieoque'] = $langieoque < 7 ? 'Gieo quẻ lần ' . $langieoque :
                'Nhận kết quả';
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
                    'name' => 'Gieo quẻ Khổng Minh',
                    'slug' => 'gieo-que-khong-minh',
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
        /** end **/
    }

    public function gieoque()
    {
        $gieoque = $this->session->userdata('gieoque');
        if (!$gieoque || count($gieoque) < 6) {
            $gieo = $this->gieoxu();
            $gieoque[] = $gieo;
            $hinhanhgieo = '<ul>';
            foreach ($gieoque as $key => $val) {
                $stt = $this->stt[$key];
                $amduong = $val == 0 ? 'Dương' : 'Âm';
                $hinhanhgieo .= '
                           <li>
                            <p>' . $stt . '</p>
                            <p><img src="' . base_url('templates/site/images/gieoquedoanso/' .
                    $this->amduong[$val] . '.jpg') . '"/></p>
                            <p>' . $amduong . '</p>
                           </li>';
            }
            $hinhanhgieo .= '</ul>';
            $data['hinhanhgieo'] = $hinhanhgieo;
            $data['que'] = '<p><img src="' . base_url('templates/site/images/gieoquedoanso/' .
                $this->vach[$gieo] . '.gif') . '"/><p>';
            $solangieo = count($gieoque);
            $solangieo++;
            $data['btntext'] = $solangieo < 7 ? 'Gieo quẻ lần ' . $solangieo :
                'Nhận kết quả';
            $this->session->set_userdata('gieoque', $gieoque);
        } else {

            $que_thuong_ha = $this->que_thuong_ha($gieoque);
            $vitri = rand(1, 10);
            $this->load->database();
            $noidung = $this->db->where('thuong', $que_thuong_ha['thuong'])->where('ha', $que_thuong_ha['ha'])->
                where('vitri', $vitri)->get('gieoquekhongminh')->row_array();
            $vitri_dong = $noidung['vitri_dong'] - 1;
            $gieoque[$vitri_dong] = 2;
            $hinhque = '';
            $hinhque .= '<div>';
            foreach ($gieoque as $key => $val) {
                $hinhque .= '<p><img src="' . base_url('templates/site/images/gieoquedoanso/' .
                    $this->vach[$val] . '.gif') . '"/><p>';
            }
            $hinhque .= '</div>';
            // $hinhque .= 'Content here : ';

            // $hinhque .= '1 : '.$que_thuong_ha['thuong'];
            // $hinhque .= '-2 : '.$que_thuong_ha['ha'];
            // $hinhque .= '-3 : '.$vitri;

            // $hinhque .= ' End';

            // $hinhque .= $noidung['noidung']?$noidung['noidung']:'<p>Bạn <b>gieo quẻ</b> không thành công, xin vui lòng gieo lại!</p>';

            $data['hinhque'] = $hinhque;
            $data['gieolai'] = '<a href="' . $_POST['url'] . '">Gieo lại</a>';
            $data['noidung'] = $noidung['noidung']?$noidung['noidung']:'<p>Bạn <b>gieo quẻ</b> không thành công, xin vui lòng gieo lại!</p>';
            $this->session->unset_userdata('gieoque');
            $this->session->unset_userdata('quechu');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

    }

    private function gieoxu()
    {
        $mang = array(0, 1);
        $mat_am = 0;
        $ketqua = array();
        $random = array_rand($mang);
        return $random;
    }

    private function que_thuong_ha($que)
    {
        $amduong = array(0 => 1, 1 => 2);
        $thuong = $amduong[$que[0]] . $amduong[$que[1]] . $amduong[$que[2]];
        $ha = $amduong[$que[3]] . $amduong[$que[4]] . $amduong[$que[5]];
        $que['thuong'] = $this->arr_que[$thuong];
        $que['ha'] = $this->arr_que[$ha];
        return $que;
    }
}