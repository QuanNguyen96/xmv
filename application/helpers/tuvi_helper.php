<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//xem con giap

if ( ! function_exists('con_giap'))

{

	function con_giap( $key = null ){

		$mang = array(

                        '1' => 'Tý',

                        '2' => 'Sửu',

                        '3' => 'Dần',

                        '4' => 'Mão',

                        '5' => 'Thìn',

                        '6' => 'Tỵ',

                        '7' => 'Ngọ',

                        '8' => 'Mùi',

                        '9' => 'Thân',

                        '10'=> 'Dậu',

                        '11'=> 'Tuất',

                        '12'=> 'Hợi'

                     );

       if( $key != null ){

            return $mang[$key];

       }else{

            return $mang;

       }

   }

}



//xem cung

if ( ! function_exists('cung'))

{

	function cung( $key = null ){

		$mang = array(

                        '1' => 'Mệnh viên',

                        '2' => 'Phụ mẫu',

                        '3' => 'Phúc đức',

                        '4' => 'Điền trạch',

                        '5' => 'Quan lộc',

                        '6' => 'Nô bộc',

                        '7' => 'Thiên di',

                        '8' => 'Tật ách',

                        '9' => 'Tài bạch',

                        '10'=> 'Tử tức',

                        '11'=> 'Phu thê',

                        '12'=> 'Huynh đệ'

                     );

       if( $key != null ){

            return $mang[$key];

       }else{

            return $mang;

       }

   }

}



//xem cục

if ( ! function_exists('cuc'))

{

	function cuc( $key = null ){

		$mang = array(

                        '1' => 'Thủy nhị cục',

                        '2' => 'Mộc tam cục',

                        '3' => 'Kim tứ cục',

                        '4' => 'Thổ ngũ cục',

                        '5' => 'Hỏa lục cục',

                     );

       if( $key != null ){

            return $mang[$key];

       }else{

            return $mang;

       }

   }

}



//xem Can

if ( ! function_exists('can'))

{

	function can( $key = null ){

		$mang = array(

                        '0'  => 'Canh',

                        '1'  => 'Tân',

                        '2'  => 'Nhâm',

                        '3'  => 'Quý',

                        '4'  => 'Giáp',

                        '5'  => 'Ất',

                        '6'  => 'Bính',

                        '7'  => 'Đinh',

                        '8'  => 'Mậu',

                        '9'  => 'Kỷ'

                     );

       if( $key != null ){

            return $mang[$key];

       }else{

            return $mang;

       }

   }

}



//xem Chi

if ( ! function_exists('chi'))

{

	function chi( $key = null ){

		$mang = array(

                        '0'  => 'Tý',

                        '1'  => 'Sửu',

                        '2'  => 'Dần',

                        '3'  => 'Mão',

                        '4'  => 'Thìn',

                        '5'  => 'Tỵ',

                        '6'  => 'Ngọ',

                        '7'  => 'Mùi',

                        '8'  => 'Thân',

                        '9'  => 'Dậu',

                        '10' => 'Tuất',

                        '11' => 'Hợi'

                     );

       if( $key != null ){

            return $mang[$key];

       }else{

            return $mang;

       }

   }

}



// sao_chinh_tinh

if( !function_exists( 'sao_chinh_tinh' ) ){

    function sao_chinh_tinh( $key ){

        $mang = array( 

                        '1' => 'Liêm trinh (M)',

                        '2' => 'Liêm trinh (V)',

                        '3' => 'Liêm trinh (Đ)',

                        '4' => 'Liêm trinh (H)',

                        '5' => 'Thiên đồng (M)',

                        '6' => 'Thiên đồng (V)',

                        '7' => 'Thiên đồng (Đ)',

                        '8' => 'Thiên đồng (H)',

                        '9' => 'Vũ khúc (M)',

                        '10' => 'Vũ khúc (V)',

                        '11' => 'Vũ khúc (Đ)',

                        '12' => 'Vũ khúc (H)',

                        '13' => 'Thái dương (M)',

                        '14' => 'Thái dương (V)',

                        '15' => 'Thái dương (Đ)',

                        '16' => 'Thái dương (H)',

                        '17' => 'Thiên cơ (M)',

                        '18' => 'Thiên cơ (V)',

                        '19' => 'Thiên cơ (Đ)',

                        '20' => 'Thiên cơ (H)',

                        '21' => 'Thiên phủ (M)',

                        '22' => 'Thiên phủ (V)',

                        '23' => 'Thiên phủ (Đ)',

                        '24' => 'Thiên phủ (B)',

                        '25' => 'Thái âm (M)',

                        '26' => 'Thái âm (V)',

                        '27' => 'Thái âm (Đ)',

                        '28' => 'Thái âm (H)',

                        '29' => 'Tham lang (M)',

                        '30' => 'Tham lang (V)',

                        '31' => 'Tham lang (Đ)',

                        '32' => 'Tham lang (H)',

                        '33' => 'Cự môn (M)',

                        '34' => 'Cự môn (V)',

                        '35' => 'Cự môn (Đ)',

                        '36' => 'Cự môn (H)',

                        '37'=> 'Thiên tướng (M)',

                        '38'=> 'Thiên tướng (V)',

                        '39'=> 'Thiên tướng (Đ)',

                        '40'=> 'Thiên tướng (H)',

                        '41'=> 'Thiên lương (M)',

                        '42'=> 'Thiên lương (V)',

                        '43'=> 'Thiên lương (Đ)',

                        '44'=> 'Thiên lương (H)',

                        '45'=> 'Thất sát (M)',

                        '46'=> 'Thất sát (V)',

                        '47'=> 'Thất sát (Đ)',

                        '48'=> 'Thất sát (H)',

                        '49'=> 'Phá quân (M)',

                        '50'=> 'Phá quân (V)',

                        '51'=> 'Phá quân (Đ)',

                        '52'=> 'Phá quân (H)',

                        '53'=> 'Tử vi (M)',

                        '54'=> 'Tử vi (V)',

                        '55'=> 'Tử vi (Đ)',

                        '56'=> 'Tử vi (H)',

                     );

                  $ketqua = array('sao1'=>'','sao2'=>'');   

                  $arr = explode(',',$key);

                  if( isset( $arr[0] ) && $arr[0] != null ){

                     $ketqua['sao1'] = '<span class="color_'.color_chinh_dieu($arr[0]).'">'.$mang[ $arr[0] ].'</span>';

                  }  

                  if( isset( $arr[1] ) && $arr[1] != null ){

                     $ketqua['sao2'] = '<span class="color_'.color_chinh_dieu($arr[1]).'">'.$mang[ $arr[1] ].'</span>';

                  }  

               return $ketqua;   

    }

}



//xem Chính tinh hay còn gọi là sao.

if ( ! function_exists('Chinh_tinh'))

{

	function Chinh_tinh( $key = null ){

		$mang = array(

                        '1' => 'Liêm trinh',

                        '2' => 'Thiên đồng',

                        '3' => 'Vũ khúc',

                        '4' => 'Thái dương',

                        '5' => 'Thiên cơ',

                        '6' => 'Thiên phủ',

                        '7' => 'Thái âm',

                        '8' => 'Tham lang',

                        '9' => 'Cự môn',

                        '10'=> 'Thiên tướng',

                        '11'=> 'Thiên lương',

                        '12'=> 'Thất sát',

                        '13'=> 'Phá quân',

                     );

       if( $key != null ){

            return $mang[$key];

       }else{

            return $mang;

       }

   }

}







// xem giờ

if ( ! function_exists('gio_sinh'))

{

	function gio_sinh( $ngaysinh ){

	     $time = ( $ngaysinh['gio'] * 60 *60 ) + ( $ngaysinh['phut']*60 );

         if( $time == 0 || ( $time >= 82800 && $time <= 89940 ) ){

             $gio = 1;

         }elseif( $time >= 3600 && $time <= 10740 ){

             $gio = 2;

         }elseif( $time >= 10800 && $time <= 17940 ){

            $gio = 3;

         }elseif( $time >= 18000 && $time <= 25140 ){

            $gio = 4;

         }elseif( $time >= 25200 && $time <= 32340 ){

            $gio = 5;

         }elseif( $time >= 32400 && $time <= 39540 ){

            $gio = 6;

         }elseif( $time >= 39600 && $time <= 46740 ){

            $gio = 7;

         }elseif( $time >= 46800 && $time <= 53940 ){

            $gio = 8;

         }elseif( $time >= 54000 && $time <= 61140 ){

            $gio = 9;

         }elseif( $time >= 61200 && $time <= 68340 ){

            $gio = 10;

         }elseif( $time >= 68400 && $time <= 75540 ){

            $gio = 11;

         }elseif( $time >= 75600 && $time <= 82740 ){

            $gio = 12;

         } 

         

         return $gio;

    }

} 

// Xem năm âm lịch

if ( ! function_exists('am_lich'))

{

	function am_lich( $nam_duong_lich, $rt = 1 ){

	   $mang['can'] =  substr( $nam_duong_lich, -1, 1 );

       $chi = ( $nam_duong_lich % 12 ) + 8;

       if( $chi >= 12 ){

           $chi = $chi - 12;

       }

      $mang['chi'] = $chi;

      if( $rt == 1 ){

          return $mang['can'];

      }elseif( $rt == 2 ){

          return $mang['chi'];

      }else{

        return $mang;

      }

    }

}       



// Xem Cục: nhập vào can và con giáp nằm ở cung tương ứng.

if ( ! function_exists('xem_cuc'))

{

	function xem_cuc( $can,$cung ){

	       $key = $can.$cung;

           $mang = array(

                           '41' =>1 ,

                           '42' =>1 ,

                           '43' =>5 ,

                           '44' =>5 ,

                           '45' =>2 ,

                           '46' =>2 ,

                           '47' =>4 ,

                           '48' =>4 ,

                           '49' =>3 ,

                           '410' =>3 ,

                           '411' =>5 ,

                           '412' =>5 ,

                           

                           '91' =>1 ,

                           '92' =>1 ,

                           '93' =>5 ,

                           '94' =>5 ,

                           '95' =>2 ,

                           '96' =>2 ,

                           '97' =>4 ,

                           '98' =>4 ,

                           '99' =>3 ,

                           '910' =>3 ,

                           '911' =>5 ,

                           '912' =>5 ,

                           

                           '51'   =>5,

                           '52'   =>5,

                           '53'   =>4,

                           '54'   =>4,

                           '55'   =>3,

                           '56'   =>3,

                           '57'   =>2,

                           '58'   =>2,

                           '59'   =>1,

                           '510'   =>1,

                           '511'   =>4,

                           '512'   =>4,

                           

                           '01'   =>5,

                           '02'   =>5,

                           '03'   =>4,

                           '04'   =>4,

                           '05'   =>3,

                           '06'   =>3,

                           '07'   =>2,

                           '08'   =>2,

                           '09'   =>1,

                           '010'   =>1,

                           '011'   =>4,

                           '012'   =>4,

                           

                           '61' =>4,

                           '62' =>4,

                           '63' =>2,

                           '64' =>2,

                           '65' =>1,

                           '66' =>1,

                           '67' =>3,

                           '68' =>3,

                           '69' =>5,

                           '610' =>5,

                           '611' =>2,

                           '612' =>2,

                           

                           '11' =>4,

                           '12' =>4,

                           '13' =>2,

                           '14' =>2,

                           '15' =>1,

                           '16' =>1,

                           '17' =>3,

                           '18' =>3,

                           '19' =>5,

                           '110' =>5,

                           '111' =>2,

                           '112' =>2,

                           

                           '71' =>2,

                           '72' =>2,

                           '73' =>3,

                           '74' =>3,

                           '75' =>5,

                           '76' =>5,

                           '77' =>1,

                           '78' =>1,

                           '79' =>4,

                           '710' =>4,

                           '711' =>3,

                           '712' =>3,

                           

                           '21' =>2,

                           '22' =>2,

                           '23' =>3,

                           '24' =>3,

                           '25' =>5,

                           '26' =>5,

                           '27' =>1,

                           '28' =>1,

                           '29' =>4,

                           '210' =>4,

                           '211' =>3,

                           '212' =>3,

                           

                           '81' =>3,

                           '82' =>3,

                           '83' =>1,

                           '84' =>1,

                           '85' =>4,

                           '86' =>4,

                           '87' =>5,

                           '88' =>5,

                           '89' =>2,

                           '810' =>2,

                           '811' =>1,

                           '812' =>1,

                           

                           '31' =>3,

                           '32' =>3,

                           '33' =>1,

                           '34' =>1,

                           '35' =>4,

                           '36' =>4,

                           '37' =>5,

                           '38' =>5,

                           '39' =>2,

                           '310' =>2,

                           '311' =>1,

                           '312' =>1,

                        ); 

                   if( $key != null ){

                       return $mang[$key];

                   }else{

                       return $mang;

                   }     

                        

           

    }

}    







// xem mệnh và thân

if ( ! function_exists('menh_than'))

