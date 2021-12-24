<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chamdiemsim
{
	private $service_url = 'http://chamdiem.simphongthuy.vn';
	private $token   = '1357913579';
	private $param;
	public  function __construct()
	   {
            $this->CI =& get_instance();
	   }  

    /**
     * [set_param cung cấp các thông tin từ form]
     * @param [array] $param [mảng = (ngày sinh, tháng sinh, năm sinh, giờ sinh, giới tính, số sim)  ]
     */
	public function set_param($param = array())
	 {
         $this->param = $param;
	 }  
	/**
	 * [get_element Trả về 1 phần tử hoặc 1 mảng phần tử theo nhu cầu]
	 * @param  [array] $option [array trả về nhiều phần tử]
	 * @return [type]          [description]
	 */
	public function get_option($option = array())
	 {
         $param = $this->param;
         $param['option'] = empty($option) ? '' : implode(',',$option);
         return $this->curl($param);  
  	 }

  	private function curl($param)
  	 {
  	 	$param['token'] = md5($this->token);
        $param = http_build_query($param);
        $url   = $this->service_url.'?'.$param;
        $curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result,true);
  	 }    
}	   