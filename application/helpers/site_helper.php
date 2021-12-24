<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('breadcrumb'))
{
    function breadcrumb($menu=array())
    {
        $html ='<ul class="breadcrumb"><li><a href="'.base_url().'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home </a></li>';
        if( !empty( $menu ) )
        { 
            $url ='';
            foreach( $menu as $val )
            {
                $url ='';
                $url.= '/'.$val['slug']; 
                $html.='<li><a href="'.base_url($url.'.html').'">'.$val['name'].'</a></li>';
                unset($url);
            }  
        }
        $html.='<ul>';
        return $html;
    }
}

if ( ! function_exists('createdlink'))
{
    function createdlink($menu=array())
    {
        $url ='';
        if( !empty( $menu ) )
        { 
            foreach( $menu as $val )
            {
                $url.= '/'.$val['slug']; 
            }  
        }
        return $url;
    }
}
if ( ! function_exists('gio_sinh'))
{
    function gio_sinh()
    {
        $mang = array(
                '23 giờ đến 1 giờ',
                '1 giờ đến 3 giờ',
                '3 giờ đến 5 giờ',
                '5 giờ đến 7 giờ',
                '7 giờ đến 9 giờ',
                '9 giờ đến 11 giờ',
                '11 giờ đến 13 giờ',
                '13 giờ đến 15 giờ',
                '15 giờ đến 17 giờ',
                '17 giờ đến 19 giờ',
                '19 giờ đến 21 giờ',
                '21 giờ đến 23 giờ'
        );
        return $mang;
    }
}

if ( ! function_exists('add_link_khong_minh'))
{
    function add_link_khong_minh($anchor)
    {
        $anchor = trim($anchor); 
        $arr = array(
             array(
               'anchor' =>'Đại an',
               'link'   =>'ngay-dai-an-trong-khong-minh-luc-dieu-la-gi-A1323.html', 
             ),
             array(
               'anchor' =>'Tốc hỷ',
               'link'   =>'ngay-toc-hy-trong-khong-minh-luc-dieu-la-gi-A1324.html', 
             ), 
             array(
               'anchor' =>'Xích khẩu',
               'link'   =>'ngay-xich-khau-trong-khong-minh-luc-dieu-la-gi-A1325.html', 
             ), 
             array(
               'anchor' =>'Không vong',
               'link'   =>'ngay-khong-vong-trong-khong-minh-luc-dieu-la-gi-A1326.html', 
             ), 
             array(
               'anchor' =>'Lưu niên',
               'link'   =>'ngay-luu-nien-trong-khong-minh-luc-dieu-la-gi-A1327.html', 
             ), 
             array(
               'anchor' =>'Tiểu cát',
               'link'   =>'ngay-tieu-cat-trong-khong-minh-luc-dieu-la-gi-A1328.html', 
             )

        );
        foreach ($arr as $key => $value) {
            if($value['anchor'] == $anchor)
            {
                $return = '<a href="'.base_url($value['link']).'">'.$anchor.'</a>';
                break;
            }
        }
        if(!isset($return))
            $return = $anchor;
        return $return;
    }
}

