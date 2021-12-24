<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Xemngaytheotuoi extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $action_view_mobile = '';
    public $view = 'index';
    public $view_mobile = 'index_mobile';
    public $submit_form = 0;
    private $arrContextOptions = array("ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
    ),);

    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() .
            '/' . $this->router->fetch_method();
        $this->action_view_mobile = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '_mobile';
        $this->view = $this->module_view . '/' . $this->view;
        $this->view_mobile = $this->module_view . '/' . $this->view_mobile;
        $this->load->model(array('site/article_model'));
        $this->load->library(array(
            'site/lib_xemngay',
            'site/ngayamduong',
            'site/my_seolink',
            'site/lib_xemngay_demo',
            'site/comment_lib',
            'site/my_info',
            'site/lib_xemngaytheotuoi'
        ));
        $this->load->helper(array('my_menh', 'form', 'xemngay', 'my'));
    }

    public function ngaytotxau($canchislug)
    {
        $url = $this->uri->uri_string();
        if ($_POST) {
            $post = $this->input->post();
        }

        $data['canchislug'] = $canchislug;
        $data['canchitext'] = $data['canchi'] = slug_to_text_canchi($canchislug);
        $data['canchiint'] = slug_to_ns_canchi($canchislug);
        $data['menh'] = xacdinh_menh($data['canchiint']);

        $get_user['ngay_sinh'] = 6;
        $get_user['thang_sinh'] = 6;
        $get_user['nam_sinh'] = (int)$data['canchiint'];
        $data['thang_xem'] = $thang_xem = isset($post['thang']) ? $post['thang'] : (int)date('m');
        $data['nam_xem'] = $nam_xem = isset($post['nam']) ? $post['nam'] : (int)date('Y');

        $nguoixem = $this->my_info->Db_get_info_user($get_user);
        $ngaymoi = $this->lib_xemngaytheotuoi->dsNgaydepTheotuoi($thang_xem, $nam_xem, $nguoixem, 'ngaytotxau');

        $data['list_ngaytot'] = $ngaymoi['tot'];
        $data['list_ngayxau'] = $ngaymoi['xau'];
        $data['success'] = 1;

        $this->my_seolink->set_seolink($url);
        $data['name'] = $this->my_seolink->get_name();
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $sql_nam = 'select * from article where name like "%' . $data['canchitext'] . '%" and name like "%nam mạng%" and name like "%2019%"';
        $sql_nu = 'select * from article where name like "%' . $data['canchitext'] . '%" and name like "%nữ mạng%" and name like "%2019%"';
        $oneAge_nam = $this->article_model->getQuery($sql_nam);
        $oneAge_nu = $this->article_model->getQuery($sql_nu);
        $data['oneAgeNam'] = $oneAge_nam;
        $data['oneAgeNu'] = $oneAge_nu;
        /** Điều hướng tử vi 2020 */
        $namsinh = $get_user['nam_sinh'];
        $this->load->library(array('site/lich'));
        $this->lich->set_ngayduong(9, 4, $namsinh);
        $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
        $data['dieu_huong_tv_2020_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 1, 'nam_xem' => 2021));
        $data['dieu_huong_tv_2020_text_nam'] = 'Tử vi năm 2021 tuổi ' . $nam_can_chi_text . ' nam mạng';
        $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 2, 'nam_xem' => 2021));
        $data['dieu_huong_tv_2020_text_nu'] = 'Tử vi năm 2021 tuổi ' . $nam_can_chi_text . ' nữ mạng';
        if ($this->mobile_detect->isMobile()) {
            $data['view'] = $this->action_view_mobile;
            $this->load->view($this->view_mobile, $data);
        } else {
            $data['view'] = $this->action_view;
            $this->load->view($this->view, $data);
        }
    }

    public function xuatngaytot()
    {
        $loai_ngay = array(
            'ngaykhaitruong',
            'ngaymuaxe',
            'ngaymuanha',
            'ngaykethon',
            'nhaptrachnhamoi',
            'dongtho',
            'xuathanh',
        );
        for ($i = 1970; $i <= 1999; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                foreach ($loai_ngay as $key => $value) {
                    $get_user['ngay_sinh'] = 6;
                    $get_user['thang_sinh'] = 6;
                    $get_user['nam_sinh'] = $i;
                    $nguoixem = $this->my_info->Db_get_info_user($get_user);
                    $thang_xem = $j;
                    $nam_xem = 2021;
                    $ngaymoi = $this->lib_xemngaytheotuoi->dsNgaydepTheotuoi($thang_xem, $nam_xem, $nguoixem, $key);
                    $new_arr = array();
                    foreach ($ngaymoi['tot'] as $key1 => $value1) {
                        $new_arr[] = '<p>' . $value1['ngaythu'] . '</p><p>' . implode('/', $value1['duonglich']) . '(Dương) </p><p>' . implode('/', $value1['amlich']) . '(ÂM)</p>';
                    }
                    $mang[$i][$j][$value] = $new_arr;
                }
            }
        }
        $this->load->view('xuatngay', array('data' => $mang));
    }

    public function ngaytot_theo_congviec($congviec, $canchislug)
    {
        //echo $congviec; exit;
        $type_date = '';
        $typedate_name = array();
        switch ($congviec) {
            case 'xuat-hanh':
                $type_date = 'xuathanh';
                $data_date = array('name' => 'xuất hành', 'slug' => $congviec);
                break;
            case 'cuoi-hoi':
                $type_date = 'ngaykethon';
                $data_date = array('name' => 'cưới hỏi', 'slug' => $congviec);
                break;
            case 'dong-tho':
                $type_date = 'dongtho';
                $data_date = array('name' => 'động thổ', 'slug' => $congviec);
                break;
            case 'nhap-trach':
                $type_date = 'nhaptrachnhamoi';
                $data_date = array('name' => 'nhập trạch', 'slug' => $congviec);
                break;
            case 'mua-nha':
                $type_date = 'ngaymuanha';
                $data_date = array('name' => 'mua nhà', 'slug' => $congviec);
                break;
            case 'khai-truong':
                $type_date = 'ngaykhaitruong';
                $data_date = array('name' => 'khai trương', 'slug' => $congviec);
                break;
            case 'mua-xe':
                $type_date = 'ngaymuaxe';
                $data_date = array('name' => 'mua xe', 'slug' => $congviec);
                break;

            default:
                redirect(base_url(), '301');
                break;
        }

        $url = $this->uri->uri_string();
        if ($_POST) {
            $post = $this->input->post();
        }

        $data['type_date'] = $type_date;
        $data['data_date'] = $data_date;
        $data['canchislug'] = $canchislug;
        $data['canchitext'] = $data['canchi'] = slug_to_text_canchi($canchislug);
        $data['canchiint'] = slug_to_ns_canchi($canchislug);
        $data['menh'] = xacdinh_menh($data['canchiint']);

        $get_user['ngay_sinh'] = 6;
        $get_user['thang_sinh'] = 6;
        $get_user['nam_sinh'] = (int)$data['canchiint'];

        $data['thang_xem'] = $thang_xem = isset($post['thang']) ? $post['thang'] : (int)date('m');
        $data['nam_xem'] = $nam_xem = isset($post['nam']) ? $post['nam'] : (int)date('Y');

        $nguoixem = $this->my_info->Db_get_info_user($get_user);
        $ngaymoi = $this->lib_xemngaytheotuoi->dsNgaydepTheotuoi($thang_xem, $nam_xem, $nguoixem, $type_date);
        //echo'<pre>';print_r($ngaymoi['tot']); echo '</pre>'; exit;
        $data['list_ngaytot'] = $ngaymoi['tot'];
        $data['list_ngayxau'] = $ngaymoi['xau'];
        $data['success'] = 1;

        $this->my_seolink->set_seolink($url);
        $data['name'] = $this->my_seolink->get_name();
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();

        $sql_nam = 'select * from article where name like "%' . $data['canchitext'] . '%" and name like "%nam mạng%" and name like "%2019%"';
        $sql_nu = 'select * from article where name like "%' . $data['canchitext'] . '%" and name like "%nữ mạng%" and name like "%2019%"';
        $oneAge_nam = $this->article_model->getQuery($sql_nam);
        $oneAge_nu = $this->article_model->getQuery($sql_nu);
        $data['oneAgeNam'] = $oneAge_nam;
        $data['oneAgeNu'] = $oneAge_nu;
        /** Điều hướng tử vi 2020 */
        $namsinh = $get_user['nam_sinh'];
        $this->load->library(array('site/lich'));
        $this->lich->set_ngayduong(9, 4, $namsinh);
        $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
        if (in_array($congviec, array('cuoi-hoi', 'dong-tho', 'nhap-trach', 'mua-nha'))) {
            $data['dieu_huong_tv_2020_text_nam'] = 'Tử vi ' . $nam_can_chi_text . ' ' . $namsinh . ' năm 2021 nam';
            $data['dieu_huong_tv_2020_text_nu'] = 'Tử vi ' . $nam_can_chi_text . ' ' . $namsinh . ' năm 2021 nữ';
        }
        if (in_array($congviec, array('khai-truong', 'mua-xe'))) {
            $data['dieu_huong_tv_2020_text_nam'] = 'Xem tử vi ' . $namsinh . ' năm 2021 nam';
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem tử vi ' . $namsinh . ' năm 2021 nữ';


        }
        if ($congviec == 'xuat-hanh') {
            $data['dieu_huong_tv_2020_text_nam'] = 'Tử vi tuổi ' . $namsinh . ' năm 2021 nam mạng';
            $data['dieu_huong_tv_2020_text_nu'] = 'Tử vi tuổi ' . $namsinh . ' năm 2021 nữ mạng';

        }

        $data['dieu_huong_tv_2020_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 1, 'nam_xem' => 2021));
        $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 2, 'nam_xem' => 2021));

        $data['dieu_huong_tv_2022_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 1, 'nam_xem' => 2022));
        $data['dieu_huong_tv_2022_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 2, 'nam_xem' => 2022));
        $data['dieu_huong_tv_2022_text_nam'] = 'Xem tử vi tuổi '.$namsinh.' năm 2022 nam mạng';//'Xem tử vi ' . $namsinh . ' năm 2022 nam';
        $data['dieu_huong_tv_2022_text_nu'] = 'Xem tử vi tuổi '.$namsinh.' năm 2022 nữ mạng';



        if ($this->mobile_detect->isMobile()) {
            $data['view'] = $this->action_view_mobile;
            $this->load->view($this->view_mobile, $data);
        } else {
            $data['view'] = $this->action_view;
            $this->load->view($this->view, $data);
        }

    }

}
