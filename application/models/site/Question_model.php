<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_model extends CI_Model {

	public function Db_insert_question($data)
	{
		$this->db->insert('tbl_question',$data);
		return $this->db->affected_rows();
	}

}

/* End of file Question_model.php */
/* Location: ./application/models/site/Question_model.php */