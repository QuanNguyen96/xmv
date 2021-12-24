<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = &get_instance();
    $CI->load->database();

    $translate = $CI->db->select()
                            ->from('keywords')
                            ->get()
                            ->result_array();
    // var_dump($translate);
    $GLOBALS['translate']   = $translate;

    if (!function_exists('upperFirstChar')) {
        function upperFirstChar($t)
        {
            // $fChar=mb_substr($t,0,1,'UTF-8');
            // $fCharReplace=mb_convert_case($fChar,MB_CASE_UPPER,'UTF-8');
            // $c=1;
            // $t=str_replace($fChar,$fCharReplace,$t,$c);

            $chudautien = mb_substr($t, 0, 1, 'UTF-8');
            $chuconlai  = mb_substr($t, 1, mb_strlen($t),'UTF-8');

            $chudautien = mb_convert_case($chudautien, MB_CASE_UPPER, 'UTF-8');
            $chuconlai  = mb_convert_case($chuconlai, MB_CASE_LOWER, 'UTF-8');
            $t = $chudautien.$chuconlai;
            return $t;
        } 
    }
    if (!function_exists('_e')) {
        function _e($text,$input = null,$return = null){
            $text = trim($text);
            // $CI = &get_instance();
            // $CI->load->model('public_model');

            // $translate = $CI->public_model->db->select()
            //                                             ->from('keywords')
            //                                             ->get()
            //                                             ->result_array();

            $text = str_replace('http://$domain/',base_url(), $text);
            $translate  = $GLOBALS['translate'];
            if (!empty($input) and is_array($input)) {
                foreach ($input as $key => $value) {
                    $text = str_replace($key,$value, $text);
                }
            }
            // dd($translate,1);
            
            if (!empty($translate)) {
                foreach ($translate as $key => $value) {
                    $arr_translate = null;
                    $actOperation  = mb_strtolower($value['anchor_text'], 'UTF-8');
                    $arrText  = explode(' ', $actOperation);
                    $countText  = count($arrText);
                    
                    if($countText > 1){
                        switch ($countText) {
                            case 2:{
                                $t1_u = upperFirstChar($arrText[0], 'UTF-8');
                                $t1_l = mb_strtolower($arrText[0], 'UTF-8');
                                $t2_u = upperFirstChar($arrText[1], 'UTF-8');
                                $t2_l = mb_strtolower($arrText[1], 'UTF-8');

                                $arr_translate[]    = mb_strtoupper($actOperation, 'UTF-8');
                                $arr_translate[]    = mb_strtolower($actOperation, 'UTF-8');
                                $arr_translate[]    = $t1_u.' '.$t2_u;

                                $arr_translate[]    = $t1_u.' '.$t2_l;
                                $arr_translate[]    = $t1_l.' '.$t2_u;
                                break;
                            }
                            case 3:{
                                $t1_u = upperFirstChar($arrText[0], 'UTF-8');
                                $t1_l = mb_strtolower($arrText[0], 'UTF-8');
                                $t2_u = upperFirstChar($arrText[1], 'UTF-8');
                                $t2_l = mb_strtolower($arrText[1], 'UTF-8');
                                $t3_u = upperFirstChar($arrText[2], 'UTF-8');
                                $t3_l = mb_strtolower($arrText[2], 'UTF-8');

                                $arr_translate[]    = mb_strtoupper($actOperation, 'UTF-8');
                                $arr_translate[]    = mb_strtolower($actOperation, 'UTF-8');
                                $arr_translate[]    = $t1_u.' '.$t2_u.' '.$t3_u;

                                $arr_translate[]    = $t1_u.' '.$t2_l.' '.$t3_u;
                                $arr_translate[]    = $t1_u.' '.$t2_l.' '.$t3_l;
                                $arr_translate[]    = $t1_u.' '.$t2_u.' '.$t3_l;
                                $arr_translate[]    = $t1_l.' '.$t2_u.' '.$t3_l;
                                $arr_translate[]    = $t1_l.' '.$t2_u.' '.$t3_u;
                                break;
                            }
                                
                            
                            default:{
                                $ti_u   = null;
                                $arr_translate[]    = $value['anchor_text'];
                                $arr_translate[]    = mb_strtoupper($actOperation, 'UTF-8');
                                $arr_translate[]    = mb_strtolower($actOperation, 'UTF-8');
                                foreach ($arrText as $keyMax => $valueMax) {
                                    $ti_u   .= upperFirstChar($valueMax);
                                }
                                $arr_translate[]    = $ti_u;
                                break;
                            }
                                
                                
                        }
                    }
                    else{
                        $arr_translate[]  = $value['anchor_text'];
                    }
                    foreach ($arr_translate as $key1 => $value1) {
                        $text = str_replace(trim($value1),'<a href="'.$value["internal_link"].'">'.$value1.'</a>', $text);
                    }
                    unset($arr_translate);
                }
                
            }
            // $text = get_chi_replace($text);
            if (!empty($return)) {
                return $text;
            }
            echo $text;
            
        }
    }

    if(!function_exists('get_menh')){
        function get_menh($input = null){
            $arr = array(
                'Kim'	=> 1,
                'Mộc'	=> 2,
                'Thuỷ'	=> 3,
                'Hoả'	=> 4,
                'Thổ'	=> 5,
            );
            if($input == ''){
                return $arr;
            }
            if(is_int($input)){
                $result = array_flip($arr);
                return $result[$input];
            }
            else{
                return $arr[$input];
            }
            
        }
    }
    if(!function_exists('get_chi_menh')){
        function get_chi_menh($input = null){
            $arr = array(
                'Tý'    => 1,
                'Sửu'   => 2,
                'Dần'   => 3,
                'Mão'   => 4,
                'Thìn'  => 5,
                'Tỵ'    => 6,
                'Ngọ'   => 7,
                'Mùi'   => 8,
                'Thân'  => 9,
                'Dậu'   => 10,
                'Tuất'  => 11,
                'Hợi'   => 12
            );
            if($input == ''){
                return $arr;
            }
            if(is_int($input)){
                $result = array_flip($arr);
                return $result[$input];
            }
            else{
                return $arr[$input];
            }
        }
    }

    /** sua loi ti -> ty **/
    if(!function_exists('get_chi_menh_show')){
        function get_chi_menh_show($input = null){
            $arr = array(
                'Tý'    => 'Tý',
                'Sửu'   => 'Sửu',
                'Dần'   => 'Dần',
                'Mão'   => 'Mão',
                'Thìn'  => 'Thìn',
                'Tỵ'    => 'Tỵ',
                'Ngọ'   => 'Ngọ',
                'Mùi'   => 'Mùi',
                'Thân'  => 'Thân',
                'Dậu'   => 'Dậu',
                'Tuất'  => 'Tuất',
                'Hợi'   => 'Hợi'
            );
            if($input == ''){
                return $arr;
            }
            if(is_int($input)){
                $result = array_flip($arr);
                return $result[$input];
            }
            else{
                return $arr[$input];
            }
        }
    }

    /** sua loi ti -> ty **/
    if(!function_exists('get_chi_replace')){
        function get_chi_replace($input = null){
            return str_replace('Tí','Tý',$input);
        }
    }

    /** sua loi ti -> ty **/
    if(!function_exists('get_chi_replace_slug')){
        function get_chi_replace_slug($input = null){
            return str_replace('ti','ty',$input);
        }
    }

    if(!function_exists('get_can_menh')){
        function get_can_menh($input = null){
            $arr = array(
                'Giáp'  => 1,
                'Ất'    => 2,
                'Bính'  => 3,
                'Đinh'  => 4,
                'Mậu'   => 5,
                'Kỷ'    => 6,
                'Canh'  => 7,
                'Tân'   => 8,
                'Nhâm'  => 9,
                'Quý'   => 10,
            );
            if($input == ''){
                return $arr;
            }
            if(is_int($input)){
                $result = array_flip($arr);
                return $result[$input];
            }
            else{
                //echo $input; exit()
                return $arr[$input];
            }
        }
    }

    if (!function_exists('get_can_slug')) {
        function get_can_slug($input = null,$input2 = null){
            $input = trim($input);
            $arr = array(
                'Giáp'  => 'giap',
                'Ất'    => 'at',
                'Bính'  => 'binh',
                'Đinh'  => 'dinh',
                'Mậu'   => 'mau',
                'Kỷ'    => 'ky',
                'Canh'  => 'canh',
                'Tân'   => 'tan',
                'Nhâm'  => 'nham',
                'Quý'   => 'quy',
            );
            if($input == ''){
                return $arr;
            }
            if(!empty($input2)){
                $result = array_flip($arr);
                return $result[$input];
            }
            else{
                return $arr[$input];
            }
        }
    }
    if (!function_exists('get_chi_slug')) {
        function get_chi_slug($input = null,$input2 = null){
            $input = trim($input);
            $arr = array(
                'Tý'    => 'ty',
                'Sửu'   => 'suu',
                'Dần'   => 'dan',
                'Mão'   => 'mao',
                'Thìn'  => 'thin',
                'Tỵ'    => 'ty',
                'Ngọ'   => 'ngo',
                'Mùi'   => 'mui',
                'Thân'  => 'than',
                'Dậu'   => 'dau',
                'Tuất'  => 'tuat',
                'Hợi'   => 'hoi'
            );
            if($input == ''){
                return $arr;
            }
            if(!empty($input2)){
                $result = array_flip($arr);
                return $result[$input];
            }
            else{
                return $arr[$input];
            }
        }
    }

    if(!function_exists('get_khongminhlucdieu')){
        function get_khongminhlucdieu($input = null){
            $arr_vonglap = array(
                1 => 'Đại an',
                2 => 'Lưu liên',
                3 => 'Tốc hỷ',
                4 => 'Xích khẩu',
                5 => 'Tiểu cát',
                6 => 'Không vong',
            );
            if($input == ''){
                return $arr_vonglap;
            }
            if(is_int($input)){
                return $arr_vonglap[$input];
            }
            else{
                $result = array_flip($arr_vonglap);
                return $result[$input];
            }
        }
    }

    if(!function_exists('get_color_for_u')){
        function get_color_for_u($input = null){
            $input = trim($input);
            switch ($input) {
                case 'Lục Hợp':
                    return '<span class="color_red">Lục Hợp</span>';
                    break;
                case 'Bình Hòa':
                    return '<span class="color_green">Bình Hòa</span>';
                    break;
                case 'Tương Sinh':
                    return '<span class="color_red">Tương Sinh</span>';
                    break;
                case 'Tương sinh':
                    return '<span class="color_red">Tương sinh</span>';
                    break;
                case 'Tương Khắc':
                    return '<span class="color_black">Tương Khắc</span>';
                    break;
                case 'Tương Xung':
                    return '<span class="color_black">Tương Xung</span>';
                    break;
                
                default:
                    return '<b class="">'.$input.'</b>';
                    break;
            }
        }
    }

    if(!function_exists('bang_tuong_sinh')){
        function bang_tuong_sinh($input = null){
            $arr = array(
                'Kim' => 'Thủy',
                'Mộc' => 'Hỏa',
                'Thủy'  => 'Mộc',
                'Hỏa' => 'Thổ',
                'Thổ' => 'Kim'
            );
            if(array_key_exists($input,$arr)){
                return $arr[$input];
            }
            return flase;
        }
    }

    if(!function_exists('bang_tuong_khac')){
        function bang_tuong_khac($input = null){
            $arr = array(
                'Kim' => 'Mộc',
                'Mộc' => 'Thổ',
                'Thủy'  => 'Hỏa',
                'Hỏa' => 'Kim',
                'Thổ' => 'Thủy'
            );
            if(array_key_exists($input,$arr)){
                return $arr[$input];
            }
            return false;
        }
    }

    if(!function_exists('what_can_to_menh')){
        function what_can_to_menh($input = null){
            $CI = &get_instance();
            $CI->load->model('site/public_model');
            $where  = array('can'=>$input);
            if (is_int($input)) {
                $where = array('id'=>$input);
            }
            $result = $CI->public_model->db->select()
                                          ->where($where)
                                          ->from('ci_sao_can')
                                          ->get()->row_array();
            return $result['he_tutru'];
        }
    }

    if(!function_exists('what_chi_to_menh')){
        function what_chi_to_menh($input = null){
            $CI = &get_instance();
            $CI->load->model('site/public_model');
            $where  = array('chi'=>$input);
            if (is_int($input)) {
                $where = array('id'=>$input);
            }
            $result = $CI->public_model->db->select()
                                          ->where($where)
                                          ->from('ci_sao_chi')
                                          ->get()->row_array();
            return $result['hechi_tutru'];
        }
    }

    if(!function_exists('get_str_point')){
        function get_str_point($input){
            $input = (int)$input;
            $arr = array(
                'Không tốt',
                'Trung bình',
                'Tạm được',
                'Tốt',
            );
            if(array_key_exists($input,$arr)){
                return $arr[$input];
            }
            else{
                return 'Không tốt';
            }
        }
    }

    if(!function_exists('get_color_text_by_scores')){
        function get_color_text_by_scores($input, $thangDiem = 3){
            $input = (int)$input;
            $thangDiem = (int)$thangDiem;
            $scores = $input / $thangDiem;
            $result = null;
            if ($scores <= 0) {
                $result = "clr_black";
            }
            if ($scores > 0 and $scores < 1) {
                $result = "clr_blue";
            }
            if ($scores >= 1) {
                $result = "clr_red";
            }
            return $result;
        }
    }

    if(!function_exists('get_text_by_scores')){
        function get_text_by_scores($input, $thangDiem = 3){
            $input = (int)$input;
            $thangDiem = (int)$thangDiem;
            $scores = $input / $thangDiem;
            $result = null;
            if ($scores <= 0) {
                $result = "Khắc";
            }
            if ($scores > 0 and $scores < 1) {
                $result = "Bình hòa";
            }
            if ($scores >= 1) {
                $result = "Hợp";
            }
            return $result;
        }
    }

    if (!function_exists('get_position_menu')) {
        function get_position_menu(){
            $mang = array(
                array('name' => 'top', 'title' => ' : Theo parent & child'),
                array('name' => 'right', 'title' => ' : Công cụ phía sidebar'),
                array('name' => 'content', 'title' => ' : Công cụ trên trang chủ'),
                array('name' => 'footer', 'title' => ' : Công cụ chân trang'),
                array('name' => 'category', 'title' => ' : Danh mục con công cụ'),
                array('name' => 'orther', 'title' => ' : Công cụ khác'),
            );
            return $mang;
        }
    }

    if(!function_exists('get_str_point_thiendia')){
        function get_str_point_thiendia($input){
            $input = (int)$input;
            $arr = array(
                'Không tốt',
                'Trung bình',
                'Tạm được',
                'Tốt',
                'Rất tốt',
            );
            if(array_key_exists($input,$arr)){
                return $arr[$input];
            }
            else{
                return 'Không tốt';
            }
        }
    }
    
    if(!function_exists('dd')){
        function dd($input = null,$break = null){
            echo '<pre>';
            var_dump($input);
            echo '</pre>';
            if(empty($break))
            exit();
        }

    }

    if(!function_exists('ii')){
        function ii($input = null,$break = null){
            echo 'here<div style="display: none;">';
            echo '<pre>';
            var_dump($input);
            echo '</pre>';
            echo '</div>';
            if(!empty($break))
            exit();
        }

    }

    if(!function_exists('pr')){
        function pr($data){
            echo '<pre>';
            print_r($data);
            echo '</pre>';
        }

    }

    if(!function_exists('public_url')){
        function public_url($input = null){
            return base_url('templates/site/'.$input);
        }
    }

    if(!function_exists('tinhthapnhibattu_replace')){
        function tinhthapnhibattu_replace($input = null){
            $input = str_replace('xây cất','<a href="'.base_url('xem-ngay-tot-dong-tho.html').'">xây cất</a>', $input);
            $input = str_replace('khởi công','<a href="'.base_url('xem-ngay-tot-khai-truong.html').'">khởi công</a>', $input);
            $input = str_replace('Khởi công','<a href="'.base_url('xem-ngay-tot-khai-truong.html').'">Khởi công</a>', $input);
            return $input;
        }
    }

    if (!function_exists('replace_tinh_banhtobachkinhat')) {
        function replace_tinh_banhtobachkinhat($text,$input = null){
            $text = str_replace('$domain/',base_url(), $text);
            $text = str_replace('$thang',$input['thang'], $text);
            $text = str_replace('$nam',$input['nam'], $text);
            return $text;
        }
    }

    if (!function_exists('replace_tinhtrucngay')) {
        function replace_tinhtrucngay($text,$input = null){
            $text = str_replace('$domain/',base_url(), $text);
            $text = str_replace('$thang',$input['thang'], $text);
            $text = str_replace('$nam',$input['nam'], $text);
            return $text;
        }
    }

    if (!function_exists('list_cung_hoang_dao')) {
        function list_cung_hoang_dao($input = null){
            $arr = array(
              1 => 'Bạch Dương',
              2 => 'Kim Ngưu',
              3 => 'Song Tử',
              4 => 'Cự Giải',
              5 => 'Sư Tử',
              6 => 'Xử Nữ',
              7 => 'Thiên Bình',
              8 => 'Bọ Cạp',
              9 => 'Nhân Mã',
              10 => 'Ma Kết',
              11 => 'Bảo Bình',
              12 => 'Song Ngư',
            );
            if (!empty($input)) {
              return $arr[$input];
            }
            return $arr;
        }
    }

    if (!function_exists('what_menh_hop')) {
        function what_menh_hop($menh = null){
            
        }
    }

    if(!function_exists('list_style_in_catalog')){
        function list_style_in_catalog($input = null){
            $arr    = array(
                1   => 'Tử vi',
                2   => 'Phong thủy',
                3   => 'Xem tướng',
            );
            return $arr;
        }
    }

    if (!function_exists('replace_page_text')) {
        function replace_page_text($text,$input = null){
            $text = str_replace('http://$domain/',base_url(), $text);

            if (!empty($input)) {
                foreach ($input as $key => $value) {
                    $text = str_replace($key,$value, $text);
                }
            }
            $text = get_chi_replace($text);
            return $text;
        }
    }

    if (!function_exists('show_text_scores')) {
        function show_text_scores($scores, $math, $text = null){
            if ($scores == $math) {
                return $text;
            }
            return '';
        }
    }

    if (!function_exists('include_select')) {
        function include_select($name_select = null){
            return '
                <select name="'.$name_select.'" class="'.$name_select.' myinput">
                   <option value="canh-dan">Canh Dần(1950)</option>
                   <option value="tan-mao">Tân Mão(1951)</option>
                   <option value="nham-thin">Nhâm Thìn(1952)</option>
                   <option value="quy-ty">Quý Tỵ(1953)</option>
                   <option value="giap-ngo">Giáp Ngọ(1954)</option>
                   <option value="at-mui">Ất Mùi(1955)</option>
                   <option value="binh-than">Bính Thân(1956)</option>
                   <option value="dinh-dau">Đinh Dậu(1957)</option>
                   <option value="mau-tuat">Mậu Tuất(1958)</option>
                   <option value="ky-hoi">Kỷ Hợi(1959)</option>
                   <option value="canh-ty">Canh Tí(1960)</option>
                   <option value="tan-suu">Tân Sửu(1961)</option>
                   <option value="nham-dan">Nhâm Dần(1962)</option>
                   <option value="quy-mao">Quý Mão(1963)</option>
                   <option value="giap-thin">Giáp Thìn(1964)</option>
                   <option value="at-ty">Ất Tỵ(1965)</option>
                   <option value="binh-ngo">Bính Ngọ(1966)</option>
                   <option value="dinh-mui">Đinh Mùi(1967)</option>
                   <option value="mau-than">Mậu Thân(1968)</option>
                   <option value="ky-dau">Kỷ Dậu(1969)</option>
                   <option value="canh-tuat">Canh Tuất(1970)</option>
                   <option value="tan-hoi">Tân Hợi(1971)</option>
                   <option value="nham-ty">Nhâm Tí(1972)</option>
                   <option value="quy-suu">Quý Sửu(1973)</option>
                   <option value="giap-dan">Giáp Dần(1974)</option>
                   <option value="at-mao">Ất Mão(1975)</option>
                   <option value="binh-thin">Bính Thìn(1976)</option>
                   <option value="dinh-ty">Đinh Tỵ(1977)</option>
                   <option value="mau-ngo">Mậu Ngọ(1978)</option>
                   <option value="ky-mui">Kỷ Mùi(1979)</option>
                   <option value="canh-than">Canh Thân(1980)</option>
                   <option value="tan-dau">Tân Dậu(1981)</option>
                   <option value="nham-tuat">Nhâm Tuất(1982)</option>
                   <option value="quy-hoi">Quý Hợi(1983)</option>
                   <option value="giap-ty">Giáp Tí(1984)</option>
                   <option value="at-suu">Ất Sửu(1985)</option>
                   <option value="binh-dan">Bính Dần(1986)</option>
                   <option value="dinh-mao">Đinh Mão(1987)</option>
                   <option value="mau-thin">Mậu Thìn(1988)</option>
                   <option value="ky-ty">Kỷ Tỵ(1989)</option>
                   <option value="canh-ngo">Canh Ngọ(1990)</option>
                   <option value="tan-mui">Tân Mùi(1991)</option>
                   <option value="nham-than">Nhâm Thân(1992)</option>
                   <option value="quy-dau">Quý Dậu(1993)</option>
                   <option value="giap-tuat">Giáp Tuất(1994)</option>
                   <option value="at-hoi">Ất Hợi(1995)</option>
                   <option value="binh-ty">Bính Tí(1996)</option>
                   <option value="dinh-suu">Đinh Sửu(1997)</option>
                   <option value="mau-dan">Mậu Dần(1998)</option>
                   <option value="ky-mao">Kỷ Mão(1999)</option>
                   <option value="canh-thin">Canh Thìn(2000)</option>
                   <option value="tan-ty">Tân Tỵ(2001)</option>
                   <option value="nham-ngo">Nhâm Ngọ(2002)</option>
                   <option value="quy-mui">Quý Mùi(2003)</option>
                   <option value="giap-than">Giáp Thân(2004)</option>
                   <option value="at-dau">Ất Dậu(2005)</option>
                   <option value="binh-tuat">Bính Tuất(2006)</option>
                   <option value="dinh-hoi">Đinh Hợi(2007)</option>
                   <option value="mau-ty">Mậu Tí(2008)</option>
                   <option value="ky-suu">Kỷ Sửu(2009)</option>
                </select>
            ';
        }
    }

    if (!function_exists('include_select_not_act')) {
        function include_select_not_act($name_select = null){
            return '
                <select name="'.$name_select.'" class="'.$name_select.' myinput">
                   <option value="canh-dan">1950</option>
                   <option value="tan-mao">1951</option>
                   <option value="nham-thin">1952</option>
                   <option value="quy-ty">1953</option>
                   <option value="giap-ngo">1954</option>
                   <option value="at-mui">1955</option>
                   <option value="binh-than">1956</option>
                   <option value="dinh-dau">1957</option>
                   <option value="mau-tuat">1958</option>
                   <option value="ky-hoi">1959</option>
                   <option value="canh-ty">1960</option>
                   <option value="tan-suu">1961</option>
                   <option value="nham-dan">1962</option>
                   <option value="quy-mao">1963</option>
                   <option value="giap-thin">1964</option>
                   <option value="at-ty">1965</option>
                   <option value="binh-ngo">1966</option>
                   <option value="dinh-mui">1967</option>
                   <option value="mau-than">1968</option>
                   <option value="ky-dau">1969</option>
                   <option value="canh-tuat">1970</option>
                   <option value="tan-hoi">1971</option>
                   <option value="nham-ty">1972</option>
                   <option value="quy-suu">1973</option>
                   <option value="giap-dan">1974</option>
                   <option value="at-mao">1975</option>
                   <option value="binh-thin">1976</option>
                   <option value="dinh-ty">1977</option>
                   <option value="mau-ngo">1978</option>
                   <option value="ky-mui">1979</option>
                   <option value="canh-than">1980</option>
                   <option value="tan-dau">1981</option>
                   <option value="nham-tuat">1982</option>
                   <option value="quy-hoi">1983</option>
                   <option value="giap-ty">1984</option>
                   <option value="at-suu">1985</option>
                   <option value="binh-dan">1986</option>
                   <option value="dinh-mao">1987</option>
                   <option value="mau-thin">1988</option>
                   <option value="ky-ty">1989</option>
                   <option value="canh-ngo">1990</option>
                   <option value="tan-mui">1991</option>
                   <option value="nham-than">1992</option>
                   <option value="quy-dau">1993</option>
                   <option value="giap-tuat">1994</option>
                   <option value="at-hoi">1995</option>
                   <option value="binh-ty">1996</option>
                   <option value="dinh-suu">1997</option>
                   <option value="mau-dan">1998</option>
                   <option value="ky-mao">1999</option>
                   <option value="canh-thin">2000</option>
                   <option value="tan-ty">2001</option>
                   <option value="nham-ngo">2002</option>
                   <option value="quy-mui">2003</option>
                   <option value="giap-than">2004</option>
                   <option value="at-dau">2005</option>
                   <option value="binh-tuat">2006</option>
                   <option value="dinh-hoi">2007</option>
                   <option value="mau-ty">2008</option>
                   <option value="ky-suu">2009</option>
                </select>
            ';
        }
    }

    if (!function_exists('include_select_not_act_for_sidebar')) {
        function include_select_not_act_for_sidebar($name_select = null){
            return '
                <select name="'.$name_select.'" class="'.$name_select.'">
                   <option value="canh-dan">1950</option>
                   <option value="tan-mao">1951</option>
                   <option value="nham-thin">1952</option>
                   <option value="quy-ty">1953</option>
                   <option value="giap-ngo">1954</option>
                   <option value="at-mui">1955</option>
                   <option value="binh-than">1956</option>
                   <option value="dinh-dau">1957</option>
                   <option value="mau-tuat">1958</option>
                   <option value="ky-hoi">1959</option>
                   <option value="canh-ty">1960</option>
                   <option value="tan-suu">1961</option>
                   <option value="nham-dan">1962</option>
                   <option value="quy-mao">1963</option>
                   <option value="giap-thin">1964</option>
                   <option value="at-ty">1965</option>
                   <option value="binh-ngo">1966</option>
                   <option value="dinh-mui">1967</option>
                   <option value="mau-than">1968</option>
                   <option value="ky-dau">1969</option>
                   <option value="canh-tuat">1970</option>
                   <option value="tan-hoi">1971</option>
                   <option value="nham-ty">1972</option>
                   <option value="quy-suu">1973</option>
                   <option value="giap-dan">1974</option>
                   <option value="at-mao">1975</option>
                   <option value="binh-thin">1976</option>
                   <option value="dinh-ty">1977</option>
                   <option value="mau-ngo">1978</option>
                   <option value="ky-mui">1979</option>
                   <option value="canh-than">1980</option>
                   <option value="tan-dau">1981</option>
                   <option value="nham-tuat">1982</option>
                   <option value="quy-hoi">1983</option>
                   <option value="giap-ty">1984</option>
                   <option value="at-suu">1985</option>
                   <option value="binh-dan">1986</option>
                   <option value="dinh-mao">1987</option>
                   <option value="mau-thin">1988</option>
                   <option value="ky-ty">1989</option>
                   <option value="canh-ngo" selected="">1990</option>
                   <option value="tan-mui">1991</option>
                   <option value="nham-than">1992</option>
                   <option value="quy-dau">1993</option>
                   <option value="giap-tuat">1994</option>
                   <option value="at-hoi">1995</option>
                   <option value="binh-ty">1996</option>
                   <option value="dinh-suu">1997</option>
                   <option value="mau-dan">1998</option>
                   <option value="ky-mao">1999</option>
                   <option value="canh-thin">2000</option>
                   <option value="tan-ty">2001</option>
                   <option value="nham-ngo">2002</option>
                   <option value="quy-mui">2003</option>
                   <option value="giap-than">2004</option>
                   <option value="at-dau">2005</option>
                   <option value="binh-tuat">2006</option>
                   <option value="dinh-hoi">2007</option>
                   <option value="mau-ty">2008</option>
                   <option value="ky-suu">2009</option>
                </select>
            ';
        }
    }

    if (!function_exists('slug_to_text')) {
        function slug_to_text($input = null){
            $arr = array(
              "canh-dan"   =>"Canh Dần",
              "tan-mao"    =>"Tân Mão",
              "nham-thin"  =>"Nhâm Thìn",
              "quy-ty"     =>"Quý Tỵ",
              "giap-ngo"   =>"Giáp Ngọ",
              "at-mui"     =>"Ất Mùi",
              "binh-than"  =>"Bính Thân",
              "dinh-dau"   =>"Đinh Dậu",
              "mau-tuat"   =>"Mậu Tuất",
              "ky-hoi"     =>"Kỷ Hợi",
              "canh-ty"    =>"Canh Tý",
              "tan-suu"    =>"Tân Sửu",
              "nham-dan"   =>"Nhâm Dần",
              "quy-mao"    =>"Quý Mão",
              "giap-thin"  =>"Giáp Thìn",
              "at-ty"      =>"ẤT Tỵ",
              "binh-ngo"   =>"Bính Ngọ",
              "dinh-mui"   =>"Đinh Mùi",
              "mau-than"   =>"Mậu Thân",
              "ky-dau"     =>"Kỷ Dậu",
              "canh-tuat"  =>"Canh Tuất",
              "tan-hoi"    =>"Tân Hợi",
              "nham-ty"    =>"Nhâm Tý",
              "quy-suu"    =>"Quý Sửu",
              "giap-dan"   =>"Giáp Dần",
              "at-mao"     =>"Ất Mão",
              "binh-thin"  =>"Bính Thìn",
              "dinh-ty"    =>"Đinh Tỵ",
              "mau-ngo"    =>"Mậu Ngọ",
              "ky-mui"     =>"Kỷ Mùi",
              "canh-than"  =>"Canh Thân",
              "tan-dau"    =>"Tân Dậu",
              "nham-tuat"  =>"Nhâm Tuất",
              "quy-hoi"    =>"Quý Hợi",
              "giap-ty"    =>"Giáp Tý",
              "at-suu"     =>"Tân Sửu",
              "binh-dan"   =>"Bính Dần",
              "dinh-mao"   =>"Đinh Mão",
              "mau-thin"   =>"Mậu Thìn",
              "ky-ty"      =>"Kỷ Tỵ",
              "canh-ngo"   =>"Canh Ngọ",
              "tan-mui"    =>"Tân Mùi",
              "nham-than"  =>"Nhâm Thân",
              "quy-dau"    =>"Quý Dậu",
              "giap-tuat"  =>"Giáp Tuất",
              "at-hoi"     =>"Ất Hợi",
              "binh-ty"    =>"Bính Tý",
              "dinh-suu"   =>"Đinh Sửu",
              "mau-dan"    =>"Mậu Dần",
              "ky-mao"     =>"Kỷ Mão",
              "canh-thin"  =>"Canh Thình",
              "tan-ty"     =>"Tân Tỵ",
              "nham-ngo"   =>"Nhâm Ngọ",
              "quy-mui"    =>"Quý Mùi",
              "giap-than"  =>"Giáp Thân",
              "at-dau"     =>"Ất Dậu",
              "binh-tuat"  =>"Bính Tuất",
              "dinh-hoi"   =>"Đinh Hợi",
              "mau-ty"     =>"Mậu Tý",
              "ky-suu"     =>"Kỷ Sửu",
            );
            if (empty($input)) {
              return $arr;
            }
            if (is_int($input)) {
              $arr = array_flip($arr);
              if (!array_key_exists($input, $arr)) {
                //dd($input);
                //redirect(base_url(),'location',301);
                return false;
              }
              return $arr[$input];
            }
            if (!array_key_exists($input, $arr)) {
                redirect(base_url(),'location',301);
            }
            return $arr[$input];
        }
    }


    if (!function_exists('list_age_text')) {
        function list_age_text($input = null){
            $arr = array(
              "canh-dan"=>"1950",
              "tan-mao"=>"1951",
              "nham-thin"=>"1952",
              "quy-ty"=>"1953",
              "giap-ngo"=>"1954",
              "at-mui"=>"1955",
              "binh-than"=>"1956",
              "dinh-dau"=>"1957",
              "mau-tuat"=>"1958",
              "ky-hoi"=>"1959",
              "canh-ty"=>"1960",
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
              "tan-ty"=>"2001",
              "nham-ngo"=>"2002",
              "quy-mui"=>"2003",
              "giap-than"=>"2004",
              "at-dau"=>"2005",
              "binh-tuat"=>"2006",
              "dinh-hoi"=>"2007",
              "mau-ty"=>"2008",
              "ky-suu"=>"2009",
            );
            if (empty($input)) {
              return $arr;
            }
            if (is_int($input)) {
              $arr = array_flip($arr);
              
              if($input < 1950){
                $input = $input + 60;
              }elseif($input > 2009){
                $input = $input - 60;
              }

              if (!array_key_exists($input, $arr)) {
                //redirect(base_url(),'location',301);
                return false;
              }
              return $arr[$input];
            }
            if (!array_key_exists($input, $arr)) {
                redirect(base_url(),'location',301);
            }
            return $arr[$input];
        }
    }

 if (!function_exists('list_age_text_47_06')) {
        function list_age_text_47_06($input = null){
            $arr = array(
              "dinh-hoi"=>"1947",
              "mau-ty"=>"1948",
              "ky-suu"=>"1949",
              "canh-dan"=>"1950",
              "tan-mao"=>"1951",
              "nham-thin"=>"1952",
              "quy-ty"=>"1953",
              "giap-ngo"=>"1954",
              "at-mui"=>"1955",
              "binh-than"=>"1956",
              "dinh-dau"=>"1957",
              "mau-tuat"=>"1958",
              "ky-hoi"=>"1959",
              "canh-ty"=>"1960",
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
              "tan-ty"=>"2001",
              "nham-ngo"=>"2002",
              "quy-mui"=>"2003",
              "giap-than"=>"2004",
              "at-dau"=>"2005",
              "binh-tuat"=>"2006",
            );
            if (empty($input)) {
              return $arr;
            }
            if (is_int($input)) {
              $arr = array_flip($arr);
              if (!array_key_exists($input, $arr)) {
                //dd($input);
                //redirect(base_url(),'location',301);
                return false;
              }
              return $arr[$input];
            }
            if (!array_key_exists($input, $arr)) {
                redirect(base_url(),'location',301);
            }
            return $arr[$input];
        }
    }

    if(!function_exists('replace_number_oneoneone')){
        function replace_number_oneoneone($diem = null){
            switch ($diem) {
                case 0:
                    return '<label class="color_black">KHẮC</label>';
                    break;
                case 1:
                    return '<label class="color_green">BÌNH HÒA</label>';
                    break;
                case 2:
                    return '<label class="color_red">HỢP</label>';
                    break;
                
                default:
                    return '<label class="color_red">HỢP</label>';
                    break;
            }
        }
    }

    if (!function_exists('get_name_class')) {
        function get_name_class()
        {
            $CI =& get_instance();
            return $CI->router->fetch_class();
        }
    }
    if (!function_exists('get_name_method')) {
        function get_name_method($position = null)
        {
            $CI =& get_instance();
            return $CI->router->fetch_method();
        }
    }

    if (!function_exists('get_name_cung_tuvi')) {
        function get_name_cung_tuvi($param = null){
            $cung_text    = array(
                '1' => 'Luận về con người',
                '2' => 'Luận về cha mẹ',
                '3' => 'Luận về họ hàng',
                '4' => 'Luận về nhà đất',
                '5' => 'Luận về công danh',
                '6' => 'Luận về bạn bè',
                '7' => 'Luận về xuất hành',
                '8' => 'Luận về bệnh tật',
                '9' => 'Luận về tiền bạc',
                '10'=> 'Luận về con cái',
                '11'=> 'Luận về vợ chồng',
                '12'=> 'Luận về anh chị em'
            );
            if (array_key_exists($param, $cung_text)) {
                return $cung_text[$param];
            }
            return null;
        }
    }

    if (!function_exists('filter_block_out_ads')) {
        function filter_block_out_ads()
        {
            $nameClass = get_name_class();
            $nameMethod = get_name_method();
            // $arrClassBlock = array(
            //     'xemboi',
            //     'xemphongthuy',
            //     'cachtinhsimphongthuy'
            // );
            // $arrMethodBlock = array(
            //     'xemboisim',
            //     'xemsimhoptuoi',
            //     'timsimsodep',
            //     'boisimtheokinhdich',
            //     'index'
            // );
            $class_method = $nameClass.'/'.$nameMethod;
            $arr_block = array(
                'xemboi/xemboisim',
                'xemphongthuy/boisimtheokinhdich',
                'xemphongthuy/xemsimhoptuoi',
                'xemphongthuy/timsimsodep',
                'cachtinhsimphongthuy/index'
            );
            // Neu nam trong danh sach bi chan
            if (in_array($class_method, $arr_block)) {
                return false;
            }
            return true;
        }
    }

    if(!function_exists('get_action')){
        function get_action($input = null){
            $CI = &get_instance();
            echo '<section class="fixed_left">ObJect : <b>'.$CI->router->fetch_class().'</b><br>';
            echo 'Method : <b>'.$CI->router->fetch_method().'</b><br>';
            echo 'View : <b>'.$input['view'].'</b><br></section>';
        }
    }

    if (!function_exists('tinhCanLuongThangSinh')) {
        function tinhCanLuongThangSinh($thangsinh){
            $arr = array(
                1   =>'0,6',
                2   =>'0,7',
                3   =>'1,8',
                4   =>'0,9',
                5   =>'0,5',
                6   =>'1,6',
                7   =>'0,9',
                8   =>'1,5',
                9   =>'1,8',
                10   =>'1,8',
                11   =>'0,9',
                12   =>'0,5',
            );
            return $arr[$thangsinh];
        }
    }

    if (!function_exists('tinhCanLuongNgaySinh')) {
        function tinhCanLuongNgaySinh($ngaysinh){
            $arr = array(
                1   =>'0,5',
                2   =>'1,0',
                3   =>'0,8',
                4   =>'1,5',
                5   =>'1,6',
                6   =>'1,5',
                7   =>'0,8',
                8   =>'1,6',
                9   =>'0,8',
                10   =>'1,6',
                11   =>'0,9',
                12   =>'1,7',
                13   =>'0,8',
                14   =>'1,7',
                15   =>'1,0',
                16   =>'0,8',
                17   =>'0,9',
                18   =>'1,8',
                19   =>'0,5',
                20   =>'1,5',
                21   =>'1,0',
                22   =>'0,9',
                23   =>'0,8',
                24   =>'0,9',
                25   =>'1,5',
                26   =>'1,8',
                27   =>'0,7',
                28   =>'0,8',
                29   =>'1,6',
                30   =>'0,6',
            );
            return $arr[$ngaysinh];
        }
    }

    if (!function_exists('tinhCanLuongGioSinh')) {
        function tinhCanLuongGioSinh($giosinh){
            $arr = array(
                2   =>'0,6',
                4   =>'0,7',
                6   =>'1,8',
                8   =>'0,9',
                10   =>'0,5',
                12   =>'1,6',
                14   =>'0,9',
                16   =>'1,5',
                18   =>'1,8',
                20   =>'1,8',
                22   =>'0,9',
                24   =>'0,5',
            );
            return $arr[$giosinh];
        }
    }

    if (!function_exists('list_gio_sinh_operator')) {
        function list_gio_sinh_operator($giosinh = null){
            $arr = array(
                1   =>'Tí (23g - 1g)',
                2   =>'Sửu (1g - 3g)',
                3   =>'Dần (3g - 5g)',
                4   =>'Mão (5g - 7g)',
                5   =>'Thìn (7g - 9g)',
                6   =>'Tị (9g - 11g)',
                7   =>'Ngọ (11g - 13g)',
                8   =>'Mùi (13g - 15g)',
                9   =>'Thân (15g - 17g)',
                10   =>'Dậu (17g - 19g)',
                11   =>'Tuất (19g - 21g)',
                12   =>'Hợi (21g - 23g)',
            );
            if ($giosinh) {
                if (array_key_exists($giosinh, $arr)) {
                    return $arr[$giosinh];
                }
            }
            return $arr;
        }
    }

    if(!function_exists('get_status')){
        function get_status($input = null){
            $arr = array(
                'publish'   => 'Đã đăng',
                'pending'   => 'Chờ xét duyệt',
                // 'destroy'   => 'Phá hủy(xóa hoàn toàn)',
            );
            if ($input) {
                return $arr[$input];
            }
            return $arr;
        }
    }

    if(!function_exists('report_for_time')){
        function report_for_time($timeSecondFrom, $timeSecondTo){
            $timeReportSecond = ($timeSecondTo - $timeSecondFrom) / 60;
            $timeReportHour = ($timeSecondTo - $timeSecondFrom) / (60 * 60);
            $timeReportDay = ($timeSecondTo - $timeSecondFrom) / (60 * 60 * 24);

            if ($timeReportSecond <= 60) {
                return round($timeReportSecond).' phút';
            }
            if ($timeReportSecond > 60 and $timeReportHour <= 24 ) {
                return round($timeReportHour).' giờ';
            }
            return round($timeReportDay).' ngày';
        }
    }

    if(!function_exists('get_birth_by_menh')){ 
        function get_birth_by_menh($pMenh){
            $arrMenh = array(
                'kim' => array(
                    1954, 1955, 1962, 1963, 1970, 1971, 1984, 1985, 1992, 1993, 2000, 2001, 2014, 2015
                ),
                'moc' => array(
                    1950, 1951, 1958, 1959, 1972, 1973, 1980, 1981, 1988, 1989, 2002, 2003, 2010, 2011, 2018
                ),
                'thuy' => array(
                    1952, 1953, 1966, 1967, 1974, 1975, 1982, 1983, 1996, 1997, 2004, 2005, 2012, 2013
                ),
                'hoa' => array(
                    1956, 1957, 1964, 1965, 1978, 1979, 1986, 1987, 1994, 1995, 2008, 2009, 2016, 2017
                ),
                'tho' => array(
                    1960, 1961, 1968, 1969, 1976, 1977, 1990, 1991, 1998, 1999, 2006, 2007
                )
            );
            return $arrMenh[$pMenh];
        }
    }

    if(!function_exists('namsinh_uutien')){ 
        function namsinh_uutien(){
            $arr = array(
                            1990,
                            1991,
                            1992,
                            1993,
                            1994,
                            1995,
                            1996,
                            1997,
                            1998,
                            1999,

                            1980,
                            1981,
                            1982,
                            1983,
                            1984,
                            1985,
                            1986,
                            1987,
                            1988,
                            1989,

                            1970,
                            1971,
                            1972,
                            1973,
                            1974,
                            1975,
                            1976,
                            1977,
                            1978,
                            1979,

                            1960,
                            1961,
                            1962,
                            1963,
                            1964,
                            1965,
                            1966,
                            1967,
                            1968,
                            1969,

                            1950,
                            1951,
                            1952,
                            1953,
                            1954,
                            1955,
                            1956,
                            1957,
                            1958,
                            1959,

                            2000,
                            2001,
                            2002,
                            2003,
                            2004,
                            2005,
                            2006,
                            2007,
                            2008,
                            2009,

                            2010,
                            2011,
                            2012,
                            2013,
                            2014,
                            2015,
                            2016,
                            2017,
                            2018,
                            2019,
                        );
            return $arr;
        }
    }



    if(!function_exists('namsinh_menh')){ 
        function namsinh_menh($ns = null){
            $arr = array(
                    1950 => 'Tùng Bách Mộc',
                    1951 => 'Tùng Bách Mộc',
                    1952 => 'Trường Lưu Thủy',
                    1953 => 'Trường Lưu Thủy',
                    1954 => 'Sa Trung Kim',
                    1955 => 'Sa Trung Kim',
                    1956 => 'Sơn Hạ Hỏa',
                    1957 => 'Sơn Hạ Hỏa',
                    1958 => 'Bình Địa Mộc',
                    1959 => 'Bình Địa Mộc',

                    1960 => 'Bích Thượng Thổ',
                    1961 => 'Bích Thượng Thổ',
                    1962 => 'Kim Bạch Kim',
                    1963 => 'Kim Bạch Kim',
                    1964 => 'Phú Đăng Hỏa',
                    1965 => 'Phú Đăng Hỏa',
                    1966 => 'Thiên Hà Thủy',
                    1967 => 'Thiên Hà Thủy',
                    1968 => 'Đại Trạch Thổ',
                    1969 => 'Đại Trạch Thổ',

                    1970 => 'Thoa Xuyến Kim',
                    1971 => 'Thoa Xuyến Kim',
                    1972 => 'Tang Đố Mộc',
                    1973 => 'Tang Đố Mộc',
                    1974 => 'Đại Khe Thủy',
                    1975 => 'Đại Khe Thủy',
                    1976 => 'Sa Trung Thổ',
                    1977 => 'Sa Trung Thổ',
                    1978 => 'Thiên Thượng Hỏa',
                    1979 => 'Thiên Thượng Hỏa',

                    1980 => 'Thạch Lựu Mộc',
                    1981 => 'Thạch Lựu Mộc',
                    1982 => 'Đại Hải Thủy',
                    1983 => 'Đại Hải Thủy',
                    1984 => 'Hải Trung Kim',
                    1985 => 'Hải Trung Kim',
                    1986 => 'Lư Trung Hỏa',
                    1987 => 'Lư Trung Hỏa',
                    1988 => 'Đại Lâm Mộc',
                    1989 => 'Đại Lâm Mộc',

                    1990 => 'Lộ Bàng Thổ',
                    1991 => 'Lộ Bàng Thổ',
                    1992 => 'Kiếm Phong Kim',
                    1993 => 'Kiếm Phong Kim',
                    1994 => 'Sơn Đầu Hỏa',
                    1995 => 'Sơn Đầu Hỏa',
                    1996 => 'Giảm Hạ Thủy',
                    1997 => 'Giảm Hạ Thủy',
                    1998 => 'Thành Đầu Thổ',
                    1999 => 'Thành Đầu Thổ',

                    2000 => 'Bạch Lạp Kim',
                    2001 => 'Bạch Lạp Kim',
                    2002 => 'Dương Liễu Mộc',
                    2003 => 'Dương Liễu Mộc',
                    2004 => 'Tuyền Trung Thủy',
                    2005 => 'Tuyền Trung Thủy',
                    2006 => 'Ốc Thượng Thổ',
                    2007 => 'Ốc Thượng Thổ',
                    2008 => 'Thích Lịch Hỏa',
                    2009 => 'Thích Lịch Hỏa',

                    2010 => 'Tùng Bách Mộc',
                    2011 => 'Tùng Bách Mộc',
                    2012 => 'Trường Lưu Thủy',
                    2013 => 'Trường Lưu Thủy',
                    2014 => 'Sa Trung Kim',
                    2015 => 'Sa Trung Kim',
                    2016 => 'Sơn Hạ Hỏa',
                    2017 => 'Sơn Hạ Hỏa',
                    2018 => 'Bình Địa Mộc',
                    2019 => 'Bình Địa Mộc',

            );

            if (is_numeric($ns) && $ns >= 1950 && $ns <= 2019) {
                return $arr[$ns];
            }elseif ($ns != null) {
                return $arr[$ns];
            }
            return $arr;
        }
    }


    if(!function_exists('namsinh_menh_nghia')){ 
        function namsinh_menh_nghia($ns = null){
            $arr = array(
                        1950 => 'Gỗ tùng bách',
                        1951 => 'Gỗ tùng bách',
                        1952 => 'Nước chảy mạnh',
                        1953 => 'Nước chảy mạnh',
                        1954 => 'Vàng trong cát',
                        1955 => 'Vàng trong cát',
                        1956 => 'Lửa trên núi',
                        1957 => 'Lửa trên núi',
                        1958 => 'Gỗ đồng bằng',
                        1959 => 'Gỗ đồng bằng',

                        1960 => 'Đất tò vò',
                        1961 => 'Đất tò vò',
                        1962 => 'Vàng pha bạc',
                        1963 => 'Vàng pha bạc',
                        1964 => 'Lửa đèn to',
                        1965 => 'Lửa đèn to',
                        1966 => 'Nước trên trời',
                        1967 => 'Nước trên trời',
                        1968 => 'Đất nền nhà',
                        1969 => 'Đất nền nhà',

                        1970 => 'Vàng trang sức',
                        1971 => 'Vàng trang sức',
                        1972 => 'Gỗ cây dâu',
                        1973 => 'Gỗ cây dâu',
                        1974 => 'Nước khe lớn',
                        1975 => 'Nước khe lớn',
                        1976 => 'Đất pha cát',
                        1977 => 'Đất pha cát',
                        1978 => 'Lửa trên trời',
                        1979 => 'Lửa trên trời',

                        1980 => 'Gỗ cây lựu',
                        1981 => 'Gỗ cây lựu',
                        1982 => 'Nước biển lớn',
                        1983 => 'Nước biển lớn',
                        1984 => 'Vàng trong biển',
                        1985 => 'Vàng trong biển',
                        1986 => 'Lửa trong lò',
                        1987 => 'Lửa trong lò',
                        1988 => 'Gỗ rừng già',
                        1989 => 'Gỗ rừng già',

                        1990 => 'Đất ven đường',
                        1991 => 'Đất ven đường',
                        1992 => 'Vàng mũi kiếm',
                        1993 => 'Vàng mũi kiếm',
                        1994 => 'Lửa trên núi',
                        1995 => 'Lửa trên núi',
                        1996 => 'Nước cuối khe',
                        1997 => 'Nước cuối khe',
                        1998 => 'Đất trên thành',
                        1999 => 'Đất trên thành',

                        2000 => 'Vàng chân đèn',
                        2001 => 'Vàng chân đèn',
                        2002 => 'Gỗ cây dương',
                        2003 => 'Gỗ cây dương',
                        2004 => 'Nước trong suối',
                        2005 => 'Nước trong suối',
                        2006 => 'Đất nóc nhà',
                        2007 => 'Đất nóc nhà',
                        2008 => 'Lửa sấm sét',
                        2009 => 'Lửa sấm sét',

                        2010 => 'Gỗ tùng bách',
                        2011 => 'Gỗ tùng bách',
                        2012 => 'Nước chảy mạnh',
                        2013 => 'Nước chảy mạnh',
                        2014 => 'Vàng trong cát',
                        2015 => 'Vàng trong cát',
                        2016 => 'Lửa trên núi',
                        2017 => 'Lửa trên núi',
                        2018 => 'Gỗ đồng bằng',
                        2019 => 'Gỗ đồng bằng',
                    );

            if (is_numeric($ns) && $ns >= 1950 && $ns <= 2019) {
                return $arr[$ns];
            }elseif ($ns != null) {
                return $arr[$ns];
            }
            return $arr;
        }
    }

    if ( ! function_exists('nguhanh_text'))
    {
        function nguhanh_text($number)
        {
            $mang = array(
                           1 => 'Kim',
                           2 => 'Mộc',
                           3 => 'Thủy',
                           4 => 'Hỏa',
                           5 => 'Thổ',
                         );
            return $mang[$number];             
        }
    }
    if ( ! function_exists('nguhanh_slug'))
    {
        function nguhanh_slug($number)
        {
            $mang = array(
                           1 => 'kim',
                           2 => 'moc',
                           3 => 'thuy',
                           4 => 'hoa',
                           5 => 'tho',
                         );
            return $mang[$number];             
        }
    }

    //ngu hanh than chu sinh ngu hanh sim
    if( !function_exists( 'nguhanhtuongsinh' ) ){ 
        function nguhanhtuongsinh($menh_than_chu){
            $array = array(
                            '1' =>5,
                            '2'=>3,
                            '3'=>1,
                            '4'=>2,
                            '5'=>4,
                        );
            return $array[$menh_than_chu];              
        }
    }

    if( !function_exists( 'show_link_tv2019' ) ){ 
        function show_link_tv2019(){
            return base_url('xem-tu-vi-nam-2019-cua-12-con-giap.html');          
        }
    }

    /**
     *  add internal link after tool
     *
     *  @param int style select by tool
     *  @access public
     *  @return string
     */ 
    if( !function_exists( 'show_internal_link' ) ){ 
        function show_internal_link($style = null){
            $temStyle1 = '<section class="cpnInternalLink">
                        <a class="cst" href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'">GIEO QUẺ ĐẦU NĂM 2020</a>
                    </section>';
            $temStyle2 = '<section class="cpnInternalLink">
                        <a href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'">XEM BÓI NĂM 2020</a>
                    </section>';
            $temStyle3 = '<section class="cpnInternalLink">
                        <a class="cst" href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'">XEM BÓI NĂM 2020</a>
                    </section>';
            $temStyle4 = '<section class="cpnInternalLink">
                        <a class="md_nut_bam nut_ban_repon" href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'" >XEM BÓI TÌNH YÊU NĂM 2020</a>
                        <a class="md_nut_bam nut_ban_repon" href="'.base_url('xem-boi-so-dien-thoai.html').'" style="width:48%">Bói SĐT 2020</a>
                    </section>';
            $temStyle5 = '<section class="cpnInternalLink">
                        <a class="md_nut_bam nut_ban_repon" href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'" >XEM THỜI VẬN NĂM 2020</a>
                        <a class="md_nut_bam nut_ban_repon" href="'.base_url('xem-boi-so-dien-thoai.html').'" >BÓI SIM</a>
                    </section>';
            switch ($style) {
                case 1:{
                    return $temStyle1;
                    break;
                }
                case 2:{
                    return $temStyle2;
                    break;
                }
                case 3:{
                    return $temStyle3;
                    break;
                }
                
                case 4:{
                    return $temStyle4;
                    break;
                }
                
                case 5:{
                    return $temStyle5;
                    break;
                }
                
                default:{
                    return $temStyle1;
                    break;
                }
            }         
        }
    }

    if( !function_exists( 'show_link_logo' ) ){ 
        function show_link_logo($style = null){
            return base_url('templates/site/images/icon/logo.jpg'); 
        }
    }

    if(!function_exists('xacdinh_menh')){ 
        function xacdinh_menh($namsinh){
            $arr = array(
                'kim' => array(
                    1954, 1955, 1962, 1963, 1970, 1971, 1984, 1985, 1992, 1993, 2000, 2001, 2014, 2015
                ),
                'moc' => array(
                    1950, 1951, 1958, 1959, 1972, 1973, 1980, 1981, 1988, 1989, 2002, 2003, 2010, 2011, 2018
                ),
                'thuy' => array(
                    1952, 1953, 1966, 1967, 1974, 1975, 1982, 1983, 1996, 1997, 2004, 2005, 2012, 2013
                ),
                'hoa' => array(
                    1956, 1957, 1964, 1965, 1978, 1979, 1986, 1987, 1994, 1995, 2008, 2009, 2016, 2017
                ),
                'tho' => array(
                    1960, 1961, 1968, 1969, 1976, 1977, 1990, 1991, 1998, 1999, 2006, 2007
                )
            );

            if (in_array($namsinh, $arr['kim'])) {
                return 1;
            }elseif(in_array($namsinh, $arr['moc'])) {
                return 2;
            }elseif(in_array($namsinh, $arr['thuy'])) {
                return 3;
            }elseif(in_array($namsinh, $arr['hoa'])) {
                return 4;
            }elseif(in_array($namsinh, $arr['tho'])) {
                return 5;
            }
            return 1;
        }
    }

    if (!function_exists('baiviet_tuvi2019')) {
        function baiviet_tuvi2019($namsinh = null, $gioitinh = null){
            $array = array(
                '1947' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-dinh-hoi-1947-nam-mang-A743.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-dinh-hoi-1947-nu-mang-A744.html'
                            ),
                '1948' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-mau-ty-1948-nam-mang-A745.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-mau-ty-1948-nu-mang-A746.html'
                                ),
                '1949' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-ky-suu-1949-nam-mang-A747.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-ky-suu-1949-nu-mang-A748.html'
                                ),
                '1950' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-canh-dan-1950-nam-mang-A749.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-canh-dan-1950-nu-mang-A750.html'
                                ),
                '1951' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-tan-mao-1951-nam-mang-A751.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-tan-mao-1951-nu-mang-A752.html'
                                ),
                '1952' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-nham-thin-1952-nam-mang-A753',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-nham-thin-1952-nu-mang-A754.html'
                                ),
                '1953' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-quy-ty-1953-nam-mang-A755.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-quy-ty-1953-nu-mang-A756.html'
                                ),
                '1954' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-giap-ngo-1954-nam-mang-A757.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-giap-ngo-1954-nu-mang-A758.html'
                                ),
                '1955' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-at-mui-1955-nam-mang-A759.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-at-mui-1955-nu-mang-A760.html'
                                ),
                '1956' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-binh-than-1956-nam-mang-A761.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-binh-than-1956-nu-mang-A762.html'
                                ),
                '1957' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-dinh-dau-1957-nam-mang-A763.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-dinh-dau-1957-nu-mang-A764.html'
                                ),
                '1958' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-mau-tuat-1958-nam-mang-A765.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-mau-tuat-1958-nu-mang-A766.html'
                                ),
                '1959' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-ky-hoi-1959-nam-mang-A767.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-ky-hoi-1959-nu-mang-A768.html'
                                ),
                '1960' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-canh-ty-1960-nam-mang-A769.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-canh-ty-1960-nu-mang-A770.html'
                                ),
                '1961' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-tan-suu-1961-nam-mang-A771.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-tan-suu-1961-nu-mang-A802.html'
                                ),
                '1962' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-nham-dan-1962-nam-mang-A772.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-nham-dan-1962-nu-mang-A773.html'
                                ),
                '1963' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-quy-mao-1963-nam-mang-A774.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-quy-mao-1963-nu-mang-A775.html'
                                ),
                '1964' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-giap-thin-1964-nam-mang-A776.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-giap-thin-1964-nu-mang-A777.html'
                                ),
                '1965' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-at-ty-1965-nam-mang-A778.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-at-ty-1965-nu-mang-A779.html'
                                ),
                '1966' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-binh-ngo-1966-nam-mang-A683.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-binh-ngo-1966-nu-mang-A684.html'
                                ),
                '1967' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-dinh-mui-1967-nam-mang-A685.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-dinh-mui-1967-nu-mang-A686.html'
                                ),
                '1968' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-mau-than-1968-nam-mang-A687.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-mau-than-1968-nu-mang-A688.html'
                                ),
                '1969' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-ky-dau-1969-nam-mang-A689.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-ky-dau-1969-nu-mang-A690.html'
                                ),
                '1970' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-canh-tuat-1970-nam-mang-A727.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-canh-tuat-1970-nu-mang-A728.html'
                                ),
                '1971' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-tan-hoi-1971-nam-mang-A691.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-tan-hoi-1971-nu-mang-A692.html'
                                ),
                '1972' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-nham-ty-1972-nam-mang-A729.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-nham-ty-1972-nu-mang-A730.html'
                                ),
                '1973' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-quy-suu-1973-nam-mang-A731.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-quy-suu-1973-nu-mang-A732.html'
                                ),
                '1974' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-giap-dan-1974-nam-mang-A693.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-giap-dan-1974-nu-mang-A694.html'
                                ),
                '1975' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-at-mao-1975-nam-mang-A695.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-at-mao-1975-nu-mang-A696.html'
                                ),
                '1976' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-binh-thin-1976-nam-mang-A725.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-binh-thin-1976-nu-mang-A726.html'
                                ),
                '1977' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-dinh-ty-1977-nam-mang-A733.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-dinh-ty-1977-nu-mang-A734.html'
                                ),
                '1978' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-mau-ngo-1978-nam-mang-A697.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-mau-ngo-1978-nu-mang-A698.html'
                                ),
                '1979' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-ky-mui-1979-nam-mang-A699.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-ky-mui-1979-nu-mang-A700.html'
                                ),
                '1980' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-canh-than-1980-nam-mang-A701.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-canh-than-1980-nu-mang-A702.html'
                                ),
                '1981' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-tan-dau-1981-nam-mang-A703.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-tan-dau-1981-nu-mang-A704.html'
                                ),
                '1982' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-nham-tuat-1982-nam-mang-A735.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-nham-tuat-1982-nu-mang-A736.html'
                                ),
                '1983' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-quy-hoi-1983-nam-mang-A705.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-quy-hoi-1983-nu-mang-A706.html'
                                ),
                '1984' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-giap-ty-1984-nam-mang-A737.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-giap-ty-1984-nu-mang-A738.html'
                                ),
                '1985' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-at-suu-1985-nam-mang-A707.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-at-suu-1985-nu-mang-A708.html'
                                ),
                '1986' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-binh-dan-1986-nam-mang-A709.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-binh-dan-1986-nu-mang-A710.html'
                                ),
                '1987' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-dinh-mao-1987-nam-mang-A711.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-dinh-mao-1987-nu-mang-A712.html'
                                ),
                '1988' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-mau-thin-1988-nam-mang-A723.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-mau-thin-1988-nu-mang-A724.html'
                                ),
                '1989' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-ky-ty-1989-nam-mang-A739.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-ky-ty-1989-nu-mang-A740.html'
                                ),
                '1990' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-canh-ngo-1990-nam-mang-A713.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-canh-ngo-1990-nu-mang-A714.html'
                                ),
                '1991' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-tan-mui-1991-nam-mang-A715.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-tan-mui-1991-nu-mang-A716.html'
                                ),
                '1992' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-nham-than-1992-nam-mang-A717.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-nham-than-1992-nu-mang-A718.html'
                                ),
                '1993' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-quy-dau-1993-nam-mang-A719.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-quy-dau-1993-nu-mang-A720.html'
                                ),
                '1994' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-giap-tuat-1994-nam-mang-A741.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-giap-tuat-1994-nu-mang-A742.html'
                                ),
                '1995' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-at-hoi-1995-nam-mang-A721.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-at-hoi-1995-nu-mang-A722.html'
                                ),
                '1996' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-binh-ty-1996-nam-mang-A780.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-binh-ty-1996-nu-mang-A781.html'
                                ),
                '1997' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-dinh-suu-1997-nam-mang-A782.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-dinh-suu-1997-nu-mang-A783.html'
                                ),
                '1998' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-mau-dan-1998-nam-mang-A784.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-mau-dan-1998-nu-mang-A785.html'
                                ),
                '1999' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-ky-mao-1999-nam-mang-A786.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-ky-mao-1999-nu-mang-A787.html'
                                ),
                '2000' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-canh-thin-2000-nam-mang-A788.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-canh-thin-2000-nu-mang-A789.html'
                                ),
                '2001' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-tan-ty-2001-nam-mang-A790.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-tan-ty-2001-nu-mang-A791.html'
                                ),
                '2002' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-nham-ngo-2002-nam-mang-A792.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-nham-ngo-2002-nu-mang-A793.html'
                                ),
                '2003' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-quy-mui-2003-nam-mang-A794.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-quy-mui-2003-nu-mang-A795.html'
                                ),
                '2004' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-giap-than-2004-nam-mang-A796.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-giap-than-2004-nu-mang-A797.html'
                                ),
                '2005' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-at-dau-2005-nam-mang-A798.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-at-dau-2005-nu-mang-A799.html'
                                ),
                '2006' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-tuoi-binh-tuat-2006-nam-mang-A800.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-tuoi-binh-tuat-2006-nu-mang-A801.html'
                                ),
                //2007 -> 2009 : k co link bai viet
                '2007' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-cua-12-con-giap.html'
                                ),
                '2008' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-cua-12-con-giap.html'
                                ),
                '2009' => array(
                                    'nam' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',
                                    'nu'  => 'xem-tu-vi-nam-2019-cua-12-con-giap.html'
                                ),
            );

            if ($namsinh != null && $gioitinh != null && isset($array[$namsinh][$gioitinh])) {
                return $array[$namsinh][$gioitinh];
            }elseif ($namsinh != null && isset($array[$namsinh])) {
                return $array[$namsinh];
            }
            return $array;
        }
    }


    if (!function_exists('toolListXemNgayTheoTuoi')) {
        function toolListXemNgayTheoTuoi($canchislug, $canchiint){
            $arr = array(
                    'xem-ngay-tot-tuoi-'.$canchislug             => 'Ngày tốt hợp tuổi '.$canchiint,
                    'xem-ngay-tot-xuat-hanh-tuoi-'.$canchislug   => 'Ngày tốt xuất hành hợp tuổi '.$canchiint,
                    'xem-ngay-tot-khai-truong-tuoi-'.$canchislug => 'Ngày tốt khai trương hợp tuổi '.$canchiint,
                    'xem-ngay-tot-mua-xe-tuoi-'.$canchislug      => 'Ngày tốt mua xe hợp tuổi '.$canchiint,
                    'xem-ngay-tot-cuoi-hoi-tuoi-'.$canchislug    => 'Ngày tốt cưới hỏi hợp tuổi '.$canchiint,
                    'xem-ngay-tot-mua-nha-tuoi-'.$canchislug     => 'Ngày tốt mua nhà hợp tuổi '.$canchiint,
                    'xem-ngay-tot-dong-tho-tuoi-'.$canchislug    => 'Ngày tốt động thổ hợp tuổi '.$canchiint,
                    'xem-ngay-tot-nhap-trach-tuoi-'.$canchislug  => 'Ngày tốt nhập trạch hợp tuổi '.$canchiint,
                    );
            return $arr;
        }
    }

    // data: lienquan + xemnhieunhat: xemngaytottheotuoi
    if (!function_exists('data_2box_ngaytotxau')) {
        function data_2box_ngaytotxau($canchislug, $canchiint, $canchitext, $menh,$namxem, $khoangnamsinh){
            $arr 
                = array(
                    1 => array(// 1950 -> 1969
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchiint => '#',       
                                        'Xem sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',      
                                        'Xem bói số điện thoại của mình' => 'xem-boi-so-dien-thoai.html',       
                                        'Tuổi '.$canchiint.' hợp với số nào?' => '#',       
                                        'Xem tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),  
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận hạn cuộc đời' => 'xem-la-so-tu-vi.html',       
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',
                                        'Xem bói con số may mắn' => '#',        
                                        'Xem ý nghĩa các con số' => '#',        
                                        'Xem tuổi làm nhà hợp tuổi '.$canchitext => 'xem-tuoi-lam-nha.html',        
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem sim hợp tuổi '.$canchiint => '#',      
                                        'Xem sim hợp mệnh '.nguhanh_text($menh) => '#',     
                                        'Xem bói sim điện thoại của mình' => 'xem-boi-so-dien-thoai.html',      
                                        'Tuổi '.$canchiint.' hợp với số nào?' => '#',     
                                        'Xem tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),  
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận hạn cuộc đời' => 'xem-la-so-tu-vi.html',       
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Tuổi '.$canchitext.' làm nhà năm nào tốt' => 'xem-tuoi-lam-nha.html',      
                                        'Tuổi '.$canchitext.' mua nhà năm nào tốt' => 'xem-tuoi-mua-nha.html',      
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem số điện thoại hợp tuổi '.$canchiint => '#',        
                                        'Xem sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',      
                                        'Xem phong thủy số điện thoại' => 'xem-boi-so-dien-thoai.html',     
                                        'Tuổi '.$canchitext.' hợp với số nào?' => '#',      
                                        'Tử vi năm 2019 tuổi '.$canchitext.' '.$canchiint => baiviet_tuvi2019($canchiint, 'nam'),       
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận hạn cuộc đời' => 'xem-la-so-tu-vi.html',       
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Tuổi '.$canchitext.' mua nhà năm nào tốt' => 'xem-tuoi-mua-nha.html',      
                                        'Xem bói thời vận ngày hôm tuổi '.$canchitext => 'xem-boi-bai-thoi-van.html',   
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem số điện thoại hợp tuổi '.$canchiint => '#',        
                                        'Xem sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',      
                                        'Xem phong thủy số điện thoại' => 'xem-boi-so-dien-thoai.html',     
                                        'Tuổi '.$canchiint.' hợp với số nào?' => '#',       
                                        'Tử vi năm 2019 tuổi '.$canchitext.' '.$canchiint => baiviet_tuvi2019($canchiint, 'nam'),       
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận hạn cuộc đời' => 'xem-la-so-tu-vi.html',       
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Xem bói tình yêu tuổi '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html', 
                                        'Xem bói ngày hôm nay tốt hay xấu với tuổi '.$canchitext => 'boi-bai-hang-ngay.html',   
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem số điện thoại hợp với tuổi '.$canchitext => '#',
                                        'Xem sim số phong thủy hợp mệnh '.nguhanh_text($menh) => '#',       
                                        'Xem phong thủy sim số điện thoại' => 'xem-boi-so-dien-thoai.html',     
                                        'Tuổi '.$canchiint.' hợp với số nào?' => '#',       
                                        'Xem tử vi '.$canchitext.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),         
                                    ),
                                'xemnhieu' => array(
                                        'Xem bói tình yêu tuổi '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem bói ngày hôm nay tốt hay xấu với tuổi '.$canchitext => 'boi-bai-hang-ngay.html',       
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tuổi '.$canchitext.' hợp với tuổi nào?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',     
                                        'Tuổi '.$canchitext.' kết hôn với tuổi nào thì hợp?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',     
                                    )
                            )
                );
            return $arr[$khoangnamsinh];
        }
    }

    // data: lienquan + xemnhieunhat: xemngay xuahanh theotuoi
    if (!function_exists('data_2box_xuathanh')) {
        function data_2box_xuathanh($canchislug, $canchiint, $canchitext, $menh, $namxem, $khoangnamsinh){
            $arr 
                = array(
                    1 => array(// 1950 -> 1969
                                'lienquan' => array(
                                        'Xem số điện thoại hợp tuổi '.$canchitext.' '.$canchiint => '#',       
                                        'Xem số phong thủy hợp mệnh '.nguhanh_text($menh) => '#',      
                                        'Xem phong thủy sim của bạn' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem vận hạn tuổi '.$canchitext.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Xem tử vi năm 2019 tuổi '.$canchitext => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',  
                                    ),
                                'xemnhieu' => array(
                                        'Xem giờ hoàng đạo hợp tuổi '.$canchitext => '#',       
                                        'Xem lá số tử vi nắm bắt vận hạn cuộc đời' => 'xem-la-so-tu-vi.html',
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Như thế nào là sim hợp làm ăn' => '#',        
                                        'Xem tuổi mua nhà cho 12 con giáp' => 'xem-tuoi-mua-nha.html',        
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem sim hợp tuổi '.$canchiint => '#',      
                                        'Xem sim hợp mệnh '.nguhanh_text($menh) => '#',     
                                        'Xem bói sim điện thoại của mình' => 'xem-boi-so-dien-thoai.html',      
                                        'Tuổi '.$canchiint.' hợp với số nào?' => '#',     
                                        'Xem tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),  
                                    ),
                                'xemnhieu' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchiint => '#',       
                                        'Xem sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',
                                        'Tra cứu sim phong thủy' => 'xem-boi-so-dien-thoai.html',     
                                        'Xem vận mệnh năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html' => 'Mệnh '.nguhanh_text($menh).' hợp với màu gì',      
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp với tuổi '.$canchiint => '#',        
                                        'Xem sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',      
                                        'Xem sim hợp phong thủy cho mình' => 'xem-boi-so-dien-thoai.html',     
                                        'Xem bói năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Mệnh '.nguhanh_text($menh).' hợp với màu gì' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem giờ hoàng đạo hợp tuổi '.$canchitext => '#',       
                                        'Xem lá số tử vi nắm bắt vận hạn cuộc đời' => 'xem-la-so-tu-vi.html',     
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',      
                                        'Như thế nào là sim hợp làm ăn' => '#',   
                                        'Xem tuổi làm ăn của 12 con giáp' => 'xem-tuoi-lam-an.html',        
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem bói sim phong thủy hợp tuổi '.$canchiint => '#',  
                                        'Xem bói sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#', 
                                        'Xem ý nghĩa sim phong thủy' => 'xem-boi-so-dien-thoai.html',    
                                        'Xem tử vi 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),   
                                        'Mệnh '.nguhanh_text($menh).' hợp với màu gì' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',          
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận hạn cuộc đời' => 'xem-la-so-tu-vi.html',      
                                        'Xem tuổi sinh con hợp tuổi '.$canchitext => 'xem-tuoi-sinh-con.html',        
                                        'Xem tuổi vợ chồng hợp tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',      
                                        'Xem bói tình yêu theo ngày tháng năm sinh' => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem sim hợp tuổi '.$canchiint => '#',
                                        'Xem sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',
                                        'Xem bói số điện thoại của mình' => 'xem-boi-so-dien-thoai.html', 
                                        'Xem tuổi '.$canchitext.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'), 
                                        'Mệnh '.nguhanh_text($menh).' hợp với màu gì' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',      
                                    ),
                                'xemnhieu' => array(
                                        'Xem bói tình yêu tuổi '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem bói ngày hôm nay tốt hay xấu với tuổi '.$canchitext => 'boi-bai-hang-ngay.html',     
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tuổi '.$canchitext.' hợp với tuổi nào?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tuổi '.$canchitext.' kết hôn với tuổi nào thì hợp?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',        
                                    )
                            )
                );
            return $arr[$khoangnamsinh];
        }
    }

    // data: lienquan + xemnhieunhat: xemngay cuoihoi theotuoi
    if (!function_exists('data_2box_ngaykethon')) {
        function data_2box_ngaykethon($canchislug, $canchiint, $canchitext, $menh, $namxem, $khoangnamsinh){
            $arr 
                = array(
                    1 => array(// 1950 -> 1969
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchitext.' '.$canchiint => '#',      
                                        'Xem bói số điện thoại hợp mệnh '.nguhanh_text($menh) => '#',      
                                        'Xem tuổi kết hôn của 12 con giáp' => 'xem-tuoi-ket-hon.html',      
                                        'Xem tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Mệnh '.nguhanh_text($menh).' hợp với màu gì' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',     
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận hạn cuộc đời' => 'xem-la-so-tu-vi.html',      
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem tuổi làm ăn của 12 con giáp' => 'xem-tuoi-lam-an.html',       
                                        'Xem tuổi làm nhà cho 12 con giáp' => 'xem-tuoi-lam-nha.html',      
                                        'Xem giờ hoàng đạo hợp tuổi '.$canchitext => '#',        
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem số điện thoại hợp tuổi '.$canchitext.' '.$canchiint => '#',
                                        'Xem số điện thoại hợp mệnh '.nguhanh_text($menh) => '#',
                                        'Xem tuổi hợp kết hôn của 12 con giáp' => 'xem-tuoi-ket-hon.html',
                                        'Xem tử vi tuổi '.$canchitext.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận hạn cuộc đời' => 'xem-la-so-tu-vi.html',     
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem tuổi mua nhà hợp tuổi '.$canchitext => 'xem-tuoi-mua-nha.html',     
                                        'Xem tuổi làm nhà hợp tuổi '.$canchitext => 'xem-tuoi-lam-nha.html',     
                                        'Xem giờ hoàng đạo hợp tuổi '.$canchitext => '#',           
                                    )
                            ),
                    3 => array(//1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchiint => '#',      
                                        'Xem sim hợp mệnh '.nguhanh_text($menh) => '#',        
                                        'Xem bói số điện thoại tốt xấu' => 'xem-boi-so-dien-thoai.html',     
                                        'Xem tử vi '.$canchitext.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),        
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận hạn cuộc đời' => 'xem-la-so-tu-vi.html',      
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem tuổi vợ chồng hợp tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem tuổi mua nhà hợp tuổi '.$canchitext => 'xem-tuoi-mua-nha.html',     
                                        'Xem thời vận tuổi '.$canchitext => 'xem-boi-bai-thoi-van.html',     
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem bói sim phong thủy hợp tuổi '.$canchiint => '#',      
                                        'Xem sim số hợp mệnh '.nguhanh_text($menh) => '#',     
                                        'Xem số điện thoại phong thủy' => 'xem-boi-so-dien-thoai.html',      
                                        'Xem tử vi '.$canchitext.' 2019' => baiviet_tuvi2019($canchiint, 'nam'),        
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',        
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận hạn cuộc đời' => 'xem-la-so-tu-vi.html',      
                                        'Xem bói tình yêu của 2 người' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',      
                                        'Xem bói ngày hôm nay tốt hay xấu' => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',      
                                        'Xem tuổi vợ chồng hợp tuổi '.$canchitext => 'xem-tuoi-mua-nha.html',        
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-boi-bai-thoi-van.html',                     
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem số điện thoại hợp với tuổi '.$canchitext => '#',        
                                        'Xem sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',     
                                        'Xem bói số điện thoại theo phong thủy' => 'xem-boi-so-dien-thoai.html',     
                                        'Xem bói tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',      
                                    ),
                                'xemnhieu' => array(
                                        'Xem bói tình yêu tuổi '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',       
                                        'Xem bói bài hàng ngày' => 'boi-bai-hang-ngay.html',     
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tuổi '.$canchitext.' hợp với tuổi nào?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tuổi '.$canchitext.' kết hôn với tuổi nào thì hợp?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',            
                                    )
                            )
                );
            return $arr[$khoangnamsinh];
        }
    }

    // data: lienquan + xemnhieunhat: xemngay dongtho theotuoi
    if (!function_exists('data_2box_dongtho')) {
        function data_2box_dongtho($canchislug, $canchiint, $canchitext, $menh, $namxem, $khoangnamsinh){
            $arr 
                = array(
                    1 => array(// 1950 -> 1969
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchiint => '#', 
                                        'Xem sim hợp mệnh '.nguhanh_text($menh) => '#',
                                        'Xem bói số điện thoại của mình' => 'xem-boi-so-dien-thoai.html',
                                        'Xem bói tử vi tuổi '.$canchitext.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'), 
                                        'Tuổi '.$canchitext.' làm nhà năm '.$namxem.' có tốt không?' => 'xem-tuoi-lam-nha.html',
                                    ),
                                'xemnhieu' => array(
                                        'Xem ngày Hoàng Đạo hợp tuổi '.$canchitext => '#',     
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem ý nghĩa các con số' => '#',        
                                        'Xem số hợp tuổi '.$canchitext => '#',       
                                        'Xem lá số tử vi nắm bắt vận mệnh cuộc đời' => 'xem-la-so-tu-vi.html',         
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem số điện thoại hợp tuổi '.$canchiint => '#',  
                                        'Xem số điện thoại hợp mệnh '.nguhanh_text($menh) => '#',  
                                        'Xem bói sim điện thoại của mình' => 'xem-boi-so-dien-thoai.html',   
                                        'Xem bói tử vi 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),   
                                        'Tuổi '.$canchitext.' làm nhà năm '.$namxem.' có tốt không?' => 'xem-tuoi-lam-nha.html',    
                                    ),
                                'xemnhieu' => array(
                                        'Xem ngày Hoàng Đạo hợp tuổi '.$canchitext => '#',     
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem ý nghĩa các con số' => '#',        
                                        'Xem tuổi làm ăn hợp tuổi '.$canchitext => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',      
                                        'Xem lá số tử vi nắm bắt vận mệnh cuộc đời' => 'xem-la-so-tu-vi.html',       
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchitext.' '.$canchiint => '#',
                                        'Xem sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',
                                        'Xem bói số điện thoại tốt hay xấu' => 'xem-boi-so-dien-thoai.html',
                                        'Xem bói tử vi '.$canchitext.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'), 
                                        'Tuổi '.$canchitext.' làm nhà năm '.$namxem.' có tốt không?' => 'xem-tuoi-lam-nha.html',
                                    ),
                                'xemnhieu' => array(
                                        'Xem ngày Hoàng Đạo hợp tuổi '.$canchitext => '#',     
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem tuổi làm ăn hợp tuổi'.$canchitext => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',      
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem lá số tử vi nắm bắt vận mệnh cuộc đời' => 'xem-la-so-tu-vi.html',        
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem số điện thoại hợp tuổi '.$canchitext.' '.$canchiint => '#',
                                        'Xem bói sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',
                                        'Xem bói sim phong thủy' => 'xem-boi-so-dien-thoai.html',
                                        'Xem tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),
                                        'Tuổi '.$canchitext.' làm nhà năm '.$namxem.' có tốt không?' => 'xem-tuoi-lam-nha.html', 
                                    ),
                                'xemnhieu' => array(
                                        'Xem ngày Hoàng Đạo hợp tuổi '.$canchitext => '#',       
                                        'Xem tuổi vợ chồng hợp tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem bói tình yêu theo ngày sinh của 2 người' => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',       
                                        'Xem bói bài hàng ngày theo tuổi' => 'boi-bai-hang-ngay.html',       
                                        'Xem lá số tử vi nắm bắt vận mệnh cuộc đời' => 'xem-la-so-tu-vi.html',     
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem bói sim phong thủy hợp tuổi '.$canchiint => '#',
                                        'Xem sim số phong thủy hợp mệnh '.nguhanh_text($menh) => '#',
                                        'Xem bói sim hợp phong thủy' => 'xem-boi-so-dien-thoai.html',
                                        'Xem vận hạn tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),
                                        'Tuổi '.$canchitext.' làm nhà năm '.$namxem.' có tốt không?' => 'xem-tuoi-lam-nha.html',
                                    ),
                                'xemnhieu' => array(
                                        'Xem bói tình yêu tuổi '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem bói bài hàng ngày' => 'boi-bai-hang-ngay.html',     
                                        'Xem bói bài tình yêu' => 'xem-boi-bai-tinh-yeu.html',      
                                        'Tuổi '.$canchitext.' hợp với tuổi nào?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tuổi '.$canchitext.' kết hôn với tuổi nào thì hợp?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',              
                                    )
                            )
                );
            return $arr[$khoangnamsinh];
        }
    }
    
    // data: lienquan + xemnhieunhat: xemngay nhaptrach theotuoi
    if (!function_exists('data_2box_nhaptrachnhamoi')) {
        function data_2box_nhaptrachnhamoi($canchislug, $canchiint, $canchitext, $menh, $namxem, $khoangnamsinh){
            $arr 
                = array(
                    1 => array(// 1950 -> 1969
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchiint => '#',      
                                        'Xem số sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',      
                                        'Tra cứu phong thủy số điện thoại' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem vận mệnh tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tuổi '.$canchitext.' mua nhà năm 2019 có tốt không?' => 'xem-tuoi-mua-nha.html',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem ngày Hoàng Đạo hợp tuổi '.$canchitext => '#',       
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem lá số tử vi nắm bắt vận mệnh cuộc đời' => 'xem-la-so-tu-vi.html',     
                                        'Xem ý nghĩa con số theo phong thủy' => '#',        
                                        'Xem số hợp tuổi '.$canchitext => '#',             
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchiint => '#',      
                                        'Xem bói sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',     
                                        'Tra sim phong thủy số điện thoại' => 'xem-boi-so-dien-thoai.html',      
                                        'Xem vận mệnh năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),        
                                        'Xem số hợp tuổi '.$canchiint => '#',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận mệnh cuộc đời' => 'xem-la-so-tu-vi.html',      
                                        'Xem ý nghĩa con số theo phong thủy' => '#',        
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Tuổi '.$canchitext.' mua nhà năm nào tốt' => 'xem-tuoi-mua-nha.html',      
                                        'Xem ngày Hoàng Đạo hợp tuổi '.$canchitext => '#',            
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim số phong thủy hợp tuổi '.$canchiint => '#',       
                                        'Xem sim phong thủy hợp với mệnh '.nguhanh_text($menh) => '#',     
                                        'Kiểm tra sim phong thủy tốt hay xấu' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem vận mệnh tuổi '.$canchitext.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),        
                                        'Xem ngày Hoàng Đạo hợp tuổi '.$canchitext => '#',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận mệnh cuộc đời' => 'xem-la-so-tu-vi.html',       
                                        'Xem ý nghĩa con số theo phong thủy' => '#',        
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Xem tuổi vợ chồng hợp tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem số hợp tuổi '.$canchitext => '#',          
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem số điện thoại hợp tuổi '.$canchiint => '#',       
                                        'Xem bói số điện thoại hợp mệnh '.nguhanh_text($menh) => '#',      
                                        'Xem bói sim chính xác nhất' => 'xem-boi-so-dien-thoai.html',        
                                        'Xem vận hạn năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),     
                                        'Xem ngày Hoàng Đạo hợp tuổi '.$canchitext => '#',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi nắm bắt vận mệnh cuộc đời' => 'xem-la-so-tu-vi.html',     
                                        'Xem bói tình yêu tuổi '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Xem tuổi vợ chồng hợp tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem số hợp tuổi '.$canchitext => '#',      
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchitext.' '.$canchiint => '#',       
                                        'Xem sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',     
                                        'Xem bói số điện thoại của mình' => 'xem-boi-so-dien-thoai.html',        
                                        'Xem tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Xem ngày Hoàng Đạo hợp tuổi '.$canchitext => '#',         
                                    ),
                                'xemnhieu' => array(
                                        'Xem bói tình yêu tuổi '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem bói bài hàng ngày' => 'boi-bai-hang-ngay.html',     
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tuổi '.$canchitext.' hợp với tuổi nào?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tuổi '.$canchitext.' kết hôn với tuổi nào thì hợp?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',              
                                    )
                            )
                );
            return $arr[$khoangnamsinh];
        }
    }

    // data: lienquan + xemnhieunhat: xemngay muanha theotuoi
    if (!function_exists('data_2box_ngaymuanha')) {
        function data_2box_ngaymuanha($canchislug, $canchiint, $canchitext, $menh, $namxem, $khoangnamsinh){
            $arr 
                = array(
                    1 => array(// 1950 -> 1969
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchiint => '#',  
                                        'Xem sim phong thủy hợp mạng '.nguhanh_text($menh) => '#', 
                                        'Xem bói số điện thoại tốt xấu' => 'xem-boi-so-dien-thoai.html', 
                                        'Xem vận hạn tuổi '.$canchitext.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),     
                                        'Tuổi '.$canchitext.' mua nhà năm 2019 có tốt không?' => 'xem-tuoi-mua-nha/tuoi-'.$canchislug.'-mua-nha-nam-2019-co-tot-khong.html',   
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi' => 'xem-la-so-tu-vi.html',      
                                        'Tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem bói sim theo kinh dịch' => '#',        
                                        'Ý nghĩa con số theo phong thủy' => '#',        
                                        'Tuổi '.$canchitext.' hợp với số nào?' => '#',           
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp với tuổi '.$canchiint => '#',     
                                        'Xem bói sim phong thủy hợp mạng '.nguhanh_text($menh) => '#',     
                                        'Xem bói số điện thoại tốt hay xấu' => 'xem-boi-so-dien-thoai.html',     
                                        'Xem vận hạn '.$canchitext.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tuổi '.$canchitext.' mua nhà năm 2019 có tốt không?' => 'xem-tuoi-mua-nha/tuoi-'.$canchislug.'-mua-nha-nam-2019-co-tot-khong.html',        
                                    ),
                                'xemnhieu' => array(
                                        'Lá số tử vi có bình giải' => 'xem-la-so-tu-vi.html',        
                                        'Xem tử vi năm 2019' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem bói sim theo kinh dịch' => '#',        
                                        'Ý nghĩa con số theo phong thủy' => '#',        
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',       
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchitext.' '.$canchiint => '#',      
                                        'Xem sim phong thủy hợp với mạng '.nguhanh_text($menh) => '#',     
                                        'Xem bói sim điện thoại của mình' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Tuổi '.$canchitext.' mua nhà năm 2019 có tốt không?' => 'xem-tuoi-mua-nha/tuoi-'.$canchislug.'-mua-nha-nam-2019-co-tot-khong.html',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi' => 'xem-la-so-tu-vi.html',        
                                        'Bói tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Ý nghĩa con số theo phong thủy' => '#',        
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',       
                                        'Tuổi '.$canchitext.' hợp làm ăn tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',       
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem số điện thoại hợp tuổi '.$canchiint => '#',       
                                        'Xem số sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',      
                                        'Xem bói sim điện thoại tốt xấu' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem bói tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Tuổi '.$canchitext.' mua nhà năm 2019 có tốt không?' => 'xem-tuoi-mua-nha/tuoi-'.$canchislug.'-mua-nha-nam-2019-co-tot-khong.html',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi 12 con giáp' => 'xem-la-so-tu-vi.html',       
                                        'Xem bói bài hàng ngày' => 'boi-bai-hang-ngay.html',     
                                        'Xem bói tình yêu tuổi '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem sim số hợp tuổi '.$canchiint => '#',      
                                        'Xem sim phong thủy hợp mạng '.nguhanh_text($menh) => '#',     
                                        'Xem bói số điện thoại của mình' => 'xem-boi-so-dien-thoai.html',        
                                        'Xem vận hạn tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Tuổi '.$canchitext.' mua nhà năm 2019 có tốt không?' => 'xem-tuoi-mua-nha/tuoi-'.$canchislug.'-mua-nha-nam-2019-co-tot-khong.html',        
                                    ),
                                'xemnhieu' => array(
                                        'Xem bói tình yêu tuổi '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',        
                                        'Xem bói bài hàng ngày' => 'boi-bai-hang-ngay.html',     
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tuổi '.$canchitext.' hợp với tuổi nào?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tuổi '.$canchitext.' kết hôn với tuổi nào thì hợp?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',             
                                    )
                            )
                );
            return $arr[$khoangnamsinh];
        }
    }

    // data: lienquan + xemnhieunhat: xemngay muaxe theotuoi
    if (!function_exists('data_2box_ngaymuaxe')) {
        function data_2box_ngaymuaxe($canchislug, $canchiint, $canchitext, $menh, $namxem, $khoangnamsinh){
            $arr 
                = array(
                    1 => array(// 1950 -> 1969
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchitext.' '.$canchiint => '#', 
                                        'Xem sim số phong thủy hợp mệnh '.nguhanh_text($menh) => '#',  
                                        'Xem bói biển số xe hợp tuổi' => 'xem-boi-bien-so-xe.html',   
                                        'Xem tử vi  '.$canchitext.' '.$canchiint.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),  
                                        'Mệnh '.nguhanh_text($menh).' hợp với màu gì?' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',    
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi' => 'xem-la-so-tu-vi.html',     
                                        'Xem vận hạn năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',     
                                        'Xem bói sim theo kinh dịch' => '#',        
                                        'ý nghĩa con số theo phong thủy' => '#',        
                                        'Tuổi '.$canchitext.' hợp với số nào?' => '#',          
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchiint => '#',     
                                        'Xem bói sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',     
                                        'Xem bói biển số xe hợp tuổi' => 'xem-boi-bien-so-xe.html',       
                                        'Xem tử vi năm 2019 tuổi '.$canchitext.' '.$canchiint => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Mệnh '.nguhanh_text($menh).' hợp với màu gì?' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',        
                                    ),
                                'xemnhieu' => array(
                                        'Lá số tử vi' => 'xem-la-so-tu-vi.html',      
                                        'Xem tử vi 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'ý nghĩa con số theo phong thủy' => '#',        
                                        'Tuổi '.$canchitext.' hợp với số nào?' => '#',      
                                        'Xem tuổi làm ăn hợp tuổi '.$canchitext => '#',         
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim số phong thủy hợp tuổi '.$canchiint => '#',       
                                        'Xem số sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',      
                                        'Xem bói biển số xe hợp tuổi' => 'xem-boi-bien-so-xe.html',       
                                        'Xem tử vi tuổi '.$canchitext.' '.$canchiint.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Mệnh '.nguhanh_text($menh).' hợp với màu gì?' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',        
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi và bình giải' => 'xem-la-so-tu-vi.html',       
                                        'Ý nghĩa con số theo phong thủy' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Tuổi '.$canchitext.' hợp với số nào?' => '#',      
                                        'Xem tuổi làm ăn hợp tuổi '.$canchitext => '#',      
                                        'Xem tuổi vợ chồng hợp tuổi '.$canchitext => '#',          
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem số điện thoại hợp tuổi '.$canchiint => '#',       
                                        'Xem bói số điện thoại hợp mệnh '.nguhanh_text($menh) => '#',      
                                        'Xem bói biển số xe hợp tuổi' => 'xem-boi-bien-so-xe.html',       
                                        'Xem bói tuổi '.$canchitext.' '.$canchiint.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),        
                                        'Mệnh '.nguhanh_text($menh).' hợp với màu gì? ' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',       
                                    ),
                                'xemnhieu' => array(
                                        'ý nghĩa con số theo phong thủy' => '#',        
                                        'Tuổi '.$canchitext.' hợp với số nào?' => '#',      
                                        'Xem tuổi làm ăn hợp tuổi '.$canchitext => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',      
                                        'Xem tuổi vợ chồng hợp tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem bói tình yêu của 2 người theo ngày sinh' => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',       
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchiint => '#',     
                                        'Xem bói sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',     
                                        'Xem bói biển số xe hợp tuổi' => 'xem-boi-bien-so-xe.html',       
                                        'Xem tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Mệnh '.nguhanh_text($menh).' hợp với màu gì?' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',        
                                    ),
                                'xemnhieu' => array(
                                        'Xem bói tình yêu tuổi '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem bói bài hàng ngày' => 'boi-bai-hang-ngay.html',     
                                        'Xem bói bài tình yêu' => 'xem-boi-bai-tinh-yeu.html',      
                                        'Tuổi '.$canchitext.' hợp với tuổi nào?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tuổi '.$canchitext.' kết hôn với tuổi nào thì hợp?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',              
                                    )
                            )
                );
            return $arr[$khoangnamsinh];
        }
    }

    // data: lienquan + xemnhieunhat: xemngay khaitruong theotuoi
    if (!function_exists('data_2box_ngaykhaitruong')) {
        function data_2box_ngaykhaitruong($canchislug, $canchiint, $canchitext, $menh, $namxem, $khoangnamsinh){
            $arr 
                = array(
                    1 => array(// 1950 -> 1969
                                'lienquan' => array(
                                        'Xem bói sim phong thủy hợp tuổi '.$canchiint => '#',
                                        'Xem sim số hợp mệnh '.nguhanh_text($menh) => '#',
                                        'Chấm điểm số điện thoại theo tuổi' => 'xem-boi-so-dien-thoai.html',
                                        'Xem vận hạn tuổi '.$canchitext.' '.$canchiint.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi' => 'xem-la-so-tu-vi.html',    
                                        'Bói tử vi 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',       
                                        'Tuổi '.$canchitext.' hợp với tuổi nào?' => '#',       
                                        'Tuổi '.$canchitext.' hợp với số nào?' => '#',     
                                        'Ý nghĩa con số theo phong thủy' => '#',           
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem bói số điện thoại hợp tuổi '.$canchiint => '#',     
                                        'Xem sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',    
                                        'Xem bói qua số điện thoại của mình' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem vận mệnh tuổi '.$canchitext.' '.$canchiint.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',    
                                    ),
                                'xemnhieu' => array(
                                        'Lấy lá số tử vi' => 'xem-la-so-tu-vi.html',    
                                        'Xem tử vi năm 2019 của 12 con giáp' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',       
                                        'Tuổi '.$canchitext.' hợp với tuổi nào?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',       
                                        'Tuổi '.$canchitext.' hợp với số nào?' => '#',     
                                        'Xem sim hợp tuổi làm ăn' => '#',     
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem bói sim phong thủy hợp tuổi '.$canchitext.' '.$canchiint => '#',     
                                        'Xem số điện thoại hợp mệnh '.nguhanh_text($menh) => '#',     
                                        'Xem bói sim số điện thoại của mình' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',    
                                    ),
                                'xemnhieu' => array(
                                        'Xem lá số tử vi có bình giải' => 'xem-la-so-tu-vi.html',       
                                        'Tuổi '.$canchitext.' hợp với tuổi nào?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',       
                                        'Tuổi '.$canchitext.' hợp với số nào?' => '#',     
                                        'Xem sim hợp tuổi làm ăn' => '#',      
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',          
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem bói sim phong thủy hợp với tuổi '.$canchiint => '#',     
                                        'Xem bói sim phong thủy hợp mệnh '.nguhanh_text($menh) => '#',    
                                        'Xem bói sim số điện thoại tốt xấu' => 'xem-boi-so-dien-thoai.html',    
                                        'Xem tử vi tuổi '.$canchitext.' năm 2019' => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',    
                                    ),
                                'xemnhieu' => array(
                                        'Tuổi '.$canchitext.' hợp tuổi nào?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',       
                                        'Tuổi '.$canchitext.' hợp số nào?' => '#',     
                                        'Xem sim hợp tuổi làm ăn' => '#',      
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',       
                                        'Xem bói thời vận hàng ngày theo tuổi' => 'xem-boi-bai-thoi-van.html',     
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem sim phong thủy hợp tuổi '.$canchiint => '#',    
                                        'Xem bói số điện thoại hợp mệnh '.nguhanh_text($menh) => '#',     
                                        'Xem bói sim số điện thoại tốt hay xấu' => 'xem-boi-so-dien-thoai.html',    
                                        'Xem tử vi năm 2019 tuổi '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tuổi '.$canchitext.' hợp làm ăn với tuổi nào?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',    
                                    ),
                                'xemnhieu' => array(
                                        'Xem bói tình yêu tuổi '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',       
                                        'Xem bói ngày hôm nay tốt hay xấu với tuổi '.$canchitext => 'boi-bai-hang-ngay.html',    
                                        'Xem tuổi vợ chồng tuổi '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',       
                                        'Tuổi nào hợp với tuổi '.$canchitext.'?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',       
                                        'Tuổi '.$canchitext.' kết hôn với tuổi nào thì hợp?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchiint.'-1990-lay-vo-nam-nao-tot.html',             
                                    )
                            )
                );
            return $arr[$khoangnamsinh];
        }
    }
?>
