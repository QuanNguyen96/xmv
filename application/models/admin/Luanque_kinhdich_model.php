<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Luanque_kinhdich_model extends CI_Model
{
	protected $table = 'tbl_tuvan_phongthuysim';
	public function __construct()
	{
		$this->load->database();
	}
	public function Db_count_index($get)
	{
		if ($get['key'] != null)
		{
			$this->db->like('name', $get['key']);
		}
		return $this->db->count_all_results('luanque_kinhdich');
	}
	public function Db_get_index($get, $limit)
	{
		$offset = ((int)$get['page'] - 1) * $limit;
		$this->db->select('s.*, q.ten as tenque');
		$this->db->from('luanque_kinhdich as s');
		$this->db->join('jos_sao_que as q', 's.id_que = q.id');
		if ($get['key'] != null)
		{
			$this->db->like('s.name', $get['key']);
		}
		$this->db->limit($limit, $offset);
		$this->db->order_by('created_date', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function Db_get_edit($get)
	{
		$keywords_id = isset($get['id']) ? $get['id'] : 0;
		$this->db->select('s.*');
		$this->db->from('luanque_kinhdich as s');
		$this->db->where('s.id', $get['id']);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function Db_insert($insert)
	{
		$this->db->insert('luanque_kinhdich', $insert);
	}
	public function Db_update($update)
	{
		$this->db->update('luanque_kinhdich', $update);
	}
	public function Db_listQue()
	{
		return $this->db->select('id, ten,')->get('jos_sao_que')->result_array();
	}
}
