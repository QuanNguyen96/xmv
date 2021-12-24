<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = 'user';

    public function __construct()
    {
        $this->load->database();
    }

    public function Db_count_index($get)
    {
        if (isset($get['key']) && $get['key'] != null) {
            $this->db->like('fullname', $get['key']);
            $this->db->or_like('email', $get['key']);
        }
        $this->db->where('level > ', $this->admin_auth->get_colum('level'));
        return $this->db->count_all_results('user');

    }

    public function Db_get_index($get, $limit)
    {
        $offset = ((int)$get['page'] - 1) * $limit;
        $this->db->select('u.id,u.fullname,u.email,u.level,u.created_date,uc.fullname as created_by');
        $this->db->from('user as u');
        $this->db->join('user as uc', 'uc.id = u.created_by');
        if ($get['key'] != null) {
            $this->db->like('u.fullname', $get['key']);
            $this->db->or_like('u.email', $get['key']);
        }
        $this->db->where('u.level > ', $this->admin_auth->get_colum('level'));
        $this->db->order_by('u.created_date', $get['order']);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $data = $query->result_array();
        if (!empty($data)) {
            foreach ($data as $key => $val) {
                $data[$key]['manage'] = $this->Db_get_manage($val['id']);
            }
        }
        return $data;
    }

    public function Db_get_manage($user_id)
    {
        $this->db->select('m.id,m.name');
        $this->db->from('manage as m');
        $this->db->join('user_manage as um', 'um.manage_id = m.id');
        $this->db->where('um.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Db_get_edit_user($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', (int)$id);
        $this->db->where('level > ', (int)$this->admin_auth->get_colum('level'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function Db_get_access($user_id)
    {
        $this->db->select('m.link');
        $this->db->from('manage as m');
        $this->db->join('user_manage as um', 'um.manage_id = m.id');
        $this->db->where('um.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Db_login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $this->db->where('state', 1);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    public function Db_get_menu($access, $email, $root_email)
    {
        $this->db->select('*');
        if ($email != $root_email)
            $this->db->where_in('url', $access);
        $this->db->where('show', 1);
        $query = $this->db->get('module');
        return $query->result_array();
    }
}         