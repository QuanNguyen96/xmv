<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {
         protected $table = 'tbl_comment';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( $get['key'] != null )
                   {
                      $this->db->like('name',$get['key']);
                   } 
                   if( $get['url'] != null )
                   {
                      $this->db->like('url',$get['url']);
                   }    
                   return $this->db->count_all_results('tbl_comment');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('s.*');
                      $this->db->from('tbl_comment as s');
                      
                      if($get['key'] != null )
                      {
                        $this->db->like('s.name',$get['key']);
                      }
                      if( $get['url'] != null )
                       {
                          $this->db->like('s.url',$get['url']);
                       }   
                      $this->db->limit($limit, $offset); 
                      $this->db->order_by('created_date', 'asc'); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $comment_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('s.*');
            $this->db->from('tbl_comment as s');
            $this->db->where('s.id', $get['id'] );
            $query = $this->db->get();
            return $query->row_array();
         }

         public function Db_group_url(  )
         {
            $result = $this->db->select('url')
                                ->from('tbl_comment')
                                ->group_by('url')
                                ->get()
                                ->result_array();
            return $result;
         }
         
         
}         