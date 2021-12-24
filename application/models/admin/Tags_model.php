<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags_model extends CI_Model {
         protected $table = 'tags';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( $get['key'] != null )
                       $this->db->like('name',$get['key']);
                   if( $get['module'] != null )
                      $this->db->where( 'table', $get['module'] );    
                   return $this->db->count_all_results('tags');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('t.id, t.name, t.created_date, u.fullname as created_by,t.table,m.title');
                      $this->db->from('tags as t');
                      $this->db->join('module as m','m.name = t.table');
                      $this->db->join('user as u','u.id = t.created_by');
                      if($get['key'] != null )
                      $this->db->like('t.name',$get['key']); 
                      if($get['module'] != null )
                      $this->db->where( 't.table', $get['module'] );
                      $this->db->order_by( 't.created_date', $get['order'] );
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $tags_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('t.*');
            $this->db->from('tags as t');
            $this->db->where('t.id', $tags_id );
            $query = $this->db->get();
            return $query->row_array();
         }
         
         public function Db_list_menu()
         {
            $this->db->select('name,id,level');
            $this->db->from('menu');
            $this->db->where('module','tags');
            $this->db->order_by('lft','ASC');
            $this->db->order_by('rgt','DESC');
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_get_listTags($table_id,$table_name)
         {
            $this->db->select('t.name,tt.id');
            $this->db->from('tags as t');
            $this->db->join('tags_table as tt', 'tt.tags_id = t.id');
            $this->db->where('tt.table_id',$table_id);
            $this->db->where('tt.table',$table_name);
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function check_tag( $tag, $slug_tag, $id, $table_name )
         {
            $rt = array();
            $check_tag = $this->db->where('slug',$slug_tag)->get('tags')->row_array();
            if( empty( $check_tag ) )
            {
                $this->db->insert('tags', array('table'=> $table_name, 'name'=>$tag, 'slug'=>$slug_tag, 'created_date'=>time(), 'created_by'=> $this->admin_auth->get_colum('id')) );
                $check_tag = $this->db->where('slug',$slug_tag)->get('tags')->row_array();
            }
            if( $check_tag['table'] == $table_name )
            {
                $tags_table = $this->db->where('table_id',$id)->where('tags_id',$check_tag['id'])->get('tags_table')->row_array();
                if( empty( $tags_table ) )
                {
                  $this->db->insert('tags_table',array('tags_id'=>$check_tag['id'], 'table_id'=>$id, 'table'=>$table_name) );  
                }
                //$rt = array( 'tags_id'=>$check_tag['id'], 'table_id'=>$id,'tag'=>$tag );    
                $rt = $this->db->where('table_id',$id)->where('table',$table_name)->get('tags_table')->row_array();
                $rt['tag'] = $tag;
            }
            return $rt;
         }     
         
}         