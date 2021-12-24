<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
         protected $table = 'menu';
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( isset( $get['key'] ) && $get['key'] != null )
                       $this->db->like('m.name',$get['key']);
                   if($get['position'] != null )
                   {
                       $this->db->join('position as p', 'p.menu_id = m.id');
                       $this->db->where('p.position',$get['position']);
                   }   
                   if( $get['module'] != null ) 
                   $this->db->where('m.module',$get['module']);
                   return $this->db->count_all_results('menu as m');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('m.id,m.name, m.created_date, m.state, u.fullname as created_by, p.level, p.id as position_id, p.parent');
                      $this->db->from('menu as m');
                      $this->db->join('user as u', 'u.id = m.created_by');
                      $this->db->join('position as p', 'p.menu_id = m.id');
                      $this->db->where('p.position',$get['position']);
                      if( $get['module'] != null ) 
                      $this->db->where('m.module',$get['module']);
                      if($get['key'] != null )
                      $this->db->like('m.name',$get['key']); 
                      $this->db->order_by( 'p.lft', 'ASC' );
                      $this->db->order_by( 'p.rgt', 'DESC' );
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_listsort( $get )
         {
                      $this->db->select('m.id,m.name, p.level, p.id as position_id, p.parent');
                      $this->db->from('menu as m');
                      $this->db->join('position as p', 'p.menu_id = m.id');
                      $this->db->where('p.position',$get['position']);
                      if( $get['module'] != null ) 
                      $this->db->where('m.module',$get['module']);
                      $this->db->order_by( 'p.lft', 'ASC' );
                      $this->db->order_by( 'p.rgt', 'DESC' );
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_get_edit( $get )
         {
            $menu_id  = isset( $get['id'] ) ? (int)$get['id'] : 0;
            $this->db->select('m.*');
            $this->db->from('menu as m');
            $this->db->where('m.id', $menu_id );
            $query = $this->db->get();
            return $query->row_array();
         }
         
         public function Db_get_category_edit($module)
         {
                    $this->db->select('id,name,parent,level');
                    $this->db->from('menu');
                    $this->db->where('module',$module);
                    $this->db->order_by('lft','ASC');
                    $this->db->order_by('rgt','DESC');
                    $query = $this->db->get();
                    return $query->result_array();
         }
         
         
}         