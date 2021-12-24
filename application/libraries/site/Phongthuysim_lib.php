<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Phongthuysim_lib
{
    public $CI = null;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

/**PHAN NAY DUNG CHO 4 CC SIM PHONG THUY MOI TREN XEMVANMENH.NET 03-10-2018**/
    /**
     * Ham lay ngu hanh cua cac con so 0-9
     *
     * @param   int $so
     * @return  int $key cua ngu hanh 
     */
    public function nguhanhConso($so = null){
        $arr = array(
                      0 => 3,
                      1 => 2,
                      2 => 2,
                      3 => 4,
                      4 => 4,
                      5 => 5,
                      6 => 5,
                      7 => 1,
                      8 => 1,
                      9 => 3,
                    );

        if ( $so != null && $so >=0 && $so <=9 ) {
          return $arr[$so];
        }
        return $arr;
    }

    /**
     * Ham lay ten ngu hanh theo $key
     *
     * @param   int $key
     * @return  string $tennguhanh 
     */
    public function listNguhanh($key = null){
        $arr = array(
                      1 => 'Kim',
                      2 => 'Mộc',
                      3 => 'Thủy',
                      4 => 'Hỏa',
                      5 => 'Thổ',
                    );

        if ( is_numeric($key) && $key >=0 && $key <=9 ) {
          return $arr[$key];
        }elseif($key != null){
          $arr = array_flip($arr);
          return $arr[$key];
        }
        return $arr;
    }

    /**
     * Ham kiem tra tinh tuong sinh cua cap ngu hanh
     *
     * @param   int $key1, int $key2
     * @return  boolean true if $key1 - $key2 la tuong sinh voi nhau 
     */
    public function nguhanhTuongsinh($key1, $key2){
        $arr = array(
            1 => 3,
            2 => 4,
            3 => 2,
            4 => 5,
            5 => 1
        );
        if ($arr[$key1] == $key2) {
            return true;
        }
        return false;
    }

    /**
     * Ham kiem tra tinh tuong khac cua cap ngu hanh
     *
     * @param   int $key1, int $key2
     * @return  boolean true if $key1 - $key2 la tuong khac voi nhau 
     */
    public function nguhanhTuongkhac($key1, $key2){
      //1-kim 2-moc 3-thuy 4-hoa 5-tho
        $arr = array(
            1 => 2,
            2 => 5,
            3 => 4,
            4 => 1,
            5 => 3
        );
        if ($arr[$key1] == $key2) {
            return true;
        }
        return false;
    }

    /**
     * Ham lay diem sinh khac cua so sim
     *
     * @param   int $sinh, int $khac
     * @return  int score 
     */
    public function diemSinhkhacSosim($sinh, $khac)
    {
        if ($sinh > $khac)
            return 4;
        else if($sinh == $khac) return 2;
        else
            return 0;
    }

    /**
     * Ham tra ve canchi cua cap so
     *
     * @param   int $key1, int $key2
     * @return  string can, chi or array
     */
    public function intLucthaphoagiap($keyy = null)
    {
        $arr = array(
                      '1,1',/*Giáp tý*/
                      '2,2',
                      '3,3',
                      '4,4',
                      '5,5',
                      '6,6',
                      '7,7',
                      '8,8',
                      '9,9',
                      '10,10',
                      
                      '1,11',
                      '2,12',
                      '3,1',
                      '4,2',
                      '5,3',
                      '6,4',
                      '7,5',
                      '8,6',
                      '9,7',
                      '10,8',

                      '1,9',
                      '2,10',
                      '3,11',
                      '4,12',
                      '5,1',
                      '6,2',
                      '7,3',
                      '8,4',
                      '9,5',
                      '10,6',

                      '1,7',
                      '2,8',
                      '3,9',
                      '4,10',
                      '5,11',
                      '6,12',
                      '7,1',
                      '8,2',
                      '9,3',
                      '10,4',

                      '1,5',
                      '2,6',
                      '3,7',
                      '4,8',
                      '5,9',
                      '6,10',
                      '7,11',
                      '8,12',
                      '9,1',
                      '10,2',

                      '1,3',/*Giáp Dần 51*/
                      '2,4',/*Ất Mão 52*/
                      '3,5',/*Bính Thìn 53*/
                      '4,6',/*Đinh Tỵ 54*/
                      '5,7',/*Mậu Ngọ 55*/
                      '6,8',/*Kỷ Mùi 56*/
                      '7,9',/*Canh Thân 57*/
                      '8,10',/*Tân Dậu 58*/
                      '9,11',/*Nhâm Tuất 59*/
                      '10,12',/*Quý Hợi 60*/
                    );
        if($keyy == '00'){
          $key = 40;
        }else{
          $key = (int)$keyy;
        }
        if( $key == 60 ){
          $key = 0;
        }else if ($key > 60) {
          $key = ($key % 60) - 1;
        }else{$key = $key -1;}
        if ( $keyy != null && $key >= 0 && $key <= 60) {
          return $arr[$key];
        }
        return $arr;
    }

    public function nguhanhCan($key = null){
      $arr = array(
                    1 => 2,
                    2 => 2,
                    3 => 4,
                    4 => 4,
                    5 => 5,
                    6 => 5,
                    7 => 1,
                    8 => 1,
                    9 => 3,
                    10=> 3,
                  );
      if ($key != null) {
        $key = (int)$key;
          return $arr[$key];
      }
      return $arr;

    }
    public function nguhanhChi($key = null){
      $arr = array(
                    1 => 3,
                    2 => 5,
                    3 => 2,
                    4 => 2,
                    5 => 5,
                    6 => 4,
                    7 => 4,
                    8 => 5,
                    9 => 1,
                    10=> 1,
                    11=> 5,
                    12=> 3,
                  );
      if ($key != null) {
        $key = (int)$key;
          return $arr[$key];
      }
      return $arr;

    }

    /**
    * @param string $sosim
    * @return array 2character (number) of $sosim
    **/
    public function getCapso($sosim = null){
        if( strlen($sosim) % 2 != 0 ){
            $sosim = substr($sosim, 1);
        }
        return str_split( $sosim ,2 );
    }

    // truyen day sosim
    public function getNguhanhCapSo($sosim = null){
      $arr = array();

      // $count_kim  = 0;
      // $count_moc  = 0;
      // $count_thuy = 0;
      // $count_hoa  = 0;
      // $count_tho  = 0;

      $arr_nguhanh                    = array();
      $arr_nguhanh['Kim']             = array();
      $arr_nguhanh['Kim']['can']      = array();
      $arr_nguhanh['Kim']['chi']      = array();
      $arr_nguhanh['Kim']['phantram'] = 0;

      $arr_nguhanh['Mộc']             = array();
      $arr_nguhanh['Mộc']['can']      = array();
      $arr_nguhanh['Mộc']['chi']      = array();
      $arr_nguhanh['Mộc']['phantram'] = 0;

      $arr_nguhanh['Thủy']             = array();
      $arr_nguhanh['Thủy']['can']      = array();
      $arr_nguhanh['Thủy']['chi']      = array();
      $arr_nguhanh['Thủy']['phantram'] = 0;
      
      $arr_nguhanh['Hỏa']             = array();
      $arr_nguhanh['Hỏa']['can']      = array();
      $arr_nguhanh['Hỏa']['chi']      = array();
      $arr_nguhanh['Hỏa']['phantram'] = 0;
      
      $arr_nguhanh['Thổ']             = array();
      $arr_nguhanh['Thổ']['can']      = array();
      $arr_nguhanh['Thổ']['chi']      = array();
      $arr_nguhanh['Thổ']['phantram'] = 0;


      if (!empty($sosim)) {
        $arr_capso    = $this->getCapso($sosim);
        foreach ($arr_capso as $key => $value) {
            $number_nguhanh           = $this->intLucthaphoagiap($value);
            $arr_nh                   = explode(',', $number_nguhanh);

            $arr[$key]['canchi_so']   = $number_nguhanh;
            $arr[$key]['nguhanh_can']['can'] = $this->nguhanhCan($arr_nh[0]);
            $arr[$key]['nguhanh_chi']['chi'] = $this->nguhanhChi($arr_nh[1]);
            // $arr[$key]['text_can']    = get_can_menh( (int)$arr_nh[0] );
            // $arr[$key]['text_chi']    = get_chi_menh( (int)$arr_nh[1] );

              switch ($key) {
                case 0:
                    $arr[$key]['nguhanh_can']['phantram'] = 3.5;
                    $arr[$key]['nguhanh_chi']['phantram'] = 3.5;
                  break;
                case 1:
                    $arr[$key]['nguhanh_can']['phantram'] = 5.5;
                    $arr[$key]['nguhanh_chi']['phantram'] = 5.5;
                  break;
                case 2:
                    $arr[$key]['nguhanh_can']['phantram'] = 8.5;
                    $arr[$key]['nguhanh_chi']['phantram'] = 8.5;
                  break;
                case 3:
                    $arr[$key]['nguhanh_can']['phantram'] = 13;
                    $arr[$key]['nguhanh_chi']['phantram'] = 13;
                  break;
                case 4:
                    $arr[$key]['nguhanh_can']['phantram'] = 19.5;
                    $arr[$key]['nguhanh_chi']['phantram'] = 19.5;
                  break;
                default:
                  break;
              }
           

            $int_nhcan = $arr[$key]['nguhanh_can']['can'];
            $int_nhchi = $arr[$key]['nguhanh_chi']['chi'];
            switch ( $int_nhcan ) {
              case 1:
                // $count_kim += 1;
                $arr_nguhanh['Kim']['can'][]  = $arr_nh[0];
                $arr_nguhanh['Kim']['phantram'] += $arr[$key]['nguhanh_can']['phantram'];
                break;
              case 2:
                // $count_moc += 1;
                $arr_nguhanh['Mộc']['can'][]  = $arr_nh[0];
                $arr_nguhanh['Mộc']['phantram'] += $arr[$key]['nguhanh_can']['phantram'];
                break;
              case 3:
                // $count_thuy += 1;
                $arr_nguhanh['Thủy']['can'][]  = $arr_nh[0];
                $arr_nguhanh['Thủy']['phantram'] += $arr[$key]['nguhanh_can']['phantram'];
                break;
              case 4:
                // $count_hoa += 1;
                $arr_nguhanh['Hỏa']['can'][]  = $arr_nh[0];
                $arr_nguhanh['Hỏa']['phantram'] += $arr[$key]['nguhanh_can']['phantram'];
                break;
              case 5:
                // $count_tho += 1;
                $arr_nguhanh['Thổ']['can'][]  = $arr_nh[0];
                $arr_nguhanh['Thổ']['phantram'] += $arr[$key]['nguhanh_can']['phantram'];
                break;
            }
            switch ( $int_nhchi ) {
              case 1:
                // $count_kim += 1;
                $arr_nguhanh['Kim']['chi'][]  = $arr_nh[1];
                $arr_nguhanh['Kim']['phantram'] += $arr[$key]['nguhanh_chi']['phantram'];
                break;
              case 2:
                // $count_moc += 1;
                $arr_nguhanh['Mộc']['chi'][]  = $arr_nh[1];
                $arr_nguhanh['Mộc']['phantram'] += $arr[$key]['nguhanh_chi']['phantram'];
                break;
              case 3:
                // $count_thuy += 1;
                $arr_nguhanh['Thủy']['chi'][]  = $arr_nh[1];
                $arr_nguhanh['Thủy']['phantram'] += $arr[$key]['nguhanh_chi']['phantram'];
                break;
              case 4:
                // $count_hoa += 1;
                $arr_nguhanh['Hỏa']['chi'][]  = $arr_nh[1];
                $arr_nguhanh['Hỏa']['phantram'] += $arr[$key]['nguhanh_chi']['phantram'];
                break;
              case 5:
                // $count_tho += 1;
                $arr_nguhanh['Thổ']['chi'][]  = $arr_nh[1];
                $arr_nguhanh['Thổ']['phantram'] += $arr[$key]['nguhanh_chi']['phantram'];
                break;
            }
        }
      }


       $arr_phantram = array(
                              'Kim'  => $arr_nguhanh['Kim']['phantram'],
                              'Mộc'  => $arr_nguhanh['Mộc']['phantram'],
                              'Thủy' => $arr_nguhanh['Thủy']['phantram'],
                              'Hỏa'  => $arr_nguhanh['Hỏa']['phantram'],
                              'Thổ'  => $arr_nguhanh['Thổ']['phantram'],
                            );
      $nguhanhsim    = array_search(max($arr_phantram), $arr_phantram);

      $arr1['nguhanhsim'] = $nguhanhsim;
      $arr1['result']     = $arr;
      $arr1['nguhanh']    = $arr_nguhanh;

     

      return $arr1;
    }

    public function daudayso($sosim){
      $dau['duong']     = '';
      $dau['am']        = '';
      $dau['mangam']    = array();
      $dau['mangduong'] = array();

      for( $i=0; strlen($sosim)>$i; $i++ ){
        if ( $sosim[$i] % 2 == 0 ) {
          $dau['mangam'][ $sosim[$i] ]['txt']    = $sosim[$i];
          
          if (!isset($dau['mangam'][ $sosim[$i] ]['sluong'])) {
            $dau['mangam'][ $sosim[$i] ]['sluong'] = 0;
          }
          if ( isset($dau['mangam'][ $sosim[$i] ]) ) {
            $dau['mangam'][ $sosim[$i] ]['sluong'] = $dau['mangam'][ $sosim[$i] ]['sluong'] + 1;
          }
          $dau['am'] = $dau['am'] + 1;
        }else{
          $dau['mangduong'][ $sosim[$i] ]['txt']    = $sosim[$i];

          if (!isset($dau['mangduong'][ $sosim[$i] ]['sluong'])) {
            $dau['mangduong'][ $sosim[$i] ]['sluong'] = 0;
          }
          if ( isset($dau['mangduong'][ $sosim[$i] ]) ) {
            $dau['mangduong'][ $sosim[$i] ]['sluong'] = $dau['mangduong'][ $sosim[$i] ]['sluong'] + 1;
          }
          $dau['duong'] = $dau['duong'] + 1;
        }
      }

      if($dau['duong']>$dau['am'])$dau['vuon']="Dương";
      if($dau['duong']<$dau['am'])$dau['vuon']="Âm";  
      if($dau['duong']==$dau['am'])$dau['vuon']="Đều";

      return $dau;
  }


    public function xetTuongsinhTuongkhacBinhhoa($nguhanh1, $nguhanh2){

      $loai = null;
      if( $this->nguhanhTuongsinh( $nguhanh1, $nguhanh2 ) ){
              $loai    = 'Tương sinh';
          }
      elseif( $nguhanh1 == $nguhanh2 ){
            
              $loai     = 'Tương hỗ';
          }
      elseif( $this->nguhanhTuongkhac( $nguhanh1, $nguhanh2 ) ){
              $loai      = 'Tương khắc';
          }
      else{ 
          $loai     = 'Không sinh không khắc';
      }
      return $loai;
    }

    public function xetAmduong($thanchu, $sim){
      if ($thanchu == 'Dương' && $sim == 'Dương' || $thanchu == 'Dương' && $sim == 'Đều') {
        $ketluan['loai'] = 'Lệch dương';
        $ketluan['nxet'] = 'Không tốt';
        $ketluan['diem'] = 0;
      }else if($thanchu == 'Âm' && $sim == 'Âm' || $thanchu == 'Âm' && $sim == 'Đều') {
        $ketluan['loai'] = 'Lệch âm';
        $ketluan['nxet'] = 'Không tốt';
        $ketluan['diem'] = 0;
      }elseif($thanchu == 'Dương' && $sim == 'Âm') {
        $ketluan['loai'] = 'Hòa hợp';
        $ketluan['nxet'] = 'Tốt';
        $ketluan['diem'] = 4;
      }elseif($thanchu == 'Âm' && $sim == 'Dương') {
        $ketluan['loai'] = 'Hòa hợp';
        $ketluan['nxet'] = 'Tốt';
        $ketluan['diem'] = 4;
      }
      return $ketluan;
    }

    public function luanNguhanhthanchu($nguhanh = null){
      $nguhanh = mb_convert_case($nguhanh, MB_CASE_TITLE, "UTF-8");

      $arr = array(
                    'Tùng Bách Mộc'    => '<b>Tùng bách mộc</b> (Gỗ cây tùng bách) là 1 trong 5 tính chất của Hành Mộc, người có ngũ hành Tùng bách mộc thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Tùng bách mộc là những người yêu thương những người xung quanh, sống coi trọng tình cảm, đạo đức, cư xử điềm tĩnh coi trọng tình người.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Trong học tập và công việc họ luôn vươn lên không ngừng, nên họ siêng học, thường có thành tích cao, học vấn uyên bác. Trong công việc họ thích sự ổn định, luôn gương mẫu đi đầu và thường đạt được nhiều thành tựu hơn người. Họ có thể kiếm được nhiều tiền, nhưng cốt cách của họ ưa sự giản dị, thanh đạm.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc, mệnh Tùng bách mộc đặc biệt kỵ với các ngũ hành thuộc Kim (Kim khắc Mộc). Khi đi cùng các hành Thủy (Thủy sinh Mộc), Mộc Hỏa đặc biệt là  Thủy để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Trường Lưu Thủy'  => '<b>Trường lưu thủy</b> (Nước sông chảy dài) là 1 trong 5 tính chất của Hành Thủy, người có ngũ hành Trường lưu thủy thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Trường lưu thủy là những người thường hiếu động, sôi nổi, do cuộc sống của nạp âm bản mệnh này nhiều thăng trầm nên trải nghiệm giúp họ ngày càng trưởng thành hơn, bản lĩnh hơn. Khi còn trẻ họ là những người sôi nổi, về già họ rất đáng tin, kinh nghiệm phong phú, đức cao vọng trọng</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Những người mệnh Trường Lưu Thủy có một đức tính miệt mài siêng năng trong công việc. Tài lộc vừa đủ, nhưng tiền vận phải cố gắng phần đấu mới được ấm, hậu vận mới tốt đẹp.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc, mệnh Trường lưu thủy đặc biệt kỵ với các ngũ hành nạp âm thuộc Thổ (Thổ khắc Thủy). Khi đi cùng các hành Kim (Kim sinh Thủy), Thủy Hỏa đặc biệt là Kim để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Sa Trung Kim'     => '<b>Sa trung kim</b> (Vàng trong cát) là 1 trong 5 tính chất của Hành Kim, người có ngũ hành Sa trung kim thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Những người có mệnh Sa trung kim vừa có sự khoan hòa, rộng lượng, tĩnh tại, đôn hậu. Bành thường, người mang mệnh Sa trung kim thường kín đáo, thích bí mật, giữ mình theo khuôn phép, không sa đà quá trớn. Số động họ là người có chí lớn, nhân hậu, độ lượng và rất nghĩa khí.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Trong công viêc họ theo đuổi tác phong cẩn trọng, có quy trình nên dễ thành. Đặc biệt một điều can Giáp sao Vũ khúc hóa khoa, can Ất sao Tử vi hóa khoa, cộng thêm với mệnh cách có Lộc nên giao tài chính, ngân sách cho họ không lo hao hụt, thất thoát, thậm chí còn có thể sinh lời. Một số người có chí hướng kinh doanh thường có nhiều cơ hội làm giàu. Phần nhiều những người có mệnh này thường khá giả, giàu có, những người sinh năm Giáp Ngọ có nhiều cơ hội phát lớn. Còn những người sinh năm Ất Mùi thì thường phải trải qua nhiều gian khó
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc, mệnh Sa trung kim đặc biệt kỵ với các ngũ hành nạp âm thuộc Hỏa (Hỏa khắc Kim). Khi đi cùng các hành Thổ (Thổ sinh Kim), Kim đặc biệt là Thổ để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Sơn Hạ Hỏa'       => '<b>Sơn hạ hỏa</b> (Lửa chân núi) là 1 trong 5 tính chất của Hành Hỏa, người có ngũ hành Sơn hạ hỏa:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Sơn hạ hỏa là những người nhiệt tình, linh hoạt, sáng suốt, tháo vát nhưng sốc nổi, khó kiềm chế cảm xúc.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Trong công việc thường là người trước siêng năng, sau trễ nải, làm biếng, thiếu kiên trì. Một số ít lại là người ham nghiên cứu, thích tìm hiểu, học hành rất giỏi, thông minh sáng suốt, thường có thành tích và học vị cao. Mệnh này thường phải trái qua gian khó, nên thường trung niên họ mới tích lũy được tài sản, thời còn trẻ khó giữ được tiền, lao tâm khổ tứ, vất vả truân chuyên, càng lớn tuổi lộc và phúc của họ càng dày.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Sơn hạ hỏa đặc biệt kỵ với các ngũ hành nạp âm thuộc Thủy (Thủy khắc Hỏa). Khi đi cùng các hành Mộc (Mộc sinh Hỏa), Hỏa đặc biệt là Mộc để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Bình Địa Mộc'     => '<b>Bình địa mộc</b> (Cây trên đất) là 1 trong 5 tính chất của Hành Mộc, người có ngũ hành Bình địa mộc thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Bình địa mộc là những người tính tình ôn hòa, mềm dẻo, dễ gần nhưng nhiều khi yếu đuối, nhu nhược, thiếu đi cá tính và màu sắc của bản thân. Phần đông người thuộc ngũ hành nạp âm này  mong ước có một cuộc sống giản dị, bình thường nên họ không nhiều tham vọng, không ham bon chen, lấy khoan dung độ lượng để ứng xử, lấy khiêm cung trọng hậu để đối đãi với người khác. Họ yêu cuộc sống hòa bình, không thích tranh chấp, hay nhường nhịn và thích giúp đỡ người khác.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Đứng trước áp lực của công việc và cuộc sống nhiều khi họ xử lý không thấu đáo, để hướng tới thành công họ cần tôi rèn nghị lực, ý chí nhiều hơn nữa. Những người thuộc mệnh này thường rất chăm chỉ, siêng năng, khéo tay, tỷ mỉ. Về tiền bạc những người tuổi Mậu Tuất thường có nhiều cơ hội phát tài và giàu sang hơn. Những người tuổi Kỷ Hợi khá vất vả, gian truân nhất là những năm thời trẻ, sau khi trải qua tôi rèn mới có những thành quả nổi bật và hưởng phúc.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Bình địa mộc đặc biệt kỵ với các ngũ hành thuộc Kim (Kim khắc Mộc). Khi đi cùng các hành Thủy (Thủy sinh Mộc), Mộc đặc biệt là Thủy để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',

                    'Bích Thượng Thổ'  => '<b>Bích thượng thổ</b> (Đất trên tường) là 1 trong 5 tính chất của Hành Thổ, người có ngũ hành Bích thượng thổ thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Bích thượng thổ là những người yêu thích sự nguyên tắc và ổn định, ổn định này bao gồm nguyên tắc, lập trường, tư duy, quan điểm nhìn nhận, lối sống, công việc. Tâm lý của họ luôn bền vững, luôn luôn nghĩ điều tốt, làm việc thiện, yêu ghét đều phân minh, rõ ràng</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Người Bích Thượng Thổ có nhân sinh quan cống hiến, luôn vì lợi ích của những người khác không biết mệt mỏi, họ siêng năng làm việc phấn đấu vì công danh, tài lộc. Tiền bạc có, kinh doanh buôn bán được lợi.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Bích thượng thổ đặc biệt kỵ với hành Mộc. Khi đi cùng các hành Hỏa (Hỏa sinh Thổ), Thổ Hỏa đặc biệt là Hỏa thì cát càng thêm cát vì được tương trợ.</i></b>',
                    'Kim Bạch Kim'     => '<b>Kim bạch kim</b> (Vàng lá trắng) là 1 trong 5 tính chất của Hành Kim, người có ngũ hành Kim bạch kim thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Kim Bạch Kim là những người có mệnh này tâm tính thường cô độc, ít hòa hợp người thân, thiên về lý trí nhiều hơn tình cảm.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Họ trung thành với cương vị làm việc, giữ đúng chức trách được giao, rất trọng uy tín trong công việc cũng như cuộc sống. Những người này thường giàu chí tiến thủ, ham làm việc, mê kiếm tiền, phấn đấu vì công danh sự nghiệp. Cả hai tuổi Nhâm Dần, Quý Mão đều cát lợi, có thể bội thu về tiền bạc. Riêng tuổi Nhâm Dần thường bận rộn, bôn ba.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Kim bạch kim đặc biệt kỵ với các ngũ hành nạp âm thuộc Hỏa (Hỏa khắc Kim). Khi đi cùng các hành Thổ (Thổ sinh Kim), Kim Hỏa đặc biệt là Thổ để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát</i></b>',
                    'Phú Đăng Hỏa'     => '<b>Phúc đăng hỏa</b> (Lửa ngọn đèn) là 1 trong 5 tính chất của Hành Hỏa, người có ngũ hành Phúc đăng hỏa:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Phúc đăng hỏa là những người rất nhiệt tình, tốt bụng, thích giúp đỡ người khác, biết quan tâm người khác với một tâm lý sốt sắng. Mẫu người này cũng nóng tính, nhưng giúp đỡ người khác luôn vô tư, hết mình.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Người mang mệnh Phúc đăng hỏa có Lộc cách nên duyên tụ của cải bạc tiền rất lớn, có cuộc sống khá giả hơn người. Nếu vận dụng trong kinh doanh thường đạt hiệu quả cao. Tuy nhiên, những người này thường trải qua nhiều gian khó mới thu được những thành tựu lớn, dù kiếm tiền tốt họ vẫn bị hao tốn
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Phúc đăng hỏa đặc biệt kỵ với các ngũ hành nạp âm thuộc Thủy (Thủy khắc Hỏa). Khi đi cùng các hành Mộc (Mộc sinh Hỏa), Hỏa Hỏa đặc biệt là Mộc để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát</i></b>',
                    'Thiên Hà Thủy'    => '<b>Thiên hà thủy</b> (Nước sông ngân hà) là 1 trong 5 tính chất của Hành Thủy, người có ngũ hành Thiên hà thủy thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Thường là người không những thông tuệ mà còn có sự hơn người, xuất chúng. Những người có mệnh này tính cách, tâm hồn cao thượng, thanh nhã, tinh tế, tác phong cử chỉ lịch thiệp nhã nhặn.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Họ có tư chất trở thành lãnh đạo, quản lý. Tài lộc có nhưng không coi trọng.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc, mệnh Thiên hà thủy đặc biệt kỵ với các ngũ hành nạp âm thuộc Thổ (Thổ khắc Thủy). Khi đi cùng các hành Kim (Kim sinh Thủy), Thủy đặc biệt là Kim để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Đại Trạch Thổ'    => '<b>Đại trạch thổ</b> (Đất đồng bằng) là 1 trong 5 tính chất của Hành Thổ, người có ngũ hành Đại trạch thổ thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Đại dịch thổ tính khí khá tùy duyên, thuận tiện mà hành xử, làm việc, họ cơ trí, linh hoạt, tháo vát, có nhiều kế hoạch và sẵn sàng thay đổi theo chiều hướng mang lại lợi ích đa chiều nhất</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Thường đạt được hiệu quả cao, lòng người thường hướng về, ủng hộ. Hầu hết trong số họ khá giả và giàu có, tiền bạc của họ thu được nhờ nỗ lực quyết tâm và các tác động ngoại cảnh thuận lợi đưa lại.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Đại trạch thổ đặc biệt kỵ với ngũ hành thuộc Mộc (Mộc khắc Thổ). Khi đi cùng các hành Hỏa (Hỏa sinh Thổ), Thổ Hỏa đặc biệt là  Hỏa để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát</i></b>',

                    'Thoa Xuyến Kim'   => '<b>Thoa xuyến kim</b> (Vàng trang sức) là 1 trong 5 tính chất của Hành Kim, người có ngũ hành Thoa xuyến kim thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Thoa Xuyến Kim bản chất đã có khí chất tôn quý, sang trọng, tinh tế nên những người có mệnh này tính cách thường thanh cao. Bản thân họ ưa tác phong thanh lịch, nhẹ nhàng, lối hành xử thô bỉ đối với họ chắc chắn họ không làm, mà những người có tác phong này họ cũng thường không gần gũi</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b>: Trong công việc họ có khát vọng là tỏa sáng. Người mệnh này có Lộc cách nên dù làm nghề gì, hay tự kinh doanh họ cũng có duyên với tiền bạc, tài sản, dễ giàu có, nhất là vào giai đoạn trung niên trở đi, hậu vận sung túc và cát lợi vô cùng.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Thoa xuyến kim đặc biệt kỵ với các ngũ hành nạp âm thuộc Hỏa (Hỏa khắc Kim). Khi đi cùng các hành Thổ (Thổ sinh Kim), Kim Hỏa đặc biệt là Thổ để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Tang Đố Mộc'      => '<b>Tang đố mộc</b> (Gỗ cây dâu) là 1 trong 5 tính chất của Hành Mộc, người có ngũ hành Tang đố mộc thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b>: Người thuộc mệnh Tang đố Mộc là những người có tấm lòng nhân ái, hiền hòa, lương thiện. Đối với họ chữ nhân là cái gốc, là nền tảng để tu thân, lập nghiệp. Nguyên tắc, phương châm sống này trở thành bất di, bất dịch, cố hữu nhưng tốt đẹp và cao quý vô cùng. Điểm xấu nhất của mệnh này là bản thân những người Tang Đố Mộc thị phi rất nhiều, dễ phải tranh luận, biện bác, thậm chí cãi vã hoặc bị hiểu lầm, mang tiếng xấu.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Những người sinh năm Nhâm Tý cơ hội kiếm tiền nhiều hơn, vì có lợi thế về can chi. Những người sinh năm Quý Sửu vất vả hơn, thường trải qua nhiều sóng gió, tôi luyện thì mới có thành quả.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Tang đố mộc đặc biệt kỵ với các ngũ hành thuộc Kim (Kim khắc Mộc). Khi đi cùng các hành Thủy (Thủy sinh Mộc), Mộc Hỏa đặc biệt là Thủy để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Đại Khê Thủy'     => '<b>Đại khê thủy</b> (Nước sông lớn) là 1 trong 5 tính chất của Hành Thủy, người có ngũ hành Đại khê thủy thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Đại khê thủy là những người yêu cuộc sống tự do, không thích bị câu nệ, ước thúc hay tuân theo một khuôn khổ, hình mẫu, họ ghét sự ràng buộc, bức bí. Tính họ nhân ái, thương người, thích giúp đỡ người khác nhưng lại dễ mắc thị phi, miệng tiếng, làm ơn nên oán, hoặc bị hiểu lầm</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Người mệnh này thường có cách làm việc của họ mang tính chất cảm hứng cao, tư duy nhanh nhạy, sắc bén, linh hoạt nếu như có hứng thú họ làm hiệu quả nhanh gấp mười lần, còn không kết quả công việc không cao nếu như mất cảm hứng. Những người có mệnh này đa tài nhưng cũng thường có tật. Họ có nhân sinh quan tiến thủ, tích cực, phấn đấu vì công danh, tiền tài giúp đỡ đời. Tuổi Ất Mão dễ bị hao tốn tiền nong, lãng phí vì cách sống. Hai tuổi này nhờ có tài, lại hưởng lộc cách nên tiền nong không bao giờ thiếu, gần bao mươi tuổi nhiều người đã có tích lũy tiền bạc rồi, càng về già cuộc sống của họ càng sung túc, giàu sang.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc, mệnh Đại khê thủy đặc biệt kỵ với các ngũ hành nạp âm thuộc Thổ (Thổ khắc Thủy). Khi đi cùng các hành Kim (Kim sinh Thủy), Thủy đặc biệt  là Kim để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Sa Trung Thổ'     => '<b>Sa trung thổ</b> (Đất pha cát) là 1 trong 5 tính chất của Hành Thổ, người có ngũ hành Sa trung thổ:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b>: Người thuộc mệnh Sa trung thổ là những người có ý thức về bản thân, coi mình là tôn quý, khác với tục thế vì thế nên họ cô độc, ít bạn bè, những người được coi là bạn thường ít, chơi rất thân. Họ yêu tự do, không thích khuôn khổ, ước thúc, tiết chế hay mực thước. Sa Trung Thổ bề ngoài cứng rắn, kiên quyết nhưng nội tâm mềm mỏng, hiền lành, nhân hậu có phần đa cảm, yếu đuối</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b>: Do sáng tạo, có phúc đức hoặc có tài nên hầu hết họ có những thành công lớn, tiền bạc tích lũy nhiều, thấp nhất cũng là người khá giả, phong lưu, hơn nữa là giàu sang phú quý. Tuy nhiên, công danh sự nghiệp không tự nhiên mà có, phải có sự cố gắng, phấn đấu mới đặng.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Sa trung thổ đặc biệt kỵ với ngũ hành thuộc Mộc (Mộc khắc Thổ). Khi đi cùng các hành Hỏa (Hỏa sinh Thổ), Thổ Hỏa đặc biệt là Hỏa để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát</i></b>',
                    'Thiên Thượng Hỏa' => '<b>Thiên thượng hỏa</b> (Lửa trên trời) là 1 trong 5 tính chất của Hành Hỏa, người có ngũ hành Thiên thượng hỏa thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Thiên thượng hỏa là những người rất thẳng tính, sống ngay thẳng, đường đường chính chính, trực tính, nên cũng nóng tính, rất ghét việc mờ ám, khuất tất và tốt hơn hết đừng nên giấu giếm họ chuyện gì. Những người Thiên Thượng Hỏa rất nhiệt tình, họ sẵn sàng giúp đỡ nếu như được nhờ vả, giúp đỡ người khác một cách vô tư, không hề toan tính lợi ích, không hề vì tư lợi cá nhân.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Họ thường có tư chất của họ thông tuệ, học hành nghiên cứu có thành tích cao. Tiền nong của họ thường không thiếu, vì khả năng làm việc, trau dồi bản thân không biết mệt mỏi của Thiên Thượng Hỏa nên họ ngày càng kiếm được nhiều tiền. Tuy nhiên, mọi thứ đều phải nỗ lực, chăm chỉ làm việc mới đặng.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Thiên thượng hỏa đặc biệt kỵ với các ngũ hành nạp âm thuộc Thủy (Thủy khắc Hỏa).. Khi đi cùng các hành Mộc (Mộc sinh Hỏa), Hỏa Hỏa đặc biệt là Mộc để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',

                    'Thạch Lựu Mộc'    => '<b>Thạch lựu mộc</b> (Gỗ cây thạch lựu) là 1 trong 5 tính chất của Hành Mộc, người có ngũ hành Thạch lựu mộc thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Thạch lựu mộc là những người bề ngoài họ rất hiền từ, nhân hậu nhưng ý chí, nghị lực, cốt cách của họ ít ai sánh bằng. Họ tự tin vào bản thân và cuộc sống, tràn đầy niềm yêu đời</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b>: Những người mang mệnh Thạch Lựu Mộc giàu chí tiến thủ, không ngừng vươn trong công việc vì thế mà đường công danh được lợi. Đặc biệt, người mang mệnh này có Lộc cách nên duyên tụ của cải bạc tiền rất lớn, có cuộc sống khá giả hơn người.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Thạch lựu mộc đặc biệt kỵ với các ngũ hành thuộc Kim (Kim khắc Mộc). Khi đi cùng các hành Thủy (Thủy sinh Mộc), Mộc Hỏa đặc biệt là Thủy để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Đại Hải Thủy'     => '<b>Đại hải thủy</b> (Nước biển) là 1 trong 5 tính chất của Hành Thủy, người có ngũ hành Đại hải thủy thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Đại hải thủy là những người thích cuộc sống tự do và luôn hướng tới tự do. Mệnh này thường đào hoa, dễ bị tình cảm chi phối công danh, sự nghiệp.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Trong kinh doanh họ rất bạo tay, chịu chi, đầu tư lớn. Khi làm việc thì có tinh thần đồng đội cao. Đại Hải Thủy túc trí đa mưu, có nhiều ý tưởng sáng kiến, đầu óc luôn biến động, tư duy linh hoạt sắc bé. Những người sinh năm Quý Hợi dễ giàu có lớn. Còn những người sinh năm Nhâm Tuất thường vất vả hơn
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc, mệnh Đại hải thủy đặc biệt kỵ với các ngũ hành nạp âm thuộc Thổ (Thổ khắc Thủy). Khi đi cùng các hành Kim (Kim sinh Thủy), Thủy đặc biệt là Kim để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Hải Trung Kim'    => '<b>Hải trung kim</b> (Vàng dưới đáy biển) là 1 trong 5 tính chất của Hành Kim, người có ngũ hành Hải trung kim thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Hải trung kim  là những người sống nội tâm, ít chia sẻ, thổ lộ, khép kín. Những người Hải Trung Kim thường suy nghĩ, lo lắng và làm mọi việc về bản thân. Hải Trung Kim cũng luôn ý thức về cái tôi cá nhân, họ thích khẳng định mình, thi thố tài năng.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Tuổi Giáp, Ất đều có Lộc cách, nên buôn bán kinh doanh có duyên, của cải thường tụ mạnh. Nạp âm này là những con giáp đứng đầu hoa giáp, nên họ ham làm những công việc tiên phong, đi đầu và dễ được thành công. Người tuổi Giáp Tý thường may mắn hơn tuổi Ất Sửu, nên đối với tiền bạc mà nói những người tuổi Giáp Tý thường nhanh có tài sản tích lũy hơn, người tuổi Ất Sửu thường phải trải qua một giai đoạn phấn đấu mới có tài sản để dành. Cả hai mệnh này đều linh hoạt, nhạy bén với việc kiếm tiền, cộng thêm với tâm lý "lo cho mình trước" thì phần nhiều họ là những người khá giả, giàu có
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc, mệnh Hải trung kim đặc biệt kỵ với các ngũ hành nạp âm thuộc Hỏa (Hỏa khắc Kim). Khi đi cùng các hành Thổ (Thổ sinh Kim), Kim đặc biệt là Thổ để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Lư Trung Hỏa'     => '<b>Lư trung hỏa</b> (lửa trong lò) là 1 trong 5 tính chất của Hành Hỏa, người có ngũ hành  Lư trung hỏa thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Lư trung hỏa là  những người có cá tình mạnh mẽ, có góc cạnh và bản sắc cá nhân riêng, có chí tiến thủ, tích cực, luôn phấn đấu không ngừng, nhiệt tình, hào phóng, trong công việc và cuộc sống họ luôn căng tràn nhiệt huyết sục sôi hết mình, tác phong linh hoạt, mau lẹ. Tuy nhiên, họ thường rất khó kiềm chế cảm xúc, nóng tính bốc đồng,  tính nóng thì rất dễ gây nên thị phi, dễ thể hiện cảm xúc ra mặt.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Nếu gặp các công việc mang tính chất tiên phong đi đầu hoặc công việc có tính chất chiến lược ngắn hạn sẽ phù hợp. Thu nhập của họ thường không đều đặn, hay bị hao tốn, phần đa họ thuộc tầng lớp khá giả
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Lư trung hỏa đặc biệt khắc kiếm phong kim, sợ hầu hết các mệnh thủy và rất trọng các hành Mộc (Mộc sinh Hỏa), Hỏa đặc biệt là Mộc để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát</i></b>',
                    'Đại Lâm Mộc'      => '<b>Đại lâm mộc</b> (Gỗ cây lớn) là 1 trong 5 tính chất của Hành Mộc, người có ngũ hành Đại lâm mộc thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Đại lâm mộc là những người ôn hòa, điềm tĩnh, hay giúp đỡ người khác. Họ thường là người ham học, siêng năng, không ngừng trau dồi, rèn luyện để mình ngày càng uyên bác, giỏi giang. Tuy nhiên, cuộc sống của họ thường nhiều sóng gió, biến động.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Trong công việc là những người không ngừng cố gắng, nhiều người thuộc mệnh này nếu sinh thuận mùa thuận số thì thành công vang dội. Mệnh này nhiều may mắn, tiền bạc có nếu biết cố gắng gây dựng khi còn trẻ.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc, mệnh Đại lâm mộc đặc biệt kỵ với các ngũ hành thuộc Kim (Kim khắc Mộc). Khi đi cùng các hành Thủy (Thủy sinh Mộc), Mộc đặc biệt là Thủy để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',

                    'Lộ Bàng Thổ'      => '<b>Lộ bàng thổ</b> (Đất ven đường) là 1 trong 5 tính chất của Hành Thổ, người có ngũ hành Lộ bàng Thổ thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Lộ bàng thổ là những người có tính nền nếp, kỷ cương, nguyên tắc, họ luôn luôn chấp hành hệ thống những nội quy, quy định, kể cả trong tư duy, nhận thức họ cũng luôn muốn duy trì trật tự, kỉ cương nền tảng sẵn có, đặc biệt rất coi trọng đạo đức, uy tín. Những người có mệnh này luôn hướng tới một cuộc sống ổn định, trật tự</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Họ khó bạo phát về tài chính, vì ít mạo hiểm. Không có sự mạo hiểm thành quả của họ thường không lớn, nhưng do tích lũy lâu dài nên của cải rất dồi dào, dư dật, một số người giàu có lớn, trở thành cự phú nhờ tích lũy.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Lộ bàng Thổ đặc biệt kỵ với ngũ hành thuộc Mộc (Mộc khắc Thổ). Khi đi cùng các hành Hỏa (Hỏa sinh Thổ), Thổ Hỏa đặc biệt là Hỏa để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát</i></b>',
                    'Kiếm Phong Kim'   => '<b>Kiếm phong kim</b> (Vàng mũi kiếm) là 1 trong 5 tính chất của Hành Kim, người có ngũ hành Kiếm phong kim thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Những người mệnh Kiếm Phong Kim có tư chất quyết đoán, nghiêm nghị, dứt khoát. Họ có nghĩa khí, ưa sự công bằng, lẽ phải, thích ra tay giúp đỡ người khác khi những người khác gặp khó khăn</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Trong công việc họ thường không ngại gian khó, không sợ quyền thế, thường nắm thế thắng. Tài lộc có nhưng phải cố gắng trong công việc thì mới đặng.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc, mệnh Kiếm phong kim đặc biệt kỵ với các ngũ hành nạp âm thuộc Hỏa (Hỏa khắc Kim). khi đi cùng các hành Thổ (Thổ sinh Kim), Kim đặc biệt là Thổ để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Sơn Đầu Hỏa'      => '<b>Sơn đầu hỏa</b> (Lửa trên núi) là 1 trong 5 tính chất của Hành Hỏa, người có ngũ hành Sơn đầu hỏa thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Sơn đầu hỏa là những người nhiệt tình, sôi nổi, trong mọi việc họ thường rất hăng say, tích cực. Họ thường là những người nóng tính, giàu cảm xúc, dể rung động, đa cảm. Thường khi họ nổi giận, phản ứng thường mạnh mẽ, khó kiềm chế</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Người mang mệnh Sơn đầu hỏa tác phong trong công việc đều linh lợi, hoạt bát và có tốc độ hoàn thành nhanh. Nhờ có Lộc cách trong tay nên cuộc sống của họ thường giàu có hoặc khá giả. Duy chỉ có tuổi Giáp Tuất thì hơi vất vả, muốn thành công phải trải qua nhiều gian khó, thử thách
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Sơn đầu hỏa đặc biệt kỵ với hành thuộc Kim vì có tính hình khắc và gây ức chế tâm lý, may mắn của họ cũng giảm đi. Khi đi cùng các hành Mộc (Mộc sinh Hỏa), Hỏa Hỏa đặc biệt là Mộc thì cát càng thêm cát vì được tương trợ phát triển.</i></b>',
                    'Giản Hạ Thủy'     => '<b>Giản hạ thủy</b> (Nước dưới sông) là 1 trong 5 tính chất của Hành Thủy, người có ngũ hành Giản hạ thủy thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Giản hạ thủy là những người thích sở hữu những bí mật, ít bộc lộ nội tâm, kiềm chế cảm xúc, thích sự nhẹ nhàng, sâu lắng, quan điểm lối sống trái ngược với sự bộc trực thô lỗ. Họ học hành giỏi giang, sáng tạo, nhiều ý tưởng mới lạ, giỏi ứng biến trong mọi tình huống</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Tuổi Đinh Sửu thường thành công lớn, tích lũy nhiều tiền bạc trở nên giàu có. Tuổi Bính Tý vất vả và gian truân hơn, họ lại lãng phí, nên khó tích lũy về tiền, thường về già mới có của cải tích lũy.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Giản hạ thủy đặc biệt kỵ với các ngũ hành nạp âm thuộc Thổ (Thổ khắc Thủy). Khi đi cùng các hành Kim (Kim sinh Thủy), Thủy Hỏa đặc biệt là  Kim  thì cát càng thêm cát vì được tương trợ, nhiều may mắn.</i></b>',
                    'Thành Đầu Thổ'    => '<b>Thành đầu thổ</b> (Đất đầu thành) là 1 trong 5 tính chất của Hành Thổ, người có ngũ hành Thành đầu thổ thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Thành đầu thổ là những người thành thật, trung thực và giữ uy tín là một đặc trưng ta cũng thấy rất rõ. Nền tảng được xây dựng nên những tính cách này đó là khuôn phép, mực thước, chuẩn chỉ. Trong cuộc sống, công việc họ luôn là những người thật thà, bảo vệ uy tín còn hơn bảo vệ con ngươi trong mắt mình. Đa số người mang mệnh này mong muốn một cuộc sống ổn định, ít có biến động, sóng gió, tĩnh tại, vì vậy nên họ thích duy trì trật tự cũ hơn là thay đổi cục diện.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Không hăng hái, xông pha, lại ít dám mạo hiểm nên thành quả của họ thu được thường là những khoản tiền không nhiều nhưng đều đặn, ổn định, vì thế quá trình làm giàu và tích lũy của cải của họ phải trải qua một quá trình lâu dài.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Thành đầu thổ đặc biệt kỵ với ngũ hành thuộc Mộc (Mộc khắc Thổ). Khi đi cùng các hành Hỏa (Hỏa sinh Thổ), Thổ Hỏa đặc biệt là Hỏa để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',

                    'Bạch Lạp Kim'     => '<b>Bạch Lạp Kim</b> (Vàng chân đèn) là 1 trong 5 tính chất của Hành Kim, người có ngũ hành Bạch Lạp Kim thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Bạch lạp kim là những người mềm dẻo, lại nóng bỏng nên họ có tính hướng ngoại cao, thích giao tiếp. Họ sôi động, thích đám đông, vui nhộn, rất nhiệt tình, ưa sự náo nhiệt.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Trong công việc họ làm việc với một tác phong linh hoạt, nhanh nhẹn, hoàn thành công việc của mình với một tốc độ nhanh. Bởi có Lộc cách trong mình nên họ giỏi quản lý tiền bạc, có duyên với của cải.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Bạch Lạp Kim đặc biệt kỵ với các ngũ hành nạp âm thuộc Hỏa (Hỏa khắc Kim). Khi đi cùng các hành Thổ (Thổ sinh Kim), Kim đặc biệt là Thổ để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Dương Liễu Mộc'   => '<b>Dương liễu mộc</b> (Gỗ cây dương liễu) là 1 trong 5 tính chất của Hành Mộc, người có ngũ hành Dương liễu mộc thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b>: Người thuộc mệnh Dương liễu mộc là những người có bản tính là mềm dẻo, ôn hòa, uyển chuyển nên họ rất được lòng người, ngoại giao giỏi, thường được nhiều người quý mến và ủng hộ. Họ cư xử ôn hòa, thiện tâm, giàu những đức tính quý báu như thương người, trắc ẩn. Những người Dương Liễu Mộc rất dễ mắc thị phi, bởi bản chất của hành Mộc chủ về thị phi, điều tiếng. Họ sống cao thượng, thanh tao, tâm hồn trong sáng, thiện lương và duyên giác ngộ tôn giáo thường cao.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Người có mệnh Dương Liễu Mộc thường có kinh tế khá giả, một sống người sống rất thanh đạm, giản dị, vì những đặc điểm về thiên can, địa chi, ngũ hành nạp âm và tính cách của họ nên ít người giàu có, thường chỉ no cơm âm áo, hoặc thường thường bậc trung. Riêng người sinh năm Quý Mùi càng cần phải cố gắng hơn.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc, mệnh Dương liễu mộc đặc biệt kỵ với các ngũ hành thuộc Kim (Kim khắc Mộc). Khi đi cùng các hành Thủy (Thủy sinh Mộc), Mộc đặc biệt là Thủy để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Tuyền Trung Thủy' => '<b>Tuyền trung thủy</b> (Nước giếng trong) là 1 trong 5 tính chất của Hành Thủy, người có ngũ hành Tuyền trung thủy thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b>: Người thuộc mệnh Tuyền trung thủy là những người khá phức tạp, thích bình yên, thanh tĩnh nhưng nội tâm biến động, dù trong hoàn cảnh bình yên vẫn hay suy nghĩ, ngoài tĩnh trong động. Họ là những người tác phong cẩn trọng, chậm rãi nhưng nhanh trí, phản ứng mau lẹ. Tuyền Trung Thủy thích giúp đỡ người khác vô tư, không toan tính, họ ưa sự mềm mỏng, nhẹ nhàng, đạo đức thanh cao nhưng một số ít những người có mệnh này có tật xấu là thích ăn chơi, đa tình, cờ bạc.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Đại đa số giàu có, một số ít rất nghèo vì ăn chơi phung phí, bài bạc, vung tay quá trán, bóc ngắn cắn dài.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc, mệnh Tuyền trung thủy đặc biệt kỵ với các ngũ hành nạp âm thuộc Thổ (Thổ khắc Thủy). Khi đi cùng các hành Kim (Kim sinh Thủy), Thủy Hỏa đặc biệt là Kim để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Ốc Thượng Thổ'    => '<b>Ốc thượng thổ</b> (Đất nóc nhà) là 1 trong 5 tính chất của Hành Thổ, người có ngũ hành Ốc thượng thổ:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Ốc thượng thổ là những người có tính nguyên tắc, lập trường rất cao, họ sống theo khuôn khổ và những hệ thống quy tắc chặt chẽ, nhiều khi ta thấy họ bảo thủ, nguyên tắc và cố chấp. Tuy nhiên người thuộc ngũ hành này lại luôn hướng tới việc bảo vệ, che chở những người khác.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Cách làm việc và tác phong của họ cẩn trọng, logic, chặt chẽ, thiên về phòng thủ, giữ gìn, không mạnh về tiến công, nếu duy trì ổn định trật tự thì tốt. Những người sinh năm Bính Tuất là thế hệ nhân tài của đất nước, có nhiều biểu hiện kiệt xuất, cơ hội giàu sang, phú quý nhiều. Những người sinh năm Đinh Hợi thì phải trải qua gian khổ tôi rèn mới có thành tựu
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Ốc thượng thổ đặc biệt kỵ với ngũ hành thuộc Mộc (Mộc khắc Thổ). Khi đi cùng các hành Hỏa (Hỏa sinh Thổ), Thổ Hỏa đặc biệt là Hỏa để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát</i></b>',
                    'Tích Lịch Hỏa'   => '<b>Tích lịch hỏa</b> (Lửa sấm chớp) là 1 trong 5 tính chất của Hành Hỏa, người có ngũ hành Tích lịch hỏa thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Tích lịch hỏa là những người thẳng thắn bộc trực, nghiêm túc và tính nóng vô cùng đi cùng với tác phong mau lẹ, nhanh chóng. Đặc biệt, họ luôn hiếu thắng, ưa được người khác tán tụng, khen ngợi, động viên.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Trong công việc họ xử lý, hoàn thành mau chóng, rất tự tin, quyết đoán. Phù hợp với những công việc mang tính chất tiên phong đi đầu đòi hỏi xử lý nhanh chóng. Tiền bạc thu nhập của họ thường không ổn định, có vận thiên tài, bạo phát nên tự kinh doanh cũng tốt.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Tích lịch hỏa đặc biệt kỵ với các ngũ hành nạp âm thuộc Thủy (Thủy khắc Hỏa). Khi đi cùng các hành Mộc (Mộc sinh Hỏa), Hỏa đặc biệt là Mộc để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',

                    //thích/ tích lịch hỏa /\ bích lôi hỏa
                    'Thích Lịch Hỏa'   => '<b>Thích lịch hỏa</b> (Lửa sấm chớp) là 1 trong 5 tính chất của Hành Hỏa, người có ngũ hành Thích lịch hỏa thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Thích lịch hỏa là những người thẳng thắn bộc trực, nghiêm túc và tính nóng vô cùng đi cùng với tác phong mau lẹ, nhanh chóng. Đặc biệt, họ luôn hiếu thắng, ưa được người khác tán tụng, khen ngợi, động viên.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Trong công việc họ xử lý, hoàn thành mau chóng, rất tự tin, quyết đoán. Phù hợp với những công việc mang tính chất tiên phong đi đầu đòi hỏi xử lý nhanh chóng. Tiền bạc thu nhập của họ thường không ổn định, có vận thiên tài, bạo phát nên tự kinh doanh cũng tốt.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Thích lịch hỏa đặc biệt kỵ với các ngũ hành nạp âm thuộc Thủy (Thủy khắc Hỏa). Khi đi cùng các hành Mộc (Mộc sinh Hỏa), Hỏa đặc biệt là Mộc để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                    'Bích Lôi Hỏa'   => '<b>Bích lịch hỏa</b> (Lửa sấm chớp) là 1 trong 5 tính chất của Hành Hỏa, người có ngũ hành Bích lịch hỏa thường:<br/>
                                             <div class="padd-l">
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspTính cách:</i></b> Người thuộc mệnh Bích lịch hỏa là những người thẳng thắn bộc trực, nghiêm túc và tính nóng vô cùng đi cùng với tác phong mau lẹ, nhanh chóng. Đặc biệt, họ luôn hiếu thắng, ưa được người khác tán tụng, khen ngợi, động viên.</br/>
                                                  <b><i>-&nbsp;&nbsp;&nbsp;&nbspCông việc, tài lộc:</i></b> Trong công việc họ xử lý, hoàn thành mau chóng, rất tự tin, quyết đoán. Phù hợp với những công việc mang tính chất tiên phong đi đầu đòi hỏi xử lý nhanh chóng. Tiền bạc thu nhập của họ thường không ổn định, có vận thiên tài, bạo phát nên tự kinh doanh cũng tốt.
                                             </div>
                                             <b class="hidden"><i>Trong ngũ hành sinh khắc mệnh Bích lịch hỏa đặc biệt kỵ với các ngũ hành nạp âm thuộc Thủy (Thủy khắc Hỏa). Khi đi cùng các hành Mộc (Mộc sinh Hỏa), Hỏa đặc biệt là Mộc để được tương sinh, duy trì và hỗ trợ thì cát càng thêm cát.</i></b>',
                 
                );

              if ($nguhanh != null) {
                if (isset($arr[$nguhanh])) {
                  return $arr[$nguhanh];
                }else{
                  return '';
                }
              }
              return $arr;
    }

    public function getNuoc($key){
      $result = array();
      if ($key == 0) {
        $result['id'] = 10;
      }else{
        $result['id'] = $key;
      }
        

      if( $key == 1 ){
        $result['nuoc_diengiai'] = 'Số nước tịt, dãy số rất xấu.';
        $result['diem'] = 0;
      }
      elseif( in_array($key, array(0,8,9)) ){
        $result['nuoc_diengiai'] = 'Số nước cao, dãy số đẹp.';
        $result['diem'] = 1.5;
      }else if( in_array($key, array(6,7))){
        $result['nuoc_diengiai'] = 'Số nước bình thường.';
        $result['diem'] = 0.5;
      }else{
        $result['nuoc_diengiai'] = 'Số nước thấp, dãy số không đẹp.';
        $result['diem'] = 0;
      }
      return $result;
    }
/**END PHAN NAY DUNG CHO 4 CC SIM PHONG THUY MOI TREN XEMVANMENH.NET 03-10-2018**/
}