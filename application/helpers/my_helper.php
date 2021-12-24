<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('dequy'))
{
    // Đệ quy danh mục
    function dequy( $mang, $parent_id = 0, &$result ){
                if( !empty($mang) )
                {  
                  foreach ($mang as $key => $val)
                    {
                        if ($val['parent'] == $parent_id)
                        {
                            $result[] = $val;
                            unset($mang[$key]);
                            dequy($mang, $val['id'], $result);
                        }
                    }
               }     
   }
}   
   // Tạo Selecbox
if ( ! function_exists('selectbox')){   
   function selectbox( $mang, $config = array() )
   {
     $select_name    = isset( $config['name'] )  ? $config['name']   : '';
     $class          = isset( $config['class'] ) ? $config['class']  : '';
     $id             = isset( $config['id'] )    ? $config['id']     : '';
     $selected       = isset( $config['selected'] ) ? $config['selected'] : '';
     $curent_id      = isset( $config['curent_id'] ) ? $config['curent_id'] : '';
     $extend         = isset( $config['extend'] )    ? $config['extend']     : '';
     $level          = isset( $config['level'] )  ? $config['level']   : 0;
     $select_default = isset( $config['select_default'] ) ? $config['select_default'] : 'Là chuyên mục gốc';
     $html = '<select name="'.$select_name.'" class="'.$class.'" id="'.$id.'" '.$extend.' ><option value="0">'.$select_default.'</option>';
     if( !empty( $mang ) )
     {
        foreach( $mang as $val )
        {
           $char = '';
           for( $i=1; $i<= $val['level']; $i++ )
           {
              $char.='--';
           }
           $slt  = $val['id'] == $selected ? 'selected=""' : '';
           $dsb  = $val['id'] == $curent_id || $val['level'] > $level ? 'disabled=""' : '';
           $html.= '<option value="'.$val['id'].'" '.$slt.' '.$dsb.'>'.$char.' '.$val['name'].'</option>';
        }
     } 
     $html.= '</select>';
     return $html;
   }
}   
   // Tạo sắp xếp menu
   
if ( ! function_exists('sort_menu')){   
   function sort_menu( $mang, $config = array() )
   {
         $select_name    = isset( $config['name'] )  ? $config['name']   : '';
         $class          = isset( $config['class'] ) ? $config['class']  : '';
         $id             = isset( $config['id'] )    ? $config['id']     : '';
         $curent_id      = isset( $config['curent_id'] ) ? $config['curent_id'] : 0;
         $extend         = isset( $config['extend'] )    ? $config['extend']     : '';
         $select_default = isset( $config['select_default'] ) ? $config['select_default'] : 'Là chuyên mục gốc';
         $html = '<select name="'.$select_name.'" class="'.$class.'" id="'.$id.'" '.$extend.' ><option value="">'.$select_default.'</option>';
         $char = '';
         $parent = $curent_id;
         if( !empty( $mang ) )
         {
            foreach( $mang as $val )
            {
               if( $val['level'] > 0 ){
                      for( $i = 0; $i<= $val['level']; $i++ ){
                         $char.='--';
                  }
               }
               $dsb  = '';
               if( $val['position_id'] == $curent_id || $val['parent'] == $parent ){
                  $dsb  = 'disabled=""';
                  $curent_id = $val['position_id'];
               }
               $html.= '<option value="'.$val['position_id'].'" '.$dsb.'>'.$char.' '.$val['name'].'</option>';
               $char ='';
            }
         } 
         $html.= '</select>';
         return $html;
   }
}

