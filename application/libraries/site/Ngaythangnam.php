<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Thu vien cung cap cac ham xu ly lien quan den doi ngay, thang, nam am duong, can chi
 * get_ngay_duong() --> lay thong tin ngay duong
 */
class Ngaythangnam 
{
    public $ngay_duong  = null;
    public $thang_duong = null;
    public $nam_duong   = null;
    public $ngay_duong_int = null;
    public $ngay_am  = null;
    public $thang_am = null;
    public $nam_am   = null;
    public $ngay_can_chi  = array();
    public $thang_can_chi = array();
    public $nam_can_chi   = array();
    public $gio_can_chi   = array();
    public $define;
    public function __construct()
	   {
	      $this->CI =& get_instance();
	      $this->CI->load->config('define');
          $this->define = $this->CI->config->item('define');
	   }
    /**
     * [set_ngay_duong thiet lap ngay, thang, nam duong, do nguoi dung nhap vao. Neu kho co thi lay ngay hien tai]
     * @param [int] $ngay  [ngay duong]
     * @param [int] $thang [thang duong]
     * @param [int] $nam   [nam duong]
     */
	public function set_ngay_duong($ngay =null, $thang=null, $nam = null)
	   {
          if($ngay == null || $thang == null || $nam == null)
	        {
               $this->ngay_duong  = date('j');
               $this->thang_duong = date('n');
               $this->nam_duong   = date('Y');
	        }
          else
	        {
               $this->ngay_duong  = (int)$ngay;
               $this->thang_duong = (int)$thang;
               $this->nam_duong   = (int)$nam;
	        }
	        $string = $this->thang_duong.'/'.$this->ngay_duong.'/'.$this->nam_duong;
	        $this->ngay_duong_int = strtotime($string);
	        $this->set_ngay_am();
	     return;   
	   }   
    public function set_ngay_am($ngay=null, $thang=null, $nam=null)
	    {
           if($ngay != null && $thang != null && $nam != null)
           {
	           	$this->ngay_am  = (int)$ngay;
	           	$this->thang_am = (int)$thang;
	           	$this->nam_am   = (int)$nam;  
           }
           else
           {
           		$amlich =$this->convertSolar2Lunar($this->ngay_duong, $this->thang_duong, $this->nam_duong, 7.0); 
           		$this->ngay_am  = $amlich[0];
           		$this->thang_am = $amlich[1];
           		$this->nam_am   = $amlich[2];
           }
           $this->set_ngay_can_chi();
           $this->set_thang_can_chi();
           $this->set_nam_can_chi();
	    }
    public function set_ngay_can_chi()
	    {
	        $n       = $this->getN( $this->ngay_duong, $this->thang_duong, $this->nam_duong );
	        $songay  = $this->songay($this->ngay_duong, $this->thang_duong, $this->nam_duong);
	        $t1  = ( $this->nam_duong - 1) * 365.25 + $songay - $n;
	        $t2  = (int) ($t1 / 60);
	        $t   = $t1 - $t2 * 60;
	        $chi = $t % 12;
	        if ($chi == 0){
	            $chi = 12;
	        }
	        $can = $t % 10;
	        $this->_can = $can;
	        if ($can == 0){
	            $can = 10;
	        }
	        $this->ngay_can_chi = array('can'=>$can,'chi'=>$chi);
	    }
    public function set_thang_can_chi()
		{
	        $number = substr($this->nam_am, 3);
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
	        $m = ($can + $this->thang_am - 1) % 10;
	        if ($m == 0)
	            $m = 10;
	        $can = $m;
	        $chi = $this->thang_am >= 11 ? $this->thang_am - 10 : $this->thang_am + 2;
	        $this->thang_can_chi = array('can'=>$can,'chi'=>$chi); 
		}	
    public function set_nam_can_chi($nam_am = null)
	    {
	    	$nam_am  = $nam_am != null ? $nam_am : $this->nam_am;
	        $t       = (int) substr($nam_am, 3);
	        $t       = $t >= 4 ? $t - 4 + 1 : ($t + 10 - 4 + 1);
	        $can     = $t;
	        $t       = $nam_am % 12;
	        $t       = $t >= 4 ? $t - 4 + 1 : ($t + 12 - 4 + 1);
	        $chi     = $t;
	        $this->nam_can_chi = array('can'=>$can,'chi'=>$chi); 
	    }
    public function set_gio_can_chi($gio,$phut=0)
     {
        $time = ($gio * 60 *60) + ($phut*60);
		if(( $time >= 82800 && $time <= 86340 ) || ($time >= 0 && $time <= 3540 ) )
		{
		$chi = 1;
		}elseif( $time >= 3600 && $time <= 10740 ){
		$chi = 2;
		}elseif( $time >= 10800 && $time <= 17940 ){
		$chi = 3;
		}elseif( $time >= 18000 && $time <= 25140 ){
		$chi = 4;
		}elseif( $time >= 25200 && $time <= 32340 ){
		$chi = 5;
		}elseif( $time >= 32400 && $time <= 39540 ){
		$chi = 6;
		}elseif( $time >= 39600 && $time <= 46740 ){
		$chi = 7;
		}elseif( $time >= 46800 && $time <= 53940 ){
		$chi = 8;
		}elseif( $time >= 54000 && $time <= 61140 ){
		$chi = 9;
		}elseif( $time >= 61200 && $time <= 68340 ){
		$chi = 10;
		}elseif( $time >= 68400 && $time <= 75540 ){
		$chi = 11;
		}elseif( $time >= 75600 && $time <= 82740 ){
		$chi = 12;
		} 
		return $this->gio_can_chi = array('can'=>'','chi'=>$chi);
     }
    /**
     * [get_ngay_duong tra ve ngay duong]
     * @return [int] [tra ve ngay duong]
     */
    public function get_ngay_duong()
      {
      	 if( $this->ngay_duong == null)
      	 	$this->set_ngay_duong();
         return $this->ngay_duong;
      } 
    /**
     * [get_thang_duong tra ve thang duong]
     * @return [int] [thang duong]
     */
    public function get_thang_duong()
      {
      	 if( $this->thang_duong == null)
      	 	$this->set_ngay_duong();
      	 return $this->thang_duong;
      }
    /**
     * [get_nam_duong tra ve nam duong]
     * @return [int] [nam duong]
     */
    public function get_nam_duong()
      {
      	 if( $this->nam_duong == null)
      	 	$this->set_ngay_duong();
      	 return $this->nam_duong;
      }
    public function get_ngay_duong_int()
      {
      	 if( $this->ngay_duong_int == null)
      	 	$this->set_ngay_duong();
         return $this->ngay_duong_int;
      } 
    public function get_ngay_am()
      {
      	    if($this->ngay_am == null)
      	    	$this->set_ngay_duong();
			return $this->ngay_am;         
      } 
    public function get_thang_am()
      {
      		if($this->thang_am == null)
      	    	$this->set_ngay_duong();
      		return $this->thang_am;
      }
    public function get_nam_am()
      {
			if($this->nam_am == null)
      	    	$this->set_ngay_duong();
			return $this->nam_am;      	 
      }
    /**
     * [get_ngay_can_chi tra ve ngay can chi theo loai number, text, slug]
     * @param  string $return ['canchi'=> tra ve day du can chi, 'can'=>tra ve can, 'chi'=>tra ve chi]
     * @param  string $type   ['t'=> tra ve text, 'n'=> tra ve numer, 's' => tra ve slug, 'a' => tra ve tat ca]
     * @return [type]         [description]
     */
    public function get_ngay_can_chi($return = 'canchi', $type='t')
    	{
           $mang['can']['n']    = $this->ngay_can_chi['can'];
           $mang['can']['t']    = $this->define['can']['text'][$this->ngay_can_chi['can']];
           $mang['can']['s']    = $this->define['can']['slug'][$this->ngay_can_chi['can']];
           $mang['chi']['n']    = $this->ngay_can_chi['chi'];
           $mang['chi']['t']    = $this->define['chi']['text'][$this->ngay_can_chi['chi']];
           $mang['chi']['s']    = $this->define['chi']['slug'][$this->ngay_can_chi['chi']];
           $mang['canchi']['n'] = $this->ngay_can_chi;
           $mang['canchi']['t'] = $this->define['can']['text'][$this->ngay_can_chi['can']].' '.$this->define['chi']['text'][$this->ngay_can_chi['chi']]; 
           $mang['canchi']['s'] = $this->define['can']['slug'][$this->ngay_can_chi['can']].'-'.$this->define['chi']['slug'][$this->ngay_can_chi['chi']]; 
           if(isset($mang[$return][$type]))
           	return $mang[$return][$type];
           elseif(isset($mang[$return]) && $type == 'a')
           	return $mang[$return];

    	}
    public function get_thang_can_chi($return = 'canchi', $type='t')
    	{
           $mang['can']['n']    = $this->thang_can_chi['can'];
           $mang['can']['t']    = $this->define['can']['text'][$this->thang_can_chi['can']];
           $mang['can']['s']    = $this->define['can']['slug'][$this->thang_can_chi['can']];
           $mang['chi']['n']    = $this->thang_can_chi['chi'];
           $mang['chi']['t']    = $this->define['chi']['text'][$this->thang_can_chi['chi']];
           $mang['chi']['s']    = $this->define['chi']['slug'][$this->thang_can_chi['chi']];
           $mang['canchi']['n'] = $this->thang_can_chi;
           $mang['canchi']['t'] = $this->define['can']['text'][$this->thang_can_chi['can']].' '.$this->define['chi']['text'][$this->thang_can_chi['chi']]; 
           $mang['canchi']['s'] = $this->define['can']['slug'][$this->thang_can_chi['can']].'-'.$this->define['chi']['slug'][$this->thang_can_chi['chi']]; 
           if(isset($mang[$return][$type]))
           	return $mang[$return][$type];
           elseif(isset($mang[$return]) && $type == 'a')
           	return $mang[$return];
    	}
    public function get_nam_can_chi($return = 'canchi', $type='t')
    	{
           
           $mang['can']['n']    = $this->nam_can_chi['can'];
           $mang['can']['t']    = $this->define['can']['text'][$this->nam_can_chi['can']];
           $mang['can']['s']    = $this->define['can']['slug'][$this->nam_can_chi['can']];
           $mang['chi']['n']    = $this->nam_can_chi['chi'];
           $mang['chi']['t']    = $this->define['chi']['text'][$this->nam_can_chi['chi']];
           $mang['chi']['s']    = $this->define['chi']['slug'][$this->nam_can_chi['chi']];
           $mang['canchi']['n'] = $this->nam_can_chi;
           $mang['canchi']['t'] = $this->define['can']['text'][$this->nam_can_chi['can']].' '.$this->define['chi']['text'][$this->nam_can_chi['chi']]; 
           $mang['canchi']['s'] = $this->define['can']['slug'][$this->nam_can_chi['can']].'-'.$this->define['chi']['slug'][$this->nam_can_chi['chi']]; 
           if(isset($mang[$return][$type]))
           	return $mang[$return][$type];
           elseif(isset($mang[$return]) && $type == 'a')
           	return $mang[$return];
    	}	
    public function get_gio_can_chi($gio,$phut=0,$return = 'chi', $type='a')
	    {
           $this->set_gio_can_chi($gio,$phut);
           $mang['chi']['n']    = $this->gio_can_chi['chi'];
           $mang['chi']['t']    = $this->define['chi']['text'][$this->gio_can_chi['chi']];
           $mang['chi']['s']    = $this->define['chi']['slug'][$this->gio_can_chi['chi']];
           if(isset($mang[$return][$type]))
           	return $mang[$return][$type];
           elseif (isset($mang[$return]) && $type=='a')
            return $mang[$return];
           else
            return $mang;
	    }
    public function get_ngu_hanh_ngay($type ='t')
    	{
    		$can_chi_ngay = $this->get_ngay_can_chi('canchi','n');
    		$key = $can_chi_ngay['can'].','.$can_chi_ngay['chi'];
            $ngu_hanh_number = $this->define['ngu_hanh_ban_menh']['cong_thuc'][$key];
            if($type == 'n')
            	return $ngu_hanh_number;
            else
            	return $this->define['ngu_hanh_ban_menh']['text'][$ngu_hanh_number]; 
    	}
    /**
     * [get_ngu_hanh_nam tra ve ngu hanh nam sinh]
     * @param  string $type [description]
     * @return [type]       [description]
     */
    public function get_ngu_hanh_nam($type ='t')
      {
            $can_chi_nam = $this->get_nam_can_chi('canchi','n');
            $key = $can_chi_nam['can'].','.$can_chi_nam['chi'];
            $ngu_hanh_number = $this->define['ngu_hanh_nam']['cong_thuc'][$key];
            $rt['n'] = $ngu_hanh_number;
            $rt['t'] =  $this->define['ngu_hanh']['text'][$ngu_hanh_number];
            $rt['s'] =  $this->define['ngu_hanh']['slug'][$ngu_hanh_number];
            if(isset($rt[$type]))
              return $rt[$type];
            else
              return $rt;
      }  
    public function get_ngu_hanh_ban_menh_nam($type ='t')
      {
            $nam_can = $this->get_nam_can_chi('can','n');
            $nam_chi = $this->get_nam_can_chi('chi','n');
            $nam_can_chi = $nam_can.','.$nam_chi;
            $ngu_hanh_number = $this->define['ngu_hanh_ban_menh']['cong_thuc'][$nam_can_chi];
            if($type == 'n')
              return $ngu_hanh_number;
            else
              return $this->define['ngu_hanh_ban_menh']['text'][$ngu_hanh_number]; 
      }
    public function get_can($can_number)
     {
        $key = (int)$can_number;
        return $this->define['can']['text'][$key];
     }
    public function get_chi($chi_number)
     {
        $key = (int)$chi_number;
        return $this->define['chi']['text'][$key];
     }   
    /**
     * [get_ngay_thu tra ve ngay thu trong tuan]
     * @param  string $type          ['n'=> tra ve kieu number, 't'=> tra ve kieu text]
     * @param  [type] $ngay_chi_dinh [ngay do nguoi dung nhap vao dang strtotime]
     * @return [type]                [tra ve thu trong tuan theo dang int hoac text]
     */
    public function get_ngay_thu($type ='t',$ngay_chi_dinh_int = null)
      {
          if($this->ngay_duong == null)
          	$this->set_ngay_duong();
          $ngay_thu = array(
              1 => 'Thứ hai',
              2 => 'Thứ ba',
              3 => 'Thứ tư',
              4 => 'Thứ năm',
              5 => 'Thứ sáu',
              6 => 'Thứ bảy',
              7 => 'Chủ nhật'
          );
          $ngay = $ngay_chi_dinh_int != null ? (int)$ngay_chi_dinh_int : $this->ngay_duong_int;
          $ngay_number = date('N',$ngay);
          if($type == 't')
          	return $ngay_thu[$ngay_number];
          else 
          	return $ngay_number;
      }
     
