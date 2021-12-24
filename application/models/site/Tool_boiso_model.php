<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tool_boiso_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function noidung_que($id)
	{
		$this->db->where('id_que',$id);
		$this->db->select('*');
		$this->db->from('tbl_gieoque_cmt');
		return $this->db->get()->row_array();

	}

}    