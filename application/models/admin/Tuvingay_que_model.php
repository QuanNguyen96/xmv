<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tuvingay_que_model extends CI_Model {
         protected $table = 'tvn_que';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( $get['key'] != null )
                   {
                      $this->db->like('name',$get['key']);
                   }    
                   return $this->db->count_all_results('tvn_que');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
              $offset = ( (int)$get['page'] - 1 ) * $limit;
              $this->db->select('q.*');
              $this->db->from('tvn_que as q');
              if($get['key'] != null )
              {
                $this->db->like('q.name',$get['key']); 
              }
              $this->db->limit($limit, $offset); 
              $query = $this->db->get(); 
              return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $tvn_que_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('q.*');
            $this->db->from('tvn_que as q');
            $this->db->where('q.id', $get['id'] );
            $query = $this->db->get();
            return $query->row_array();
         }
         
         
}         