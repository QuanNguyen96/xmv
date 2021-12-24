<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My_pagination{
    // mang du lieu
    public $data;
    // TRANG HIEN TAI
    public $page;
    // TONG SO BAN GHI
    public $total_row;
    // SO BAN GHI TREN 1 TRANG.
    public $page_row = 12;
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
    
    public function set_data($data){
        $this->data = $data;
    }
    
    public function set_url($url){
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
    
    public function set_current_page($current_page){
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
        $html = '<ul class="pagination pagination-sm">';
        if($frame_start != 1){
            $prreview = $this->page -1;
            $html.='<li><a href="'.$this->url.'/'.'1">Đầu</a></li>';
            $html.='<li><a href="'.$this->url.'/'.$prreview.'"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>';
        }
        for($i = $frame_start; $i<= $frame_end; $i++){
            if($i == $this->page){
                $html.='<li class="pg-cr"><a href="'.$this->url.'/'.$i.'" >'.$i.'</a></li>';
            }else{
             $html.='<li><a href="'.$this->url.'/'.$i.'">'.$i.'</a></li>';
            }
        } 
        if($frame_default < $total_frame){
            $next = $frame_end + 1;
            $html.='<li><a href="'.$this->url.'/'.$next.'"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>';
            $html.='<li><a href="'.$this->url.'/'.$this->total_page.'">Cuối</a></li>';
        }
        
        $html.='</ul>';
        }else{
             
            $html = '';
        }
        
        return $html;
    }
    
    public function data(){
        // phan tu dau tien
        $data = $this->data;
        if(!empty($data)){
        $row_start = $this->page * $this->page_row - $this->page_row;
       // echo '<br/>'.$row_start.'<br/>';
        if($this->page == $this->total_page){
            $row_end = $this->total_row - 1;
        }else{
            $row_end = $this->page * $this->page_row - 1;
        }
        //echo $row_end;
        for($i = $row_start; $i<= $row_end; $i++){
            $newData[] = $data[$i];
            
        }
       }else{
          $newData =null;
       }
        return $newData;
    }
    
    public function page_start(){
        
    }
      

    // BUOC 1 : XAC DINH TONG SO BAN GHI
       
    // BUOC 2: XAC DINH TONG SO TRANG  = SOBANGHI/SO BAN GHI TREN 1 TRANG
    
    // BUOC 3: XAC DINH TONG SO FRAME = TONG SO TRANG/ SO TRANG TREN 1 FRAME
}
