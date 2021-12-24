<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Xem thu trong tuan
if ( ! function_exists('xemngay_thu'))
{
	function xemngay_thu( $ngay, $thang, $nam, $number = false ){
        $weekday = date("l", mktime(0, 0, 0, $thang, $ngay, $nam));
        $weekday = strtolower($weekday);
        switch($weekday) {
            case 'monday':
                if( $number ){ $weekday = 2; }else{ $weekday = 'Thứ hai'; }
                break;
            case 'tuesday':
                if( $number ){ $weekday = 3; }else{ $weekday = 'Thứ ba'; }
                break;
            case 'wednesday':
                if( $number ){ $weekday = 4; }else{ $weekday = 'Thứ tư'; }
                break;
            case 'thursday':
                if( $number ){ $weekday = 5; }else{ $weekday = 'Thứ năm'; }
                break;
            case 'friday':
                if( $number ){ $weekday = 6; }else{ $weekday = 'Thứ sáu'; } 
                break;
            case 'saturday':
                if( $number ){ $weekday = 7; }else{ $weekday = 'Thứ bảy'; }
                break;
            default:
                if( $number ){ $weekday = 8; }else{ $weekday = 'Chủ nhật'; }
                break;
        }
        return $weekday;
	}
}

if( ! function_exists( 'getCan' ) ){
        function getCan( $key )
    {
        
		$mang = array(
                       '1' => 'Giáp',
                       '2' => 'Ất',
                       '3' => 'Bính',
                       '4' => 'Đinh',
                       '5' => 'Mậu',
                       '6' => 'Kỷ',
                       '7' => 'Canh',
                       '8' => 'Tân',
                       '9' => 'Nhâm',
                       '10'=> 'Quý'
        );

		return $mang[ $key ];
    }
}

if( ! function_exists( 'getChi' ) ){
        function getChi( $key )
    {
        
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

		return $mang[ $key ];
    }
}
if( ! function_exists( 'getCanThang' ) ){
        function getCanThang($nam, $thang)
            {
                $number = substr($nam, 3);
                if ($number == 1 || $number == 6)
                    $can = 7;
                if ($number == 2 || $number == 7)
                    $can = 9;
                if ($number == 3 || $number == 8)
                    $can = 1;
                if ($number == 4 || $number == 9)
                    $can = 3;
                if ($number == 5 || $number == 0)
                    $can = 5;
                $m = ($can + $thang - 1) % 10;
                if ($m == 0)
                    $m = 10;
                return getCan($m);
            }
}    

if( ! function_exists( 'getCanChiNgay' ) ){    
    function getCanChiNgay($n, $songay, $y)
    {
        $t1  = ($y - 1) * 365.25 + $songay - $n;
        $t2  = (int) ($t1 / 60);
        $t   = $t1 - $t2 * 60;
        $chi = $t % 12;
        
        if ($chi == 0)
            $chi = 12;
        $canchi['chi'] = $chi;
        
        $can = $t % 10;
        if ($can == 0)
            $can = 10;
        $canchi['can'] = $can;
        return $canchi;
    }
} 

if( ! function_exists( 'getCanChiThang' ) ){  
        function getCanChiThang( $thang, $nam ){
            $t         = $thang >= 11 ? $thang - 10 : $thang + 2;
            $thang_chi = getChi($t);
            $thang_can = getcanThang($nam, $thang);
            return $thang_can.' '.$thang_chi;
        }
}

if( !function_exists( 'getCanChiNam' ) ){
        function getCanChiNam( $nam ){
            $t       = (int) substr($nam, 3);
            $t       = $t >= 4 ? $t - 4 + 1 : ($t + 10 - 4 + 1);
            $nam_can = getCan($t);
            $t       = $nam % 12;
            $t       = $t >= 4 ? $t - 4 + 1 : ($t + 12 - 4 + 1);
            $nam_chi = getChi($t);
            return $nam_can.' '.$nam_chi;
        }
}

if( ! function_exists( 'xn_tiet_khi' ) ){
      function xn_tiet_khi( $key ){
          $mang = array(
                            '1'=>'lập xuân',
                            '2'=>'kinh trập',
                            '3'=>'thanh minh',
                            '4'=>'lập hạ',
                            '5'=>'mang chủng',
                            '6'=>'tiểu thử',
                            '7'=>'lập thu',
                            '8'=>'bạch lộ',
                            '9'=>'hàn lộ',
                            '10'=>'lập đông',
                            '11'=>'đại tuyết',
                            '12'=>'tiểu hàn',
                       );
         return $mang[ $key ];
      }
}


if( !function_exists( 'xem_tiet_khi' ) ){
         function xem_tiet_khi( $ngay, $thang, $nam, $r_id = false ){
            $ngay_hien_tai  = strtotime( $ngay.'-'.$thang.'-'.$nam );
            $nam1 = $nam + 1;
            if( $ngay_hien_tai >= strtotime( '4-2-'.$nam ) &&  $ngay_hien_tai < strtotime( '19-2-'.$nam )  ){
                  $rt = 'Lập xuân ( Bước vào mùa xuân )';
                  $id = 1;
            }elseif( $ngay_hien_tai >= strtotime( '19-2-'.$nam ) &&  $ngay_hien_tai < strtotime( '5-3-'.$nam ) ){
                  $rt = 'Vũ thủy ( Mưa Ẩm )';
                  $id = 1;
            }elseif( $ngay_hien_tai >= strtotime( '5-3-'.$nam ) && $ngay_hien_tai < strtotime( '21-3-'.$nam ) ){
                  $rt = 'Kinh trập ( Sâu nở )';
                  $id = 2;
            }elseif( $ngay_hien_tai >= strtotime( '21-3-'.$nam ) && $ngay_hien_tai < strtotime( '5-4-'.$nam ) ){
                 $rt  = 'Xuân phân ( Giữa xuân )';
                 $id = 2;
            }elseif( $ngay_hien_tai >= strtotime( '5-4-'.$nam ) && $ngay_hien_tai < strtotime( '20-4-'.$nam ) ){
                 $rt  = 'Thanh minh ( Trong sáng )';
                 $id = 3;
            }elseif( $ngay_hien_tai >= strtotime( '20-4-'.$nam ) && $ngay_hien_tai < strtotime( '6-5-'.$nam ) ){
                 $rt  = 'Cốc vũ ( Mưa rào )';
                 $id = 3;
            }elseif( $ngay_hien_tai >= strtotime( '6-5-'.$nam ) && $ngay_hien_tai < strtotime( '21-5-'.$nam ) ){
                 $rt  = 'Lập hạ ( Bước vào mùa hạ )';
                 $id = 4;
            }elseif( $ngay_hien_tai >= strtotime( '21-5-'.$nam ) && $ngay_hien_tai < strtotime( '7-6-'.$nam ) ){
                 $rt  = 'Tiểu mãn ( Lũ nhỏ )';
                 $id = 4;
            }elseif( $ngay_hien_tai >= strtotime( '6-6-'.$nam ) && $ngay_hien_tai < strtotime( '22-6-'.$nam ) ){
                 $rt  = 'Mang chủng ( Chòm sao tua rua xuất hiện )';
                 $id = 5;
            }elseif( $ngay_hien_tai >= strtotime( '22-6-'.$nam ) && $ngay_hien_tai < strtotime( '8-7-'.$nam ) ){
                 $rt  = 'Hạ chí ( Giữa mùa hạ )';
                 $id = 5;
            }elseif( $ngay_hien_tai >= strtotime( '8-7-'.$nam ) && $ngay_hien_tai < strtotime( '24-7-'.$nam ) ){
                 $rt  = 'Tiểu thử ( Nắng nhẹ )';
                 $id = 6;
            }elseif( $ngay_hien_tai >= strtotime( '24-7-'.$nam ) && $ngay_hien_tai < strtotime( '8-8-'.$nam ) ){
                 $rt  = 'Đại thử ( Nắng oi )';
                 $id = 6;
            }elseif( $ngay_hien_tai >= strtotime( '7-8-'.$nam ) && $ngay_hien_tai < strtotime( '23-8-'.$nam ) ){
                 $rt  = 'Lập thu ( Bước vào mùa thu )';
                 $id = 7;
            }elseif( $ngay_hien_tai >= strtotime( '23-8-'.$nam ) && $ngay_hien_tai < strtotime( '8-9-'.$nam ) ){
                 $rt  = 'Xử thử ( Mưa ngâu )';
                 $id = 7;
            }elseif( $ngay_hien_tai >= strtotime( '8-9-'.$nam ) && $ngay_hien_tai < strtotime( '23-9-'.$nam ) ){
                 $rt  = 'Bạch lộ ( Nắng phạt )';
                 $id = 8;
            }elseif( $ngay_hien_tai >= strtotime( '23-9-'.$nam ) && $ngay_hien_tai < strtotime( '8-10-'.$nam ) ){
                 $rt ='Thu phân ( Giữa thu )';
                 //$rt  = 'Hàn lộ ( Mát mẻ )';
                 $id = 8;
            }elseif( $ngay_hien_tai >= strtotime( '8-10-'.$nam ) && $ngay_hien_tai < strtotime( '23-10-'.$nam ) ){
                 $rt  = 'Hàn lộ ( Mát mẻ )';
                 //$rt  = 'Sương giáng (Sương mù bắt đầu xuất hiện)';
                 $id = 9;
            }elseif( $ngay_hien_tai >= strtotime( '23-10-'.$nam ) && $ngay_hien_tai < strtotime( '7-11-'.$nam ) ){
                 $rt  = 'Sương giáng (Sương mù bắt đầu xuất hiện)';
                 //$rt  = 'Lập đông (Bước vào mùa đông)';
                 $id = 9;
            }elseif( $ngay_hien_tai >= strtotime( '7-11-'.$nam ) && $ngay_hien_tai < strtotime( '22-11-'.$nam ) ){
                 $rt  = 'Lập đông (Bước vào mùa đông)';
                 //$rt  = 'Tiểu tuyết (Tuyết xuất hiện)';
                 $id = 10;
            }elseif( $ngay_hien_tai >= strtotime( '22-11-'.$nam ) && $ngay_hien_tai < strtotime( '8-12-'.$nam ) ){
                 $rt  = 'Tiểu tuyết (Tuyết xuất hiện)';
                 
                 $id = 10;
            }elseif( $ngay_hien_tai >= strtotime( '7-12-'.$nam ) && $ngay_hien_tai < strtotime( '22-12-'.$nam ) ){
                 $rt  = 'Đại tuyết (Tuyết dày)';
                 $id = 11;
            }elseif( $ngay_hien_tai >= strtotime( '22-12-'.$nam ) && $ngay_hien_tai < strtotime( '6-1-'.$nam1 ) ){
                 $rt  = 'Đông chí (Giữa đông)';
                 $id = 11;
            }elseif( $ngay_hien_tai >= strtotime( '6-1-'.$nam1 ) && $ngay_hien_tai < strtotime( '21-1-'.$nam1 ) ){
                 $rt  = 'Tiểu hàn(Rét nhẹ)';
                 $id = 12;
            }else{
                $rt = 'Đại hàn(Rét đậm)';
                $id = 12;
            }
            if( $r_id ){
                return $id;
            }else{
                return $rt;
            }

         }
}