if ( ! function_exists('add_link_thap_nhi_kien_tru'))
{
    function add_link_thap_nhi_kien_tru($anchor)
    {
        $anchor = trim($anchor); 
        $arr = array(
             array(
               'anchor' =>'TRỰC THÀNH',
               'link'   =>'truc-thanh-trong-thap-nhi-kien-tru-la-gi-A1330.html', 
             ),
             array(
               'anchor' =>'TRỰC ĐỊNH',
               'link'   =>'truc-dinh-trong-thap-nhi-kien-tru-la-gi-A1331.html', 
             ),
             array(
               'anchor' =>'TRỰC KIẾN',
               'link'   =>'truc-kien-trong-thap-nhi-kien-tru-la-gi-A1332.html', 
             ),
             array(
               'anchor' =>'TRỰC MÃN',
               'link'   =>'truc-man-trong-thap-nhi-kien-tru-la-gi-A1333.html', 
             ), 
             array(
               'anchor' =>'TRỰC PHÁ',
               'link'   =>'truc-pha-trong-thap-nhi-kien-tru-la-gi-A1334.html', 
             ), 
             array(
               'anchor' =>'TRỰC KHAI',
               'link'   =>'truc-khai-trong-thap-nhi-kien-tru-la-gi-A1335.html', 
             ),
             array(
               'anchor' =>'TRỰC NGUY',
               'link'   =>'truc-nguy-trong-thap-nhi-kien-tru-la-gi-A1336.html', 
             ),
             array(
               'anchor' =>'TRỰC BẾ',
               'link'   =>'truc-be-trong-thap-nhi-kien-tru-la-gi-A1337.html', 
             ),
             array(
               'anchor' =>'TRỰC BÌNH',
               'link'   =>'truc-binh-trong-thap-nhi-kien-tru-la-gi-A1338.html', 
             ),
             array(
               'anchor' =>'TRỰC CHẤP',
               'link'   =>'truc-chap-trong-thap-nhi-kien-tru-la-gi-A1339.html', 
             ), 
             array(
               'anchor' =>'TRỰC THÂU',
               'link'   =>'truc-thau-trong-thap-nhi-kien-tru-la-gi-A1340.html', 
             ), 
             array(
               'anchor' =>'TRỰC TRỪ',
               'link'   =>'truc-tru-trong-thap-nhi-kien-tru-la-gi-A1341.html', 
             ),

        );
        foreach ($arr as $key => $value) {
            if($value['anchor'] == $anchor)
            {
                $return = '<a class="color_red" href="'.base_url($value['link']).'">'.$anchor.'</a>';
                break;
            }
        }
        if(!isset($return))
            $return = $anchor;
        return $return;
    }
}
if ( ! function_exists('cung_hoang_dao'))
{
    function cung_hoang_dao($key = null)
    {
      $mang = array(
        1  => 'Bạch Dương',
        2  => 'Kim Ngưu',
        3  => 'Song Tử',
        4  => 'Cự Giải',
        5  => 'Sư Tử',
        6  => 'Sử Nữ',
        7  => 'Thiên Bình',
        8  => 'Bọ Cạp',
        9  => 'Nhân Mã',
        10 => 'Ma Kết',
        11 => 'Bảo Bình',
        12 => 'Song Ngư',
      );
      if(isset($mang[$key]))
        return $mang[$key];
      else
        return $mang;
    }
} 
if ( ! function_exists('nhom_mau'))
{
    function nhom_mau($key = null)
    {
      $mang = array(
        1  => 'A',
        2  => 'B',
        3  => 'AB',
        4  => 'O',
      );
      if(isset($mang[$key]))
        return $mang[$key];
      else
        return $mang;
    }
}    
if ( ! function_exists('cung_hoang_dao_hop_nhau'))
{
    function cung_hoang_dao_hop_nhau($key = null)
    {
      $mang = array(
        '1,1' => 'cung-bach-duong-va-bach-duong-co-hop-nhau-khong-A2044.html',
        '1,2' => 'cung-bach-duong-va-kim-nguu-co-hop-nhau-khong-A2045.html',
        '1,3' => 'cung-bach-duong-va-song-tu-co-hop-nhau-khong-A2046.html',
        '1,4' => 'cung-bach-duong-va-cu-giai-co-hop-nhau-khong-A2047.html',
        '1,5' => 'cung-bach-duong-va-su-tu-co-hop-nhau-khong-A2048.html',
        '1,6' => 'cung-bach-duong-va-xu-nu-co-hop-nhau-khong-A2049.html',
        '1,7' => 'cung-thien-binh-va-bach-duong-co-hop-nhau-khong-A2050.html',
        '1,8' => 'cung-bo-cap-va-bach-duong-co-hop-nhau-khong-A2051.html',
        '1,9' => 'cung-bach-duong-va-nhan-ma-co-hop-nhau-khong-A2052.html',
        '1,10' => 'cung-bach-duong-va-ma-ket-co-hop-nhau-khong-A2034.html',
        '1,11' => 'cung-bach-duong-va-bao-binh-co-hop-nhau-khong-A2035.html',
        '1,12' => 'cung-bach-duong-va-song-ngu-co-hop-nhau-khong-A2053.html',
        '2,1' => 'cung-bach-duong-va-kim-nguu-co-hop-nhau-khong-A2045.html',
        '2,2' => 'cung-kim-nguu-va-kim-nguu-co-hop-nhau-khong-A2054.html',
        '2,3' => 'cung-kim-nguu-va-song-tu-co-hop-nhau-khong-A2055.html',
        '2,4' => 'cung-kim-nguu-va-cu-giai-co-hop-nhau-khong-A2056.html',
        '2,5' => 'cung-kim-nguu-va-su-tu-co-hop-nhau-khong-A2038.html',
        '2,6' => 'cung-kim-nguu-va-xu-nu-co-hop-nhau-khong-A2057.html',
        '2,7' => 'cung-kim-nguu-va-thien-binh-co-hop-nhau-khong-A2058.html',
        '2,8' => 'cung-kim-nguu-va-bo-cap-co-hop-nhau-khong-A2036.html',
        '2,9' => 'cung-kim-nguu-va-nhan-ma-co-hop-nhau-khong-A2037.html',
        '2,10' => 'cung-ma-ket-va-kim-nguu-co-hop-nhau-khong-A2059.html',
        '2,11' => 'cung-kim-nguu-va-bao-binh-co-hop-nhau-khong-A2074.html',
        '2,12' => 'cung-kim-nguu-va-song-ngu-co-hop-nhau-khong-A2076.html',
        '3,1' => 'cung-bach-duong-va-song-tu-co-hop-nhau-khong-A2046.html',
        '3,2' => 'cung-kim-nguu-va-song-tu-co-hop-nhau-khong-A2055.html',
        '3,3' => 'cung-song-tu-va-song-tu-co-hop-nhau-khong-A2078.html',
        '3,4' => 'cung-song-tu-va-cu-giai-co-hop-nhau-khong-A2079.html',
        '3,5' => 'cung-song-tu-va-su-tu-co-hop-nhau-khong-A2039.html',
        '3,6' => 'cung-xu-nu-va-song-tu-co-hop-nhau-khong-A2062.html',
        '3,7' => 'cung-song-tu-va-thien-binh-co-hop-nhau-khong-A2065.html',
        '3,8' => 'cung-song-tu-va-thien-yet-co-hop-nhau-khong-A2070.html',
        '3,9' => 'cung-song-tu-va-nhan-ma-co-hop-nhau-khong-A2073.html',
        '3,10' => 'cung-ma-ket-va-song-tu-co-hop-nhau-khong-A2084.html',
        '3,11' => 'cung-bao-binh-va-song-tu-co-hop-nhau-khong-A2083.html',
        '3,12' => 'cung-song-tu-va-song-ngu-co-hop-nhau-khong-A2082.html',
        '4,1' => 'cung-bach-duong-va-cu-giai-co-hop-nhau-khong-A2047.html',
        '4,2' => 'cung-kim-nguu-va-cu-giai-co-hop-nhau-khong-A2056.html',
        '4,3' => 'cung-song-tu-va-cu-giai-co-hop-nhau-khong-A2079.html',
        '4,4' => 'cung-cu-giai-va-cu-giai-co-hop-nhau-khong-A2081.html',
        '4,5' => 'cung-cu-giai-va-su-tu-co-hop-nhau-khong-A2040.html',
        '4,6' => 'cung-xu-nu-va-cu-giai-co-hop-nhau-khong-A2080.html',
        '4,7' => 'cung-cu-giai-va-thien-binh-co-hop-nhau-khong-A2077.html',
        '4,8' => 'cung-cu-giai-va-thien-yet-co-hop-nhau-khong-A2075.html',
        '4,9' => 'cung-cu-giai-va-nhan-ma-co-hop-nhau-khong-A2072.html',
        '4,10' => 'cung-cu-giai-va-ma-ket-co-hop-nhau-khong-A2071.html',
        '4,11' => 'cung-bao-binh-va-cu-giai-co-hop-nhau-khong-A2069.html',
        '4,12' => 'cung-cu-giai-va-song-ngu-co-hop-nhau-khong-A2068.html',
        '5,1' => 'cung-bach-duong-va-su-tu-co-hop-nhau-khong-A2048.html',
        '5,2' => 'cung-kim-nguu-va-su-tu-co-hop-nhau-khong-A2038.html',
        '5,3' => 'cung-song-tu-va-su-tu-co-hop-nhau-khong-A2039.html',
        '5,4' => 'cung-cu-giai-va-su-tu-co-hop-nhau-khong-A2040.html',
        '5,5' => 'cung-su-tu-va-su-tu-co-hop-nhau-khong-A2041.html',
        '5,6' => 'cung-xu-nu-va-su-tu-co-hop-nhau-khong-A2042.html',
        '5,7' => 'cung-su-tu-va-thien-binh-co-hop-nhau-khong-A2085.html',
        '5,8' => 'cung-su-tu-va-bo-cap-co-hop-nhau-khong-A2086.html',
        '5,9' => 'cung-nhan-ma-va-su-tu-co-hop-nhau-khong-A2087.html',
        '5,10' => 'cung-ma-ket-va-su-tu-co-hop-nhau-khong-A2095.html',
        '5,11' => 'cung-bao-binh-va-su-tu-co-hop-nhau-khong-A2097.html',
        '5,12' => 'cung-song-ngu-va-su-tu-co-hop-nhau-khong-A2100.html',
        '6,1' => 'cung-bach-duong-va-xu-nu-co-hop-nhau-khong-A2049.html',
        '6,2' => 'cung-kim-nguu-va-xu-nu-co-hop-nhau-khong-A2057.html',
        '6,3' => 'cung-xu-nu-va-song-tu-co-hop-nhau-khong-A2062.html',
        '6,4' => 'cung-xu-nu-va-cu-giai-co-hop-nhau-khong-A2080.html',
        '6,5' => 'cung-xu-nu-va-su-tu-co-hop-nhau-khong-A2042.html',
        '6,6' => 'cung-xu-nu-va-xu-nu-co-hop-nhau-khong-A2114.html',
        '6,7' => 'cung-xu-nu-va-thien-binh-co-hop-nhau-khong-A2111.html',
        '6,8' => 'cung-xu-nu-va-bo-cap-co-hop-nhau-khong-A2110.html',
        '6,9' => 'cung-xu-nu-va-nhan-ma-co-hop-nhau-khong-A2109.html',
        '6,10' => 'cung-xu-nu-va-ma-ket-co-hop-nhau-khong-A2108.html',
        '6,11' => 'cung-xu-nu-va-bao-binh-co-hop-nhau-khong-A2107.html',
        '6,12' => 'cung-xu-nu-va-song-ngu-co-hop-nhau-khong-A2106.html',
        '7,1' => 'cung-thien-binh-va-bach-duong-co-hop-nhau-khong-A2050.html',
        '7,2' => 'cung-kim-nguu-va-thien-binh-co-hop-nhau-khong-A2058.html',
        '7,3' => 'cung-song-tu-va-thien-binh-co-hop-nhau-khong-A2065.html',
        '7,4' => 'cung-cu-giai-va-thien-binh-co-hop-nhau-khong-A2077.html',
        '7,5' => 'cung-su-tu-va-thien-binh-co-hop-nhau-khong-A2085.html',
        '7,6' => 'cung-xu-nu-va-thien-binh-co-hop-nhau-khong-A2111.html',
        '7,7' => 'cung-thien-binh-va-thien-binh-co-hop-nhau-khong-A2105.html',
        '7,8' => 'cung-thien-binh-va-thien-yet-co-hop-nhau-khong-A2104.html',
        '7,9' => 'cung-nhan-ma-va-thien-binh-co-hop-nhau-khong-A2067.html',
        '7,10' => 'cung-thien-binh-va-ma-ket-co-hop-nhau-khong-A2115.html',
        '7,11' => 'cung-thien-binh-va-bao-binh-co-hop-nhau-khong-A2103.html',
        '7,12' => 'cung-thien-binh-va-song-ngu-co-hop-nhau-khong-A2102.html',
        '8,1' => 'cung-bo-cap-va-bach-duong-co-hop-nhau-khong-A2051.html',
        '8,2' => 'cung-kim-nguu-va-bo-cap-co-hop-nhau-khong-A2036.html',
        '8,3' => 'cung-song-tu-va-thien-yet-co-hop-nhau-khong-A2070.html',
        '8,4' => 'cung-cu-giai-va-thien-yet-co-hop-nhau-khong-A2075.html',
        '8,5' => 'cung-su-tu-va-bo-cap-co-hop-nhau-khong-A2086.html',
        '8,6' => 'cung-xu-nu-va-bo-cap-co-hop-nhau-khong-A2110.html',
        '8,7' => 'cung-thien-binh-va-thien-yet-co-hop-nhau-khong-A2104.html',
        '8,8' => 'cung-thien-yet-va-thien-yet-co-hop-nhau-khong-A2101.html',
        '8,9' => 'cung-bo-cap-va-nhan-ma-co-hop-nhau-khong-A2066.html',
        '8,10' => 'cung-ma-ket-va-bo-cap-co-hop-nhau-khong-A2099.html',
        '8,11' => 'cung-bao-binh-va-bo-cap-co-hop-nhau-khong-A2098.html',
        '8,12' => 'cung-song-ngu-va-bo-cap-co-hop-nhau-khong-A2096.html',
        '9,1' => 'cung-bach-duong-va-nhan-ma-co-hop-nhau-khong-A2052.html',
        '9,2' => 'cung-kim-nguu-va-nhan-ma-co-hop-nhau-khong-A2037.html',
        '9,3' => 'cung-song-tu-va-nhan-ma-co-hop-nhau-khong-A2073.html',
        '9,4' => 'cung-cu-giai-va-nhan-ma-co-hop-nhau-khong-A2072.html',
        '9,5' => 'cung-nhan-ma-va-su-tu-co-hop-nhau-khong-A2087.html',
        '9,6' => 'cung-xu-nu-va-nhan-ma-co-hop-nhau-khong-A2109.html',
        '9,7' => 'cung-nhan-ma-va-thien-binh-co-hop-nhau-khong-A2067.html',
        '9,8' => 'cung-bo-cap-va-nhan-ma-co-hop-nhau-khong-A2066.html',
        '9,9' => 'cung-nhan-ma-va-nhan-ma-co-hop-nhau-khong-A2063.html',
        '9,10' => 'cung-nhan-ma-va-ma-ket-co-hop-nhau-khong-A2061.html',
        '9,11' => 'cung-bao-binh-va-nhan-ma-co-hop-nhau-khong-A2060.html',
        '9,12' => 'cung-nhan-ma-va-song-ngu-co-hop-nhau-khong-A2094.html',
        '10,1' => 'cung-bach-duong-va-ma-ket-co-hop-nhau-khong-A2034.html',
        '10,2' => 'cung-ma-ket-va-kim-nguu-co-hop-nhau-khong-A2059.html',
        '10,3' => 'cung-ma-ket-va-song-tu-co-hop-nhau-khong-A2084.html',
        '10,4' => 'cung-cu-giai-va-ma-ket-co-hop-nhau-khong-A2071.html',
        '10,5' => 'cung-ma-ket-va-su-tu-co-hop-nhau-khong-A2095.html',
        '10,6' => 'cung-xu-nu-va-ma-ket-co-hop-nhau-khong-A2108.html',
        '10,7' => 'cung-thien-binh-va-ma-ket-co-hop-nhau-khong-A2115.html',
        '10,8' => 'cung-ma-ket-va-bo-cap-co-hop-nhau-khong-A2099.html',
        '10,9' => 'cung-nhan-ma-va-ma-ket-co-hop-nhau-khong-A2061.html',
        '10,10' => 'cung-ma-ket-va-ma-ket-co-hop-nhau-khong-A2093.html',
        '10,11' => 'cung-ma-ket-va-bao-binh-co-hop-nhau-khong-A2092.html',
        '10,12' => 'cung-ma-ket-va-song-ngu-co-hop-nhau-khong-A2091.html',
        '11,1' => 'cung-bach-duong-va-bao-binh-co-hop-nhau-khong-A2035.html',
        '11,2' => 'cung-kim-nguu-va-bao-binh-co-hop-nhau-khong-A2074.html',
        '11,3' => 'cung-bao-binh-va-song-tu-co-hop-nhau-khong-A2083.html',
        '11,4' => 'cung-bao-binh-va-cu-giai-co-hop-nhau-khong-A2069.html',
        '11,5' => 'cung-bao-binh-va-su-tu-co-hop-nhau-khong-A2097.html',
        '11,6' => 'cung-xu-nu-va-bao-binh-co-hop-nhau-khong-A2107.html',
        '11,7' => 'cung-thien-binh-va-bao-binh-co-hop-nhau-khong-A2103.html',
        '11,8' => 'cung-bao-binh-va-bo-cap-co-hop-nhau-khong-A2098.html',
        '11,9' => 'cung-bao-binh-va-nhan-ma-co-hop-nhau-khong-A2060.html',
        '11,10' => 'cung-ma-ket-va-bao-binh-co-hop-nhau-khong-A2092.html',
        '11,11' => 'cung-bao-binh-va-bao-binh-co-hop-nhau-khong-A2090.html',
        '11,12' => 'cung-bao-binh-va-song-ngu-co-hop-nhau-khong-A2089.html',
        '12,1' => 'cung-bach-duong-va-bao-binh-co-hop-nhau-khong-A2035.html',
        '12,2' => 'cung-kim-nguu-va-bao-binh-co-hop-nhau-khong-A2074.html',
        '12,3' => 'cung-bao-binh-va-song-tu-co-hop-nhau-khong-A2083.html',
        '12,4' => 'cung-bao-binh-va-cu-giai-co-hop-nhau-khong-A2069.html',
        '12,5' => 'cung-bao-binh-va-su-tu-co-hop-nhau-khong-A2097.html',
        '12,6' => 'cung-xu-nu-va-bao-binh-co-hop-nhau-khong-A2107.html',
        '12,7' => 'cung-thien-binh-va-bao-binh-co-hop-nhau-khong-A2103.html',
        '12,8' => 'cung-bao-binh-va-bo-cap-co-hop-nhau-khong-A2098.html',
        '12,9' => 'cung-bao-binh-va-nhan-ma-co-hop-nhau-khong-A2060.html',
        '12,10' => 'cung-ma-ket-va-bao-binh-co-hop-nhau-khong-A2092.html',
        '12,11' => 'cung-bao-binh-va-bao-binh-co-hop-nhau-khong-A2090.html',
        '12,12' => 'cung-song-ngu-va-song-ngu-co-hop-nhau-khong-A2088.html',
      );
      if(isset($mang[$key]))
        return $mang[$key];
      else 
        return $mang;    
    }
}  
if ( ! function_exists('cung_hoang_dao_nhom_mau'))
{
    function cung_hoang_dao_nhom_mau($key = null)
    {
      $mang = array(
        '1,1' => 'cung-bach-duong-nhom-mau-a-A1532.html',
        '1,2' => 'cung-bach-duong-nhom-mau-b-A1546.html',
        '1,3' => 'cung-bach-duong-nhom-mau-ab-A1582.html',
        '1,4' => 'cung-bach-duong-nhom-mau-o-A1562.html',
        '2,1' => 'cung-kim-nguu-nhom-mau-a-A1533.html',
        '2,2' => 'cung-kim-nguu-nhom-mau-b-A1548.html',
        '2,3' => 'cung-kim-nguu-nhom-mau-ab-A1583.html',
        '2,4' => 'cung-kim-nguu-nhom-mau-o-A1563.html',
        '3,1' => 'cung-song-tu-nhom-mau-a-A1534.html',
        '3,2' => 'cung-song-tu-nhom-mau-b-A1549.html',
        '3,3' => 'cung-song-tu-nhom-mau-ab-A1584.html',
        '3,4' => 'cung-song-tu-nhom-mau-o-A1564.html',
        '4,1' => 'cung-cu-giai-nhom-mau-a-A1536.html',
        '4,2' => 'cung-cu-giai-nhom-mau-b-A1551.html',
        '4,3' => 'cung-cu-giai-nhom-mau-ab-A1585.html',
        '4,4' => 'cung-cu-giai-nhom-mau-o-A1565.html',
        '5,1' => 'cung-su-tu-nhom-mau-a-A1537.html',
        '5,2' => 'cung-su-tu-nhom-mau-b-A1553.html',
        '5,3' => 'cung-su-tu-nhom-mau-ab-A1586.html',
        '5,4' => 'cung-su-tu-nhom-mau-o-A1574.html',
        '6,1' => 'cung-xu-nu-nhom-mau-a-A1552.html',
        '6,2' => 'cung-xu-nu-nhom-mau-b-A1554.html',
        '6,3' => 'cung-xu-nu-nhom-mau-ab-A1587.html',
        '6,4' => 'cung-xu-nu-nhom-mau-o-A1575.html',
        '7,1' => 'cung-thien-binh-nhom-mau-a-A1538.html',
        '7,2' => 'cung-thien-binh-nhom-mau-b-A1555.html',
        '7,3' => 'cung-thien-binh-nhom-mau-ab-A1588.html',
        '7,4' => 'cung-thien-binh-nhom-mau-o-A1576.html',
        '8,1' => 'cung-bo-cap-nhom-mau-a-A1540.html',
        '8,2' => 'cung-bo-cap-nhom-mau-b-A1557.html',
        '8,3' => 'cung-bo-cap-nhom-mau-ab-A1589.html',
        '8,4' => 'cung-bo-cap-nhom-mau-o-A1577.html',
        '9,1' => 'cung-nhan-ma-nhom-mau-a-A1542.html',
        '9,2' => 'cung-nhan-ma-nhom-mau-b-A1558.html',
        '9,3' => 'cung-nhan-ma-nhom-mau-ab-A1590.html',
        '9,4' => 'cung-nhan-ma-nhom-mau-o-A1578.html',
        '10,1' => 'cung-ma-ket-nhom-mau-a-A1543.html',
        '10,2' => 'cung-ma-ket-nhom-mau-b-A1559.html',
        '10,3' => 'cung-ma-ket-nhom-mau-ab-A1591.html',
        '10,4' => 'cung-ma-ket-nhom-mau-o-A1579.html',
        '11,1' => 'cung-bao-binh-nhom-mau-a-A1544.html',
        '11,2' => 'cung-bao-binh-nhom-mau-b-A1560.html',
        '11,3' => 'cung-bao-binh-nhom-mau-ab-A1592.html',
        '11,4' => 'cung-bao-binh-nhom-mau-o-A1580.html',
        '12,1' => 'cung-song-ngu-nhom-mau-a-A1545.html',
        '12,2' => 'cung-song-ngu-nhom-mau-b-A1561.html',
        '12,3' => 'cung-song-ngu-nhom-mau-ab-A1594.html',
        '12,4' => 'cung-song-ngu-nhom-mau-o-A1581.html',
      );
      if(isset($mang[$key]))
        return $mang[$key];
      else 
        return $mang;  

    }
}        

