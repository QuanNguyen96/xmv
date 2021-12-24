<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myconfig_model extends CI_Model {
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_get_position_menu($position)
         {
            $this->db->select('m.name,m.slug,m.module,m.hyperlink,p.level,p.menu_id');
            $this->db->from('menu as m');
            $this->db->join('position as p', 'p.menu_id = m.id');
            $this->db->where('position',$position);
            //$this->db->group_by('m.id');
            $this->db->order_by('p.lft','asc');
            $this->db->order_by('p.rgt','desc');
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_get_menu()
         {
            $this->db->select('id,parent,slug');
            $this->db->from('menu');
            $this->db->order_by('lft','asc');
            $this->db->order_by('rgt','desc');
            $query = $this->db->get();
            $data  = $query->result_array();
            $new_data = array();
            if( !empty($data) )
            {
                foreach( $data as $val )
                {
                    $new_data[$val['id']] = $val;
                }
            }
            return $new_data;
         }
         
         /** Lấy danh sách id con **/
         public function Db_list_children_id($page)
         {
            $this->db->select('id');
            $this->db->from('menu');
            $this->db->where('lft >= ',$page['lft']);
            $this->db->where('rgt <= ', $page['rgt']);
            $this->db->where('state',1);
            $query = $this->db->get();
            $data  = $query->result_array();
            $arrId = array();
            if( !empty($data) )
            {
                foreach($data as $val)
                {
                    $arrId[] = $val['id'];
                }
            }
            return $arrId;
         }
         
        
}         