if( ! function_exists( 'xn_ngu_hanh' ) ){ 
        function xn_ngu_hanh( $key ){
             $mang = array(
                                '1'=>'Hải trung kim',
                                '2'=>'Lư trung hỏa',
                                '3'=>'Đại lâm mộc',
                                '4'=>'Lộ bàng thổ',
                                '5'=>'Kiếm phong kim',
                                '6'=>'Sơn hạ hỏa',
                                '7'=>'Giản hạ thủy',
                                '8'=>'Thành đầu thổ',
                                '9'=>'Bạch lạp kim',
                                '10'=>'Dương liễu mộc',
                                '11'=>'Tuyền trung thủy',
                                '12'=>'Ôc thượng thổ',
                                '13'=>'Tích lịch hỏa',
                                '14'=>'Tùng bách mộc',
                                '15'=>'Trường lưu thủy',
                                '16'=>'Sa trung kim',
                                '17'=>'Sơn hạ hỏa',
                                '18'=>'Bình địa mộc',
                                '19'=>'Bích thượng thổ',
                                '20'=>'Kim bạch kim',
                                '21'=>'Phúc đăng hỏa',
                                '22'=>'Thiên hà thủy',
                                '23'=>'Đại dịch thổ',
                                '24'=>'Thoa xuyến kim',
                                '25'=>'Tang đố mộc',
                                '26'=>'Đại khê thủy',
                                '27'=>'Sa trung thổ',
                                '28'=>'Thiên thượng hỏa',
                                '29'=>'Thạch lưu mộc',
                                '30'=>'Đại hải thủy',
                          
                          );
            return $mang[ $key ];
        }
}

if( !function_exists( 'xn_xac_dinh_ngu_hanh' ) ){
        function xn_xac_dinh_ngu_hanh( $can_ngay, $chi_ngay ){
           $key = $can_ngay.','.$chi_ngay;
           $mang = array(
                '1,1'=>'1',
                '2,2'=>'1',
                '3,3'=>'2',
                '4,4'=>'2',
                '5,5'=>'3',
                '6,6'=>'3',
                '7,7'=>'4',
                '8,8'=>'4',
                '9,9'=>'5',
                '10,10'=>'5',
                '1,11'=>'6',
                '2,12'=>'6',
                '3,1'=>'7',
                '4,2'=>'7',
                '5,3'=>'8',
                '6,4'=>'8',
                '7,5'=>'9',
                '8,6'=>'9',
                '9,7'=>'10',
                '10,8'=>'10',
                '1,9'=>'11',
                '2,10'=>'11',
                '3,11'=>'12',
                '4,12'=>'12',
                '5,1'=>'13',
                '6,2'=>'13',
                '7,3'=>'14',
                '8,4'=>'14',
                '9,5'=>'15',
                '10,6'=>'15',
                '1,7'=>'16',
                '2,8'=>'16',
                '3,9'=>'17',
                '4,10'=>'17',
                '5,11'=>'18',
                '6,12'=>'18',
                '7,1'=>'19',
                '8,2'=>'19',
                '9,3'=>'20',
                '10,4'=>'20',
                '1,5'=>'21',
                '2,6'=>'21',
                '3,7'=>'22',
                '4,8'=>'22',
                '5,9'=>'23',
                '6,10'=>'23',
                '7,11'=>'24',
                '8,12'=>'24',
                '9,1'=>'25',
                '10,2'=>'25',
                '1,3'=>'26',
                '2,4'=>'26',
                '3,5'=>'27',
                '4,6'=>'27',
                '5,7'=>'28',
                '6,8'=>'28',
                '7,9'=>'29',
                '8,10'=>'29',
                '9,11'=>'30',
                '10,12'=>'30',
            ); 
            
           return $mang[ $key ];    
        }
}

if( ! function_exists('xn_so_ngay_trong_thang') ){
         function xn_so_ngay_trong_thang( $thang_duong, $nam_duong ){
              if( in_array( $thang_duong, array(1, 3, 5, 7, 8, 10, 12) ) ){
                  $rt = 31;
              }elseif( in_array( $thang_duong, array(4, 6, 9, 11) ) ){
                  $rt = 30;
              }else{
                  if( $nam_duong % 4 == 0 ){
                     $rt = 29;
                  }else{
                     $rt = 28;
                  }
              }
              
              return $rt;
         }
}

if( ! function_exists( 'xn_thap_nhi_bat_tu' ) ){
        function xn_thap_nhi_bat_tu( $ngay_duong, $thang_duong, $nam_duong ){
            $nam_bat_dau   = 2014;
            $thang_bat_dau = 12;
            $ngay_bat_dau  = 25;
            $i = 1;
            $j = 1;
            while( $nam_bat_dau <= $nam_duong ){
                $so_ngay_trong_thang = xn_so_ngay_trong_thang( $thang_bat_dau, $nam_bat_dau );
                $ngay_bat_dau++;
                $i++;
                if( $i > 28 ){
                    $i = 1; 
                }
                if( $ngay_bat_dau > $so_ngay_trong_thang ){
                    $ngay_bat_dau = 1;
                    $thang_bat_dau++;
                }
                
                if( $thang_bat_dau > 12 ){
                    $thang_bat_dau = 1; 
                }
                
                if( $ngay_bat_dau == 1 && $thang_bat_dau == 1 ){
                    $nam_bat_dau ++;
                }
                
                if( $ngay_bat_dau ==  $ngay_duong && $thang_bat_dau == $thang_duong && $nam_bat_dau == $nam_duong ){
                    break;
                }  
            }
            
            $mang[1] = array( 
                                'ten'=>'Giác mộc giao',
                                'nen'=>'Đỗ đạt, hôn nhân thành tựu.',
                                'kieng'=>'Kỵ mai táng và cải táng',
                                );
            $mang[2] = array( 
                                'ten'=>'Cang kim long',
                                'nen'=>'Không có việc gì hợp',
                                'kieng'=>'Kỵ gả cưới, xây cất. Dễ bị tai nạn.',
                                );
            $mang[3] = array( 
                                'ten'=>'Đê lạc thổ',
                                'nen'=>'',
                                'kieng'=>'Kỵ động thổ, xuất hành, khai trương và chôn cất.',
                                );
            $mang[4] = array( 
                                'ten'=>'Phòng nhật thố',
                                'nen'=>'Hưng vượng về tài sản, thuận lợi trong việc chôn cất và xây cất.',
                                'kieng'=>'',
                                );
            $mang[5] = array( 
                                'ten'=>'Tâm nguyệt hồ',
                                'nen'=>'',
                                'kieng'=>'Kỵ thưa kiện, gả cưới, xây cất. Thua lỗ trong việc kinh doanh.',
                                );
            $mang[6] = array( 
                                'ten'=>'Vĩ hỏa hổ',
                                'nen'=>'Hưng vượng, thuận lợi trong việc xây cất, xuất ngoại và hôn nhân.',
                                'kieng'=>'',
                                );
            $mang[7] = array( 
                                'ten'=>'Cơ thủy báo',
                                'nen'=>'Vượng điền sản, sự nghiệp thăng tiến, gia đình an vui.',
                                'kieng'=>'',
                                );
            $mang[8] = array( 
                                'ten'=>'Đẩu mộc giải',
                                'nen'=>'Nên sửa chữa, xây cất, an táng và cưới gả.',
                                'kieng'=>'',
                                );
            $mang[9] = array( 
                                'ten'=>'Ngưu kim ngưu',
                                'nen'=>'',
                                'kieng'=>'Kỵ xây cất, hôn nhân.',
                                );
            $mang[10] = array( 
                                'ten'=>'Nữ thổ bức',
                                'nen'=>'',
                                'kieng'=>'Kỵ chôn cất, cưới gả. Bất lợi khi sinh đẻ.',
                                );
            $mang[11] = array( 
                                'ten'=>'Hư nhật thử',
                                'nen'=>'',
                                'kieng'=>'Kỵ xây cất. Gia đạo bất hòa.',
                                );
            $mang[12] = array( 
                                'ten'=>'Nguy nguyệt yến',
                                'nen'=>'',
                                'kieng'=>'Kỵ an táng, xây dựng, khai trương.',
                                );
            $mang[13] = array( 
                                'ten'=>'Thất hỏa trư',
                                'nen'=>'Tốt trong việc hôn nhân, xây cất, chôn cất và kinh doanh.',
                                'kieng'=>'',
                                );
            $mang[14] = array( 
                                'ten'=>'Bích thủy du',
                                'nen'=>'Tốt cho việc mai táng, hôn nhân, xây cất. Kinh doanh thuận lợi.',
                                'kieng'=>'',
                                );
            $mang[15] = array( 
                                'ten'=>'Khuê mộc lang',
                                'nen'=>'',
                                'kieng'=>'Kỵ khai trương, động thổ, an táng và sửa cửa.',
                                );
            $mang[16] = array( 
                                'ten'=>'Lâu kim cẩu',
                                'nen'=>'Tiền bạc dồi dào, học hành đỗ đạt, tốt trong việc cưới gả, xây cất.',
                                'kieng'=>'',
                                );
            $mang[17] = array( 
                                'ten'=>'Vị thổ trĩ',
                                'nen'=>'Tốt cho việc xây cất, chôn cất, buôn bán và cưới gả.',
                                'kieng'=>'',
                                );
            $mang[18] = array( 
                                'ten'=>'Mão nhật kê',
                                'nen'=>'Tốt cho việc xây cất',
                                'kieng'=>'Kỵ an táng, cưới gả và gắn hoặc sửa cửa.',
                                );
            $mang[19] = array( 
                                'ten'=>'Tất nguyêt ô',
                                'nen'=>'Mọi việc đều tốt đẹp.',
                                'kieng'=>'',
                                );
            $mang[20] = array( 
                                'ten'=>'Chủy hỏa hâu',
                                'nen'=>'',
                                'kieng'=>'Kỵ thưa kiện, xây cất, mai táng. Bất lợi trong việc thi cử.',
                                );
            $mang[21] = array( 
                                'ten'=>'Sâm thủy viên',
                                'nen'=>'Tốt cho việc mua bán, xây cất và thi cử.',
                                'kieng'=>'Kỵ an táng và cưới gả.',
                                );
            $mang[22] = array( 
                                'ten'=>'Tỉnh mộc can',
                                'nen'=>'Công danh thành đạt, thuận lợi cho việc chăn nuôi và xây cất.',
                                'kieng'=>'',
                                );
            $mang[23] = array( 
                                'ten'=>'Quỷ kim dương',
                                'nen'=>'Tốt cho việc an táng',
                                'kieng'=>'Bất lợi cho việc xây cất và gả cưới',
                                );
            $mang[24] = array( 
                                'ten'=>'Liễu thổ chương',
                                'nen'=>'',
                                'kieng'=>'Tiền bạc hao hụt, dễ bị tai nạn, gia đình không yên. Kỵ cưới gả.',
                                );
            $mang[25] = array( 
                                'ten'=>'Tinh nhật mã',
                                'nen'=>'Tốt trong việc xây cất',
                                'kieng'=>'Xấu trong việc an táng, hôn nhân, gia đình bất an',
                                );
            $mang[26] = array( 
                                'ten'=>'Trương nguyệt lộc',
                                'nen'=>'Thuận lợi cho việc mai táng, hôn nhân.',
                                'kieng'=>'',
                                );
            $mang[27] = array( 
                                'ten'=>'Dực hỏa xà',
                                'nen'=>'',
                                'kieng'=>'Kỵ dựng nhà, chôn cất và cưới gả.',
                                );
            $mang[28] = array( 
                                'ten'=>'Chẩn thủy dẫn',
                                'nen'=>'Tốt cho việc xây dựng, gả cưới và an táng.',
                                'kieng'=>'',
                                );
             $rt = array();             
             $tot_xau = array(2,3,5,9,10,11,12,15,18,20,23,24,25,27);
             if( in_array( $i, $tot_xau ) ){
                 $rt['xau'] = $mang[ $i ];
             }else{
                $rt['tot'] = $mang[ $i ];
             }
                          
             return $rt;             
        }
}


