<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Boisim_model extends CI_Model{
                                                                                                
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
public function getDiemMoiSim($sosim){
            		$query = 'select * from 1_suadiem where sim2 like \''.$sosim.'\' order by id desc';
                    $return = $this->db->query( $query );
                    $rows   = $return->result_array();
                    return @$rows[0];
	}   
    
 public function getCan($id){
                    $query="SELECT DISTINCT can from jos_sao_can where id='$id'";
                    $return = $this->db->query( $query );
                    $rows   = $return->result_array();
                	return $rows[0]['can'];
   }
   public function getChi($id){
                    $query="SELECT DISTINCT chi from jos_sao_chi where id='$id'";
                    $return = $this->db->query( $query );
                    $rows   = $return->result_array();
                	return $rows[0]['chi'];
   }
   
   public function getNuoc($id){
                	if($id==0)$id=10;
                    $query="SELECT * from jos_sao_nuoc where id='$id'";
                    $return = $this->db->query( $query );
                    $rows   = $return->row_array();
                	return $rows;
   }
   public function tongbinh($a){
                       if($a<5) return "Không đẹp với bạn, chọn một số khác tốt hơn";
                       else if($a==5) return " Số này bình thường không tốt cũng không xấu";
                       else if($a<8&&$a>5)return " Số này khá, chúc mừng bạn";
                       else return " Số này rất đẹp chúc mừng bạn";
   }
 public function getSinhkhac($chi,$chi2,$mau=NULL){
	
                    	if($mau=="")$mau="dãy số";
                    	$string[0]="Ngũ hành của $mau không sinh không khắc với ngũ hành của thân chủ, chấp nhận được.";
                    	$string[1]=0.75;
                    	$chis[0]=$chi;
                    	$chis[1]=$chi2;    
                        $query="select sinh as tuongsinh,khac from jos_sao_khac where he='$chi2' and sinh='$chi'";
                        $return = $this->db->query( $query );
                        $rows   = $return->result_array();
                        if(count(@$rows[0])>=1){
                    	$string[0]="Ngũ hành của $mau là $chi2 tương sinh với $chi của bạn, rất tốt.";
                    	$string[1]=1.5;
                    	return $string;
                    	}
                    	$query="select sinh as tuongsinh,khac from jos_sao_khac where he='$chi2' and khac='$chi'";
                        $return = $this->db->query( $query );
                        $rows   = $return->result_array();
                        if(count(@$rows[0])>=1){
                    	$string[0]="Ngũ hành của $mau là $chi2 tương khắc với $chi của bạn, không tốt.";
                    	$string[1]=-0.75;	
                    	return $string;
                    	}
                    	return $string;
   }
   
   public function getDangian($so){
                        $query="SELECT * from jos_sao_dangian where so like '%$so%'";
                        $return = $this->db->query( $query );
                        $rows   = $return->result_array();
                    	return $rows;
   }
   public function get2socuoi($so){
                        $len=strlen($so);
                        $cuoi=substr($so,$len-2);
                        switch($cuoi){
                        case '39':
                        $d['diem']=0.5;
                        $d['mt']='Đuôi thần tài nhỏ (39)';
                        break;
                        
                        case '79':
                        $d['diem']=0.5;
                        $d['mt']='Đuôi thần tài lớn (79)';
                        break;
                        
                        case '38':
                        $d['diem']=0.5;
                        $d['mt']='Đuôi ông địa nhỏ (38)';
                        break;
                        
                        case '78':
                        $d['diem']=0.5;
                        $d['mt']='Đuôi ông địa lớn (78)';
                        break;
                        
                        case '68':
                        $d['diem']=0.5;
                        $d['mt']='Đuôi lộc phát (68)';
                        break;
                        
                        case '86':
                        $d['diem']=0.5;
                        $d['mt']='Đuôi phát lộc (86)';
                        break;
                        
                        default: 
                        $d['diem']=0;
                        $d['mt']="Không có gì đặc biệt";
                        }
                           return $d;
   
   }
   public function getdacbiet($so){
                        $len=strlen($so);	
                        $so1=substr($so,$len-6,1);
                        $so2=substr($so,$len-5,1);
                        $so3=substr($so,$len-4,1);
                        $so4=substr($so,$len-3,1);
                        $so5=substr($so,$len-2,1);
                        $so6=substr($so,$len-1,1);
                        $doi1=$so1.$so2;
                        $doi2=$so3.$so4;
                        $doi3=$so5.$so6;
                        
                        $nguoc2=$so4.$so3;
                        
                        $ba1=$so1.$so2.$so3;
                        $ba2=$so4.$so5.$so6;
                        $banguoc=$so6.$so5.$so4;
                        $bonso=substr($so,$len-4,4);
                        
                        
                        $d['mt']="";$d['diem']=0;
                        // Luc quy - Taxi - Ngũ quý - Tứ quý 
                        if($so1==$so2&&$so2==$so3&&$so3==$so4&&$so4==$so5&&$so5==$so6){
                          $d['mt']="Trong dãy số có chứa dạng Sim lục quý(".$so1.$so2.$so3.$so4.$so5.$so6.").";$d['diem']=1;	
                        }else if(($doi1==$doi2&&$doi2==$doi3)||($ba1==$ba2)||($ba1==$banguoc)){
                          $d['mt']="Trong dãy số có chứa dạng Sim Taxi(".$doi1.$doi2.$doi3.").";	$d['diem']=1;
                        }else if($so6==$so2&&$so2==$so3&&$so3==$so4&&$so4==$so5){
                          $d['mt']="Trong dãy số có chứa dạng Sim ngũ quý(".$so2.$so3.$so4.$so5.$so6.").";$d['diem']=1;
                        }else if($so3==$so4&&$so4==$so5&&$so5==$so6){
                          $d['mt']="Trong dãy số có chứa dạng Sim tứ quý(".$so3.$so4.$so5.$so6.").";$d['diem']=1;
                        }
                        // Tam hoa - ABAB - AABB - ABBA 
                        if($d['mt']==""){
                          switch($bonso){
                        	case "6789":  $d['mt']="Trong dãy số có chứa dạng Sim đặc biệt ($bonso)";$d['diem']=1;break;
                            case "6688":  $d['mt']="Trong dãy số có chứa dạng Sim đặc biệt ($bonso)";$d['diem']=1;break;
                            case "8866":  $d['mt']="Trong dãy số có chứa dạng Sim đặc biệt ($bonso)";$d['diem']=1;break;
                          }
                          
                        
                        
                        
                        }
                        if($d['mt']==""){
                          if($so4==$so5&&$so5==$so6){
                          $d['mt']="Trong dãy số có chứa dạng sim Tam hoa(".$so4.$so5.$so6.").";$d['diem']=1;
                          }else if($doi2==$doi3||$doi3==$nguoc2){
                           $d['mt']="Trong dãy số có chứa dạng sim Đặc biệt ($doi2"."$doi3).";$d['diem']=1;
                          }
                        }
                        // Hai so cuoi 39 - 79 - 38 - 78 - 68 - 86
                        $mang = array(39,79,38,78,68,86);
                        $mang_title = array('39'=>' Đuôi thần tài nhỏ (39).','79'=>' Đuôi thần tài lớn (79)','38'=>' Đuôi ông địa nhỏ (38)','78'=>' Đuôi ông địa lớn (78)','68'=>' Đuôi lộc phát (68)','86'=>' Đuôi phát lộc (86)');
                        foreach( $mang as $val )
                        {
                          str_replace( $val,'',$so, $count );
                          if($count>0)
                          {
                                $d['mt'].= 'chứa '.$mang_title[$val];
                                $d['diem']= 1;
                                break;
                          }    
                        }
                        if( $d['mt'] == '' ){
                            $d['mt'] = 'Trong dãy số không chứa dạng số đặc biệt';
                        }
                        //switch($doi3):
//                        case "39": $d['mt'].=" Đuôi thần tài nhỏ.";$d['diem']=(int)$d['diem']+1;break;
//                        case "79": $d['mt'].=" Đuôi thần tài lớn.";$d['diem']=(int)$d['diem']+1;break;
//                        case "38": $d['mt'].=" Đuôi ông địa nhỏ.";$d['diem']=(int)$d['diem']+1;break;
//                        case "78": $d['mt'].=" Đuôi ông địa lớn.";$d['diem']=(int)$d['diem']+1;break;
//                        case "68": $d['mt'].=" Đuôi lộc phát.";$d['diem']=(int)$d['diem']+1;break;
//                        case "86": $d['mt'].=" Đuôi phát lộc.";$d['diem']=(int)$d['diem']+1;break;
//                        endswitch;
                        return $d;
}
   
   public function get4socuoi($so){
	   
                        $len=strlen($so);
                        $boso=trim(substr($so,$len-4,4));
                        echo $boso;
                        $s2dau=trim(substr($so,$len-4,2));
                        $s2cuoi=trim(substr($so,$len-2));
                        $s2nguoc1=substr($s2cuoi,1,1).substr($s2cuoi,0,1);
                        $s2nguoc2=substr($s2dau,1,1).substr($s2dau,0,1);
                        if($boso=="6789"){
                        $d['diem']=1;
                        $d['mt']='Đặc biệt có đuôi '.substr($so,$len-4);
                        }else if($boso=="6688"){
                        $d['diem']=1;
                        $d['mt']='Đặc biệt có đuôi '.substr($so,$len-4);
                        }else if($boso=="8866"){
                        $d['diem']=1;
                        $d['mt']='Đặc biệt có đuôi '.substr($so,$len-4);
                        }else if($s2cuoi==$s2dau){
                        $d['diem']=0.5;
                        $d['mt']='Đặc biệt có đuôi '.substr($so,$len-4);	
                        }else if($s2nguoc1==$s2dau) {
                          $d['diem']=0.5;
                          $d['mt']='Đặc biệt có đuôi '.substr($so,$len-4);	
                        }else if($s2nguoc1==$s2cuoi&&$s2nguoc2==$s2dau){
                          $d['diem']=0.5;
                          $d['mt']='Đặc biệt có đuôi '.substr($so,$len-4);	
                        }else{
                           $d['diem']=0;
                          $d['mt']='Không có gì đặc biệt';	
                         }
                           return $d;
   }
   
   public function get3socuoi($so){
                       $len=strlen($so);
                       $so1=substr($so,$len-3,1);
                       $so2=substr($so,$len-2,1);
                       $so3=substr($so,$len-1,1);
                       if($so1==$so2&&$so2==$so3){
                        $d['diem']=0.5;
                        $d['mt']='Đặc biệt có đuôi '.substr($so,$len-3);	
                    	} else{
                       $d['diem']=0;
                       $d['mt']='Không có gì đặc biệt';	
                        }
                       return $d;
   }
   
   public function getcanThang($nam,$thang){
                    	  $number=substr($nam,3);
                       if($number==1||$number==6) $can=7;
                       if($number==2||$number==7) $can=9;
                       if($number==3||$number==8) $can=1;
                       if($number==4||$number==9) $can=3;
                       if($number==5||$number==0) $can=5;
                            $m=($can+$thang-1)%10;
                    		if($m==0)$m=10;
                    	return $this->getCan($m);	
   }
   
  public function getCanChingay($n,$songay,$y){
                         $t1=($y-1)*365.25+$songay-$n;
                        $t2=(int)($t1/60);
                        $t=$t1-$t2*60;
                        $chi=$t%12;
                        
                        if($chi==0)$chi=12;
                        $canchi['chi']=$this->getChi($chi);
                        
                        $can=$t%10;
                        if($can==0)$can=10;
                        $canchi['can']=$this->getCan($can);
                        return $canchi;
   }
    
	
		
public function getLucThap($canchi){
                        $query="SELECT * FROM `jos_sao_lucthap` WHERE `canchi` LIKE '%$canchi%' ";
                        $return = $this->db->query( $query );
                        $rows   = $return->row_array();
                    	return $rows;
}

public function getNguhanhThang($chi){
                        $query="SELECT chi FROM `jos_sao_nguhanhthang` WHERE `he`='$chi' ";
                        $return = $this->db->query( $query );
                        $rows   = $return->result_array();
                    	return $rows[0]['chi'];
}
public function getHedayso($so){
                    	$k=str_split($so);
                    	for($j=0;count($k)>$j;$j++){
                        	$m=$k[$j];
                        	$query="SELECT * FROM `jos_sao_tinhso` WHERE `so`='$m' ";			
                            $return = $this->db->query( $query );
                            $rows   = $return->result_array();
                        	$mang['so'][$j]=$k[$j];
                        	$mang['he'][$j]=$rows[0]['he'];
                        	//$mang['tinh'][$j]=$rows->tinh;
                        	//$mang['diengiai'][$j]=$rows->diengiai;
                   		}
                   		return $mang;	
}


public function INT($d) {
	               return floor($d);
}

public function jdFromDate($dd, $mm, $yy) {
	$a = $this->INT((14 - $mm) / 12);
	$y = $yy + 4800 - $a;
	$m = $mm + 12 * $a - 3;
	$jd = $dd + $this->INT((153 * $m + 2) / 5) + 365 * $y + $this->INT($y / 4) - $this->INT($y / 100) + $this->INT($y / 400) - 32045;
	if ($jd < 2299161) {
		$jd = $dd + $this->INT((153* $m + 2)/5) + 365 * $y + $this->INT($y / 4) - 32083;
	}
	return $jd;
}

public function jdToDate($jd) {
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

public function getNewMoonDay($k, $timeZone) {
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

public function getSunLongitude($jdn, $timeZone) {
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
    $L = $L - 0.00569 - 0.00478 * sin($omega * $dr);
	$L = $L*$dr;
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

/* Comvert solar date dd/mm/yyyy to the corresponding lunar date */
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
	return array($lunarDay, $lunarMonth, $lunarYear, $lunarLeap);
}

/* Convert a lunar date to the corresponding solar date */
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
public function getN($d,$m,$y){
if($y<1582)$n_3=47;
else if($y==1582){
   if($m<10)$n_3=47;
   else return 57;
}else if($y>1582&&$y<1700){
	$n_3=57;
}else if($y>=1700){
	$nam_2=(int)($y/100);
	if($nam_2%4==0)$nam_2=$nam_2-1;
	$du=$nam_2-17;
	$ng=(int)($du/4);
	if($du==0)$n_3=58;
	else $n_3=$du-$ng+58;
	$l=$y%100;
	$k=$y%4;
	if($l==0&&$k==0&&$m==2&&$d<28){
		$n_3=$n_3-1;
	}
}
	return $n_3;

}
public function songay($d,$m,$y){
if($m==1)return $d;
	$t=0;
for($i=1;$i<$m;$i++){
	if($i==1||$i==3||$i==5||$i==7||$i==8||$i==10||$i==12){
		$t=$t+31;
	}elseif($i==2){
	   if($y%4==0)$t=$t+29;
	   else $t=$t+28;
	}
	else {
	$t=$t+30;	
	}
	
}
return $t+$d;
}
public function changeSum($text){
	$sum=0;
		$k=str_split($text);
		for($j=0;count($k)>$j;$j++){
		$sum=$sum+$k[$j];
		}	
		return $sum;
	}
public function changedau($text){
	    $dau['am']='';
		$dau['duong']='';
		$dau['dau']='';
		$k=str_split($text);
		for($j=0;count($k)>$j;$j++){ 
		$dau['so'][]=$k[$j];
		if($k[$j]%2==0){
			$dau['dau'][]="-";
			$dau['am']=$dau['am']+1;
		}else{
			 $dau['dau'][]="+";
			 $dau['duong']=$dau['duong']+1;
		  }
		}
		if($dau['duong']>$dau['am'])$dau['vuon']="Dương";
		if($dau['duong']<$dau['am'])$dau['vuon']="Âm";	
		if($dau['duong']==$dau['am'])$dau['vuon']="Đều";		
		return $dau;
	}
public function nhanxetdau22($a,$b){
if($a==$b) {
	$nx['duongam']="Số lượng số mang vận âm dương hoàn toàn cân bằng, dãy số đạt được hoà hợp âm dương, rất tốt.";
	$nx['diem']=2;	
}else if($a==$b+1||$b==$a+1){
	$nx['duongam']="Số lượng số mang vận âm dương khá cân bằng, dãy số đạt được hoà hợp âm dương, rất tốt.";
	$nx['diem']=1;
}else if($a>$b+1||$b>$a+1){
	 $nx['duongam']="Số lượng số mang vận âm và dương khá chênh lệch, dãy số này chỉ tương đối hòa hợp..";
	 $nx['diem']=0;
}
return $nx;

}
public function nhanxetdau($a,$b){
    
	$tileam=(int)(($a/($a+$b))*100);
	//$tileam=$tlam*100;
	
	$tileduong=(int)(($b/($a+$b))*100);
	//$tileduong=$tlduong*100;
  //  echo $tileam.'/'.$tileduong;
	if($tileam==$tileduong){
		$nx['duongam']=" số lượng số mang vận âm và dương cân bằng, âm dương hòa hợp rất tốt.";
		$nx['diem']=1;
	}
	else if($tileam>=40 && $tileam<=50){
		$nx['duongam']=" số lượng số mang vận âm và dương cân bằng, âm dương hòa hợp rất tốt.";
		$nx['diem']=1;
	}
	else if($tileduong>=40 && $tileduong<=50){
		$nx['duongam']=" số lượng số mang vận âm và dương cân bằng, âm dương hòa hợp rất tốt.";
		$nx['diem']=1;
	}else if($tileduong>=20 && $tileduong < 40){
		$nx['duongam']="số lượng số âm và dương trong dẫy số khá chênh lệch, chưa thực sự hòa hợp.";
		$nx['diem']=0.5;
	}else if($tileam>=20 && $tileam < 40){
		$nx['duongam']="số lượng số âm và dương trong dẫy số khá chênh lệch, chưa thực sự hòa hợp.";
		$nx['diem']=0.5;
	}else{
	     $nx['diem']=0;
		 $nx['duongam']="dãy số quá thiên lệch âm dương, không tốt cho người dùng.";
	}
	/*
	if($a==3 && $b==7){
		$nx['duongam']="Số lượng số mang vận âm dương phù hợp tỉ lệ, rất tốt.";
		 $nx['diem']=1;
	}else if($a==7 && $b==3){
	     $nx['duongam']="Số lượng số mang vận âm dương phù hợp tỉ lệ, rất tốt.";
		 $nx['diem']=1;
	}else if($a==6 && $b==4){
	     $nx['duongam']="Số lượng số mang vận âm dương phù hợp tỉ lệ, rất tốt.";
		 $nx['diem']=1;	 
	}else {
		 $nx['diem']=0;
		 $nx['duongam']="Số lượng số mang vận âm dương không phù hợp tỉ lệ.";
	}*/
return $nx;
}
public function getVuon($vuon_tinh,$vuon){
                    if($vuon_tinh==$vuon){ $string[]="Không tốt vì cùng vượng $vuon";$string[]=0;}
                    else if($vuon=="Đều"){ $string[]="Sẽ giảm bớt phần tính $vuon_tinh của bạn";$string[]=1;}
                    else { $string[]="Dãy số vượng $vuon nên rất tốt với tính $vuon_tinh của bạn";$string[]=1;}
                    return $string;
}
public function getgioCanHH($can,$chi,$giosinh){
                    $query="SELECT b.can,e.chi
                            FROM jos_sao_giocanchi a, jos_sao_can b,jos_sao_chi e,jos_sao_giohh c, jos_sao_hoang_hac d,jos_sao_khoanggio h
                            WHERE a.cangio = b.id
                            AND h.id=a.gio
                            AND e.id=c.gio
                            AND c.loai = d.id
                            AND c.gio = a.gio
                            AND h.khoanggio = '$giosinh'
                            AND a.can LIKE '%$can%'
                            AND c.chi LIKE '%$chi%'
                            ORDER BY a.gio";
                    $return = $this->db->query( $query );
                    $rows   = $return->row_array();
                	return $rows;
    }
    
public function getGio(){
                    $query="SELECT * FROM `jos_sao_khoanggio`";
                    $return = $this->db->query( $query );
                    $rows   = $return->result_array();
                	return $rows;
}

public function getTuTru($chi,$can){
                    $manghe="";	
                    for ($i = 0; $i < count($chi); $i++) {
                        $query  = "SELECT * FROM `jos_sao_tutru` WHERE can = '" . $chi[$i] . "'";
                        $return = $this->db->query($query);
                        $rows1   = $return->result_array();
                        if ($rows1) {
                            foreach ($rows1 as $value) {
                                if ($value['can'] == $chi[$i]) {
                                    $rows = $value;break;
                                }
                            }
                        }
                        $manghe .= "," . @$rows['hetang'];
                    }
                    for ($i = 0; $i < count($can); $i++) {
                        $query  = "SELECT * FROM `jos_sao_can` WHERE can = '" . $can[$i] . "'";
                        $return = $this->db->query($query);
                        $rows1   = $return->result_array();
                        if ($rows1) {
                            foreach ($rows1 as $value) {
                                if ($value['can'] == $can[$i]) {
                                    $rows = $value;break;
                                }
                            }
                        }
                        $manghe .= "," . @$rows['he_tutru'];
                    }
                    $t[]=substr_count($manghe,"Mộc");
                    $t[]=substr_count($manghe,"Hỏa");
                    $t[]=substr_count($manghe,"Thổ");
                    $t[]=substr_count($manghe,"Kim");
                    $t[]=substr_count($manghe,"Thủy");
                    $mangso=array();
                    for($i=0;$i<5;$i++){
                    if(!@in_array($t[$i],$mangso['so'])){$mangso['so'][]=$t[$i];$mangso['loai'][]="trung";}
                    }
                    sort($mangso['so']);
                    
                    $count=count($mangso['so']);
                    
                    $mangso['loai'][0]="thap";
                    $mangso['loai'][$count-1]="cao";
                    $he['Mộc']['dem']=$t[0];$he['Mộc']['loai']=$this->getIDso($mangso,$t[0]);
                    $he['Hỏa']['dem']=$t[1];$he['Hỏa']['loai']=$this->getIDso($mangso,$t[1]);
                    $he['Thổ']['dem']=$t[2];$he['Thổ']['loai']=$this->getIDso($mangso,$t[2]);
                    $he['Kim']['dem']=$t[3];$he['Kim']['loai']=$this->getIDso($mangso,$t[3]);
                    $he['Thủy']['dem']=$t[4];$he['Thủy']['loai']=$this->getIDso($mangso,$t[4]);
                    return $he;
}

public function getTutru_khac($chi,$can){
  $he['chitiet']['mangcan'] = array();
  $he['chitiet']['mangchi'] = array();
  $manghe=""; 
  for ($i = 0; $i < count($chi); $i++) {
      $query  = "SELECT * FROM `jos_sao_tutru` WHERE can = '" . $chi[$i] . "'";
      $return = $this->db->query($query);
      $rows1   = $return->row_array();
      if ($rows1) {
        $manghe .= "," . @$rows1['hetang'];
        $he['chitiet']['mangchi'][$i]['can_chi']  = @$rows1['tangcan'];
        $he['chitiet']['mangchi'][$i]['menh']     = @$rows1['hetang'];
      }
  }
  for ($i = 0; $i < count($can); $i++) {
      $query  = "SELECT * FROM `jos_sao_can` WHERE can = '" . $can[$i] . "'";
      $return = $this->db->query($query);
      $rows1   = $return->row_array();
      if ($rows1) {
        $manghe .= "," . $rows1['he_tutru'];
        $he['chitiet']['mangcan'][$i]['can_chi']  = @$rows1['can'];
        $he['chitiet']['mangcan'][$i]['menh']     = @$rows1['he_tutru'];
      }
  }
  $t[]=substr_count($manghe,"Mộc");
  $t[]=substr_count($manghe,"Hỏa");
  $t[]=substr_count($manghe,"Thổ");
  $t[]=substr_count($manghe,"Kim");
  $t[]=substr_count($manghe,"Thủy");
  $mangso=array();
  for($i=0;$i<5;$i++){
  if(!@in_array($t[$i],$mangso['so'])){$mangso['so'][]=$t[$i];$mangso['loai'][]="trung";}
  }
  sort($mangso['so']);
  
  $count=count($mangso['so']);
  
  $mangso['loai'][0]="thap";
  $mangso['loai'][$count-1]="cao";
  $he['ketqua']['Mộc']['dem']=$t[0];$he['ketqua']['Mộc']['loai']=$this->getIDso($mangso,$t[0]);
  $he['ketqua']['Hỏa']['dem']=$t[1];$he['ketqua']['Hỏa']['loai']=$this->getIDso($mangso,$t[1]);
  $he['ketqua']['Thổ']['dem']=$t[2];$he['ketqua']['Thổ']['loai']=$this->getIDso($mangso,$t[2]);
  $he['ketqua']['Kim']['dem']=$t[3];$he['ketqua']['Kim']['loai']=$this->getIDso($mangso,$t[3]);
  $he['ketqua']['Thủy']['dem']=$t[4];$he['ketqua']['Thủy']['loai']=$this->getIDso($mangso,$t[4]);
  return $he;
}

public function getSo($a){
                	$a = trim($a);
                    $r = @ereg_replace('q|w|e|r|t|y|u|i|o|p|a|s|d|f|g|h|j|k|l|z|x|c|v|b|n|m|,|\.|~|@|#|\$|%|\^|&|\*|\(|\)|_|\+|=|\{|\}|\[|\]|:|;|"|\'|<|>|,|\.|\?|/', '', $a);
                	$len=strlen($r);
                	$tru=8-$len;
                	if($tru>0){
                	  for($i=0;$i<$tru;$i++){
                	   $r.='0';
                	  }
                	}
                    if( !is_numeric( $r ) || strlen( $r ) < 10 || strlen($r) > 11 ){
                        return false;
                    }else{
                        return $r;
                    }
                	

}

public function getIDso($mang,$so){
                    for($i=0;$i<count($mang['loai']);$i++){
                    if($mang['so'][$i]==$so)return $mang['loai'][$i];
                    }
                    return "";
}
public function getSoTuongSinhKhac($manghe,$type){
                    $t=0;	
                    for($i=1;$i<count($manghe);$i++){
                        if($type=="sinh")$where=" (he='".$manghe[$i-1]."' and sinh='".$manghe[$i]."')";
                        else $where=" (he='".@$manghe[$i]."' and khac='".@$manghe[$i+1]."')";
                        $query="SELECT count(*) as counts FROM `jos_sao_khac` where ".$where;
                        $return = $this->db->query( $query );
                        $rows   = $return->row_array();
                    	$t=$rows['counts']+$t;
                    }
                    return $t;
}

public function getCuoiCung($text,$so){
            		$k=str_split($text);
            		$len=count($k);
            		for($j=0;$j<$len;$j++){
            		  if($k[$j]==$so)$t=$j;
            		}	
            		return $t;
	}
    
public function blHe($he,$nguhanhday){
                    if($he[$nguhanhday]['loai']=="cao"){
                    	$string[]="là hành vượng trong tứ trụ mệnh, càng gây tình trạng thiên lệch, không tốt.";
                    	$string[]=0;
                    	}
                    else if($he[$nguhanhday]['loai']=="thap"){
                    	$string[]="là hành suy trong tứ trụ mệnh, giúp bổ trợ cho tứ trụ mệnh, rất tốt.";
                    	$string[]=0.5;
                    }
                    else {$string[]="là hành cân bằng trong tứ trụ mệnh, không tốt cũng không xấu.";
                    $string[]=0.25;
                    }
                    return $string;
}

public function getdiemSinhKhac($sinh,$khac){
                    if($sinh>$khac)return 0.5;
                    //else if($sinh==$khac)return 0.5;
                    else return 0;
}

public function getSoNguHanh($so){
                    $dem=array();	
                    $t=0;	
                    for($i=1;$i<10;$i++){
                    $k=substr_count($so,$i);
                    if($k>$t&&$k!=0){
                    	$t=$k;
                    	$dem['so']=$i;
                    	$dem['solan']=$k;
                    	$bang=array();
                    }
                    elseif($k==$t&&$k!=0)$bang[]=$i;
                    }
                    $bang[]=@$dem['so'];
                    	$m=0;
                    	$songuoc=strrev($so);
                    	//print_r($bang);
                    	for($j=0;$j<count($bang);$j++){
                    	$sodau=@strpos($songuoc,"$bang[$j]");
                    	//echo "m=".$m." sodau=".$sodau."<br>";
                    	if($j==0){$m=$sodau;$k=0;}
                    	elseif($sodau<$m){$m=$sodau;$k=$j;}
                    	}
                    	//echo $k;
                    	if($bang[$k]==0)$id=10;else $id=$bang[$k];
                    	//echo $id;
                        $query="SELECT * FROM `jos_sao_tinh` where id='$id'";
                        $return = $this->db->query( $query );
                        $rows   = $return->row_array();
                    	return $rows;
}

public function gieoQue($a){	
                    $a1=substr($a,0,strlen($a)/2);
                    $a2=substr($a,strlen($a1));
                    $suma1=$this->changeSum($a1);
                    $suma2=$this->changeSum($a2);
                    $so1=$suma1%8;if($so1==0)$so1=8;
                    $so2=$suma2%8;if($so2==0)$so2=8;
                    $query="SELECT * FROM `jos_sao_que` where so='$so2$so1'";
                    $return = $this->db->query( $query );
                    $rows   = $return->row_array();
                	return $rows;
}

public function gieoHo($a){
                        $query="SELECT * FROM `jos_sao_que` a,jos_sao_queho b where b.chu='$a' and b.ho=a.so";
                        $return = $this->db->query( $query );
                        $rows   = $return->row_array();
                    	return $rows;
}

public function getDiem($nx,$loai=NULL){
                    if($loai!=""){
                    }
                    else{
                    if($nx=="Tốt")return 1.5;
                    else if($nx=="Trung bình")return 0.5;
                    else return -1.5;
                    }
}
public function gieoQueDiem($sim)
    {
        // Check sim dang ban
        $checkSimDangban     = $this->curl('http://khosimphongthuydaban.quanlybansim.com/sim/checkSimDangban', array('sim' => $sim));
        $quechu = $checkSimDangban?json_decode($checkSimDangban, true):'';
        if (empty($quechu)) {
            $this->db->select('q.*');
            $this->db->from('jos_sao_que_old as q');
            $this->db->join('xoaso_old as s', 's.quechu = q.so');
            $this->db->where('s.sim', $sim);
            $quechu = $this->db->get()->row_array();
        }

        // Check sim dang ban va da ban roi
        if (empty($quechu)) {
            $checkSimDabanSaudoique     = $this->curl('http://khosimphongthuydaban.quanlybansim.com/sim/checkSimDabanSaudoique', array('sim' => $sim));
            $quechu = $checkSimDabanSaudoique?json_decode($checkSimDabanSaudoique, true):'';
        }
        if (empty($quechu)) {
            $que    = $this->dinh_dang_que_chu($sim);
            $que    = $this->que_tot_thanh_xau($que);
            $quechu = $this->db->where('so', $que)->get('jos_sao_que')->row_array();
        }
        return $quechu;
          
    }

public function Db_getLuanque($id_que){
  return $this->db->select('l.*, q.queso,q.so,q.ten,q.slugten,q.noi,q.ngoai,q.ten,q.loai')
                  ->from('luanque_kinhdich as l')
                  ->join('jos_sao_que as q', 'l.id_que = q.id')
                  ->where('l.id_que', $id_que)
                  ->get()
                  ->row_array();
}

private function curl($url, $data_post)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
    //curl_setopt($ch,CURLOPT_TIMEOUT, 20);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function dinh_dang_que_chu( $phone ){
            $leng  =  strlen( $phone );
            $thuong = 0;
            $ha     = 0;
            for( $i = 0; $i< $leng; $i++ ){
                $j             = substr( $phone, $i, 1 );
                if( $i <=4 ){
                     $thuong = $thuong+$j;
                }else{
                     $ha     = $ha+$j;
                }
            }
            $thuong = $thuong % 8;
            $ha     = $ha % 8;
            if( $thuong == 0 )
                $thuong = 8;
            if( $ha == 0 )
                $ha = 8;
            return $ha.$thuong;
       }

function que_tot_thanh_xau( $que ){ 
                      $mang = array(
                                      '11'=>'46',
                                      '88'=>'67',
                                      '16'=>'61',
                                      '68'=>'15',
                                      '86'=>'81',
                                      '21'=>'42',
                                      '18'=>'57',
                                      '31'=>'43',
                                      '84'=>'87',
                                      '28'=>'41',
                                      '37'=>'71',
                                      '17'=>'38',
                                      '47'=>'23',
                                      '72'=>'76',
                                      '54'=>'27',
                                      '14'=>'62',
                                      '83'=>'24',
                                      '35'=>'73',
                                      '64'=>'65',
                                      '45'=>'74',
                                      '58'=>'63',
                                      '75'=>'46',
                                      '34'=>'67',
                                      '22'=>'61',
                                      '32'=>'15',
                                      '53'=>'81',
                                      '26'=>'42',
                                      '25'=>'57',
                                      '36'=>'43'
                                   );
                      foreach( $mang as $key => $val ){
                         if( $key == $que )
                         {
                            $que = $val;
                            break;
                         }
                      }
                      return $que;             
            }

function select_giosinh(  ){ 
            $mang = array(
                             '23-gio-den-1-gio' => '23 giờ đến 1 giờ',
                             '1-gio-den-3-gio'=>'1 giờ đến 3 giờ',
                             '3-gio-den-5-gio'=>'3 giờ đến 5 giờ',
                             '5-gio-den-7-gio'=>'5 giờ đến 7 giờ',
                             '7-gio-den-9-gio'=>'7 giờ đến 9 giờ',
                             '9-gio-den-11-gio'=>'9 giờ đến 11 giờ',
                             '11-gio-den-13-gio'=>'11 giờ đến 13 giờ',
                             '13-gio-den-15-gio'=>'13 giờ đến 15 giờ',
                             '15-gio-den-17-gio'=>'15 giờ đến 17 giờ',
                             '17-gio-den-19-gio'=>'17 giờ đến 19 giờ',
                             '19-gio-den-21-gio'=>'19 giờ đến 21 giờ',
                             '21-gio-den-23-gio'=>'21 giờ đến 23 giờ',
                            
                         );
            return $mang;             
}         

public function gieoQueDiem1($a)
    {
        /*$a1    = substr($a, 0, strlen($a) / 2);
        $a2    = substr($a, strlen($a1));
        $suma1 = $this->changeSum($a1);
        $suma2 = $this->changeSum($a2);
        $so1   = $suma1 % 8;
        if ($so1 == 0)
            $so1 = 8;
        $so2 = $suma2 % 8;
        if ($so2 == 0)
            $so2 = 8;*/
        $query = "SELECT * FROM `jos_sao_que` a,sim_suadiem c where a.diem=c.que_chu_id_diem and sim=$a order by so desc limit 0,1 ";
        $return = $this->db->query( $query );
        $rows   = $return->row_array();
        if(count( $rows)>0){
			return $rows;
		}else {
			
			$query = "SELECT sim2 FROM 1_suadiem c where sim2=$a";
			$return = $this->db->query( $query );
            $rows   = $return->row_array();
			
			if(count( $rows)>0){
				return $this->gieoQue($a);
			}else{
				// kiem tra neu sim thuộc kho hay không
				/**/
				$url = 'http://phongthuysim.com.vn/a/1.php?sim='.$a;
				$c = curl_init();
				curl_setopt($c, CURLOPT_URL, $url);
				curl_setopt($c, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($c,CURLOPT_TIMEOUT,1000);
				$result=curl_exec ($c);

				curl_close ($c);
				
				//$result= 1;
				if($result=='0'){
				    
					//mod 20 
					$id = fmod($a,20);
					if($id<20){
						/*46,87;15,23;57,24;43,76;76,63*/
						$jos_sao_que = array(
						  array('id'=> 1, 'chu' => '46','ho' => '87'),
						  array('id'=> 2,'chu' => '16','ho' => '23'),
						  array('id'=> 3,'chu' => '86','ho' => '87'),
						  array('id'=> 4,'chu' => '15','ho' => '23'),
						  array('id'=> 5,'chu' => '18','ho' => '24'),
						  array('id'=> 6,'chu' => '84','ho' => '76'),
						  array('id'=> 7,'chu' => '57','ho' => '24'),
						  array('id'=> 8,'chu' => '85','ho' => '87'),
						  array('id'=> 9,'chu' => '43','ho' => '76'),
						  array('id'=> 10,'chu' => '17','ho' => '24'),
						  array('id'=> 11,'chu' => '83','ho' => '76'),
						  array('id'=> 12,'chu' => '35','ho' => '63'),
						  array('id'=> 13,'chu' => '76','ho' => '63'),
						  array('id'=> 14,'chu' => '45','ho' => '87'),
						  array('id'=> 15,'chu' => '58','ho' => '24'),
						  array('id'=> 16,'chu' => '56','ho' => '23'),
						  array('id'=> 17,'chu' => '44','ho' => '76'),
						  array('id'=> 18,'chu' => '75','ho' => '63'),
						  array('id'=> 19,'chu' => '55','ho' => '23'),
						  array('id'=> 0,'chu' => '36','ho' => '63')
						);
						$so = $jos_sao_que[$id]['chu'];
						return $this->gieoQueVoiSo($so);
					}else{
						return $this->gieoQue($a);
					}
					
				} else{
                    return $this->gieoQue($a);
				}
				
			}
		}
    }
 
 public function gieoHoDiem($a,$sim)
    {
        $this->db->select('s.*');
        $this->db->from('xoaso_old as s');
        $this->db->where('s.sim', $sim);
        $result = $this->db->get()->row_array();

        if ($result) {
            $query  = "SELECT * FROM `jos_sao_que_old` a,jos_sao_queho b where b.chu='$a' and b.ho=a.so";
            $return = $this->db->query($query);
            $rows   = $return->row_array();
            return $rows;
        }
        $query  = "SELECT * FROM `jos_sao_que` a,jos_sao_queho b where b.chu='$a' and b.ho=a.so";
        $return = $this->db->query($query);
        $rows   = $return->row_array();
        return $rows;
    }

  public function gieoQueVoiSo($a)
    {
            		
                    $query = "SELECT * FROM `jos_sao_que` where so='$a'";
                    $return = $this->db->query( $query );
                    $rows   = $return->row_array();
                    return $rows;
    }

  public function nguhanh_text($number)
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