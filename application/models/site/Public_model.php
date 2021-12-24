<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_model extends CI_Model {
    
         public function __construct(){
            $this->load->database();
         }
}         