if( ! function_exists( 'xn_xac_dinh_thap_nhi_bat_tu' )  ){
     function xn_xac_dinh_thap_nhi_bat_tu( $tuan, $thu ){
          $key  = $tuan.','.$thu;
          $mang = array(
                            '1,5'=>'1',
                            '1,6'=>'2',
                            '1,7'=>'3',
                            '1,8'=>'4',
                            '1,2'=>'5',
                            '1,3'=>'6',
                            '1,4'=>'7',
                            '2,5'=>'8',
                            '2,6'=>'9',
                            '2,7'=>'10',
                            '2,8'=>'11',
                            '2,2'=>'12',
                            '2,3'=>'13',
                            '2,4'=>'14',
                            '3,5'=>'15',
                            '3,6'=>'16',
                            '3,7'=>'17',
                            '3,8'=>'18',
                            '3,2'=>'19',
                            '3,3'=>'20',
                            '3,4'=>'21',
                            '4,5'=>'22',
                            '4,6'=>'23',
                            '4,7'=>'24',
                            '4,8'=>'25',
                            '4,2'=>'26',
                            '4,3'=>'27',
                            '4,4'=>'28',
                       );
           return $mang[ $key ];             
     }
}



if( ! function_exists( 'xn_tuan_trong_thang' ) ){
        function xn_tuan_trong_thang( $ngay ){
            if( $ngay >= 1 && $ngay <= 7 ){
                $t = 1;
            }elseif( $ngay >= 8 && $ngay <= 14  ){
                $t = 2;
            }elseif( $ngay >= 15 && $ngay <= 22 ){
                 $t = 3;
            }else{
                $t = 4;
            }
            return $t;
        }
}

if( ! function_exists( 'xn_truc_ngay' ) ){
    function xn_truc_ngay( $key ){
         $mang[1] = array(
                            'ten'=>'TRỰC KIẾN',
                            'tot'=>'Xuất hành, giá thú',
                            'xau'=>'Động thổ'
                            );
         $mang[2] = array(
                            'ten'=>'TRỰC TRỪ',
                            'tot'=>'Tốt nói chung',
                            'xau'=>'không có'
                            );
         $mang[3] = array(
                            'ten'=>'TRỰC MÃN',
                            'tot'=>'Tế tự, cầu phúc, cầu tài',
                            'xau'=>'Các việc khác'
                            );
         $mang[4] = array(
                            'ten'=>'TRỰC BÌNH',
                            'tot'=>'Tốt với mọi việc',
                            'xau'=>'Không có'
                            );
         $mang[5] = array(
                            'ten'=>'TRỰC ĐỊNH',
                            'tot'=>'Cầu tài, ký hợp đồng, yến tiệc, hội nghị',
                            'xau'=>'Tố tụng, tranh chấp'
                            );
         $mang[6] = array(
                            'ten'=>'TRỰC CHẤP',
                            'tot'=>'Khởi công xây dựng',
                            'xau'=>'Xuất hành, khai trương, di chuyển'
                            );
         $mang[7] = array(
                            'ten'=>'TRỰC PHÁ',
                            'tot'=>'Chữa bệnh, phá bỏ nhà cũ, tiêu hủy đồ cũ',
                            'xau'=>'Những việc khác'
                            );
         $mang[8] = array(
                            'ten'=>'TRỰC NGUY',
                            'tot'=>'Không có',
                            'xau'=>' Mọi việc'
                            );
         $mang[9] = array(
                            'ten'=>'TRỰC THÀNH',
                            'tot'=>'Xuất hành, khai trương, giá thú',
                            'xau'=>'Tố tụng, tranh chấp'
                            );
         $mang[10] = array(
                            'ten'=>'TRỰC THÂU',
                            'tot'=>'Thu hoạch, cất trữ, nhập kho',
                            'xau'=>' Động thổ, an táng'
                            );
         $mang[11] = array(
                            'ten'=>'TRỰC KHAI',
                            'tot'=>'Mọi việc',
                            'xau'=>'Động thổ, an táng'
                            );
         $mang[12] = array(
                            'ten'=>'TRỰC BẾ',
                            'tot'=>'Đắp đê, san lấp cống rãnh',
                            'xau'=>' Mọi việc'
                            );
       if( isset( $mang[ $key ] ) ){
          return $mang[ $key ];
       }
    }
    
    
    
    
}

if( ! function_exists( 'xn_xem_truc_ngay' ) ){
      function xn_xem_truc_ngay( $ngay, $tietkhi ){
                   $key = $tietkhi.','.$ngay;
                   $mang = array(
                                            '1,3'=>'1',
                                            '1,4'=>'2',
                                            '1,5'=>'3',
                                            '1,6'=>'4',
                                            '1,7'=>'5',
                                            '1,8'=>'6',
                                            '1,9'=>'7',
                                            '1,10'=>'8',
                                            '1,11'=>'9',
                                            '1,12'=>'10',
                                            '1,1'=>'11',
                                            '1,2'=>'12',
                                            '2,4'=>'1',
                                            '2,5'=>'2',
                                            '2,6'=>'3',
                                            '2,7'=>'4',
                                            '2,8'=>'5',
                                            '2,9'=>'6',
                                            '2,10'=>'7',
                                            '2,11'=>'8',
                                            '2,12'=>'9',
                                            '2,1'=>'10',
                                            '2,2'=>'11',
                                            '2,3'=>'12',
                                            '3,5'=>'1',
                                            '3,6'=>'2',
                                            '3,7'=>'3',
                                            '3,8'=>'4',
                                            '3,9'=>'5',
                                            '3,10'=>'6',
                                            '3,11'=>'7',
                                            '3,12'=>'8',
                                            '3,1'=>'9',
                                            '3,2'=>'10',
                                            '3,3'=>'11',
                                            '3,4'=>'12',
                                            '4,6'=>'1',
                                            '4,7'=>'2',
                                            '4,8'=>'3',
                                            '4,9'=>'4',
                                            '4,10'=>'5',
                                            '4,11'=>'6',
                                            '4,12'=>'7',
                                            '4,1'=>'8',
                                            '4,2'=>'9',
                                            '4,3'=>'10',
                                            '4,4'=>'11',
                                            '4,5'=>'12',
                                            '5,7'=>'1',
                                            '5,8'=>'2',
                                            '5,9'=>'3',
                                            '5,10'=>'4',
                                            '5,11'=>'5',
                                            '5,12'=>'6',
                                            '5,1'=>'7',
                                            '5,2'=>'8',
                                            '5,3'=>'9',
                                            '5,4'=>'10',
                                            '5,5'=>'11',
                                            '5,6'=>'12',
                                            '6,8'=>'1',
                                            '6,9'=>'2',
                                            '6,10'=>'3',
                                            '6,11'=>'4',
                                            '6,12'=>'5',
                                            '6,1'=>'6',
                                            '6,2'=>'7',
                                            '6,3'=>'8',
                                            '6,4'=>'9',
                                            '6,5'=>'10',
                                            '6,6'=>'11',
                                            '6,7'=>'12',
                                            '7,9'=>'1',
                                            '7,10'=>'2',
                                            '7,11'=>'3',
                                            '7,12'=>'4',
                                            '7,1'=>'5',
                                            '7,2'=>'6',
                                            '7,3'=>'7',
                                            '7,4'=>'8',
                                            '7,5'=>'9',
                                            '7,6'=>'10',
                                            '7,7'=>'11',
                                            '7,8'=>'12',
                                            '8,10'=>'1',
                                            '8,11'=>'2',
                                            '8,12'=>'3',
                                            '8,1'=>'4',
                                            '8,2'=>'5',
                                            '8,3'=>'6',
                                            '8,4'=>'7',
                                            '8,5'=>'8',
                                            '8,6'=>'9',
                                            '8,7'=>'10',
                                            '8,8'=>'11',
                                            '8,9'=>'12',
                                            '9,11'=>'1',
                                            '9,12'=>'2',
                                            '9,1'=>'3',
                                            '9,2'=>'4',
                                            '9,3'=>'5',
                                            '9,4'=>'6',
                                            '9,5'=>'7',
                                            '9,6'=>'8',
                                            '9,7'=>'9',
                                            '9,8'=>'10',
                                            '9,9'=>'11',
                                            '9,10'=>'12',
                                            '10,12'=>'1',
                                            '10,1'=>'2',
                                            '10,2'=>'3',
                                            '10,3'=>'4',
                                            '10,4'=>'5',
                                            '10,5'=>'6',
                                            '10,6'=>'7',
                                            '10,7'=>'8',
                                            '10,8'=>'9',
                                            '10,9'=>'10',
                                            '10,10'=>'11',
                                            '10,11'=>'12',
                                            '11,1'=>'1',
                                            '11,2'=>'2',
                                            '11,3'=>'3',
                                            '11,4'=>'4',
                                            '11,5'=>'5',
                                            '11,6'=>'6',
                                            '11,7'=>'7',
                                            '11,8'=>'8',
                                            '11,9'=>'9',
                                            '11,10'=>'10',
                                            '11,11'=>'11',
                                            '11,12'=>'12',
                                            '12,2'=>'1',
                                            '12,3'=>'2',
                                            '12,4'=>'3',
                                            '12,5'=>'4',
                                            '12,6'=>'5',
                                            '12,7'=>'6',
                                            '12,8'=>'7',
                                            '12,9'=>'8',
                                            '12,10'=>'9',
                                            '12,11'=>'10',
                                            '12,12'=>'11',
                                            '12,1'=>'12',
                                );
               if( isset( $mang[$key] ) ){
                  return $mang[ $key ];
               }             
      }
}

if( ! function_exists( 'xn_cat_tinh_nhat_than' ) ){
         function xn_cat_tinh_nhat_than( $key ){
              $mang = array(
                                '1'=>'nguyệt đức',
                                '2'=>'nguyệt đức hợp',
                                '3'=>'thiên quý',
                                '4'=>'thiên phúc',
                                '5'=>'nguyệt ân',
                                '6'=>'nguyệt không',
                           );
           if( isset( $mang[ $key ] ) ){
             return $mang[ $key ];
           }
         }
}

