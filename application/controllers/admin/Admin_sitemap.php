<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_sitemap extends CI_Controller
{
    public $namefile_number = 1;
    public $base_url = '';
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array(
            'admin/admin_auth',
            'form_validation'));
        $this->load->model('admin/article_model');
        $this->base_url = 'https://xemvanmenh.net/';
        if (empty($this->base_url)) {
            $this->base_url = base_url();
        }
    }

    public function sitemap_vochong(){
        $time_created = date('Y-m-d');
        $slug = $this->base_url;
        $arr_list = null;
        $i = 0;
        for ($j = 1975; $j <= 2005; $j++) { 
            for ($k=$j-5; $k < $j+10; $k++) { 
                $slug_after = $slug . 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong/tuoi-chong-$namchong-va-tuoi-vo-$namvo' . '.html';
                $slug_after = str_replace('$namchong', $j, $slug_after);
                $slug_after = str_replace('$namvo', $k, $slug_after);
                $arr_list[$i] = array(
                    'slug' => $slug_after,
                    'last_modified' => $time_created,
                    'priority' => '0.9',
                );
                $i++;
            }
        }
        $this->base_create($arr_list, 'sitemap/sitemap_32.xml');
    }

    public function sitemap_update()
    {
        // select menu
        $this->db->select('m.id, m.name, m.slug, m.level');
        $this->db->from('menu as m');
        $this->db->where('m.module','article');
        $this->db->where('m.state', 1);
        $result_menu = $this->db->get()->result_array();

        // select article
        $this->db->select('a.id, a.name, a.slug, a.summary, a.avatar ');
        $this->db->from(' article as a');
        $this->db->where('a.state', 1);
        $result_article = $this->db->get()->result_array();

        // select menu
        $this->db->select('router.*');
        $this->db->from('router');
        $result_route = $this->db->get()->result_array();

        $data_namsinh_xemboisodienthoaihoptuoi = array(
                "tan-suu"=>"1961",
                "nham-dan"=>"1962",
                "quy-mao"=>"1963",
                "giap-thin"=>"1964",
                "at-ty"=>"1965",
                "binh-ngo"=>"1966",
                "dinh-mui"=>"1967",
                "mau-than"=>"1968",
                "ky-dau"=>"1969",
                "canh-tuat"=>"1970",
                "tan-hoi"=>"1971",
                "nham-ty"=>"1972",
                "quy-suu"=>"1973",
                "giap-dan"=>"1974",
                "at-mao"=>"1975",
                "binh-thin"=>"1976",
                "dinh-ty"=>"1977",
                "mau-ngo"=>"1978",
                "ky-mui"=>"1979",
                "canh-than"=>"1980",
                "tan-dau"=>"1981",
                "nham-tuat"=>"1982",
                "quy-hoi"=>"1983",
                "giap-ty"=>"1984",
                "at-suu"=>"1985",
                "binh-dan"=>"1986",
                "dinh-mao"=>"1987",
                "mau-thin"=>"1988",
                "ky-ty"=>"1989",
                "canh-ngo"=>"1990",
                "tan-mui"=>"1991",
                "nham-than"=>"1992",
                "quy-dau"=>"1993",
                "giap-tuat"=>"1994",
                "at-hoi"=>"1995",
                "binh-ty"=>"1996",
                "dinh-suu"=>"1997",
                "mau-dan"=>"1998",
                "ky-mao"=>"1999",
                "canh-thin"=>"2000",
            );

        $data_conviec_xemngaytheotuoi = array('xuat-hanh', 'cuoi-hoi', 'dong-tho', 'nhap-trach', 'mua-nha', 'khai-truong', 'mua-xe');
        $data_lucthaphoagiap_slug = slug_to_text_canchi();
        
        

        // select seolink
        /*$this->db->select('*');
        $this->db->from('seolink');
        //$this->db->where(array('id<>'=>'4','id <>'=>'8'));
        $result_seolink = $this->db->get()->result_array();*/

        // set up
        $time_created = date('Y-m-d');
        $slug = $this->base_url;
        $arr_list = null;
        $i = 0;

        // sitemap cung menh
        $arr_gioitinh = array('nam','nu');
        for ($j=1950; $j < date('Y'); $j++) { 
        	foreach ($arr_gioitinh as $key => $value) {
        		$slug_after = $slug.'xem-boi-cung-menh-theo-nam-sinh/'.$value.'-sinh-nam-'.$j.'-menh-gi-cung-gi.html';
        		$arr_list[$i] = array(
	                'slug' => $slug_after,
	                'last_modified' => $time_created,
	                'priority' => '0.9',
                );
            	$i++;
        	}
        }
       // end site map cung menh

        foreach ($result_menu as $key => $value) {
            $slug_after = $slug . $value['slug'] . '.html';
            $arr_list[$i] = array(
                'slug' => $slug_after,
                'last_modified' => $time_created,
                'priority' => '0.9',
                );
            $i++;
        }
        foreach ($result_article as $key => $value) {
            $pattern = '/xem-sim-phong-thuy-hop-tuoi-([a-z-]+)-((196[1-9])||(19[7-9][0-9])||(2000))/';
            $match   = $value['slug'];
            if (!preg_match($pattern, $match)) {
                $slug_after = $slug . $value['slug'] . '-A' . $value['id'] . '.html';
                $arr_list[$i] = array(
                    'slug' => $slug_after,
                    'last_modified' => $time_created,
                    'priority' => '0.95',
                    );
                $i++;
            }

        }
        foreach ($result_route as $key => $value) {

            // phan link co sd regex moi
            if ($value['router_key'] == 'xem-sim-phong-thuy-hop-tuoi-([a-z-]+)-((196[1-9])||(19[7-9][0-9])||(2000))') {
                $i_sdtht = 1;
                $arr_list_sdtht = null;
                foreach ($data_namsinh_xemboisodienthoaihoptuoi as $key_sdtht => $val_sdtht){
                    $slug_after = $this->base_url . $value['router_key'] . '.html';
                    $slug_after = str_replace('([a-z-]+)', $key_sdtht, $slug_after);
                    $slug_after = str_replace('((196[1-9])||(19[7-9][0-9])||(2000))', $val_sdtht, $slug_after);
                    $arr_list_sdtht[$i_sdtht]  = array(
                        'slug'  => $slug_after,
                        'last_modified' => $time_created,
                        'priority'  => '0.8',
                    );
                    $i_sdtht++;
                }
                $this->base_create($arr_list_sdtht, 'sitemap/sitemap_xemsimdienthoaihoptuoi.xml');
                $arr_list[$i]  = array(
                    'slug'  => $this->base_url.'sitemap/sitemap_xemsimdienthoaihoptuoi.xml',
                    'last_modified' => $time_created,
                    'priority'  => '0.9',
                );
                $i++;
            }elseif($value['router_key'] == 'xem-ngay-tot-([a-z-]+)-tuoi-([a-z-]+)'){
                $i_xemngaycvtheotuoi = 1;
                $arr_xemngaycvtheotuoi = null;
                foreach ($data_conviec_xemngaytheotuoi as $key_congviec => $val_congviec) {
                   foreach ($data_lucthaphoagiap_slug as $key_lucthap => $value_lucthap) {
                        $slug_after = $this->base_url . $value['router_key'] . '.html';
                        $slug_after = str_replace('xem-ngay-tot-([a-z-]+)', 'xem-ngay-tot-'.$val_congviec, $slug_after);
                        $slug_after = str_replace('-tuoi-([a-z-]+)', '-tuoi-'.$key_lucthap, $slug_after);
                        $arr_xemngaycvtheotuoi[$i_xemngaycvtheotuoi]  = array(
                            'slug'  => $slug_after,
                            'last_modified' => $time_created,
                            'priority'  => '0.8',
                        );
                        $i_xemngaycvtheotuoi++;
                   }
                }
                $this->base_create($arr_xemngaycvtheotuoi, 'sitemap/sitemap_xemngay_congviec_theotuoi.xml');
                $arr_list[$i]  = array(
                    'slug'  => $this->base_url.'sitemap/sitemap_xemngay_congviec_theotuoi.xml',
                    'last_modified' => $time_created,
                    'priority'  => '0.9',
                );
                $i++;
            }elseif($value['router_key'] == 'xem-ngay-tot-tuoi-([a-z-]+)'){
                $i_xemngay_theotuoi = 1;
                $arr_xemngay_theotuoi = null;
               foreach ($data_lucthaphoagiap_slug as $key_lucthap => $value_lucthap) {
                    $slug_after = $this->base_url . $value['router_key'] . '.html';
                    $slug_after = str_replace('-tuoi-([a-z-]+)', '-tuoi-'.$key_lucthap, $slug_after);
                    $arr_xemngay_theotuoi[$i_xemngay_theotuoi]  = array(
                        'slug'  => $slug_after,
                        'last_modified' => $time_created,
                        'priority'  => '0.8',
                    );
                    $i_xemngay_theotuoi++;
               }
                $this->base_create($arr_xemngay_theotuoi, 'sitemap/sitemap_xemngay_theotuoi.xml');
                $arr_list[$i]  = array(
                    'slug'  => $this->base_url.'sitemap/sitemap_xemngay_theotuoi.xml',
                    'last_modified' => $time_created,
                    'priority'  => '0.9',
                );
                $i++;
            }
            // end phan link co sd regex moi


            //phan cu
            else{
                $pattern_filter = '/0\-9/';
                $subject = $value['router_key'];
                if (!preg_match($pattern_filter, $subject)) {
                    $slug_after = $slug.$value['router_key'].'.html';
                    $arr_list[$i]  = array(
                        'slug'  => $slug_after,
                        'last_modified' => $time_created,
                        'priority'  => '0.9',
                    );
                    $i++;
                }
                else{
                    $pattern_filter = '/xem\-tuoi\-vo\-chong/';
                    $subject = $value['router_key'];
                    $arr_list_vochong = null;
                    $i_chong_vo = 1;
                    if (preg_match($pattern_filter, $subject)) {
                        for ($k_chong = 1975; $k_chong <= 2026; $k_chong++){
                            for ($k_vo = $k_chong-10; $k_vo <= $k_chong+10; $k_vo++){
                                $slug_after = $this->base_url . $value['router_key'] . '.html';
                                $slug_after = str_replace('chong-([0-9]+)', 'chong-'.$k_chong, $slug_after);
                                $slug_after = str_replace('vo-([0-9]+)', 'vo-'.$k_vo, $slug_after);
                                $arr_list_vochong[$i_chong_vo]  = array(
                                    'slug'  => $slug_after,
                                    'last_modified' => $time_created,
                                    'priority'  => '0.8',
                                );
                                $i_chong_vo++;
                            }
                        }
                        $this->base_create($arr_list, 'sitemap/sitemap_vochong.xml');
                        $arr_list[$i]  = array(
                            'slug'  => $this->base_url.'sitemap/sitemap_vochong.xml',
                            'last_modified' => $time_created,
                            'priority'  => '0.9',
                        );
                        $i++;
                    }
                    else{
                        $arr_list[$i]  = array(
                            'slug'  => $this->base_url.$this->scan_sitemap($value['router_key']),
                            'last_modified' => $time_created,
                            'priority'  => '0.9',
                        );
                        $i++;
                    }
                }
            }
        }

        $arr_list[$i]  = array(
                'slug'  => $this->base_url.'sitemap/sitemap_kethon_new.xml',
                'last_modified' => $time_created,
                'priority'  => '0.9',
            );
            $i++;
        $arr_list[$i]  = array(
                'slug'  => $this->base_url.'sitemap/sitemap_laman_new.xml',
                'last_modified' => $time_created,
                'priority'  => '0.9',
            );
            $i++;
        $arr_list[$i]  = array(
                'slug'  => $this->base_url.'sitemap/sitemap_lamnha_new.xml',
                'last_modified' => $time_created,
                'priority'  => '0.9',
            );
            $i++;
        $arr_list[$i]  = array(
                'slug'  => $this->base_url.'sitemap/sitemap_muanha_new.xml',
                'last_modified' => $time_created,
                'priority'  => '0.9',
            );
            $i++;
        $arr_list[$i]  = array(
                'slug'  => $this->base_url.'sitemap/sitemap_sinhcon_new.xml',
                'last_modified' => $time_created,
                'priority'  => '0.9',
            );
            $i++;
        $arr_list[$i]  = array(
                'slug'  => $this->base_url.'sitemap/sitemap_tuoohop_new.xml',
                'last_modified' => $time_created,
                'priority'  => '0.9',
            );
            $i++;
        $arr_list[$i]  = array(
                'slug'  => $this->base_url.'sitemap/sitemap_vochong.xml',
                'last_modified' => $time_created,
                'priority'  => '0.9',
            );
            $i++;
        $arr_list[$i]  = array(
                'slug'  => $this->base_url.'sitemap/sitemap_xaynha_new.xml',
                'last_modified' => $time_created,
                'priority'  => '0.9',
            );
            $i++;
        $arr_list[$i]  = array(
                'slug'  => $this->base_url.'sitemap/sitemaps_baiviettuvi.xml',
                'last_modified' => $time_created,
                'priority'  => '0.9',
            );
            $i++;

        $this->base_create($arr_list, 'sitemap.xml');
        echo '<p style="text-align: center;">Đã cập nhập sitemap</p>';
    }

    function scan_sitemap($input){
        echo $input.'<br>';
        $arr_list_ngay = '';
        $time_created = date('Y-m-d');
        $slug_after = '';
        $i = 0;
        if (preg_match('/\/ngay\-/', $input)){
            for ($k_nam = 2016; $k_nam <= 2026; $k_nam++) {
                for ($k_thang = 1; $k_thang <= 12; $k_thang++) {
                    for ($k_ngay = 1; $k_ngay <= 31; $k_ngay++) {
                        $slug_after = $this->base_url . $input . '.html';
                        //echo $slug_after.'<br>';
                        $slug_after = str_replace('ngay-([0-9]+)', 'ngay-'.$k_ngay, $slug_after);
                        $slug_after = str_replace('thang-([0-9]+)', 'thang-'.$k_thang, $slug_after);
                        $slug_after = str_replace('nam-([0-9]+)', 'nam-'.$k_nam, $slug_after);
                        $arr_list_ngay[$i] = array(
                            'slug' => $slug_after,
                            'last_modified' => $time_created,
                            );
                        $i++;
                    }
                }
            }
        }
        else{
            for ($k_nam = 1975; $k_nam <= 2026; $k_nam++) {
                for ($k_thang = 1; $k_thang <= 12; $k_thang++) {
                    $slug_after = $this->base_url . $input . '.html';
                    $slug_after = str_replace('thang-([0-9]+)', 'thang-'.$k_thang, $slug_after);
                    $slug_after = str_replace('nam-([0-9]+)', 'nam-'.$k_nam, $slug_after);
                    $arr_list_ngay[$i] = array(
                        'slug' => $slug_after,
                        'last_modified' => $time_created,
                        );
                    $i++;
                }
            }
        }
        
        $this->namefile_number++;
        $name_file = 'sitemap/sitemap_'.$this->namefile_number.'.xml';
        $this->base_create($arr_list_ngay, $name_file);
        return $name_file;
    }

    public function scan_ngaythangnam()
    {
        $time_created = date('Y-m-d');
        $slug = $this->base_url;
        // select seolink
        $this->db->select('*');
        $this->db->from('seolink');
        $result_seolink = $this->db->get()->result_array();
        $i = 0;
        $i_around = 1;
        $name_file = null;
        $i_ngay = 0;
        foreach ($result_seolink as $key => $value) {
            unset($arr_list_ngay);
            $arr_list_ngay = '';
            $slug_after = '';
            $pattern_ngay = '/\$ngay/';
            $subject = $value['link'];
            $i = 0;
            if (preg_match($pattern_ngay, $subject)) {
                for ($k_nam = 1975; $k_nam <= 2026; $k_nam++) {
                    for ($k_thang = 1; $k_thang <= 12; $k_thang++) {
                        for ($k_ngay = 1; $k_ngay <= 31; $k_ngay++) {
                            $slug_after = $this->base_url . $value['link'] . '.html';
                            //echo $slug_after.'<br>';
                            $slug_after = str_replace('$ngay', $k_ngay, $slug_after);
                            $slug_after = str_replace('$thang', $k_thang, $slug_after);
                            $slug_after = str_replace('$nam', $k_nam, $slug_after);
                            $arr_list_ngay[$i] = array(
                                'slug' => $slug_after,
                                'last_modified' => $time_created,
                                );
                            if ($i == 6000 || ($k_nam == 2026 && $k_thang == 6 && $k_ngay == 6)) {
                                $name_file[$i_ngay] = $this->base_url.'sitemap/sitemap_' . $key . '_' . $i_around .
                                    '.xml';
                                //$this->base_create($arr_list_ngay,'sitemap/sitemap_'.$key.'_'.$i_around.'.xml');
                                unset($arr_list_ngay);
                                $i = 0;
                                $i_around++;
                            }
                            $i++;
                            $i_ngay++;
                        }
                    }
                }
            }
        }
        return $name_file;
    }

    public function scan_ngay()
    {
        $time_created = date('Y-m-d');
        $slug = $this->base_url;
        // select seolink
        $this->db->select('*');
        $this->db->from('seolink');
        $result_seolink = $this->db->get()->result_array();
        $i = 0;
        $i_around = 1;
        $name_file = null;
        $i_ngay = 0;
        foreach ($result_seolink as $key => $value) {
            unset($arr_list_ngay);
            $arr_list_ngay = '';
            $slug_after = '';
            $pattern_ngay = '/\$ngay/';
            $subject = $value['link'];
            $i = 0;
            if (preg_match($pattern_ngay, $subject)) {
                for ($k_nam = 1975; $k_nam <= 2026; $k_nam++) {
                    for ($k_thang = 1; $k_thang <= 12; $k_thang++) {
                        for ($k_ngay = 1; $k_ngay <= 31; $k_ngay++) {
                            $slug_after = $this->base_url . $value['link'] . '.html';
                            //echo $slug_after.'<br>';
                            $slug_after = str_replace('$ngay', $k_ngay, $slug_after);
                            $slug_after = str_replace('$thang', $k_thang, $slug_after);
                            $slug_after = str_replace('$nam', $k_nam, $slug_after);
                            $arr_list_ngay[$i] = array(
                                'slug' => $slug_after,
                                'last_modified' => $time_created,
                                );
                            if ($i == 6000 || ($k_nam == 2026 && $k_thang == 6 && $k_ngay == 6)) {
                                $name_file[$i_ngay] = $this->base_url.'sitemap/sitemap_' . $key . '_' . $i_around .
                                    '.xml';
                                //$this->base_create($arr_list_ngay,'sitemap/sitemap_'.$key.'_'.$i_around.'.xml');
                                unset($arr_list_ngay);
                                $i = 0;
                                $i_around++;
                            }
                            $i++;
                            $i_ngay++;
                        }
                    }
                }
            }
        }
        return $name_file;
    }

    public function update_sitemap_new(){
        $this->sitemap_laman();
        $this->sitemap_lamnha();
        $this->sitemap_tuoihop();
        $this->sitemap_kethon();
        $this->sitemap_muanha();
        $this->sitemap_sinhcon();
        $this->sitemap_xaynha();
    }

    public function sitemap_laman(){
        $this->load->library(array('site/my_info','site/vnkey'));
        $time_created = date('Y-m-d');
        $slug = $this->base_url;
        $arr_list = null;
        $i = 0;
        for ($j = 1950; $j <= 2010; $j++) { 
            $slug_after = $slug . 'xem-tuoi-lam-an/tuoi-$canchi-sinh-nam-$nam-hop-lam-an-voi-tuoi-nao.html';
            $slug_after = str_replace('$nam', $j, $slug_after);
            $info_user  = $this->my_info->get_info_date(6,6,$j);
            $canchislug = $this->vnkey->format_key($info_user['namcanchi']);
            $slug_after = str_replace('$nam', $j, $slug_after);
            $slug_after = str_replace('$canchi', $canchislug, $slug_after);
            $arr_list[$i] = array(
                'slug' => $slug_after,
                'last_modified' => $time_created,
                'priority' => '0.9',
            );
            $i++;
        }
        $this->base_create($arr_list, 'sitemap/sitemap_laman_new.xml');
    }

    public function sitemap_lamnha(){
        $this->load->library(array('site/my_info','site/vnkey'));
        $time_created = date('Y-m-d');
        $slug = $this->base_url;
        $arr_list = null;
        $i = 0;
        for ($j = 1950; $j <= 2010; $j++) { 
            for ($k=2017; $k <= 2025; $k++) { 
                $slug_after = $slug . 'xem-tuoi-lam-nha/tuoi-$canchi-sinh-nam-$namsinh-lam-nha-$namxem-co-tot-khong.html';
                $info_user  = $this->my_info->get_info_date(6,6,$j);
                $canchislug = $this->vnkey->format_key($info_user['namcanchi']);
                $slug_after = str_replace('$namsinh', $j, $slug_after);
                $slug_after = str_replace('$canchi', $canchislug, $slug_after);
                $slug_after = str_replace('$namxem', $k, $slug_after);
                $arr_list[$i] = array(
                    'slug' => $slug_after,
                    'last_modified' => $time_created,
                    'priority' => '0.9',
                );
                $i++;
            }
            
        }
        $this->base_create($arr_list, 'sitemap/sitemap_lamnha_new.xml');
    }

    public function sitemap_tuoihop(){
        $this->load->library(array('site/my_info','site/vnkey'));
        $time_created = date('Y-m-d');
        $slug = $this->base_url;
        $arr_list = null;
        $i = 0;
        for ($j = 1950; $j <= 2010; $j++) { 
            $slug_after = $slug . 'xem-tuoi-hop-nhau/tuoi-$canchi-sinh-nam-$namsinh-hop-voi-tuoi-nao.html';
            $info_user  = $this->my_info->get_info_date(6,6,$j);
            $canchislug = $this->vnkey->format_key($info_user['namcanchi']);
            $slug_after = str_replace('$namsinh', $j, $slug_after);
            $slug_after = str_replace('$canchi', $canchislug, $slug_after);
            $arr_list[$i] = array(
                'slug' => $slug_after,
                'last_modified' => $time_created,
                'priority' => '0.9',
            );
            $i++;
        }
        $this->base_create($arr_list, 'sitemap/sitemap_tuoohop_new.xml');
    }

    public function sitemap_kethon(){
        $this->load->library(array('site/my_info','site/vnkey'));
        $time_created = date('Y-m-d');
        $slug = $this->base_url;
        $arr_list = null;
        $i = 0;
        for ($j = 1950; $j <= 2010; $j++) { 
            $slug_after = $slug . 'xem-tuoi-ket-hon/nam-tuoi-$canchi-$namsinh-lay-vo-nam-nao-tot.html';
            $info_user  = $this->my_info->get_info_date(6,6,$j);
            $canchislug = $this->vnkey->format_key($info_user['namcanchi']);
            $slug_after = str_replace('$namsinh', $j, $slug_after);
            $slug_after = str_replace('$canchi', $canchislug, $slug_after);
            $arr_list[$i] = array(
                'slug' => $slug_after,
                'last_modified' => $time_created,
                'priority' => '0.9',
            );
            $i++;
        }
        for ($j = 1950; $j <= 2010; $j++) { 
            $slug_after = $slug . 'xem-tuoi-ket-hon/nu-tuoi-$canchi-$namsinh-lay-chong-nam-nao-tot.html';
            $info_user  = $this->my_info->get_info_date(6,6,$j);
            $canchislug = $this->vnkey->format_key($info_user['namcanchi']);
            $slug_after = str_replace('$namsinh', $j, $slug_after);
            $slug_after = str_replace('$canchi', $canchislug, $slug_after);
            $arr_list[$i] = array(
                'slug' => $slug_after,
                'last_modified' => $time_created,
                'priority' => '0.9',
            );
            $i++;
        }
        $this->base_create($arr_list, 'sitemap/sitemap_kethon_new.xml');
    }

    public function sitemap_muanha(){
        $this->load->library(array('site/my_info','site/vnkey'));
        $time_created = date('Y-m-d');
        $slug = $this->base_url;
        $arr_list = null;
        $i = 0;
        for ($j = 1950; $j <= 2010; $j++) { 
            for ($k=2017; $k <= 2025; $k++) { 
                $slug_after = $slug . 'xem-tuoi-mua-nha/tuoi-$canchi-mua-nha-nam-$namxem-co-tot-khong.html';
                $info_user  = $this->my_info->get_info_date(6,6,$j);
                $canchislug = $this->vnkey->format_key($info_user['namcanchi']);
                $slug_after = str_replace('$canchi', $canchislug, $slug_after);
                $slug_after = str_replace('$namxem', $k, $slug_after);
                $arr_list[$i] = array(
                    'slug' => $slug_after,
                    'last_modified' => $time_created,
                    'priority' => '0.9',
                );
                $i++;
            }
            
        }
        $this->base_create($arr_list, 'sitemap/sitemap_muanha_new.xml');
    }

    public function sitemap_sinhcon(){
        $this->load->library(array('site/my_info','site/vnkey'));
        $time_created = date('Y-m-d');
        $slug = $this->base_url;
        $arr_list = null;
        $i = 0;
        for ($j = 2017; $j <= 2050; $j++) { 
            $slug_after = $slug . 'xem-tuoi-sinh-con/sinh-con-$namsinh-hop-tuoi-bo-me-khong.html';
            $info_user  = $this->my_info->get_info_date(6,6,$j);
            $canchislug = $this->vnkey->format_key($info_user['namcanchi']);
            $slug_after = str_replace('$namsinh', $j, $slug_after);
            $arr_list[$i] = array(
                'slug' => $slug_after,
                'last_modified' => $time_created,
                'priority' => '0.9',
            );
            $i++;
        }
        $this->base_create($arr_list, 'sitemap/sitemap_sinhcon_new.xml');
    }

    public function sitemap_xaynha(){
        $this->load->library(array('site/my_info','site/vnkey'));
        $time_created = date('Y-m-d');
        $slug = $this->base_url;
        $arr_list = null;
        $i = 0;
        for ($j = 1950; $j <= 2010; $j++) { 
            $slug_after = $slug . 'xem-huong-nha-tot-xau/tuoi-$canchi-xay-nha-huong-nao-tot.html';
            $info_user  = $this->my_info->get_info_date(6,6,$j);
            $canchislug = $this->vnkey->format_key($info_user['namcanchi']);
            $slug_after = str_replace('$namsinh', $j, $slug_after);
            $slug_after = str_replace('$canchi', $canchislug, $slug_after);
            $arr_list[$i] = array(
                'slug' => $slug_after,
                'last_modified' => $time_created,
                'priority' => '0.9',
            );
            $i++;
        }
        $this->base_create($arr_list, 'sitemap/sitemap_xaynha_new.xml');
    }

    public function base_create($posts = null, $namefile = null)
    {
        $this->load->library('site/sitemaps');

        foreach ($posts as $post) {
            $item = array(
                "loc" => $post['slug'],
                "lastmod" => $post['last_modified'],
                "changefreq" => "hourly",
                "priority" => isset($post['priority']) ? $post['priority'] : '0.8',
                );

            $this->sitemaps->add_item($item);
        }
        $file_name = $this->sitemaps->build('' . $namefile, false);
        //$file_name = $this->sitemaps->build("sitemap/sitemap.xml", false);
    }

}
?>