<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xemtuvi_model extends CI_Model {

	public function Db_get_content($namsinh,$canchi_slug)
	{
		$this->db->where('namsinh',$namsinh);
		$this->db->where('canchi_slug',$canchi_slug);
		$this->db->select('*');
		$this->db->from('xvm_tvtrondoi');
		return $this->db->get()->row_array();
	}

	public function submit_ttm($number_cannguoi,$number_chinguoi,$number_canngay,$number_chingay){
		$this->db->where('nguoi_can',$number_cannguoi);
		$this->db->where('nguoi_chi',$number_chinguoi);
		$this->db->where('ngay_can',$number_canngay);
		$this->db->where('ngay_chi',$number_chingay);
		$this->db->select('ttm.text_gioithieu,ttm.text_nen,ttm.text_cu,ttm.text_ketluan,ttm.text_tho');
		$this->db->from('tamtongmieu as ttm');
		return $this->db->get()->row_array();
	}

	public function __construct()
	{
		$this->load->database();
	}

	public function Db_get_saochieutuvi($id, $gioitinh)
	{
		return $this->db->where(array('sao_id'=>$id, 'gioitinh'=>$gioitinh))->get('sao_chieu_tu_vi')->row_array();

	} 
	public function Db_get_saohantuvi($id)
	{
		return $this->db->where('sao_id', $id)->get('sao_han_tu_vi')->row_array();

	}
	public function Db_get_quedichtheonamsinh($canchi){
		return $this->db->where('canchi',$canchi)->get('que_dich_theo_ns')->row_array();
	}
	public function Db_get_lainhanlasotuvi($cung){
		return $this->db->where('cung',$cung)->get('lai_nhan_la_so_tu_vi')->row_array();
	}
	public function Db_get_lucthaphoagiap($canchi){
		return $this->db->where('canchi',$canchi)->get('luc_thap_hoa_giap_tu_vi')->row_array();
	}
	public function Db_get_luongchi_namsinh($namsinh){
		return $this->db->where('namsinh', $namsinh)->get('luongchi_namsinh')->row_array();
	}
	public function Db_get_luongchi_thangsinh($thangsinh){
		return $this->db->where('thangsinh', $thangsinh)->get('luongchi_thangsinh')->row_array();
	}
	public function Db_get_luongchi_ngaysinh($ngaysinh){
		return $this->db->where('ngaysinh', $ngaysinh)->get('luongchi_ngaysinh')->row_array();
	}
	public function Db_get_luongchi_giosinh($giosinh){
		return $this->db->where('giosinh', $giosinh)->get('luongchi_giosinh')->row_array();
	}
	public function Db_get_noidungluongchi($luongchi){
		return $this->db->where('luongchi',$luongchi)->get('noidung_luongchi')->row_array();
	}
}

/* End of file Xemtuvi_model.php */
/* Location: .//C/Users/admin/AppData/Local/Temp/fz3temp-2/Xemtuvi_model.php */