if( ! function_exists( 'xn_xem_cat_tinh_nhat_than' ) ){
           function xn_xem_cat_tinh_nhat_than( $thang, $can_ngay ){
               $key  = $thang.','.$can_ngay;
               $mang = array(
                                '1,3'=>'1',
                                '1,8'=>'2',
                                '1,1'=>'3',
                                '1,2'=>'3',
                                '1,6'=>'4',
                                '1,3'=>'5',
                                '1,9'=>'6',
                                '2,1'=>'1',
                                '2,6'=>'2',
                                '2,1'=>'3',
                                '2,2'=>'3',
                                '2,5'=>'4',
                                '2,4'=>'5',
                                '2,7'=>'6',
                                '3,9'=>'1',
                                '3,4'=>'2',
                                '3,1'=>'3',
                                '3,2'=>'3',
                                '3,0'=>'4',
                                '3,7'=>'5',
                                '3,3'=>'6',
                                '4,7'=>'1',
                                '4,2'=>'2',
                                '4,3'=>'3',
                                '4,4'=>'3',
                                '4,8'=>'4',
                                '4,10'=>'4',
                                '4,6'=>'5',
                                '4,1'=>'6',
                                '5,3'=>'1',
                                '5,8'=>'2',
                                '5,3'=>'3',
                                '5,4'=>'3',
                                '5,8'=>'4',
                                '5,9'=>'4',
                                '5,5'=>'5',
                                '5,9'=>'6',
                                '6,1'=>'1',
                                '6,6'=>'2',
                                '6,3'=>'3',
                                '6,4'=>'3',
                                '6,0'=>'4',
                                '6,8'=>'5',
                                '6,7'=>'6',
                                '7,9'=>'1',
                                '7,4'=>'2',
                                '7,7'=>'3',
                                '7,8'=>'3',
                                '7,2'=>'4',
                                '7,9'=>'5',
                                '7,3'=>'6',
                                '8,9'=>'1',
                                '8,4'=>'2',
                                '8,7'=>'3',
                                '8,8'=>'3',
                                '8,1'=>'4',
                                '8,10'=>'5',
                                '8,1'=>'6',
                                '9,3'=>'1',
                                '9,8'=>'2',
                                '9,7'=>'3',
                                '9,8'=>'3',
                                '9,0'=>'4',
                                '9,7'=>'5',
                                '9,9'=>'6',
                                '10,1'=>'1',
                                '10,6'=>'2',
                                '10,9'=>'3',
                                '10,10'=>'3',
                                '10,4'=>'4',
                                '10,2'=>'5',
                                '10,7'=>'6',
                                '11,9'=>'1',
                                '11,4'=>'2',
                                '11,9'=>'3',
                                '11,10'=>'3',
                                '11,3'=>'4',
                                '11,1'=>'5',
                                '11,3'=>'6',
                                '12,7'=>'1',
                                '12,2'=>'2',
                                '12,9'=>'3',
                                '12,10'=>'3',
                                '12,0'=>'4',
                                '12,8'=>'5',
                                '12,1'=>'6',
                            );
            if( isset( $mang[ $key ] ) ){
                return $mang[$key];
            }
           }
}

if( ! function_exists( 'xn_cat_than_tinh_nhat_chi_ngay' ) ){
         function xn_cat_than_tinh_nhat_chi_ngay( $key ){
            $arr_key = explode( ',', $key );
            $mang = array(
                                    '1'=>'thiên hỷ',
                                    '2'=>'thiên phú',
                                    '3'=>'sinh khí',
                                    '4'=>'thiên thành',
                                    '5'=>'thiên quan',
                                    '6'=>'thiên mã',
                                    '7'=>'thiên tài',
                                    '8'=>'địa tài',
                                    '9'=>'nguyệt tài',
                                    '10'=>'minh tinh',
                                    '11'=>'thánh tâm',
                                    '12'=>'ngũ phúc',
                                    '13'=>'lộc khố',
                                    '14'=>'phúc sinh',
                                    '15'=>'cát khánh',
                                    '16'=>'âm đức',
                                    '17'=>'u vi tinh',
                                    '18'=>'mẫn đức tinh',
                                    '19'=>'kính tâm',
                                    '20'=>'tuế hợp',
                                    '21'=>'thiên giải',
                                    '22'=>'quan nhật',
                                    '23'=>'hoạt diệu',
                                    '24'=>'giải thần',
                                    '25'=>'phổ hộ',
                                    '26'=>'ích hậu',
                                    '27'=>'tục thế',
                                    '28'=>'yếu yên',
                                    '29'=>'dịch mã',
                                    '30'=>'tam hợp',
                                    '31'=>'lục hợp',
                                    '32'=>'mẫu thương',
                                    '33'=>'phúc hậu',
                                    '34'=>'đại hồng sa',
                                    '35'=>'dân thời nhật đức',
                                    '36'=>'hoàng ân',
                                    '37'=>'thanh long',
                                    '38'=>'minh đường',
                                    '39'=>'kim đường',
                                    '40'=>'ngọc đường',
                         );
                         
             $rt = array();
             if( !empty( $arr_key ) ){
                 foreach( $arr_key as $val ){
                    if( isset( $mang[ $val ] ) )
                    $rt[] = $mang[ $val ];
                 } 
             }            
             if( !empty( $rt ) ){
                 return $rt;
             }            
         }
}  

if( ! function_exists( 'xn_xem_cat_than_tinh_nhat_chi_ngay' ) ){
         function xn_xem_cat_than_tinh_nhat_chi_ngay( $thang_am, $chi_ngay ){
                  $key  = $thang_am.','.$chi_ngay;
                  $mang = array(
                                        '1,1'=>'3,26,32,34,37',
                                        '1,2'=>'27,34,38',
                                        '1,3'=>'18,28,33',
                                        '1,4'=>'0',
                                        '1,5'=>'2,7,13,',
                                        '1,6'=>'8,23,39',
                                        '1,7'=>'6,9,30,35',
                                        '1,8'=>'4,19,40',
                                        '1,9'=>'10,21,24,25,29',
                                        '1,10'=>'14,15,16,',
                                        '1,11'=>'1,5,30,36',
                                        '1,12'=>'11,12,17,31,32',
                                        '2,1'=>'5,20,32,34',
                                        '2,2'=>'3,19,34,36',
                                        '2,3'=>'12,15,25,33,37',
                                        '2,4'=>'14,22,38',
                                        '2,5'=>'17',
                                        '2,6'=>'2,9,11,13,29',
                                        '2,7'=>'7,26,35',
                                        '2,8'=>'8,16,18,27,30,39',
                                        '2,9'=>'6,21,24,28',
                                        '2,10'=>'4,40',
                                        '2,11'=>'10,23,31',
                                        '2,12'=>'1,30,32',
                                        '3,1'=>'1,11,30,32,34',
                                        '3,2'=>'17,26,34',
                                        '3,3'=>'3,5,27,29,33,36',
                                        '3,4'=>'28',
                                        '3,5'=>'18,37',
                                        '3,6'=>'9,12,16,38',
                                        '3,7'=>'2,13,35',
                                        '3,8'=>'23',
                                        '3,9'=>'7,19,30',
                                        '3,10'=>'8,21,25,31,39',
                                        '3,11'=>'6,14,24',
                                        '3,12'=>'4,15,20,32,40',
                                        '4,1'=>'6,23',
                                        '4,2'=>'1,4,30,40',
                                        '4,3'=>'10,19,32',
                                        '4,4'=>'3,16,25,32',
                                        '4,5'=>'5,14,15,34',
                                        '4,6'=>'33,34,36',
                                        '4,7'=>'11,17,37',
                                        '4,8'=>'2,9,13,26,38',
                                        '4,9'=>'12,27,31',
                                        '4,10'=>'18,21,28,30,35',
                                        '4,11'=>'7,20,24',
                                        '4,12'=>'8,29,39',
                                        '5,1'=>'7,24',
                                        '5,2'=>'8,11,16,39',
                                        '5,3'=>'1,6,26,30,32',
                                        '5,4'=>'4,17,27,32,40',
                                        '5,5'=>'3,10,28,34',
                                        '5,6'=>'33,34',
                                        '5,7'=>'5,18,22',
                                        '5,8'=>'31',
                                        '5,9'=>'2,13,29,37',
                                        '5,10'=>'9,19,20,23,35,36,38',
                                        '5,11'=>'21,25,30',
                                        '5,12'=>'12,14',
                                        '6,1'=>'24',
                                        '6,2'=>'0',
                                        '6,3'=>'7,12,23,32',
                                        '6,4'=>'1,8,19,30,32,36,39',
                                        '6,5'=>'6,25,34',
                                        '6,6'=>'3,4,14,29,33,34,40',
                                        '6,7'=>'10,15,31',
                                        '6,8'=>'11',
                                        '6,9'=>'5,17,20,26',
                                        '6,10'=>'2,13,27,35',
                                        '6,11'=>'21,28,37',
                                        '6,12'=>'9,18,30,38',
                                        '7,1'=>'14,30,35,36,37',
                                        '7,2'=>'32,38',
                                        '7,3'=>'11,24,29',
                                        '7,4'=>'15,26',
                                        '7,5'=>'1,7,27,30,32',
                                        '7,6'=>'8,12,17,28,31,39',
                                        '7,7'=>'3,6,9,34',
                                        '7,8'=>'4,20,34,40',
                                        '7,9'=>'10,18,33',
                                        '7,10'=>'11,16',
                                        '7,11'=>'2,5,13,19',
                                        '7,12'=>'21,23,25',
                                        '8,1'=>'5,35',
                                        '8,2'=>'18,30,32',
                                        '8,3'=>'24,37',
                                        '8,4'=>'38',
                                        '8,5'=>'19,23,31,32',
                                        '8,6'=>'1,9,25,30',
                                        '8,7'=>'7,14,20,34,36',
                                        '8,8'=>'3,8,16,34,39',
                                        '8,9'=>'6,11,12,15,33',
                                        '8,10'=>'4,22,26,40',
                                        '8,11'=>'10,17,27',
                                        '8,12'=>'2,13,21,28,29',
                                        '9,1'=>'2,10,13,25,35',
                                        '9,2'=>'14,23,32',
                                        '9,3'=>'5,30',
                                        '9,4'=>'11,31',
                                        '9,5'=>'24,26,32,37',
                                        '9,6'=>'9,15,16,20,27,38',
                                        '9,7'=>'1,21,28,30,34',
                                        '9,8'=>'17,34',
                                        '9,9'=>'3,7,29,33',
                                        '9,10'=>'8,39',
                                        '9,11'=>'6,18',
                                        '9,12'=>'4,12,19,36,40',
                                        '10,1'=>'6,17,28',
                                        '10,2'=>'2,4,13,40',
                                        '10,3'=>'10,12,31',
                                        '10,4'=>'16,18,30,35',
                                        '10,5'=>'5,20,24,36',
                                        '10,6'=>'19,29',
                                        '10,7'=>'21,23,25,37',
                                        '10,8'=>'1,9,14,30,38',
                                        '10,9'=>'32,34',
                                        '10,10'=>'3,11,32',
                                        '10,11'=>'7,15,26,34',
                                        '10,12'=>'8,27,33,39',
                                        '11,1'=>'7,18,19,22',
                                        '11,2'=>'8,16,25,31,39',
                                        '11,3'=>'2,6,13,14,29',
                                        '11,4'=>'4,20,23,35,40',
                                        '11,5'=>'10,11,30',
                                        '11,6'=>'12,26',
                                        '11,7'=>'5,24,27',
                                        '11,8'=>'15,21,28',
                                        '11,9'=>'1,30,32,34,36,37',
                                        '11,10'=>'9,17,32,38',
                                        '11,11'=>'3,34',
                                        '11,12'=>'33',
                                        '12,1'=>'15,27,31',
                                        '12,2'=>'28',
                                        '12,3'=>'7,17,20',
                                        '12,4'=>'2,8,13,35,39',
                                        '12,5'=>'6',
                                        '12,6'=>'4,18,30,40',
                                        '12,7'=>'10,19,24',
                                        '12,8'=>'21,25,36',
                                        '12,9'=>'5,12,14,23,32,34',
                                        '12,10'=>'1,30,32',
                                        '12,11'=>'11,34,37',
                                        '12,12'=>'3,9,16,26,29,33,38',
                               );
                               
                       if( isset( $mang[ $key ] ) ){
                           return $mang[$key];
                       }        
         }
}            

