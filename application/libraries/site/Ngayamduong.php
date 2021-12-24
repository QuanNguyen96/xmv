<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ngayamduong{

    var $ngayduong;

    var $thangduong;

    var $namduong;

    var $ngayam;

    var $thangam;

    var $namam;

    var $songaytrongthang;

    var $canngay;

    var $chingay;

    var $cangio;

    var $chigio;

    var $namcanchi;

    

    public $can = array(

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

        

        public $chi = array(

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

                           

    /** CÔNG THỨC TÍNH NGÀY ÂM **/

    public function INT($d){

                       return floor($d);

    }

    

    /** CÔNG THỨC TÍNH NGÀY ÂM **/

    public function jdFromDate( $dd, $mm, $yy ){

                         $a = $this->INT((14 - $mm) / 12);

                         $y = $yy + 4800 - $a;

                         $m = $mm + 12 * $a - 3;

                         $jd = $dd + $this->INT((153 * $m + 2) / 5) + 365 * $y + $this->INT($y / 4) - $this->INT($y / 100) + $this->INT($y / 400) - 32045;

                         if ($jd < 2299161) {

                          $jd = $dd + $this->INT((153* $m + 2)/5) + 365 * $y + $this->INT($y / 4) - 32083;

                         }

                         return $jd;

    }

    

    /** CÔNG THỨC TÍNH NGÀY ÂM **/

    public function getN( $d, $m, $y ){

                      if ($y < 1582)

                        $n_3 = 47;

                        else if ($y == 1582) {

                        if ($m < 10)

                        $n_3 = 47;

                        else

                        return 57;

                        } else if ($y > 1582 && $y < 1700) {

                        $n_3 = 57;

                        } else if ($y >= 1700) {

                        $nam_2 = (int) ($y / 100);

                        if ($nam_2 % 4 == 0)

                        $nam_2 = $nam_2 - 1;

                        $du = $nam_2 - 17;

                        $ng = (int) ($du / 4);

                        if ($du == 0)

                        $n_3 = 58;

                        else

                        $n_3 = $du - $ng + 58;

                        $l = $y % 100;

                        $k = $y % 4;

                        if ($l == 0 && $k == 0 && $m == 2 && $d < 28) {

                        $n_3 = $n_3 - 1;

                        }

                        }

                        return $n_3;

    } 

    

    /** CÔNG THỨC TÍNH NGÀY ÂM **/

    public function songay( $d, $m, $y ){

                        if ($m == 1)

                        return $d;

                        $t = 0;

                        for ($i = 1; $i < $m; $i++) {

                        if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 8 || $i == 10 || $i == 12) {

                        $t = $t + 31;

                        } elseif ($i == 2) {

                        if ($y % 4 == 0)

                        $t = $t + 29;

                        else

                        $t = $t + 28;

                        } else {

                        $t = $t + 30;

                        }

                        }

                        return $t + $d;

    }

    

    public function jdToDate( $jd ){

                          if ($jd > 2299160) { // After 5/10/1582, Gregorian calendar

                          $a = $jd + 32044;

                          $b = $this->INT((4*$a+3)/146097);

                          $c = $a - $this->INT(($b*146097)/4);

                         } else {

                          $b = 0;

                          $c = $jd + 32082;

                         }

                         $d = $this->INT((4*$c+3)/1461);

                         $e = $c - $this->INT((1461*$d)/4);

                         $m = $this->INT((5*$e+2)/153);

                         $day = $e - $this->INT((153*$m+2)/5) + 1;

                         $month = $m + 3 - 12*$this->INT($m/10);

                         $year = $b*100 + $d - 4800 + $this->INT($m/10);

                         //echo "day = $day, month = $month, year = $year\n";

                         return array($day, $month, $year);

    }

    

   public function getNewMoonDay( $k, $timeZone ){

                         $T = $k/1236.85; // Time in Julian centuries from 1900 January 0.5

                         $T2 = $T * $T;

                         $T3 = $T2 * $T;

                         $dr = M_PI/180;

                         $Jd1 = 2415020.75933 + 29.53058868*$k + 0.0001178*$T2 - 0.000000155*$T3;

                         $Jd1 = $Jd1 + 0.00033*sin((166.56 + 132.87*$T - 0.009173*$T2)*$dr); // Mean new moon

                         $M = 359.2242 + 29.10535608*$k - 0.0000333*$T2 - 0.00000347*$T3; // Sun's mean anomaly

                         $Mpr = 306.0253 + 385.81691806*$k + 0.0107306*$T2 + 0.00001236*$T3; // Moon's mean anomaly

                         $F = 21.2964 + 390.67050646*$k - 0.0016528*$T2 - 0.00000239*$T3; // Moon's argument of latitude

                         $C1=(0.1734 - 0.000393*$T)*sin($M*$dr) + 0.0021*sin(2*$dr*$M);

                         $C1 = $C1 - 0.4068*sin($Mpr*$dr) + 0.0161*sin($dr*2*$Mpr);

                         $C1 = $C1 - 0.0004*sin($dr*3*$Mpr);

                         $C1 = $C1 + 0.0104*sin($dr*2*$F) - 0.0051*sin($dr*($M+$Mpr));

                         $C1 = $C1 - 0.0074*sin($dr*($M-$Mpr)) + 0.0004*sin($dr*(2*$F+$M));

                         $C1 = $C1 - 0.0004*sin($dr*(2*$F-$M)) - 0.0006*sin($dr*(2*$F+$Mpr));

                         $C1 = $C1 + 0.0010*sin($dr*(2*$F-$Mpr)) + 0.0005*sin($dr*(2*$Mpr+$M));

                         if ($T < -11) {

                          $deltat= 0.001 + 0.000839*$T + 0.0002261*$T2 - 0.00000845*$T3 - 0.000000081*$T*$T3;

                         } else {

                          $deltat= -0.000278 + 0.000265*$T + 0.000262*$T2;

                         };

                         $JdNew = $Jd1 + $C1 - $deltat;

                         //echo "JdNew = $JdNew\n";

                         return $this->INT($JdNew + 0.5 + $timeZone/24);

   } 

   

  public function getSunLongitude($jdn, $timeZone ) { 

                         $T = ($jdn - 2451545.5 - $timeZone/24) / 36525; // Time in Julian centuries from 2000-01-01 12:00:00 GMT

                         $T2 = $T * $T;

                         $dr = M_PI/180; // degree to radian

                         $M = 357.52910 + 35999.05030*$T - 0.0001559*$T2 - 0.00000048*$T*$T2; // mean anomaly, degree

                         $L0 = 280.46645 + 36000.76983*$T + 0.0003032*$T2; // mean longitude, degree

                         $DL = (1.914600 - 0.004817*$T - 0.000014*$T2)*sin($dr*$M);

                         $DL = $DL + (0.019993 - 0.000101*$T)*sin($dr*2*$M) + 0.000290*sin($dr*3*$M);

                         $L = $L0 + $DL; // true longitude, degree

                         //echo "\ndr = $dr, M = $M, T = $T, DL = $DL, L = $L, L0 = $L0\n";

                            // obtain apparent longitude by correcting for nutation and aberration

                            $omega = 125.04 - 1934.136 * $T;

                           @ $L = $L - 0.00569 - 0.00478 * Math.sin($omega * $dr);

                         @$L = $L*$dr;

                         $L = $L - M_PI*2*($this->INT($L/(M_PI*2))); // Normalize to (0, 2*PI)

                         return $this->INT($L/M_PI*6);

  }

  

  public function getLunarMonth11($yy, $timeZone) {

                         $off = $this->jdFromDate(31, 12, $yy) - 2415021;

                         $k = $this->INT($off / 29.530588853);

                         $nm = $this->getNewMoonDay($k, $timeZone);

                         $sunLong = $this->getSunLongitude($nm, $timeZone); // sun longitude at local midnight

                         if ($sunLong >= 9) {

                          $nm = $this->getNewMoonDay($k-1, $timeZone);

                         }

                         return $nm;

  }

  

  public function getLeapMonthOffset($a11, $timeZone) {

                         $k = $this->INT(($a11 - 2415021.076998695) / 29.530588853 + 0.5);

                         $last = 0;

                         $i = 1; // We start with the month following lunar month 11

                         $arc = $this->getSunLongitude($this->getNewMoonDay($k + $i, $timeZone), $timeZone);

                         do {

                          $last = $arc;

                          $i = $i + 1;

                          $arc = $this->getSunLongitude($this->getNewMoonDay($k + $i, $timeZone), $timeZone);

                         } while ($arc != $last && $i < 14);

                         return $i - 1;

  }

  

  public function convertSolar2Lunar($dd, $mm, $yy, $timeZone) {

                         $dayNumber = $this->jdFromDate($dd, $mm, $yy);

                         $k = $this->INT(($dayNumber - 2415021.076998695) / 29.530588853);

                         $monthStart = $this->getNewMoonDay($k+1, $timeZone);

                         if ($monthStart > $dayNumber) {

                          $monthStart = $this->getNewMoonDay($k, $timeZone);

                         }

                         $a11 = $this->getLunarMonth11($yy, $timeZone);

                         $b11 = $a11;

                         if ($a11 >= $monthStart) {

                          $lunarYear = $yy;

                          $a11 = $this->getLunarMonth11($yy-1, $timeZone);

                         } else {

                          $lunarYear = $yy+1;

                          $b11 = $this->getLunarMonth11($yy+1, $timeZone);

                         }

                    

                         $lunarDay = $dayNumber - $monthStart + 1;

                         $diff = $this->INT(($monthStart - $a11)/29);

                         $lunarLeap = 0;

                         $lunarMonth = $diff + 11;

                         if ($b11 - $a11 > 365) {

                          $leapMonthDiff = $this->getLeapMonthOffset($a11, $timeZone);

                          if ($diff >= $leapMonthDiff) {

                           $lunarMonth = $diff + 10;

                           if ($diff == $leapMonthDiff) {

                            $lunarLeap = 1;

                           }

                          }

                         }

                         if ($lunarMonth > 12) {

                          $lunarMonth = $lunarMonth - 12;

                         }

                         if ($lunarMonth >= 11 && $diff < 4) {

                          $lunarYear -= 1;

                         }

                         //return array($lunarDay, $lunarMonth, $lunarYear, $lunarLeap);  

                         return array($lunarDay, $lunarMonth, $lunarYear);     

  }

  

  public function convertLunar2Solar($lunarDay, $lunarMonth, $lunarYear, $lunarLeap, $timeZone) {

                          if ($lunarMonth < 11) {

                          $a11 = $this->getLunarMonth11($lunarYear-1, $timeZone);

                          $b11 = $this->getLunarMonth11($lunarYear, $timeZone);

                         } else {

                          $a11 = $this->getLunarMonth11($lunarYear, $timeZone);

                          $b11 = $this->getLunarMonth11($lunarYear+1, $timeZone);

                         }

                         $k = $this->INT(0.5 + ($a11 - 2415021.076998695) / 29.530588853);

                         $off = $lunarMonth - 11;

                         if ($off < 0) {

                          $off += 12;

                         }

                         if ($b11 - $a11 > 365) {

                          $leapOff = $this->getLeapMonthOffset($a11, $timeZone);

                          $leapMonth = $leapOff - 2;

                          if ($leapMonth < 0) {

                           $leapMonth += 12;

                          }

                          if ($lunarLeap != 0 && $lunarMonth != $leapMonth) {

                           return array(0, 0, 0);

                          } else if ($lunarLeap != 0 || $off >= $leapOff) {

                           $off += 1;

                          }

                         }

                         $monthStart = $this->getNewMoonDay($k + $off, $timeZone);

                         return $this->jdToDate($monthStart + $lunarDay - 1);

  }

   

  /** 

   * Xac dinh ngay hien tai theo duong lich.

   * Tra ve mang ngay thang nam hien tai. ngay - thang - nam.

   **/

   public function get_current_date(){

                        $strdate = date( 'j-n-Y', time() ); 

                        $arrdate = explode( '-',$strdate );  

                        return $arrdate;     

   }

  

  

  /**

   * Ngay am lich.

   * $duonglich = array( 'ngay','thang','nam' );

   * Neu khong nhap ngay duong thi lay ngay hien tai.

   * Tra ve mang = array( 'ngay', 'thang', 'nam' );

   **/ 

  public function get_amlich( $duonglich = array() ){

                       if( empty( $duonglich ) ){

                             $duonglich = $this->get_current_date();

                       }

                       return $this->convertSolar2Lunar($duonglich[0], $duonglich[1], $duonglich[2], 7.0);     

  }

  

  /** 

   * Dem so ngay trong thang

   * $duonglich = array( 'ngay', 'thang', 'nam' );

   **/

   public function get_songaytrongthang( $duonglich = array() ){

                        if( empty( $duonglich ) ){

                            $duonglich = $this->get_current_date();

                        }

                        $time  = strtotime( $duonglich[1].'/'.$duonglich[0].'/'.$duonglich[2] );

                        return  date('t', $time);                 

   } 

  

  /**

   * Can va Chi ngay ( dang so )

   * $amlich = array( ngay, thang, nam );

   * Neu khong nhap $amlich thi lay ngay hien tai.

   * Tra ve 1 mang Array( 'can'=>'', 'chi'=>'' );

   **/

   public function get_canchi_ngay( $amlich = array(), $rt = 'number' ){

                        if( empty( $amlich ) ){

                             $amlich = $this->get_amlich();

                        }

                        $n       = $this->getN( $amlich[0], $amlich[1], $amlich[2]  );

                        $songay = $this->songay( $amlich[0], $amlich[1], $amlich[2] );

                        $t1  = ( $amlich[2] - 1) * 365.25 + $songay - $n;

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

                        if( $rt == 'number' ){

                            return $canchi;

                        }else{

                            return $this->can[ $canchi['can'] ].' '.$this->chi[ $canchi['chi'] ];

                        }

                        

   }

   

   /**

    * Can va chi thang ( Dang so )

    * $amlich = array( ngay, thang, nam );

    * Neu khong nhap $amlich thi lay ngay hien tai.

    * Tra ve 1 mang Array( 'can'=>'', 'chi'=>'' );

    **/

   public function get_canchi_thang( $amlich = array(), $rt = 'number' ){

                        if( empty( $amlich ) ){

                             $amlich = $this->get_amlich();

                        } 

                        $number = substr($amlich[2], 3);

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

                        $m = ($can + $amlich[1] - 1) % 10;

                        if ($m == 0)

                            $m = 10;

                        $canchi['can'] = $m;

                        $canchi['chi'] = $amlich[1] >= 11 ? $amlich[1] - 10 : $amlich[1] + 2;

                        if( $rt == 'number' ){

                            return $canchi;

                        }else{

                            return $this->can[ $canchi['can'] ].' '.$this->chi[ $canchi['chi'] ];

                        } 

   }  

   

   /**

    * Can va chi nam ( Dang so )

    * $amlich = array( ngay, thang, nam );

    * Neu khong nhap $amlich thi lay ngay hien tai.

    * Tra ve 1 mang Array( 'can'=>'', 'chi'=>'' ); 

    **/

   public function get_canchi_nam( $amlich = array(), $rt = 'number' ){

                         if( empty( $amlich ) ){

                             $amlich = $this->get_amlich();

                         }

                         $t       = (int) substr($amlich[2], 3);

                         $t       = $t >= 4 ? $t - 4 + 1 : ($t + 10 - 4 + 1);

                         $canchi['can'] = $t;

                         $t       = $amlich[2] % 12;

                         $t       = $t >= 4 ? $t - 4 + 1 : ($t + 12 - 4 + 1);

                         $canchi['chi'] = $t;

                         if( $rt == 'number' ){

                            return $canchi;

                        }else{

                            return $this->can[ $canchi['can'] ].' '.$this->chi[ $canchi['chi'] ];

                        }    

   }

   /**

    * Tra ve thu trong tuan ( vi du: thu2, thu 3,..)

    * $duonglich = array( 'ngay', 'thang', 'nam' );

    **/

   public function get_ngaythu( $duonglich = array(), $number = false ){

                        $weekday = date("l", mktime(0, 0, 0, $duonglich[1], $duonglich[0], $duonglich[2]));

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
