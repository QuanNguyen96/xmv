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
                'M???c'	=> 2,
                'Thu???'	=> 3,
                'Ho???'	=> 4,
                'Th???'	=> 5,
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
                'T??'    => 1,
                'S???u'   => 2,
                'D???n'   => 3,
                'M??o'   => 4,
                'Th??n'  => 5,
                'T???'    => 6,
                'Ng???'   => 7,
                'M??i'   => 8,
                'Th??n'  => 9,
                'D???u'   => 10,
                'Tu???t'  => 11,
                'H???i'   => 12
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
                'T??'    => 'T??',
                'S???u'   => 'S???u',
                'D???n'   => 'D???n',
                'M??o'   => 'M??o',
                'Th??n'  => 'Th??n',
                'T???'    => 'T???',
                'Ng???'   => 'Ng???',
                'M??i'   => 'M??i',
                'Th??n'  => 'Th??n',
                'D???u'   => 'D???u',
                'Tu???t'  => 'Tu???t',
                'H???i'   => 'H???i'
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
            return str_replace('T??','T??',$input);
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
                'Gi??p'  => 1,
                '???t'    => 2,
                'B??nh'  => 3,
                '??inh'  => 4,
                'M???u'   => 5,
                'K???'    => 6,
                'Canh'  => 7,
                'T??n'   => 8,
                'Nh??m'  => 9,
                'Qu??'   => 10,
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
                'Gi??p'  => 'giap',
                '???t'    => 'at',
                'B??nh'  => 'binh',
                '??inh'  => 'dinh',
                'M???u'   => 'mau',
                'K???'    => 'ky',
                'Canh'  => 'canh',
                'T??n'   => 'tan',
                'Nh??m'  => 'nham',
                'Qu??'   => 'quy',
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
                'T??'    => 'ty',
                'S???u'   => 'suu',
                'D???n'   => 'dan',
                'M??o'   => 'mao',
                'Th??n'  => 'thin',
                'T???'    => 'ty',
                'Ng???'   => 'ngo',
                'M??i'   => 'mui',
                'Th??n'  => 'than',
                'D???u'   => 'dau',
                'Tu???t'  => 'tuat',
                'H???i'   => 'hoi'
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
                1 => '?????i an',
                2 => 'L??u li??n',
                3 => 'T???c h???',
                4 => 'X??ch kh???u',
                5 => 'Ti???u c??t',
                6 => 'Kh??ng vong',
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
                case 'L???c H???p':
                    return '<span class="color_red">L???c H???p</span>';
                    break;
                case 'B??nh H??a':
                    return '<span class="color_green">B??nh H??a</span>';
                    break;
                case 'T????ng Sinh':
                    return '<span class="color_red">T????ng Sinh</span>';
                    break;
                case 'T????ng sinh':
                    return '<span class="color_red">T????ng sinh</span>';
                    break;
                case 'T????ng Kh???c':
                    return '<span class="color_black">T????ng Kh???c</span>';
                    break;
                case 'T????ng Xung':
                    return '<span class="color_black">T????ng Xung</span>';
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
                'Kim' => 'Th???y',
                'M???c' => 'H???a',
                'Th???y'  => 'M???c',
                'H???a' => 'Th???',
                'Th???' => 'Kim'
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
                'Kim' => 'M???c',
                'M???c' => 'Th???',
                'Th???y'  => 'H???a',
                'H???a' => 'Kim',
                'Th???' => 'Th???y'
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
                'Kh??ng t???t',
                'Trung b??nh',
                'T???m ???????c',
                'T???t',
            );
            if(array_key_exists($input,$arr)){
                return $arr[$input];
            }
            else{
                return 'Kh??ng t???t';
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
                $result = "Kh???c";
            }
            if ($scores > 0 and $scores < 1) {
                $result = "B??nh h??a";
            }
            if ($scores >= 1) {
                $result = "H???p";
            }
            return $result;
        }
    }

    if (!function_exists('get_position_menu')) {
        function get_position_menu(){
            $mang = array(
                array('name' => 'top', 'title' => ' : Theo parent & child'),
                array('name' => 'right', 'title' => ' : C??ng c??? ph??a sidebar'),
                array('name' => 'content', 'title' => ' : C??ng c??? tr??n trang ch???'),
                array('name' => 'footer', 'title' => ' : C??ng c??? ch??n trang'),
                array('name' => 'category', 'title' => ' : Danh m???c con c??ng c???'),
                array('name' => 'orther', 'title' => ' : C??ng c??? kh??c'),
            );
            return $mang;
        }
    }

    if(!function_exists('get_str_point_thiendia')){
        function get_str_point_thiendia($input){
            $input = (int)$input;
            $arr = array(
                'Kh??ng t???t',
                'Trung b??nh',
                'T???m ???????c',
                'T???t',
                'R???t t???t',
            );
            if(array_key_exists($input,$arr)){
                return $arr[$input];
            }
            else{
                return 'Kh??ng t???t';
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
            $input = str_replace('x??y c???t','<a href="'.base_url('xem-ngay-tot-dong-tho.html').'">x??y c???t</a>', $input);
            $input = str_replace('kh???i c??ng','<a href="'.base_url('xem-ngay-tot-khai-truong.html').'">kh???i c??ng</a>', $input);
            $input = str_replace('Kh???i c??ng','<a href="'.base_url('xem-ngay-tot-khai-truong.html').'">Kh???i c??ng</a>', $input);
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
              1 => 'B???ch D????ng',
              2 => 'Kim Ng??u',
              3 => 'Song T???',
              4 => 'C??? Gi???i',
              5 => 'S?? T???',
              6 => 'X??? N???',
              7 => 'Thi??n B??nh',
              8 => 'B??? C???p',
              9 => 'Nh??n M??',
              10 => 'Ma K???t',
              11 => 'B???o B??nh',
              12 => 'Song Ng??',
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
                1   => 'T??? vi',
                2   => 'Phong th???y',
                3   => 'Xem t?????ng',
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
                   <option value="canh-dan">Canh D???n(1950)</option>
                   <option value="tan-mao">T??n M??o(1951)</option>
                   <option value="nham-thin">Nh??m Th??n(1952)</option>
                   <option value="quy-ty">Qu?? T???(1953)</option>
                   <option value="giap-ngo">Gi??p Ng???(1954)</option>
                   <option value="at-mui">???t M??i(1955)</option>
                   <option value="binh-than">B??nh Th??n(1956)</option>
                   <option value="dinh-dau">??inh D???u(1957)</option>
                   <option value="mau-tuat">M???u Tu???t(1958)</option>
                   <option value="ky-hoi">K??? H???i(1959)</option>
                   <option value="canh-ty">Canh T??(1960)</option>
                   <option value="tan-suu">T??n S???u(1961)</option>
                   <option value="nham-dan">Nh??m D???n(1962)</option>
                   <option value="quy-mao">Qu?? M??o(1963)</option>
                   <option value="giap-thin">Gi??p Th??n(1964)</option>
                   <option value="at-ty">???t T???(1965)</option>
                   <option value="binh-ngo">B??nh Ng???(1966)</option>
                   <option value="dinh-mui">??inh M??i(1967)</option>
                   <option value="mau-than">M???u Th??n(1968)</option>
                   <option value="ky-dau">K??? D???u(1969)</option>
                   <option value="canh-tuat">Canh Tu???t(1970)</option>
                   <option value="tan-hoi">T??n H???i(1971)</option>
                   <option value="nham-ty">Nh??m T??(1972)</option>
                   <option value="quy-suu">Qu?? S???u(1973)</option>
                   <option value="giap-dan">Gi??p D???n(1974)</option>
                   <option value="at-mao">???t M??o(1975)</option>
                   <option value="binh-thin">B??nh Th??n(1976)</option>
                   <option value="dinh-ty">??inh T???(1977)</option>
                   <option value="mau-ngo">M???u Ng???(1978)</option>
                   <option value="ky-mui">K??? M??i(1979)</option>
                   <option value="canh-than">Canh Th??n(1980)</option>
                   <option value="tan-dau">T??n D???u(1981)</option>
                   <option value="nham-tuat">Nh??m Tu???t(1982)</option>
                   <option value="quy-hoi">Qu?? H???i(1983)</option>
                   <option value="giap-ty">Gi??p T??(1984)</option>
                   <option value="at-suu">???t S???u(1985)</option>
                   <option value="binh-dan">B??nh D???n(1986)</option>
                   <option value="dinh-mao">??inh M??o(1987)</option>
                   <option value="mau-thin">M???u Th??n(1988)</option>
                   <option value="ky-ty">K??? T???(1989)</option>
                   <option value="canh-ngo">Canh Ng???(1990)</option>
                   <option value="tan-mui">T??n M??i(1991)</option>
                   <option value="nham-than">Nh??m Th??n(1992)</option>
                   <option value="quy-dau">Qu?? D???u(1993)</option>
                   <option value="giap-tuat">Gi??p Tu???t(1994)</option>
                   <option value="at-hoi">???t H???i(1995)</option>
                   <option value="binh-ty">B??nh T??(1996)</option>
                   <option value="dinh-suu">??inh S???u(1997)</option>
                   <option value="mau-dan">M???u D???n(1998)</option>
                   <option value="ky-mao">K??? M??o(1999)</option>
                   <option value="canh-thin">Canh Th??n(2000)</option>
                   <option value="tan-ty">T??n T???(2001)</option>
                   <option value="nham-ngo">Nh??m Ng???(2002)</option>
                   <option value="quy-mui">Qu?? M??i(2003)</option>
                   <option value="giap-than">Gi??p Th??n(2004)</option>
                   <option value="at-dau">???t D???u(2005)</option>
                   <option value="binh-tuat">B??nh Tu???t(2006)</option>
                   <option value="dinh-hoi">??inh H???i(2007)</option>
                   <option value="mau-ty">M???u T??(2008)</option>
                   <option value="ky-suu">K??? S???u(2009)</option>
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
              "canh-dan"   =>"Canh D???n",
              "tan-mao"    =>"T??n M??o",
              "nham-thin"  =>"Nh??m Th??n",
              "quy-ty"     =>"Qu?? T???",
              "giap-ngo"   =>"Gi??p Ng???",
              "at-mui"     =>"???t M??i",
              "binh-than"  =>"B??nh Th??n",
              "dinh-dau"   =>"??inh D???u",
              "mau-tuat"   =>"M???u Tu???t",
              "ky-hoi"     =>"K??? H???i",
              "canh-ty"    =>"Canh T??",
              "tan-suu"    =>"T??n S???u",
              "nham-dan"   =>"Nh??m D???n",
              "quy-mao"    =>"Qu?? M??o",
              "giap-thin"  =>"Gi??p Th??n",
              "at-ty"      =>"???T T???",
              "binh-ngo"   =>"B??nh Ng???",
              "dinh-mui"   =>"??inh M??i",
              "mau-than"   =>"M???u Th??n",
              "ky-dau"     =>"K??? D???u",
              "canh-tuat"  =>"Canh Tu???t",
              "tan-hoi"    =>"T??n H???i",
              "nham-ty"    =>"Nh??m T??",
              "quy-suu"    =>"Qu?? S???u",
              "giap-dan"   =>"Gi??p D???n",
              "at-mao"     =>"???t M??o",
              "binh-thin"  =>"B??nh Th??n",
              "dinh-ty"    =>"??inh T???",
              "mau-ngo"    =>"M???u Ng???",
              "ky-mui"     =>"K??? M??i",
              "canh-than"  =>"Canh Th??n",
              "tan-dau"    =>"T??n D???u",
              "nham-tuat"  =>"Nh??m Tu???t",
              "quy-hoi"    =>"Qu?? H???i",
              "giap-ty"    =>"Gi??p T??",
              "at-suu"     =>"T??n S???u",
              "binh-dan"   =>"B??nh D???n",
              "dinh-mao"   =>"??inh M??o",
              "mau-thin"   =>"M???u Th??n",
              "ky-ty"      =>"K??? T???",
              "canh-ngo"   =>"Canh Ng???",
              "tan-mui"    =>"T??n M??i",
              "nham-than"  =>"Nh??m Th??n",
              "quy-dau"    =>"Qu?? D???u",
              "giap-tuat"  =>"Gi??p Tu???t",
              "at-hoi"     =>"???t H???i",
              "binh-ty"    =>"B??nh T??",
              "dinh-suu"   =>"??inh S???u",
              "mau-dan"    =>"M???u D???n",
              "ky-mao"     =>"K??? M??o",
              "canh-thin"  =>"Canh Th??nh",
              "tan-ty"     =>"T??n T???",
              "nham-ngo"   =>"Nh??m Ng???",
              "quy-mui"    =>"Qu?? M??i",
              "giap-than"  =>"Gi??p Th??n",
              "at-dau"     =>"???t D???u",
              "binh-tuat"  =>"B??nh Tu???t",
              "dinh-hoi"   =>"??inh H???i",
              "mau-ty"     =>"M???u T??",
              "ky-suu"     =>"K??? S???u",
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
                    return '<label class="color_black">KH???C</label>';
                    break;
                case 1:
                    return '<label class="color_green">B??NH H??A</label>';
                    break;
                case 2:
                    return '<label class="color_red">H???P</label>';
                    break;
                
                default:
                    return '<label class="color_red">H???P</label>';
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
                '1' => 'Lu???n v??? con ng?????i',
                '2' => 'Lu???n v??? cha m???',
                '3' => 'Lu???n v??? h??? h??ng',
                '4' => 'Lu???n v??? nh?? ?????t',
                '5' => 'Lu???n v??? c??ng danh',
                '6' => 'Lu???n v??? b???n b??',
                '7' => 'Lu???n v??? xu???t h??nh',
                '8' => 'Lu???n v??? b???nh t???t',
                '9' => 'Lu???n v??? ti???n b???c',
                '10'=> 'Lu???n v??? con c??i',
                '11'=> 'Lu???n v??? v??? ch???ng',
                '12'=> 'Lu???n v??? anh ch??? em'
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
                1   =>'T?? (23g - 1g)',
                2   =>'S???u (1g - 3g)',
                3   =>'D???n (3g - 5g)',
                4   =>'M??o (5g - 7g)',
                5   =>'Th??n (7g - 9g)',
                6   =>'T??? (9g - 11g)',
                7   =>'Ng??? (11g - 13g)',
                8   =>'M??i (13g - 15g)',
                9   =>'Th??n (15g - 17g)',
                10   =>'D???u (17g - 19g)',
                11   =>'Tu???t (19g - 21g)',
                12   =>'H???i (21g - 23g)',
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
                'publish'   => '???? ????ng',
                'pending'   => 'Ch??? x??t duy???t',
                // 'destroy'   => 'Ph?? h???y(x??a ho??n to??n)',
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
                return round($timeReportSecond).' ph??t';
            }
            if ($timeReportSecond > 60 and $timeReportHour <= 24 ) {
                return round($timeReportHour).' gi???';
            }
            return round($timeReportDay).' ng??y';
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
                    1950 => 'T??ng B??ch M???c',
                    1951 => 'T??ng B??ch M???c',
                    1952 => 'Tr?????ng L??u Th???y',
                    1953 => 'Tr?????ng L??u Th???y',
                    1954 => 'Sa Trung Kim',
                    1955 => 'Sa Trung Kim',
                    1956 => 'S??n H??? H???a',
                    1957 => 'S??n H??? H???a',
                    1958 => 'B??nh ?????a M???c',
                    1959 => 'B??nh ?????a M???c',

                    1960 => 'B??ch Th?????ng Th???',
                    1961 => 'B??ch Th?????ng Th???',
                    1962 => 'Kim B???ch Kim',
                    1963 => 'Kim B???ch Kim',
                    1964 => 'Ph?? ????ng H???a',
                    1965 => 'Ph?? ????ng H???a',
                    1966 => 'Thi??n H?? Th???y',
                    1967 => 'Thi??n H?? Th???y',
                    1968 => '?????i Tr???ch Th???',
                    1969 => '?????i Tr???ch Th???',

                    1970 => 'Thoa Xuy???n Kim',
                    1971 => 'Thoa Xuy???n Kim',
                    1972 => 'Tang ????? M???c',
                    1973 => 'Tang ????? M???c',
                    1974 => '?????i Khe Th???y',
                    1975 => '?????i Khe Th???y',
                    1976 => 'Sa Trung Th???',
                    1977 => 'Sa Trung Th???',
                    1978 => 'Thi??n Th?????ng H???a',
                    1979 => 'Thi??n Th?????ng H???a',

                    1980 => 'Th???ch L???u M???c',
                    1981 => 'Th???ch L???u M???c',
                    1982 => '?????i H???i Th???y',
                    1983 => '?????i H???i Th???y',
                    1984 => 'H???i Trung Kim',
                    1985 => 'H???i Trung Kim',
                    1986 => 'L?? Trung H???a',
                    1987 => 'L?? Trung H???a',
                    1988 => '?????i L??m M???c',
                    1989 => '?????i L??m M???c',

                    1990 => 'L??? B??ng Th???',
                    1991 => 'L??? B??ng Th???',
                    1992 => 'Ki???m Phong Kim',
                    1993 => 'Ki???m Phong Kim',
                    1994 => 'S??n ?????u H???a',
                    1995 => 'S??n ?????u H???a',
                    1996 => 'Gi???m H??? Th???y',
                    1997 => 'Gi???m H??? Th???y',
                    1998 => 'Th??nh ?????u Th???',
                    1999 => 'Th??nh ?????u Th???',

                    2000 => 'B???ch L???p Kim',
                    2001 => 'B???ch L???p Kim',
                    2002 => 'D????ng Li???u M???c',
                    2003 => 'D????ng Li???u M???c',
                    2004 => 'Tuy???n Trung Th???y',
                    2005 => 'Tuy???n Trung Th???y',
                    2006 => '???c Th?????ng Th???',
                    2007 => '???c Th?????ng Th???',
                    2008 => 'Th??ch L???ch H???a',
                    2009 => 'Th??ch L???ch H???a',

                    2010 => 'T??ng B??ch M???c',
                    2011 => 'T??ng B??ch M???c',
                    2012 => 'Tr?????ng L??u Th???y',
                    2013 => 'Tr?????ng L??u Th???y',
                    2014 => 'Sa Trung Kim',
                    2015 => 'Sa Trung Kim',
                    2016 => 'S??n H??? H???a',
                    2017 => 'S??n H??? H???a',
                    2018 => 'B??nh ?????a M???c',
                    2019 => 'B??nh ?????a M???c',

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
                        1950 => 'G??? t??ng b??ch',
                        1951 => 'G??? t??ng b??ch',
                        1952 => 'N?????c ch???y m???nh',
                        1953 => 'N?????c ch???y m???nh',
                        1954 => 'V??ng trong c??t',
                        1955 => 'V??ng trong c??t',
                        1956 => 'L???a tr??n n??i',
                        1957 => 'L???a tr??n n??i',
                        1958 => 'G??? ?????ng b???ng',
                        1959 => 'G??? ?????ng b???ng',

                        1960 => '?????t t?? v??',
                        1961 => '?????t t?? v??',
                        1962 => 'V??ng pha b???c',
                        1963 => 'V??ng pha b???c',
                        1964 => 'L???a ????n to',
                        1965 => 'L???a ????n to',
                        1966 => 'N?????c tr??n tr???i',
                        1967 => 'N?????c tr??n tr???i',
                        1968 => '?????t n???n nh??',
                        1969 => '?????t n???n nh??',

                        1970 => 'V??ng trang s???c',
                        1971 => 'V??ng trang s???c',
                        1972 => 'G??? c??y d??u',
                        1973 => 'G??? c??y d??u',
                        1974 => 'N?????c khe l???n',
                        1975 => 'N?????c khe l???n',
                        1976 => '?????t pha c??t',
                        1977 => '?????t pha c??t',
                        1978 => 'L???a tr??n tr???i',
                        1979 => 'L???a tr??n tr???i',

                        1980 => 'G??? c??y l???u',
                        1981 => 'G??? c??y l???u',
                        1982 => 'N?????c bi???n l???n',
                        1983 => 'N?????c bi???n l???n',
                        1984 => 'V??ng trong bi???n',
                        1985 => 'V??ng trong bi???n',
                        1986 => 'L???a trong l??',
                        1987 => 'L???a trong l??',
                        1988 => 'G??? r???ng gi??',
                        1989 => 'G??? r???ng gi??',

                        1990 => '?????t ven ???????ng',
                        1991 => '?????t ven ???????ng',
                        1992 => 'V??ng m??i ki???m',
                        1993 => 'V??ng m??i ki???m',
                        1994 => 'L???a tr??n n??i',
                        1995 => 'L???a tr??n n??i',
                        1996 => 'N?????c cu???i khe',
                        1997 => 'N?????c cu???i khe',
                        1998 => '?????t tr??n th??nh',
                        1999 => '?????t tr??n th??nh',

                        2000 => 'V??ng ch??n ????n',
                        2001 => 'V??ng ch??n ????n',
                        2002 => 'G??? c??y d????ng',
                        2003 => 'G??? c??y d????ng',
                        2004 => 'N?????c trong su???i',
                        2005 => 'N?????c trong su???i',
                        2006 => '?????t n??c nh??',
                        2007 => '?????t n??c nh??',
                        2008 => 'L???a s???m s??t',
                        2009 => 'L???a s???m s??t',

                        2010 => 'G??? t??ng b??ch',
                        2011 => 'G??? t??ng b??ch',
                        2012 => 'N?????c ch???y m???nh',
                        2013 => 'N?????c ch???y m???nh',
                        2014 => 'V??ng trong c??t',
                        2015 => 'V??ng trong c??t',
                        2016 => 'L???a tr??n n??i',
                        2017 => 'L???a tr??n n??i',
                        2018 => 'G??? ?????ng b???ng',
                        2019 => 'G??? ?????ng b???ng',
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
                           2 => 'M???c',
                           3 => 'Th???y',
                           4 => 'H???a',
                           5 => 'Th???',
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
                        <a class="cst" href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'">GIEO QU??? ?????U N??M 2020</a>
                    </section>';
            $temStyle2 = '<section class="cpnInternalLink">
                        <a href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'">XEM B??I N??M 2020</a>
                    </section>';
            $temStyle3 = '<section class="cpnInternalLink">
                        <a class="cst" href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'">XEM B??I N??M 2020</a>
                    </section>';
            $temStyle4 = '<section class="cpnInternalLink">
                        <a class="md_nut_bam nut_ban_repon" href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'" >XEM B??I T??NH Y??U N??M 2020</a>
                        <a class="md_nut_bam nut_ban_repon" href="'.base_url('xem-boi-so-dien-thoai.html').'" style="width:48%">B??i S??T 2020</a>
                    </section>';
            $temStyle5 = '<section class="cpnInternalLink">
                        <a class="md_nut_bam nut_ban_repon" href="'.base_url('xem-boi-tu-vi-2020-cua-12-con-giap.html').'" >XEM TH???I V???N N??M 2020</a>
                        <a class="md_nut_bam nut_ban_repon" href="'.base_url('xem-boi-so-dien-thoai.html').'" >B??I SIM</a>
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
                    'xem-ngay-tot-tuoi-'.$canchislug             => 'Ng??y t???t h???p tu???i '.$canchiint,
                    'xem-ngay-tot-xuat-hanh-tuoi-'.$canchislug   => 'Ng??y t???t xu???t h??nh h???p tu???i '.$canchiint,
                    'xem-ngay-tot-khai-truong-tuoi-'.$canchislug => 'Ng??y t???t khai tr????ng h???p tu???i '.$canchiint,
                    'xem-ngay-tot-mua-xe-tuoi-'.$canchislug      => 'Ng??y t???t mua xe h???p tu???i '.$canchiint,
                    'xem-ngay-tot-cuoi-hoi-tuoi-'.$canchislug    => 'Ng??y t???t c?????i h???i h???p tu???i '.$canchiint,
                    'xem-ngay-tot-mua-nha-tuoi-'.$canchislug     => 'Ng??y t???t mua nh?? h???p tu???i '.$canchiint,
                    'xem-ngay-tot-dong-tho-tuoi-'.$canchislug    => 'Ng??y t???t ?????ng th??? h???p tu???i '.$canchiint,
                    'xem-ngay-tot-nhap-trach-tuoi-'.$canchislug  => 'Ng??y t???t nh???p tr???ch h???p tu???i '.$canchiint,
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
                                        'Xem sim phong th???y h???p tu???i '.$canchiint => '#',       
                                        'Xem sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',      
                                        'Xem b??i s??? ??i???n tho???i c???a m??nh' => 'xem-boi-so-dien-thoai.html',       
                                        'Tu???i '.$canchiint.' h???p v???i s??? n??o?' => '#',       
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),  
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n h???n cu???c ?????i' => 'xem-la-so-tu-vi.html',       
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',
                                        'Xem b??i con s??? may m???n' => '#',        
                                        'Xem ?? ngh??a c??c con s???' => '#',        
                                        'Xem tu???i l??m nh?? h???p tu???i '.$canchitext => 'xem-tuoi-lam-nha.html',        
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem sim h???p tu???i '.$canchiint => '#',      
                                        'Xem sim h???p m???nh '.nguhanh_text($menh) => '#',     
                                        'Xem b??i sim ??i???n tho???i c???a m??nh' => 'xem-boi-so-dien-thoai.html',      
                                        'Tu???i '.$canchiint.' h???p v???i s??? n??o?' => '#',     
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),  
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n h???n cu???c ?????i' => 'xem-la-so-tu-vi.html',       
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Tu???i '.$canchitext.' l??m nh?? n??m n??o t???t' => 'xem-tuoi-lam-nha.html',      
                                        'Tu???i '.$canchitext.' mua nh?? n??m n??o t???t' => 'xem-tuoi-mua-nha.html',      
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem s??? ??i???n tho???i h???p tu???i '.$canchiint => '#',        
                                        'Xem sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',      
                                        'Xem phong th???y s??? ??i???n tho???i' => 'xem-boi-so-dien-thoai.html',     
                                        'Tu???i '.$canchitext.' h???p v???i s??? n??o?' => '#',      
                                        'T??? vi n??m 2019 tu???i '.$canchitext.' '.$canchiint => baiviet_tuvi2019($canchiint, 'nam'),       
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n h???n cu???c ?????i' => 'xem-la-so-tu-vi.html',       
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Tu???i '.$canchitext.' mua nh?? n??m n??o t???t' => 'xem-tuoi-mua-nha.html',      
                                        'Xem b??i th???i v???n ng??y h??m tu???i '.$canchitext => 'xem-boi-bai-thoi-van.html',   
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem s??? ??i???n tho???i h???p tu???i '.$canchiint => '#',        
                                        'Xem sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',      
                                        'Xem phong th???y s??? ??i???n tho???i' => 'xem-boi-so-dien-thoai.html',     
                                        'Tu???i '.$canchiint.' h???p v???i s??? n??o?' => '#',       
                                        'T??? vi n??m 2019 tu???i '.$canchitext.' '.$canchiint => baiviet_tuvi2019($canchiint, 'nam'),       
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n h???n cu???c ?????i' => 'xem-la-so-tu-vi.html',       
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Xem b??i t??nh y??u tu???i '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html', 
                                        'Xem b??i ng??y h??m nay t???t hay x???u v???i tu???i '.$canchitext => 'boi-bai-hang-ngay.html',   
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem s??? ??i???n tho???i h???p v???i tu???i '.$canchitext => '#',
                                        'Xem sim s??? phong th???y h???p m???nh '.nguhanh_text($menh) => '#',       
                                        'Xem phong th???y sim s??? ??i???n tho???i' => 'xem-boi-so-dien-thoai.html',     
                                        'Tu???i '.$canchiint.' h???p v???i s??? n??o?' => '#',       
                                        'Xem t??? vi '.$canchitext.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),         
                                    ),
                                'xemnhieu' => array(
                                        'Xem b??i t??nh y??u tu???i '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem b??i ng??y h??m nay t???t hay x???u v???i tu???i '.$canchitext => 'boi-bai-hang-ngay.html',       
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tu???i '.$canchitext.' h???p v???i tu???i n??o?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',     
                                        'Tu???i '.$canchitext.' k???t h??n v???i tu???i n??o th?? h???p?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',     
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
                                        'Xem s??? ??i???n tho???i h???p tu???i '.$canchitext.' '.$canchiint => '#',       
                                        'Xem s??? phong th???y h???p m???nh '.nguhanh_text($menh) => '#',      
                                        'Xem phong th???y sim c???a b???n' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem v???n h???n tu???i '.$canchitext.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',  
                                    ),
                                'xemnhieu' => array(
                                        'Xem gi??? ho??ng ?????o h???p tu???i '.$canchitext => '#',       
                                        'Xem l?? s??? t??? vi n???m b???t v???n h???n cu???c ?????i' => 'xem-la-so-tu-vi.html',
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Nh?? th??? n??o l?? sim h???p l??m ??n' => '#',        
                                        'Xem tu???i mua nh?? cho 12 con gi??p' => 'xem-tuoi-mua-nha.html',        
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem sim h???p tu???i '.$canchiint => '#',      
                                        'Xem sim h???p m???nh '.nguhanh_text($menh) => '#',     
                                        'Xem b??i sim ??i???n tho???i c???a m??nh' => 'xem-boi-so-dien-thoai.html',      
                                        'Tu???i '.$canchiint.' h???p v???i s??? n??o?' => '#',     
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),  
                                    ),
                                'xemnhieu' => array(
                                        'Xem sim phong th???y h???p tu???i '.$canchiint => '#',       
                                        'Xem sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',
                                        'Tra c???u sim phong th???y' => 'xem-boi-so-dien-thoai.html',     
                                        'Xem v???n m???nh n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html' => 'M???nh '.nguhanh_text($menh).' h???p v???i m??u g??',      
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim phong th???y h???p v???i tu???i '.$canchiint => '#',        
                                        'Xem sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',      
                                        'Xem sim h???p phong th???y cho m??nh' => 'xem-boi-so-dien-thoai.html',     
                                        'Xem b??i n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'M???nh '.nguhanh_text($menh).' h???p v???i m??u g??' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem gi??? ho??ng ?????o h???p tu???i '.$canchitext => '#',       
                                        'Xem l?? s??? t??? vi n???m b???t v???n h???n cu???c ?????i' => 'xem-la-so-tu-vi.html',     
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',      
                                        'Nh?? th??? n??o l?? sim h???p l??m ??n' => '#',   
                                        'Xem tu???i l??m ??n c???a 12 con gi??p' => 'xem-tuoi-lam-an.html',        
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem b??i sim phong th???y h???p tu???i '.$canchiint => '#',  
                                        'Xem b??i sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#', 
                                        'Xem ?? ngh??a sim phong th???y' => 'xem-boi-so-dien-thoai.html',    
                                        'Xem t??? vi 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),   
                                        'M???nh '.nguhanh_text($menh).' h???p v???i m??u g??' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',          
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n h???n cu???c ?????i' => 'xem-la-so-tu-vi.html',      
                                        'Xem tu???i sinh con h???p tu???i '.$canchitext => 'xem-tuoi-sinh-con.html',        
                                        'Xem tu???i v??? ch???ng h???p tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',      
                                        'Xem b??i t??nh y??u theo ng??y th??ng n??m sinh' => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem sim h???p tu???i '.$canchiint => '#',
                                        'Xem sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',
                                        'Xem b??i s??? ??i???n tho???i c???a m??nh' => 'xem-boi-so-dien-thoai.html', 
                                        'Xem tu???i '.$canchitext.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'), 
                                        'M???nh '.nguhanh_text($menh).' h???p v???i m??u g??' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',      
                                    ),
                                'xemnhieu' => array(
                                        'Xem b??i t??nh y??u tu???i '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem b??i ng??y h??m nay t???t hay x???u v???i tu???i '.$canchitext => 'boi-bai-hang-ngay.html',     
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tu???i '.$canchitext.' h???p v???i tu???i n??o?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tu???i '.$canchitext.' k???t h??n v???i tu???i n??o th?? h???p?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',        
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
                                        'Xem sim phong th???y h???p tu???i '.$canchitext.' '.$canchiint => '#',      
                                        'Xem b??i s??? ??i???n tho???i h???p m???nh '.nguhanh_text($menh) => '#',      
                                        'Xem tu???i k???t h??n c???a 12 con gi??p' => 'xem-tuoi-ket-hon.html',      
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'M???nh '.nguhanh_text($menh).' h???p v???i m??u g??' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',     
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n h???n cu???c ?????i' => 'xem-la-so-tu-vi.html',      
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem tu???i l??m ??n c???a 12 con gi??p' => 'xem-tuoi-lam-an.html',       
                                        'Xem tu???i l??m nh?? cho 12 con gi??p' => 'xem-tuoi-lam-nha.html',      
                                        'Xem gi??? ho??ng ?????o h???p tu???i '.$canchitext => '#',        
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem s??? ??i???n tho???i h???p tu???i '.$canchitext.' '.$canchiint => '#',
                                        'Xem s??? ??i???n tho???i h???p m???nh '.nguhanh_text($menh) => '#',
                                        'Xem tu???i h???p k???t h??n c???a 12 con gi??p' => 'xem-tuoi-ket-hon.html',
                                        'Xem t??? vi tu???i '.$canchitext.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n h???n cu???c ?????i' => 'xem-la-so-tu-vi.html',     
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem tu???i mua nh?? h???p tu???i '.$canchitext => 'xem-tuoi-mua-nha.html',     
                                        'Xem tu???i l??m nh?? h???p tu???i '.$canchitext => 'xem-tuoi-lam-nha.html',     
                                        'Xem gi??? ho??ng ?????o h???p tu???i '.$canchitext => '#',           
                                    )
                            ),
                    3 => array(//1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim phong th???y h???p tu???i '.$canchiint => '#',      
                                        'Xem sim h???p m???nh '.nguhanh_text($menh) => '#',        
                                        'Xem b??i s??? ??i???n tho???i t???t x???u' => 'xem-boi-so-dien-thoai.html',     
                                        'Xem t??? vi '.$canchitext.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),        
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n h???n cu???c ?????i' => 'xem-la-so-tu-vi.html',      
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem tu???i v??? ch???ng h???p tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem tu???i mua nh?? h???p tu???i '.$canchitext => 'xem-tuoi-mua-nha.html',     
                                        'Xem th???i v???n tu???i '.$canchitext => 'xem-boi-bai-thoi-van.html',     
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem b??i sim phong th???y h???p tu???i '.$canchiint => '#',      
                                        'Xem sim s??? h???p m???nh '.nguhanh_text($menh) => '#',     
                                        'Xem s??? ??i???n tho???i phong th???y' => 'xem-boi-so-dien-thoai.html',      
                                        'Xem t??? vi '.$canchitext.' 2019' => baiviet_tuvi2019($canchiint, 'nam'),        
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',        
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n h???n cu???c ?????i' => 'xem-la-so-tu-vi.html',      
                                        'Xem b??i t??nh y??u c???a 2 ng?????i' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',      
                                        'Xem b??i ng??y h??m nay t???t hay x???u' => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',      
                                        'Xem tu???i v??? ch???ng h???p tu???i '.$canchitext => 'xem-tuoi-mua-nha.html',        
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-boi-bai-thoi-van.html',                     
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem s??? ??i???n tho???i h???p v???i tu???i '.$canchitext => '#',        
                                        'Xem sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',     
                                        'Xem b??i s??? ??i???n tho???i theo phong th???y' => 'xem-boi-so-dien-thoai.html',     
                                        'Xem b??i t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',      
                                    ),
                                'xemnhieu' => array(
                                        'Xem b??i t??nh y??u tu???i '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',       
                                        'Xem b??i b??i h??ng ng??y' => 'boi-bai-hang-ngay.html',     
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tu???i '.$canchitext.' h???p v???i tu???i n??o?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tu???i '.$canchitext.' k???t h??n v???i tu???i n??o th?? h???p?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',            
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
                                        'Xem sim phong th???y h???p tu???i '.$canchiint => '#', 
                                        'Xem sim h???p m???nh '.nguhanh_text($menh) => '#',
                                        'Xem b??i s??? ??i???n tho???i c???a m??nh' => 'xem-boi-so-dien-thoai.html',
                                        'Xem b??i t??? vi tu???i '.$canchitext.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'), 
                                        'Tu???i '.$canchitext.' l??m nh?? n??m '.$namxem.' c?? t???t kh??ng?' => 'xem-tuoi-lam-nha.html',
                                    ),
                                'xemnhieu' => array(
                                        'Xem ng??y Ho??ng ?????o h???p tu???i '.$canchitext => '#',     
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem ?? ngh??a c??c con s???' => '#',        
                                        'Xem s??? h???p tu???i '.$canchitext => '#',       
                                        'Xem l?? s??? t??? vi n???m b???t v???n m???nh cu???c ?????i' => 'xem-la-so-tu-vi.html',         
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem s??? ??i???n tho???i h???p tu???i '.$canchiint => '#',  
                                        'Xem s??? ??i???n tho???i h???p m???nh '.nguhanh_text($menh) => '#',  
                                        'Xem b??i sim ??i???n tho???i c???a m??nh' => 'xem-boi-so-dien-thoai.html',   
                                        'Xem b??i t??? vi 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),   
                                        'Tu???i '.$canchitext.' l??m nh?? n??m '.$namxem.' c?? t???t kh??ng?' => 'xem-tuoi-lam-nha.html',    
                                    ),
                                'xemnhieu' => array(
                                        'Xem ng??y Ho??ng ?????o h???p tu???i '.$canchitext => '#',     
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem ?? ngh??a c??c con s???' => '#',        
                                        'Xem tu???i l??m ??n h???p tu???i '.$canchitext => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',      
                                        'Xem l?? s??? t??? vi n???m b???t v???n m???nh cu???c ?????i' => 'xem-la-so-tu-vi.html',       
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim phong th???y h???p tu???i '.$canchitext.' '.$canchiint => '#',
                                        'Xem sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',
                                        'Xem b??i s??? ??i???n tho???i t???t hay x???u' => 'xem-boi-so-dien-thoai.html',
                                        'Xem b??i t??? vi '.$canchitext.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'), 
                                        'Tu???i '.$canchitext.' l??m nh?? n??m '.$namxem.' c?? t???t kh??ng?' => 'xem-tuoi-lam-nha.html',
                                    ),
                                'xemnhieu' => array(
                                        'Xem ng??y Ho??ng ?????o h???p tu???i '.$canchitext => '#',     
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem tu???i l??m ??n h???p tu???i'.$canchitext => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',      
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem l?? s??? t??? vi n???m b???t v???n m???nh cu???c ?????i' => 'xem-la-so-tu-vi.html',        
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem s??? ??i???n tho???i h???p tu???i '.$canchitext.' '.$canchiint => '#',
                                        'Xem b??i sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',
                                        'Xem b??i sim phong th???y' => 'xem-boi-so-dien-thoai.html',
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),
                                        'Tu???i '.$canchitext.' l??m nh?? n??m '.$namxem.' c?? t???t kh??ng?' => 'xem-tuoi-lam-nha.html', 
                                    ),
                                'xemnhieu' => array(
                                        'Xem ng??y Ho??ng ?????o h???p tu???i '.$canchitext => '#',       
                                        'Xem tu???i v??? ch???ng h???p tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem b??i t??nh y??u theo ng??y sinh c???a 2 ng?????i' => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',       
                                        'Xem b??i b??i h??ng ng??y theo tu???i' => 'boi-bai-hang-ngay.html',       
                                        'Xem l?? s??? t??? vi n???m b???t v???n m???nh cu???c ?????i' => 'xem-la-so-tu-vi.html',     
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem b??i sim phong th???y h???p tu???i '.$canchiint => '#',
                                        'Xem sim s??? phong th???y h???p m???nh '.nguhanh_text($menh) => '#',
                                        'Xem b??i sim h???p phong th???y' => 'xem-boi-so-dien-thoai.html',
                                        'Xem v???n h???n t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),
                                        'Tu???i '.$canchitext.' l??m nh?? n??m '.$namxem.' c?? t???t kh??ng?' => 'xem-tuoi-lam-nha.html',
                                    ),
                                'xemnhieu' => array(
                                        'Xem b??i t??nh y??u tu???i '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem b??i b??i h??ng ng??y' => 'boi-bai-hang-ngay.html',     
                                        'Xem b??i b??i t??nh y??u' => 'xem-boi-bai-tinh-yeu.html',      
                                        'Tu???i '.$canchitext.' h???p v???i tu???i n??o?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tu???i '.$canchitext.' k???t h??n v???i tu???i n??o th?? h???p?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',              
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
                                        'Xem sim phong th???y h???p tu???i '.$canchiint => '#',      
                                        'Xem s??? sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',      
                                        'Tra c???u phong th???y s??? ??i???n tho???i' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem v???n m???nh t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tu???i '.$canchitext.' mua nh?? n??m 2019 c?? t???t kh??ng?' => 'xem-tuoi-mua-nha.html',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem ng??y Ho??ng ?????o h???p tu???i '.$canchitext => '#',       
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem l?? s??? t??? vi n???m b???t v???n m???nh cu???c ?????i' => 'xem-la-so-tu-vi.html',     
                                        'Xem ?? ngh??a con s??? theo phong th???y' => '#',        
                                        'Xem s??? h???p tu???i '.$canchitext => '#',             
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem sim phong th???y h???p tu???i '.$canchiint => '#',      
                                        'Xem b??i sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',     
                                        'Tra sim phong th???y s??? ??i???n tho???i' => 'xem-boi-so-dien-thoai.html',      
                                        'Xem v???n m???nh n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),        
                                        'Xem s??? h???p tu???i '.$canchiint => '#',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n m???nh cu???c ?????i' => 'xem-la-so-tu-vi.html',      
                                        'Xem ?? ngh??a con s??? theo phong th???y' => '#',        
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Tu???i '.$canchitext.' mua nh?? n??m n??o t???t' => 'xem-tuoi-mua-nha.html',      
                                        'Xem ng??y Ho??ng ?????o h???p tu???i '.$canchitext => '#',            
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim s??? phong th???y h???p tu???i '.$canchiint => '#',       
                                        'Xem sim phong th???y h???p v???i m???nh '.nguhanh_text($menh) => '#',     
                                        'Ki???m tra sim phong th???y t???t hay x???u' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem v???n m???nh tu???i '.$canchitext.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),        
                                        'Xem ng??y Ho??ng ?????o h???p tu???i '.$canchitext => '#',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n m???nh cu???c ?????i' => 'xem-la-so-tu-vi.html',       
                                        'Xem ?? ngh??a con s??? theo phong th???y' => '#',        
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Xem tu???i v??? ch???ng h???p tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem s??? h???p tu???i '.$canchitext => '#',          
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem s??? ??i???n tho???i h???p tu???i '.$canchiint => '#',       
                                        'Xem b??i s??? ??i???n tho???i h???p m???nh '.nguhanh_text($menh) => '#',      
                                        'Xem b??i sim ch??nh x??c nh???t' => 'xem-boi-so-dien-thoai.html',        
                                        'Xem v???n h???n n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),     
                                        'Xem ng??y Ho??ng ?????o h???p tu???i '.$canchitext => '#',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi n???m b???t v???n m???nh cu???c ?????i' => 'xem-la-so-tu-vi.html',     
                                        'Xem b??i t??nh y??u tu???i '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                        'Xem tu???i v??? ch???ng h???p tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem s??? h???p tu???i '.$canchitext => '#',      
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem sim phong th???y h???p tu???i '.$canchitext.' '.$canchiint => '#',       
                                        'Xem sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',     
                                        'Xem b??i s??? ??i???n tho???i c???a m??nh' => 'xem-boi-so-dien-thoai.html',        
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Xem ng??y Ho??ng ?????o h???p tu???i '.$canchitext => '#',         
                                    ),
                                'xemnhieu' => array(
                                        'Xem b??i t??nh y??u tu???i '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem b??i b??i h??ng ng??y' => 'boi-bai-hang-ngay.html',     
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tu???i '.$canchitext.' h???p v???i tu???i n??o?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tu???i '.$canchitext.' k???t h??n v???i tu???i n??o th?? h???p?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',              
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
                                        'Xem sim phong th???y h???p tu???i '.$canchiint => '#',  
                                        'Xem sim phong th???y h???p m???ng '.nguhanh_text($menh) => '#', 
                                        'Xem b??i s??? ??i???n tho???i t???t x???u' => 'xem-boi-so-dien-thoai.html', 
                                        'Xem v???n h???n tu???i '.$canchitext.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),     
                                        'Tu???i '.$canchitext.' mua nh?? n??m 2019 c?? t???t kh??ng?' => 'xem-tuoi-mua-nha/tuoi-'.$canchislug.'-mua-nha-nam-2019-co-tot-khong.html',   
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi' => 'xem-la-so-tu-vi.html',      
                                        'T??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem b??i sim theo kinh d???ch' => '#',        
                                        '?? ngh??a con s??? theo phong th???y' => '#',        
                                        'Tu???i '.$canchitext.' h???p v???i s??? n??o?' => '#',           
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem sim phong th???y h???p v???i tu???i '.$canchiint => '#',     
                                        'Xem b??i sim phong th???y h???p m???ng '.nguhanh_text($menh) => '#',     
                                        'Xem b??i s??? ??i???n tho???i t???t hay x???u' => 'xem-boi-so-dien-thoai.html',     
                                        'Xem v???n h???n '.$canchitext.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tu???i '.$canchitext.' mua nh?? n??m 2019 c?? t???t kh??ng?' => 'xem-tuoi-mua-nha/tuoi-'.$canchislug.'-mua-nha-nam-2019-co-tot-khong.html',        
                                    ),
                                'xemnhieu' => array(
                                        'L?? s??? t??? vi c?? b??nh gi???i' => 'xem-la-so-tu-vi.html',        
                                        'Xem t??? vi n??m 2019' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Xem b??i sim theo kinh d???ch' => '#',        
                                        '?? ngh??a con s??? theo phong th???y' => '#',        
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',       
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim phong th???y h???p tu???i '.$canchitext.' '.$canchiint => '#',      
                                        'Xem sim phong th???y h???p v???i m???ng '.nguhanh_text($menh) => '#',     
                                        'Xem b??i sim ??i???n tho???i c???a m??nh' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Tu???i '.$canchitext.' mua nh?? n??m 2019 c?? t???t kh??ng?' => 'xem-tuoi-mua-nha/tuoi-'.$canchislug.'-mua-nha-nam-2019-co-tot-khong.html',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi' => 'xem-la-so-tu-vi.html',        
                                        'B??i t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        '?? ngh??a con s??? theo phong th???y' => '#',        
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',       
                                        'Tu???i '.$canchitext.' h???p l??m ??n tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',       
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem s??? ??i???n tho???i h???p tu???i '.$canchiint => '#',       
                                        'Xem s??? sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',      
                                        'Xem b??i sim ??i???n tho???i t???t x???u' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem b??i t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Tu???i '.$canchitext.' mua nh?? n??m 2019 c?? t???t kh??ng?' => 'xem-tuoi-mua-nha/tuoi-'.$canchislug.'-mua-nha-nam-2019-co-tot-khong.html',       
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi 12 con gi??p' => 'xem-la-so-tu-vi.html',       
                                        'Xem b??i b??i h??ng ng??y' => 'boi-bai-hang-ngay.html',     
                                        'Xem b??i t??nh y??u tu???i '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',     
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem sim s??? h???p tu???i '.$canchiint => '#',      
                                        'Xem sim phong th???y h???p m???ng '.nguhanh_text($menh) => '#',     
                                        'Xem b??i s??? ??i???n tho???i c???a m??nh' => 'xem-boi-so-dien-thoai.html',        
                                        'Xem v???n h???n t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'Tu???i '.$canchitext.' mua nh?? n??m 2019 c?? t???t kh??ng?' => 'xem-tuoi-mua-nha/tuoi-'.$canchislug.'-mua-nha-nam-2019-co-tot-khong.html',        
                                    ),
                                'xemnhieu' => array(
                                        'Xem b??i t??nh y??u tu???i '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',        
                                        'Xem b??i b??i h??ng ng??y' => 'boi-bai-hang-ngay.html',     
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Tu???i '.$canchitext.' h???p v???i tu???i n??o?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tu???i '.$canchitext.' k???t h??n v???i tu???i n??o th?? h???p?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',             
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
                                        'Xem sim phong th???y h???p tu???i '.$canchitext.' '.$canchiint => '#', 
                                        'Xem sim s??? phong th???y h???p m???nh '.nguhanh_text($menh) => '#',  
                                        'Xem b??i bi???n s??? xe h???p tu???i' => 'xem-boi-bien-so-xe.html',   
                                        'Xem t??? vi  '.$canchitext.' '.$canchiint.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),  
                                        'M???nh '.nguhanh_text($menh).' h???p v???i m??u g???' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',    
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi' => 'xem-la-so-tu-vi.html',     
                                        'Xem v???n h???n n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',     
                                        'Xem b??i sim theo kinh d???ch' => '#',        
                                        '?? ngh??a con s??? theo phong th???y' => '#',        
                                        'Tu???i '.$canchitext.' h???p v???i s??? n??o?' => '#',          
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem sim phong th???y h???p tu???i '.$canchiint => '#',     
                                        'Xem b??i sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',     
                                        'Xem b??i bi???n s??? xe h???p tu???i' => 'xem-boi-bien-so-xe.html',       
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext.' '.$canchiint => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'M???nh '.nguhanh_text($menh).' h???p v???i m??u g???' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',        
                                    ),
                                'xemnhieu' => array(
                                        'L?? s??? t??? vi' => 'xem-la-so-tu-vi.html',      
                                        'Xem t??? vi 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        '?? ngh??a con s??? theo phong th???y' => '#',        
                                        'Tu???i '.$canchitext.' h???p v???i s??? n??o?' => '#',      
                                        'Xem tu???i l??m ??n h???p tu???i '.$canchitext => '#',         
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem sim s??? phong th???y h???p tu???i '.$canchiint => '#',       
                                        'Xem s??? sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',      
                                        'Xem b??i bi???n s??? xe h???p tu???i' => 'xem-boi-bien-so-xe.html',       
                                        'Xem t??? vi tu???i '.$canchitext.' '.$canchiint.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'M???nh '.nguhanh_text($menh).' h???p v???i m??u g???' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',        
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi v?? b??nh gi???i' => 'xem-la-so-tu-vi.html',       
                                        '?? ngh??a con s??? theo phong th???y' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',        
                                        'Tu???i '.$canchitext.' h???p v???i s??? n??o?' => '#',      
                                        'Xem tu???i l??m ??n h???p tu???i '.$canchitext => '#',      
                                        'Xem tu???i v??? ch???ng h???p tu???i '.$canchitext => '#',          
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem s??? ??i???n tho???i h???p tu???i '.$canchiint => '#',       
                                        'Xem b??i s??? ??i???n tho???i h???p m???nh '.nguhanh_text($menh) => '#',      
                                        'Xem b??i bi???n s??? xe h???p tu???i' => 'xem-boi-bien-so-xe.html',       
                                        'Xem b??i tu???i '.$canchitext.' '.$canchiint.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),        
                                        'M???nh '.nguhanh_text($menh).' h???p v???i m??u g??? ' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',       
                                    ),
                                'xemnhieu' => array(
                                        '?? ngh??a con s??? theo phong th???y' => '#',        
                                        'Tu???i '.$canchitext.' h???p v???i s??? n??o?' => '#',      
                                        'Xem tu???i l??m ??n h???p tu???i '.$canchitext => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',      
                                        'Xem tu???i v??? ch???ng h???p tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',        
                                        'Xem b??i t??nh y??u c???a 2 ng?????i theo ng??y sinh' => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',       
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem sim phong th???y h???p tu???i '.$canchiint => '#',     
                                        'Xem b??i sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',     
                                        'Xem b??i bi???n s??? xe h???p tu???i' => 'xem-boi-bien-so-xe.html',       
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),       
                                        'M???nh '.nguhanh_text($menh).' h???p v???i m??u g???' => 'xem-mau-hop-menh/menh-'.nguhanh_slug($menh).'-hop-mau-gi.html',        
                                    ),
                                'xemnhieu' => array(
                                        'Xem b??i t??nh y??u tu???i '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',     
                                        'Xem b??i b??i h??ng ng??y' => 'boi-bai-hang-ngay.html',     
                                        'Xem b??i b??i t??nh y??u' => 'xem-boi-bai-tinh-yeu.html',      
                                        'Tu???i '.$canchitext.' h???p v???i tu???i n??o?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',        
                                        'Tu???i '.$canchitext.' k???t h??n v???i tu???i n??o th?? h???p?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchislug.'-'.$canchiint.'-lay-vo-nam-nao-tot.html',              
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
                                        'Xem b??i sim phong th???y h???p tu???i '.$canchiint => '#',
                                        'Xem sim s??? h???p m???nh '.nguhanh_text($menh) => '#',
                                        'Ch???m ??i???m s??? ??i???n tho???i theo tu???i' => 'xem-boi-so-dien-thoai.html',
                                        'Xem v???n h???n tu???i '.$canchitext.' '.$canchiint.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi' => 'xem-la-so-tu-vi.html',    
                                        'B??i t??? vi 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',       
                                        'Tu???i '.$canchitext.' h???p v???i tu???i n??o?' => '#',       
                                        'Tu???i '.$canchitext.' h???p v???i s??? n??o?' => '#',     
                                        '?? ngh??a con s??? theo phong th???y' => '#',           
                                    )
                            ),
                    2 => array(// 1970 -> 1979
                                'lienquan' => array(
                                        'Xem b??i s??? ??i???n tho???i h???p tu???i '.$canchiint => '#',     
                                        'Xem sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',    
                                        'Xem b??i qua s??? ??i???n tho???i c???a m??nh' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem v???n m???nh tu???i '.$canchitext.' '.$canchiint.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',    
                                    ),
                                'xemnhieu' => array(
                                        'L???y l?? s??? t??? vi' => 'xem-la-so-tu-vi.html',    
                                        'Xem t??? vi n??m 2019 c???a 12 con gi??p' => 'xem-tu-vi-nam-2019-cua-12-con-giap.html',       
                                        'Tu???i '.$canchitext.' h???p v???i tu???i n??o?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',       
                                        'Tu???i '.$canchitext.' h???p v???i s??? n??o?' => '#',     
                                        'Xem sim h???p tu???i l??m ??n' => '#',     
                                    )
                            ),
                    3 => array(// 1980 -> 1989
                                'lienquan' => array(
                                        'Xem b??i sim phong th???y h???p tu???i '.$canchitext.' '.$canchiint => '#',     
                                        'Xem s??? ??i???n tho???i h???p m???nh '.nguhanh_text($menh) => '#',     
                                        'Xem b??i sim s??? ??i???n tho???i c???a m??nh' => 'xem-boi-so-dien-thoai.html',       
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',    
                                    ),
                                'xemnhieu' => array(
                                        'Xem l?? s??? t??? vi c?? b??nh gi???i' => 'xem-la-so-tu-vi.html',       
                                        'Tu???i '.$canchitext.' h???p v???i tu???i n??o?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',       
                                        'Tu???i '.$canchitext.' h???p v???i s??? n??o?' => '#',     
                                        'Xem sim h???p tu???i l??m ??n' => '#',      
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',          
                                    )
                            ),
                    4 => array(// 1990 -> 1999
                                'lienquan' => array(
                                        'Xem b??i sim phong th???y h???p v???i tu???i '.$canchiint => '#',     
                                        'Xem b??i sim phong th???y h???p m???nh '.nguhanh_text($menh) => '#',    
                                        'Xem b??i sim s??? ??i???n tho???i t???t x???u' => 'xem-boi-so-dien-thoai.html',    
                                        'Xem t??? vi tu???i '.$canchitext.' n??m 2019' => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',    
                                    ),
                                'xemnhieu' => array(
                                        'Tu???i '.$canchitext.' h???p tu???i n??o?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',       
                                        'Tu???i '.$canchitext.' h???p s??? n??o?' => '#',     
                                        'Xem sim h???p tu???i l??m ??n' => '#',      
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',       
                                        'Xem b??i th???i v???n h??ng ng??y theo tu???i' => 'xem-boi-bai-thoi-van.html',     
                                    )
                            ),
                    5 => array(// 2000 -> 2009
                                'lienquan' => array(
                                        'Xem sim phong th???y h???p tu???i '.$canchiint => '#',    
                                        'Xem b??i s??? ??i???n tho???i h???p m???nh '.nguhanh_text($menh) => '#',     
                                        'Xem b??i sim s??? ??i???n tho???i t???t hay x???u' => 'xem-boi-so-dien-thoai.html',    
                                        'Xem t??? vi n??m 2019 tu???i '.$canchitext => baiviet_tuvi2019($canchiint, 'nam'),      
                                        'Tu???i '.$canchitext.' h???p l??m ??n v???i tu???i n??o?' => 'xem-tuoi-lam-an/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-lam-an-voi-tuoi-nao.html',    
                                    ),
                                'xemnhieu' => array(
                                        'Xem b??i t??nh y??u tu???i '.$canchitext => 'xem-boi-tinh-yeu-theo-ngay-sinh.html',       
                                        'Xem b??i ng??y h??m nay t???t hay x???u v???i tu???i '.$canchitext => 'boi-bai-hang-ngay.html',    
                                        'Xem tu???i v??? ch???ng tu???i '.$canchitext => 'xem-boi-tuoi-vo-chong-co-hop-nhau-khong.html',       
                                        'Tu???i n??o h???p v???i tu???i '.$canchitext.'?' => 'xem-tuoi-hop-nhau/tuoi-'.$canchislug.'-sinh-nam-'.$canchiint.'-hop-voi-tuoi-nao.html',       
                                        'Tu???i '.$canchitext.' k???t h??n v???i tu???i n??o th?? h???p?' => 'xem-tuoi-ket-hon/nam-tuoi-'.$canchiint.'-1990-lay-vo-nam-nao-tot.html',             
                                    )
                            )
                );
            return $arr[$khoangnamsinh];
        }
    }
?>
