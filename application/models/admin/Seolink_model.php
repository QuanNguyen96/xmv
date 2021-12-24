<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seolink_model extends CI_Model {
         protected $table = 'seolink';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( $get['key'] != null )
                   {
                      $this->db->like('link',$get['key']);
                      $this->db->or_like('title',$get['key']);
                   }    
                   return $this->db->count_all_results('seolink');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('s.*, u.fullname as created_by');
                      $this->db->from('seolink as s');
                      $this->db->join('user as u', 'u.id = s.created_by','left');
                      if($get['key'] != null )
                      {
                        $this->db->like('s.link',$get['key']); 
                        $this->db->or_like('s.title',$get['key']); 
                      }
                      $this->db->order_by( 's.created_date', $get['order'] );
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $seolink_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('s.*');
            $this->db->from('seolink as s');
            $this->db->where('s.id', $get['id'] );
            $query = $this->db->get();
            return $query->row_array();
         }
         
         
}         