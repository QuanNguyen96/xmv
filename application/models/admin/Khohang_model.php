<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khohang_model extends CI_Model {
         protected $table = 'khohang';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( $get['key'] != null )
                   {
                      $this->db->like('codes',$get['key']);
                      $this->db->or_like('name',$get['key']);
                   }    
                   return $this->db->count_all_results('khohang');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('kh.*');
                      $this->db->from('khohang as kh');
                      if($get['key'] != null )
                      {
                        $this->db->like('kh.codes',$get['key']); 
                        $this->db->or_like('kh.name',$get['key']); 
                      }
                      $this->db->order_by( 'kh.update_date', $get['order'] );
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $khohang_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('kh.*');
            $this->db->from('khohang as kh');
            $this->db->where('kh.id', $khohang_id );
            $query = $this->db->get();
            return $query->row_array();
         }

}         