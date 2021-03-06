<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Xemngay extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $action_view_mobile = '';
    public $view = 'index';
    public $view_mobile = 'index_mobile';
    public $submit_form = 0;
    private $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    );

    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() .
            '/' . $this->router->fetch_method();
        $this->action_view_mobile = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '_mobile';
        $this->view = $this->module_view . '/' . $this->view;
        $this->view_mobile = $this->module_view . '/' . $this->view_mobile;
        $this->load->library(array(
            'site/lib_xemngay',
            'site/ngayamduong',
            'site/my_seolink',
            'site/lib_xemngay_demo',
            'site/comment_lib'
        ));
        $this->load->helper(array('my_menh', 'form', 'xemngay'));
    }

    public function home($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay != null && $thang != null && $nam != null) {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
        } else {
            $duonglich = $this->ngayamduong->get_current_date();
        }
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchithang = $this->ngayamduong->get_canchi_thang($amlich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $data['ngaythu'] = $this->ngayamduong->get_ngaythu($duonglich);
        $data['duonglich'] = $duonglich;
        $data['amlich'] = $amlich;
        $data['ngaycanchi'] = $this->ngayamduong->get_canchi_ngay($duonglich, 'text');
        $data['thangcanchi'] = $this->ngayamduong->get_canchi_thang($amlich, 'text');
        $data['namcanchi'] = $this->ngayamduong->get_canchi_nam($amlich, 'text');
        $data['tietkhi'] = $this->lib_xemngay->xacdinh_tietkhi('text');
        $data['nguhanh'] = $this->lib_xemngay->xacdinh_nguhanh('text');
        $data['thapnhibattu'] = $this->lib_xemngay->xacdinh_nhithapbattu($this->ngayamduong->get_songaytrongthang($duonglich));
        $tietkhi = $this->lib_xemngay->xacdinh_tietkhi();
        $data['trucngay'] = $this->lib_xemngay->xacdinh_trucngay($tietkhi, 'text');
        $data['cat_tinh_nhat_than_can'] = $this->lib_xemngay->xacdinh_cattinhnhatthan_tcan('text');
        $data['cat_tinh_nhat_than_chi'] = $this->lib_xemngay->xacdinh_cattinhnhatthan_tchi('text');
        $data['cat_than_tinh_nhat_dac_biet'] = $this->lib_xemngay->xacdinh_cattinhnhatthan_dacbiet('text');
        $data['hung_tinh_can'] = $this->lib_xemngay->xacdinh_saohungtinh_tcan('text');
        $data['hung_tinh_chi'] = $this->lib_xemngay->xacdinh_saohungtinh_tchi('text');
        $data['hung_tinh_can_chi'] = $this->lib_xemngay->xacdinh_saohungtinh_tcanchi('text');
        $data['huong_hy_than'] = $this->lib_xemngay->xacdinh_phuongvi_hythan('text');
        $data['huong_tai_than'] = $this->lib_xemngay->xacdinh_phuongvi_taithan('text');
        $data['huong_hac_than'] = $this->lib_xemngay->xacdinh_phuongvi_hacthan('text');
        $data['tuoi_xung_ngay'] = $this->lib_xemngay->xacdinh_tuoi_xung_ngay();
        $data['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $data['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $data['luc_dieu'] = $this->lib_xemngay->xacdinh_lucdieu();
        $data['ngay_ky'] = $this->lib_xemngay->xacdinh_ngayky();
        $data = serialize($data);
        echo $data;
    }

    function get_info($input)
    {
        $arr_tinhngay_ki = array(
            'ngayamlich' => $input['ngayamlich'],
            'thang' => $input['thangamlich'],
            'namamlich' => $input['namamlich'],
            'chingay' => get_chi_menh($input['chingay']),
            'canngay' => get_can_menh($input['canngay']),
            'cannam' => get_can_menh($input['cannam']),
            'chinam' => get_chi_menh($input['chinam']),
            'ngayduong' => $input['ngayduong'],
            'thangduong' => $input['thangduong'],
            'namduong' => $input['namduong'],
        );
        $result_tinhngayki = $this->lib_xemngay_demo->tinhngay_ki($arr_tinhngay_ki); // mang ngay nguyet ki
        $result_nguhanh_huongdi = $this->lib_xemngay_demo->tinh_nguhanh($arr_tinhngay_ki);
        $result_tinh_banhtobachkinhat = $this->lib_xemngay_demo->tinh_banhtobachkinhat($arr_tinhngay_ki);
        $result_tinh_khongminh = $this->lib_xemngay_demo->tinh_khongminhlucdieu($arr_tinhngay_ki);
        $result_tinhsaototsaoxau = $this->lib_xemngay_demo->tinh_saototsaoxau($arr_tinhngay_ki);
        $result_tinhthapnhibattu = $this->lib_xemngay_demo->tinh_thapnhibattu($arr_tinhngay_ki);
        $result_xacdinhtietkhi = $this->lib_xemngay_demo->xacdinh_tietkhi($arr_tinhngay_ki);
        $result_tinhtrucngay = $this->lib_xemngay_demo->xacdinh_trucngay($arr_tinhngay_ki, $result_xacdinhtietkhi);
        $data['arr_tinhngay_ki'] = $arr_tinhngay_ki;
        $data['result_tinhngayki'] = $result_tinhngayki;
        $data['result_nguhanh_huongdi'] = $result_nguhanh_huongdi;
        $data['result_tinh_banhtobachkinhat'] = $result_tinh_banhtobachkinhat;
        $data['result_tinh_khongminh'] = $result_tinh_khongminh;
        $data['result_tinhthapnhibattu'] = $result_tinhthapnhibattu;
        $data['result_tinhtrucngay'] = $result_tinhtrucngay;
        $data['result_tinhsaototsaoxau'] = $result_tinhsaototsaoxau;
        return $data;
    }


    public function index($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay != null && $thang != null && $nam != null) {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = $this->ngayamduong->get_current_date();
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-trong-thang-$thang-nam-$nam';
        $result_table_lich = $this->get_lich($duonglich[1], $duonglich[2]);
        $data['result_table_lich'] = $result_table_lich;

        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchithang = $this->ngayamduong->get_canchi_thang($amlich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['ngaythu'] = $this->ngayamduong->get_ngaythu($duonglich);
        $xemngay['duonglich'] = $duonglich;
        $xemngay['amlich'] = $amlich;
        $xemngay['ngaycanchi'] = $this->ngayamduong->get_canchi_ngay($duonglich, 'text');
        $xemngay['thangcanchi'] = $this->ngayamduong->get_canchi_thang($amlich, 'text');
        $xemngay['namcanchi'] = $this->ngayamduong->get_canchi_nam($amlich, 'text');
        $xemngay['tietkhi'] = $this->lib_xemngay->xacdinh_tietkhi('text');
        $xemngay['nguhanh'] = $this->lib_xemngay->xacdinh_nguhanh('text');
        $xemngay['thapnhibattu'] = $this->lib_xemngay->xacdinh_nhithapbattu($this->ngayamduong->get_songaytrongthang($duonglich));
        $tietkhi = $this->lib_xemngay->xacdinh_tietkhi();
        $xemngay['trucngay'] = $this->lib_xemngay->xacdinh_trucngay($tietkhi, 'text');
        $xemngay['cat_tinh_nhat_than_can'] = $this->lib_xemngay->xacdinh_cattinhnhatthan_tcan('text');
        $xemngay['cat_tinh_nhat_than_chi'] = $this->lib_xemngay->xacdinh_cattinhnhatthan_tchi('text');
        $xemngay['cat_than_tinh_nhat_dac_biet'] = $this->lib_xemngay->xacdinh_cattinhnhatthan_dacbiet('text');
        $xemngay['hung_tinh_can'] = $this->lib_xemngay->xacdinh_saohungtinh_tcan('text');
        $xemngay['hung_tinh_chi'] = $this->lib_xemngay->xacdinh_saohungtinh_tchi('text');
        $xemngay['hung_tinh_can_chi'] = $this->lib_xemngay->xacdinh_saohungtinh_tcanchi('text');
        $xemngay['huong_hy_than'] = $this->lib_xemngay->xacdinh_phuongvi_hythan('text');
        $xemngay['huong_tai_than'] = $this->lib_xemngay->xacdinh_phuongvi_taithan('text');
        $xemngay['huong_hac_than'] = $this->lib_xemngay->xacdinh_phuongvi_hacthan('text');
        $xemngay['tuoi_xung_ngay'] = $this->lib_xemngay->xacdinh_tuoi_xung_ngay();
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $xemngay['luc_dieu'] = $this->lib_xemngay->xacdinh_lucdieu();
        $xemngay['ngay_ky'] = $this->lib_xemngay->xacdinh_ngayky();
        $xemngay['tot_xau'] = $this->lib_xemngay->xemngay_kyhopdong($amlich, $canchingay);
        $tot_cho_cong_viec = array();
        if ($this->lib_xemngay->xemngay_xaydung($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'l??m nh??';
        }
        if ($this->lib_xemngay->xemngay_antang($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'an t??ng';
        }
        if ($this->lib_xemngay->xemngay_kyhopdong($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'k?? h???p ?????ng';
        }
        if ($this->lib_xemngay->xemngay_nhanchuc($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'nh???n ch???c';
        }
        if ($this->lib_xemngay->xemngay_dotranlopmai($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = '????? tr???n l???p m??i';
        }
        if ($this->lib_xemngay->xemngay_nhaptrachnhamoi($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'nh???p tr???ch nh?? m???i';
        }
        if ($this->lib_xemngay->xemngay_xuathanh($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'xu???t h??nh';
        }
        if ($this->lib_xemngay->xemngay_muanha($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'mua nh??';
        }
        if ($this->lib_xemngay->xemngay_dongtho($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = '?????ng th???';
        }
        if ($this->lib_xemngay->xemngay_kethon($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'k???t h??n';
        }
        if ($this->lib_xemngay->xemngay_khaitruong($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'khai tr????ng';
        }
        if ($this->lib_xemngay->xemngay_muaxe($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'mua xe';
        }
        $xemngay['tot_cho_cong_viec'] = $tot_cho_cong_viec;
        $data['xemngay'] = $xemngay;
        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';
        $data['ngayketiep'] = $this->list_xemngayketiep($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich));
        $data['listngaytot'] = $this->info_listdatenext(0, $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich));
        if ($this->uri->uri_string() == 'xem-ngay-tot-xau') {
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        } else {
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme('xem-ngay-tot-xau/ngay-$ngay-thang-$thang-nam-$nam');
        }
        // get breadcrumb
        if ($ngay != null && $thang != null && $nam != null) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y t???t x???u',
                    'slug' => 'xem-ngay-tot-xau',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-xau/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y t???t x???u',
                    'slug' => 'xem-ngay-tot-xau',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);

        $arr_tinhngay_ki = array(
            'ngayamlich' => $amlich[0],
            'thang' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => get_chi_menh($canchingay['chi']),
            'canngay' => get_can_menh($canchingay['can']),
            'cannam' => get_can_menh($canchinam['can']),
            'chinam' => get_chi_menh($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result_tinhngayki = $this->lib_xemngay_demo->tinhngay_ki($arr_tinhngay_ki); // mang ngay nguyet ki
        $result_nguhanh_huongdi = $this->lib_xemngay_demo->tinh_nguhanh($arr_tinhngay_ki);
        $result_tinh_banhtobachkinhat = $this->lib_xemngay_demo->tinh_banhtobachkinhat($arr_tinhngay_ki);
        $result_tinh_khongminh = $this->lib_xemngay_demo->tinh_khongminhlucdieu($arr_tinhngay_ki);
        $result_tinhsaototsaoxau = $this->lib_xemngay_demo->tinh_saototsaoxau($arr_tinhngay_ki);
        $result_tinhsaototsaoxau_name = $this->lib_xemngay_demo->tinh_saototsaoxau_name();
        $result_tinhthapnhibattu = $this->lib_xemngay_demo->tinh_thapnhibattu($arr_tinhngay_ki);
        $result_xacdinhtietkhi = $this->lib_xemngay_demo->xacdinh_tietkhi($arr_tinhngay_ki);
        $result_tinhtrucngay = $this->lib_xemngay_demo->xacdinh_trucngay($arr_tinhngay_ki, $result_xacdinhtietkhi);
        $data['arr_tinhngay_ki'] = $arr_tinhngay_ki;
        $data['result_tinhngayki'] = $result_tinhngayki;
        $data['result_nguhanh_huongdi'] = $result_nguhanh_huongdi;
        $data['result_tinh_banhtobachkinhat'] = $result_tinh_banhtobachkinhat;
        $data['result_tinh_khongminh'] = $result_tinh_khongminh;
        $data['result_tinhthapnhibattu'] = $result_tinhthapnhibattu;
        $data['result_tinhtrucngay'] = $result_tinhtrucngay;
        $data['result_tinhsaototsaoxau'] = $result_tinhsaototsaoxau;
        $data['result_tinhsaototsaoxau_name'] = $result_tinhsaototsaoxau_name;
        /** end **/
        if (isset($_GET['component'])) {
            return $this->load->view('site/xemngay/index', $data);
        }
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
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

    public function chitiet($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay != null && $thang != null && $nam != null) {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = $this->ngayamduong->get_current_date();
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-trong-thang-$thang-nam-$nam';
        $result_table_lich = $this->get_lich($duonglich[1], $duonglich[2]);
        $data['result_table_lich'] = $result_table_lich;

        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchithang = $this->ngayamduong->get_canchi_thang($amlich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['ngaythu'] = $this->ngayamduong->get_ngaythu($duonglich);
        $xemngay['duonglich'] = $duonglich;
        $xemngay['amlich'] = $amlich;
        $xemngay['ngaycanchi'] = $this->ngayamduong->get_canchi_ngay($duonglich, 'text');
        $xemngay['thangcanchi'] = $this->ngayamduong->get_canchi_thang($amlich, 'text');
        $xemngay['namcanchi'] = $this->ngayamduong->get_canchi_nam($amlich, 'text');
        $xemngay['tietkhi'] = $this->lib_xemngay->xacdinh_tietkhi('text');
        $xemngay['nguhanh'] = $this->lib_xemngay->xacdinh_nguhanh('text');
        $xemngay['thapnhibattu'] = $this->lib_xemngay->xacdinh_nhithapbattu($this->ngayamduong->get_songaytrongthang($duonglich));
        $tietkhi = $this->lib_xemngay->xacdinh_tietkhi();
        $xemngay['trucngay'] = $this->lib_xemngay->xacdinh_trucngay($tietkhi, 'text');
        $xemngay['cat_tinh_nhat_than_can'] = $this->lib_xemngay->xacdinh_cattinhnhatthan_tcan('text');
        $xemngay['cat_tinh_nhat_than_chi'] = $this->lib_xemngay->xacdinh_cattinhnhatthan_tchi('text');
        $xemngay['cat_than_tinh_nhat_dac_biet'] = $this->lib_xemngay->xacdinh_cattinhnhatthan_dacbiet('text');
        $xemngay['hung_tinh_can'] = $this->lib_xemngay->xacdinh_saohungtinh_tcan('text');
        $xemngay['hung_tinh_chi'] = $this->lib_xemngay->xacdinh_saohungtinh_tchi('text');
        $xemngay['hung_tinh_can_chi'] = $this->lib_xemngay->xacdinh_saohungtinh_tcanchi('text');
        $xemngay['huong_hy_than'] = $this->lib_xemngay->xacdinh_phuongvi_hythan('text');
        $xemngay['huong_tai_than'] = $this->lib_xemngay->xacdinh_phuongvi_taithan('text');
        $xemngay['huong_hac_than'] = $this->lib_xemngay->xacdinh_phuongvi_hacthan('text');
        $xemngay['tuoi_xung_ngay'] = $this->lib_xemngay->xacdinh_tuoi_xung_ngay();
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $xemngay['luc_dieu'] = $this->lib_xemngay->xacdinh_lucdieu();
        $xemngay['ngay_ky'] = $this->lib_xemngay->xacdinh_ngayky();
        $xemngay['tot_xau'] = $this->lib_xemngay->xemngay_kyhopdong($amlich, $canchingay);
        $tot_cho_cong_viec = array();
        if ($this->lib_xemngay->xemngay_xaydung($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'l??m nh??';
        }
        if ($this->lib_xemngay->xemngay_antang($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'an t??ng';
        }
        if ($this->lib_xemngay->xemngay_kyhopdong($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'k?? h???p ?????ng';
        }
        if ($this->lib_xemngay->xemngay_nhanchuc($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'nh???n ch???c';
        }
        if ($this->lib_xemngay->xemngay_dotranlopmai($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = '????? tr???n l???p m??i';
        }
        if ($this->lib_xemngay->xemngay_nhaptrachnhamoi($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'nh???p tr???ch nh?? m???i';
        }
        if ($this->lib_xemngay->xemngay_xuathanh($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'xu???t h??nh';
        }
        if ($this->lib_xemngay->xemngay_muanha($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'mua nh??';
        }
        if ($this->lib_xemngay->xemngay_dongtho($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = '?????ng th???';
        }
        if ($this->lib_xemngay->xemngay_kethon($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'k???t h??n';
        }
        if ($this->lib_xemngay->xemngay_khaitruong($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'khai tr????ng';
        }
        if ($this->lib_xemngay->xemngay_muaxe($amlich, $canchingay) == 'tot') {
            $tot_cho_cong_viec[] = 'mua xe';
        }
        $xemngay['tot_cho_cong_viec'] = $tot_cho_cong_viec;
        $data['xemngay'] = $xemngay;
        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';
        $data['ngayketiep'] = $this->list_xemngayketiep($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich));
        $data['listngaytot'] = $this->info_listdatenext(0, $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich));
        if ($this->uri->uri_string() == 'xem-ngay-tot-xau') {
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        } else {
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme('xem-ngay-tot-xau/ngay-$ngay-thang-$thang-nam-$nam');
        }
        // get breadcrumb
        if ($ngay != null && $thang != null && $nam != null) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y t???t x???u',
                    'slug' => 'xem-ngay-tot-xau',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-xau/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y t???t x???u',
                    'slug' => 'xem-ngay-tot-xau',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** customer **/
        $arr_tinhngay_ki = array(
            'ngayamlich' => $amlich[0],
            'thang' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => get_chi_menh($canchingay['chi']),
            'canngay' => get_can_menh($canchingay['can']),
            'cannam' => get_can_menh($canchinam['can']),
            'chinam' => get_chi_menh($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result_tinhngayki = $this->lib_xemngay_demo->tinhngay_ki($arr_tinhngay_ki); // mang ngay nguyet ki
        $result_nguhanh_huongdi = $this->lib_xemngay_demo->tinh_nguhanh($arr_tinhngay_ki);
        $result_tinh_banhtobachkinhat = $this->lib_xemngay_demo->tinh_banhtobachkinhat($arr_tinhngay_ki);
        $result_tinh_khongminh = $this->lib_xemngay_demo->tinh_khongminhlucdieu($arr_tinhngay_ki);
        $result_tinhsaototsaoxau = $this->lib_xemngay_demo->tinh_saototsaoxau($arr_tinhngay_ki);
        $result_tinhsaototsaoxau_name = $this->lib_xemngay_demo->tinh_saototsaoxau_name();
        $result_tinhthapnhibattu = $this->lib_xemngay_demo->tinh_thapnhibattu($arr_tinhngay_ki);
        $result_xacdinhtietkhi = $this->lib_xemngay_demo->xacdinh_tietkhi($arr_tinhngay_ki);
        $result_tinhtrucngay = $this->lib_xemngay_demo->xacdinh_trucngay($arr_tinhngay_ki, $result_xacdinhtietkhi);
        $data['arr_tinhngay_ki'] = $arr_tinhngay_ki;
        $data['result_tinhngayki'] = $result_tinhngayki;
        $data['result_nguhanh_huongdi'] = $result_nguhanh_huongdi;
        $data['result_tinh_banhtobachkinhat'] = $result_tinh_banhtobachkinhat;
        $data['result_tinh_khongminh'] = $result_tinh_khongminh;
        $data['result_tinhthapnhibattu'] = $result_tinhthapnhibattu;
        $data['result_tinhtrucngay'] = $result_tinhtrucngay;
        $data['result_tinhsaototsaoxau'] = $result_tinhsaototsaoxau;
        $data['result_tinhsaototsaoxau_name'] = $result_tinhsaototsaoxau_name;
        /** end **/
        if (isset($_GET['component'])) {
            return $this->load->view('site/xemngay/index', $data);
        }
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
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

    public function redirect_tool_ngay($input)
    {
        foreach ($input as $key => $value) {
            $sub_str = substr($value, 0, 1);
            if ($sub_str == 0) {
                redirect(base_url(), 'location', 301);
            }
        }
    }

    public function list_xemngayketiep($ngay, $thang, $nam, $songaytrongthang)
    {
        $html = '<ul>';
        for ($i = 1; $i <= 15; $i++) {
            if ($ngay == $songaytrongthang) {
                $ngay = 0;
                $thang++;
            }
            $ngay++;
            if ($thang > 12) {
                $thang = 1;
                $nam++;
            }
            $text = 'Xem ng??y t???t x???u ' . $ngay . ' th??ng ' . $thang . ' N??m ' . $nam;
            $html .= '<li><a href="' . base_url('xem-ngay-tot-xau/ngay-' . $ngay . '-thang-' .
                    $thang . '-nam-' . $nam . '.html') . '" title="' . $text . '" >' . $text .
                '</a></li>';
        }
        $html .= '</ul>';
        return $html;
    }

    public function info_listdatenext($ngay, $thang, $nam, $songaytrongthang, $type_date = null)
    {
        $list_date = null;
        $ngay = $ngay == 1 ? 0 : $ngay;
        for ($i = 1; $i <= ($songaytrongthang); $i++) {
            if ($ngay == $songaytrongthang) {
                $ngay = 0;
                $thang++;
            }
            $ngay++;
            if ($thang > 12) {
                $thang = 1;
                $nam++;
            }
            $duonglich = array($ngay, $thang, $nam);
            $amlich = $this->ngayamduong->get_amlich($duonglich);
            $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
            $canchithang = $this->ngayamduong->get_canchi_thang($amlich);
            $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
            $xemngay['amlich'] = $amlich;
            $xemngay['ngaythu'] = $this->ngayamduong->get_ngaythu($duonglich);
            $xemngay['duonglich'] = $duonglich;
            $xemngay['ngaycanchi'] = $this->ngayamduong->get_canchi_ngay($duonglich, 'text');
            $xemngay['thangcanchi'] = $this->ngayamduong->get_canchi_thang($amlich, 'text');
            $xemngay['namcanchi'] = $this->ngayamduong->get_canchi_nam($amlich, 'text');
            $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
            $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
            $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
            $ngayhientai = array(
                'tot' => 'T???t',
                'xau' => '<span class="color_black">X???u</span>',
                'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
            );
            switch ($type_date) {
                case 'ngaytotxaydung':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_xaydung($amlich, $canchingay)];
                    break;
                case 'ngayantang':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_antang($amlich, $canchingay)];
                    break;
                case 'ngaykyhopdong':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_kyhopdong($amlich, $canchingay)];
                    break;
                case 'ngaynhanchuc':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_nhanchuc($amlich, $canchingay)];
                    break;
                case 'dotranlopmai':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_dotranlopmai()];
                    break;
                case 'nhaptrachnhamoi':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_nhaptrachnhamoi($amlich,
                        $canchingay)];
                    break;
                case 'ngayxuathanh':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_xuathanh($amlich, $canchingay)];
                    break;
                case 'ngaymuanha':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_muanha($amlich, $canchingay)];
                    break;
                case 'dongtho':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_dongtho($amlich, $canchingay)];
                    break;
                case 'ngayhoangdao':
                    $ngayhientai = array(
                        'hoangdao' => 'Ho??ng ?????o',
                        'hacdao' => '<span class="color_black">H???c ?????o</span>'
                    );
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_hoangdao($amlich, $canchingay)];
                    break;
                case 'ngaykethon':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_kethon($amlich, $canchingay)];
                    break;
                case 'ngaykhaitruong':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_khaitruong($amlich,
                        $canchingay)];
                    break;
                case 'ngaymuaxe':
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_muaxe($amlich, $canchingay)];
                    break;
                default:
                    $xemngay['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_kyhopdong($amlich, $canchingay)];
                    break;
            }
            $list_date[$i] = $xemngay;
        }
        return $list_date;
    }

    function test()
    {
        $list_date = $this->info_listdatenext(5, 5, 2017, 31);
        dd($list_date);
    }

    public function danhsachngaytot()
    {
        $data['ngayduong']['ngay'] = 1;

        $data['ngayduong']['thang'] = 5;

        $data['ngayduong']['nam'] = 2016;

        $time = strtotime($data['ngayduong']['thang'] . '/' . $data['ngayduong']['ngay'] .
            '/' . $data['ngayduong']['nam']);

        $so_ngay_trong_thang = date('t', $time);

        for ($i = 1; $i <= $so_ngay_trong_thang; $i++) {
            $data['ngayduong']['ngay'] = $i;

            $amlich = xem_ngay_am($data['ngayduong']['ngay'], $data['ngayduong']['thang'], $data['ngayduong']['nam']);

            $data['ngayam']['ngay'] = $amlich[0];

            $data['ngayam']['thang'] = $amlich[1];

            $data['ngayam']['nam'] = $amlich[2];

            // NGAY CAN CHI.

            $n = getN($data['ngayduong']['ngay'], $data['ngayduong']['thang'], $data['ngayduong']['nam']);

            $so_ngay = songay($data['ngayduong']['ngay'], $data['ngayduong']['thang'], $data['ngayduong']['nam']);

            $can_chi_ngay = getCanChiNgay($n, $so_ngay, $data['ngayduong']['nam']);

            $ngay_hoang_dao = xn_ngay_hoang_dao($data['ngayam']['thang'], $can_chi_ngay['chi'], true);

            $lucdieu = xn_luc_dieu($data['ngayam']['thang'], $data['ngayam']['ngay'], true);

            $nhi_thap_bat_tu = xn_thap_nhi_bat_tu($data['ngayduong']['ngay'], $data['ngayduong']['thang'],
                $data['ngayduong']['nam'], true);

            $tietkhi = xem_tiet_khi($data['ngayduong']['ngay'], $data['ngayduong']['thang'],
                $data['ngayduong']['nam'], true);

            $truc_ngay = xn_xem_truc_ngay($can_chi_ngay['chi'], $tietkhi, true);

            $tot = $ngay_hoang_dao + $lucdieu + $nhi_thap_bat_tu + $truc_ngay;

            echo $tot . '-';

            if ($tot >= 3) {
                $ngay['tot'][] = $i . '-' . $tot;
            } else {
                $ngay['xau'][] = $i . '-' . $tot;
            }
        }
    }


    public function ngaytotxaydung($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-xay-dung-trong-thang-$thang-nam-$nam';
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'ngaytotxaydung');
        //dd($data['info_listdatenext']);
        /** end **/

        /*$chitietngay = file_get_contents(base_url('site/xemngay/home/' . $duonglich[0] .
            '/' . $duonglich[1] . '/' . $duonglich[2]), false, stream_context_create($this->
            arrContextOptions));

        $data['xemngay'] = unserialize($chitietngay);*/

        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);

        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );

        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_xaydung($amlich,
            $canchi)];

        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);

        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );

        $ngayduonglich = $duonglich;

        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;

            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);

            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);

            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);

            $rt = $this->lib_xemngay->xemngay_xaydung($ngayamlich, $canchi);

            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);

            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));

            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }

        $data['ngaytotxautrongthang'] = $mang;

        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();


        $data['name'] = ' x??y d???ng';

        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';

        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);

        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y x??y d???ng',
                    'slug' => 'xem-ngay-tot-xay-dung',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-xay-dung/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y x??y d???ng',
                    'slug' => 'xem-ngay-tot-xay-dung',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );

        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );

        $data['title'] = $this->my_seolink->get_title();

        $data['keywords'] = $this->my_seolink->get_keywords();

        $data['description'] = $this->my_seolink->get_description();

        $data['view'] = 'site/xemngay/ngaytotxaydung';

        $this->load->view('site/index', $data);
    }


    public function dotranlopmai($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-do-tran-lop-mai-trong-thang-$thang-nam-$nam';
        $amlich = $this->ngayamduong->get_amlich($duonglich);

        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);

        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'dotranlopmai');


        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);

        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );

        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_dotranlopmai()];

        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);

        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );

        $ngayduonglich = $duonglich;

        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;

            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);

            $canchingay = $this->ngayamduong->get_canchi_ngay($ngayduonglich);

            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchingay);

            $rt = $this->lib_xemngay->xemngay_dotranlopmai();

            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);

            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));

            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }

        $data['ngaytotxautrongthang'] = $mang;

        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();


        $data['name'] = ' ????? tr???n, l???p m??i';

        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';

        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y ????? m??i',
                    'slug' => 'xem-ngay-tot-do-tran-lop-mai',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-do-tran-lop-mai/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y ????? m??i',
                    'slug' => 'xem-ngay-tot-do-tran-lop-mai',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);

        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );

        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );

        $data['title'] = $this->my_seolink->get_title();

        $data['keywords'] = $this->my_seolink->get_keywords();

        $data['description'] = $this->my_seolink->get_description();

        $data['view'] = 'site/xemngay/dotranlopmai';

        $this->load->view('site/index', $data);
    }


    /** XEM NG??Y NH???P TR???CH, CHUY???N V??? NH?? M???I **/

    public function nhaptrachnhamoi($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-nhap-trach-nha-moi-trong-thang-$thang-nam-$nam';
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'nhaptrachnhamoi');
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);
        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );
        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_nhaptrachnhamoi($amlich,
            $canchi)];
        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);
        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );
        $ngayduonglich = $duonglich;
        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;
            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);
            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);
            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);
            $rt = $this->lib_xemngay->xemngay_nhaptrachnhamoi($ngayamlich, $canchi);
            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);
            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));
            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }
        $data['ngaytotxautrongthang'] = $mang;
        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();
        $data['name'] = ' nh???p tr???ch, v??? nh?? m???i';
        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';
        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y nh???p tr???ch',
                    'slug' => 'xem-ngay-tot-nhap-trach-nha-moi',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-nhap-trach-nha-moi/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y nh???p tr???ch',
                    'slug' => 'xem-ngay-tot-nhap-trach-nha-moi',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );
        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );
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

    /**
     * Xem ng??y t???t x???u ?????ng th??? nh??.
     **/

    public function dongtho($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-dong-tho-trong-thang-$thang-nam-$nam';
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'dongtho');

        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);
        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );
        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_dongtho($amlich,
            $canchi)];
        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);
        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );
        $ngayduonglich = $duonglich;
        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;
            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);
            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);
            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);
            $rt = $this->lib_xemngay->xemngay_dongtho($ngayamlich, $canchi);
            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);
            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));
            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }
        $data['ngaytotxautrongthang'] = $mang;
        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();
        $data['name'] = ' ?????ng th???';
        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';
        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y ?????ng th???',
                    'slug' => 'xem-ngay-tot-dong-tho',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-dong-tho/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y ?????ng th???',
                    'slug' => 'xem-ngay-tot-dong-tho',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );
        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );
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

    public function dongtho_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'dongtho',
            'link_parent' => 'xem-ngay-tot-dong-tho',
            'link_ngay_tot' => 'dong-tho',
            'name' => 'Xem ng??y t???t ?????ng th??? th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => '?????ng th???',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-dong-tho-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y ?????ng th???',
                    'slug' => 'xem-ngay-tot-dong-tho',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-dong-tho-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function ngayantang_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'ngayantang',
            'link_parent' => 'xem-ngay-tot-an-tang',
            'name' => 'Xem ng??y t???t an t??ng th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => 'an t??ng',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-an-tang-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y an t??ng',
                    'slug' => 'xem-ngay-tot-an-tang',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-an-tang-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function ngaytotxaydung_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'ngaytotxaydung',
            'link_parent' => 'xem-ngay-tot-xay-dung',
            'name' => 'Xem ng??y t???t x??y d???ng th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => 'x??y d???ng',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-xay-dung-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y x??y d???ng',
                    'slug' => 'xem-ngay-tot-xay-dung',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-xay-dung-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function ngaykyhopdong_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'ngaykyhopdong',
            'link_parent' => 'xem-ngay-tot-ky-hop-dong',
            'name' => 'Xem ng??y t???t k?? h???p ?????ng th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => 'k?? h???p ?????ng',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-ky-hop-dong-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y k?? h???p ?????ng',
                    'slug' => 'xem-ngay-tot-ky-hop-dong',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-ky-hop-dong-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function ngaynhanchuc_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'ngaynhanchuc',
            'link_parent' => 'xem-ngay-tot-nhan-chuc',
            'name' => 'Xem ng??y nh???n ch???c th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => 'nh???n ch???c',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-nhan-chuc-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y nh???n ch???c',
                    'slug' => 'xem-ngay-tot-nhan-chuc',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-nhan-chuc-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function dotranlopmai_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'dotranlopmai',
            'link_parent' => 'xem-ngay-tot-do-tran-lop-mai',
            'name' => 'Xem ng??y ????? tr???n l???p m??i th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => '????? tr???n l???p m??i',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-do-tran-lop-mai-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y ????? m??i',
                    'slug' => 'xem-ngay-tot-do-tran-lop-mai',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-do-tran-lop-mai-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function nhaptrachnhamoi_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'nhaptrachnhamoi',
            'link_parent' => 'xem-ngay-tot-nhap-trach-nha-moi',
            'link_ngay_tot' => 'nhap-trach',
            'name' => 'Xem ng??y nh???p tr???ch nh?? m???i th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => 'nh???p tr???ch nh?? m???i',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-nhap-trach-nha-moi-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y nh???p tr???ch',
                    'slug' => 'xem-ngay-tot-nhap-trach-nha-moi',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-nhap-trach-nha-moi-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function ngayxuathanh_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'ngayxuathanh',
            'link_parent' => 'xem-ngay-tot-xuat-hanh',
            'link_ngay_tot' => 'xuat-hanh',
            'name' => 'Xem ng??y xu???t h??nh th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => 'xu???t h??nh',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-xuat-hanh-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y xu???t h??nh',
                    'slug' => 'xem-ngay-tot-xuat-hanh',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-xuat-hanh-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );

        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function ngaymuanha_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'ngaymuanha',
            'link_parent' => 'xem-ngay-tot-mua-nha',
            'link_ngay_tot' => 'mua-nha',
            'name' => 'Xem ng??y t???t mua nh?? th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => 'mua nh??',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-mua-nha-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y mua nh??',
                    'slug' => 'xem-ngay-tot-mua-nha',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-mua-nha-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function ngayhoangdao_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'ngayhoangdao',
            'link_parent' => 'xem-ngay-tot-hoang-dao',
            'name' => 'Xem ng??y t???t ho??ng ?????o th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => 'ho??ng ?????o',
            'arr_seo' => array(
                'link' => 'xem-ngay-hoang-dao-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y ho??ng ?????o',
                    'slug' => 'xem-ngay-tot-hoang-dao',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-hoang-dao-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function ngaykethon_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'ngaykethon',
            'link_parent' => 'xem-ngay-tot-ket-hon',
            'link_ngay_tot' => 'cuoi-hoi',
            'name' => 'Xem ng??y t???t k???t h??n th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => 'c?????i h???i',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-cuoi-hoi-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y k???t h??n',
                    'slug' => 'xem-ngay-tot-ket-hon',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-cuoi-hoi-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function ngaykhaitruong_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'ngaykhaitruong',
            'link_parent' => 'xem-ngay-tot-khai-truong',
            'link_ngay_tot' => 'khai-truong',
            'name' => 'Xem ng??y t???t khai tr????ng th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => 'khai tr????ng',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-khai-truong-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y khai tr????ng',
                    'slug' => 'xem-ngay-tot-khai-truong',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-khai-truong-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function xemngayvansu_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => '',
            'link_parent' => 'xem-ngay-tot-xau',
            'name' => 'Xem ng??y t???t th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => '',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
                'link_child' => 'xem-ngay-tot-xau',
            ),
        );
        $thang = $arr_input['thang'];
        $nam = $arr_input['nam'];
        $arr_str = array('thang' => $thang, 'nam' => $nam);
        $this->redirect_tool_ngay($arr_str);
        $type_listdate = $arr_input['type_listdate'];
        $name = $arr_input['name'];
        $data['list_anchortext'] = $arr_input['list_anchortext'];
        $arr_seo = $arr_input['arr_seo'];
        $data['link_parent'] = $link_parent = $arr_input['link_parent'];
        $data['arr_seo_link'] = $arr_input['arr_seo']['link'];
        /** default **/
        $ngay = 1;
        if ($thang == null || $nam == null) {
            $duonglich = $this->ngayamduong->get_current_date();
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
        }
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $data['duonglich'] = $duonglich;
        /** end default **/

        $info_listdatenext = $this->info_listdatenext(0, $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), $type_listdate);
        $ngay_hien_tai  = date('j');
        //$ngay_hien_tai  = 29;
        $thang_hien_tai = date('n');
        $nam_hien_tai   = date('Y');
        $so_ngay_trong_thang = $this->ngayamduong->get_songaytrongthang($duonglich);
        if( $thang == $thang_hien_tai && $nam == $nam_hien_tai && $ngay_hien_tai >= 3 )
        {
            $data['ngay_hien_tai'] = $ngay_hien_tai;
            // N???u s??? ng??y trong th??ng - ng??y hi???n t???i < 4 th?? l???y th??m ng??y c???a th??ng ti???p theo = 4 - s??? ng??y trong th??ng  - ng??y hi???n t???i
            if($so_ngay_trong_thang - $ngay_hien_tai < 4)
            {
                $so_ngay_thang_tiep_theo = 4 - ($so_ngay_trong_thang - $ngay_hien_tai);
                $thang_tiep = $thang_hien_tai + 1 <= 12 ? $thang_hien_tai + 1 : 1;
                $nam_tiep   = $thang_tiep == 1 ? $nam_hien_tai + 1 : $nam_hien_tai;
                $list_ngay_tiep = $this->info_listdatenext(0, $thang_tiep, $nam_tiep,
            $this->ngayamduong->get_songaytrongthang(array(1,$thang_tiep,$nam_tiep)), $type_listdate);
                for ($i=1; $i <= $so_ngay_thang_tiep_theo; $i++) { 
                    $info_listdatenext[] =  $list_ngay_tiep[$i];
                }
            }
        } 
        else
          $data['ngay_hien_tai'] = 1;  
        $data['info_listdatenext'] = $info_listdatenext;
        // $content_get_lich = $this->get_lich($thang,$nam);
        // $data['content_get_lich']   = $content_get_lich['noidung'];
        $data['name'] = $name;    // auto

        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_seo['link']);
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'Xem ng??y t???t x???u',
                'slug' => 'xem-ngay-tot-xau',
            ),
            1 => array(
                'name' => 'Th??ng ' . $thang . '/' . $nam,
                'slug' => 'xem-ngay-tot-trong-thang-' . $thang . '-nam-' . $nam,
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** config seo **/

        $this->my_seolink->seolink_cst($arr_seo);
        if (isset($arr_input['arr_seo']['link_child'])) {
            $data['link_child'] = $arr_input['arr_seo']['link_child'];
        }
        $data['input'] = $arr_input;
        $data['name'] = $name;
        $data['text'] = $this->my_seolink->get_text();
        $data['text_foot'] = $this->my_seolink->get_text_foot();
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        if ($this->mobile_detect->isMobile()) {
            $data['view'] = 'site/xemngay/xemngayvansu_trongthang_allpage_mobile';
            $this->load->view($this->view_mobile, $data);
        } else {
            $data['view'] = 'site/xemngay/xemngayvansu_trongthang_allpage';
            $this->load->view($this->view, $data);
        }
    }

    public function ngaymuaxe_trongthang($thang = null, $nam = null)
    {
        $arr_input = array(
            'thang' => $thang,
            'nam' => $nam,
            'type_listdate' => 'ngaymuaxe',
            'link_parent' => 'xem-ngay-tot-mua-xe',
            'link_ngay_tot' => 'mua-xe',
            'name' => 'Xem ng??y t???t mua xe th??ng ' . $thang . ' n??m ' . $nam,
            'list_anchortext' => 'mua xe',
            'arr_seo' => array(
                'link' => 'xem-ngay-tot-mua-xe-trong-thang-$thang-nam-$nam',
                'replace' => array('$thang' => $thang, '$nam' => $nam),
            ),
            'breadcrumb' => array(
                0 => array(
                    'name' => 'Xem ng??y mua xe',
                    'slug' => 'xem-ngay-tot-mua-xe',
                ),
                1 => array(
                    'name' => 'Th??ng ' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-mua-xe-trong-thang-' . $thang . '-nam-' . $nam,
                ),
            ),
        );
        $this->xemngay_trongthang_allpage($arr_input);
    }

    public function xemngay_trongthang_allpage($input = null)
    {
        $thang = $input['thang'];
        $nam = $input['nam'];
        $arr_str = array('thang' => $thang, 'nam' => $nam);
        $this->redirect_tool_ngay($arr_str);
        $type_listdate = $input['type_listdate'];
        $name = $input['name'];
        $data['list_anchortext'] = $input['list_anchortext'];
        $arr_seo = $input['arr_seo'];
        $data['link_parent'] = $link_parent = $input['link_parent'];
        $data['arr_seo_link'] = $input['arr_seo']['link'];
        /** default **/
        $ngay = 1;
        if ($thang == null || $nam == null) {
            $duonglich = $this->ngayamduong->get_current_date();
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
        }
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $data['duonglich'] = $duonglich;
        /** end default **/

        $data['info_listdatenext'] = $this->info_listdatenext(0, $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), $type_listdate);
        // $content_get_lich = $this->get_lich($thang,$nam);
        // $data['content_get_lich']   = $content_get_lich['noidung'];
        $data['name'] = $name;    // auto

        // 1. Get comment
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_seo['link']);
        // get breadcrumb
        if (isset($input['breadcrumb'])) {
            $data['breadcrumb'] = breadcrumb($input['breadcrumb']);
        }
        /** config seo **/

        $this->my_seolink->seolink_cst($arr_seo);
        if (isset($input['arr_seo']['link_child'])) {
            $data['link_child'] = $input['arr_seo']['link_child'];
        }
        $data['input'] = $input;
        $data['name'] = $name;
        $data['text'] = $this->my_seolink->get_text();
        $data['text_foot'] = $this->my_seolink->get_text_foot();
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        if ($this->mobile_detect->isMobile()) {
            $data['view'] = 'site/xemngay/xemngay_trongthang_allpage_mobile';
            $this->load->view($this->view_mobile, $data);
        } else {
            $data['view'] = 'site/xemngay/xemngay_trongthang_allpage';
            $this->load->view($this->view, $data);
        }
    }


    public function ngayxuathanh($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-xuat-hanh-trong-thang-$thang-nam-$nam';
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);

        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'ngayxuathanh');

        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);
        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );
        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_xuathanh($amlich,
            $canchi)];
        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);
        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );
        $ngayduonglich = $duonglich;
        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;
            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);
            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);
            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);
            $rt = $this->lib_xemngay->xemngay_xuathanh($ngayamlich, $canchi);
            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);
            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));
            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }
        $data['ngaytotxautrongthang'] = $mang;
        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();
        $data['name'] = ' xu???t h??nh';
        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';
        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y xu???t h??nh',
                    'slug' => 'xem-ngay-tot-xuat-hanh',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-xuat-hanh/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y xu???t h??nh',
                    'slug' => 'xem-ngay-tot-xuat-hanh',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );
        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );
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


    public function ngaykhaitruong($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-khai-truong-trong-thang-$thang-nam-$nam';
        $amlich = $this->ngayamduong->get_amlich($duonglich);

        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);

        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'ngaykhaitruong');


        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);

        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );

        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_khaitruong($amlich,
            $canchi)];


        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);

        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );

        $ngayduonglich = $duonglich;

        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;

            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);

            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);

            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);

            $rt = $this->lib_xemngay->xemngay_khaitruong($ngayamlich, $canchi);

            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);

            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));

            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }

        $data['ngaytotxautrongthang'] = $mang;

        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();


        $data['name'] = ' khai tr????ng, xu???t nh???p';

        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';

        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y khai tr????ng',
                    'slug' => 'xem-ngay-tot-khai-truong',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-khai-truong/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y khai tr????ng',
                    'slug' => 'xem-ngay-tot-khai-truong',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);

        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );

        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );


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


    public function ngaymuaxe($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $amlich = $this->ngayamduong->get_amlich($duonglich);

        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);

        $data['arr_seo_link_thang'] = 'xem-ngay-tot-mua-xe-trong-thang-$thang-nam-$nam';

        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'ngaymuaxe');


        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);

        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );

        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_muaxe($amlich, $canchi)];
        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);

        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );

        $ngayduonglich = $duonglich;

        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;

            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);

            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);

            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);

            $rt = $this->lib_xemngay->xemngay_muaxe($ngayamlich, $canchi);

            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);

            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));

            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }
        $data['ngaytotxautrongthang'] = $mang;
        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();
        $data['name'] = ' mua xe';
        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';
        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y mua xe',
                    'slug' => 'xem-ngay-tot-mua-xe',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-mua-xe/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y mua xe',
                    'slug' => 'xem-ngay-tot-mua-xe',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
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


    public function ngaykyhopdong($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-ky-hop-dong-trong-thang-$thang-nam-$nam';
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);

        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'ngaykyhopdong');

        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);
        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );
        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_kyhopdong($amlich,
            $canchi)];
        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);
        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );
        $ngayduonglich = $duonglich;
        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;
            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);
            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);
            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);
            $rt = $this->lib_xemngay->xemngay_kyhopdong($ngayamlich, $canchi);
            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);
            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));
            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }
        $data['ngaytotxautrongthang'] = $mang;
        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();
        $data['name'] = ' k?? h???p ?????ng';
        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';
        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y k?? h???p ?????ng',
                    'slug' => 'xem-ngay-tot-ky-hop-dong',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-ky-hop-dong/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y k?? h???p ?????ng',
                    'slug' => 'xem-ngay-tot-ky-hop-dong',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );
        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = 'site/xemngay/ngaykyhopdong';
        $this->load->view('site/index', $data);
    }


    public function ngaymuanha($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-mua-nha-trong-thang-$thang-nam-$nam';
        $amlich = $this->ngayamduong->get_amlich($duonglich);

        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);

        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'ngaymuanha');


        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);

        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );

        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_muanha($amlich,
            $canchi)];


        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);

        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );

        $ngayduonglich = $duonglich;

        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;

            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);

            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);

            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);

            $rt = $this->lib_xemngay->xemngay_muanha($ngayamlich, $canchi);

            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);

            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));

            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }

        $data['ngaytotxautrongthang'] = $mang;

        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();


        $data['name'] = ' mua nh??';

        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';

        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y mua nh??',
                    'slug' => 'xem-ngay-tot-mua-nha',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-mua-nha/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y mua nh??',
                    'slug' => 'xem-ngay-tot-mua-nha',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);

        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );

        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );

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


    public function ngaynhanchuc($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-nhan-chuc-trong-thang-$thang-nam-$nam';
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);

        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'ngaynhanchuc');

        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);
        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );
        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_nhanchuc($amlich,
            $canchi)];
        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);
        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );
        $ngayduonglich = $duonglich;
        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;
            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);
            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);
            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);
            $rt = $this->lib_xemngay->xemngay_nhanchuc($ngayamlich, $canchi);
            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);
            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));
            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }
        $data['ngaytotxautrongthang'] = $mang;
        $data['name'] = ' nh???n ch???c';
        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';
        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y nh???n ch???c',
                    'slug' => 'xem-ngay-tot-nhan-chuc',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-nhan-chuc/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y nh???n ch???c',
                    'slug' => 'xem-ngay-tot-nhan-chuc',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = 'site/xemngay/ngaynhanchuc';
        $this->load->view('site/index', $data);
    }


    public function ngayantang($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-an-tang-trong-thang-$thang-nam-$nam';
        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);

        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'ngayantang');
        //dd($data['info_listdatenext']);
        /** end **/

        /*$chitietngay = file_get_contents(base_url('site/xemngay/home/' . $duonglich[0] .
            '/' . $duonglich[1] . '/' . $duonglich[2]), false, stream_context_create($this->
            arrContextOptions));
        
        $data['xemngay'] = unserialize($chitietngay);*/
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);
        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );
        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_antang($amlich,
            $canchi)];
        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);
        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );
        $ngayduonglich = $duonglich;
        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;
            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);
            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);
            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);
            $rt = $this->lib_xemngay->xemngay_antang($ngayamlich, $canchi);
            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);
            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));
            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }
        $data['ngaytotxautrongthang'] = $mang;
        $data['name'] = ' an t??ng';
        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';
        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y an t??ng',
                    'slug' => 'xem-ngay-tot-an-tang',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-an-tang/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y an t??ng',
                    'slug' => 'xem-ngay-tot-an-tang',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = 'site/xemngay/ngayantang';
        $this->load->view('site/index', $data);
    }


    public function ngayhoangdao($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-hoang-dao-trong-thang-$thang-nam-$nam';
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'ngayhoangdao');

        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchi);
        $ngayhientai = array('hoangdao' => 'Ho??ng ?????o', 'hacdao' => '<span class="color_black">H???c ?????o</span>');
        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_hoangdao($amlich,
            $canchi)];
        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);

        $mang = array('hoangdao' => array(), 'hacdao' => array());

        $ngayduonglich = $duonglich;

        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;

            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);

            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);

            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);

            $rt = $this->lib_xemngay->xemngay_hoangdao($ngayamlich, $canchi);

            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);

            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));

            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }

        $data['ngaytotxautrongthang'] = $mang;

        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();


        $data['name'] = ' ho??ng ?????o';

        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';

        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y ho??ng ?????o',
                    'slug' => 'xem-ngay-tot-hoang-dao',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-hoang-dao/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y ho??ng ?????o',
                    'slug' => 'xem-ngay-tot-hoang-dao',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);

        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );

        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );

        $data['title'] = $this->my_seolink->get_title();

        $data['keywords'] = $this->my_seolink->get_keywords();

        $data['description'] = $this->my_seolink->get_description();

        $data['view'] = 'site/xemngay/ngayhoangdao';

        $this->load->view('site/index', $data);
    }


    public function ngaykethon($ngay = null, $thang = null, $nam = null)
    {
        if ($ngay == null || $thang == null || $nam == null) {
            //$duonglich = $this->ngayamduong->get_current_date();
            $duonglich = array(1, (int)date('m'), date('Y'));
            $ngay = 1;
            $thang = (int)date('m');
            $nam = date('Y');
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        } else {
            $duonglich = array(
                $ngay,
                $thang,
                $nam
            );
            $ngay_tieude = ' ng??y ' . $ngay . '/' . $thang . '/' . $nam;
            $data['submit_form'] = 1;
            $this->submit_form = 1;
            $arr_str = array('ngay' => $ngay, 'thang' => $thang, 'nam' => $nam);
            $this->redirect_tool_ngay($arr_str);
        }
        $data['arr_seo_link_thang'] = 'xem-ngay-tot-cuoi-hoi-trong-thang-$thang-nam-$nam';
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        /** config info **/
        $data['duonglich'] = $duonglich;
        $amlich = $this->ngayamduong->get_amlich($duonglich);
        $canchi = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $xemngay['gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $xemngay['ngay_hoang_dao'] = $this->lib_xemngay->xacdinh_ngayhoangdao_totxau();
        $input = array(
            'ngayamlich' => $amlich[0],
            'thangamlich' => $amlich[1],
            'namamlich' => $amlich[2],
            'chingay' => ($canchi['chi']),
            'canngay' => ($canchi['can']),
            'cannam' => ($canchinam['can']),
            'chinam' => ($canchinam['chi']),
            'ngayduong' => $duonglich[0],
            'thangduong' => $duonglich[1],
            'namduong' => $duonglich[2],
        );
        $result = $this->get_info($input);
        $data['xemngay'] = $xemngay;
        $data['arr_tinhngay_ki'] = $result['arr_tinhngay_ki'];
        $data['result_tinhngayki'] = $result['result_tinhngayki'];
        $data['result_nguhanh_huongdi'] = $result['result_nguhanh_huongdi'];
        $data['result_tinh_banhtobachkinhat'] = $result['result_tinh_banhtobachkinhat'];
        $data['result_tinh_khongminh'] = $result['result_tinh_khongminh'];
        $data['result_tinhthapnhibattu'] = $result['result_tinhthapnhibattu'];
        $data['result_tinhtrucngay'] = $result['result_tinhtrucngay'];
        $data['result_tinhsaototsaoxau'] = $result['result_tinhsaototsaoxau'];
        $data['info_listdatenext'] = $this->info_listdatenext($duonglich[0], $duonglich[1], $duonglich[2],
            $this->ngayamduong->get_songaytrongthang($duonglich), 'ngaykethon');


        $ngayhientai = array(
            'tot' => 'T???t',
            'xau' => '<span class="color_black">X???u</span>',
            'bt' => 'Kh??ng x???u nh??ng c??ng ch??a t???t'
        );

        $data['ngayhientai'] = $ngayhientai[$this->lib_xemngay->xemngay_kethon($amlich,
            $canchi)];

        $songaytrongthang = $this->ngayamduong->get_songaytrongthang($duonglich);

        $mang = array(
            'tot' => array(),
            'xau' => array(),
            'bt' => array()
        );

        $ngayduonglich = $duonglich;

        for ($i = 1; $i <= $songaytrongthang; $i++) {
            $ngayduonglich[0] = $i;

            $ngayamlich = $this->ngayamduong->get_amlich($ngayduonglich);

            $canchi = $this->ngayamduong->get_canchi_ngay($ngayduonglich);

            $this->lib_xemngay->xemngay_config($ngayduonglich, $ngayamlich, $canchi);

            $rt = $this->lib_xemngay->xemngay_kethon($ngayamlich, $canchi);

            $mang[$rt][$i]['thu'] = $this->ngayamduong->get_ngaythu($ngayduonglich);

            $mang[$rt][$i]['ngayam'] = implode('/', $this->ngayamduong->get_amlich($ngayduonglich));

            $mang[$rt][$i]['ngayduong'] = implode('/', $ngayduonglich);
        }

        $data['ngaytotxautrongthang'] = $mang;

        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();


        $data['name'] = ' k???t h??n';

        $data['sub_title'] = isset($ngay_tieude) ? $ngay_tieude : '';

        $data['url'] = $this->uri->segment(1);

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);

        $this->my_seolink->set_seolink($ngay, $thang, $nam);

        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );

        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );
        // get breadcrumb
        if ($this->submit_form == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y k???t h??n',
                    'slug' => 'xem-ngay-tot-ket-hon',
                ),
                1 => array(
                    'name' => 'Ng??y ' . $ngay . '/' . $thang . '/' . $nam,
                    'slug' => 'xem-ngay-tot-ket-hon/ngay-' . $ngay . '-thang-' . $thang . '-nam-' . $nam,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem ng??y',
                    'slug' => 'xem-ngay',
                ),
                1 => array(
                    'name' => 'Xem ng??y k???t h??n',
                    'slug' => 'xem-ngay-tot-ket-hon',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
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


    public function doingayamsangduong($ngay = null, $thang = null, $nam = null)
    {
        $newURL = base_url('doi-ngay-duong-lich-sang-am-lich.html');
        redirect($newURL, 'location', 301);
        require_once PUBLICPATH . '/html_dom/simple_html_dom.php';

        if ($_POST) {
            $param = $_POST;

            $url = 'http://www.boitoanvui.com/ngay-am-sang-duong.html';

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_POST, count($param));

            curl_setopt($ch, CURLOPT_POSTFIELDS, $param);

            $result = curl_exec($ch);

            curl_close($ch);

            $html = str_get_html($result);

            $content['noidung'] = $html->find('div[class=ja-content-main]', 0)->innertext;

            $form = $html->find('form', 0)->outertext;

            $h1 = $html->find('h1', 0)->outertext;

            $content['noidung'] = str_replace($form, '', $content['noidung']);

            $content['noidung'] = str_replace($h1, '', $content['noidung']);

            $content['noidung'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['noidung']);

            $content['chugiai'] = $html->find('div[class=ja-box-ct]', 0)->innertext;

            $content['chugiai'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['chugiai']);

            $html->clear();

            unset($html);

            $data['content'] = $content;
        }

        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'L???ch',
                'slug' => 'lich',
            ),
            1 => array(
                'name' => '?????i ??m l???ch sang d????ng l???ch',
                'slug' => 'doi-ngay-am-lich-sang-duong-lich',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $data['name'] = '?????i ng??y ??m sang d????ng';

        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );

        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );

        $data['title'] = $this->my_seolink->get_title();

        $data['keywords'] = $this->my_seolink->get_keywords();

        $data['description'] = $this->my_seolink->get_description();

        $data['follow'] = '<meta name="robots" content="noindex, nofollow">';

        $data['view'] = 'site/xemngay/doingayamsangduong';

        $this->load->view('site/index', $data);
    }


    public function doingayduongsangam($ngay = null, $thang = null, $nam = null)
    {
        $data['ngay_duong'] = date('j');
        $data['thang_duong'] = date('n');
        $data['nam_duong'] = date('Y');
        $this->load->library(array('site/lich', 'lib_xemngay', 'lib_xemngay_demo'));
        $this->lich->set_ngayduong($data['ngay_duong'], $data['thang_duong'], $data['nam_duong']);
        $data['ngay_am'] = $this->lich->get_ngayam();
        $data['thang_am'] = $this->lich->get_thangam();
        $data['nam_am'] = $this->lich->get_namam();
        $data['ngay_thu'] = $this->lich->get_ngaythu(array(
            $data['ngay_duong'],
            $data['thang_duong'],
            $data['nam_duong']
        ));
        $data['ngay_can_chi'] = $this->lich->get_ngaycan() . ' ' . $this->lich->get_ngaychi();
        $data['thang_can_chi'] = $this->lich->get_thangcan() . ' ' . $this->lich->get_thangchi();
        $data['nam_can_chi'] = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
        $data['hoang_dao_hac_dao'] = $this->lich->get_ngayhoangdao();
        $data['tiet_khi'] = $this->lich->get_tietkhi(true);
        $duonglich = array($data['ngay_duong'], $data['thang_duong'], $data['nam_duong']);
        $amlich = array($data['ngay_am'], $data['thang_am'], $data['nam_am']);
        $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
        $canchithang = $this->ngayamduong->get_canchi_thang($amlich);
        $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
        $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
        $data['list_gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
        $data['nguhanh'] = $this->lib_xemngay->xacdinh_nguhanh('text');
        $arr_tinhngay_ki = array(
            'ngayamlich' => $data['ngay_am'],
            'thang' => $data['thang_am'],
            'namamlich' => $data['nam_am'],
            'chingay' => get_chi_menh($canchingay['chi']),
            'canngay' => get_can_menh($canchingay['can']),
            'cannam' => get_can_menh($canchinam['can']),
            'chinam' => get_chi_menh($canchinam['chi']),
            'ngayduong' => $data['ngay_duong'],
            'thangduong' => $data['thang_duong'],
            'namduong' => $data['nam_duong'],
        );
        //$result_tinhngayki     = $this->lib_xemngay_demo->tinhngay_ki($arr_tinhngay_ki); 
        $data['ngu_hanh_tinh'] = $this->lib_xemngay_demo->tinh_nguhanh($arr_tinhngay_ki);
        $data['sao_tot_xau'] = $this->lib_xemngay_demo->tinh_saototsaoxau($arr_tinhngay_ki);
        $data['huong_tot_xau'] = $this->lib_xemngay_demo->tinh_nguhanh($arr_tinhngay_ki);


        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);
        // get breadcrumb
        $breadcrumb = array(
            0 => array(
                'name' => 'L???ch',
                'slug' => 'lich',
            ),
            1 => array(
                'name' => '?????i d????ng l???ch dang ??m l???ch',
                'slug' => 'doi-ngay-duong-lich-sang-am-lich',
            ),
        );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $this->my_seolink->set_seolink($ngay, $thang, $nam);
        $data['name'] = '?????i l???ch d????ng sang ??m';
        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );
        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['follow'] = '<meta name="robots" content="noindex, nofollow">';
        $data['view'] = 'site/xemngay/doingayduongsangam';
        $this->load->view('site/index', $data);
    }

    public function ajax_doingayamduong()
    {
        if ($_POST) {
            $this->load->library(array('site/lich', 'lib_xemngay', 'lib_xemngay_demo'));
            $post = $this->input->post();
            if ($post['input_type'] == 'duong') {
                $data['ngay_duong'] = $post['input_val'][0];
                $data['thang_duong'] = $post['input_val'][1];
                $data['nam_duong'] = $post['input_val'][2];
                $this->lich->set_ngayduong($post['input_val'][0], $post['input_val'][1], $post['input_val'][2]);
                $data['ngay_am'] = $this->lich->get_ngayam();
                $data['thang_am'] = $this->lich->get_thangam();
                $data['nam_am'] = $this->lich->get_namam();
            } else {
                $data['ngay_am'] = $post['input_val'][0];
                $data['thang_am'] = $post['input_val'][1];
                $data['nam_am'] = $post['input_val'][2];
                $this->load->helper('licham_helper');
                $duonglich = convertLunar2Solar($post['input_val'][0], $post['input_val'][1], $post['input_val'][2], 0,
                    7.0);
                $data['ngay_duong'] = $duonglich[0];
                $data['thang_duong'] = $duonglich[1];
                $data['nam_duong'] = $duonglich[2];
                $this->lich->set_ngayduong($post['input_val'][0], $post['input_val'][1], $post['input_val'][2]);
            }
            $data['ngay_thu'] = $this->lich->get_ngaythu(array(
                $data['ngay_duong'],
                $data['thang_duong'],
                $data['nam_duong']
            ));
            $data['ngay_can_chi'] = $this->lich->get_ngaycan() . ' ' . $this->lich->get_ngaychi();
            $data['thang_can_chi'] = $this->lich->get_thangcan() . ' ' . $this->lich->get_thangchi();
            $data['nam_can_chi'] = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $data['hoang_dao_hac_dao'] = $this->lich->get_ngayhoangdao();
            $data['tiet_khi'] = $this->lich->get_tietkhi(true);
            $duonglich = array($data['ngay_duong'], $data['thang_duong'], $data['nam_duong']);
            $amlich = array($data['ngay_am'], $data['thang_am'], $data['nam_am']);
            $canchingay = $this->ngayamduong->get_canchi_ngay($duonglich);
            $canchithang = $this->ngayamduong->get_canchi_thang($amlich);
            $canchinam = $this->ngayamduong->get_canchi_nam($amlich);
            $this->lib_xemngay->xemngay_config($duonglich, $amlich, $canchingay);
            $data['list_gio_hoang_dao_hac_dao'] = $this->lib_xemngay->xacdinh_giohoangdao();
            $data['nguhanh'] = $this->lib_xemngay->xacdinh_nguhanh('text');
            $arr_tinhngay_ki = array(
                'ngayamlich' => $data['ngay_am'],
                'thang' => $data['thang_am'],
                'namamlich' => $data['nam_am'],
                'chingay' => get_chi_menh($canchingay['chi']),
                'canngay' => get_can_menh($canchingay['can']),
                'cannam' => get_can_menh($canchinam['can']),
                'chinam' => get_chi_menh($canchinam['chi']),
                'ngayduong' => $data['ngay_duong'],
                'thangduong' => $data['thang_duong'],
                'namduong' => $data['nam_duong'],
            );
            //$result_tinhngayki     = $this->lib_xemngay_demo->tinhngay_ki($arr_tinhngay_ki);
            $data['ngu_hanh_tinh'] = $this->lib_xemngay_demo->tinh_nguhanh($arr_tinhngay_ki);
            $data['sao_tot_xau'] = $this->lib_xemngay_demo->tinh_saototsaoxau($arr_tinhngay_ki);
            $data['huong_tot_xau'] = $this->lib_xemngay_demo->tinh_nguhanh($arr_tinhngay_ki);
            $html = $this->load->view('site/xemngay/ajax_doingayamduong', $data, true);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('html' => $html)));
            return;
        }
    }

    public function lichvannien($ngay = null, $thang = null, $nam = null)
    {
        require_once PUBLICPATH . '/html_dom/simple_html_dom.php';
        if ($_POST) {
            $param = $_POST;
            $url = 'http://www.boitoanvui.com/lich-van-nien.html';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, count($param));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
            $result = curl_exec($ch);
            curl_close($ch);
            $html = str_get_html($result);
            $content['noidung'] = $html->find('div[class=ja-content-main]', 0)->innertext;
            $form = $html->find('form', 0)->outertext;
            $h1 = $html->find('h1', 0)->outertext;
            $content['noidung'] = str_replace($form, '', $content['noidung']);
            $content['noidung'] = str_replace($h1, '', $content['noidung']);
            $content['noidung'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['noidung']);
            $content['chugiai'] = $html->find('div[class=ja-box-ct]', 0)->innertext;
            $content['chugiai'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['chugiai']);
            $html->clear();
            unset($html);
            $data['content'] = $content;
        }

        //$data['new_comment'] = $this->hoidap_model->Db_site_list_new_comment();

        /** Get comment by url xem ngay **/
        $arr_url = $this->uri->segment_array();
        if (!isset($arr_url[2])) {
            $linkCmt = $arr_url[1];
        } else {
            $linkCmt = $arr_url[1] . '/ngay-$ngay-thang-$thang-nam-$nam';
        }
        $data['getComment'] = $getComment = $this->comment_lib->getByTheme($linkCmt);

        $this->my_seolink->set_seolink($ngay, $thang, $nam);

        $data['name'] = 'L???ch v???n ni??n';

        //$data['list_comment'] = $this->hoidap_model->Db_site_list_comment(__function__ );

        $data['form_hoidap'] = array(
            'type' => __function__,
            'type_parent' => 0,
            'title' => $this->my_seolink->get_title(),
            'name' => $data['name']
        );

        $data['title'] = $this->my_seolink->get_title();

        $data['keywords'] = $this->my_seolink->get_keywords();

        $data['description'] = $this->my_seolink->get_description();

        $data['follow'] = '<meta name="robots" content="noindex, nofollow">';

        $data['view'] = 'site/xemngay/lichvannien';

        $this->load->view('site/index', $data);
    }

    public function get_lich($thang = 1, $nam = 2018)
    {
        $post = array(
            'mMonth' => $thang,
            'mYear' => $nam,
            'act' => 'search',
            'option' => 'com_boi',
            'view' => 'vannien',
            'Itemid' => '27'
        );
        return 'L???ch';

        require_once PUBLICPATH . '/html_dom/simple_html_dom.php';
        $param = $post;
        $url = 'http://www.xemphongthuy.edu.vn/lich-van-nien.html';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, count($param));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        $result = curl_exec($ch);
        curl_close($ch);
        $html = str_get_html($result);
        $content['noidung'] = $html->find('div[class=ja-content-main]', 0)->innertext;
        $form = $html->find('form', 0)->outertext;
        $h1 = $html->find('h1', 0)->outertext;
        $content['noidung'] = str_replace($form, '', $content['noidung']);
        $content['noidung'] = str_replace($h1, '', $content['noidung']);
        $content['noidung'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['noidung']);
        $content['chugiai'] = $html->find('div[class=ja-box-ct]', 0)->innertext;
        $content['chugiai'] = str_replace('src="', 'src="http://www.boitoanvui.com', $content['chugiai']);
        $html->clear();
        unset($html);
        $data['content'] = $content;
        return $data['content'];
    }


}