    public function get_ngay_dau_tuan($ngay_duong=null, $thang_duong=null, $nam_duong=null)
      {
          if($this->ngay_duong == null) 
            $this->set_ngay_duong();
          if($ngay_duong == null || $thang_duong == null || $nam_duong == null)
            {
               $ngay_duong  = $this->get_ngay_duong();
               $thang_duong = $this->get_thang_duong();
               $nam_duong   = $this->get_nam_duong();
            }
          $list_ngay = $this->get_ngay_trong_tuan($ngay_duong, $thang_duong, $nam_duong);  
          return $list_ngay[0];
      } 
    public function get_ngay_cuoi_tuan($ngay_duong=null, $thang_duong=null, $nam_duong=null)
      {
          if($this->ngay_duong == null) 
            $this->set_ngay_duong();
          if($ngay_duong == null || $thang_duong == null || $nam_duong == null)
            {
               $ngay_duong  = $this->get_ngay_duong();
               $thang_duong = $this->get_thang_duong();
               $nam_duong   = $this->get_nam_duong();
            }
          $list_ngay = $this->get_ngay_trong_tuan($ngay_duong, $thang_duong, $nam_duong);  
          return $list_ngay[6]; 
      }  
    public function get_ngay_ke_tiep($ngay_duong=null, $thang_duong=null, $nam_duong=null,$so_ngay = 1)
      {
        if($this->ngay_duong == null) 
          $this->set_ngay_duong();
        if($ngay_duong == null || $thang_duong == null || $nam_duong == null)
            {
               $ngay_duong  = $this->get_ngay_duong();
               $thang_duong = $this->get_thang_duong();
               $nam_duong   = $this->get_nam_duong();
            } 
           $ngay_int = strtotime($thang_duong.'/'.$ngay_duong.'/'.$nam_duong); 
           $ngay_tiep_int = $ngay_int + 86400;
           if($so_ngay == 1)
           {
              $rt = array(
                 'ngay_duong'  => date('j',$ngay_tiep_int),
                 'thang_duong' => date('n',$ngay_tiep_int),
                 'nam_duong'   => date('Y',$ngay_tiep_int),
              ); 
           }
           else
           {
              for ($i=1; $i <= $so_ngay ; $i++) 
              { 
                 $ngay_tiep_int = $ngay_int + 86400 * $i;
                 $rt[] = array(
                 'ngay_duong'  => date('j',$ngay_tiep_int),
                 'thang_duong' => date('n',$ngay_tiep_int),
                 'nam_duong'   => date('Y',$ngay_tiep_int),
                 ); 
              }
           }  
         return $rt;
      } 
    public function get_ngay_truoc($ngay_duong=null, $thang_duong=null, $nam_duong=null,$so_ngay = 1)
      {
          if($this->ngay_duong == null) 
            $this->set_ngay_duong();
          if($ngay_duong == null || $thang_duong == null || $nam_duong == null)
            {
               $ngay_duong  = $this->get_ngay_duong();
               $thang_duong = $this->get_thang_duong();
               $nam_duong   = $this->get_nam_duong();
            } 
           $ngay_int = strtotime($thang_duong.'/'.$ngay_duong.'/'.$nam_duong); 
           $ngay_tiep_int = $ngay_int - 86400;
           if($so_ngay == 1)
           {
              $rt = array(
                 'ngay_duong'  => date('j',$ngay_tiep_int),
                 'thang_duong' => date('n',$ngay_tiep_int),
                 'nam_duong'   => date('Y',$ngay_tiep_int),
              ); 
           }
           else
           {
              for ($i=1; $i <= $so_ngay ; $i++) 
              { 
                 $ngay_tiep_int = $ngay_int - 86400 * $i;
                 $rt[] = array(
                 'ngay_duong'  => date('j',$ngay_tiep_int),
                 'thang_duong' => date('n',$ngay_tiep_int),
                 'nam_duong'   => date('Y',$ngay_tiep_int),
                 ); 
              }
           }  
           return $rt;
      }   
    public function get_ngay_trong_tuan($ngay_duong=null, $thang_duong=null, $nam_duong=null)
      {
         if($ngay_duong == null || $thang_duong == null || $nam_duong == null)
         {
           $ngay_duong  = $this->get_ngay_duong();
           $thang_duong = $this->get_thang_duong();
           $nam_duong   = $this->get_nam_duong();
         }
         $str = $thang_duong.'/'.$ngay_duong.'/'.$nam_duong;
         $int = strtotime($str);
         $ngay_thu = $this->get_ngay_thu('n',$int);
         $cach_ngay_dau_tuan = $ngay_thu - 1;
         $ngay_dau_tuan = $int - 86400 * $cach_ngay_dau_tuan;
         $i = 0;
         while ($i < 7 ) {
           $ngay_tiep = $ngay_dau_tuan + $i * 86400;
           $list_ngay[] =  array(
              'ngay_duong'  => date('j',$ngay_tiep),
              'thang_duong' => date('n',$ngay_tiep),
              'nam_duong'   => date('Y',$ngay_tiep),
              'ngay_thu'    => $this->get_ngay_thu('t',$ngay_tiep),
           );
           $i++;
         }
         return $list_ngay;
      }   
          