if( ! function_exists( 'xn_phuong_vi' ) ){
       function xn_phuong_vi( $key ){
            $mang = array(
                            '1'=>'bắc',
                            '2'=>'nam',
                            '3'=>'tây',
                            '4'=>'đông',
                            '5'=>'tây bắc',
                            '6'=>'đông bắc',
                            '7'=>'tây nam',
                            '8'=>'đông nam',
                         );
           if( isset( $mang[ $key ] ) ){
              return $mang[$key];
           }
       }
}

if( ! function_exists( 'xn_huong_hy_than' ) ){
           function xn_huong_hy_than( $can_ngay ){
               $mang = array(
                                '1'=>'6',
                                '2'=>'5',
                                '3'=>'7',
                                '4'=>'2',
                                '5'=>'8',
                                '6'=>'6',
                                '7'=>'5',
                                '8'=>'7',
                                '9'=>'2',
                                '10'=>'8',  
                            );
               if( isset( $mang[ $can_ngay ] ) ){
                  return $mang[$can_ngay];
               }
           }
} 
 
if( ! function_exists( 'xn_huong_tai_than' ) ){
           function xn_huong_tai_than( $can_ngay ){
               $mang = array(
                                '1'=>'8',
                                '2'=>'8',
                                '3'=>'4',
                                '4'=>'4',
                                '5'=>'1',
                                '6'=>'2',
                                '7'=>'7',
                                '8'=>'7',
                                '9'=>'3',
                                '10'=>'5',  
                            );
               if( isset( $mang[ $can_ngay ] ) ){
                  return $mang[$can_ngay];
               }
           }
}  

if( ! function_exists( 'xn_huong_hac_than' ) ){
           function xn_huong_hac_than( $can_ngay, $chi_ngay ){
               $key = $can_ngay.','.$chi_ngay;
               $mang = array(
                                '6,10'=>'6',
                                '7,11'=>'6',
                                '8,12'=>'6',
                                '9,1'=>'6',
                                '10,2'=>'6',
                                '1,3'=>'6',
                                '2,4'=>'4',
                                '3,5'=>'4',
                                '4,6'=>'4',
                                '5,7'=>'4',
                                '6,8'=>'4',
                                '7,9'=>'8',
                                '8,10'=>'8',
                                '9,11'=>'8',
                                '10,12'=>'8',
                                '1,1'=>'8',
                                '2,2'=>'8',
                                '3,3'=>'2',
                                '4,4'=>'2',
                                '5,5'=>'2',
                                '6,6'=>'2',
                                '7,7'=>'2',
                                '8,8'=>'7',
                                '9,9'=>'7',
                                '10,10'=>'7',
                                '1,11'=>'7',
                                '2,12'=>'7',
                                '3,1'=>'7',
                                '4,2'=>'3',
                                '5,3'=>'3',
                                '6,4'=>'3',
                                '7,5'=>'3',
                                '8,6'=>'3',
                                '9,7'=>'5',
                                '10,8'=>'5',
                                '1,9'=>'5',
                                '2,10'=>'5',
                                '3,11'=>'5',
                                '4,12'=>'5',
                                '5,1'=>'1',
                                '6,2'=>'1',
                                '7,3'=>'1',
                                '8,4'=>'1',
                                '9,5'=>'1',  
                            );
               if( isset( $mang[ $key ] ) ){
                  return $mang[$key];
               }
           }
}

if( !function_exists( 'xn_cat_than_tinh_nhat_dac_biet' ) ){
       function xn_cat_than_tinh_nhat_dac_biet( $thang_am, $can_ngay, $chi_ngay ){
            $cattinh = array(
                                '1'=>'thiên đức',
                                '2'=>'thiên đức hợp',
                                '3'=>'thiên xá',
                            );
                            
           $hang_can = array(
                                '1,4'=>'1',
                                '3,9'=>'1',
                                '4,8'=>'1',
                                '6,1'=>'1',
                                '7,10'=>'1',
                                '9,3'=>'1',
                                '10,2'=>'1',
                                '12,7'=>'1',
                                '1,9'=>'2',
                                '3,4'=>'2',
                                '4,3'=>'2',
                                '6,6'=>'2',
                                '7,5'=>'2',
                                '9,8'=>'2',
                                '10,7'=>'2',
                                '12,2'=>'2',
                            ); 
                            
          $hang_chi = array(
                                '2,9'=>'1',
                                '5,12'=>'1',
                                '8,3'=>'1',
                                '11,6'=>'1',
                                '2,1'=>'2',
                                '5,3'=>'2',
                                '8,12'=>'2',
                                '11,9'=>'2',
                           );    
                                                         
           $hang_can_chi = array(
                                    '1,5,3'=>'3',
                                    '2,5,3'=>'3',
                                    '3,5,3'=>'3',
                                    '4,1,7'=>'3',
                                    '6,1,7'=>'3',
                                    '7,5,9'=>'3',
                                    '8,5,9'=>'3',
                                    '9,5,9'=>'3',
                                    '10,1,1'=>'3',
                                    '12,1,1'=>'3',
                                );
           
           
           $rt = array();
           $key_1 = $thang_am.','.$can_ngay;
           if( isset( $hang_can[ $key_1 ] ) ){
                 if( isset( $cattinh[ $hang_can[ $key_1 ] ] ) ){
                     $rt[] = $cattinh[ $hang_can[ $key_1 ] ];
                 }
           }
           
           $key_2 = $thang_am.','.$chi_ngay;
           if( isset( $hang_chi[ $key_2 ] ) ){
                 if( isset( $cattinh[ $hang_chi[ $key_2 ] ] ) ){
                     $rt[] = $cattinh[ $hang_chi[ $key_2 ] ];
                 }
           }
           
           $key_3 = $thang_am.','.$can_ngay.','.$chi_ngay;
           if( isset( $hang_can_chi[ $key_3 ] ) ){
                 if( isset( $cattinh[ $hang_can_chi[ $key_3 ] ] ) ){
                     $rt[] = $cattinh[ $hang_can_chi[ $key_3 ] ];
                 }
           }
           
           if( !empty( $rt ) ){
              return $rt;
           }
       }    
}


if( ! function_exists( 'xn_tuoi_xung_ngay' ) ){
        function xn_tuoi_xung_ngay( $can_ngay, $chi_ngay ){
             
             $mang = array(
                                '1,1'=>'Mậu Ngọ – Nhâm Ngọ',
                                '2,2'=>'Kỷ Mùi – Quý Mùi',
                                '3,3'=>'Canh Thân – Nhâm Thân',
                                '4,4'=>'Tân Dậu – Quý Dậu',
                                '5,5'=>'Nhâm Tuất – Bính Tuất',
                                '6,6'=>'Quý Hợi – Đinh Hợi',
                                '7,7'=>'Bính Tý – Canh Tý',
                                '8,8'=>'Ất Sửu – Đinh Sửu',
                                '9,9'=>'Bính Thân – Canh Dần',
                                '10,10'=>'Đinh Mão – Tân Mão',
                                '1,11'=>'Mậu Thìn – Canh Thìn',
                                '2,12'=>'Kỷ Tị – Tân Tị',
                                '3,1'=>'Canh Ngọ – Mậu Ngọ',
                                '4,2'=>'Tân Mùi – Kỷ Mùi',
                                '5,3'=>'Nhâm Thân – Giáp Thân',
                                '6,4'=>'Quý Dậu – Ất Dậu',
                                '7,5'=>'Giáp Tuất – Mậu Tuất',
                                '8,6'=>'Ất Hợi – Kỷ Hợi',
                                '9,7'=>'Bính Tý – Canh Tý',
                                '10,8'=>'Đinh Sửu – Tân Sửu',
                                '1,9'=>'Mậu Dần – Bính Dần',
                                '2,10'=>'Kỷ Mão – Đinh Mão',
                                '3,11'=>'Canh Thìn – Nhâm Thìn',
                                '4,12'=>'Tân Tị – Quý Tị',
                                '5,1'=>'Nhâm Ngọ – Giáp Ngọ',
                                '6,2'=>'Quý Mùi – Ất Mùi',
                                '7,3'=>'Giáp Thân – Mậu Thân',
                                '8,4'=>'Ất Dậu – Kỷ Dậu',
                                '9,5'=>'Bính Tuất – Giáp Tuất',
                                '10,6'=>'Đinh Hợi – Ất Hợi',
                                '1,7'=>'Mậu Tý – Nhâm Tý',
                                '2,8'=>'Kỷ Sửu – Quý Sửu',
                                '3,9'=>'Canh Dần – Nhâm Dần',
                                '4,10'=>'Tân Mão – Quý Mão',
                                '5,11'=>'Nhâm Thìn – Bính Thìn',
                                '6,12'=>'Quý Tị – Đinh Tị',
                                '7,1'=>'Giáp Ngọ – Bính Ngọ',
                                '8,2'=>'Ất Mùi – Đinh Mùi',
                                '9,3'=>'Bính Thân – Canh Thân',
                                '10,4'=>'Đinh Dậu – Tân Dậu',
                                '1,5'=>'Mậu Tuất – Canh Tuất',
                                '2,6'=>'Kỷ Hợi – Tân Hợi',
                                '3,7'=>'Canh Tý – Mậu Tý',
                                '4,8'=>'Tân Sửu – Kỷ Sửu',
                                '5,9'=>'Nhâm Dần – Giáp Dần',
                                '6,10'=>'Quý Mão – Ất Mão',
                                '7,11'=>'Giáp Thìn – Mậu Thìn',
                                '8,12'=>'Kỷ Tị – Đinh Tị',
                                '9,1'=>'Bính Ngọ – Canh Ngọ',
                                '10,2'=>'Đinh Mùi – Tân Mùi',
                                '1,3'=>'Mậu Thân – Bính Thân',
                                '2,4'=>'Kỷ Dậu – Tân Dậu',
                                '3,5'=>'Canh Tuất – Nhâm Tuất',
                                '4,6'=>'Tân Hợi – Quý Hợi',
                                '5,7'=>'Nhâm Tý – Giáp Tý',
                                '6,8'=>'Quý Sửu – Ất Sửu',
                                '7,9'=>'Giáp Dần – Mậu Dần',
                                '8,10'=>'Ất Mão – Kỷ Mão',
                                '9,11'=>'Bính Thìn – Mậu Thìn',
                                '10,12'=>'Đinh Tị – Ất Tị',
                          );
                $key = $can_ngay.','.$chi_ngay;
                if( isset( $mang[ $key ] ) ){
                     return $mang[ $key ];
                }          
        }
}

if( ! function_exists( 'xn_gio_tot_xau' ) ){
         function xn_gio_tot_xau( $key ){
               $mang = array(
                                '1'=>'Tí (23:00-0:59)',
                                '2'=>'Sửu (1:00-2:59)',
                                '3'=>'Dần (3:00-4:59)',
                                '4'=>'Mão (5:00-6:59)',
                                '5'=>'Thìn (7:00-8:59)',
                                '6'=>'Tỵ (9:00-10:59)',
                                '7'=>'Ngọ (11:00-12:59)',
                                '8'=>'Mùi (13:00-14:59)',
                                '9'=>'Thân (15:00-16:59)',
                                '10'=>'Dậu (17:00-18:59)',
                                '11'=>'Tuất (19:00-20:59)',
                                '12'=>'Hợi (21:00-22:59)',
                            );
             return $mang[ $key ];               
         }
}

