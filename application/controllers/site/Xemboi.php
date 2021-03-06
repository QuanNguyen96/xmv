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
            $sql_nu = 'select * from article where name like "%' . $nam . '%" and name like "%n???%" and name like "%2018%"';
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
                'name' => 'Xem b??i',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Xem b??i ng??y sinh',
                'slug' => 'xem-boi-ngay-sinh',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** ??i???u h?????ng t??? vi 2020 */
        if ($ngay != null && $thang != null && $nam != null) {
            $namsinh = $nam;
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong($ngay, $thang, $nam);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $nam_am = $this->lich->get_namam();
            $data['dieu_huong_tv_2020_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_xem'=>2022,'nam_sinh' => $nam_am, 'gioi_tinh' => 1));
            $data['dieu_huong_tv_2020_text_nam'] = 'Xem b??i t??? vi tu???i can chi '.$nam_am.' n??m 2022 nam m???ng';
            $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_xem'=>2022,'nam_sinh' => $nam_am, 'gioi_tinh' => 2));
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem b??i t??? vi tu???i can chi '.$nam_am.' n??m 2022 n??? m???ng';
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

            /** T??? vi 2018 **/
            $sql_chong = 'select * from article where name like "%' . $info_chong['namcanchi'] . '%" and name like "%nam%" and name like "%2018%"';
            $oneAge_chong = $this->article_model->getQuery($sql_chong);
            $data['oneAge_chong'] = $oneAge_chong;

            $sql_vo = 'select * from article where name like "%' . $info_vo['namcanchi'] . '%" and name like "%n???%" and name like "%2018%"';
            $oneAge_vo = $this->article_model->getQuery($sql_vo);
            $data['oneAge_vo'] = $oneAge_vo;

            $data['canchi'] = $info_chong['namcanchi'];
            $data['canchi2'] = $info_vo['namcanchi'];
            $sql_nam = 'select * from article where name like "%' . $info_chong['namcanchi'] . '%" and name like "%nam m???ng%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_vo['namcanchi'] . '%" and name like "%n??? m???ng%" and name like "%2019%"';
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
                'name' => 'Xem b??i',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Xem b??i t??nh y??u',
                'slug' => 'xem-boi-tinh-yeu-theo-ngay-sinh',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        if ($_POST) {
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong($_POST['ngaysinhtrai'], $_POST['thangsinhtrai'], $_POST['namsinhtrai']);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();

            $data['dieu_huong_tv_2020_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_xem'=>2022,'nam_sinh' => $_POST['namsinhtrai'], 'gioi_tinh' => 1));
            $data['dieu_huong_tv_2020_text_nam'] = 'Xem t??? vi n??m 2022 nam m???ng tu???i '.$_POST['namsinhtrai'];

            $this->lich->set_ngayduong($_POST['ngaysinhgai'], $_POST['thangsinhgai'], $_POST['namsinhgai']);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();

            $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_xem'=>2022,'nam_sinh' => $_POST['namsinhgai'], 'gioi_tinh' => 2));
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem t??? vi n??m 2022 n??? m???ng tu???i ' . $_POST['namsinhgai'];

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
                'hop' => 'M??u <b class="text-danger">t????ng sinh</b>: V??ng v?? N??u; </br> M??u <b class="text-success">t????ng tr???</b>: V??ng ?????ng, Tr???ng, B???c, Tr???ng B???c, ',
                'ky' => 'M??u <b>k???</b>: ?????, H???ng v?? T??m; </br> M??u <b>sinh Xu???t</b>: Xanh n?????c bi???n, ??en, ',
            ),
            'M???c' => array(
                'hop' => 'M??u <b class="text-danger">t????ng sinh</b>: Xanh n?????c bi???n, ??en; </br> M??u <b class="text-success">t????ng tr???</b>: Xanh l?? c??y',
                'ky' => 'M??u <b>k???</b>: H???ng, ????? v?? T??m; V??ng ?????ng; </br> M??u <b>sinh Xu???t</b>: Tr???ng, B???c, Tr???ng B???c',
            ),
            'Th???y' => array(
                'hop' => 'M??u <b class="text-danger">t????ng sinh</b>: Tr???ng, V??ng ?????ng, Tr???ng B???c, B???c; </br> M??u <b class="text-success">t????ng tr???</b>: Xanh n?????c bi???n, ??en',
                'ky' => 'M??u <b>k???</b>: V??ng v?? N??u; </br> M??u <b>sinh Xu???t</b>: Xanh l?? c??y',
            ),
            'H???a' => array(
                'hop' => 'M??u <b class="text-danger">t????ng sinh</b>: Xanh l?? c??y; </br> M??u <b class="text-success">t????ng tr???</b>: H???ng, ????? v?? T??m',
                'ky' => 'M??u <b>k???</b>: Xanh n?????c bi???n, ??en; </br> M??u <b>sinh Xu???t</b>: V??ng v?? N??u',
            ),
            'Th???' => array(
                'hop' => 'M??u <b class="text-danger">t????ng sinh</b>: H???ng, ?????, T??m; </br> M??u <b class="text-success">t????ng tr???</b>: V??ng v?? N??u',
                'ky' => 'M??u <b>k???</b>: Xanh l?? c??y; </br> M??u <b>sinh Xu???t</b>: V??ng ?????ng, Tr???ng, B???c, Tr???ng B???c',
            ),
        );
        $arr_sohopmenh = array(
            'M???c' => '1, 3, 4',
            'Kim' => '6, 7, 8',
            'Th???y' => '1, 6, 7',
            'H???a' => '3, 4, 9',
            'Th???' => '2, 5, 8, 9',
        );
        $arr_menh = array(
            'Kim' => 'kim',
            'M???c' => 'moc',
            'Th???y' => 'thuy',
            'H???a' => 'hoa',
            'Th???' => 'tho',
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
            $gioitinh_text = $slug_gioitinh == 'nam' ? 'Nam' : 'N???';

            $data['canchi'] = $info_user['namcanchi'];
            $data['gioitinh_text'] = strtolower($gioitinh_text);
            $sql = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%' . strtolower($gioitinh_text) . ' m???ng%" and name like "%2019%"';
            $oneAge = $this->article_model->getQuery($sql);
            $data['oneAge'] = $oneAge;


            $gioitinh_number = $slug_gioitinh == 'nam' ? '0' : '1';
            $cung_tuoi = $this->xemboi_model->getCungMenh($namsinh, $gioitinh_number);
            $que_menh = $cung_tuoi['cung'];
            $data['que_menh'] = $que_menh;
            $data['noidung'] = $this->xemboi_model->noidung_phongthuy();
            $arr_content = $data['noidung'];
            // m???ng qu??? m???nh
            $arr_quemenh = array(
                '1' => 'Kh???m',
                '2' => 'Kh??n',
                '3' => 'Ch???n',
                '4' => 'T???n',
                '6' => 'C??n',
                '7' => '??o??i',
                '8' => 'C???n',
                '9' => 'Ly',
            );

            // m???ng h?????ng nh??
            $arr_huong = array(
                '1' => 'B???c',
                '2' => 'T??y Nam',
                '3' => '????ng',
                '4' => '????ng Nam',
                '5' => '',
                '6' => 'T??y B???c',
                '7' => 'T??y',
                '8' => '????ng B???c',
                '9' => 'Nam',
            );

            // m???ng cung sinh
            $arr_cungsinh = array(
                '14' => 'Sinh Kh??',
                '19' => 'Di??n Ni??n',
                '13' => 'Thi??n y',
                '11' => 'Ph???c v???',
                '12' => 'Tuy???t M???ng',
                '17' => 'H???a H???i',
                '18' => 'Ng?? Qu???',
                '16' => 'L???c S??t',

                '28' => 'Sinh Kh??',
                '26' => 'Di??n Ni??n',
                '27' => 'Thi??n y',
                '22' => 'Ph???c v???',
                '23' => 'H???a H???i',
                '21' => 'Tuy???t M???ng',
                '24' => 'Ng?? Qu???',
                '29' => 'L???c S??t',

                '39' => 'Sinh Kh??',
                '34' => 'Di??n Ni??n',
                '31' => 'Thi??n y',
                '33' => 'Ph???c v???',
                '37' => 'Tuy???t M???ng',
                '32' => 'H???a H???i',
                '36' => 'Ng?? Qu???',
                '38' => 'L???c S??t',

                '41' => 'Sinh Kh??',
                '43' => 'Di??n Ni??n',
                '49' => 'Thi??n y',
                '44' => 'Ph???c v???',
                '48' => 'Tuy???t M???ng',
                '46' => 'H???a H???i',
                '42' => 'Ng?? Qu???',
                '47' => 'L???c S??t',

                '67' => 'Sinh Kh??',
                '62' => 'Di??n Ni??n',
                '68' => 'Thi??n y',
                '66' => 'Ph???c v???',
                '69' => 'Tuy???t M???ng',
                '64' => 'H???a H???i',
                '63' => 'Ng?? Qu???',
                '61' => 'L???c S??t',

                '76' => 'Sinh Kh??',
                '78' => 'Di??n Ni??n',
                '72' => 'Thi??n y',
                '77' => 'Ph???c v???',
                '73' => 'Tuy???t M???ng',
                '71' => 'H???a H???i',
                '79' => 'Ng?? Qu???',
                '74' => 'L???c S??t',

                '82' => 'Sinh Kh??',
                '87' => 'Di??n Ni??n',
                '86' => 'Thi??n y',
                '88' => 'Ph???c v???',
                '84' => 'Tuy???t M???ng',
                '89' => 'H???a H???i',
                '81' => 'Ng?? Qu???',
                '83' => 'L???c S??t',

                '93' => 'Sinh Kh??',
                '91' => 'Di??n Ni??n',
                '94' => 'Thi??n y',
                '99' => 'Ph???c v???',
                '96' => 'Tuy???t M???ng',
                '98' => 'H???a H???i',
                '97' => 'Ng?? Qu???',
                '92' => 'L???c S??t',
            );
            // m???ng t??y v?? m???ng ????ng, gi?? tr??? lu??n thu???c 1 trong 2 m???ng n??y
            $arr_tay = array('2', '7', '6', '8');
            $arr_dong = array('3', '4', '9', '1');
            //kh???i t???o bi???n $mang_ch???n b???ng r???ng v?? m???t m???ng m???i $mang_cungsinh_menh b???ng 1 m???ng r???ng
            $huong_tot = '';
            $huong_xau = '';
            $mang_cungsinh_menh_tot = array();
            $mang_cungsinh_menh_xau = array();


            // t??m key c???a $que_menh c?? t???n t???i trong m???ng $arr_quemenh hay kh??ng?
            $key_quemenh = array_search($que_menh, $arr_quemenh);

            // kiem tra key_quemenh c?? t???n t???i trong m???ng arr_tay ho???c arr_dong hay kh??ng?
            $check_huongnha = in_array($key_quemenh, $arr_tay);

            // n???u t???n t???i th?? g??n mang_chon = mang arr_tay hoac arr_dong
            if ($check_huongnha) {
                $huong_tot = $arr_tay;
                $huong_xau = $arr_dong;
            } else {
                $huong_tot = $arr_dong;
                $huong_xau = $arr_tay;
            }
            // print_r($mang_chon);
            // l???y ra h?????ng t???t
            foreach ($huong_tot as $key => $value) {
                foreach ($arr_huong as $key1 => $value1) {
                    if ($value == $key1) {
                        $mang1[] = $value1;
                    }
                }
            }
            // var_dump($arr_huong);exit();

            // l???y ra h?????ng xau
            foreach ($huong_xau as $key => $value) {
                foreach ($arr_huong as $key1 => $value1) {
                    if ($value == $key1) {
                        $mang3[] = $value1;
                    }
                }
            }
            // print_r($mang3);
            // n???i key_quemenh v???i gi?? tr??? c???a mang_chon ????a c??c gi?? tri ???????c n???i v??o m???t m???ng m???i
            foreach ($huong_tot as $key => $value) {
                array_push($mang_cungsinh_menh_tot, $key_quemenh . $value);
            }
            foreach ($huong_xau as $key => $value) {
                array_push($mang_cungsinh_menh_xau, $key_quemenh . $value);
            }

            // so s??nh gi?? tr??? c???a m???ng m???i v???i key c???a m???ng cung sinh l???y ra t??n c??c cung sinh
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
                    'name' => 'Xem b??i cung m???nh',
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
                    'name' => 'Xem b??i',
                    'slug' => 'xem-boi',
                ),
                1 => array(
                    'name' => 'Xem b??i cung m???nh',
                    'slug' => 'xem-boi-cung-menh-theo-nam-sinh',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->seolink_cst($param);
        /** ??i???u h?????ng t??? vi 2020 */
        if ($_POST) {
            $namsinh = $_POST['namsinh'];
            $gioi_tinh_id = $_POST['gioitinh'] == 'nam' ? 1 : 2;
            $gioi_tinh_text = $_POST['gioitinh'] == 'nam' ? 'nam' : 'n???';
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong(9, 4, $namsinh);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $data['dieu_huong_tv_2020_link'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array(
                'nam_sinh' => $namsinh,
                'gioi_tinh' => 1,
                'nam_xem' => 2021
            ));
            $data['dieu_huong_tv_2020_text'] = 'Xem v???n m???nh t??? vi tu???i ' . $nam_can_chi_text . ' n??m 2021 ' . $gioi_tinh_text . ' m???ng';
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
            $this->form_validation->set_rules('namsinh', 'N??m sinh', 'required');
            $this->form_validation->set_rules('tenxe', 'T??n xe', 'required');
            $this->form_validation->set_rules('bienso', 'Bi???n s???', 'required');
            $this->form_validation->set_rules('somay', 'S??? m??y', 'required');
            $this->form_validation->set_rules('sokhung', 'S??? khung', 'required');
            $this->form_validation->set_rules('id_mausacxe', 'M??u xe', 'required');
            $this->form_validation->set_message('required', 'Vui l??ng kh??ng ????? tr???ng {field}');
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
                $sql_nam = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nam m???ng%" and name like "%2019%"';
                $sql_nu = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%n??? m???ng%" and name like "%2019%"';
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
                'name' => 'Xem b??i',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'B??i bi???n s??? xe',
                'slug' => 'xem-boi-bien-so-xe',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** ??i???u h?????ng t??? vi 2020 */
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
            $data['dieu_huong_tv_2020_text_nam'] = 'Xem c??ng danh s??? nghi???p tu???i ' . $nam_can_chi_text . ' n??m 2021 nam m???ng';
            $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array(
                'nam_sinh' => $namsinh,
                'gioi_tinh' => 2,
                'nam_xem' => 2021
            ));
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem v???n h???n tu???i ' . $nam_can_chi_text . ' n??m 2021 n??? m???ng';
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
                $data['error'] = 'C???N ??I???N ?????Y ????? V?? CH??NH X??C TH??NG TIN !' . validation_errors();
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
                'name' => 'Xem b??i',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'B??i s??? ??i???n tho???i',
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
            'moc' => 'M???c',
            'thuy' => 'Th???y',
            'hoa' => 'H???a',
            'tho' => 'Th???',
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
                    'name' => 'Xem m??u h???p m???nh',
                    'slug' => 'xem-mau-hop-menh',
                ),
                1 => array(
                    'name' => 'M???nh ' . $menh_text,
                    'slug' => 'xem-mau-hop-menh/menh-' . $this->vnkey->format_key($menh_text) . '-hop-mau-gi',
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem b??i',
                    'slug' => 'xem-boi',
                ),
                1 => array(
                    'name' => 'Xem m??u h???p m???nh',
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
            'trenmoi' => 'Tr??n M??i',
            'moi' => 'M??i',
            'duoimoi' => 'D?????i M??i',
            'giuatrongmat' => 'Gi???a Tr??ng M???t',
            'duoimat' => 'D?????i M???t',
            'longtrangmat' => 'L??ng Tr???ng M???t',
            'ganduoimat' => 'G???n ??u??i M???t',
            'trenmat' => 'Tr??n M???t',
            'khoemat' => 'Kh??e M???t',
            'longmay' => 'L??ng M??y',
            'cungnoboc' => 'Cung N?? B???c',
            'cungdiakho' => 'Cung ?????a Kh???',
            'phaplenh' => 'Ph??p L???nh',
            'luongquyen' => 'L?????ng Quy???n',
            'mangmon' => 'M???ng M??n',
            'gianmon' => 'Gian M??n',
            'thienthuong' => 'Thi??n Th????ng',
            'dichma' => 'D???ch M??',
            'phucduong' => 'Ph??c ???????ng',
            'chinhtrung' => 'Ch??nh Trung',
            'anduong' => '???n ???????ng',
            'soncan' => 'S??n C??n',
            'tyhuong' => 'Ty H????ng',
            'chuandau' => 'Chu???n ?????u',
            'nguyetgiac' => 'Nguy???t Gi??c',
            'nhatgiac' => 'Nh???t Gi??c',
            'thiendinh' => 'Thi??n ????nh',
            'co' => '??? C???',
            'sauco' => 'Sau C???',
            'quanhco' => 'Quanh C???',
            'cotay' => 'C??? Tay',
            'longbantay' => 'L??ng B??n Tay',
            'chan' => '??? Ch??n',
            'bapchan' => 'B???p Ch??n',
            'trennguoi' => 'Tr??n Ng?????i',
            'bavai' => 'B??? Vai',
            'nach' => 'N??ch',
            'mong' => 'M??ng',
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
                'name' => 'Xem b??i',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Xem b??i n???t ru???i',
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
                'name' => 'Xem b??i',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Xem b??i ki???u',
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
                'name' => 'Xem b??i',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'Xem b??i t??n',
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
                    'name' => 'B??i ch??? tay',
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
                    'name' => 'Xem b??i',
                    'slug' => 'xem-boi',
                ),
                1 => array(
                    'name' => 'B??i ch??? tay',
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

        $this->form_validation->set_rules('txtcmt', 'S??? ch???ng minh nh??n d??n',
            'required|numeric|min_length[9]|max_length[12]');
        $this->form_validation->set_rules('ngay', 'ng??y sinh', 'required');
        $this->form_validation->set_rules('thang', 'th??ng sinh', 'required');
        $this->form_validation->set_rules('txtnam', 'n??m sinh', 'required');

        $this->form_validation->set_message('required', 'Vui l??ng kh??ng ????? tr???ng {field}.');
        $this->form_validation->set_message('numeric', '{field} ch??? ???????c l?? s???.');
        $this->form_validation->set_message('min_length', '{field} ph???i t??? 9 ?????n 12 k?? t???.');
        $this->form_validation->set_message('max_length', '{field} ph???i t??? 9 ?????n 12 k?? t???.');

        if ($_POST) {
            if ($this->form_validation->run()) {
                $this->submit = 1;
                $arr_nguhanh = array(
                    '0' => 'Th???y',
                    '1' => 'Th???y',
                    '2' => 'Th???',
                    '3' => 'M???c',
                    '4' => 'M???c',
                    '5' => 'Th???',
                    '6' => 'Kim',
                    '7' => 'Kim',
                    '8' => 'Th???',
                    '9' => 'H???a',
                );
                // m???ng qu??i
                $arr_quai = array(
                    '1' => 'C??n',
                    '2' => '??o??i',
                    '3' => 'Ly',
                    '4' => 'Ch???n',
                    '5' => 'T???n',
                    '6' => 'Kh???m',
                    '7' => 'C???n',
                    '8' => 'Kh??n',
                );
                $arr_quechu = array(
                    '11' => 'Thu???n C??n (??? qi??n)',
                    '12' => 'Thi??n Tr???ch L?? (??? l??)',
                    '13' => 'Thi??n H???a ?????ng Nh??n (?????? t??ng r??n)',
                    '14' => 'Thi??n L??i V?? V???ng (?????? w?? w??ng)',
                    '15' => 'Thi??n Phong C???u (??? g??u)',
                    '16' => 'Thi??n Th???y T???ng (??? s??ng)',
                    '17' => 'Thi??n S??n ?????n (??? d??n)',
                    '18' => 'Thi??n ?????a B?? (??? p??)',
                    '21' => 'Tr???ch Thi??n Qu???i (??? gu??i)',
                    '22' => 'Thu???n ??o??i (??? du??)',
                    '23' => 'Tr???ch H???a C??ch (??? g??)',
                    '24' => 'Tr???ch L??i T??y (??? su??)',
                    '25' => 'Tr???ch Phong ?????i Qu?? (?????? d?? gu??)',
                    '26' => 'Tr???ch Th???y Kh???n (??? k??n)',
                    '27' => 'Tr???ch S??n H??m (??? xi??n)',
                    '28' => 'Tr???ch ?????a T???y (??? cu??)',
                    '31' => 'H???a Thi??n ?????i H???u (?????? d?? y??u)',
                    '32' => 'H???a Tr???ch Khu?? (??? ku??)',
                    '33' => 'Thu???n Ly (??? l??)',
                    '34' => 'H???a L??i Ph??? H???p (?????? sh?? k??)',
                    '35' => 'H???a Phong ?????nh (??? d??ng)',
                    '36' => 'H???a Th???y V??? T??? (?????? w??i j??)',
                    '37' => 'H???a S??n L??? (??? l??)',
                    '38' => 'H???a ?????a T???n (??? j??n)',
                    '41' => 'L??i Thi??n ?????i Tr??ng (?????? d?? zhu??ng)',
                    '42' => 'L??i Tr???ch Quy Mu???i (?????? gu?? m??i)',
                    '43' => 'L??i H???a Phong (??? f??ng)',
                    '44' => 'Thu???n Ch???n (??? zh??n)',
                    '45' => 'L??i Phong H???ng (??? h??ng)',
                    '46' => 'L??i Th???y Gi???i (??? xi??)',
                    '47' => 'L??i S??n Ti???u Qu?? (?????? xi??o gu??)',
                    '48' => 'L??i ?????a D??? (??? y??)',
                    '51' => 'Phong Thi??n Ti???u S??c (?????? xi??o ch??)',
                    '52' => 'Phong Tr???ch Trung Phu (?????? zh??ng f??)',
                    '53' => 'Phong H???a Gia Nh??n (?????? ji?? r??n)',
                    '54' => 'Phong L??i ??ch (??? y??)',
                    '55' => 'Thu???n T???n (??? x??n)',
                    '56' => 'Phong Th???y Ho??n (??? hu??n)',
                    '57' => 'Phong S??n Ti???m (??? ji??n)',
                    '58' => 'Phong ?????a Quan (??? gu??n)',
                    '61' => 'Th???y Thi??n Nhu (??? x??)',
                    '62' => 'Th???y Tr???ch Ti???t (??? ji??)',
                    '63' => 'Th???y H???a K?? T??? (?????? j?? j??)',
                    '64' => 'Th???y L??i Tru??n (??? ch??n)',
                    '65' => 'Th???y Phong T???nh (??? j??ng)',
                    '66' => 'Thu???n Kh???m (??? k??n)',
                    '67' => 'Th???y S??n Ki???n (??? ji??n)',
                    '68' => 'Th???y ?????a T??? (??? b??)',
                    '71' => 'S??n Thi??n ?????i S??c (?????? d?? ch??)',
                    '72' => 'S??n Tr???ch T???n (??? s??n)',
                    '73' => 'S??n H???a B?? (??? b??)',
                    '74' => 'S??n L??i Di (??? y??)',
                    '75' => 'S??n Phong C??? (??? g??)',
                    '76' => 'S??n Th???y M??ng (??? m??ng)',
                    '77' => 'Thu???n C???n (??? g??n)',
                    '78' => 'S??n ?????a B??c (??? b??)',
                    '81' => '?????a Thi??n Th??i (??? t??i)',
                    '82' => '?????a Tr???ch L??m (??? l??n)',
                    '83' => '?????a H???a Minh Di (?????? m??ng y??)',
                    '84' => '?????a L??i Ph???c (??? f??)',
                    '85' => '?????a Phong Th??ng (??? sh??ng)',
                    '86' => '?????a Th???y S?? (??? sh??)',
                    '87' => '?????a S??n Khi??m (??? qi??n)',
                    '88' => 'Thu???n Kh??n (??? k??n)',
                );
                $arr_queho = array(
                    '11' => 'Thu???n C??n (??? qi??n)',
                    '12' => 'Phong H???a Gia Nh??n (?????? ji?? r??n)',
                    '13' => 'Thi??n Phong C???u (??? g??u)',
                    '14' => 'Phong S??n Ti???m (??? ji??n',
                    '15' => 'Thu???n C??n (??? qi??n)',
                    '16' => 'Phong H???a Gia Nh??n (?????? ji?? r??n)',
                    '17' => 'Thi??n Phong C???u (??? g??u)',
                    '18' => 'Phong S??n Ti???m (??? ji??n)',
                    '21' => 'Thu???n C??n (??? qi??n)',
                    '22' => 'Phong H???a Gia Nh??n (?????? ji?? r??n)',
                    '23' => 'Thi??n Phong C???u (??? g??u)',
                    '24' => 'Phong S??n Ti???m (??? ji??n)',
                    '25' => 'Thu???n C??n (??? qi??n)',
                    '26' => 'Phong H???a Gia Nh??n (?????? ji?? r??n)',
                    '27' => 'Thi??n Phong C???u (??? g??u)',
                    '28' => 'Phong S??n Ti???m (??? ji??n)',
                    '31' => 'Tr???ch Thi??n Qu???i (??? gu??i)',
                    '32' => 'Th???y H???a K?? T??? (?????? j?? j??)',
                    '33' => 'Tr???ch Phong ?????i Qu?? (?????? d?? gu??)',
                    '34' => 'Th???y S??n Ki???n (??? ji??n)',
                    '35' => 'Tr???ch Thi??n Qu???i (??? gu??i)',
                    '36' => 'Th???y H???a K?? T??? (?????? j?? j??)',
                    '37' => 'Tr???ch Phong ?????i Qu?? (?????? d?? gu??)',
                    '38' => 'Th???y S??n Ki???n (??? ji??n)',
                    '41' => 'Tr???ch Thi??n Qu???i (??? gu??i)',
                    '42' => 'Th???y H???a K?? T??? (?????? j?? j??)',
                    '43' => 'Tr???ch Phong ?????i Qu?? (?????? d?? gu??)',
                    '44' => 'Th???y S??n Ki???n (??? ji??n)',
                    '45' => 'Tr???ch Thi??n Qu???i (??? gu??i)',
                    '46' => 'Th???y H???a K?? T??? (?????? j?? j??)',
                    '47' => 'Tr???ch Phong ?????i Qu?? (?????? d?? gu??',
                    '48' => 'Th???y S??n Ki???n (??? ji??n)',
                    '51' => 'H???a Tr???ch Khu?? (??? ku??)',
                    '52' => 'S??n L??i Di (??? y??)',
                    '53' => 'H???a Th???y V??? T??? (?????? w??i j??)',
                    '54' => 'S??n ?????a B??c (??? b??)',
                    '55' => 'H???a Tr???ch Khu?? (??? ku??)',
                    '56' => 'S??n L??i Di (??? y??)',
                    '57' => 'H???a Th???y V??? T??? (?????? w??i j??)',
                    '58' => 'S??n ?????a B??c (??? b??)',
                    '61' => 'H???a Tr???ch Khu?? (??? ku??)',
                    '62' => 'S??n L??i Di (??? y??)',
                    '63' => 'H???a Th???y V??? T??? (?????? w??i j??',
                    '64' => 'S??n ?????a B??c (??? b??)',
                    '65' => 'H???a Tr???ch Khu?? (??? ku??)',
                    '66' => 'S??n L??i Di (??? y??)',
                    '67' => 'H???a Th???y V??? T??? (?????? w??i j??)',
                    '68' => 'S??n ?????a B??c (??? b??)',
                    '71' => 'L??i Tr???ch Quy Mu???i (?????? gu?? m??i)',
                    '72' => '?????a L??i Ph???c (??? f??)',
                    '73' => 'L??i Th???y Gi???i (??? xi??)',
                    '74' => 'Thu???n Kh??n (??? k??n)',
                    '75' => 'L??i Tr???ch Quy Mu???i (?????? gu?? m??i)',
                    '76' => '?????a L??i Ph???c (??? f??)',
                    '77' => 'L??i Th???y Gi???i (??? xi??)',
                    '78' => 'Thu???n Kh??n (??? k??n)',
                    '81' => 'L??i Tr???ch Quy Mu???i (?????? gu?? m??i)',
                    '82' => '?????a L??i Ph???c (??? f??)',
                    '83' => 'L??i Th???y Gi???i (??? xi??)',
                    '84' => 'Thu???n Kh??n (??? k??n)',
                    '85' => 'L??i Tr???ch Quy Mu???i (?????? gu?? m??i)',
                    '86' => '?????a L??i Ph???c (??? f??)',
                    '87' => 'L??i Th???y Gi???i (??? xi??)',
                    '88' => 'Thu???n Kh??n (??? k??n)',
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
                    $sql_nam = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nam m???ng%" and name like "%2019%"';
                    $sql_nu = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%n??? m???ng%" and name like "%2019%"';
                    $oneAge_nam = $this->article_model->getQuery($sql_nam);
                    $oneAge_nu = $this->article_model->getQuery($sql_nu);
                    $data['oneAgeNam'] = $oneAge_nam;
                    $data['oneAgeNu'] = $oneAge_nu;

                    $ns = $ngay . $thang . $nam;
                    $loaicmt = strlen($cmt);
                    $arr1 = str_split($cmt);
                    $arr2 = str_split($ns);
                    // X??c ?????nh ?? ngh??a c???a tu???i v?? s??? ch???ng minh th??
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
                                // sum_end l?? k???t qu??? cu???i c??ng t??nh ???????c theo c??ng th???c
                            }
                        }
                    }
                    // X??c ?????nh ng?? h??nh c???a s??? ch???ng minh th??.
                    $so_cuoi = end($arr1); //l???y ph???n t??? cu???i c??ng c???a m???ng(s??? cu???i c??ng c???a cmt)
                    // X??c ?????nh c??c s??? trong cmt thu???c ng?? h??nh n??o v?? ????a v?? c??c m???ng t????ng ???ng.
                    // 0,1 => Th???y
                    // 2,5,8 => Th???
                    // 3,4 => M???c
                    // 6,7 => Kim
                    //  9 => H???a
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
                    // n???u c??c m???ng tr??n kh??ng r???ng th?? ?????m s??? ph???n t??? m???i m???ng.
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
                    // cmt lo???i 9 s??? => m???ng n??o c?? >= 4 ph???n t??? => Ng?? H??nh CMT (1)
                    // cmt lo???i 12 s??? => m???ng n??o c?? >=5 ph???n t??? => Ng?? H??nh CMT (2)
                    // n???u t???n t???i bi???n ?????m s??? ph???n t??? m???i m???ng ??? tr??n th?? ki???m tra xem m???ng n??o c?? s??? ph???n t??? nh?? (1) ho???c (2) n???u kh??ng c?? m???ng n??o ????p ???ng ??i???u ki???n tr??n th?? l???y s??? cu???i c??ng c???a CMT l?? Ng?? H??nh.
                    if ($loaicmt == 9) {
                        if (isset($so_thuy) && $so_thuy >= 4) {
                            $ngu_hanh = 'Th???y';
                        } else {
                            if (isset($so_hoa) && $so_hoa >= 4) {
                                $ngu_hanh = 'H???a';
                            } else {
                                if (isset($so_moc) && $so_moc >= 4) {
                                    $ngu_hanh = 'M???c';
                                } else {
                                    if (isset($so_tho) && $so_tho >= 4) {
                                        $ngu_hanh = 'Th???';
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
                                $ngu_hanh = 'Th???y';
                            } else {
                                if (isset($so_hoa) && $so_hoa >= 5) {
                                    $ngu_hanh = 'H???a';
                                } else {
                                    if (isset($so_moc) && $so_moc >= 5) {
                                        $ngu_hanh = 'M???c';
                                    } else {
                                        if (isset($so_tho) && $so_tho >= 5) {
                                            $ngu_hanh = 'Th???';
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
                                'S??? B???n nh???p v??o kh??ng ph???i l?? s??? ch???ng minh th??, vui l??ng nh???p s??? ch???ng minh th??!');
                            $this->session->set_flashdata('item', $ms);
                            redirect(base_url($this->uri->uri_string() . '.html'));
                        }
                    }
                    // X??c ?????nh qu??? ch??? c???a s??? ch???ng minh th??
                    // lo???i 9 s??? 5 s??? ?????u l?? qu??? th?????ng 4 s??? cu???i l?? qu??? h???
                    // lo???i 12 s??? 6 s??? ?????u l?? qu??? th?????ng 6 s??? cu???i l?? qu??? h???
                    // sau khi x??c ??inh ???????c qu??? th?????ng v?? qu??? h??? chia t???ng m???ng cho 8 l???y s??? d?? => qu??? ch???
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
                    // n???u s??? d?? # 0 th?? s??? d?? == s??? d??, s??? d?? == 0 th?? s??? d?? == 8
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
                    // N???i 2 s??? d?? v?? duy???t m???ng $arr_quechu => Qu??? ch???
                    $noidung = noidung_cmt(); // ham noi dung trong helper
                    $f = $g . $h;
                    $data['nguhanh'] = $ngu_hanh; // ng?? h??nh s??? cmt
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
                    // l???y t??n c???a qu??? h???
                    foreach ($arr_queho as $key => $value) {
                        if ($f == $key) {
                            $data['queho'] = $value;
                            $que_ho = $value;
                        }
                    }
                    // d???a v??o t??n c???a qu??? h??? t??m key trong m???ng qu??? ch??? => truy v???n n???i dung theo key t??m th???y.
                    $key_queho = array_search($que_ho, $arr_quechu); // t??m key
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
                'name' => 'Xem b??i',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'B??i CMND',
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
            $data['dieu_huong_tv_2020_text_nam'] = 'Xem t??? vi tu???i ' . $nam_can_chi_text . ' n??m 2020 nam m???ng';
            $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array(
                'nam_sinh' => $nam_sinh_am,
                'gioi_tinh' => 2
            ));
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem t??? vi tu???i ' . $nam_can_chi_text . ' n??m 2020 n??? m???ng';
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
                'name' => 'Xem b??i',
                'slug' => 'xem-boi',
            ),
            1 => array(
                'name' => 'B??i b??i tarot',
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