{

	function menh_than( $thang,$gio ){

	       $mang = array(

                            '11'  => array('menh'=>3,'than'=>3), 

                            '12'  => array('menh'=>2,'than'=>4), 

                            '13'  => array('menh'=>1,'than'=>5), 

                            '14'  => array('menh'=>12,'than'=>6), 

                            '15'  => array('menh'=>11,'than'=>7), 

                            '16'  => array('menh'=>10,'than'=>8), 

                            '17'  => array('menh'=>9,'than'=>9), 

                            '18'  => array('menh'=>8,'than'=>10), 

                            '19'  => array('menh'=>7,'than'=>11), 

                            '110'  => array('menh'=>6,'than'=>12), 

                            '111'  => array('menh'=>5,'than'=>1), 

                            '112'  => array('menh'=>4,'than'=>2), 

                            

                            '21'  => array('menh'=>4,'than'=>4), 

                            '22'  => array('menh'=>3,'than'=>5), 

                            '23'  => array('menh'=>2,'than'=>6), 

                            '24'  => array('menh'=>1,'than'=>7), 

                            '25'  => array('menh'=>12,'than'=>8), 

                            '26'  => array('menh'=>11,'than'=>9), 

                            '27'  => array('menh'=>10,'than'=>10), 

                            '28'  => array('menh'=>9,'than'=>11), 

                            '29'  => array('menh'=>8,'than'=>12), 

                            '210'  => array('menh'=>7,'than'=>1), 

                            '211'  => array('menh'=>6,'than'=>2), 

                            '212'  => array('menh'=>5,'than'=>3), 

                            

                            '31'  => array('menh'=>5,'than'=>5), 

                            '32'  => array('menh'=>4,'than'=>6), 

                            '33'  => array('menh'=>3,'than'=>7), 

                            '34'  => array('menh'=>2,'than'=>8), 

                            '35'  => array('menh'=>1,'than'=>9), 

                            '36'  => array('menh'=>12,'than'=>10), 

                            '37'  => array('menh'=>11,'than'=>11), 

                            '38'  => array('menh'=>10,'than'=>12), 

                            '39'  => array('menh'=>9,'than'=>1), 

                            '310'  => array('menh'=>8,'than'=>2), 

                            '311'  => array('menh'=>7,'than'=>3), 

                            '312'  => array('menh'=>6,'than'=>4), 

                            

                            '41'  => array('menh'=>6,'than'=>6),

                            '42'  => array('menh'=>5,'than'=>7),

                            '43'  => array('menh'=>4,'than'=>8),

                            '44'  => array('menh'=>3,'than'=>9),

                            '45'  => array('menh'=>2,'than'=>6),

                            '46'  => array('menh'=>1,'than'=>11),

                            '47'  => array('menh'=>12,'than'=>12),

                            '48'  => array('menh'=>11,'than'=>1),

                            '49'  => array('menh'=>10,'than'=>2),

                            '410'  => array('menh'=>9,'than'=>3),

                            '411'  => array('menh'=>8,'than'=>4),

                            '412'  => array('menh'=>7,'than'=>5),

                            

                            '51'  => array('menh'=>7,'than'=>7),

                            '52'  => array('menh'=>6,'than'=>8),

                            '53'  => array('menh'=>5,'than'=>9),

                            '54'  => array('menh'=>4,'than'=>10),

                            '55'  => array('menh'=>3,'than'=>11),

                            '56'  => array('menh'=>2,'than'=>12),

                            '57'  => array('menh'=>1,'than'=>1),

                            '58'  => array('menh'=>12,'than'=>2),

                            '59'  => array('menh'=>11,'than'=>3),

                            '510'  => array('menh'=>10,'than'=>4),

                            '511'  => array('menh'=>9,'than'=>5),

                            '512'  => array('menh'=>8,'than'=>6),

                            

                            '61'  => array('menh'=>8,'than'=>8),

                            '62'  => array('menh'=>7,'than'=>9),

                            '63'  => array('menh'=>6,'than'=>10),

                            '64'  => array('menh'=>5,'than'=>11),

                            '65'  => array('menh'=>4,'than'=>12),

                            '66'  => array('menh'=>3,'than'=>1),

                            '67'  => array('menh'=>2,'than'=>2),

                            '68'  => array('menh'=>1,'than'=>4),

                            '69'  => array('menh'=>12,'than'=>4),

                            '610'  => array('menh'=>11,'than'=>5),

                            '611'  => array('menh'=>10,'than'=>6),

                            '612'  => array('menh'=>9,'than'=>7),

                            

                            '71'  => array('menh'=>9,'than'=>9),

                            '72'  => array('menh'=>8,'than'=>10),

                            '73'  => array('menh'=>7,'than'=>11),

                            '74'  => array('menh'=>6,'than'=>12),

                            '75'  => array('menh'=>5,'than'=>1),

                            '76'  => array('menh'=>4,'than'=>2),

                            '77'  => array('menh'=>3,'than'=>3),

                            '78'  => array('menh'=>2,'than'=>4),

                            '79'  => array('menh'=>1,'than'=>5),

                            '710'  => array('menh'=>12,'than'=>6),

                            '711'  => array('menh'=>11,'than'=>7),

                            '712'  => array('menh'=>10,'than'=>8),

                            

                            '81'  => array('menh'=>10,'than'=>10),

                            '82'  => array('menh'=>9,'than'=>11),

                            '83'  => array('menh'=>8,'than'=>12),

                            '84'  => array('menh'=>7,'than'=>1),

                            '85'  => array('menh'=>6,'than'=>2),

                            '86'  => array('menh'=>5,'than'=>3),

                            '87'  => array('menh'=>4,'than'=>4),

                            '88'  => array('menh'=>3,'than'=>5),

                            '89'  => array('menh'=>2,'than'=>8),

                            '810'  => array('menh'=>1,'than'=>7),

                            '811'  => array('menh'=>12,'than'=>8),

                            '812'  => array('menh'=>11,'than'=>9),

                            

                            '91'  => array('menh'=>11,'than'=>11),

                            '92'  => array('menh'=>10,'than'=>12),

                            '93'  => array('menh'=>9,'than'=>1),

                            '94'  => array('menh'=>8,'than'=>2),

                            '95'  => array('menh'=>7,'than'=>3),

                            '96'  => array('menh'=>6,'than'=>4),

                            '97'  => array('menh'=>5,'than'=>5),

                            '98'  => array('menh'=>4,'than'=>6),

                            '99'  => array('menh'=>3,'than'=>7),

                            '910'  => array('menh'=>2,'than'=>8),

                            '911'  => array('menh'=>1,'than'=>9),

                            '912'  => array('menh'=>12,'than'=>10),

                            

                            '101'  => array('menh'=>12,'than'=>12),

                            '102'  => array('menh'=>11,'than'=>1),

                            '103'  => array('menh'=>10,'than'=>2),

                            '104'  => array('menh'=>9,'than'=>3),

                            '105'  => array('menh'=>8,'than'=>4),

                            '106'  => array('menh'=>7,'than'=>5),

                            '107'  => array('menh'=>6,'than'=>6),

                            '108'  => array('menh'=>5,'than'=>7),

                            '109'  => array('menh'=>4,'than'=>8),

                            '1010'  => array('menh'=>3,'than'=>9),

                            '1011'  => array('menh'=>2,'than'=>10),

                            '1012'  => array('menh'=>1,'than'=>11),

                            

                            '111'  => array('menh'=>1,'than'=>1),

                            '112'  => array('menh'=>12,'than'=>2),

                            '113'  => array('menh'=>11,'than'=>3),

                            '114'  => array('menh'=>10,'than'=>4),

                            '115'  => array('menh'=>9,'than'=>5),

                            '116'  => array('menh'=>8,'than'=>6),

                            '117'  => array('menh'=>7,'than'=>7),

                            '118'  => array('menh'=>6,'than'=>8),

                            '119'  => array('menh'=>5,'than'=>9),

                            '1110'  => array('menh'=>4,'than'=>10),

                            '1111'  => array('menh'=>3,'than'=>11),

                            '1112'  => array('menh'=>2,'than'=>12),

                            

                            '121'  => array('menh'=>2,'than'=>2),

                            '122'  => array('menh'=>1,'than'=>3),

                            '123'  => array('menh'=>12,'than'=>4),

                            '124'  => array('menh'=>11,'than'=>5),

                            '125'  => array('menh'=>10,'than'=>6),

                            '126'  => array('menh'=>9,'than'=>7),

                            '127'  => array('menh'=>8,'than'=>8),

                            '128'  => array('menh'=>7,'than'=>9),

                            '129'  => array('menh'=>6,'than'=>10),

                            '1210'  => array('menh'=>5,'than'=>11),

                            '1211'  => array('menh'=>4,'than'=>12),

                            '1212'  => array('menh'=>3,'than'=>1),

              

                        );

          $key = $thang.$gio;

          return $mang[$key];              

    }

}    



// xem mệnh và thân

if ( ! function_exists('tu_vi'))

{

    function tu_vi( $ngaysinh, $cuc ){

           $key = $ngaysinh.$cuc; 

           $mang = array(

                           '11' =>2,

                           '12' =>5,

                           '13' =>12,

                           '14' =>7,

                           '15' =>10,

                           

                           '21' =>3,

                           '22' =>2,

                           '23' =>5,

                           '24' =>12,

                           '25' =>7,

                           

                           '31' =>3,

                           '32' =>3,

                           '33' =>2,

                           '34' =>5,

                           '35' =>12,

                           

                           '41' =>4,

                           '42' =>6,

                           '43' =>3,

                           '44' =>2,

                           '45' =>5,

                           

                           '51' =>4,

                           '52' =>3,

                           '53' =>1,

                           '54' =>3,

                           '55' =>2,

                           

                           '61' =>5,

                           '62' =>4,

                           '63' =>6,

                           '64' =>8,

                           '65' =>3,

                           

                           '71' =>5,

                           '72' =>7,

                           '73' =>3,

                           '74' =>1,

                           '75' =>11,

                           

                           '81' =>6,

                           '82' =>4,

                           '83' =>4,

                           '84' =>6,

                           '85' =>8,

                           

                           '91' =>6,

                           '92' =>5,

                           '93' =>2,

                           '94' =>3,

                           '95' =>1,

                           

                           '101' =>7,

                           '102' =>8,

                           '103' =>7,

                           '104' =>4,

                           '105' =>6,

                           

                           '111' =>7,

                           '112' =>5,

                           '113' =>4,

                           '114' =>9,

                           '115' =>3,

                           

                           '121' =>8,

                           '122' =>6,

                           '123' =>5,

                           '124' =>2,

                           '125' =>4,

                           

                           '131' =>8,

                           '132' =>9,

                           '133' =>3,

                           '134' =>7,

                           '135' =>12,

                           

                           '141' =>9,

                           '142' =>6,

                           '143' =>8,

                           '144' =>4,

                           '145' =>9,

                           

                           '151' =>9,

                           '152' =>7,

                           '153' =>5,

                           '154' =>5,

                           '155' =>2,

                           

                           '161' =>10,

                           '162' =>10,

                           '163' =>6,

                           '164' =>10,

                           '165' =>7,

                           

                           '171' =>10,

                           '172' =>7,

                           '173' =>4,

                           '174' =>3,

                           '175' =>4,

                           

                           '181' =>11,

                           '182' =>8,

                           '183' =>9,

                           '184' =>8,

                           '185' =>5,

                           

                           '191' =>11,

                           '192' =>11,

                           '193' =>6,

                           '194' =>5,

                           '195' =>1,

                           

                           '201' =>12,

                           '202' =>8,

                           '203' =>7,

                           '204' =>6,

                           '205' =>10,

                           

                           '211' =>12,

                           '212' =>9,

                           '213' =>5,

                           '214' =>11,

                           '215' =>3,

                           

                           '221' =>1,

                           '222' =>12,

                           '223' =>10,

                           '224' =>4,

                           '225' =>8,

                           

                           '231' =>1,

                           '232' =>9,

                           '233' =>7,

                           '234' =>9,

                           '235' =>5,

                           

                           '241' =>2,

                           '242' =>10,

                           '243' =>8,

                           '244' =>6,

                           '245' =>6,

                           

                           '251' =>2,

                           '252' =>1,

                           '253' =>6,

                           '254' =>7,

                           '255' =>2,

                           

                           '261' =>3,

                           '262' =>10,

                           '263' =>11,

                           '264' =>12,

                           '265' =>11,

                           

                           '271' =>3,

                           '272' =>11,

                           '273' =>8,

                           '274' =>5,

                           '275' =>4,

                           

                           '281' =>4,

                           '282' =>2,

                           '283' =>9,

                           '284' =>10,

                           '285' =>9,

                           

                           '291' =>4,

                           '292' =>11,

                           '293' =>7,

                           '294' =>7,

                           '295' =>6,

                           

                           '301' =>5,

                           '302' =>12,

                           '303' =>12,

                           '304' =>8,

                           '305' =>7,

                        );

                 return $mang[$key];       

    }

}    

 

if ( ! function_exists('xac_dinh_sao_chinh_tinh'))

{

    function xac_dinh_sao_chinh_tinh( $vi_tri_sao, $flip = false ){

        $mang = array(

                            '11'=>'56',

                            '12'=>'',

                            '13'=>'52',

                            '14'=>'',

                            '15'=>'1,22',

                            '16'=>'28',

                            '17'=>'32',

                            '18'=>'8,36',

                            '19'=>'10,37',

                            '110'=>'16,44',

                            '111'=>'48',

                            '112'=>'20',

                            '21'=>'19',

                            '22'=>'55,50',

                            '23'=>'',

                            '24'=>'24',

                            '25'=>'28',

                            '26'=>'4,32',

                            '27'=>'34',

                            '28'=>'39',

                            '29'=>'5,42',

                            '210'=>'11,48',

                            '211'=>'16',

                            '212'=>'',

                            '31'=>'49',

                            '32'=>'19',

                            '33'=>'53,21',

                            '34'=>'28',

                            '35'=>'30',

                            '36'=>'36',

                            '37'=>'2,38',

                            '38'=>'43',

                            '39'=>'45',

                            '310'=>'8',

                            '311'=>'9',

                            '312'=>'16',

                            '41'=>'16',

                            '42'=>'24',

                            '43'=>'20,28',

                            '44'=>'56,32',

                            '45'=>'36',

                            '46'=>'39',

                            '47'=>'41',

                            '48'=>'3,47',

                            '49'=>'',

                            '410'=>'',

                            '411'=>'8',

                            '412'=>'12,52',

                            '51'=>'9,21',

                            '52'=>'15,27',

                            '53'=>'31',

                            '54'=>'17,33',

                            '55'=>'54,38',

                            '56'=>'44',

                            '57'=>'45',

                            '58'=>'',

                            '59'=>'2',

                            '510'=>'',

                            '511'=>'51',

                            '512'=>'7',

                            '61'=>'6,26',

                            '62'=>'9,29',

                            '63'=>'34,14',

                            '64'=>'39',

                            '65'=>'17,41',

                            '66'=>'54,46',

                            '67'=>'',

                            '68'=>'',

                            '69'=>'',

                            '610'=>'4,52',

                            '611'=>'',

                            '612'=>'23',

                            '71'=>'32',

                            '72'=>'8,36',

                            '73'=>'10,37',

                            '74'=>'14,42',

                            '75'=>'48',

                            '76'=>'18',

                            '77'=>'53',

                            '78'=>'',

                            '79'=>'52',

                            '710'=>'',

                            '711'=>'1,22',

                            '712'=>'25',

                            '81'=>'34',

                            '82'=>'39',

                            '83'=>'5,42',

                            '84'=>'11,48',

                            '85'=>'14',

                            '86'=>'',

                            '87'=>'18',

                            '88'=>'55,50',

                            '89'=>'',

                            '810'=>'24',

                            '811'=>'25',

                            '812'=>'4,32',

                            '91'=>'2,38',

                            '92'=>'43',

                            '93'=>'45',

                            '94'=>'7',

                            '95'=>'9',

                            '96'=>'13',

                            '97'=>'49',

                            '98'=>'19',

                            '99'=>'53,21',

                            '910'=>'25',

                            '911'=>'30',

                            '912'=>'35',

                            '101'=>'42',

                            '102'=>'3,47',

                            '103'=>'',

                            '104'=>'',

                            '105'=>'8',

                            '106'=>'12,52',

                            '107'=>'13',

                            '108'=>'23',

                            '109'=>'18,26',

                            '1010'=>'56,32',

                            '1011'=>'36',

                            '1012'=>'39',

                            '111'=>'45',

                            '112'=>'',

                            '113'=>'2',

                            '114'=>'',

                            '115'=>'51',

                            '116'=>'7',

                            '117'=>'9,21',

                            '118'=>'15,27',

                            '119'=>'31',

                            '1110'=>'17,33',

                            '1111'=>'54,38',

                            '1112'=>'44',

                            '121'=>'',

                            '122'=>'',

                            '123'=>'',

                            '124'=>'4,52',

                            '125'=>'',

                            '126'=>'23',

                            '127'=>'8,28',

                            '128'=>'9,29',

                            '129'=>'35,16',

                            '1210'=>'40',

                            '1211'=>'17,41',

                            '1212'=>'56,45',

                     );

                     if( isset( $mang[ $vi_tri_sao ] ) ){

                        return $mang[ $vi_tri_sao ];

                     }

                     

    }    

}   



// An sao theo gio sinh

if ( ! function_exists('sao_theo_gio_sinh'))

