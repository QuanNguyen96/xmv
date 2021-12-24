<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Article_model extends CI_Model
{
    protected $table = 'article';
    public function __construct()
    {
        $this->load->database();
    }
    public function Db_count_index($get)
    {
        $session_user = $this->session->userdata();
        if (isset($get['key']) && $get['key'] != null)
            $this->db->like('name', $get['key']);
        if ($get['category'] != null)
            $this->db->where('parent', $get['category']);
        if ($session_user['login']['level'] == 1) {
            $this->db->where('a.created_by', $session_user['login']['id']);
        }
        return $this->db->count_all_results('article as a');
    }
    public function Db_get_index($get, $limit)
    {
        $session_user = $this->session->userdata();
        $offset       = ((int) $get['page'] - 1) * $limit;
        $this->db->select('a.id, a.parent, a.name, a.created_date, a.state, u.fullname as created_by,a.orders, m.name as chuyenmuc');
        $this->db->from('article as a');
        $this->db->join('menu as m', 'm.id = a.parent', 'left');
        $this->db->join('user as u', 'u.id = a.created_by');
        if ($get['key'] != null)
            $this->db->like('a.name', $get['key']);
        if ($get['category'] != null)
            $this->db->where('a.parent', $get['category']);
        $this->db->order_by('a.created_date', $get['order']);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function Db_get_all()
    {
        $this->db->select('a.id, a.name');
        $this->db->from('article as a');
        $this->db->where('state', 1);
        $this->db->order_by('a.created_date', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function Db_get_edit($get)
    {
        $article_id = isset($get['id']) ? $get['id'] : 0;
        $this->db->select('a.*');
        $this->db->from('article as a');
        $this->db->where('a.id', $article_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function Db_list_menu()
    {
        $this->db->select('name,id,level');
        $this->db->from('menu');
        $this->db->where('module', 'article');
        $this->db->order_by('lft', 'ASC');
        $this->db->order_by('rgt', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}