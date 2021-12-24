<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Baivietxongdat_model extends CI_Model
{
    protected $table = 'bai_viet_xong_dat';
    public function __construct()
    {
        $this->load->database();
    }
    public function Db_count_index($get)
    {
        $session_user = $this->session->userdata();
        if (isset($get['key']) && $get['key'] != null)
            $this->db->like('title', $get['key']);
        return $this->db->count_all_results('bai_viet_xong_dat');
    }
    public function Db_get_index($get, $limit)
    {
        $session_user = $this->session->userdata();
        $offset       = ((int) $get['page'] - 1) * $limit;
        $this->db->select('*');
        $this->db->from('bai_viet_xong_dat');
        if ($get['key'] != null)
            $this->db->like('title', $get['key']);
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
        $id = isset($get['id']) ? $get['id'] : 0;
        $this->db->select('*');
        $this->db->from('bai_viet_xong_dat');
        $this->db->where('id', $id);
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