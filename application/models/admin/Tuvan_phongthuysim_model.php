<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Tuvan_phongthuysim_model extends CI_Model
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
		return $this->db->count_all_results('tbl_tuvan_phongthuysim');
	}
	public function Db_get_index($get, $limit)
	{
		$offset = ((int)$get['page'] - 1) * $limit;
		$this->db->select('s.*');
		$this->db->from('tbl_tuvan_phongthuysim as s');
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
		$this->db->from('tbl_tuvan_phongthuysim as s');
		$this->db->where('s.id', $get['id']);
		$query = $this->db->get();
		return $query->row_array();
	}
}
