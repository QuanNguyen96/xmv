<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xemboi_model extends CI_Model {

	public function Db_get_noidung_mauxe($menh)
	{
		$this->db->where('menh_slug',$menh);
		$this->db->select('*');
		$this->db->from('ci_mauxehopmenh');
		return $this->db->get()->row_array();
	}

	function getCungMenh($a,$b){  
    		$cung_r = array();
    		$t=0;
    		for($i=0;$i<4;$i++){
    		$a1=substr($a,$i,1);
    		$t=$a1+$t;				
    		if($t>8)$t=$t-9;
    		}
    		if($t==0)$t=9;
            
    		if($b=="1")$t=$t+9;		
    		$sql = "SELECT *
    				FROM `jos_sao_cung`
    				WHERE `id` = '$t'";
                    
    		$rows = $this->db->query($sql);
            return $rows->row_array();
    	}

    	// Hàm lấy nội dung các hướng phong thủy
    public function noidung_phongthuy(){
        $this->db->select('*');
        $this->db->from('xemphongthuy_huongnha');
        return $this->db->get()->result_array();
    }

    public function Db_get_info_notruoi($vitri)
    {
        $this->db->where('position_slug',$vitri);
        $this->db->select('*');
        $this->db->from('ci_boinotruoi');
        return $this->db->get()->row_array();
    }

    public function Db_get_content_tho()
    {
        $this->db->select('*');
        $this->db->from('ci_xemboikieu');
        return $this->db->get()->result_array();
    }

    public function Db_get_content_chitay($name_slug)
    {
        $this->db->where('name_slug',$name_slug);
        $this->db->select('*');
        $this->db->from('ci_boichitay');
        return $this->db->get()->row_array();
    }

    public function Db_get_all_chitay()
    {
        $this->db->select('*');
        $this->db->from('ci_boichitay');
        return $this->db->get()->result_array();
    }
}

/* End of file Xemboi_model.php */
/* Location: ./application/models/site/Xemboi_model.php */