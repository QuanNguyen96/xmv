<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Xemtuvi extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $view = 'index';
    public $_submit = '';

    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $this->view = $this->module_view . '/' . $this->view;
        $this->load->library(array('site/my_seolink', 'site/my_info', 'site/vnkey', 'site/boituoivochong_lib', 'site/lib_xemngay_demo', 'site/ngayamduong', 'site/curl_lib', 'site/comment_lib'));
        $this->load->helper(array('text', 'tuvi', 'file', 'xemngay', 'licham',));
        $this->load->library(array('form_validation', 'site/lich'));
        $this->load->model(array('site/xemtuvi_model', 'site/boituoivochong_model', 'site/article_model', 'site/tuvingay_model'));
    }

    public function xem_tu_vi()
    {
        if ($_POST) {
            $arr = $_POST;
            $arr['hovaten'] = $this->input->post('hovaten');
            $this->session->set_userdata('laso', $arr);
            redirect(base_url('la-so'));
        }
    }


    public function xem_la_so()
    {
        $html_content = file_get_contents(base_url('site/tuvi/index'));
        require_once PUBLICPATH . '/html_pdf/html2_pdf_lib/html2pdf.class.php';
        $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8');
        $html2pdf->writeHTML($html_content);
        $file = $html2pdf->Output(PUBLICPATH . '/file_img_tuvi/temp5.pdf', 'F');
        //$im = new Imagick();
//        $im->readimage(PUBLICPATH.'/file_img_tuvi/temp.pdf'); 
//        $im->setImageFormat( "jpg" );
//        $img_name = time().'.jpg';
//        $im->setSize(800,600);
//        $im->writeImage(PUBLICPATH.'/file_img_tuvi/'.$img_name);
//        $im->clear();
//        $im->destroy();
//        $data['img'] = $img_name;
//        $this->load->view('tuvi/xem_la_so',$data);
    }

    public function index()
    {
//        print_r($this->input->post());
//        die;
        if ($_POST) {
            $this->form_validation->set_rules('hovaten', 'H??? t??n', 'required');
            $this->form_validation->set_rules('gioitinh', 'Gi???i t??nh', 'required');
            $this->form_validation->set_rules('ngay', 'Ng??y sinh', 'required');
            $this->form_validation->set_rules('thang', 'Th??ng sinh', 'required');
            $this->form_validation->set_rules('nam', 'N??m sinh', 'required');
            $this->form_validation->set_rules('gio', 'Gi??? sinh', 'required');
            $this->form_validation->set_rules('namxem', 'N??m', 'required');
            $this->form_validation->set_message('required', '<label>{field}</label> vui l??ng ch???n v?? kh??ng ????? tr???ng !');
            if ($this->form_validation->run() == true) {
                $arr = $this->input->post();
                $arr['hovaten'] = $this->xemtuvi_model->db->escape_str($this->security->xss_clean($this->
                input->post('hovaten')));
                // $this->session->set_userdata('laso', $arr);
                // $iframe  = $this->domainIframe.'xem-la-so-iframe/'.'?hovaten='.$arr['hovaten'].'&ngay='.$arr['ngay'].'&thang='.$arr['thang'].'&nam='.$arr['nam'].'&gio='.$arr['gio'].'&phut='.$arr['phut'].'&namxem='.$arr['namxem'].'&gioitinh='.$arr['gioitinh'].'&lich='.$arr['lich'];
                $resultLaso = $this->xemLasoIframe();
                // dd($resultLaso);
                $data = $resultLaso;
                $tuvi = $resultLaso['tuvi'];
                $can = $resultLaso['can'];
                $chi = $resultLaso['chi'];
                $thang_am = $resultLaso['thang_am'];
                $gio = $resultLaso['gio'];
                $gioitinh = $resultLaso['gioitinh'];
                $ngay_am = $resultLaso['ngay_am'];
                $contentSaochinhtinhArr = $resultLaso['contentSaochinhtinhArr'];
                $data['success'] = $resultLaso['success'];

                $input = $this->input->post();
                // 1.sao chieu theo nam va sao han theo nam
                $ngaythangnamam = $this->tuvi_lib->get_info_date($_POST['ngay'], $_POST['thang'], $_POST['nam']);
                $scshtv_tuoi = ($_POST['namxem'] - $ngaythangnamam['amlich'][2]) + 1;
                $scshtv_gioitinh = $_POST['gioitinh'];
                if ((int)$scshtv_gioitinh == 0) {
                    if ($scshtv_tuoi >= 10) $scshtv_saochieu_id = $this->tuvi_lib->arr_saochieutuvi_nu[$scshtv_tuoi];
                    if ($scshtv_tuoi >= 11) $scshtv_saohan_id = $this->tuvi_lib->arr_saohantuvi_nu[$scshtv_tuoi];
                } elseif ((int)$scshtv_gioitinh == 1) {
                    if ($scshtv_tuoi >= 10) $scshtv_saochieu_id = $this->tuvi_lib->arr_saochieutuvi_nam[$scshtv_tuoi];
                    if ($scshtv_tuoi >= 11) $scshtv_saohan_id = $this->tuvi_lib->arr_saohantuvi_nam[$scshtv_tuoi];
                }
                if (isset($scshtv_saochieu_id)) $saochieutuvi = $this->xemtuvi_model->Db_get_saochieutuvi($scshtv_saochieu_id, $scshtv_gioitinh);
                if (isset($scshtv_saohan_id)) $saohantuvi = $this->xemtuvi_model->Db_get_saohantuvi($scshtv_saohan_id);

                $data['saochieutuvi'] = isset($saochieutuvi) ? $saochieutuvi : '';
                $data['saohantuvi'] = isset($saohantuvi) ? $saohantuvi : '';

                // 2.que dich theo nam sinh
                $arr_user = array(
                    'ngay_sinh' => $input['ngay'],
                    'thang_sinh' => $input['thang'],
                    'nam_sinh' => $input['nam'],
                );
                $info_user = $this->tuvi_lib->Db_get_info_user($arr_user);
                $data['info_user'] = $info_user;
                $canchi = $info_user['namcanchi'];
                $data['quedichtheonamsinh'] = $this->xemtuvi_model->Db_get_quedichtheonamsinh($canchi);

                // 3. lai nhan la so tu vi
                foreach ($tuvi as $key => $value) {
                    if (is_string($value['can_cung_dai_van']) && is_string($info_user['canchinam_text']['can']) && (strcmp((string)$value['can_cung_dai_van'], (string)$info_user['canchinam_text']['can']) == 0)) {
                        $ln_cung_id = isset($value['cung_id']) ? $value['cung_id'] : 1;
                        $arr_lainhan = $this->xemtuvi_model->Db_get_lainhanlasotuvi($ln_cung_id);
                        $data['noidung_lainhan'] = $arr_lainhan['noidung'];
                    }
                }

                //4. Luc thap hoa giap
                foreach ($tuvi as $key => $value) {
                    if ($value['cung'] == 'M???nh vi??n') {
                        $can_cungdatmenh = (is_string($value['can_cung_dai_van'])) ? $value['can_cung_dai_van'] : '';
                        $chi_cungdatmenh = $this->tuvi_lib->con_giap($key);
                        $lthgtv_canchi = $can_cungdatmenh . ' ' . $chi_cungdatmenh;
                        $lucthaphoagiap = $this->xemtuvi_model->Db_get_lucthaphoagiap($lthgtv_canchi);
                        $data['lucthaphoagiap'] = $lucthaphoagiap;
                        $data['canchicungdatmenh'] = $lthgtv_canchi;
                    }
                }

                //5.luan can va chi 
                $arr_flip_can_tuvi = array_flip($this->tuvi_lib->can());
                $can_AL = $arr_flip_can_tuvi[$ngaythangnamam['canchinam_text']['can']];
                $chi_AL = $info_user['canchinam_number']['chi'] - 1;//chi trong tuvi 0->11

                $data['luanCanChi'] = $this->tuvi_lib->luanCanChi($can_AL, $chi_AL);

                //6.luong chi binh giai
                $luongchi_namsinh = $this->xemtuvi_model->Db_get_luongchi_namsinh($this->tuvi_lib->can($can) . ' ' . $this->tuvi_lib->chi($chi));
                $luongchi_thangsinh = $this->xemtuvi_model->Db_get_luongchi_thangsinh($thang_am);
                $luongchi_ngaysinh = $this->xemtuvi_model->Db_get_luongchi_ngaysinh($ngay_am);
                $luongchi_giosinh = $this->xemtuvi_model->Db_get_luongchi_giosinh($this->tuvi_lib->con_giap($gio));
                $luongchi = (int)$luongchi_namsinh['luongchi'] +
                    (int)$luongchi_thangsinh['luongchi'] +
                    (int)$luongchi_ngaysinh['luongchi'] +
                    (int)$luongchi_giosinh['luongchi'];
                $luongchibinhgiai = $this->xemtuvi_model->Db_get_noidungluongchi($luongchi);
                $data['luongchibinhgiai'] = $luongchibinhgiai;

                //7. lay tuan va triet cua 2 cung menh
                $cung_id_tuan_2 = isset($tuvi[$data['tuan'] + 1]['cung_id']) ? $tuvi[$data['tuan'] + 1]['cung_id'] : 1;
                $cung_id_triet_2 = isset($tuvi[$data['triet'] + 1]['cung_id']) ? $tuvi[$data['triet'] + 1]['cung_id'] : 1;
                $data['cung_id_tuan_2'] = $cung_id_tuan_2;
                $data['cung_id_triet_2'] = $cung_id_triet_2;
                $ndtuan = $this->db->where(array('cungmenh_id' => $cung_id_tuan_2, 'sao_id' => 184))->get('cung_menh')->row_array();//tuan 184
                $ndtriet = $this->db->where(array('cungmenh_id' => $cung_id_triet_2, 'sao_id' => 99))->get('cung_menh')->row_array();//triet 99
                $data['ndtuan'] = $ndtuan;
                $data['ndtriet'] = $ndtriet;

                // Xu ly la so
                $amlich_l = xem_ngay_am($arr['ngay'], $arr['thang'], $arr['nam']);
                $ngay_l = $amlich_l[0];
                $thang_l = $amlich_l[1];
                $giosinh_l = $arr['gio'];
                $namamlich = am_lich($amlich_l['2'], 0);
                $namcan_l = $namamlich['can'] + 1;
                $namchi_l = $namamlich['chi'] + 1;
                $gioitinh_l = $arr['gioitinh'] == 0 ? 2 : 1;
                /*$post_sv = array(
                    'gioitinh' => $gioitinh_l,
                    'ngay' => $ngay_l,
                    'thang' => $thang_l,
                    'can' => $namcan_l,
                    'chi' => $namchi_l,
                    'gio' => $giosinh_l);*/
                /*$post_sv = array(
                    'gioitinh' => $gioitinh_l,
                    'ngay' => $arr['ngay'],
                    'thang' => $arr['thang'],
                    'can' => $namcan_l,
                    'chi' => $namchi_l,
                    'gio' => $giosinh_l);
                $this->curl_lib->url = 'http://lasotuvi.top';
                $luangiai = $this->curl_lib->submit_post($post_sv);
                $luangiai = json_decode($luangiai, true);
                $data['luangiai'] = $luangiai;*/
                // $data['notmetaviewport']    = 1;


            }

        }
        if ($_POST) {
            $input = $this->input->post();
            $arr_user = array(
                'ngay_sinh' => $input['ngay'],
                'thang_sinh' => $input['thang'],
                'nam_sinh' => $input['nam'],
            );
            $info_user = $this->my_info->Db_get_info_user($arr_user);
            $data['info_user'] = $info_user;
            $canchi = $info_user['namcanchi'];
            $slugcanchi = $this->vnkey->format_key($info_user['namcanchi']);
            $data['canchi'] = $canchi;
            $data['namsinh'] = $namsinh = $input['nam'];
            $data['slugcanchi'] = $slugcanchi;
            $data['gioitinh'] = $gioitinh = $input['gioitinh'] == 1 ? 'nam' : 'n???';
            $data['sluggioitinh'] = $input['gioitinh'] == 1 ? 'nam' : 'nu';
            $arr_like = array(
                'name' => $namsinh,
                'name' => $gioitinh,
                'name' => 2018,
            );
            $data['gioitinh_text'] = $input['gioitinh'] == 1 ? 'nam' : 'n???';
            $sql = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%' . $gioitinh . ' m???ng%" and name like "%2019%"';
            $oneAge = $this->article_model->getQuery($sql);
            $data['oneAge'] = $oneAge;

            /** Config la so **/
            $data['contentAfterCung'] = $contentAfterCung = array(
                '1' => 'M???nh vi??n',
                '2' => 'Ph??? m???u',
                '3' => '<p><span class="btn_nhaynhay"></span>????? ?????i ng?????i lu??n hoan h???, gi???m b???t u s???u th?? tr?????c m???i c??ng vi???c hay bi???n c??? qu?? b???n n??n th??nh t??m xin qu??? <b><a href="' . base_url('quan-am-linh-xam.html') . '">Quan ??m Linh X??m</a></b>. Qu??? n??y gi??p qu?? b???n lu??n v???ng t??m l???y an ???n vinh hoa l??m v???n qu?? trong cu???c s???ng ?????y duy??n nghi???p n??y.</p>',
                '4' => '<p><span class="btn_nhaynhay"></span>??i???n tr???ch c?? sao h??? t???t th???y gia c???nh y??n ???n, nh??n h???, c?? kh??ng vong th?? t??n gia b???i s???n, c?? th??i tu??? ph?? ph?? to??i. V?? l??? ????, khi mu???n gia t??ng ??i???n s???n c???n thi???t <b><a href="' . base_url('xem-tuoi-mua-nha.html') . '">Xem tu???i mua nh??</a></b> k???t h???p quan s??t k??? l?????ng nh???ng y???u t??? c??t hung c???a b???t ?????ng s???n ???? m???i mong c?? cu???c s???ng an l??nh, c??ng vi???c, ti???n t??i nh?? ??.</p>',
                '5' => '<p><span class="btn_nhaynhay"></span>Ph???n gi??u hay ngh??o v???n ???? ???????c ?????nh s???n ngay t??? khi ch??o ?????i. ???y v???y m?? ???Nh??n ?????nh s??? th???ng Thi??n???. B???i l??? ????, con ng?????i d??ng <b><a href="' . base_url('xem-boi-so-dien-thoai.html') . '">Sim Phong Th???y h???p tu???i</a></b> ?????i v???n c???a ch??nh m??nh. Sim h???p tu???i k??ch c??ng danh, th??c ?????y s??? nghi???p gi??p c??ng danh s??? nghi???p ??ang th??ng th?? c??ng th??ng nh?? di???u g???p gi??. C??n n???u tr?? tr??? s??? ????n nhi???u c?? h???i v?? may m???n h??n.</p>
                                            <p><span class="btn_nhaynhay"></span>C??ng Danh, H???c T???p v?? Ngh??? Nghi???p c???a con ng?????i thay ?????i ??? m???i th???i ??i???m. C?? l??c th??ng, c??ng c?? l??c tr???m. ??i???u n??y ???????c th??? hi???n r???t r?? trong l?? s??? t??? vi c???a qu?? b???n. V???n s??? l?? v???y nh??ng ch??ng ta c?? th??? c???i bi???n b???ng c??ch s??? d???ng <b><a href="' . base_url('xem-mau-hop-menh/menh-' . $this->vnkey->format_key($info_user['lucthap']['he']) . '-hop-mau-gi.html') . '">m??u h???p m???nh ' . $info_user['lucthap']['he'] . '</a>.</b> T???n d???ng m??u s???c h???p m???nh v???n vi???c c??ng danh s??? nghi???p c???a b???n s??? c?? c?? h???i g???p d??? h??a l??nh, hung hi???m h??a hanh c??t.</p>',
                '6' => 'N?? b???c',
                '7' => '<p><span class="btn_nhaynhay"></span>N???u cung Thi??n Di cho bi???t ???????c t???t x???u trong vi???c ?????i n???i, ?????i ngo???i, k???t qu??? c???a nh???ng chuy???n ??i xa th?? qu?? b???n ho??n to??n c?? th??? ch??? ?????ng thay ?????i ???????c k???t qu??? c??ng vi???c n??y b???ng c??ch <b><a href="' . base_url('xem-ngay-tot-xuat-hanh.html') . '">Xem ng??y xu???t h??nh h???p tu???i ' . $canchi . '</a></b>. Ch???n ???????c ng??y xu???t h??nh t???t ??u v???n s??? ???t ???????c hanh th??ng, thu???n l???i.</p>',
                '8' => '<p><span class="btn_nhaynhay"></span>Cung T???t ??ch ???? lu???n gi???i cho qu?? b???n bi???t v??? th??n th???, s???c kh???e v?? b???nh t???t trong cu???c s???ng c???a m??nh. ????? bi???t ???????c nh???ng ??i???u n??y m???t c??ch chi ti???t nh???t theo t???ng n???m th?? qu?? b???n c???n <b><a href="' . base_url('xem-han-tu-vi.html') . '">Xem v???n h???n theo tu???i</a></b> c???a m??nh. T???t c??? nh???ng ??i???u t???t, x???u trong m???t n??m s??? hi???n h???u gi??p qu?? b???n n???m b???t ???????c t???t c??? v???n h???n c???a m??nh.</p>',
                '9' => '<p><span class="btn_nhaynhay"></span>Ti???n t??i, kinh doanh c???a qu?? b???n may hay kh?? ?????u ???????c th??? hi???n r???t r?? trong l?? s??? t??? vi. N???u mu???n k??ch t??i v???n tr???n ?????i, qu?? b???n c???n ch???n <b><a href="' . base_url('xem-tuoi-lam-an/tuoi-' . $this->vnkey->format_key($canchi) . '-sinh-nam-' . $namsinh . '-hop-lam-an-voi-tuoi-nao.html') . '">tu???i ' . $canchi . ' h???p l??m ??n v???i tu???i n??o</a></b>? Y???u t??? n??y ????ng vai tr?? v?? c??ng to l???n ?????n th??nh - b???i trong vi???c l??m ??n c???a qu?? b???n.</p>',
                '10' => '<p><span class="btn_nhaynhay"></span>Trong m???i quan h??? gi???a b??? m??? v?? con c??i c?? khi thu???n, khi ngh???ch. ?????ng b??? qua <b><a href="' . base_url('xem-tuoi-sinh-con.html') . '">Xem Tu???i Sinh Con</a></b> h???p tu???i b??? m??? ????? cu???c s???ng gia ????nh lu??n thu???n h??a, t????ng lai c???a con c??i theo ???? c??ng ???????c h?????ng h???nh ph??c vi??n m??n tr???n ?????i.</p>',
                '11' => '<p><span class="btn_nhaynhay"></span>Th??ng qua lu???n gi???i l?? s??? t??? vi th?? qu?? b???n ???? bi???t ???????c ?????i s???ng h??n nh??n c???a m??nh r???i. C??n mu???n bi???t c??? th??? xem v??? ch???ng m??nh h???p - kh???c ??? ??i???m n??o th?? m???i qu?? b???n  tham kh???o t???i <b><a href="' . base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html') . '">Xem tu???i v??? ch???ng</a></b>.</p>',
                '12' => '<p><span class="btn_nhaynhay"></span>T???t c??? m???i ??i???u, m???i v???n ????? v??? m???i quan h??? anh ch??? em, m???i quan h??? b???n b?? c??ng nh?? m???i quan h??? h???p t??c c???a qu?? b???n ???? ???????c lu???n gi???i t???i cung Huynh ????? c???a l?? s??? t??? vi. Th??? nh??ng ????? bi???t chi ti???t m??nh h???p - kh???c v???i m???i ng?????i ??? nh???ng ??i???m n??o th?? qu?? b???n c???n <b><a href="' . base_url('xem-tuoi-hop-nhau/tuoi-' . $this->vnkey->format_key($canchi) . '-sinh-nam-' . $namsinh . '-hop-voi-tuoi-nao.html') . '">Xem Tu???i ' . $canchi . ' h???p v???i tu???i n??o</a></b>? (. ????y s??? l?? ti???n ????? ????? qu?? b???n x??y d???ng n??n t??nh b???n, t??nh anh em lu??n g???n k???t, b???n l??u.</p>'
            );
        }

        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());

        $this->my_seolink->set_seolink();
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $breadcrumb = array(
            0 => array(
                'name' => 'T??? vi',
                'slug' => 'tu-vi',
            ),
            1 => array(
                'name' => 'L?? s??? t??? vi',
                'slug' => 'xem-la-so-tu-vi',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        // if($this->agent->is_mobile()){
        //     $this->action_view = 'site/xemtuvi/laso_mb';
        // }
        // else{
        //     $this->action_view = $this->action_view;
        // }
        $data['view'] = $this->action_view;
//        print_r($data['view']); die;
        $this->load->view($this->view, $data);
    }

    public function xemLasoIframe()
    {
        $input = $this->input->post();
        $arrInputBefore = array(
            'hovaten',
            'ngay',
            'thang',
            'nam',
            'gio',
            'namxem',
            'gioitinh',
            'lich',
        );
        // Cap nhap la so moi
        $this->load->library(array('form_validation', 'site/tuvi_lib'));
        $this->load->helper('xemngay');
        $this->load->model(array('site/xemtuvi_model'));

        // Action lasotuvi
        $arr = array(
            'hovaten' => $input['hovaten'],
            'ngay' => $input['ngay'],
            'thang' => $input['thang'],
            'nam' => $input['nam'],
            'gio' => $input['gio'],
            'namxem' => $input['namxem'],
            'gioitinh' => $input['gioitinh'],
            'lich' => $input['lich'],
        );
        $resultLaso = $this->tuvi_lib->createdLaso($arr);
        return $resultLaso;
    }

    // Tr????ng ????nh Tuy???n
    // create date : 25/12/2017
    // S???a theo y??u c???u c???a Trang SEO vs 13 c??ng c???
    public function xemtuvitrondoi($canchi = null)
    {
        $canchi_slug = '';
        $namsinh = '';
        $gioitinh = '';
        $chi = '';
        $link_loai = '';
        $arr_menh = array(
            'Kim' => 'kim',
            'M???c' => 'moc',
            'Th???y' => 'thuy',
            'H???a' => 'hoa',
            'Th???' => 'tho',
        );
        $arr_loaiseolink = array(
            '$loai1' => array('1950', '1951', '1952', '1953', '1954', '1955', '1956', '1957', '1958', '1959',),
            '$loai2' => array('1960', '1961', '1962', '1963', '1964', '1965', '1966', '1967', '1968', '1969',),
            '$loai3' => array('1970', '1971', '1972', '1973', '1974', '1975', '1976', '1977', '1978', '1979',),
            '$loai4' => array('1980', '1981', '1982', '1983', '1984', '1985', '1986', '1987', '1988', '1989',),
            '$loai5' => array('1990', '1991', '1992', '1993', '1994', '1995', '1996', '1997', '1998', '1999',),
            '$loai6' => array('2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009',),
        );
        if (!empty($canchi)) {
            $post = $this->input->post();
            $data['iCanchiSlug'] = $canchi_slug = $canchi;
            $namsinh = list_age_text($canchi_slug);
            foreach ($arr_loaiseolink as $key => $value) {
                if (in_array($namsinh, $value)) {
                    $link_loai = $key;
                }
            }
            $duonglich = array(
                'ngay_sinh' => 6,
                'thang_sinh' => 6,
                'nam_sinh' => $namsinh,
            );
            $info_user = $this->my_info->Db_get_info_user($duonglich);
            if ($_POST) {
                $data['gioitinh'] = $post['giotinh'];
            } else {
                $data['gioitinh'] = 'nam';
            }
            $gioitinh = $data['gioitinh'] == 'nam' ? 'Nam' : 'N???';
            $data['gioitinh_text'] = strtolower($gioitinh);
            $canchi_slug = $canchi;
            $canchi = $info_user['namcanchi'];
            $data['canchi_text'] = $canchi;
            $arr_canchi = explode(' ', $canchi);
            $chi = $arr_canchi[1];
            $data['content'] = $this->xemtuvi_model->Db_get_content($namsinh, $canchi_slug);
            $link_slug = 'xem-tu-vi-nam-2018-tuoi-' . $canchi_slug . '-nam-mang-sinh-nam-' . $namsinh;
            $link_id = $this->boituoivochong_model->db->like('slug', $link_slug)->select('*')->get('article')->row_array();
            $link_slug1 = 'xem-tu-vi-tuoi-' . $canchi_slug . '-nam-2018-nu-mang-sinh-nam-' . $namsinh;
            $link_id1 = $this->boituoivochong_model->db->like('slug', $link_slug1)->select('*')->get('article')->row_array();
            $link_slug_xongdat = 'xem-tuoi-xong-nha-nam-2018-cho-tuoi-' . $canchi_slug . '-sinh-nam-' . $namsinh;
            $link_id_xongdat = $this->boituoivochong_model->db->like('slug', $link_slug_xongdat)->select('*')->get('article')->row_array();
            $menh_text = $info_user['lucthap']['he'];
            $menh_slug = $arr_menh[$menh_text];
            $data['menh_text'] = $menh_text;
            $data['send_link'] = $link_slug . '-A' . $link_id['id'] . '.html';
            $data['send_link1'] = $link_slug1 . '-A' . $link_id1['id'] . '.html';
            // $data['send_link_xongdat'] = $link_slug_xongdat.'-A'.$link_id_xongdat['id'].'.html';
            $data['send_link_laman'] = 'xem-tuoi-lam-an/tuoi-' . $canchi_slug . '-sinh-nam-' . $namsinh . '-hop-lam-an-voi-tuoi-nao.html';
            $data['send_link_mauhop'] = 'xem-mau-hop-menh/menh-' . $menh_slug . '-hop-mau-gi.html';

            $data['canchi'] = $canchi;

            $sql = 'select * from article where name like "%' . $namsinh . '%" and name like "%' . $data['gioitinh_text'] . ' m???ng %" and name like "%2019%"';
            $oneAge = $this->article_model->getQuery($sql);
            $data['oneAge'] = $oneAge;

            $sql_nam = 'select * from article where name like "%' . $info_user['nam_sinh'] . '%" and name like "%nam m???ng%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_user['nam_sinh'] . '%" and name like "%n??? m???ng%" and name like "%2019%"';
            $oneAge_nam = $this->article_model->getQuery($sql_nam);
            $oneAge_nu = $this->article_model->getQuery($sql_nu);

            $data['oneAgeNam'] = $oneAge_nam;
            $data['oneAgeNu'] = $oneAge_nu;
        }
        $link = $canchi == null ? 'xem-tu-vi-tron-doi' : 'xem-tu-vi-tron-doi/tu-vi-tron-doi-tuoi-' . $link_loai;
        $param = array(
            'link' => $link,
            'replace' => array('$canchi' => $canchi, '$namsinh' => $namsinh, '$gioitinh' => $gioitinh, '$chi' => $chi, '$slug_canchi' => $canchi_slug),
        );

        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($param['link']);
        if (!empty($canchi)) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'T??? vi tr???n ?????i',
                    'slug' => 'xem-tu-vi-tron-doi',
                ),
                1 => array(
                    'name' => 'Tu???i ' . $canchi,
                    'slug' => 'xem-tu-vi-tron-doi/tu-vi-tron-doi-tuoi-' . $canchi_slug,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'T??? vi',
                    'slug' => 'tu-vi',
                ),
                1 => array(
                    'name' => 'T??? vi tr???n ?????i',
                    'slug' => 'xem-tu-vi-tron-doi',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        // $data['noindex']    = '<meta name="robots" content="nofollow, noindex" />';
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function xemvanhantuvi()
    {
        $mangsao = array(
            'La H???u' => 'Sao La H???u c??ng c?? th??? xem l?? Hung Tinh. La H???u th?????ng mang t???i cho gia ch??? n???i bu???n lo, tai n???n, tang s???, ho???c nh???ng ??i???u th??? phi trong cu???c s???ng,... C??ng b???i sao La H???u thu???c m???ng M???c, th??? cho n??n nh???ng ng?????i thu???c m???ng M???c v?? Kim s??? ch???u ???nh h?????ng nhi???u h??n so v???i nh???ng ng?????i kh??c. Tuy nhi??n, v???i nh???ng ????n ??ng c?? v??? ??ang ho??i thai m?? ???????c La H???u chi???u m???ng th?? l???i g???p ???????c nhi???u may m???n, t??i l???c trong l??m ??n, ng?????i v??? th?? s??? ???????c "m??? tr??n con vu??ng". <br> <p><span class="btn_nhaynhay"></span><b>C??ch c??ng <a href="https://xemvanmenh.net/sao-la-hau-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A340.html">Sao La H???u</a> ????? gi???i h???n n??m 2018</b></p>',

            'Th??? T??' => 'Sao Th??? T?? r???t h???p cho nh???ng ng?????i thu???c m???nh Th???, bao g???m c??? ????n ??ng v?? ????n b??. Th??? nh??ng, ai g???p sao Th??? T?? chi???u m???nh th?? trong t??m lu??n c?? n???i bu???n man m??c, l??m cho gia ch??? kh??ng ki??n ?????nh trong m???i vi???c, ?????c bi???t l?? vi???c l??m ??n, lu??n ho??i nghi m???i ??i???u v?? kh??ng h??ng h??i trong b???t c??? vi???c g??, tuy nhi??n kh??ng g???p ph???i tai h???a g??. ?????c bi???t: ng?????i gi?? c??? g???p Th??? T?? chi???u m???nh, n???u g???p ph???i b???nh t???t th?? kh?? m?? kh???e m???nh ???????c. <br> <p><span class="btn_nhaynhay"></span><b><a href="https://xemvanmenh.net/sao-tho-tu-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A335.html">Sao Th??? T??</a> l?? g??? c??ch gi???i h???n Sao Th??? T??</b></p>',

            'Th???y Di???u' => 'Sao Th???y Di???u h???p nh???t v???i nh???ng ng?????i thu???c m???nh Kim v?? M???c. Th???y Di???u th?????ng mang t???i nh???ng ??i???u may m???n v?? b???t ng??? trong l??m ??n, bu??n b??n cho gia ch???. Ph??? n??? mang thai m?? ???????c sao n??y chi???u m???ng th?? s??? ???????c b??nh an v?? g???p nhi???u ??i???u t???t. ?????i v???i ng?????i m???nh H???a: do Th???y kh???c h??? n??n s??? g???p ????i ch??t tr??? ng???i, nh??ng do Sao Th???y Di???u kh??ng ph???i l?? Hung Tinh n??n c??ng kh??ng g?? ????ng lo. <br> <p><span class="btn_nhaynhay"></span><b>Xem chi ti???t <a href="https://xemvanmenh.net/sao-thuy-dieu-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A334.html">Sao Th???y Di???u</a> n??m 2018</b></p>',

            'Th??i B???ch' => 'Sao Th??i B???ch hung t???n h??n so v???i sao La H???u, sao n??y l?? ?????i k??? v???i nh???ng ng?????i thu???c m???nh H???a, Kim v?? M???c. Khi b??? Th??i B???ch chi???u m???ng ???? c?? r???t nhi???u ng?????i g???p ??i???u th??? phi, m???t ch???c, tai n???n, t?? t???i,... ?????ng th???i vi???c x??y nh??, l??m nh?? trong n??m c?? sao Th??i B???ch chi???u m???ng c??ng s??? kh??ng ???????c t???t. N???u nh?? ai ??n ??? b??? m???t ph???n ??m ?????c, khi g???p Th??i B???ch chi???u m???ng s??? g???p ph???i h???a ho???n. <br> <p><span class="btn_nhaynhay"></span><b>C??ch gi???i h???n <a href="https://xemvanmenh.net/sao-thai-bach-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A337.html">Sao Th??i B???ch</a> ?????u n??m v?? c??ng sao h??ng th??ng</b></p>',

            'Th??i D????ng' => 'Sao Th??i D????ng l?? m???t ph?????c tinh c???a nam gi???i. Khi ???????c Th??i D????ng chi???u m???ng th?? gia ch??? s??? g???p ???????c nhi???u may m???n trong l??m ??n, bu??n b??n, th??ng quan, ti???n ch???c, ?????c bi???t l?? v??o hai th??ng 6 v?? 10 s??? l?? th??ng ?????i Ki???t. N??? gi???i m?? ???????c Th??i D????ng chi???u m???ng c??ng s??? g???p ???????c nhi???u s??? h??n hoan, ???????c m???i ng?????i gi??p ????? v??? ti???n b???c ho???c vi???c l??m ??n s??? g???p nhi???u thu???n l???i. V???i ph??? n??? mang thai th?? s??? g???p ???????c b??nh an, ?????a tr??? ra ?????i ???????c kh???e m???nh, gi???i giang. V???i nh???ng c?? g??i ch??a l???p gia ????nh, n???u ???????c sao n??y chi???u m???ng th?? c?? th??? s??? c?????i ch???ng trong n??m ????. Ng?????i gi?? c??? tr??n 60, 70 tu???i g???p Th??i D????ng chi???u m???ng n???u ??au ???m c??ng s??? mau kh???i. <br> <p><span class="btn_nhaynhay"></span><b>C??ch c??ng <a href="https://xemvanmenh.net/sao-thuy-dieu-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A334.html">Sao Th??i D????ng</a> ????? r?????c t??i l???c v??? v???i gia ch???</b></p>',

            'V??n H???n' => 'Sao V??n H???n v???n hi???n l??nh, d?? ????n ??ng hay ????n b?? n???u g???p V??n H???n chi???u m???ng th?? m???i vi???c c??ng b??nh th?????ng, kh??ng c?? g?? n???i b???t, ch??? k??? v??? kh???u thi???t v??o c??c th??ng 2 v?? 8. <br> <p><span class="btn_nhaynhay"></span><b> C??ch c??ng <a href="https://xemvanmenh.net/sao-van-hon-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A333.html">Sao V??n H???n</a> ????? ????n t??i l???c, b??nh an v?? may m???n cho n??m 2018</b></p>',

            'K??? ????' => 'Sao K??? ???? l?? m???t Hung Tinh cho c??? nam v?? n???, sao n??y s??? mang ?????n s??? bu???n kh??? v?? ch??n n???n. Nh???ng ng?????i ????n ??ng m?? g??i, n???u g???p K??? ???? chi???u m???ng th?? s??? b??? ph??? n??? l??m nh???c. Tuy nhi??n, ph??? n??? m???ng thai m?? ???????c sao n??y chi???u m???ng th?? l???i g???p ???????c ??i???u may m???n, ?????ng th???i c??i may n??y c??n ???nh h?????ng cho c??? ng?????i ch???ng n???a, khi sinh s???n th?? c??ng ???????c y??n l??nh. Th??? nh??ng n???u kh??ng ho??i thai th?? ph??? n??? s??? g???p nhi???u lao ??ao, l???n ?????n, vi???c l??m ??n th?? g???p nhi???u tr??? ng???i. <br> <p><span class="btn_nhaynhay"></span><b> Nh???ng ??i???u ch??a bi???t v??? <a href="https://xemvanmenh.net/sao-la-hau-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A340.html">Sao K??? ????</a> chi???u m???ng n??m 2018</b></p>',

            'Th??i ??m' => 'Sao Th??i ??m th?????ng mang t???i cho ng?????i ph??? n??? s??? ??i???u h??a, lu??n vui v???, h???nh ph??c, c?? ti???n t??i v?? ???????c th???a m??n nh???ng ?????c m?? c???a m??nh. Ph??? n??? m?? ??ang thai ngh??n m?? ???????c Th??i ??m chi???u m???ng, n???u sinh con gi?? th?? s??? n???t na, th??y m???, nghi??m trang, duy??n d??ng v?? sau n??y s??? th??nh m???t thi???u n??? ki???u di???m, c?? th??? tr??? n??n m???t trang qu???c s???c thi??n h????ng. C??n n???u sinh con trai th?? ????y s??? l?? m???t ch??ng trai ??a c???m, ??t n??i, hi???n l??nh, y??u th??ch c??c m??n khoa h???c v?? sau n??y c?? th??? tr??? th??nh nh?? tri???t h???c, tu s??? hay nh?? to??n h???c. N???u nam gi???i ???????c Th??i ??m chi???u m???ng th?? s??? ???????c b???n b?? l?? n??? gi???i gi??p ?????, ?????c bi???t l?? v??? ti???n b???c, th??? n??n sao Th??i ??m c??n ???????c g???i l?? t??i tinh. V???i nh???ng ng?????i ch??a l???p gia ????nh th?? c?? th??? g???p ???????c t??nh duy??n k??? ng??? ho???c s??? l???p gia ????nh trong n??m n??y. <br> <p><span class="btn_nhaynhay"></span><b>Click ????? xem chi ti???t v??? <a href="https://xemvanmenh.net/sao-thai-am-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A338.html">Sao Th??i ??m</a></b></p>',

            'M???c ?????c' => 'Sao M???c ?????c ch??nh l?? ph?????c tinh cho c??? nam v?? n???. Nh???ng ng?????i ???????c M???c ?????c chi???u m???ng s??? g???p nhi???u may m???n, c?? s??? ph??t tri???n trong c??ng danh, s??? nghi???p, ???????c qu?? nh??n gi??p ?????, thi c??? ????? ?????t, l??m ??n ph??t ?????t m?? l??m nh?? c??ng t???t. Ph??? n??? ho??i thai m?? c?? M???c ?????c chi???u m???ng th?? ?????a tr??? khi ra ?????i s??? l?? ng?????i qu??? quy???t, c????ng ngh???, ??i???m t??nh v?? nh???n n???i, sau n??y s??? ???????c n???i danh v???i ?????i. <br> <p><span class="btn_nhaynhay"></span><b><a href="https://xemvanmenh.net/sao-moc-duc-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A339.html">Sao M???c ?????c</a> v?? nh???ng ??i???u c???n bi???t</b></p>',
        );
        $mang_content_han = array(
            'Hu???nh Tuy???n' => 'Gia ch??? g???p h???n Hu???nh Tuy???n s??? g???p ch???ng ??au ?????u, x??y x???m m???t m??y. Kh??ng n??n m??u l???i, l??m ??n theo ???????ng th???y, ?????ng th???i kh??ng n??n b???o ch???ng cho b???t k??? ai k???o sinh ??i???u b???t l???i. <br> <p><span class="btn_nhaynhay"></span><b>Ph????ng ph??p gi???i <a href="https://xemvanmenh.net/han-huynh-tuyen-la-gi-va-cach-giai-han-A326.html">H???n Hu???nh Tuy???n</a> ????? ????n t??i l???c v?? s???c kh???e</b></p>',

            'Tam Kheo' => 'Gia ch??? g???p ph???i h???n Tam Kheo c???n ????? ph??ng ??au ch??n tay, ch???ng phong th???p hay lo l???ng, bu???n lo cho ng?????i th??n y??u. Qu?? b???n kh??ng n??n t??? h???p ??? nh???ng n??i ????ng ng?????i. C???n tr??nh khi??u kh??ch v?? lu??n nh???n nh???n. Qu?? b???n c??ng c???n ????? phong th????ng t??ch v??? tay, ch??n v?? ng??n ng???a, gi??? gh??n c???i l???a. <br> <p><span class="btn_nhaynhay"></span><b> Ph????ng ph??p gi???i <a href="https://xemvanmenh.net/han-tam-kheo-la-gi-va-cach-giai-han-A328.html">H???n Tam Kheo</a> v?? nh???ng ??i???u c???n bi???t</b></p>',

            'Ng?? M???' => 'Gia ch??? g???p h???n Ng?? M??? s??? hao t??i v?? b???t an. Qu?? b???n kh??ng n??n mua ????? l???u v?? ?????ng n??n cho ai ng??? nh???, k???o g???p tai bay v??? gi??. C???n ph??ng t??i hao c???a m???t, tr??nh mua nh???ng ????? kh??ng c?? h??a ????n. <br> <p><span class="btn_nhaynhay"></span><b>Nh???ng ??i???u c???n bi???t v??? <a href="https://xemvanmenh.net/han-ngu-mo-la-gi-va-cach-giai-han-A327.html">H???n Ng?? M???</a> n??m 2018</b></p>',

            'Thi??n Tinh' => 'Gia ch??? g???p h???n Thi??n Tinh c???n ????? ph??ng ng??? ?????c, n???u ??ang ho??i thai ch??? l???y ????? tr??n cao k???o b??? t?? ng?? tr???y thai, nguy hi???m, ?????ng th???i c??ng ph???i ph??ng ng??? ?????c khi ??n u???ng. G???p ??au ???m, b???nh t???t th?? n??n th??nh t??m c???u Ph???t v???i nhanh qua kh???i. <br> <p><span class="btn_nhaynhay"></span><b>C??ch ph??ng <a href="https://xemvanmenh.net/han-thien-tinh-la-gi-va-cach-giai-han-A330.html">H???n Thi??n Tinh</a> ????? ???????c b??nh an v?? d???i d??o s???c kh???e</b></p>',

            'To??n T???n' => 'Gia ch??? g???p h???n To??n T???n d??? hao t??i, ng??? tr??ng. N???u ??i ???????ng m?? mang theo nhi???u ti???n ho???c ????? trang s???c d??? b??? c?????p gi???t v?? nguy hi???m ?????n t??nh m???ng. Qu?? b???n ch??? n??n h??n h???p hay khai th??c l??m s???n, ???t b??? tai n???n l??m nguy. <br> <p><span class="btn_nhaynhay"></span><b>Ph????ng ph??p gi???i <a href="https://xemvanmenh.net/han-toan-tan-la-gi-va-cach-giai-han-A331.html">H???n Thi??n Tinh</a> n??m 2018</b></p>',

            'Thi??n La' => 'Gia ch??? g???p h???n Thi??n La c???n ????? ph??ng c???nh v??? ch???ng ly c??ch, n??n nh???n nh???n ????? tr??nh g???p ph???i ??i???u ????. Kh??ng n??n ghen tu??ng g???t g???ng khi???n cho chuy???n b?? x?? ra to. <br> <p><span class="btn_nhaynhay"></span><b>Xem chi ti???t <a href="https://xemvanmenh.net/han-thien-la-la-gi-va-cach-giai-han-A329.html">H???n Thi??n La</a> t???t hay x???u trong n??m 2018</b></p>',

            '?????a V??ng' => 'Gia ch??? g???p h???n ?????a V??ng th?? k??? ??i v???i ai khi tr???i t???i, ?????ng th???i ch??? cho ai ng??? tr??? v?? tr??nh n??n mua ????? qu???c c???m, ????? l???u. <br> <p><span class="btn_nhaynhay"></span><b>Mu???n gi???i <a href="https://xemvanmenh.net/han-diem-vuong-la-gi-va-tot-hay-xau-nhu-the-nao-A323.html">H???n ?????a V??ng</a> th?? ph???i l??m sao?</b></p>',

            'Di??m V????ng' => 'Gia ch??? g???p h???n Di??m V????ng n???u b??? ??au l??u ???t s??? kh?? tho??t, th??? nh??ng v??? m??u sinh th?? t???t, g???p nhi???u t??i l???c v?? vui v???. <br> <p><span class="btn_nhaynhay"></span><b><a href="https://xemvanmenh.net/han-diem-vuong-la-gi-va-tot-hay-xau-nhu-the-nao-A323.html">H???n Di??m V????ng</a> l?? g?? v?? c??ch gi???i h???n cho n??m 2018</b></p>',
        );
        $mang_han_nam = array(
            'Hu???nh Tuy???n' => array(10, 18, 27, 36, 45, 54, 63, 72, 81),
            'Tam Kheo' => array(11, 19, 20, 28, 37, 46, 55, 64, 73, 82),
            'Ng?? M???' => array(12, 21, 29, 30, 38, 47, 56, 65, 74, 83),
            'Thi??n Tinh' => array(13, 22, 31, 39, 40, 48, 57, 66, 75, 84),
            'To??n T???n' => array(14, 23, 32, 41, 49, 50, 58, 67, 76, 85),
            'Thi??n La' => array(15, 24, 33, 42, 51, 59, 60, 68, 77, 86),
            '?????a V??ng' => array(16, 25, 34, 43, 52, 61, 69, 70, 17, 87),
            'Di??m V????ng' => array(17, 26, 35, 44, 53, 62, 71, 79, 80, 88),
        );
        $mang_han_nu = array(
            'To??n T???n' => array(10, 18, 27, 36, 45, 54, 63, 72, 81),
            'Thi??n Tinh' => array(11, 19, 20, 28, 37, 46, 55, 64, 73, 82),
            'Ng?? M???' => array(12, 21, 29, 30, 38, 47, 56, 65, 74, 83),
            'Tam Kheo' => array(13, 22, 31, 39, 40, 48, 57, 66, 75, 84),
            'Hu???nh Tuy???n' => array(14, 23, 32, 41, 49, 50, 58, 67, 76, 85),
            'Di??m V????ng' => array(15, 24, 33, 42, 51, 59, 60, 68, 77, 86),
            '?????a V??ng' => array(16, 25, 34, 43, 52, 61, 69, 70, 17, 87),
            'Thi??n La' => array(17, 26, 35, 44, 53, 62, 71, 79, 80, 88),
        );
        $canchi_slug = '';
        $canchi_text = '';
        $namxem = '';
        $nam = '';
        if ($_POST) {
            $ngay = $_POST['ngaysinh'];
            $thang = $_POST['thangsinh'];
            $nam = list_age_text($_POST['namsinh']);
            $data['namsinh'] = $nam;
            $gioitinh = $_POST['gioitinh'];
            $namxem = $_POST['namxem'];
            $input = array(
                'ngay_sinh' => $ngay,
                'thang_sinh' => $thang,
                'nam_sinh' => $nam,
                'gioitinh' => $gioitinh,
            );
            $info_user = $this->my_info->Db_get_info_user($input);
            $canchi_text = $info_user['namcanchi'];
            $canchi_slug = $_POST['namsinh'];
            $data['namxem'] = $namxem;
            $info_date = $this->my_info->get_info_date(6, 6, $namxem);
            $arr_canchi_text_namsinh = explode(' ', $canchi_text);
            $chi_text_namsinh = $arr_canchi_text_namsinh['1'];
            $chi_text_namxem = $info_date['canchinam_text']['chi'];
            $data['canchi_text'] = $canchi_text;
            $data['canchi_slug'] = $canchi_slug;
            $data['canchi_text_namxem'] = $info_date['namcanchi'];
            $data['gioitinh_text'] = $gioitinh == 'nam' ? 'Nam' : 'N???';
            $data['gioitinh_slug'] = $gioitinh;
            $tuoi = date('Y') - $nam + 1;
            $data['tuoi'] = $tuoi;
            if ($gioitinh == 'nam') {
                switch ($tuoi % 9) {
                    case '0':
                        $saochieumenh = 'M???c ?????c';
                        break;
                    case '1':
                        $saochieumenh = 'La H???u';
                        break;
                    case '2':
                        $saochieumenh = 'Th??? T??';
                        break;
                    case '3':
                        $saochieumenh = 'Th???y Di???u';
                        break;
                    case '4':
                        $saochieumenh = 'Th??i B???ch';
                        break;
                    case '5':
                        $saochieumenh = 'Th??i D????ng';
                        break;
                    case '6':
                        $saochieumenh = 'V??n H???n';
                        break;
                    case '7':
                        $saochieumenh = 'K??? ????';
                        break;
                    case '8':
                        $saochieumenh = 'Th??i ??m';
                        break;
                    default:
                        // $saochieumenh = '';
                        break;
                }
                foreach ($mang_han_nam as $key => $value) {
                    if (in_array($tuoi, $value)) {
                        $ten_han = $key;
                    }
                }
            } else {
                switch ($tuoi % 9) {
                    case '0':
                        $saochieumenh = 'Th???y Di???u';
                        break;
                    case '1':
                        $saochieumenh = 'K??? ????';
                        break;
                    case '2':
                        $saochieumenh = 'V??n H???n';
                        break;
                    case '3':
                        $saochieumenh = 'M???c ?????c';
                        break;
                    case '4':
                        $saochieumenh = 'Th??i ??m';
                        break;
                    case '5':
                        $saochieumenh = 'Th??? T??';
                        break;
                    case '6':
                        $saochieumenh = 'La H???u';
                        break;
                    case '7':
                        $saochieumenh = 'Th??i D????ng';
                        break;
                    case '8':
                        $saochieumenh = 'Th??i B???ch';
                        break;
                    default:
                        // $saochieumenh = '';
                        break;
                }
                foreach ($mang_han_nu as $key => $value) {
                    if (in_array($tuoi, $value)) {
                        $ten_han = $key;
                    }
                }
            }
            foreach ($mangsao as $key => $value) {
                if ($saochieumenh == $key) {
                    $data['content_sao'] = $value;
                }
            }
            foreach ($mang_content_han as $key => $value) {
                if ($ten_han == $key) {
                    $data['content_han'] = $value;
                }
            }
            $get_kimlau = $this->boituoivochong_model->getKimlau($tuoi);
            $get_tamtai = $this->boituoivochong_model->getTamtai($chi_text_namsinh, $chi_text_namxem);
            $get_hoangoc = $this->boituoivochong_model->getHoangoc($tuoi);
            $get_thaitue = $this->boituoivochong_lib->getThaitue($tuoi);
            $data['get_tamtai'] = $get_tamtai;
            $data['get_kimlau'] = $get_kimlau;
            $data['get_hoangoc'] = $get_hoangoc;
            $data['get_thaitue'] = $get_thaitue;
            $data['saochieumenh'] = $saochieumenh;
            $data['ten_han'] = $ten_han;

            $data['phamkimlau'] = '';
            $data['phamtamtai'] = '';
            $data['phamthaitue'] = '';
            $data['phamhoangoc'] = '';
            // luan giai lam nha
            $luangiai = '';
            $luangiai_pham = '';   // neu pham phai string
            $luangiai_pham_check = true;
            if (!empty($get_kimlau)) {
                $data['phamkimlau'] = 'Kim l??u';
                $luangiai_pham_check = false;
                $luangiai_pham .= '' . $get_kimlau['name'] . '-' . $get_kimlau['content'] . '<br>';
            }
            if (!empty($get_tamtai)) {
                $data['phamtamtai'] = 'Tam tai';
                $luangiai_pham_check = false;
                $luangiai_pham .= '- <b>Tam tai<b/> ch??? c?? l??m nh??!';
            }
            if (!empty($get_thaitue)) {
                $data['phamthaitue'] = 'Th??i tu???';
                $luangiai_pham_check = false;
                $luangiai_pham .= '- <b>Th??i Tu???</b> ch??? c?? l??m nh??!';
            }
            if (!empty($get_hoangoc)) {
                if ($get_hoangoc['is_hoangoc'] == 1) {
                    $data['phamhoangoc'] = 'Hoang ???c';
                    $luangiai_pham_check = false;
                    $luangiai_pham .= '' . $get_hoangoc['content'] . '-' . $get_hoangoc['translate'];
                }
            }
            if (!$luangiai_pham_check) {
                $pham_content = '<br><b class="text-danger">N??m n??y ph???m ph???i:</b> <br>';
                $pham_content .= '<p>' . '<b>- ' . $luangiai_pham . '</b>' . '</p>';
            } else {
                $pham_content = 'N??m n??y t???t h???p v???i b???n c?? th??? x??y s???a nh?? !';
            }
            $data['pham_content'] = $pham_content;
            // luan giai ket hon
            $luangiai_kethon = '';
            $luangiai_pham_kethon = '';   // neu pham phai string
            $luangiai_pham_check_kethon = true;
            // if(!empty($get_tamtai)){
            //     $luangiai_pham_check_kethon = false;
            //     $luangiai_pham_kethon .= 'Tu???i n??y ph???m ph???i Tam tai ch??? c?? k???t h??n!';
            // }
            // if(!empty($get_thaitue)){
            //     $luangiai_pham_check_kethon = false;
            //     $luangiai_pham_kethon .= 'Tu???i n??y ph???m ph???i cung Th??i Tu??? ch??? c?? k???t h??n!';
            // }
            // if (!$luangiai_pham_check_kethon) {
            //     $pham_content_kethon   = 'Nam n??y ph???m ph???i: <br>';
            //     $pham_content_kethon   .= '<p>'.$luangiai_pham_kethon.'</p>';
            // }
            // else{
            //     $pham_content_kethon   = 'N??m n??y t???t h???p v???i b???n c?? th??? k???t h??n !';
            // }
            // $data['pham_conten_kethon']   = $pham_content_kethon;
            if ($gioitinh == 'nam') {
                $link_slug = 'xem-tu-vi-nam-2018-tuoi-' . $canchi_slug . '-' . $gioitinh . '-mang-sinh-nam-' . $nam;
            } else {
                $link_slug = 'xem-tu-vi-tuoi-' . $canchi_slug . '-nam-2018-' . $gioitinh . '-mang-sinh-nam-' . $nam;
            }

            $link_id = $this->boituoivochong_model->db->like('slug', $link_slug)->select('*')->get('article')->row_array();
            $data['send_link'] = $link_slug . '-A' . $link_id['id'] . '.html';
            $data['submit'] = 'ok';

            $data['canchi'] = $canchi_text;

            $sql = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%' . strtolower($data['gioitinh_text']) . ' m???ng%" and name like "%2019%"';
            $oneAge = $this->article_model->getQuery($sql);
            $data['oneAge'] = $oneAge;
        }
        $link = 'xem-han-tu-vi';
        $param = array(
            'link' => $link,
            'replace' => array(
                '$namhientai' => date('Y'),
                '$canchi_slug' => $canchi_slug,
                '$canchi_text' => $canchi_text,
                '$namxem' => $namxem,
                '$namsinh' => $nam,
            ),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());

        $breadcrumb = array(
            0 => array(
                'name' => 'T??? vi',
                'slug' => 'tu-vi',
            ),
            1 => array(
                'name' => 'V???n h???n t??? vi',
                'slug' => 'xem-han-tu-vi',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        // $data['noindex']    = '<meta name="robots" content="nofollow, noindex" />';
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }
    // public function xemtuvihangngay($ngay = null, $thang = null, $nam = null)
    // {   
    //     $arr_can = array(
    //             '0' => 'Gi??p',
    //             '1' => '???t',
    //             '2' => 'B??nh',
    //             '3' => '??inh',
    //             '4' => 'M???u',
    //             '5' => 'K???',
    //             '6' => 'Canh',
    //             '7' => 'T??n',
    //             '8' => 'Nh??m',
    //             '9' => 'Qu??',
    //         );
    //         // M???ng chi
    //         $arr_chi = array(
    //             '0'     => 'T??',
    //             '1'     => 'S???u',
    //             '2'     => 'D???n',
    //             '3'     => 'M??o',
    //             '4'     => 'Th??n',
    //             '5'     => 'T???',
    //             '6'     => 'Ng???',
    //             '7'     => 'M??i',
    //             '8'     => 'Th??n',
    //             '9'     => 'D???u',
    //             '10'    => 'Tu???t',
    //             '11'    => 'H???i',
    //         );
    //     if ($_POST) {
    //         $input = array(
    //             'ngay_sinh'     => $_POST['ngaysinh'],
    //             'thang_sinh'    => $_POST['thangsinh'],
    //             'nam_sinh'      => list_age_text($_POST['namsinh']),
    //         );
    //         $info_user = $this->my_info->Db_get_info_user($input);
    //         $info_date = $this->my_info->get_info_date($ngay,$thang,$nam);
    //         $canchi_nguoi       = $info_user['namcanchi'];
    //         $canchi_ngay        = $info_date['ngaycanchi'];
    //         $data['caci_nguoi'] = $canchi_nguoi;
    //         $data['caci_ngay']  = $canchi_ngay;
    //         $data['canchi_nguoi']   = explode(' ',$canchi_nguoi);
    //         $data['canchi_ngay']    = explode(' ',$canchi_ngay);
    //         $can_nguoi  = $data['canchi_nguoi'][0];
    //         $chi_nguoi  = $data['canchi_nguoi'][1];
    //         $can_ngay   = $data['canchi_ngay'][0];
    //         $chi_ngay   = $data['canchi_ngay'][1];
    //         $number_cannguoi    = array_search($can_nguoi,$arr_can);
    //         $number_chinguoi    = array_search($chi_nguoi,$arr_chi);
    //         $number_canngay     = array_search($can_ngay,$arr_can);
    //         $number_chingay     = array_search($chi_ngay,$arr_chi);
    //         $data['noidung']    = $this->xemtuvi_model->submit_ttm($number_cannguoi,$number_chinguoi,$number_canngay,$number_chingay);
    //         $data['text_ketluan'] = $data['noidung']['text_ketluan'];
    //         $canchi_slug = $_POST['namsinh'];
    //         $canchi_text = $info_user['lucthap']['canchi'];
    //         $namsinh = list_age_text($_POST['namsinh']);
    //         $data['info_user'] = $info_user;
    //         $data['canchi_slug'] = $canchi_slug;
    //         $data['canchi_text'] = $canchi_text;
    //         $link_slug = 'xem-tu-vi-nam-2018-tuoi-'.$canchi_slug.'-nam-mang-sinh-nam-'.$namsinh;
    //         $link_id = $this->boituoivochong_model->db->like('slug',$link_slug)->select('*')->get('article')->row_array();
    //         $link_slug1 = 'xem-tu-vi-tuoi-'.$canchi_slug.'-nam-2018-nu-mang-sinh-nam-'.$namsinh;
    //         $link_id1 = $this->boituoivochong_model->db->like('slug',$link_slug1)->select('*')->get('article')->row_array();
    //         $data['send_link'] = $link_slug.'-A'.$link_id['id'].'.html';
    //         $data['send_link1'] = $link_slug1.'-A'.$link_id1['id'].'.html';
    //         $this->_submit = 1;

    //         $data['canchi']     =  $canchi_text;
    //         $sql_nam =  'select * from article where name like "%'.$info_user['amlich'][2].'%" and name like "%nam%" and name like "%2019%"';
    //         $sql_nu  =  'select * from article where name like "%'.$info_user['amlich'][2].'%" and name like "%nu%" and name like "%2019%"';
    //         $oneAge_nam  = $this->article_model->getQuery($sql_nam);
    //         $oneAge_nu   = $this->article_model->getQuery($sql_nu);
    //         $data['oneAgeNam'] = $oneAge_nam;
    //         $data['oneAgeNu']  = $oneAge_nu;
    //     }
    //     if (!empty($ngay) && !empty($thang) && !empty($nam)) {
    //         $this->_submit = 1;
    //     }
    //     if ($this->_submit ==1) {
    //         $duonglich = array(
    //             'ngayduong'     =>  $ngay,
    //             'thangduong'    =>  $thang,
    //             'namduong'      =>  $nam,
    //         );
    //         $data['thang'] = $thang;
    //         $data['nam'] = $nam;
    //         $data['duonglich'] = $duonglich;
    //         $data['thapnhibattu'] = $this->lib_xemngay_demo->tinh_thapnhibattu_anhduong($duonglich);
    //         $string_ngay = $ngay.'-'.$thang.'-'.$nam;
    //         $date = strtotime($string_ngay);
    //         $data['five_day_next'] = array();
    //         for($i = 1;$i<=10;$i++){
    //             $date_next = strtotime('+'.$i.' day',$date);
    //             array_push($data['five_day_next'],date('j-n-Y',$date_next));
    //         }
    //         $data['ngayxem']    = $ngay;
    //         $data['thangxem']   = $thang;
    //         $data['namxem']     = $nam;
    //     }
    //     if ($this->_submit == 1) {
    //         $breadcrumb = array(
    //             0 => array(
    //                 'name' => 'T??? vi h??ng ng??y',
    //                 'slug' => 'tu-vi-hang-ngay',
    //             ),
    //             1 => array(
    //                 'name' => 'Ng??y '.$ngay.'/'.$thang.'/'.$nam,
    //                 'slug' => 'tu-vi-hang-ngay/tu-vi-ngay-'.$ngay.'-thang-'.$thang.'-nam-'.$nam,
    //             ),
    //         );
    //     }else{
    //         $breadcrumb = array(
    //             0 => array(
    //                 'name' => 'T??? vi',
    //                 'slug' => 'tu-vi',
    //             ),
    //             1 => array(
    //                 'name' => 'T??? vi h??ng ng??y',
    //                 'slug' => 'tu-vi-hang-ngay',
    //             ),
    //         );
    //     }
    //     $data['breadcrumb'] = breadcrumb($breadcrumb);
    //     $link = $nam == null?'tu-vi-hang-ngay':'tu-vi-hang-ngay/tu-vi-ngay-$ngayxem-thang-$thangxem-nam-$namxem';
    //     $param = array(
    //         'link'      => $link,
    //         'replace'   => array('$ngayxem'  => $ngay,'$thangxem' => $thang,'$namxem'   => $nam,
    //         ),
    //     );
    //     // 1. Get comment
    //     $data['getComment'] = $getComment = $this->comment_lib->getByTheme($param['link']);

    //     $this->my_seolink->seolink_cst($param);
    //     $data['lichngay']    = $this->get_lichngay();
    //     $data['lichthang']   = $this->get_lichthang();
    //     // $data['noindex']    = '<meta name="robots" content="nofollow, noindex" />';
    //     $data['title'] = $this->my_seolink->get_title();
    //     $data['keywords'] = $this->my_seolink->get_keywords();
    //     $data['description'] = $this->my_seolink->get_description();
    //     $data['view'] = $this->action_view;
    //     $this->load->view($this->view,$data);
    // }

    public function xemtuvihangngay($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null && $thang == null & $nam == null)
            $flag_url = true;
        else
            $flag_url = false;
        $ngay = $ngay != null ? $ngay : date('j', time());
        $thang = $thang != null ? $thang : date('n', time());
        $nam = $nam != null ? $nam : date('Y', time());


        $this->load->library(array('site/ngaythangnam'));
        $arr = array(
            1 => array('name' => 'tu???i T??', 'start' => 1960),
            2 => array('name' => 'tu???i S???u', 'start' => 1961),
            3 => array('name' => 'tu???i D???n', 'start' => 1962),
            4 => array('name' => 'tu???i M??o', 'start' => 1963),
            5 => array('name' => 'tu???i Th??n', 'start' => 1952),
            6 => array('name' => 'tu???i T???', 'start' => 1953),
            7 => array('name' => 'tu???i Ng???', 'start' => 1954),
            8 => array('name' => 'tu???i M??i', 'start' => 1955),
            9 => array('name' => 'tu???i Th??n', 'start' => 1956),
            10 => array('name' => 'tu???i D???u', 'start' => 1957),
            11 => array('name' => 'tu???i Tu???t', 'start' => 1958),
            12 => array('name' => 'tu???i H???i', 'start' => 1959),
        );
        foreach ($arr as $key => $value) {
            $i = 1;
            $j = $value['start'];
            while ($i <= 5) {
                $this->ngaythangnam->set_ngay_duong(9, 4, $j);
                $api_nam_sinh[] = $j;
                $rt[] = array(
                    'number' => $j,
                    'text' => $this->ngaythangnam->get_nam_can_chi('canchi', 't'),
                    'slug' => $this->ngaythangnam->get_nam_can_chi('canchi', 's'),
                );
                $i++;
                $j = $j + 12;
            }
            $arr[$key]['list'] = $rt;
            unset($rt);
        }
        $this->load->library('site/tuvingay');
        $list_tvn = $this->tuvingay->resut_list($api_nam_sinh, $ngay, $thang, $nam);

        $arr_que_id = array();
        if (!empty($list_tvn)) {
            foreach ($list_tvn as $key => $value) {
                array_push($arr_que_id, $value['que_id']);
            }
        }

        $arr_que_id = array_unique($arr_que_id);
        $list_que = $this->tuvingay_model->Db_list_que($arr_que_id);
        $que_y_nghia = null;
        if (!empty($list_tvn)) {
            foreach ($list_tvn as $key => $value) {
                $y_nghia = isset($list_que[$value['que_id']]['y_nghia'][$value['que_y_nghia']]) ? $list_que[$value['que_id']]['y_nghia'][$value['que_y_nghia']] : '';
                $que_y_nghia[$key] = $y_nghia;
            }
        }
        $data['que_y_nghia'] = $que_y_nghia;
        $data['list_tuoi'] = $arr;
        $data['ngay_xem'] = $ngay . '/' . $thang . '/' . $nam;
        $data['list_5_ngay_truoc'] = $this->ngaythangnam->get_ngay_truoc($ngay, $thang, $nam, 5);
        $data['list_5_ngay_tiep'] = $this->ngaythangnam->get_ngay_ke_tiep($ngay, $thang, $nam, 5);
        if ($this->_submit == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'T??? vi h??ng ng??y',
                    'slug' => 'tu-vi-hang-ngay',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'tu-vi-hang-ngay/tu-vi-ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'T??? vi',
                    'slug' => 'tu-vi',
                ),
                1 => array(
                    'name' => 'T??? vi h??ng ng??y',
                    'slug' => 'tu-vi-hang-ngay',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $link = $flag_url == true ? 'tu-vi-hang-ngay' : 'tu-vi-hang-ngay/tu-vi-ngay-$ngayxem-thang-$thangxem-nam-$namxem';
        $param = array(
            'link' => $link,
            'replace' => array('$ngayxem' => $ngay, '$thangxem' => $thang, '$namxem' => $nam,
            ),
        );


        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($param['link']);


        $this->my_seolink->seolink_cst($param);
        $data['lichngay'] = $this->get_lichngay();
        $data['lichthang'] = $this->get_lichthang();
        // $data['noindex']    = '<meta name="robots" content="nofollow, noindex" />';
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function xemtuvihangngay_chitiet($tuoi, $ngay, $thang, $nam)
    {
        $this->load->library(array('site/ngaythangnam'));
        $arr = array(
            'ty' => 1960,
            'suu' => 1961,
            'dan' => 1962,
            'mao' => 1963,
            'thin' => 1952,
            'ti' => 1953,
            'ngo' => 1954,
            'mui' => 1955,
            'than' => 1956,
            'dau' => 1957,
            'tuat' => 1958,
            'hoi' => 1959,
        );
        $con_giap = $arr[$tuoi];
        $i = 1;
        $j = $con_giap;
        while ($i <= 5) {
            $this->ngaythangnam->set_ngay_duong(9, 4, $j);
            $rt[$j] = array(
                'number' => $j,
                'text' => $this->ngaythangnam->get_nam_can_chi('canchi', 't'),
                'slug' => $this->ngaythangnam->get_nam_can_chi('canchi', 's'),
            );
            $api_nam_sinh[] = $j;
            $i++;
            $j = $j + 12;
        }
        $list_nam_sinh = $rt;
        $this->load->library('site/tuvingay');
        $list_tvn = $this->tuvingay->resut_list($api_nam_sinh, $ngay, $thang, $nam);
        //echo'<pre>';print_r($list_tvn); echo '</pre>';
        $arr_que_id = array();
        $arr_nhom_quan_he_id = array();
        $arr_ngu_hanh_id = array();
        foreach ($list_tvn as $key => $value) {
            array_push($arr_que_id, $value['que_id']);
            $arr_quan_he = unserialize($value['quan_he']);
            //echo'<pre>';print_r($arr_quan_he); echo '</pre>';
            foreach ($arr_quan_he as $key1 => $value1) {
                array_push($arr_nhom_quan_he_id, $value1['nhom_quan_he_id']);
            }
            array_push($arr_ngu_hanh_id, $value['ngu_hanh_id']);
        }
        $arr_que_id = array_unique($arr_que_id);
        $list_que = $this->tuvingay_model->Db_list_que($arr_que_id);
        $arr_nhom_quan_he_id = array_unique($arr_nhom_quan_he_id);
        $list_quan_he = $this->tuvingay_model->Db_list_quan_he($arr_nhom_quan_he_id);
        $arr_ngu_hanh_id = array_unique($arr_ngu_hanh_id);
        $list_ngu_hanh = $this->tuvingay_model->Db_list_ngu_hanh($arr_ngu_hanh_id);
        //echo'<pre>';print_r($arr_nhom_quan_he_id); echo '</pre>';
        foreach ($list_tvn as $key => $value) {
            // ?? ngh??a qu???
            $y_nghia_que = isset($list_que[$value['que_id']]['y_nghia'][$value['que_y_nghia']]) ? $list_que[$value['que_id']]['y_nghia'][$value['que_y_nghia']] : '';
            $que_y_nghia[$key] = $y_nghia_que;
            // ?? ngh??a quan h???
            $arr_quan_he = unserialize($value['quan_he']);

            foreach ($arr_quan_he as $key1 => $value1) {
                $arr_quan_he_y_nghia = $list_quan_he[$value1['nhom_quan_he_id']]['y_nghia'][$value1['y_nghia_id']];
            }
            $y_nghia_quan_he[$key] = $arr_quan_he_y_nghia;
            // ?? ngh??a ng?? h??nh
            $y_nghia_ngu_hanh[$key] = $list_ngu_hanh[$value['ngu_hanh_id']]['y_nghia'][$value['ngu_hanh_y_nghia']];

        }
        $data['y_nghia_que'] = $que_y_nghia;
        $data['y_nghia_quan_he'] = $y_nghia_quan_he;
        $data['y_nghia_ngu_hanh'] = $y_nghia_ngu_hanh;
        $data['list_tuoi'] = $arr;
        $data['list_nam_sinh'] = $rt;
        $data['ngay_duong'] = $ngay;
        $data['thang_duong'] = $thang;
        $data['nam_duong'] = $nam;
        $data['ngay_xem'] = $ngay . '/' . $thang . '/' . $nam;
        $data['tuoi_slug'] = $tuoi;
        $data['list_5_ngay_truoc'] = $this->ngaythangnam->get_ngay_truoc($ngay, $thang, $nam, 5);
        $data['list_5_ngay_tiep'] = $this->ngaythangnam->get_ngay_ke_tiep($ngay, $thang, $nam, 5);
        if ($this->_submit == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'T??? vi h??ng ng??y',
                    'slug' => 'tu-vi-hang-ngay',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'tu-vi-hang-ngay/tu-vi-ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'T??? vi',
                    'slug' => 'tu-vi',
                ),
                1 => array(
                    'name' => 'T??? vi h??ng ng??y',
                    'slug' => 'tu-vi-hang-ngay',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        //$link = $nam == null?'tu-vi-hang-ngay':'tu-vi-hang-ngay/tu-vi-ngay-$ngayxem-thang-$thangxem-nam-$namxem';
        $con_giap = array(

            'ty' => 'T??',

            'suu' => 'S???u',

            'dan' => 'D???n',

            'mao' => 'M??o',

            'thin' => 'Th??n',

            'ti' => 'T???',

            'ngo' => 'Ng???',

            'mui' => 'M??i',

            'than' => 'Th??n',

            'dau' => 'D???u',

            'tuat' => 'Tu???t',

            'hoi' => 'H???i'

        );
        $tuoi = $con_giap[$tuoi];
        $link = 'tu-vi-hang-ngay/tu-vi-tuoi-$tuoi-ngay-hom-nay-$ngayxem-$thangxem-$namxem';
        $param = array(
            'link' => $link,
            'replace' => array('$ngayxem' => $ngay, '$thangxem' => $thang, '$namxem' => $nam, '$tuoi' => $tuoi
            ),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($param['link']);

        $this->my_seolink->seolink_cst($param);
        $data['lichngay'] = $this->get_lichngay();
        $data['lichthang'] = $this->get_lichthang();
        // $data['noindex']    = '<meta name="robots" content="nofollow, noindex" />';
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function tuvituan()
    {
        $data['ngaytrongtuan'] = array();
        $data['tuantruoc'] = array();
        $data['tuansau'] = array();
        $data['total_info'] = array();
        $canchi_slug = '';
        $canchi_text = '';
        if ($_POST) {
            $input = array(
                'ngay_sinh' => $_POST['ngaysinh'],
                'thang_sinh' => $_POST['thangsinh'],
                'nam_sinh' => list_age_text($_POST['namsinh']),
            );
            $info_user = $this->my_info->Db_get_info_user($input);
            $canchi_slug = $_POST['namsinh'];
            $canchi_text = $info_user['lucthap']['canchi'];
            $data['info_user'] = $info_user;
            $data['canchi_slug'] = $canchi_slug;
            $data['canchi_text'] = $canchi_text;
            $day = 1;
            $Week = date('W');
            $Year = date('Y');
            $DateByNumberOfWeek = date('j-n-Y', strtotime($Year . 'W' . $Week . $day));
            for ($i = 0; $i < 7; $i++) {
                $ngay = date('j-n-Y', strtotime($Year . 'W' . $Week . ($day + $i)));
                $cacngay = (explode('-', $ngay));
                array_push($data['ngaytrongtuan'], $cacngay);
            }
            $ngaythangnamdautuan = reset($data['ngaytrongtuan']);
            $data['ngaydautuan'] = $ngaythangnamdautuan[0];
            $data['thangdautuan'] = $ngaythangnamdautuan[1];
            $data['namdautuan'] = $ngaythangnamdautuan[2];
            $ngaythangnamcuoituan = end($data['ngaytrongtuan']);
            $data['ngaycuoituan'] = $ngaythangnamcuoituan[0];
            $data['thangcuoituan'] = $ngaythangnamcuoituan[1];
            $data['namcuoituan'] = $ngaythangnamcuoituan[2];
            //tuan truoc
            $first_day_week = $data['ngaydautuan'] . '-' . $data['thangdautuan'] . '-' . $data['namdautuan'];
            $first_day_week = strtotime($first_day_week);
            for ($i = 1; $i <= 7; $i++) {
                $ngaytuantruoc = date('j-n-Y', strtotime('-' . $i . ' day', $first_day_week));
                $arr_day_before_week = (explode('-', $ngaytuantruoc));
                array_push($data['tuantruoc'], $arr_day_before_week);
            }
            //tuan sau
            $end_day_week = $data['ngaycuoituan'] . '-' . $data['thangcuoituan'] . '-' . $data['namcuoituan'];
            $end_day_week = strtotime($end_day_week);
            for ($i = 1; $i <= 7; $i++) {
                $ngaytuansau = date('j-n-Y', strtotime('+' . $i . ' day', $end_day_week));
                $arr_day_after_week = (explode('-', $ngaytuansau));
                array_push($data['tuansau'], $arr_day_after_week);
            }
            foreach ($data['ngaytrongtuan'] as $key => $value) {
                $duonglich = array(
                    'ngayduong' => $value[0],
                    'thangduong' => $value[1],
                    'namduong' => $value[2],
                );
                $data['thapnhibattu'] = $this->lib_xemngay_demo->tinh_thapnhibattu_anhduong($duonglich);
                $data['tonghop'] = array(
                    'ngay' => $duonglich['ngayduong'],
                    'thang' => $duonglich['thangduong'],
                    'nam' => $duonglich['namduong'],
                    'content' => $data['thapnhibattu'],
                );
                array_push($data['total_info'], $data['tonghop']);
            }

            $data['canchi'] = $canchi_text;
            $sql_nam = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%nam%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%nu%" and name like "%2019%"';
            $oneAge_nam = $this->article_model->getQuery($sql_nam);
            $oneAge_nu = $this->article_model->getQuery($sql_nu);
            $data['oneAgeNam'] = $oneAge_nam;
            $data['oneAgeNu'] = $oneAge_nu;
        }
        $link = 'xem-tu-vi-tuan-moi';
        $param = array(
            'link' => $link,
            'replace' => array('$canchi_text' => $canchi_text, '$canchi_slug' => $canchi_slug),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($param['link']);
        $breadcrumb = array(
            0 => array(
                'name' => 'T??? vi',
                'slug' => 'tu-vi',
            ),
            1 => array(
                'name' => 'T??? vi h??ng tu???n',
                'slug' => 'xem-tu-vi-tuan-moi',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        // $data['noindex']    = '<meta name="robots" content="nofollow, noindex" />';
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function tuvithang($thang = null, $nam = null)
    {
        $data['ngay_trong_thang'] = array();
        $data['total_info'] = array();
        if ($_POST) {
            $input = array(
                'ngay_sinh' => 6,
                'thang_sinh' => 6,
                'nam_sinh' => list_age_text($_POST['namsinh']),
            );
            $info_user = $this->my_info->Db_get_info_user($input);
            $canchi_slug = $_POST['namsinh'];
            $canchi_text = $info_user['lucthap']['canchi'];
            $data['post'] = $_POST;
            $data['info_user'] = $info_user;
            $data['canchi_slug'] = $canchi_slug;
            $data['canchi_text'] = $canchi_text;
            $namsinh = list_age_text($_POST['namsinh']);
            $link_slug = 'xem-tu-vi-nam-2018-tuoi-' . $canchi_slug . '-nam-mang-sinh-nam-' . $namsinh;
            $link_id = $this->boituoivochong_model->db->like('slug', $link_slug)->select('*')->get('article')->row_array();
            $link_slug1 = 'xem-tu-vi-tuoi-' . $canchi_slug . '-nam-2018-nu-mang-sinh-nam-' . $namsinh;
            $link_id1 = $this->boituoivochong_model->db->like('slug', $link_slug1)->select('*')->get('article')->row_array();
            $data['send_link'] = $link_slug . '-A' . $link_id['id'] . '.html';
            $data['send_link1'] = $link_slug1 . '-A' . $link_id1['id'] . '.html';

            $data['iNamsinh'] = $_POST['namsinh'];
            $data['iThangxem'] = $_POST['thangxem'];
            $data['iNamxem'] = $_POST['namxem'];

            $data['canchi'] = $canchi_text;
            $sql_nam = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%nam m???ng%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%n??? m???ng%" and name like "%2019%"';
            $oneAge_nam = $this->article_model->getQuery($sql_nam);
            $oneAge_nu = $this->article_model->getQuery($sql_nu);
            $data['oneAgeNam'] = $oneAge_nam;
            $data['oneAgeNu'] = $oneAge_nu;
        }
        if (!empty($thang)) {
            $day_of_month = cal_days_in_month(CAL_GREGORIAN, $thang, $nam); // return number day of month
            for ($i = 1; $i <= $day_of_month; $i++) {
                $day = $i . '-' . $thang . '-' . $nam;
                $arr_day = explode('-', $day);
                array_push($data['ngay_trong_thang'], $arr_day);
            }
            foreach ($data['ngay_trong_thang'] as $key => $value) {
                $duonglich = array(
                    'ngayduong' => $value[0],
                    'thangduong' => $value[1],
                    'namduong' => $value[2],
                );
                $data['thapnhibattu'] = $this->lib_xemngay_demo->tinh_thapnhibattu_anhduong($duonglich);
                $data['tonghop'] = array(
                    'ngay' => $duonglich['ngayduong'],
                    'thang' => $duonglich['thangduong'],
                    'nam' => $duonglich['namduong'],
                    'content' => $data['thapnhibattu'],
                );
                array_push($data['total_info'], $data['tonghop']);
            }
            $data['iNamsinh'] = 'canh-ngo';
            $data['iThangxem'] = $thang;
            $data['iNamxem'] = $nam;
        }
        $link = $thang == null ? 'tu-vi-hang-thang' : 'tu-vi-hang-thang/tu-vi-thang-$thangxem-nam-$namxem';
        $param = array(
            'link' => $link,
            'replace' => array('$thangxem' => $thang, '$namxem' => $nam),
        );
        if ($_POST || !empty($thang)) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'T??? vi h??ng th??ng',
                    'slug' => 'tu-vi-hang-thang',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'tu-vi-hang-thang/tu-vi-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'T??? vi',
                    'slug' => 'tu-vi',
                ),
                1 => array(
                    'name' => 'T??? vi h??ng th??ng',
                    'slug' => 'tu-vi-hang-thang',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($param['link']);
        $this->my_seolink->seolink_cst($param);
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        // $data['noindex']    = '<meta name="robots" content="nofollow, noindex" />';
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function canxuongtinhso()
    {
        $canchi_text = '';
        $canchi_slug = '';
        $namsinh = '';
        if ($_POST) {
            $data['gioitinh'] = $_POST['gioitinh'];
            $data['gioitinh_text'] = $data['gioitinh'] == 'nam' ? 'nam' : 'n???';
            $ngaysinh = $_POST['ngaysinh'];
            $thangsinh = $_POST['thangsinh'];
            $namsinh = list_age_text($_POST['namsinh']);
            $giosinh = $_POST['giosinh'];
            $info_user = $this->my_info->get_info_date($ngaysinh, $thangsinh, $namsinh);
            $canchi_slug = $_POST['namsinh'];
            $canchi_text = $info_user['namcanchi'];
            $data['canchi_slug'] = $_POST['namsinh'];
            $data['canchi_text'] = $info_user['namcanchi'];
            $data['namsinh'] = $namsinh;
            $link_slug = 'xem-tu-vi-nam-2018-tuoi-' . $canchi_slug . '-nam-mang-sinh-nam-' . $namsinh;
            $link_id = $this->boituoivochong_model->db->like('slug', $link_slug)->select('*')->get('article')->row_array();
            $link_slug1 = 'xem-tu-vi-tuoi-' . $canchi_slug . '-nam-2018-nu-mang-sinh-nam-' . $namsinh;
            $link_id1 = $this->boituoivochong_model->db->like('slug', $link_slug1)->select('*')->get('article')->row_array();
            $data['send_link'] = $link_slug . '-A' . $link_id['id'] . '.html';
            $data['send_link1'] = $link_slug1 . '-A' . $link_id1['id'] . '.html';
            $camtinh_tuoimenh = $this->boituoivochong_lib->getCamTinhTuoiMenh(array('can' => $info_user['canchinam_text']['can'], 'chi' => $info_user['canchinam_text']['chi']));
            $data['camtinh_tuoimenh'] = $camtinh_tuoimenh;
            // ------------------------ Can xuong tinh so ----------------
            $canXuongNamSinh = $camtinh_tuoimenh['canxuong_namsinh'];   // nam
            $luongChiCanXuongNamSinh = explode(',', $canXuongNamSinh);
            $luongCanXuongNamSinh = $luongChiCanXuongNamSinh[0];
            $chiCanXuongNamSinh = $luongChiCanXuongNamSinh[1];

            $tinhCanLuongThangSinh = tinhCanLuongThangSinh($info_user['amlich'][1]);//thang

            $canLuongThangSinh = explode(',', $tinhCanLuongThangSinh);
            $luongThangSinh = $canLuongThangSinh[0];
            $chiThangSinh = $canLuongThangSinh[1];

            $tinhCanLuongNgaySinh = tinhCanLuongNgaySinh($info_user['amlich'][0]);//ngay
            $canLuongNgaySinh = explode(',', $tinhCanLuongNgaySinh);
            $luongNgaySinh = $canLuongNgaySinh[0];
            $chiNgaySinh = $canLuongNgaySinh[1];


            $tinhCanLuongGioSinh = tinhCanLuongGioSinh($giosinh);// gio
            $canLuongGioSinh = explode(',', $tinhCanLuongGioSinh);
            $luongGioSinh = $canLuongGioSinh[0];
            $chiGioSinh = $canLuongGioSinh[1];


            $total_luongCanXuong = $luongCanXuongNamSinh + $luongThangSinh + $luongNgaySinh + $luongGioSinh;
            $total_chiCanXuong = $chiCanXuongNamSinh + $chiThangSinh + $chiNgaySinh + $luongGioSinh;
            $total_luongCanXuong += (int)($total_chiCanXuong / 10);
            $total_chiCanXuong = ($total_chiCanXuong % 10);
            $data['total_luongCanXuong'] = $total_luongCanXuong;
            $data['total_chiCanXuong'] = $total_chiCanXuong;
            $data['content'] = $this->boituoivochong_model->get_content_canxuongtinhso($total_luongCanXuong, $total_chiCanXuong);

            $data['canchi'] = $canchi_text;
            $sql = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%' . $data['gioitinh_text'] . ' m???ng%" and name like "%2019%"';
            $oneAge = $this->article_model->getQuery($sql);
            $data['oneAge'] = $oneAge;
        }
        $link = 'can-xuong-tinh-so-doi-nguoi';
        $param = array(
            'link' => $link,
            'replace' => array('$canchi_text' => $canchi_text, '$canchi_slug' => $canchi_slug, '$namsinh' => $namsinh,),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($param['link']);
        $breadcrumb = array(
            0 => array(
                'name' => 'T??? vi',
                'slug' => 'tu-vi',
            ),
            1 => array(
                'name' => 'C??n x????ng t??nh s???',
                'slug' => 'can-xuong-tinh-so-doi-nguoi',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        // $data['noindex']    = '<meta name="robots" content="nofollow, noindex" />';
        $this->load->view($this->view, $data);
    }

    private function get_lichngay($ngayduong = null, $thangduong = null, $namduong = null)
    {
        $this->lich->set_ngayduong((int)$ngayduong, (int)$thangduong, (int)$namduong);
        $lich['ngayduong'] = $this->lich->get_ngayduong();
        $lich['thangduong'] = $this->lich->get_thangduong();
        $lich['namduong'] = $this->lich->get_namduong();
        $lich['ngayam'] = $this->lich->get_ngayam();
        $lich['thangam'] = $this->lich->get_thangam();
        $lich['namam'] = $this->lich->get_namam();
        $lich['ngaycanchi'] = $this->lich->get_ngaycan() . ' ' . $this->lich->get_ngaychi();
        $lich['thangcanchi'] = $this->lich->get_thangcan() . ' ' . $this->lich->get_thangchi();
        $lich['namcanchi'] = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
        $lich['thu'] = $this->lich->get_thu();
        $lich['ngayhoangdao'] = $this->lich->get_ngayhoangdao();
        $lich['truc'] = $this->lich->get_trucngay();
        $lich['nguhanh'] = $this->lich->get_nguhanh();
        $lich['giohoangdao'] = $this->lich->get_giohoangdao();
        $lich['ngaytiep'] = $this->lich->get_ngaythangnamtiep();
        $lich['thangtiep'] = $this->lich->get_thangnamtiep();
        $lich['ngaytruoc'] = $this->lich->get_ngaythangnamtruoc();
        $lich['thangtruoc'] = $this->lich->get_thangnamtruoc();
        return $lich;
    }

    private function get_lichthang($ngay = 1, $thang = null, $nam = null)
    {
        $thang = $thang == null ? date('n', time()) : $thang;
        $nam = $nam == null ? date('Y', time()) : $nam;
        $time = strtotime($thang . '/' . $ngay . '/' . $nam);
        $songaytrongthang = date('t', $time);
        $ngaydau = date('N', $time);
        $html = '<div class="banglichthang_tt ' . 'thang' . $thang . '"><span>T2</span><span>T3</span><span>T4</span><span>T5</span><span>T6</span><span>T7</span><span>CN</span></div>';
        $html .= '<div class="banglichthang_ct">';
        $j = 0;
        for ($i = 1; $i < $songaytrongthang + $ngaydau; $i++) {
            if ($i >= $ngaydau) $j++;
            if ($j > 0) {
                $ngay = $this->get_lichngay($j, $thang, $nam);
                $link_ngay = base_url('xem-ngay-tot-xau/ngay-' . $ngay['ngayduong'] . '-thang-' . $ngay['thangduong'] . '-nam-' . $ngay['namduong'] . '.html');
                // x??? l?? ki???m tra n???u ng??y l?? th??? 7 th?? ch??? m??u xanh, ch??? nh???t th?? ch??? m??u ?????
                $ngay_thu = trim($ngay['thu']);
                if ($ngay_thu == 'Th??? b???y')
                    $class_gr = 'text-success';
                elseif ($ngay_thu == 'Ch??? nh???t')
                    $class_gr = 'text-danger';
                else
                    $class_gr = '';
                $ngay_duong = '<span class="sp_nd ' . $class_gr . '">' . $ngay['ngayduong'] . '</span>';
                //end xu li
                $li_ngayduong = $ngay['ngayduong'] . '/' . $ngay['thangduong'] . '/' . $ngay['namduong'] . '(' . $ngay['thu'] . ')';
                $li_ngayam = $ngay['ngayam'] . '/' . $ngay['thangam'] . '/' . $ngay['namam'];
                $li_canchi = 'Ng??y:' . $ngay['ngaycanchi'] . ' Th??ng: ' . $ngay['thangcanchi'] . ' N??m:' . $ngay['namcanchi'];
                $class_yellow = $ngay['ngayduong'] == date('j') && $ngay['thangduong'] == date('n') && $ngay['namduong'] == date('Y') ? 'dayok' : '';

                // Ktra ng??y n???u l?? 1,2,3 ??m l???ch th?? hi???n ngay/thang
                if ($ngay['ngayam'] == 1 || $ngay['ngayam'] == 2 || $ngay['ngayam'] == 3) {
                    $ktra_ngay = $ngay['ngayam'] . '/' . $ngay['thangam'];
                    $class_red = 'text-red';
                } else {
                    $ktra_ngay = $ngay['ngayam'];
                    $class_red = '';
                }
                // end ki???m tra
                $class_star = trim($ngay['ngayhoangdao']) == 'Ho??ng ?????o' ? 'text-yellow' : 'text-black';
                $star = '<span class="' . $class_star . '"><span class="glyphicon glyphicon-star st"></span></span>';
                $html .= '<div class="lt_item ' . $class_yellow . '"><a href="' . $link_ngay . '">' . $ngay_duong . '<span class="sp_ngayam ' . $class_red . '">' . $ktra_ngay . '</span>' . $star . '</a><ul>';
                $html .= '<li><label>D????ng l???ch:</label><b>' . $li_ngayduong . '</b></li>';
                $html .= '<li><label>??m l???ch:</label><b>' . $li_ngayam . '</b></li>';
                $html .= '<li><label>B??t t???:</label><b>' . $li_canchi . '</b></li>';
                $html .= '<li><label>L?? ng??y:</label><b>' . $ngay['ngayhoangdao'] . '</b></li>';
                $html .= '<li><label></label></li>';
                $html .= '</ul></div>';
            } else {
                $html .= '<div class="lt_item"></div>';
            }
        }
        $html .= '</div>';
        return $html;
    }
}