<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class checkip_model extends CI_Model
{
    protected $table = 'checkip';
    public function __construct()
    {
        $this->load->database();
    }
}