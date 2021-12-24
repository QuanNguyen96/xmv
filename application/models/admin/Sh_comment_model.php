<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sh_comment_model extends CI_Model {
         protected $table = 'sh_comment';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( $get['key'] != null )
                   {
                      $this->db->like('content',$get['key']);
                   } 
                   if( $get['url'] != null )
                   {
                      $this->db->like('url_id',$get['url']);
                   }    
                   return $this->db->count_all_results('sh_comment');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('s.*');
                      $this->db->from('sh_comment as s');
                      
                      if($get['key'] != null )
                      {
                        $this->db->like('s.content',$get['key']);
                      }
                      if( $get['url'] != null )
                       {
                          $this->db->like('s.url_id',$get['url']);
                       }   
                      $this->db->limit($limit, $offset);
                      $this->db->order_by('created_date', 'desc');
                      $query = $this->db->get(); 
                      return $query->result_array();
         }

         public function Db_get_index_struct( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('s.*');
                      $this->db->from('sh_comment as s');
                      
                      if($get['key'] != null )
                      {
                        $this->db->like('s.content',$get['key']);
                      }
                      if( $get['url'] != null )
                       {
                          $this->db->like('s.url_id',$get['url']);
                       }   
                      $this->db->limit($limit, $offset);
                      // $this->db->order_by('meta_left', 'desc');
                      // $this->db->order_by('meta_right', 'asc');
                      $this->db->order_by('created_date', 'asc');
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $comment_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('s.*');
            $this->db->from('sh_comment as s');
            $this->db->where('s.id', $get['id'] );
            $query = $this->db->get();
            return $query->row_array();
         }

         public function Db_group_url(  )
         {
            $result = $this->db->select('url_id')
                                ->from('sh_comment')
                                ->group_by('url_id')
                                ->get()
                                ->result_array();
            return $result;
         }

         public function Db_item_detail_comment( $id )
         {
            $recordComment = $this->db->select('sh_comment.*, sh_member.name as member_name,sh_member.email as member_email, sh_member.gender as member_gender, user.fullname as admin_name')
                                            ->from('sh_comment')
                                            ->join('sh_member','sh_member.id = sh_comment.member_id','left')
                                            ->join('user','user.id = sh_comment.user_id','left')
                                            ->where(array('sh_comment.id'=> $id))
                                            ->get()
                                            ->row_array();
            return $recordComment;
         }
         
         
}         