<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_list( $arrId = array(), $limit, $offset )
         {
            $this->db->select('id,name,slug,parent,avatar,giaban,giakhuyenmai,hidden_price');
            $this->db->where_in('parent',$arrId);
            $this->db->where('state',1);
            $this->db->order_by('orders','DESC');
            $query = $this->db->get('product');
            return $query->result_array();
         }
         
         public function Db_list_relationship($id,$parent)
         {
            $this->db->select('id,parent,name,slug,avatar,giaban,giakhuyenmai, hidden_price');
            $this->db->from('product');
            $this->db->where('parent',$parent);
            $this->db->where('id <> ',$id);
            $this->db->where('state',1);
            $this->db->order_by('id','DESC');
            $this->db->limit(5);
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_get_Menu($menu_id)
         {
            $curent_menu = $this->db->select('lft,rgt')->where('id',$menu_id)->get('menu')->row_array();
            $this->db->select('id,name,slug,parent');
            $this->db->from('menu');
            $this->db->where('lft <= ', $curent_menu['lft']);
            $this->db->where('rgt >= ', $curent_menu['rgt']);
            $this->db->order_by('lft','ASC');
            $this->db->order_by('rgt','DESC');
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_product_feature()
         {
            $this->db->select('id,parent,name,slug,avatar,giaban,giakhuyenmai, hidden_price');
            $this->db->where('state',1);
            $this->db->where('feature',1);
            $query = $this->db->get('product');
            return $query->result_array();
         }
         
         public function Db_get_TreeMenu($node)
         {
            $return = array();
            $this->db->select('id,lft,rgt');
            $this->db->where('lft <= ',$node['lft']);
            $this->db->where('rgt >= ',$node['rgt']);
            $this->db->order_by('lft','ASC');
            $this->db->limit(1);
            $query = $this->db->get('menu');
            $root  = $query->row_array();
            if( !empty($root) )
            {
                $this->db->select('id,lft,rgt,name,slug,parent');
                $this->db->where('lft >= ',$root['lft']);
                $this->db->where('rgt <= ',$root['rgt']);
                $this->db->order_by('lft','ASC');
                $query = $this->db->get('menu');
                $return = $query->result_array();               
            }
            return $return;
         }
}         