if( ! function_exists( 'xn_gio_hoang_dao' ) ){
       function xn_gio_hoang_dao( $chi_ngay ){
                  $mang = array(
                                    '3,1'=>'1',
                                    '3,2'=>'1',
                                    '3,3'=>'2',
                                    '3,4'=>'2',
                                    '3,5'=>'1',
                                    '3,6'=>'1',
                                    '3,7'=>'2',
                                    '3,8'=>'1',
                                    '3,9'=>'2',
                                    '3,10'=>'2',
                                    '3,11'=>'1',
                                    '3,12'=>'2',
                                    '4,1'=>'1',
                                    '4,2'=>'2',
                                    '4,3'=>'1',
                                    '4,4'=>'1',
                                    '4,5'=>'2',
                                    '4,6'=>'2',
                                    '4,7'=>'1',
                                    '4,8'=>'1',
                                    '4,9'=>'2',
                                    '4,10'=>'1',
                                    '4,11'=>'2',
                                    '4,12'=>'2',
                                    '5,1'=>'2',
                                    '5,2'=>'2',
                                    '5,3'=>'1',
                                    '5,4'=>'2',
                                    '5,5'=>'1',
                                    '5,6'=>'1',
                                    '5,7'=>'2',
                                    '5,8'=>'2',
                                    '5,9'=>'1',
                                    '5,10'=>'1',
                                    '5,11'=>'2',
                                    '5,12'=>'1',
                                    '6,1'=>'2',
                                    '6,2'=>'1',
                                    '6,3'=>'2',
                                    '6,4'=>'2',
                                    '6,5'=>'1',
                                    '6,6'=>'2',
                                    '6,7'=>'1',
                                    '6,8'=>'1',
                                    '6,9'=>'2',
                                    '6,10'=>'2',
                                    '6,11'=>'1',
                                    '6,12'=>'1',
                                    '7,1'=>'1',
                                    '7,2'=>'1',
                                    '7,3'=>'2',
                                    '7,4'=>'1',
                                    '7,5'=>'2',
                                    '7,6'=>'2',
                                    '7,7'=>'1',
                                    '7,8'=>'2',
                                    '7,9'=>'1',
                                    '7,10'=>'1',
                                    '7,11'=>'2',
                                    '7,12'=>'2',
                                    '8,1'=>'2',
                                    '8,2'=>'2',
                                    '8,3'=>'1',
                                    '8,4'=>'1',
                                    '8,5'=>'2',
                                    '8,6'=>'1',
                                    '8,7'=>'2',
                                    '8,8'=>'2',
                                    '8,9'=>'1',
                                    '8,10'=>'2',
                                    '8,11'=>'1',
                                    '8,12'=>'1',
                                    '9,1'=>'1',
                                    '9,2'=>'1',
                                    '9,3'=>'2',
                                    '9,4'=>'2',
                                    '9,5'=>'1',
                                    '9,6'=>'1',
                                    '9,7'=>'2',
                                    '9,8'=>'1',
                                    '9,9'=>'2',
                                    '9,10'=>'2',
                                    '9,11'=>'1',
                                    '9,12'=>'2',
                                    '10,1'=>'1',
                                    '10,2'=>'2',
                                    '10,3'=>'1',
                                    '10,4'=>'1',
                                    '10,5'=>'2',
                                    '10,6'=>'2',
                                    '10,7'=>'1',
                                    '10,8'=>'1',
                                    '10,9'=>'2',
                                    '10,10'=>'1',
                                    '10,11'=>'2',
                                    '10,12'=>'2',
                                    '11,1'=>'2',
                                    '11,2'=>'2',
                                    '11,3'=>'1',
                                    '11,4'=>'2',
                                    '11,5'=>'1',
                                    '11,6'=>'1',
                                    '11,7'=>'2',
                                    '11,8'=>'2',
                                    '11,9'=>'1',
                                    '11,10'=>'1',
                                    '11,11'=>'2',
                                    '11,12'=>'1',
                                    '12,1'=>'2',
                                    '12,2'=>'1',
                                    '12,3'=>'2',
                                    '12,4'=>'2',
                                    '12,5'=>'1',
                                    '12,6'=>'2',
                                    '12,7'=>'1',
                                    '12,8'=>'1',
                                    '12,9'=>'2',
                                    '12,10'=>'2',
                                    '12,11'=>'1',
                                    '12,12'=>'1',
                                    '1,1'=>'1',
                                    '1,2'=>'1',
                                    '1,3'=>'2',
                                    '1,4'=>'1',
                                    '1,5'=>'2',
                                    '1,6'=>'2',
                                    '1,7'=>'1',
                                    '1,8'=>'2',
                                    '1,9'=>'1',
                                    '1,10'=>'1',
                                    '1,11'=>'2',
                                    '1,12'=>'2',
                                    '2,1'=>'2',
                                    '2,2'=>'2',
                                    '2,3'=>'1',
                                    '2,4'=>'1',
                                    '2,5'=>'2',
                                    '2,6'=>'1',
                                    '2,7'=>'2',
                                    '2,8'=>'2',
                                    '2,9'=>'1',
                                    '2,10'=>'2',
                                    '2,11'=>'1',
                                    '2,12'=>'1',
                               );
              $rt = array();
              for( $i = 1; $i<= 12; $i++ ){
                  $key = $chi_ngay.','.$i;
                  if( isset( $mang[ $key ] ) ){
                      if( $mang[ $key ] == 1 ){
                          $rt['hoang_dao'][] = xn_gio_tot_xau( $i );
                      }else{
                          $rt['hac_dao'][]   = xn_gio_tot_xau( $i );
                      }
                  }
             }
             return $rt;
       }
}

if( ! function_exists('xn_ngay_hoang_dao') ){
         function xn_ngay_hoang_dao( $thang_am, $ngay_chi ){
            
            $ngayhoangdao = array(
                                        '1'=> 'thanh long hoàng đạo',
                                        '2'=> 'minh đường hoàng đạo',
                                        '3'=> 'thiên hình hắc đạo',
                                        '4'=> 'chu tước hắc đạo',
                                        '5'=> 'kim quỹ hoàng đạo',
                                        '6'=> 'kim đường hoàng đạo',
                                        '7'=> 'bạch hổ hắc đạo',
                                        '8'=> 'ngọc đường hoàng đạo',
                                        '9'=> 'thiên lao hắc đạo',
                                        '10'=>'nguyên vu hắc đạo',
                                        '11'=>'tư mệnh hoàng đạo',
                                        '12'=>'câu trần hắc đạo',
                         );
                         
           $xem_ngay_hoang_dao = array(
                                        '1,1'=>'1',
                                        '1,2'=>'2',
                                        '1,3'=>'3',
                                        '1,4'=>'4',
                                        '1,5'=>'5',
                                        '1,6'=>'6',
                                        '1,7'=>'7',
                                        '1,8'=>'8',
                                        '1,9'=>'9',
                                        '1,10'=>'10',
                                        '1,11'=>'11',
                                        '1,12'=>'12',
                                        '2,1'=>'11',
                                        '2,2'=>'12',
                                        '2,3'=>'1',
                                        '2,4'=>'2',
                                        '2,5'=>'3',
                                        '2,6'=>'4',
                                        '2,7'=>'5',
                                        '2,8'=>'6',
                                        '2,9'=>'7',
                                        '2,10'=>'8',
                                        '2,11'=>'9',
                                        '2,12'=>'10',
                                        '3,1'=>'9',
                                        '3,2'=>'10',
                                        '3,3'=>'11',
                                        '3,4'=>'12',
                                        '3,5'=>'1',
                                        '3,6'=>'2',
                                        '3,7'=>'3',
                                        '3,8'=>'4',
                                        '3,9'=>'5',
                                        '3,10'=>'6',
                                        '3,11'=>'7',
                                        '3,12'=>'8',
                                        '4,1'=>'7',
                                        '4,2'=>'8',
                                        '4,3'=>'9',
                                        '4,4'=>'10',
                                        '4,5'=>'11',
                                        '4,6'=>'12',
                                        '4,7'=>'1',
                                        '4,8'=>'2',
                                        '4,9'=>'3',
                                        '4,10'=>'4',
                                        '4,11'=>'5',
                                        '4,12'=>'6',
                                        '5,1'=>'5',
                                        '5,2'=>'6',
                                        '5,3'=>'7',
                                        '5,4'=>'8',
                                        '5,5'=>'9',
                                        '5,6'=>'10',
                                        '5,7'=>'11',
                                        '5,8'=>'12',
                                        '5,9'=>'1',
                                        '5,10'=>'2',
                                        '5,11'=>'3',
                                        '5,12'=>'4',
                                        '6,1'=>'3',
                                        '6,2'=>'4',
                                        '6,3'=>'5',
                                        '6,4'=>'6',
                                        '6,5'=>'7',
                                        '6,6'=>'8',
                                        '6,7'=>'9',
                                        '6,8'=>'10',
                                        '6,9'=>'11',
                                        '6,10'=>'12',
                                        '6,11'=>'1',
                                        '6,12'=>'2',
                                        '7,1'=>'1',
                                        '7,2'=>'2',
                                        '7,3'=>'3',
                                        '7,4'=>'4',
                                        '7,5'=>'5',
                                        '7,6'=>'6',
                                        '7,7'=>'7',
                                        '7,8'=>'8',
                                        '7,9'=>'9',
                                        '7,10'=>'10',
                                        '7,11'=>'11',
                                        '7,12'=>'12',
                                        '8,1'=>'11',
                                        '8,2'=>'12',
                                        '8,3'=>'1',
                                        '8,4'=>'2',
                                        '8,5'=>'3',
                                        '8,6'=>'4',
                                        '8,7'=>'5',
                                        '8,8'=>'6',
                                        '8,9'=>'7',
                                        '8,10'=>'8',
                                        '8,11'=>'9',
                                        '8,12'=>'10',
                                        '9,1'=>'9',
                                        '9,2'=>'10',
                                        '9,3'=>'11',
                                        '9,4'=>'12',
                                        '9,5'=>'1',
                                        '9,6'=>'2',
                                        '9,7'=>'3',
                                        '9,8'=>'4',
                                        '9,9'=>'5',
                                        '9,10'=>'6',
                                        '9,11'=>'7',
                                        '9,12'=>'8',
                                        '10,1'=>'7',
                                        '10,2'=>'8',
                                        '10,3'=>'9',
                                        '10,4'=>'10',
                                        '10,5'=>'11',
                                        '10,6'=>'12',
                                        '10,7'=>'1',
                                        '10,8'=>'2',
                                        '10,9'=>'3',
                                        '10,10'=>'4',
                                        '10,11'=>'5',
                                        '10,12'=>'6',
                                        '11,1'=>'5',
                                        '11,2'=>'6',
                                        '11,3'=>'7',
                                        '11,4'=>'8',
                                        '11,5'=>'9',
                                        '11,6'=>'10',
                                        '11,7'=>'11',
                                        '11,8'=>'12',
                                        '11,9'=>'1',
                                        '11,10'=>'2',
                                        '11,11'=>'3',
                                        '11,12'=>'4',
                                        '12,1'=>'3',
                                        '12,2'=>'4',
                                        '12,3'=>'5',
                                        '12,4'=>'6',
                                        '12,5'=>'7',
                                        '12,6'=>'8',
                                        '12,7'=>'9',
                                        '12,8'=>'10',
                                        '12,9'=>'11',
                                        '12,10'=>'12',
                                        '12,11'=>'1',
                                        '12,12'=>'2',
                                      );              
             $key = $thang_am.','.$ngay_chi;
             $rt = array('tot'=>'','xau'=>'');
             if( isset( $xem_ngay_hoang_dao[$key] ) ){
                 if( in_array( $xem_ngay_hoang_dao[$key], array(1,2,5,6,8,11) ) ){
                    $rt['tot'] =  $ngayhoangdao[$xem_ngay_hoang_dao[$key]];
                 }else{
                    $rt['xau'] = $ngayhoangdao[$xem_ngay_hoang_dao[$key]];
                 }
             }
             
             return $rt;
         }
}


