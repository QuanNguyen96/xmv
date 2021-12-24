<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Xemphongthuy extends CI_Controller
{
    public $submit = 0; // kiem tra co submit form khong
    public $run_sublink    = 0;    // kiem tra co phai link con ma khong phai submit khong
    public $module = 'site/xemphongthuy';
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array(
            'site/lib_xemngay',
            'site/ngayamduong',
            'site/my_seolink',
            'site/my_info',
            'form_validation',
            'site/comment_lib',
            'site/phongthuysim_lib'
        ));
        $this->load->model('site/boisim_model');
        require_once PUBLICPATH . '/html_dom/simple_html_dom.php';
    }

    public function simphongthuy($ngay = null, $thang = null, $nam = null)
    {
        if ($_POST) {
            $param = $_POST;
            $url = 'http://www.xemphongthuy.edu.vn/xem-phong-thuy-sim.html';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, count($param));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
            $result = curl_exec($ch);
            curl_close($ch);
            $html = str_get_html($result);
            $content['noidung'] = $html->find('div[id=simdep]', 0)->innertext;
            $content['noidung'] = str_replace('src="', 'src="http:www.boitoanvui.com', $content['noidung']);
            $html->clear();
            unset($html);
            $data['content'] = $content;
        }

        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());

        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['follow'] = '<meta name="robots" content="noindex, nofollow">';
        $data['view'] = 'site/xemphongthuy/simphongthuy';
        $this->load->view('site/index', $data);

    }


    public function huongnha($namsinh = null)
    {
        $data['iNamsinh'] = $namsinh?$namsinh:'canh-tuat';
        $this->load->library('site/vnkey');
        if($_POST){
            $input_text = $this->input->post();
            $this->submit    = 1;
            $this->run_sublink = 1;

            $namsinh = list_age_text($namsinh);
        }
        if(!$_POST && !empty($namsinh)){
            $this->submit    = 0;
            $this->run_sublink = 1;

            $namsinh = list_age_text($namsinh);
        }
        $data['submit'] = $this->submit;
        $data['run_sublink']    = $this->run_sublink;
        
        if ($this->run_sublink == 1) {
            $info_user  = $this->my_info->get_info_date(6,6,$namsinh);
            $data['info_user']  = $info_user;
            $data['namsinh']    = $namsinh;
            $arr_list   = array(
                'link'   => 'xem-huong-nha-tot-xau/tuoi-$canchi-xay-nha-huong-nao-tot',
                'replace'   => array(
                    '$namsinh'=>$namsinh,
                    '$canchi'=>get_chi_replace($info_user['namcanchi']),
                    '$slugcanchi'   => $this->vnkey->format_key(get_chi_replace($info_user['namcanchi'])),
                ),
            );
            $this->my_seolink->seolink_cst($arr_list);

            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);
        }
        else{
            $this->my_seolink->set_seolink();
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        }

        if ($this->submit == 1) {
            $param = $_POST;
            $input = $this->input->post();
            $param = array(
                "hoten"=>$input['hoten'],
                "year_birth"=>$namsinh,
                "quaydo"=>$input['quaydo'],
                "gioitinh"=>$input['gioitinh'],
                "option"=>"com_boi",
                "view"=>"huongnha",
                "Itemid"=>"24",
            );
            $url = 'http://www.boitoanvui.com/xem-huong-nha.html';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, count($param));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
            $result = curl_exec($ch);
            curl_close($ch);
            $html = str_get_html($result);
            $content['noidung'] = $html->find('div[id=boiaicap]', 0)->innertext;
            $content['noidung'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['noidung']);
            $content['chugiai'] = $html->find('div[class=ja-box-ct]', 0)->innertext;
            $content['chugiai'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['chugiai']);
            $html->clear();
            unset($html);
            $data['content'] = $content;
            
        }
        // get breadcrumb
        if ($this->run_sublink == 1) {
                $breadcrumb = array(
                    0 => array(
                        'name' => 'Phong thủy hướng nhà',
                        'slug' => 'xem-huong-nha-tot-xau',
                    ),
                    1 => array(
                        'name' => 'Tuổi '.get_chi_replace($info_user['namcanchi']),
                        'slug' => 'xem-huong-nha-tot-xau/tuoi-'.$this->vnkey->format_key(get_chi_replace($info_user['namcanchi'])).'-xay-nha-huong-nao-tot',
                    ),
                );
            }else{
                $breadcrumb = array(
                    0 => array(
                        'name' => 'Xem tuổi',
                        'slug' => 'xem-tuoi',
                    ),
                    1 => array(
                        'name' => 'Phong thủy hướng nhà',
                        'slug' => 'xem-huong-nha-tot-xau',
                    ),
                );
            }
            $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        // $data['follow'] = '<meta name="robots" content="noindex, nofollow">';
        $data['view'] = 'site/xemphongthuy/huongnha';
        $this->load->view('site/index', $data);

    }


    // 4cc xemphongthuysim

    public function tinhsimsodep(){
        $this->load->model('site/boisim_model');

        if ($_POST) {
            $post = $this->input->post();
            $sosim = preg_replace('/\D/', '', $post['sosim']);
            if ($this->form_validation->run('kiemtrasdt')) {
                $hedayso              = $this->boisim_model->getHedayso($sosim);
                $nguhanhso            = $this->phongthuysim_lib->nguhanhConso($sosim[0]);
                $capso_tuongsinh      = 0;
                $capso_tuongho        = 0;
                $capso_tuongkhac      = 0;
                $capso_binhhoa        = 0;
                $arr_capso            = array();
                for ($i= 0; $i < strlen($sosim) -1 ; $i++) { 
                    $so1        = $sosim[$i];
                    $so2        = $sosim[$i + 1];
                    $nguhanh_s1 = $this->phongthuysim_lib->nguhanhConso($sosim[$i]);
                    $nguhanh_s2 = $this->phongthuysim_lib->nguhanhConso($sosim[$i + 1]);
                    if( $this->phongthuysim_lib->nguhanhTuongsinh( $nguhanh_s1, $nguhanh_s2 ) ){
                            $capso_tuongsinh += 1;
                            $arr_capso[$i]['so1']      = $so1;
                            $arr_capso[$i]['nguhanh1'] = $this->phongthuysim_lib->listNguhanh($nguhanh_s1);
                            $arr_capso[$i]['so2']      = $so2;
                            $arr_capso[$i]['nguhanh2'] = $this->phongthuysim_lib->listNguhanh($nguhanh_s2);
                            $arr_capso[$i]['loai']    = 'Tương sinh';
                        }
                    elseif( $nguhanh_s1 == $nguhanh_s2 ){
                            $capso_tuongho += 1;
                            $arr_capso[$i]['so1']      = $so1;
                            $arr_capso[$i]['nguhanh1'] = $this->phongthuysim_lib->listNguhanh($nguhanh_s1);
                            $arr_capso[$i]['so2']      = $so2;
                            $arr_capso[$i]['nguhanh2'] = $this->phongthuysim_lib->listNguhanh($nguhanh_s2);
                            $arr_capso[$i]['loai']    = 'Tương hỗ';
                        }
                    elseif( $this->phongthuysim_lib->nguhanhTuongkhac( $nguhanh_s1, $nguhanh_s2 ) ){
                            $capso_tuongkhac += 1;
                            $arr_capso[$i]['so1']      = $so1;
                            $arr_capso[$i]['nguhanh1'] = $this->phongthuysim_lib->listNguhanh($nguhanh_s1);
                            $arr_capso[$i]['so2']      = $so2;
                            $arr_capso[$i]['nguhanh2'] = $this->phongthuysim_lib->listNguhanh($nguhanh_s2);
                            $arr_capso[$i]['loai']     = 'Tương khắc';
                        }
                    else{ 
                        $capso_binhhoa += 1;
                        $arr_capso[$i]['so1']      = $so1;
                        $arr_capso[$i]['nguhanh1'] = $this->phongthuysim_lib->listNguhanh($nguhanh_s1);
                        $arr_capso[$i]['so2']      = $so2;
                        $arr_capso[$i]['nguhanh2'] = $this->phongthuysim_lib->listNguhanh($nguhanh_s2);
                        $arr_capso[$i]['loai']    = 'Không sinh không khắc';
                    }
                }
                $number               = $sosim;
                $number               = $this->boisim_model->changeSum($number);
                $number               = substr($number, strlen($number) - 1, 1);
                $nuoc                 = $this->phongthuysim_lib->getNuoc($number);
                $data['nuoc']         = $nuoc;
                $dem8                 = substr_count($sosim, "8");
                if ($dem8 > 0)
                    $demso8 = 3;
                else
                    $demso8 = 0;
                $diem8k               = $demso8;
                $dacbiet              = $this->boisim_model->getdacbiet($sosim);
                if ($dacbiet['diem'] != 0) {
                    $dacbiet['diem'] = 1.5;
                }

                $sosanh_sinh_khac     = ($capso_tuongsinh > $capso_tuongkhac) ? 'nhiều hơn' : ( ($capso_tuongsinh < $capso_tuongkhac) ? 'ít hơn' : 'bằng');
                $diemSinhkhac         = $this->phongthuysim_lib->diemSinhkhacSosim($capso_tuongsinh, $capso_tuongkhac);
                $soTuongSinh          = $this->boisim_model->getSoTuongSinhKhac($hedayso['he'], "sinh");
                $soTuongKhac          = $this->boisim_model->getSoTuongSinhKhac($hedayso['he'], "khac");
                $nguDayso = $this->boisim_model->getSoNguHanh($sosim);
                $data['dacbiet']         = $dacbiet;
                $data['diem8k']          = $diem8k;
                $data['dem8']            = $dem8;
                $data['nguDayso']        = $nguDayso;
                $data['sosim']           = $sosim;
                $data['caccapso']        = $arr_capso;
                $data['capso_tuongsinh'] = $capso_tuongsinh;
                $data['capso_tuongho']   = $capso_tuongho;
                $data['capso_tuongkhac'] = $capso_tuongkhac;
                $data['capso_binhhoa']   = $capso_binhhoa;
                $data['sosanh_sinh_khac']= $sosanh_sinh_khac;
                $data['diemSinhkhac']    = $diemSinhkhac;
                $data['submit']   = 1;
            }else{
                $data['error'] = '<div class="myerror">'. validation_errors() .'</div>';
            }
        }

        $my_seolink = $this->my_seolink->set_seolink();
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->module.'/'.$this->router->fetch_method();
        $data['text'] = $this->my_seolink->get_text();
        $data['text_foot'] = $this->my_seolink->get_text_foot();
        $data['name'] = $this->my_seolink->get_name();
        $this->load->view('site/index', $data);
    }

    public function xemsimhoptuoi(){
        if ($_POST) {
            $this->load->library('site/phongthuysim_lib');
            $this->load->library('site/Contentjossaoque_lib');
            $arr_nguhanh             = array(
                1 => 'Kim',
                2 => 'Mộc',
                3 => 'Thủy',
                4 => 'Hỏa',
                5 => 'Thổ'
            );
            $arr_amduong             = array(
                '0' => 'Âm',
                '1' => 'Đều',
                '2' => 'Dương'
            );
            $this->load->model('site/boisim_model');
            $this->load->library(array('form_validation','site/nguhanhsim'));
            $dd            = $data['ngaysinh'] = $this->input->post('ngaysinh');
            $mm            = $data['thangsinh'] = $this->input->post('thangsinh');
            $yy            = $data['namsinh'] = $this->input->post('namsinh');
            $sosim         = $data['sosim'] = $this->input->post('sosim');
            $sosim         = preg_replace('/\D/', '', $this->input->post('sosim'));
            $gioitinh      = $data['gioitinh'] = $this->input->post('gioitinh');
            $giosinh       = $data['giosinh'] = $this->input->post('giosinh');

            if ($this->form_validation->run('boisim')) {
                $input  = $this->input->post();

                //lay phongthuy sim
                    $data['ngaysinh']     = $dd;
                    $data['thangsinh']    = $mm;
                    $data['namsinh']      = $yy;
                    $data['gioitinh']     = $gioitinh;
                    $data['giosinh']      = $giosinh;
                    $al                   = $this->boisim_model->convertSolar2Lunar($dd, $mm, $yy, 7.0);
                    $data['al']           = $al;
                    $mangdau              = $this->boisim_model->changedau($sosim);
                    $data['mangdau']      = $mangdau;
                    $nhanxet              = $this->boisim_model->nhanxetdau($mangdau['am'], $mangdau['duong']);
                    $data['nhanxet']      = $nhanxet;
                    $ngay                 = $al[0];
                    $thang                = $al[1];
                    $nam                  = $al[2];
                    $t                    = (int) substr($nam, 3);
                    $t                    = $t >= 4 ? $t - 4 + 1 : ($t + 10 - 4 + 1);
                    $nam_can              = $this->boisim_model->getCan($t);
                    $data['nam_can']      = $nam_can;
                    //Chi của nam
                    $t                    = $nam % 12;
                    $t                    = $t >= 4 ? $t - 4 + 1 : ($t + 12 - 4 + 1);
                    $nam_chi              = $this->boisim_model->getChi($t);
                    $data['nam_chi']      = $nam_chi;
                    //Chi của tháng
                    $t                    = $thang >= 11 ? $thang - 10 : $thang + 2;
                    $thang_chi            = $this->boisim_model->getChi($t);
                    $data['thang_chi']    = $thang_chi;
                    $thang_can            = $this->boisim_model->getcanThang($nam, $thang);
                    $data['thang_can']    = $thang_can;
                    //Can của năm
                    $d_j                  = $this->boisim_model->jdFromDate($dd, $mm, $yy);
                    $n                    = $this->boisim_model->getN($dd, $mm, $yy);
                    $so_ngay              = $this->boisim_model->songay($dd, $mm, $yy);
                    $ngay                 = $this->boisim_model->getCanChingay($n, $so_ngay, $yy);
                    $data['ngay']         = $ngay;
                    $lucthap              = $this->boisim_model->getLucThap($nam_can . " " . $nam_chi);
                    $vuongThanchu         = $lucthap['tinh'];
                    $nguhanhThanchu       = $lucthap['he'];
                    $data['lucthap']      = $lucthap;
                    $nhanxet_vuon         = $this->boisim_model->getVuon($lucthap['tinh'], $mangdau['vuon']);
                    $data['nhanxet_vuon'] = $nhanxet_vuon;
                    $hedayso              = $this->boisim_model->getHedayso($sosim);
                    $data['hedayso']      = $hedayso;
                    $gio                  = $this->boisim_model->getgio('Gio');
                    $data['gio']          = $gio;
                    $canchi_gio           = $this->boisim_model->getgioCanHH($ngay['can'], $ngay['chi'], $giosinh);
                    $data['canchi_gio']   = $canchi_gio;
                    $number               = $sosim;
                    $number               = $this->boisim_model->changeSum($number);
                    $number               = substr($number, strlen($number) - 1, 1);
                    $nuoc                 = $this->boisim_model->getNuoc($number);
                    $data['nuoc']         = $nuoc;
                    $dem8                 = substr_count($sosim, "8");
                    $data['dem8']         = $dem8;
                    if ($dem8 > 0)
                        $demso8 = 0.5;
                    else
                        $demso8 = 0;
                    $diem8k               = $demso8;
                    $data['diem8k']       = $diem8k;
                    $soTuongSinh          = $this->boisim_model->getSoTuongSinhKhac($hedayso['he'], "sinh");
                    $soTuongKhac          = $this->boisim_model->getSoTuongSinhKhac($hedayso['he'], "khac");
                    $diemSinhKhac         = $this->boisim_model->getdiemSinhKhac($soTuongSinh, $soTuongKhac);
                    $data['soTuongSinh']  = $soTuongSinh;
                    $data['soTuongKhac']  = $soTuongKhac;
                    $data['diemSinhKhac'] = $diemSinhKhac;
                    $array_chi[]          = @$canchi_gio['chi'];
                    $array_chi[]          = $ngay['chi'];
                    $array_chi[]          = $thang_chi;
                    $array_chi[]          = $nam_chi;
                    $array_can[]          = @$canchi_gio['can'];
                    $array_can[]          = $ngay['can'];
                    $array_can[]          = $thang_can;
                    $array_can[]          = $nam_can;
                    $heTuTru              = $this->boisim_model->getTutru_khac($array_chi, $array_can);
                    $data['heTuTru_chitiet'] = $heTuTru['chitiet'];
                    $data['heTuTru']         = $heTuTru['ketqua'];

                    $nguDayso = $this->boisim_model->getSoNguHanh($sosim);
                    $data['nguDayso'] = $nguDayso;

                    $checkNumberAfter   = 0;
                    //$checkNumberAfter     = (int)$this->curl('http://khosimphongthuydaban1.quanlybansim.com/sim/checkSimDaBan1to12year2017', array('sim' => $sosim));
                    if ($checkNumberAfter < 1){
                        // ************** can phai sua
                        $nguDayso             = $this->boisim_model->getSoNguHanh($sosim);
                        $data['nguDayso']     = $nguDayso;
                        $nguDayso             = $this->nguhanhsim->set_phone($sosim);
                        $nguDayso['he']       = nguhanh_text($this->nguhanhsim->get_nguhanh());
                        $data['nguDayso']     = $nguDayso;
                        // ************** end
                    }

                    $sinhkhac             = $this->boisim_model->getSinhKhac($lucthap['he'], $nguDayso['he']);
                    $data['sinhkhac']     = $sinhkhac;
                    $binhluanHe           = $this->boisim_model->blHe($heTuTru['ketqua'], $nguDayso['he']);
                    $data['binhluanHe']   = $binhluanHe;
                    $quedich              = $this->boisim_model->gieoQueDiem($sosim);
                    $data['quedich']      = $quedich;
                    
                    $diemdich             = $this->boisim_model->getDiem($quedich['loai']);
                    $data['diemdich']     = $diemdich;
                    $queho                = $this->boisim_model->gieoHoDiem($quedich['so'], $sosim);
                    $data['queho']        = $queho;
                    $diemho               = $this->boisim_model->getDiem($queho['loai']);
                    $data['diemho']       = $diemho;
                    $dacbiet              = $this->boisim_model->getdacbiet($sosim);
                    $data['dacbiet']      = $dacbiet;
                    $tongdiem             = $nhanxet['diem'] + $nhanxet_vuon[1] + $sinhkhac[1] + $binhluanHe[1] + $diemSinhKhac + $diem8k + $diemdich + $diemho + $nuoc['diem'] + $dacbiet['diem'];
                    $data['tongdiem']     = $tongdiem;
                    $tongbinh             = $this->boisim_model->tongbinh($tongdiem);
                    $data['tongbinh']     = $tongbinh;
                    $diem                 = $nhanxet_vuon[1] + $sinhkhac[1] + $binhluanHe[1];
                    /** Kiểm tra nếu là sim cũ thì trả về kết quả tìm kiếm của sim cũ **/
                    $check_simcu    = null;
                    //$check_simcu          = $this->curl('http://khosimphongthuydaban1.quanlybansim.com/sim/boisim', $_POST);
                    if ($check_simcu != null) {
                        $data                 = json_decode($check_simcu, true);
                        $data['nuoc']['diem'] = $data['nuoc']['diem'] / 2;
                    }
                    $data['success']     = true;
                //end lay phongthuy sim

                 // Config lai noi dung que dich
                $infoQuechu          = $this->contentjossaoque_lib->getContentQue($data['quedich']['ten']);
                $infoQueho           = $this->contentjossaoque_lib->getContentQue($data['queho']['ten']);
                $data['infoQuedich'] = $infoQuechu;
                $data['infoQueho']   = $infoQueho;

                // Cap nhap lay link bai viet sim theo nam sinh
                $arr_user   = array(
                    'ngay_sinh'     => $this->input->post('ngaysinh'),
                    'thang_sinh'    => $this->input->post('thangsinh'),
                    'nam_sinh'      => $this->input->post('namsinh'),
                );
                $info_user         = $this->my_info->Db_get_info_user($arr_user);
                $lucthap           = $this->boisim_model->getLucThap($info_user['namcanchi']);
                $luannguhanh       = $this->phongthuysim_lib->luanNguhanhthanchu($lucthap['nghiahan'].' '.$lucthap['he']);
                $namsinh           = $this->input->post('namsinh');
                $gioitinh          = $this->input->post('gioitinh');
                $arr_capso         = $this->phongthuysim_lib->getCapso($sosim);
                $arr_nguhanhcapso  = $this->phongthuysim_lib->getNguhanhCapSo($sosim);

                $nguhanh1 = $this->phongthuysim_lib->listNguhanh($arr_nguhanhcapso['nguhanhsim']);
                $nguhanh2 = $this->phongthuysim_lib->listNguhanh($lucthap['he']);

                $arr_thanchu_sim = array();

                if( $this->phongthuysim_lib->nguhanhTuongsinh( $nguhanh1, $nguhanh2 ) ){
                        $arr_thanchu_sim['loai']    = 'Tương sinh';
                        $arr_thanchu_sim['diem']    = 4;
                        $arr_thanchu_sim['ketluan'] = 'TÔT';
                    }
                elseif( $nguhanh1 == $nguhanh2 ){
                        $arr_thanchu_sim['loai']    = 'Tương hỗ';
                        $arr_thanchu_sim['diem']    = 2;
                        $arr_thanchu_sim['ketluan'] = 'KHÁ';
                    }
                elseif( $this->phongthuysim_lib->nguhanhTuongkhac( $nguhanh1, $nguhanh2 ) ){
                        $arr_thanchu_sim['loai']    = 'Tương khắc';
                        $arr_thanchu_sim['diem']    = 0;
                        $arr_thanchu_sim['ketluan'] = 'XẤU';
                    }
                else{ 
                    $arr_thanchu_sim['loai']    = 'Không sinh không khắc';
                    $arr_thanchu_sim['diem']    = 0;
                    $arr_thanchu_sim['ketluan'] = 'BÌNH THƯỜNG';
                }

                $hanhvuong = array();
                $hanhsuy   = array();
                foreach ($data['heTuTru'] as $key => $value) {
                    if ($value['loai'] == 'cao') {
                        $hanhvuong[] = $key;
                    }elseif ($value['loai'] == 'thap') {
                        $hanhsuy[] = $key;
                    }
                }

                $ketluantutru = array();
                if (in_array( $arr_nguhanhcapso['nguhanhsim'], $hanhvuong )) {
                    $ketluantutru['txt'] = 'đồng nhất với hành vượng &nbsp;<i class="glyphicon glyphicon-arrow-right"></i>&nbsp; Không tốt';
                    $ketluantutru['diem']= 0;
                }elseif (in_array( $arr_nguhanhcapso['nguhanhsim'], $hanhsuy)) {
                    $ketluantutru['txt'] = 'đồng nhất với hành suy &nbsp;<i class="glyphicon glyphicon-arrow-right"></i>&nbsp; Tốt';
                    $ketluantutru['diem']= 2;
                }else{
                    $ketluantutru['txt'] = '';
                    $ketluantutru['diem']= 0;
                }
                $data['ketluantutru'] = $ketluantutru;

                $daudayso_soluong    = $this->phongthuysim_lib->daudayso($sosim);
                $amduong_thanchu_sim = $this->phongthuysim_lib->xetAmduong($lucthap['tinh'], $daudayso_soluong['vuon']);
               
                $data['daudayso_soluong']    = $daudayso_soluong;
                $data['amduong_thanchu_sim'] = $amduong_thanchu_sim;
                $data['gioitinh']  = $gioitinh;
                $data['canchi']    = $info_user['namcanchi'];
                $data['info_user'] = $info_user;
                $data['sosim']     = $sosim;
                $data['luannguhanh']       = $luannguhanh;
                $data['arr_capso']         = $arr_capso;
                $data['arr_capso_nguhanh'] = $arr_nguhanhcapso['nguhanh'];
                $data['nguhanhsim']        = $arr_nguhanhcapso['nguhanhsim'];
                $data['sinhkhac_thanchu_sim'] = $arr_thanchu_sim;

                $data['submit'] = 1;

            } else {
                $data['error'] = validation_errors();
            }
            
        }
        $my_seolink          = $this->my_seolink->set_seolink();
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view']        = $this->module.'/'.$this->router->fetch_method();
        $data['text']        = $this->my_seolink->get_text();
        $data['text_foot']   = $this->my_seolink->get_text_foot();
        $data['name']        = $this->my_seolink->get_name();
        $this->load->view('site/index', $data);
    }

    public function xemsimhoptuoi_link($canchi = null, $namsinh = null){
        $link = 'xem-sim-phong-thuy-hop-tuoi-'.$canchi.'-'.$namsinh;
        $article = $this->db->where('slug', $link)->get('article')->row_array();
        if (!empty($article)) {
            $data['namsinh'] = $namsinh;
            $data['article'] = $article;
            $data['name']    = $article['name'];
            $data['title'] = $article['title'];
            $data['keywords'] = $article['keywords'];
            $data['description'] = $article['description'];
            $data['text'] = $article['content_1'];
            $data['text_foot'] = $article['content_2'];

            $data['view'] =  $this->module.'/'.$this->router->fetch_method();
            $this->load->view('site/index', $data);
        }else{
            redirect(base_url(),'301');
        }
    }

    public function simhopmenh($menh_nguoi = null){
        if ($menh_nguoi != null) {
            $data['menh_nguoi'] = $menh_nguoi;
        }
        $my_seolink          = $this->my_seolink->set_seolink();
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view']        = $this->module.'/'.$this->router->fetch_method();
        $data['text']        = $this->my_seolink->get_text();
        $data['text_foot']   = $this->my_seolink->get_text_foot();
        $data['name']        = $this->my_seolink->get_name();
        $this->load->view('site/index', $data);
    }
    public function boisimtheokinhdich(){
        if($_POST) {
            $post = $this->input->post();
            $sosim = preg_replace('/\D/', '', $post['sosim']);

            if ( $this->form_validation->run('kiemtrasdt') ) {
                $quedich              = $this->boisim_model->gieoQueDiem($sosim);
                $data['quedich']      = $quedich;
                $queho                = $this->boisim_model->gieoHoDiem($quedich['so'], $sosim);
                $data['queho']        = $queho;

                $luanquechu           = $this->boisim_model->Db_getLuanque($quedich['id']);
                $luanqueho            = $this->boisim_model->Db_getLuanque($queho['id']);

                $data['luanquechu'] = $luanquechu;
                $data['luanqueho']  = $luanqueho;

                $data['sosim'] = $sosim;
                $data['submit'] = 1;
            }else{
                $data['error'] = '<div class="myerror">' . validation_errors() . '</div>';
            }
        }
        $my_seolink          = $this->my_seolink->set_seolink();
        $data['title']       = $this->my_seolink->get_title();
        $data['keywords']    = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view']        = $this->module.'/'.$this->router->fetch_method();
        $data['text']        = $this->my_seolink->get_text();
        $data['text_foot']   = $this->my_seolink->get_text_foot();
        $data['name']        = $this->my_seolink->get_name();

        $this->load->view('site/index', $data);
    }
    // end 4cc xemphongthuysim

    public function curl($url, $data_post)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        //curl_setopt($ch,CURLOPT_TIMEOUT, 20);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}
