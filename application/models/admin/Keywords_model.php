<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keywords_model extends CI_Model {
         protected $table = 'keywords';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( $get['key'] != null )
                   {
                      $this->db->like('anchor_text',$get['key']);
                      $this->db->or_like('internal_link',$get['key']);
                   }    
                   return $this->db->count_all_results('keywords');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('s.*');
                      $this->db->from('keywords as s');
                      
                      if($get['key'] != null )
                      {
                        $this->db->like('s.anchor_text',$get['key']); 
                        $this->db->or_like('s.internal_link',$get['key']); 
                      }
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $keywords_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('s.*');
            $this->db->from('keywords as s');
            $this->db->where('s.id', $get['id'] );
            $query = $this->db->get();
            return $query->row_array();
         }
         
         
}         