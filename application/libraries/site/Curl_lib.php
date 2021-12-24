<?php
/**
 * 
 * Class Curl_lib
 * level : 1
 * 
 * property - default : @url
 * property - order : 
 *  @timer : thoi gian hoi dap
 *  @result : tra ve hien thi ra luon hoac return
 *  @post   : du lieu sang submit kieu post
 *  @get    : du lieu truyen sang submit kieu get co the la url
 *  @browse : gia lap trinh duyet
 *  @saveto : luu du lieu tra ve tai file
 * function :
 *  @construct
 *  @get()  : lay du lieu tai site url
 *  @submit_post() : submit form gui du lieu di
 *  @submit_get()   : submit form gui du lieu bang get
 *  @save() : luu site vao file da dinh san
 * 
 * */
    class Curl_lib{
        public $init = null;
        public $url = null;
        public $result = 1;
        public $post = '';
        public $get = '';
        public $browse = null;
        public $timer = 5000;
        public $saveto = '';
        function __construct(){
            $this->init = curl_init();
            curl_setopt($this->init, CURLOPT_URL, $this->url);
            if($this->result == 1){
                curl_setopt($this->init, CURLOPT_RETURNTRANSFER, 1);
            }
            else{
                curl_setopt($this->init, CURLOPT_RETURNTRANSFER, 0);
            }
            if(!empty($this->browse)){
                // "Mozilla/5.0"
                curl_setopt($this->init, CURLOPT_USERAGENT, $this->browse);
            }
            if(!empty($this->timer)){
                curl_setopt($this->init, CURLOPT_TIMEOUT, $this->timer);
            }
        }
        function setup(){
            echo 'connect';
        }
        function submit_post($parram = null){
            $this->__construct();
            $arr = $parram != null ? $parram : $this->post;
            curl_setopt($this->init, CURLOPT_POST, count($arr));    // dem so phan tu gui di
            curl_setopt($this->init, CURLOPT_POSTFIELDS, $arr);     // danh sach phan tu gui di
            $result = $this->curl_exec();
            $this->curl_close();
            return $result;
        }
        function submit_get(){
            $this->__construct();
            $arr = $this->get;
            $result = $this->curl_exec();
            $this->curl_close();
            return $result;
        }
        function save(){
            $this->__construct();
            // M? m?t file m?i v?i du?ng d?n và tên file là tham s? $saveTo
            $fp = fopen ($this->saveto, 'w+');
            curl_setopt($this->init, CURLOPT_FILE, $fp);
            $result = $this->curl_exec();
            $this->curl_close();
            return $result;
        }
        function curl_exec(){
            return curl_exec($this->init);
        }
        function curl_close(){
            curl_close($this->init);
        }
        function get(){
            $this->__construct();
            $result = $this->curl_exec();
            $this->curl_close();
            return $result;
        }
        function upload_file(){
            $this->__construct();
            echo '<h2>connect</h2>';
        }
    }
    /**
     * 
     * demo don 't del
     * 
     * */
     /* 
    include_once('Curl_lib.php');
    $curl_clss = new Curl_lib();
    $curl_clss->url = "http://localhost/Roomlab/lab14/curl_post_db.php";
    
    $arr = array(
        'name' => 'article 3',
        'content'  => 'content 3',
        'timer' => time(),
        'admin' => 'adminpro'
    );
    
    $curl_clss->post = $arr;
    
    var_dump($curl_clss->submit_post());
    */
?>