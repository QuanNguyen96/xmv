<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
         protected $table = 'product';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( isset( $get['key'] ) && $get['key'] != null )
                       $this->db->like('name',$get['key']);
                   if($get['category'] != null )   
                   $this->db->where('parent',$get['category']); 
                   return $this->db->count_all_results('product as p');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('p.id, p.parent, p.name, p.created_date, p.state, u.fullname as created_by,p.orders, m.name as chuyenmuc');
                      $this->db->from('product as p');
                      $this->db->join('menu as m', 'm.id = p.parent','left');
                      $this->db->join('user as u', 'u.id = p.created_by');
                      if($get['key'] != null )
                      $this->db->like('p.name',$get['key']); 
                      if($get['category'] != null )
                      $this->db->where( 'p.parent', $get['category'] );
                      if($get['order_id'] != null )
                      $this->db->order_by( 'p.'.$get['order_id'], $get['order'] );
                      $this->db->order_by( 'p.created_date', $get['order'] );
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $product_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('p.*');
            $this->db->from('product as p');
            $this->db->where('p.id', $product_id );
            $query = $this->db->get();
            return $query->row_array();
         }
         
         public function Db_list_menu()
         {
            $this->db->select('name,id,level');
            $this->db->from('menu');
            $this->db->where('module','product');
            $this->db->order_by('lft','ASC');
            $this->db->order_by('rgt','DESC');
            $query = $this->db->get();
            return $query->result_array();
         }
         
}         