if(!function_exists('slug_to_text_canchi')){
      function slug_to_text_canchi($key = null){
        $arr  = array(
                    "canh-dan" => "Canh Dần",
                    "tan-mao" => "Tân Mão",
                    "nham-thin" => "Nhâm Thìn",
                    "quy-ty" => "Quý Tỵ",
                    "giap-ngo" => "Giáp Ngọ",
                    "at-mui" => "Ất Mùi",
                    "binh-than" => "Bính Thân",
                    "dinh-dau" => "Đinh Dậu",
                    "mau-tuat" => "Mậu Tuất",
                    "ky-hoi" => "Kỷ Hợi",
                    "canh-ty" => "Canh Tý",
                    "tan-suu" => "Tân Sửu",
                    "nham-dan" => "Nhâm Dần",
                    "quy-mao" => "Quý Mão",
                    "giap-thin" => "Giáp Thìn",
                    "at-ty" => "Ất Tỵ",
                    "binh-ngo" => "Bính Ngọ",
                    "dinh-mui" => "Đinh Mùi",
                    "mau-than" => "Mậu Thân",
                    "ky-dau" => "Kỷ Dậu",
                    "canh-tuat" => "Canh Tuất",
                    "tan-hoi" => "Tân Hợi",
                    "nham-ty" => "Nhâm Tý",
                    "quy-suu" => "Quý Sửu",
                    "giap-dan" => "Giáp Dần",
                    "at-mao" => "Ất Mão",
                    "binh-thin" => "Bính Thìn",
                    "dinh-ty" => "Đinh Tỵ",
                    "mau-ngo" => "Mậu Ngọ",
                    "ky-mui" => "Kỷ Mùi",
                    "canh-than" => "Canh Thân",
                    "tan-dau" => "Tân Dậu",
                    "nham-tuat" => "Nhâm Tuất",
                    "quy-hoi" => "Quý Hợi",
                    "giap-ty" => "Giáp Tý",
                    "at-suu" => "Ất Sửu",
                    "binh-dan" => "Bính Dần",
                    "dinh-mao" => "Đinh Mão",
                    "mau-thin" => "Mậu Thìn",
                    "ky-ty" => "Kỷ Tỵ",
                    "canh-ngo" => "Canh Ngọ",
                    "tan-mui" => "Tân Mùi",
                    "nham-than" => "Nhâm Thân",
                    "quy-dau" => "Quý Dậu",
                    "giap-tuat" => "Giáp Tuất",
                    "at-hoi" => "Ất Hợi",
                    "binh-ty" => "Bính Tý",
                    "dinh-suu" => "Đinh Sửu",
                    "mau-dan" => "Mậu Dần",
                    "ky-mao" => "Kỷ Mão",
                    "canh-thin" => "Canh Thìn",
                    "tan-ty" => "Tân Tỵ",
                    "nham-ngo" => "Nhâm Ngọ",
                    "quy-mui" => "Quý Mùi",
                    "giap-than" => "Giáp Thân",
                    "at-dau" => "Ất Dậu",
                    "binh-tuat" => "Bính Tuất",
                    "dinh-hoi" => "Đinh Hợi",
                    "mau-ty" => "Mậu Tý",
                    "ky-suu" => "Kỷ Sửu",
              );
        if ($key != null) {
          return $arr[$key];
        }
        return $arr;
      }
    }
if(!function_exists('slug_to_ns_canchi')){
      function slug_to_ns_canchi($key = null){
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
        if ($key != null) {
          return $arr[$key];
        }
        return $arr;
      }
    }

