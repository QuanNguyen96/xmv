<?php
class Error extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        echo __METHOD__;
    }
}