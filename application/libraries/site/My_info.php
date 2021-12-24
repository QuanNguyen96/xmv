<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_info
{
    public $CI = null;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model(array('site/configs_model','site/public_model','site/boituoivochong_model'));
        $this->CI->load->library(array('site/ngayamduong'));
    }

    public function get_info_date($ngay = 6,$thang = 6 , $nam = 2017){
        $duonglich = array( $ngay, $thang, $nam );
        $amlich      = $this->CI->ngayamduong->get_amlich( $duonglich ); 
        $canchingay  = $this->CI->ngayamduong->get_canchi_ngay( $duonglich );
        $canchithang = $this->CI->ngayamduong->get_canchi_thang( $amlich );
        $canchinam   = $this->CI->ngayamduong->get_canchi_nam( $amlich );
        $data['ngaycanchi'] = $this->CI->ngayamduong->get_canchi_ngay( $duonglich, 'text' );
        $data['thangcanchi'] = $this->CI->ngayamduong->get_canchi_thang( $amlich, 'text'  );
        $data['namcanchi']   = $this->CI->ngayamduong->get_canchi_nam( $amlich, 'text'  );
        $data['ngaythu']     = $this->CI->ngayamduong->get_ngaythu($duonglich);
        $data['canchingay_text'] = array('can'=>get_can_menh((int)$canchingay['can']),'chi'=>get_chi_menh((int)$canchingay['chi']));
        $data['canchithang_text'] = array('can'=>get_can_menh((int)$canchithang['can']),'chi'=>get_chi_menh((int)$canchithang['chi']));
        $data['canchinam_text'] = array('can'=>get_can_menh((int)$canchinam['can']),'chi'=>get_chi_menh((int)$canchinam['chi']));
        //var_dump($data['namcanchi']);
        $data['amlich'] = $amlich;
        $data['canchingay'] = $canchingay;
        $data['canchithang']    = $canchithang;
        $data['canchinam']  = $canchinam;
        return $data;
    }

    public function Db_get_info_user($input){
        $ngay_sinh = $input['ngay_sinh'];
        $thang_sinh = $input['thang_sinh'];
        $nam_sinh   = $input['nam_sinh'];
        $gioi_tinh  = isset($input['gioitinh'])?$input['gioitinh']:0;   // nam is 0, nu is 1
        $data      = array(
            'ngay_sinh' => $ngay_sinh,
            'thang_sinh' => $thang_sinh,
            'nam_sinh' => $nam_sinh,
        );
        // add data user
        //$result = $this->CI->public_model->db->insert('dev_data_users',$data);

        // info send
        $duonglich = array( $ngay_sinh, $thang_sinh, $nam_sinh );
        $amlich      = $this->CI->ngayamduong->get_amlich( $duonglich ); 
        // $canchingay  = $this->CI->ngayamduong->get_canchi_ngay( $duonglich );
        // $canchithang = $this->CI->ngayamduong->get_canchi_thang( $amlich );
        $canchinam   = $this->CI->ngayamduong->get_canchi_nam( $amlich );
        $data['canchinam_number']   = $canchinam;
        // $data['ngaycanchi'] = $this->CI->ngayamduong->get_canchi_ngay( $duonglich, 'text' );
        // $data['thangcanchi'] = $this->CI->ngayamduong->get_canchi_thang( $amlich, 'text'  );
        $data['namcanchi']   = $this->CI->ngayamduong->get_canchi_nam( $amlich, 'text'  );

        //var_dump($data['namcanchi']);
        $data['amlich'] = $amlich;
        // $data['canchingay'] = $canchingay;
        // $data['canchithang']    = $canchithang;
        //$data['canchinam']  = $canchinam;

        // lay ngu hanh va menh
        $sql = "SELECT * FROM jos_sao_lucthap WHERE canchi LIKE '%".$data['namcanchi']."%' ";
        $row = $this->CI->public_model->db->query($sql)->row_array();
        $data['lucthap']    = $row;
        $data['canchinam_text'] = array('can'=>get_can_menh((int)$canchinam['can']),'chi'=>get_chi_menh((int)$canchinam['chi']));
        $cung_user = $this->CI->boituoivochong_model->getCungMenh($nam_sinh,$gioi_tinh);
        $data['cung_user']  = $cung_user;

        // lay cung hoang dao
        $ngay = $ngay_sinh;
        $thang = $thang_sinh;
        $nam = $nam_sinh;
        if( ($thang == 1 && $ngay >=20) || ($thang == 2 && $ngay <= 18)  )
          $cung = 1;
        elseif ( ($thang == 2 && $ngay >=19) || ($thang == 3 && $ngay <= 20)  ) 
        $cung = 2;
        elseif ( ($thang == 3 && $ngay >=21) || ($thang == 4 && $ngay <= 19)  ) 
        $cung = 3;
        elseif ( ($thang == 4 && $ngay >=20) || ($thang == 5 && $ngay <= 20)  ) 
        $cung = 4;
        elseif ( ($thang == 5 && $ngay >=21) || ($thang == 6 && $ngay <= 21)  ) 
        $cung = 5;
        elseif ( ($thang == 6 && $ngay >=22) || ($thang == 7 && $ngay <= 22)  ) 
        $cung = 6;
        elseif ( ($thang == 7 && $ngay >=23) || ($thang == 8 && $ngay <= 22)  ) 
        $cung = 7;
        elseif ( ($thang == 8 && $ngay >=23) || ($thang == 9 && $ngay <= 22)  )
        $cung = 8; 
        elseif ( ($thang == 9 && $ngay >=23) || ($thang == 10 && $ngay <= 22)  ) 
        $cung = 9;
        elseif ( ($thang == 10 && $ngay >=23) || ($thang == 11 && $ngay <= 21)  ) 
        $cung = 10;
        elseif ( ($thang == 11 && $ngay >=22) || ($thang == 12 && $ngay <= 21)  ) 
        $cung = 11;
        else
        $cung = 12;
        $data['luan'] = $this->CI->public_model->db->where('ma',$cung)->get('boingaysinh')->row_array();
        return $data;
    }
}

