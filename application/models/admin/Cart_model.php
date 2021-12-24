<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {
         protected $table = 'cart';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( $get['key'] != null )
                   {
                      $this->db->like('fullname',$get['key']);
                      $this->db->or_like('phone',$get['key']);
                   }    
                   return $this->db->count_all_results('cart');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('c.*');
                      $this->db->from('cart as c');
                      if($get['key'] != null )
                      {
                        $this->db->like('c.fullname',$get['key']); 
                        $this->db->or_like('c.phone',$get['key']); 
                      }
                      $this->db->order_by( 'c.created_date', $get['order'] );
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $cart_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('s.*');
            $this->db->from('cart as s');
            $this->db->where('s.id', $get['id'] );
            $query = $this->db->get();
            return $query->row_array();
         }
         
         
}         