    /**
     * [get_so_ngay tra ve so ngay trong 1 thang]
     * @param  [int] $thang [thang can tinh so ngay]
     * @param  [int] $nam   [nam co thang can tinh so ngay]
     * @return [type]        [int]
     */
    public function get_so_ngay_trong_thang($thang=null, $nam=null)
      {
         if($thang != null && $nam != null)
	         {
	            $str = (int)$thang.'/1/'.$nam;
	            $date = strtotime($str);      	
	         } 
	     else
	     {
	     	if($this->ngay_duong == null)
          	  $this->set_ngay_duong();
            $date = $this->ngay_duong_int;
	     }
	     return date('t',$date);        
      } 
    private function INT($d)
	    {
	        return floor($d);
	    }
    private function jdFromDate( $dd, $mm, $yy )
	    {
	        $a = $this->INT((14 - $mm) / 12);
	        $y = $yy + 4800 - $a;
	        $m = $mm + 12 * $a - 3;
	        $jd = $dd + $this->INT((153 * $m + 2) / 5) + 365 * $y + $this->INT($y / 4) - $this->INT($y / 100) + $this->INT($y / 400) - 32045;
	        if ($jd < 2299161) {
	           $jd = $dd + $this->INT((153* $m + 2)/5) + 365 * $y + $this->INT($y / 4) - 32083;
	        }
	        return $jd;
	    }
    private function getN( $d, $m, $y )
	    {
	        if ($y < 1582)
	            $n_3 = 47;
	        else if ($y == 1582) 
	        {
	            if ($m < 10)
	               $n_3 = 47;
	            else
	            return 57;
	        } else if ($y > 1582 && $y < 1700)
	        {
	            $n_3 = 57;
	        } else if ($y >= 1700)
	        {
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
    private function jdToDate( $jd )
	    {
	        if ($jd > 2299160) { // After 5/10/1582, Gregorian calendar
	            $a = $jd + 32044;
	            $b = $this->INT((4*$a+3)/146097);
	            $c = $a - $this->INT(($b*146097)/4);
	        } else
	        {
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
    private function getNewMoonDay( $k, $timeZone )
	    {
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
	        } else
	        {
	        $deltat= -0.000278 + 0.000265*$T + 0.000262*$T2;
	        };
	        $JdNew = $Jd1 + $C1 - $deltat;
	        //echo "JdNew = $JdNew\n";
	        return $this->INT($JdNew + 0.5 + $timeZone/24);
	    }
    private function getSunLongitude($jdn, $timeZone ) 
	    { 
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
	        // @ $L = $L - 0.00569 - 0.00478 * Math.sin($omega * $dr);
	        @ $L = $L - 0.00569 - 0.00478 * sin($omega * $dr);
	        $L = $L*$dr;
	        $L = $L - M_PI*2*($this->INT($L/(M_PI*2))); // Normalize to (0, 2*PI)
	        return $this->INT($L/M_PI*6);

	    }
    private function getLunarMonth11($yy, $timeZone) 
	    {
	        $off = $this->jdFromDate(31, 12, $yy) - 2415021;
	        $k = $this->INT($off / 29.530588853);
	        $nm = $this->getNewMoonDay($k, $timeZone);
	        $sunLong = $this->getSunLongitude($nm, $timeZone); // sun longitude at local midnight
	        if ($sunLong >= 9) {
	            $nm = $this->getNewMoonDay($k-1, $timeZone);
	        }
	        return $nm;
	    }
    private function getLeapMonthOffset($a11, $timeZone) 
	    {
	        $k = $this->INT(($a11 - 2415021.076998695) / 29.530588853 + 0.5);
	        $last = 0;
	        $i = 1; // We start with the month following lunar month 11
	        $arc = $this->getSunLongitude($this->getNewMoonDay($k + $i, $timeZone), $timeZone);
	        do{
	            $last = $arc;
	            $i = $i + 1;
	            $arc = $this->getSunLongitude($this->getNewMoonDay($k + $i, $timeZone), $timeZone);
	        }while($arc != $last && $i < 14);
	        return $i - 1;
	    }
    private function convertSolar2Lunar($dd, $mm, $yy, $timeZone) 
	    {
	        $dayNumber = $this->jdFromDate($dd, $mm, $yy);
	        $k = $this->INT(($dayNumber - 2415021.076998695) / 29.530588853);
	        $monthStart = $this->getNewMoonDay($k+1, $timeZone);
	        if ($monthStart > $dayNumber) {
	            $monthStart = $this->getNewMoonDay($k, $timeZone);
	        }
	        $a11 = $this->getLunarMonth11($yy, $timeZone);
	        $b11 = $a11;
	        if ($a11 >= $monthStart)
	        {
	            $lunarYear = $yy;
	            $a11 = $this->getLunarMonth11($yy-1, $timeZone);
	        }else
	        {
	            $lunarYear = $yy+1;
	            $b11 = $this->getLunarMonth11($yy+1, $timeZone);
	        }	     
	        $lunarDay = $dayNumber - $monthStart + 1;
	        $diff = $this->INT(($monthStart - $a11)/29);
	        $lunarLeap = 0;
	        $lunarMonth = $diff + 11;
	        if ($b11 - $a11 > 365)
	        {
	            $leapMonthDiff = $this->getLeapMonthOffset($a11, $timeZone);
	            if ($diff >= $leapMonthDiff)
	            {
	                $lunarMonth = $diff + 10;
	                if ($diff == $leapMonthDiff)
	                {
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
    private function convertLunar2Solar($lunarDay, $lunarMonth, $lunarYear, $lunarLeap, $timeZone) 
	    {
	        if ($lunarMonth < 11)
	        {
	            $a11 = $this->getLunarMonth11($lunarYear-1, $timeZone);
	            $b11 = $this->getLunarMonth11($lunarYear, $timeZone);
	        } else
	        {
	            $a11 = $this->getLunarMonth11($lunarYear, $timeZone);
	            $b11 = $this->getLunarMonth11($lunarYear+1, $timeZone);
	        }
	        $k = $this->INT(0.5 + ($a11 - 2415021.076998695) / 29.530588853);
	        $off = $lunarMonth - 11;
	        if ($off < 0)
	        {
	            $off += 12;
	        }
	        if ($b11 - $a11 > 365)
	        {
	            $leapOff = $this->getLeapMonthOffset($a11, $timeZone);
	            $leapMonth = $leapOff - 2;
	            if ($leapMonth < 0)
	            {
	                $leapMonth += 12;
	            }
	            if($lunarLeap != 0 && $lunarMonth != $leapMonth)
	            {
	                return array(0, 0, 0);
	            } else if ($lunarLeap != 0 || $off >= $leapOff)
	            {
	                $off += 1;
	            }
	        }
	        $monthStart = $this->getNewMoonDay($k + $off, $timeZone);
	        return $this->jdToDate($monthStart + $lunarDay - 1);
	    }
    private function songay( $d, $m, $y )
	    {
	        if ($m == 1)
	            return $d;
	            $t = 0;
	        for ($i = 1; $i < $m; $i++)
	        {
	            if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 8 || $i == 10 || $i == 12){
	                    $t = $t + 31;
	                }elseif ($i == 2)
	                {
	                    if ($y % 4 == 0)
	                    $t = $t + 29;
	                    else
	                    $t = $t + 28;
	                } else
	                {
	                    $t = $t + 30;
	                }
	        }
	        return $t + $d;
	    }
}    