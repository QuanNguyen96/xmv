<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class xamtaquan_model extends CI_Model{
	function __construct(){;
		parent:: __construct();
		$this->load->database();
	}
	function getAll(){
		return $this->db->get('xamtaquan')->result_array();
	}

	function noi_dung_que($xam_so){
		$query = $this->db->where('xam_so', $xam_so)->get('xamtaquan')
						  ->row_array();
		return $query;
	}
}
?>