{

    function sao_theo_gio_sinh( $key = null ){

                 

                 $mang = array(

                                    '1' =>'Văn xương', 

                                    '2' =>'Văn khúc', 

                                    '3' =>'Thai phụ', 

                                    '4' =>'Phong cáo', 

                                    '5' =>'Địa không', 

                                    '6' =>'Địa kiếp', 

                               );

                  $ketqua = array();   

                  $arr = explode(',',$key);

                  if( isset( $arr[0] ) && $arr[0] != null ){

                     if( $arr[0] == 5 || $arr[0] == 6 ){

                        $ketqua['right'][] = '<span class="color_'.color_sao_theo_gio($arr[0]).'">'.$mang[ $arr[0] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.color_sao_theo_gio($arr[0]).'">'.$mang[ $arr[0] ].'</span>';

                     }

                     

                  }  

                  if( isset( $arr[1] ) && $arr[1] != null ){

                     if( $arr[1] == 5 || $arr[1] == 6 ){

                        $ketqua['right'][] = '<span class="color_'.color_sao_theo_gio($arr[1]).'">'.$mang[ $arr[1] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.color_sao_theo_gio($arr[1]).'">'.$mang[ $arr[1] ].'</span>';

                     }

                  } 

                  return $ketqua;

    }

}        



// Xem sao theo gio sinh



// Xem an sao theo gio sinh

if ( ! function_exists('xem_sao_theo_gio_sinh'))

{

    function xem_sao_theo_gio_sinh( $gio, $cung ){

                 $key = $gio.','.$cung;

                 $mang = array(

                                    '1,11'=>'1',

                                    '2,10'=>'1',

                                    '3,9'=>'1,3',

                                    '4,8'=>'1,2',

                                    '5,7'=>'1,4',

                                    '6,6'=>'1',

                                    '7,5'=>'1',

                                    '8,4'=>'1',

                                    '9,3'=>'1,3',

                                    '10,2'=>'1,2',

                                    '11,1'=>'1,4',

                                    '12,12'=>'1',

                                    '1,5'=>'2',

                                    '2,6'=>'2',

                                    '3,7'=>'2',

                                    '5,9'=>'2',

                                    '6,10'=>'2',

                                    '7,11'=>'2',

                                    '8,12'=>'2',

                                    '9,1'=>'2',

                                    '11,3'=>'2',

                                    '12,4'=>'2',

                                    '1,7'=>'3',

                                    '2,8'=>'3',

                                    '4,10'=>'3',

                                    '5,11'=>'3',

                                    '6,12'=>'3',

                                    '7,1'=>'3',

                                    '8,2'=>'3',

                                    '10,4'=>'3',

                                    '11,5'=>'3',

                                    '12,6'=>'3',

                                    '1,3'=>'4',

                                    '2,4'=>'4',

                                    '3,5'=>'4',

                                    '4,6'=>'4',

                                    '6,8'=>'4',

                                    '7,9'=>'4',

                                    '8,10'=>'4',

                                    '9,11'=>'4',

                                    '10,12'=>'4',

                                    '12,2'=>'4',

                                    '1,12'=>'5',

                                    '2,11'=>'5',

                                    '3,10'=>'5',

                                    '4,9'=>'5',

                                    '5,8'=>'5',

                                    '6,7'=>'5',

                                    '7,6'=>'5',

                                    '8,5'=>'5',

                                    '9,4'=>'5',

                                    '10,3'=>'5',

                                    '11,2'=>'5',

                                    '12,1'=>'5',

                                    '1,12'=>'6',

                                    '2,1'=>'6',

                                    '3,2'=>'6',

                                    '4,3'=>'6',

                                    '5,4'=>'6',

                                    '6,5'=>'6',

                                    '7,6'=>'6',

                                    '8,7'=>'6',

                                    '9,8'=>'6',

                                    '10,9'=>'6',

                                    '11,10'=>'6',

                                    '12,11'=>'6',

                               );

         if( $key != null && isset( $mang[ $key ] ) ){

              return $mang[ $key ];

         }

    }

} 



// An sao theo thang sinh

if ( ! function_exists('sao_theo_thang_sinh'))

{

    function sao_theo_thang_sinh( $key = null ){

                 

                 $mang = array(

                                    '1'=>'Hữu bật',

                                    '2'=>'Tả phù',

                                    '3'=>'Thiên giải',

                                    '4'=>'Thiên y',

                                    '5'=>'Thiên riêu',

                                    '6'=>'Thiên hình',

                                    '7'=>'Địa giải',

                               );

                  $ketqua = array();   

                  $arr = explode(',',$key);

                  if( isset( $arr[0] ) && $arr[0] != null ){

                     if( $arr[0] == 5 || $arr[0] == 6 ){

                        $ketqua['right'][] =  '<span class="color_'.color_sao_theo_thang($arr[0]).'">'.$mang[ $arr[0] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.color_sao_theo_thang($arr[0]).'">'.$mang[ $arr[0] ].'</span>';

                     }

                  }  

                  if( isset( $arr[1] ) && $arr[1] != null ){

                     if( $arr[1] == 5 || $arr[1] == 6 ){

                        $ketqua['right'][] = '<span class="color_'.color_sao_theo_thang($arr[1]).'">'.$mang[ $arr[1] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.color_sao_theo_thang($arr[1]).'">'.$mang[ $arr[1] ].'</span>';

                     }

                  } 

                  return $ketqua;

    }

}        



// An sao theo thang sinh

if ( ! function_exists('xem_sao_theo_thang_sinh'))

{

    function xem_sao_theo_thang_sinh( $thang, $cung ){

                 $key = $thang.','.$cung; 

                 $mang = array(

                                    '1,11'=>'1',

                                    '2,10'=>'1,3',

                                    '3,9'=>'1',

                                    '4,8'=>'1,2',

                                    '5,7'=>'1',

                                    '6,6'=>'1',

                                    '7,5'=>'1',

                                    '8,4'=>'1,3',

                                    '9,3'=>'1',

                                    '10,2'=>'1,2',

                                    '11,1'=>'1',

                                    '12,12'=>'1',

                                    '1,5'=>'2',

                                    '2,6'=>'2',

                                    '3,7'=>'2',

                                    '5,9'=>'2',

                                    '6,10'=>'2',

                                    '7,11'=>'2',

                                    '8,12'=>'2',

                                    '9,1'=>'2',

                                    '11,3'=>'2',

                                    '12,8'=>'3',

                                    '12,4'=>'2',

                                    '1,9'=>'3',

                                    '3,11'=>'3',

                                    '4,12'=>'3',

                                    '5,1'=>'3',

                                    '6,2'=>'3',

                                    '7,3'=>'3',

                                    '9,5'=>'3',

                                    '10,6'=>'3',

                                    '11,7'=>'3',

                                    '1,2'=>'4,5',

                                    '2,3'=>'4,5',

                                    '3,4'=>'4,5',

                                    '4,5'=>'4,5',

                                    '5,6'=>'4,5',

                                    '6,7'=>'4,5',

                                    '7,8'=>'4,5',

                                    '8,9'=>'4,5',

                                    '9,10'=>'4,5',

                                    '10,11'=>'4,5',

                                    '11,12'=>'4,5',

                                    '12,1'=>'4,5',

                                    '1,10'=>'6',

                                    '2,11'=>'6',

                                    '3,12'=>'6',

                                    '4,1'=>'6',

                                    '5,2'=>'6',

                                    '6,3'=>'6',

                                    '7,4'=>'6',

                                    '8,5'=>'6',

                                    '9,6'=>'6',

                                    '10,7'=>'6',

                                    '11,8'=>'6',

                                    '12,9'=>'6',

                                    '1,8'=>'7',

                                    '2,9'=>'7',

                                    '3,10'=>'7',

                                    '4,11'=>'7',

                                    '5,12'=>'7',

                                    '6,1'=>'7',

                                    '7,2'=>'7',

                                    '8,3'=>'7',

                                    '9,4'=>'7',

                                    '10,5'=>'7',

                                    '11,6'=>'7',

                                    '12,7'=>'7',

                              );

                 if( $key != null && isset( $mang[ $key ] ) ){

                      return $mang[ $key ];

                 }             

    }

}                              





// An sao theo nam sinh va can

if ( ! function_exists('sao_theo_can_va_cung'))

{

    function sao_theo_can_va_cung( $key = null ){

                 

                 $mang = array(

                                    '1'=>'Đà la',

                                    '2'=>'Lộc tồn',

                                    '3'=>'Kình dương',

                                    '4'=>'Quốc ấn',

                                    '5'=>'Đường phù',

                                    '6'=>'LN văn tinh',

                                    '7'=>'Thiên khôi',

                                    '8'=>'Thiên việt',

                                    '9'=>'Thiên quan',

                                    '10'=>'Thiên phúc',

                                    '11'=>'Lưu hà',

                                    '12'=>'Thiên trù',

                                    '13'=>'Triệt',     

                              );

                  $ketqua = array();   

                  $arr = explode(',',$key);

                  if( isset( $arr[0] ) && $arr[0] != null ){

                     if( $arr[0] == 1 || $arr[0] == 3 || $arr[0] == 11 ){

                        $ketqua['right'][] = '<span class="color_'.color_sao_theo_can_va_cung($arr[0]).'">'.$mang[ $arr[0] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.color_sao_theo_can_va_cung($arr[0]).'">'.$mang[ $arr[0] ].'</span>';

                     }

                  }  

                  if( isset( $arr[1] ) && $arr[1] != null ){

                     if( $arr[1] == 1 || $arr[1] == 3 || $arr[1] == 11 ){

                        $ketqua['right'][] = '<span class="color_'.color_sao_theo_can_va_cung($arr[1]).'">'.$mang[ $arr[1] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.color_sao_theo_can_va_cung($arr[1]).'">'.$mang[ $arr[1] ].'</span>';

                     }

                  } 

                  if( isset( $arr[2] ) && $arr[2] != null ){

                     if( $arr[2] == 1 || $arr[2] == 3 || $arr[2] == 11 ){

                        $ketqua['right'][] = '<span class="color_'.color_sao_theo_can_va_cung($arr[2]).'">'.$mang[ $arr[2] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.color_sao_theo_can_va_cung($arr[2]).'">'.$mang[ $arr[2] ].'</span>';

                     }

                  } 

                  return $ketqua;                

    }

}                               



// Xem sao theo nam sinh va can

if ( ! function_exists('xem_sao_theo_can_va_cung'))

{

    function xem_sao_theo_can_va_cung( $can, $cung ){

                 $key = $can.','.$cung;

                 $mang = array(

                                    '4,2'=>'1,7',

                                    '5,3'=>'1',

                                    '6,5'=>'1',

                                    '7,6'=>'1,12',

                                    '8,5'=>'1',

                                    '9,6'=>'1',

                                    '0,8'=>'1',

                                    '1,9'=>'1',

                                    '2,11'=>'1,9',

                                    '3,12'=>'1',

                                    '3,11'=>'12',

                                    '4,3'=>'2',

                                    '5,4'=>'2',

                                    '6,6'=>'2,9',

                                    '7,7'=>'2',

                                    '8,6'=>'2,11',

                                    '9,7'=>'2,11',

                                    '0,9'=>'2,11',

                                    '1,10'=>'2,9',

                                    '2,12'=>'2,11',

                                    '3,1'=>'2',

                                    '4,4'=>'3',

                                    '5,5'=>'3,9',

                                    '6,7'=>'3',

                                    '7,8'=>'3',

                                    '8,7'=>'3,12',

                                    '9,8'=>'3',

                                    '0,10'=>'3',

                                    '1,11'=>'3',

                                    '2,1'=>'3',

                                    '3,2'=>'3',

                                    '4,11'=>'4',

                                    '5,12'=>'4',

                                    '6,2'=>'4',

                                    '7,3'=>'4,9',

                                    '8,2'=>'4,7',

                                    '9,3'=>'4,10',

                                    '0,5'=>'4',

                                    '1,6'=>'4,10',

                                    '2,8'=>'4',

                                    '3,9'=>'4',

                                    '4,8'=>'5,8,9',

                                    '5,9'=>'5,8,10',

                                    '6,11'=>'5',

                                    '7,12'=>'5,7,10',

                                    '8,11'=>'5',

                                    '9,12'=>'5',

                                    '0,2'=>'5',

                                    '1,3'=>'5,8',

                                    '2,5'=>'5',

                                    '3,6'=>'5,8,10',

                                    '4,6'=>'6,12',

                                    '5,7'=>'6,12',

                                    '6,9'=>'6',

                                    '7,10'=>'6,8',

                                    '8,9'=>'6',

                                    '9,10'=>'6,9',

                                    '0,12'=>'6,9',

                                    '1,1'=>'6',

                                    '2,10'=>'6',

                                    '3,4'=>'6,7',

                                    '5,1'=>'7',

                                    '6,12'=>'7',

                                    '9,1'=>'7',

                                    '0,7'=>'7,10',

                                    '1,7'=>'7,12',

                                    '2,4'=>'7',

                                    '6,10'=>'8',

                                    '8,8'=>'8',

                                    '9,9'=>'8,12',

                                    '0,3'=>'8,12',

                                    '2,6'=>'8',

                                    '8,4'=>'9,10',

                                    '3,7'=>'9',

                                    '4,10'=>'10,11',

                                    '6,1'=>'10,12',

                                    '2,7'=>'10',

                                    '5,11'=>'11',

                                    '6,8'=>'11',

                                    '7,5'=>'11',

                                    '1,4'=>'11',

                                    '3,3'=>'11',

                                    '2,10'=>'12',

                              );

                    if( $key != null && isset( $mang[ $key ] ) ){

                      return $mang[ $key ];

                    }           

    }

}   





// An sao theo chi va cung

if ( ! function_exists('sao_theo_chi_va_cung'))

{

    function sao_theo_chi_va_cung( $key = null ){

                 

                 $mang = array(

                                    '1'=>'Thiên mã',

                                    '2'=>'Hoa cái',

                                    '3'=>'Kiếp sát',

                                    '4'=>'Đào hoa',

                                    '5'=>'Phá toái',

                                    '6'=>'Cô thần',

                                    '7'=>'Quả tú',

                                    '8'=>'Thiên không',

                                    '9'=>'Thiên khốc',

                                    '10'=>'Thiên hư',

                                    '11'=>'Thiên đức',

                                    '12'=>'Nguyệt đức',

                                    '13'=>'Hồng loan',

                                    '14'=>'Thiên hỷ',

                                    '15'=>'Long trì',

                                    '16'=>'Phượng các',

                                    '17'=>'Giải thần',

                              );

                  $ketqua = array();   

                  $arr = explode(',',$key);

                  if( isset( $arr[0] ) && $arr[0] != null ){

                     if( $arr[0] == 3 || $arr[0] == 5 || $arr[0] == 6 || $arr[0] == 7 || $arr[0] == 8 || $arr[0] == 9 || $arr[0] == 10 ){

                        $ketqua['right'][] = '<span class="color_'.color_sao_theo_chi_va_cung($arr[0]).'">'.$mang[ $arr[0] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.color_sao_theo_chi_va_cung($arr[0]).'">'.$mang[ $arr[0] ].'</span>';

                     }

                  }  

                  if( isset( $arr[1] ) && $arr[1] != null ){

                     if( $arr[1] == 3 || $arr[1] == 5 || $arr[1] == 6 || $arr[1] == 7 || $arr[1] == 8 || $arr[1] == 9 || $arr[1] == 10 ){

                        $ketqua['right'][] = '<span class="color_'.color_sao_theo_chi_va_cung($arr[1]).'">'.$mang[ $arr[1] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.color_sao_theo_chi_va_cung($arr[1]).'">'.$mang[ $arr[1] ].'</span>';

                     }

                  } 

                  if( isset( $arr[2] ) && $arr[2] != null ){

                     if( $arr[2] == 3 || $arr[2] == 5 || $arr[2] == 6 || $arr[2] == 7 || $arr[2] == 8 || $arr[2] == 9 || $arr[2] == 10 ){

                        $ketqua['right'][] = '<span class="color_'.color_sao_theo_chi_va_cung($arr[2]).'">'.$mang[ $arr[2] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.color_sao_theo_chi_va_cung($arr[2]).'">'.$mang[ $arr[2] ].'</span>';

                     }

                  } 

                  if( isset( $arr[3] ) && $arr[3] != null ){

                     if( $arr[3] == 3 || $arr[3] == 5 || $arr[3] == 6 || $arr[3] == 7 || $arr[3] == 8 || $arr[3] == 9 || $arr[3] == 10 ){

                        $ketqua['right'][] = '<span class="color_'.color_sao_theo_chi_va_cung($arr[3]).'">'.$mang[ $arr[3] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.color_sao_theo_chi_va_cung($arr[3]).'">'.$mang[ $arr[3] ].'</span>';

                     }

                  } 

                  return $ketqua;          

    }

}                               





// An sao theo chi va cung

if ( ! function_exists('xem_sao_theo_chi_va_cung'))

{

    function xem_sao_theo_chi_va_cung( $chi, $cung ){

                 $key  = $chi.','.$cung;

                 $mang = array(

                                    '0,3' =>'1,6',

                                    '0,5' =>'2,15',

                                    '0,6' =>'3,5,12',

                                    '0,10' =>'4,11,14',

                                    '0,11' =>'7,16,17',

                                    '0,2' =>'8',

                                    '0,7' =>'9,10',

                                    '0,4' =>'13',

                                    '1,12' =>'1',

                                    '1,2' =>'2,5',

                                    '1,3' =>'3,6,8,13',

                                    '1,7' =>'4,12',

                                    '1,11' =>'7,11',

                                    '1,6' =>'9,15',

                                    '1,8' =>'10',

                                    '1,9' =>'14',

                                    '1,10' =>'16,17',

                                    '2,9' =>'1,10,16,17',

                                    '2,11' =>'2,11',

                                    '2,12' =>'3',

                                    '2,4' =>'4,8',

                                    '2,10' =>'5',

                                    '2,6' =>'6',

                                    '2,2' =>'7,13',

                                    '2,5' =>'9',

                                    '2,8' =>'12,14',

                                    '2,7' =>'15',

                                    '3,6' =>'1,5,6',

                                    '3,8' =>'2,15,16,17',

                                    '3,9' =>'3,12',

                                    '3,1' =>'4,11,13',

                                    '3,2' =>'7',

                                    '3,5' =>'8',

                                    '3,4' =>'9',

                                    '3,10' =>'10',

                                    '3,7' =>'14',

                                    '4,3' =>'1,9',

                                    '4,5' =>'2',

                                    '4,6' =>'3,6,8,14',

                                    '4,10' =>'4,12',

                                    '4,2' =>'5,7,11',

                                    '4,11' =>'10',

                                    '4,12' =>'13',

                                    '4,9' =>'15',

                                    '4,7' =>'16,17',

                                    '5,12' =>'1,10',

                                    '5,2' =>'2,9',

                                    '5,3' =>'3,11',

                                    '5,7' =>'4,8',

                                    '5,10' =>'5,15',

                                    '5,9' =>'6',

                                    '5,5' =>'7,14',

                                    '5,11' =>'12,13',

                                    '5,6' =>'16,17',

                                    '6,9' =>'1,6',

                                    '6,11' =>'2,15',

                                    '6,12' =>'3,12',

                                    '6,4' =>'4,11,14',

                                    '6,6' =>'5',

                                    '6,5' =>'7,16,17',

                                    '6,8' =>'8',

                                    '6,1' =>'9,10',

                                    '6,10' =>'13',

                                    '7,6' =>'1',

                                    '7,8' =>'2',

                                    '7,9' =>'3,6,8,13',

                                    '7,1' =>'4,12',

                                    '7,2' =>'5,10',

                                    '7,5' =>'7,11',

                                    '7,12' =>'9,15',

                                    '7,3' =>'14',

                                    '7,4' =>'16,17',

                                    '8,3' =>'1,10,16,17',

                                    '8,5' =>'2',

                                    '8,6' =>'3,11',

                                    '8,10' =>'4,5,8',

                                    '8,12' =>'6',

                                    '8,8' =>'7,13',

                                    '8,11' =>'9',

                                    '8,2' =>'12,14',

                                    '8,1' =>'15',

                                    '9,12' =>'1,6',

                                    '9,2' =>'2,15,16,17',

                                    '9,3' =>'3,12',

                                    '9,7' =>'4,11,13',

                                    '9,6' =>'5',

                                    '9,8' =>'7',

                                    '9,11' =>'8',

                                    '9,10' =>'9',

                                    '9,4' =>'10',

                                    '9,1' =>'14',

                                    '10,9' =>'1,9',

                                    '10,11' =>'2',

                                    '10,12' =>'3,6,8,14',

                                    '10,4' =>'4,12',

                                    '10,2' =>'5',

                                    '10,8' =>'7,11',

                                    '10,5' =>'10',

                                    '10,6' =>'13',

                                    '10,3' =>'15',

                                    '10,1' =>'16,17',

                                    '11,6' =>'1,10',

                                    '11,8' =>'2,9',

                                    '11,9' =>'3,11',

                                    '11,1' =>'4,8',

                                    '11,10' =>'5',

                                    '11,3' =>'6',

                                    '11,11' =>'7,14',

                                    '11,5' =>'12,13',

                                    '11,4' =>'15',

                                    '11,12' =>'16,17',

                              );

              if( $key != null && isset( $mang[ $key ] ) ){

                      return $mang[ $key ];

                    }                  

    }

}                              



// An sao hoa loc va hoa quyen

if ( ! function_exists('sao_hoa'))

{

    function sao_hoa( $key = array() ){

                 $mang = array(

                                    '1'=>'Hóa lộc',

                                    '2'=>'Hóa quyền',

                                    '3'=>'Hóa khoa',

                                    '4'=>'Hóa kỵ',

                 

                              );

                 $color = array(

                                    '1'=>'5',

                                    '2'=>'3',

                                    '3'=>'2',

                                    '4'=>'1',

                               );             

                $ketqua = array();   

                  $arr = $key;

                  if( isset( $arr[0] ) && $arr[0] != null ){

                     if( $arr[0] == 4 ){

                         $ketqua['right'] = '<span class="color_'.$color[ $arr[0] ].'">'.$mang[ $arr[0] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.$color[ $arr[0] ].'">'.$mang[ $arr[0] ].'</span>';

                     }

                  }  

                  if( isset( $arr[1] ) && $arr[1] != null ){

                     if( $arr[1] == 4 ){

                         $ketqua['right'] = '<span class="color_'.$color[ $arr[1] ].'">'.$mang[ $arr[1] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.$color[ $arr[1] ].'">'.$mang[ $arr[1] ].'</span>';

                     }

                  } 

                  if( isset( $arr[2] ) && $arr[2] != null ){

                     if( $arr[2] == 4 ){

                         $ketqua['right'] = '<span class="color_'.$color[ $arr[2] ].'">'.$mang[ $arr[2] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.$color[ $arr[2] ].'">'.$mang[ $arr[2] ].'</span>';

                     }

                  } 

                  if( isset( $arr[3] ) && $arr[3] != null ){

                     if( $arr[3] == 4 ){

                         $ketqua['right'] = '<span class="color_'.$color[ $arr[3] ].'">'.$mang[ $arr[3] ].'</span>';

                     }else{

                        $ketqua['left'][] = '<span class="color_'.$color[ $arr[3] ].'">'.$mang[ $arr[3] ].'</span>';

                     }

                  } 

                  return $ketqua;               

    }

}



// An sao hoa loc va hoa quyen

if ( ! function_exists('xem_sao_hoa_loc_va_hoa_quyen'))

{

    function xem_sao_hoa_loc_va_hoa_quyen( $can, $chinhtinh ){

                 $ar_ct = explode(',',$chinhtinh);

                 $mang = array(

                                    '4,1'=>'1',

                                    '4,49'=>'2',

                                    '5,17'=>'1',

                                    '5,41'=>'2',

                                    '6,5'=>'1',

                                    '6,17'=>'2',

                                    '7,25'=>'1',

                                    '7,5'=>'2',

                                    '8,29'=>'1',

                                    '8,25'=>'2',

                                    '9,9'=>'1',

                                    '9,29'=>'2',

                                    '0,13'=>'1',

                                    '0,9'=>'2',

                                    '1,33'=>'1',

                                    '1,13'=>'2',

                                    '2,41'=>'1',

                              );

               $rt = array();

               if( isset( $ar_ct[0] ) && $ar_ct[0] != null ){

                     $key = $can.','.xep_loai_chinh_tinh( $ar_ct[0] );

                     if( isset( $mang[$key] ) ){

                        $rt[] = $mang[$key];

                     }

                     

               }

               if( isset( $ar_ct[1] ) && $ar_ct[1] != null ){

                     $key = $can.','.xep_loai_chinh_tinh( $ar_ct[1] );

                     if( isset( $mang[$key] ) ){

                        $rt[] = $mang[$key];

                     }

                     

               }    

               return $rt;          

    }

}                              



// An sao hoa loc va hoa quyen

if ( ! function_exists('xep_loai_chinh_tinh'))

{

    function xep_loai_chinh_tinh( $chinhtinh ){

        if( $chinhtinh >= 1 && $chinhtinh <= 4 ){

            $chinhtinh = 1;

        }elseif( $chinhtinh >=5 && $chinhtinh <= 8 ){

            $chinhtinh = 5;

        }elseif( $chinhtinh >=9 && $chinhtinh <= 12 ){

            $chinhtinh = 9;

        }elseif( $chinhtinh >=13 && $chinhtinh <= 16 ){

            $chinhtinh = 13;

        }elseif( $chinhtinh >=17 && $chinhtinh <= 20 ){

            $chinhtinh = 17;

        }elseif( $chinhtinh >=21 && $chinhtinh <= 24 ){

            $chinhtinh = 21;

        }elseif( $chinhtinh >=25 && $chinhtinh <= 28 ){

            $chinhtinh = 25;

        }elseif( $chinhtinh >=29 && $chinhtinh <= 32 ){

            $chinhtinh = 29;

        }elseif( $chinhtinh >=33 && $chinhtinh <= 36 ){

            $chinhtinh = 33;

        }elseif( $chinhtinh >=37 && $chinhtinh <= 40 ){

            $chinhtinh = 37;

        }elseif( $chinhtinh >=41 && $chinhtinh <= 44 ){

            $chinhtinh = 41;

        }elseif( $chinhtinh >=45 && $chinhtinh <= 48 ){

            $chinhtinh = 45;

        }elseif( $chinhtinh >=49 && $chinhtinh <= 52 ){

            $chinhtinh = 49;

        }elseif( $chinhtinh >=53 && $chinhtinh <= 56 ){

            $chinhtinh = 53;

        }

       return $chinhtinh;

    }

}    

        

// Sao hoa khoa va hoa ky

if ( ! function_exists('sao_hoa_khoa_hoa_ky'))

{

    function sao_hoa_khoa_hoa_ky( $can, $chinhtinh = null, $sao_theo_gio = null, $sao_theo_thang = null ){

         $rt = array();

         $saochinhtinh = array( '4,9'=>'3', '4,13' =>'4', '5,53'=>'3','5,25'=>'4','6,1'=>'4','7,17'=>'3','7,33'=>'4','8,17'=>'4','9,41'=>'3','0,25'=>'3','0,5'=>'4','2,21'=>'3','2,9'=>'4','3,25'=>'3','3,29'=>'4'   );

         $saogio       = array('6,1'=>'3','9,2'=>'4','1,2'=>'3','1,1'=>'4');

         $saothang     = array( '8,1'=>'3', );

         if( $chinhtinh != null ){

              $ar_ct = explode(',',$chinhtinh);

               if( isset( $ar_ct[0] ) && $ar_ct[0] != null ){

                     $key = $can.','.xep_loai_chinh_tinh( $ar_ct[0] );

                     if( isset( $saochinhtinh[$key] ) ){

                        $rt[] = $saochinhtinh[$key];

                     }

                     

               }

               if( isset( $ar_ct[1] ) && $ar_ct[1] != null ){

                     $key = $can.','.xep_loai_chinh_tinh( $ar_ct[1] );

                     if( isset( $saochinhtinh[$key] ) ){

                        $rt[] = $saochinhtinh[$key];

                     }

                     

               }  

         }

         

       if( $sao_theo_gio != null ){

             $ar_g = explode(',',$sao_theo_gio);

               if( isset( $ar_g[0] ) && $ar_g[0] != null ){

                     $key = $can.','.$ar_g[0];

                     if( isset( $saogio[$key] ) ){

                        $rt[] = $saogio[$key];

                     }

                     

               }

               if( isset( $ar_g[1] ) && $ar_g[1] != null ){

                     $key = $can.','.$ar_g[1];

                     if( isset( $saogio[$key] ) ){

                        $rt[] = $saogio[$key];

                     }

                     

               }

       } 

       

       if( $sao_theo_thang != null ){

           $ar_t = explode(',',$sao_theo_thang);

               if( isset( $ar_t[0] ) && $ar_t[0] != null ){

                     $key = $can.','.$ar_t[0];

                     if( isset( $saothang[$key] ) ){

                        $rt[] = $saothang[$key];

                     }

                     

               }

               if( isset( $ar_t[1] ) && $ar_t[1] != null ){

                     $key = $can.','.$ar_t[1];

                     if( isset( $saothang[$key] ) ){

                        $rt[] = $saothang[$key];

                     }

                     

               }

       } 

       

       return sao_hoa( $rt );

    }

}        





// Xác định Triệt

if ( ! function_exists('vi_tri_triet'))

{

    function vi_tri_triet( $can ){

         $mang = array(

                         '0'=>'7',

                         '1'=>'5',

                         '2'=>'3',

                         '3'=>'1',

                         '4'=>'9',

                         '5'=>'7',

                         '6'=>'5',

                         '7'=>'3',

                         '8'=>'1',

                         '9'=>'9',

                      );

        return $mang[$can];

    }

}    

    

// Xác định Tuần

if ( ! function_exists('vi_tri_tuan'))

{

    function vi_tri_tuan( $can, $chi ){

         $key = $can.','.$chi;

         $mang = array(

                            '4,0'=>'11',

                            '4,2'=>'1',

                            '4,4'=>'3',

                            '4,6'=>'5',

                            '4,8'=>'7',

                            '4,10'=>'9',

                            '5,1'=>'11',

                            '5,3'=>'1',

                            '5,5'=>'3',

                            '5,7'=>'5',

                            '5,9'=>'7',

                            '5,11'=>'9',

                            '6,0'=>'9',

                            '6,2'=>'11',

                            '6,4'=>'1',

                            '6,6'=>'3',

                            '6,8'=>'5',

                            '6,10'=>'7',

                            '7,1'=>'9',

                            '7,3'=>'11',

                            '7,5'=>'1',

                            '7,7'=>'3',

                            '7,9'=>'5',

                            '7,11'=>'7',

                            '8,0'=>'7',

                            '8,2'=>'9',

                            '8,4'=>'11',

                            '8,6'=>'1',

                            '8,8'=>'3',

                            '8,10'=>'5',

                            '9,1'=>'7',

                            '9,3'=>'9',

                            '9,5'=>'11',

                            '9,7'=>'1',

                            '9,9'=>'3',

                            '9,11'=>'5',

                            '0,0'=>'5',

                            '0,2'=>'7',

                            '0,4'=>'9',

                            '0,6'=>'11',

                            '0,8'=>'1',

                            '0,10'=>'3',

                            '1,1'=>'5',

                            '1,3'=>'7',

                            '1,5'=>'9',

                            '1,7'=>'11',

                            '1,9'=>'1',

                            '1,11'=>'3',

                            '2,0'=>'3',

                            '2,2'=>'5',

                            '2,4'=>'7',

                            '2,6'=>'9',

                            '2,8'=>'11',

                            '2,10'=>'1',

                            '3,1'=>'3',

                            '3,3'=>'5',

                            '3,5'=>'7',

                            '3,7'=>'9',

                            '3,9'=>'11',

                            '3,11'=>'1',

                      );

        if( isset($mang[$key]) ){

            return $mang[$key];

        }

    }

}







// Xác định Am - Duong

if ( ! function_exists('xac_dinh_am_duong'))

{

    function xac_dinh_am_duong( $gioitinh, $namsinh, $ten = false ){

         $key = $gioitinh.','.$namsinh;

         $amduong = array( 

                              '0,4' =>'3',

                              '1,4' =>'1',

                              '0,5' =>'4',

                              '1,5' =>'2',

                              '0,6' =>'3',

                              '1,6' =>'1',

                              '0,7' =>'4',

                              '1,7' =>'2',

                              '0,8' =>'3',

                              '1,8' =>'1',

                              '0,9' =>'4',

                              '1,9' =>'2',

                              '0,0' =>'3',

                              '1,0' =>'1',

                              '0,1' =>'4', 

                              '1,1' =>'2',

                              '0,2' =>'3',

                              '1,2' =>'1',

                              '0,3' =>'4',

                              '1,3' =>'2',

                         );

         $nam_nu = array(

                            '1' => 'Dương nam',

                            '2' => 'Âm nam',

                            '3' => 'Dương nữ',

                            '4' => 'Âm nữ',

                        );

             if( $ten == false ){

                  return $amduong[$key];

             }else{

                  $key1 = $amduong[$key];

                  return $nam_nu[$key1];

             }

    }

}        



// Xác định Am - Duong

if ( ! function_exists('xac_dinh_hoa_tinh'))

{

    function xac_dinh_hoa_tinh( $gio, $chi, $gioitinh, $namsinh, $cung ){

           $key = $gio.$chi;

           $duong_nam_am_nu = array(

                                            '18'=>'3',

                                            '28'=>'4',

                                            '38'=>'5',

                                            '48'=>'4',

                                            '58'=>'7',

                                            '68'=>'8',

                                            '78'=>'9',

                                            '88'=>'10',

                                            '98'=>'11',

                                            '108'=>'12',

                                            '118'=>'1',

                                            '128'=>'2',

                                            '10'=>'3',

                                            '20'=>'4',

                                            '30'=>'5',

                                            '40'=>'4',

                                            '50'=>'7',

                                            '60'=>'8',

                                            '70'=>'9',

                                            '80'=>'10',

                                            '90'=>'11',

                                            '100'=>'12',

                                            '110'=>'1',

                                            '120'=>'2',

                                            '14'=>'3',

                                            '24'=>'4',

                                            '34'=>'5',

                                            '44'=>'4',

                                            '54'=>'7',

                                            '64'=>'8',

                                            '74'=>'9',

                                            '84'=>'10',

                                            '94'=>'11',

                                            '104'=>'12',

                                            '114'=>'1',

                                            '124'=>'2',

                                            '15'=>'4',

                                            '25'=>'5',

                                            '35'=>'6',

                                            '45'=>'7',

                                            '55'=>'8',

                                            '65'=>'9',

                                            '75'=>'10',

                                            '85'=>'11',

                                            '95'=>'12',

                                            '105'=>'1',

                                            '115'=>'2',

                                            '125'=>'3',

                                            '19'=>'4',

                                            '29'=>'5',

                                            '39'=>'6',

                                            '49'=>'7',

                                            '59'=>'8',

                                            '69'=>'9',

                                            '79'=>'10',

                                            '89'=>'11',

                                            '99'=>'12',

                                            '109'=>'1',

                                            '119'=>'2',

                                            '129'=>'3',

                                            '11'=>'4',

                                            '21'=>'5',

                                            '31'=>'6',

                                            '41'=>'7',

                                            '51'=>'8',

                                            '61'=>'9',

                                            '71'=>'10',

                                            '81'=>'11',

                                            '91'=>'12',

                                            '101'=>'1',

                                            '111'=>'2',

                                            '121'=>'3',

                                            '12'=>'2',

                                            '22'=>'3',

                                            '32'=>'4',

                                            '42'=>'5',

                                            '52'=>'6',

                                            '62'=>'7',

                                            '72'=>'8',

                                            '82'=>'9',

                                            '92'=>'10',

                                            '102'=>'11',

                                            '112'=>'12',

                                            '122'=>'1',

                                            '16'=>'2',

                                            '26'=>'3',

                                            '36'=>'4',

                                            '46'=>'5',

                                            '56'=>'6',

                                            '66'=>'7',

                                            '76'=>'8',

                                            '86'=>'9',

                                            '96'=>'10',

                                            '106'=>'11',

                                            '116'=>'12',

                                            '126'=>'1',

                                            '110'=>'2',

                                            '210'=>'3',

                                            '310'=>'4',

                                            '410'=>'5',

                                            '510'=>'6',

                                            '610'=>'7',

                                            '710'=>'8',

                                            '810'=>'9',

                                            '910'=>'10',

                                            '1010'=>'11',

                                            '1110'=>'12',

                                            '1210'=>'1',

                                            '111'=>'10',

                                            '211'=>'11',

                                            '311'=>'12',

                                            '411'=>'1',

                                            '511'=>'2',

                                            '611'=>'3',

                                            '711'=>'4',

                                            '811'=>'5',

                                            '911'=>'6',

                                            '1011'=>'7',

                                            '1111'=>'8',

                                            '1211'=>'9',

                                            '13'=>'10',

                                            '23'=>'11',

                                            '33'=>'12',

                                            '43'=>'1',

                                            '53'=>'2',

                                            '63'=>'3',

                                            '73'=>'4',

                                            '83'=>'5',

                                            '93'=>'6',

                                            '103'=>'7',

                                            '113'=>'8',

                                            '123'=>'9',

                                            '17'=>'10',

                                            '27'=>'11',

                                            '37'=>'12',

                                            '47'=>'1',

                                            '57'=>'2',

                                            '67'=>'3',

                                            '77'=>'4',

                                            '87'=>'5',

                                            '97'=>'6',

                                            '107'=>'7',

                                            '117'=>'8',

                                            '127'=>'9',

                                   );   

                                   

                $am_nam_duong_nu = array(

                                                '18'=>'3',

                                                '28'=>'2',

                                                '38'=>'1',

                                                '48'=>'12',

                                                '58'=>'11',

                                                '68'=>'10',

                                                '78'=>'9',

                                                '88'=>'8',

                                                '98'=>'7',

                                                '108'=>'6',

                                                '118'=>'5',

                                                '128'=>'4',

                                                '10'=>'3',

                                                '20'=>'2',

                                                '30'=>'1',

                                                '40'=>'12',

                                                '50'=>'11',

                                                '60'=>'10',

                                                '70'=>'9',

                                                '80'=>'8',

                                                '90'=>'7',

                                                '100'=>'6',

                                                '110'=>'5',

                                                '120'=>'4',

                                                '14'=>'3',

                                                '24'=>'2',

                                                '34'=>'1',

                                                '44'=>'12',

                                                '54'=>'11',

                                                '64'=>'10',

                                                '74'=>'9',

                                                '84'=>'8',

                                                '94'=>'7',

                                                '104'=>'6',

                                                '114'=>'5',

                                                '124'=>'4',

                                                '15'=>'4',

                                                '25'=>'3',

                                                '35'=>'2',

                                                '45'=>'1',

                                                '55'=>'12',

                                                '65'=>'11',

                                                '75'=>'10',

                                                '85'=>'9',

                                                '95'=>'8',

                                                '105'=>'7',

                                                '115'=>'6',

                                                '125'=>'5',

                                                '19'=>'4',

                                                '29'=>'3',

                                                '39'=>'2',

                                                '49'=>'1',

                                                '59'=>'12',

                                                '69'=>'11',

                                                '79'=>'10',

                                                '89'=>'9',

                                                '99'=>'8',

                                                '109'=>'7',

                                                '119'=>'6',

                                                '129'=>'5',

                                                '11'=>'4',

                                                '21'=>'3',

                                                '31'=>'2',

                                                '41'=>'1',

                                                '51'=>'12',

                                                '61'=>'11',

                                                '71'=>'10',

                                                '81'=>'9',

                                                '91'=>'8',

                                                '101'=>'7',

                                                '111'=>'6',

                                                '121'=>'5',

                                                '12'=>'2',

                                                '22'=>'1',

                                                '32'=>'12',

                                                '42'=>'11',

                                                '52'=>'10',

                                                '62'=>'9',

                                                '72'=>'8',

                                                '82'=>'7',

                                                '92'=>'6',

                                                '102'=>'5',

                                                '112'=>'4',

                                                '122'=>'3',

                                                '16'=>'2',

                                                '26'=>'1',

                                                '36'=>'12',

                                                '46'=>'11',

                                                '56'=>'10',

                                                '66'=>'9',

                                                '76'=>'8',

                                                '86'=>'7',

                                                '96'=>'6',

                                                '106'=>'5',

                                                '116'=>'4',

                                                '126'=>'3',

                                                '110'=>'2',

                                                '210'=>'1',

                                                '310'=>'12',

                                                '410'=>'11',

                                                '510'=>'10',

                                                '610'=>'9',

                                                '710'=>'8',

                                                '810'=>'7',

                                                '910'=>'6',

                                                '1010'=>'5',

                                                '1110'=>'4',

                                                '1210'=>'3',

                                                '111'=>'10',

                                                '211'=>'9',

                                                '311'=>'8',

                                                '411'=>'7',

                                                '511'=>'6',

                                                '611'=>'5',

                                                '711'=>'4',

                                                '811'=>'3',

                                                '911'=>'2',

                                                '1011'=>'1',

                                                '1111'=>'12',

                                                '1211'=>'11',

                                                '13'=>'10',

                                                '23'=>'9',

                                                '33'=>'8',

                                                '43'=>'7',

                                                '53'=>'6',

                                                '63'=>'5',

                                                '73'=>'4',

                                                '83'=>'3',

                                                '93'=>'2',

                                                '103'=>'1',

                                                '113'=>'12',

                                                '123'=>'11',

                                                '17'=>'10',

                                                '27'=>'9',

                                                '37'=>'8',

                                                '47'=>'7',

                                                '57'=>'6',

                                                '67'=>'5',

                                                '77'=>'4',

                                                '87'=>'3',

                                                '97'=>'2',

                                                '107'=>'1',

                                                '117'=>'12',

                                                '127'=>'11',

                                        );                   

       $loai = xac_dinh_am_duong( $gioitinh, $namsinh );

       if( $loai == 1 || $loai == 4 ){

          $cung_n = $duong_nam_am_nu[$key];

       }else{

          $cung_n = $am_nam_duong_nu[$key];

       }

       if( $cung == $cung_n ){

           return '<span class="color_3">Hỏa tinh</span>';

       }else{

           return '';

       }

    }

}        







// Xác định Am - Duong

if ( ! function_exists('xac_dinh_linh_tinh'))

{

    function xac_dinh_linh_tinh( $gio, $chi, $gioitinh, $namsinh, $cung ){

           $key = $gio.$chi;

           $duong_nam_am_nu = array(

                                        '12'=>'4',

                                        '22'=>'3',

                                        '32'=>'2',

                                        '42'=>'1',

                                        '52'=>'12',

                                        '62'=>'11',

                                        '72'=>'10',

                                        '82'=>'9',

                                        '92'=>'8',

                                        '102'=>'7',

                                        '112'=>'6',

                                        '122'=>'5',

                                        '16'=>'4',

                                        '26'=>'3',

                                        '36'=>'2',

                                        '46'=>'1',

                                        '56'=>'12',

                                        '66'=>'11',

                                        '76'=>'10',

                                        '86'=>'9',

                                        '96'=>'8',

                                        '106'=>'7',

                                        '116'=>'6',

                                        '126'=>'5',

                                        '110'=>'4',

                                        '210'=>'3',

                                        '310'=>'2',

                                        '410'=>'1',

                                        '510'=>'12',

                                        '610'=>'11',

                                        '710'=>'10',

                                        '810'=>'9',

                                        '910'=>'8',

                                        '1010'=>'7',

                                        '1110'=>'6',

                                        '1210'=>'5',

                                        '18'=>'11',

                                        '28'=>'10',

                                        '38'=>'9',

                                        '48'=>'8',

                                        '58'=>'7',

                                        '68'=>'6',

                                        '78'=>'5',

                                        '88'=>'4',

                                        '98'=>'3',

                                        '108'=>'2',

                                        '118'=>'1',

                                        '128'=>'12',

                                        '10'=>'11',

                                        '20'=>'10',

                                        '30'=>'9',

                                        '40'=>'8',

                                        '50'=>'7',

                                        '60'=>'6',

                                        '70'=>'5',

                                        '80'=>'4',

                                        '90'=>'3',

                                        '100'=>'2',

                                        '110'=>'1',

                                        '120'=>'12',

                                        '14'=>'11',

                                        '24'=>'10',

                                        '34'=>'9',

                                        '44'=>'8',

                                        '54'=>'7',

                                        '64'=>'6',

                                        '74'=>'5',

                                        '84'=>'4',

                                        '94'=>'3',

                                        '104'=>'2',

                                        '114'=>'1',

                                        '124'=>'12',

                                        '111'=>'11',

                                        '211'=>'10',

                                        '311'=>'9',

                                        '411'=>'8',

                                        '511'=>'7',

                                        '611'=>'6',

                                        '711'=>'5',

                                        '811'=>'4',

                                        '911'=>'3',

                                        '1011'=>'2',

                                        '1111'=>'1',

                                        '1211'=>'12',

                                        '13'=>'11',

                                        '23'=>'10',

                                        '33'=>'9',

                                        '43'=>'8',

                                        '53'=>'7',

                                        '63'=>'6',

                                        '73'=>'5',

                                        '83'=>'4',

                                        '93'=>'3',

                                        '103'=>'2',

                                        '113'=>'1',

                                        '123'=>'12',

                                        '17'=>'11',

                                        '27'=>'10',

                                        '37'=>'9',

                                        '47'=>'8',

                                        '57'=>'7',

                                        '67'=>'6',

                                        '77'=>'5',

                                        '87'=>'4',

                                        '97'=>'3',

                                        '107'=>'2',

                                        '117'=>'1',

                                        '127'=>'12',

                                        '15'=>'11',

                                        '25'=>'10',

                                        '35'=>'9',

                                        '45'=>'8',

                                        '55'=>'7',

                                        '65'=>'6',

                                        '75'=>'5',

                                        '85'=>'4',

                                        '95'=>'3',

                                        '105'=>'2',

                                        '115'=>'1',

                                        '125'=>'12',

                                        '19'=>'11',

                                        '29'=>'10',

                                        '39'=>'9',

                                        '49'=>'8',

                                        '59'=>'7',

                                        '69'=>'6',

                                        '79'=>'5',

                                        '89'=>'4',

                                        '99'=>'3',

                                        '109'=>'2',

                                        '119'=>'1',

                                        '129'=>'12',

                                        '11'=>'11',

                                        '21'=>'10',

                                        '31'=>'9',

                                        '41'=>'8',

                                        '51'=>'7',

                                        '61'=>'6',

                                        '71'=>'5',

                                        '81'=>'4',

                                        '91'=>'3',

                                        '101'=>'2',

                                        '111'=>'1',

                                        '121'=>'12',

                                   );

                 

                 $am_nam_duong_nu = array(

                                                '12'=>'4',

                                                '22'=>'5',

                                                '32'=>'6',

                                                '42'=>'7',

                                                '52'=>'8',

                                                '62'=>'9',

                                                '72'=>'10',

                                                '82'=>'11',

                                                '92'=>'12',

                                                '102'=>'1',

                                                '112'=>'2',

                                                '122'=>'3',

                                                '16'=>'4',

                                                '26'=>'5',

                                                '36'=>'6',

                                                '46'=>'7',

                                                '56'=>'8',

                                                '66'=>'9',

                                                '76'=>'10',

                                                '86'=>'11',

                                                '96'=>'12',

                                                '106'=>'1',

                                                '116'=>'2',

                                                '126'=>'3',

                                                '110'=>'4',

                                                '210'=>'5',

                                                '310'=>'6',

                                                '410'=>'7',

                                                '510'=>'8',

                                                '610'=>'9',

                                                '710'=>'10',

                                                '810'=>'11',

                                                '910'=>'12',

                                                '1010'=>'1',

                                                '1110'=>'2',

                                                '1210'=>'3',

                                                '18'=>'11',

                                                '28'=>'12',

                                                '38'=>'1',

                                                '48'=>'2',

                                                '58'=>'3',

                                                '68'=>'4',

                                                '78'=>'5',

                                                '88'=>'6',

                                                '98'=>'7',

                                                '108'=>'8',

                                                '118'=>'9',

                                                '128'=>'10',

                                                '10'=>'11',

                                                '20'=>'12',

                                                '30'=>'1',

                                                '40'=>'2',

                                                '50'=>'3',

                                                '60'=>'4',

                                                '70'=>'5',

                                                '80'=>'6',

                                                '90'=>'7',

                                                '100'=>'8',

                                                '110'=>'9',

                                                '120'=>'10',

                                                '14'=>'11',

                                                '24'=>'12',

                                                '34'=>'1',

                                                '44'=>'2',

                                                '54'=>'3',

                                                '64'=>'4',

                                                '74'=>'5',

                                                '84'=>'6',

                                                '94'=>'7',

                                                '104'=>'8',

                                                '114'=>'9',

                                                '124'=>'10',

                                                '111'=>'11',

                                                '211'=>'12',

                                                '311'=>'1',

                                                '411'=>'2',

                                                '511'=>'3',

                                                '611'=>'4',

                                                '711'=>'5',

                                                '811'=>'6',

                                                '911'=>'7',

                                                '1011'=>'8',

                                                '1111'=>'9',

                                                '1211'=>'10',

                                                '13'=>'11',

                                                '23'=>'12',

                                                '33'=>'1',

                                                '43'=>'2',

                                                '53'=>'3',

                                                '63'=>'4',

                                                '73'=>'5',

                                                '83'=>'6',

                                                '93'=>'7',

                                                '103'=>'8',

                                                '113'=>'9',

                                                '123'=>'10',

                                                '17'=>'11',

                                                '27'=>'12',

                                                '37'=>'1',

                                                '47'=>'2',

                                                '57'=>'3',

                                                '67'=>'4',

                                                '77'=>'5',

                                                '87'=>'6',

                                                '97'=>'7',

                                                '107'=>'8',

                                                '117'=>'9',

                                                '127'=>'10',

                                                '15'=>'11',

                                                '25'=>'12',

                                                '35'=>'1',

                                                '45'=>'2',

                                                '55'=>'3',

                                                '66'=>'4',

                                                '75'=>'5',

                                                '85'=>'6',

                                                '95'=>'7',

                                                '105'=>'8',

                                                '115'=>'9',

                                                '125'=>'10',

                                                '19'=>'11',

                                                '29'=>'12',

                                                '39'=>'1',

                                                '49'=>'2',

                                                '59'=>'3',

                                                '69'=>'4',

                                                '79'=>'5',

                                                '89'=>'6',

                                                '99'=>'7',

                                                '109'=>'8',

                                                '119'=>'9',

                                                '129'=>'10',

                                                '11'=>'11',

                                                '21'=>'12',

                                                '31'=>'1',

                                                '41'=>'2',

                                                '51'=>'3',

                                                '61'=>'4',

                                                '71'=>'5',

                                                '81'=>'6',

                                                '91'=>'7',

                                                '101'=>'8',

                                                '111'=>'9',

                                                '121'=>'10',

                 

                                         );  

                   $loai = xac_dinh_am_duong( $gioitinh, $namsinh );

                   if( $loai == 1 || $loai == 4 ){

                      $cung_n = $duong_nam_am_nu[$key];

                   }else{

                      @$cung_n = $am_nam_duong_nu[$key];

                   }

                   if( $cung == $cung_n ){

                       return '<span class="color_3">Linh tinh</span>';

                   }else{

                       return '';

                   }

    }



}           



// Xác định Am - Duong

if ( ! function_exists('vong_sao_thai_tue'))

{

    function vong_sao_thai_tue( $key ){

          $mang = array(

                           '1'=>'Thái tuế',

                           '2'=>'Thiếu dương',

                           '3'=>'Tang môn',

                           '4'=>'Thiếu âm',

                           '5'=>'Quan phù',

                           '6'=>'Tử phù',

                           '7'=>'Tuế phá',

                           '8'=>'Long  đức',

                           '9'=>'Bạch hổ',

                           '10'=>'Phúc đức',

                           '11'=>'Điếu khách',

                           '12'=>'Trực phù',

                      );

        $ketqua = array();

        if( $key == 2 || $key == 4 || $key == 8 || $key == 10 ){

            $ketqua['left'][] = '<span class="color_'.color_vong_sao_thai_tue($key).'">'.$mang[$key].'</span>';

        }else{

            $ketqua['right'][] = '<span class="color_'.color_vong_sao_thai_tue($key).'">'.$mang[$key].'</span>';

        }

        return $ketqua;

    }

}        



if( !function_exists('sao_theo_loc_ton') ){

       function sao_theo_loc_ton($key){

          $mang = array( 

                      '1'=>'Bác sỹ', 

                      '2'=>'Lực sỹ', 

                      '3'=>'Thanh long', 

                      '4'=>'Tiểu Hao', 

                      '5'=>'Tướng quân', 

                      '6'=>'Tấu thư', 

                      '7'=>'Phi liêm', 

                      '8'=>'Hỷ thần', 

                      '9'=>'Bệnh phù', 

                      '10'=>'Đại hao', 

                      '11'=>'Phục binh', 

                      '12'=>'Quan phủ' 

                      );

         $ketqua = array();

        if( $key == 1 || $key == 2 || $key == 3 || $key == 6 || $key == 8 ){

            $ketqua['left'][] = '<span class="color_'.color_sao_theo_loc_ton($key).'">'.$mang[$key].'</span>';

        }else{

            $ketqua['right'][] = '<span class="color_'.color_sao_theo_loc_ton($key).'">'.$mang[$key].'</span>';

        }

        return $ketqua;

   }

}





if( !function_exists('sao_theo_truong_sinh') ){

       function sao_theo_truong_sinh($key){

          $mang = array(  

                           '1'=>'Trường sinh', 

                           '2'=>'Mộc dục', 

                           '3'=>'Quan đới', 

                           '4'=>'Lâm quan', 

                           '5'=>'Đế vượng', 

                           '6'=>'Suy', 

                           '7'=>'Bệnh', 

                           '8'=>'Tử', 

                           '9'=>'Mộ', 

                           '10'=>'Tuyệt', 

                           '11'=>'Thai', 

                           '12'=>'Dưỡng'

                       );

        $ketqua = array();

        if( $key == 1 || $key == 3 || $key == 4 || $key == 5 || $key == 11 || $key == 12 ){

            $ketqua['left'][] = $mang[$key];

        }else{

            $ketqua['right'][] = $mang[$key];

        }

        return $ketqua;

  }

} 



if( !function_exists('xac_dinh_can_cung_dai_van') ){

       function xac_dinh_can_cung_dai_van($can,$cung){

           $key = $can.$cung;

           $mang = array(

                    '41'=>'6',

                    '51'=>'8',

                    '61'=>'0',

                    '71'=>'2',

                    '81'=>'4',

                    '91'=>'6',

                    '01'=>'8',

                    '11'=>'0',

                    '21'=>'2',

                    '31'=>'4',

                    '42'=>'7',

                    '52'=>'9',

                    '62'=>'1',

                    '72'=>'3',

                    '82'=>'5',

                    '92'=>'7',

                    '02'=>'9',

                    '12'=>'1',

                    '22'=>'3',

                    '32'=>'5',

                    '43'=>'6',

                    '53'=>'8',

                    '63'=>'0',

                    '73'=>'2',

                    '83'=>'4',

                    '44'=>'7',

                    '54'=>'9',

                    '64'=>'1',

                    '74'=>'3',

                    '84'=>'5',

                    '45'=>'8',

                    '55'=>'0',

                    '65'=>'2',

                    '75'=>'4',

                    '85'=>'6',

                    '46'=>'9',

                    '56'=>'1',

                    '66'=>'3',

                    '76'=>'5',

                    '86'=>'7',

                    '47'=>'0',

                    '57'=>'2',

                    '67'=>'4',

                    '77'=>'6',

                    '87'=>'8',

                    '48'=>'1',

                    '58'=>'3',

                    '68'=>'5',

                    '78'=>'7',

                    '88'=>'9',

                    '49'=>'2',

                    '59'=>'4',

                    '69'=>'6',

                    '79'=>'8',

                    '89'=>'0',

                    '410'=>'3',

                    '510'=>'5',

                    '610'=>'7',

                    '710'=>'9',

                    '810'=>'1',

                    '411'=>'4',

                    '511'=>'6',

                    '611'=>'8',

                    '711'=>'0',

                    '811'=>'2',

                    '412'=>'5',

                    '512'=>'7',

                    '612'=>'9',

                    '712'=>'1',

                    '812'=>'3',

                    '93'=>'6',

                    '03'=>'8',

                    '13'=>'0',

                    '23'=>'2',

                    '33'=>'4',

                    '94'=>'7',

                    '04'=>'9',

                    '14'=>'1',

                    '24'=>'3',

                    '34'=>'5',

                    '95'=>'8',

                    '05'=>'0',

                    '15'=>'2',

                    '25'=>'4',

                    '35'=>'6',

                    '96'=>'9',

                    '06'=>'1',

                    '16'=>'3',

                    '26'=>'5',

                    '36'=>'7',

                    '97'=>'0',

                    '07'=>'2',

                    '17'=>'4',

                    '27'=>'6',

                    '37'=>'8',

                    '98'=>'1',

                    '08'=>'3',

                    '18'=>'5',

                    '28'=>'7',

                    '38'=>'9',

                    '99'=>'2',

                    '09'=>'4',

                    '19'=>'6',

                    '29'=>'8',

                    '39'=>'0',

                    '910'=>'3',

                    '010'=>'5',

                    '110'=>'7',

                    '210'=>'9',

                    '310'=>'1',

                    '911'=>'4',

                    '011'=>'6',

                    '1,11'=>'8',

                    '2,11'=>'0',

                    '3,11'=>'2',

                    '912'=>'5',

                    '012'=>'7',

                    '112'=>'9',

                    '212'=>'1',

                    '312'=>'3',

           );

         if( isset( $mang[$key] ) ){

            return $mang[$key];

         }

       }

}                      



if( !function_exists('vi_tri_sao_truong_sinh') ){

       function vi_tri_sao_truong_sinh( $cuc ){

           if( $cuc == 1 || $cuc == 4 ){

              $cung = 9;

           }elseif( $cuc == 2 ){

               $cung = 12;

           }elseif( $cuc == 3 ){

               $cung = 6;

           }else{

               $cung = 3;

           }

           

           return $cung;

       }

}       

        

if( !function_exists('vi_tri_sao_an_quan') ){

       function vi_tri_sao_an_quan( $cung_chua_sao_van_xuong, $ngaysinh ){

            $vitri = $cung_chua_sao_van_xuong;

            for( $i = 1; $i < $ngaysinh-1; $i++ ){

                if( $vitri == 12 ){

                    $vitri = 0;

                }

                $vitri++;

            }

          return $vitri; 

       }

}        



if( !function_exists('vi_tri_sao_thien_quy') ){

       function vi_tri_sao_thien_quy( $cung_chua_sao_van_khuc, $ngaysinh ){

            $vitri = $cung_chua_sao_van_khuc;

            for( $i = 1; $i < $ngaysinh-1; $i++ ){

                if( $vitri == 1 ){

                    $vitri = 13;

                }

                $vitri--;

            }

          return $vitri; 

       }

} 



if( !function_exists('vi_tri_sao_tam_thai') ){

       function vi_tri_sao_tam_thai( $cung_chua_sao_ta_phu, $ngaysinh ){

            $vitri = $cung_chua_sao_ta_phu;

            for( $i = 1; $i < $ngaysinh; $i++ ){

                if( $vitri == 12 ){

                    $vitri = 0;

                }

                $vitri++;

            }

          return $vitri; 

       }

} 



if( !function_exists('vi_tri_sao_bat_toa') ){

       function vi_tri_sao_bat_toa( $cung_chua_sao_huu_bat, $ngaysinh ){

            $vitri = $cung_chua_sao_huu_bat;

            for( $i = 1; $i < $ngaysinh; $i++ ){

                if( $vitri == 1 ){

                    $vitri = 13;

                }

                $vitri--;

            }

          return $vitri; 

       }

}  



if( !function_exists('vi_tri_sao_dau_quan') ){

       function vi_tri_sao_dau_quan( $vi_tri_sao_thai_tue, $thang_sinh, $gio_sinh ){

            $vitri = $vi_tri_sao_thai_tue;

            for( $i = 1; $i < $thang_sinh; $i++ ){

                if( $vitri == 1 ){

                    $vitri = 13;

                }

                $vitri--;

            }

            for( $j = 1; $j < $gio_sinh; $j++ ){

                 if( $vitri == 12 ){

                     $vitri = 0;

                 }

                 $vitri++;

            }

          return $vitri; 

       }

}   



if( !function_exists('vi_tri_sao_thien_tai') ){

       function vi_tri_sao_thien_tai( $vi_tri_cung_menh_vien, $nam_sinh ){

            $vitri = $vi_tri_cung_menh_vien;

            for( $i = 0; $i < $nam_sinh; $i++ ){

                if( $vitri == 12 ){

                    $vitri = 0;

                }

                $vitri++;

            }

            

          return $vitri; 

       }

} 



if( !function_exists('vi_tri_sao_thien_tho') ){

       function vi_tri_sao_thien_tho( $vi_tri_cung_than, $nam_sinh ){

            $vitri = $vi_tri_cung_than;

            for( $i = 0; $i < $nam_sinh; $i++ ){

                if( $vitri == 12 ){

                    $vitri = 0;

                }

                $vitri++;

            }

            

          return $vitri; 

       }

}



if( ! function_exists('chu_menh') ){

         function chu_menh( $chi_nam_sinh ){

             $mang = array(

                                '0'=>'Tham lang',

                                '1'=>'Cự môn',

                                '2'=>'Lộc tồn',

                                '3'=>'Văn khúc',

                                '4'=>'Liêm trinh',

                                '5'=>'Vũ khúc',

                                '6'=>'Phá quân',

                                '7'=>'Vũ khúc',

                                '8'=>'Liêm trinh',

                                '9'=>'Văn khúc',

                                '10'=>'Lộc tồn',

                                '11'=>'Cự môn',

                          );

            return $mang[ $chi_nam_sinh ];

         }

}



if( ! function_exists('chu_than') ){

         function chu_than( $chi_nam_sinh ){

             $mang = array(

                            '0'=>'Linh tinh',

                            '1'=>'Thiên tướng',

                            '2'=>'Thiên lương',

                            '3'=>'Thiên đồng',

                            '4'=>'Văn xương',

                            '5'=>'Thiên cơ',

                            '6'=>'Hỏa tinh',

                            '7'=>'Thiên tướng',

                            '8'=>'Thiên lương',

                            '9'=>'Thiên đồng',

                            '10'=>'Văn xương',

                            '11'=>'Thiên cơ',

                          );

           return $mang[ $chi_nam_sinh ];

         }

}



if( !function_exists( 'xac_dinh_dai_han' ) ){

       function xac_dinh_dai_han( $cuc, $cung, $am_duong ){

        

              $duong_nam_am_nu = array(

                                        '1,1'=>'2',

                                        '1,2'=>'12',

                                        '1,3'=>'22',

                                        '1,4'=>'32',

                                        '1,5'=>'42',

                                        '1,6'=>'52',

                                        '1,7'=>'62',

                                        '1,8'=>'72',

                                        '1,9'=>'82',

                                        '1,10'=>'92',

                                        '1,11'=>'102',

                                        '1,12'=>'112',

                                        '2,1'=>'3',

                                        '2,2'=>'13',

                                        '2,3'=>'23',

                                        '2,4'=>'33',

                                        '2,5'=>'43',

                                        '2,6'=>'53',

                                        '2,7'=>'63',

                                        '2,8'=>'73',

                                        '2,9'=>'83',

                                        '2,10'=>'93',

                                        '2,11'=>'103',

                                        '2,12'=>'113',

                                        '3,1'=>'4',

                                        '3,2'=>'14',

                                        '3,3'=>'24',

                                        '3,4'=>'34',

                                        '3,5'=>'44',

                                        '3,6'=>'54',

                                        '3,7'=>'64',

                                        '3,8'=>'74',

                                        '3,9'=>'84',

                                        '3,10'=>'94',

                                        '3,11'=>'104',

                                        '3,12'=>'114',

                                        '4,1'=>'5',

                                        '4,2'=>'15',

                                        '4,3'=>'25',

                                        '4,4'=>'35',

                                        '4,5'=>'45',

                                        '4,6'=>'55',

                                        '4,7'=>'65',

                                        '4,8'=>'75',

                                        '4,9'=>'85',

                                        '4,10'=>'95',

                                        '4,11'=>'105',

                                        '4,12'=>'115',

                                        '5,1'=>'6',

                                        '5,2'=>'16',

                                        '5,3'=>'26',

                                        '5,4'=>'36',

                                        '5,5'=>'46',

                                        '5,6'=>'56',

                                        '5,7'=>'66',

                                        '5,8'=>'76',

                                        '5,9'=>'86',

                                        '5,10'=>'96',

                                        '5,11'=>'106',

                                        '5,12'=>'116',

                                      );

                $am_nam_duong_nu = array(

                                            '1,1'=>'2',

                                            '1,12'=>'12',

                                            '1,11'=>'22',

                                            '1,10'=>'32',

                                            '1,9'=>'42',

                                            '1,8'=>'52',

                                            '1,7'=>'62',

                                            '1,6'=>'72',

                                            '1,5'=>'82',

                                            '1,4'=>'92',

                                            '1,3'=>'102',

                                            '1,4'=>'112',

                                            '2,1'=>'3',

                                            '2,12'=>'13',

                                            '2,11'=>'23',

                                            '2,10'=>'33',

                                            '2,9'=>'43',

                                            '2,8'=>'53',

                                            '2,7'=>'63',

                                            '2,6'=>'73',

                                            '2,5'=>'83',

                                            '2,4'=>'93',

                                            '2,3'=>'103',

                                            '2,2'=>'113',

                                            '3,1'=>'4',

                                            '3,12'=>'14',

                                            '3,11'=>'24',

                                            '3,10'=>'34',

                                            '3,9'=>'44',

                                            '3,8'=>'54',

                                            '3,7'=>'64',

                                            '3,6'=>'74',

                                            '3,5'=>'84',

                                            '3,4'=>'94',

                                            '3,3'=>'104',

                                            '3,2'=>'114',

                                            '4,1'=>'5',

                                            '4,12'=>'15',

                                            '4,11'=>'25',

                                            '4,10'=>'35',

                                            '4,9'=>'45',

                                            '4,8'=>'55',

                                            '4,7'=>'65',

                                            '4,6'=>'75',

                                            '4,5'=>'85',

                                            '4,4'=>'95',

                                            '4,3'=>'105',

                                            '4,2'=>'115',

                                            '5,1'=>'6',

                                            '5,12'=>'16',

                                            '5,11'=>'26',

                                            '5,10'=>'36',

                                            '5,9'=>'46',

                                            '5,8'=>'56',

                                            '5,7'=>'66',

                                            '5,6'=>'76',

                                            '5,5'=>'86',

                                            '5,4'=>'96',

                                            '5,3'=>'106',

                                            '5,2'=>'116',

                                        );

                       $key = $cuc.','.$cung;

                       if( $am_duong == 1 || $am_duong == 4 ){

                            if( isset( $duong_nam_am_nu[ $key ] ) ){

                                  return $duong_nam_am_nu[ $key ];

                            }

                       }else{

                           if( isset( $am_nam_duong_nu[ $key ] ) ){

                                  return $am_nam_duong_nu[ $key ];

                            }

                       }                                       

       }

}





if( !function_exists( 'xac_dinh_tieu_han' ) ){

        function xac_dinh_tieu_han( $gioitinh, $tuoi, $nam_xem_han ){

              $tieu_han_nam = array(

                                        '0,0'=>'11',

                                        '0,1'=>'12',

                                        '0,2'=>'1',

                                        '0,3'=>'2',

                                        '0,4'=>'3',

                                        '0,5'=>'4',

                                        '0,6'=>'5',

                                        '0,7'=>'6',

                                        '0,8'=>'7',

                                        '0,9'=>'8',

                                        '0,10'=>'9',

                                        '0,11'=>'10',

                                        '1,0'=>'7',

                                        '1,1'=>'8',

                                        '1,2'=>'9',

                                        '1,3'=>'10',

                                        '1,4'=>'11',

                                        '1,5'=>'12',

                                        '1,6'=>'1',

                                        '1,7'=>'2',

                                        '1,8'=>'3',

                                        '1,9'=>'4',

                                        '1,0'=>'5',

                                        '1,11'=>'6',

                                        '2,0'=>'3',

                                        '2,1'=>'4',

                                        '2,2'=>'5',

                                        '2,3'=>'6',

                                        '2,4'=>'7',

                                        '2,5'=>'8',

                                        '2,6'=>'9',

                                        '2,7'=>'10',

                                        '2,8'=>'11',

                                        '2,9'=>'12',

                                        '2,10'=>'1',

                                        '2,11'=>'2',

                                        '3,0'=>'11',

                                        '3,1'=>'12',

                                        '3,2'=>'1',

                                        '3,3'=>'2',

                                        '3,4'=>'3',

                                        '3,5'=>'4',

                                        '3,6'=>'5',

                                        '3,7'=>'6',

                                        '3,8'=>'7',

                                        '3,9'=>'8',

                                        '3,10'=>'9',

                                        '3,11'=>'10',

                                        '4,0'=>'7',

                                        '4,1'=>'8',

                                        '4,2'=>'9',

                                        '4,3'=>'10',

                                        '4,4'=>'11',

                                        '4,5'=>'12',

                                        '4,6'=>'1',

                                        '4,7'=>'2',

                                        '4,8'=>'3',

                                        '4,9'=>'4',

                                        '4,10'=>'5',

                                        '4,11'=>'6',

                                        '5,0'=>'3',

                                        '5,1'=>'4',

                                        '5,2'=>'5',

                                        '5,3'=>'6',

                                        '5,4'=>'7',

                                        '5,5'=>'8',

                                        '5,6'=>'9',

                                        '5,7'=>'10',

                                        '5,8'=>'11',

                                        '5,9'=>'12',

                                        '5,10'=>'1',

                                        '5,11'=>'2',

                                        '6,0'=>'11',

                                        '6,1'=>'12',

                                        '6,2'=>'1',

                                        '6,3'=>'2',

                                        '6,4'=>'3',

                                        '6,5'=>'4',

                                        '6,6'=>'5',

                                        '6,7'=>'6',

                                        '6,8'=>'7',

                                        '6,9'=>'8',

                                        '6,10'=>'9',

                                        '6,11'=>'10',

                                        '7,0'=>'7',

                                        '7,1'=>'8',

                                        '7,2'=>'9',

                                        '7,3'=>'10',

                                        '7,4'=>'11',

                                        '7,5'=>'12',

                                        '7,6'=>'1',

                                        '7,7'=>'2',

                                        '7,8'=>'3',

                                        '7,9'=>'4',

                                        '7,10'=>'5',

                                        '7,11'=>'6',

                                        '8,0'=>'3',

                                        '8,1'=>'4',

                                        '8,2'=>'5',

                                        '8,3'=>'6',

                                        '8,4'=>'7',

                                        '8,5'=>'8',

                                        '8,6'=>'9',

                                        '8,7'=>'10',

                                        '8,8'=>'11',

                                        '8,9'=>'12',

                                        '8,10'=>'1',

                                        '8,11'=>'2',

                                        '9,0'=>'11',

                                        '9,1'=>'12',

                                        '9,2'=>'1',

                                        '9,3'=>'2',

                                        '9,4'=>'3',

                                        '9,5'=>'4',

                                        '9,6'=>'5',

                                        '9,7'=>'6',

                                        '9,8'=>'7',

                                        '9,9'=>'8',

                                        '9,10'=>'9',

                                        '9,11'=>'10',

                                        '10,0'=>'7',

                                        '10,1'=>'8',

                                        '10,2'=>'9',

                                        '10,3'=>'10',

                                        '10,4'=>'11',

                                        '10,5'=>'12',

                                        '10,6'=>'1',

                                        '10,7'=>'2',

                                        '10,8'=>'3',

                                        '10,9'=>'4',

                                        '10,10'=>'5',

                                        '10,11'=>'6',

                                        '11,0'=>'3',

                                        '11,1'=>'4',

                                        '11,2'=>'5',

                                        '11,3'=>'6',

                                        '11,4'=>'7',

                                        '11,5'=>'8',

                                        '11,6'=>'9',

                                        '11,7'=>'10',

                                        '11,8'=>'11',

                                        '11,9'=>'12',

                                        '11,10'=>'1',

                                        '11,11'=>'2',

                                   );

                  $tieu_han_nu = array(

                                            '0,0'=>'11',

                                            '0,1'=>'10',

                                            '0,2'=>'9',

                                            '0,3'=>'8',

                                            '0,4'=>'7',

                                            '0,5'=>'6',

                                            '0,6'=>'5',

                                            '0,7'=>'4',

                                            '0,8'=>'3',

                                            '0,9'=>'2',

                                            '0,10'=>'1',

                                            '0,11'=>'12',

                                            '1,0'=>'9',

                                            '1,1'=>'8',

                                            '1,2'=>'7',

                                            '1,3'=>'6',

                                            '1,4'=>'5',

                                            '1,5'=>'4',

                                            '1,6'=>'3',

                                            '1,7'=>'2',

                                            '1,8'=>'1',

                                            '1,9'=>'12',

                                            '1,10'=>'11',

                                            '1,11'=>'10',

                                            '2,0'=>'7',

                                            '2,1'=>'6',

                                            '2,2'=>'5',

                                            '2,3'=>'4',

                                            '2,4'=>'3',

                                            '2,5'=>'2',

                                            '2,6'=>'1',

                                            '2,7'=>'12',

                                            '2,8'=>'11',

                                            '2,9'=>'10',

                                            '2,10'=>'9',

                                            '2,11'=>'8',

                                            '3,0'=>'5',

                                            '3,1'=>'4',

                                            '3,2'=>'6',

                                            '3,3'=>'2',

                                            '3,4'=>'1',

                                            '3,5'=>'12',

                                            '3,6'=>'11',

                                            '3,7'=>'10',

                                            '3,8'=>'9',

                                            '3,9'=>'8',

                                            '3,10'=>'7',

                                            '3,11'=>'6',

                                            '4,0'=>'3',

                                            '4,1'=>'2',

                                            '4,2'=>'1',

                                            '4,3'=>'12',

                                            '4,4'=>'11',

                                            '4,5'=>'10',

                                            '4,6'=>'9',

                                            '4,7'=>'8',

                                            '4,8'=>'7',

                                            '4,9'=>'6',

                                            '4,10'=>'5',

                                            '4,11'=>'4',

                                            '5,0'=>'1',

                                            '5,1'=>'12',

                                            '5,2'=>'11',

                                            '5,3'=>'10',

                                            '5,4'=>'9',

                                            '5,5'=>'8',

                                            '5,6'=>'7',

                                            '5,7'=>'6',

                                            '5,8'=>'5',

                                            '5,9'=>'4',

                                            '5,10'=>'3',

                                            '5,11'=>'2',

                                            '6,0'=>'11',

                                            '6,1'=>'10',

                                            '6,2'=>'9',

                                            '6,3'=>'8',

                                            '6,4'=>'7',

                                            '6,5'=>'6',

                                            '6,6'=>'5',

                                            '6,7'=>'4',

                                            '6,8'=>'3',

                                            '6,9'=>'2',

                                            '6,10'=>'1',

                                            '6,11'=>'12',

                                            '7,0'=>'9',

                                            '7,1'=>'8',

                                            '7,2'=>'7',

                                            '7,3'=>'6',

                                            '7,4'=>'5',

                                            '7,5'=>'4',

                                            '7,6'=>'3',

                                            '7,7'=>'2',

                                            '7,8'=>'1',

                                            '7,9'=>'12',

                                            '7,10'=>'11',

                                            '7,11'=>'10',

                                            '8,0'=>'7',

                                            '8,1'=>'6',

                                            '8,2'=>'5',

                                            '8,3'=>'4',

                                            '8,4'=>'3',

                                            '8,5'=>'2',

                                            '8,6'=>'1',

                                            '8,7'=>'12',

                                            '8,8'=>'11',

                                            '8,9'=>'10',

                                            '8,10'=>'9',

                                            '8,11'=>'8',

                                            '9,0'=>'5',

                                            '9,1'=>'4',

                                            '9,2'=>'3',

                                            '9,3'=>'2',

                                            '9,4'=>'1',

                                            '9,5'=>'12',

                                            '9,6'=>'11',

                                            '9,7'=>'10',

                                            '9,8'=>'9',

                                            '9,9'=>'8',

                                            '9,10'=>'7',

                                            '9,11'=>'6',

                                            '10,0'=>'3',

                                            '10,1'=>'2',

                                            '10,2'=>'1',

                                            '10,3'=>'12',

                                            '10,4'=>'11',

                                            '10,5'=>'10',

                                            '10,6'=>'9',

                                            '10,7'=>'8',

                                            '10,8'=>'7',

                                            '10,9'=>'6',

                                            '10,10'=>'5',

                                            '10,11'=>'4',

                                            '11,0'=>'1',

                                            '11,1'=>'12',

                                            '11,2'=>'11',

                                            '11,3'=>'10',

                                            '11,4'=>'9',

                                            '11,5'=>'8',

                                            '11,6'=>'7',

                                            '11,7'=>'6',

                                            '11,8'=>'5',

                                            '11,9'=>'4',

                                            '11,10'=>'3',

                                            '11,11'=>'2',  

                                      );    

                $key = $tuoi.','.$nam_xem_han;

                if( $gioitinh == 1 ){

                     return $tieu_han_nam[ $key ];

                }else{

                     return $tieu_han_nu[ $key ];

                }                                            

       

        }

}





if( !function_exists( 'sao_luu_dong' ) ){

      function sao_luu_dong($chi_nam_xem, $can_nam_xem, $cung ){

        

           $sao_theo_chi_nam = array(

                                        '1'=>'Lưu thái tuế',

                                        '2'=>'Lưu thiên khốc',

                                        '3'=>'Lưu thiên hư',

                                        '4'=>'Lưu tang môn',

                                        '5'=>'Lưu bạch hổ',

                                        '6'=>'Lưu thiên mã',

                                    );

          $an_sao_theo_chi_nam = array(

                                            '0,1'=>'1',

                                            '1,2'=>'1',

                                            '2,3'=>'1',

                                            '3,4'=>'1',

                                            '4,5'=>'1',

                                            '5,6'=>'1',

                                            '6,7'=>'1',

                                            '7,8'=>'1',

                                            '8,9'=>'1',

                                            '9,10'=>'1',

                                            '10,11'=>'1',

                                            '11,12'=>'1',

                                            '0,7'=>'2',

                                            '1,6'=>'2',

                                            '2,5'=>'2',

                                            '3,4'=>'2',

                                            '4,3'=>'2',

                                            '5,2'=>'2',

                                            '6,1'=>'2',

                                            '7,12'=>'2',

                                            '8,11'=>'2',

                                            '9,10'=>'2',

                                            '10,9'=>'2',

                                            '11,8'=>'2',

                                            '0,7'=>'3',

                                            '1,8'=>'3',

                                            '2,9'=>'3',

                                            '3,10'=>'3',

                                            '4,11'=>'3',

                                            '5,12'=>'3',

                                            '6,1'=>'3',

                                            '7,2'=>'3',

                                            '8,3'=>'3',

                                            '9,4'=>'3',

                                            '10,5'=>'3',

                                            '11,6'=>'3',

                                            '0,3'=>'4',

                                            '1,4'=>'4',

                                            '2,5'=>'4',

                                            '3,6'=>'4',

                                            '4,7'=>'4',

                                            '5,8'=>'4',

                                            '6,9'=>'4',

                                            '7,10'=>'4',

                                            '8,11'=>'4',

                                            '9,12'=>'4',

                                            '10,1'=>'4',

                                            '11,2'=>'4',

                                            '0,9'=>'5',

                                            '1,10'=>'5',

                                            '2,11'=>'5',

                                            '3,12'=>'5',

                                            '4,1'=>'5',

                                            '5,2'=>'5',

                                            '6,3'=>'5',

                                            '7,4'=>'5',

                                            '8,5'=>'5',

                                            '9,6'=>'5',

                                            '10,7'=>'5',

                                            '11,8'=>'5',

                                            '0,3'=>'6',

                                            '1,12'=>'6',

                                            '2,9'=>'6',

                                            '3,6'=>'6',

                                            '4,3'=>'6',

                                            '5,12'=>'6',

                                            '6,9'=>'6',

                                            '7,6'=>'6',

                                            '8,3'=>'6',

                                            '9,12'=>'6',

                                            '10,9'=>'6',

                                            '11,6'=>'6',

                                      ); 

                $sao_theo_can_nam = array(

                                             '1'=>'lưu lộc tồn',

                                             '2'=>'lưu kình dương',

                                             '3'=>'lưu đà la',

                                          ); 

               $an_sao_theo_can_nam = array(

                                                '4,3'=>'1',

                                                '5,4'=>'1',

                                                '6,6'=>'1',

                                                '7,7'=>'1',

                                                '8,6'=>'1',

                                                '9,7'=>'1',

                                                '0,9'=>'1',

                                                '1,10'=>'1',

                                                '2,12'=>'1',

                                                '3,1'=>'1',

                                                '4,4'=>'2',

                                                '5,5'=>'2',

                                                '6,7'=>'2',

                                                '7,8'=>'2',

                                                '8,7'=>'2',

                                                '9,8'=>'2',

                                                '0,10'=>'2',

                                                '1,11'=>'2',

                                                '2,1'=>'2',

                                                '3,2'=>'2',

                                                '4,2'=>'3',

                                                '5,3'=>'3',

                                                '6,5'=>'3',

                                                '7,6'=>'3',

                                                '8,5'=>'3',

                                                '9,6'=>'3',

                                                '0,8'=>'3',

                                                '1,9'=>'3',

                                                '2,11'=>'3',

                                                '3,12'=>'3',

                                            );                                                                         

         $key_chi_nam_xem = $chi_nam_xem.','.$cung;

         $rt ='';

         if( isset( $an_sao_theo_chi_nam[ $key_chi_nam_xem ] ) ){

             

             $rt ='<li>'.$sao_theo_chi_nam[ $an_sao_theo_chi_nam[ $key_chi_nam_xem ] ].'</li>';

         }

         $key_can_nam_xem = $can_nam_xem.','.$cung;

         if( isset( $an_sao_theo_can_nam[ $key_can_nam_xem ] ) ){

             

             $rt ='<li>'.$sao_theo_can_nam[ $an_sao_theo_can_nam[ $key_can_nam_xem ] ].'</li>';

         }

         return $rt;

      }

}



if( !function_exists( 'xac_dinh_han_thang' ) ){

    

        function xac_dinh_han_thang( $vi_tri_tieu_han, $gio_sinh_chi, $thang_sinh_am ){

             

             $start = $vi_tri_tieu_han;

             for( $i = 1; $i < $gio_sinh_chi; $i++ ){

                 $start++;

                 if( $start > 12 ){

                     $start = 1;

                 }

             }

             

             for( $i = 1; $i< $thang_sinh_am; $i++ ){

                $start--;

                if( $start < 1 ){

                     $start = 12;

                 }

             }

             

            return $start; 

         }

}



if( !function_exists( 'ngu_hanh_nap_am_ban_menh' ) ){

    function ngu_hanh_nap_am_ban_menh( $can, $chi ){

        

          $mang_can_chi = array(

                    '4,0'=>'1',

                    '5,1'=>'1',

                    '6,2'=>'2',

                    '7,3'=>'2',

                    '8,4'=>'3',

                    '9,5'=>'3',

                    '0,6'=>'4',

                    '1,7'=>'4',

                    '2,8'=>'5',

                    '3,9'=>'5',

                    '4,10'=>'6',

                    '5,11'=>'6',

                    '6,0'=>'7',

                    '7,1'=>'7',

                    '8,2'=>'8',

                    '9,3'=>'8',

                    '0,4'=>'9',

                    '1,5'=>'9',

                    '2,6'=>'10',

                    '3,7'=>'10',

                    '4,8'=>'11',

                    '5,9'=>'11',

                    '6,10'=>'12',

                    '7,11'=>'12',

                    '8,0'=>'13',

                    '9,1'=>'13',

                    '0,2'=>'14',

                    '1,3'=>'14',

                    '2,4'=>'15',

                    '3,5'=>'15',

                    '4,6'=>'16',

                    '5,7'=>'16',

                    '6,8'=>'17',

                    '7,9'=>'17',

                    '8,10'=>'18',

                    '9,11'=>'18',

                    '0,0'=>'19',

                    '1,1'=>'19',

                    '2,2'=>'20',

                    '3,3'=>'20',

                    '4,4'=>'21',

                    '5,5'=>'21',

                    '6,6'=>'22',

                    '7,7'=>'22',

                    '8,8'=>'23',

                    '9,9'=>'23',

                    '0,10'=>'24',

                    '1,11'=>'24',

                    '2,0'=>'25',

                    '3,1'=>'25',

                    '4,2'=>'26',

                    '5,3'=>'26',

                    '6,4'=>'27',

                    '7,5'=>'27',

                    '8,6'=>'28',

                    '9,7'=>'28',

                    '0,8'=>'29',

                    '1,9'=>'29',

                    '2,10'=>'30',

                    '3,11'=>'30',

          );

          

         $mang_result = array(

                    '1'=>'Hải Trung Kim',

                    '2'=>'Lư Trung Hỏa',

                    '3'=>'Đại Lâm Mộc',

                   '4'=> 'Lộ Bàng Thổ',

                    '5'=>'Kiếm Phong Kim',

                   '6'=> 'Sơn Đầu Hỏa',

                   '7'=> 'Giản Hạ Thủy',

                  '8'=>  'Thành Đầu Thổ',

                  '9'=>  'Bạch Lạp Kim',

                  '10'=>  'Dương Liễu Mộc',

                  '11'=>  'Tuyền Trung Thủy',

                  '12'=>  'Ốc Thượng Thổ',

                  '13'=>  'Tích Lịch Thủy',

                  '14'=>  'Tùng Bách Mộc',

                  '15'=>  'Trường Lưu Thủy',

                  '16'=>  'Sa Trung Kim',

                  '17'=>  'Sơn Hạ Hỏa',

                  '18'=>  'Bình Địa Mộc',

                  '19'=>  'Bích Thượng Thổ',

                 '20'=>   'Kim Bạch Kim',

                 '21'=>   'Phúc Dăng Hỏa',

                 '22'=>   'Thiên Hà Thủy',

                 '23'=>   'Đại Dịch Thổ',

                 '24'=>   'Thoa Xuyến Kim',

                  '25'=>  'Tang Đố Mộc',

                  '26'=>  'Đại khê Thủy',

                  '27'=>  'Sa Trung Thổ',

                  '28'=>  'Thiên Thượng Hỏa',

                 '29'=>   'Thạch Lựu Mộc',

                 '30'=>   'Đại Hải Thủy',

         ); 

         

        $key = $can.','.$chi;

        if( isset( $mang_can_chi[$key] ) ){

             return $mang_result[ $mang_can_chi[ $key ] ];

        }else{

            return '';

        } 

    }

}

    

    

if( !function_exists( 'cung_html' ) ){

       function cung_html( $val, $key, $tuan, $triet ){

            $html='<div class="cung cung_'.$key.'" style="">

            <div class="cung_content">';

            @$html.='<div class="c_giap">'.$val['can_cung_dai_van'].' '.con_giap( $key ).'</div>';   

            $html.='<div class="daihan" >'.$val['dai_han'].'</div>';  

            $html.='<p style="font-weight:bold;padding:2px 0px">'.$val['cung'].'</p>'; 

            $html.='<p style="font-weight:bold;padding:2px 0px">'. $val['sao']['sao1'].'</p>';

            $html.='<p style="font-weight:bold;padding:2px 0px">'. $val['sao']['sao2'].'</p>';

            $html.='<ul class="sao_left">';

                 if( isset( $val['sao_theo_gio']['left'] ) && !empty( $val['sao_theo_gio']['left'] ) ){

                       foreach( $val['sao_theo_gio']['left'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 }

                 if( isset( $val['sao_theo_thang']['left'] ) && !empty( $val['sao_theo_thang']['left'] ) ){

                       foreach( $val['sao_theo_thang']['left'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 }

                 if( isset( $val['sao_theo_can_va_cung']['left'] ) && !empty( $val['sao_theo_can_va_cung']['left'] ) ){

                       foreach( $val['sao_theo_can_va_cung']['left'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 } 

                 if( isset( $val['sao_theo_chi_va_cung']['left'] ) && !empty( $val['sao_theo_chi_va_cung']['left'] ) ){

                       foreach( $val['sao_theo_chi_va_cung']['left'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 }    

                 if( isset( $val['sao_thai_tue']['left'] ) && !empty( $val['sao_thai_tue']['left'] ) ){

                       foreach( $val['sao_thai_tue']['left'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 } 

                 if( isset( $val['sao_theo_loc_ton']['left'] ) && !empty( $val['sao_theo_loc_ton']['left'] ) ){

                       foreach( $val['sao_theo_loc_ton']['left'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 } 

                 if( isset( $val['sao_theo_truong_sinh']['left'] ) && !empty( $val['sao_theo_truong_sinh']['left'] ) ){

                       foreach( $val['sao_theo_truong_sinh']['left'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 }

                 if( isset( $val['sao_an_quan'] ) ){ $html.='<li>'.$val['sao_an_quan'].'</li>'; } 

                 if( isset( $val['sao_thien_quy'] ) ){ $html.='<li>'.$val['sao_thien_quy'].'</li>'; }  

                 if( isset( $val['sao_tam_thai'] ) ){ $html.='<li>'.$val['sao_tam_thai'].'</li>'; }  

                 if( isset( $val['sao_bat_toa'] ) ){ $html.='<li>'.$val['sao_bat_toa'].'</li>'; }  

                 if( isset( $val['sao_thien_tai'] ) ){ $html.='<li>'.$val['sao_thien_tai'].'</li>'; }  

                 if( isset( $val['sao_thien_tho'] ) ){ $html.='<li>'.$val['sao_thien_tho'].'</li>'; }   

                 if( isset( $val['sao_hoa_loc_va_hoa_quyen']['left'] ) && !empty( $val['sao_hoa_loc_va_hoa_quyen']['left'] ) ){

                       foreach( $val['sao_hoa_loc_va_hoa_quyen']['left'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 }

                 if( isset( $val['sao_hoa_khoa_va_hoa_ky']['left'][0] ) ){ $html.='<li>'.$val['sao_hoa_khoa_va_hoa_ky']['left'][0].'</li>'; }  

            $html.='</ul>';

            $html.='<ul class="sao_right" style="text-align:right">';

                 if( isset( $val['hoa_tinh'] ) ){

                      $html.='<li>'.$val['hoa_tinh'].'</li>';

                 }

                 if( isset( $val['linh_tinh'] ) ){

                      $html.='<li>'.$val['linh_tinh'].'</li>';

                 }

                 if( isset( $val['sao_theo_gio']['right'] ) && !empty( $val['sao_theo_gio']['right'] ) ){

                       foreach( $val['sao_theo_gio']['right'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 }

                 if( isset( $val['sao_theo_thang']['right'] ) && !empty( $val['sao_theo_thang']['right'] ) ){

                       foreach( $val['sao_theo_thang']['right'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 }

                 if( isset( $val['sao_theo_can_va_cung']['right'] ) && !empty( $val['sao_theo_can_va_cung']['right'] ) ){

                       foreach( $val['sao_theo_can_va_cung']['right'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 } 

                 if( isset( $val['sao_theo_chi_va_cung']['right'] ) && !empty( $val['sao_theo_chi_va_cung']['right'] ) ){

                       foreach( $val['sao_theo_chi_va_cung']['right'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 }    

                 if( isset( $val['sao_thai_tue']['right'] ) && !empty( $val['sao_thai_tue']['right'] ) ){

                       foreach( $val['sao_thai_tue']['right'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 } 

                 if( isset( $val['sao_theo_loc_ton']['right'] ) && !empty( $val['sao_theo_loc_ton']['right'] ) ){

                       foreach( $val['sao_theo_loc_ton']['right'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 } 

                 if( isset( $val['sao_theo_truong_sinh']['right'] ) && !empty( $val['sao_theo_truong_sinh']['right'] ) ){

                       foreach( $val['sao_theo_truong_sinh']['right'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 }

                 if( isset( $val['sao_thien_la'] ) ){ $html.='<li>'.$val['sao_thien_la'].'</li>'; }

                 //if( isset( $val['sao_an_quan'] ) ){ $html.='<li>'.$val['sao_an_quan'].'</li>'; } 

                // if( isset( $val['sao_thien_quy'] ) ){ $html.='<li>'.$val['sao_thien_quy'].'</li>'; }  

                 if( isset( $val['sao_tam_thai'] ) ){ $html.='<li>'.$val['sao_tam_thai'].'</li>'; }  

                 if( isset( $val['sao_bat_toa'] ) ){ $html.='<li>'.$val['sao_bat_toa'].'</li>'; }  

                 if( isset( $val['sao_thien_tai'] ) ){ $html.='<li>'.$val['sao_thien_tai'].'</li>'; }  

                 if( isset( $val['sao_thien_tho'] ) ){ $html.='<li>'.$val['sao_thien_tho'].'</li>'; }  

                 if( isset( $val['sao_dia_vong'] ) ){ $html.='<li>'.$val['sao_dia_vong'].'</li>'; }   

                 if( isset( $val['sao_hoa_loc_va_hoa_quyen']['right'] ) && !empty( $val['sao_hoa_loc_va_hoa_quyen']['right'] ) ){

                       foreach( $val['sao_hoa_loc_va_hoa_quyen']['right'] as $val1 ){

                           $html.='<li>'.$val1.'</li>';

                       }

                 }

                 if( isset( $val['sao_hoa_khoa_va_hoa_ky']['right'] ) ){ $html.='<li>'.$val['sao_hoa_khoa_va_hoa_ky']['right'].'</li>'; }  

                 $html.=$val['sao_luu_dong'];

                 if( isset( $val['sao_dau_quan'] ) ){ $html.='<li>'.$val['sao_dau_quan'].'</li>'; } 

                 if( isset( $val['sao_thien_thuong'] ) ){ $html.='<li>'.$val['sao_thien_thuong'].'</li>'; } 

                 if( isset( $val['sao_thien_su'] ) ){ $html.='<li>'.$val['sao_thien_su'].'</li>'; } 

            $html.='</ul>';

            $html.='<div class="tieu_han">'. $val['tieu_han'].'</div>';

            $html.='<div class="han_thang">'.$val['han_thang'].'</div>';

            if( $tuan == $key ){ $html.='<span class="triet triet'.$key.'">Tuần</span>'; }

            if( $triet == $key ){ $html.='<span class="triet triet'.$key.'">Triệt</span>'; }

            $html.='</div></div>';

            return $html;

       }

} 



if( !function_exists( 'color_chinh_dieu' ) ){

        function color_chinh_dieu( $key ){

            $mang = array(

                            '1'=>'3',

                            '2'=>'3',

                            '3'=>'3',

                            '4'=>'3',

                            '5'=>'1',

                            '6'=>'1',

                            '7'=>'1',

                            '8'=>'1',

                            '9'=>'5',

                            '10'=>'5',

                            '11'=>'5',

                            '12'=>'5',

                            '13'=>'3',

                            '14'=>'3',

                            '15'=>'3',

                            '16'=>'3',

                            '17'=>'2',

                            '18'=>'2',

                            '19'=>'2',

                            '20'=>'2',

                            '21'=>'4',

                            '22'=>'4',

                            '23'=>'4',

                            '24'=>'4',

                            '25'=>'1',

                            '26'=>'1',

                            '27'=>'1',

                            '28'=>'1',

                            '29'=>'2',

                            '30'=>'2',

                            '31'=>'2',

                            '32'=>'2',

                            '33'=>'1',

                            '34'=>'1',

                            '35'=>'1',

                            '36'=>'1',

                            '37'=>'1',

                            '38'=>'1',

                            '39'=>'1',

                            '40'=>'1',

                            '41'=>'2',

                            '42'=>'2',

                            '43'=>'2',

                            '44'=>'2',

                            '45'=>'5',

                            '46'=>'5',

                            '47'=>'5',

                            '48'=>'5',

                            '49'=>'1',

                            '50'=>'1',

                            '51'=>'1',

                            '52'=>'1',

                            '53'=>'4',

                            '54'=>'4',

                            '55'=>'4',

                            '56'=>'4',

                         );

                return $mang[ $key ];         

                         

        }

}



if( !function_exists( 'color_sao_theo_gio' ) ){

        function color_sao_theo_gio( $key ){

            $mang = array(

                                '1'=>'1',

                                '2'=>'5',

                                '3'=>'5',

                                '4'=>'4',

                                '5'=>'3',

                                '6'=>'3',

                         );

           return $mang[ $key ];                 

        }

}        



if( !function_exists( 'color_sao_theo_thang' ) ){

        function color_sao_theo_thang( $key ){

            $mang = array(

                                '1'=>'1',

                                '2'=>'4',

                                '3'=>'3',

                                '4'=>'1',

                                '5'=>'1',

                                '6'=>'3',

                                '7'=>'4',

                         );

           return $mang[ $key ];                 

        }

}



if( !function_exists( 'color_sao_theo_can_va_cung' ) ){

        function color_sao_theo_can_va_cung( $key ){

            $mang = array(

                                '1'=>'5',

                                '2'=>'4',

                                '3'=>'5',

                                '4'=>'4',

                                '5'=>'2',

                                '6'=>'5',

                                '7'=>'3',

                                '8'=>'3',

                                '9'=>'3',

                                '10'=>'4',

                                '11'=>'1',

                                '12'=>'4',

                         );

           return $mang[ $key ];                 

        }

}                          

     

if( !function_exists( 'color_sao_theo_chi_va_cung' ) ){

        function color_sao_theo_chi_va_cung( $key ){

            $mang = array(

                                '1'=>'2',

                                '2'=>'5',

                                '3'=>'3',

                                '4'=>'2',

                                '5'=>'3',

                                '6'=>'4',

                                '7'=>'4',

                                '8'=>'3',

                                '9'=>'5',

                                '10'=>'1',

                                '11'=>'3',

                                '12'=>'3',

                                '13'=>'1',

                                '14'=>'1',

                                '15'=>'1',

                                '16'=>'2',

                                '17'=>'2',

                         );

           return $mang[ $key ];                 

        }

}  



if( !function_exists( 'color_vong_sao_thai_tue' ) ){

        function color_vong_sao_thai_tue( $key ){

            $mang = array(

                                '1'=>'3',

                                '2'=>'3',

                                '3'=>'2',

                                '4'=>'1',

                                '5'=>'3',

                                '6'=>'3',

                                '7'=>'3',

                                '8'=>'1',

                                '9'=>'5',

                                '10'=>'4',

                                '11'=>'3',

                                '12'=>'3',

                         );

           return $mang[ $key ];                 

        }

} 



if( !function_exists( 'color_sao_theo_loc_ton' ) ){

        function color_sao_theo_loc_ton( $key ){

            $mang = array(

                                '1'=>'1',

                                '2'=>'3',

                                '3'=>'1',

                                '4'=>'3',

                                '5'=>'2',

                                '6'=>'5',

                                '7'=>'3',

                                '8'=>'3',

                                '9'=>'4',

                                '10'=>'3',

                                '11'=>'3',

                                '12'=>'3',

                         );

           return $mang[ $key ];                 

        }

}