if( ! function_exists( 'xn_luc_dieu' ) ){
        function xn_luc_dieu( $thang_am, $ngay_am ){
             $mang = array();
             $mang[1] = array(
                                'ten'=>'Đại an',
                                'tot'=>'Mọi việc đều tốt, nên dùng để mưu việc đại sự',
                                'xau'=>'' 
                                );
             $mang[2] = array(
                                'ten'=>'Lưu niên',  
                                'tot'=>'',
                                'xau'=>'Mọi việc đều bị trễ nải dây dưa, rất khó hoàn thành, dễ gặp những chuyện thị phi, khẩu thiệt. Việc hành chính, giấy tờ, luật pháp, dâng nộp đơn từ, ký kết hợp đồng cũng không thể vội vã được' 
                                );
             $mang[3] = array(
                                'ten'=>'Tốc hỷ',
                                'tot'=>'Niềm vui nhanh chóng, dùng để mưu đại sự, sẽ có thành công mau lẹ, bất ngờ, tốt nhất là tiến hành vào buổi sáng của ngày.',
                                'xau'=>'' 
                                );
             $mang[4] = array(
                                'ten'=>'Xích khẩu',   
                                'tot'=>'',
                                'xau'=>'Là ngày xấu, mưu sự dễ dẫn đến nội bộ mâu thuẫn, cãi vã, thị phi, khẩu thiệt, làm ơn nên oán.' 
                                );
             $mang[5] = array(
                                'ten'=>'Tiểu cát',
                                'tot'=>'Mưu đại sự thì mọi chuyện hanh thông thuận lợi, được quý nhân nâng đỡ, âm phúc độ trì che chở.',
                                'xau'=>'' 
                                );
             $mang[6] = array(
                                'ten'=>'Không vong',
                                'tot'=>'',
                                'xau'=>'Mọi việc đi vào thế bế tắc, trở ngại, tiến độ công việc trì trệ, tiền bạc thất thoát, danh vọng, uy tín bị giảm xuống. Là một ngày xấu về mọi mặt, mưu sự rất khó thành công' 
                                );
             $j = 0;
             for( $i = 1; $i<= $thang_am; $i++ ){
                $j++;
                if( $j > 6 ){
                     $j = 1;
                }
                
             }
             for( $i = 1; $i< $ngay_am; $i++ ){
                $j++;
                if( $j > 6 ){
                     $j = 1;
                }
                
             }
             
             return $mang[$j];
        }   
}


if( ! function_exists( 'xn_hung_tinh' ) ){
          function xn_hung_tinh( $thang_am, $can_ngay, $chi_ngay ){
               $hung_tinh = array();
               $arr_thang_can_ngay = array(
                                            '1'=>'trùng tang',
                                            '2'=>'trùng phục',
                                          );
                                          
              $xd_thang_can_ngay = array(
                                            '1,1'=>'1',
                                            '2,2'=>'1',
                                            '3,6'=>'1',
                                            '4,3'=>'1',
                                            '5,4'=>'1',
                                            '6,6'=>'1',
                                            '7,7'=>'1',
                                            '8,8'=>'1',
                                            '9,6'=>'1',
                                            '10,9'=>'1',
                                            '11,10'=>'1',
                                            '12,6'=>'1',
                                            '1,7'=>'2',
                                            '2,8'=>'2',
                                            '3,6'=>'2',
                                            '4,9'=>'2',
                                            '5,10'=>'2',
                                            '6,5'=>'2',
                                            '7,1'=>'2',
                                            '8,2'=>'2',
                                            '9,6'=>'2',
                                            '10,9'=>'2',
                                            '11,10'=>'2',
                                            '12,6'=>'2',
                                        );       
            $key_thang_can_ngay = $thang_am.','.$can_ngay;
            if( isset( $xd_thang_can_ngay[ $key_thang_can_ngay ] ) ){
                 $k1 = $xd_thang_can_ngay[ $key_thang_can_ngay ];
                 $hung_tinh[] = $arr_thang_can_ngay[$k1];
            }
            
            $arr_thang_can_chi = array(
                                        '1'=>'Thiên địa chính chuyển',
                                        '2'=>'Thiên địa chuyển sát',
                                        '3'=>'Tứ thời đại mộ',
                                        '4'=>'Âm thác',
                                        '5'=>'Dương thác',
                                      );
           
            $xd_thang_can_chi = array(
                                        '1,10,4'=>'1',
                                        '1,2,4'=>'2',
                                        '1,2,8'=>'3',
                                        '1,7,11'=>'4',
                                        '1,1,3'=>'5',
                                        '2,10,4'=>'1',
                                        '2,2,4'=>'2',
                                        '2,2,8'=>'3',
                                        '2,8,10'=>'4',
                                        '2,2,4'=>'5',
                                        '3,10,4'=>'1',
                                        '3,2,4'=>'2',
                                        '3,2,8'=>'3',
                                        '3,9,10'=>'4',
                                        '3,1,5'=>'5',
                                        '4,3,7'=>'1',
                                        '4,3,7'=>'2',
                                        '4,3,11'=>'3',
                                        '4,4,8'=>'4',
                                        '4,4,6'=>'5',
                                        '5,3,7'=>'1',
                                        '5,3,7'=>'2',
                                        '5,3,11'=>'3',
                                        '5,3,7'=>'4',
                                        '5,3,7'=>'5',
                                        '6,3,7'=>'1',
                                        '6,3,7'=>'2',
                                        '6,3,11'=>'3',
                                        '6,4,6'=>'4',
                                        '6,4,8'=>'5',
                                        '7,4,10'=>'1',
                                        '7,8,10'=>'2',
                                        '7,8,2'=>'3',
                                        '7,1,5'=>'4',
                                        '7,8,9'=>'5',
                                        '8,4,10'=>'1',
                                        '8,8,10'=>'2',
                                        '8,8,2'=>'3',
                                        '8,2,4'=>'4',
                                        '8,8,10'=>'5',
                                        '9,4,10'=>'1',
                                        '9,8,10'=>'2',
                                        '9,8,2'=>'3',
                                        '9,1,3'=>'4',
                                        '9,8,11'=>'5',
                                        '10,7,1'=>'1',
                                        '10,9,1'=>'2',
                                        '10,9,5'=>'3',
                                        '10,10,2'=>'4',
                                        '10,10,12'=>'5',
                                        '11,7,1'=>'1',
                                        '11,9,1'=>'2',
                                        '11,9,5'=>'3',
                                        '11,9,1'=>'4',
                                        '11,9,1'=>'5',
                                        '12,7,1'=>'1',
                                        '12,9,1'=>'2',
                                        '12,9,5'=>'3',
                                        '12,10,12'=>'4',
                                        '12,10,2'=>'5',
                                     );
                $key_thang_can_chi = $thang_am.','.$can_ngay.','.$chi_ngay;
                if( isset( $xd_thang_can_chi[ $key_thang_can_chi ] ) ){
                      $k2 = $xd_thang_can_chi[ $key_thang_can_chi ];
                      $hung_tinh[] = $arr_thang_can_chi[ $k2 ];
                } 
                
                $arr_thang_chi_ngay = array(
                                                '1'=>'thiên cương',
                                                '2'=>'thiên lại',
                                                '3'=>'thiên ngục',
                                                '4'=>'tiểu hồng sa',
                                                '5'=>'đại hao',
                                                '6'=>'tiểu hao',
                                                '7'=>'nguyệt phá',
                                                '8'=>'kiếp sát',
                                                '9'=>'địa phá',
                                                '10'=>'thổ phù',
                                                '11'=>'thổ ôn',
                                                '12'=>'thiên ôn',
                                                '13'=>'thọ tử',
                                                '14'=>'hoang vu',
                                                '15'=>'thiên tặc',
                                                '16'=>'địa tặc',
                                                '17'=>'hỏa tai',
                                                '18'=>'nguyệt hỏa, độc hỏa',
                                                '19'=>'nguyệt yếm đại họa',
                                                '20'=>'nguyệt hư (nguyệt sát)',
                                                '21'=>'hoàng sa',
                                                '22'=>'lục bất thành',
                                                '23'=>'nhân cách',
                                                '24'=>'thần cách',
                                                '25'=>'phi ma sát (tai sát)',
                                                '26'=>'ngũ quỷ',
                                                '27'=>'băng tiêu ngọa hãm',
                                                '28'=>'hà khôi (cấu giảo)',
                                                '29'=>'vãng vong (thổ kỵ)',
                                                '30'=>'cửu không',
                                                '31'=>'chu tước',
                                                '32'=>'bạch hổ',
                                                '33'=>'huyền vũ',
                                                '34'=>'câu trần',
                                                '35'=>'lôi công',
                                                '36'=>'cô thần',
                                                '37'=>'quả tú',
                                                '38'=>'sát chủ',
                                                '39'=>'nguyệt hình',
                                                '40'=>'tội chỉ',
                                                '41'=>'nguyệt kiến chuyên sát',
                                                '42'=>'lỗ ban sát',
                                                '43'=>'phủ đầu dát',
                                                '44'=>'tam tang',
                                                '45'=>'ngũ hư',
                                                '46'=>'thổ cầm',
                                                '47'=>'ly sàng',
                                                '48'=>'tứ thời cô quả',
                                                '49'=>'không phòng',
                                                '50'=>'quỷ khốc',
                                           );
                
                $xd_thang_chi_ngay = array(
                                                '1,1'=>'3,25,42',
                                                '1,2'=>'14,16,17,20,48',
                                                '1,3'=>'10,22,29,35',
                                                '1,4'=>'31,41',
                                                '1,5'=>'11,15,30,37,43,44,49',
                                                '1,6'=>'1,4,6,14,18,24,27,38,39,45',
                                                '1,7'=>'5,21,26,32,40',
                                                '1,8'=>'12',
                                                '1,9'=>'7',
                                                '1,10'=>'2,14,23,33,47',
                                                '1,11'=>'13,19,36,50',
                                                '1,12'=>'8,9,28,34,46',
                                                '2,1'=>'1,9,16,27,38,39,40,42',
                                                '2,2'=>'14,30,41,48',
                                                '2,3'=>'21,26',
                                                '2,4'=>'3,10,24',
                                                '2,5'=>'2,13,18,25,43,44',
                                                '2,6'=>'11,14,29,31,34,37,49',
                                                '2,7'=>'6,23,28',
                                                '2,8'=>'5,17,23',
                                                '2,9'=>'8,32',
                                                '2,10'=>'4,7,14,15,19,45,47',
                                                '2,11'=>'12,20,50',
                                                '2,12'=>'33,35,36,46',
                                                '3,1'=>'21,36,42,49',
                                                '3,2'=>'4,9,14,24,27,28,45,48',
                                                '3,3'=>'15,17',
                                                '3,4'=>'2,18,34,41',
                                                '3,5'=>'10,12,25,39,43,44',
                                                '3,6'=>'14,23,33,35',
                                                '3,7'=>'3,11,25,37',
                                                '3,8'=>'1,6,20,31,38,40',
                                                '3,9'=>'5,8,19,29',
                                                '3,10'=>'14,47',
                                                '3,11'=>'7,22,30,32',
                                                '3,12'=>'13,16,46,50',
                                                '4,1'=>'2,14,32',
                                                '4,2'=>'34,36,40',
                                                '4,3'=>'1,8,9,12,18,27,33,46,47',
                                                '4,4'=>'23,25,38,42',
                                                '4,5'=>'14,20,48',
                                                '4,6'=>'4,10,13,22',
                                                '4,7'=>'21,41,47',
                                                '4,8'=>'11,15,19,30,37,43,44',
                                                '4,9'=>'6,14,17,28,35,39,45',
                                                '4,10'=>'3,5,26,31',
                                                '4,11'=>'16,49,50',
                                                '4,12'=>'7,24,29',
                                                '5,1'=>'3,7,13,14,15,25,45',
                                                '5,2'=>'18,20,23,33',
                                                '5,3'=>'21,32,35,36,46,47',
                                                '5,4'=>'9,17,26,27,28,29,30,42',
                                                '5,5'=>'14,48',
                                                '5,6'=>'',
                                                '5,7'=>'10,12,19,39,41,47',
                                                '5,8'=>'34,43,44',
                                                '5,9'=>'11,14,37,38,40',
                                                '5,10'=>'1,2,4,6,16,22,24',
                                                '5,11'=>'5,50',
                                                '5,12'=>'8,31,49',
                                                '6,1'=>'12,14,18,21,30',
                                                '6,2'=>'4,7,22,31,39',
                                                '6,3'=>'40,46,47',
                                                '6,4'=>'3,36,42',
                                                '6,5'=>'1,9,14,32,45,48',
                                                '6,6'=>'15,19',
                                                '6,7'=>'2,13,29,41,47',
                                                '6,8'=>'10,24,33,43,44,49',
                                                '6,9'=>'8,14,16,26',
                                                '6,10'=>'11,17,25,34,37',
                                                '6,11'=>'6,20,27,28,38,50',
                                                '6,12'=>'5,23,35',
                                                '7,1'=>'5',
                                                '7,2'=>'13,26,38',
                                                '7,3'=>'7,39,49',
                                                '7,4'=>'2,14,31',
                                                '7,5'=>'17,19,36',
                                                '7,6'=>'4,8,9,16,24,28,35,46',
                                                '7,7'=>'3,21,25,32,42',
                                                '7,8'=>'14,20,48',
                                                '7,9'=>'10',
                                                '7,10'=>'12,23,29,30,33,40,41,43',
                                                '7,11'=>'11,15,37,44,47,50',
                                                '7,12'=>'1,6,14,18,34,45',
                                                '8,1'=>'2,6,22,28,29',
                                                '8,2'=>'5',
                                                '8,3'=>'8,21',
                                                '8,4'=>'7,14,15,19,24,25,40,45,49',
                                                '8,5'=>'20',
                                                '8,6'=>'26,31,34,36,46',
                                                '8,7'=>'1,9,16,27,30,42',
                                                '8,8'=>'13,14,23,48',
                                                '8,9'=>'12,32,35',
                                                '8,10'=>'3,4,10,39,41,43',
                                                '8,11'=>'17,18,44,47,50',
                                                '8,12'=>'11,14,33,37,38',
                                                '9,1'=>'3,21,25,26,37',
                                                '9,2'=>'1,4,6,11,15,20,24',
                                                '9,3'=>'5,14,19,30,35',
                                                '9,4'=>'34',
                                                '9,5'=>'22,29',
                                                '9,6'=>'7,33,46',
                                                '9,7'=>'14,36,38,42,49',
                                                '9,8'=>'27,28,31,39,48',
                                                '9,9'=>'8,9,13,18',
                                                '9,10'=>'2,41,43',
                                                '9,11'=>'14,32,40,44,47,50',
                                                '9,12'=>'10,12,17',
                                                '10,1'=>'32,41,43',
                                                '10,2'=>'11,15,19,34,37,44',
                                                '10,3'=>'6,14,28,45',
                                                '10,4'=>'3,5,23,33',
                                                '10,5'=>'16,40',
                                                '10,6'=>'4,7,47',
                                                '10,7'=>'2,14,21',
                                                '10,8'=>'38,29',
                                                '10,9'=>'46,49',
                                                '10,10'=>'1,8,9,18,25,31,38,42',
                                                '10,11'=>'14,20,50',
                                                '10,12'=>'10,17,22,24,26,30',
                                                '11,1'=>'10,12,19,41,43',
                                                '11,2'=>'23,33,44',
                                                '11,3'=>'11,14,21,32,37,38',
                                                '11,4'=>'1,2,6,13,16,22,39',
                                                '11,5'=>'5',
                                                '11,6'=>'8,35',
                                                '11,7'=>'3,7,14,15,17,25,45',
                                                '11,8'=>'18,20,26,34',
                                                '11,9'=>'30,36,46',
                                                '11,10'=>'4,9,24,27,28,42,49',
                                                '11,11'=>'14,29,48,50',
                                                '11,12'=>'31,40',
                                                '12,1'=>'2,17,21,41,43',
                                                '12,2'=>'4,10,29,31,44,49',
                                                '12,3'=>'8,14,16',
                                                '12,4'=>'11,12,25,37',
                                                '12,5'=>'6,20,27,28,32,38',
                                                '12,6'=>'5,30,40,47',
                                                '12,7'=>'14,18',
                                                '12,8'=>'7,22,24,33',
                                                '12,9'=>'35,46',
                                                '12,10'=>'3,13,34,36,42',
                                                '12,11'=>'1,9,14,26,39,45,48,50',
                                                '12,12'=>'15,19,23',
                                          );
                
                $key_thang_chi_ngay = $thang_am.','.$chi_ngay;
                if( isset( $xd_thang_chi_ngay[ $key_thang_chi_ngay ] ) ){
                        $k3 = $xd_thang_chi_ngay[ $key_thang_chi_ngay ];
                        $k3 = explode(',',$k3);
                        foreach( $k3 as $val ){
                             $hung_tinh[] = $arr_thang_chi_ngay[$val];
                        }
                }                                                  
              
              return $hung_tinh;
          }
}

