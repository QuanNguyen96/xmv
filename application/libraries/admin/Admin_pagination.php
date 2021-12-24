<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_pagination{
    // TRANG HIEN TAI
    public $page;
    // TONG SO BAN GHI
    public $total_row;
    // SO BAN GHI TREN 1 TRANG.
    public $page_row = 20;
    // TRANG BAT DAU
    protected $page_start;
    // TONG SO TRANG
    protected $total_page;
    // TONG SO FRAME
    protected $total_frame;
    //SO TRANG TREN 1 FRAME
    public $page_frame = 5;
    // FRAME BAT DAU
    protected $frame_start;
    public $url; // 'http://localhost/phantrang/mang.php/page/';
    
    public function set_url( $param ){
        unset( $param['page'] );
        $param['page'] = '';
        $this->url  = current_url().'?'.http_build_query($param);
    }
    public function site_set_url( $url ){
        $this->url = $url;
    }
    
    public function set_total_row($total_row){
        return $this->total_row = $total_row;
    }
    
    public function set_page_row($page_row){
        return $this->page_row = $page_row;
    }
    
    public function set_total_page($total_page){
        return $this->total_page = $this->total_page; 
    }
    
    public function set_total_frame($total_frame){
        return $this->total_frame = $total_frame;
    }
    
    public function set_page_frame($page_frame){
        return $this->page_frame = $page_frame;
    }
    
    public function set_current_page( $current_page ){
        return $this->page = $current_page;
    }
    
    public function created(){
        // TONG SO TRANG
        $this->total_page = ceil($this->total_row / $this->page_row);
        if($this->page > $this->total_page){
            $this->page = 1;
        }
        //echo 'Tong so trang:'.$this->total_page.'<br/>';
        // TONG SO FRAME
        $total_frame = ceil($this->total_page / $this->page_frame);
        //echo 'Tong so Frame'.$total_frame.'<br/>';
        // FRAME HIEN TAI.
        $frame_default = ceil($this->page / $this->page_frame );
       // echo'Frame hien tai'.$frame_default.'<br/>';
        // VI TRI DAU TIEN CUA FRAME
        if($frame_default == 1){
            // TRANG DAU TIEN CUA FRAME
            $frame_start = 1;
        }else{
            $frame_start = $frame_default * $this->page_frame - $this->page_frame +1 ;
         //   echo 'TRANG DAU TIEN CUA FRAME'. $frame_start.'<br/>';
        }
        
        $frame_end = $frame_start + $this->page_frame-1;
        if($frame_end > $this->total_page){
            $frame_end = $this->total_page;
        }
        //echo $frame_default;
        if($frame_end >1){
        $html = '<ul class="">';
        if($frame_start != 1){
            $prreview = $this->page -1;
            $html.='<li><a href="'.$this->url.'1">Đầu</a></li>';
            $html.='<li><a href="'.$this->url.$prreview.'">Trước</a></li>';
        }
        for($i = $frame_start; $i<= $frame_end; $i++){
            if($i == $this->page){
                $html.='<li><a href="'.$this->url.$i.'" class="pg_curent" >'.$i.'</a></li>';
            }else{
             $html.='<li><a href="'.$this->url.$i.'">'.$i.'</a></li>';
            }
        } 
        if($frame_default < $total_frame){
            $next = $frame_end + 1;
            $html.='<li><a href="'.$this->url.$next.'">Tiếp</a></li>';
            $html.='<li><a href="'.$this->url.$this->total_page.'">Cuối</a></li>';
        }
        
        $html.='</ul>';
        }else{
             
            $html = '';
        }
        
        return $html;
    }
}
