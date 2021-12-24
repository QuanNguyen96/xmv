<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class Tags_model extends CI_Model
    {
        protected $table = 'tags';
        public function __construct()
        {
            $this->load->database();
        }

        public function getInfo($slug = null){
            return $this->db->select()
                        ->from($this->table)
                        ->where('slug',$slug)
                        ->get()
                        ->row_array();
        }

        public function getListArticleTag($id = null){
            return $this->db->select('article.*')
                        ->from('article')
                        ->join('tags_table','tags_table.table_id = article.id')
                        ->where('tags_table.tags_id',$id)
                        ->get()
                        ->result_array();
        }
    
        public function Db_get_listTags($table_id, $table_name)
        {
            $this->db->select('t.name,t.slug,tt.id');
            $this->db->from('tags as t');
            $this->db->join('tags_table as tt', 'tt.tags_id = t.id');
            $this->db->where('tt.table_id', $table_id);
            $this->db->where('tt.table', $table_name);
            $query = $this->db->get();
            return $query->result_array();
        }
    
    }