if (!function_exists('data_ynghiaso')) {
    function data_ynghiaso(){
        $arr = array(
                '00' => 'y-nghia-so-00-la-gi-A881',
                '01' => 'y-nghia-so-01-la-gi-A882',
                '02' => 'y-nghia-so-02-la-gi-A883',
                '03' => 'y-nghia-so-03-la-gi-A884',
                '04' => 'y-nghia-so-04-la-gi-A885',
                '05' => 'y-nghia-so-05-la-gi-A886',
                '06' => 'y-nghia-so-06-la-gi-A887',
                '07' => 'y-nghia-so-07-la-gi-A888',
                '08' => 'y-nghia-so-08-la-gi-A889',
                '09' => 'y-nghia-so-09-la-gi-A890',
                '10' => 'y-nghia-so-10-la-gi-A891',
                '11' => 'y-nghia-so-11-la-gi-A892',
                '12' => 'y-nghia-so-12-la-gi-A893',
                '13' => 'y-nghia-so-13-la-gi-A894',
                '14' => 'y-nghia-so-14-la-gi-A895',
                '15' => 'y-nghia-so-15-la-gi-A896',
                '16' => 'y-nghia-so-16-la-gi-A897',
                '17' => 'y-nghia-so-17-la-gi-A898',
                '18' => 'y-nghia-so-18-la-gi-A899',
                '19' => 'y-nghia-so-19-la-gi-A900',
                '20' => 'y-nghia-so-20-la-gi-A901',
                '21' => 'y-nghia-so-21-la-gi-A902',
                '22' => 'y-nghia-so-22-la-gi-A903',
                '23' => 'y-nghia-so-23-la-gi-A904',
                '24' => 'y-nghia-so-24-la-gi-A905',
                '25' => 'y-nghia-so-25-la-gi-A906',
                '26' => 'y-nghia-so-26-la-gi-A907',
                '27' => 'y-nghia-so-27-la-gi-A908',
                '28' => 'y-nghia-so-28-la-gi-A909',
                '29' => 'y-nghia-so-29-la-gi-A910',
                '30' => 'y-nghia-so-30-la-gi-A911',
                '31' => 'y-nghia-so-31-la-gi-A912',
                '32' => 'y-nghia-so-32-la-gi-A913',
                '33' => 'y-nghia-so-33-la-gi-A914',
                '34' => 'y-nghia-so-34-la-gi-A915',
                '35' => 'y-nghia-so-35-la-gi-A916',
                '36' => 'y-nghia-so-36-la-gi-A917',
                '37' => 'y-nghia-so-37-la-gi-A918',
                '38' => 'y-nghia-so-38-la-gi-A919',
                '39' => 'y-nghia-so-39-la-gi-A920',
                '40' => 'y-nghia-so-40-la-gi-A921',
                '41' => 'y-nghia-so-41-la-gi-A922',
                '42' => 'y-nghia-so-42-la-gi-A923',
                '43' => 'y-nghia-so-43-la-gi-A924',
                '44' => 'y-nghia-so-44-la-gi-A925',
                '45' => 'y-nghia-so-45-la-gi-A926',
                '46' => 'y-nghia-so-46-la-gi-A927',
                '47' => 'y-nghia-so-47-la-gi-A928',
                '48' => 'y-nghia-so-48-la-gi-A929',
                '49' => 'y-nghia-so-49-la-gi-A930',
                '50' => 'y-nghia-so-50-la-gi-A931',
                '51' => 'y-nghia-so-51-la-gi-A932',
                '52' => 'y-nghia-so-52-la-gi-A933',
                '53' => 'y-nghia-so-53-la-gi-A934',
                '54' => 'y-nghia-so-54-la-gi-A935',
                '55' => 'y-nghia-so-55-la-gi-A936',
                '56' => 'y-nghia-so-56-la-gi-A937',
                '57' => 'y-nghia-so-57-la-gi-A938',
                '58' => 'y-nghia-so-58-la-gi-A939',
                '59' => 'y-nghia-so-59-la-gi-A940',
                '60' => 'y-nghia-so-60-la-gi-A941',
                '61' => 'y-nghia-so-61-la-gi-A942',
                '62' => 'y-nghia-so-62-la-gi-A943',
                '63' => 'y-nghia-so-63-la-gi-A944',
                '64' => 'y-nghia-so-64-la-gi-A945',
                '65' => 'y-nghia-so-65-la-gi-A946',
                '66' => 'y-nghia-so-66-la-gi-A947',
                '67' => 'y-nghia-so-67-la-gi-A948',
                '68' => 'y-nghia-so-68-la-gi-A949',
                '69' => 'y-nghia-so-69-la-gi-A950',
                '70' => 'y-nghia-so-70-la-gi-A951',
                '71' => 'y-nghia-so-71-la-gi-A952',
                '72' => 'y-nghia-so-72-la-gi-A953',
                '73' => 'y-nghia-so-73-la-gi-A954',
                '74' => 'y-nghia-so-74-la-gi-A955',
                '75' => 'y-nghia-so-75-la-gi-A956',
                '76' => 'y-nghia-so-76-la-gi-A957',
                '77' => 'y-nghia-so-77-la-gi-A958',
                '78' => 'y-nghia-so-78-la-gi-A959',
                '79' => 'y-nghia-so-79-la-gi-A960',
                '80' => 'y-nghia-so-80-la-gi-A961',
                '81' => 'y-nghia-so-81-la-gi-A962',
                '82' => 'y-nghia-so-82-la-gi-A963',
                '83' => 'y-nghia-so-83-la-gi-A964',
                '84' => 'y-nghia-so-84-la-gi-A965',
                '85' => 'y-nghia-so-85-la-gi-A966',
                '86' => 'y-nghia-so-86-la-gi-A967',
                '87' => 'y-nghia-so-87-la-gi-A968',
                '88' => 'y-nghia-so-88-la-gi-A969',
                '89' => 'y-nghia-so-89-la-gi-A970',
                '90' => 'y-nghia-so-90-la-gi-A971',
                '91' => 'y-nghia-so-91-la-gi-A972',
                '92' => 'y-nghia-so-92-la-gi-A973',
                '93' => 'y-nghia-so-93-la-gi-A974',
                '94' => 'y-nghia-so-94-la-gi-A975',
                '95' => 'y-nghia-so-95-la-gi-A976',
                '96' => 'y-nghia-so-96-la-gi-A977',
                '97' => 'y-nghia-so-97-la-gi-A978',
                '98' => 'y-nghia-so-98-la-gi-A979',
                '99' => 'y-nghia-so-99-la-gi-A980',
            );
        return $arr;
    }
}
if (!function_exists('data_sohoptuoi')) {
    function data_sohoptuoi(){
        $arr = array(
                'Giáp Tý (1984)'  => 'tuoi-giap-ty-1984-hop-voi-so-nao-A998',
                'Ất Sửu (1985)'   => 'tuoi-at-suu-1985-hop-voi-so-nao-A999',
                'Bính Dần (1986)' => 'tuoi-binh-dan-1986-hop-voi-so-nao-A1000',
                'Đinh Mão (1987)' => 'tuoi-dinh-mao-1987-hop-voi-so-nao-A1001',
                'Mậu Thìn (1988)' => 'tuoi-mau-thin-1988-hop-voi-so-nao-A1002',
                'Kỷ Tỵ (1989)'    => 'tuoi-ky-ty-1989-hop-voi-so-nao-A1003',
                'Canh Ngọ (1990)' => 'tuoi-canh-ngo-1990-hop-voi-so-nao-A1004',
                'Tân Mùi (1991)'  => 'tuoi-tan-mui-1991-hop-voi-so-nao-A1005',
                'Nhâm Thân (1992)'=> 'tuoi-nham-than-1992-hop-voi-so-nao-A1006',
                'Quý Dậu (1993)'  => 'tuoi-quy-dau-1993-hop-voi-so-nao-A1007',
                'Giáp Tuất (1994)'=> 'tuoi-giap-tuat-1994-hop-voi-so-nao-A1008',
                'Ất Hợi (1995)'   => 'tuoi-at-hoi-1995-hop-voi-so-nao-A1009',
                'Bính Tý (1996)'  => 'tuoi-binh-ty-1996-hop-voi-so-nao-A1010',
                'Đinh Sửu (1997)' => 'tuoi-dinh-suu-1997-hop-voi-so-nao-A1011',
                'Mậu Dần (1998)'  => 'tuoi-mau-dan-1998-hop-voi-so-nao-A1012',
                'Kỷ Mão (1999)'   => 'tuoi-ky-mao-1999-hop-voi-so-nao-A1013',
                'Canh Thìn (2000)'=> 'tuoi-canh-thin-2000-hop-voi-so-nao-A1014',
            );
        return $arr;
    }
}
if (!function_exists('data_sohopmenh')) {
    function data_sohopmenh(){
        $arr = array(
                'KIM' => 'nguoi-menh-kim-hop-voi-so-nao-A1015',
                'MỘC' => 'nguoi-menh-moc-hop-voi-so-nao-A1016',
                'THỦY' => 'nguoi-menh-thuy-hop-voi-so-nao-A1017',
                'HỎA' => 'nguoi-menh-hoa-hop-voi-so-nao-A1018',
                'THỔ' => 'nguoi-menh-tho-hop-voi-so-nao-A1019',
            );
        return $arr;
    }
}