if ( ! function_exists('cung_hoang_dao_tinh_yeu'))
{
    function cung_hoang_dao_tinh_yeu($key = null)
    {
      $mang = array(
          1 => 'cung-bach-duong-nam-nu-khi-yeu-A1516.html',
          2 => 'cung-kim-nguu-nam-nu-khi-yeu-A1518.html',
          3 => 'cung-song-tu-nam-nu-khi-yeu-A1524.html',
          4 => 'cung-cu-giai-nam-nu-khi-yeu-A1525.html',
          5 => 'cung-su-tu-nam-nu-khi-yeu-A1526.html',
          6 => 'cung-xu-nu-nam-nu-khi-yeu-A1521.html',
          7 => 'cung-thien-binh-nam-nu-khi-yeu-A1527.html',
          8 => 'cung-bo-cap-nam-nu-khi-yeu-A1528.html',
          9 => 'cung-nhan-ma-nam-nu-khi-yeu-A1529.html',
          10 => 'cung-ma-ket-nam-nu-khi-yeu-A1523.html',
          11 => 'cung-bao-binh-nam-nu-khi-yeu-A1519.html',
          12 => 'cung-song-ngu-nam-nu-khi-yeu-A1530.html',
      );
      if(isset($mang[$key]))
        return $mang[$key];
      else 
        return $mang;  
    }

}

if (!function_exists('ngay_thu'))
{
    function ngay_thu($strtotime)
    {
        $ngay_thu = array(
            1 => 'Thứ 2',
            2 => 'Thứ 3',
            3 => 'Thứ 4',
            4 => 'Thứ 5',
            5 => 'Thứ 6',
            6 => 'Thứ 7',
            7 => 'Chủ nhật'
        );
        $ngay_number = date('N',$strtotime);
        return $ngay_thu[$ngay_number];
    }
}
