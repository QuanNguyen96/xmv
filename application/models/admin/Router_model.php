<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Router_model extends CI_Model {
         protected $table = 'router';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( $get['key'] != null )
                   {
                      $this->db->like('router_key',$get['key']);
                   }    
                   return $this->db->count_all_results('router');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('r.*');
                      $this->db->from('router as r');
                      if($get['key'] != null )
                      {
                        $this->db->like('r.router_key',$get['key']); 
                      }
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $router_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('r.*');
            $this->db->from('router as r');
            $this->db->where('r.id', $router_id );
            $query = $this->db->get();
            return $query->row_array();
         }

}         