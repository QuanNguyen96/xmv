<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suanoidung_model extends CI_Model {
         protected $table   = 'article';
         protected $tbl1    = 'boibai_hangngay';
         protected $tbl2    = 'boingaysinh';

         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_table_1( $get )
         {         
          $session_user = $this->session->userdata();
          if( isset( $get['key'] ) && $get['key'] != null )
                       $this->db->like('doi',$get['key']);
          return $this->db->count_all_results( $this->tbl1.' as a' );
            
         }
         public function Db_count_table_2( $get )
         {         
          $session_user = $this->session->userdata();
          if( isset( $get['key'] ) && $get['key'] != null )
                       $this->db->like('cung',$get['key']);
          return $this->db->count_all_results( $this->tbl2.' as a' );
            
         }

         public function Db_get_index_table_1( $get, $limit )
         { 
          $session_user = $this->session->userdata();
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('*');
                      $this->db->from($this->tbl1.' as a');
                      
                      if($get['key'] != null )
                      $this->db->like('a.doi',$get['key']); 
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         public function Db_get_index_table_2( $get, $limit )
         { 
          $session_user = $this->session->userdata();
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('*');
                      $this->db->from($this->tbl2.' as a');
                      
                      if($get['key'] != null )
                      $this->db->like('a.cung',$get['key']); 
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit_table_1( $get )
         {
            $id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('a.*');
            $this->db->from($this->tbl1.' as a');
            $this->db->where('a.id', $id );
            $query = $this->db->get();
            return $query->row_array();
         }

         public function Db_get_edit_table_2( $get )
         {
            $id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('a.*');
            $this->db->from($this->tbl2.' as a');
            $this->db->where('a.id', $id );
            $query = $this->db->get();
            return $query->row_array();
         }

         public function Db_update_table_1($get, $update){
           $this->db->where('id', $get['id'])->update($this->tbl1, $update);
         }

         public function Db_update_table_2($get, $update){
           $this->db->where('id', $get['id'])->update($this->tbl2, $update);
         }
         
         public function Db_list_menu()
         {
            $this->db->select('name,id,level');
            $this->db->from('menu');
            $this->db->where('module','article');
            $this->db->order_by('lft','ASC');
            $this->db->order_by('rgt','DESC');
            $query = $this->db->get();
            return $query->result_array();
         }
         
}         