<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config_model extends CI_Model
{
    protected $table = 'config';

    public function __construct()
    {
        $this->load->database();
    }

    public function Db_count_index($get)
    {
        if ($get['key'] != null) {
            $this->db->like('name', $get['key']);
        }
        return $this->db->count_all_results('config');
    }

    public function Db_get_index($get, $limit)
    {
        $offset = ((int)$get['page'] - 1) * $limit;
        $this->db->select('cf.*');
        $this->db->from('config as cf');
        if ($get['key'] != null) {
            $this->db->like('cf.name', $get['key']);
        }
        $this->db->order_by('cf.id', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->from('config')->where('id', $id)->get();
        return $query->result_array();
    }
}         