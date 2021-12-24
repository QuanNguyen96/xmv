<?php 
class Xamlinhxam_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function getQueso(){
		return $this->db->select('xam_so')->get('quanamlinhxam')->result_array();
	}

	function getNoidungQueso($queso){
		$query = $this->db->where('xam_so', $queso)
						  ->get('quanamlinhxam')
						  ->row_array();
		return $query;
	}
}
?>