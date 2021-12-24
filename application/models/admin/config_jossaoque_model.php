<?php
class Config_jossaoque_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function Db_list_record(){
        $query = $this->db->get('jos_sao_que');
        return $query->result_array();
    }
    
    
}   