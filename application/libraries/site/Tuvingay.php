<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tuvingay
{
    private $service_url = 'https://tuvisomenh.net/api';
    private $class;
    private $function;
    private $token = '1357913579';
    private $param;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function resut_list($nam_sinh, $ngay_duong, $thang_duong, $nam_duong)
    {
        $param['nam_sinh'] = is_array($nam_sinh) ? implode('_', $nam_sinh) : $nam_duong;
        $param['ngay_duong'] = $ngay_duong;
        $param['thang_duong'] = $thang_duong;
        $param['nam_duong'] = $nam_duong;
        $this->class = 'tuvingay';
        $this->function = 'result_list';
        $data = $this->curl($param);
        return $data;
    }

    private function curl($param)
    {
        $param['token'] = md5($this->token);
        $param = http_build_query($param);
        $url = $this->service_url . '/' . $this->class . '/' . $this->function . '?' . $param . '-';
        $result = file_get_contents($url);
        if (!empty($result))
            return json_decode($result, true);
        else
            return false;
    }
}