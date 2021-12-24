<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Redirect301 extends CI_Controller
{
    public $module_view = 'site';
    public $action_view = '';
    public $view = 'index';
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $url    = $this->uri->uri_string();
        $arr_link = array(
            'xem-sim-phong-thuy'=>'xem-boi-so-dien-thoai.html',
        );
        if (array_key_exists($url,$arr_link )) {
            redirect(base_url($arr_link[$url]), 'location', 301);
        }
        else{
            return show_404();
        }
    }

    public function redirect(){
        return redirect(base_url(),'location',301);
    }
}
