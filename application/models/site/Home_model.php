<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_main_menu($position)
         {
            $this->db->select('m.id, m.name, m.slug, m.avatar, p.level, p.lft, p.rgt');
            $this->db->from('menu as m');
            $this->db->join('position as p','p.menu_id = m.id');
            $this->db->where('p.position',$position);
            $this->db->order_by('p.lft','ASC');
            $this->db->order_by('p.rgt','DESC');
            $query = $this->db->get();
            $data  = $query->result_array();
            $newdata = array();
            $i = 0;
            if( !empty($data) )
            {
                foreach( $data as $val )
                {
                    if( $val['level'] == 0 )
                      {
                        $newdata[$i] = $val;
                        $i++;
                      }  
                    else
                      $newdata[$i-1]['submenu'][] = $val;
                    
                }
            }
            return $newdata;
         } 


        /**HAM LAY VE 1 BAIVIET DUA VAO SLUG**/
        public function Db_getOneArticle($slug){
            return  $this->db->select('id')->from('article')->where('slug', $slug)->get()->row_array();
        }
}         