if( ! function_exists( 'xn_ngay_ky' ) ){
      function xn_ngay_ky( $ngay_am ){
          if( in_array( $ngay_am, array(3,7,13,18,22,27) ) ){
              $rt = 'Ngày Tam Nương';
          }elseif( in_array( $ngay_am, array( 5,14,23 ) ) ){
              $rt = 'Ngày Nguyệt Kỵ';
          }else{
             $rt = 'Không có';
          }
          
          return $rt;
      } 
}

if( ! function_exists( 'xn_list_ngay_ke_tiep' ) ){
            function xn_list_ngay_ke_tiep( $ngay, $thang, $nam ){
                   $time  = strtotime( $thang.'/'.$ngay.'/'.$nam );
                   $so_ngay_trong_thang =  date('t', $time);
                   $html = '<ul>';
                   for( $i=1; $i <= 15; $i++ ){
                      if( $ngay == $so_ngay_trong_thang ){
                          $ngay = 0;
                          $thang++;
                      }
                      $ngay++;
                      if( $thang > 12 ){
                         $thang = 1;
                         $nam++;
                      }
                      $text = 'Xem ngày tốt xấu '.$ngay.' tháng '.$thang.' Năm '.$nam;
                      $html.='<li><a href="'.base_url('xem-ngay-tot-xau-'.$ngay.'-thang-'.$thang.'-nam-'.$nam).'" title="'.$text.'" >'.$text.'</a></li>';
                   }
                   $html.='</ul>';
                   return $html;
            }
}

if (!function_exists('gan_link_gio_hoanghac_dao')) {
        function gan_link_gio_hoanghac_dao($input)
        {
            $arr_gio_link = array(
                'Tí (23:00-0:59)'       => '<a href="'.base_url('gio-ty-la-gio-nao-gio-ty-la-tu-may-gio-den-may-gio-A270.html').'">Tí (23:00-0:59)</a>',
                'Sửu (1:00-2:59)'       => '<a href="'.base_url('gio-suu-la-gio-nao-la-may-gio-va-tu-vi-nguoi-sinh-gio-suu-A637.html').'">Sửu (1:00-2:59)</a>',
                'Dần (3:00-4:59)'       => '<a href="'.base_url('gio-dan-la-may-gio-gio-dan-tu-may-gio-den-may-gio-nguoi-sinh-vao-gio-dan-co-suong-khong-A268.html').'">Dần (3:00-4:59)</a>',
                'Mão (5:00-6:59)'       => '<a href="'.base_url('gio-mao-la-gio-nao-la-may-gio-va-tu-vi-nguoi-sinh-gio-mao-A638.html').'">Mão (5:00-6:59)</a>',
                'Thìn (7:00-8:59)'      => '<a href="'.base_url('gio-thin-la-gio-nao-la-may-gio-va-tu-vi-nguoi-sinh-gio-thin-A269.html').'">Thìn (7:00-8:59)</a>',
                'Tỵ (9:00-10:59)'       => '<a href="'.base_url('gio-ty-la-gio-nao-la-may-gio-va-tu-vi-nguoi-sinh-gio-ty-A639.html').'">Tỵ (9:00-10:59)</a>',
                'Ngọ (11:00-12:59)'     => '<a href="'.base_url('gio-ngo-la-gio-nao-la-may-gio-va-tu-vi-nguoi-sinh-gio-ngo-A640.html').'">Ngọ (11:00-12:59)</a>',
                'Mùi (13:00-14:59)'     => '<a href="'.base_url('gio-mui-la-gio-nao-la-may-gio-va-tu-vi-nguoi-sinh-gio-mui-A641.html').'">Mùi (13:00-14:59)</a>',
                'Thân (15:00-16:59)'    => '<a href="'.base_url('gio-than-la-gio-nao-la-may-gio-va-tu-vi-nguoi-sinh-gio-than-A642.html').'">Thân (15:00-16:59)</a>',
                'Dậu (17:00-18:59)'     => '<a href="'.base_url('gio-dau-la-gio-nao-la-may-gio-va-tu-vi-nguoi-sinh-gio-dau-A643.html').'">Dậu (17:00-18:59)</a>',
                'Tuất (19:00-20:59)'    => '<a href="'.base_url('gio-tuat-la-gio-nao-la-may-gio-va-tu-vi-nguoi-sinh-gio-tuat-A644.html').'">Tuất (19:00-20:59)</a>',
                'Hợi (21:00-22:59)'     => '<a href="'.base_url('gio-hoi-la-gio-nao-la-may-gio-va-tu-vi-nguoi-sinh-gio-hoi-A645.html').'">Hợi (21:00-22:59)</a>',
            );
            return $arr_gio_link[$input];
        }
    }


  