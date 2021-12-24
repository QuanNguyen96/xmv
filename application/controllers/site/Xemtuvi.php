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
            $this->form_validation->set_rules('hovaten', 'Họ tên', 'required');
            $this->form_validation->set_rules('gioitinh', 'Giới tính', 'required');
            $this->form_validation->set_rules('ngay', 'Ngày sinh', 'required');
            $this->form_validation->set_rules('thang', 'Tháng sinh', 'required');
            $this->form_validation->set_rules('nam', 'Năm sinh', 'required');
            $this->form_validation->set_rules('gio', 'Giờ sinh', 'required');
            $this->form_validation->set_rules('namxem', 'Năm', 'required');
            $this->form_validation->set_message('required', '<label>{field}</label> vui lòng chọn và không để trống !');
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
                    if ($value['cung'] == 'Mệnh viên') {
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
            $data['gioitinh'] = $gioitinh = $input['gioitinh'] == 1 ? 'nam' : 'nữ';
            $data['sluggioitinh'] = $input['gioitinh'] == 1 ? 'nam' : 'nu';
            $arr_like = array(
                'name' => $namsinh,
                'name' => $gioitinh,
                'name' => 2018,
            );
            $data['gioitinh_text'] = $input['gioitinh'] == 1 ? 'nam' : 'nữ';
            $sql = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%' . $gioitinh . ' mạng%" and name like "%2019%"';
            $oneAge = $this->article_model->getQuery($sql);
            $data['oneAge'] = $oneAge;

            /** Config la so **/
            $data['contentAfterCung'] = $contentAfterCung = array(
                '1' => 'Mệnh viên',
                '2' => 'Phụ mẫu',
                '3' => '<p><span class="btn_nhaynhay"></span>Để đời người luôn hoan hỷ, giảm bớt u sầu thì trước mỗi công việc hay biến cố quý bạn nên thành tâm xin quẻ <b><a href="' . base_url('quan-am-linh-xam.html') . '">Quan âm Linh Xám</a></b>. Quẻ này giúp quý bạn luôn vững tâm lấy an ổn vinh hoa làm vốn quý trong cuộc sống đầy duyên nghiệp này.</p>',
                '4' => '<p><span class="btn_nhaynhay"></span>Điền trạch có sao hỷ tất thảy gia cảnh yên ổn, nhàn hạ, có không vong thì tán gia bại sản, có thái tuế phá phá toái. Vì lẽ đó, khi muốn gia tăng điền sản cần thiết <b><a href="' . base_url('xem-tuoi-mua-nha.html') . '">Xem tuổi mua nhà</a></b> kết hợp quan sát kỹ lưỡng những yếu tố cát hung của bất động sản đó mới mong có cuộc sống an lành, công việc, tiền tài như ý.</p>',
                '5' => '<p><span class="btn_nhaynhay"></span>Phận giàu hay nghèo vốn đã được định sẵn ngay từ khi chào đời. Ấy vậy mà “Nhân định sẽ thắng Thiên”. Bởi lẽ đó, con người dùng <b><a href="' . base_url('xem-boi-so-dien-thoai.html') . '">Sim Phong Thủy hợp tuổi</a></b> đổi vận của chính mình. Sim hợp tuổi kích công danh, thúc đẩy sự nghiệp giúp công danh sự nghiệp đang thăng thì càng thăng như diều gặp gió. Còn nếu trì trệ sẽ đón nhiều cơ hội và may mắn hơn.</p>
                                            <p><span class="btn_nhaynhay"></span>Công Danh, Học Tập và Nghề Nghiệp của con người thay đổi ở mỗi thời điểm. Có lúc thăng, cũng có lúc trầm. Điều này được thể hiện rất rõ trong lá số tử vi của quý bạn. Vận số là vậy nhưng chúng ta có thể cải biến bằng cách sử dụng <b><a href="' . base_url('xem-mau-hop-menh/menh-' . $this->vnkey->format_key($info_user['lucthap']['he']) . '-hop-mau-gi.html') . '">màu hợp mệnh ' . $info_user['lucthap']['he'] . '</a>.</b> Tận dụng màu sắc hợp mệnh vạn việc công danh sự nghiệp của bạn sẽ có cơ hội gặp dữ hóa lành, hung hiểm hóa hanh cát.</p>',
                '6' => 'Nô bộc',
                '7' => '<p><span class="btn_nhaynhay"></span>Nếu cung Thiên Di cho biết được tốt xấu trong việc đối nội, đối ngoại, kết quả của những chuyến đi xa thì quý bạn hoàn toàn có thể chủ động thay đổi được kết quả công việc này bằng cách <b><a href="' . base_url('xem-ngay-tot-xuat-hanh.html') . '">Xem ngày xuất hành hợp tuổi ' . $canchi . '</a></b>. Chọn được ngày xuất hành tốt âu vạn sự ắt được hanh thông, thuận lợi.</p>',
                '8' => '<p><span class="btn_nhaynhay"></span>Cung Tật Ách đã luận giải cho quý bạn biết về thân thể, sức khỏe và bệnh tật trong cuộc sống của mình. Để biết được những điều này một cách chi tiết nhất theo từng nằm thì quý bạn cần <b><a href="' . base_url('xem-han-tu-vi.html') . '">Xem vận hạn theo tuổi</a></b> của mình. Tất cả những điều tốt, xấu trong một năm sẽ hiện hữu giúp quý bạn nắm bắt được tất cả vận hạn của mình.</p>',
                '9' => '<p><span class="btn_nhaynhay"></span>Tiền tài, kinh doanh của quý bạn may hay khó đều được thể hiện rất rõ trong lá số tử vi. Nếu muốn kích tài vận trọn đời, quý bạn cần chọn <b><a href="' . base_url('xem-tuoi-lam-an/tuoi-' . $this->vnkey->format_key($canchi) . '-sinh-nam-' . $namsinh . '-hop-lam-an-voi-tuoi-nao.html') . '">tuổi ' . $canchi . ' hợp làm ăn với tuổi nào</a></b>? Yếu tố này đóng vai trò vô cùng to lớn đến thành - bại trong việc làm ăn của quý bạn.</p>',
                '10' => '<p><span class="btn_nhaynhay"></span>Trong mối quan hệ giữa bố mẹ và con cái có khi thuận, khi nghịch. Đừng bỏ qua <b><a href="' . base_url('xem-tuoi-sinh-con.html') . '">Xem Tuổi Sinh Con</a></b> hợp tuổi bố mẹ để cuộc sống gia đình luôn thuận hòa, tương lai của con cái theo đó cũng được hưởng hạnh phúc viên mãn trọn đời.</p>',
                '11' => '<p><span class="btn_nhaynhay"></span>Thông qua luận giải lá số tử vi thì quý bạn đã biết được đời sống hôn nhân của mình rồi. Còn muốn biết cụ thể xem vợ chồng mình hợp - khắc ở điểm nào thì mời quý bạn  tham khảo tại <b><a href="' . base_url('xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html') . '">Xem tuổi vợ chồng</a></b>.</p>',
                '12' => '<p><span class="btn_nhaynhay"></span>Tất cả mọi điều, mọi vấn đế về mối quan hệ anh chị em, mối quan hệ bạn bè cũng như mối quan hệ hợp tác của quý bạn đã được luận giải tại cung Huynh Đệ của lá số tử vi. Thế nhưng để biết chi tiết mình hợp - khắc với mọi người ở những điểm nào thì quý bạn cần <b><a href="' . base_url('xem-tuoi-hop-nhau/tuoi-' . $this->vnkey->format_key($canchi) . '-sinh-nam-' . $namsinh . '-hop-voi-tuoi-nao.html') . '">Xem Tuổi ' . $canchi . ' hợp với tuổi nào</a></b>? (. Đây sẽ là tiền đề để quý bạn xây dựng nên tình bạn, tình anh em luôn gắn kết, bền lâu.</p>'
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
                'name' => 'Tử vi',
                'slug' => 'tu-vi',
            ),
            1 => array(
                'name' => 'Lá số tử vi',
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

    // Trương Đình Tuyển
    // create date : 25/12/2017
    // Sửa theo yêu cầu của Trang SEO vs 13 công cụ
    public function xemtuvitrondoi($canchi = null)
    {
        $canchi_slug = '';
        $namsinh = '';
        $gioitinh = '';
        $chi = '';
        $link_loai = '';
        $arr_menh = array(
            'Kim' => 'kim',
            'Mộc' => 'moc',
            'Thủy' => 'thuy',
            'Hỏa' => 'hoa',
            'Thổ' => 'tho',
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
            $gioitinh = $data['gioitinh'] == 'nam' ? 'Nam' : 'Nữ';
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

            $sql = 'select * from article where name like "%' . $namsinh . '%" and name like "%' . $data['gioitinh_text'] . ' mạng %" and name like "%2019%"';
            $oneAge = $this->article_model->getQuery($sql);
            $data['oneAge'] = $oneAge;

            $sql_nam = 'select * from article where name like "%' . $info_user['nam_sinh'] . '%" and name like "%nam mạng%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_user['nam_sinh'] . '%" and name like "%nữ mạng%" and name like "%2019%"';
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
                    'name' => 'Tử vi trọn đời',
                    'slug' => 'xem-tu-vi-tron-doi',
                ),
                1 => array(
                    'name' => 'Tuổi ' . $canchi,
                    'slug' => 'xem-tu-vi-tron-doi/tu-vi-tron-doi-tuoi-' . $canchi_slug,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Tử vi',
                    'slug' => 'tu-vi',
                ),
                1 => array(
                    'name' => 'Tử vi trọn đời',
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
            'La Hầu' => 'Sao La Hầu cũng có thể xem là Hung Tinh. La Hầu thường mang tới cho gia chủ nỗi buồn lo, tai nạn, tang sự, hoặc những điều thị phi trong cuộc sống,... Cũng bởi sao La Hầu thuộc mạng Mộc, thế cho nên những người thuộc mạng Mộc và Kim sẽ chịu ảnh hưởng nhiều hơn so với những người khác. Tuy nhiên, với những đàn ông có vợ đang hoài thai mà được La Hầu chiếu mạng thì lại gặp được nhiều may mắn, tài lộc trong làm ăn, người vợ thì sẽ được "mẹ tròn con vuông". <br> <p><span class="btn_nhaynhay"></span><b>Cách cúng <a href="https://xemvanmenh.net/sao-la-hau-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A340.html">Sao La Hầu</a> để giải hạn năm 2018</b></p>',

            'Thổ Tú' => 'Sao Thổ Tú rất hợp cho những người thuộc mệnh Thổ, bao gồm cả đàn ông và đàn bà. Thế nhưng, ai gặp sao Thổ Tú chiếu mệnh thì trong tâm luôn có nỗi buồn man mác, làm cho gia chủ không kiên định trong mọi việc, đặc biệt là việc làm ăn, luôn hoài nghi mọi điều và không hăng hái trong bất cứ việc gì, tuy nhiên không gặp phải tai họa gì. Đặc biệt: người già cả gặp Thổ Tú chiếu mệnh, nếu gặp phải bệnh tật thì khó mà khỏe mạnh được. <br> <p><span class="btn_nhaynhay"></span><b><a href="https://xemvanmenh.net/sao-tho-tu-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A335.html">Sao Thổ Tú</a> là gì? cách giải hạn Sao Thổ Tú</b></p>',

            'Thủy Diệu' => 'Sao Thủy Diệu hợp nhất với những người thuộc mệnh Kim và Mộc. Thủy Diệu thường mang tới những điều may mắn và bất ngờ trong làm ăn, buôn bán cho gia chủ. Phụ nữ mang thai mà được sao này chiếu mạng thì sẽ được bình an và gặp nhiều điều tốt. Đối với người mệnh Hỏa: do Thủy khắc họ nên sẽ gặp đôi chút trở ngại, nhưng do Sao Thủy Diệu không phải là Hung Tinh nên cũng không gì đáng lo. <br> <p><span class="btn_nhaynhay"></span><b>Xem chi tiết <a href="https://xemvanmenh.net/sao-thuy-dieu-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A334.html">Sao Thủy Diệu</a> năm 2018</b></p>',

            'Thái Bạch' => 'Sao Thái Bạch hung tợn hơn so với sao La Hầu, sao này là đại kỵ với những người thuộc mệnh Hỏa, Kim và Mộc. Khi bị Thái Bạch chiếu mạng đã có rất nhiều người gặp điều thị phi, mất chức, tai nạn, tù tội,... Đồng thời việc xây nhà, làm nhà trong năm có sao Thái Bạch chiếu mạng cũng sẽ không được tốt. Nếu như ai ăn ở bị mất phần âm đức, khi gặp Thái Bạch chiếu mạng sẽ gặp phải họa hoạn. <br> <p><span class="btn_nhaynhay"></span><b>Cách giải hạn <a href="https://xemvanmenh.net/sao-thai-bach-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A337.html">Sao Thái Bạch</a> đầu năm và cúng sao hàng tháng</b></p>',

            'Thái Dương' => 'Sao Thái Dương là một phước tinh của nam giới. Khi được Thái Dương chiếu mạng thì gia chủ sẽ gặp được nhiều may mắn trong làm ăn, buôn bán, thăng quan, tiến chức, đặc biệt là vào hai tháng 6 và 10 sẽ là tháng Đại Kiết. Nữ giới mà được Thái Dương chiếu mạng cũng sẽ gặp được nhiều sự hân hoan, được mọi người giúp đỡ về tiền bạc hoặc việc làm ăn sẽ gặp nhiều thuận lợi. Với phụ nữ mang thai thì sẽ gặp được bình an, đứa trẻ ra đời được khỏe mạnh, giỏi giang. Với những cô gái chưa lập gia đình, nếu được sao này chiếu mạng thì có thể sẽ cưới chồng trong năm đó. Người già cả trên 60, 70 tuổi gặp Thái Dương chiếu mạng nếu đau ốm cũng sẽ mau khỏi. <br> <p><span class="btn_nhaynhay"></span><b>Cách cúng <a href="https://xemvanmenh.net/sao-thuy-dieu-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A334.html">Sao Thái Dương</a> để rước tài lộc về với gia chủ</b></p>',

            'Vân Hớn' => 'Sao Vân Hớn vốn hiền lành, dù đàn ông hay đàn bà nếu gặp Vân Hớn chiếu mạng thì mọi việc cũng bình thường, không có gì nổi bật, chỉ kỵ về khẩu thiệt vào các tháng 2 và 8. <br> <p><span class="btn_nhaynhay"></span><b> Cách cúng <a href="https://xemvanmenh.net/sao-van-hon-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A333.html">Sao Vân Hớn</a> để đón tài lộc, bình an và may mắn cho năm 2018</b></p>',

            'Kế Đô' => 'Sao Kế Đô là một Hung Tinh cho cả nam và nữ, sao này sẽ mang đến sự buồn khổ và chán nản. Những người đàn ông mê gái, nếu gặp Kế Đô chiếu mạng thì sẽ bị phụ nữ làm nhục. Tuy nhiên, phụ nữ mạng thai mà được sao này chiếu mạng thì lại gặp được điều may mắn, đồng thời cái may này còn ảnh hưởng cho cả người chồng nữa, khi sinh sản thì cũng được yên lành. Thế nhưng nếu không hoài thai thì phụ nữ sẽ gặp nhiều lao đao, lận đận, việc làm ăn thì gặp nhiều trở ngại. <br> <p><span class="btn_nhaynhay"></span><b> Những điều chưa biết về <a href="https://xemvanmenh.net/sao-la-hau-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A340.html">Sao Kế Đô</a> chiếu mạng năm 2018</b></p>',

            'Thái Âm' => 'Sao Thái Âm thường mang tới cho người phụ nữ sự điều hòa, luôn vui vẻ, hạnh phúc, có tiền tài và được thỏa mãn những ước mơ của mình. Phụ nữ mà đang thai nghén mà được Thái Âm chiếu mạng, nếu sinh con giá thì sẽ nết na, thùy mị, nghiêm trang, duyên dáng và sau này sẽ thành một thiếu nữ kiều diễm, có thể trở nên một trang quốc sắc thiên hương. Còn nếu sinh con trai thì đây sẽ là một chàng trai đa cảm, ít nói, hiền lành, yêu thích các môn khoa học và sau này có thể trở thành nhà triết học, tu sỹ hay nhà toán học. Nếu nam giới được Thái Âm chiếu mạng thì sẽ được bạn bè là nữ giới giúp đỡ, đặc biệt là về tiền bạc, thế nên sao Thái Âm còn được gọi là tài tinh. Với những người chưa lập gia đình thì có thể gặp được tình duyên kỳ ngộ hoặc sẽ lập gia đình trong năm này. <br> <p><span class="btn_nhaynhay"></span><b>Click để xem chi tiết về <a href="https://xemvanmenh.net/sao-thai-am-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A338.html">Sao Thái Âm</a></b></p>',

            'Mộc Đức' => 'Sao Mộc Đức chính là phước tinh cho cả nam và nữ. Những người được Mộc Đức chiếu mạng sẽ gặp nhiều may mắn, có sự phát triển trong công danh, sự nghiệp, được quý nhân giúp đỡ, thi cử đỗ đạt, làm ăn phát đạt mà làm nhà cũng tốt. Phụ nữ hoài thai mà có Mộc Đức chiếu mạng thì đứa trẻ khi ra đời sẽ là người quả quyết, cương nghị, điềm tĩnh và nhẫn nại, sau này sẽ được nổi danh với đời. <br> <p><span class="btn_nhaynhay"></span><b><a href="https://xemvanmenh.net/sao-moc-duc-la-gi-tot-hay-xau-va-cach-cung-sao-giai-han-A339.html">Sao Mộc Đức</a> và những điều cần biết</b></p>',
        );
        $mang_content_han = array(
            'Huỳnh Tuyền' => 'Gia chủ gặp hạn Huỳnh Tuyền sẽ gặp chứng đau đầu, xây xẩm mặt mày. Không nên mưu lợi, làm ăn theo đường thủy, đồng thời không nên bảo chứng cho bất kỳ ai kẻo sinh điều bất lợi. <br> <p><span class="btn_nhaynhay"></span><b>Phương pháp giải <a href="https://xemvanmenh.net/han-huynh-tuyen-la-gi-va-cach-giai-han-A326.html">Hạn Huỳnh Tuyền</a> để đón tài lộc và sức khỏe</b></p>',

            'Tam Kheo' => 'Gia chủ gặp phải hạn Tam Kheo cần đề phòng đau chân tay, chứng phong thấp hay lo lắng, buồn lo cho người thân yêu. Quý bạn không nên tụ họp ở những nơi đông người. Cần tránh khiêu khích và luôn nhẫn nhịn. Quý bạn cũng cần để phong thương tích về tay, chân và ngăn ngừa, giữ ghìn củi lửa. <br> <p><span class="btn_nhaynhay"></span><b> Phương pháp giải <a href="https://xemvanmenh.net/han-tam-kheo-la-gi-va-cach-giai-han-A328.html">Hạn Tam Kheo</a> và những điều cần biết</b></p>',

            'Ngũ Mộ' => 'Gia chủ gặp hạn Ngũ Mộ sẽ hao tài và bất an. Quý bạn không nên mua đồ lậu và đừng nên cho ai ngủ nhờ, kẻo gặp tai bay vạ gió. Cần phòng tài hao của mất, tránh mua những đồ không có hóa đơn. <br> <p><span class="btn_nhaynhay"></span><b>Những điều cần biết về <a href="https://xemvanmenh.net/han-ngu-mo-la-gi-va-cach-giai-han-A327.html">Hạn Ngũ Mộ</a> năm 2018</b></p>',

            'Thiên Tinh' => 'Gia chủ gặp hạn Thiên Tinh cần đề phòng ngộ độc, nếu đang hoài thai chớ lấy đồ trên cao kẻo bị té ngã trụy thai, nguy hiểm, đồng thời cũng phải phòng ngộ độc khi ăn uống. Gặp đau ốm, bệnh tật thì nên thành tâm cầu Phật với nhanh qua khỏi. <br> <p><span class="btn_nhaynhay"></span><b>Cách phòng <a href="https://xemvanmenh.net/han-thien-tinh-la-gi-va-cach-giai-han-A330.html">Hạn Thiên Tinh</a> để được bình an và dồi dào sức khỏe</b></p>',

            'Toán Tận' => 'Gia chủ gặp hạn Toán Tận dễ hao tài, ngộ trúng. Nếu đi đường mà mang theo nhiều tiền hoặc đồ trang sức dễ bị cướp giật và nguy hiểm đến tính mạng. Quý bạn chớ nên hùn hạp hay khai thác lâm sản, ắt bị tai nạn lâm nguy. <br> <p><span class="btn_nhaynhay"></span><b>Phương pháp giải <a href="https://xemvanmenh.net/han-toan-tan-la-gi-va-cach-giai-han-A331.html">Hạn Thiên Tinh</a> năm 2018</b></p>',

            'Thiên La' => 'Gia chủ gặp hạn Thiên La cần đề phòng cảnh vợ chồng ly cách, nên nhẫn nhịn để tránh gặp phải điều đó. Không nên ghen tuông gắt gỏng khiến cho chuyện bé xé ra to. <br> <p><span class="btn_nhaynhay"></span><b>Xem chi tiết <a href="https://xemvanmenh.net/han-thien-la-la-gi-va-cach-giai-han-A329.html">Hạn Thiên La</a> tốt hay xấu trong năm 2018</b></p>',

            'Địa Võng' => 'Gia chủ gặp hạn Địa Võng thì kỵ đi với ai khi trời tối, đồng thời chớ cho ai ngủ trọ và tránh nên mua đồ quốc cầm, đồ lậu. <br> <p><span class="btn_nhaynhay"></span><b>Muốn giải <a href="https://xemvanmenh.net/han-diem-vuong-la-gi-va-tot-hay-xau-nhu-the-nao-A323.html">Hạn Địa Võng</a> thì phải làm sao?</b></p>',

            'Diêm Vương' => 'Gia chủ gặp hạn Diêm Vương nếu bị đau lâu ắt sẽ khó thoát, thế nhưng về mưu sinh thì tốt, gặp nhiều tài lộc và vui vẻ. <br> <p><span class="btn_nhaynhay"></span><b><a href="https://xemvanmenh.net/han-diem-vuong-la-gi-va-tot-hay-xau-nhu-the-nao-A323.html">Hạn Diêm Vương</a> là gì và cách giải hạn cho năm 2018</b></p>',
        );
        $mang_han_nam = array(
            'Huỳnh Tuyền' => array(10, 18, 27, 36, 45, 54, 63, 72, 81),
            'Tam Kheo' => array(11, 19, 20, 28, 37, 46, 55, 64, 73, 82),
            'Ngũ Mộ' => array(12, 21, 29, 30, 38, 47, 56, 65, 74, 83),
            'Thiên Tinh' => array(13, 22, 31, 39, 40, 48, 57, 66, 75, 84),
            'Toán Tận' => array(14, 23, 32, 41, 49, 50, 58, 67, 76, 85),
            'Thiên La' => array(15, 24, 33, 42, 51, 59, 60, 68, 77, 86),
            'Địa Võng' => array(16, 25, 34, 43, 52, 61, 69, 70, 17, 87),
            'Diêm Vương' => array(17, 26, 35, 44, 53, 62, 71, 79, 80, 88),
        );
        $mang_han_nu = array(
            'Toán Tận' => array(10, 18, 27, 36, 45, 54, 63, 72, 81),
            'Thiên Tinh' => array(11, 19, 20, 28, 37, 46, 55, 64, 73, 82),
            'Ngũ Mộ' => array(12, 21, 29, 30, 38, 47, 56, 65, 74, 83),
            'Tam Kheo' => array(13, 22, 31, 39, 40, 48, 57, 66, 75, 84),
            'Huỳnh Tuyền' => array(14, 23, 32, 41, 49, 50, 58, 67, 76, 85),
            'Diêm Vương' => array(15, 24, 33, 42, 51, 59, 60, 68, 77, 86),
            'Địa Võng' => array(16, 25, 34, 43, 52, 61, 69, 70, 17, 87),
            'Thiên La' => array(17, 26, 35, 44, 53, 62, 71, 79, 80, 88),
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
            $data['gioitinh_text'] = $gioitinh == 'nam' ? 'Nam' : 'Nữ';
            $data['gioitinh_slug'] = $gioitinh;
            $tuoi = date('Y') - $nam + 1;
            $data['tuoi'] = $tuoi;
            if ($gioitinh == 'nam') {
                switch ($tuoi % 9) {
                    case '0':
                        $saochieumenh = 'Mộc Đức';
                        break;
                    case '1':
                        $saochieumenh = 'La Hầu';
                        break;
                    case '2':
                        $saochieumenh = 'Thổ Tú';
                        break;
                    case '3':
                        $saochieumenh = 'Thủy Diệu';
                        break;
                    case '4':
                        $saochieumenh = 'Thái Bạch';
                        break;
                    case '5':
                        $saochieumenh = 'Thái Dương';
                        break;
                    case '6':
                        $saochieumenh = 'Vân Hớn';
                        break;
                    case '7':
                        $saochieumenh = 'Kế Đô';
                        break;
                    case '8':
                        $saochieumenh = 'Thái Âm';
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
                        $saochieumenh = 'Thủy Diệu';
                        break;
                    case '1':
                        $saochieumenh = 'Kế Đô';
                        break;
                    case '2':
                        $saochieumenh = 'Vân Hớn';
                        break;
                    case '3':
                        $saochieumenh = 'Mộc Đức';
                        break;
                    case '4':
                        $saochieumenh = 'Thái Âm';
                        break;
                    case '5':
                        $saochieumenh = 'Thổ Tú';
                        break;
                    case '6':
                        $saochieumenh = 'La Hầu';
                        break;
                    case '7':
                        $saochieumenh = 'Thái Dương';
                        break;
                    case '8':
                        $saochieumenh = 'Thái Bạch';
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
                $data['phamkimlau'] = 'Kim lâu';
                $luangiai_pham_check = false;
                $luangiai_pham .= '' . $get_kimlau['name'] . '-' . $get_kimlau['content'] . '<br>';
            }
            if (!empty($get_tamtai)) {
                $data['phamtamtai'] = 'Tam tai';
                $luangiai_pham_check = false;
                $luangiai_pham .= '- <b>Tam tai<b/> chớ có làm nhà!';
            }
            if (!empty($get_thaitue)) {
                $data['phamthaitue'] = 'Thái tuế';
                $luangiai_pham_check = false;
                $luangiai_pham .= '- <b>Thái Tuế</b> chớ có làm nhà!';
            }
            if (!empty($get_hoangoc)) {
                if ($get_hoangoc['is_hoangoc'] == 1) {
                    $data['phamhoangoc'] = 'Hoang ốc';
                    $luangiai_pham_check = false;
                    $luangiai_pham .= '' . $get_hoangoc['content'] . '-' . $get_hoangoc['translate'];
                }
            }
            if (!$luangiai_pham_check) {
                $pham_content = '<br><b class="text-danger">Năm này phạm phải:</b> <br>';
                $pham_content .= '<p>' . '<b>- ' . $luangiai_pham . '</b>' . '</p>';
            } else {
                $pham_content = 'Năm này tốt hợp với bạn có thể xây sửa nhà !';
            }
            $data['pham_content'] = $pham_content;
            // luan giai ket hon
            $luangiai_kethon = '';
            $luangiai_pham_kethon = '';   // neu pham phai string
            $luangiai_pham_check_kethon = true;
            // if(!empty($get_tamtai)){
            //     $luangiai_pham_check_kethon = false;
            //     $luangiai_pham_kethon .= 'Tuổi này phạm phải Tam tai chớ có kết hôn!';
            // }
            // if(!empty($get_thaitue)){
            //     $luangiai_pham_check_kethon = false;
            //     $luangiai_pham_kethon .= 'Tuổi này phạm phải cung Thái Tuế chớ có kết hôn!';
            // }
            // if (!$luangiai_pham_check_kethon) {
            //     $pham_content_kethon   = 'Nam này phạm phải: <br>';
            //     $pham_content_kethon   .= '<p>'.$luangiai_pham_kethon.'</p>';
            // }
            // else{
            //     $pham_content_kethon   = 'Năm này tốt hợp với bạn có thể kết hôn !';
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

            $sql = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%' . strtolower($data['gioitinh_text']) . ' mạng%" and name like "%2019%"';
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
                'name' => 'Tử vi',
                'slug' => 'tu-vi',
            ),
            1 => array(
                'name' => 'Vận hạn tử vi',
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
    //             '0' => 'Giáp',
    //             '1' => 'Ất',
    //             '2' => 'Bính',
    //             '3' => 'Đinh',
    //             '4' => 'Mậu',
    //             '5' => 'Kỷ',
    //             '6' => 'Canh',
    //             '7' => 'Tân',
    //             '8' => 'Nhâm',
    //             '9' => 'Quý',
    //         );
    //         // Mảng chi
    //         $arr_chi = array(
    //             '0'     => 'Tí',
    //             '1'     => 'Sửu',
    //             '2'     => 'Dần',
    //             '3'     => 'Mão',
    //             '4'     => 'Thìn',
    //             '5'     => 'Tỵ',
    //             '6'     => 'Ngọ',
    //             '7'     => 'Mùi',
    //             '8'     => 'Thân',
    //             '9'     => 'Dậu',
    //             '10'    => 'Tuất',
    //             '11'    => 'Hợi',
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
    //                 'name' => 'Tử vi hàng ngày',
    //                 'slug' => 'tu-vi-hang-ngay',
    //             ),
    //             1 => array(
    //                 'name' => 'Ngày '.$ngay.'/'.$thang.'/'.$nam,
    //                 'slug' => 'tu-vi-hang-ngay/tu-vi-ngay-'.$ngay.'-thang-'.$thang.'-nam-'.$nam,
    //             ),
    //         );
    //     }else{
    //         $breadcrumb = array(
    //             0 => array(
    //                 'name' => 'Tử vi',
    //                 'slug' => 'tu-vi',
    //             ),
    //             1 => array(
    //                 'name' => 'Tử vi hàng ngày',
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
            1 => array('name' => 'tuổi Tý', 'start' => 1960),
            2 => array('name' => 'tuổi Sửu', 'start' => 1961),
            3 => array('name' => 'tuổi Dần', 'start' => 1962),
            4 => array('name' => 'tuổi Mão', 'start' => 1963),
            5 => array('name' => 'tuổi Thìn', 'start' => 1952),
            6 => array('name' => 'tuổi Tỵ', 'start' => 1953),
            7 => array('name' => 'tuổi Ngọ', 'start' => 1954),
            8 => array('name' => 'tuổi Mùi', 'start' => 1955),
            9 => array('name' => 'tuổi Thân', 'start' => 1956),
            10 => array('name' => 'tuổi Dậu', 'start' => 1957),
            11 => array('name' => 'tuổi Tuất', 'start' => 1958),
            12 => array('name' => 'tuổi Hợi', 'start' => 1959),
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
                    'name' => 'Tử vi hàng ngày',
                    'slug' => 'tu-vi-hang-ngay',
                ),
                1 => array(
                    'name' => 'Ngày ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'tu-vi-hang-ngay/tu-vi-ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Tử vi',
                    'slug' => 'tu-vi',
                ),
                1 => array(
                    'name' => 'Tử vi hàng ngày',
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
            // ý nghĩa quẻ
            $y_nghia_que = isset($list_que[$value['que_id']]['y_nghia'][$value['que_y_nghia']]) ? $list_que[$value['que_id']]['y_nghia'][$value['que_y_nghia']] : '';
            $que_y_nghia[$key] = $y_nghia_que;
            // ý nghĩa quan hệ
            $arr_quan_he = unserialize($value['quan_he']);

            foreach ($arr_quan_he as $key1 => $value1) {
                $arr_quan_he_y_nghia = $list_quan_he[$value1['nhom_quan_he_id']]['y_nghia'][$value1['y_nghia_id']];
            }
            $y_nghia_quan_he[$key] = $arr_quan_he_y_nghia;
            // ý nghĩa ngũ hành
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
                    'name' => 'Tử vi hàng ngày',
                    'slug' => 'tu-vi-hang-ngay',
                ),
                1 => array(
                    'name' => 'Ngày ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'tu-vi-hang-ngay/tu-vi-ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Tử vi',
                    'slug' => 'tu-vi',
                ),
                1 => array(
                    'name' => 'Tử vi hàng ngày',
                    'slug' => 'tu-vi-hang-ngay',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        //$link = $nam == null?'tu-vi-hang-ngay':'tu-vi-hang-ngay/tu-vi-ngay-$ngayxem-thang-$thangxem-nam-$namxem';
        $con_giap = array(

            'ty' => 'Tý',

            'suu' => 'Sửu',

            'dan' => 'Dần',

            'mao' => 'Mão',

            'thin' => 'Thìn',

            'ti' => 'Tỵ',

            'ngo' => 'Ngọ',

            'mui' => 'Mùi',

            'than' => 'Thân',

            'dau' => 'Dậu',

            'tuat' => 'Tuất',

            'hoi' => 'Hợi'

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
                'name' => 'Tử vi',
                'slug' => 'tu-vi',
            ),
            1 => array(
                'name' => 'Tử vi hàng tuần',
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
            $sql_nam = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%nam mạng%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%nữ mạng%" and name like "%2019%"';
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
                    'name' => 'Tử vi hàng tháng',
                    'slug' => 'tu-vi-hang-thang',
                ),
                1 => array(
                    'name' => 'Tháng ' . $thang . '/' . $nam,
                    'slug' => 'tu-vi-hang-thang/tu-vi-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Tử vi',
                    'slug' => 'tu-vi',
                ),
                1 => array(
                    'name' => 'Tử vi hàng tháng',
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
            $data['gioitinh_text'] = $data['gioitinh'] == 'nam' ? 'nam' : 'nữ';
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
            $sql = 'select * from article where name like "%' . $info_user['amlich'][2] . '%" and name like "%' . $data['gioitinh_text'] . ' mạng%" and name like "%2019%"';
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
                'name' => 'Tử vi',
                'slug' => 'tu-vi',
            ),
            1 => array(
                'name' => 'Cân xương tính số',
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
                // xử lí kiểm tra nếu ngày là thứ 7 thì chữ màu xanh, chủ nhật thì chữ màu đỏ
                $ngay_thu = trim($ngay['thu']);
                if ($ngay_thu == 'Thứ bảy')
                    $class_gr = 'text-success';
                elseif ($ngay_thu == 'Chủ nhật')
                    $class_gr = 'text-danger';
                else
                    $class_gr = '';
                $ngay_duong = '<span class="sp_nd ' . $class_gr . '">' . $ngay['ngayduong'] . '</span>';
                //end xu li
                $li_ngayduong = $ngay['ngayduong'] . '/' . $ngay['thangduong'] . '/' . $ngay['namduong'] . '(' . $ngay['thu'] . ')';
                $li_ngayam = $ngay['ngayam'] . '/' . $ngay['thangam'] . '/' . $ngay['namam'];
                $li_canchi = 'Ngày:' . $ngay['ngaycanchi'] . ' Tháng: ' . $ngay['thangcanchi'] . ' Năm:' . $ngay['namcanchi'];
                $class_yellow = $ngay['ngayduong'] == date('j') && $ngay['thangduong'] == date('n') && $ngay['namduong'] == date('Y') ? 'dayok' : '';

                // Ktra ngày nếu là 1,2,3 âm lịch thì hiện ngay/thang
                if ($ngay['ngayam'] == 1 || $ngay['ngayam'] == 2 || $ngay['ngayam'] == 3) {
                    $ktra_ngay = $ngay['ngayam'] . '/' . $ngay['thangam'];
                    $class_red = 'text-red';
                } else {
                    $ktra_ngay = $ngay['ngayam'];
                    $class_red = '';
                }
                // end kiểm tra
                $class_star = trim($ngay['ngayhoangdao']) == 'Hoàng đạo' ? 'text-yellow' : 'text-black';
                $star = '<span class="' . $class_star . '"><span class="glyphicon glyphicon-star st"></span></span>';
                $html .= '<div class="lt_item ' . $class_yellow . '"><a href="' . $link_ngay . '">' . $ngay_duong . '<span class="sp_ngayam ' . $class_red . '">' . $ktra_ngay . '</span>' . $star . '</a><ul>';
                $html .= '<li><label>Dương lịch:</label><b>' . $li_ngayduong . '</b></li>';
                $html .= '<li><label>Âm lịch:</label><b>' . $li_ngayam . '</b></li>';
                $html .= '<li><label>Bát tự:</label><b>' . $li_canchi . '</b></li>';
                $html .= '<li><label>Là ngày:</label><b>' . $ngay['ngayhoangdao'] . '</b></li>';
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