<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codes extends CI_Controller {
    public function insert_codes()
    {
        if( $_POST )
        {
            $get = $this->input->get(); 
            if( isset($get['codes']) && isset($get['phone']) )
            {
                $this->load->database();
                $insert = array('codes'=>$get['codes'],'phone'=>$get['phone'],'created_date'=>time());
                $this->db->insert('codes',$insert);
                $rt = 'true';
            }
            else
            {
                $rt = 'false';
            } 
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode(array('return' => $rt)));
        }
    }
    
    public function disable_codes()
    {
        if( $_POST )
        {
            $get = $this->input->get(); 
            if( isset($get['codes']) && isset($get['phone']) )
            {
                $this->load->database();
                $update = array('state'=>0,'timeout'=>time());
                $this->db->where('codes',$get['codes'])->where('phone',$get['phone'])->update('codes',$update);
                $rt = 'true';
            }
            else
            {
                $rt = 'false';
            } 
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode(array('return' => $rt)));
        }
    }
    
    public function test()
    {
        $url = 'https://xemvanmenh.net/disable_codes?codes=62712&phone=84979783888';
        $data_post = array('codes'=>'62712','phone'=>'84979783888');
        $curl = $this->curl($url,$data_post);
        /*echo "<pre>";
        print_r($curl);
        echo"</pre>";*/
    }
    
    public function curl( $url, $data_post ){
              $ua = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13';
              $ch = curl_init();
              curl_setopt($ch,CURLOPT_URL,$url);
              curl_setopt($ch, CURLOPT_USERAGENT, $ua);
              curl_setopt($ch,CURLOPT_POST, 1);   
              curl_setopt($ch,CURLOPT_POSTFIELDS,$data_post);
              curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,5);
              curl_setopt($ch,CURLOPT_TIMEOUT, 300);
              $response = curl_exec($ch);
              curl_close ($ch);
              return $response;
       }
}
