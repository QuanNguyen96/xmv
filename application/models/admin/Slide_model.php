<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide_model extends CI_Model {
         protected $table = 'slide';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( $get['key'] != null )
                   {
                      $this->db->like('name',$get['key']);
                   }    
                   return $this->db->count_all_results('slide');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('sl.*');
                      $this->db->from('slide as sl');
                      if($get['key'] != null )
                      {
                        $this->db->like('sl.name',$get['key']); 
                      }
                      $this->db->order_by( 'sl.orders', 'DESC' );
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $slide_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('sl.*');
            $this->db->from('slide as sl');
            $this->db->where('sl.id', $slide_id );
            $query = $this->db->get();
            return $query->row_array();
         }

}         