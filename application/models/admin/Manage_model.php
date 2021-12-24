<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_model extends CI_Model {
         protected $table = 'manage';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( isset( $get['key'] ) && $get['key'] != null )
                   $this->db->like('name',$get['key']);
                   $this->db->where('level >= ',$this->admin_auth->get_colum('level'));    
                   return $this->db->count_all_results('manage');   
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('m.id,m.name,m.created_date, u.fullname as created_by');
                      $this->db->from('manage as m');
                      $this->db->join('user as u', 'u.id = m.created_by');
                      if($get['key'] != null )
                      $this->db->like('m.name',$get['key']); 
                      $this->db->where('m.level >= ',$this->admin_auth->get_colum('level'));  
                      $this->db->order_by( 'm.created_date', $get['order'] );
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $manage_id  = isset( $get['id'] ) ? $get['id'] : 0;
            $this->db->select('a.*');
            $this->db->from('manage as a');
            $this->db->where('a.id', $manage_id );
            $query = $this->db->get();
            return $query->row_array();
         }
         
         public function Db_list_menu()
         {
            $this->db->select('name,id,level');
            $this->db->from('menu');
            $this->db->where('module','manage');
            $this->db->order_by('lft','ASC');
            $this->db->order_by('rgt','DESC');
            $query = $this->db->get();
            return $query->result_array();
         }
         
}         