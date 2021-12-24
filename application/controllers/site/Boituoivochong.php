<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Boituoivochong extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $action_view_mobile = '';
    public $view = 'index';
    public $view_mobile = 'index_mobile';
    public $submit = 0; // kiem tra co submit form khong
    public $run_sublink = 0;    // kiem tra co phai link con ma khong phai submit khong

    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $this->action_view_mobile = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '_mobile';
        $this->view = $this->module_view . '/' . $this->view;
        $this->view_mobile = $this->module_view . '/' . $this->view_mobile;
        $this->load->model(array('site/boituoivochong_model', 'site/article_model'));
        $this->load->library(
            array(
                'site/ngayamduong',
                'site/boituoivochong_lib',
                'site/lib_xemngay',
                'site/my_seolink',
                'site/vnkey',
                'site/my_info',
                'site/comment_lib')
        );
        $this->load->helper(array('my_menh', 'form'));
    }

    function index($input_chong = null, $input_vo = null)
    {
        //$this->boituoivochong_model->getNgay();
        if (!empty($input_chong)) {
            $input['tuoivo'] = $input_vo;
            $input['tuoichong'] = $input_chong;
            $tuoivo = $input['tuoivo'];
            $tuoichong = $input['tuoichong'];

            $arr_user_chong = array(
                'ngay_sinh' => 6,
                'thang_sinh' => 6,
                'nam_sinh' => $tuoichong,
            );
            $arr_user_vo = array(
                'ngay_sinh' => 6,
                'thang_sinh' => 6,
                'nam_sinh' => $tuoivo,
            );

            $info_chong = $this->my_info->Db_get_info_user($arr_user_chong);
            $info_vo = $this->my_info->Db_get_info_user($arr_user_vo);

            /** Tử vi 2018 **/
            $sql_chong = 'select * from article where name like "%' . $info_chong['namcanchi'] . '%" and name like "%nam%" and name like "%2018%"';
            $oneAge_chong = $this->article_model->getQuery($sql_chong);
            $data['oneAge_chong'] = $oneAge_chong;

            $sql_vo = 'select * from article where name like "%' . $info_vo['namcanchi'] . '%" and name like "%nữ%" and name like "%2018%"';
            $oneAge_vo = $this->article_model->getQuery($sql_vo);
            $data['oneAge_vo'] = $oneAge_vo;
            /** end **/

            $data['canchi'] = $info_chong['namcanchi'];
            $data['canchi2'] = $info_vo['namcanchi'];
            $sql_nam = 'select * from article where name like "%' . $info_chong['namcanchi'] . '%" and name like "%nam mạng%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_vo['namcanchi'] . '%" and name like "%nữ mạng%" and name like "%2019%"';
            $oneAge_nam = $this->article_model->getQuery($sql_nam);
            $oneAge_nu = $this->article_model->getQuery($sql_nu);
            $data['oneAgeNam'] = $oneAge_nam;
            $data['oneAgeNu'] = $oneAge_nu;


            $arr_list = array(
                'link' => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong/tuoi-chong-$namsinhnam-va-tuoi-vo-$namsinhnu',
                'replace' => array('$namsinhnam' => $input_chong, '$namsinhnu' => $input_vo, '$canchinam' => $info_chong['namcanchi'], '$canchinu' => $info_vo['namcanchi']),
            );

            $this->my_seolink->seolink_cst($arr_list);
            $this->submit = 1;
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);
        } else {
            $tuoivo = 1992;
            $tuoichong = 1992;
            $arr_list = array(
                'link' => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong',
                'replace' => array('$namsinhnam' => $input_chong, '$namsinhnu' => $input_vo),
            );
            $this->my_seolink->seolink_cst($arr_list);
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        }
        if (!empty($input_chong)) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi vợ chồng',
                    'slug' => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong',
                ),
                1 => array(
                    'name' => 'Chồng ' . $tuoichong . ' vợ ' . $tuoivo,
                    'slug' => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong/tuoi-chong-' . $tuoichong . '-va-tuoi-vo-' . $tuoivo,
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi',
                    'slug' => 'xem-tuoi',
                ),
                1 => array(
                    'name' => 'Xem tuổi vợ chồng',
                    'slug' => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $data['submit'] = $this->submit;
        $data['send_input_tuoichong'] = $tuoichong;
        $data['send_input_tuoivo'] = $tuoivo;
        //$tuoichong_dl = $this->ngayamduong->

        // get nam
        $al_tuoichong = $this->ngayamduong->get_canchi_nam(array('6', '6', $tuoichong));
        $al_tuoivo = $this->ngayamduong->get_canchi_nam(array('6', '6', $tuoivo));
        $al_tuoichong_show = get_can_menh($al_tuoichong['can']) . ' ' . get_chi_replace(get_chi_menh($al_tuoichong['chi'])); // vd : giap tuat
        $al_tuoivo_show = get_can_menh($al_tuoivo['can']) . ' ' . get_chi_replace(get_chi_menh($al_tuoivo['chi']));  // vd : giap tuat

        // get menh - ngu hanh
        $menh_tuoichong = $this->boituoivochong_model->getLucThap($al_tuoichong_show);    // cac loai : kim moc thuy hoa tho
        $menh_tuoivo = $this->boituoivochong_model->getLucThap($al_tuoivo_show);

        // get du lieu cung nam
        $cung_tuoichong = $this->boituoivochong_model->getCungMenh($tuoichong, 0); // cung : khon, ly
        $cung_tuoivo = $this->boituoivochong_model->getCungMenh($tuoivo, 1);   // cung : khon,ly

        // get du lieu menh nam
        $menhnam_tuoichong = $this->boituoivochong_model->getCungMenh($tuoichong, 0);  // cung : khon, ly - nam : hoa,tho
        $menhnam_tuoivo = $this->boituoivochong_model->getCungMenh($tuoivo, 1);        // cung : khon, ly - nam : hoa,tho

        //dd($menhnam_tuoichong);

        /** luan tuoi vo chong **/

        // menh vo chong
        $he_vo_chong = array(
            'Kim' => '1',
            'Thủy' => '2',
            'Mộc' => '3',
            'Hỏa' => '4',
            'Thổ' => '5',
        );
        $input_menh_chong = $he_vo_chong[$menh_tuoichong['he']];
        $input_menh_vo = $he_vo_chong[$menh_tuoivo['he']];
        //$input_menh_vochong = $input_menh_chong.$input_menh_vo;
        $luan_menh_vochong = $this->boituoivochong_lib->getLuannguhanh($input_menh_chong, $input_menh_vo);
        $show_menh_vochong = ' Mệnh chồng : Dương ' . $menh_tuoichong['he'] . '(' . $menh_tuoichong['nghiahan'] . ' ' . $menh_tuoichong['he'] . ')';
        $show_menh_vochong .= ' - Mệnh vợ : Dương ' . $menh_tuoivo['he'] . '(' . $menh_tuoivo['nghiahan'] . ' ' . $menh_tuoivo['he'] . ')';
        $show_menh_vochong .= ' ứng chiếu theo ngũ hành tương sinh tương khắc thì ' . $menh_tuoichong['he'] . ' ' . $luan_menh_vochong . ' ' . $menh_tuoivo['he'];
        $data['show_menh_vochong'] = $show_menh_vochong;
        $point_menh_vochong = $this->boituoivochong_lib->getScores($luan_menh_vochong);
        $data['show_scores_menh'] = $point_menh_vochong;

        // thien can vo chong
        $input_thiencan_chong = $al_tuoichong['can'];
        $input_thiencan_vo = $al_tuoivo['can'];
        //$input_thiencan_chongvo = $input_thiencan_chong.$input_thiencan_vo;
        $luan_thiencan_vochong = $this->boituoivochong_lib->getThiencanvochong($input_thiencan_chong, $input_thiencan_vo);
        $show_thiencan_vochong = ' Thiên can chồng : ' . get_can_menh($al_tuoichong['can']);
        $show_thiencan_vochong .= ' - Thiên can vợ : ' . get_can_menh($al_tuoivo['can']);
        $show_thiencan_vochong .= '. Luận theo Thiên Can Tương Khắc thì ' . get_can_menh($al_tuoichong['can']) . ' ' . $luan_thiencan_vochong . ' ' . get_can_menh($al_tuoivo['can']) . '. Do vậy Thiên Can của 2 vợ chồng ' . $luan_thiencan_vochong . ' với nhau ';
        $data['show_thiencan_vochong'] = $show_thiencan_vochong;
        $point_thiencan_vochong = $this->boituoivochong_lib->getScores($luan_thiencan_vochong);
        $data['show_scores_thiencan'] = $point_thiencan_vochong;

        // dia chi vo chong
        $input_diachi_chong = $al_tuoichong['chi'];
        $input_diachi_vo = $al_tuoivo['chi'];
        //$input_diachi_chongvo   = $input_diachi_chong.$input_diachi_vo;
        $luan_diachi_vochong = $this->boituoivochong_lib->getDiachivochong($input_diachi_chong, $input_diachi_vo);
        $show_diachi_vochong = 'Địa chi chồng : ' . get_chi_menh($al_tuoichong['chi']);
        $show_diachi_vochong .= ' - Địa chi vợ : ' . get_chi_menh($al_tuoivo['chi']);
        $show_diachi_vochong .= ' luận theo 12 con giáp thì ' . get_chi_menh($al_tuoichong['chi']) . ' ' . $luan_diachi_vochong . ' ' . get_chi_menh($al_tuoivo['chi']) . '. Do vậy Địa Chi của 2 vợ chồng ' . $luan_diachi_vochong;
        $data['show_diachi_vochong'] = $show_diachi_vochong;
        $point_diachi_vochong = $this->boituoivochong_lib->getScores($luan_diachi_vochong);
        $data['show_scores_diachi'] = $point_diachi_vochong;

        // cung kham vo chong
        $cungkham_vo_chong = array(
            '1' => 'Khảm',
            '2' => 'Khôn',
            '3' => 'Chấn',
            '4' => 'Tốn',
            '6' => 'Càn',
            '7' => 'Đoài',
            '8' => 'Cấn',
            '9' => 'Ly',
        );
        //dd($menhnam_tuoichong['cung']);
        $cungkham_vo_chong_daomang = array_flip($cungkham_vo_chong);
        //dd($cungkham_vo_chong_daomang['Ðoài']);
        $input_cungkham_chong = $cungkham_vo_chong_daomang[$menhnam_tuoichong['cung']];
        $input_cungkham_vo = $cungkham_vo_chong_daomang[$menhnam_tuoivo['cung']];
        //$input_cungkham_chongvo   = $input_cungkham_chong.$input_cungkham_vo;
        $luan_cungkham_vochong = $this->boituoivochong_lib->getCungkham($input_cungkham_chong, $input_cungkham_vo);
        $show_cungkham_vochong = 'Cung phi của chồng : ' . $menhnam_tuoichong['cung'];
        $show_cungkham_vochong .= ' - Cung phi của vợ : ' . $menhnam_tuoivo['cung'];
        $show_cungkham_vochong .= ' theo cách luận của Cung Phi Bát Trạch thì ' . $menhnam_tuoichong['cung'] . ' và ' . $menhnam_tuoivo['cung'] . ' thuộc ' . $luan_cungkham_vochong;
        $data['show_cungkham_vochong'] = $show_cungkham_vochong;
        $point_cungkham_vochong = $this->boituoivochong_lib->getScores($luan_cungkham_vochong);
        $data['show_scores_cungkham'] = $point_cungkham_vochong;

        // thien menh nam sinh
        $thienmenh_vo_chon_tucungra = array(
            'Khảm' => array('2', 'Thủy'),
            'Khôn' => array('5', 'Thổ'),
            'Chấn' => array('3', 'Mộc'),
            'Tốn' => array('3', 'Mộc'),
            'Càn' => array('1', 'Kim'),
            'Đoài' => array('1', 'Kim'),
            'Cấn' => array('5', 'Thổ'),
            'Ly' => array('4', 'Hỏa'),
        );
        //dd($menhnam_tuoichong['cung']);
        $input_thienmenh_chong = $thienmenh_vo_chon_tucungra[$menhnam_tuoichong['cung']];
        $input_thienmenh_vo = $thienmenh_vo_chon_tucungra[$menhnam_tuoivo['cung']];
        $input_thienmenh_chongvo = $input_thienmenh_chong[0] . $input_thienmenh_vo[0];
        $luan_thienmenh_vochong = $this->boituoivochong_lib->getThienmenh($input_thienmenh_chongvo);
        $show_thienmenh_vochong = 'Thiên mệnh năm sinh chồng : ' . $input_thienmenh_chong[1];
        $show_thienmenh_vochong .= ' - Thiên mệnh năm sinh vợ : ' . $input_thienmenh_vo[1];
        $show_thienmenh_vochong .= '   =>  ' . $luan_thienmenh_vochong;
        $data['show_thienmenh_vochong'] = $show_thienmenh_vochong;
        $point_thienmenh_vochong = $this->boituoivochong_lib->getScores($luan_thienmenh_vochong);
        $data['show_scores_thienmenh'] = $point_thienmenh_vochong;
        //dd($show_thienmenh_vochong);

        /** end luan tuoi vo chong **/

        $data['total_scores'] = (int)$point_menh_vochong + (int)$point_diachi_vochong + (int)$point_cungkham_vochong + (int)$point_thiencan_vochong + (int)$point_thienmenh_vochong;
        $data['total_content'] = $this->boituoivochong_lib->getScorescontent($data['total_scores']);
        // dd($data['total_content']);
        $data['al_tuoichong'] = $al_tuoichong;
        $data['al_tuoivo'] = $al_tuoivo;
        $data['al_tuoichong_show'] = $al_tuoichong_show;
        $data['al_tuoivo_show'] = $al_tuoivo_show;
        $data['menh_tuoichong'] = $menh_tuoichong;
        $data['menh_tuoivo'] = $menh_tuoivo;
        $data['cung_tuoichong'] = $cung_tuoichong;
        $data['cung_tuoivo'] = $cung_tuoivo;
        $data['menhnam_tuoichong'] = $menhnam_tuoichong;
        $data['menhnam_tuoivo'] = $menhnam_tuoivo;
        $data['tuoi'] = array('tuoivo' => $tuoivo, 'tuoichong' => $tuoichong);
        /** Điều hướng tử vi 2020 */
        if ($input_chong != null && $input_vo != null) {
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong(9, 4, $input_chong);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $nam_can_chi_slug = $this->lich->get_nam_can_slug() . '-' . $this->lich->get_nam_chi_slug();

            //$data['dieu_huong_tv_2020_link_nam']  = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh'=>$input_chong,'gioi_tinh'=>1,'nam_xem'=>2020));
            //$data['dieu_huong_tv_2020_text_nam']  = 'Xem tử vi năm 2020 tuổi '.$nam_can_chi_text.' nam mạng';

            $data['dieu_huong_tv_2021_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $input_chong, 'gioi_tinh' => 1, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text_nam'] = 'Xem tử vi 2021 tuổi ' . $nam_can_chi_text . ' nam mạng';

            $data['dieu_huong_tv_2022_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $input_chong, 'gioi_tinh' => 1, 'nam_xem' => 2022));
            $data['dieu_huong_tv_2022_text_nam'] = 'Tử vi nam tuổi '.$input_chong.' năm 2022 Nhâm Dần';


            $this->lich->set_ngayduong(9, 4, $input_vo);
            $nu_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $nu_can_chi_slug = $this->lich->get_nam_can_slug() . '-' . $this->lich->get_nam_chi_slug();

            $data['dieu_huong_tv_2021_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $input_vo, 'gioi_tinh' => 2, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text_nu'] = 'Xem tử vi 2021 tuổi ' . $nu_can_chi_text . ' nữ mạng';

            $data['dieu_huong_tv_2022_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $input_vo, 'gioi_tinh' => 2, 'nam_xem' => 2022));
            $data['dieu_huong_tv_2022_text_nu'] = 'Tử vi nữ '.$input_vo.' năm 2022 nhâm dần';

            if ($input_chong > 1960 && $input_chong <= 2000) {
                $data['dieu_huong_sim'][$input_chong]['anchor'] = 'Xem bói số điện thoại hợp tuổi ' . $nam_can_chi_text . ' ' . $input_chong . ' kích tài lộc';
                $data['dieu_huong_sim'][$input_chong]['link'] = 'xem-sim-phong-thuy-hop-tuoi-' . $nam_can_chi_slug . '-' . $input_chong . '.html';
            }

            if ($input_vo > 1960 && $input_vo <= 2000) {
                $data['dieu_huong_sim'][$input_vo]['anchor'] = 'Xem bói số điện thoại hợp tuổi ' . $nu_can_chi_text . ' ' . $input_vo . ' kích tài lộc';
                $data['dieu_huong_sim'][$input_vo]['link'] = 'xem-sim-phong-thuy-hop-tuoi-' . $nu_can_chi_slug . '-' . $input_vo . '.html';
            }
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
        // $data['view'] = $this->action_view;
        // $this->load->view( $this->view, $data );
    }

    function xemtuoilamnha($namsinh = null, $nam = null, $namlamnha = null)
    {
        /** -------- input du lieu ----------- **/
        $this->load->library('site/vnkey');
        //$input = $this->input->get();
        //dd($input);
        $data['iNamsinh'] = $namsinh ? $namsinh : 'canh-tuat';
        $data['iNamlamnha'] = $namlamnha ? $namlamnha : 2025;
        if (!empty($namsinh)) {
            $ngaysinh = 6;
            $thangsinh = 6;
            $namlamnha = $namlamnha;

            $namsinh = list_age_text($namsinh);
            if (($namsinh - $nam) % 60 != 0) {
                return redirect(base_url(), 'location', 301);
            }
            $namsinh = $nam;
            $arr_user = array(
                'ngay_sinh' => 6,
                'thang_sinh' => 6,
                'nam_sinh' => $nam,
            );
            $info_user = $this->my_info->Db_get_info_user($arr_user);
            $data['info_user'] = $info_user;
            $data['namsinh'] = $namsinh;
            $data['namlamnha'] = $namlamnha;
            $namxem = $namlamnha;
            $this->submit = 1;
            $this->run_sublink = 1;
        } else {
            $ngaysinh = 6;
            $thangsinh = 6;
            $namsinh = 2017;
            $namlamnha = 2017;
            $this->run_sublink = 0;
        }
        $data['send_input_ngaysinh'] = $ngaysinh;
        $data['send_input_thangsinh'] = $thangsinh;
        $data['send_input_namsinh'] = $namsinh;
        $data['send_input_namlamnha'] = $namlamnha;

        /** ------------ end input ----------- **/


        /** ------------ doi du lieu --------- **/
        // tuoi duong lich --------------
        $array_tuoi_duonglich = array($ngaysinh, $thangsinh, $namsinh);
        $sinh_am_lich = $this->ngayamduong->get_amlich($array_tuoi_duonglich);
        $data['sinh_am_lich'] = $sinh_am_lich;
        //dd($sinh_am_lich);

        $canchi_al_ngay = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
        $canchi_al_thang = $this->ngayamduong->get_canchi_thang($sinh_am_lich);
        $canchi_al_nam = $this->ngayamduong->get_canchi_nam($sinh_am_lich);

        //dd($canchi_al_nam);
        $canchi_ngay_show = get_can_menh($canchi_al_ngay['can']) . ' ' . get_chi_replace(get_chi_menh($canchi_al_ngay['chi'])); // vd : giap tuat
        //dd($canchi_al_thang);
        $canchi_thang_show = get_can_menh((int)$canchi_al_thang['can']) . ' ' . get_chi_replace(get_chi_menh((int)$canchi_al_thang['chi'])); // vd : giap tuat
        $canchi_nam_show = get_can_menh($canchi_al_nam['can']) . ' ' . get_chi_replace(get_chi_menh($canchi_al_nam['chi'])); // vd : giap tuat
        $data['canchi_ngay_show'] = $canchi_ngay_show;
        $data['canchi_thang_show'] = $canchi_thang_show;
        $data['canchi_nam_show'] = $canchi_nam_show;

        $tamtai_tranh = $this->boituoivochong_model->getTamtai_tranh(get_chi_menh($canchi_al_nam['chi']));
        $data['tamtai_tranh'] = $tamtai_tranh;

        //dd($canchi_nam_show);
        $menh_sinh = $this->boituoivochong_model->getLucThap($canchi_nam_show);   // hien thi menh
        $data['menh_sinh'] = $menh_sinh;
        //dd($menh_sinh);
        // khoi cong -----------------

        $canchi_nam_lamnha = $this->ngayamduong->get_canchi_nam(array(6, 6, $namlamnha));
        $canchi_nam_lamnha_show = get_can_menh($canchi_nam_lamnha['can']) . ' ' . get_chi_replace(get_chi_menh($canchi_nam_lamnha['chi'])); // vd : giap tuat
        $data['canchi_nam_lamnha_show'] = $canchi_nam_lamnha_show;
        $menh_nam_lamnha = $this->boituoivochong_model->getLucThap($canchi_nam_lamnha_show);   // giap tuat, son ha hoa
        $data['menh_nam_lamnha'] = $menh_nam_lamnha;
        //dd($menh_nam_lamnha);

        // tinh tuoi am lich ---------
        $tuoi_amlich = $namlamnha - $sinh_am_lich[2] + 1;  // bang nam am - nam sinh am + 1 tuoi
        $data['tuoi_amlich'] = $tuoi_amlich;

        /** ------------ end doi du lieu ------- **/
        // luan giai ---------------------------
        $get_kimlau = $this->boituoivochong_model->getKimlau($tuoi_amlich);
        $get_tamtai = $this->boituoivochong_model->getTamtai(get_chi_menh($canchi_al_nam['chi']), get_chi_menh($canchi_nam_lamnha['chi']));
        $get_hoangoc = $this->boituoivochong_model->getHoangoc($tuoi_amlich);
        $get_thaitue = $this->boituoivochong_lib->getThaitue($tuoi_amlich);
        $data['get_tamtai'] = $get_tamtai;
        $data['get_kimlau'] = $get_kimlau;
        $data['get_hoangoc'] = $get_hoangoc;
        $data['get_thaitue'] = $get_thaitue;

        $luangiai = '';
        $luangiai_pham = '';   // neu pham phai string
        $luangiai_pham_check = true;
        $getNamthicong = null;
        if (!empty($get_kimlau)) {
            $luangiai_pham_check = false;
            $luangiai_pham .= '- <b>Kim lâu</b> chớ có làm nhà!</br>';
        }
        if (!empty($get_tamtai)) {
            $luangiai_pham_check = false;
            $luangiai_pham .= '- <b>Tam tai<b/> chớ có làm nhà!</br>';
        }
        if (!empty($get_thaitue)) {
            $luangiai_pham_check = false;
            $luangiai_pham .= '- <b>Thái Tuế</b> chớ có làm nhà!</br>';
        }
        if (!empty($get_hoangoc)) {
            if ($get_hoangoc['is_hoangoc'] == 1) {
                $luangiai_pham_check = false;
                $luangiai_pham .= '- <b>Hoang ốc</b> chớ có làm nhà!</br>';
            }
        }
        if (!$luangiai_pham_check) {
            $pham_content = '<br><b style="color:#000;">Năm này phạm phải:</b> <br>';
            $pham_content .= '<p>' . $luangiai_pham . '</p>';
            //dd($pham_content);
            $tuoihientai_dl = array('6', '6', date('Y'));
            $tuoihientai_al = $this->ngayamduong->get_amlich($tuoihientai_dl);
            $tuoihientai = $tuoihientai_al[2] - $sinh_am_lich[2] + 1;

            /*$arr_getNamthicong  = array(
                    'kimlau'    => $tuoihientai,
                    'tamtai'    => '',
                    'hoangoc'   => '',
                );
                */
            $arr_getNamthicong = array(
                'namsinh' => $sinh_am_lich,
                'menhsinh' => $menh_sinh,
                'canchi_namsinh' => $canchi_al_nam,
            );

            $getNamthicong = $this->boituoivochong_lib->getNamthicong($arr_getNamthicong);
            //dd($getNamthicong);
        } else {
            $pham_content = 'Năm này <span class="text-danger">tốt, hợp với bạn</span> để tiến hành xây dựng, sửa chữa nhà cửa!';
        }
        $data['pham_content'] = $pham_content;
        $data['luangiai_pham_check'] = $luangiai_pham_check;
        $data['getNamthicong'] = $getNamthicong;

        // muon tuoi lam nha ----------------------
        $muontuoilamnha = $this->boituoivochong_lib->getMuontuoilamnha($namlamnha);
        $data['muontuoilamnha'] = $muontuoilamnha;
        /** ------------ data du lieu view ----- **/
        if ($this->run_sublink == 1) {
            $slugcanchi = $this->vnkey->format_key($canchi_nam_show);
            $arr_list = array(
                'link' => 'xem-tuoi-lam-nha/tuoi-$canchi-sinh-nam-$namsinh-lam-nha-$namxem-co-tot-khong',
                'replace' => array(
                    '$canchi' => get_chi_replace($canchi_nam_show),
                    '$namsinh' => $namsinh,
                    '$namxem' => $namxem,
                    '$slugcanchi' => $this->vnkey->format_key(get_chi_replace($canchi_nam_show))
                ),
            );
            $this->my_seolink->seolink_cst($arr_list);

            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);

            $data['canchi'] = $info_user['namcanchi'];
            $sql_nam = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nam mạng%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nữ mạng%" and name like "%2019%"';
            $oneAge_nam = $this->article_model->getQuery($sql_nam);
            $oneAge_nu = $this->article_model->getQuery($sql_nu);
            $data['oneAgeNam'] = $oneAge_nam;
            $data['oneAgeNu'] = $oneAge_nu;
        } else {
            $this->my_seolink->set_seolink();

            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        }


        /** ------------ end data du lieu view ---------- **/
        $data['submit'] = $this->submit;
        // get breadcrumb
        if ($this->run_sublink == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi làm nhà',
                    'slug' => 'xem-tuoi-lam-nha',
                ),
                1 => array(
                    'name' => 'Tuổi ' . get_chi_replace($canchi_nam_show) . ' năm ' . $namlamnha,
                    'slug' => 'xem-tuoi-lam-nha/tuoi-' . $this->vnkey->format_key(get_chi_replace($canchi_nam_show)) . '-sinh-nam-' . $namsinh . '-lam-nha-' . $namlamnha . '-co-tot-khong',
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi',
                    'slug' => 'xem-tuoi',
                ),
                1 => array(
                    'name' => 'Xem tuổi làm nhà',
                    'slug' => 'xem-tuoi-lam-nha',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** Điều hướng tử vi 2020 */

        if ($namsinh != null) {
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong(9, 4, $namsinh);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $nam_can_chi_slug = $this->lich->get_nam_can_slug() . '-' . $this->lich->get_nam_chi_slug();
            $data['dieu_huong_tv_2022_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 1, 'nam_xem' => 2022));
            $data['dieu_huong_tv_2022_text_nam'] = 'Xem tử vi năm 2022 tuổi ' . $nam_can_chi_text . ' nam mạng';
            $data['dieu_huong_tv_2022_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 2, 'nam_xem' => 2022));
            $data['dieu_huong_tv_2022_text_nu'] = 'Xem tử vi năm 2022 tuổi ' . $nam_can_chi_text . ' nữ mạng';

            $data['dieu_huong_tv_2021_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 1, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text_nam'] = 'Xem tử vi năm 2021 tuổi ' . $nam_can_chi_text . ' nam mạng';
            $data['dieu_huong_tv_2021_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 2, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text_nu'] = 'Xem tử vi năm 2021 tuổi ' . $nam_can_chi_text . ' nữ mạng';
            if ($namsinh > 1960 && $namsinh <= 2000) {
                $data['dieu_huong_sim'][0]['anchor'] = 'Xem bói số điện thoại hợp tuổi ' . $nam_can_chi_text . ' ' . $namsinh . ' kích tài lộc';
                $data['dieu_huong_sim'][0]['link'] = 'xem-sim-phong-thuy-hop-tuoi-' . $nam_can_chi_slug . '-' . $namsinh . '.html';
            }
        }
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = 'site/boituoivochong/xemtuoilamnha';
        $this->load->view('site/index', $data);
    }

    function xemtuoikethon($gioitinh = null, $namsinh = null, $nam = null)
    {
        /** -------- input du lieu ----------- **/
        $this->load->library('site/vnkey');
        $data['iGioitinh'] = $gioitinh ? $gioitinh : 'nam';
        $data['iNamsinh'] = $namsinh ? $namsinh : 'canh-ngo';
        $data['iNam'] = $nam ? $nam : 1990;
        $data['iNamkethon'] = isset($_POST['namkethon']) ? $_POST['namkethon'] : date('Y');

        if ($_POST) {
            $input_text = $this->input->post();
            $this->submit = 1;
            $this->run_sublink = 1;

            $ngaysinh = 6;
            $thangsinh = 6;
            $namkethon = $input_text['namkethon'];
            $namxem = $namkethon;
            $show_gioitinh = $gioitinh == 'nam' ? 'Nam' : 'Nữ';
        }
        if (!$_POST && !empty($gioitinh)) {
            $this->submit = 1;
            $this->run_sublink = 1;

            $ngaysinh = 6;
            $thangsinh = 6;
            $namkethon = date('Y');
            $namxem = $namkethon;
            $show_gioitinh = $gioitinh == 'nam' ? 'Nam' : 'Nữ';
        }
        $data['submit'] = $this->submit;
        $data['run_sublink'] = $this->run_sublink;


        if ($this->run_sublink == 1) {
            $data['show_gioitinh'] = $show_gioitinh;
            $namsinh = list_age_text($namsinh);
            if (($namsinh - $nam) % 60 != 0) {
                return redirect(base_url(), 'location', 301);
            }
            $namsinh = $nam;
            $arr_user = array(
                'ngay_sinh' => 6,
                'thang_sinh' => 6,
                'nam_sinh' => $nam,
            );
            $info_user = $this->my_info->Db_get_info_user($arr_user);
            $data['info_user'] = $info_user;
            $data['namsinh'] = $namsinh;
            $data['namkethon'] = $namkethon;
            $data['gioitinh'] = $gioitinh == 'nam' ? 'Nam' : 'Nữ';
            $data['send_input_ngaysinh'] = $ngaysinh;
            $data['send_input_thangsinh'] = $thangsinh;
            $data['send_input_namsinh'] = $namsinh;
            $data['send_input_namkethon'] = $namkethon;

            $data['canchi'] = $info_user['namcanchi'];
            $data['gioitinh_text'] = $show_gioitinh;
            $sql = 'select * from article where name like "%' . $namsinh . '%" and name like "%' . $show_gioitinh . ' mạng%" and name like "%2019%"';
            $oneAge = $this->article_model->getQuery($sql);
            $data['oneAge'] = $oneAge;
        } else {
            $this->my_seolink->set_seolink();
        }

        if ($this->run_sublink == 1) {
            $slugcanchi = $this->vnkey->format_key($info_user['namcanchi']);
            if ($gioitinh == 'nu') {
                $arr_list = array(
                    'link' => 'xem-tuoi-ket-hon/$gioitinh-tuoi-$canchi-$namsinh-lay-chong-nam-nao-tot',
                    'replace' => array('$canchi' => get_chi_replace($info_user['namcanchi']), '$namsinh' => $namsinh, '$namxem' => $namxem, '$gioitinh' => $show_gioitinh, '$slugcanchi' => $slugcanchi, '$sluggioitinh' => $gioitinh),
                );
            } else {
                $arr_list = array(
                    'link' => 'xem-tuoi-ket-hon/$gioitinh-tuoi-$canchi-$namsinh-lay-vo-nam-nao-tot',
                    'replace' => array('$canchi' => get_chi_replace($info_user['namcanchi']), '$namsinh' => $namsinh, '$namxem' => $namxem, '$gioitinh' => $show_gioitinh, '$slugcanchi' => $slugcanchi, '$sluggioitinh' => $gioitinh),
                );
            }

            $this->my_seolink->seolink_cst($arr_list);

            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);
        } else {
            $this->my_seolink->set_seolink();
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        }


        /** ------------ end input ----------- **/

        if ($this->submit == 1) {
            /** ------------ doi du lieu --------- **/
            // tuoi duong lich --------------
            $array_tuoi_duonglich = array($ngaysinh, $thangsinh, $namsinh);
            $sinh_am_lich = $this->ngayamduong->get_amlich($array_tuoi_duonglich);
            $data['sinh_am_lich'] = $sinh_am_lich;
            //dd($sinh_am_lich);

            $canchi_al_ngay = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
            $canchi_al_thang = $this->ngayamduong->get_canchi_thang($sinh_am_lich);
            $canchi_al_nam = $this->ngayamduong->get_canchi_nam($sinh_am_lich);

            //dd($canchi_al_nam);
            $canchi_ngay_show = get_can_menh($canchi_al_ngay['can']) . ' ' . get_chi_replace(get_chi_menh($canchi_al_ngay['chi'])); // vd : giap tuat
            //dd($canchi_al_thang);
            $canchi_thang_show = get_can_menh((int)$canchi_al_thang['can']) . ' ' . get_chi_replace(get_chi_menh((int)$canchi_al_thang['chi'])); // vd : giap tuat
            $canchi_nam_show = get_can_menh($canchi_al_nam['can']) . ' ' . get_chi_menh($canchi_al_nam['chi']); // vd : giap tuat
            $data['canchi_ngay_show'] = $canchi_ngay_show;
            $data['canchi_thang_show'] = $canchi_thang_show;
            $data['canchi_nam_show'] = $canchi_nam_show;

            $tamtai_tranh = $this->boituoivochong_model->getTamtai_tranh(get_chi_menh($canchi_al_nam['chi']));
            $data['tamtai_tranh'] = $tamtai_tranh;

            //dd($canchi_nam_show);
            $menh_sinh = $this->boituoivochong_model->getLucThap($canchi_nam_show);   // hien thi menh
            $data['menh_sinh'] = $menh_sinh;
            //dd($menh_sinh);
            // khoi cong -----------------

            $canchi_nam_kethon = $this->ngayamduong->get_canchi_nam(array(6, 6, $namkethon));
            $canchi_nam_kethon_show = get_can_menh($canchi_nam_kethon['can']) . ' ' . get_chi_menh($canchi_nam_kethon['chi']); // vd : giap tuat
            $data['canchi_nam_kethon_show'] = $canchi_nam_kethon_show;
            $menh_nam_kethon = $this->boituoivochong_model->getLucThap($canchi_nam_kethon_show);   // giap tuat, son ha hoa
            $data['menh_nam_kethon'] = $menh_nam_kethon;
            //dd($menh_nam_kethon);

            // tinh tuoi am lich ---------
            $tuoi_amlich = $namkethon - $sinh_am_lich[2] + 1;  // bang nam am - nam sinh am + 1 tuoi
            $data['tuoi_amlich'] = $tuoi_amlich;

            /** ------------ end doi du lieu ------- **/
            // luan giai ---------------------------
            $get_kimlau = $this->boituoivochong_model->getKimlau($tuoi_amlich);
            $get_tamtai = $this->boituoivochong_model->getTamtai(get_chi_menh($canchi_al_nam['chi']), get_chi_menh($canchi_nam_kethon['chi']));
            // $get_hoangoc    = $this->boituoivochong_model->getHoangoc($tuoi_amlich);
            $get_thaitue = $this->boituoivochong_lib->getThaitue($tuoi_amlich);
            $data['get_tamtai'] = $get_tamtai;
            $data['get_kimlau'] = $get_kimlau;
            // $data['get_hoangoc'] = $get_hoangoc;
            $data['get_thaitue'] = $get_thaitue;

            $luangiai = '';
            $luangiai_pham = '';   // neu pham phai string
            $luangiai_pham_check = true;
            $getNamthicong = null;
            if (!empty($get_kimlau)) {
                $luangiai_pham_check = false;
                $luangiai_pham .= '' . $get_kimlau['name'] . '-' . $get_kimlau['content'] . '<br>';
            }
            // if(!empty($get_tamtai)){
            //     $luangiai_pham_check = false;
            //     $luangiai_pham .= 'Tuổi này phạm phải Tam tai chớ có kết hôn!';
            // }
            // if(!empty($get_thaitue)){
            //     $luangiai_pham_check = false;
            //     $luangiai_pham .= 'Tuổi này phạm phải cung Thái Tuế chớ có kết hôn!';
            // }
            // if(!empty($get_hoangoc)){
            //     if ($get_hoangoc['is_hoangoc'] == 1) {
            //         $luangiai_pham_check = false;
            //         $luangiai_pham .= ''.$get_hoangoc['content'].'-'.$get_hoangoc['translate'];
            //     }
            // }
            if (!$luangiai_pham_check) {
                $pham_content = 'Nam này phạm phải: <br>';
                $pham_content .= '<p>' . $luangiai_pham . '</p>';
                //dd($pham_content);
                $tuoihientai_dl = array('6', '6', date('Y'));
                $tuoihientai_al = $this->ngayamduong->get_amlich($tuoihientai_dl);
                $tuoihientai = $tuoihientai_al[2] - $sinh_am_lich[2] + 1;

                /*$arr_getNamthicong  = array(
                        'kimlau'    => $tuoihientai,
                        'tamtai'    => '',
                        'hoangoc'   => '',
                    );
                    */

                //dd($getNamthicong);
            } else {
                $pham_content = 'Năm này tốt hợp với bạn có thể kết hôn !';
            }
            $arr_getNamthicong = array(
                'namsinh' => $sinh_am_lich,
                'menhsinh' => $menh_sinh,
                'canchi_namsinh' => $canchi_al_nam,
            );

            $getNamkethon = $this->boituoivochong_lib->getNamkethon($arr_getNamthicong);
            $data['pham_content'] = $pham_content;
            $data['getNamkethon'] = $getNamkethon;

            // muon tuoi lam nha ----------------------
            $muontuoikethon = $this->boituoivochong_lib->getMuontuoilamnha($namkethon);
            $data['muontuoikethon'] = $muontuoikethon;
            /** ------------ data du lieu view ----- **/

            // lay cac tuoi hop voi tuoi nguoi dung nhap theo y/c cua a duong ngay 7/5/2018

            $arr_namhop = null;
            $k = 0;
            for ($i = 1960; $i <= 2017; $i++) {
                $one_nam_tuoihop = $this->show_scan_tuoihop_codetheoyseo($namsinh, $i);
                // if($one_nam_tuoihop['total_scores'] >= 7){
                $arr_namhop[$k] = array($namsinh, 'namhop' => $i, 'info' => $one_nam_tuoihop);
                $k++;
                // }
            }
            // lay tuoi nu hop voi
            $arr_nuhop = null;
            $k = 0;
            for ($j = 1960; $j <= 2017; $j++) {
                $one_nu_tuoihop = $this->show_scan_tuoihop_codetheoyseo($j, $namsinh);
                // if($one_nu_tuoihop['total_scores'] >= 7){
                $arr_nuhop[$k] = array($namsinh, 'namhop' => $j, 'info' => $one_nu_tuoihop);
                $k++;
                // }
            }
            /** end **/
            $data['send_namhop'] = $arr_namhop;
            $data['send_nuhop'] = $arr_nuhop;
            // pr($data['send_nuhop']); exit;
        }

        /** ------------ end data du lieu view ---------- **/
        $data['submit'] = $this->submit;
        // get breadcrumb
        if ($this->submit == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi kết hôn',
                    'slug' => 'xem-tuoi-ket-hon',
                ),
                1 => array(
                    'name' => $show_gioitinh . ' tuổi ' . get_chi_replace($info_user['namcanchi']),
                    'slug' => 'xem-tuoi-ket-hon/nam-tuoi-' . $slugcanchi . '-' . $namsinh . '-lay-vo-nam-nao-tot',
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi',
                    'slug' => 'xem-tuoi',
                ),
                1 => array(
                    'name' => 'Xem tuổi kết hôn',
                    'slug' => 'xem-tuoi-ket-hon',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** Điều hướng tử vi 2020 */
        if ($namsinh != null && $gioitinh != null) {
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong(9, 4, $namsinh);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $nam_can_chi_slug = $this->lich->get_nam_can_slug() . '-' . $this->lich->get_nam_chi_slug();
            $gioi_tinh_id = $gioitinh == 'nam' ? 1 : 2;
            $gioi_tinh_text = $gioitinh == 'nam' ? 'Nam' : 'Nữ';
            $data['dieu_huong_tv_2020_link'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => $gioi_tinh_id, 'nam_xem' => 2020));
            $data['dieu_huong_tv_2020_text'] = 'Xem tử vi tuổi ' . $nam_can_chi_text . ' năm 2020 ' . $gioi_tinh_text . ' mạng';
            $data['dieu_huong_tv_2021_link'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => $gioi_tinh_id, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text'] = 'Xem tử vi tuổi ' . $nam_can_chi_text . ' năm 2021 ' . $gioi_tinh_text . ' mạng';
            $data['dieu_huong_sim'][0]['anchor'] = 'Xem bói số điện thoại hợp tuổi ' . $nam_can_chi_text . ' ' . $namsinh . ' kích tài lộc';
            $data['dieu_huong_sim'][0]['link'] = 'xem-sim-phong-thuy-hop-tuoi-' . $nam_can_chi_slug . '-' . $namsinh . '.html';

        }
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view('site/index', $data);
    }

    function xemtuoimuanha($namsinh = null, $nammuanha = null)
    {
        /** -------- input du lieu ----------- **/
        $data['iNamsinh'] = $namsinh ? $namsinh : 'canh-tuat';
        $data['iNammuanha'] = $nammuanha ? $nammuanha : date('Y');
        $this->load->library('site/vnkey');
        //$input = $this->input->get();
        //dd($input);
        if (!empty($namsinh)) {
            $ngaysinh = 6;
            $thangsinh = 6;
            $nammuanha = $nammuanha;

            $namsinh = list_age_text($namsinh);

            $arr_user = array(
                'ngay_sinh' => 6,
                'thang_sinh' => 6,
                'nam_sinh' => $namsinh,
            );
            $info_user = $this->my_info->Db_get_info_user($arr_user);
            $data['info_user'] = $info_user;
            $data['namsinh'] = $namsinh;
            $data['nammuanha'] = $nammuanha;
            $namxem = $nammuanha;
            $this->submit = 1;
            $this->run_sublink = 1;

        } else {
            $ngaysinh = 6;
            $thangsinh = 6;
            $namsinh = 2017;
            $nammuanha = 2017;
        }
        $data['send_input_ngaysinh'] = $ngaysinh;
        $data['send_input_thangsinh'] = $thangsinh;
        $data['send_input_namsinh'] = $namsinh;
        $data['send_input_nammuanha'] = $nammuanha;

        /** ------------ end input ----------- **/


        /** ------------ doi du lieu --------- **/
        // tuoi duong lich --------------
        $array_tuoi_duonglich = array($ngaysinh, $thangsinh, $namsinh);
        $sinh_am_lich = $this->ngayamduong->get_amlich($array_tuoi_duonglich);
        $data['sinh_am_lich'] = $sinh_am_lich;

        $canchi_al_ngay = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
        $canchi_al_thang = $this->ngayamduong->get_canchi_thang($sinh_am_lich);
        $canchi_al_nam = $this->ngayamduong->get_canchi_nam($sinh_am_lich);

        $canchi_ngay_show = get_can_menh($canchi_al_ngay['can']) . ' ' . get_chi_menh($canchi_al_ngay['chi']); // vd : giap tuat
        //dd($canchi_al_thang);
        $canchi_thang_show = get_can_menh((int)$canchi_al_thang['can']) . ' ' . get_chi_menh((int)$canchi_al_thang['chi']); // vd : giap tuat
        $canchi_nam_show = get_can_menh($canchi_al_nam['can']) . ' ' . get_chi_menh($canchi_al_nam['chi']); // vd : giap tuat
        $data['canchi_ngay_show'] = $canchi_ngay_show;
        $data['canchi_thang_show'] = $canchi_thang_show;
        $data['canchi_nam_show'] = $canchi_nam_show;

        $tamtai_tranh = $this->boituoivochong_model->getTamtai_tranh(get_chi_menh($canchi_al_nam['chi']));
        $data['tamtai_tranh'] = $tamtai_tranh;

        //dd($canchi_nam_show);
        $menh_sinh = $this->boituoivochong_model->getLucThap($canchi_nam_show);   // hien thi menh
        $data['menh_sinh'] = $menh_sinh;
        //dd($menh_sinh);
        // khoi cong -----------------

        $canchi_nam_muanha = $this->ngayamduong->get_canchi_nam(array(6, 6, $nammuanha));
        $canchi_nam_muanha_show = get_can_menh($canchi_nam_muanha['can']) . ' ' . get_chi_menh($canchi_nam_muanha['chi']); // vd : giap tuat
        $data['canchi_nam_muanha_show'] = $canchi_nam_muanha_show;
        $menh_nam_muanha = $this->boituoivochong_model->getLucThap($canchi_nam_muanha_show);   // giap tuat, son ha hoa
        $data['menh_nam_muanha'] = $menh_nam_muanha;
        //dd($menh_nam_muanha);

        // tinh tuoi am lich ---------
        $tuoi_amlich = $nammuanha - $sinh_am_lich[2] + 1;  // bang nam am - nam sinh am + 1 tuoi
        $data['tuoi_amlich'] = $tuoi_amlich;

        /** ------------ end doi du lieu ------- **/
        // luan giai ---------------------------
        $get_kimlau = $this->boituoivochong_model->getKimlau($tuoi_amlich);
        $get_tamtai = $this->boituoivochong_model->getTamtai(get_chi_menh($canchi_al_nam['chi']), get_chi_menh($canchi_nam_muanha['chi']));
        // $get_hoangoc    = $this->boituoivochong_model->getHoangoc($tuoi_amlich);
        // $get_thaitue    = $this->boituoivochong_lib->getThaitue($tuoi_amlich);
        $get_camtrach = $this->boituoivochong_lib->getCamtrach($tuoi_amlich);
        $data['get_tamtai'] = $get_tamtai;
        $data['get_kimlau'] = $get_kimlau;
        // $data['get_hoangoc'] = $get_hoangoc;
        // $data['get_thaitue'] = $get_thaitue;
        $data['get_camtrach'] = $get_camtrach;

        $luangiai = '';
        $luangiai_pham = '';   // neu pham phai string
        $luangiai_pham_check = true;
        $getNamthicong = null;
        if (!empty($get_kimlau)) {
            $luangiai_pham_check = false;
            $luangiai_pham .= '- <b>' . $get_kimlau['name'] . '</b> : ' . $get_kimlau['content'] . '<br>';
        }
        if (!empty($get_tamtai)) {
            $luangiai_pham_check = false;
            $luangiai_pham .= '- <b>Tam tai</b> chớ có mua nhà!<br>';
        }
        if (!empty($get_camtrach)) {
            if ($get_camtrach[1] == 0) {
                $luangiai_pham_check = false;
                $luangiai_pham .= '- <b>Cửu trạch</b> ' . $get_camtrach[0] . ' chớ có mua nhà!';
            }
        }
        /*if(!empty($get_thaitue)){
                $luangiai_pham_check = false;
                $luangiai_pham .= 'Tuổi này phạm phải cung Thái Tuế chớ có mua nhà!';
            }*/
        /*if(!empty($get_hoangoc)){
                if ($get_hoangoc['is_hoangoc'] == 1) {
                    $luangiai_pham_check = false;
                    $luangiai_pham .= ''.$get_hoangoc['content'].'-'.$get_hoangoc['translate'];
                }
            }*/
        if (!$luangiai_pham_check) {
            $pham_content = '<b style="color:#000;">Năm này phạm phải:</b> <br>';
            $pham_content .= '<p>' . $luangiai_pham . '</p>';
            //dd($pham_content);
            $tuoihientai_dl = array('6', '6', date('Y'));
            $tuoihientai_al = $this->ngayamduong->get_amlich($tuoihientai_dl);
            $tuoihientai = $tuoihientai_al[2] - $sinh_am_lich[2] + 1;

            /*$arr_getNamthicong  = array(
                    'kimlau'    => $tuoihientai,
                    'tamtai'    => '',
                    'hoangoc'   => '',
                );
                */
            $arr_getNammuanha = array(
                'namsinh' => $sinh_am_lich,
                'menhsinh' => $menh_sinh,
                'canchi_namsinh' => $canchi_al_nam,
            );

            $getNammuanha = $this->boituoivochong_lib->getNammuanha($arr_getNammuanha);
            //dd($getNamthicong);
        } else {
            $pham_content = 'Năm này tốt hợp với bạn có thể mua nhà !';
            $getNammuanha = null;
        }
        $data['pham_content'] = $pham_content;
        $data['getNammuanha'] = $getNammuanha;

        // muon tuoi mua nha ----------------------
        $muontuoimuanha = $this->boituoivochong_lib->getMuontuoimuanha($nammuanha);
        $data['muontuoimuanha'] = $muontuoimuanha;
        /** ------------ data du lieu view ----- **/

        if ($this->run_sublink == 1) {
            $slugcanchi = $this->vnkey->format_key($canchi_nam_show);
            $arr_list = array(
                'link' => 'xem-tuoi-mua-nha/tuoi-$canchi-mua-nha-nam-$namxem-co-tot-khong',
                'replace' => array('$canchi' => get_chi_replace($canchi_nam_show), '$namsinh' => $namsinh, '$namxem' => $namxem, '$slugcanchi' => $slugcanchi),
            );
            $this->my_seolink->seolink_cst($arr_list);
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);

            $data['canchi'] = $info_user['namcanchi'];
            $sql_nam = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nam mạng%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nữ mạng%" and name like "%2019%"';
            $oneAge_nam = $this->article_model->getQuery($sql_nam);
            $oneAge_nu = $this->article_model->getQuery($sql_nu);
            $data['oneAgeNam'] = $oneAge_nam;
            $data['oneAgeNu'] = $oneAge_nu;
        } else {
            $this->my_seolink->set_seolink();
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        }

        // get breadcrumb
        if ($this->run_sublink == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi mua nhà',
                    'slug' => 'xem-tuoi-mua-nha',
                ),
                1 => array(
                    'name' => 'Tuổi ' . get_chi_replace($canchi_nam_show) . ' năm ' . $nammuanha,
                    'slug' => 'xem-tuoi-mua-nha/tuoi-' . $slugcanchi . '-mua-nha-nam-' . $nammuanha . '-co-tot-khong',
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi',
                    'slug' => 'xem-tuoi',
                ),
                1 => array(
                    'name' => 'Xem tuổi mua nhà',
                    'slug' => 'xem-tuoi-mua-nha',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** ------------ end data du lieu view ---------- **/
        /** Điều hướng tử vi 2020 */
        if ($namsinh != null) {
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong(9, 4, $namsinh);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $nam_can_chi_slug = $this->lich->get_nam_can_slug() . '-' . $this->lich->get_nam_chi_slug();
            $data['dieu_huong_tv_2020_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 1, 'nam_xem' => 2020));
            $data['dieu_huong_tv_2020_text_nam'] = 'Xem tử vi năm 2020 tuổi ' . $nam_can_chi_text . ' nam mạng';
            $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 2, 'nam_xem' => 2020));
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem tử vi năm 2020 tuổi ' . $nam_can_chi_text . ' nữ mạng';

            $data['dieu_huong_tv_2021_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 1, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text_nam'] = 'Xem tử vi năm 2021 tuổi ' . $nam_can_chi_text . ' nam mạng';
            $data['dieu_huong_tv_2021_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 2, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text_nu'] = 'Xem tử vi năm 2021 tuổi ' . $nam_can_chi_text . ' nữ mạng';
            if ($namsinh > 1960 && $namsinh <= 2000) {
                $data['dieu_huong_sim'][0]['anchor'] = 'Xem bói số điện thoại hợp tuổi ' . $nam_can_chi_text . ' ' . $namsinh . ' kích tài lộc';
                $data['dieu_huong_sim'][0]['link'] = 'xem-sim-phong-thuy-hop-tuoi-' . $nam_can_chi_slug . '-' . $namsinh . '.html';
            }
        }
        $data['submit'] = $this->submit;
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = 'site/boituoivochong/xemtuoimuanha';
        $this->load->view('site/index', $data);
    }

    function get_tuoi()
    {
        $this->load->view('boituoivochong/get_tuoi');
    }

    function xem_tuoi_con($canchichong = null, $namsinhchong = null, $canchivo = null, $namsinhvo = null)
    {
        $data['iCcChong'] = $canchichong ? $canchichong : 'canh-ngo';
        $data['iCcVo'] = $canchivo ? $canchivo : 'nham-than';
        $data['iNsCon'] = isset($_POST['namsinh_con']) ? $_POST['namsinh_con'] : date('Y');
        $this->load->library('site/vnkey');
        if ($namsinhchong - $namsinhvo <= -15 || $namsinhchong - $namsinhvo > 10) {
            redirect(base_url('xem-tuoi-sinh-con.html'));
        }
        if ($_POST) {
            $input = $this->input->post();
            $ngaysinh_cha = $input['ngaysinh_cha'];
            $thangsinh_cha = $input['thangsinh_cha'];
            $namsinh_cha = list_age_text($input['namsinh_cha']);
            $ngaysinh_me = $input['ngaysinh_me'];
            $thangsinh_me = $input['thangsinh_me'];
            $namsinh_me = list_age_text($input['namsinh_me']);
            $ngaysinh_con = $input['ngaysinh_con'];
            $thangsinh_con = $input['thangsinh_con'];
            $namsinh_con = $input['namsinh_con'];
            $this->run_sublink = 1;
            $this->submit = 1;
        }

        if (!$_POST && !empty($canchichong)) {
            $this->run_sublink = 1;
            /*if (!empty($namsinh_con)) {
                    $this->run_sublink  = 1;
                }*/
            $ngaysinh_cha = 6;
            $thangsinh_cha = 6;
            $namsinh_cha = $namsinhchong;
            $ngaysinh_me = 6;
            $thangsinh_me = 6;
            $namsinh_me = $namsinhvo;
            $ngaysinh_con = 6;
            $thangsinh_con = 6;
            $namsinh_con = date('Y');
            $this->submit = 1;
        }
        if (!$_POST && empty($canchichong)) {
            $this->run_sublink = 0;
            $ngaysinh_cha = 6;
            $thangsinh_cha = 6;
            $namsinh_cha = 1990;
            $ngaysinh_me = 6;
            $thangsinh_me = 6;
            $namsinh_me = 1992;
            $ngaysinh_con = 6;
            $thangsinh_con = 6;
            $namsinh_con = date('Y');
            $this->submit = 0;
        }

        if (!$_POST && !empty($namsinh_con) && isset($_GET['ngaysinh_cha'])) {
            $this->run_sublink = 1;
            $data['noindex'] = '<meta name="robots" content="noindex, nofollow">';
            $this->submit = 1;
            $get = $this->input->get();
            $ngaysinh_cha = $get['ngaysinh_cha'];
            $thangsinh_cha = $get['thangsinh_cha'];
            $namsinh_cha = $get['namsinh_cha'];
            $ngaysinh_me = $get['ngaysinh_me'];
            $thangsinh_me = $get['thangsinh_me'];
            $namsinh_me = $get['namsinh_me'];
            $ngaysinh_con = $get['ngaysinh_con'];
            $thangsinh_con = $get['thangsinh_con'];
            $namsinh_con = $get['namsinh_con'];
            // pr($namsinh_con); exit;
        }

        $data['submit'] = $this->submit;
        $data['send_input_ngaysinh_cha'] = $ngaysinh_cha;
        $data['send_input_thangsinh_cha'] = $thangsinh_cha;
        $data['send_input_namsinh_cha'] = $namsinh_cha;
        $data['send_input_ngaysinh_me'] = $ngaysinh_me;
        $data['send_input_thangsinh_me'] = $thangsinh_me;
        $data['send_input_namsinh_me'] = $namsinh_me;
        $data['send_input_ngaysinh_con'] = $ngaysinh_con;
        $data['send_input_thangsinh_con'] = $thangsinh_con;
        $data['send_input_namsinh_con'] = $namsinh_con;

        /** doi du lieu **/
        // cha
        $array_tuoi_duonglich_cha = array($ngaysinh_cha, $thangsinh_cha, $namsinh_cha);
        $sinh_am_lich_cha = $this->ngayamduong->get_amlich($array_tuoi_duonglich_cha);
        $data['sinh_am_lich_cha'] = $sinh_am_lich_cha;

        $canchi_al_ngay_cha = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_cha);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
        $canchi_al_thang_cha = $this->ngayamduong->get_canchi_thang($sinh_am_lich_cha);
        $canchi_al_nam_cha = $this->ngayamduong->get_canchi_nam($sinh_am_lich_cha);

        $canchi_ngay_show_cha = get_can_menh($canchi_al_ngay_cha['can']) . ' ' . get_chi_menh($canchi_al_ngay_cha['chi']); // vd : giap tuat
        $canchi_thang_show_cha = get_can_menh((int)$canchi_al_thang_cha['can']) . ' ' . get_chi_menh((int)$canchi_al_thang_cha['chi']); // vd : giap tuat
        $canchi_nam_show_cha = get_can_menh($canchi_al_nam_cha['can']) . ' ' . get_chi_menh($canchi_al_nam_cha['chi']); // vd : giap tuat

        $data['canchi_ngay_show_cha'] = $canchi_ngay_show_cha;
        $data['canchi_thang_show_cha'] = $canchi_thang_show_cha;
        $data['canchi_nam_show_cha'] = $canchi_nam_show_cha;
        $data['can_nam_show_cha'] = get_can_menh($canchi_al_nam_cha['can']);
        $data['chi_nam_show_cha'] = get_chi_menh($canchi_al_nam_cha['chi']);
        //dd($canchi_nam_show_cha);

        $menh_sinh_cha = $this->boituoivochong_model->getLucThap($canchi_nam_show_cha);   // hien thi menh
        $data['menh_sinh_cha'] = $menh_sinh_cha;

        // me
        $array_tuoi_duonglich_me = array($ngaysinh_me, $thangsinh_me, $namsinh_me);
        $sinh_am_lich_me = $this->ngayamduong->get_amlich($array_tuoi_duonglich_me);
        $data['sinh_am_lich_me'] = $sinh_am_lich_me;

        $canchi_al_ngay_me = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_me);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
        $canchi_al_thang_me = $this->ngayamduong->get_canchi_thang($sinh_am_lich_me);
        $canchi_al_nam_me = $this->ngayamduong->get_canchi_nam($sinh_am_lich_me);

        $canchi_ngay_show_me = get_can_menh($canchi_al_ngay_me['can']) . ' ' . get_chi_menh($canchi_al_ngay_me['chi']); // vd : giap tuat
        $canchi_thang_show_me = get_can_menh((int)$canchi_al_thang_me['can']) . ' ' . get_chi_menh((int)$canchi_al_thang_me['chi']); // vd : giap tuat
        $canchi_nam_show_me = get_can_menh($canchi_al_nam_me['can']) . ' ' . get_chi_menh($canchi_al_nam_me['chi']); // vd : giap tuat
        $data['canchi_ngay_show_me'] = $canchi_ngay_show_me;
        $data['canchi_thang_show_me'] = $canchi_thang_show_me;
        $data['canchi_nam_show_me'] = $canchi_nam_show_me;
        $data['can_nam_show_me'] = get_can_menh($canchi_al_nam_me['can']);
        $data['chi_nam_show_me'] = get_chi_menh($canchi_al_nam_me['chi']);

        $menh_sinh_me = $this->boituoivochong_model->getLucThap($canchi_nam_show_me);   // hien thi menh
        $data['menh_sinh_me'] = $menh_sinh_me;

        // con
        $array_tuoi_duonglich_con = array($ngaysinh_con, $thangsinh_con, $namsinh_con);
        $sinh_am_lich_con = $this->ngayamduong->get_amlich($array_tuoi_duonglich_con);
        $data['sinh_am_lich_con'] = $sinh_am_lich_con;

        $canchi_al_ngay_con = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_con);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
        $canchi_al_thang_con = $this->ngayamduong->get_canchi_thang($sinh_am_lich_con);
        $canchi_al_nam_con = $this->ngayamduong->get_canchi_nam($sinh_am_lich_con);

        $canchi_ngay_show_con = get_can_menh($canchi_al_ngay_con['can']) . ' ' . get_chi_menh($canchi_al_ngay_con['chi']); // vd : giap tuat
        $canchi_thang_show_con = get_can_menh((int)$canchi_al_thang_con['can']) . ' ' . get_chi_menh((int)$canchi_al_thang_con['chi']); // vd : giap tuat
        $canchi_nam_show_con = get_can_menh($canchi_al_nam_con['can']) . ' ' . get_chi_menh($canchi_al_nam_con['chi']); // vd : giap tuat
        $data['canchi_ngay_show_con'] = $canchi_ngay_show_con;
        $data['canchi_thang_show_con'] = $canchi_thang_show_con;
        $data['canchi_nam_show_con'] = $canchi_nam_show_con;
        $data['can_nam_show_con'] = get_can_menh($canchi_al_nam_con['can']);
        $data['chi_nam_show_con'] = get_chi_menh($canchi_al_nam_con['chi']);

        $menh_sinh_con = $this->boituoivochong_model->getLucThap($canchi_nam_show_con);   // hien thi menh
        $data['menh_sinh_con'] = $menh_sinh_con;


        /** chua biet get de lam cai gi **/
        //$cung_user_cha = $this->boituoivochong_model->getCungMenh($namsinh_cha, 0);
        //$cung_user_me = $this->boituoivochong_model->getCungMenh($namsinh_me, 1);
        //$cung_user_con = $this->boituoivochong_model->getCungMenh($namsinh_con, 1);

        /** end **/

        /** end doi du lieu **/

        /** xu ly du lieu **/

        // so sanh ngu hanh
        $he_list = array(
            'Kim' => '1',
            'Thủy' => '2',
            'Mộc' => '3',
            'Hỏa' => '4',
            'Thổ' => '5',
        );
        // pr($menh_sinh_me['he']); exit;
        $input_menh_chong = $he_list[$menh_sinh_cha['he']];
        $input_menh_vo = $he_list[$menh_sinh_me['he']];
        $input_menh_con = $he_list[$menh_sinh_con['he']];
        $luan_nguhanh_chong_con = $this->boituoivochong_lib->getLuannguhanh($input_menh_chong, $input_menh_con);
        $luan_nguhanh_vo_con = $this->boituoivochong_lib->getLuannguhanh($input_menh_vo, $input_menh_con);
        $point_nguhanh_chong_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_nguhanh_chong_con);
        $point_nguhanh_me_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_nguhanh_vo_con);
        // Cap nhap
        $data['show_luan_nguhanh_chong_vo'] = $luan_nguhanh_chong_vo = $this->boituoivochong_lib->getLuannguhanh($input_menh_chong, $input_menh_vo);
        $data['show_point_nguhanh_chong_vo'] = $point_nguhanh_chong_vo = $this->boituoivochong_lib->getscores_xemtuoicon($luan_nguhanh_chong_vo);
        $data['show_luan_nguhanh_chong_con'] = $luan_nguhanh_chong_con;
        $data['show_luan_nguhanh_vo_con'] = $luan_nguhanh_vo_con;
        $data['show_point_nguhanh_chong_con'] = $point_nguhanh_chong_con['scores_tuoicon_thiencan'];
        $data['show_point_nguhanh_vo_con'] = $point_nguhanh_me_con['scores_tuoicon_thiencan'];

        // so sanh thien can
        $luan_thiencan_cha_con = $this->boituoivochong_lib->getThiencanvochong($canchi_al_nam_cha['can'], $canchi_al_nam_con['can']);
        $luan_thiencan_me_con = $this->boituoivochong_lib->getThiencanvochong($canchi_al_nam_me['can'], $canchi_al_nam_con['can']);
        $point_thiencan_chong_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_thiencan_cha_con);
        $point_thiencan_me_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_thiencan_me_con);

        // Cap nhap
        $data['show_luan_thiencan_cha_me'] = $luan_thiencan_cha_me = $this->boituoivochong_lib->getThiencanvochong($canchi_al_nam_cha['can'], $canchi_al_nam_me['can']);
        $data['show_point_thiencan_cha_me'] = $point_thiencan_cha_me = $this->boituoivochong_lib->getscores_xemtuoicon($luan_thiencan_cha_me);

        $data['show_luan_thiencan_cha_con'] = $luan_thiencan_cha_con;
        $data['show_luan_thiencan_me_con'] = $luan_thiencan_me_con;
        $data['show_point_thiencan_chong_con'] = $point_thiencan_chong_con['scores_tuoicon_thiendia'];
        $data['show_point_thiencan_me_con'] = $point_thiencan_me_con['scores_tuoicon_thiendia'];

        // so sanh dia chi
        $luan_diachi_cha_con = $this->boituoivochong_lib->getDiachivochong($canchi_al_nam_cha['chi'], $canchi_al_nam_con['chi']);
        $luan_diachi_me_con = $this->boituoivochong_lib->getDiachivochong($canchi_al_nam_me['chi'], $canchi_al_nam_con['chi']);
        $point_diachi_chong_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_diachi_cha_con);
        $point_diachi_me_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_diachi_me_con);

        // Cap nhap
        $data['luan_diachi_cha_me'] = $luan_diachi_cha_me = $this->boituoivochong_lib->getDiachivochong($canchi_al_nam_cha['chi'], $canchi_al_nam_me['chi']);
        $data['show_point_diachi_cha_me'] = $point_diachi_cha_me = $this->boituoivochong_lib->getscores_xemtuoicon($luan_diachi_cha_me);

        $data['show_luan_diachi_cha_con'] = $luan_diachi_cha_con;
        $data['show_luan_diachi_me_con'] = $luan_diachi_me_con;
        $data['show_point_diachi_chong_con'] = $point_diachi_chong_con['scores_tuoicon_thiendia'];
        $data['show_point_diachi_me_con'] = $point_diachi_me_con['scores_tuoicon_thiendia'];
        /** end xu ly du lieu **/
        // Xử lý lấy 3 năm sinh con có điểm từ 13 trở lên (đợt chỉnh sửa ngày 19/1/2018 Trang seo)
        $arr_3namdep = array();
        for ($i = $namsinh_con; $i < $namsinh_con + 10; $i++) {
            $input_3 = array(
                'ngaysinhcha' => $ngaysinh_cha,
                'thangsinhcha' => $thangsinh_cha,
                'namsinhcha' => $namsinh_cha,
                'ngaysinhme' => $ngaysinh_me,
                'thangsinhme' => $thangsinh_me,
                'namsinhme' => $namsinh_me,
                'ngaysinhcon' => $ngaysinh_con,
                'thangsinhcon' => $thangsinh_con,
                'namsinhcon' => $i,
            );
            // ban đầu hàm này lấy ra 3 năm sinh con đẹp gần nhất nhưng sau sửa thành lấy ra thông tin 5 năm sinh con liên tiếp với năm người dùng nhập vào
            $x = $this->banamsinhcondep_gannhat($input_3);
            if ($x) {
                $arr_3namdep[] = $x;
            }
        }
        $data['arr_5nam'] = $arr_3namdep;
        // pr($data['arr_5nam']); exit;
        // end

        /** Tử vi 2018 **/
        $sql_chong = 'select * from article where name like "%' . $canchi_nam_show_cha . '%" and name like "%nam%" and name like "%2018%"';
        $oneAge_chong = $this->article_model->getQuery($sql_chong);
        $data['oneAge_chong'] = $oneAge_chong;

        $sql_vo = 'select * from article where name like "%' . $canchi_nam_show_me . '%" and name like "%nữ%" and name like "%2018%"';
        $oneAge_vo = $this->article_model->getQuery($sql_vo);
        $data['oneAge_vo'] = $oneAge_vo;

        if ($canchichong and $canchivo) {
            $data['canchi'] = slug_to_text($canchichong);
            $data['canchi2'] = slug_to_text($canchivo);

            /*$data['link_tuvi_2020_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh_cha, 'gioi_tinh' => 1, 'nam_xem' => 2020));
            $data['link_tuvi_2020_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh_me, 'gioi_tinh' => 2, 'nam_xem' => 2020));*/

            $data['link_tuvi_2021_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh_cha, 'gioi_tinh' => 1, 'nam_xem' => 2021));
            $data['link_tuvi_2021_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh_me, 'gioi_tinh' => 2, 'nam_xem' => 2021));


            $data['dieu_huong_tv_2021_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh_cha, 'gioi_tinh' => 1, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text_nam'] = 'Xem tử vi năm 2021 tuổi ' . $data['canchi'] . ' nam mạng';

            $data['dieu_huong_tv_2022_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh_cha, 'gioi_tinh' => 1, 'nam_xem' => 2022));
            $data['dieu_huong_tv_2022_text_nam'] = 'Tử vi nam '.$namsinh_cha.' năm 2022 Nhâm Dần';

            $data['dieu_huong_tv_2021_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh_me, 'gioi_tinh' => 2, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text_nu'] = 'Xem tử vi năm 2021 tuổi ' . $data['canchi2'] . ' nữ mạng';

            $data['dieu_huong_tv_2022_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh_me, 'gioi_tinh' => 2, 'nam_xem' => 2022));
            $data['dieu_huong_tv_2022_text_nu'] = 'Tử vi nữ tuổi '.$namsinh_me.' năm 2022 Nhâm Dần';

        }


        /** end **/

        if ($this->run_sublink == 1) {
            $arr_list = array(
                'link' => 'chong-tuoi-$canchichong-$namsinhchong-vo-tuoi-$canchivo-$namsinhvo-sinh-con-nam-nao-tot',
                'replace' => array('$namsinhchong' => $namsinh_cha, '$namsinhvo' => $namsinh_me, '$namcon' => $namsinh_con, '$namxem' => $namsinh_con, '$slug_canchichong' => $canchichong, '$slug_canchivo' => $canchivo, '$canchichong' => $canchi_nam_show_cha, '$canchivo' => $canchi_nam_show_me),
            );
            // print_r($arr_list); exit;
            $this->my_seolink->seolink_cst($arr_list);

            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);
        } else {
            $this->my_seolink->set_seolink();

            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        }
        if ($namsinhchong > 1960 && $namsinhchong <= 2000) {
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong(9, 4, $namsinhchong);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $nam_can_chi_slug = $this->lich->get_nam_can_slug() . '-' . $this->lich->get_nam_chi_slug();
            $data['dieu_huong_sim'][$namsinhchong]['anchor'] = 'Xem bói số điện thoại hợp tuổi ' . $nam_can_chi_text . ' ' . $namsinhchong . ' kích tài lộc';
            $data['dieu_huong_sim'][$namsinhchong]['link'] = 'xem-sim-phong-thuy-hop-tuoi-' . $nam_can_chi_slug . '-' . $namsinhchong . '.html';
        }
        if ($namsinhvo > 1960 && $namsinhvo <= 2000) {
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong(9, 4, $namsinhvo);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $nam_can_chi_slug = $this->lich->get_nam_can_slug() . '-' . $this->lich->get_nam_chi_slug();
            $data['dieu_huong_sim'][$namsinhvo]['anchor'] = 'Xem bói số điện thoại hợp tuổi ' . $nam_can_chi_text . ' ' . $namsinhvo . ' kích tài lộc';
            $data['dieu_huong_sim'][$namsinhvo]['link'] = 'xem-sim-phong-thuy-hop-tuoi-' . $nam_can_chi_slug . '-' . $namsinhvo . '.html';
        }
        // get breadcrumb
        if ($this->run_sublink == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi sinh con',
                    'slug' => 'xem-tuoi-sinh-con',
                ),
                1 => array(
                    'name' => 'Chồng ' . $namsinh_cha . ' vợ ' . $namsinh_me,
                    'slug' => 'xem-tuoi-sinh-con/chong-tuoi-' . $canchichong . '-' . $namsinh_cha . '-vo-tuoi-' . $canchivo . '-' . $namsinh_me . '-sinh-con-nam-nao-tot',
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi',
                    'slug' => 'xem-tuoi',
                ),
                1 => array(
                    'name' => 'Xem tuổi sinh con',
                    'slug' => 'xem-tuoi-sinh-con',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    function xem_tuoi_con_url_old($namsinh_con = null)
    {
        $this->load->library('site/vnkey');
        if ($_POST) {
            $input = $this->input->post();
            $ngaysinh_cha = $input['ngaysinh_cha'];
            $thangsinh_cha = $input['thangsinh_cha'];
            $namsinh_cha = $input['namsinh_cha'];
            $ngaysinh_me = $input['ngaysinh_me'];
            $thangsinh_me = $input['thangsinh_me'];
            $namsinh_me = $input['namsinh_me'];
            $ngaysinh_con = $input['ngaysinh_con'];
            $thangsinh_con = $input['thangsinh_con'];
            $namsinh_con = $input['namsinh_con'];
            $this->run_sublink = 1;
            $this->submit = 1;
        } else {
            $this->run_sublink = 0;
            if (!empty($namsinh_con)) {
                $this->run_sublink = 1;
            }
            $ngaysinh_cha = 6;
            $thangsinh_cha = 6;
            $namsinh_cha = 2000;
            $ngaysinh_me = 6;
            $thangsinh_me = 6;
            $namsinh_me = 2000;
            $ngaysinh_con = 6;
            $thangsinh_con = 6;
            $namsinh_con = $namsinh_con;
            // $this->submit   = 1;
        }
        $data['submit'] = $this->submit;
        $data['send_input_ngaysinh_cha'] = $ngaysinh_cha;
        $data['send_input_thangsinh_cha'] = $thangsinh_cha;
        $data['send_input_namsinh_cha'] = $namsinh_cha;
        $data['send_input_ngaysinh_me'] = $ngaysinh_me;
        $data['send_input_thangsinh_me'] = $thangsinh_me;
        $data['send_input_namsinh_me'] = $namsinh_me;
        $data['send_input_ngaysinh_con'] = $ngaysinh_con;
        $data['send_input_thangsinh_con'] = $thangsinh_con;
        $data['send_input_namsinh_con'] = $namsinh_con;

        /** doi du lieu **/
        // cha
        $array_tuoi_duonglich_cha = array($ngaysinh_cha, $thangsinh_cha, $namsinh_cha);
        $sinh_am_lich_cha = $this->ngayamduong->get_amlich($array_tuoi_duonglich_cha);
        $data['sinh_am_lich_cha'] = $sinh_am_lich_cha;

        $canchi_al_ngay_cha = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_cha);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
        $canchi_al_thang_cha = $this->ngayamduong->get_canchi_thang($sinh_am_lich_cha);
        $canchi_al_nam_cha = $this->ngayamduong->get_canchi_nam($sinh_am_lich_cha);

        $canchi_ngay_show_cha = get_can_menh($canchi_al_ngay_cha['can']) . ' ' . get_chi_menh($canchi_al_ngay_cha['chi']); // vd : giap tuat
        $canchi_thang_show_cha = get_can_menh((int)$canchi_al_thang_cha['can']) . ' ' . get_chi_menh((int)$canchi_al_thang_cha['chi']); // vd : giap tuat
        $canchi_nam_show_cha = get_can_menh($canchi_al_nam_cha['can']) . ' ' . get_chi_menh($canchi_al_nam_cha['chi']); // vd : giap tuat
        $data['canchi_ngay_show_cha'] = $canchi_ngay_show_cha;
        $data['canchi_thang_show_cha'] = $canchi_thang_show_cha;
        $data['canchi_nam_show_cha'] = $canchi_nam_show_cha;
        $data['can_nam_show_cha'] = get_can_menh($canchi_al_nam_cha['can']);
        $data['chi_nam_show_cha'] = get_chi_menh($canchi_al_nam_cha['chi']);
        //dd($canchi_nam_show_cha);

        $menh_sinh_cha = $this->boituoivochong_model->getLucThap($canchi_nam_show_cha);   // hien thi menh
        $data['menh_sinh_cha'] = $menh_sinh_cha;

        // me
        $array_tuoi_duonglich_me = array($ngaysinh_me, $thangsinh_me, $namsinh_me);
        $sinh_am_lich_me = $this->ngayamduong->get_amlich($array_tuoi_duonglich_me);
        $data['sinh_am_lich_me'] = $sinh_am_lich_me;

        $canchi_al_ngay_me = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_me);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
        $canchi_al_thang_me = $this->ngayamduong->get_canchi_thang($sinh_am_lich_me);
        $canchi_al_nam_me = $this->ngayamduong->get_canchi_nam($sinh_am_lich_me);

        $canchi_ngay_show_me = get_can_menh($canchi_al_ngay_me['can']) . ' ' . get_chi_menh($canchi_al_ngay_me['chi']); // vd : giap tuat
        $canchi_thang_show_me = get_can_menh((int)$canchi_al_thang_me['can']) . ' ' . get_chi_menh((int)$canchi_al_thang_me['chi']); // vd : giap tuat
        $canchi_nam_show_me = get_can_menh($canchi_al_nam_me['can']) . ' ' . get_chi_menh($canchi_al_nam_me['chi']); // vd : giap tuat
        $data['canchi_ngay_show_me'] = $canchi_ngay_show_me;
        $data['canchi_thang_show_me'] = $canchi_thang_show_me;
        $data['canchi_nam_show_me'] = $canchi_nam_show_me;
        $data['can_nam_show_me'] = get_can_menh($canchi_al_nam_me['can']);
        $data['chi_nam_show_me'] = get_chi_menh($canchi_al_nam_me['chi']);

        $menh_sinh_me = $this->boituoivochong_model->getLucThap($canchi_nam_show_me);   // hien thi menh
        $data['menh_sinh_me'] = $menh_sinh_me;

        // con
        $array_tuoi_duonglich_con = array($ngaysinh_con, $thangsinh_con, $namsinh_con);
        $sinh_am_lich_con = $this->ngayamduong->get_amlich($array_tuoi_duonglich_con);
        $data['sinh_am_lich_con'] = $sinh_am_lich_con;

        $canchi_al_ngay_con = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_con);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
        $canchi_al_thang_con = $this->ngayamduong->get_canchi_thang($sinh_am_lich_con);
        $canchi_al_nam_con = $this->ngayamduong->get_canchi_nam($sinh_am_lich_con);

        $canchi_ngay_show_con = get_can_menh($canchi_al_ngay_con['can']) . ' ' . get_chi_menh($canchi_al_ngay_con['chi']); // vd : giap tuat
        $canchi_thang_show_con = get_can_menh((int)$canchi_al_thang_con['can']) . ' ' . get_chi_menh((int)$canchi_al_thang_con['chi']); // vd : giap tuat
        $canchi_nam_show_con = get_can_menh($canchi_al_nam_con['can']) . ' ' . get_chi_menh($canchi_al_nam_con['chi']); // vd : giap tuat
        $data['canchi_ngay_show_con'] = $canchi_ngay_show_con;
        $data['canchi_thang_show_con'] = $canchi_thang_show_con;
        $data['canchi_nam_show_con'] = $canchi_nam_show_con;
        $data['can_nam_show_con'] = get_can_menh($canchi_al_nam_con['can']);
        $data['chi_nam_show_con'] = get_chi_menh($canchi_al_nam_con['chi']);

        $menh_sinh_con = $this->boituoivochong_model->getLucThap($canchi_nam_show_con);   // hien thi menh
        $data['menh_sinh_con'] = $menh_sinh_con;


        /** chua biet get de lam cai gi **/
        $cung_user_cha = $this->boituoivochong_model->getCungMenh($namsinh_cha, 0);
        $cung_user_me = $this->boituoivochong_model->getCungMenh($namsinh_me, 1);
        $cung_user_con = $this->boituoivochong_model->getCungMenh($namsinh_con, 1);

        /** end **/

        /** end doi du lieu **/

        /** xu ly du lieu **/

        // so sanh ngu hanh
        $he_list = array(
            'Kim' => '1',
            'Thủy' => '2',
            'Mộc' => '3',
            'Hỏa' => '4',
            'Thổ' => '5',
        );
        $input_menh_chong = $he_list[$menh_sinh_cha['he']];
        $input_menh_vo = $he_list[$menh_sinh_me['he']];
        $input_menh_con = $he_list[$menh_sinh_con['he']];
        $luan_nguhanh_chong_con = $this->boituoivochong_lib->getLuannguhanh($input_menh_chong, $input_menh_con);
        $luan_nguhanh_vo_con = $this->boituoivochong_lib->getLuannguhanh($input_menh_vo, $input_menh_con);
        $point_nguhanh_chong_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_nguhanh_chong_con);
        $point_nguhanh_me_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_nguhanh_vo_con);
        $data['show_luan_nguhanh_chong_con'] = $luan_nguhanh_chong_con;
        $data['show_luan_nguhanh_vo_con'] = $luan_nguhanh_vo_con;
        $data['show_point_nguhanh_chong_con'] = $point_nguhanh_chong_con['scores_tuoicon_thiencan'];
        $data['show_point_nguhanh_vo_con'] = $point_nguhanh_me_con['scores_tuoicon_thiencan'];

        // so sanh thien can
        $luan_thiencan_cha_con = $this->boituoivochong_lib->getThiencanvochong($canchi_al_nam_cha['can'], $canchi_al_nam_con['can']);
        $luan_thiencan_me_con = $this->boituoivochong_lib->getThiencanvochong($canchi_al_nam_me['can'], $canchi_al_nam_con['can']);
        $point_thiencan_chong_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_thiencan_cha_con);
        $point_thiencan_me_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_thiencan_me_con);
        $data['show_luan_thiencan_cha_con'] = $luan_thiencan_cha_con;
        $data['show_luan_thiencan_me_con'] = $luan_thiencan_me_con;
        $data['show_point_thiencan_chong_con'] = $point_thiencan_chong_con['scores_tuoicon_thiendia'];
        $data['show_point_thiencan_me_con'] = $point_thiencan_me_con['scores_tuoicon_thiendia'];

        // so sanh dia chi
        $luan_diachi_cha_con = $this->boituoivochong_lib->getDiachivochong($canchi_al_nam_cha['chi'], $canchi_al_nam_con['chi']);
        $luan_diachi_me_con = $this->boituoivochong_lib->getDiachivochong($canchi_al_nam_me['chi'], $canchi_al_nam_con['chi']);
        $point_diachi_chong_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_diachi_cha_con);
        $point_diachi_me_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_diachi_me_con);
        $data['show_luan_diachi_cha_con'] = $luan_diachi_cha_con;
        $data['show_luan_diachi_me_con'] = $luan_diachi_me_con;
        $data['show_point_diachi_chong_con'] = $point_diachi_chong_con['scores_tuoicon_thiendia'];
        $data['show_point_diachi_me_con'] = $point_diachi_me_con['scores_tuoicon_thiendia'];
        /** end xu ly du lieu **/
        if ($this->run_sublink == 1) {
            $arr_list = array(
                'link' => 'xem-tuoi-sinh-con/sinh-con-$namcon-hop-tuoi-bo-me-khong',
                'replace' => array('$namnam' => $namsinh_cha, '$namnu' => $namsinh_me, '$namcon' => $namsinh_con, '$namxem' => $namsinh_con),
            );
            $this->my_seolink->seolink_cst($arr_list);
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);
        } else {
            $this->my_seolink->set_seolink();
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        }

        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    private function banamsinhcondep_gannhat($input)
    {
        $ngaysinh_cha = $input['ngaysinhcha'];
        $thangsinh_cha = $input['thangsinhcha'];
        $namsinh_cha = $input['namsinhcha'];
        $ngaysinh_me = $input['ngaysinhme'];
        $thangsinh_me = $input['thangsinhme'];
        $namsinh_me = $input['namsinhme'];
        $ngaysinh_con = $input['ngaysinhcon'];
        $thangsinh_con = $input['thangsinhcon'];
        $namsinh_con = $input['namsinhcon'];
        $data['namsinhcha'] = $namsinh_cha;
        $data['namsinhme'] = $namsinh_me;
        $data['namsinhcon'] = $namsinh_con;
        /** doi du lieu **/
        // cha
        $array_tuoi_duonglich_cha = array($ngaysinh_cha, $thangsinh_cha, $namsinh_cha);
        $sinh_am_lich_cha = $this->ngayamduong->get_amlich($array_tuoi_duonglich_cha);
        $data['sinh_am_lich_cha'] = $sinh_am_lich_cha;

        $canchi_al_ngay_cha = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_cha);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
        $canchi_al_thang_cha = $this->ngayamduong->get_canchi_thang($sinh_am_lich_cha);
        $canchi_al_nam_cha = $this->ngayamduong->get_canchi_nam($sinh_am_lich_cha);

        $canchi_ngay_show_cha = get_can_menh($canchi_al_ngay_cha['can']) . ' ' . get_chi_replace(get_chi_menh($canchi_al_ngay_cha['chi'])); // vd : giap tuat
        $canchi_thang_show_cha = get_can_menh((int)$canchi_al_thang_cha['can']) . ' ' . get_chi_replace(get_chi_menh((int)$canchi_al_thang_cha['chi'])); // vd : giap tuat
        $canchi_nam_show_cha = get_can_menh($canchi_al_nam_cha['can']) . ' ' . get_chi_replace(get_chi_menh($canchi_al_nam_cha['chi'])); // vd : giap tuat
        $data['canchi_ngay_show_cha'] = $canchi_ngay_show_cha;
        $data['canchi_thang_show_cha'] = $canchi_thang_show_cha;
        $data['canchi_nam_show_cha'] = $canchi_nam_show_cha;
        $data['can_nam_show_cha'] = get_can_menh($canchi_al_nam_cha['can']);
        $data['chi_nam_show_cha'] = get_chi_replace(get_chi_menh($canchi_al_nam_cha['chi']));
        //dd($canchi_nam_show_cha);

        $menh_sinh_cha = $this->boituoivochong_model->getLucThap($canchi_nam_show_cha);   // hien thi menh
        $data['menh_sinh_cha'] = $menh_sinh_cha;

        // me
        $array_tuoi_duonglich_me = array($ngaysinh_me, $thangsinh_me, $namsinh_me);
        $sinh_am_lich_me = $this->ngayamduong->get_amlich($array_tuoi_duonglich_me);
        $data['sinh_am_lich_me'] = $sinh_am_lich_me;

        $canchi_al_ngay_me = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_me);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
        $canchi_al_thang_me = $this->ngayamduong->get_canchi_thang($sinh_am_lich_me);
        $canchi_al_nam_me = $this->ngayamduong->get_canchi_nam($sinh_am_lich_me);

        $canchi_ngay_show_me = get_can_menh($canchi_al_ngay_me['can']) . ' ' . get_chi_replace(get_chi_menh($canchi_al_ngay_me['chi'])); // vd : giap tuat
        $canchi_thang_show_me = get_can_menh((int)$canchi_al_thang_me['can']) . ' ' . get_chi_replace(get_chi_menh((int)$canchi_al_thang_me['chi'])); // vd : giap tuat
        $canchi_nam_show_me = get_can_menh($canchi_al_nam_me['can']) . ' ' . get_chi_replace(get_chi_menh($canchi_al_nam_me['chi'])); // vd : giap tuat
        $data['canchi_ngay_show_me'] = $canchi_ngay_show_me;
        $data['canchi_thang_show_me'] = $canchi_thang_show_me;
        $data['canchi_nam_show_me'] = $canchi_nam_show_me;
        $data['can_nam_show_me'] = get_can_menh($canchi_al_nam_me['can']);
        $data['chi_nam_show_me'] = get_chi_replace(get_chi_menh($canchi_al_nam_me['chi']));

        $menh_sinh_me = $this->boituoivochong_model->getLucThap($canchi_nam_show_me);   // hien thi menh
        $data['menh_sinh_me'] = $menh_sinh_me;

        // con
        $array_tuoi_duonglich_con = array($ngaysinh_con, $thangsinh_con, $namsinh_con);
        $sinh_am_lich_con = $this->ngayamduong->get_amlich($array_tuoi_duonglich_con);
        $data['sinh_am_lich_con'] = $sinh_am_lich_con;

        $canchi_al_ngay_con = $this->ngayamduong->get_canchi_ngay($array_tuoi_duonglich_con);   // chu y phan nay phai truyen ngay duong vao moi lay duoc ngay am lich
        $canchi_al_thang_con = $this->ngayamduong->get_canchi_thang($sinh_am_lich_con);
        $canchi_al_nam_con = $this->ngayamduong->get_canchi_nam($sinh_am_lich_con);

        $canchi_ngay_show_con = get_can_menh($canchi_al_ngay_con['can']) . ' ' . get_chi_replace(get_chi_menh($canchi_al_ngay_con['chi'])); // vd : giap tuat
        $canchi_thang_show_con = get_can_menh((int)$canchi_al_thang_con['can']) . ' ' . get_chi_replace(get_chi_menh((int)$canchi_al_thang_con['chi'])); // vd : giap tuat
        $canchi_nam_show_con = get_can_menh($canchi_al_nam_con['can']) . ' ' . get_chi_replace(get_chi_menh($canchi_al_nam_con['chi'])); // vd : giap tuat
        $data['canchi_ngay_show_con'] = $canchi_ngay_show_con;
        $data['canchi_thang_show_con'] = $canchi_thang_show_con;
        $data['canchi_nam_show_con'] = $canchi_nam_show_con;
        $data['can_nam_show_con'] = get_can_menh($canchi_al_nam_con['can']);
        $data['chi_nam_show_con'] = get_chi_replace(get_chi_menh($canchi_al_nam_con['chi']));
        // dd($canchi_nam_show_con, 1);
        $menh_sinh_con = $this->boituoivochong_model->getLucThap($canchi_nam_show_con);   // hien thi menh
        $data['menh_sinh_con'] = $menh_sinh_con;


        /** chua biet get de lam cai gi **/
        $cung_user_cha = $this->boituoivochong_model->getCungMenh($namsinh_cha, 0);
        $cung_user_me = $this->boituoivochong_model->getCungMenh($namsinh_me, 1);
        $cung_user_con = $this->boituoivochong_model->getCungMenh($namsinh_con, 1);

        /** end **/

        /** end doi du lieu **/

        /** xu ly du lieu **/

        // so sanh ngu hanh
        $he_list = array(
            'Kim' => '1',
            'Thủy' => '2',
            'Mộc' => '3',
            'Hỏa' => '4',
            'Thổ' => '5',
        );
        $input_menh_chong = $he_list[$menh_sinh_cha['he']];
        $input_menh_vo = $he_list[$menh_sinh_me['he']];
        $input_menh_con = $he_list[$menh_sinh_con['he']];

        $luan_nguhanh_chong_con = $this->boituoivochong_lib->getLuannguhanh($input_menh_chong, $input_menh_con);
        $luan_nguhanh_vo_con = $this->boituoivochong_lib->getLuannguhanh($input_menh_vo, $input_menh_con);
        $point_nguhanh_chong_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_nguhanh_chong_con);
        $point_nguhanh_me_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_nguhanh_vo_con);
        $data['show_luan_nguhanh_chong_con'] = $luan_nguhanh_chong_con;
        $data['show_luan_nguhanh_vo_con'] = $luan_nguhanh_vo_con;
        $data['show_point_nguhanh_chong_con'] = $point_nguhanh_chong_con['scores_tuoicon_thiencan'];
        $data['show_point_nguhanh_vo_con'] = $point_nguhanh_me_con['scores_tuoicon_thiencan'];

        // so sanh thien can
        $luan_thiencan_cha_con = $this->boituoivochong_lib->getThiencanvochong($canchi_al_nam_cha['can'], $canchi_al_nam_con['can']);
        $luan_thiencan_me_con = $this->boituoivochong_lib->getThiencanvochong($canchi_al_nam_me['can'], $canchi_al_nam_con['can']);
        $point_thiencan_chong_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_thiencan_cha_con);
        $point_thiencan_me_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_thiencan_me_con);
        $data['show_luan_thiencan_cha_con'] = $luan_thiencan_cha_con;
        $data['show_luan_thiencan_me_con'] = $luan_thiencan_me_con;
        $data['show_point_thiencan_chong_con'] = $point_thiencan_chong_con['scores_tuoicon_thiendia'];
        $data['show_point_thiencan_me_con'] = $point_thiencan_me_con['scores_tuoicon_thiendia'];

        // so sanh dia chi
        $luan_diachi_cha_con = $this->boituoivochong_lib->getDiachivochong($canchi_al_nam_cha['chi'], $canchi_al_nam_con['chi']);
        $luan_diachi_me_con = $this->boituoivochong_lib->getDiachivochong($canchi_al_nam_me['chi'], $canchi_al_nam_con['chi']);
        $point_diachi_chong_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_diachi_cha_con);
        $point_diachi_me_con = $this->boituoivochong_lib->getscores_xemtuoicon($luan_diachi_me_con);
        $data['show_luan_diachi_cha_con'] = $luan_diachi_cha_con;
        $data['show_luan_diachi_me_con'] = $luan_diachi_me_con;
        $data['show_point_diachi_chong_con'] = $point_diachi_chong_con['scores_tuoicon_thiendia'];
        $data['show_point_diachi_me_con'] = $point_diachi_me_con['scores_tuoicon_thiendia'];
        $tongdiem = $point_nguhanh_chong_con['scores_tuoicon_thiencan'] + $point_nguhanh_me_con['scores_tuoicon_thiencan'] + $point_thiencan_chong_con['scores_tuoicon_thiendia'] + $point_thiencan_me_con['scores_tuoicon_thiendia'] + $point_diachi_chong_con['scores_tuoicon_thiendia'] + $point_diachi_me_con['scores_tuoicon_thiendia'];
        $data['tongdiem'] = $tongdiem;
        // dd($tongdiem,1);
        $tuoime = date('Y') - $namsinh_me;
        // pr($tuoime); exit;
        if ($tongdiem >= 12 && $tuoime <= 40) {
            return $data;
        }
        // pr($data);

        return false;
    }

    function xemtuoilaman($namsinh = null, $nam = null)
    {
        $url = $this->uri->uri_string();
        $data['iNamsinh'] = $namsinh ? $namsinh : 'canh-tuat';
        if (!empty($namsinh)) {
            $this->submit = 1;
            $namsinh = list_age_text($namsinh);
            if ($namsinh != $nam) {
                return redirect(base_url(), 'location', 301);
            }
            $arr_user = array(
                'ngay_sinh' => 6,
                'thang_sinh' => 6,
                'nam_sinh' => $nam,
            );
            $info_user = $this->my_info->Db_get_info_user($arr_user);
            $data['info_user'] = $info_user;
            $data['namsinh'] = $namsinh;
            /** tool get tuoi hop **/
            // lay tuoi nam hop voi
            $arr_namhop = null;
            $k = 0;
            for ($i = $namsinh - 30; $i <= $namsinh + 30; $i++) {
                $one_nam_tuoihop = $this->show_scan_tuoihop_codetheoyseo($namsinh, $i);
                // dd($one_nam_tuoihop);
                if ($one_nam_tuoihop['total_scores'] >= 7) {
                    $arr_namhop[$k] = array($namsinh, 'namhop' => $i, 'info' => $one_nam_tuoihop, 'diem' => $one_nam_tuoihop['total_scores']);
                    $k++;
                    // dd($arr_namhop);
                }
            }
            // lay tuoi nu hop voi
            $arr_nuhop = null;
            $k = 0;
            for ($j = $namsinh - 30; $j <= $namsinh + 30; $j++) {
                $one_nu_tuoihop = $this->show_scan_tuoihop_codetheoyseo($j, $namsinh);
                if ($one_nu_tuoihop['total_scores'] >= 7) {
                    $arr_nuhop[$k] = array($namsinh, 'namhop' => $j, 'info' => $one_nu_tuoihop);
                    $k++;
                }
            }
            /** end **/

            $number_list = count($arr_namhop);
            for ($i = 0; $i < ($number_list - 1); $i++) {
                for ($j = $i + 1; $j < $number_list; $j++) {
                    if ($arr_namhop[$i]['diem'] > $arr_namhop[$j]['diem']) {
                        $tmp = $arr_namhop[$j];
                        $arr_namhop[$j] = $arr_namhop[$i];
                        $arr_namhop[$i] = $tmp;
                    }
                }
            }

            $data['send_namhop'] = $arr_namhop;
            $data['send_nuhop'] = $arr_nuhop;
            $data['namsinh'] = $namsinh;
        }
        $this->my_seolink->set_seolink();
        if ($this->submit == 1) {
            $slugcanchi = $this->vnkey->format_key($info_user['namcanchi']);
            $arr_list = array(
                'link' => 'xem-tuoi-lam-an/tuoi-$canchi-sinh-nam-$namsinh-hop-lam-an-voi-tuoi-nao',
                'replace' => array('$canchi' => get_chi_replace($info_user['namcanchi']), '$namsinh' => $namsinh, '$slugcanchi' => $slugcanchi),
            );
            $this->my_seolink->seolink_cst($arr_list);
            // $this->my_seolink->seolink_cst();
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);

            $data['canchi'] = $info_user['namcanchi'];
            $sql_nam = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nam mạng%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nữ mạng%" and name like "%2019%"';
            $oneAge_nam = $this->article_model->getQuery($sql_nam);
            $oneAge_nu = $this->article_model->getQuery($sql_nu);
            $data['oneAgeNam'] = $oneAge_nam;
            $data['oneAgeNu'] = $oneAge_nu;
        } else {
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        }
        // get breadcrumb
        if ($this->submit == 1) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi làm ăn',
                    'slug' => 'xem-tuoi-lam-an',
                ),
                1 => array(
                    'name' => 'Tuổi ' . get_chi_replace($info_user['namcanchi']),
                    'slug' => 'xem-tuoi-lam-an/tuoi-' . $slugcanchi . '-sinh-nam-' . $namsinh . '-hop-lam-an-voi-tuoi-nao',
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi',
                    'slug' => 'xem-tuoi',
                ),
                1 => array(
                    'name' => 'Xem tuổi làm ăn',
                    'slug' => 'xem-tuoi-lam-an',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** Điều hướng tử vi 2020 */
        if ($namsinh != null) {
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong(9, 4, $namsinh);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $nam_can_chi_slug = $this->lich->get_nam_can_slug() . '-' . $this->lich->get_nam_chi_slug();
            $data['dieu_huong_tv_2022_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 1, 'nam_xem' => 2022));
            $data['dieu_huong_tv_2022_text_nam'] = 'Xem tử vi tuổi '.$namsinh.' nam mạng năm 2022 ';//'Xem tử vi năm 2022 tuổi ' . $namsinh . ' nam mạng';
            $data['dieu_huong_tv_2022_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 2, 'nam_xem' => 2022));
            $data['dieu_huong_tv_2022_text_nu'] = 'Xem tử vi tuổi ' . $namsinh . ' nữ mạng năm 2022';

            $data['dieu_huong_tv_2021_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 1, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text_nam'] = 'Xem tử vi năm 2021 tuổi ' . $namsinh . ' nam mạng';
            $data['dieu_huong_tv_2021_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 2, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text_nu'] = 'Xem tử vi năm 2021 tuổi ' . $namsinh . ' nữ mạng';
            if ($namsinh > 1960 && $namsinh <= 2000) {
                $data['dieu_huong_sim'][0]['anchor'] = 'Xem bói số điện thoại hợp tuổi ' . $nam_can_chi_text . ' ' . $namsinh . ' kích tài lộc';
                $data['dieu_huong_sim'][0]['link'] = 'xem-sim-phong-thuy-hop-tuoi-' . $nam_can_chi_slug . '-' . $namsinh . '.html';
            }
        }
        $data['submit'] = $this->submit;
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    function xemtuoihopnhau($namsinh = null, $nam = null)
    {
        $url = $this->uri->uri_string();
        $data['iNamsinh'] = $namsinh ? $namsinh : 1990;
        if ($namsinh != '') {
            $this->submit = 1;
            $namsinh = list_age_text($namsinh);
            if (($namsinh - $nam) % 60 != 0) {
                return redirect(base_url(), 'location', 301);
            }
            $arr_user = array(
                'ngay_sinh' => 6,
                'thang_sinh' => 6,
                'nam_sinh' => $nam,
            );
            $info_user = $this->my_info->Db_get_info_user($arr_user);
            $data['info_user'] = $info_user;
            $data['namsinh'] = $namsinh;
            $data['nam'] = $nam;
            /** tool get tuoi hop **/
            // lay tuoi nam hop voi
            $arr_namhop = null;
            $k = 0;
            for ($i = 1960; $i <= 2017; $i++) {
                $one_nam_tuoihop = $this->show_scan_tuoihop_codetheoyseo($namsinh, $i);
                if ($one_nam_tuoihop['total_scores'] >= 7) {
                    $arr_namhop[$k] = array($namsinh, 'namhop' => $i, 'info' => $one_nam_tuoihop);
                    $k++;
                }
            }
            // lay tuoi nu hop voi
            $arr_nuhop = null;
            $k = 0;
            for ($j = 1960; $j <= 2017; $j++) {
                $one_nu_tuoihop = $this->show_scan_tuoihop_codetheoyseo($j, $namsinh);
                if ($one_nu_tuoihop['total_scores'] >= 7) {
                    $arr_nuhop[$k] = array($namsinh, 'namhop' => $j, 'info' => $one_nu_tuoihop);
                    $k++;
                }
            }
            /** end **/
            $data['send_namhop'] = $arr_namhop;
            $data['send_nuhop'] = $arr_nuhop;
            $data['namsinh'] = $namsinh;
            $this->run_sublink = 1;

            $data['canchi'] = $info_user['namcanchi'];
            $sql_nam = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nam mạng%" and name like "%2019%"';
            $sql_nu = 'select * from article where name like "%' . $info_user['namcanchi'] . '%" and name like "%nữ mạng%" and name like "%2019%"';
            $oneAge_nam = $this->article_model->getQuery($sql_nam);
            $oneAge_nu = $this->article_model->getQuery($sql_nu);
            $data['oneAgeNam'] = $oneAge_nam;
            $data['oneAgeNu'] = $oneAge_nu;
        }
        if ($this->submit == 1) {

        }
        if ($this->run_sublink == 1) {
            $slugcanchi = $this->vnkey->format_key($info_user['namcanchi']);
            $arr_list = array(
                'link' => 'xem-tuoi-hop-nhau/tuoi-$canchi-sinh-nam-$namsinh-hop-voi-tuoi-nao',
                'replace' => array('$canchi' => get_chi_replace($info_user['namcanchi']), '$namsinh' => $namsinh, '$namxem' => date('Y'), '$slugcanchi' => $slugcanchi),
            );
            $this->my_seolink->seolink_cst($arr_list);
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($arr_list['link']);
        } else {
            $this->my_seolink->set_seolink();
            // 1. Get comment
            $data['getComment'] = $getComment = $this->comment_lib->getByTheme($this->uri->uri_string());
        }
        // get breadcrumb
        if (!empty($namsinh)) {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi hợp nhau',
                    'slug' => 'xem-tuoi-hop-nhau',
                ),
                1 => array(
                    'name' => 'Tuổi ' . get_chi_replace($info_user['namcanchi']),
                    'slug' => 'xem-tuoi-hop-nhau/tuoi-' . $slugcanchi . '-sinh-nam-' . $namsinh . '-hop-voi-tuoi-nao',
                ),
            );
        } else {
            $breadcrumb = array(
                0 => array(
                    'name' => 'Xem tuổi',
                    'slug' => 'xem-tuoi',
                ),
                1 => array(
                    'name' => 'Xem tuổi hợp nhau',
                    'slug' => 'xem-tuoi-hop-nhau',
                ),
            );
        }
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        /** Điều hướng tử vi 2020 */
        if ($namsinh != null) {
            $this->load->library(array('site/lich'));
            $this->lich->set_ngayduong(9, 4, $namsinh);
            $nam_can_chi_text = $this->lich->get_namcan() . ' ' . $this->lich->get_namchi();
            $nam_can_chi_slug = $this->lich->get_nam_can_slug() . '-' . $this->lich->get_nam_chi_slug();
            $data['dieu_huong_tv_2020_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 1, 'nam_xem' => 2020));
            $data['dieu_huong_tv_2020_text_nam'] = 'Xem tử vi năm 2020 tuổi ' . $nam_can_chi_text . ' nam mạng';
            $data['dieu_huong_tv_2020_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 2, 'nam_xem' => 2020));
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem tử vi năm 2021 tuổi ' . $nam_can_chi_text . ' nữ mạng';

            $data['dieu_huong_tv_2021_link_nam'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 1, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2021_text_nam'] = 'Xem tử vi năm 2021 tuổi ' . $nam_can_chi_text . ' nam mạng';
            $data['dieu_huong_tv_2021_link_nu'] = $this->article_model->Db_ajax_bai_viet_tu_vi(array('nam_sinh' => $namsinh, 'gioi_tinh' => 2, 'nam_xem' => 2021));
            $data['dieu_huong_tv_2020_text_nu'] = 'Xem tử vi năm 2020 tuổi ' . $nam_can_chi_text . ' nữ mạng';
            if ($namsinh > 1960 && $namsinh <= 2000) {
                $data['dieu_huong_sim'][0]['anchor'] = 'Xem bói số điện thoại hợp tuổi ' . $nam_can_chi_text . ' ' . $namsinh . ' kích tài lộc';
                $data['dieu_huong_sim'][0]['link'] = 'xem-sim-phong-thuy-hop-tuoi-' . $nam_can_chi_slug . '-' . $namsinh . '.html';
            }

        }
        $data['submit'] = $this->submit;
        $data['title'] = $this->my_seolink->get_title();
        $data['keywords'] = $this->my_seolink->get_keywords();
        $data['description'] = $this->my_seolink->get_description();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    function show_scan_tuoihop($tuoichong = null, $tuoivo = null)
    {
        // get nam
        $al_tuoichong = $this->ngayamduong->get_canchi_nam(array('6', '6', $tuoichong));

        $al_tuoivo = $this->ngayamduong->get_canchi_nam(array('6', '6', $tuoivo));

        $al_tuoichong_show = get_can_menh($al_tuoichong['can']) . ' ' . get_chi_replace(get_chi_menh($al_tuoichong['chi'])); // vd : giap tuat
        $al_tuoivo_show = get_can_menh($al_tuoivo['can']) . ' ' . get_chi_replace(get_chi_menh($al_tuoivo['chi']));  // vd : giap tuat
        $data['al_tuoichong_show'] = $al_tuoichong_show;
        $data['al_tuoivo_show'] = $al_tuoivo_show;
        // get menh - ngu hanh
        $menh_tuoichong = $this->boituoivochong_model->getLucThap($al_tuoichong_show);    // cac loai : kim moc thuy hoa tho
        $menh_tuoivo = $this->boituoivochong_model->getLucThap($al_tuoivo_show);

        // get du lieu cung nam
        $cung_tuoichong = $this->boituoivochong_model->getCungMenh($tuoichong, 0); // cung : khon, ly
        $cung_tuoivo = $this->boituoivochong_model->getCungMenh($tuoivo, 1);   // cung : khon,ly

        // get du lieu menh nam
        $menhnam_tuoichong = $this->boituoivochong_model->getCungMenh($tuoichong, 0);  // cung : khon, ly - nam : hoa,tho
        $menhnam_tuoivo = $this->boituoivochong_model->getCungMenh($tuoivo, 1);        // cung : khon, ly - nam : hoa,tho

        //dd($menhnam_tuoichong);

        /** luan tuoi vo chong **/

        // menh vo chong
        $he_vo_chong = array(
            'Kim' => '1',
            'Thủy' => '2',
            'Mộc' => '3',
            'Hỏa' => '4',
            'Thổ' => '5',
        );
        $input_menh_chong = $he_vo_chong[$menh_tuoichong['he']];
        $input_menh_vo = $he_vo_chong[$menh_tuoivo['he']];
        //$input_menh_vochong = $input_menh_chong.$input_menh_vo;
        $luan_menh_vochong = $this->boituoivochong_lib->getLuannguhanh($input_menh_chong, $input_menh_vo);
        $show_menh_chong = $menh_tuoichong['he'];
        $show_menh_vo = $menh_tuoivo['he'];
        $show_luan_menh_vochong = $luan_menh_vochong;
        $data['show_menh_chong'] = $show_menh_chong;
        $data['show_menh_vo'] = $show_menh_vo;
        $data['show_luan_menh_vochong'] = $show_luan_menh_vochong;
        $show_menh_vochong = ' Dương ' . $menh_tuoichong['he'];
        $show_menh_vochong .= ' - Dương ' . $menh_tuoivo['he'];
        $show_menh_vochong .= ' => ' . $luan_menh_vochong;
        $data['show_menh_vochong'] = $show_menh_vochong;
        $point_menh_vochong = $this->boituoivochong_lib->getScores($luan_menh_vochong);
        $data['show_scores_menh'] = $point_menh_vochong;

        // thien can vo chong
        $input_thiencan_chong = $al_tuoichong['can'];
        $input_thiencan_vo = $al_tuoivo['can'];
        //$input_thiencan_chongvo = $input_thiencan_chong.$input_thiencan_vo;
        $luan_thiencan_vochong = $this->boituoivochong_lib->getThiencanvochong($input_thiencan_chong, $input_thiencan_vo);
        $show_thiencan_chong = get_can_menh($al_tuoichong['can']);
        $show_thiencan_vo = get_can_menh($al_tuoivo['can']);
        $show_luan_thiencan_vochong = $luan_thiencan_vochong;
        $data['show_thiencan_chong'] = $show_thiencan_chong;
        $data['show_thiencan_vo'] = $show_thiencan_vo;
        $data['show_luan_thiencan_vochong'] = $show_luan_thiencan_vochong;

        $show_thiencan_vochong = ' Thiên can : ' . get_can_menh($al_tuoichong['can']);
        $show_thiencan_vochong .= ' - Thiên can : ' . get_can_menh($al_tuoivo['can']);
        $show_thiencan_vochong .= ' => ' . $luan_thiencan_vochong;
        $data['show_thiencan_vochong'] = $show_thiencan_vochong;
        $point_thiencan_vochong = $this->boituoivochong_lib->getScores($luan_thiencan_vochong);
        $data['show_scores_thiencan'] = $point_thiencan_vochong;

        // dia chi vo chong
        $input_diachi_chong = $al_tuoichong['chi'];
        $input_diachi_vo = $al_tuoivo['chi'];
        //$input_diachi_chongvo   = $input_diachi_chong.$input_diachi_vo;
        $luan_diachi_vochong = $this->boituoivochong_lib->getDiachivochong($input_diachi_chong, $input_diachi_vo);
        $show_diachi_chong = get_chi_replace(get_chi_menh($al_tuoichong['chi']));
        $show_diachi_vo = get_chi_replace(get_chi_menh($al_tuoivo['chi']));
        $show_diachi_vochong = $luan_diachi_vochong;
        $data['show_diachi_chong'] = $show_diachi_chong;
        $data['show_diachi_vo'] = $show_diachi_vo;
        $data['show_luan_diachi_vochong'] = $luan_diachi_vochong;

        $show_diachi_vochong = 'Địa chi : ' . get_chi_menh($al_tuoichong['chi']);
        $show_diachi_vochong .= ' - Địa chi : ' . get_chi_menh($al_tuoivo['chi']);
        $show_diachi_vochong .= '   =>  ' . $luan_diachi_vochong;
        $data['show_diachi_vochong'] = $show_diachi_vochong;
        $point_diachi_vochong = $this->boituoivochong_lib->getScores($luan_diachi_vochong);
        $data['show_scores_diachi'] = $point_diachi_vochong;

        // cung kham vo chong
        $cungkham_vo_chong = array(
            '1' => 'Khảm',
            '2' => 'Khôn',
            '3' => 'Chấn',
            '4' => 'Tốn',
            '6' => 'Càn',
            '7' => 'Đoài',
            '8' => 'Cấn',
            '9' => 'Ly',
        );
        //dd($menhnam_tuoichong['cung']);
        $cungkham_vo_chong_daomang = array_flip($cungkham_vo_chong);
        //dd($cungkham_vo_chong_daomang['Ðoài']);
        $input_cungkham_chong = $cungkham_vo_chong_daomang[$menhnam_tuoichong['cung']];
        $input_cungkham_vo = $cungkham_vo_chong_daomang[$menhnam_tuoivo['cung']];
        //$input_cungkham_chongvo   = $input_cungkham_chong.$input_cungkham_vo;
        $luan_cungkham_vochong = $this->boituoivochong_lib->getCungkham($input_cungkham_chong, $input_cungkham_vo);

        $show_cungkham_chong = $menhnam_tuoichong['cung'];
        $show_cungkham_vo = $menhnam_tuoivo['cung'];
        $show_luan_cungkham_chong = $luan_cungkham_vochong;
        $data['show_cungkham_chong'] = $show_cungkham_chong;
        $data['show_cungkham_vo'] = $show_cungkham_vo;
        $data['show_luan_cungkham_chong'] = $show_luan_cungkham_chong;

        $show_cungkham_vochong = 'Cung : ' . $menhnam_tuoichong['cung'];
        $show_cungkham_vochong .= ' - Cung : ' . $menhnam_tuoivo['cung'];
        $show_cungkham_vochong .= '   =>  ' . $luan_cungkham_vochong;
        $data['show_cungkham_vochong'] = $show_cungkham_vochong;
        $point_cungkham_vochong = $this->boituoivochong_lib->getScores($luan_cungkham_vochong);
        $data['show_scores_cungkham'] = $point_cungkham_vochong;

        // thien menh nam sinh
        $thienmenh_vo_chon_tucungra = array(
            'Khảm' => array('2', 'Thủy'),
            'Khôn' => array('5', 'Thổ'),
            'Chấn' => array('3', 'Mộc'),
            'Tốn' => array('3', 'Mộc'),
            'Càn' => array('1', 'Kim'),
            'Đoài' => array('1', 'Kim'),
            'Cấn' => array('5', 'Thổ'),
            'Ly' => array('4', 'Hỏa'),
        );
        //dd($menhnam_tuoichong['cung']);
        $input_thienmenh_chong = $thienmenh_vo_chon_tucungra[$menhnam_tuoichong['cung']];
        $input_thienmenh_vo = $thienmenh_vo_chon_tucungra[$menhnam_tuoivo['cung']];
        $input_thienmenh_chongvo = $input_thienmenh_chong[0] . $input_thienmenh_vo[0];
        $luan_thienmenh_vochong = $this->boituoivochong_lib->getThienmenh($input_thienmenh_chongvo);

        $show_thienmenh_chong = $input_thienmenh_chong[1];
        $show_thienmenh_vo = $input_thienmenh_vo[1];
        $show_luan_thienmenh_vochong = $luan_thienmenh_vochong;
        $data['show_thienmenh_chong'] = $show_thienmenh_chong;
        $data['show_thienmenh_vo'] = $show_thienmenh_vo;
        $data['show_luan_thienmenh_vochong'] = $show_luan_thienmenh_vochong;

        $show_thienmenh_vochong = 'Thiên mệnh năm sinh : ' . $input_thienmenh_chong[1];
        $show_thienmenh_vochong .= ' - Thiên mệnh năm sinh : ' . $input_thienmenh_vo[1];
        $show_thienmenh_vochong .= '   =>  ' . $luan_thienmenh_vochong;
        $data['show_thienmenh_vochong'] = $show_thienmenh_vochong;
        $point_thienmenh_vochong = $this->boituoivochong_lib->getScores($luan_thienmenh_vochong);
        $data['show_scores_thienmenh'] = $point_thienmenh_vochong;
        //dd($show_thienmenh_vochong);

        /** end luan tuoi vo chong **/

        $data['total_scores'] = (int)$point_menh_vochong + (int)$point_diachi_vochong + (int)$point_cungkham_vochong + (int)$point_thiencan_vochong + (int)$point_thienmenh_vochong;
        return $data;
    }

    function show_scan_tuoihop_codetheoyseo($tuoichong = null, $tuoivo = null)
    {
        // get nam
        $al_tuoichong = $this->ngayamduong->get_canchi_nam(array('6', '6', $tuoichong));

        $al_tuoivo = $this->ngayamduong->get_canchi_nam(array('6', '6', $tuoivo));

        $al_tuoichong_show = get_can_menh($al_tuoichong['can']) . ' ' . get_chi_replace(get_chi_menh($al_tuoichong['chi'])); // vd : giap tuat
        $al_tuoivo_show = get_can_menh($al_tuoivo['can']) . ' ' . get_chi_replace(get_chi_menh($al_tuoivo['chi']));  // vd : giap tuat
        $data['al_tuoichong_show'] = $al_tuoichong_show;
        $data['al_tuoivo_show'] = $al_tuoivo_show;
        // get menh - ngu hanh
        $menh_tuoichong = $this->boituoivochong_model->getLucThap($al_tuoichong_show);    // cac loai : kim moc thuy hoa tho
        $menh_tuoivo = $this->boituoivochong_model->getLucThap($al_tuoivo_show);

        // get du lieu cung nam
        $cung_tuoichong = $this->boituoivochong_model->getCungMenh($tuoichong, 0); // cung : khon, ly
        $cung_tuoivo = $this->boituoivochong_model->getCungMenh($tuoivo, 1);   // cung : khon,ly

        // get du lieu menh nam
        $menhnam_tuoichong = $this->boituoivochong_model->getCungMenh($tuoichong, 0);  // cung : khon, ly - nam : hoa,tho
        $menhnam_tuoivo = $this->boituoivochong_model->getCungMenh($tuoivo, 1);        // cung : khon, ly - nam : hoa,tho

        //dd($menhnam_tuoichong);

        /** luan tuoi vo chong **/

        // menh vo chong
        $he_vo_chong = array(
            'Kim' => '1',
            'Thủy' => '2',
            'Mộc' => '3',
            'Hỏa' => '4',
            'Thổ' => '5',
        );

        $input_menh_chong = $he_vo_chong[$menh_tuoichong['he']];
        $input_menh_vo = $he_vo_chong[$menh_tuoivo['he']];
        //$input_menh_vochong = $input_menh_chong.$input_menh_vo;
        // dd($input_menh_chong.' - '.$input_menh_vo);
        $luan_menh_vochong = $this->boituoivochong_lib->getLuannguhanh($input_menh_chong, $input_menh_vo);
        $show_menh_chong = $menh_tuoichong['he'];
        $show_menh_vo = $menh_tuoivo['he'];
        $show_luan_menh_vochong = $luan_menh_vochong;
        $data['show_menh_chong'] = $show_menh_chong;
        $data['show_menh_vo'] = $show_menh_vo;
        $data['show_luan_menh_vochong'] = $show_luan_menh_vochong;
        $show_menh_vochong = ' Dương ' . $menh_tuoichong['he'];
        $show_menh_vochong .= ' - Dương ' . $menh_tuoivo['he'];
        $show_menh_vochong .= ' => ' . $luan_menh_vochong;
        $data['show_menh_vochong'] = $show_menh_vochong;
        $point_menh_vochong = $this->boituoivochong_lib->getScores($luan_menh_vochong);
        $data['show_scores_menh'] = $point_menh_vochong;

        // thien can vo chong
        $input_thiencan_chong = $al_tuoichong['can'];
        $input_thiencan_vo = $al_tuoivo['can'];
        //$input_thiencan_chongvo = $input_thiencan_chong.$input_thiencan_vo;
        $luan_thiencan_vochong = $this->boituoivochong_lib->getThiencanvochong($input_thiencan_chong, $input_thiencan_vo);
        $show_thiencan_chong = get_can_menh($al_tuoichong['can']);
        $show_thiencan_vo = get_can_menh($al_tuoivo['can']);
        $show_luan_thiencan_vochong = $luan_thiencan_vochong;
        $data['show_thiencan_chong'] = $show_thiencan_chong;
        $data['show_thiencan_vo'] = $show_thiencan_vo;
        $data['show_luan_thiencan_vochong'] = $show_luan_thiencan_vochong;

        $show_thiencan_vochong = ' Thiên can : ' . get_can_menh($al_tuoichong['can']);
        $show_thiencan_vochong .= ' - Thiên can : ' . get_can_menh($al_tuoivo['can']);
        $show_thiencan_vochong .= ' => ' . $luan_thiencan_vochong;
        $data['show_thiencan_vochong'] = $show_thiencan_vochong;
        $point_thiencan_vochong = $this->boituoivochong_lib->getScores_codetheoseo($luan_thiencan_vochong);
        $data['show_scores_thiencan'] = $point_thiencan_vochong;

        // update thien can vo chong
        $luan_thiencan_vochong_theomenh = $this->boituoivochong_lib->getThiencanvochong_menh($input_thiencan_chong, $input_thiencan_vo);
        $point_thiencan_vochong_theomenh = $this->boituoivochong_lib->getScores_codetheoseo($luan_thiencan_vochong_theomenh);
        $data['luan_thiencan_vochong_theomenh'] = $luan_thiencan_vochong_theomenh;
        $data['point_thiencan_vochong_theomenh'] = $point_thiencan_vochong_theomenh;

        // dia chi vo chong
        $input_diachi_chong = $al_tuoichong['chi'];
        $input_diachi_vo = $al_tuoivo['chi'];
        //$input_diachi_chongvo   = $input_diachi_chong.$input_diachi_vo;
        $luan_diachi_vochong = $this->boituoivochong_lib->getDiachivochong($input_diachi_chong, $input_diachi_vo);
        $show_diachi_chong = get_chi_menh($al_tuoichong['chi']);
        $show_diachi_vo = get_chi_menh($al_tuoivo['chi']);
        $show_diachi_vochong = $luan_diachi_vochong;
        $data['show_diachi_chong'] = $show_diachi_chong;
        $data['show_diachi_vo'] = $show_diachi_vo;
        $data['show_luan_diachi_vochong'] = $luan_diachi_vochong;

        $show_diachi_vochong = 'Địa chi : ' . get_chi_menh($al_tuoichong['chi']);
        $show_diachi_vochong .= ' - Địa chi : ' . get_chi_menh($al_tuoivo['chi']);
        $show_diachi_vochong .= '   =>  ' . $luan_diachi_vochong;
        $data['show_diachi_vochong'] = $show_diachi_vochong;
        $point_diachi_vochong = $this->boituoivochong_lib->getScores_codetheoseo($luan_diachi_vochong);
        $data['show_scores_diachi'] = $point_diachi_vochong;

        // update dia chi vo chong
        $luan_diachi_vochong_theomenh = $this->boituoivochong_lib->getDiachivochong_menh($input_diachi_chong, $input_diachi_vo);
        $point_diachi_vochong_theomenh = $this->boituoivochong_lib->getScores_codetheoseo($luan_diachi_vochong_theomenh);
        $data['luan_diachi_vochong_theomenh'] = $luan_diachi_vochong_theomenh;
        $data['point_diachi_vochong_theomenh'] = $point_diachi_vochong_theomenh;

        // cung kham vo chong
        $cungkham_vo_chong = array(
            '1' => 'Khảm',
            '2' => 'Khôn',
            '3' => 'Chấn',
            '4' => 'Tốn',
            '6' => 'Càn',
            '7' => 'Đoài',
            '8' => 'Cấn',
            '9' => 'Ly',
        );
        //dd($menhnam_tuoichong['cung']);
        $cungkham_vo_chong_daomang = array_flip($cungkham_vo_chong);
        //dd($cungkham_vo_chong_daomang['Ðoài']);
        $input_cungkham_chong = $cungkham_vo_chong_daomang[$menhnam_tuoichong['cung']];
        $input_cungkham_vo = $cungkham_vo_chong_daomang[$menhnam_tuoivo['cung']];
        //$input_cungkham_chongvo   = $input_cungkham_chong.$input_cungkham_vo;
        $luan_cungkham_vochong = $this->boituoivochong_lib->getCungkham($input_cungkham_chong, $input_cungkham_vo);

        $show_cungkham_chong = $menhnam_tuoichong['cung'];
        $show_cungkham_vo = $menhnam_tuoivo['cung'];
        $show_luan_cungkham_chong = $luan_cungkham_vochong;
        $data['show_cungkham_chong'] = $show_cungkham_chong;
        $data['show_cungkham_vo'] = $show_cungkham_vo;
        $data['show_luan_cungkham_chong'] = $show_luan_cungkham_chong;

        $show_cungkham_vochong = 'Cung : ' . $menhnam_tuoichong['cung'];
        $show_cungkham_vochong .= ' - Cung : ' . $menhnam_tuoivo['cung'];
        $show_cungkham_vochong .= '   =>  ' . $luan_cungkham_vochong;
        $data['show_cungkham_vochong'] = $show_cungkham_vochong;
        $point_cungkham_vochong = $this->boituoivochong_lib->getScores($luan_cungkham_vochong);
        $data['show_scores_cungkham'] = $point_cungkham_vochong;

        // thien menh nam sinh
        $thienmenh_vo_chon_tucungra = array(
            'Khảm' => array('2', 'Thủy'),
            'Khôn' => array('5', 'Thổ'),
            'Chấn' => array('3', 'Mộc'),
            'Tốn' => array('3', 'Mộc'),
            'Càn' => array('1', 'Kim'),
            'Đoài' => array('1', 'Kim'),
            'Cấn' => array('5', 'Thổ'),
            'Ly' => array('4', 'Hỏa'),
        );
        //dd($menhnam_tuoichong['cung']);
        $input_thienmenh_chong = $thienmenh_vo_chon_tucungra[$menhnam_tuoichong['cung']];
        $input_thienmenh_vo = $thienmenh_vo_chon_tucungra[$menhnam_tuoivo['cung']];
        $input_thienmenh_chongvo = $input_thienmenh_chong[0] . $input_thienmenh_vo[0];
        $luan_thienmenh_vochong = $this->boituoivochong_lib->getThienmenh($input_thienmenh_chongvo);

        $show_thienmenh_chong = $input_thienmenh_chong[1];
        $show_thienmenh_vo = $input_thienmenh_vo[1];
        $show_luan_thienmenh_vochong = $luan_thienmenh_vochong;
        $data['show_thienmenh_chong'] = $show_thienmenh_chong;
        $data['show_thienmenh_vo'] = $show_thienmenh_vo;
        $data['show_luan_thienmenh_vochong'] = $show_luan_thienmenh_vochong;

        $show_thienmenh_vochong = 'Thiên mệnh năm sinh : ' . $input_thienmenh_chong[1];
        $show_thienmenh_vochong .= ' - Thiên mệnh năm sinh : ' . $input_thienmenh_vo[1];
        $show_thienmenh_vochong .= '   =>  ' . $luan_thienmenh_vochong;
        $data['show_thienmenh_vochong'] = $show_thienmenh_vochong;
        $point_thienmenh_vochong = $this->boituoivochong_lib->getScores($luan_thienmenh_vochong);
        $data['show_scores_thienmenh'] = $point_thienmenh_vochong;
        //dd($show_thienmenh_vochong);

        /** end luan tuoi vo chong **/

        $data['total_scores'] = (int)$point_menh_vochong + $point_diachi_vochong_theomenh + $point_diachi_vochong + (int)$point_cungkham_vochong + $point_thiencan_vochong + $point_thiencan_vochong_theomenh + (int)$point_thienmenh_vochong;
        return $data;
    }

    function ajax_insert_info_user()
    {
        $insert['url'] = $this->input->post('link');
        $insert['date_submit'] = $this->input->post('date');
        $insert['phone'] = $this->input->post('phone');
        $this->boituoivochong_model->db->insert('table_save_data_user', $insert);
    }

    function ajax_check_code()
    {
        $code = $this->input->post('code');
        $date = $this->input->post('date');
        $url = $this->input->post('url');
        $data = $this->boituoivochong_model->db->where('codes', $code)->get('codes')->row_array();
        if (!empty($data)) {
            if ($data['state'] == 0) {
                $data['check'] = false;
                $data['mes'] = 'Mã này đã hết hạn sử dụng!';
            } else {
                $data['check'] = true;
                $data1 = array(
                    'code' => $code,
                    'url' => $url,
                    'date' => $date,
                );
                $this->boituoivochong_model->db->insert('info_code', $data1);
            }
        } else {
            $data['check'] = false;
            $data['mes'] = 'Mã này không hợp lệ';
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}

?>