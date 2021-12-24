<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Xemboi extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $action_view_mobile = '';
    public $view = 'index';
    public $view_mobile = 'index_mobile';
    public $cache_time = '1440';

    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $this->action_view_mobile = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '_mobile';
        $this->view = $this->module_view . '/' . $this->view;
        $this->view_mobile = $this->module_view . '/' . $this->view_mobile;
        $this->load->library(array(
            'site/lib_xemngay',
            'site/ngayamduong',
            'site/my_seolink',
            'site/my_info',
            'site/comment_lib',
            'form_validation',
            'site/vnkey'
        ));
        $this->load->model(array('site/myconfig_model', 'site/article_model', 'site/xemboi_model'));
        $this->load->helper('form');
        require_once PUBLICPATH . '/html_dom/simple_html_dom.php';
    }

    public function boingaysinh($ngay = null, $thang = null, $nam = null)
    {
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        /*if (empty($ngay)) {
            $ngay  = 6;
            $thang = 6;
            $nam   = 1990;
        }*/
        if ($_POST) {
            $input = $this->input->post();
            $thang = $input['thang'];
            $ngay = $input['ngay'];
            $nam = $input['nam'];
            if (($thang == 1 && $ngay >= 20) || ($thang == 2 && $ngay <= 18)) {
                $cung = 1;
            } elseif (($thang == 2 && $ngay >= 19) || ($thang == 3 && $ngay <= 20)) {
                $cung = 2;
            } elseif (($thang == 3 && $ngay >= 21) || ($thang == 4 && $ngay <= 19)) {
                $cung = 3;
            } elseif (($thang == 4 && $ngay >= 20) || ($thang == 5 && $ngay <= 20)) {
                $cung = 4;
            } elseif (($thang == 5 && $ngay >= 21) || ($thang == 6 && $ngay <= 21)) {
                $cung = 5;
            } elseif (($thang == 6 && $ngay >= 22) || ($thang == 7 && $ngay <= 22)) {
                $cung = 6;
            } elseif (($thang == 7 && $ngay >= 23) || ($thang == 8 && $ngay <= 22)) {
                $cung = 7;
            } elseif (($thang == 8 && $ngay >= 23) || ($thang == 9 && $ngay <= 22)) {
                $cung = 8;
            } elseif (($thang == 9 && $ngay >= 23) || ($thang == 10 && $ngay <= 22)) {
                $cung = 9;
            } elseif (($thang == 10 && $ngay >= 23) || ($thang == 11 && $ngay <= 21)) {
                $cung = 10;
            } elseif (($thang == 11 && $ngay >= 22) || ($thang == 12 && $ngay <= 21)) {
                $cung = 11;
            } else {
                $cung = 12;
            }
            $data['luan'] = $this->myconfig_model->db->where('ma', $cung)->get('boingaysinh')->row_array();

            $data['ngay'] = $ngay;
            $data['thang'] = $thang;
            $data['nam'] = $nam;
            $arr_user = array(
                'ngay_sinh' => 6,
                'thang_sinh' => 6,
                'nam_sinh' => $nam,
            );
            $info_user = $this->my_info->Db_get_info_user($arr_user);
            $data['info_user'] = $info_user;
            $sql_nam = 'select * from article where name like "%' . $nam . '%" and name like "%nam%" and name like "%2018%"';
            $oneAge_nam = $this->article_model->getQuery($sql_nam);
            $data['oneAge_nam'] = $oneAge_nam;
            $sql_nu = 'select * from article where name like "%' . $nam . '%" and name like "%nữ%" and name like "%2018%"';
            $oneAge_nu = $this->article_model->getQuery($sql_nu);
            $data['oneAge_nu'] = $oneAge_nu;

            // Add $slugcanchi and $canchi
            $slugcanchi = $this->vnkey->format_key($info_user['namcanchi']);
            $arr_list = array(
                'link' => $this->uri->uri_string(),
                'replace' => array(
                    '$canchi' => get_chi_replace($info_user['namcanchi']),
                    '$namsinh' => $nam,
                    '$slugcanchi' => $slugcanchi
                ),
            );
            $this->my_seolink->seolink_cst($arr_list);
        }
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xem bói',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Xem bói ngày sinh',
                'slug' => 'xem-boi-ngay-sinh',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** Điều hướng tử vi 2020 */
        if ($ngay != null && $thang != null && $nam != null) {
            $namsinh = $nam;
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong($ngay, $thang, $nam);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $nam_am = $this->lich->get_namam();
            $data['dieu_huong_tv_2020_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_xem'=>2022,'nam_sinh' => $nam_am, 'gioi_tinh' => 1));
            $data['dieu_huong_tv_2020_text_nam'] = 'Xem bói tử vi tuổi can chi '.$nam_am.' năm 2022 nam mạng';
            $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_xem'=>2022,'nam_sinh' => $nam_am, 'gioi_tinh' => 2));
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem bói tử vi tuổi can chi '.$nam_am.' năm 2022 nữ mạng';
        }
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        // $data['view'] = $this->action_view;
        if ($this->mobile_detect->isMobile()) {
            $data['view'] = $this->action_view_mobile;
            $this->load->view($this->view_mobile, $data);
        } else {
            $data['view'] = $this->action_view;
            $this->load->view($this->view, $data);
        }
        // $this->load->view( $this->view, $data );
    }

    public function xuat_foru()
    {
        $data['luan'] = $this->myconfig_model->db->where('ma', $cung)->get('boingaysinh')->row_array();
    }

    public function a()
    {
        for ($i = 1; $i <= 3; $i++) {
            foreach ($a[1] as $key => $value) {
                echo $value;
                foreach ($a[2] as $key => $value) {
                    if ($value['parent'] == $value['id']) {
                        unset($a[2][$key]);
                    }
                }
            }
        }
    }

    public function boitinhyeu($ngay = null, $thang = null, $nam = null)
    {
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        $str_url = strlen($this->uri->uri_string());
        if ($str_url > 16) {
            $arr_list = array(
                'link' => 'xem-boi-tinh-yeu-theo-ngay-sinh',
                'replace' => array('$namsinhnam' => $ngay, '$namsinhnu' => $thang),
            );
            $this->my_seolink->seolink_cst($arr_list);
            $data['text_foot'] = $this->my_seolink->get_text();
        }
        if ($_POST) {
            $param = $_POST;
            $url = 'http://www.boitoanvui.com/boi-tinh-yeu.html';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, count($param));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5000);
            $result = curl_exec($ch);
            curl_close($ch);
            $html = str_get_html($result);
            $content['noidung'] = $html->find('div[id=boiaicap]', 0)->innertext;
            $content['noidung'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['noidung']);
            $html->clear();
            unset($html);
            $data['content'] = $content['noidung'];
            $data['text_foot'] = '';

            $arr_user_chong = array(
                'ngay_sinh' => $this->input->post('ngaysinhtrai'),
                'thang_sinh' => $this->input->post('thangsinhtrai'),
                'nam_sinh' => $this->input->post('namsinhtrai'),
            );
            $arr_user_vo = array(
                'ngay_sinh' => $this->input->post('ngaysinhgai'),
                'thang_sinh' => $this->input->post('thangsinhgai'),
                'nam_sinh' => $this->input->post('namsinhgai'),
            );

            $info_chong = $this->my_info->Db_get_info_user($arr_user_chong);
            $info_vo = $this->my_info->Db_get_info_user($arr_user_vo);
            $data['info_chong'] = $info_chong;
            $data['info_vo'] = $info_vo;
            $data['i_post'] = $this->input->post();

            /** Tử vi 2018 **/
            $sql_chong = 'select * from article where name like "%' . $info_chong['namcanchi'] . '%" and name like "%nam%" and name like "%2018%"';
            $oneAge_chong = $this->article_model->getQuery($sql_chong);
            $data['oneAge_chong'] = $oneAge_chong;

            $sql_vo = 'select * from article where name like "%' . $info_vo['namcanchi'] . '%" and name like "%nữ%" and name like "%2018%"';
            $oneAge_vo = $this->article_model->getQuery($sql_vo);
            $data['oneAge_vo'] = $oneAge_vo;

            $data['canchi'] = $info_chong['namcanchi'];
            $data['canchi2'] = $info_vo['namcanchi'];
            $sql_nam = 'select * from article where name like "%' . $info_chong['namcanchi'] . '%" and name like "%nam mạng%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_vo['namcanchi'] . '%" and name like "%nữ mạng%" and name like "%2019%"';
            $oneAge_nam = $this->article_model->getQuery($sql_nam);
            $oneAge_nu = $this->article_model->getQuery($sql_nu);
            $data['oneAgeNam'] = $oneAge_nam;
            $data['oneAgeNu'] = $oneAge_nu;

            // Add $slugcanchi and $canchi
            $slugcanchinam = $this->vnkey->format_key($info_chong['namcanchi']);
            $slugcanchinu = $this->vnkey->format_key($info_vo['namcanchi']);
            $arr_list = array(
                'link' => $this->uri->uri_string(),
                'replace' => array(
                    '$canchinam' => get_chi_replace($info_chong['namcanchi']),
                    '$namsinhnam' => $this->input->post('namsinhtrai'),
                    '$slugcanchinam' => $slugcanchinam,
                    '$canchinu' => get_chi_replace($info_vo['namcanchi']),
                    '$namsinhnu' => $this->input->post('namsinhgai'),
                    '$slugcanchinu' => $slugcanchinu
                ),
            );
            $this->my_seolink->seolink_cst($arr_list);
        }
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xem bói',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Xem bói tình yêu',
                'slug' => 'xem-boi-tinh-yeu-theo-ngay-sinh',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        if ($_POST) {
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong($_POST['ngaysinhtrai'], $_POST['thangsinhtrai'], $_POST['namsinhtrai']);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();

            $data['dieu_huong_tv_2020_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_xem'=>2022,'nam_sinh' => $_POST['namsinhtrai'], 'gioi_tinh' => 1));
            $data['dieu_huong_tv_2020_text_nam'] = 'Xem tử vi năm 2022 nam mạng tuổi '.$_POST['namsinhtrai'];

            $this->lich->set_ngayduong($_POST['ngaysinhgai'], $_POST['thangsinhgai'], $_POST['namsinhgai']);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();

            $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_xem'=>2022,'nam_sinh' => $_POST['namsinhgai'], 'gioi_tinh' => 2));
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem tử vi năm 2022 nữ mạng tuổi ' . $_POST['namsinhgai'];

        }
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        if ($this->mobile_detect->isMobile()) {
            $data['view'] = $this->action_view_mobile;
            $this->load->view($this->view_mobile, $data);
        } else {
            $data['view'] = $this->action_view;
            $this->load->view($this->view, $data);
        }
    }


    public function boicungmenh($slug_gioitinh = null, $namsinh = null)
    {
        $canchi_text = '';
        $gioitinh_text = '';
        $data['iSlug_gioitinh'] = $slug_gioitinh ? $slug_gioitinh : 'nam';
        $data['iNamsinh'] = $namsinh ? $namsinh : 1970;
        $arr_mauhopmenh = array(
            'Kim' => array(
                'hop' => 'Màu <b class="text-danger">tương sinh</b>: Vàng và Nâu; </br> Màu <b class="text-success">tương trợ</b>: Vàng đồng, Trắng, Bạc, Trắng Bạc, ',
                'ky' => 'Màu <b>kỵ</b>: Đỏ, Hồng và Tím; </br> Màu <b>sinh Xuất</b>: Xanh nước biển, Đen, ',
            ),
            'Mộc' => array(
                'hop' => 'Màu <b class="text-danger">tương sinh</b>: Xanh nước biển, Đen; </br> Màu <b class="text-success">tương trợ</b>: Xanh lá cây',
                'ky' => 'Màu <b>kỵ</b>: Hồng, Đỏ và Tím; Vàng đồng; </br> Màu <b>sinh Xuất</b>: Trắng, Bạc, Trắng Bạc',
            ),
            'Thủy' => array(
                'hop' => 'Màu <b class="text-danger">tương sinh</b>: Trắng, Vàng Đồng, Trắng Bạc, Bạc; </br> Màu <b class="text-success">tương trợ</b>: Xanh nước biển, Đen',
                'ky' => 'Màu <b>kỵ</b>: Vàng và Nâu; </br> Màu <b>sinh Xuất</b>: Xanh lá cây',
            ),
            'Hỏa' => array(
                'hop' => 'Màu <b class="text-danger">tương sinh</b>: Xanh lá cây; </br> Màu <b class="text-success">tương trợ</b>: Hồng, Đỏ và Tím',
                'ky' => 'Màu <b>kỵ</b>: Xanh nước biển, Đen; </br> Màu <b>sinh Xuất</b>: Vàng và Nâu',
            ),
            'Thổ' => array(
                'hop' => 'Màu <b class="text-danger">tương sinh</b>: Hồng, Đỏ, Tím; </br> Màu <b class="text-success">tương trợ</b>: Vàng và Nâu',
                'ky' => 'Màu <b>kỵ</b>: Xanh lá cây; </br> Màu <b>sinh Xuất</b>: Vàng đồng, Trắng, Bạc, Trắng Bạc',
            ),
        );
        $arr_sohopmenh = array(
            'Mộc' => '1, 3, 4',
            'Kim' => '6, 7, 8',
            'Thủy' => '1, 6, 7',
            'Hỏa' => '3, 4, 9',
            'Thổ' => '2, 5, 8, 9',
        );
        $arr_menh = array(
            'Kim' => 'kim',
            'Mộc' => 'moc',
            'Thủy' => 'thuy',
            'Hỏa' => 'hoa',
            'Thổ' => 'tho',
        );
        if (!empty($namsinh)) {
            $duonglich = array(
                'ngay_sinh' => 6,
                'thang_sinh' => 6,
                'nam_sinh' => $namsinh,
            );
            $info_user = $this->my_info->Db_get_info_user($duonglich);
            $can_text = $info_user['canchinam_text']['can'];
            $chi_text = $info_user['canchinam_text']['chi'];
            $canchi_text = $info_user['namcanchi'];
            $canchi_slug = get_can_slug($can_text) . '-' . get_chi_slug($chi_text);
            $data['canchi_text'] = $canchi_text;
            $data['canchi_slug'] = $canchi_slug;
            $data['info_user'] = $info_user;
            $data['namsinh'] = $namsinh;
            $menh_text = $info_user['lucthap']['he'];
            $menh_slug = $arr_menh[$menh_text];
            $data['menh_text'] = $menh_text;
            $link_slug = 'xem-tu-vi-nam-2018-tuoi-' . $canchi_slug . '-nam-mang-sinh-nam-' . $namsinh;
            $link_id = $this->boituoivochong_model->db->like('slug',
                $link_slug)->select('*')->get('article')->row_array();
            $link_slug1 = 'xem-tu-vi-tuoi-' . $canchi_slug . '-nam-2018-nu-mang-sinh-nam-' . $namsinh;
            $link_id1 = $this->boituoivochong_model->db->like('slug',
                $link_slug1)->select('*')->get('article')->row_array();
            $data['send_link'] = $link_id ? $link_id['slug'] . '-A' . $link_id['id'] . '.html' : '';
            $data['send_link1'] = $link_id1 ? $link_id1['slug'] . '-A' . $link_id1['id'] . '.html' : '';
            $data['send_link_mauhop'] = 'xem-mau-hop-menh/menh-' . $menh_slug . '-hop-mau-gi.html';
            $day = 1;
            $menh = trim($info_user['lucthap']['he']);
            foreach ($arr_mauhopmenh as $key => $value) {
                if ($menh == $key) {
                    $data['mauhop'] = $arr_mauhopmenh[$menh];
                }
            }
            foreach ($arr_sohopmenh as $key => $value) {
                if ($menh == $key) {
                    $data['sohop'] = $arr_sohopmenh[$menh];
                }
            }
            $data['gioitinh'] = $slug_gioitinh;
            $gioitinh_text = $slug_gioitinh == 'nam' ? 'Nam' : 'Nữ';

            $data['canchi'] = $info_user['namcanchi'];
            $data['gioitinh_text'] = strtolower($gioitinh_text);
            $sql = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%' . strtolower($gioitinh_text) . ' mạng%" and name like "%2019%"';
            $oneAge = $this->article_model->getQuery($sql);
            $data['oneAge'] = $oneAge;


            $gioitinh_number = $slug_gioitinh == 'nam' ? '0' : '1';
            $cung_tuoi = $this->xemboi_model->getCungMenh($namsinh, $gioitinh_number);
            $que_menh = $cung_tuoi['cung'];
            $data['que_menh'] = $que_menh;
            $data['noidung'] = $this->xemboi_model->noidung_phongthuy();
            $arr_content = $data['noidung'];
            // mảng quẻ mệnh
            $arr_quemenh = array(
                '1' => 'Khảm',
                '2' => 'Khôn',
                '3' => 'Chấn',
                '4' => 'Tốn',
                '6' => 'Càn',
                '7' => 'Đoài',
                '8' => 'Cấn',
                '9' => 'Ly',
            );

            // mảng hướng nhà
            $arr_huong = array(
                '1' => 'Bắc',
                '2' => 'Tây Nam',
                '3' => 'Đông',
                '4' => 'Đông Nam',
                '5' => '',
                '6' => 'Tây Bắc',
                '7' => 'Tây',
                '8' => 'Đông Bắc',
                '9' => 'Nam',
            );

            // mảng cung sinh
            $arr_cungsinh = array(
                '14' => 'Sinh Khí',
                '19' => 'Diên Niên',
                '13' => 'Thiên y',
                '11' => 'Phục vị',
                '12' => 'Tuyệt Mạng',
                '17' => 'Họa Hại',
                '18' => 'Ngũ Quỷ',
                '16' => 'Lục Sát',

                '28' => 'Sinh Khí',
                '26' => 'Diên Niên',
                '27' => 'Thiên y',
                '22' => 'Phục vị',
                '23' => 'Họa Hại',
                '21' => 'Tuyệt Mạng',
                '24' => 'Ngũ Quỷ',
                '29' => 'Lục Sát',

                '39' => 'Sinh Khí',
                '34' => 'Diên Niên',
                '31' => 'Thiên y',
                '33' => 'Phục vị',
                '37' => 'Tuyệt Mạng',
                '32' => 'Họa Hại',
                '36' => 'Ngũ Quỷ',
                '38' => 'Lục Sát',

                '41' => 'Sinh Khí',
                '43' => 'Diên Niên',
                '49' => 'Thiên y',
                '44' => 'Phục vị',
                '48' => 'Tuyệt Mạng',
                '46' => 'Họa Hại',
                '42' => 'Ngũ Quỷ',
                '47' => 'Lục Sát',

                '67' => 'Sinh Khí',
                '62' => 'Diên Niên',
                '68' => 'Thiên y',
                '66' => 'Phục vị',
                '69' => 'Tuyệt Mạng',
                '64' => 'Họa Hại',
                '63' => 'Ngũ Quỷ',
                '61' => 'Lục Sát',

                '76' => 'Sinh Khí',
                '78' => 'Diên Niên',
                '72' => 'Thiên y',
                '77' => 'Phục vị',
                '73' => 'Tuyệt Mạng',
                '71' => 'Họa Hại',
                '79' => 'Ngũ Quỷ',
                '74' => 'Lục Sát',

                '82' => 'Sinh Khí',
                '87' => 'Diên Niên',
                '86' => 'Thiên y',
                '88' => 'Phục vị',
                '84' => 'Tuyệt Mạng',
                '89' => 'Họa Hại',
                '81' => 'Ngũ Quỷ',
                '83' => 'Lục Sát',

                '93' => 'Sinh Khí',
                '91' => 'Diên Niên',
                '94' => 'Thiên y',
                '99' => 'Phục vị',
                '96' => 'Tuyệt Mạng',
                '98' => 'Họa Hại',
                '97' => 'Ngũ Quỷ',
                '92' => 'Lục Sát',
            );
            // mảng tây và mảng đông, giá trị luôn thuộc 1 trong 2 mảng này
            $arr_tay = array('2', '7', '6', '8');
            $arr_dong = array('3', '4', '9', '1');
            //khởi tạo biến $mang_chọn bằng rỗng và một mảng mới $mang_cungsinh_menh bằng 1 mảng rỗng
            $huong_tot = '';
            $huong_xau = '';
            $mang_cungsinh_menh_tot = array();
            $mang_cungsinh_menh_xau = array();


            // tìm key của $que_menh có tồn tại trong mảng $arr_quemenh hay không?
            $key_quemenh = array_search($que_menh, $arr_quemenh);

            // kiem tra key_quemenh có tồn tại trong mảng arr_tay hoặc arr_dong hay không?
            $check_huongnha = in_array($key_quemenh, $arr_tay);

            // nếu tồn tại thì gán mang_chon = mang arr_tay hoac arr_dong
            if ($check_huongnha) {
                $huong_tot = $arr_tay;
                $huong_xau = $arr_dong;
            } else {
                $huong_tot = $arr_dong;
                $huong_xau = $arr_tay;
            }
            // print_r($mang_chon);
            // lấy ra hướng tốt
            foreach ($huong_tot as $key => $value) {
                foreach ($arr_huong as $key1 => $value1) {
                    if ($value == $key1) {
                        $mang1[] = $value1;
                    }
                }
            }
            // var_dump($arr_huong);exit();

            // lấy ra hướng xau
            foreach ($huong_xau as $key => $value) {
                foreach ($arr_huong as $key1 => $value1) {
                    if ($value == $key1) {
                        $mang3[] = $value1;
                    }
                }
            }
            // print_r($mang3);
            // nối key_quemenh với giá trị của mang_chon đưa các giá tri được nối vào một mảng mới
            foreach ($huong_tot as $key => $value) {
                array_push($mang_cungsinh_menh_tot, $key_quemenh . $value);
            }
            foreach ($huong_xau as $key => $value) {
                array_push($mang_cungsinh_menh_xau, $key_quemenh . $value);
            }

            // so sánh giá trị của mảng mới với key của mảng cung sinh lấy ra tên các cung sinh
            foreach ($mang_cungsinh_menh_tot as $key => $value) {
                foreach ($arr_cungsinh as $key1 => $value1) {
                    if ($value == $key1) {
                        $mang2[] = $value1;
                    }
                }
            }
            // pr($mang2);
            foreach ($mang_cungsinh_menh_xau as $key => $value) {
                foreach ($arr_cungsinh as $key1 => $value1) {
                    if ($value == $key1) {
                        $mang4[] = $value1;
                    }
                }
            }

            /** **/
            $noidung_tot = null;
            foreach ($mang2 as $key1 => $value1) {
                foreach ($arr_content as $key => $value) {
                    if (in_array($value1, $value)) {
                        $noidung_tot[$key1] = $value;
                    }
                }
            }
            /** **/

            /** **/
            $noidung_xau = null;
            foreach ($mang4 as $key1 => $value1) {
                foreach ($arr_content as $key => $value) {
                    if (in_array($value1, $value)) {
                        $noidung_xau[$key1] = $value;
                    }
                }
            }
            /** **/

            foreach ($mang1 as $key => $value) {
                $data['mangketqua'][$key] = $value . '-' . $mang2[$key];
            }

            foreach ($mang3 as $key => $value) {
                $data['mangketqua1'][$key] = $value . '-' . $mang4[$key];
            }

            $data['noidung_tot'] = $noidung_tot;
            $data['noidung_xau'] = $noidung_xau;

            $data['mang2'] = $mang2;
            $data['mang4'] = $mang4;
        }
        $link = $namsinh == null ? 'xem-boi-cung-menh-theo-nam-sinh' : 'xem-boi-cung-menh-theo-nam-sinh/' . $slug_gioitinh . '-sinh-nam-$namsinh-menh-gi-cung-gi';
        $param = array(
            'link' => $link,
            'replace' => array(
                '$namsinh' => $namsinh,
                '$canchi' => $canchi_text,
                '$gioitinh' => $gioitinh_text,
                '$slug_gioitinh' => $slug_gioitinh
            ),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($param['link']);
        // pr($param); exit;
        // get breadcrumb
        if (!empty($namsinh)) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem bói cung mệnh',
                    'slug' => 'xem-boi-cung-menh-theo-nam-sinh',
                ),
                1 => array(
                    'name' => $gioitinh_text . ' ' . $namsinh,
                    'slug' => 'xem-boi-cung-menh-theo-nam-sinh/nam-sinh-nam-' . $namsinh . '-menh-gi-cung-gi',
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem bói',
                    'slug' => 'xem-boi',
                ),
                1 => array(
                    'name' => 'Xem bói cung mệnh',
                    'slug' => 'xem-boi-cung-menh-theo-nam-sinh',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        /** Điều hướng tử vi 2020 */
        if ($_POST) {
            $namsinh = $_POST['namsinh'];
            $gioi_tinh_id = $_POST['gioitinh'] == 'nam' ? 1 : 2;
            $gioi_tinh_text = $_POST['gioitinh'] == 'nam' ? 'nam' : 'nữ';
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong(9, 4, $namsinh);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $data['dieu_huong_tv_2020_link'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array(
                'nam_sinh' => $namsinh,
                'gioi_tinh' => 1,
                'nam_xem' => 2021
            ));
            $data['dieu_huong_tv_2020_text'] = 'Xem vận mệnh tử vi tuổi ' . $nam_can_chi_text . ' năm 2021 ' . $gioi_tinh_text . ' mạng';
        }
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        // $data['noindex']    = '<meta name="robots" content="nofollow, noindex" />';
        $this->load->view($this->view, $data);
    }

    public function boibiensoxe($ngay = null, $thang = null, $nam = null)
    {
        $this->load->library('form_validation');
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        if ($_POST) {
            $this->form_validation->set_rules('namsinh', 'Năm sinh', 'required');
            $this->form_validation->set_rules('tenxe', 'Tên xe', 'required');
            $this->form_validation->set_rules('bienso', 'Biển số', 'required');
            $this->form_validation->set_rules('somay', 'Số máy', 'required');
            $this->form_validation->set_rules('sokhung', 'Số khung', 'required');
            $this->form_validation->set_rules('id_mausacxe', 'Màu xe', 'required');
            $this->form_validation->set_message('required', 'Vui lòng không để trống {field}');
            if ($this->form_validation->run()) {
                $param = $_POST;
                $url = 'http://www.boitoanvui.com/xem-so-xe.html';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, count($param));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
                $result = curl_exec($ch);
                curl_close($ch);
                $html = str_get_html($result);
                $content['noidung'] = $html->find('div[id=simdep]', 0)->innertext;
                $content['noidung'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['noidung']);
                $html->clear();
                unset($html);
                $data['content'] = $content;
                $data['namsinh'] = $_POST['namsinh'];

                // Add $slugcanchi and $canchi
                $duonglich = array(
                    'ngay_sinh' => 6,
                    'thang_sinh' => 6,
                    'nam_sinh' => $param['namsinh'],
                );
                $info_user = $this->my_info->Db_get_info_user($duonglich);
                $slugcanchi = $this->vnkey->format_key($info_user['namcanchi']);
                $arr_list = array(
                    'link' => $this->uri->uri_string(),
                    'replace' => array(
                        '$canchi' => get_chi_replace($info_user['namcanchi']),
                        '$namsinh' => $param['namsinh'],
                        '$slugcanchi' => $slugcanchi
                    ),
                );
                $this->my_seolink->seolink_cst($arr_list);

                $data['canchi'] = $info_user['namcanchi'];
                $sql_nam = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nam mạng%" and name like "%2019%"';
                $sql_nu = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nữ mạng%" and name like "%2019%"';
                $oneAge_nam = $this->article_model->getQuery($sql_nam);
                $oneAge_nu = $this->article_model->getQuery($sql_nu);
                $data['oneAgeNam'] = $oneAge_nam;
                $data['oneAgeNu'] = $oneAge_nu;
            } else {
                $data['errors'] = validation_errors('<div class="alert alert-warning">', '</div>');
            }
        }
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xem bói',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Bói biển số xe',
                'slug' => 'xem-boi-bien-so-xe',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** Điều hướng tử vi 2020 */
        if ($_POST) {
            $namsinh = $_POST['namsinh'];
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong(9, 4, $namsinh);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $data['dieu_huong_tv_2020_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array(
                'nam_sinh' => $namsinh,
                'gioi_tinh' => 1,
                'nam_xem' => 2021
            ));
            $data['dieu_huong_tv_2020_text_nam'] = 'Xem công danh sự nghiệp tuổi ' . $nam_can_chi_text . ' năm 2021 nam mạng';
            $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array(
                'nam_sinh' => $namsinh,
                'gioi_tinh' => 2,
                'nam_xem' => 2021
            ));
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem vận hạn tuổi ' . $nam_can_chi_text . ' năm 2021 nữ mạng';
        }
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
        //$this->output->cache($this->cache_time); 
    }

    public function xemboisim($ngay = null, $thang = null, $nam = null)
    {
        if ($_POST) {
            $this->load->library('site/chamdiemsim');
            $this->load->library('site/Contentjossaoque_lib');
            $this->load->model('site/boisim_model');
            $this->load->library(array('form_validation', 'site/nguhanhsim'));
            $dd = $data['ngaysinh'] = $this->input->post('ngaysinh');
            $mm = $data['thangsinh'] = $this->input->post('thangsinh');
            $yy = $data['namsinh'] = $this->input->post('namsinh');
            $sosim = $data['sosim'] = $this->input->post('sosim');
            $sosim = $this->boisim_model->getSo($sosim);
            $gioitinh = $data['gioitinh'] = $this->input->post('gioitinh');
            $giosinh = $data['giosinh'] = $this->input->post('giosinh');
            $data['sosim'] = $sosim;
            if ($this->form_validation->run('boisim')) {
                $param = array(
                    "so_sim" => $sosim,
                    "ngay_sinh" => $dd,
                    "thang_sinh" => $mm,
                    "nam_sinh" => $yy,
                    "gioi_tinh" => $gioitinh,
                    "gio_sinh" => $giosinh,
                );
                $this->chamdiemsim->set_param($param);
                $result = $this->chamdiemsim->get_option();
                $data = $result;

                // Config lai noi dung que dich
                $data['infoQuedich'] = $this->contentjossaoque_lib->getContentQue($data['que_chu_val']);
                $data['infoQueho'] = $this->contentjossaoque_lib->getContentQue($data['que_ho_val']);

                $data['success'] = 'success';
            } else {
                $data['error'] = 'CẦN ĐIỀN ĐẦY ĐỦ VÀ CHÍNH XÁC THÔNG TIN !' . validation_errors();
            }
            // Cap nhap lay link bai viet sim theo nam sinh
            $arr_user = array(
                'ngay_sinh' => $this->input->post('ngaysinh'),
                'thang_sinh' => $this->input->post('thangsinh'),
                'nam_sinh' => $this->input->post('namsinh'),
            );
            $info_user = $this->my_info->Db_get_info_user($arr_user);
            $namsinh = $this->input->post('namsinh');
            $gioitinh = $this->input->post('gioitinh');
            $data['gioitinh'] = $gioitinh;
            $data['canchi'] = $info_user['namcanchi'];
            $sql = 'select * from article where name like "%' . $namsinh . '%" and name like "%' . $gioitinh . '%" and name like "%2018%"';
            $oneAge = $this->article_model->getQuery($sql);
            $data['oneAge'] = $oneAge;
            $data['popup'] = $param;
        }
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xem bói',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Bói số điện thoại',
                'slug' => 'xem-boi-so-dien-thoai',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink();
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    private function curl($url, $data_post)
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

    public function xemmauxehopmenh($menh = null)
    {
        $this->load->library('site/vnkey');
        $arr_menh = array(
            'kim' => 'Kim',
            'moc' => 'Mộc',
            'thuy' => 'Thủy',
            'hoa' => 'Hỏa',
            'tho' => 'Thổ',
        );
        $menh_text = '';
        if (!empty($menh)) {
            $data['noidung'] = $this->xemboi_model->Db_get_noidung_mauxe($menh);
            $menh_text = $arr_menh[$menh];
            $menh_slug = $menh;
        }
        // if ($this->input->post('xemnam')) {
        //     $namsinh = list_age_text($this->input->post('namsinh'));
        //     $duonglich = array(
        //         'ngay_sinh' => 6,
        //         'thang_sinh' => 6,
        //         'nam_sinh' => $namsinh,
        //     );
        //     $info_user = $this->my_info->Db_get_info_user($duonglich);
        //     $menh_text = $info_user['lucthap']['he'];
        //     $arr_menh_slug = array_flip($arr_menh);
        //     $menh_slug = $arr_menh_slug[$menh_text];
        //     $data['noidung'] = $this->xemboi_model->Db_get_noidung_mauxe($menh_slug);
        // }
        $link = $menh == null ? 'xem-mau-xe-hop-menh' : 'xem-mau-xe-hop-menh/menh-$menh-hop-xe-mau-gi';
        $param = array(
            'link' => $link,
            'replace' => array('$menh' => $menh_text, '$slug_menh' => $this->vnkey->format_key($menh_text)),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($param['link']);
        // get breadcrumb
        if (!empty($menh)) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem màu hợp mệnh',
                    'slug' => 'xem-mau-hop-menh',
                ),
                1 => array(
                    'name' => 'Mệnh ' . $menh_text,
                    'slug' => 'xem-mau-hop-menh/menh-' . $this->vnkey->format_key($menh_text) . '-hop-mau-gi',
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem bói',
                    'slug' => 'xem-boi',
                ),
                1 => array(
                    'name' => 'Xem màu hợp mệnh',
                    'slug' => 'xem-mau-hop-menh',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        // $data['noindex']    = '<meta name="robots" content="nofollow, noindex" />';
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function boinotruoi($vitri = null)
    {
        $arr_vitri = array(
            'trenmoi' => 'Trên Môi',
            'moi' => 'Môi',
            'duoimoi' => 'Dưới Môi',
            'giuatrongmat' => 'Giữa Tròng Mắt',
            'duoimat' => 'Dưới Mắt',
            'longtrangmat' => 'Lòng Trắng Mắt',
            'ganduoimat' => 'Gần Đuôi Mắt',
            'trenmat' => 'Trên Mắt',
            'khoemat' => 'Khóe Mắt',
            'longmay' => 'Lông Mày',
            'cungnoboc' => 'Cung Nô Bộc',
            'cungdiakho' => 'Cung Địa Khố',
            'phaplenh' => 'Pháp Lệnh',
            'luongquyen' => 'Lưỡng Quyền',
            'mangmon' => 'Mạng Môn',
            'gianmon' => 'Gian Môn',
            'thienthuong' => 'Thiên Thương',
            'dichma' => 'Dịch Mã',
            'phucduong' => 'Phúc Đường',
            'chinhtrung' => 'Chính Trung',
            'anduong' => 'Ấn Đường',
            'soncan' => 'Sơn Căn',
            'tyhuong' => 'Ty Hương',
            'chuandau' => 'Chuẩn Đầu',
            'nguyetgiac' => 'Nguyệt Giác',
            'nhatgiac' => 'Nhật Giác',
            'thiendinh' => 'Thiên Đình',
            'co' => 'Ở Cổ',
            'sauco' => 'Sau Cổ',
            'quanhco' => 'Quanh Cổ',
            'cotay' => 'Cổ Tay',
            'longbantay' => 'Lòng Bàn Tay',
            'chan' => 'Ở Chân',
            'bapchan' => 'Bắp Chân',
            'trennguoi' => 'Trên Người',
            'bavai' => 'Bả Vai',
            'nach' => 'Nách',
            'mong' => 'Mông',
        );
        $vitri_text = '';
        if (!empty($vitri)) {
            $data['content'] = $this->xemboi_model->Db_get_info_notruoi($vitri);
            $vitri_text = $arr_vitri[$vitri];
        }
        $link = $vitri == null ? 'xem-boi-not-ruoi-tren-co-the' : 'xem-boi-not-ruoi-tren-co-the/not-ruoi-o-$vitrinotruoi';
        $param = array(
            'link' => $link,
            'replace' => array('$vitrinotruoi' => $vitri_text,),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($param['link']);
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xem bói',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Xem bói nốt ruồi',
                'slug' => 'xem-boi-not-ruoi-tren-co-the',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        // $data['noindex'] = '<meta name="robots" content="noindex, nofollow">';
        $this->load->view($this->view, $data);
    }

    public function xemboikieu()
    {
        $namsinh = '';
        $canchi_slug = '';
        $canchi_text = '';
        if ($_POST) {
            $duonglich = array(
                'ngay_sinh' => $_POST['ngaysinh'],
                'thang_sinh' => $_POST['thangsinh'],
                'nam_sinh' => list_age_text($_POST['namsinh']),
            );
            $info_user = $this->my_info->Db_get_info_user($duonglich);
            $tho = $this->xemboi_model->Db_get_content_tho();
            $key_tho_rand = array_rand($tho, 1);
            $data['tho_show'] = $tho[$key_tho_rand];
            $canchi_slug = $_POST['namsinh'];
            $canchi_text = $info_user['namcanchi'];
            $data['canchi_slug'] = $canchi_slug;
            $data['canchi_text'] = $canchi_text;
            $namsinh = list_age_text($_POST['namsinh']);
            $gioitinh_slug = $_POST['gioitinh'];
            $data['gioitinh_slug'] = $gioitinh_slug;
            $link_slug = 'xem-tu-vi-nam-2018-tuoi-' . $canchi_slug . '-' . $gioitinh_slug . '-mang-sinh-nam-' . $namsinh;
            $link_id = $this->xemboi_model->db->like('slug', $link_slug)->select('*')->get('article')->row_array();
            $data['send_link'] = $link_slug . '-A' . $link_id['id'] . '.html';

            // Add $slugcanchi and $canchi
            $slugcanchi = $this->vnkey->format_key($info_user['namcanchi']);
            $arr_list = array(
                'link' => $this->uri->uri_string(),
                'replace' => array(
                    '$canchi' => get_chi_replace($info_user['namcanchi']),
                    '$namsinh' => $namsinh,
                    '$slugcanchi' => $slugcanchi
                ),
            );
            $this->my_seolink->seolink_cst($arr_list);
        }
        $link = 'xem-boi-kieu';
        $param = array(
            'link' => $link,
            'replace' => array(
                '$namsinh' => $namsinh,
                '$canchi_text' => $canchi_text,
                '$canchi_slug' => $canchi_slug,
            ),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xem bói',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Xem bói kiều',
                'slug' => 'xem-boi-kieu',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        // $data['noindex'] = '<meta name="robots" content="noindex, nofollow">';
        $this->load->view($this->view, $data);
    }

    public function xemboiten_noindex()
    {
        $param = $this->input->get();
        $url_curl = 'http://www.boitoanvui.com/boi-ai-cap.html';
        $ch = curl_init($url_curl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, count($param));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        $result = curl_exec($ch);
        curl_close($ch);
        $html = str_get_html($result);
        $content['noidung'] = $html->find('div[id=boiaicap]', 0)->innertext;
        $content['noidung'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['noidung']);
        $html->clear();
        unset($html);
        $data['content'] = $content;
        $link = 'xem-boi-ten-no-index';
        $param = array(
            'link' => $link,
            'replace' => array(),
        );
        $data['noindex'] = '<meta name="robots" content="noindex, nofollow">';
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        $this->my_seolink->seolink_cst($param);
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->action_view, $data);
    }

    public function boitenkinhdich()
    {
        if ($_POST) {
            $input = $this->input->post();
            $iframe = base_url('xem-boi-ten-no-index.html?nameguest=' . $input['nameguest'] . '&option=' . $input['option'] . '&view=' . $input['view'] . '&Itemid=' . $input['Itemid']);
            $data['iframe'] = $iframe;
        }
        $link = 'xem-boi-ten-theo-kinh-dich';
        $param = array(
            'link' => $link,
            'replace' => array(),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xem bói',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Xem bói tên',
                'slug' => 'xem-boi-theo-ten',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        // $data['noindex'] = '<meta name="robots" content="noindex, nofollow">';
        $this->load->view($this->view, $data);
    }

    public function boichitay($slugUrl = null)
    {
        /** Add action **/
        if ($slugUrl) {
            // Check slug
            $duongChiTay = $this->process_get_content_chitay($slugUrl);
            if ($duongChiTay) {
                $data['duongChiTay'] = $duongChiTay;
            } else {
                return redirect(base_url('error.html'), 'location', 301);
            }
        } else {
            $data['duongChiTay'] = null;
        }
        // Get all chi tay
        $allChiTay = $this->process_get_all_chitay();
        $data['allChiTay'] = $allChiTay;

        /** Add seolink **/
        $link = $this->uri->uri_string();
        $param = array(
            'link' => $link,
            'replace' => array(),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        // get breadcrumb
        // pr($allChiTay); exit;
        $arr = array();
        foreach ($allChiTay as $key => $value) {
            if (in_array($slugUrl, $value)) {
                $arr = $allChiTay[$key];
            }
        }
        if (!empty($slugUrl)) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Bói chỉ tay',
                    'slug' => 'xem-boi-chi-tay',
                ),
                1 => array(
                    'name' => $arr['name_text'],
                    'slug' => 'xem-boi-chi-tay/' . $arr['name_slug'],
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem bói',
                    'slug' => 'xem-boi',
                ),
                1 => array(
                    'name' => 'Bói chỉ tay',
                    'slug' => 'xem-boi-chi-tay',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        // $data['noindex'] = '<meta name="robots" content="noindex, nofollow">';
        $this->load->view($this->view, $data);
    }

    function process_get_content_chitay($name_slug)
    {
        return $this->xemboi_model->Db_get_content_chitay($name_slug);
    }

    function process_get_all_chitay()
    {
        return $this->xemboi_model->Db_get_all_chitay();
    }

    public function boi_so_chung_minh()
    {
        /** Add action **/
        $this->load->model('site/tool_boiso_model');
        $url = $this->uri->uri_string();
        $this->load->helper('joinnew_helper');

        $this->form_validation->set_rules('txtcmt', 'Số chứng minh nhân dân',
            'required|numeric|min_length[9]|max_length[12]');
        $this->form_validation->set_rules('ngay', 'ngày sinh', 'required');
        $this->form_validation->set_rules('thang', 'tháng sinh', 'required');
        $this->form_validation->set_rules('txtnam', 'năm sinh', 'required');

        $this->form_validation->set_message('required', 'Vui lòng không để trống {field}.');
        $this->form_validation->set_message('numeric', '{field} chỉ được là số.');
        $this->form_validation->set_message('min_length', '{field} phải từ 9 đến 12 kí tự.');
        $this->form_validation->set_message('max_length', '{field} phải từ 9 đến 12 kí tự.');

        if ($_POST) {
            if ($this->form_validation->run()) {
                $this->submit = 1;
                $arr_nguhanh = array(
                    '0' => 'Thủy',
                    '1' => 'Thủy',
                    '2' => 'Thổ',
                    '3' => 'Mộc',
                    '4' => 'Mộc',
                    '5' => 'Thổ',
                    '6' => 'Kim',
                    '7' => 'Kim',
                    '8' => 'Thổ',
                    '9' => 'Hỏa',
                );
                // mảng quái
                $arr_quai = array(
                    '1' => 'Càn',
                    '2' => 'Đoài',
                    '3' => 'Ly',
                    '4' => 'Chấn',
                    '5' => 'Tốn',
                    '6' => 'Khảm',
                    '7' => 'Cấn',
                    '8' => 'Khôn',
                );
                $arr_quechu = array(
                    '11' => 'Thuần Càn (乾 qián)',
                    '12' => 'Thiên Trạch Lý (履 lǚ)',
                    '13' => 'Thiên Hỏa Đồng Nhân (同人 tóng rén)',
                    '14' => 'Thiên Lôi Vô Vọng (無妄 wú wàng)',
                    '15' => 'Thiên Phong Cấu (姤 gòu)',
                    '16' => 'Thiên Thủy Tụng (訟 sòng)',
                    '17' => 'Thiên Sơn Độn (遯 dùn)',
                    '18' => 'Thiên Địa Bĩ (否 pǐ)',
                    '21' => 'Trạch Thiên Quải (夬 guài)',
                    '22' => 'Thuần Đoài (兌 duì)',
                    '23' => 'Trạch Hỏa Cách (革 gé)',
                    '24' => 'Trạch Lôi Tùy (隨 suí)',
                    '25' => 'Trạch Phong Đại Quá (大過 dà guò)',
                    '26' => 'Trạch Thủy Khốn (困 kùn)',
                    '27' => 'Trạch Sơn Hàm (咸 xián)',
                    '28' => 'Trạch Địa Tụy (萃 cuì)',
                    '31' => 'Hỏa Thiên Đại Hữu (大有 dà yǒu)',
                    '32' => 'Hỏa Trạch Khuê (睽 kuí)',
                    '33' => 'Thuần Ly (離 lí)',
                    '34' => 'Hỏa Lôi Phệ Hạp (噬嗑 shì kè)',
                    '35' => 'Hỏa Phong Đỉnh (鼎 dǐng)',
                    '36' => 'Hỏa Thủy Vị Tế (未濟 wèi jì)',
                    '37' => 'Hỏa Sơn Lữ (旅 lǚ)',
                    '38' => 'Hỏa Địa Tấn (晉 jìn)',
                    '41' => 'Lôi Thiên Đại Tráng (大壯 dà zhuàng)',
                    '42' => 'Lôi Trạch Quy Muội (歸妹 guī mèi)',
                    '43' => 'Lôi Hỏa Phong (豐 fēng)',
                    '44' => 'Thuần Chấn (震 zhèn)',
                    '45' => 'Lôi Phong Hằng (恆 héng)',
                    '46' => 'Lôi Thủy Giải (解 xiè)',
                    '47' => 'Lôi Sơn Tiểu Quá (小過 xiǎo guò)',
                    '48' => 'Lôi Địa Dự (豫 yù)',
                    '51' => 'Phong Thiên Tiểu Súc (小畜 xiǎo chù)',
                    '52' => 'Phong Trạch Trung Phu (中孚 zhōng fú)',
                    '53' => 'Phong Hỏa Gia Nhân (家人 jiā rén)',
                    '54' => 'Phong Lôi Ích (益 yì)',
                    '55' => 'Thuần Tốn (巽 xùn)',
                    '56' => 'Phong Thủy Hoán (渙 huàn)',
                    '57' => 'Phong Sơn Tiệm (漸 jiàn)',
                    '58' => 'Phong Địa Quan (觀 guān)',
                    '61' => 'Thủy Thiên Nhu (需 xū)',
                    '62' => 'Thủy Trạch Tiết (節 jié)',
                    '63' => 'Thủy Hỏa Ký Tế (既濟 jì jì)',
                    '64' => 'Thủy Lôi Truân (屯 chún)',
                    '65' => 'Thủy Phong Tỉnh (井 jǐng)',
                    '66' => 'Thuần Khảm (坎 kǎn)',
                    '67' => 'Thủy Sơn Kiển (蹇 jiǎn)',
                    '68' => 'Thủy Địa Tỷ (比 bǐ)',
                    '71' => 'Sơn Thiên Đại Súc (大畜 dà chù)',
                    '72' => 'Sơn Trạch Tổn (損 sǔn)',
                    '73' => 'Sơn Hỏa Bí (賁 bì)',
                    '74' => 'Sơn Lôi Di (頤 yí)',
                    '75' => 'Sơn Phong Cổ (蠱 gǔ)',
                    '76' => 'Sơn Thủy Mông (蒙 méng)',
                    '77' => 'Thuần Cấn (艮 gèn)',
                    '78' => 'Sơn Địa Bác (剝 bō)',
                    '81' => 'Địa Thiên Thái (泰 tài)',
                    '82' => 'Địa Trạch Lâm (臨 lín)',
                    '83' => 'Địa Hỏa Minh Di (明夷 míng yí)',
                    '84' => 'Địa Lôi Phục (復 fù)',
                    '85' => 'Địa Phong Thăng (升 shēng)',
                    '86' => 'Địa Thủy Sư (師 shī)',
                    '87' => 'Địa Sơn Khiêm (謙 qiān)',
                    '88' => 'Thuần Khôn (坤 kūn)',
                );
                $arr_queho = array(
                    '11' => 'Thuần Càn (乾 qián)',
                    '12' => 'Phong Hỏa Gia Nhân (家人 jiā rén)',
                    '13' => 'Thiên Phong Cấu (姤 gòu)',
                    '14' => 'Phong Sơn Tiệm (漸 jiàn',
                    '15' => 'Thuần Càn (乾 qián)',
                    '16' => 'Phong Hỏa Gia Nhân (家人 jiā rén)',
                    '17' => 'Thiên Phong Cấu (姤 gòu)',
                    '18' => 'Phong Sơn Tiệm (漸 jiàn)',
                    '21' => 'Thuần Càn (乾 qián)',
                    '22' => 'Phong Hỏa Gia Nhân (家人 jiā rén)',
                    '23' => 'Thiên Phong Cấu (姤 gòu)',
                    '24' => 'Phong Sơn Tiệm (漸 jiàn)',
                    '25' => 'Thuần Càn (乾 qián)',
                    '26' => 'Phong Hỏa Gia Nhân (家人 jiā rén)',
                    '27' => 'Thiên Phong Cấu (姤 gòu)',
                    '28' => 'Phong Sơn Tiệm (漸 jiàn)',
                    '31' => 'Trạch Thiên Quải (夬 guài)',
                    '32' => 'Thủy Hỏa Ký Tế (既濟 jì jì)',
                    '33' => 'Trạch Phong Đại Quá (大過 dà guò)',
                    '34' => 'Thủy Sơn Kiển (蹇 jiǎn)',
                    '35' => 'Trạch Thiên Quải (夬 guài)',
                    '36' => 'Thủy Hỏa Ký Tế (既濟 jì jì)',
                    '37' => 'Trạch Phong Đại Quá (大過 dà guò)',
                    '38' => 'Thủy Sơn Kiển (蹇 jiǎn)',
                    '41' => 'Trạch Thiên Quải (夬 guài)',
                    '42' => 'Thủy Hỏa Ký Tế (既濟 jì jì)',
                    '43' => 'Trạch Phong Đại Quá (大過 dà guò)',
                    '44' => 'Thủy Sơn Kiển (蹇 jiǎn)',
                    '45' => 'Trạch Thiên Quải (夬 guài)',
                    '46' => 'Thủy Hỏa Ký Tế (既濟 jì jì)',
                    '47' => 'Trạch Phong Đại Quá (大過 dà guò',
                    '48' => 'Thủy Sơn Kiển (蹇 jiǎn)',
                    '51' => 'Hỏa Trạch Khuê (睽 kuí)',
                    '52' => 'Sơn Lôi Di (頤 yí)',
                    '53' => 'Hỏa Thủy Vị Tế (未濟 wèi jì)',
                    '54' => 'Sơn Địa Bác (剝 bō)',
                    '55' => 'Hỏa Trạch Khuê (睽 kuí)',
                    '56' => 'Sơn Lôi Di (頤 yí)',
                    '57' => 'Hỏa Thủy Vị Tế (未濟 wèi jì)',
                    '58' => 'Sơn Địa Bác (剝 bō)',
                    '61' => 'Hỏa Trạch Khuê (睽 kuí)',
                    '62' => 'Sơn Lôi Di (頤 yí)',
                    '63' => 'Hỏa Thủy Vị Tế (未濟 wèi jì',
                    '64' => 'Sơn Địa Bác (剝 bō)',
                    '65' => 'Hỏa Trạch Khuê (睽 kuí)',
                    '66' => 'Sơn Lôi Di (頤 yí)',
                    '67' => 'Hỏa Thủy Vị Tế (未濟 wèi jì)',
                    '68' => 'Sơn Địa Bác (剝 bō)',
                    '71' => 'Lôi Trạch Quy Muội (歸妹 guī mèi)',
                    '72' => 'Địa Lôi Phục (復 fù)',
                    '73' => 'Lôi Thủy Giải (解 xiè)',
                    '74' => 'Thuần Khôn (坤 kūn)',
                    '75' => 'Lôi Trạch Quy Muội (歸妹 guī mèi)',
                    '76' => 'Địa Lôi Phục (復 fù)',
                    '77' => 'Lôi Thủy Giải (解 xiè)',
                    '78' => 'Thuần Khôn (坤 kūn)',
                    '81' => 'Lôi Trạch Quy Muội (歸妹 guī mèi)',
                    '82' => 'Địa Lôi Phục (復 fù)',
                    '83' => 'Lôi Thủy Giải (解 xiè)',
                    '84' => 'Thuần Khôn (坤 kūn)',
                    '85' => 'Lôi Trạch Quy Muội (歸妹 guī mèi)',
                    '86' => 'Địa Lôi Phục (復 fù)',
                    '87' => 'Lôi Thủy Giải (解 xiè)',
                    '88' => 'Thuần Khôn (坤 kūn)',
                );
                $arr_thuy = array();
                $arr_tho = array();
                $arr_moc = array();
                $arr_kim = array();
                $arr_hoa = array();
                $sum_end = '';
                if ($this->input->post('btnxem')) {
                    $post = $this->input->post();
                    $ngay = $data['ngay'] = $post['ngay'];
                    $thang = $data['thang'] = $post['thang'];
                    $nam = $data['nam'] = $post['txtnam'];
                    $cmt = $data['socmt'] = $post['txtcmt'];

                    $arr_user = array(
                        'ngay_sinh' => $ngay,
                        'thang_sinh' => $thang,
                        'nam_sinh' => $nam,
                    );
                    $info_user = $this->my_info->Db_get_info_user($arr_user);
                    $data['info_user'] = $info_user;

                    $data['canchi'] = $info_user['namcanchi'];
                    $sql_nam = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nam mạng%" and name like "%2019%"';
                    $sql_nu = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nữ mạng%" and name like "%2019%"';
                    $oneAge_nam = $this->article_model->getQuery($sql_nam);
                    $oneAge_nu = $this->article_model->getQuery($sql_nu);
                    $data['oneAgeNam'] = $oneAge_nam;
                    $data['oneAgeNu'] = $oneAge_nu;

                    $ns = $ngay . $thang . $nam;
                    $loaicmt = strlen($cmt);
                    $arr1 = str_split($cmt);
                    $arr2 = str_split($ns);
                    // Xác định ý nghĩa của tuổi và số chứng minh thư
                    $arr3 = array_merge($arr2, $arr1);
                    $sum = array_sum($arr3);
                    $sum_length = strlen($sum);
                    if ($sum < 10) {
                        $sum_end = $sum;
                    } else {
                        if ($sum == 10) {
                            $sum_end = 0;
                        } else {
                            if ($sum > 10) {
                                $arr_sum = str_split($sum);
                                $sum1 = array_sum($arr_sum);
                                if ($sum1 < 10) {
                                    $sum_end = $sum1;
                                } else {
                                    if ($sum1 == 10) {
                                        $sum_end = 0;
                                    } else {
                                        $arr_sum1 = str_split($sum1);
                                        $sum2 = array_sum($arr_sum1);
                                        $sum_end = $sum2;
                                    }
                                }
                                // sum_end là kết quả cuối cùng tính được theo công thức
                            }
                        }
                    }
                    // Xác định ngũ hành của số chứng minh thư.
                    $so_cuoi = end($arr1); //lấy phần tử cuối cùng của mảng(số cuối cùng của cmt)
                    // Xác định các số trong cmt thuộc ngũ hành nào và đưa và các mảng tương ứng.
                    // 0,1 => Thủy
                    // 2,5,8 => Thổ
                    // 3,4 => Mộc
                    // 6,7 => Kim
                    //  9 => Hỏa
                    foreach ($arr1 as $key => $value) {
                        if ($value == 0 || $value == 1) {
                            array_push($arr_thuy, $value);
                        } else {
                            if ($value == 2 || $value == 5 || $value == 8) {
                                array_push($arr_tho, $value);
                            } else {
                                if ($value == 3 || $value == 4) {
                                    array_push($arr_moc, $value);
                                } else {
                                    if ($value == 6 || $value == 7) {
                                        array_push($arr_kim, $value);
                                    } else {
                                        array_push($arr_hoa, $value);
                                    }
                                }
                            }
                        }
                    }
                    // nếu các mảng trên không rỗng thì đếm số phần tử mỗi mảng.
                    if (!empty($arr_thuy)) {
                        $so_thuy = count($arr_thuy);
                    }
                    if (!empty($arr_tho)) {
                        $so_tho = count($arr_tho);
                    }
                    if (!empty($arr_moc)) {
                        $so_moc = count($arr_moc);
                    }
                    if (!empty($arr_kim)) {
                        $so_kim = count($arr_kim);
                    }
                    if (!empty($arr_hoa)) {
                        $so_hoa = count($arr_hoa);
                    }
                    // cmt loại 9 số => mảng nào có >= 4 phần tử => Ngũ Hành CMT (1)
                    // cmt loại 12 số => mảng nào có >=5 phần tử => Ngũ Hành CMT (2)
                    // nếu tồn tại biến đếm số phần tử mỗi mảng ở trên thì kiểm tra xem mảng nào có số phần tử như (1) hoặc (2) nếu không có mảng nào đáp ứng điều kiện trên thì lấy số cuối cùng của CMT là Ngũ Hành.
                    if ($loaicmt == 9) {
                        if (isset($so_thuy) && $so_thuy >= 4) {
                            $ngu_hanh = 'Thủy';
                        } else {
                            if (isset($so_hoa) && $so_hoa >= 4) {
                                $ngu_hanh = 'Hỏa';
                            } else {
                                if (isset($so_moc) && $so_moc >= 4) {
                                    $ngu_hanh = 'Mộc';
                                } else {
                                    if (isset($so_tho) && $so_tho >= 4) {
                                        $ngu_hanh = 'Thổ';
                                    } else {
                                        if (isset($so_kim) && $so_kim >= 4) {
                                            $ngu_hanh = 'Kim';
                                        } else {
                                            foreach ($arr_nguhanh as $key => $value) {
                                                if ($so_cuoi == $key) {
                                                    $ngu_hanh = $value;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        if ($loaicmt == 12) {
                            if (isset($so_thuy) && $so_thuy >= 5) {
                                $ngu_hanh = 'Thủy';
                            } else {
                                if (isset($so_hoa) && $so_hoa >= 5) {
                                    $ngu_hanh = 'Hỏa';
                                } else {
                                    if (isset($so_moc) && $so_moc >= 5) {
                                        $ngu_hanh = 'Mộc';
                                    } else {
                                        if (isset($so_tho) && $so_tho >= 5) {
                                            $ngu_hanh = 'Thổ';
                                        } else {
                                            if (isset($so_kim) && $so_kim >= 5) {
                                                $ngu_hanh = 'Kim';
                                            } else {
                                                foreach ($arr_nguhanh as $key => $value) {
                                                    if ($so_cuoi == $key) {
                                                        $ngu_hanh = $value;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            $ms = notify('danger',
                                'Số Bạn nhập vào không phải là số chứng minh thư, vui lòng nhập số chứng minh thư!');
                            $this->session->set_flashdata('item', $ms);
                            redirect(base_url($this->uri->uri_string() . '.html'));
                        }
                    }
                    // Xác định quẻ chủ của số chứng minh thư
                    // loại 9 số 5 số đầu là quẻ thượng 4 số cuối là quẻ hạ
                    // loại 12 số 6 số đầu là quẻ thượng 6 số cuối là quẻ hạ
                    // sau khi xác đinh được quẻ thượng và quẻ hạ chia tổng mảng cho 8 lấy số dư => quẻ chủ
                    if ($loaicmt == 9) {
                        $que_thuong = array_slice($arr1, 0, 5);
                        $que_ha = array_slice($arr1, 5, 4);
                        $b = array_sum($que_thuong);
                        $c = array_sum($que_ha);
                        $d = $b % 8;
                        $e = $c % 8;
                    } else {
                        $que_thuong = array_slice($arr1, 0, 6);
                        $que_ha = array_slice($arr1, 6, 6);
                        $b = array_sum($que_thuong);
                        $c = array_sum($que_ha);
                        $d = $b % 8;
                        $e = $c % 8;
                    }
                    // nếu số dư # 0 thì số dư == số dư, số dư == 0 thì số dư == 8
                    if ($d == 0) {
                        $g = 8;
                    } else {
                        $g = $d;
                    }
                    if ($e == 0) {
                        $h = 8;
                    } else {
                        $h = $e;
                    }
                    // Nối 2 số dư và duyệt mảng $arr_quechu => Quẻ chủ
                    $noidung = noidung_cmt(); // ham noi dung trong helper
                    $f = $g . $h;
                    $data['nguhanh'] = $ngu_hanh; // ngũ hành số cmt
                    foreach ($noidung as $key => $value) {
                        if ($sum_end == $key) {
                            $data['ynghia'] = $value;
                        }
                    }
                    foreach ($arr_quechu as $key => $value) {
                        if ($f == $key) {
                            $data['quechu'] = $value;
                        }
                    }
                    // lấy tên của quẻ hỗ
                    foreach ($arr_queho as $key => $value) {
                        if ($f == $key) {
                            $data['queho'] = $value;
                            $que_ho = $value;
                        }
                    }
                    // dựa vào tên của quẻ hỗ tìm key trong mảng quẻ chủ => truy vấn nội dung theo key tìm thấy.
                    $key_queho = array_search($que_ho, $arr_quechu); // tìm key
                    $data['noidung_quechu'] = $this->tool_boiso_model->noidung_que($f);
                    $data['noidung_queho'] = $this->tool_boiso_model->noidung_que($key_queho);
                }
            } else {
                $data['errors'] = validation_errors('<p>',
                    '</p>');
            }
        }

        /** Add seolink **/
        $link = $this->uri->uri_string();
        $param = array(
            'link' => $link,
            'replace' => array(),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xem bói',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Bói CMND',
                'slug' => 'xem-boi-so-chung-minh-nhan-dan',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        if ($_POST) {
            $namsinh = $_POST['txtnam'];
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong($_POST['ngay'], $_POST['thang'], $namsinh);
            $nam_sinh_am = $this->lich->get_namam();
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $data['dieu_huong_tv_2020_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array(
                'nam_sinh' => $nam_sinh_am,
                'gioi_tinh' => 1
            ));
            $data['dieu_huong_tv_2020_text_nam'] = 'Xem tử vi tuổi ' . $nam_can_chi_text . ' năm 2020 nam mạng';
            $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array(
                'nam_sinh' => $nam_sinh_am,
                'gioi_tinh' => 2
            ));
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem tử vi tuổi ' . $nam_can_chi_text . ' năm 2020 nữ mạng';
        }
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        // $data['noindex'] = '<meta name="robots" content="noindex, nofollow">';
        $this->load->view($this->view, $data);
    }

    public function boi_bai_tarot()
    {
        /** Add action **/


        /** Add seolink **/
        $link = $this->uri->uri_string();
        $param = array(
            'link' => $link,
            'replace' => array(),
        );
        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xem bói',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Bói bài tarot',
                'slug' => 'boi-bai-tarot-hang-ngay',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        // $data['noindex'] = '<meta name="robots" content="noindex, nofollow">';
        $this->load->view($this->view, $data);
    }

    function ajax_get_info_tarot()
    {
        if (!$this->input->is_ajax_request()) {
            return redirect(base_url('error.html'), 'location', 301);
        }
        $id = $this->input->post('id');
        $data = $this->xemboi_model->db->where('number', $id)->select('*')->get('tbl_tarot')->row_array();
        $html = '';
        if (!empty($data)) {
            $html .= '
                <div class="alert my-alert font400">' . $data['name'] . '</div>
                <div class="alert my-alert font400">' . $data['gioi_thieu'] . '</div>
                <div class="alert my-alert font400">' . $data['tong_quan'] . '</div>
                <div class="alert my-alert font400">' . $data['tinh_yeu'] . '</div>
                <div class="alert my-alert font400">' . $data['cong_viec'] . '</div>
                <div class="alert my-alert font400">' . $data['suc_khoe'] . '</div>
            ';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('html' => $html)));
    }


}    
